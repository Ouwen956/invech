<?php

namespace app\listeners;

use app\common\model\Bet;
use app\common\model\Type;
use app\common\model\Played;
use app\common\model\Config;

use bong\service\queue\Contracts\ShouldQueue;

class LotteryListener //implements ShouldQueue
{

    public $queue = 'lottery';
    private $types; //彩种缓存
    private $played;
    private $lottery;//Data模型对象,升级为LotteryData对象
    private $lottery_bet_num = 0;

    public function onAction($event){
        
        //throw new \Exception('failed');
        
        $this->lottery = $event->obj;

        return $this->lottery->settlement();

    	$this->init();

        return $this->runLottery();
        
    }

    private function init()
    {
		date_default_timezone_set('PRC') ;

		$this->played = Played::getAll();
        
		$configs = Config::getAll();
		$this->fanDianMax = $configs['fanDianMax'];

        require_once(ROOT_PATH.'swoole/parse-calc-count.php');
        require_once(ROOT_PATH.'swoole/kqwf_algo.php');		
	}

    private function runLottery()
    {
    	$perPage = config('command_per_page')??100;
    
        /* data模型方式
    	$query = Bet::where('type',$this->lottery->type)
    			->where('actionNo',$this->lottery->number)
				->where('lotteryNo','');
        */      
        $query = $this->lottery->getBetBuild();
		$query->chunk($perPage, [$this,'runPageLottery']);
        return $this->lottery_bet_num;        
    }

    public function runPageLottery($bets){
        $this->lottery_bet_num += count($bets);
        foreach ($bets as $row) {           
            $played = $this->played[$row['playedId']];
            $func = $played['ruleFun'];    

            $id         = $row['id'];
            $actionData = $row['actionData'] ;   //投注号码
            $kjData     = $this->lottery->data ; 	//开奖号码
            $weiShu     = $row['weiShu'] ;       //位数
            $fanDian    = $row['fanDian'] ;     //根据返点和计算 赔率;
            $beiShu     = $row['beiShu'] ;
            $mode       = $row['mode'] ;
            $is_mix     = $played['is_mix'] ; 
            $mix_ids    = $played['mix_ids'] ; 
            $mix_pls    = [];//混合玩法的赔率表
            
            $is_kqwf    = $played['is_kqwf'];
            //$money      = $row['money'];//快钱玩法的投注金额
            $money      = $beiShu*$mode;    //每注本金
            $odd        = $row['bonusProp'];//快钱赔率

            $zjAmount = 0;        

            if($weiShu){
                $zjcount    = $func($actionData,$kjData,$weiShu) ;    
            }else{
                $zjcount    = $func($actionData,$kjData) ;    
            }

            if($is_kqwf){
                //目前 混合玩法 的 各子玩法 不支持 和局处理;
                if(-1 == $zjcount){//快钱玩法 存在 和局, 退还本金
                    $actionNum = $row['actionNum'] ;
                    $zjAmount = $actionNum*$money;
                    //$zjAmount = $actionNum*$beiShu*$mode;                     
                }

                if($zjcount>0){
                    $zjAmount = $zjcount*$odd*$money;
                }                              
            }else{
                //混合玩法返回各相关玩法的中奖次数;
                if($is_mix){

                    $mix_result = Played::where('id','in',$mix_ids)->select();

                    $fanDianMax = $this->fanDianMax;
                    foreach($mix_result as $mix_row){
                        $prop = $mix_row['bonusProp'];
                        $base = $mix_row['bonusPropBase'];
                        $convertBlMoney = ($prop - $base) / $fanDianMax;
                        $pl = ($prop - $fanDian * $convertBlMoney);
                        $mix_pls[] = round($pl,2);
                    }

                    $count_sum = 0;//总中奖次数
                    foreach ($mix_pls as $key => $pl) {
                        $count = $zjcount[$key];
                        $zjAmount += $count*$pl*$money/2;
                        $count_sum += $count;
                    }
                    
                    $zjcount = $count_sum;
                }else{
                    //普通玩法
                    $zjAmount = $zjcount*$odd*$money/2;
                }
            }

            $zjcount = (int)$zjcount;
            $zjAmount = round($zjAmount,2);

			$bet = $row;
	        $money_model = transaction(function() use ($bet,$zjcount,$zjAmount){
				
				$update_data = [
					'lotteryNo'	=>	$this->lottery->data,
					'zjCount'	=>	$zjcount,
					'bonus'		=>	$zjAmount,					
				];
				$bet->save($update_data);

                //即时返水
				if($is_daily_water=1){
					event('user.bet.back',[$bet]);
				}
                /*月结返佣
				if($is_daily_commission=0){
					event('user.bet.commission',[$bet]);
				}
                */

                //赢/和局
                if($zjcount > 0){                   
                    $bet->user->incBalance($zjAmount,'lottery',$bet->id,'派奖');
                }
                if($zjcount == -1){                   
                    $bet->user->incBalance($zjAmount,'lottery',$bet->id,'和局返还本金');
                }

	        });	
        }
    }

    public function failed($event,$e){}

}


