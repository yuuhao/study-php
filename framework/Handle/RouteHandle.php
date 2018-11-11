<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/11/10 0010
 * Time: 上午 11:10
 */

namespace Framework\Handle;


use Framework\App;

class RouteHandle implements Handle
{
    private $SERVER;

    private $Controller;

    private $action;

    private $params;

    public function __construct()
    {
        $this->SERVER = $_SERVER;
    }

    /**
     * 路由注册方法
    */
    public function register(App $app){
         // 映射类
        $this->route();
    }

    private function route(){
        //解析路由
        if($this->SERVER['REQUEST_URI'] === '/'){
            $this->Controller = 'Home';
            $this->action = 'index';
        }elseif($n = strpos($this->SERVER['REQUEST_URI'],'?')){
            $query_parames = $_GET;

            $con = substr($this->SERVER['REQUEST_URI'],1,$n-1);

            print_r($query_parames);
            echo '----';
            print_r($con);die;
        }else{

        }
    }
}