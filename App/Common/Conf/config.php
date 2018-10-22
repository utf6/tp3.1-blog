<?php
return array(
	//数据库连接参数
	'DB_TYPE' => 'mysql',
	'DB_HOST' => '116.255.150.169',
	'DB_PORT'   => '4009',
	'DB_USER' => 'hushu_f',
	'DB_PWD' => 'wwt202218',
	'DB_NAME' => 'hushu',
	'DB_PREFIX' => 'tb_',

	//URL模式 0：普通模式，1：pathinfo，2：rewrite模式
	'URL_MODEL' => 2,
	'URL_HTML_SUFFIX' => 'html',  //伪静态后缀名

	'TMPL_VAR_IDENTIFY' => 'array',//指定点语法解析类型

	'APP_GROUP_LIST' => 'Home,blogadmin,Wish,WishAdmin,Ask,AskAdmin',  //模块列表
	'DEFAULT_GROUP' => 'Home',	//默认模块
	
	'LOAD_EXT_CONFIG' => 'blogSite,goldRule,experRule,askSite',  //加载站点配置
	
	'URL_CASE_INSENSITIVE' => false,  //关闭区分大小写
	'URL_ROUTER_ON' => true, //开启路由
	'URL_ROUTE_RULES' => array(		
		'/^c_(\d+)$/' => 'Home/List/index?id=:1',
		':id\d' => 'Home/List/content',
		'about' => 'Home/Index/about',
		'web' => 'Home/List/index',
		'notes' => 'Home/Notes/index',
		':p\d'=>'web/',
		'note/:p\d' => 'Home/Notes/index',
		),
	/* 错误页面模板 */
	// 'TMPL_ACTION_ERROR'     =>  './App/Public/error.html', // 默认错误跳转对应的模板文件'
	// 'TMPL_ACTION_SUCCESS'   =>  './App/Public/error.html', // 默认成功跳转对应的模板文件'
	// 'TMPL_EXCEPTION_FILE'   =>  './App/Public/error.html',// 异常页面的模板文件
	
	//seession 写入数据库
	//'SESSION_TYPE' => 'Db',
	//'SESSION_PREFIX' => 'sess_',
	//'SESSION_TYPE' => 'Redis',    //设置缓存类型为redis

	//redis  配置
	//'REDIS_HOST' => '127.0.0.1',  //redis服务器地址
	//'REDIS_PORT' => 6379          //redis端口
);