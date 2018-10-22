<?php
namespace Wish\Controller;
use Think\Controller;

class IndexController extends Controller {
	//首页视图
    Public function index(){
        $this->wish = M('wish')->select();
        $this->display();
    }

    //异步发送愿望
    Public function ajaxSend() {
    	if (!IS_AJAX) {
    		E('页面不存在');
    	}
        //提取post数据
    	$wish = array(
    		'username' => I('username'),
    		'content' => I('content'),
    		'createtime' => time()
    		);
        //插入数据 并用Ajax返回到页面
    	if ($id = M('wish')->data($wish)->add()) {
    		$data = array(
    			'id' => $id,
    			'time' => date('Y-m-d H:i:s', $wish['createtime']),
    			'content' => replace_phiz($wish['content']),
    			'username' => $wish['username'],
    			'status' => 1 
    			);
    		$this->ajaxReturn($data, 'json');
    	} else {
    		$this->ajaxReturn(array('status' => 0), 'json');
    	}
    }
}