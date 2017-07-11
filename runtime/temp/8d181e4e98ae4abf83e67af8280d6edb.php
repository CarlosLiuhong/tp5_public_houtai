<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:87:"D:\self_code\public_auto_houtai\public/../application/admin\view\pub_action\pedits.html";i:1498280919;}*/ ?>
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
<script src="__static__/admin/js/jquery.js"></script>
<script src="__static__/admin/js/pintuer.js"></script>
<link rel="stylesheet" href="__static__/public/css/bootstrap.min.css">
<script src="__static__/public/js/bootstrap.min.js"></script>
</head>
<!-- KindEditor -->		
<link rel="stylesheet" href="__static__/admin/js/kindeditor/themes/default/default.css" />
<link rel="stylesheet" href="__static__/admin/js/kindeditor/plugins/code/prettify.css" />
<script charset="utf-8" src="__static__/admin/js/kindeditor/kindeditor.js"></script>
<script charset="utf-8" src="__static__/admin/js/kindeditor/lang/zh_CN.js"></script>
<script charset="utf-8" src="__static__/admin/js/kindeditor/plugins/code/prettify.js"></script>
<!-- /KindEditor -->	
<body>
<div class="panel admin-panel margin-top">
  <div class="panel-head" id="add"><strong><span class="icon-pencil-square-o"></span>编辑</strong></div>
  <div class="body-content">
    <form method="post" class="form-x" action="" enctype="multipart/form-data" >
        <input type="hidden" name="<?php echo $pk_name; ?>" value="<?php echo $detail[$pk_name]; ?>">
        <input type="hidden" name="tab_id" value="<?php echo $tab_arr['tab_id']; ?>">
        <?php if(is_array($tabfield) || $tabfield instanceof \think\Collection): $i = 0; $__LIST__ = $tabfield;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;if($vo['tbf_show'] == '1'): ?>
                <div class="form-group">
            <?php else: ?>
                <div class="form-group hide">
            <?php endif; ?>
            
                <div class="label">
                    <label><?php echo $vo['tbf_field_name']; ?>：</label>
                </div>
                <div class="field">
                    <?php if($vo['tbf_field_type'] == 'readonlys'): ?>
                        <?php echo $detail[$vo['tbf_field']]; elseif($vo['tbf_field_type'] == 'text'): ?>
                        <input type="<?php echo $vo['tbf_field_type']; ?>" class="input w50" name="<?php echo $vo['tbf_field']; ?>" value="<?php echo $detail[$vo['tbf_field']]; ?>" />
                    <?php elseif($vo['tbf_field_type'] == 'number'): ?>
                        <input type="<?php echo $vo['tbf_field_type']; ?>" class="input w50" name="<?php echo $vo['tbf_field']; ?>" value="<?php echo $detail[$vo['tbf_field']]; ?>" />
                    <?php elseif($vo['tbf_field_type'] == 'radio'): if(isset($out_table[$vo['tbf_table_in']])) {if(is_array($out_table[$vo['tbf_table_in']]) || $out_table[$vo['tbf_table_in']] instanceof \think\Collection): $i = 0; $__LIST__ = $out_table[$vo['tbf_table_in']];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo1): $mod = ($i % 2 );++$i;?>
                                <input type="<?php echo $vo['tbf_field_type']; ?>" name="<?php echo $vo['tbf_field']; ?>" value="<?php echo $vo1[$vo['tbf_table_in_field']]; ?>" <?php if($detail[$vo['tbf_field']] == $vo1[$vo['tbf_table_in_field']]): ?>checked<?php endif; ?> ><?php echo $vo1[$vo['tbf_table_in_field_show']]; ?>&nbsp;&nbsp;
                            <?php endforeach; endif; else: echo "" ;endif; } else { foreach($widget_arr[$vo['tbf_field']] as $k1 => $v1) {?>
                                <input type="<?php echo $vo['tbf_field_type']; ?>" name="<?php echo $vo['tbf_field']; ?>" value="<?php echo $k1; ?>" <?php if($detail[$vo['tbf_field']] == $k1): ?>checked<?php endif; ?> ><?php echo $v1; ?>&nbsp;&nbsp;
                        <?php } }elseif($vo['tbf_field_type'] == 'checkbox'): if(isset($out_table[$vo['tbf_table_in']])) {if(is_array($out_table[$vo['tbf_table_in']]) || $out_table[$vo['tbf_table_in']] instanceof \think\Collection): $i = 0; $__LIST__ = $out_table[$vo['tbf_table_in']];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo1): $mod = ($i % 2 );++$i;?>
                            <input type="<?php echo $vo['tbf_field_type']; ?>" name="<?php echo $vo['tbf_field']; ?>[]" value="<?php echo $vo1[$vo['tbf_table_in_field']]; ?>"><?php echo $vo1[$vo['tbf_table_in_field_show']]; ?>&nbsp;&nbsp;
                        <?php endforeach; endif; else: echo "" ;endif; } else { foreach($widget_arr[$vo['tbf_field']] as $k1 => $v1) {?>
                                <input type="<?php echo $vo['tbf_field_type']; ?>" name="<?php echo $vo['tbf_field']; ?>" value="<?php echo $k1; ?>" <?php if($detail[$vo['tbf_field']] == $k1): ?>checked<?php endif; ?> ><?php echo $v1; ?>&nbsp;&nbsp;
                        <?php } }elseif($vo['tbf_field_type'] == 'select'): ?>
                        <select class="form-control tbf_field_type2" style="width:200px;" name="<?php echo $vo['tbf_field']; ?>">
                            <option value="">请选择</option>
                            <?php if(isset($out_table[$vo['tbf_table_in']])) {if(is_array($out_table[$vo['tbf_table_in']]) || $out_table[$vo['tbf_table_in']] instanceof \think\Collection): $i = 0; $__LIST__ = $out_table[$vo['tbf_table_in']];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo1): $mod = ($i % 2 );++$i;?>
                                <option value="<?php echo $vo1[$vo['tbf_table_in_field']]; ?>" <?php if($vo1[$vo['tbf_table_in_field']] == $detail[$vo['tbf_field']]): ?>selected<?php endif; ?> ><?php echo $vo1[$vo['tbf_table_in_field_show']]; ?></option>
                            <?php endforeach; endif; else: echo "" ;endif; } else { foreach($widget_arr[$vo['tbf_field']] as $k1 => $v1) {?>
                                <option value="<?php echo $k1; ?>" <?php if($detail[$vo['tbf_field']] == $k1): ?>selected<?php endif; ?> ><?php echo $v1; ?>&nbsp;&nbsp;
                            <?php } }?>
                        </select>
                    <?php elseif($vo['tbf_field_type'] == 'textarea'): ?>
                        <textarea name="<?php echo $vo['tbf_field']; ?>" style="width:400px;height:200px;"><?php echo $detail[$vo['tbf_field']]; ?></textarea>
                    <?php elseif($vo['tbf_field_type'] == 'image'): if($detail[$vo['tbf_field']] != ''): ?>
                            <img src="<?php echo $detail[$vo['tbf_field']]; ?>" class="show_one_img" style="width:100px;">
                        <?php endif; ?>
                        &nbsp;&nbsp;<input type="file" style="display:none;" name="<?php echo $vo['tbf_field']; ?>" class="input_one_img" value="<?php echo $detail[$vo['tbf_field']]; ?>"><button type="button" class="btn btn-primary upload_one_img">上传图片</button>&nbsp;&nbsp;<span class="tip_msg"></span>
                    <?php elseif($vo['tbf_field_type'] == 'imagelist'): elseif($vo['tbf_field_type'] == 'document'): ?>
                        <input type="file" name="<?php echo $detail[$vo['tbf_field']]; ?>" value="<?php echo $detail[$vo['tbf_field']]; ?>">
                    <?php elseif($vo['tbf_field_type'] == 'kindeditor'): ?>
                        <!-- KindEditor -->
                        <script>
                            KindEditor.ready(function(K) {
                                var editor1_<?php echo $vo['tbf_field']; ?> = K.create('textarea[name="<?php echo $vo['tbf_field']; ?>"]', {
                                    cssPath : '__static__/admin/js/kindeditor/plugins/code/prettify.css',
                                    uploadJson : '__static__/admin/js/kindeditor/php/upload_json.php',
                                    fileManagerJson : '__static__/admin/js/kindeditor/php/file_manager_json.php',
                                    allowFileManager : true,
                                    afterCreate : function() {
                                        var self = this;
                                        K.ctrl(document, 13, function() {
                                            self.sync();
                                            K('form[name=form-x]')[0].submit();
                                        });
                                        K.ctrl(self.edit.doc, 13, function() {
                                            self.sync();
                                            K('form[name=form-x]')[0].submit();
                                        });
                                    },
                                    afterBlur: function() {this.sync();}
                                });
                                prettyPrint();
                            });
                        </script>
                        <!-- /KindEditor -->
                        <textarea id="<?php echo $vo['tbf_field']; ?>" name="<?php echo $vo['tbf_field']; ?>" style="width:780px;height:400px;" class="textArea"> <?php echo $detail[$vo['tbf_field']]; ?> </textarea>
                    <?php endif; ?>
                    
                  <div class="tips"></div>
                </div>
            </div>
        <?php endforeach; endif; else: echo "" ;endif; ?>
            
      
      <div class="form-group">
        <div class="label">
          <label></label>
        </div>
        <div class="field">
          <button class="button bg-main icon-check-square-o tijiao" type="button"> 提交</button>
        </div>
      </div>
    </form>
<script>
$(".upload_one_img").click(function() {
    $(this).parent().find(".input_one_img").click();
});
$(".input_one_img").change(function() {
    $(this).parent().find(".tip_msg").html('');
    var img_str = $(this).val();
    $(this).parent().find(".tip_msg").html(img_str);
});
$(".tijiao").click(function() {
    if(confirm('确认提交？')) {
        <?php if(is_array($tabfield) || $tabfield instanceof \think\Collection): $i = 0; $__LIST__ = $tabfield;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;if($vo['tbf_show'] == '1' and $vo['tbf_empty'] != '1'): if($vo['tbf_field_type'] == 'text'): ?>
                    var <?php echo $vo['tbf_field']; ?> = $("input[name='<?php echo $vo['tbf_field']; ?>']").val();
                <?php elseif($vo['tbf_field_type'] == 'number'): ?>
                    var <?php echo $vo['tbf_field']; ?> = $("input[name='<?php echo $vo['tbf_field']; ?>']").val();
                <?php elseif($vo['tbf_field_type'] == 'radio'): ?>
                    var <?php echo $vo['tbf_field']; ?>_array=new Array();  
                    $('input[name="<?php echo $vo['tbf_field']; ?>"]').each(function(i){
                        if(($(this).is(':checked'))) {
                            <?php echo $vo['tbf_field']; ?>_array.push($(this).val());//向数组中添加元素  
                        }
                    });  
                    var <?php echo $vo['tbf_field']; ?>str=<?php echo $vo['tbf_field']; ?>_array.join(',');//将数组元素连接起来以构建一个字符串
                <?php elseif($vo['tbf_field_type'] == 'checkbox'): ?>
                    var <?php echo $vo['tbf_field']; ?>_array=new Array();  
                    $('input[name="<?php echo $vo['tbf_field']; ?>"]').each(function(){  
                        if(($(this).is(':checked'))) {
                            <?php echo $vo['tbf_field']; ?>_array.push($(this).val());//向数组中添加元素  
                        }
                    });  
                    var <?php echo $vo['tbf_field']; ?>str=<?php echo $vo['tbf_field']; ?>_array.join(',');//将数组元素连接起来以构建一个字符串  
                    //alert(idstr);
                <?php elseif($vo['tbf_field_type'] == 'select'): ?>
                    var <?php echo $vo['tbf_field']; ?> = $("select[name='<?php echo $vo['tbf_field']; ?>']").val();
                <?php elseif($vo['tbf_field_type'] == 'textarea'): ?>
                    var <?php echo $vo['tbf_field']; ?> = $("textarea[name='<?php echo $vo['tbf_field']; ?>']").val();
                <?php elseif($vo['tbf_field_type'] == 'image'): ?>
                    var <?php echo $vo['tbf_field']; ?> = $("input[name='<?php echo $vo['tbf_field']; ?>']").val();
                <?php elseif($vo['tbf_field_type'] == 'imagelist'): elseif($vo['tbf_field_type'] == 'document'): ?>
                    var <?php echo $vo['tbf_field']; ?> = $("input[name='<?php echo $vo['tbf_field']; ?>']").val();
                <?php elseif($vo['tbf_field_type'] == 'kindeditor'): ?>
                    var <?php echo $vo['tbf_field']; ?> = $("textarea[name='<?php echo $vo['tbf_field']; ?>']").val();
                <?php endif; endif; endforeach; endif; else: echo "" ;endif; ?>
        
        var err = new Array();
        
        <?php if(is_array($tabfield) || $tabfield instanceof \think\Collection): $i = 0; $__LIST__ = $tabfield;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;if($vo['tbf_show'] == '1' and $vo['tbf_empty'] != '1'): if($vo['tbf_field_type'] == 'text'): ?>
                    if(<?php echo $vo['tbf_field']; ?>.length <= 0) {
                        err.push('缺少<?php echo $vo['tbf_field_name']; ?>');
                    }
                <?php elseif($vo['tbf_field_type'] == 'number'): ?>
                    if(<?php echo $vo['tbf_field']; ?>.length <= 0) {
                        err.push('缺少<?php echo $vo['tbf_field_name']; ?>');
                    }
                <?php elseif($vo['tbf_field_type'] == 'radio'): ?>
                    if(<?php echo $vo['tbf_field']; ?>str.length <= 0) {
                        err.push('缺少<?php echo $vo['tbf_field_name']; ?>');
                    }
                <?php elseif($vo['tbf_field_type'] == 'checkbox'): ?>
                    if(<?php echo $vo['tbf_field']; ?>str.length <= 0) {
                        err.push('缺少<?php echo $vo['tbf_field_name']; ?>');
                    }
                <?php elseif($vo['tbf_field_type'] == 'select'): ?>
                    if(<?php echo $vo['tbf_field']; ?>.length <= 0) {
                        err.push('缺少<?php echo $vo['tbf_field_name']; ?>');
                    }
                <?php elseif($vo['tbf_field_type'] == 'textarea'): ?>
                    if(<?php echo $vo['tbf_field']; ?>.length <= 0) {
                        err.push('缺少<?php echo $vo['tbf_field_name']; ?>');
                    }
                <?php elseif($vo['tbf_field_type'] == 'image'): elseif($vo['tbf_field_type'] == 'imagelist'): elseif($vo['tbf_field_type'] == 'document'): ?>
                    if(<?php echo $vo['tbf_field']; ?>.length <= 0) {
                        err.push('缺少<?php echo $vo['tbf_field_name']; ?>');
                    }
                <?php elseif($vo['tbf_field_type'] == 'kindeditor'): ?>
                    if(<?php echo $vo['tbf_field']; ?>.length <= 0) {
                        err.push('缺少<?php echo $vo['tbf_field_name']; ?>');
                    }
                <?php endif; endif; endforeach; endif; else: echo "" ;endif; ?>
        if(err.length > 0) {
            alert(err);return;
        }
        $(".form-x").attr('action', "<?php echo url('PubAction/psave'); ?>");
        $(".form-x").submit();
    }
});


</script>
  </div>
</div>
</body></html>