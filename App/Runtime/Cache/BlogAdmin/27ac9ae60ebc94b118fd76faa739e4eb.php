<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
	<title>修改博文</title>
	<link rel="stylesheet" href="/Public/Css/public.css" />
	<script type="text/javascript">
		window.UEDITOR_HOME_URL = "/Data/Ueditor/";
		window.onload = function(){
			window.UEDITOR_CONFIG.initialFrameWidth = 1200;
			window.UEDITOR_CONFIG.initialFrameHeight = 300;
			UE.getEditor('content');
			
		}
	</script>
	<style>
		.div1{margin-top: 70px;}
	</style>
	<script type="text/javascript" src="/Data/Ueditor/ueditor.config.js"></script>
	<script type="text/javascript" src="/Data/Ueditor/ueditor.all.min.js"></script>
</head>
<body>
	<form action="<?php echo U('Blog/editBlog');?>" method="post" enctype="multipart/form-data">
		<table class="table">
			<tr><th colspan='2' style="text-align:left"><b>修改博文</b>&nbsp;<a class="btn3" href="<?php echo U('Blog/index');?>">返回列表</a></th></tr>
			<tr>
				<td align="right"><b>博文标题：</b></td>
				<td><input style="width:360px;" type="text" name='title' value="<?php echo ($blog["title"]); ?>" /></td>
			</tr>
			<tr>
				<td align="right"><b>所属栏目：</b></td>
				<td>
					<select name="cid">
						<option value="">请选择</option>
						<?php if(is_array($cate)): foreach($cate as $key=>$v): ?><option <?php if(($v["id"]) == $blog["cid"]): ?>selected="secected"<?php endif; ?> value="<?php echo ($v["id"]); ?>" ><?php echo ($v["html"]); echo ($v["name"]); ?></option><?php endforeach; endif; ?>
					</select>
				</td>					
			</tr>
			<tr style="height:100" >
				<td align="right"><b>博文配图：</b></td>
				<td>
					<img style="border:1px solid #ccc;float:left;" src="/Uploads<?php echo ($blog["blogpic"]); ?>" width="140" height="100" alt=""/>
					<div class="div1">
	    				<input type="file" name="blogPic" class="upload">
					</div>
				</td>
			</tr>
			<tr>
				<td align="right"><b>点击数：</b></td>
				<td><input style="width:60px;" type="text" name='click' value="<?php echo ($blog["click"]); ?>" /></td>
			</tr>
			<tr>
				<td align="right"><b>博文描述：</b></td>
				<td><textarea name="remark" cols="50" rows="3"><?php echo ($blog["remark"]); ?></textarea> </td>
			</tr>
			
			<tr>
				<td colspan="2" align="center">
					<textarea id="content" name="content" ><?php echo ($blog["content"]); ?></textarea>
				</td>
			</tr>
			<tr>
				<td colspan="2" align="center">
					<input type="hidden" name='oldPic' value="./Uploads<?php echo ($blog["blogpic"]); ?>" />
					<input type="hidden" name="id" value="<?php echo ($blog["id"]); ?>" />
					<input type="submit" class="btn2" value="保存修改" />
				</td>
			</tr>
		</table>
	</form>
</body>
</html>