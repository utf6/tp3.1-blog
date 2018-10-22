<?php
namespace Home\Widget;
use Think\Controller;
/**
 * 自定义博文工具
 */
Class BlogWidget extends Controller{
	
	//热门
	Public function hot(){
		$this->hot = M('blog')->order('click DESC')->limit(9)->select();
		$this->display('Widget:hot');
	}	

	//最新
	Public function news() {
		$this->news = M('blog')->order('addtime DESC')->limit(9)->select();
		$this->display('Widget:news');
	}

	//顶端
	Public function top(){
		if (!$top = S('top')) {
			$field = array('id,title,blogpic');
			$top = M('blog')->order('addtime DESC, click DESC')->limit(5)->select();
			S('top', $top, 3600*24);
		}
		$this->top = $top;
		$this->display('Widget/top');
	}

	//内容页相关类别文章
	Public function other($name){
		$this->other = D('BlogView')->where(array('name' => $name))->limit(6)->select();
		$this->display('Widget/other');
	}

	//列表页导航栏
	Public function nav(){
		$cate = M('blog_cate')->select();
		$this->newcate = getChilds($cate, 6);
		$this->display('Widget/nav');
	}
}
?>