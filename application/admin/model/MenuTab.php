<?php

namespace app\admin\model;

use think\Model;

class MenuTab extends Model {

    // 设置数据表（不含前缀），当表名与类名不一致时使用 如果相同则可以不定义
    //protected $name = 'users';
    //protected $table = 'ecs_users';//自定义表明
    public function _initialize() {
        parent::_initialize();
    }

    public function get_lists($arr = array()) {
        $lists = $this->where($arr)->order('tab_order')->select();
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
        if (isset($data['tab_id'])) {
            return $this->data($data, true)->isUpdate(true)->save();
        } else {
            //dump($data);exit;
            $this->data($data, true)->isUpdate(false)->save();
            return $this->menu_id;
        }
    }

}
