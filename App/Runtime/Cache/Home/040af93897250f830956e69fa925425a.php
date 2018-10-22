<?php if (!defined('THINK_PATH')) exit();?><div class="template">
	<div class="box">
		<h3><p><span>虎书博客</span>最热 Hot</p></h3>
		<ul>
			<?php if(is_array($top)): foreach($top as $key=>$v): ?><li><a title="<?php echo ($v["title"]); ?>" href="<?php echo U('/' . $v['id']);?>"><img alt="<?php echo ($v["title"]); ?>" src="/Uploads<?php echo ($v["blogpic"]); ?>"></a><span><?php echo ($v["title"]); ?></span></li><?php endforeach; endif; ?>			 
		</ul>
	</div>
</div>