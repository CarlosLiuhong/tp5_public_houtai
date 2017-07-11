<?php
namespace app\admin\controller;
use think\Controller;
use think\Request;
use think\Db;

class Bases extends Controller
{
    public function _initialize() {
        parent::_initialize();
        $admin = Session('intranet.admin');
        if(empty($admin)) {
            $this->redirect('Login/login');
        }
    }
    
}
