<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:82:"D:\self_code\public_auto_houtai\public/../application/admin\view\index\emptys.html";i:1489975689;}*/ ?>
<!DOCTYPE html>
<html lang="zh-cn">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <meta name="renderer" content="webkit">
    <title>网站信息</title>  
    <link rel="stylesheet" href="__static__/admin/css/pintuer.css">
    <link rel="stylesheet" href="__static__/admin/css/admin.css">
    <script src="__static__/admin/js/jquery.js"></script>
    <script src="__static__/admin/js/pintuer.js"></script>  
</head>
<body>
<div class="panel admin-panel">
  <div class="panel-head"><strong><span class="icon-pencil-square-o"></span> 基本信息</strong></div>
  <div class="body-content">
    <div style="width:100%;text-align:center;">欢迎管理员：<?php echo $_SESSION['think']['intranet']['admin']['user_name'];?>，您的登录时间是：<?php echo date("Y-m-d H:i:s");?></div>
  </div>
</div>
</body></html>