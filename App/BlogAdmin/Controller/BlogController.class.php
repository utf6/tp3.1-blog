<?php
namespace BlogAdmin\Controller;
use Think\Controller;
/**
 * 博文管理控制器
 */
Class BlogController extends CommonController{

	//博文列表
	Public function index(){
		$db = D('BlogView'); //实例化视图模型
		$count = $db->count();
		$page = new \Think\Page($count, 15);
		$limit = $page->firstRow . ',' . $page->listRows;

		$this->blog = $db->order('addtime DESC')->limit($limit)->select();
		$this->page = $page->show();
		$this->display();
	}

	//添加博文视图
	Public function add(){
		$cate = M('blog_cate')->order('sort')->select();
		$this->cate = getCateLeve($cate);
		$this->display();
	}

	//添加博文表单处理
	Public function addBlog(){
		//判断用户是否上传配图
		if($_FILES['blogPic']['name']){
			$upload = new \Think\Upload();// 实例化上传类
			$upload->maxSize   =     3145728 ;// 设置附件上传大小 
			$upload->exts      =     array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型 
			$upload->savePath  =     '/BlogPic/'; // 设置附件上传目录  
			$upload->replace   =     true;   //同名文件覆盖
			$upload->autoSub   =     true;
			$upload->subType   =     'date';
			$upload->dateFormat =    'Y-m-d';  

			if(!$info = $upload->upload()) {    
				$this->error($upload->getError());
		    }
		}
		//组合配图的文件路径
		$blogPic = $info['blogPic']['savepath'] . $info['blogPic']['savename'];
		//组合博文信息
		$data = array(
			'title' => I('title'),
			'cid' => I('cid'),
			'blogpic' => $blogPic ? $blogPic : '',
			'click' => I('click'),
			'addtime' => time(),
			'remark' => I('remark'),
			'content' => $_POST['content']
			);
		//添加博文数据
		if (M('blog')->add($data)) {
			$this->success('添加成功', U('index'));
		} else {
			$this->error('添加失败');
		}
	}

	//删除博文操作
	Public function delete(){
		$id = I('id');
		if(!$id){
E('页面不存在');
}


		if (M('blog')->delete($id)) {
			//如果博文有图
			if ($blogPic = M('blog')->where(array('id' => $id))->getField('blogpic')) {
				unlink('./Uploads' . $blogPic);
			}
			$this->success('删除成功', U('index'));
		} else{
			$this->error('删除失败');
		}
	}

	//修改博文视图
	Public function edit(){
		$id = I('id');
		$this->blog = M('blog')->where(array('id' => $id))->find();
		$cate = M('blog_cate')->select();
		$this->cate = getCateLeve($cate);
		$this->display();
	}

	Public function editBlog(){
		if (!IS_POST) {
			E('页面不存在');
		}

		//判断用户是否上传配图
		if($_FILES['blogPic']['name']){
			$upload = new \Think\Upload();// 实例化上传类
			$upload->maxSize   =     3145728 ;// 设置附件上传大小 
			$upload->exts      =     array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型 
			$upload->savePath  =     '/BlogPic/'; // 设置附件上传目录  
			$upload->replace   =     true;   //同名文件覆盖
			$upload->autoSub   =     true;
			$upload->subType   =     'date';
			$upload->dateFormat =    'Y-m-d';  

			if($info = $upload->upload()) {    
				//组合配图的文件路径
				$data['blogpic'] = $info['blogPic']['savepath'] . $info['blogPic']['savename'];	
				unlink(I('oldPic'));	//删除博文原图		
		    } else {
		    	$this->error($upload->getError());
		    }		    
		}

		//组合博文信息
		$data['id'] = I('id');
		$data['title'] = I('title');
		$data['cid'] = I('cid');
		$data['click'] = I('click');
		$data['addtime'] = time();
		$data['remark'] = I('remark');
		$data['content'] = $_POST['content'];

		//更新博文信息
		if (M('blog')->save($data)) {
			$this->success('修改成功', U('index'));
		} else {
			$this->error('修改失败');
		}
	}
	
}
?>