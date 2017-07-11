<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:85:"D:\self_code\public_auto_houtai\public/../application/admin\view\menus_tab\lists.html";i:1497718474;s:91:"D:\self_code\public_auto_houtai\public/../application/admin\view\menus_tab\tab_article.html";i:1498238116;}*/ ?>
<!DOCTYPE html>
<html lang="zh-cn">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
        <meta name="renderer" content="webkit">
        <title></title>
        <link rel="stylesheet" href="__static__/admin/css/pintuer.css">
        <link rel="stylesheet" href="__static__/admin/css/admin.css">
        <link rel="stylesheet" href="__static__/public/css/bootstrap.min.css">
        <script src="__static__/admin/js/jquery.js"></script>
        <!--<script src="__static__/admin/js/pintuer.js"></script>-->
        <script src="__static__/public/js/bootstrap.min.js"></script>
    </head>
    <style type="text/css">
        <!--
        .search a{
            text-decoration:none;
        }
        -->
    </style>
    <body>
        <div class="panel admin-panel">
            <div class="panel-head"><strong class="icon-reorder"> Tab列表</strong></div>
            <div class="padding border-bottom">
                <ul class="search">
                    <li>
                        <button type="button" class="btn btn-default" data-toggle="modal" data-target="#exampleModal"  data-tab_id="" data-menu_id="<?php echo $menu_id; ?>">添加Tab</button>
                        <button type="button" class="btn btn-default" data-toggle="modal" data-target="#exampleModal"  data-tab_id="<?php echo $tab_id; ?>" data-menu_id="<?php echo $menu_id; ?>">编辑Tab</button>
                        <button type="button"  class="btn btn-default delete_tab" data-tab_id="<?php echo $tab_id; ?>" data-menu_id="<?php echo $menu_id; ?>">删除Tab</button>
                    </li>
                </ul>
            </div>
            <div class="padding border-bottom">
                <ul class="search">
                    <li>
                        <?php if(is_array($lists) || $lists instanceof \think\Collection): $i = 0; $__LIST__ = $lists;if( count($__LIST__)==0 ) : echo "<li>暂无数据</li>" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                    <a href="<?php echo url('MenusTab/lists',array('menu_id'=>$menu_id,'tab_id'=>$vo['tab_id'])); ?>">
                        <?php if($vo['tab_id'] == $tab_id): ?>
                        <button type="button" class="btn btn-primary"> <?php echo $vo['tab_name']; ?></button>
                        <?php else: ?>
                        <button type="button" class="btn btn-default"> <?php echo $vo['tab_name']; ?> </button>
                        <?php endif; ?>

                    </a>&nbsp;&nbsp;
                    <?php endforeach; endif; else: echo "<li>暂无数据</li>" ;endif; ?>
                    </li>
                </ul>
            </div>

            <div>
                <!--tab文章-->
<style type="text/css">
    <!--
    .tab_article_content {
        text-decoration:none;
    }
    -->
</style>

<div class="padding border-bottom">
    <ul class="search">
        <li>
            <button type="button" class="btn btn-default" data-toggle="modal" data-target="#exampleModal2"  data-tab_id="<?php echo $tab_id; ?>" data-menu_id="<?php echo $menu_id; ?>" data-tbf_id="">添加Field</button>
        </li>
    </ul>
</div>

<div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"></button>
                <h4 class="modal-title-article" id="exampleModalLabel"></h4>
            </div>
            <div class="modal-body">
                <form class="add_tbf_data form-horizontal" method="post">
                    <input type="hidden" name="menu_id" class="menu_id" value="<?php echo $menu_id; ?>">
                    <input type="hidden" name="tab_id" class="tab_id" value="<?php echo $tab_id; ?>">
                    <input type="hidden" name="tbf_id" class="tbf_id" value="">
                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-2 control-label">表名:</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control tbf_table2" readonly name="tbf_table" value="<?php echo $tab_detail['tab_tablename']; ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputPassword3" class="col-sm-2 control-label">表字段:</label>
                        <div class="col-sm-10">
                            <select class="form-control tbf_field2" name="tbf_field">
                                <?php if(is_array($table_fields) || $table_fields instanceof \think\Collection): $k = 0; $__LIST__ = $table_fields;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($k % 2 );++$k;?>
                                <option value="<?php echo $vo; ?>"><?php echo $vo; ?></option>
                                <?php endforeach; endif; else: echo "" ;endif; ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputPassword3" class="col-sm-2 control-label">显示名称:</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control tbf_field_name2" name="tbf_field_name">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputPassword3" class="col-sm-2 control-label">显示类型:</label>
                        <div class="col-sm-10">
                            <select class="form-control tbf_field_type2" name="tbf_field_type">
                                <?php if(is_array($field_type_v) || $field_type_v instanceof \think\Collection): $k = 0; $__LIST__ = $field_type_v;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$fvo): $mod = ($k % 2 );++$k;?>
                                <option value="<?php echo $key; ?>"><?php echo $fvo; ?></option>
                                <?php endforeach; endif; else: echo "" ;endif; ?>
                            </select>
                        </div>
                    </div>

                    <div class="tbf_field_extention2 hide">
                        <div class="form-group">
                            <label for="inputPassword3" class="col-sm-2 control-label">扩展:</label>
                            <div class="col-sm-10">
                                <select class="form-control extension2" name="tbf_field_extension">
                                    <option value="">请选择</option>
                                    <option value="1">外联表</option>
                                    <option value="2">外联插件</option>
                                </select>
                            </div>
                        </div>
                        <div class="table_extension2 hide">
                            <div class="form-group">
                                <label for="inputPassword3" class="col-sm-2 control-label">外联表:</label>
                                <div class="col-sm-10">
                                    <select class="form-control tbf_table_in2" name="tbf_table_in">
                                        <option value="">请选择</option>
                                        <?php if(is_array($table_lists) || $table_lists instanceof \think\Collection): $k = 0; $__LIST__ = $table_lists;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$tvo): $mod = ($k % 2 );++$k;?>
                                        <option value="<?php echo $tvo[$db_front_html]; ?>"><?php echo $tvo[$db_front_html]; ?></option>
                                        <?php endforeach; endif; else: echo "" ;endif; ?>
                                    </select>
                                </div>
                            </div>
                            <p class="table_extension_tip2"></p>
                            <div class="form-group">
                                <label for="inputPassword3" class="col-sm-2 control-label">外联字段:</label>
                                <div class="col-sm-10 tbf_table_in_field_span2">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputPassword3" class="col-sm-2 control-label">外联显示字段:</label>
                                <div class="col-sm-10 tbf_table_in_field_show_span2">
                                </div>
                            </div>
                        </div>
                        <div class="widget_extension2 hide">
                            <div class="form-group">
                                <label for="inputPassword3" class="col-sm-2 control-label">外联方法:</label>
                                <div class="col-sm-10">
                                    <select class="form-control tbf_widget2 col-sm-5" name="tbf_widget">
                                        <option value="">请选择</option>
                                        <?php if(is_array($base_widget) || $base_widget instanceof \think\Collection): $k = 0; $__LIST__ = $base_widget;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$tvo): $mod = ($k % 2 );++$k;?>
                                        <option value="<?php echo $key; ?>"><?php echo $tvo; ?></option>
                                        <?php endforeach; endif; else: echo "" ;endif; ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <script>
                            $(".tbf_field_type2").on('change', function () {
                                var tbf_field_type2_val = $(this).val();
                                if (tbf_field_type2_val == 'radio' || tbf_field_type2_val == 'checkbox' || tbf_field_type2_val == 'select') {
                                    if ($('.tbf_field_extention2').hasClass('hide')) {
                                        $('.tbf_field_extention2').removeClass('hide')
                                    }
                                } else {
                                    if (!$('.tbf_field_extention2').hasClass('hide')) {
                                        $('.tbf_field_extention2').addClass('hide')
                                    }
                                }
                            });
                            $(".extension2").on('change', function () {
                                var extension2_val = $(this).val();
                                if (extension2_val == '1') {
                                    if ($('.table_extension2').hasClass('hide')) {
                                        $('.table_extension2').removeClass('hide')
                                    }
                                    if (!$('.widget_extension2').hasClass('hide')) {
                                        $('.widget_extension2').addClass('hide')
                                    }
                                } else if (extension2_val == '2') {
                                    if (!$('.table_extension2').hasClass('hide')) {
                                        $('.table_extension2').addClass('hide')
                                    }
                                    if ($('.widget_extension2').hasClass('hide')) {
                                        $('.widget_extension2').removeClass('hide')
                                    }
                                } else {
                                    if (!$('.table_extension2').hasClass('hide')) {
                                        $('.table_extension2').addClass('hide')
                                    }
                                    if (!$('.widget_extension2').hasClass('hide')) {
                                        $('.widget_extension2').addClass('hide')
                                    }
                                }
                            });
                            $(".tbf_table_in2").on('change', function () {
                                var tbf_table_in2_val = $(this).val();
                                $(".tbf_table_in_field_span2").html('');
                                $(".tbf_table_in_field_show_span2").html('');
                                if (tbf_table_in2_val != '') {
                                    $('.table_extension_tip2').html('加载中……');
                                    $.ajax({
                                        type: 'POST',
                                        url: "<?php echo url('AjaxBases/get_table_fields_select'); ?>",
                                        data: {'tablename': tbf_table_in2_val, 'class': 'tbf_table_in_field2', 'selectname': 'tbf_table_in_field', 'class2': 'tbf_table_in_field_show2', 'selectname2': 'tbf_table_in_field_show'},
                                        success: function (detail) {
                                            if (detail['code'] > 0) {
                                                $(".table_extension_tip2").html(detail['msg']);
                                            } else {
                                                $(".table_extension_tip2").html("");
                                                $(".tbf_table_in_field_span2").html(detail.data.select1);
                                                $(".tbf_table_in_field_show_span2").html(detail.data.select2);
                                            }
                                        },
                                        dataType: 'json'
                                    });
                                }
                            });

                        </script>
                    </div>
                    
                    <div class="form-group">
                        <label for="inputPassword3" class="col-sm-2 control-label">显示为表头:</label>
                        <div class="col-sm-10">
                            <select class="form-control tbf_show2" name="is_title">
                                <?php if(is_array($tbf_show_v) || $tbf_show_v instanceof \think\Collection): $k = 0; $__LIST__ = $tbf_show_v;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$fvo): $mod = ($k % 2 );++$k;?>
                                <option value="<?php echo $key; ?>" ><?php echo $fvo; ?></option>
                                <?php endforeach; endif; else: echo "" ;endif; ?>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="inputPassword3" class="col-sm-2 control-label">是否显示:</label>
                        <div class="col-sm-10">
                            <select class="form-control tbf_show2" name="tbf_show">
                                <?php if(is_array($tbf_show_v) || $tbf_show_v instanceof \think\Collection): $k = 0; $__LIST__ = $tbf_show_v;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$fvo): $mod = ($k % 2 );++$k;?>
                                <option value="<?php echo $key; ?>" ><?php echo $fvo; ?></option>
                                <?php endforeach; endif; else: echo "" ;endif; ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputPassword3" class="col-sm-2 control-label">是否为空:</label>
                        <div class="col-sm-10">
                            <select class="form-control tbf_empty2" name="tbf_empty">
                                <?php if(is_array($tbf_empty_v) || $tbf_empty_v instanceof \think\Collection): $k = 0; $__LIST__ = $tbf_empty_v;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$fvo): $mod = ($k % 2 );++$k;?>
                                <option value="<?php echo $key; ?>" ><?php echo $fvo; ?></option>
                                <?php endforeach; endif; else: echo "" ;endif; ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputPassword3" class="col-sm-2 control-label">排序:</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control tbf_order2" name="tbf_order" value="99">
                        </div>
                    </div>
                </form>
                <div class="form-group">
                    <p class="hide_tip"></p>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
                <button type="button" class="btn btn-primary tijiao_tab_article">提交</button>
            </div>
        </div>
    </div>
</div>

<script>
    $('#exampleModal2').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget); // Button that triggered the modal
        var modal = $(this);
        modal.find('.modal-title-article').text('添加Field数据');
        var tab_id = button.data('tab_id') // Extract info from data-* attributes
        modal.find('.tab_id').val(tab_id);
        var menu_id = button.data('menu_id') // Extract info from data-* attributes
        modal.find('.menu_id').val(menu_id);
        var tbf_id = button.data('tbf_id') // Extract info from data-* attributes
        modal.find('.tbf_id').val(tbf_id);
        if (parseInt(tbf_id) > 0) {
            $(".add_tbf_data").hide();
            $(".hide_tip").html("读取中……");
            $.ajax({
                type: 'POST',
                url: "<?php echo url('AjaxMenusTabField/get_detail'); ?>",
                data: {'menu_id': menu_id, 'tab_id': tab_id, 'tbf_id': tbf_id},
                success: function (detail) {
                    if (detail['code'] > 0) {
                        alert(detail['msg']);
                        $(".hide_tip").html(detail['msg']);
                    } else {
                        $(".add_tbf_data").show();
                        $(".hide_tip").html("");
                        $(".tbf_field_name2").val(detail['data']['tbf_field_name']);
                        $(".tbf_field2").val(detail['data']['tbf_field']);
                        $(".tbf_field_type2").val(detail['data']['tbf_field_type']);
                        $(".tbf_show2").val(detail['data']['tbf_show']);
                        $(".tbf_empty2").val(detail['data']['tbf_empty']);
                        $(".tbf_order2").val(detail['data']['tbf_order']);
                    }
                },
                dataType: 'json'
            });
        } else {
            $(".add_tbf_data").show();
            $(".hide_tip").html("");
        }


    });
    $(".tijiao_tab_article").click(function () {
        if (confirm('确认提交？')) {
            var tbf_field_name2 = $(".tbf_field_name2").val();
            var tbf_field2 = $(".tbf_field2").val();
            var tbf_field_type2 = $(".tbf_field_type2").val();
            var tbf_show2 = $(".tbf_show2").val();
            var tbf_empty2 = $(".tbf_empty2").val();
            var tbf_order2 = $(".tbf_order2").val();
            var err = new Array();
            if (tbf_field_name2.length <= 0) {
                err.push('请输入字段显示名称');
            }
            if (tbf_field2.length <= 0) {
                err.push('请选择对应字段');
            }
            if (tbf_field_type2.length <= 0) {
                err.push('请选择显示类型');
            }
            if (tbf_show2.length <= 0) {
                err.push('请选择是否显示');
            }
            if (tbf_empty2.length <= 0) {
                err.push('请选择是否为空');
            }
            if (tbf_order2.length <= 0) {
                err.push('请输入排序');
            }
            if (err.length > 0) {
                alert(err);
                return;
            }

            $(".add_tbf_data").attr('action', "<?php echo url('MenusTabField/save'); ?>");
            $(".add_tbf_data").submit();
        }
    });</script>
<input type="hidden" class="tab_article_menu_id" value="<?php echo $menu_id; ?>">
<input type="hidden" class="tab_article_tab_id" value="<?php echo $tab_id; ?>">
<form action="<?php echo url('MenusTabField/save'); ?>" method="post" enctype="multipart/form-data">
    <div class="tab_article_content">
        <table class="table table-hover">
            <tr>
                <td>字段名</td>
                <td>显示名</td>
                <td>数据类型</td>
                <td>关联表</td>
                <td>关联字段</td>
                <td>关联显示字段</td>
                <td>关联公共插件</td>
                <td>是否必填</td>
                <td>是否显示</td>
                <td>显示为表头</td>
                <td>操作</td>
            </tr>
            <?php if(is_array($mtf_list) || $mtf_list instanceof \think\Collection): $i = 0; $__LIST__ = $mtf_list;if( count($__LIST__)==0 ) : echo "<tr><td colspan='10'>暂无数据</td></tr>" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
            <tr>
                <td><?php echo $vo['tbf_field']; ?></td>
                <td><input type="text" class="form-control" name="tbf_field_name" placeholder="显示名称" value="<?php echo $vo['tbf_field_name']; ?>"></td>
                <td>
                    <select class="form-control" name="tbf_field_type">
                        <?php if($vo['tbf_field_extension'] != '1' && $vo['tbf_field_extension'] != '2'): if(is_array($noselect_field_type_v) || $noselect_field_type_v instanceof \think\Collection): $k = 0; $__LIST__ = $noselect_field_type_v;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$fvo): $mod = ($k % 2 );++$k;?>
                        <option value="<?php echo $key; ?>" <?php if($key == $vo['tbf_field_type']): ?>selected<?php endif; ?> ><?php echo $fvo; ?></option>
                        <?php endforeach; endif; else: echo "" ;endif; else: if(is_array($select_field_type_v) || $select_field_type_v instanceof \think\Collection): $k = 0; $__LIST__ = $select_field_type_v;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$fvo): $mod = ($k % 2 );++$k;?>
                        <option value="<?php echo $key; ?>" <?php if($key == $vo['tbf_field_type']): ?>selected<?php endif; ?> ><?php echo $fvo; ?></option>
                        <?php endforeach; endif; else: echo "" ;endif; endif; ?>
                    </select>
                </td>
                <td><?php echo $vo['tbf_table_in']; ?></td>
                <td><?php echo $vo['tbf_table_in_field']; ?></td>
                <td><?php echo $vo['tbf_table_in_field_show']; ?></td>
                <td><?php echo $vo['tbf_widget']; ?></td>
                <td>
                    <select class="form-control" name="tbf_empty">
                        <?php if(is_array($tbf_empty_v) || $tbf_empty_v instanceof \think\Collection): $k = 0; $__LIST__ = $tbf_empty_v;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$fvo): $mod = ($k % 2 );++$k;?>
                        <option value="<?php echo $key; ?>" <?php if($key == $vo['tbf_empty']): ?>selected<?php endif; ?>><?php echo $fvo; ?></option>
                        <?php endforeach; endif; else: echo "" ;endif; ?>
                    </select>
                </td>
                <td>
                    <select class="form-control" name="tbf_show">
                        <?php if(is_array($tbf_show_v) || $tbf_show_v instanceof \think\Collection): $k = 0; $__LIST__ = $tbf_show_v;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$fvo): $mod = ($k % 2 );++$k;?>
                        <option value="<?php echo $key; ?>" <?php if($key == $vo['tbf_show']): ?>selected<?php endif; ?>><?php echo $fvo; ?></option>
                        <?php endforeach; endif; else: echo "" ;endif; ?>
                    </select>
                </td>
                <td>
                    <select class="form-control" name="is_title">
                        <?php if(is_array($tbf_show_v) || $tbf_show_v instanceof \think\Collection): $k = 0; $__LIST__ = $tbf_show_v;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$fvo): $mod = ($k % 2 );++$k;?>
                        <option value="<?php echo $key; ?>" <?php if($key == $vo['is_title']): ?>selected<?php endif; ?>><?php echo $fvo; ?></option>
                        <?php endforeach; endif; else: echo "" ;endif; ?>
                    </select>
                </td>
                <td>
                    <button type="button"  class="btn btn-default save_field" data-tbf_id="<?php echo $vo['tbf_id']; ?>" >保存</button>
                    <button type="button"  class="btn btn-default delete_field" data-tbf_id="<?php echo $vo['tbf_id']; ?>" >删除</button>
                </td>
            </tr>
            <?php endforeach; endif; else: echo "<tr><td colspan='10'>暂无数据</td></tr>" ;endif; ?>
        </table>

    </div>
</form>
<script type="text/javascript">
    $(".delete_field").click(function () {
        var tbf_id = $(this).data("tbf_id");
        var menu_id = $(".tab_article_menu_id").val();
        var tab_id = $(".tab_article_tab_id").val();
        if (confirm("您确定要删除当前field吗?")) {
            window.location.href = "<?php echo url('MenusTabField/sdelete'); ?>" + "?tbf_id=" + tbf_id + "&menu_id=" + menu_id + "&tab_id=" + tab_id;
        }
    });
    $(".save_field").click(function () {
        var tbf_id = $(this).data("tbf_id");
        var menu_id = $(".tab_article_menu_id").val();
        var tab_id = $(".tab_article_tab_id").val();
        var field_self = $(this).parent().parent();
        var tbf_field_name = field_self.find("input[name='tbf_field_name']").val();
        var tbf_field_type = field_self.find("select[name='tbf_field_type']").val();
        var tbf_empty = field_self.find("select[name='tbf_empty']").val();
        var tbf_show = field_self.find("select[name='tbf_show']").val();
        var is_title = field_self.find("select[name='is_title']").val();
        if (confirm("您确定要保存当前field吗?")) {
            window.location.href = "<?php echo url('MenusTabField/save'); ?>" + "?tbf_id=" + tbf_id + "&menu_id=" + menu_id + "&tab_id=" + tab_id + "&tbf_field_name=" + tbf_field_name + "&tbf_field_type=" + tbf_field_type + "&tbf_empty=" + tbf_empty + "&tbf_show=" + tbf_show + "&is_title=" + is_title;
        }
    });
</script>

            </div>

            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"></button>
                            <h4 class="modal-title" id="exampleModalLabel"></h4>
                        </div>
                        <div class="modal-body">
                            <form class="add_data" method="post">
                                <input type="hidden" name="menu_id" class="menu_id" value="<?php echo $menu_id; ?>">
                                <input type="hidden" name="tab_id" class="tab_id" value="">
                                <div class="form-group">
                                    <label for="recipient-name" class="control-label">Tab名称:</label>
                                    <input type="text" class="form-control tab_name" name="tab_name">
                                </div>
                                <div class="form-group">
                                    <label for="recipient-name" class="control-label">显示类型:</label>
                                    <select class="form-control" name="tab_show_type">
                                        <option value="1">内容页</option>
                                        <option value="2">列表页</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="recipient-name" class="control-label">内容类型:</label>
                                    <select class="form-control" name="tab_content_type">
                                        <option value="1">文章类型</option>
                                        <option value="2">下载类型</option>
                                    </select>

                                </div>
                                <div class="form-group">
                                    <label for="recipient-name" class="control-label">对应表名:</label>
                                    <select class="form-control" name="tab_tablename">
                                        <?php if(is_array($table_lists) || $table_lists instanceof \think\Collection): $k = 0; $__LIST__ = $table_lists;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$tvo): $mod = ($k % 2 );++$k;?>
                                        <option value="<?php echo $tvo[$db_front_html]; ?>"><?php echo $tvo[$db_front_html]; ?></option>
                                        <?php endforeach; endif; else: echo "" ;endif; ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="message-text" class="control-label">排序:</label>
                                    <input type="text" class="form-control tab_order" name="tab_order" value="99">
                                </div>
                            </form>
                            <div class="form-group">
                                <p class="hide_tip"></p>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
                            <button type="button" class="btn btn-primary tijiao">提交</button>
                        </div>
                    </div>
                </div>
            </div>
            <script>
                $('#exampleModal').on('show.bs.modal', function (event) {
                    var button = $(event.relatedTarget); // Button that triggered the modal
                    var modal = $(this);
                    modal.find('.modal-title').text('添加Tab标签');

                    var tab_id = button.data('tab_id') // Extract info from data-* attributes
                    modal.find('.tab_id').val(tab_id);

                    var menu_id = button.data('menu_id') // Extract info from data-* attributes
                    modal.find('.menu_id').val(menu_id);

                    $("input[name='tab_name']").val('');
                    $("input[name='tab_order']").val('99');

                    if (parseInt(tab_id) > 0) {
                        modal.find('.modal-title').text('编辑Tab标签');
                        $(".add_data").hide();
                        $(".hide_tip").html("读取中……");
                        $.ajax({
                            type: 'POST',
                            url: "<?php echo url('AjaxMenusTab/get_detail'); ?>",
                            data: {'menu_id': menu_id, 'tab_id': tab_id},
                            success: function (detail) {
                                if (detail['code'] > 0) {
                                    alert(detail['msg']);
                                    $(".hide_tip").html(detail['msg']);
                                } else {
                                    $(".add_data").show();
                                    $(".hide_tip").html("");
                                    $("input[name='tab_name']").val(detail['data']['tab_name']);
                                    $("select[name='tab_tablename']").val(detail['data']['tab_tablename']);
                                    $("select[name='tab_show_type']").val(detail['data']['tab_show_type']);
                                    $("select[name='tab_content_type']").val(detail['data']['tab_content_type']);
                                    $("input[name='tab_order']").val(detail['data']['tab_order']);
                                }
                            },
                            dataType: 'json'
                        });
                    } else {
                        $(".add_data").show();
                        $(".hide_tip").html("");
                    }


                });
                $(".tijiao").click(function () {
                    if (confirm('确认提交？')) {
                        var tab_name = $("input[name='tab_name']").val();
                        var tab_tablename = $("select[name='tab_tablename']").val();
                        var tab_show_type = $("select[name='tab_show_type']").val();
                        var tab_content_type = $("select[name='tab_content_type']").val();
                        var tab_order = $("input[name='tab_order']").val();
                        var err = new Array();
                        if (tab_name.length <= 0) {
                            err.push('请输入Tab名称');
                        }

                        if (tab_tablename.length <= 0) {
                            err.push('请输入Tab对应表名称');
                        }

                        if (tab_show_type.length <= 0) {
                            err.push('请输入Tab显示类型');
                        }
                        if (tab_content_type.length <= 0) {
                            err.push('请输入Tab内容类型');
                        }
                        if (tab_order.length <= 0) {
                            err.push('请输入Tab排序');
                        }
                        if (err.length > 0) {
                            alert(err);
                            return;
                        }

                        $(".add_data").attr('action', "<?php echo url('MenusTab/save'); ?>");
                        $(".add_data").submit();
                    }
                });

            </script>
        </div>
        <script type="text/javascript">
            $(".delete_tab").click(function () {
                var menu_id = $(this).data("menu_id");
                var tab_id = $(this).data("tab_id");
                if (confirm("您确定要删除当前Tab吗?")) {
                    window.location.href = "<?php echo url('MenusTab/sdelete'); ?>" + "?tab_id=" + tab_id + "&menu_id=" + menu_id;
                }
            });
        </script>

    </body>
</html>