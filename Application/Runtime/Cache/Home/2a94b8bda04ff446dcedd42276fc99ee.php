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
	<p>登录页: <a href="<?php echo U('login/login');?>"><?php echo U('login/login');?></a></p>
	<p>QQ登录: <a href="<?php echo U('login/login',array('type'=>'qq'));?>"><?php echo U('login/login',array('type'=>'qq'));?></a></p>
	<hr>
	<p>后台地址: <a href="admin.php">admin.php</a></p>
	<p>账号:admin</p>
	<p>密码:admin</p>
</body>

<script type="text/javascript" src="http://res.wx.qq.com/open/js/jweixin-1.0.0.js"></script>
<script>
  wx.config({
    debug: false,
    appId: '<?php echo $signPackage["appId"];?>',
    timestamp: <?php echo $signPackage["timestamp"];?>,
    nonceStr: '<?php echo $signPackage["nonceStr"];?>',
    signature: '<?php echo $signPackage["signature"];?>',
    jsApiList: [
      // 所有要调用的 API 都要加到这个列表中
        'onMenuShareTimeline',
        'onMenuShareAppMessage',
        'onMenuShareQQ',
        'onMenuShareWeibo',
        'onMenuShareQZone'
    ]
  });
  wx.ready(function () {
    // 在这里调用 API
        //获取“分享到朋友圈”按钮点击状态及自定义分享内容接口
        wx.onMenuShareTimeline({
            title: 'ThinkAdmin分享标题', // ThinkAdmin分享标题
            link:  window.location.href, // 分享链接
            imgUrl: '<?php echo $signPackage["logo"];?>', // 分享图标
        });
        //获取“分享给朋友”按钮点击状态及自定义分享内容接口
        wx.onMenuShareAppMessage({
            title: 'ThinkAdmin分享标题', // ThinkAdmin分享标题
            desc: 'ThinkAdmin通用后台管理系统,博客：http://www.cnsecer.com', // 分享描述
            link:  window.location.href, // 分享链接
            imgUrl: '<?php echo $signPackage["logo"];?>', // 分享图标
            type: '', // 分享类型,music、video或link，不填默认为link
            dataUrl: '', // 如果type是music或video，则要提供数据链接，默认为空
        });
        //获取“分享到QQ”按钮点击状态及自定义分享内容接口
        wx.onMenuShareQQ({
            title: 'ThinkAdmin分享标题', // ThinkAdmin分享标题
            title: 'ThinkAdmin分享标题', // ThinkAdmin分享标题
            desc: 'ThinkAdmin通用后台管理系统,博客：http://www.cnsecer.com', // 分享描述
            link:  window.location.href, // 分享链接
            imgUrl: '<?php echo $signPackage["logo"];?>', // 分享图标
        });
        //获取“分享到腾讯微博”按钮点击状态及自定义分享内容接口
        wx.onMenuShareWeibo({
            title: 'ThinkAdmin分享标题', // ThinkAdmin分享标题
            desc: 'ThinkAdmin通用后台管理系统,博客：http://www.cnsecer.com', // 分享描述
            link:  window.location.href, // 分享链接
            imgUrl: '<?php echo $signPackage["logo"];?>', // 分享图标
    
        });
        //获取“分享到QQ空间”按钮点击状态及自定义分享内容接口
        wx.onMenuShareQZone({
            title: 'ThinkAdmin分享标题', // ThinkAdmin分享标题
            desc: 'ThinkAdmin通用后台管理系统,博客：http://www.cnsecer.com', // 分享描述
            link:  window.location.href, // 分享链接
            imgUrl: '<?php echo $signPackage["logo"];?>', // 分享图标
        });
  });
</script>


</html>