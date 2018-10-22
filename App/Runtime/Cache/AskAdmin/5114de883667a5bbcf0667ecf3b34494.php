<?php if (!defined('THINK_PATH')) exit();?>﻿<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
	<title>经验等级/奖励规则</title>
	<link rel="stylesheet" href="/Public/Css/public.css" />
</head>
<body>
	<form action="<?php echo U('Reward/experRule');?>" method="post">
		<table class="table">
			<tr><th colspan="4" style="text-align:left">经验奖励规则</th></tr>
			<tr>
				<td align="center" width="20%"><b>登录：</b></td>
				<td><input type="text" name="exp_login" value="<?php echo (C("exp_login")); ?>" /></td>
				<td align="center" width="20%"><b>提问：</b></td>
				<td><input type="text" name="exp_ask" value="<?php echo (C("exp_ask")); ?>" /></td>
			</tr>
			<tr>
				<td align="center" width="20%"><b>回答：</b></td>
				<td><input type="text" name="exp_answer" value="<?php echo (C("exp_login")); ?>" /></td>
				<td align="center" width="20%"><b>采纳：</b></td>
				<td><input type="text" name="exp_adopt" value="<?php echo (C("exp_ask")); ?>" /></td>
			</tr>
		</table>

		<table class="table">
			<tr><th colspan="10" style="text-align:left">经验等级规则</th></tr>
			<tr>
				<td align="right" ><b>Lv1：</b></td>
				<td>
					<input type="text" name="exp_lv1" style="width:60px;" value="<?php echo (C("exp_lv1")); ?>" />
				</td>
				<td align="right"><b>Lv2：</b></td>
				<td>
					<input type="text" name="exp_lv2" style="width:60px;" value="<?php echo (C("exp_lv2")); ?>" />
				</td>
				<td align="right"><b>Lv3：</b></td>
				<td>
					<input type="text" name="exp_lv3" style="width:60px;" value="<?php echo (C("exp_lv3")); ?>" />
				</td>
				<td align="right"><b>Lv4：</b></td>
				<td>
					<input type="text" name="exp_lv4" style="width:60px;" value="<?php echo (C("exp_lv4")); ?>" />
				</td>
				<td align="right"><b>Lv5：</b></td>
				<td>
					<input type="text" name="exp_lv5" style="width:60px;" value="<?php echo (C("exp_lv5")); ?>" />
				</td>
			</tr>
			<tr>
				<td align="right" ><b>Lv6：</b></td>
				<td>
					<input type="text" name="exp_lv6" style="width:60px;" value="<?php echo (C("exp_lv6")); ?>" />
				</td>
				<td align="right"><b>Lv7：</b></td>
				<td>
					<input type="text" name="exp_lv7" style="width:60px;" value="<?php echo (C("exp_lv7")); ?>" />
				</td>
				<td align="right"><b>Lv8：</b></td>
				<td>
					<input type="text" name="exp_lv8" style="width:60px;" value="<?php echo (C("exp_lv8")); ?>" />
				</td>
				<td align="right"><b>Lv9：</b></td>
				<td>
					<input type="text" name="exp_lv9" style="width:60px;" value="<?php echo (C("exp_lv9")); ?>" />
				</td>
				<td align="right"><b>Lv10：</b></td>
				<td>
					<input type="text" name="exp_lv10" style="width:60px;" value="<?php echo (C("exp_lv10")); ?>" />
				</td>
			</tr>
			<tr>
				<td align="right" ><b>Lv11：</b></td>
				<td>
					<input type="text" name="exp_lv11" style="width:60px;" value="<?php echo (C("exp_lv11")); ?>" />
				</td>
				<td align="right"><b>Lv12：</b></td>
				<td>
					<input type="text" name="exp_lv12" style="width:60px;" value="<?php echo (C("exp_lv12")); ?>" />
				</td>
				<td align="right"><b>Lv13：</b></td>
				<td>
					<input type="text" name="exp_lv13" style="width:60px;" value="<?php echo (C("exp_lv13")); ?>" />
				</td>
				<td align="right"><b>Lv14：</b></td>
				<td>
					<input type="text" name="exp_lv14" style="width:60px;" value="<?php echo (C("exp_lv14")); ?>" />
				</td>
				<td align="right"><b>Lv15：</b></td>
				<td>
					<input type="text" name="exp_lv15" style="width:60px;" value="<?php echo (C("exp_lv15")); ?>" />
				</td>
			</tr>
			<tr>
				<td align="right" ><b>Lv16：</b></td>
				<td>
					<input type="text" name="exp_lv16" style="width:60px;" value="<?php echo (C("exp_lv16")); ?>" />
				</td>
				<td align="right"><b>Lv17：</b></td>
				<td>
					<input type="text" name="exp_lv17" style="width:60px;" value="<?php echo (C("exp_lv17")); ?>" />
				</td>
				<td align="right"><b>Lv18：</b></td>
				<td>
					<input type="text" name="exp_lv18" style="width:60px;" value="<?php echo (C("exp_lv18")); ?>" />
				</td>
				<td align="right"><b>Lv19：</b></td>
				<td>
					<input type="text" name="exp_lv19" style="width:60px;" value="<?php echo (C("exp_lv19")); ?>" />
				</td>
				<td align="right"><b>Lv20：</b></td>
				<td>
					<input type="text" name="exp_lv20" style="width:60px;" value="<?php echo (C("exp_lv20")); ?>" />
				</td>
			</tr>
			<tr>
				<td colspan="10" align="center"><input type="submit" value="保存修改" class="btn2" /></td>
			</tr>		 
		</table>
	</form>
</body>
</html>