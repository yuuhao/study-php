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
use Framework\CoreHttpException\CoreHttpException;

try {

    $app = new Framework\App(__DIR__ . '/../', function () {
        return require(__DIR__ . '/Load.php');
    });


//-----------------------------------------------------------------------//
//                              START APP                                //
//-----------------------------------------------------------------------//

    /**
     * 启动应用
     */
    $app->run(function ()use($app) {
        return new Request($app);
    });

    /**
     * 响应结果
     * END
    */
    $app->response();

}catch (CoreHttpException $e){
    /**
     * 捕获异常
    */
    $e->response();
}