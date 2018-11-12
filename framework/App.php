<?php
/**
 * Created by yuuhao bigyuhao@163.com.
 * User: yuhao
 * Date: 2018/11/8
 * Time: 16:38
 */

namespace Framework;

use Framework\Container;
/**
 * Application
 * 框架应用类
*/

class App
{
    /**
     * 框架实例根目录
     * @return string
    */
    private $rootPath;

    /**
     * 应用运行模式
     * @return boolean
    */
    private $isCli;

    private $handlesList = [];

    /**
     * 容器实例
    */
    private static $container;

    /**
     * 响应对象
     * @var string
    */
    private $responseData;


    /**
     * App constructor.
     * @param $rootPath
     * @param \Closure $loader
     */
    public function __construct($rootPath, \Closure $loader)
    {
        //cli模式
        $this->isCli = getenv('IS_CLI');
        /** @var TYPE_NAME $this */
        $this->rootPath = $rootPath;
        $loader();
        Load::register($this);
        static::$container = new Container();
    }

    /**
     * 注册框架运行过程中一系列处理类
    */
    public function load(\Closure $handle){
        $this->handlesList[] = $handle;
    }
    /**
     * 运行应用
     * 将加载的模块放入容器的变量中
     *
    */
    public function run(\Closure $request){
        self::$container->setSingle('request',$request);

        foreach ($this->handlesList as $handle){
            $instance = $handle();
            self::$container->setSingle(get_class($instance),$instance);
            $instance->register($this);
        }
    }

    public function response(\Closure $closure){

        if($this->isCli === 'yes'){
            $closure()->cliModeSuccess($this->responseData);
            return;
        }

//        $useReset = self::$container->getSingle('config')->config['rest_response'];
//        if($useReset){
//            $closure()->restSuccess($this->responseData);
//        }

        $closure()->response($this->responseData);
    }
}

