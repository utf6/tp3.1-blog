<?php 
namespace Ask\Model;
use Think\Model\ViewModel;
/**
 * 获取用户提问视图模型
 */
Class AskViewModel extends ViewModel{

	Protected $viewFields = array(
		'ask' => array(
			'id','content','reward','answer','uid','time','cid',
			'_type' => 'LEFT'
			),
		'category' => array(
			'name',
			'_on' => 'ask.cid = category.id'
			)

		);
}
?>