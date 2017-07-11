<?php
namespace app\admin\model;

use think\Model;

class Admin extends Model
{
    // 设置数据表（不含前缀），当表名与类名不一致时使用 如果相同则可以不定义
    //protected $name = 'users';
    //protected $table = 'ecs_users';//自定义表明
    public function _initialize() {
        parent::_initialize();
    }
    
    public function ssave($data) {
        if(isset($data['id'])) {
            return $this->data($data,true)->isUpdate(true)->save();
        } else {
           $this->data($data,true)->isUpdate(false)->save();
           return $this->id;
        }
    }
    
}