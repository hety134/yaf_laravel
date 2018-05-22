<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2018/5/15
 * Time: 10:50
 */
define("APP_PATH",  realpath(dirname(__FILE__) . '/../')); /* 指向public的上一级 */
error_reporting(E_ALL);
$app  = new Yaf_Application(APP_PATH . "/conf/application.ini");
$app->bootstrap()->run();