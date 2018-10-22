<?php if (!defined('THINK_PATH')) exit();?>﻿<!doctype html>
<html lang="zh-cn">
<head>
	<meta charset="UTF-8">
	<title><?php echo (C("blog_title")); ?></title>
	<meta name="keywords" content="<?php echo (C("blog_keyword")); ?>" />
	<meta name="description" content="<?php echo (C("blog_description")); ?>" />
	<link href="/App/Home/Public/css/base.css" rel="stylesheet">
	<link href="/App/Home/Public/css/index.css" rel="stylesheet">
	<!--[if lt IE 9]>
	<script src="/App/Home/Public/Js//modernizr.js"></script>
	<![endif]-->
	<link href="/App/Home/Public/css/lrtk.css" rel="stylesheet" />
	<script type="text/javascript" src="/App/Home/Public/js/jquery.js"></script>
	<script type="text/javascript" src="/App/Home/Public/js/js.js"></script>
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

		
		<div class="banner">
			<section class="box">
				<ul class="texts">
				  <p>我们不停的翻弄着回忆</p>
				  <p>却再也找不回那时的自己</p>
				  <p>红尘一梦，不再追寻</p>
				</ul>
				<div class="avatar"><a href="about.html"><span>科巴</span></a> </div>
			</section>
		</div>
		
		<!-- <?php echo W('Blog/top');?> -->
		
		<article>
			<h2 class="title_tj"><p>文章<span>推荐</span></p></h2>
			<div class="bloglist left">
				<?php if(is_array($blog)): foreach($blog as $key=>$v): ?><h3><a href="<?php echo U('/' . $v['id']);?>" ><?php echo ($v["title"]); ?></a></h3>
					<figure><img src="./Uploads<?php echo ($v["blogpic"]); ?>" alt="<?php echo ($v["title"]); ?>"></figure>
					<ul>
						<p><?php echo ($v["remark"]); ?></p>
					  	<a title="<?php echo ($v["title"]); ?>" href="<?php echo U('/' . $v['id']);?>"  target="_blank" class="readmore">阅读全文>></a>
					</ul>
					<p class="dateview"><span><?php echo (date('Y-m-d',$v["addtime"])); ?></span><span>作者：Coba</span><span>虎书博客：[<a href=
						><?php echo ($v["name"]); ?></a>]</span></p><?php endforeach; endif; ?>    
			</div>
			<aside class="right">
				<div class="weather11">
					<iframe width="200" scrolling="no" height="55" frameborder="0" allowtransparency="true" src="http://i.tianqi.com/index.php?c=code&id=35&icon=1&num=3"></iframe>
				</div>
				
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
		<!-- 站内搜索 -->
<script type="text/javascript">(function(){document.write(unescape('%3Cdiv id="bdcs"%3E%3C/div%3E'));var bdcs = document.createElement('script');bdcs.type = 'text/javascript';bdcs.async = true;bdcs.src = 'http://znsv.baidu.com/customer_search/api/js?sid=9703181702474863577' + '&plate_url=' + encodeURIComponent(window.location.href) + '&t=' + Math.ceil(new Date()/3600000);var s = document.getElementsByTagName('script')[0];s.parentNode.insertBefore(bdcs, s);})();</script>
<div id="tbox"><a id="gotop" href="javascript:void(0)"></a> </div>
<footer><p><?php echo (C("blog_copyright")); ?></p></footer>
<script src="/App/Home/Public/js/silder.js"></script>
<script src="/App/Home/Public/js/share.js"></script>
	</body>
</html>