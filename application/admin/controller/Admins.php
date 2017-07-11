<?php
namespace app\admin\controller;
use think\Controller;
use think\Request;
use think\Db;
use think\Session;
use app\admin\model\Admin;

class Admins extends Bases
{
    public function lists()
    {
        $lists = Db::table('__ADMIN__ a')->field('a.id,a.user_name,a.create_time')->where(array())->order('a.create_time desc')->paginate(10);
        //dump($lists);
        $this->assign('lists', $lists);
        return $this->fetch();
    }
    
    public function edit() {
        $id = input('param.id');
        $Admin = new \app\admin\model\Admin();
        $arr = array(
            'id' => $id
        );
        $detail = $Admin->find($arr);
        $this->assign('detail', $detail);
        return $this->fetch();
    }
    
    public function save() {
        $param = input('post.');
        unset($param['ename']);
        
        if(strlen($param['password'])) {
            $code = rand(100000,999999);
            $param['code'] = $code;
            $param['password'] = md5($param['password'].$code);
            $param['create_time'] = time();
        }
        $Admin = new \app\admin\model\Admin();
        $ssave = $Admin->ssave($param);
        if($ssave) {
            $this->success('提交成功','Admins/lists',3);
        } else {
            $this->error('提交失败','Admins/lists',3);
        }
    }
    
    public function sdelete() {
        $id = input('param.id');
        $Admin = new \app\admin\model\Admin();
        $arr = array(
            'id' => $id
        );
        
        $destroy = $Admin->destroy($id);
        //dump($destroy);exit;
        $this->success('删除成功','Admins/lists',3);
    }
    
    public function sdeletes() {
        $id_arr = input('post.');
        //dump($id_arr);exit;
        $Admin = new \app\admin\model\Admin();
        $destroy = $Admin->destroy($id_arr['id']);
        //dump($destroy);exit;
        $this->success('删除成功','Admins/lists',3);
    }
    
    
}
