<?php
namespace app\admin\model;

use think\Model;

class Info extends Model
{
    // 设置数据表（不含前缀），当表名与类名不一致时使用 如果相同则可以不定义
    //protected $name = 'users';
    //protected $table = 'ecs_users';//自定义表明
    public function _initialize() {
        parent::_initialize();
    }
    
    public function sfind($arr) {
        $find = $this->find($arr);
        return $find;
    }
    
    public function ssave_all($data) {
        foreach($data as $key => $value) {
            $arr = array('en_name'=>$key);
            $arr1 = array('value'=>$value);
            
            $find = $this->find($arr);
            if($find) {
                $this->where($arr)->update($arr1);
            } else {
                $arr1['en_name'] = $key;
                $this->data($arr1,true)->isUpdate(false)->save();
            }
        }
        return true;
    }
    
    public function show_list($data) {
        $return = array();
        foreach($data as $key => $value) {
            $return[$value['en_name']] = $value['value'];
        }
        return $return;
    }
    
}