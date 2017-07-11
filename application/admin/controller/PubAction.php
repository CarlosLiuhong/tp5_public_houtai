<?php

namespace app\admin\controller;

use think\Controller;
use think\Request;
use think\Db;
use think\Session;
use think\Url;
use app\admin\model\Info;

class PubAction extends Bases {

    public $admin;

    public function __construct() {
        parent::__construct();
        $this->admin = session('intranet.admin');
    }

    public function index() {
        $param = input('param.');
        if ($param['menu_id']) {
            $MenuTab = model('MenuTab');
            $arr = array(
                'menu_id' => $param['menu_id']
            );
            //获取tab列表
            $tab_list = $MenuTab->get_lists($arr);
            if (empty($tab_list)) {
                die('此模块暂无子内容');
            }
            $this->assign('tab_list', $tab_list);
            //当前tab信息
            $tab_arr = array();
            if (!isset($param['tab_id'])) {
                $tab_arr = $tab_list[0];
            } else {
                $arr = array(
                    'tab_id' => $param['tab_id']
                );
                $tab_arr = $MenuTab->sfind($arr);
            }
            if (empty($tab_arr)) {
                die('暂无子内容');
            }
            $this->assign("tab_arr", $tab_arr);

            $MenuTabField = model('MenuTabField');
            $arr = array(
                'tab_id' => $tab_arr['tab_id']
            );
            $tabfield = $MenuTabField->get_lists($arr);
            if (empty($tabfield)) {
                //echo '暂无展示字段';
            }
            //条件
            $where = "";
            $where .= "->where('pub.tab_id', 'eq','" . $tab_arr['tab_id'] . "')";
            //dump($where);
            //有设置对应数据 根据设定类型做展示
            //tab_show_type 1内容页 2列表页
            if ($tab_arr['tab_show_type'] == '1') {
                $this->pedit($tab_arr, $tabfield, $where);
                return $this->fetch('pedits');
            } else if ($tab_arr['tab_show_type'] == '2') {
                $this->plists($tab_arr, $tabfield, $where);
                return $this->fetch('plists');
            }
            exit;
        } else {
            die('缺少菜单名称');
        }
    }

    public function plists($tab_arr, $tabfield, $where = "") {
        //$prefix = config('database.prefix');
        //获取主键
        $pk = Db::getPk($tab_arr['tab_tablename']);
        //dump($primary_k);
        $widget_arr = array();

        $str = "use think\Db; return Db::table('" . $tab_arr['tab_tablename'] . "')";
        $str .= "->alias('pub')";
        $str_field = "->field('pub.*";
        $str_field2 = "";
        $join = "";

        $titles = array();

        foreach ($tabfield as $k => $v) {
            if ($v['is_title'] == '1') {
                //关联表
                if ($v['tbf_field_extension'] == '1') {
                    $join .= "->join('" . $v['tbf_table_in'] . "','" . $v['tbf_table_in'] . "." . $v['tbf_table_in_field'] . " = pub." . $v['tbf_field'] . "','LEFT')";
                    $str_field2 .= ", " . $v['tbf_table_in'] . "." . $v['tbf_table_in_field_show'] . " as " . $v['tbf_field'] . "_tname";
                }
                //关联组件
                else if ($v['tbf_field_extension'] == '2') {
                    $widget_arr[$v['tbf_field']] = $v['tbf_widget']();
                    $this->assign($v['tbf_field'] . '_widget', $widget_arr[$v['tbf_field']]);
                }
                //标题
                $titles[$v['tbf_field']] = $v['tbf_field_name'];
            }
        }
        $str_field .= $str_field2;
        $str_field .= "')";
        $str .= $str_field;
        $str .= $join;
        $str .= $where;
        $str .= "->paginate();";
        //dump($str);
        $lists = eval($str);
        //echo Db::getLastSql();
        //dump($lists);
        $this->assign("pk", $pk);
        $this->assign("titles", $titles);
        $this->assign($widget_arr);
        //dump($titles);
        $this->assign("titles_count", count($titles));
        $this->assign("lists", $lists);
        //dump($lists);
    }

    public function padd_data() {
        $param = input("param.");
        $MenuTab = model('MenuTab');

        $arr = array(
            'tab_id' => $param['tab_id']
        );
        $tab_arr = $MenuTab->sfind($arr);
        $this->assign("tab_arr", $tab_arr);
        $pk_name = Db::getPk($tab_arr['tab_tablename']);
        $MenuTabField = model('MenuTabField');
        $arr = array(
            'tab_id' => $tab_arr['tab_id']
        );
        $tabfield = $MenuTabField->get_lists($arr);

        //条件
        $where_arr = array();
        $where_arr['tab_id'] = $tab_arr['tab_id'];
        if (isset($param[$pk_name])) {
            $where_arr[$pk_name] = $param[$pk_name];
        }
        $where_str = " ";
        foreach ($where_arr as $k => $v) {
            //$where_str .= " and '" . $k . "'='" . $v . "'";
            $where_str .= "->where('pub." . $k . "', 'eq', '" . $v . "')";
        }
        //$where = "->where(" . $where_str . ")";
        //dump($where);
        $this->pedit($tab_arr, $tabfield, $where_str);
        //dump(111);
        return $this->fetch('padd_data');
    }

    public function pedits() {
        $param = input("param.");
        $MenuTab = model('MenuTab');

        $arr = array(
            'tab_id' => $param['tab_id']
        );
        $tab_arr = $MenuTab->sfind($arr);
        $this->assign("tab_arr", $tab_arr);
        $pk_name = Db::getPk($tab_arr['tab_tablename']);
        $MenuTabField = model('MenuTabField');
        $arr = array(
            'tab_id' => $tab_arr['tab_id']
        );
        $tabfield = $MenuTabField->get_lists($arr);

        //条件
        $where_arr = array();
        $where_arr['tab_id'] = $tab_arr['tab_id'];
        if (isset($param[$pk_name])) {
            $where_arr[$pk_name] = $param[$pk_name];
        }
        $where_str = " ";
        foreach ($where_arr as $k => $v) {
            //$where_str .= " and '" . $k . "'='" . $v . "'";
            $where_str .= "->where('pub." . $k . "', 'eq', '" . $v . "')";
        }
        //$where = "->where(" . $where_str . ")";
        //dump($where);
        $this->pedit($tab_arr, $tabfield, $where_str);
        return $this->fetch('pedits');
    }

    public function pedit($tab_arr, $tabfield, $where = "") {
        //获取主键
        $pk_name = Db::getPk($tab_arr['tab_tablename']);
        //dump($primary_k);
        $widget_arr = array();

        $str = "use think\Db; return Db::table('" . $tab_arr['tab_tablename'] . "')";
        $str .= "->alias('pub')";
        $str_field = "->field('pub.*";
        $str_field2 = "";
        $join = "";

        $titles = array();
        $out_table = array();
        foreach ($tabfield as $k => $v) {
            //关联表
            if ($v['tbf_field_extension'] == '1') {
                $join .= "->join('" . $v['tbf_table_in'] . "','" . $v['tbf_table_in'] . "." . $v['tbf_table_in_field'] . " = pub." . $v['tbf_field'] . "','LEFT')";
                $str_field2 .= ", " . $v['tbf_table_in'] . "." . $v['tbf_table_in_field_show'] . " as " . $v['tbf_field'] . "_tname";
                if (!isset($out_table[$v['tbf_table_in']])) {
                    $out_table[$v['tbf_table_in']] = Db::table($v['tbf_table_in'])
                            ->field($v['tbf_table_in_field'] . "," . $v['tbf_table_in_field_show'])
                            ->select();
                    //echo Db::getLastSql();
                }
            }
            //关联组件
            else if ($v['tbf_field_extension'] == '2') {
                $widget_arr[$v['tbf_field']] = $v['tbf_widget']();
                $this->assign($v['tbf_field'] . '_widget', $widget_arr[$v['tbf_field']]);
            }
            //标题
            //$titles[$v['tbf_field']] = $v['tbf_field_name'];
        }
        //dump($out_table);
        $str_field .= $str_field2;
        $str_field .= "')";
        $str .= $str_field;
        $str .= $join;
        $str .= $where;
        $str .= "->find();";
        //dump($str);
        $param = input('param.');
        if (isset($param[$pk_name])) {
            $detail = eval($str);
        } else {
            $detail = array();
        }
        //echo Db::getLastSql();
        //dump($detail);
        $this->assign("pk_name", $pk_name);
        //$this->assign("titles", $titles);
        $this->assign("tabfield", $tabfield);
        $this->assign("out_table", $out_table);
        $this->assign("widget_arr", $widget_arr);
        //dump($titles);
        //dump($tabfield);
        $this->assign("titles_count", count($titles));
        $this->assign("detail", $detail);
    }

    public function psave() {
        $param = input("param.");
        $tab_id = input("param.tab_id");
        //$tab_tablename = input("param.tab_tablename");
        //unset($param['tab_id']);
        //unset($param['tab_tablename']);
        if (empty($tab_id)) {
            die('缺少数据，保存失败');
        }

        $MenuTab = model('MenuTab');

        $arr = array(
            'tab_id' => $tab_id
        );
        $tab_arr = $MenuTab->sfind($arr);
        $pk_name = Db::getPk($tab_arr['tab_tablename']);

        $MenuTabField = model('MenuTabField');
        $arr = array(
            'tab_id' => $tab_id
        );
        $tabfield = $MenuTabField->get_lists($arr);
        $upload_list = array(
            'image', 'document'
        );
        $upload_key = array();
        foreach ($tabfield as $k => $v) {
            if (in_array($v['tbf_field_type'], $upload_list)) {
                $upload_key[] = $v['tbf_field'];
            }
        }
        if (count($upload_key)) {
            $Public = new \app\admin\controller\Publics();
            foreach ($upload_key as $k => $v) {
                if (!empty($_FILES[$v]['name'])) {
                    $up = $Public->upload_one($v, './uploads/');
                    if (!is_array($up)) {
                        die('上传失败，请重新上传');
                    }
                    $param[$v] = $up['name'];
                }
            }
        }

        //dump($param);
        //exit;
        $PubAction = model('PubActions');
        $save = $PubAction->psave($tab_arr['tab_tablename'], $pk_name, $param);
        //dump($save);
        if ($save) {
            $this->success('保存完成', url('PubAction/index', array('menu_id' => $tab_arr['menu_id'], 'tab_id' => $tab_arr['tab_id'])), 3);
        } else {
            $this->error('保存失败', url('PubAction/index', array('menu_id' => $tab_arr['menu_id'], 'tab_id' => $tab_arr['tab_id'])), 3);
        }
    }

    public function pdelete() {

        $param = input("param.");
        $tab_id = input("param.tab_id");
        if (empty($tab_id)) {
            die('缺少数据，删除失败');
        }

        $MenuTab = model('MenuTab');

        $arr = array(
            'tab_id' => $tab_id
        );
        $tab_arr = $MenuTab->sfind($arr);
        $pk_name = Db::getPk($tab_arr['tab_tablename']);

        $PubAction = model('PubActions');
        $arr = array();
        $arr[$pk_name] = $param[$pk_name];
        $delete = $PubAction->pdelete($tab_arr['tab_tablename'], $arr);
        if ($delete) {
            $this->success('删除成功', url('PubAction/index', array('menu_id' => $tab_arr['menu_id'], 'tab_id' => $tab_arr['tab_id'])), 3);
        } else {
            $this->success('删除失败', url('PubAction/index', array('menu_id' => $tab_arr['menu_id'], 'tab_id' => $tab_arr['tab_id'])), 3);
        }
    }

    public function pdeletes() {
        $param = input("param.");
        $tab_id = input("param.tab_id");
        if (empty($tab_id)) {
            die('缺少数据，删除失败');
        }
        $MenuTab = model('MenuTab');
        $arr = array(
            'tab_id' => $tab_id
        );
        $tab_arr = $MenuTab->sfind($arr);
        $pk_name = Db::getPk($tab_arr['tab_tablename']);

        $PubAction = model('PubActions');
        $arr = array();
        foreach ($param[$pk_name] as $k => $v) {
            $arr [] = $v;
        }
        $delete = $PubAction->pdeletes($tab_arr['tab_tablename'], $arr);
        if ($delete) {
            $this->success('删除成功', url('PubAction/index', array('menu_id' => $tab_arr['menu_id'], 'tab_id' => $tab_arr['tab_id'])), 3);
        } else {
            $this->success('删除失败', url('PubAction/index', array('menu_id' => $tab_arr['menu_id'], 'tab_id' => $tab_arr['tab_id'])), 3);
        }


        return $this->fetch();
    }

}
