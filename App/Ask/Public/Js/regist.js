//定义json 获取注册表单数据是否验证成功
var validate = {
	account : false,
	username : false,
	pwd : false,
	pwded : false,
	verify : false,
	loginAccount : false,
	loginPwd : false
}

var msg = '';   //定义全局 提示信息

$(function(){
	
	//获取注册表单
	var regist = $("form[name='regist']");
	$("input[type='text']").val("");

	//注册表单提交时 判断表单元素是否验证通过
	regist.submit(function(){

		//如果通过则表单提交
		var ok = validate.account && validate.pwd && validate.pwded && validate.verify;
		if (ok) {
			return true;
		}

		//否则 未通过元素重新进行验证
		$("input[name='username']", regist).trigger('blur');
		$("input[name='pwd']", regist).trigger('blur');
		$("input[name='pwded']", regist).trigger('blur');
		$("input[name='verify']", regist).trigger('blur');

		return false;
	});

	//判断账号是否正确
	$('input[name="account"]', regist).blur(function(){
		//获取用户名
		var account = $(this).val();
		var span = $(this).next();

		//判断账号为空
		if (account == '') {
			msg = '忘记填写啦';

			span.html(msg).addClass('error');
			validate.account = false;
			return;
		};

		//账号是否合格
		if (!/^[a-zA-Z]\w{5,11}$/.test(account)) {
			msg = '6-12个字符：已字母开头 、数字下划线';

			span.html(msg).addClass('error');
			validate.account = false;
			return;
		};

		//异步验证账号是否已存在
		$.post(checkAccountUrl, {account:account}, function(data){
			if (data.status) {
				msg = '账号已存在';
				span.html(msg).addClass('error');
				validate.account = false;
				return;
			};
		}, 'json');

		//验证通过
		msg = '';
		span.html(msg).removeClass('error');
		validate.account = true;
	});

	//判断用户名是否正确
	$("input[name='username']", regist).blur(function(){
		var username = $(this).val();
		var span = $(this).next();

		if (username == '') {
			msg = "忘记填写啦";
			span.html(msg).addClass('error');

			validate.username = false;
			return;
		};

		if (!/^[\u4e00-\u9fa5|\w]{1,11}$/.test(username)) {
			msg = '中文、数字、字母位2-12';
			span.html(msg).addClass('error');

			validate.username = false;
			return;
		};

		$.post(checkUsernameUrl, {username:username}, function(data){
			if (data.status) {
				msg = '用户名已存在';
				span.html(msg).addClass('error');

				validate.username = false;
			}
		}, 'json');

		msg = '';
		span.html(msg).removeClass('error');
		validate.username = true;
	});

	//验证密码是否 正确填写
	$("input[name='pwd']", regist).blur(function(){
		var pwd = $(this).val();
		var span = $(this).next();

		//验证密码是否填写
		if (pwd == '') {
			msg = '忘记填写啦';
			span.html(msg).addClass('error');

			validate.pwd = false;
			return;
		};

		//判断密码格式是否正确
		if (!/^[a-zA-Z0-9]\w{5,15}$/.test(pwd)) {
			msg = '密码以字母数字开头，6-16位';
			span.html(msg).addClass('error');

			validate.pwd = false;
			return;
		};

		//验证通过
		msg = '';
		span.html(msg).removeClass('error');
		validate.pwd = true;
	});

	//验证确认密码
	$("input[name='pwded']", regist).blur(function(){
		var pwded = $(this).val();
		var span = $(this).next();

		//判断确认密码是否填写
		if (pwded == '') {
			msg = '忘记填写啦';
			span.html(msg).addClass('error');

			validate.pwded = false;
			return;
		};

		//判断确认密码格式是否正确
		if (!/^[a-zA-Z0-9]\w{5,15}$/.test(pwded)) {
			msg = '确认密码以字母数字开头，6-16位';
			span.html(msg).addClass('error');

			validate.pwded = false;
			return;
		};

		//判断两次密码是否一致
		if (pwded != $("input[name='pwd']").val()) {
			msg = '两次密码不一致';
			span.html(msg).addClass('error');

			validate.pwded = false;
			return;
		};

		//通过验证
		msg = '';
		span.html(msg).removeClass('error');
		validate.pwded = true;
	});

	//判断验证码是否正确
	$("input[name='verify']", regist).blur(function(){
		var verify = $(this).val();
		var span = $(this).next().next();

		//判断验证码是否正确
		if (verify == '') {
			msg = '忘记填写啦';
			span.html(msg).addClass('error');

			validate.verify = false;
			return;
		};

		//异步验证验证码是否正确
		$.post(checkVerifyUrl, {verify:verify}, function(data){
			if (data.status) {
				msg = '验证码错误';
				span.html(msg).addClass('error');

				validate.verify = false;
				return;
			};
		}, 'json');

		//验证通过
		msg = '';
		span.html(msg).removeClass('error');
		validate.verify = true;
	});


	//登录表单验证
	var login = $("form[name='login']");
	login.submit(function(){
		if (validate.loginAccount && validate.loginPwd) {
			return true;
		}
		$("input[name='account']", login).trigger('blur');
		$("input[name='pwd']", login).trigger('blur');
		return false;
	});

	$("input[name='account']", login).blur(function(){
		var account = $(this).val();
		var span = $('#login-msg');

		if (account == '') {
			span.html('请输入账号');
			validate.loginAccount = false;
			return;
		}

		span.html('');
		validate.loginAccount = true;	
	});

	$("input[name='pwd']", login).blur(function(){
		var account = $("input[name='account']", login).val();
		var password = $(this).val();
		var span = $("#login-msg");

		if (password == '') {
			span.html('请输入密码');
			validate.loginPwd = false;
			return;
		};

		if (account == '') {
			span.html('请输入账号1');
			validate.loginAccount = false;
			return;
		};
		$.post(checkLoginUrl, {account: account, password:password}, function(status){
			if (!status) {
				span.html('账号或密码不正确');
				validate.loginPwd = false;
				return;
			}
		}, 'json');

		span.html('');
		validate.loginPwd = true;

	})
});