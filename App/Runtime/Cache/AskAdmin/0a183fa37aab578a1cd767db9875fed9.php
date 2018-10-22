<?php if (!defined('THINK_PATH')) exit();?>﻿<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
	<title>博客后台管理中心-<?php echo (C("title")); ?></title>
	<link rel="stylesheet" href="/Public/Css/index.css" />
	<script type="text/javascript" src='/Public/Js/jquery-1.8.2.min.js'></script>
	<script type="text/javascript" src='/Public/Js/index.js'></script>
	<base target="iframe" />
</head>
<body>
	<div id="top">
		<div class='logo'></div>
		<div class='t_title'>问答后台管理</div>
		<div class='menu'>
			<ul>
			
				<li class='first first_cur'>
					<a href="<?php echo U('Index/welcome');?>"><span>首&nbsp;页</span></a>
				</li>
				<li class="next" >
					<a href="<?php echo U('Cate/index');?>"><span>栏目管理</span></a>
				</li>
				<li class="next" >
					<a href="<?php echo U('Answer/index');?>"><span>回答管理</span></a>
				</li>
				<li class="next" >
					<a href="<?php echo U('Ask/index');?>"><span>问题管理</span></a>
				</li>
				
				<li class='last'>
					<a href="<?php echo U('User/index');?>"><span>用户管理</span><div></div></a>
				</li>
				
			</ul>
			<div id='user'>
				<span class='user_state'>当前管理员：[<span><?php echo (session('username')); ?></span>]</span>
				<a href="<?php echo U('Index/logout');?>" target='_self' id='login_out'></a>
				<a href="/Ask" target='_blank' id='Index_index'></a>
			</div>
		</div>
	</div>
	<div id='left'>
		<div class='nav'>
			<div class="nav_u"><span class="pos down">栏目管理</span></div>
		</div>
		<ul class='option'>
			<li><a href="<?php echo U('Cate/index');?>">栏目列表</a></li>
		</ul>	

		<div class='nav'>
			<div class="nav_u"><span class="pos down">奖励规则</span></div>
		</div>
		<ul class='option'>
			<li><a href="<?php echo U('Reward/index');?>">金币奖励规则</a></li>
			<li><a href="<?php echo U('Reward/exper');?>">经验等级规则</a></li>
		</ul>
		
		<div class='nav'>
			<div class="nav_u"><span class="pos down">问答管理</span></div>
		</div>
		<ul class='option'>
			<li><a href="<?php echo U('User/index');?>">用户管理</a></li>
			<li><a href="<?php echo U('Ask/index');?>">问题管理</a></li>
			<li><a href="<?php echo U('Answer/index');?>">回答管理</a></li>
		</ul>	

		<div class='nav'>
			<div class="nav_u"><span class="pos down">系统设置</span></div>
		</div>
		<ul class='option'>
			<li><a href='<?php echo U('System/index');?>'>修改密码</a></li>
			<li><a href='<?php echo U('System/site');?>'>站点设置</a></li>
		</ul>	
	</div>
	<div id="right">
		<iframe src="<?php echo U('welcome');?>" frameborder="0" name='iframe'></iframe>
	</div>
</body>
</html>