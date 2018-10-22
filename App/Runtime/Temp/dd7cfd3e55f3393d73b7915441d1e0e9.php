<?php
//000000604800s:229:"<?php $_top_cate = M("category")->where(array("pid" => 0))->select();foreach ($_top_cate as $_cate_value):extract($_cate_value);$url = U("List/index", array("id" => $id));?><li><a href="{$url}">{$name}</a></li><?php endforeach ?>";
?>