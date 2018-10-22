<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
	<title>问题分类-<?php echo (C("ask_title")); ?></title>
	<meta name="keywords" content="提问，知道，php，生活"/>
	<meta name="description" content="虎书问答是基于搜索的互动式知识问答分享平台。用户可以根据自身的需求，有针对性地提出问题；同时，这些答案又将作为搜索结果，满足有相同或类似问题的用户需求。"/>
	<link rel="stylesheet" href="/App/Ask/Public/Css/common.css" />
	<script type="text/javascript" src='/App/Ask/Public/Js/jquery-1.7.2.min.js'></script>
	<script type="text/javascript" src='/App/Ask/Public/Js/top-bar.js'></script>
	<script type="text/javascript" src='/App/Ask/Public/Js/index.js'></script>
	<link rel="stylesheet" href="/App/Ask/Public/Css/list.css" />
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

	<div id='location'>
		<a href="<?php echo U('List/index');?>">全部分类</a>&nbsp;&gt;&nbsp;
		<?php $_cate = M("category")->select();$_location = getParents($_cate, $_GET['id']);foreach($_location as $cate_val):$url = U("List/index", array("id" => $id));extract($cate_val); if($_GET['id'] != $id): ?><a href="<?php echo U('List/index', array('id' => $id));?>"><?php echo ($name); ?></a>&nbsp;&gt;&nbsp;		
			<?php else: ?>
				<?php echo ($name); endif; endforeach ?>
	</div>
<!--------------------中部-------------------->
	<div id='center'>
		<div id='left'>
			<div id='cate-list'>
				<p class='title'>按分类查找</p>
				<ul>
					<?php if(is_array($cate)): foreach($cate as $key=>$v): ?><li>
							<a href="<?php echo U('List/index', array('id' => $v['id']));?>"><?php echo ($v["name"]); ?></a>
						</li><?php endforeach; endif; ?>					
				</ul>
			</div>
			<div id='answer-list'>
				<ul class='ans-sel'>
					<li <?php if(($type) == "0"): ?>class='on'<?php endif; ?>>
						<a href="<?php echo U('List/index', array('id' => $_GET['id'], 'type' => 0));?>">待解决问题</a>
					</li>
					<li <?php if(($type) == "1"): ?>class='on'<?php endif; ?>>
						<a href="<?php echo U('List/index', array('id' => $_GET['id'], 'type' => 1));?>">已解决</a>
					</li>
					<li <?php if(($type) == "2"): ?>class='on'<?php endif; ?>>
						<a href="<?php echo U('List/index', array('id' => $_GET['id'], 'type' => 2));?>">高悬赏</a>
					</li>
					<li class='last <?php if(($type) == "3"): ?>on<?php endif; ?>'>
						<a href="<?php echo U('List/index', array('id' => $_GET['id'], 'type' => 3));?>">零回答</a>
					</li>
				</ul>
				<!-- 待解决问题 -->
				<table>
					<tr>
						<th class='t1' colspan='2'>标题</th>
						<th width='50'>回答数</th>
						<th width="150">时间</th>
					</tr>
					<?php if(is_array($cateAsk)): foreach($cateAsk as $key=>$v): ?><tr>
							<td class='t1'>
								<a title='<?php echo ($v["content"]); ?>' href="<?php echo U('Answer/index', array('id' => $v['id'], 'cid' => $v['cid']));?>">
									<?php if($v['reward']): ?><b><?php echo ($v["reward"]); ?></b><?php endif; ?>
									<?php echo strCut($v['content'], 90);?>
								</a>
							</td>
							<td width='50'>[&nbsp;<?php echo ($v["name"]); ?>&nbsp;]</td>
							<td><?php echo ($v["answer"]); ?></td>
							<td><?php echo (time_to_date($v["time"])); ?></td>
						</tr><?php endforeach; endif; ?>					
					<tr class='page'><td colspan='4'><?php echo ($page); ?></td></tr>
				</table>

			</div>
		</div>

		<!-- 右侧 -->
		<div id='right'>
	<?php if(isset($_SESSION['uid']) OR isset($_SESSION['username'])): $field = array("id","face","username","answer","ask","adopt","point","exp");$_user_info = M("user")->field($field)->find($_SESSION["uid"]);extract($_user_info);$adopt = floor($adopt/$answer*100)."%";$level = exp_to_level($exp);$face = empty($face)? "/App/Ask/Public/Images/noface.gif" : "/Uploads/Face/s_$face";$url = U("Member/index", array("id" => $id));?><div class='userinfo'>
				<dl>
					<dt>
						<a href="<?php echo ($url); ?>"><img src="<?php echo ($face); ?>" width='48' height='48' alt="<?php echo ($username); ?>"/></a>
					</dt>
					<dd class='username'>
						<a href="<?php echo ($url); ?>"><b><?php echo ($username); ?></b></a>
						<a href="">
							<i class='level lv<?php echo ($level); ?>' title='lv<?php echo ($level); ?>'></i>
						</a>
					</dd>
					<dd>金币：<a href="" style="color: #888888;"><?php echo ($point); ?><b class='point'></b></a></dd>
					<dd>经验值：<?php echo ($exp); ?></dd>
				</dl>
				<table>
					<tr>
						<td>回答数</td>
						<td>采纳率</td>
						<td class='last'>提问数</td>
					</tr>
					<tr>
						<td><a target='_blank' href="<?php echo U('Member/answer', array('id' => $id, 'from' => 'answer'));?>"><?php echo ($answer); ?></a></td>
						<td><a target='_blank' href="<?php echo U('Member/answer', array('id' => $id, 'from' => 'answer', 'type' => 1));?>"><?php echo ($adopt); ?></a></td>
						<td class='last'><a target='_blank' href="<?php echo U('Member/ask', array('id' => $id, 'from' => 'ask'));?>"><?php echo ($ask); ?></a></td>
					</tr>
				</table>
				<ul>
					<li><a target='_blank' href="<?php echo U('Member/ask', array('id' => $id, 'from' => 'ask'));?>">我提问的</a></li>
					<li><a target='_blank' href="<?php echo U('Member/answer', array('id' => $id, 'from' => 'answer'));?>">我回答的</a></li>
				</ul>
			</div>
	<?php else: ?>
		<div class='r-login'>
			<span class='login'><i></i>&nbsp;登录</span>
			<span class='register'><i></i>&nbsp;注册</span>
		</div><?php endif; ?>
	<div class='clear'></div>
	<div class='star'>
		<p class='title'>虎书问答之星</p>
		<span class='star-name'>本日回答问题最多的人</span>
		<?php $uid = M("answer")->where(array("time" => array("gt", strtotime(date("y-m-d")))))->getField("uid", true);$where = empty($uid) ? "" : array("id" => array("in", $uid));$field = array("id,face,username,exp,adopt,answer");$_today_Answer = M("user")->where($where)->field($field)->limit(3)->order("answer DESC")->select();foreach ($_today_Answer as $_today_Answer_val):extract($_today_Answer_val);$adopt = floor($adopt/$answer*100)."%";$level = exp_to_level($exp);$face = empty($face)? "/App/Ask/Public/Images/noface.gif" : "/Uploads/Face/s_$face";$url = U("Member/index", array("id" => $id));?><div class='star-info'>
				<div>
					<a href="<?php echo ($url); ?>" class='star-face'>
						<img src="<?php echo ($face); ?>" width='48px' height='48px' alt="<?php echo ($username); ?>"/>
					</a>
					<ul>
						<li><a href="<?php echo ($url); ?>"><?php echo ($username); ?></a></li>
						<i class='level lv<?php echo ($level); ?>' title='Level <?php echo ($level); ?>'></i>
					</ul>
				</div>
				<ul class='star-count'>
					<li>回答数：<span><?php echo ($answer); ?></span></li>
					<li>采纳率：<span><?php echo ($adopt); ?></span></li>
				</ul>
			</div><?php endforeach ?>
		<span class='star-name'>历史回答问题最多的人</span>
		<?php $field = array("id,username,exp,adopt,answer,face");$_history_Answer = M("user")->limit(2)->order("answer DESC")->select();foreach ($_history_Answer as $_history_Answer_val):extract($_history_Answer_val);$adopt = floor($adopt/$answer*100)."%";$level = exp_to_level($exp);$face = empty($face)? "/App/Ask/Public/Images/noface.gif" : "/Uploads/Face/s_$face";$url = U("Member/index", array("id" => $id));?><div class='star-info'>
				<div>
					<a href="<?php echo ($url); ?>" class='star-face'>
						<img src="<?php echo ($face); ?>" width='48px' height='48px' alt="<?php echo ($username); ?>"/>
					</a>
					<ul>
						<li><a href="<?php echo ($url); ?>"><?php echo ($username); ?></a></li>
						<i class='level lv<?php echo ($level); ?>' title='Level <?php echo ($level); ?>'></i>
					</ul>
				</div>
				<ul class='star-count'>
					<li>回答数：<span><?php echo ($answer); ?></span></li>
					<li>采纳率：<span><?php echo ($adopt); ?></span></li>
				</ul>
			</div><?php endforeach ?>
	</div>
	<div class='star-list'>
		<p class='title'>虎书问答助人光荣榜</p>
		<div>
			<ul class='ul-title'>
				<li>用户名</li>
				<li style='text-align:right;'>帮助过的人数</li>
			</ul>
			<ul class='ul-list'>
				<?php $field = array("id,username,adopt");$help_mast_user = M("user")->field($field)->limit(8)->order("adopt DESC")->select();foreach ($help_mast_user as $help_val):extract($help_val);$url = U("Member/index", array("id" => $id)); ?><li>
						<a target="_blank" href="<?php echo ($url); ?>"><i class='rank r1'></i><?php echo ($username); ?></a>
						<span><?php echo ($adopt); ?></span>
					</li><?php endforeach ?>				
			</ul>
		</div>
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