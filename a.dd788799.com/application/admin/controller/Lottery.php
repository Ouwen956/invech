<?php
namespace app\admin\controller;
use app\admin\Login;
use app\common\model\Type as TypeModel;
use app\common\model\Played as PlayedModel;
use app\common\model\PlayedGroup as PlayedGroupModel;
use app\common\model\PlayedPlGroup as PlayedPlGroupModel;
use app\common\model\PlayedPl as PlayedPlModel;
use app\common\model\LhcTime;
use app\common\model\LotteryTime;
use app\common\model\LotteryData;
use app\common\model\ActionLog as LogModel;

use app\events\LotteryEvent;
use app\listeners\LotteryListener;

class Lottery extends Login{

    public function index(){
        $this->view->page_header = '彩种列表';
        $request    =   request();
        $list       =   TypeModel::getList($request);
        $this->assign('list',$list);
        $this->assign('types',TypeModel::TYPE_ARRAY);
        return $this->fetch();
    }

    public function edit(){  
        $request = request();
        $params = $request->param();
        if(request()->isGet()){
            if(!empty($params['id'])){
                $info =  TypeModel::get(['id'=>$params['id']]);
                $this->assign('info',$info);  
            }
            $this->assign('types',TypeModel::TYPE_ARRAY);
            return view();
        }else{
            $id =  !empty($params['id'])? $params['id']:'';
            if($id){
                $type = TypeModel::get(intval($id));
            }else{
                $type = new TypeModel($params);
            }
            $list =  $type->validate('Lottery.index')->save($params);
            if($list){
                LogModel::log(LogModel::BUSINESS_TYPE_EDIT,$type,LogModel::BUSINESS_TYPES[LogModel::BUSINESS_TYPE_EDIT]);
                return $this->success('操作成功');
            }else{
                return $this->error($type->getError());
            }
        } 
    }

    public function playedGroup(){
        $this->view->page_header = '玩法分组';
        $request    =   request();
        $list       =   PlayedGroupModel::getList($request);
        $this->assign('list',$list);
        $this->assign('types',TypeModel::TYPE_ARRAY);
        return $this->fetch();
    }

    public  function playedGroup_edit(){  
        $request    =   request();
        $params     =   $request->param(); 
        if(request()->isGet()){
            if(!empty($params['id'])){
                $info =  PlayedGroupModel::get(['id'=>$params['id']]);
                $this->assign('info',$info);  
            }
            $this->assign('types',TypeModel::TYPE_ARRAY);
            return view();
        }else{
            $id     =  !empty($params['id'])? $params['id']:'';
            if($id){
                $playedgroup    =   PlayedGroupModel::get(intval($id));
            }else{
                $playedgroup    =   new PlayedGroupModel($params);
            }
            $list = $playedgroup->validate('Lottery.playedgroup')->save($params);
            if($list){
                cache('gygy_all_played_group',null);
                LogModel::log(LogModel::BUSINESS_TYPE_EDIT,$playedgroup,LogModel::BUSINESS_TYPES[LogModel::BUSINESS_TYPE_EDIT]);
                return $this->success('操作成功');
            }else{
                return $this->error($playedgroup->getError());
            }
        }
    }

    public function played(){
        $this->view->page_header = '玩法列表';
        $request = request();
        $list =PlayedModel::getList($request);
        $this->assign('list',$list);
        $this->assign('types',TypeModel::TYPE_ARRAY);
        return $this->fetch();        
    }
    
    public  function played_edit(){  
        $request = request();
        $params = $request->param(); 
        if(request()->isGet()){
            if(!empty($params['id'])){
                $info =  PlayedModel::get(['id'=>$params['id']]);
                $this->assign('info',$info);  
            }
            $this->assign('types',TypeModel::TYPE_ARRAY);
            return view();
        }else{
            $id   =  !empty($params['id'])? $params['id']:'';
            if($id){
                $played =   PlayedModel::get(intval($id));
            }else{
                $played =   new PlayedModel($params);
            }
            if(!empty($params['is_kqwf'])){
                $list   =   $played->validate('Lottery.playedgf')->save($params);    
            }else{
                $list   =   $played->validate('Lottery.playedkq')->save($params);
            }
            if($list){
                cache('gygy_all_played',null);
                LogModel::log(LogModel::BUSINESS_TYPE_EDIT,$played,LogModel::BUSINESS_TYPES[LogModel::BUSINESS_TYPE_EDIT]);
                return $this->success('操作成功');
            }else{
                return $this->error($played->getError());
            }
        }
    }

    public function plgroup(){
        $this->view->page_header = '赔率分组';
        $request    =   request();
        $list =PlayedPlGroupModel::getList($request);
        $this->assign('list',$list);
        return $this->fetch();        
    }

    public  function plgroup_edit(){  
        $request = request();
        $params = $request->param();
        if(request()->isGet()){ 
            if(!empty($params['id'])){
                $info =  PlayedPlGroupModel::get(['id'=>$params['id']]);
                $playid = $info->played->id;
                $type    = $info->played->type;
                $groupid = $info->played->playedgroup->id;
                $this->assign('playid',$playid); 
                $this->assign('typeinfo',$type);   
                $this->assign('groupid',$groupid);  
                $this->assign('info',$info);
            }
            $this->assign('types',TypeModel::TYPE_ARRAY);
            return view();
        }else{
            $id     =  !empty($params['id'])? $params['id']:'';
            if($id){
                $plgroup    =   PlayedPlGroupModel::get(intval($id));
            }else{
                 $plgroup   =   new PlayedPlGroupModel($params);
            }
            $list = $plgroup->validate('Lottery.plgroup')->save($params);
            if($list){
                LogModel::log(LogModel::BUSINESS_TYPE_EDIT,$plgroup,LogModel::BUSINESS_TYPES[LogModel::BUSINESS_TYPE_EDIT]);
                return $this->success('操作成功');
            }else{
                return $this->error($plgroup->getError());
            } 
        }
    }

    public function pl(){
        $this->view->page_header = '赔率列表';
        $request    =   request();
        $list       =   PlayedPlModel::getList($request);
        $this->assign('list',$list);
        return $this->fetch();        
    }

    public  function pl_edit(){  
        $request   =   request();
        $params    =   $request->param();
        if(request()->isGet()){ 
            if(!empty($params['id'])){
                $info =  PlayedPlModel::get(['id'=>$params['id']]);
                $playid = $info->played->id;
                $type = $info->played->type;
                $groupid = $info->played->playedgroup->id;
                $plgroupid = $info->plgroup->id;
                $this->assign('playid',$playid); 
                $this->assign('typeinfo',$type);   
                $this->assign('groupid',$groupid); 
                $this->assign('plgroupid',$plgroupid); 
                $this->assign('info',$info);
            }
            $this->assign('types',TypeModel::TYPE_ARRAY);
            return view();
        }else{
            $id  =  !empty($params['id'])? $params['id']:'';
            if($id){
                $pl = PlayedPlModel::get(intval($id));     
            }else{
                $pl = new PlayedPlModel($params);
            }
            $list = $pl->validate('Lottery.pl')->save($params);
            if(!empty($list)){
                LogModel::log(LogModel::BUSINESS_TYPE_EDIT,$pl,LogModel::BUSINESS_TYPES[LogModel::BUSINESS_TYPE_EDIT]);
                return $this->success('操作成功');
            }else{
                return $this->error($pl->getError());
            }
        }
    }

    public function lottery_time(){
        $this->view->page_header = '开奖时间表';
        $types = TypeModel::allTypes();
        $params = request()->param();
        if(!isset($params['code'])){
            $params['code'] = 'cqssc';
        }
        $this->assign('types',$types);
        if($params['code']=="xg6hc"){
            $model = model('LhcTime');
        }else{
            $model = model('LotteryTime');
        }
        $list = $model->getList($params);
        $this->assign('code',$params['code']);
        $this->assign('list',$list);
        return $this->fetch();
    }

    public  function lottery_time_edit(){  
        $request = request();
        $params = $request->param();
        if(request()->isGet()){
           if($params['id']??''){
                if(isset($params['code']) && $params['code']=="xg6hc"){
                    $model = model('LhcTime');
                }else{
                    $model = model('LotteryTime');
                }
                $info =  $model->get(['id'=>$params['id']]);
                $this->assign('info',$info);  
            }
            $this->assign('types',TypeModel::allTypes());
            return view();     
        }else{
            $id =  !empty($params['id'])? $params['id']:'';
            if($id){
                if(isset($params['code']) && $params['code']=='xg6hc'){
                    $time = LhcTime::get(intval($id));
                }else{
                    $time = LotteryTime::get(intval($id));
                }
            }else{
                if(isset($params['code']) && $params['code']=='xg6hc'){
                    $time = new LhcTime($params);
                }else{
                    $time = new LotteryTime($params);
                }
            }
            $list = $time->validate('Lottery.time')->save($params);
            if($list){
                LogModel::log(LogModel::BUSINESS_TYPE_EDIT,$time,LogModel::BUSINESS_TYPES[LogModel::BUSINESS_TYPE_EDIT]);
                return $this->success('操作成功');
            }else{
                return $this->error($time->getError());
            }
        }
       
    }
    public function lottery_data(){
        $types = TypeModel::allTypes();
        $this->assign('types',$types);
        $params = request()->param();
        if(!isset($params['code'])){
            $params['code'] = 'cqssc';
        }
        $list = LotteryData::getList($params);
        $this->assign('list',$list);
        $this->assign('code',$params['code']);
        $this->view->page_header = '开奖结果';
        return $this->fetch();        
    }

    public  function lottery_data_edit(){  
        $request = request();
        $params = $request->param();

        if(request()->isGet()){
            if(!empty($params['id'])){
                $info =  LotteryData::get(['id'=>$params['id']]);
                $this->assign('info',$info);  
            }
            $this->assign('code', $params['code']);
            $this->assign('types',TypeModel::allTypes());
            return view();
        }else{
            $id    =  !empty($params['id'])? $params['id']:'';
            if (!$this->validate($params,'Lottery.lottery_data')) {
                return false;
            }
            if($id){
                $lottery_data = LotteryData::get(intval($id));  
                $ret = $lottery_data->save($params);
                //重结算
                $ret = $lottery_data->resettlement();
            }else{
                //$lottery_data = new LotteryData($params);
                $lottery_data = LotteryData::create($params);
                //结算
                //event(new LotteryEvent($lottery_data));
                //$listener = new LotteryListener();
                //$ret = $listener->onAction(new LotteryEvent($lottery_data));
                $ret = $lottery_data->settlement();
            }
            if($ret===false){
                LogModel::log(LogModel::BUSINESS_TYPE_EDIT,$lottery_data,LogModel::BUSINESS_TYPES[LogModel::BUSINESS_TYPE_EDIT]);
                return $this->success('操作成功');
            }else{
                return $this->error($lottery_data->getError());
            }
        }
    } 

    public function getGroupByid(){
        $request        =   request();
        $params         =   $request->param();
        $type           =  !empty($params['type'])? $params['type']:'';
        $info           =   TypeModel::get(['type'=>intval($type)]);
        $grouplist      =   $info->groups->toArray();
        if($grouplist){
            echo json_encode($grouplist);
        }
            
    }

    public function getPlayedByid(){
        $request        =   request();
        $params         =   $request->param();
        $groupId        =  !empty($params['groupId'])? $params['groupId']:'';
        $info           =   PlayedGroupModel::get($groupId);
        $playedlist     =   $info->playeds->toArray();
        if($playedlist){
            echo json_encode($playedlist);
        }
            
    } 

    public function getPlgroupByid(){
        $request        =   request();
        $params         =   $request->param();
        $playId         =  !empty($params['playedId'])? $params['playedId']:'';
        $info           =   PlayedModel::get($playId);
        $playedlist     =   $info->plgroups;
        if(!$playedlist->isEmpty()){
            $playedlist = $playedlist->toArray();
        }
       
        if($playedlist){
            echo json_encode($playedlist);
        }
            
    }  
}