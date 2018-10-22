<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
	<title>回答管理-虎书问答</title>
	<link rel="stylesheet" href="/Public/Css/public.css" />
</head>
<body>
	<table class="table">
		<tr><th colspan="9" style="text-align:left">问题管理</b></tr>
		<tr align='center'>
			<td><input type="checkbox" /></td>
			<td><b>ID</b></td>
			<td width='30%'><b>回答内容</b></td>
			<td><b>回答者</b></td>
			<td><b>所属问题</b></td>
			<td><b>提问者</b></td>
			<td><b>回答时间</b></td>
			<td><b>是否被采纳</b></td>
			<td><b>操作</b></td>
		</tr>
		<?php if(is_array($answer)): foreach($answer as $key=>$v): ?><tr align='center'>
				<td><input type="checkbox" /></td>
				<td><?php echo ($v["id"]); ?></td>
				<td><?php echo ($v["content"]); ?></td>
				<td><?php echo ($v["answer"]); ?></td>
				<td><?php echo ($v["ask"]); ?></td>
				<td><?php echo ($v["asker"]); ?></td>
				<td><?php echo (date('y-m-d H:i', $v["time"])); ?></td>
				<td><?php if($v["adopt"]): ?><font color='green'>被采纳</font><?php else: ?><font color='red'>未被采纳</font><?php endif; ?></td>
				<td>
					<a onclick="return confirm('确定删除吗？')" class='btn3' href="<?php echo U('Answer/delete', array('id' => $v['id'], 'aid' => $v['aid'], 'uid' => $v['uid'], 'sloved' => $v['sloved'], 'askId' => $v['askId']));?>">删除</a>
				</td>
			</tr><?php endforeach; endif; ?>
		<tr><td class='page' colspan="10" align='center'><?php echo ($page); ?></td> </tr>
	</table>
</body>
</html>