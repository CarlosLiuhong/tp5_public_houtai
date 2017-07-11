<?php

namespace app\admin\controller;

use think\Controller;
use think\Request;
use think\Db;
use think\Session;
use think\Url;
use app\admin\model\Info;

class Index extends Bases {

    public function index() {
        $admin = session('intranet.admin');
        $id = $admin['id'];
        $this->assign('id', $id);

        //获取menu数据
        $menu = model('Menu');
        $menu_list = $menu->get_all_lists();
        //dump($menu_list);
        $this->assign('menu_list', $menu_list);
        return $this->fetch();
    }

    public function emptys() {
        return $this->fetch();
    }

    public function info() {
        $info = new \app\admin\model\Info();
        $select = $info->select();
        $list = $info->show_list($select);
        //dump($list);
        $this->assign('list', $list);
        return $this->fetch();
    }

    public function doinfo() {
        $post = input('post.');
        //dump($post);
        if (!empty($_FILES['slogo']['name'])) {
            $Publics = new \app\admin\controller\Publics();
            $key = 'slogo';
            $upload = $Publics->upload_one($key, './uploads/logo/');
            $post[$key] = $upload['name'];
        }

        $info = new \app\admin\model\Info();
        $info->ssave_all($post);

        $this->success('修改完成', 'Index/info', 3);
    }

    public function pass() {
        $Admin = new \app\admin\model\Admin();
        $session = Session::get('intranet.admin');
        $arr = array(
            'id' => $session['id']
        );
        $find = $Admin->find($arr);
        $this->assign('detail', $find);
        return $this->fetch();
    }

    public function dopass() {
        $post = input('post.');
        $Admin = new \app\admin\model\Admin();
        $session = Session::get('intranet.admin');
        $arr = array(
            'id' => $session['id']
        );
        $find = $Admin->find($arr);

        if ($find) {
            $Login = new \app\admin\controller\Login();
            $pass = $Login->password($post['mpass'], $find['code']);
            if ($find['password'] != $pass) {
                $this->error('原始秘密错误', 'Index/pass', 3);
                exit;
            }
            if (strlen($post['newpass']) < 5) {
                $this->error('新密码不能小于5位', 'Index/pass', 3);
                exit;
            }
            if ($post['newpass'] != $post['renewpass']) {
                $this->error('两次密码不一致', 'Index/pass', 3);
                exit;
            }

            $code = rand(100000, 999999);
            $newpass = $Login->password($post['newpass'], $code);
            $arr = array(
                'id' => $session['id'],
                'password' => $newpass,
                'code' => $code
            );
            $save = $Admin->ssave($arr);
            if ($save) {
                $this->success('密码修改完成，请重新登录', 'Login/login_out', 3);
            } else {
                $this->error('密码修改失败', 'Index/pass', 3);
            }
        } else {
            $this->error('查无此账户，请重新登录', 'Login/login_out', 3);
            exit;
        }
    }

}
