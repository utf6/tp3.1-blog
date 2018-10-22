<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>随心笔记 - <?php echo (C("blog_title")); ?></title>
	<meta name="keywords" content="<?php echo (C("blog_keyword")); ?>" />
	<meta name="description" content="<?php echo (C("blog_description")); ?>" />
	<link href="/App/Home/Public/css/base.css" rel="stylesheet">
	<link href="/App/Home/Public/css/mood.css" rel="stylesheet">
	<!--[if lt IE 9]>
	<script src="/App/Home/Public/js/modernizr.js"></script>
	<![endif]-->
	<!-- 返回顶部调用 begin -->
	<link href="/App/Home/Public/css/lrtk.css" rel="stylesheet" />
	<script type="text/javascript" src="/App/Home/Public/js/jquery.js"></script>
	<script type="text/javascript" src="/App/Home/Public/js/js.js"></script>
	<!-- 返回顶部调用 end-->
</head>
<body>
	<header>
	<div id="logo"><a href=""></a></div>
	<nav class="topnav" id="topnav">
		<a href="http://www.tigerbook.cn"><span>首页</span><span class="en">Protal</span></a>
		<a href="<?php echo U('/notes');?>"><span>随心笔记</span><span class="en">Notes</span></a>
		<a href="<?php echo U('/web');?>"><span>Web开发</span><span class="en">Web</span></a>
		<a href="/ask" target="_blank" ><span>虎书问答</span><span class="en">Ask</span></a>
		<a target="_blank" href="/wish"><span>许愿墙</span><span class="en">Wish</span></a>
	</nav>
<script>
var _hmt = _hmt || [];
(function() {
  var hm = document.createElement("script");
  hm.src = "//hm.baidu.com/hm.js?542eaa32612afea45eeee1140b931889";
  var s = document.getElementsByTagName("script")[0]; 
  s.parentNode.insertBefore(hm, s);
})();
</script>

</header>

		

	<div class="moodlist">
		<h1 class="t_nav"><span>删删写写，回回忆忆，虽无法行云流水，却也可碎言碎语。</span><a href="http://www.tigerbook.cn" class="n1">网站首页</a><a href="<?php echo U('/notes');?>" class="n2">随心笔记</a></h1>
		<div class="bloglist">
			<?php if(is_array($notes)): foreach($notes as $key=>$v): ?><ul class="arrow_box">
					<div class="sy">
						<p><?php if($v['notespic']): ?><img src="/Uploads<?php echo ($v["notespic"]); ?>" alt="<?php echo ($v["title"]); ?>" /><?php endif; ?><b style="color:red"><?php echo ($v["title"]); ?></b></p><?php echo ($v["content"]); ?>
					</div>
					<span class="dateview"><?php echo (date('Y-m-d',$v["addtime"])); ?></span>
				</ul><?php endforeach; endif; ?>
			
		</div>
		<div class="page"><?php echo ($page); ?></div> 
	</div>
	<!-- 站内搜索 -->
<script type="text/javascript">(function(){document.write(unescape('%3Cdiv id="bdcs"%3E%3C/div%3E'));var bdcs = document.createElement('script');bdcs.type = 'text/javascript';bdcs.async = true;bdcs.src = 'http://znsv.baidu.com/customer_search/api/js?sid=9703181702474863577' + '&plate_url=' + encodeURIComponent(window.location.href) + '&t=' + Math.ceil(new Date()/3600000);var s = document.getElementsByTagName('script')[0];s.parentNode.insertBefore(bdcs, s);})();</script>
<div id="tbox"><a id="gotop" href="javascript:void(0)"></a> </div>
<footer><p><?php echo (C("blog_copyright")); ?></p></footer>
<script src="/App/Home/Public/js/silder.js"></script>
<script src="/App/Home/Public/js/share.js"></script>
</body>
</html>