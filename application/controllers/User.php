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

        echo BladeView::view('user.test',['name'=>'john1']);

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

    public function ptalkAction(){
        $pheanstalk = new \Pheanstalk\Pheanstalk('127.0.0.1');
        $pheanstalk
            ->useTube('testtube')
            ->put("job payload goes here\n");

// ----------------------------------------
// worker (performs jobs)

        $job = $pheanstalk
            ->watch('testtube')
            ->ignore('default')
            ->reserve();

        echo $job->getData();
        //$pheanstalk->delete($job);
        $pheanstalk->getConnection()->isServiceListening();
        die;
    }
}