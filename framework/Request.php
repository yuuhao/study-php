<?php
/**
 * Created by yuuhao bigyuhao@163.com.
 * User: yuhao
 * Date: 2018/11/8
 * Time: 17:26
 */

namespace Framework;



/**
 * 请求类，
 * 作用获得请求参数功能
 *
*/
class Request
{
    /**
     * 构造函数
     * 设置环境，请求参数
     *
     * @param App $app 框架实例
    */
    public function __construct(App $app)
    {

        $this->serverParams = $_SERVER;


        //$this->loadEnv($app);
    }

    public function get(){

    }
}