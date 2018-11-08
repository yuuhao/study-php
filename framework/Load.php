<?php
/**
 * Created by yuuhao bigyuhao@163.com.
 * User: yuhao
 * Date: 2018/11/8
 * Time: 16:51
 */

namespace Framework;

use Framework\App;

/**
 * 注册加载handle
*/
class Load
{
    /**
     * 类名映射
     * @var array
    */
    public static $map = [];
    /**
     * 类名空间映射
     * @var array
    */
    public static $namespaceMap = [];

    /**
     * 应用启动注册
     * @params App
     * @return mixed
    */
    public static function register(App $app){
        spl_autoload_register([Load::class,'autoload']);
    }

    /**
     * 自加载函数
    */
    public static function autoload($class){

        $class = str_replace("\\",DIRECTORY_SEPARATOR,lcfirst($class));

        $classFile = __DIR__.'/../'.$class.'.php';  

        if(file_exists($classFile)){
            require $classFile;
        }
    }
}