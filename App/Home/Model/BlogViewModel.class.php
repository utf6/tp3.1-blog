<?php
namespace Home\Model;
use Think\Model\ViewModel;
/**
 * 博文与栏目视图模型
 */
Class BlogViewModel extends ViewModel{

	Public $viewFields = array(
		//主表要获取的字段
		'blog' => array('id','cid','title','remark','content','click','addtime','blogpic'),
		//副表要获取的字段 已经主表与副表的关联条件
		'blog_cate' => array('name', '_on' => 'blog.cid = blog_cate.id'),
		);
}
?>
