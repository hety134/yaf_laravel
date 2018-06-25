<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2018/5/15
 * Time: 10:50
 */
define('APP_ROOT', dirname(__DIR__));
define("APP_PATH",  realpath(dirname(__FILE__) . '/../')); /* 指向public的上一级 */
define("APP_CONFIG", APP_PATH.'/conf');
error_reporting(E_ALL);
//定义全局library
ini_set('yaf.library', APP_PATH.'/library');
$app  = new Yaf_Application(APP_CONFIG . "/application.ini");
$app->bootstrap()->run();