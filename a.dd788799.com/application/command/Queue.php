<?php
namespace app\command;

use think\console\Command;
use think\console\Input;
use think\console\Output;

class Queue extends Command
{
    //php think queue:listener  admin_action,default  --once 
    //废弃,使用swoole-job替代 
    protected function configure(){
        $this->setName('queue:listener')->setDescription('执行-工作队列')
        ->addOption('once')->addArgument('queue');
    }

    protected function execute(Input $input, Output $output){
        $args = $input->getArguments();
        $queue = $args['queue']; //admin_action,default  
        if(is_null($queue)){
            $driver = config('queue.driver');
            $configs = config('queue.configs');
            $queue = $configs[$driver]['queue']??null;
            if(is_null($queue)){
                throw new \Exception('配置有误!');
            }
        }      

        $opt = $input->getOptions();
        if($opt['once']){
            $this->runNextJob($queue);
        }else{            
            $this->daemon($queue);
        }

    }   

    //添加选项once; 如果queue参数为空,默认所有队列;
    protected function daemon($queue){
        while(true){
            runNextJob($queue);
        }
    }

    
    protected function runNextJob($queue){
        $job = $this->getNextJob($queue);
        $job->fire();
    }

    protected function getNextJob($queue)
    {
        $queue_obj = container('queue');
        foreach (explode(',', $queue) as $queue) {
            if (! is_null($job = $queue_obj->pop($queue))) {
                return $job;
            }
        }
    }

}
