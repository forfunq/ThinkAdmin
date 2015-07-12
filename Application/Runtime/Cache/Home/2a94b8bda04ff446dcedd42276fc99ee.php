<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title><?php echo ($title); ?></title>
	<link rel="stylesheet" href="/Application/Home/View//Public/static/css/style.css">
	<script type="text/javascript" src="/Application/Home/View//Public/static/js/init.js"></script>
</head>
<body>
	<h3>欢迎使用ThinkPHP通用后台</h3>
	<p>列表页: <a href="<?php echo U('Post/index',array('name'=>'cnsecer'));?>"><?php echo U('Post/index',array('name'=>'cnsecer'));?></a> </p>
	<p>详情页: <a href="<?php echo U('Post/view',array('id'=>1));?>"><?php echo U('Post/view',array('id'=>1));?></a> </p>
	<p>单页: <a href="<?php echo U('Page/index',array('name'=>'cnsecer'));?>"><?php echo U('Page/index',array('name'=>'cnsecer'));?></a> </p>
	<hr>
	<p>后台地址: <a href="admin.php">admin.php</a></p>
	<p>账号:admin</p>
	<p>密码:admin</p>
</body>
</html>