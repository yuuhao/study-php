<?php
/**
 * Created by yuuhao bigyuhao@163.com.
 * User: yuhao
 * Date: 2018/11/8
 * Time: 16:36
 */

/**
 * 引入框架文件
*/
require __DIR__.'/App.php';
use Framework\Request;
use Framework\Response;
use Framework\Handle\RouteHandle;
use Framework\CoreException\CoreHttpException;

try {

    $app = new Framework\App(__DIR__ . '/../', function () {
        return require(__DIR__ . '/Load.php');
    });


    /**
     * 注册加载模块
    */

    $app->load(function() use ($app){
        return new  RouteHandle($app);
    });


//-----------------------------------------------------------------------//
//                              START APP                                //
//-----------------------------------------------------------------------//
     /**
     * 启动应用
     */
    $app->run( function ()use($app) {
        return new Request($app);
    });




    ///???? 缺少处理请求模块？？？
    $app->load(function () {
        return new RouteHandle();
    });

    /**
     * 响应结果
     * END
    */
    $app->response(function (){
        return new Response();
    });


}catch (CoreHttpException $e){
    /**
     * 捕获异常
    */
    $e->response();
}

