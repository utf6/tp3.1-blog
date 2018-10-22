<?php 
namespace WishAdmin\Model;
use Think\Model\RelationModel;
/**
 * 用户与角色关联模型
 */
Class UserRelationModel extends RelationModel {
	//主表的名称
	Protected $tableName = "wish_user";

	Protected $_link = array(
		//要关联的副表
		'role' => array(
			'mapping_type' => self::MANY_TO_MANY, //关联关系
			'foreign_key' => 'user_id', //关联中间表外键
			'relation_table' => 'tb_role_user', //中间表名称
			'relation_key' => 'role_id', //关联副表外键
			'mapping_fields' => 'id,remark'  //读取副表的字段
			)
		);
}
?>