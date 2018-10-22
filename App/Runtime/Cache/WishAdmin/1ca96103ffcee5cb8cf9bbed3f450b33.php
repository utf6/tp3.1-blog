<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
	<title>节点管理</title>
	<link rel="stylesheet" href="/Public/Css/public.css" />
	<link rel="stylesheet" href="/Public/Css/node.css" />
</head>
<body>
	<div id='wrap'>
		<a class='add-app' href="<?php echo U('Rbac/addNode');?>">添加应用</a><br/>

		<?php if(is_array($node)): foreach($node as $key=>$app): ?><div class='app'>
				<p>
					<strong><?php echo ($app["title"]); ?></strong>
					<a href="<?php echo U('Rbac/addNode', array('pid' => $app['id'], 'level' => 2));?>"><input type="button" value='添加控制器' class='btn2'/></a>
					<a href="<?php echo U('Rbac/editNode', array('id' => $app['id'], 'level' => $app['level']));?>" class='btn2'><input type="button" value='修改' class='btn2'/></a>
					<a onclick="return confirm('确定删除？')" href="" class='btn2'><input type="button" value='删除' class='btn2'/></a>
				</p>			

				<?php if(is_array($app['child'])): foreach($app['child'] as $key=>$action): ?><dl>
						<dt>
							<strong><?php echo ($action["title"]); ?></strong>
							<a class="btn3" href="<?php echo U('Rbac/addNode', array('pid' => $action['id'], 'level' => 3));?>">添加方法</a>
							<a class="btn3" href="<?php echo U('Rbac/editNode', array('id' => $action['id'], 'level' => $action['level']));?>">修改</a>
							<a class="btn3" onclick="return confirm('确定删除？')" href="<?php echo U('Rbac/delNode', array('id' => $action['id']));?>">删除</a>
						</dt>
					
					<?php if(is_array($action["child"])): foreach($action["child"] as $key=>$method): ?><dd>
							<span>
								<strong><?php echo ($method["title"]); ?></strong>
								<a class="btn3" href="<?php echo U('Rbac/editNode', array('id' => $method['id'], 'level' => $method['level']));?>">修改</a>
								<a class="btn3" onclick="return confirm('确定删除？')" href="<?php echo U('Rbac/delNode', array('id' => $method['id']));?>">删除</a>
							</span>
						</dd><?php endforeach; endif; ?>
					</dl><?php endforeach; endif; ?>
			</div><?php endforeach; endif; ?>
		
	</div>
</body>
</html>