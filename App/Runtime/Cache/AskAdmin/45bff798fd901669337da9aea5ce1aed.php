<?php if (!defined('THINK_PATH')) exit();?>﻿<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
	<title>金币奖励规则视图</title>
	<link rel="stylesheet" href="/Public/Css/public.css" />
</head>
<body>
	<form action="<?php echo U('Reward/goldRule');?>" method="post">
		<table class="table">
			<tr><th colspan="2" style="text-align:left">金币奖励规则</th> </tr>
			<tr>
				<td width="40%" align="right"><b>回答：</b></td>
				<td><input type="text" name="gold_answer" value="<?php echo (C("gold_answer")); ?>" /></td>
			</tr>
			<tr>
				<td align="right"><b>回答被删：</b></td>
				<td><input type="text" name="gold_del_answer" value="<?php echo (C("gold_del_answer")); ?>" /></td>
			</tr>
			<tr>
				<td align="right"><b>回答采纳：</b></td>
				<td><input type="text" name="gold_adopt" value="<?php echo (C("gold_adopt")); ?>" /></td>
			</tr>
			<tr>
				<td align="right"><b>提问被除：</b></td>
				<td><input type="text" name="gold_del_ask" value="<?php echo (C("gold_del_ask")); ?>" /></td>
			</tr>
			<tr>
				<td align="right"><b>采纳回答被删：</b></td>
				<td>
					提问者：<input style="width:50px;" type="text" value="<?php echo (C("gold_del_ask_adopt")); ?>" name="gold_del_ask_adopt" />
					回答者：<input style="width:50px;" type="text" value="<?php echo (C("gold_del_adopt_answer")); ?>" name="gold_del_adopt_answer" /></td>
			</tr>
			<tr><td colspan="2" align="center"><input type="submit" class="btn2" value="保存修改" /></td> </tr>
		</table>
	</form>
</body>
</html>