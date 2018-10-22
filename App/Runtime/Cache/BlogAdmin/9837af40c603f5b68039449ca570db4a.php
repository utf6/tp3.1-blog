<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
	<title>修改密码</title>
	<link rel="stylesheet" href="/Public/Css/public.css" />
</head>
<body>
	<form action="<?php echo U('System/editPwd');?>" method="post">
		<table class="table">
			<tr><th style="text-align:left;" colspan='2'><b>修改密码</b></th></tr>
			<tr>
				<td width="40%" align='right'>当前账号：</td>
				<td><b><?php echo (session('username')); ?></b></td>
			</tr>
			<tr>
				<td align='right'>原始密码：</td>
				<td><input type="password" name="password" /></td>
			</tr>
			<tr>
				<td align="right">新密码：</td>
				<td><input type="password" name="newPwd" /></td>
			</tr>
			<tr>
				<td align="right">确认密码：</td>
				<td><input type="password" name="Pwded" /></td>
			</tr>
			<tr><td colspan="2" align='center'><input type="submit" class="btn2" value="保存修改" /></td></tr>
		</table>
	</form>
	
</body>
</html>