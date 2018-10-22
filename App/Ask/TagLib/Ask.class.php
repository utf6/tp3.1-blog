<?php
namespace Ask\TagLib;
use Think\Template\TagLib;
/**
 * 自定义问答工具
 */
Class Ask extends TagLib{

	Protected $tags = array(
			'topCate' => array('attr' => 'limit,order,where'), 
			'userinfo' => array('attr' => 'id'),
			'location' => array('attr' => 'id'),
			'help' => array('attr' => 'limit'),
			'todayAnswer' => array('attr' => 'limit'),
			'historyAnswer' => array('attr' => 'limit')
		); 
	
	//定级分类
	Public function _topCate($tag, $content){
		$attr = $this->parseXmlAttr($arr);

		if (S('topCate')) {
			$str = S('topCate');
		} else {
			//组合标签内容
			$str .= '<?php ';
			$str .= '$_top_cate = M("category")->where(array("pid" => 0))->select();'; //读取栏目数据
			$str .= 'foreach ($_top_cate as $_cate_value):';
			$str .= 'extract($_cate_value);';
			$str .= '$url = U("List/index", array("id" => $id));?>'; //定义栏目链接地址
			$str .= $content;
			$str .= '<?php endforeach ?>';

			S('topCate', $str, 3600*24*7);
		}

		return $str;
	}	

	//获取用户信息标签
	Public function _userinfo($attr, $content){
		$id = $attr['id'] ? $attr['id'] : $_SESSION['uid'];

		if (S('user_info'. $id)) {
			$str = S('user_info'.$id);
		} else {
			$str .= '<?php ';
			$str .= '$field = array("id","face","username","answer","ask","adopt","point","exp");';
			$str .= '$_user_info = M("user")->field($field)->find('.$id.');';
			$str .= 'extract($_user_info);';
			$str .= '$adopt = floor($adopt/$answer*100)."%";';
			$str .= '$level = exp_to_level($exp);';
			$str .= '$face = empty($face)? "__PUBLIC__/Images/noface.gif" : "__ROOT__/Uploads/Face/s_$face";';
			$str .= '$url = U("Member/index", array("id" => $id));?>';
			$str .= $content;

			S('user_info'.$id, $str, 3);
		}

		return $str;
	}

	//获取所在地址
	Public function _location($attr, $content){
		$cid = $attr['id'];

		if (S('location'.$cid)) {
			$str = S('location'.$cid);
		} else {
			//组合标签内容
			$str ='<?php ';
			$str .= '$_cate = M("category")->select();';
			$str .= '$_location = getParents($_cate, '.$cid.');';
			$str .= 'foreach($_location as $cate_val):';
			$str .= '$url = U("List/index", array("id" => $id));';
			$str .= 'extract($cate_val);?>';
			$str .= $content;
			$str .= '<?php endforeach ?>';
			
			S('location'.$cid, $str, 3);
		}	

		return $str;
	}

	//获取帮助别人最多的用户标签
	Public function _help($attr, $content){
		$limit = $attr['limit'];		

		$str = '<?php ';
		$str .= '$field = array("id,username,adopt");';
		$str .= '$help_mast_user = M("user")->field($field)->limit('.$limit.')->order("adopt DESC")->select();';
		$str .= 'foreach ($help_mast_user as $help_val):';
		$str .= 'extract($help_val);';
		$str .= '$url = U("Member/index", array("id" => $id)); ?>';

		$str .= $content;
		$str .= '<?php endforeach ?>';
		return $str;
	}

	//获取今日回答最多者标签
	Public function _todayAnswer($attr, $content){
		$limit = $attr['limit'];

		//获取今日回答问题的用户的ID
		$str = '<?php ';
		$str .= '$uid = M("answer")->where(array("time" => array("gt", strtotime(date("y-m-d")))))->getField("uid", true);';
		$str .= '$where = empty($uid) ? "" : array("id" => array("in", $uid));';
		$str .= '$field = array("id,face,username,exp,adopt,answer");';
		$str .= '$_today_Answer = M("user")->where($where)->field($field)->limit('.$limit.')->order("answer DESC")->select();';

		$str .= 'foreach ($_today_Answer as $_today_Answer_val):';
		$str .= 'extract($_today_Answer_val);';
		$str .= '$adopt = floor($adopt/$answer*100)."%";';
		$str .= '$level = exp_to_level($exp);';
		$str .= '$face = empty($face)? "__PUBLIC__/Images/noface.gif" : "__ROOT__/Uploads/Face/s_$face";';
		$str .= '$url = U("Member/index", array("id" => $id));?>';

		$str .= $content;
		$str .= '<?php endforeach ?>';
		return $str;
	}

	//获取历史回答最多者标签
	Public function _historyAnswer($attr, $content){
		$limit = $attr['limit'];

		$str = '<?php ';
		$str .= '$field = array("id,username,exp,adopt,answer,face");';
		$str .= '$_history_Answer = M("user")->limit('.$limit.')->order("answer DESC")->select();';
		$str .= 'foreach ($_history_Answer as $_history_Answer_val):';
		$str .= 'extract($_history_Answer_val);';
		$str .= '$adopt = floor($adopt/$answer*100)."%";';
		$str .= '$level = exp_to_level($exp);';
		$str .= '$face = empty($face)? "__PUBLIC__/Images/noface.gif" : "__ROOT__/Uploads/Face/s_$face";';
		$str .= '$url = U("Member/index", array("id" => $id));?>';

		$str .= $content;
		$str .= '<?php endforeach ?>';
		return $str;
	}

}
?>