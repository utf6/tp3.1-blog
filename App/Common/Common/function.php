<?php 
//公用函数
/*
自定义打印数组函数
 */
function p($arr) {
	echo '<pre>';
	print_r($arr);
	echo '</pre>';
}

/**
 * 将时间戳转为发布时间
 * @param  [type] $time [发布时间戳]
 * @return [type]       [发布形式时间]
 */
function time_to_date($time){
	$today = strtotime(date('y-m-d'));
	$yesterday = strtotime(date("Y-m-d",strtotime("-1 day")));
	$diff = time() - $time;
	$str = '';

	switch(true){
		case $diff < 60 :
			$str = '刚刚';
			break;
		case $diff < 3600 :
			$str =  floor($diff/60) . '分钟前';
			break;
		case $time > $today :
			$str = '今天' . date('H:i', $time);
			break;
		case $time > $yesterday :
			$str = '昨天' . date('H:i', $time);
			break;
		default :
			$str = date('Y-m-d H:i', $time);
			break; 
	}
	return $str;
}

/**
 * 经验值转为等级函数
 * @param  [intger] $exp [经验值]
 * @return [intger]      [等级]
 */
function exp_to_level($exp){
	switch(true){
		case $ext >= C('exp_lv20') :
			return 20;
		case $ext >= C('exp_lv19') :
			return 19;
		case $ext >= C('exp_lv18') :
			return 18;
		case $ext >= C('exp_lv17') :
			return 17;
		case $ext >= C('exp_lv16') :
			return 16;
		case $ext >= C('exp_lv15') :
			return 15;
		case $ext >= C('exp_lv14') :
			return 14;
		case $ext >= C('exp_lv13') :
			return 13;
		case $ext >= C('exp_lv12') :
			return 12;
		case $ext >= C('exp_lv11') :
			return 11;
		case $ext >= C('exp_lv10') :
			return 10;
		case $ext >= C('exp_lv9') :
			return 9;
		case $ext >= C('exp_lv8') :
			return 8;
		case $ext >= C('exp_lv7') :
			return 7;
		case $ext >= C('exp_lv6') :
			return 6;
		case $ext >= C('exp_lv5') :
			return 5;
		case $ext >= C('exp_lv4') :
			return 4;
		case $ext >= C('exp_lv3') :
			return 3;
		case $ext >= C('exp_lv2') :
			return 2;
		default :
			return 1;

	}
}

/**
 * 自定义分页函数
 * @param $model 模型，引用传递
 * @param $where 查询条件
 * @param int $pageSize 每页查询条数
 * @return \Think\Page
 */
function getpage($model, $where = null, $pageSize=1){
	$where = $where ? $where : '';
    $count = $model->where($where)->count();//连惯操作后会对join等操作进行重置
	$page = new Think\Page($count, $pageSize);
	$page->parameter = $row; //此处的row是数组，为了传递查询条件
	$page->setConfig('first','首页');
	$page->setConfig('prev','上一页');
	$page->setConfig('next','下一页');
	$page->setConfig('last','尾页');
	$page->setConfig('theme','%FIRST% %UP_PAGE% %LINK_PAGE% %DOWN_PAGE% %END% 第 '.I('p',1).' 页/共 %TOTAL_PAGE% 页 ( '.$pageSize.' 条/页 共 %TOTAL_ROW% 条)');

    return $page;
}

/**
 * [限制字符串长度 超过长度用省略号表示]
 * @param  [string] $str    [要进行截取的字符串]
 * @param  [intger] $len    [为截取长度（汉字算一个字，字母算半个字）]
 * @return [string]         [截取之后的字符串]
 */
function strCut($str, $len){
	$str = trim($str);
	$string = ""; 
    $offset = 0;  
    $chars = 0;  
    $count = 0;  

    $length = strlen($str);//待截取字符串的字节数  
    while($chars < $len && $offset<$length){  
        $high = decbin(ord(substr($str,$offset,1)));//先截取客串的一个字节，substr按字节进行截取  
        //重要突破，已经能够判断高位字节  
        if(strlen($high)<8){//英文字符ascii编码长度为7，通过长度小于8来判断  
            $count = 1;  
            // echo 'hello,I am in','<br>';  
        }elseif (substr($high,0,3) == '110') {  
            $count = 2; //取两个字节的长度  
        }elseif (substr($high,0,4) == '1110') {  
            $count = 3; //取三个字节的长度  
        }elseif (substr($high,0,5) == '11110') {  
            $count = 4;  
  
        }elseif (substr($high,0,6) == '111110') {  
            $count = 5;  
        }elseif(substr($high,0,7)=='1111110'){  
            $count = 6;  
        }  
        $string .= substr($str, $offset, $count);  
        $chars +=1;  
        $offset += $count;  
    }
	return strlen($string) > $len ? $string . '...' : $string;
}


/**
 * 快速文件数据读取和保存 针对简单类型数据 字符串、数组
 * @param string $name 缓存名称
 * @param mixed $value 缓存值
 * @param string $path 缓存路径
 * @return mixed
 */
function SET($name, $value='', $path=DATA_PATH) {
    static $_cache  = array();
    $filename       = $path . $name . '.php';
    if ('' !== $value) {
        if (is_null($value)) {
            // 删除缓存
            return false !== strpos($name,'*')?array_map("unlink", glob($filename)):unlink($filename);
        } else {
            // 缓存数据
            $dir            =   dirname($filename);
            // 目录不存在则创建
            if (!is_dir($dir))
                mkdir($dir,0755,true);
            $_cache[$name]  =   $value;
            return file_put_contents($filename, strip_whitespace("<?php\treturn " . var_export($value, true) . ";?>"));
        }
    }
    if (isset($_cache[$name]))
        return $_cache[$name];
    // 获取缓存数据
    if (is_file($filename)) {
        $value          =   include $filename;
        $_cache[$name]  =   $value;
    } else {
        $value          =   false;
    }
    return $value;
}

/**
 * 递归重组节点信息为多维数组
 * @param  [array]  $node [要处理的节点数组]
 * @param  [array]  $access [角色所拥有的权限]
 * @param  integer $pageid  [父级节点ID]
 * @return [array]     [重组好之后的节点数组]
 */
function node_merge($node, $access = null, $pageid = 0) {
	$arr = array();

	foreach ($node as $v) {
		//添加一个access 键值来判断是否有权限
		if (is_array($access)) {
			$v['access'] = in_array($v['id'], $access) ? 1 : 0;
		}

		//组合属于上级的子节点
		if ($v['pid'] == $pageid) {
			$v['child'] = node_merge($node, $access, $v['id']);
			$arr[] = $v;
		}
	}
	return $arr;
}
/**
 * 许愿内容表情替换
 * @param  [String] $content [String]
 * @return [img]  $arr        [表情]
 */
function replace_phiz($content) {

	preg_match_all('/\[.*?\]/is', $content, $arr);

	if ($arr[0]) {
		$pagehiz = F('Phiz', '', './Data/');
		foreach ($arr[0] as $j) {
			foreach ($pagehiz as $key => $v) {
				if ($j == '[' . $v . ']' ) {
					$content = str_replace($j, '<img src=" ' . __ROOT__ . '/' . APP_NAME . '/' . MODULE_NAME . '/Public/Images/phiz/' . $key . '.gif"/>', $content);
					break;
				}
			}
		}
	}
	return $content;
}

/**
 * 组合一维数组（组合栏目列表）
 * @param  [Array]  $cate  [所有栏目数组]
 * @param  [Intger] $pid   [所属父级的ID]
 * @param  [String] $html  [子级栏目前填充标识]
 * @param  [Intger] $level [栏目级别]
 * @return [Array]  $arr   [重组后的栏目数组]
 */
function getCateLeve($cate, $pid = 0, $level = 0, $html = '|'){
	$arr = array();
	foreach ($cate as $v) {
		//组合出顶级栏目
		if ($v['pid'] == $pid) {
			$v['html'] = str_repeat($html, $level); //子级栏目填充标识
			$v['level'] = $level;	//栏目级别加1
			$arr[] = $v;
			//将顶级栏目和其子栏目组合起来并且加上子级栏目标识，利用pid来区别 第一次的pid = 0 表示顶级栏目 其子栏目则为pid等与顶级栏目的ID 
			$arr = array_merge($arr, getCateLeve($cate, $v['id'], $level+1));
		}
	}
	return $arr;
}

/**
 * 组合多维数组（前台栏目显示）
 * @param  [Array]  $cate  [所有栏目数组]
 * @param  [Intger] $pid   [所属父级的ID]
 * @return [Array]  $arr   [组合成多维的栏目数组]
 */
function getCateLayer($cate, $pid = 0){
	$arr = array();
	foreach ($cate as $v) {
		if ($v['pid'] == $pid) {
			$v['child'] = getCateLayer($cate, $v['id']);
			$arr[] = $v;
		}
	}
	return $arr;
}

/**
 * 根据子级ID返回所有父级节点
 * @param  [Array]  $cate  [所有栏目数组]
 * @param  [Intger] $pid   [子级的ID]
 * @return [Array]  $arr   [子级和父级合并后的数组]
 */
function getParents($cate, $id){
	$arr = array();
	foreach ($cate as $v) {
		if ($v['id'] == $id) {
			$arr[] = $v;
			$arr = array_merge(getParents($cate, $v['pid']), $arr);
		}
	}
	return $arr;
}

/**
 * 根据父级ID返回所有子级分类
 */
function getChilds($cate, $id){
	$arr = array();
	foreach ($cate as $v) {
		if ($v['pid'] == $id) {
			$arr[] = $v;
			$arr = array_merge($arr, getChilds($cate, $v['id']));
		}
	}
	return $arr;
}

/**
 * 根据父级ID返回所有子级分类ID
 */
function getChildsId($cate, $id){
	$arr = array();
	foreach ($cate as $v) {
		if ($v['pid'] == $id) {
			$arr[] = $v['id'];
			$arr = array_merge($arr, getChildsId($cate, $v['id']));
		}
	}
	return $arr;
}

/**
 * 问答前段自动登陆移位或加密函数
 * @param  [type]  $value [要加密的登录信息]
 * @param  integer $type  [0：解密，1：加密]
 * @return [string]         [加密或解密后的字符串]
 */
function encryption($value, $type = 0){
	$key = md5(C('AUTO_LOGIN_KEY'));

	//移位或加密 / 解密
	if ($type) {
		return str_replace('=', '', base64_encode($value ^ $key));
	} else {
		return base64_decode($value) ^ $key;
	}
}
?>