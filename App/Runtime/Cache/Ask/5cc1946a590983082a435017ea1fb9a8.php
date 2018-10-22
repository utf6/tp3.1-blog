<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
	<title>个人中心-<?php echo (C("ask_title")); ?></title>
	<meta name="keywords" content="提问，知道，php，生活"/>
	<meta name="description" content="虎书问答是基于搜索的互动式知识问答分享平台。用户可以根据自身的需求，有针对性地提出问题；同时，这些答案又将作为搜索结果，满足有相同或类似问题的用户需求。"/>
	<link rel="stylesheet" href="/App/Ask/Public/Css/common.css" />
	<script type="text/javascript" src='/App/Ask/Public/Js/jquery-1.7.2.min.js'></script>
	<script type="text/javascript" src='/App/Ask/Public/Js/top-bar.js'></script>
	<link rel="stylesheet" href="/App/Ask/Public/Css/member.css" />
	<script type="text/javascript" src='/App/Ask/Public/Js/member.js'></script>
</head>
<body>
	<!-- top -->
	<!-- top -->
	<div id='top-fixed'>
	<div id='top-bar'>
		<ul class="top-bar-left fl">
			<li><a href="http://www.tigerbook.cn" target='_blank'>虎书博客</a></li>
			<li><a href="http://www.tigerbook.cn/Wish" target='_blank'>虎书许愿墙</a></li>
		</ul>
		<ul class='top-bar-right fr'>
			<?php if($_SESSION['uid']> '0'): ?><li class='userinfo'>
					<a href="<?php echo U('Member/index', array('id' => $_SESSION['uid']));?>" class='uname'>
						<b style="color:green"><?php echo (session('ask_login_username')); ?></b>
					</a>
				</li>
				<li style='color:#eaeaf1'>|</li>
				<li><a href="<?php echo U('Index/loginOut');?>">退出</a></li>
			<?php else: ?>
				<li><a href="" class='login'>登录</a></li>
				<li style='color:#eaeaf1'>|</li>
				<li><a href="" class='register'>注册</a></li><?php endif; ?>			
		</ul>
	</div>
	<!-- 提问搜索框 -->
	<script type="text/javascript">
		$(function(){
			var input = $('input[name="keyword"]');
			$('form[name="search"]').submit(function(){
				if (input.val() == '') {
					input.focus();
					return false;
				};
			});

		});
	</script>
	<div id='search'>
		<div class='logo'><a href="/index.php/Ask" class='logo'></a></div>
		<form name='search' action="<?php echo U('Ask/search');?>" target="_blank" method='post'>
			<input type="text" maxlength="100" name='keyword' class='sech-cons'/>
			<input type="submit" class='sech-btn'/>
		</form>
		<a href="<?php echo U('Ask/index');?>" class='ask-btn'></a>
	</div>
<!-- 提问搜索框结束 -->
</div>
<div style='height:110px'></div>
<!----------导航条---------->
<div id='nav'>
	<ul class='list'>
		<li class='nav-sel'><a href="/index.php/Ask" class='home'>问答首页</a></li>
		<li class='nav-sel ask-cate'>
			<a href="<?php echo U('List/index');?>" class='ask-list'><span>问题库</span><i></i></a>
			<ul class='hidden'>
				<?php $_top_cate = M("category")->where(array("pid" => 0))->select();foreach ($_top_cate as $_cate_value):extract($_cate_value);$url = U("List/index", array("id" => $id));?><li><a href="<?php echo ($url); ?>"><?php echo ($name); ?></a></li><?php endforeach ?>			
			</ul>
		</li>
	</ul>
	<p class='total'>累计提问：<?php echo ($count_ask); ?></p>
</div>
	<?php if(!isset($_SESSION["uid"]) OR !isset($_SESSION["ask_login_username"])): ?><!-- 注册框 -->
		<!----------注册框---------->
<script type="text/javascript" src="/App/Ask/Public/Js/regist.js"></script>
<script type="text/javascript">
	var checkAccountUrl = "<?php echo U('Regist/checkAccount');?>";
	var checkVerifyUrl = "<?php echo U('Regist/checkVerify');?>";
	var checkUsernameUrl = "<?php echo U('Regist/checkUsername');?>";
	var checkLoginUrl = "<?php echo U('Login/checkLogin');?>"
</script>
<div id='register' class='hidden'>
	<div class='reg-title'>
		<p>欢迎注册虎书问答</p>
		<a href="" title='关闭' class='close-window'></a>
	</div>
	<div id='reg-wrap'>
		<div class='reg-left'>
			<ul>
				<li><span>账号注册</span></li>
			</ul>
			<div class='reg-l-bottom'>
				已有账号，<a href="" id='login-now'>马上登录</a>
			</div>
		</div>
		<div class='reg-right'>
			<form action="<?php echo U('Regist/regist');?>" method='post' name='regist'>
				<ul>
					<li>
						<label for="reg-uname">账号</label>
						<input type="text" name='account' id='reg-account'/>
						<span>6-14个字符：字母、数字或中文</span>
					</li>
					<li>
						<label for="reg-uname">用户名</label>
						<input type="text" name='username' id='reg-uname'/>
						<span>2-14个字符：字母、数字或中文</span>
					</li>
					<li>
						<label for="reg-pwd">密码</label>
						<input type="password" name='pwd' id='reg-pwd'/>
						<span>6-20个字符:字母、数字或下划线 _</span>
					</li>
					<li>
						<label for="reg-pwded">确认密码</label>
						<input type="password" name='pwded' id='reg-pwded'/>
						<span>请再次输入密码</span>
					</li>
					<li>
						<label for="reg-verify">验证码</label>
						<input type="text" name='verify' id='reg-verify'/>
						<img src="<?php echo U('Regist/verify','','');?>" width='140' height='40' alt="验证码" id='verify-img'/>
						<span>请输入图中的字母或数字，不区分大小写</span>
					</li>
					<li class='submit'>
						<input type="submit" value='立即注册'/>
					</li>
				</ul>
			</form>
		</div>
	</div>
</div>
		<!-- 登陆框 -->
		<!----------登录框---------->	
<div id='login' class='hidden'>
	<div class='login-title'>
		<p>欢迎您登录虎书问答</p>
		<a href="" title='关闭' class='close-window'></a>
	</div>
	<div class='login-form'>
		<span id='login-msg'></span>
		<!-- 登录FORM -->
		<form action="<?php echo U('Login/login');?>" method='post' name='login'>
			<ul>
				<li>
					<label for="login-acc">账号</label>
					<input type="text" name='account' class='input' id='login-acc'/>
				</li>
				<li>
					<label for="login-pwd">密码</label>
					<input type="password" name='pwd' class='input' id='login-pwd'/>
				</li>
				<li class='login-auto'>
					<label for="auto-login">
						<input type="checkbox" checked='checked' name='auto'  id='auto-login'/>&nbsp;本周7天自动登录
					</label>
					<a href="" id='regis-now'>注册新账号</a>
				</li>
				<li>
					<input type="submit" value='' id='login-btn'/>
				</li>
			</ul>
		</form>
	</div>
</div><?php endif; ?>

<!--背景遮罩--><div id='background' class='hidden'></div>
	<!-- 中部 -->
	<div id='center'>
		<!-- 左侧 -->
		<div id='left'>
	<?php $field = array("id","face","username","answer","ask","adopt","point","exp");$_user_info = M("user")->field($field)->find($_GET['id']);extract($_user_info);$adopt = floor($adopt/$answer*100)."%";$level = exp_to_level($exp);$face = empty($face)? "/App/Ask/Public/Images/noface.gif" : "/Uploads/Face/s_$face";$url = U("Member/index", array("id" => $id));?><div class='userinfo'>
			<dl>
				<dt>
					<a href="<?php echo ($url); ?>"><img src="<?php echo ($face); ?>" width='48' height='48' alt="<?php echo ($username); ?>"/></a>
				</dt>
				<dd class='username'>
					<a href="<?php echo ($url); ?>"><b><?php echo ($username); ?></b></a>
					<a href="">
						<i class='level lv1' title='Level 1'></i>
					</a>
				</dd>
				<dd>金币：<a href="" style="color: #888888;"><b class='point'><?php echo ($point); ?></b></a></dd>
				<dd>经验值：<?php echo ($exp); ?></dd>
			</dl>
			<table>
				<tr>
					<td>回答数</td>
					<td>采纳率</td>
					<td class='last'>提问数</td>
				</tr>
				<tr>
					<td><a href=""><?php echo ($answer); ?></a></td>
					<td><a href=""><?php echo ($adopt); ?></a></td>
					<td class='last'><a href=""><?php echo ($ask); ?></a></td>
				</tr>
			</table>
		</div>

	<ul>
		<li class='myhome <?php if(!isset($_GET["from"])): ?>cur<?php endif; ?>'>
			<a href="<?php echo U('Member/index', array('id' => $_GET['id']));?>"><?php if($_GET["id"] == $_SESSION["uid"]): ?>我的<?php else: ?>Ta的<?php endif; ?>首页</a>
		</li>
		<li class='myask <?php if(($_GET["from"]) == "ask"): ?>cur<?php endif; ?>'>
			<a href="<?php echo U('Member/ask', array('id' => $_GET['id'], 'from' => 'ask'));?>"><?php if($_GET["id"] == $_SESSION["uid"]): ?>我的<?php else: ?>Ta的<?php endif; ?>提问</a>
		</li>
		<li class='myanswer <?php if(($_GET["from"]) == "answer"): ?>cur<?php endif; ?>'>
			<a href="<?php echo U('Member/answer', array('id' => $_GET['id'], 'from' => 'answer'));?>"><?php if($_GET["id"] == $_SESSION["uid"]): ?>我的<?php else: ?>Ta的<?php endif; ?>回答</a>
		</li>
		<?php if($_GET["id"] == $_SESSION["uid"]): ?><li class='mylevel <?php if(($_GET["from"]) == "level"): ?>cur<?php endif; ?>'>
				<a href="<?php echo U('Member/level', array('id' => $_GET['id'], 'from' => 'level'));?>"><?php if($_GET["id"] == $_SESSION["uid"]): ?>我的<?php else: ?>Ta的<?php endif; ?>等级</a>
			</li>
			<li class='mygold <?php if(($_GET["from"]) == "point"): ?>cur<?php endif; ?>'>
				<a href="<?php echo U('Member/point', array('id' => $_GET['id'], 'from' => 'point'));?>"><?php if($_GET["id"] == $_SESSION["uid"]): ?>我的<?php else: ?>Ta的<?php endif; ?>金币</a>
			</li>		
			<li class='myface <?php if(($_GET["from"]) == "face"): ?>cur<?php endif; ?>'>
				<a href="<?php echo U('Member/face', array('id' => $_GET['id'], 'from' => 'face'));?>">上传头像</a>
			</li><?php endif; ?>

		<li style="background:none"></li>
	</ul>
</div>

		<div id='right'>
			<p class='title'>我的金币</p>
			<p class='lv-info'>
				<?php if($point): ?>您现有 <span><?php echo ($user_gold); ?></span> 金币
				<?php else: ?>
					您还没有金币，赶紧向着高富帅去奋斗吧！<?php endif; ?>
			</p>
			<div class='lv-rule'>
				<p><span>金币获取</span></p>
				<table class='lv-exp'>
					<tr>
						<th>操作</th>
						<th>获得金币</th>
					</tr>
				
					<tr>
						<td>回答</td>
						<td>+<?php echo (C("gold_answer")); ?>金币</td>
					</tr>
					<tr>
						<td>回答被采纳</td>
						<td>+<?php echo (C("gold_adopt")); ?>金币</td>
					</tr>
					<tr>
						<td>回答被删除：</td>
						<td>-<?php echo (C("gold_del_answer")); ?>金币</td>
					</tr>
					<tr>
						<td>提问被删除：</td>
						<td>-<?php echo (C("gold_del_ask")); ?>金币</td>
					</tr>
					<tr>
						<td>采纳回答被删除</td>
						<td>提问者：-<?php echo (C("gold_del_ask_adopt")); ?>金币&nbsp;&nbsp;回答者：-<?php echo (C("gold_del_adopt_answer")); ?>金币</td>
					</tr>
				</table>
			</div>
		</div>
	</div>
<!------------------底部-------------------->
<!-- 底部 -->
	<div id='bottom'>
		<p><?php echo (C("ask_copyright")); ?></p>
		<!-- <p>京公安网备xxxxxxxxxxxx</p> -->
	</div>
<!--[if IE 6]>
    <script type="text/javascript" src="/App/Ask/Public/Js/iepng.js"></script>
    <script type="text/javascript">
    	DD_belatedPNG.fix('.logo','background');
        DD_belatedPNG.fix('.nav-sel a','background');
        DD_belatedPNG.fix('.ask-cate i','background');
    </script>
<![endif]-->
</body>
</html>
<!-- 底部结束