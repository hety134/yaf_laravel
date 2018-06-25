<?php

use library\Base\Controller_Base;
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2018-06-25
 * Time: 10:12
 */
class AdminController extends Controller_Base
{
    private $_layout;

    public function init()
    {

        parent::init();
        //使用layout页面布局
        $this->_layout = new LayoutPlugin('layout.html', APP_PATH . '/views/layout/');
        $this->dispatcher = Yaf_Registry::get("dispatcher");
        $this->dispatcher->registerPlugin($this->_layout);
    }

    public function IndexAction()
    {
        //throw new \Exception("错误信息",1000);
        $this->_layout->admin = true;
    }

}