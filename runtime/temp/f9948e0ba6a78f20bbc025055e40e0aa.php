<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:81:"D:\self_code\public_auto_houtai\public/../application/admin\view\menus\lists.html";i:1497952963;}*/ ?>
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
        <script src="__static__/admin/js/pintuer.js"></script>
        <script src="__static__/public/js/bootstrap.min.js"></script>
    </head>
    <body>
        <div class="panel admin-panel">
            <div class="panel-head"><strong class="icon-reorder"> 内容列表</strong></div>
            <div class="padding border-bottom">
                <ul class="search">
                    <li>
                        <button type="button" class="button border-yellow" data-toggle="modal" data-target="#exampleModal"  data-pmenu_id="" data-menu_id=""><span class="icon-plus-square-o"></span> 添加数据</button>
                        <button type="button"  class="button border-green" id="checkall"><span class="icon-check"></span> 全选</button>
                        <button type="button" onclick="return DelSelect();" class="button border-red"><span class="icon-trash-o"></span> 批量删除</button>
                    </li>
                </ul>
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
                                <input type="hidden" name="pmenu_id" class="pmenu_id">
                                <input type="hidden" name="menu_id" class="menu_id">
                                <div class="form-group">
                                    <label for="recipient-name" class="control-label">菜单名称:</label>
                                    <input type="text" class="form-control menu_name" name="menu_name">
                                </div>
                                <div class="form-group">
                                    <label for="message-text" class="control-label">排序:</label>
                                    <input type="text" class="form-control menu_order" name="menu_order" value="99">
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
                    modal.find('.modal-title').text('添加数据');
                    var pmenu_id = button.data('pmenu_id') // Extract info from data-* attributes
                    modal.find('.pmenu_id').val(pmenu_id);
                    var menu_id = button.data('menu_id') // Extract info from data-* attributes
                    modal.find('.menu_id').val(menu_id);
                    if (parseInt(menu_id) > 0) {
                    $(".add_data").hide();
                    $(".hide_tip").html("读取中……");
                    $.ajax({
                        type: 'POST',
                        url: "<?php echo url('AjaxMenus/get_detail'); ?>",
                        data: {'menu_id': menu_id},
                        success: function (detail) {
                            if (detail['code'] > 0) {
                                alert(detail['msg']);
                                $(".hide_tip").html(detail['msg']);
                            } else {
                                $(".add_data").show();
                                $(".hide_tip").html("");
                                $("input[name='menu_name']").val(detail['data']['menu_name']);
                                $("input[name='menu_order']").val(detail['data']['menu_order']);
                            }
                        },
                        dataType: 'json'
                    });
                    } else {
                        $(".add_data").show();
                        $(".hide_tip").html("");
                    }


                });
            </script>
            <script>
                $(".tijiao").click(function () {
                if (confirm('确认提交？')) {
                var menu_name = $("input[name='menu_name']").val();
                var menu_order = $("input[name='menu_order']").val();
                var err = new Array();
                if (menu_name.length <= 0) {
                err.push('请输入菜单名称');
                }
                if (menu_order.length <= 0) {
                err.push('请输入排序');
                }
                if (err.length > 0) {
                alert(err);
                return;
                }
                $(".add_data").attr('action', "<?php echo url('Menus/save'); ?>");
                $(".add_data").submit();
                }
                });
            </script>
            <form method="post" id="forms" action="">
                <table class="table table-hover text-center">
                    <tr>
                        <th width="50%" style="text-align:left;">菜单名称</th>
                        <th width="15%">排序</th>
                        <th width="35%">操作</th>
                    </tr>
                    <?php if(is_array($lists) || $lists instanceof \think\Collection): $i = 0; $__LIST__ = $lists;if( count($__LIST__)==0 ) : echo "<tr><td colspan='4'>暂时没有数据</td></tr>" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                    <tr>
                        <td class="text-left"><?php echo $vo['mark_str']; ?><?php echo $vo['menu_name']; ?></td>
                        <td><?php echo $vo['menu_order']; ?></td>
                        <td>
                            <div class="">
                                <a class=""  data-toggle="modal" data-target="#exampleModal"  data-pmenu_id="<?php echo $vo['menu_id']; ?>" data-menu_id=""  href="javascript:;">
                                    <span class="icon-edit"></span> 子类</a>
                                <a class="" href="javascript:;" data-toggle="modal" data-pmenu_id="" data-menu_id="<?php echo $vo['menu_id']; ?>" data-target="#exampleModal">
                                    <span class="icon-edit"></span> 修改</a>
                                <a class="" href="javascript:void(0)" onclick="return del(<?php echo $vo['menu_id']; ?>);"><span class="icon-trash-o"></span> 删除</a>
                            </div>
                        </td>
                    </tr>
                    <?php if(!(empty($vo['children']) || ($vo['children'] instanceof \think\Collection && $vo['children']->isEmpty()))): if(is_array($vo['children']) || $vo['children'] instanceof \think\Collection): $i = 0; $__LIST__ = $vo['children'];if( count($__LIST__)==0 ) : echo "<tr><td colspan='4'>暂时没有数据</td></tr>" ;else: foreach($__LIST__ as $key=>$vo1): $mod = ($i % 2 );++$i;?>
                    <tr>
                        <td class="text-left"><?php echo $vo1['mark_str']; ?><?php echo $vo1['menu_name']; ?></td>
                        <td><?php echo $vo1['menu_order']; ?></td>
                        <td><div class="">
                                <a class=""  data-toggle="modal" data-target="#exampleModal" data-pmenu_id="<?php echo $vo1['menu_id']; ?>" data-menu_id="" href="javascript:;">
                                    <span class="icon-edit"></span> 子类</a>
                                <a class="" href="javascript:;" data-toggle="modal" data-target="#exampleModal" data-pmenu_id="" data-menu_id="<?php echo $vo1['menu_id']; ?>">
                                    <span class="icon-edit"> </span> 修改</a>
                                <a class="" href="<?php echo url('MenusTab/lists',array('menu_id'=>$vo1['menu_id'])); ?>">
                                    <span class="icon-edit"></span> Tab</a>
                                   <a class="" href="javascript:void(0)" onclick="return del(<?php echo $vo1['menu_id']; ?>)"><span class="icon-trash-o"></span> 删除</a>
                            </div></td>
                    </tr>
                    <?php if(!(empty($vo1['children']) || ($vo1['children'] instanceof \think\Collection && $vo1['children']->isEmpty()))): if(is_array($vo1['children']) || $vo1['children'] instanceof \think\Collection): $i = 0; $__LIST__ = $vo1['children'];if( count($__LIST__)==0 ) : echo "<tr><td colspan='4'>暂时没有数据</td></tr>" ;else: foreach($__LIST__ as $key=>$vo2): $mod = ($i % 2 );++$i;?>
                    <tr>
                        <td class="text-left"><?php echo $vo2['mark_str']; ?><?php echo $vo2['menu_name']; ?></td>
                        <td><?php echo $vo2['menu_order']; ?></td>
                        <td>
                            <div class="">
                                <a class="" href="javascript:;" data-toggle="modal" data-target="#exampleModal" data-pmenu_id="" data-menu_id="<?php echo $vo2['menu_id']; ?>">
                                    <span class="icon-edit"></span> 修改</a>
                                <a class="" href="<?php echo url('MenusTab/lists',array('menu_id'=>$vo2['menu_id'])); ?>">
                                    <span class="icon-edit"></span> Tab</a>
                                   <a class="" href="javascript:void(0)" onclick="return del(<?php echo $vo2['menu_id']; ?>)"><span class="icon-trash-o"></span> 删除</a>
                            </div>
                        </td>
                    </tr>
                    <?php endforeach; endif; else: echo "<tr><td colspan='4'>暂时没有数据</td></tr>" ;endif; endif; endforeach; endif; else: echo "<tr><td colspan='4'>暂时没有数据</td></tr>" ;endif; endif; endforeach; endif; else: echo "<tr><td colspan='4'>暂时没有数据</td></tr>" ;endif; ?>
                </table>

            </form>
        </div>
<script type="text/javascript">
    function del(id){
        if (confirm("您确定要删除吗?")){
            window.location.href = "<?php echo url('Menus/sdelete'); ?>" + "?id=" + id;
        }
    }

    $("#checkall").click(function(){
        $("input[name='id[]']").each(function(){
            if (this.checked) {
                this.checked = false;
            } else {
                this.checked = true;
            }
        });
    });

    function DelSelect(){
        var Checkbox = false;
        $("input[name='id[]']").each(function(){
            if (this.checked == true) {
                Checkbox = true;
            }
        });
        if (Checkbox){
            var t = confirm("您确认要删除选中的内容吗？");
            if (t == false) return false;
            $("#forms").attr("action", "<?php echo url('Admins/sdeletes'); ?>");
            $("#forms").submit();
        } else {
            alert("请选择您要删除的内容!");
            return false;
        }
    }
    function add_data() {
        if ($(".admin-panel").hasClass('hidden-b')) {
            $(".admin-panel").removeClass('hidden-b');
        }
    }
</script>
</body>
</html>