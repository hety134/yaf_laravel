<?php
require_once __DIR__.'/libs/Smarty.class.php';
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2018/5/24
 * Time: 10:47
 */
class SmartyView
{
    protected $smarty;

    public function __construct()
    {
        $smarty = new Smarty();
        $this->smarty = $smarty;
        $this->smarty->setTemplateDir(APP_PATH.'/application/templates/');
        $this->smarty->setCompileDir(APP_PATH.'/application/templates_c/');
        $this->smarty->setConfigDir(APP_PATH.'/conf/');
        $this->smarty->setCacheDir(APP_PATH.'/application/cache/');
    }

    public function assign($key,$value){

        return $this->smarty->assign($key,$value);
    }

    public function display($tpl){
        return $this->smarty->display($tpl);
    }
}