<?php


/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2018/5/15
 * Time: 17:03
 */
class UserController extends Yaf_Controller_Abstract
{
    public function showAction(){

        //$msg = DB::table('users')->get();
        $msg = UsersModel::all();
        dd($msg);
        $log = new Logs();
        $log->alert('test');
    }

    public function testAction(){
        //Yaf_Dispatcher::getInstance()->disableView();
        echo BladeView::view('user.test',['name'=>'john1']);

    }

    public function smartyAction(){

        $smarty = new SmartyView();
        $smarty->display('smarty.tpl');
    }

    /**
     * curl
     */
    public function curlAction(){
        $client = new \GuzzleHttp\Client();
        $res = $client->request('GET', 'https://api.github.com/repos/guzzle/guzzle');
        dd($res->getStatusCode());
    }

    /**
     * redis
     */
    public function redisAction(){
        $config = Yaf_Application::app()->getConfig()->redis->toArray();
        $client = new \Predis\Client($config);
        $client->set('foo', 'bar');
        $value = $client->get('foo');
        dd($value);
    }

    public function productAction(){
        $pheanstalk = new \Pheanstalk\Pheanstalk('127.0.0.1','11300');
        $arr = [
            'test'=>'a2255',
            'hi'=>'b22255'
        ];
        // ----------------------------------------
        // producer (queues jobs)
        $pheanstalk
            ->useTube('first')
            ->put(json_encode($arr));
        dd($arr);
    }

    public function workerAction(){
        $pheanstalk = new \Pheanstalk\Pheanstalk('127.0.0.1','11300');
        // ----------------------------------------
        // worker (performs jobs)
        $job = $pheanstalk
            ->watch('first')
            ->ignore('default')
            ->reserve();

        echo $job->getData();
        $pheanstalk->delete($job);
        // ----------------------------------------
        // check server availability
        //$pheanstalk->getConnection()->isServiceListening();
        die;
    }
}