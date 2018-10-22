<?php 
namespace Ask\Controller;
use Think\Controller;
/**
 * 问答前端用户控制器
 */
Class MemberController extends CommonController{

	//用户信息视图
	Public function index(){
		$id = I('id', 'intval');
		$field = array('id,username,ask,answer,point,exp,face');
		$user = M('user')->where(array('id' => $id))->field($field)->find();

		//用户不存在跳转至首页
		if (!$user || !$id) {
			redirect(U('Index/index'));
		}
		$this->user = $user;   //获取用户基本信息

		//读取用户提问
		$this->myAsk = D('AskView')->where(array('uid' => $id))->limit(10)->select();

		//判断用户是否回答过问题 
		$aid = M('answer')->where(array('uid' => $id))->getField('aid', true);
		if ($aid) {
			//读取用户回答
			$this->myAnswer = D('AskView')->where(array('id' => array('in', $aid)))->limit(10)->select();
		} else {
			//显示空
			$this->myAnswer = '';
		}

		$this->display();
	}

	//用户提问详情页面
	Public function ask(){
		$id = I('id', 'intval');
		if (!$id || I('from') != 'ask') {
			redirect(U('Index/index')); 
		}
		
		$where = array(
			'uid' => $id,
			'solved' => I('solve', 0, 'intval')
			);

		$model = D('AskView');    //实例化问题关联用户视图模型
		//读取用户 未解决问题
		$this->nosolve_ask = $model->where($where)->limit(15)->select();

		//读取用户 以解决问题
		$this->solve_ask = $model->where($where)->limit(15)->select();
		$this->display();
	}

	//用户回答视图
	Public function answer(){
		$id = I('id', 'intval');
		//判断用户是否存在
		if (!$id || !M('user')->find($id) || I('from') != 'answer') {
			redirect(U('Index/index'));
		}

		//用户所有回答
		$aid = M('answer')->where(array('uid' => $id))->getField('aid', true);
		if ($aid) {
			$this->all_answer = D('AskView')->where(array('id' => array('in', $aid)))->limit(15)->select();
		} else {
			$this->all_answer = '';
		}
		
		//被采纳回答
		$aid = M('answer')->where(array('uid' => $id, 'adopt' => 1))->getField('aid', true);
		if ($aid) {
			$this->adopt_answer = D('AskView')->where(array('id' => array('in', $aid)))->limit(15)->select();
		} else {
			$this->adopt_answer = '';
		}

		$this->display();
	}

	Public function level(){
		$id = I('id', 'intval');
		$exp = M('user')->where(array('id' => $id))->getField('exp') + 1;

		if (!$id || !$exp || I('from') != 'level') {
			redirect(U('List/index'));
		}

		$lv = exp_to_level($exp);        //当前等级
		$nextExp = C('exp_lv'.($lv+1));	 //下一级需要多少经验

		//组合用户等级信息
		$level_info = array(
			'lv' => $lv,
			'exp' => $exp,
			'nextExp' => $nextExp,
			'differ' =>  $nextExp - $exp,   //距离下一级相差多少经验
			'nextLv' => $lv + 1             //下一级等级
			);
		$this->level_info = $level_info;
		$this->display();
	}

	//用户金币信息页面
	Public function point(){
		$id = I('id', 'intval');
		$user = M('user')->where(array('id' => $id))->field(array('id,point'))->find();

		if (!$id || !$user || I('from') != 'point') {
			redirect(U('List/index'));
		}

		$this->user_gold = $user['point'];
		$this->display();
	}

	//修改头像视图
	Public function face(){
		if (I('id') != $_SESSION['uid'] || I('from') != 'face') {
			redirect(U('List/index'));
		}
		$this->user_face = M('user')->where(array('id' => session('uid')))->getField('face');
		$this->display();
	}

	//修改头像处理
	Public function upFace(){
		if(!IS_POST){
			E('页面不存在');
		}

		//上传文件配置
		$config = array(
		    'maxSize'    =>    3145728,                   //上传的文件大小限制 (0-不做限制)
		    'savePath'   =>    'Face/',
		    'saveName'   =>    array('uniqid',''),    
		    'exts'       =>    array('jpg', 'gif', 'png', 'jpeg'),   //允许上传的文件后缀  
		    'autoSub'    =>    false,    //自动子目录保存文件
		    'subName'    =>    'uniqid', //子目录创建方式，[0]-函数名，[1]-参数，多个参数使用数组
		    'replace' => true   //存在同名是否覆盖
		);

		$upload = new \Think\Upload($config);// 实例化上传类

		if ($info   =  $upload->upload()) {

			//删除用户原有头像
			if ($face = M('user')->where(array('id' => session('uid')))->getField('face')) {
				unlink('./Uploads/Face/s_'. $face);
				unlink('./Uploads/Face/m_'. $face);
			}

			$savepath = './Uploads/' . $info["face"]["savepath"] ;   //保存路径
			$savename = $info["face"]["savename"];	                 //保存文件名
			$imgpath = $savepath . $savename; //原图路径

			// 生成缩略图
			$image = new \Think\Image(); 
			$image->open($imgpath);             
			$image->thumb(180, 180)->save($savepath . 'm_' . $savename);	//生成大缩略图
			$image->thumb(48, 48)->save($savepath . 's_' . $savename);	//生成小缩略图
			unlink($imgpath);   //删除原图

			$data = array(
				'id' => session('uid'),
				'face' => $savename
				);
			if (M('user')->data($data)->save()) {
				redirect(U('face', array('id' => session('uid'), 'from' => 'face')));
			}

		} else{
			$this->error($upload->getError());
		}	    
	}
}
?>