<?php
use Jenssegers\Blade\Blade;
/**
 * blade视图
 * Created by PhpStorm.
 * User: admin
 * Date: 2018/5/22
 * Time: 15:44
 */
class BladeView
{
    public static function view($file,$data=[]){
        $blade = new Blade(APP_PATH.'/application/views/',APP_PATH.'/application/cache/');
        return $blade->make($file,$data);
    }
}