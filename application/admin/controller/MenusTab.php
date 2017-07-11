<?php

namespace app\admin\controller;

use think\Controller;
use think\Request;
use think\Db;
use think\Session;
use app\admin\model\Admin;

class MenusTab extends Bases {

    public $tmodel = '';

    public function _initialize() {
        parent::_initialize();
        $this->tmodel = model('MenuTab');
    }

    protected function admin_table() {
        $arr = array(
            'ht_admin',
            'ht_admin_log',
            'ht_info',
            'ht_menu',
            'ht_menu_tab',
            'ht_menu_tab_field',
        );
        return $arr;
    }

    public function get_table_fields($tablename) {
        $arr_t = array(
            'table' => $tablename
        );
        $table_fields = $this->tmodel->getTableFields($arr_t); //获取对应表字段
        return $table_fields;
    }

    public function get_db_tables() {
        $table_lists = Db::query("show tables"); //获取数据库表
        //数据库前
        $db_front_html = 'Tables_in_public_auto_houtai';
        $this->assign('db_front_html', $db_front_html);
        //过滤掉保留数据表
        $admin_table = $this->admin_table();
        foreach ($table_lists as $key => $value) {
            foreach ($value as $k1 => $v1) {
                if (in_array($v1, $admin_table)) {
                    unset($table_lists[$key]);
                }
            }
        }
        sort($table_lists);
        return $table_lists;
    }

    public function lists() {
        $menu_id = input('param.menu_id');
        $tab_id = input('param.tab_id');
        $this->assign('menu_id', $menu_id);

        $arr = array(
            'menu_id' => $menu_id
        );

        $lists = $this->tmodel->get_lists($arr);
        $this->assign('lists', $lists);

        $tab_detail = array();
        if (empty($tab_id) && $lists) {
            $tab_id = $lists[0]['tab_id'];
            $tab_detail = $lists[0];
        } else {
            $arrt_detail = array(
                'menu_id' => $menu_id,
                'tab_id' => $tab_id
            );
            $tab_detail = $this->tmodel->sfind($arrt_detail);
        }
        $this->assign('tab_id', $tab_id);
        $this->assign('tab_detail', $tab_detail);

        $mtf_model = model('MenuTabField');
        $mtf_arr = array(
            'menu_id' => $menu_id,
            'tab_id' => $tab_id
        );
        $mtf_list = $mtf_model->get_lists($mtf_arr);
        $this->assign('mtf_list', $mtf_list);

        $table_fields = $this->get_table_fields($tab_detail['tab_tablename']); //获取对应表字段
        $this->assign('table_fields', $table_fields);

        $table_lists = $this->get_db_tables();
        $this->assign('table_lists', $table_lists);

        //公共插件方法
        $field_type = all_field_type();
        $field_type_v = $field_type['v'];
        $this->assign('field_type_v', $field_type_v);

        $select_field_type = select_field_type();
        $select_field_type_v = $select_field_type['v'];
        $this->assign('select_field_type_v', $select_field_type_v);

        $noselect_field_type = noselect_field_type();
        $noselect_field_type_v = $noselect_field_type['v'];
        $this->assign('noselect_field_type_v', $noselect_field_type_v);

        $tbf_empty = tbf_empty();
        $tbf_empty_v = $tbf_empty['v'];
        $this->assign('tbf_empty_v', $tbf_empty_v);

        $tbf_show = tbf_show();
        $tbf_show_v = $tbf_show['v'];
        $this->assign('tbf_show_v', $tbf_show_v);

        //widget
        $base_widget = base_widget();
        $this->assign('base_widget', $base_widget);
        //dump($lists);

        return $this->fetch();
    }

    public function save() {
        $param = input('post.');
        $ssave = $this->tmodel->ssave($param);
        if ($ssave) {
            $this->success('提交成功', url('MenusTab/lists', array('menu_id' => $param['menu_id'], 'tab_id' => $param['tab_id'])), 3);
        } else {
            $this->error('提交失败', url('MenusTab/lists', array('menu_id' => $param['menu_id'])), 3);
        }
    }

    public function sdelete() {
        $param = input('param.');
        $destroy = $this->tmodel->destroy($param['tab_id']);
        //同时删除对应字段
        $MenuTabField = model('MenuTabField');
        $MenuTabField->destroy(['tab_id' => $param['tab_id']]);
        //dump($destroy);exit;
        $this->success('删除成功', url('MenusTab/lists', array('menu_id' => $param['menu_id'])), 3);
    }

    public function sdeletes() {
        $param = input('param.');
        $destroy = $this->tmodel->destroy($param['tab_id']);
        //同时删除对应字段
        $MenuTabField = model('MenuTabField');
        foreach ($param['tab_id'] as $key => $value) {
            $MenuTabField->destroy(['tab_id' => $value]);
        }
        //dump($destroy);exit;
        $this->success('删除成功', url('MenusTab/lists', array('menu_id' => $param['menu_id'])), 3);
    }

}
