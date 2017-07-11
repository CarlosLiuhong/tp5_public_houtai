<?php

namespace app\admin\model;

use think\Model;

class MenuTabField extends Model {

    // 设置数据表（不含前缀），当表名与类名不一致时使用 如果相同则可以不定义
    //protected $name = 'users';
    //protected $table = 'ecs_users';//自定义表明
    //protected $field = true;

    public function _initialize() {
        parent::_initialize();
    }

    public function get_lists($arr = array()) {
        $lists = $this->where($arr)->order('tbf_order,tbf_id')->select();
        return $lists;
    }

    public function sfind($arr) {
        $find = $this->find($arr);
        return $find;
    }

    public function ssave($data) {
        foreach ($data as $key => $value) {
            if (strlen($value) <= 0) {
                unset($data[$key]);
            }
        }
        $arr = array(
            'radio',
            'checkbox',
            'select'
        );
        if (!in_array($data['tbf_field_type'], $arr)) {
            $data['tbf_field_extension'] = '';
            $data['tbf_table_in'] = '';
            $data['tbf_table_in_field'] = '';
            $data['tbf_table_in_field_show'] = '';
            $data['tbf_widget'] = '';
        }
        if (isset($data['tbf_field_extension']) && $data['tbf_field_extension'] == '1') {
            $data['tbf_widget'] = '';
        } else if (isset($data['tbf_field_extension']) && $data['tbf_field_extension'] == '2') {
            $data['tbf_table_in'] = '';
            $data['tbf_table_in_field'] = '';
            $data['tbf_table_in_field_show'] = '';
        }
        if (isset($data['tbf_id'])) {
            return $this->data($data, true)->isUpdate(true)->save();
        } else {
            //dump($data);
            //exit;
            $this->data($data, true)->isUpdate(false)->save();
            return $this->tbf_id;
        }
    }

}
