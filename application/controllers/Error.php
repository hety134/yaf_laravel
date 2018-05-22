<?php

/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2018/5/22
 * Time: 14:42
 */
class Error extends Yaf_Controller_Abstract
{
    public function errorAction() {
        $exception = $this->getRequest()->getException();
        try {
            throw $exception;
        } catch (Yaf_Exception_LoadFailed $e) {
            //加载失败
        } catch (Yaf_Exception $e) {
            //其他错误
        }
    }
}