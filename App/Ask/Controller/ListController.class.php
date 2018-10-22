<?php 
namespace Ask\Controller;
use Think\Controller;
/**
 * 问题分类列表控制
 */
Class ListController extends CommonController{

	Public function index(){
		$id = I('id', 0, 'intval');

		//获取子栏目
		$cate = M('category')->where(array('pid' => $id))->select();
		$cid = getChildsId($cate, $id);

		$type = I('type', 0, 'intval');
		switch ($type) {
			case 1:
				$where['solved'] = 1;
				break;
			case 2:
				$where['reward'] = array('gt', 0);
				break;
			case 3:
				$where['answer'] = 0;
				break;
			default:
				$where['solved'] = 0;
				break;
		}

		//如果子栏目为空返回同级栏目
		if (!$cate) {
			$pid = M('category')->where(array('id' => $id))->getField('pid');
			$cate = M('category')->where(array('pid' => $pid))->select();
			$cid[] = $id;
			
			//如果$Id不存在返回所有定级栏目
			if (!$cate) {
				$cate = M('category')->where(array('pid' => 0))->select();
				$cid = getChildsId($cate, $id);
			}
		}
		$this->cate = $cate;

		//读取对应栏目下的问题
		$model = D('AskView');
		$where['cid'] = array('in', $cid);
		//分页
		$count = $model->where($where)->count();
		$page = new \Think\Page($count, 15);
		$limit = $page->firstRow . ',' . $page->listRows;

		//分配数据到模板
		$this->cateAsk = $model->where($where)->limit($limit)->select();
		$this->page = $page->show();
		$this->type = $type;
		$this->display();
	}
}
?>