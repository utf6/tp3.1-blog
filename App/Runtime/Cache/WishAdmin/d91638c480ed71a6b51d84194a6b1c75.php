<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
	<title>角色列表</title>
	<link rel="stylesheet" href="/Public/Css/public.css" />
</head>
<body>
	<table class="table">
		<tr align='left'>
			<td colspan="6">
				<a href="<?php echo U('Rbac/addRole');?>">
					<input type="button" class="btn2" value="添加角色" /> 
				</a>
			</td>
		</tr>
		<tr>
			<th><input type="checkbox" /></th>
			<th>编号</th>
			<th>名称</th>
			<th>说明</th>
			<th>状态</th>
			<th>操作</th>
		</tr>
		<?php if(is_array($role)): foreach($role as $key=>$v): ?><tr align='center'>
				<td width='3%'><input type="checkbox" /></td>
				<td width='5%'><?php echo ($v["id"]); ?></td>
				<td><?php echo ($v["name"]); ?></td>
				<td><?php echo ($v["remark"]); ?></td>
				<td>
					<?php if($v['status']): ?>正常
					<?php else: ?>
						禁用<?php endif; ?>
				</td>
				<td>
					<a class="btn3" href="<?php echo U('Rbac/access', array('rid' => $v['id']));?>">授权</a>
					<?php if($v["status"]): ?><a class="btn3" href="<?php echo U('Rbac/ableRole', array('id' => $v['id'], 'status' => 0));?>">禁用</a>
					<?php else: ?>
						<a class="btn3" href="<?php echo U('Rbac/ableRole', array('id' => $v['id'], 'status' => 1));?>">启用</a><?php endif; ?>
				</td>
			</tr><?php endforeach; endif; ?>
	</table>
</body>
</html>