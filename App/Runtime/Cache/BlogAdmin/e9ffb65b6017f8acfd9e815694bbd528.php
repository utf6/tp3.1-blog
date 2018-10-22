<?php if (!defined('THINK_PATH')) exit();?> <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
 <html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
 <head>
 	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
 	<title>笔记列表</title>
 	<link rel="stylesheet" href="/Public/Css/public.css" />
 	<script type="text/javascript" src="/Public/Js/jquery-1.8.2.min.js"></script>
 	<script type="text/javascript">
 		$(function(){
 			$("#del").click(function(){				
 				var id_array=new Array();  
				$('input[name="id"]:checked').each(function(){  
				    id_array.push($(this).val());//向数组中添加元素  
				});  
				console.log(id_array);
 			});
 		});
 	</script>
 	<script type="text/javascript" src="/Public/js/common.js"></script>
 </head>
  
 <body>
 	<table class="table">
 		<tr>
 			<td colspan='6'><b>笔记列表</b>&nbsp;<a href="<?php echo U('Note/add');?>" class="btn3">添加笔记</a>
 				<a onclick="del()" class="btn3">批量删除</a>
 			
 			</td>
 		</tr>
 		<tr>
 			<th width="3%"><input id="box" type="checkbox" value="" /></th>
 			<th>ID</th>
 			<th>标题</th>
 			<th>配图</th>
 			<th>添加时间</th>
 			<th>操作</th>
 		</tr>
 		<?php if(is_array($notes)): foreach($notes as $key=>$v): ?><tr align="center">	 			
 				<td><input type="checkbox"  name="key" value="<?php echo ($v["id"]); ?>" /></td>
	 			<td><?php echo ($v["id"]); ?></td>
	 			<td width="36%"><?php echo ($v["title"]); ?></td>
	 			<td width="150">
		 			<?php if($v['notespic']): ?><img src="/Uploads<?php echo ($v["notespic"]); ?>" alt="<?php echo ($v["title"]); ?>" style="border:1px;" border="1" width="120" height="80" /><?php endif; ?>
	 			</td>
	 			<td><?php echo (date('Y-m-d H:i',$v["addtime"])); ?></td>
	 			<td>
	 				<a onclick="return confirm('确认删除？')" test="URL" class="btn3" href="<?php echo U('Note/delNotes', array('id' => $v['id']));?>">删除</a>
	 				<a href="<?php echo U('Note/edit', array('id' => $v['id']));?>" class="btn3">修改</a>
	 			</td>		
	 		</tr><?php endforeach; endif; ?>
	 	<tr><td colspan="6" align="center"><div class="pagelist"><?php echo ($page); ?></div></td></tr>
 	</table>
 </body>
 </html>