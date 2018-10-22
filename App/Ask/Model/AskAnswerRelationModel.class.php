<?php 
namespce AsK\Model;
use Think\Model\Relation;
/**
 * 问题与回答以及分类关联模型
 */
Class AskAnswerRelationModel extends RelationModel{

	Protected $tableName = 'ask';

	Protected $_link = array(
		'ask' => array(),
		'answer' => array(),
		'category' => array()
		);
}
?>