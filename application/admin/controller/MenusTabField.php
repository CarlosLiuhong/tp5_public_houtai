<?php

namespace app\admin\controller;

use think\Controller;
use think\Request;
use think\Db;
use think\Session;
use app\admin\model\Admin;

class MenusTabField extends Bases {

    public $tmodel = '';

    public function _initialize() {
        parent::_initialize();
        $this->tmodel = model('MenuTabField');
    }

    public function save() {
        $param = input('param.');
        //dump($param);
        //exit;
        $ssave = $this->tmodel->ssave($param);
        if ($ssave) {
            $this->success('提交成功', url('MenusTab/lists', array('menu_id' => $param['menu_id'], 'tab_id' => $param['tab_id'])), 3);
        } else {
            $this->error('提交失败', url('MenusTab/lists', array('menu_id' => $param['menu_id'], 'tab_id' => $param['tab_id'])), 3);
        }
    }

    public function sdelete() {
        $param = input('param.');
        $destroy = $this->tmodel->destroy($param['tbf_id']);
        //dump($destroy);exit;
        $this->success('删除成功', url('MenusTab/lists', array('menu_id' => $param['menu_id'], 'tab_id' => $param['tab_id'])), 3);
    }

    public function sdeletes() {
        $param = input('param.');
        $destroy = $this->tmodel->destroy($param['tbf_id']);
        //dump($destroy);exit;
        $this->success('删除成功', url('MenusTab/lists', array('menu_id' => $param['menu_id'], 'tab_id' => $param['tab_id'])), 3);
    }

}
