<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
	<title><?php echo (C("ask_title")); ?></title>
	<meta name="keywords" content="提问，知道，php，生活"/>
	<meta name="description" content="虎书问答是基于搜索的互动式知识问答分享平台。用户可以根据自身的需求，有针对性地提出问题；同时，这些答案又将作为搜索结果，满足有相同或类似问题的用户需求。"/>
	<link rel="stylesheet" href="/App/Ask/Public/Css/common.css" />
	<script type="text/javascript" src='/App/Ask/Public/Js/jquery-1.7.2.min.js'></script>
	<script type="text/javascript" src='/App/Ask/Public/Js/top-bar.js'></script>
	<link rel="stylesheet" href="/App/Ask/Public/Css/question.css" />
	<script type="text/javascript">
		var login = false;
		<?php if(isset($_SESSION["uid"]) && isset($_SESSION["ask_login_username"])): ?>var login = true;<?php endif; ?>
	</script>
	<script type="text/javascript" src="/App/Ask/Public/Js/question.js"></script>
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
		<?php $_cate = M("category")->select();$_location = getParents($_cate, $_GET["cid"]);foreach($_location as $cate_val):$url = U("List/index", array("id" => $id));extract($cate_val);?>&nbsp;&gt;&nbsp;<a href=<?php echo ($url); ?>><?php echo ($name); ?></a><?php endforeach ?>
	</div>

	<!--------------------中部-------------------->
	<div id='center-wrap'>
		<div id='center'>
			<div id='left'>
				<div id='answer-info'>
					<!-- 如果没有解决用wait -->
					<div class='ans-state <?php if(!$askInfo["solved"]): ?>wait<?php endif; ?>'></div>
					<div class='answer'>
						<p class='ans-title'><?php echo ($askInfo["content"]); ?>
							<?php if($askInfo["reward"]): ?><b class='point'><?php echo ($askInfo["reward"]); ?></b><?php endif; ?>
						</p>
					</div>
					<ul>
						<li><a href="<?php echo U('Member/index', array('id' => $askInfo['uid']));?>"><?php echo ($askInfo["username"]); ?></a></li>
						<li><i class='level lv<?php echo exp_to_level($askInfo["exp"]);?>' title='Level <?php echo exp_to_level($askInfo["exp"]);?>'></i></li>
						<li><?php echo time_to_date($askInfo['time']);?></li>
				
					</ul>
					<?php if(!$askInfo["solved"] and ($_SESSION["uid"] != $askInfo["uid"]) and (!in_array($_SESSION["uid"], $allAnswerId))): ?><div class='ianswer'>
							<form action="<?php echo U('Answer/answer');?>" id="sendAnswer" method="post">
								<p>我来回答</p>
								<textarea name="content"></textarea>
								<input type="hidden" name='aid' value='<?php echo ($askInfo["id"]); ?>'>
								<input type="submit" value='提交回答' id='anw-sub'/>
							</form>
						</div><?php endif; ?>
					<!-- 满意回答 -->
					<?php if($askInfo["solved"]): ?><div class='ans-right'>
							<p class='title'><i></i>满意回答<span></span></p>
							<p class='ans-cons'><?php echo ($goodAnswer["content"]); ?></p>
							<dl>
								<dt>
									<a href="<?php echo U('Member/index', array('id' => $goodAnswer['uid']));?>"><img src="/App/Ask/Public/Images/noface.gif" width='48' height='48'/></a>
								</dt>
								<dd>
									<a href="<?php echo U('Member/index', array('id' => $goodAnswer['uid']));?>"><?php echo ($goodAnswer["username"]); ?></a>
								</dd>
								<dd><i class='level lv<?php echo exp_to_level($goodAnswer["exp"]);?>' title="lv<?php echo exp_to_level($goodAnswer["exp"]);?>"></i></dd>
								<dd>采纳率：<?php echo floor($goodAnswer['adopt'] / $goodAnswer['answer'] *100);?>%</dd>
							</dl>
						</div><?php endif; ?>
				</div>
				<?php if($allAnswer): ?><div id='all-answer'>
						<div class='ans-icon'></div>
						<p class='title'>共 <strong><?php echo ($askInfo["answer"]); ?></strong> 条回答</p>
						<ul>
							<?php if(is_array($allAnswer)): foreach($allAnswer as $key=>$v): ?><li>
									<div class='face'>
										<a href="<?php echo U('Member/index', array('id' => $v['uid']));?>">
											<img src="<?php if($v["face"]): ?>/Uploads/face/<?php echo ($v["face"]); ?>
											<?php else: ?>/App/Ask/Public/Images/noface.gif<?php endif; ?>" width='48' height='48'/>
											<span><?php echo ($v["username"]); ?></span>
										</a>
									</div>
									<div class='cons <?php if($key%2): ?>blue<?php else: ?> fen<?php endif; ?>'>
										<p><?php echo ($v["content"]); ?><span style='color:#888;font-size:12px'>&nbsp;&nbsp;(<?php echo time_to_date($v['time']);?>)</span></p>
										<!-- <p>
											<span style="width:auto;padding:0 3px;float:left;margin-bottom:5px;" class='adopt-btn'><font color='green'>完善我的回答</font></span>
										</p>
										<div style="margin-left:10px " class='ianswer'>
											<form  action="<?php echo U('Answer/answer');?>" id="sendAnswer" method="post">
												
												<textarea style="width:96%;margin:0 auto;height :110px;padding:3px;border: 1px solid #ACACAC;resize:none;" name="content"><?php echo ($v["content"]); ?></textarea>
												<input type="hidden" name='aid' value='<?php echo ($askInfo["id"]); ?>'>
												<input type="submit" style="width: 70px;height: 26px;border: none;border-radius:4px;background : url(/App/Ask/Public/Images/form-btn.png) right -300px;color: #FFF;float: right;font-size: 14px;text-align: center;cursor: pointer;margin:5px 10px 5px 10px;" value='确认修改' id='anw-sub'/>
											</form>
										</div> -->
									</div>
									<?php if(!$askInfo["solved"] and isset($_SESSION["uid"]) and ($_SESSION["uid"] == $askInfo["uid"])): ?><a href="<?php echo U('Answer/adopt', array('id' => $askInfo['id'], 'aid' => $v['id'], 'reward' => $askInfo['reward'], 'uid' => $v['uid']));?>" class='adopt-btn'>采纳</a><?php endif; ?>
									
								</li><?php endforeach; endif; ?>						
						</ul>
						<div class='page'><?php echo ($page); ?></div>
					</div><?php endif; ?>
				<div id='other-ask'>
					<p class='title'>待解决的相关问题</p>
					<table>
						<?php if(is_array($notSolve)): foreach($notSolve as $key=>$v): ?><tr>
								<td class='t1'><a href="<?php echo U('Answer/index', array('id' => $v['id'], 'cid'=> $v['cid']));?>"><?php echo ($v["content"]); ?></a></td>
								<td><?php echo ($v["answer"]); ?>&nbsp;回答</td>
								<td><?php echo time_to_date($v['time']);?></td>
							</tr><?php endforeach; endif; ?>						
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