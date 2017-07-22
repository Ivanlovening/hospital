<?php
function sidebar(){
    $data=D('Nav')->getTreeData('level','order_number,id');
    return $data;
}


/**
 * 系统非常规MD5加密方法
 * @param  string $str 要加密的字符串
 * @param string $key
 * @return string
 */
function think_md5($str, $key = 'BlueDoorIndex'){
    return '' === $str ? '' : md5(sha1($str) . $key);
}



/**
 * 实例化page类
 * @param  integer  $count 总数?
 * @param  integer  $limit 每页数量
 * @return subject       page类
 */
function new_page($count,$limit=10){
    return new \Org\Nx\Page($count,$limit);
}



