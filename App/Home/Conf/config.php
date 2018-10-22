<?php
return array(
	//自定义__PUBLIC__解析路径
	'TMPL_PARSE_STRING' => array(
		'__PUBLIC__' => __ROOT__ .'/' . APP_NAME . '/' . MODULE_NAME . '/Public'
		),
	'HTML_PATH' => '__APP__/Html',
	
	'URL_CASE_INSENSITIVE' => true,  //关闭区分大小写
	//开启静态缓存
	'HTML_CACHE_ON' => true,
	'HTML_CACHE_RULES' => array(
		'List' => array('{:module}_{:action}_{id}', 0)
	)
);