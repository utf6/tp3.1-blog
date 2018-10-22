<?php 
namespace WishAdmin\Controller;
use Think\Controller;
/**
 * 愿望管理控制器
 */
Class MsgManageController extends CommonController{

	//愿望列表
	Public function index() {
		$db = M('wish');
		$count = $db->count();
		$page = new \Think\Page($count,5);;
		$limit = $page->firstRow . ',' . $page->listRows;
		$this->wish = $db->limit($limit)->select();
		
		$page->setConfig('header', '条数据');
        $page->setConfig('prev', '上一页');
        $page->setConfig('next', '下一页');
        $page->setConfig('first', '首页');
        $page->setConfig('end', '末页');
		$this->page = $page->show();
		$this->display();
	}

	//删除愿望
	Public function delWish() {
		if (M('wish')->delete(I('id'))) {
			$this->success('删除成功', U('index'));
		} else {
			$this->error('删除失败');
		}
	}
}
?>