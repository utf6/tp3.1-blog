<?php
//000000000003s:355:"<?php $_cate = M("category")->select();$_location = getParents($_cate, $_GET['id']);foreach($_location as $cate_val):$url = U("List/index", array("id" => $id));extract($cate_val);?><?php if($_GET['id'] != $id): ?><a href="{:U('List/index', array('id' => $id))}">{$name}</a>&nbsp;&gt;&nbsp;		
			<?php else: ?>
				{$name}<?php endif; ?><?php endforeach ?>";
?>