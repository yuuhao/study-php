<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/11/10 0010
 * Time: 上午 11:13
 */

namespace Framework\Handle;


use Framework\App;

interface Handle
{

    public function register(App $app);
}