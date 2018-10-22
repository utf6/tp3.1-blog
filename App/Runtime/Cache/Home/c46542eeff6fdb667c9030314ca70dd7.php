<?php if (!defined('THINK_PATH')) exit();?><div class="rnav">
  	<h2>栏目导航</h2>
	<ul>
		<?php if(is_array($newcate)): foreach($newcate as $key=>$v): ?><li><a href="<?php echo U('/c_' . $v['id']);?>" ><?php echo ($v["name"]); ?></a></li><?php endforeach; endif; ?>	
	</ul>      
</div>
<div class="rnavs">
	<h2>栏目导航</h2>
	<ul>
		<?php if(is_array($newcate)): foreach($newcate as $key=>$v): ?><li><a href="<?php echo U('/c_' . $v['id']);?>" ><?php echo ($v["name"]); ?></a></li><?php endforeach; endif; ?>					
	</ul>      
</div>