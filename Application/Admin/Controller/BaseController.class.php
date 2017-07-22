<?php
// +----------------------------------------------------------------------
// | OneThink [ WE CAN DO IT JUST THINK IT ]
// +----------------------------------------------------------------------
// | Copyright (c) 2013 http://www.onethink.cn All rights reserved.
// +----------------------------------------------------------------------
// | Author: 麦当苗儿 <zuojiazi@vip.qq.com> <http://www.zjzit.cn>
// +----------------------------------------------------------------------

namespace Admin\Controller;
use Think\Controller;
use Think\Auth;

/**
 * 前台公共控制器
 * 为防止多分组Controller名称冲突，公共Controller名称统一使用分组名称
 */
class BaseController extends Controller {
	private $auth;

    /* 空操作，用于输出404页面 */
	public function _empty(){
		$this->error("404：无效地址！");
	}


    protected function _initialize(){
        if( $_SESSION['shop']['id'] == null ){// 还没登录 跳转到登录页面
            $this->redirect('Login/index');
        }
		//dump($_SESSION);exit;

        $auth=new \Think\Auth();
        $rule_name=MODULE_NAME.'/'.CONTROLLER_NAME.'/'.ACTION_NAME;
        $result=$auth->check($rule_name,$_SESSION['shop']['shop_id']);
        //dump($result);exit;
        if($_SESSION['shop']['shop_id'] == 0 ) {

        }else{
            if(!$result){
               // echo 1;exit;
                $this->error('您没有权限访问');
            }
        }


    }


	/* 返回数据
	 *
	 * */
	public function generateData($code, $msg, $status, $value, $url=""){
		$response['code'] = $code;
		$response['msg'] = $msg;
		$response[$status] = $value;
		if( $url ) {
			$response['url'] = $url;
		}
		return $response;
	}

    /*
     *
     *
     * http://test.bluedoorindex.com/ctrip/Public/static/ueditor/php/upload/20170315/14895588561750.jpg
     * */
}

