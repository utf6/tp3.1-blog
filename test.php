<?php  
  function getIpPlace($ip = ''){
        if(empty($ip)){
            $ip = $this->GetIp();
        }
        $res = @file_get_contents('http://int.dpool.sina.com.cn/iplookup/iplookup.php?format=js&ip=' . $ip);
        if(empty($res)){ return false; }
        $jsonMatches = array();
        preg_match('#\{.+?\}#', $res, $jsonMatches);
        if(!isset($jsonMatches[0])){ return false; }
        $json = json_decode($jsonMatches[0], true);
        if(isset($json['ret']) && $json['ret'] == 1){
            $json['ip'] = $ip;
            unset($json['ret']);
        }else{
            return false;
        }
        return $json;
    }

    //得到具体位置地址
    function index(){
        $ip = $_SERVER["REMOTE_ADDR"];
        //$ip = "58.246.172.130";
        $ipInfos = getIpPlace($ip);
        $city = $ipInfos['city'];
        $info = $city."网友";
        return $info;
    }

echo index();