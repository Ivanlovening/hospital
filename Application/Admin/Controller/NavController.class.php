<?php
namespace Admin\Controller;
/**
 * 后台菜单管理
 */
class NavController extends BaseController{
	/**
	 * 菜单列表
	 */
	public function index(){

		$data=D('Nav')->getTreeData('tree','order_number,id');

		$assign=array(
			'data'=>$data
			);
		$this->assign($assign);
		$this->display();
	}

	/**
	 * 添加菜单
	 */
	public function add(){
		$data=I('post.');
		if( !$data['name'] || !$data['url'] ) $this->error('添加不成功',U('index'));
		unset($data['id']);
		D('Nav')->addData($data);
		$this->success('添加成功',U('index'));
	}

	/**
	 * 修改菜单
	 */
	public function edit(){
		$data=I('post.');
		$map=array(
			'id'=>$data['id']
			);
		D('Nav')->editData($map,$data);
		$this->success('修改成功',U('index'));
	}

	/**
	 * 删除菜单
	 */
	public function delete(){
		$id=I('get.id');
		$map=array(
			'id'=>$id
			);
		$result=D('Nav')->deleteData($map);
		if($result){
			$this->success('删除成功',U('index'));
		}else{
			$this->error('请先删除子菜单');
		}
	}

	/**
	 * 菜单排序
	 */
	public function order(){
		$data=I('post.');
		D('Nav')->orderData($data);
		$this->success('排序成功',U('index'));
	}


    public function text(){
        $_SESSION['user']['id']=1;
        $data=D('Nav')->getTreeData('level','order_number,id');
        dump($data);
    }


}
