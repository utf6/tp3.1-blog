<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
	<title>问题管理-虎书问答</title>
	<link rel="stylesheet" href="/Public/Css/public.css" />
</head>
<body>
	<table class="table">
		<tr><th colspan="10" style="text-align:left">问题管理</b></tr>
		<tr align='center'>
			<td><input type="checkbox" /></td>
			<td><b>ID</b></td>
			<td width='40%'><b>内容</b></td>
			<td><b>所属栏目</b></td>
			<td><b>悬赏</b></td>
			<td><b>回答数</b></td>
			<td><b>是否解决</b></td>
			<td><b>提问时间</b></td>
			<td><b>提问者</b></td>
			<td><b>操作</b></td>
		</tr>
		<?php if(is_array($ask)): foreach($ask as $key=>$v): ?><tr align='center'>
				<td><input type="checkbox" /></td>
				<td><?php echo ($v["id"]); ?></td>
				<td><?php echo ($v["content"]); ?></td>
				<td><?php echo ($v["name"]); ?></td>
				<td><?php echo ($v["reward"]); ?></td>
				<td><?php echo ($v["answer"]); ?></td>
				<td><?php if($v["solved"]): ?><font color='green'>已解决</font><?php else: ?><font color='red'>未解决</font><?php endif; ?></td>
				<td><?php echo (date('y-m-d H:i', $v["time"])); ?></td>
				<td><?php echo ($v["asker"]); ?></td>
				<td>
					<a class='btn3' href="<?php echo U('Ask/delete', array('id' => $v['id'], 'uid' => $v['uid']));?>">删除</a>
				</td>
			</tr><?php endforeach; endif; ?>
		<tr><td class='page' colspan="10" align='center'><?php echo ($page); ?></td> </tr>
	</table>
</body>
</html>