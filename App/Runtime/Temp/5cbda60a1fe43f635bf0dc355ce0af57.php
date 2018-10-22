<?php
//000000000003s:243:"<?php $_cate = M("category")->select();$_location = getParents($_cate, $_GET["cid"]);foreach($_location as $cate_val):$url = U("List/index", array("id" => $id));extract($cate_val);?>&nbsp;&gt;&nbsp;<a href={$url}>{$name}</a><?php endforeach ?>";
?>