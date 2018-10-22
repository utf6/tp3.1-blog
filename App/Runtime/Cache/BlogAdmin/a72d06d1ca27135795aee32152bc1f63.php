<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
	<title>栏目列表</title>
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
	<form action="<?php echo U('Cate/sortCate');?>" method="post">
		<table class="table">
			<tr pid="0"><td colspan='6'><b>栏目列表</b>&nbsp;<a href="<?php echo U('Cate/add');?>"><input class="btn2" type="button" value="添加顶级栏目" /></a>&nbsp;<input type="submit" class="btn2" value="排 序" /></td></tr>
			<tr pid="0">
				<th><input type="checkbox" /></th>
				<th>ID</th>
				<th>栏目名称</th>
				<th>栏目级别</th>
				<th>排序</th>
				<th>操作</th>
			</tr>
			<?php if(is_array($cate)): foreach($cate as $key=>$v): ?><tr id="<?php echo ($v["id"]); ?>" pid="<?php echo ($v["pid"]); ?>">
					<td width="3%" align="center"><input type="checkbox" name='id[]' /></td>
					<td width="8%" align="center"><?php echo ($v["id"]); ?></td>
					<td width="40%">
						<img id="close" src="/Public/Images/+.png" />
						<?php if($v['html']): echo str_repeat('&nbsp;', $v['level']); endif; echo ($v["html"]); ?>
						<?php if($v['level']): ?>-&nbsp;<?php endif; echo ($v["name"]); ?>
						<!-- <?php echo ($v["html"]); echo ($v["name"]); ?> -->
					</td>
					<td width="8%" align="center"><?php echo ($v["level"]); ?></td>
					<td width="8%" align="center" ><input type="text" name='<?php echo ($v["id"]); ?>' style="width:40px;" value="<?php echo ($v["sort"]); ?>" /></td>
					<td width="20%" align="center">
						<a href="<?php echo U('Cate/add', array('pid' => $v['id']));?>" class="btn3">添加子分类</a>
						<a href="<?php echo U('Cate/edit', array('id' => $v['id']));?>" class='btn3'>修改</a>
						<a onclick="return confirm('确认删除？')" href="<?php echo U('Cate/delCate', array('id' => $v['id']));?>" class="btn3">删除</a>
					</td>
				</tr><?php endforeach; endif; ?>			
		</table>
	</form>
		
</body>
</html>