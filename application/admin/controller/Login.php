<?php
namespace app\admin\controller;
use think\Controller;
use think\Request;
use think\Db;
use think\Session;

class Login extends Controller
{
    public function login() {
        $admin = session('intranet.admin');
        if(!empty($admin)) {
            $this->redirect('Index/index');
            exit;
        }
        return $this->fetch();
    }
    
    public function dologin() {
        $param = input('post.');
        
        $code=input('code');
		if(!captcha_check($code))
		{
            $this->error('验证码错误', 'Login/login');
            exit;
		}
        
        $Admin = new \app\admin\model\Admin();
        $arr = array(
            'user_name'=>$param['name']
        );
        $user_name = $Admin->where($arr)->find();
        if($user_name) {
            $arr['password'] = $this->password($param['password'],$user_name['code']);
            $pass = $Admin->where($arr)->find();
            if($pass) {
                session('intranet.admin',$pass);
                $this->success('登录成功', 'Index/index');
            } else {
                $this->error('账户或密码错误', 'Login/login');
                exit;
            }
        } else {
            $this->error('账户或密码错误', 'Login/login');
            exit;
        }
        
    }
    
    public function password($pass,$code) {
        return md5($pass.$code);
    }
    
    public function login_out() {
        session(null);
        $admin = session('intranet.admin');
        if(empty($admin)) {
            $this->success('退出成功', 'Login/login');
        } else {
            $this->error('退出失败', 'Index/index'); 
        }
    }
}
