<?php

/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2018/5/15
 * Time: 11:08
 */
class IndexController extends Yaf_Controller_Abstract
{
    public function indexAction(){
        //$this->getView()->assign("content","hello Yaf");
        Yaf_Dispatcher::getInstance()->disableView();
        echo BladeView::view('index.index',['content'=>'hello Yaf']);
    }

    public function showAction(){
        echo "index show";
    }

}