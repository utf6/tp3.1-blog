<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
	<title>用户管理-虎书问答</title>
	<link rel="stylesheet" href="/Public/Css/public.css" />
</head>
<body>
	<table class="table">
		<tr>
			<th style="text-align:left;" colspan="13">用户管理</th>
		</tr>
		<tr align='center'>
			<td><input type="checkbox" /></td>
			<td><b>ID</b></td>
			<td><b>用户名</b></td>
			<td><b>头像</b></td>
			<td><b>回答数</b></td>
			<td><b>提问数</b></td>
			<td><b>等级</b></td>
			<td><b>金币</b></td>
			<td><b>采纳率</b></td>
			<td><b>上次登录时间</b></td>
			<td><b>上次登录IP</b></td>
			<td><b>状态</b></td>
			<td><b>操作</b></td>
		</tr>
		<?php if(is_array($user)): foreach($user as $key=>$v): ?><tr align='center'>
				<td><input type="checkbox" /></td>
				<td><?php echo ($v["id"]); ?></td>
				<td><?php echo ($v["username"]); ?></td>
				<td><img src="<?php if($v["face"]): ?>/Uploads/Face/s_<?php echo ($v["face"]); else: ?>/Public/Images/noface.gif<?php endif; ?>" width='48' height='48' alt="<?php echo ($v["username"]); ?>" /> </td>
				<td><?php echo ($v["answer"]); ?></td>
				<td><?php echo ($v["ask"]); ?></td>
				<td><?php echo exp_to_level($v['exp']);?></td>
				<td><?php echo ($v["point"]); ?></td>
				<td><?php echo floor($v['adopt'] / $v['answer'] * 100);?>%</td>
				<td><?php echo (date('y-m-d H:i',$v["logintime"])); ?></td>
				<td><?php echo ($v["loginip"]); ?></td>
				<td><?php if($v["lock"]): ?><font color='red'>锁定</font><?php else: ?><font color='green'>正常</font><?php endif; ?></td>
				<td>
					<?php if($v["lock"]): ?><a class="btn3" onclick="return confirm('确认解锁？')" href="<?php echo U('User/lock', array('id' => $v['id'], 'lock' => '0'));?>">解锁</a>
					<?php else: ?>
						<a class="btn3" onclick="return confirm('确认锁定？')" href="<?php echo U('User/lock', array('id' => $v['id'], 'lock' => '1'));?>">锁定</a><?php endif; ?>
				</td>			
			</tr><?php endforeach; endif; ?>
		<tr><td class="page" colspan="13" align='center'><?php echo ($page); ?></td></tr>
	</table>
</body>
</html>