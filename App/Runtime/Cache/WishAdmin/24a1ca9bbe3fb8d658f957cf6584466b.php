<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
	<title>愿望列表-虎书博客</title>
	<link rel="stylesheet" href="/Public/Css/public.css" />
	<script type="text/javascript" src="/Public/Js/jquery-1.8.2.min.js"></script>
	<script type="text/javascript">
		$(function(){
			$("input[name='message']").click(function(){
				var inputs = $(this).parents('table').find('input');
				$(this).attr('checked') ? inputs.attr('checked', 'checked') : inputs.removeAttr('checked');
			});
			$("input[do='del']").click(function(){
				if (!window.confirm('确认删除？')) {
					return false;
				};
				alert($("input[name='message[]']").attr('checked','checked')).val();
				if ($("input[name='message[]']").val() == '' ) {
					alert('请选择删除项');
					return false;
				};
			});
		});
	</script>
</head>
<body>
	<form action="<?php echo U('MsgManage/delWish');?>" method="post">
		<table class="table">
			<tr>
				<td colspan='5'>
					<input type="button" value='愿望列表' />
					<input do="del" type="submit" class='btn2' value='批量删除' />
				</td>
				<td> </td>
			</tr>
			<tr align='center'>
				<th><input type="checkbox" name='message' /></th>
				<th>编号</th>
				<th>发布者</th>
				<th>发布内容</th>
				<th>发布时间</th>
				<th>操作</th>
			</tr>
			<?php if(is_array($wish)): foreach($wish as $key=>$v): ?><tr align='center'>
					<td width='3%'><input type="checkbox" value='<?php echo ($v["id"]); ?>' name='message[]' value='<?php echo ($v["id"]); ?>' /></td>
					<td width='5%'><?php echo ($v["id"]); ?></td>
					<td width='8%'><?php echo ($v["username"]); ?></td>
					<td><?php echo ($v["content"]); ?></td>
					<td width='18%'><?php echo (date('Y-m-d H:i', $v["createtime"])); ?></td>
					<td width='10%' >
						<a align='center' class="btn3" onclick="return confirm('确定删除？')" href="<?php echo U('MsgManage/delWish', array('id' => $v['id']));?>">删除</a>					
					</td>
				</tr><?php endforeach; endif; ?>
			<tr align='right'><td colspan='6'><?php echo ($page); ?></td></tr>		
		</table>
	</form>

</body>
</html>