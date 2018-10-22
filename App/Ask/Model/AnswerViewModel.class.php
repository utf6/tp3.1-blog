<?php 
namespace Ask\Model;
use Think\Model\ViewModel;
/**
 * 获取所有回答视图模型
 */
Class AnswerViewModel extends ViewModel{

	Protected $viewFields = array(
		'answer' => array(
			'id','content','time','uid','_type'=>'LEFT'
			),
		'user' => array(
			'username','adopt','answer','exp','face','_on'=>'answer.uid = user.id'
			)
		);
}
?>