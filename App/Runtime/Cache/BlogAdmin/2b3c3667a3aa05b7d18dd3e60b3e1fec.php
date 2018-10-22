<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
	<title>添加笔记</title>
	<link rel="stylesheet" href="/Public/Css/public.css" />
	<script type="text/javascript" src="/Public/Js/jquery-1.8.2.min.js"></script>
	<script type="text/javascript">
	// 	$(function(){
	// 		var ajaxUrl = "<?php echo U('Notes/ajaxPic');?>";

	// 		$(".upload").change(function(){
	// 			$.ajax({
	// 					url: ajaxUrl,
	// 					type:"post",
	// 					data:"",
	// 					success: function(data){
	// 						if (data.status == 1) {
	// 							$("#img").attr('src', data.notesPic);
	// 						} else{
	// 							$("#p").html('上传失败');
	// 						}
	// 					}
	// 				});

	// 			$("#upload").submit(function(){
	// 				$.ajax({
	// 					url: ajaxUrl,
	// 					type:"post",
	// 					data:"",
	// 					success: function(data){
	// 						if (data.status == 1) {
	// 							$("#img").attr('src', data.notesPic);
	// 						} else{
	// 							$("#p").html('上传失败');
	// 						}
	// 					}
	// 				});
	// 			});		
	// 		});
	// 	})		
	</script>
	<script type="text/javascript">
		window.UEDITOR_HOME_URL = "/Data/Ueditor/";
		window.onload = function(){
			window.UEDITOR_CONFIG.initialFrameWidth = 800;
			window.UEDITOR_CONFIG.initialFrameHeight = 300;
			UE.getEditor('content');
			
		}
		
	</script>
	<script type="text/javascript" src="/Data/Ueditor/ueditor.config.js"></script>
	<script type="text/javascript" src="/Data/Ueditor/ueditor.all.min.js"></script>
</head>
<body>
	<form id="upload" action="<?php echo U('Note/addNotes');?>" method="post" enctype="multipart/form-data">
		<table class="table">
			<tr><th colspan='2' style="text-align:left"><b>添加笔记</b></th></tr>
			<tr>
				<td align="right"><b>标题：</b></td>
				<td><input type="text" name="title" /></td>
			</tr>
			<tr>
				<td width="40%" align="right"><b>笔记配图：</b></td>
				<td>
					<!-- <img id="img" style="border:1px solid #ccc;float:left;" src="/Public/Images/back.jpg" width="140" height="100" alt=""/> -->
					<div class="div1">
	    				<input type="file" name="notespic" class="upload">
					</div>
				</td>
			</tr>
			<tr>
				<td align="center" colspan='2'><textarea name="content" id="content"></textarea></td>
			</tr>
			<tr><td colspan="2" align="center"><input type="submit" class="btn2" value="保存添加" /></td> </tr>
		</table>
	</form>
</body>
</html>