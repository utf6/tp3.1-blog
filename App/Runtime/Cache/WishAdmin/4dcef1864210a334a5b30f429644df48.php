<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
	<title>添加节点</title>
	<link rel="stylesheet" href="/Public/Css/public.css" />
</head>
<body>
	<form action="<?php echo U('Rbac/doAddNode');?>" method='post'>
		<table class="table">
			<tr>
				<td colspan="2"><input type="button" value='添加<?php echo ($type); ?>' /></td>
			</tr>
			<tr>
				<td align="right"><?php echo ($type); ?>名称：</td>
				<td><input type="text" name='name' /></td>
			</tr>
			<tr>
				<td align="right"><?php echo ($type); ?>描述：</td>
				<td><input type="text" name='title' /></td>
			</tr>
			<tr>
				<td align="right">状态：</td>
				<td>
					<input type="radio" name='status' value='1' checked='checked' />&nbsp;启用&nbsp;
					<input type="radio" name='status' value='0' />&nbsp;禁用
				</td>
			</tr>
			<tr>
				<td align="right">排序：</td>
				<td><input type="text" name='sort' value='1' /></td>
			</tr>
			<tr>
				<td colspan="2" align="center">
					<input type="hidden" name='pid' value='<?php echo ($pid); ?>' />
					<input type="hidden" name='level' value='<?php echo ($level); ?>' />
					<input type="submit" class='btn2' value='保存添加' />
				</td>
			</tr>
		</table>
	</form>
	
</body>
</html>