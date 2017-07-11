<?php
namespace app\admin\controller;
use think\Controller;
use think\Request;
use think\Db;

class AjaxMenusTab extends AjaxBases
{
    public $tmodel = '';
    public function _initialize() {
        parent::_initialize();
        $this->tmodel = model('MenuTab');
    }
    
    public function get_detail() {
        $menu_id = input('post.menu_id');
        $tab_id = input('post.tab_id');
        $arr = array(
            'menu_id' => $menu_id,
            'tab_id' => $tab_id
        );
        $data = $this->tmodel->find($arr);
        $return = array();
        $return['code'] = '0';
        $return['msg'] = '查询成功';
        $return['data'] = $data;
        echo json_encode($return);
    }
    
}
