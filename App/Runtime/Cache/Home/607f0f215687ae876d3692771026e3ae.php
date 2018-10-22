<?php if (!defined('THINK_PATH')) exit();?><h3><p>最热<span>文章</span></p></h3>
<ul class="rank">
	<?php if(is_array($hot)): foreach($hot as $key=>$v): ?><li><a href="<?php echo U('/' . $v['id']);?>" title="<?php echo ($v["title"]); ?>" target="_blank"><?php echo ($v["title"]); ?></a></li><?php endforeach; endif; ?> 
</ul>