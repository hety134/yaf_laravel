<?php

/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2018/5/15
 * Time: 14:43
 */
class Bootstrap extends Yaf_Bootstrap_Abstract
{
    private $_config;

    /**
     * 配置
     */
    public function _initConfig()
    {
        $config = Yaf_Application::app()->getConfig();
        $this->_config = Yaf_Application::app()->getConfig();
        Yaf_Registry::set("config", $config);
        Yaf_Dispatcher::getInstance()->disableView();//关闭框架子自带视图模板输出
    }

    /**
     * 加载vendor下的文件
     */
    public function _initLoader()
    {
        Yaf_Loader::import(APP_PATH . '/vendor/autoload.php');
    }

    /**
     * 初始化数据库分发器
     * @function _initDefaultDbAdapter
     * @author   jsyzchenchen@gmail.com
     */
    public function _initDefaultDbAdapter()
    {
        //初始化 illuminate/database
        $capsule = new \Illuminate\Database\Capsule\Manager();
        $capsule->addConnection(
            Yaf_Application::app()->getConfig()->database->toArray()
        );
        $capsule->setEventDispatcher(new \Illuminate\Events\Dispatcher(new \Illuminate\Container\Container()));
        $capsule->setAsGlobal();
        //开启Eloquent ORM
        $capsule->bootEloquent();
        class_alias('\Illuminate\Database\Capsule\Manager', 'DB');
    }

    public function _initRoute(Yaf_Dispatcher $dispatcher)
    {
        //在这里注册自己的路由协议,默认使用简单路由
    }

    public function _initView(Yaf_Dispatcher $dispatcher)
    {
        //在这里注册自己的view控制器，例如smarty,firekylin
        //$dispatcher->setView(new View(null));
    }

    public function _initPlugin(Yaf_Dispatcher $dispatcher)
    {
        $user = new UserPlugin();
        $dispatcher->registerPlugin($user);
    }

    /**
     * [错误处理]
     * @return [type] [description]
     */
    public function _initErrors()
    {
        //报错是否开启
        if ($this->_config->application->showErrors) {
            error_reporting(-1);
            ini_set('display_errors', 'On');
        } else {
            error_reporting(0);
            ini_set('display_errors', 'Off');
        }
        set_error_handler(['Error', 'errorHandler']);
    }

    /**
     * layout页面布局
     */
    public function _initLayout(Yaf_Dispatcher $dispatcher)
    {
        Yaf_Registry::set('dispatcher', $dispatcher);
    }

    public function _initDefaultName(Yaf_Dispatcher $dispatcher)
    {
        $dispatcher->setDefaultModule("Index")->setDefaultController("Index")->setDefaultAction("index");
    }

}