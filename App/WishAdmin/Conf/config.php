<?php 
return array(
	//RBAC权限配置
	'RBAC_SUPERADMIN' => 'admin',        //超级管理员名称
	'ADMIN_AUTH_KEY' => 'superadmin',    //超级管理员识别码
	'USER_AUTH_KEY' => 'uid',            //用户认证识别号
	'USER_AUTH_ON' => true,              //是否开启验证
	'USER_AUTH_TYPE' => 1,               //验证类型(1:登录验证, 2:时时验证)
	'NOT_AUTH_MODULE' => 'Index,System',        //默认无需认证模块
	'NOT_AUTH_ACTION' => '',       //默认无需认证方法
	'RBAC_ROLE_TABLE' => 'tb_role',      //角色表明称
	'RBAC_USER_TABLE' => 'tb_role_user', //角色与用户的中间表名称
	'RBAC_ACCESS_TABLE' => 'tb_access',  //权限表名称
	'RBAC_NODE_TABLE' => 'tb_node',      //节点表名称

	//伪静态后缀名
	'URL_HTML_SUFFIX' => '',
	);
?>