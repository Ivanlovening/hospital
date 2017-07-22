<?php


namespace Admin\Controller;


/**
 * 用户数据控制器
 */
class UserController extends BaseController {


    function __construct()
    {
        parent::__construct();
    }

    public function index(){
        echo 1;exit;
        $member = D('Member');
        $result = $member->getPage($member, "");
        $this->data = $result['data'];
        $this->page = $result['page'];
        if ( IS_AJAX ) {
            $this->ajaxReturn($result);
            exit;
        }
        $this->display();
    }

    public function delete(){
        $where['id'] = I('get.id');
        $where['status'] = "0";
        if ( D('Member')->save($where) ){
            $this->success("删除成功", U('Home/Member/index'));
        }else{
            $this->error("删除不成功");
        }
    }

    public function level(){
        $memberLevel = D('MemberLevel');
        $result = $memberLevel->getPage($memberLevel, "");
        $this->data = $result['data'];
        $this->page = $result['page'];
        if ( IS_AJAX ) {
            $this->ajaxReturn($result);
            exit;
        }
        $this->display();
    }
}