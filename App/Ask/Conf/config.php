<?php
return array(
	//'配置项'=>'配置值'
	//自定义__PUBLIC__解析路径
	'TMPL_PARSE_STRING' => array(
		'__PUBLIC__' => __ROOT__ .'/' . APP_NAME . '/' . MODULE_NAME . '/Public'
		),

	//前端自动登录配置
	'AUTO_LOGIN_KEY' => 'www.tigerbook.cn',      //用来移位或加密的key值
	'AUTO_LOGIN_LIVETIME' => time() + 3600*24*7, //自动登陆有效时间

	'URL_MODEL' => 0,
	'URL_HTML_SUFFIX' => '.html',
	//加载自定义标签配置
	'TAGLIB_PRE_LOAD' => 'Ask\TagLib\Ask', //自定义标签位置
	'TAGLIB_LOAD' => true, //开启加载
	'TAGLIB_BUILD_IN' => 'cx,Ask\TagLib\Ask',// 定义成内置标签
);