<?php



namespace Admin\Controller;
use Think\Controller;

/**
 * 登陆控制器
 */
class LoginController extends Controller {
	
	protected $member ;
	
	//获得数据库操作错误
	public function getErrorStr()
	{
		return $this->member->getErrorStr();
	}
	
	public function __construct()
    {
        parent::__construct();
		$this->member = D('UcenterMember');
    }
	
	public function index(){	 
		$this->display();
	}
	
	public function registeruser(){	 
		$this->display();
	}
	
	public function modify()
	{	 		
		$uid = $_SESSION["shop"]["id"] ;
		$uname = $_SESSION["shop"]["name"];
		if(!$uid || !$uname)
		{	
			$this->index();
			return;
		}
		$this->assign('uid',$uid);
		$this->assign('uname',$uname);
		$this->display();
	}
	
	/**
	 * 更改管理员账号的密码
	 * @param null $password int 更改为相应的密码
	 */
    public function modify_password()
    {
		$oldpwd = $_POST['oldpwd'];  
		$newpwd = $_POST['newpwd'];  
		
		if(!isset($newpwd) || $newpwd == ''){			
			$this->error("请输入新密码");
			return;
		}
		
		if( strlen($newpwd) < 3 || strlen($newpwd) > 30 ){			
			$this->error("密码位数需在3位到30位之间");
			return;
		}
				
		$uid = $_SESSION["shop"]["id"] ;
		//$uid = $_SESSION['yftmaster_id'];
		if(!$uid)
		{	
			$this->error("请重新登陆");
			return ;
		}
		
		$ret = $this->reset_pwd($uid,$oldpwd,$newpwd);
		if($ret === false)
		{
			$this->error( $this->member->getErrorStr() );
			return ;
		}
		$this->success("修改成功");
    }	
	
	/**
	 * 注册申请账号
	 */
    public function register_request()
    {
		$username = $_POST['username'];  
		$pwd = $_POST['pwd']; 
		$email = $_POST['email'];  
		$phone = $_POST['phone'];  
		
		if(!isset($username) || $username == '' ){			
			$this->error("请输入账号");
			return;
		}
		
		if(!isset($pwd) || $pwd == '' ){			
			$this->error("请输入密码");
			return;
		}
		
		if( strlen($pwd) < 3 || strlen($pwd) > 30 ){			
			$this->error("密码位数需在3位到30位之间");
			return;
		}
		
		if(!isset($email) || $email == '' ){			
			$this->error("请输入email");
			return;
		}
		
		if( !preg_match("/^[a-zA-Z0-9_-]+@[a-zA-Z0-9_-]+(\.[a-zA-Z0-9_-]+)+$/",$email) ){			
			$this->error("email格式错误");
			return;
		}
		
		if(!isset($phone) || $phone == '' ){			
			//$this->error("请输入手机号码");
			//return;
			$phone = '';
		}else
		{			
			if( !preg_match("/^1[34578]{1}\d{9}$/",$phone) ){			
				$this->error("手机号格式错误");
				return;
			}	
		}	
				
		$ret = $this->register($username,$pwd,$email,$phone);
		if($ret <= 0)
		{
			$this->error( $this->getErrorStr() );
			return ;
		}
		$this->success("注册成功");
    }
	
	/**
	 * 登录验证
	 * @param $name string 名称
	 * @param $password string 密码
	 * @return mixed 返回查获询结果
	 */
	public function vertifyAccount($name,$password)
	{
        $master = D('master');
		
		$map['name'] = $name;
		$queryresult = $master->where($map)->find();
				
		if($queryresult)
		{
			if(	$queryresult['password'] == md5($password) )
			{				
				$retInfo['id'] =  $queryresult['masterid'];
				$retInfo['status'] = true;
				return $retInfo;
			}
			else
			{					
				$retInfo['info'] =  "密码错误";
				$retInfo['status'] = false;
				return $retInfo;
			}
		}else
		{
			$retInfo['info'] =  "用户名错误";
			$retInfo['status'] = false;
			return $retInfo;
		}			
	}
	
	/**
     * 注册一个新用户
     * @param  string $username 用户名
     * @param  string $password 用户密码
     * @param  string $email    用户邮箱
     * @param  string $mobile   用户手机号码
     * @return integer          注册成功-用户信息，注册失败-错误编号
     */
    public function register($username, $password, $email, $mobile = ''){
        return $this->member->register($username, $password, $email, $mobile);
    }

    /**
     * 用户登录认证
     * @param  string  $username 用户名
     * @param  string  $password 用户密码
     * @param  integer $type     用户名类型 （1-用户名，2-邮箱，3-手机，4-UID）
     * @return integer           登录成功-用户ID，登录失败-错误编号
     */
    public function login($username, $password, $type = 1){	
        return $this->member->login($username, $password, $type);
    }
	
	public function reset_pwd($uid, $password, $newpwd)
	{
		$data['password'] = think_ucenter_md5($newpwd, C('UC_AUTH_KEY'));
		return $this->member->updateUserFields($uid, $password, $data);
	}
		
	public function trylogin()
	{
		$name=$_POST['name'];  
		$password=$_POST['password'];  

        //判断用户名长度和密码
		if ( $name == "") {
			echo "请填写用户名";
		}elseif( strlen($name) < 4 ) {
			echo "用户名长度小于4";			
		}
		elseif($password == "") {
			echo "请填写密码";
		}  

		else {
			$uid = $this->login($name,$password);
			if($uid > 0 )  		  
			{
                $shop_id = $this->member->where(array('id'=>$uid))->getField('shop_id');
				$_SESSION["shop"]["id"] = $uid;
				$_SESSION["shop"]["name"] = $name;
                $_SESSION['shop']['shop_id'] = $shop_id;
				echo "验证成功！";  	  
			} 				   
			 else {				 
				$_SESSION["shop"]["id"] = null;
				$_SESSION["shop"]["name"] = null;
				switch($uid)
				{
					case -1:
						echo '用户不存在或被禁用';
						break;
					case -2:
						echo '密码错误';
						break;
					default:
						echo '未知错误';
						break;
				}
			 }
		}  		
	}
	
	
	/**
	 * 退出登陆
	 * @return mixed 返回查获询结果
	 */
	public function logout()
	{

		$_SESSION["shop"]["id"] = null;
		$_SESSION["shop"]["name"] = null;
		$this->redirect("Login/index");

	}

}
