<?php if (!defined('THINK_PATH')) exit();?>﻿<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
	<title>分类列表-<?php echo (C("title")); ?></title>
	<link rel="stylesheet" href="/Public/Css/public.css" />
	<script type="text/javascript" src="/Public/Js/jquery-1.8.2.min.js"></script>
	<script type="text/javascript">
		$(function(){
			$('tr[pid != 0]').hide();
			$("img").toggle(function(){
				var index = $(this).parents('tr').attr('id');
				$(this).attr('src', '/Public/Images/-.png');
				$('tr[pid = '+ index +']').show();
			},function(){
				var index = $(this).parents('tr').attr('id');
				$(this).attr('src', '/Public/Images/+.png');
				$('tr[pid = '+ index +']').hide();
			});

		});
	</script>
</head>
<body>
	<table class="table">
		<tr pid ='0'><td colspan="4"><a href="<?php echo U('Cate/add');?>" class="btn3">添加顶级分类</a></td> </tr>
		<tr pid='0'>
			<th width="3%"><input type="checkbox" /></th>
			<th width="8%">ID</th>
			<th>名称</th>
			<th>操作</th>
		</tr>
		<?php if(is_array($cate)): foreach($cate as $key=>$v): ?><tr id="<?php echo ($v["id"]); ?>" pid="<?php echo ($v["pid"]); ?>" align='center'>
				<td width="3%"><input type="checkbox" /></td>
				<td width="8%"><?php echo ($v["id"]); ?></td>				
				<td width="58%" align='left' style="marign-left:45px;">									
					<?php if($v['html']): echo str_repeat('&nbsp;', $v['level']); endif; ?>
					<img id="close" src="/Public/Images/+.png" />&nbsp;<?php echo ($v["html"]); ?>
					<?php if($v['level']): ?>-&nbsp;<?php endif; echo ($v["name"]); ?>
				</td>
				<td width="18%">
					<a class="btn3" href="<?php echo U('addSon', array('id' => $v['id']));?>">添加子分类</a>
					<a class="btn3" href="<?php echo U('edit', array('id' => $v['id']));?>">修改</a>
					<a class="btn3" onclick="return confirm('确认删除该分类，及其子分类吗？')" href="<?php echo U('delete', array('id' => $v['id']));?>">删除</a>					
				</td>
			</tr><?php endforeach; endif; ?>
	</table>
</body>
</html>