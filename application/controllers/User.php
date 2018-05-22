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
}