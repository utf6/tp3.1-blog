<?php if (!defined('THINK_PATH')) exit();?><div class="otherlink">
	<h2>相关文章</h2>
	<ul>
		<?php if(is_array($other)): foreach($other as $key=>$v): ?><li><a href="<?php echo U('/' . $v['id']);?>" title="<?php echo ($v["title"]); ?>"><?php echo ($v["title"]); ?></a></li><?php endforeach; endif; ?>
	</ul>
</div>