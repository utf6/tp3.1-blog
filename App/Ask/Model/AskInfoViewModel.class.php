<?php 
namespace Ask\Model;
use Think\Model\ViewModel;
/**
 * 读取问题详情视图模型
 */
Class AskInfoViewModel extends ViewModel{

	Protected $viewFields = array(
		'ask' => array(
			'id','answer','content','uid','reward','time','solved','_type'=>'LEFT'
			),
		'user' => array(
			'username','exp','_on'=>'ask.uid = user.id'
			)
		);
}
?>