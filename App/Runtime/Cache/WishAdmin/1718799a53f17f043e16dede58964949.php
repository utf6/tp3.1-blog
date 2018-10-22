<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
	<title>用户管理</title>
	<link rel="stylesheet" href="/Public/Css/public.css" />
	<script type="text/javascript" src="/Public/Js/jquery-1.8.2.min.js"></script>
	<script type="text/javascript">
		$(function(){
			$("input[name='user[]']").click(function(){
				var inputs = $(this).parents('.table').find('input');
				$(this).attr('checked') ? inputs.attr('checked', 'checked') : inputs.removeAttr('checked');
			});

			$("#delUser").click(function(){
				var ids = $("input[name='users[]']");
				alert(ids.val());
			});
		});
	</script>
</head>
<body>
	<table class="table">
		<tr width='40px' align="left">
			<td  colspan='8'>
				<a class="btn3" href="<?php echo U('Rbac/addUser');?>">添加用户</a>
				<a id="delUser" class="btn3" onclick="return confirm('确定删除？')" href="">删除</a>			
				<span style="float:right;color:red;">重置密码为：<b>123456</b></span>
			</td>
		</tr>
		<tr>
			<th><input type="checkbox" name='user[]'/></th>
			<th>编号</th>
			<th>账号</th>
			<th>上次登录时间</th>
			<th>上次登录IP</th>
			<th>状态</th>
			<th>用户所属角色</th>
			<th>操作</th>
		</tr>
		<?php if(is_array($user)): foreach($user as $key=>$v): ?><tr align='center'>
				<td width='3%'><input type="checkbox" name='users[]' value="<?php echo ($v["id"]); ?>" /></td>
				<td width='5%'><?php echo ($v["id"]); ?></td>
				<td><?php echo ($v["username"]); ?></td>
				<td><?php if($v['logintime']): echo (date('Y-m-d H:i', $v["logintime"])); else: ?>暂未登录<?php endif; ?></td>
				<td><?php echo ($v["loginip"]); ?></td>
				<td><?php if($v['lock'] == 1): ?>已锁定<?php else: ?>正常<?php endif; ?></td>
				<td>
					<?php if($v["username"] == C('RBAC_SUPERADMIN')): ?>超级管理员
					<?php else: ?>
						<ul>
							<?php if(is_array($v["role"])): foreach($v["role"] as $key=>$k): ?><li><?php echo ($k["remark"]); ?></li><?php endforeach; endif; ?>
						</ul><?php endif; ?>						
				</td>
				<td width="20%">
					<?php if($v["username"] == C('RBAC_SUPERADMIN')): ?>不可操作
					<?php else: ?>
						<?php if($v['lock']): ?><a class="btn3" onclick="return confirm('确认解锁？')" href="<?php echo U('Rbac/lockUser', array('id' => $v['id'], 'lock' => 0));?>">解锁</a>
						<?php else: ?>
							<a class="btn3" onclick="return confirm('确认锁定？')" href="<?php echo U('Rbac/lockUser', array('id' => $v['id'], 'lock' => 1));?>">锁定</a><?php endif; ?>
						<a class="btn3" onclick="return confirm('确定删除？')" href="<?php echo U('Rbac/delUser', array('id' => $v['id']));?>">删除</a>
						<a onclick="return confirm('确定重置？')" class="btn3" href="<?php echo U('Rbac/reset', array('id' => $v['id']));?>">重置密码</a><?php endif; ?>
					
				</td>
			</tr><?php endforeach; endif; ?>
	</table>
</body>
</html>