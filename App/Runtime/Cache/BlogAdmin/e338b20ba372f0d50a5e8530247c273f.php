<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>登录博客后台</title>
<link rel="stylesheet" type="text/css" href="/Public/Css/login.css" />
<link rel="stylesheet" type="text/css" href="/Public/Css/page.css" />
<script type="text/javascript" src="/Public/Js/jquery-1.8.2.min.js"></script>
<script type="text/javascript">
	$(function(){
		var verifyUrl = "<?php echo U('verify');?>";
		$(".yzm").attr('src', verifyUrl + '/' + Math.random());
		$(".getYZM").val('');
		
		$(".yzm").click(function(){
			$(this).attr('src', verifyUrl + '/' + Math.random());
		});
	});
</script>
</head>
<body>
	<div class="logHead">
		<img src="/Public/Images/logLOGO.jpg" />
	</div>
	<div class="logDiv">
		<form action="<?php echo U('login');?>" method="post">
			<div class="logGet">
				<div class="logD logDtip">
					<p class="p1">博客后台登录</p>
				</div>
				<div class="lgD">
					<img class="img1" src="/Public/Images/logName.png" />
					<input type="text" name="username" placeholder="输入用户名" />
				</div>
				<div class="lgD">
					<img class="img1" src="/Public/Images/logPwd.png" />
					<input type="password" name="password" placeholder="输入用户密码" />
				</div>
				<div class="lgD logD2">
					<input class="getYZM" type="text" name="verify" placeholder="输入验证码" />
					<div class="logYZM">
						<img title="点击刷新" class="yzm" src="<?php echo U('verify', array());?>" />
					</div>
				</div>
				<div class="logC">
					<input type="submit" class="button" value="登 录" />
				</div>
			</div>
		</form>			
	</div>
	<div class="logFoot">
		<p class="p1"><?php echo (C("blog_title")); ?></p>
		<p class="p2"><?php echo (C("blog_copyright")); ?></p>
	</div>
</body>
</html>