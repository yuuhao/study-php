<?php
/**
 * Created by yuuhao bigyuhao@163.com.
 * User: yuhao
 * Date: 2018/11/9
 * Time: 9:37
 */

namespace Framework;


class Response
{
    public function __construct()
    {

    }

    /**
     * web响应
    */
    public function response($responseData){
        header('Content-Type:Application/json; Charset=utf-8');
        die(json_encode($responseData,JSON_UNESCAPED_UNICODE));
    }

    /**
     * cli 响应
    */
    public function cliModeSuccess($responseData){

    }
}