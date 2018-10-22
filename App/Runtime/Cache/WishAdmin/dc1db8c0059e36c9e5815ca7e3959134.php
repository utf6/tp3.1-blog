<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
	<title>许愿墙后台管理中心-虎书博客</title>
	<link rel="stylesheet" href="/Public/Css/index.css" />
	<script type="text/javascript" src='/Public/Js/jquery-1.8.2.min.js'></script>
	<script type="text/javascript" src='/Public/Js/index.js'></script>
	<base target="iframe" />
</head>
<body>
	<div id="top">
		<div class='logo'></div>
		<div class='t_title'>后台管理中心</div>
		<div class='menu'>
			<ul>
			
				<li class='first first_cur'>
					<a href="<?php echo U('Index/welcome');?>"><span>首&nbsp;页</span></a>
				</li>
				<li class="next" >
					<a href="<?php echo U('Rbac/role');?>"><span>角色管理</span></a>
				</li>
				<li class="next" >
					<a href="<?php echo U('MsgManage/index');?>"><span>查看所有帖子</span></a>
				</li>
				<li class="next" >
					<a href="<?php echo U('Rbac/node');?>"><span>节点管理</span></a>
				</li>
				
				<li class='last'>
					<a href="<?php echo U('Rbac/index');?>"><span>用户管理</span><div></div></a>
				</li>
				
			</ul>
			<div id='user'>
				<span class='user_state'>当前管理员：[<span><?php echo (session('username')); ?></span>]</span>
				<a href="<?php echo U('Index/logout');?>" target='_self' id='login_out'></a>
				<a href="" target='_blank' id='Index_index'></a>
			</div>
		</div>
	</div>
	<div id='left'>
	
		<div class='nav'>
			<div class="nav_u"><span class="pos down">愿望管理</span></div>
		</div>
		<ul class='option'>
			<li><a href='<?php echo U('MsgManage/index');?>'>所有愿望</a></li>
		</ul>
		
		<div class='nav'>
			<div class="nav_u"><span class="pos down">RBAC</span></div>
		</div>
		<ul class='option'>
			<li><a href="<?php echo U('Rbac/index');?>">用户管理</a></li>
			<li><a href="<?php echo U('Rbac/role');?>">角色管理</a></li>
			<li><a href="<?php echo U('Rbac/node');?>">节点管理</a></li>
		</ul>	

		<div class='nav'>
			<div class="nav_u"><span class="pos down">系统管理</span></div>
		</div>
		<ul class='option'>
			<li><a href='<?php echo U('System/index');?>'>修改密码</a></li>
		</ul>	
	</div>
	<div id="right">
		<iframe src="<?php echo U('welcome');?>" frameborder="0" name='iframe'></iframe>
	</div>
</body>
</html>