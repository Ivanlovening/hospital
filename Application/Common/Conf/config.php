<?php
// +----------------------------------------------------------------------
// | OneThink [ WE CAN DO IT JUST THINK IT ]
// +----------------------------------------------------------------------
// | Copyright (c) 2013 http://www.onethink.cn All rights reserved.
// +----------------------------------------------------------------------
// | Author: 麦当苗儿 <zuojiazi@vip.qq.com> <http://www.zjzit.cn>
// +----------------------------------------------------------------------

/**
 * 系统配文件
 * 所有系统级别的配置
 */
return array(
	
    /* 数据库配置 */
    'DB_TYPE'               =>  'mysql',          // 数据库类型
    'DB_HOST'               =>  'localhost',      // 服务器地址(120.76.147.7)
    'DB_NAME'               =>  'hospital',       // 数据库名
    'DB_USER'               =>  'root',        // 数据库用户名
    'DB_PWD'                =>  'root',         // 数据库密码
    'DB_PORT'               =>  3306,            // 端口
    'DB_PREFIX'             =>  'hs_',             // 数据库表前缀
    'DEFAULT_FILTER'        =>  'trim,htmlspecialchars',    // 默认参数过滤方法 用于I函数...


);