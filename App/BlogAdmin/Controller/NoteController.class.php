<?php
namespace BlogAdmin\Controller;
use Think\Controller;
/**
  * 随心笔记控制器
  */ 
Class NoteController extends CommonController{

	//笔记列表视图
	Public function index(){
		$db = M('notes');
		$count = $db->count();
		$page = new \Think\Page($count, 8);
		$limit = $page->firstRow . ',' . $page->listRows;
		
		$this->notes = $db->order('addtime  DESC')->limit($limit)->select();
		$this->page = $page->show(); 
		$this->display();
	}

	//添加笔记视图
	Public function add(){
		$this->display();
	}

	//添加笔记表单处理
	Public function addNotes(){
		if (!IS_POST) {
			E('页面不存在');
		}

		//判断用户是否上传配图
		if($_FILES['notespic']['name']){
			$upload = new \Think\Upload();// 实例化上传类
			$upload->maxSize   =     3145728 ;// 设置附件上传大小 
			$upload->exts      =     array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型 
			$upload->savePath  =     '/NotesPic/'; // 设置附件上传目录  
			$upload->replace   =     true;   //同名文件覆盖
			$upload->autoSub   =     true;
			$upload->subType   =     'date';
			$upload->dateFormat =    'Y-m-d';  

			if(!$info = $upload->upload()) {    
				$this->error($upload->getError());
		    }
		}
		//组合配图的文件路径
		$notesPic = $info['notespic']['savepath'] . $info['notespic']['savename'];
		//组合数据
		$data = array(
			'content' => $_POST['content'],
			'addtime' => time(),
			'title' => I('title'),
			'notespic' =>  $notesPic ? $notesPic : ''
			);
		//插入到笔记表中
		if (M('notes')->add($data)) {
			$this->success('添加成功', U('index'));
		} else {
			$this->error('添加失败');
		}
	}

	//删除笔记
	Public function delNotes(){
		$id = I('id');
		if (!$id) {
			E(页面不存在);
		}
		if (M('notes')->delete($id)) {
			$this->success('删除成功', U('Notes/index'));
		} else {
			$this->error();
		}
	}	

	//编辑笔记视图
	Public function edit(){
		$id = I('id');
		$this->notes = M('notes')->where(array('id' => $id))->find();
		$this->display();
	}

	//修改笔记操作
	Public function editNotes(){
		if (!IS_POST) {
			E('页面不存在');
		}

		//判断用户是否上传配图
		if($_FILES['notespic']['name']){
			$upload = new \Think\Upload();// 实例化上传类
			$upload->maxSize   =     3145728 ;// 设置附件上传大小 
			$upload->exts      =     array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型 
			$upload->savePath  =     '/NotesPic/'; // 设置附件上传目录  
			$upload->replace   =     true;   //同名文件覆盖
			$upload->autoSub   =     true;
			$upload->subType   =     'date';
			$upload->dateFormat =    'Y-m-d';  

			if(!$info = $upload->upload()) {    
				$this->error($upload->getError());
		    } else {
		    	unlink(I('oldPic'));
		    }
		}

		//组合配图的文件路径
		$notesPic = $info['notespic']['savepath'] . $info['notespic']['savename'];
		//组合数据
		$data = array(
			'id' => I('id'),
			'content' => $_POST['content'],
			'title' => I('title'),
			'notespic' =>  $notesPic ? $notesPic : M('notes')->where(array('id' => I('id')))->getField('notespic')
			);
		//更新笔记数据
		if (M('notes')->save($data)) {
			$this->success('修改成功', U('Note/index'));
		} else {
			$this->error('修改失败');
		}
	}
}
?>