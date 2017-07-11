<?php

namespace app\admin\controller;

use think\Controller;
use think\Request;
use think\Db;

class AjaxBases extends Controller {

    public function _initialize() {
        parent::_initialize();
        $admin = Session('intranet.admin');
        if (empty($admin)) {
            return array('code' => '10000', 'msg' => '请先登录！');
        }
    }

    public function get_table_fields() {
        $tablename = input('param.tablename');
        $arr_t = array(
            'table' => $tablename
        );
        $table_fields = Db::getTableFields($arr_t); //获取对应表字段
        if ($table_fields) {
            $return = array(
                'code' => '0',
                'msg' => '获取成功',
                'data' => $table_fields
            );
        } else {
            $return = array(
                'code' => '1',
                'msg' => '获取失败'
            );
        }
        echo json_encode($return);
    }

    public function get_table_fields_select() {
        $tablename = input('param.tablename');
        $class = input('param.class');
        $selectname = input('param.selectname');
        $class2 = input('param.class2');
        $selectname2 = input('param.selectname2');
        $arr_t = array(
            'table' => $tablename
        );
        $table_fields = Db::getTableFields($arr_t); //获取对应表字段

        if ($table_fields) {
            $str_head = "<select class='form-control " . $class . "' name='" . $selectname . "'>";
            $str_head2 = "<select class='form-control " . $class2 . "' name='" . $selectname2 . "'>";
            $str = "";
            $str .= "<option value='' selected>选择</option>";
            $selected = '';
            foreach ($table_fields as $v) {
                if ($selected == $v) {
                    $selectedStr = "selected";
                } else {
                    $selectedStr = "";
                }
                $str .= "<option value='" . $v . "' " . $selectedStr . ">" . $v . "</option>";
            }
            $str .= "</select>";
            $str1 = $str_head . $str;
            $str2 = $str_head2 . $str;
            $return = array(
                'code' => '0',
                'msg' => '获取成功',
                'data' => array(
                    'select1' => $str1,
                    'select2' => $str2
                )
            );
        } else {
            $return = array(
                'code' => '1',
                'msg' => '获取失败'
            );
        }
        echo json_encode($return);
    }

}
