<?php

namespace app\admin\controller;

use think\Controller;
use think\Request;
use think\Db;
use think\Session;
use app\admin\model\Admin;

class Menus extends Bases {

    public $tmodel = '';

    public function _initialize() {
        parent::_initialize();
        $this->tmodel = model('Menu');
    }

    public function lists() {
        $lists = $this->tmodel->get_all_lists();
        //dump($lists);
        $this->assign('lists', $lists);
        return $this->fetch();
    }

    public function save() {
        $param = input('post.');
        //dump($param);exit;
        $ssave = $this->tmodel->ssave($param);
        if ($ssave) {
            $this->success('提交成功', 'Menus/lists', 3);
        } else {
            $this->error('提交失败', 'Menus/lists', 3);
        }
    }

    public function sdelete() {
        $param = input('param.');
        $destroy = $this->tmodel->destroy($param['id']);
        //同时删除对应字段
        $MenuTabField = model('MenuTabField');
        $MenuTabField->destroy(['menu_id' => $param['id']]);
        //dump($destroy);exit;
        $this->success('删除成功', 'Menus/lists', 3);
    }

    public function sdeletes() {
        $id_arr = input('post.');
        //dump($id_arr);exit;
        $Admin = new \app\admin\model\Admin();
        $destroy = $Admin->destroy($id_arr['id']);
        //同时删除对应字段
        $MenuTabField = model('MenuTabField');
        foreach ($id_arr['id'] as $key => $value) {
            $MenuTabField->destroy(['menu_id' => $value]);
        }
        //dump($destroy);exit;
        $this->success('删除成功', 'Menus/lists', 3);
    }

}
