<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:81:"D:\self_code\public_auto_houtai\public/../application/admin\view\index\index.html";i:1498061637;}*/ ?>
<!DOCTYPE html>
<html lang="zh-cn">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <meta name="renderer" content="webkit">
    <title>后台管理中心</title>  
    <link rel="stylesheet" href="__static__/admin/css/pintuer.css">
    <link rel="stylesheet" href="__static__/admin/css/admin.css">
    <script src="__static__/admin/js/jquery.js"></script>   
    <link rel="shortcut icon" href="__static__/index/images/favicon.ico" />
</head>
<body style="background-color:#f2f9fd;">
<div class="header bg-main">
  <div class="logo margin-big-left fadein-top">
    <h1><img src="__static__/admin/images/y.jpg" class="radius-circle rotate-hover" height="50" alt="" />后台管理中心</h1>
  </div>
  <div class="head-l"><a class="button button-little bg-green" href="<?php echo url('/index/index'); ?>" target="_blank"><span class="icon-home"></span> 前台首页</a><!-- &nbsp;&nbsp;<a href="__static__/admin/##" class="button button-little bg-blue"><span class="icon-wrench"></span> 清除缓存</a>--> &nbsp;&nbsp;<a class="button button-little bg-red" href="<?php echo url('Login/login_out'); ?>"><span class="icon-power-off"></span> 退出登录</a> </div>
</div>
<div class="leftnav">
  <div class="leftnav-title"><strong><span class="icon-list"></span>菜单列表</strong></div>
  
  <h2><span class="icon-user"></span>基本设置</h2>
  <ul style="display:block">
    <li><a href="<?php echo url('Index/pass'); ?>" target="right"><span class="icon-caret-right"></span>修改密码</a></li>
    <?php if($id == '1'): ?>
    <li><a href="<?php echo url('Index/info'); ?>" target="right"><span class="icon-caret-right"></span>网站设置</a></li>
    <li><a href="<?php echo url('Admins/lists'); ?>" target="right"><span class="icon-caret-right"></span>账号管理</a></li>
    <li><a href="<?php echo url('Menus/lists'); ?>" target="right"><span class="icon-caret-right"></span>栏目管理</a></li>
    <?php endif; ?>
  </ul>
  
  <!--用户操作部分-->
    <?php if(is_array($menu_list) || $menu_list instanceof \think\Collection): $i = 0; $__LIST__ = $menu_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
    <h2><span class="icon-user"></span><?php echo $vo['mark_str']; ?><?php echo $vo['menu_name']; ?></h2>
        <?php if(!(empty($vo['children']) || ($vo['children'] instanceof \think\Collection && $vo['children']->isEmpty()))): ?>
        <ul style="display:block">
            <?php if(is_array($vo['children']) || $vo['children'] instanceof \think\Collection): $i = 0; $__LIST__ = $vo['children'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo1): $mod = ($i % 2 );++$i;?>
            <li><a href="<?php echo url('PubAction/index',array('menu_id'=>$vo1['menu_id'])); ?>" target="right"><span class="icon-caret-right"></span><?php echo $vo1['mark_str']; ?><?php echo $vo1['menu_name']; ?></a></li>
                <?php if(!(empty($vo1['children']) || ($vo1['children'] instanceof \think\Collection && $vo1['children']->isEmpty()))): if(is_array($vo1['children']) || $vo1['children'] instanceof \think\Collection): $i = 0; $__LIST__ = $vo1['children'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo2): $mod = ($i % 2 );++$i;?>
                        <li><a href="<?php echo url('PubAction/index',array('menu_id'=>$vo1['menu_id'])); ?>" target="right"><span class="icon-caret-right"></span><?php echo $vo2['mark_str']; ?><?php echo $vo2['menu_name']; ?></a></li>
                    <?php endforeach; endif; else: echo "" ;endif; endif; endforeach; endif; else: echo "" ;endif; ?>
        </ul>
        <?php endif; endforeach; endif; else: echo "" ;endif; ?>
</div>
<script type="text/javascript">
$(function(){
  $(".leftnav h2").click(function(){
	  $(this).next().slideToggle(200);	
	  $(this).toggleClass("on"); 
  })
  $(".leftnav ul li a").click(function(){
	    $("#a_leader_txt").text($(this).text());
  		$(".leftnav ul li a").removeClass("on");
		$(this).addClass("on");
  })
});
</script>
<ul class="bread">
  <li><a href="<?php echo url('Index/info'); ?>" target="right" class="icon-home"> 首页</a></li>
  <li><a href="__static__/admin/" id="a_leader_txt">网站信息</a></li>
  <li><b>当前语言：</b><span style="color:red;">中文</php></span>
  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;切换语言：<a href="__static__/admin/##">中文</a> &nbsp;&nbsp;<a href="__static__/admin/##">英文</a> </li>
</ul>
<div class="admin">
  <iframe scrolling="auto" rameborder="0" src="<?php echo url('Index/emptys'); ?>" name="right" width="100%" height="100%"></iframe>
</div>
<div style="text-align:center;">
<p></p>
</div>
</body>
</html>