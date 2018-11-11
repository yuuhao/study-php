<?php
/**
 * Created by yuuhao bigyuhao@163.com.
 * User: yuhao
 * Date: 2018/11/8
 * Time: 17:06
 */

namespace Framework\CoreException;


class CoreHttpException extends \Exception
{

    public function response(){
        var_dump($this->getMessage());
    }
}