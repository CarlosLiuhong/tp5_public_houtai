<?php

namespace app\admin\model;

use think\Model;

class Menu extends Model {

    // 设置数据表（不含前缀），当表名与类名不一致时使用 如果相同则可以不定义
    //protected $name = 'users';
    //protected $table = 'ecs_users';//自定义表明
    public function _initialize() {
        parent::_initialize();
    }

    public function get_lists($arr = array()) {
        $lists = $this->where($arr)->order("menu_order")->select();
        $return = array();
        if ($lists) {
            foreach ($lists as $key => $value) {
                $return[$key] = $value;
            }
        }
        return $return;
    }

    public function get_all_lists($arr = array()) {
        $return = array();
        if (empty($arr)) {
            $arr = array(
                'pmenu_id' => '0'
            );
        }
        $lists = $this->get_lists($arr);
        if ($lists) {
            foreach ($lists as $key => $value) {
                $arr_c = array(
                    'pmenu_id' => $value['menu_id']
                );
                $children = $this->get_all_lists($arr_c);
                if ($children) {
                    $value['children'] = $children;
                } else {
                    $value['children'] = '';
                }
                $str = "┗━";
                $value['mark_str'] = str_repeat("&nbsp;&nbsp;", $value['menu_level']);
                if ($value['menu_level'] > 0) {
                    $value['mark_str'] .= $str;
                }
                $return[$key] = $value;
            }
        }
        return $return;
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
        if (isset($data['menu_id'])) {
            return $this->data($data, true)->isUpdate(true)->save();
        } else {
            if (isset($data['pmenu_id'])) {
                $arr = array(
                    'menu_id' => $data['pmenu_id']
                );
                $parent = $this->sfind($arr);
                $data['menu_level'] = $parent['menu_level'] + 1;
            }
            //dump($data);exit;
            $this->data($data, true)->isUpdate(false)->save();
            return $this->menu_id;
        }
    }

    public function ssave_all($data) {
        foreach ($data as $key => $value) {
            $arr = array('en_name' => $key);
            $arr1 = array('value' => $value);

            $find = $this->find($arr);
            if ($find) {
                $this->where($arr)->update($arr1);
            } else {
                $arr1['en_name'] = $key;
                $this->data($arr1, true)->isUpdate(false)->save();
            }
        }
        return true;
    }

    public function show_list($data) {
        $return = array();
        foreach ($data as $key => $value) {
            $return[$value['en_name']] = $value['value'];
        }
        return $return;
    }

}
