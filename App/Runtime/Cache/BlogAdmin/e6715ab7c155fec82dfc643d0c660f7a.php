<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
	<title>博文列表</title>
	<link rel="stylesheet" href="/Public/Css/public.css" />
</head>
<body>
	<table class="table">
		<tr><td colspan='8'><b>博文列表</b>&nbsp;<a class="btn3" href="<?php echo U('Blog/add');?>">添加博文</a></td></tr>
		<tr>
			<th width="3%"><input type="checkbox" /></th>
			<th>ID</th>
			<th width="36%">博文标题</th>
			<th>博文配图</th>
			<th width="6%">点击次数</th>
			<th width="6%">所属类别</th>
			<th width="12%">添加时间</th>
			<th>操作</th>
		</tr>
		<?php if(is_array($blog)): foreach($blog as $key=>$v): ?><tr align='center'>
				<td><input type="checkbox" /></td>
				<td><?php echo ($v["id"]); ?></td>
				<td><?php echo ($v["title"]); ?></td>
				<td height="40"><?php if($v['blogpic']): ?><img src="/Uploads<?php echo ($v["blogpic"]); ?>" width='80' height='40'/><?php endif; ?></td>
				<td><?php echo ($v["click"]); ?></td>
				<td><?php echo ($v["name"]); ?></td>
				<td><?php echo (date('Y-m-d',$v["addtime"])); ?></td>
				<td>
					<a class="btn3" href="<?php echo U('Blog/edit', array('id' => $v['id']));?>">修改</a>
					<a class="btn3" onclick="return confirm('确定删除？')" href="<?php echo U('Blog/delete', array('id' => $v['id']));?>">删除</a>
				</td>			
			</tr><?php endforeach; endif; ?>
		<tr>
			<td class="page" colspan="8" align="center"><?php echo ($page); ?></td>
		</tr>
		
	</table>
</body>
</html>