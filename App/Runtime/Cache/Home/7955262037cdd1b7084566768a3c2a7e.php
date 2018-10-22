<?php if (!defined('THINK_PATH')) exit();?>﻿<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8">

  <title>Web开发 - <?php echo (C("blog_title")); ?></title>
  <meta name="keywords" content="<?php echo (C("blog_keyword")); ?>" />
  <meta name="description" content="<?php echo (C("blog_description")); ?>" />
  <link href="/App/Home/Public/css/base.css" rel="stylesheet">
  <link href="/App/Home/Public/css/style.css" rel="stylesheet">
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

		

	

  	<article class="blogs">
		<h1 class="t_nav"><span>“慢生活”不是懒惰</span><a href="" class="n1">网站首页</a><a href="<?php echo U('/web');?>
			" class="n2">Web开发</a></h1>
		<div class="newblog left">
			<?php if(is_array($blog)): foreach($blog as $key=>$v): ?><h2><a title="<?php echo ($v["title"]); ?>" href="<?php echo U('/' . $v['id']);?>"><?php echo ($v["title"]); ?></a></h2>
				<p class="dateview"><span>发布时间：<?php echo (date('Y-m-d',$v["addtime"])); ?></span><span>作者：科巴</span><span>[<a href="<?php echo U('/c_' . $v['cid']);?>"><?php echo ($v["name"]); ?></a>]</span></p>
				<figure><a title="<?php echo ($v["title"]); ?>" href="<?php echo U('/' . $v['id']);?>" ><?php if($v['blogpic']): ?><img width="170" height="110" src="/Uploads<?php echo ($v["blogpic"]); ?>" alt="<?php echo ($v["title"]); ?>" ><?php else: ?><img src="/App/Home/Public/images/web.jpg" width="170" height="110"  alt="<?php echo ($v["title"]); ?>" ><?php endif; ?></a></figure>
				<ul class="nlist">
					<p><?php echo ($v["remark"]); ?></p>
					<a href="<?php echo U('/' . $v['id']);?>" title="<?php echo ($v["title"]); ?>" target="_blank" class="readmore">阅读全文>></a>
				</ul>
				<div class="line"></div><?php endforeach; endif; ?>				
			<div class="blank"></div>
			<div class="page"><?php echo ($page); ?></div>
		</div>
		<aside class="right">
			<?php echo W('Blog/nav');?>
			<div class="blank"></div>
			<div class="news">
				<?php echo W('Blog/news');?>
				
				<?php echo W('Blog/hot');?>
			</div>
		</aside>
	</article>
	<!-- 站内搜索 -->
<script type="text/javascript">(function(){document.write(unescape('%3Cdiv id="bdcs"%3E%3C/div%3E'));var bdcs = document.createElement('script');bdcs.type = 'text/javascript';bdcs.async = true;bdcs.src = 'http://znsv.baidu.com/customer_search/api/js?sid=9703181702474863577' + '&plate_url=' + encodeURIComponent(window.location.href) + '&t=' + Math.ceil(new Date()/3600000);var s = document.getElementsByTagName('script')[0];s.parentNode.insertBefore(bdcs, s);})();</script>
<div id="tbox"><a id="gotop" href="javascript:void(0)"></a> </div>
<footer><p><?php echo (C("blog_copyright")); ?></p></footer>
<script src="/App/Home/Public/js/silder.js"></script>
<script src="/App/Home/Public/js/share.js"></script>
</body>
</html>