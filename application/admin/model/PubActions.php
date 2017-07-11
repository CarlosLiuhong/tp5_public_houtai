<?php

namespace app\admin\model;

use think\Db;

class PubActions {

    public function psave($table, $pk, $data) {
        $admin = session('intranet.admin');
        $data['add_time'] = time();
        $data['add_user'] = $admin['user_name'];
        $tab_field_lists = Db::getTableFields(array('table' => $table));
        foreach ($data as $k => $v) {
            if (strlen($v) == 0) {
                unset($data[$k]);
                continue;
            }
            if (!in_array($k, $tab_field_lists)) {
                unset($data[$k]);
            }
        }
        if (!isset($data[$pk])) {
            return Db::table($table)->insert($data);
        } else {
            $return = Db::table($table)
                    ->where($pk, $data[$pk])
                    ->update($data);
            return $return;
        }
    }

    public function pdelete($table, $arr) {
        $return = Db::table($table)->where($arr)->delete();
        return $return;
    }
    
    public function pdeletes($table, $arr) {
        $return = Db::table($table)->delete($arr);
        return $return;
    }

}
