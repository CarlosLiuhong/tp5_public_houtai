<?php

namespace app\admin\controller;

use think\Controller;
use think\Request;
use think\Db;

class Publics extends Controller {

    public function index() {

    }

    public function upload_one($key, $upload_str = './uploads/', $validate = array('size' => 10485760, 'ext' => 'jpg,png,gif,doc,docs,xls,xlsx,pdf,txt')) {
        $file = request()->file($key);
        // 移动到框架应用根目录/public/uploads/ 目录下
        $info = $file->rule('date')->validate($validate)->move($upload_str);
        if ($info) {
            $arr = array(
                'ext' => $info->getExtension(),
                'name' => $upload_str . $info->getSaveName(),
                'file_name' => $info->getFilename()
            );
            return $arr;
        } else {
            // 上传失败获取错误信息
            return $file->getError();
        }
    }

    /* 文档下载
     *  file_url 文档路径
     *  name 文件名称
     */

    public function file_download($file_url, $name = '') {
        $file_url = M_WEB . $file_url;
        $name = empty($name) ? time() : $name;
        $file = @fopen($file_url, "r");
        ob_end_clean();
        Header('Pragma: public');
        Header('Expires: 0');
        Header('Cache-Control: private');
        Header('Cache-Component: must-revalidate, post-check=0, pre-check=0');
        Header("Content-type: application/octet-stream");
        Header("Content-Disposition: attachment; filename=" . $name); //给文件命名
        Header('Content-Encoding: none');
        Header("Content-Transfer-Encoding: binary");
        /* while (!feof ($file)) {
          echo fread($file,5000);
          } */
        @readfile($file_url);
        fclose($file);
    }

}
