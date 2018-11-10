<?php
/**
 * Created by yuuhao bigyuhao@163.com.
 * User: yuhao
 * Date: 2018/11/8
 * Time: 17:14
 */

namespace Framework;


use Framework\CoreHttpException\CoreHttpException;

class Container
{

    private $instanceMap = [];

    /**
     * 注入一个单例类
     * inject a signle class
     * @param string $alias 类别名或者类名
     * @param sting|object|callable $object 实例，闭包，类名
     * @return object
    */
    public function setSingle($alias = '',$object = ''){

        if(is_callable($object)){
            if(empty($alias)){
                throw new CoreHttpException($alias.'is empty');
            }
            if(!array_key_exists($alias,$this->instanceMap)){
                $this->instanceMap[$alias] = $object();
            }
            return $this->instanceMap[$alias];
        }

        if(is_object($object)){

        }

    }

    public function getSingle($alias){
        if(array_key_exists($alias,$this->instanceMap)){
            return $this->instanceMap[$alias];
        }
    }
}