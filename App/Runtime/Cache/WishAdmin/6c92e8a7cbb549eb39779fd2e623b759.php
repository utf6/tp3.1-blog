<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
	<title>节点管理</title>
	<link rel="stylesheet" href="/Public/Css/public.css" />
	<link rel="stylesheet" href="/Public/Css/node.css" />
	<script type="text/javascript" src="/Public/Js/jquery-1.8.2.min.js"></script>
	<script type="text/javascript">
		$(function(){
			//选择所有节点
			$("input[level='1']").click(function(){
				var inputs = $(this).parents('.app').find('input');
				$(this).attr('checked') ? inputs.attr('checked', 'checked') : inputs.removeAttr('checked');
			});
			//选择所有二级节点
			$("input[level='2']").click(function(){
				var inputs = $(this).parents('dl').find('input');
				$(this).attr('checked') ? inputs.attr('checked', 'checked') : inputs.removeAttr('checked');
			});
		});
	</script>
</head>
<body>
	<form action="<?php echo U('Rbac/setAccess');?>" method="post">
		<div id='wrap'>
			<a class='add-app' href="<?php echo U('Rbac/role');?>">返回</a><br/>
			<?php if(is_array($node)): foreach($node as $key=>$app): ?><div class='app'>
					<p>
						<strong><?php echo ($app["title"]); ?></strong>
						<input type="checkbox" name="access[]" value="<?php echo ($app["id"]); ?>_1" level='1' <?php if($app['access']): ?>checked='checked'<?php endif; ?> />
					</p>			

					<?php if(is_array($app['child'])): foreach($app['child'] as $key=>$action): ?><dl>
							<dt>
								<strong><?php echo ($action["title"]); ?></strong>
								<input type="checkbox" name="access[]" value="<?php echo ($action["id"]); ?>_2" level='2' <?php if($action['access']): ?>checked='checked'<?php endif; ?> />
							</dt>
						
							<?php if(is_array($action["child"])): foreach($action["child"] as $key=>$method): ?><dd>
									<span>
										<strong><?php echo ($method["title"]); ?></strong>
										<input type="checkbox" name="access[]" value="<?php echo ($method["id"]); ?>_3" level='3' <?php if($method['access']): ?>checked='checked'<?php endif; ?> />
									</span>
								</dd><?php endforeach; endif; ?>
						</dl><?php endforeach; endif; ?>
				</div><?php endforeach; endif; ?>
		</div>
		<input type="hidden" name='rid' value="<?php echo ($rid); ?>" />
		<input type="submit" value="保存设置" class="btn2" style="display: block;margin:10px auto;" />
	</form>

</body>
</html>