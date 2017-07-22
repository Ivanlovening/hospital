<?php
// +----------------------------------------------------------------------
// | OneThink [ WE CAN DO IT JUST THINK IT ]
// +----------------------------------------------------------------------
// | Copyright (c) 2013 http://www.onethink.cn All rights reserved.
// +----------------------------------------------------------------------
// | Author: 麦当苗儿 <zuojiazi@vip.qq.com> <http://www.thinkphp.cn>
// +----------------------------------------------------------------------

/**
 * 前台配置文件
 * 所有除开系统级别的前台配置
 */
return array(

    //开启路由
/*    'URL_ROUTER_ON'   => true,
    'URL_ROUTE_RULES'=>array(
        //'admin' =>'Admin/Index/index',
        'login'   => 'Home/User/login',
        'signUp' =>'Home/User/signUp',
        'forget'    =>'Home/User/forget'
    ),*/
    //加载配置文件
    'LOAD_EXT_CONFIG'=>'login_config',
    'UC_AUTH_KEY' => '3sh._p0A7tCS$4ir]*g|"Ik9@W{UE+elLnV&ZNF<', //加密KEY

);
