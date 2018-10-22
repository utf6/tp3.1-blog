<?php
namespace AskAdmin\Controller;
use Think\Controller;
/**
 * 后台首页控制器
 */
class IndexController extends CommonController {
    
    //后台首页
    Public function index(){
    	$this->display();
    }

    //后台欢迎页
    Public function welcome(){
    	$this->display();
    }

    //退出登录
    Public function logOut(){    	
    	session_unset();
    	session_destroy();
    	redirect(U('Login/index'));
    }
}