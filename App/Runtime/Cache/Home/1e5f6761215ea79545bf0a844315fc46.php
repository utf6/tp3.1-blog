<?php if (!defined('THINK_PATH')) exit();?>﻿<!doctype html>
<html>
<head>
	<meta charset="UTF-8">
	<title><?php echo ($blog["title"]); ?> - <?php echo (C("blog_title")); ?></title>
	<meta name="keywords" content="<?php echo (C("blog_keyword")); ?>" />
	<meta name="description" content="<?php echo (C("blog_description")); ?>" />

	<link href="/App/Home/Public/css/index.css" rel="stylesheet">
	<link href="/App/Home/Public/css/base.css" rel="stylesheet">
	<link href="/App/Home/Public/css/template.css" rel="stylesheet">
	<!--[if lt IE 9]>
	<script src="/App/Home/Public/js/modernizr.js"></script>
	<![endif]-->
	<!-- 返回顶部调用 begin -->
	<link href="/App/Home/Public/css/lrtk.css" rel="stylesheet" />
	<link rel="stylesheet" href="/Data/Ueditor/third-party/SyntaxHighlighter/shCoreDefault.css">
	<script type="text/javascript" src="/Data/Ueditor/third-party/SyntaxHighlighter/shcore.js"></script>
<script src="https://cdn.bootcss.com/prettify/r298/lang-apollo.js"></script>
	<script type="text/javascript">
		SyntaxHighlighter.all();
	</script>
	<style>
		#ds-thread #ds-reset .ds-powered-by {display: none;}
	</style>
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
		<h1 class="t_nav">
		<span>您当前的位置：

			<a href="http://www.tigerbook.cn">首页</a>&nbsp;>&nbsp;
			<a href="<?php echo U('/Web');?>">Web开发</a>&nbsp;>&nbsp;
			<a href="<?php echo U('/c_' . $blog['cid']);?>"><?php echo ($blog["name"]); ?></a>
		</span>
		<a href="http://www.tigerbook.cn" class="n1">网站首页</a><a href="<?php echo U('/c_' . $blog['cid'] );?>" class="n2"><?php echo ($blog["name"]); ?></a></h1>
		<div class="index_about">
    
			<h2 class="c_titile"><?php echo ($blog["title"]); ?></h2>
			<p class="box_c">
				<span class="d_time">发布时间：<?php echo (date('Y-m-d',$blog["addtime"])); ?></span>
				<span>编辑：<a href='mailto:634022773@qq.com'>Koba</a></span>
				<span>阅读：（<script type="text/javascript" src="<?php echo U('List/clickNum', array('id' => $blog['id']));?>"></script>）</span>
			</p>
			<ul class="infos"><?php echo ($blog["content"]); ?> </ul>
			<div class="blank"></div>
			<div class="keybq"><p><span>关键字词</span>：<?php echo ($blog["name"]); ?></p></div>
			<div class="blank"></div>
			<div class="nextinfo">
				<span>上一篇：<?php if($pre['id']): ?><a href="<?php echo U('/' . $pre['id']);?>"><?php echo ($pre["title"]); ?></a><?php else: ?><a><?php echo ($pre["title"]); ?></a><?php endif; ?></span>
				<span style="float:right">下一篇：<?php if($next['id']): ?><a href="<?php echo U('/' . $next['id']);?>"><?php echo ($next["title"]); ?></a><?php else: ?><a><?php echo ($next["title"]); ?></a><?php endif; ?></span>
			</div>
			<?php echo W('Blog/other', array($blog['name']));?>
			<div class="blank"></div>
			<!-- 猜你喜欢 -->
                <div id="hm_t_106521"></div>
    		<!-- 多说评论框 start -->
			<div class="ds-thread" data-thread-key="<?php echo ($blog['id']); ?>" data-title="<?php echo ($blog["title"]); ?>" data-url="<?php echo U('/' . $blog['id']);?>"></div>
			
		</div>
		<aside class="right">
			<script type="text/javascript">(function(){document.write(unescape('%3Cdiv id="bdcs"%3E%3C/div%3E'));var bdcs = document.createElement('script');bdcs.type = 'text/javascript';bdcs.async = true;bdcs.src = 'http://znsv.baidu.com/customer_search/api/js?sid=9703181702474863577' + '&plate_url=' + encodeURIComponent(window.location.href) + '&t=' + Math.ceil(new Date()/3600000);var s = document.getElementsByTagName('script')[0];s.parentNode.insertBefore(bdcs, s);})();</script>

			<?php echo W('Blog/nav');?>

			<div class="blank"></div>
			<div class="news">
	<?php echo W('Blog/hot');?>
	
	<?php echo W('Blog/news');?>	
	<h3 class="links"><p>友情<span>链接</span></p></h3>
	<ul class="website">
		<li><a href="http://www.sxlcghy.com/" target="_blank">陕西联创国画院</a></li>
	</ul>     

	<div class="bdsharebuttonbox">
		<a href="#" class="bds_more" data-cmd="more"></a>
		<a href="#" class="bds_qzone" data-cmd="qzone" title="分享到QQ空间"></a>
		<a href="#" class="bds_tsina" data-cmd="tsina" title="分享到新浪微博"></a>
		<a href="#" class="bds_tqq" data-cmd="tqq" title="分享到腾讯微博"></a>
		<a href="#" class="bds_renren" data-cmd="renren" title="分享到人人网"></a>
		<a href="#" class="bds_weixin" data-cmd="weixin" title="分享到微信"></a>
	</div>
	<script>window._bd_share_config={"common":{"bdSnsKey":{},"bdText":"","bdMini":"2","bdMiniList":false,"bdPic":"","bdStyle":"1","bdSize":"32"},"share":{}};with(document)0[(getElementsByTagName('head')[0]||body).appendChild(createElement('script')).src='http://bdimg.share.baidu.com/static/api/js/share.js?v=89860593.js?cdnversion='+~(-new Date()/36e5)];</script>
</div>
		</aside>
	</article>
	<!-- 多说评论框 end -->
<!-- 多说公共JS代码 start (一个网页只需插入一次) -->
<script type="text/javascript">
var duoshuoQuery = {short_name:"tigerbook"};
	(function() {
		var ds = document.createElement('script');
		ds.type = 'text/javascript';ds.async = true;
		ds.src = (document.location.protocol == 'https:' ? 'https:' : 'http:') + '//static.duoshuo.com/embed.js';
		ds.charset = 'UTF-8';
		(document.getElementsByTagName('head')[0] 
		 || document.getElementsByTagName('body')[0]).appendChild(ds);
	})();
	</script>
<!-- 多说公共JS代码 end -->

<!-- footer -->
<link href="/Data/Ueditor/third-party/SyntaxHighlighter/shCoreDefault.css" rel="stylesheet">
<script type="text/javascript" src='/Data/Ueditor/third-party/SyntaxHighlighter/shCore.js'></script>
<script type="text/javascript">
	SyntaxHighlighter.all();
</script>
	<!-- 站内搜索 -->
<script type="text/javascript">(function(){document.write(unescape('%3Cdiv id="bdcs"%3E%3C/div%3E'));var bdcs = document.createElement('script');bdcs.type = 'text/javascript';bdcs.async = true;bdcs.src = 'http://znsv.baidu.com/customer_search/api/js?sid=9703181702474863577' + '&plate_url=' + encodeURIComponent(window.location.href) + '&t=' + Math.ceil(new Date()/3600000);var s = document.getElementsByTagName('script')[0];s.parentNode.insertBefore(bdcs, s);})();</script>
<div id="tbox"><a id="gotop" href="javascript:void(0)"></a> </div>
<footer><p><?php echo (C("blog_copyright")); ?></p></footer>
<script src="/App/Home/Public/js/silder.js"></script>
<script src="/App/Home/Public/js/share.js"></script>
</body>
</html>