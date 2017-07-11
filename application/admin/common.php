<?php

// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006-2016 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: 流年 <liu21st@gmail.com>
// +----------------------------------------------------------------------
// 应用公共文件
//字段类型
function all_field_type() {
    $arr['v'] = array(
        'text' => '文本',
        'number' => '数字',
        'radio' => '单选',
        'checkbox' => '复选框',
        'select' => '下拉',
        'textarea' => '文本域',
        'kindeditor' => 'kind编辑器',
        'image' => '图片',
        'imagelist' => '图片列表',
        'document' => '文档',
        'readyonlys' => '只读'
    );
    $arr['k'] = array(
        'text',
        'number',
        'radio',
        'checkbox',
        'select',
        'textarea',
        'kindeditor',
        'image',
        'imagelist',
        'document',
        'readyonlys'
    );
    return $arr;
}

//下拉字段类型
function select_field_type() {
    $arr['v'] = array(
        'radio' => '单选',
        'checkbox' => '复选框',
        'select' => '下拉',
    );
    $arr['k'] = array(
        'radio',
        'checkbox',
        'select',
    );
    return $arr;
}

//字段类型
function noselect_field_type() {
    $arr['v'] = array(
        'text' => '文本',
        'number' => '数字',
        'textarea' => '文本域',
        'kindeditor' => 'kind编辑器',
        'image' => '图片',
        'imagelist' => '图片列表',
        'document' => '文档',
    );
    $arr['k'] = array(
        'text',
        'number',
        'textarea',
        'kindeditor',
        'image',
        'imagelist',
        'document',
    );
    return $arr;
}

//字段是否必填
function tbf_empty() {
    $arr['v'] = array(
        '1' => '可为空',
        '2' => '不可为空',
    );
    $arr['k'] = array(
        '1',
        '2',
    );
    return $arr;
}

//字段是否显示
function tbf_show() {
    $arr['v'] = array(
        '1' => '显示',
        '2' => '不显示',
    );
    $arr['k'] = array(
        '1',
        '2',
    );
    return $arr;
}

//格式化select
/*
 * $name 名称
 *  */
function get_select_widget($name, $optionName, $optionValue, $data, $selected = "") {

    $str = "<select name='$name' id='$name'>";
    $str .= "<option value='' selected>选择</option>";
    foreach ($data as $v) {
        if ($selected == $v[$optionValue]) {
            $selectedStr = "selected";
        } else {
            $selectedStr = "";
        }
        $str .= "<option value='" . $v[$optionValue] . "' " . $selectedStr . ">" . $v[$optionName] . "</option>";
    }
    $str .= "</select>";
    return $str;
}

/*
 * 插件
 */

function base_widget() {
    $arr = array(
        'shifou' => '是否选项',
        'xingbie' => '性别选项'
    );
    return $arr;
}

//地址插件
//是否插件
function shifou() {
    $arr = array(
        '2' => '否',
        '1' => '是',
    );
    return $arr;
}

//性别
function xingbie() {
    $arr = array(
        '2' => '女',
        '1' => '男',
    );
    return $arr;
}
