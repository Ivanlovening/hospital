<?php


namespace Admin\Controller;


/**
 * 用户数据控制器
 */
class DealerController extends BaseController {
    function __construct()
    {
        parent::__construct();
    }
    public function index(){
        $member = D('Dealer');
        $result = $member->getPage($member, "");
        $this->data = $result['data'];
        $this->page = $result['page'];
        //dump($result);exit;
        if ( IS_AJAX ) {
            $this->ajaxReturn($result);
            exit;
        }
        $this->display();
    }

    public function add() {
        if( IS_GET ) {
            $this->display();
        }else{
            $dealer = D("Dealer"); // 实例化User对象
            if (!$dealer->create()){
                // 如果创建失败 表示验证没有通过 输出错误提示信息
                echo $dealer->getErrorStr();
            }else{
                // 验证通过 可以进行其他数据操作
                if( $dealer->add() ){
                    echo '1';
                }else{
                    echo "0";
                }
            }
        }
    }

    public function edit(){
        if(IS_GET) {
            $where['id'] = I('get.id', '', '/^\d{1,6}$/');
            $this->data = M('Dealer')->where($where)->find();
            $this->display();
        }else{
            $dealer = D("Dealer"); // 实例化User对象
            if (!$dealer->create()){
                // 如果创建失败 表示验证没有通过 输出错误提示信息
                echo $dealer->getErrorStr();
            }else{
                // 验证通过 可以进行其他数据操作
                if( $dealer->save() ){
                    echo '1';
                }else{
                    echo "0";
                }
            }
        }
    }

    public function del(){
        $where['id'] = I('get.id', '', '/^\d{1,6}$/');
        if( M('Dealer')->where($where)->delete() ){
            $this->success('删除成功', U('Admin/Dealer/index'));
        }else{
            $this->error('删除不成功');
        }
    }
}