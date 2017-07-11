<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:87:"D:\self_code\public_auto_houtai\public/../application/admin\view\pub_action\plists.html";i:1498282491;}*/ ?>
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
<body>
<div class="panel admin-panel">
  <div class="panel-head"><strong class="icon-reorder"> 列表</strong></div>
  <div class="padding border-bottom">
  
  <div class="padding border-bottom">
        <ul class="search">
            <li>
                <?php if(is_array($tab_list) || $tab_list instanceof \think\Collection): $i = 0; $__LIST__ = $tab_list;if( count($__LIST__)==0 ) : echo "<li>暂无数据</li>" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
            <a href="<?php echo url('PubAction/index',array('menu_id'=>$tab_arr['menu_id'],'tab_id'=>$vo['tab_id'])); ?>">
                <?php if($vo['tab_id'] == $tab_arr['tab_id']): ?>
                <button type="button" class="btn btn-primary"> <?php echo $vo['tab_name']; ?></button>
                <?php else: ?>
                <button type="button" class="btn btn-default"> <?php echo $vo['tab_name']; ?> </button>
                <?php endif; ?>

            </a>&nbsp;&nbsp;
            <?php endforeach; endif; else: echo "<li>暂无数据</li>" ;endif; ?>
            </li>
        </ul>
    </div>
    
    <br />
    <ul class="search">
        <li>
            <button type="button" class="button border-yellow" onclick="return add_data();"><span class="icon-plus-square-o"></span> 添加数据</button>
            <button type="button"  class="button border-green" id="checkall"><span class="icon-check"></span> 全选</button>
            <button type="button" onclick="return DelSelect();" class="button border-red"><span class="icon-trash-o"></span> 批量删除</button>
        </li>
    </ul>
    
  </div>
  <form method="post" id="forms" action="">
  <input type="hidden" name="tab_id" value="<?php echo $tab_arr['tab_id']; ?>">
  <input type="hidden" name="pk" value="<?php echo $pk; ?>">
  <table class="table table-hover text-center">
    <tr>
        <th width="">请选择</th>
        <?php if(is_array($titles) || $titles instanceof \think\Collection): $i = 0; $__LIST__ = $titles;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
            <th width=""><?php echo $vo; ?></th>
        <?php endforeach; endif; else: echo "" ;endif; ?>
        <th width="">操作</th>
    </tr>
    <?php if(is_array($lists) || $lists instanceof \think\Collection): $i = 0; $__LIST__ = $lists;if( count($__LIST__)==0 ) : echo "<tr><td colspan='$titles_count+2'>暂时没有数据</td></tr>" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
        <tr>
        <td><input type="checkbox" name="<?php echo $pk; ?>[]" value="<?php echo $vo[$pk]; ?>" />
                </td>
        <?php if(is_array($titles) || $titles instanceof \think\Collection): $i = 0; $__LIST__ = $titles;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo1): $mod = ($i % 2 );++$i;if(isset($vo[$key."_tname"])) {?>
                <td><?php echo $vo[$key."_tname"]; ?></td>
            <?php } else {?>
                <td><?php echo $vo[$key]; ?></td>
            <?php } endforeach; endif; else: echo "" ;endif; ?>
        
          <td><div class="button-group"> <a class="button border-main" href="<?php echo url('PubAction/pedits',array('tab_id'=>$tab_arr['tab_id'],$pk=>$vo[$pk])); ?>"><span class="icon-edit"></span> 修改</a>
          <a class="button border-red" href="javascript:void(0)" onclick="return del(<?php echo $vo[$pk]; ?>)"><span class="icon-trash-o"></span> 删除</a> </div></td>
        </tr>
        
    <?php endforeach; endif; else: echo "<tr><td colspan='$titles_count+2'>暂时没有数据</td></tr>" ;endif; ?>
    <tr>
      <td colspan="<?php echo $titles_count+2; ?>"><?php echo $lists->render(); ?></td>
    </tr>
  </table>
  </form>
</div>
<script type="text/javascript">
function del(id){
	if(confirm("您确定要删除吗?")){
        var pk = $("input[name='pk']").val();
        var tab_id = $("input[name='tab_id']").val();
		window.location.href="<?php echo url('PubAction/pdelete'); ?>"+"?tab_id="+tab_id+"&"+pk+"="+id;
	}
}

$("#checkall").click(function(){ 
  $("input[name='<?php echo $pk; ?>[]']").each(function(){
	  if (this.checked) {
		  this.checked = false;
	  }
	  else {
		  this.checked = true;
	  }
  });
})

function DelSelect(){
	var Checkbox=false;
    var pk = $("input[name='pk']").val();
	 $("input[name='"+pk+"[]']").each(function(){
	  if (this.checked==true) {
		Checkbox=true;	
	  }
	});
	if (Checkbox){
		var t=confirm("您确认要删除选中的内容吗？");
		if (t==false) return false; 		
        $("#forms").attr("action","<?php echo url('PubAction/pdeletes'); ?>");
        $("#forms").submit();
	}
	else{
		alert("请选择您要删除的内容!");
		return false;
	}
}
function add_data() {
    window.location.href="<?php echo url('PubAction/padd_data',array('tab_id'=>$tab_arr['tab_id'])); ?>";
}
</script>

</body>
</html>