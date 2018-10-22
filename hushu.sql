-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 2016-06-21 23:09:05
-- 服务器版本： 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `hushu`
--

-- --------------------------------------------------------

--
-- 表的结构 `tb_access`
--

CREATE TABLE IF NOT EXISTS `tb_access` (
  `role_id` smallint(6) unsigned NOT NULL,
  `node_id` smallint(6) unsigned NOT NULL,
  `level` tinyint(1) NOT NULL,
  `module` varchar(50) DEFAULT NULL,
  KEY `groupId` (`role_id`),
  KEY `nodeId` (`node_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `tb_access`
--

INSERT INTO `tb_access` (`role_id`, `node_id`, `level`, `module`) VALUES
(1, 15, 0, NULL),
(1, 14, 0, NULL),
(1, 2, 0, NULL),
(1, 8, 0, NULL),
(1, 9, 0, NULL),
(1, 10, 0, NULL),
(1, 7, 0, NULL),
(1, 1, 0, NULL),
(4, 15, 0, NULL),
(4, 14, 0, NULL),
(4, 2, 0, NULL),
(4, 4, 0, NULL),
(4, 5, 0, NULL),
(4, 3, 0, NULL),
(4, 1, 0, NULL);

-- --------------------------------------------------------

--
-- 表的结构 `tb_admin`
--

CREATE TABLE IF NOT EXISTS `tb_admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` char(20) NOT NULL COMMENT '用户名',
  `password` varchar(32) NOT NULL COMMENT '用户密码',
  `loginip` varchar(20) NOT NULL COMMENT '登录IP',
  `logintime` int(10) DEFAULT NULL COMMENT '登录时间',
  `lock` tinyint(1) NOT NULL DEFAULT '0' COMMENT '是否锁定 0：未锁定 1：已锁定',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='博客用户表' AUTO_INCREMENT=2 ;

--
-- 转存表中的数据 `tb_admin`
--

INSERT INTO `tb_admin` (`id`, `username`, `password`, `loginip`, `logintime`, `lock`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', '127.0.0.1', 1466515724, 0);

-- --------------------------------------------------------

--
-- 表的结构 `tb_answer`
--

CREATE TABLE IF NOT EXISTS `tb_answer` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `content` varchar(255) NOT NULL DEFAULT '' COMMENT '答案内容',
  `time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '回答时间',
  `adopt` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '是否被采纳 0：未采纳，1：已采纳',
  `aid` int(10) unsigned NOT NULL COMMENT '所属问题ID',
  `uid` int(11) NOT NULL COMMENT '所属用户ID',
  PRIMARY KEY (`id`),
  KEY `aid` (`aid`),
  KEY `uid` (`uid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='回答表' AUTO_INCREMENT=4 ;

--
-- 转存表中的数据 `tb_answer`
--

INSERT INTO `tb_answer` (`id`, `content`, `time`, `adopt`, `aid`, `uid`) VALUES
(2, '还是挺不错的，值得入手！！', 1466171969, 0, 2, 2);

-- --------------------------------------------------------

--
-- 表的结构 `tb_ask`
--

CREATE TABLE IF NOT EXISTS `tb_ask` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `content` varchar(255) NOT NULL DEFAULT '' COMMENT '问题内容',
  `reward` smallint(6) unsigned NOT NULL DEFAULT '0' COMMENT '奖励金币数',
  `answer` smallint(10) unsigned NOT NULL DEFAULT '0' COMMENT '该问题回答数',
  `solved` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '是否解决 0：未解决，1：已解决',
  `time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '提问时间',
  `uid` int(10) unsigned NOT NULL COMMENT '所属用户ID',
  `cid` int(10) unsigned NOT NULL COMMENT '所属分类ID',
  PRIMARY KEY (`id`),
  KEY `uid` (`uid`),
  KEY `cid` (`cid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='问题表' AUTO_INCREMENT=4 ;

--
-- 转存表中的数据 `tb_ask`
--

INSERT INTO `tb_ask` (`id`, `content`, `reward`, `answer`, `solved`, `time`, `uid`, `cid`) VALUES
(2, '华硕电脑的风行堡垒怎么样？？？？', 0, 1, 0, 1466171887, 1, 1);

-- --------------------------------------------------------

--
-- 表的结构 `tb_blog`
--

CREATE TABLE IF NOT EXISTS `tb_blog` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` char(50) NOT NULL DEFAULT '',
  `content` text,
  `addtime` int(10) DEFAULT '0',
  `remark` varchar(100) NOT NULL DEFAULT '',
  `click` smallint(6) DEFAULT '100',
  `cid` int(10) NOT NULL,
  `blogpic` char(50) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- 转存表中的数据 `tb_blog`
--

INSERT INTO `tb_blog` (`id`, `title`, `content`, `addtime`, `remark`, `click`, `cid`, `blogpic`) VALUES
(1, 'ThinkPHP3.2关联模型BELONGS_TO实例详解分析', '<pre class="brush:php;toolbar:false">&lt;?php&nbsp;\r\nnamespace&nbsp;BlogAdmin\\Model;\r\nuse&nbsp;Think\\Model\\RelationModel;\r\n/**\r\n&nbsp;*&nbsp;用户与角色关联模型\r\n&nbsp;*/\r\nClass&nbsp;BlogRelationModel&nbsp;extends&nbsp;RelationModel&nbsp;{\r\n&nbsp;&nbsp;&nbsp;&nbsp;//主表的名称\r\n&nbsp;&nbsp;&nbsp;&nbsp;Protected&nbsp;$tableName&nbsp;=&nbsp;&quot;blog&quot;;\r\n\r\n&nbsp;&nbsp;&nbsp;&nbsp;Protected&nbsp;$_link&nbsp;=&nbsp;array(\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;//要关联的副表\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&#39;blog_cate&#39;&nbsp;=&gt;&nbsp;array(\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&#39;mapping_type&#39;&nbsp;=&gt;&nbsp;self::BELONGS_TO,&nbsp;&nbsp;&nbsp;&nbsp;//关联关系\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&#39;foreign_key&#39;&nbsp;=&gt;&nbsp;&#39;cid&#39;,&nbsp;&nbsp;&nbsp;&nbsp;//关联中间表外键\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&#39;mapping_fields&#39;&nbsp;=&gt;&nbsp;&#39;name&#39;,&nbsp;&nbsp;&nbsp;&nbsp;//读取副表的字段\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&#39;as_fields&#39;&nbsp;=&gt;&nbsp;&#39;name&#39;&nbsp;&nbsp;&nbsp;&nbsp;//直接把关联的字段值映射成数据对象中的某个字段\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;)\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;);\r\n}\r\n?&gt;</pre><p>然后实例化这个关联模型：</p><p>$blog = D(&#39;BlogRelation&#39;)-&gt;relation(true)-&gt;limit(1)-&gt;select();<br/>dump($blog);die;</p><p>结果如下：</p><pre class="brush:php;toolbar:false">Array(\r\n&nbsp;&nbsp;&nbsp;&nbsp;[0]&nbsp;=&gt;&nbsp;Array(\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;[id]&nbsp;=&gt;&nbsp;2\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;[title]&nbsp;=&gt;&nbsp;分页test\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;[content]&nbsp;=&gt;&nbsp;分页test&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;[addtime]&nbsp;=&gt;&nbsp;0\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;[remark]&nbsp;=&gt;&nbsp;分页test\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;[click]&nbsp;=&gt;&nbsp;130\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;[cid]&nbsp;=&gt;&nbsp;3\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;[blogpic]&nbsp;=&gt;&nbsp;/BlogPic/2016-03-18/56eb6a39eff5a.png&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;\r\n&nbsp;&nbsp;&nbsp;&nbsp;)\r\n)</pre><p><br/></p>', 0, 'Belongs_to 关联表示当前模型从属于另外一个父对象，例如每个博文都属于一个栏目（多对一）。我们可以做如下关联定义。', 187, 12, '/BlogPic/2016-04-11/570b5095a38a2.jpg'),
(2, 'Thinkphp&lt;eq&gt;标签使用方法详解及实例详解', '<p style="margin-top:5px;margin-right:12px;margin-bottom:5px;padding:0 0 0 0 "><span style=";font-family:微软雅黑;color:rgb(64,64,64);font-size:15px">比较标签用于简单的变量比较，复杂的判断条件可以用if标签替换，比较标签是一组标签的集合，基本上用法都一致，如下：</span></p><p style="margin-top:5px;margin-right:12px;margin-bottom:5px;padding:0 0 0 0 "><span style="font-family: Consolas;background: rgb(249, 242, 244)">&lt;比较标签 name=&quot;变量&quot; value=&quot;值&quot;&gt;<!--比较标签--></span><span style="font-family: Consolas;background: rgb(249, 242, 244)">内容</span></p><table interlaced="enabled"><tbody><tr class="ue-table-interlace-color-single firstRow"><td width="288" valign="center" style="padding: 6px; border-width: 1px; border-style: solid; border-right-color: rgb(255, 255, 255); border-top-color: rgb(255, 255, 255); background: rgb(238, 238, 238);"><p><strong><span style="font-family: 微软雅黑;color: rgb(64, 64, 64);font-size: 15px">标签</span></strong></p></td><td width="288" valign="center" style="padding: 6px; border-width: 1px; border-style: solid; border-right-color: rgb(255, 255, 255); border-top-color: rgb(255, 255, 255); background: rgb(238, 238, 238);"><p><strong><span style="font-family: 微软雅黑;color: rgb(64, 64, 64);font-size: 15px">含义</span></strong></p></td></tr><tr class="ue-table-interlace-color-double"><td width="288" valign="center" style="padding: 6px; border-width: 1px; border-style: solid; border-right-color: rgb(255, 255, 255); border-bottom-color: rgb(255, 255, 255);"><p><span style=";font-family:微软雅黑;color:rgb(64,64,64);font-size:15px">eq或者 equal</span></p></td><td width="288" valign="center" style="padding: 6px; border-width: 1px; border-style: solid; border-right-color: rgb(255, 255, 255); border-bottom-color: rgb(255, 255, 255);"><p><span style=";font-family:微软雅黑;color:rgb(64,64,64);font-size:15px">等于</span></p></td></tr><tr class="ue-table-interlace-color-single"><td width="288" valign="center" style="padding: 6px; border-width: 1px; border-style: solid; border-right-color: rgb(255, 255, 255); border-bottom-color: rgb(255, 255, 255);"><p><span style=";font-family:微软雅黑;color:rgb(64,64,64);font-size:15px">neq 或者notequal</span></p></td><td width="288" valign="center" style="padding: 6px; border-width: 1px; border-style: solid; border-right-color: rgb(255, 255, 255); border-bottom-color: rgb(255, 255, 255);"><p><span style=";font-family:微软雅黑;color:rgb(64,64,64);font-size:15px">不等于</span></p></td></tr><tr class="ue-table-interlace-color-double"><td width="288" valign="center" style="padding: 6px; border-width: 1px; border-style: solid; border-right-color: rgb(255, 255, 255); border-bottom-color: rgb(255, 255, 255);"><p><span style=";font-family:微软雅黑;color:rgb(64,64,64);font-size:15px">gt</span></p></td><td width="288" valign="center" style="padding: 6px; border-width: 1px; border-style: solid; border-right-color: rgb(255, 255, 255); border-bottom-color: rgb(255, 255, 255);"><p><span style=";font-family:微软雅黑;color:rgb(64,64,64);font-size:15px">大于</span></p></td></tr><tr class="ue-table-interlace-color-single"><td width="288" valign="center" style="padding: 6px; border-width: 1px; border-style: solid; border-right-color: rgb(255, 255, 255); border-bottom-color: rgb(255, 255, 255);"><p><span style=";font-family:微软雅黑;color:rgb(64,64,64);font-size:15px">egt</span></p></td><td width="288" valign="center" style="padding: 6px; border-width: 1px; border-style: solid; border-right-color: rgb(255, 255, 255); border-bottom-color: rgb(255, 255, 255);"><p><span style=";font-family:微软雅黑;color:rgb(64,64,64);font-size:15px">大于等于</span></p></td></tr><tr class="ue-table-interlace-color-double"><td width="288" valign="center" style="padding: 6px; border-width: 1px; border-style: solid; border-right-color: rgb(255, 255, 255); border-bottom-color: rgb(255, 255, 255);"><p><span style=";font-family:微软雅黑;color:rgb(64,64,64);font-size:15px">lt</span></p></td><td width="288" valign="center" style="padding: 6px; border-width: 1px; border-style: solid; border-right-color: rgb(255, 255, 255); border-bottom-color: rgb(255, 255, 255);"><p><span style=";font-family:微软雅黑;color:rgb(64,64,64);font-size:15px">小于</span></p></td></tr><tr class="ue-table-interlace-color-single"><td width="288" valign="center" style="padding: 6px; border-width: 1px; border-style: solid; border-right-color: rgb(255, 255, 255); border-bottom-color: rgb(255, 255, 255);"><p><span style=";font-family:微软雅黑;color:rgb(64,64,64);font-size:15px">elt</span></p></td><td width="288" valign="center" style="padding: 6px; border-width: 1px; border-style: solid; border-right-color: rgb(255, 255, 255); border-bottom-color: rgb(255, 255, 255);"><p><span style=";font-family:微软雅黑;color:rgb(64,64,64);font-size:15px">小于等于</span></p></td></tr><tr class="ue-table-interlace-color-double"><td width="288" valign="center" style="padding: 6px; border-width: 1px; border-style: solid; border-right-color: rgb(255, 255, 255); border-bottom-color: rgb(255, 255, 255);"><p><span style=";font-family:微软雅黑;color:rgb(64,64,64);font-size:15px">heq</span></p></td><td width="288" valign="center" style="padding: 6px; border-width: 1px; border-style: solid; border-right-color: rgb(255, 255, 255); border-bottom-color: rgb(255, 255, 255);"><p><span style=";font-family:微软雅黑;color:rgb(64,64,64);font-size:15px">恒等于</span></p></td></tr><tr class="ue-table-interlace-color-single"><td width="288" valign="center" style="padding: 6px; border-width: 1px; border-style: solid; border-right-color: rgb(255, 255, 255); border-bottom-color: rgb(255, 255, 255);"><p><span style=";font-family:微软雅黑;color:rgb(64,64,64);font-size:15px">nheq</span></p></td><td width="288" valign="center" style="padding: 6px; border-width: 1px; border-style: solid; border-right-color: rgb(255, 255, 255); border-bottom-color: rgb(255, 255, 255);"><p><span style=";font-family:微软雅黑;color:rgb(64,64,64);font-size:15px">不恒等于</span></p></td></tr></tbody></table><p style="margin-top:10px;margin-right:24px;margin-bottom:10px;padding:0 0 0 0 "><span style=";font-family:微软雅黑;color:rgb(64,64,64);font-size:15px">系统支持的比较标签以及所表示的含义分别是：他们的用法基本是一致的，区别在于判断的条件不同，并且所有的比较标签都可以和else标签一起使用。</span></p><p style="margin-top:10px;margin-right:24px;margin-bottom:10px;padding:0 0 0 0 "><span style="color: rgb(64, 64, 64); font-family: 微软雅黑; font-size: 15px;">例如，要求name变量的值等于value就输出，可以使用：</span></p><p style="margin-top:10px;margin-right:24px;margin-bottom:10px;padding:0 0 0 0 "><span style="font-family: Consolas; color: rgb(51, 51, 51); background: rgb(249, 242, 244);">&lt;eq</span><span style="font-family: Consolas; background: rgb(249, 242, 244);">&nbsp;</span><span style="font-family: Consolas; color: rgb(51, 51, 51); background: rgb(249, 242, 244);">name=&quot;name&quot;</span><span style="font-family: 宋体; color: rgb(51, 51, 51); background: rgb(249, 242, 244);">&nbsp;</span><span style="font-family: Consolas; color: rgb(51, 51, 51); background: rgb(249, 242, 244);">value=&quot;value&quot;&gt;</span><span style="font-family: Consolas; background: rgb(249, 242, 244);">value</span><span style="font-family: Consolas; color: rgb(51, 51, 51); background: rgb(249, 242, 244);"></span></p><p style="margin-top:10px;margin-right:24px;margin-bottom:10px;padding:0 0 0 0 "><span style="font-family: 微软雅黑; color: rgb(64, 64, 64); font-size: 15px;">或者</span></p><p style="margin-top:10px;margin-right:24px;margin-bottom:10px;padding:0 0 0 0 "><span style="font-family: Consolas; color: rgb(51, 51, 51); background: rgb(249, 242, 244);">&lt;equal</span><span style="font-family: Consolas; background: rgb(249, 242, 244);">&nbsp;</span><span style="font-family: Consolas; color: rgb(51, 51, 51); background: rgb(249, 242, 244);">name=&quot;name&quot;</span><span style="font-family: Consolas; background: rgb(249, 242, 244);">&nbsp;</span><span style="font-family: Consolas; color: rgb(51, 51, 51); background: rgb(249, 242, 244);">value=&quot;value&quot;&gt;</span><span style="font-family: Consolas; background: rgb(249, 242, 244);">value</span><span style="font-family: Consolas; color: rgb(51, 51, 51); background: rgb(249, 242, 244);"></span></p><p style="margin-top:10px;margin-right:24px;margin-bottom:10px;padding:0 0 0 0 "><span style="color: rgb(64, 64, 64); font-family: 微软雅黑; font-size: 15px;">也可以支持和else标签混合使用：</span></p><p style="margin-top:10px;margin-right:24px;margin-bottom:10px;padding:0 0 0 0 "><span style="font-family: Consolas; color: rgb(51, 51, 51); background: rgb(249, 242, 244);">&lt;eq</span><span style="font-family: Consolas; background: rgb(249, 242, 244);">&nbsp;</span><span style="font-family: Consolas; color: rgb(51, 51, 51); background: rgb(249, 242, 244);">name=&quot;name&quot;</span><span style="font-family: Consolas; background: rgb(249, 242, 244);">&nbsp;</span><span style="font-family: Consolas; color: rgb(51, 51, 51); background: rgb(249, 242, 244);">value=&quot;value&quot;&gt;</span><span style="font-family: Consolas; background: rgb(249, 242, 244);">相等</span><span style="font-family: Consolas; color: rgb(51, 51, 51); background: rgb(249, 242, 244);">&lt;else/&gt;</span><span style="font-family: Consolas; background: rgb(249, 242, 244);">不相等</span><span style="font-family: Consolas; color: rgb(51, 51, 51); background: rgb(249, 242, 244);">&lt;/eq&gt;</span></p><p style="margin-top:5px;margin-right:12px;margin-bottom:5px;padding:0 0 0 0 "><span style=";font-family:微软雅黑;color:rgb(64,64,64);font-size:15px">当 name变量的值大于5就输出</span></p><p style="margin-top:5px;margin-right:12px;margin-bottom:5px;padding:0 0 0 0 "><span style="font-family: Consolas; color: rgb(51, 51, 51); background: rgb(249, 242, 244);">&lt;gt</span><span style="font-family: Consolas; background: rgb(249, 242, 244);">&nbsp;</span><span style="font-family: Consolas; color: rgb(51, 51, 51); background: rgb(249, 242, 244);">name=&quot;name&quot;</span><span style="font-family: Consolas; background: rgb(249, 242, 244);">&nbsp;</span><span style="font-family: Consolas; color: rgb(51, 51, 51); background: rgb(249, 242, 244);">value=&quot;5&quot;&gt;</span><span style="font-family: Consolas; background: rgb(249, 242, 244);">value</span><span style="font-family: Consolas; color: rgb(51, 51, 51); background: rgb(249, 242, 244);"></span></p><p style="margin-top:5px;margin-right:12px;margin-bottom:5px;padding:0 0 0 0 "><span style=";font-family:微软雅黑;color:rgb(64,64,64);font-size:15px">当name变量的值不小于5就输出</span></p><p style="margin-top:5px;margin-right:12px;margin-bottom:5px;padding:0 0 0 0 "><span style="font-family: Consolas; color: rgb(51, 51, 51); background: rgb(249, 242, 244);">&lt;egt</span><span style="font-family: Consolas; background: rgb(249, 242, 244);">&nbsp;</span><span style="font-family: Consolas; color: rgb(51, 51, 51); background: rgb(249, 242, 244);">name=&quot;name&quot;</span><span style="font-family: Consolas; background: rgb(249, 242, 244);">&nbsp;</span><span style="font-family: Consolas; color: rgb(51, 51, 51); background: rgb(249, 242, 244);">value=&quot;5&quot;&gt;</span><span style="font-family: Consolas; background: rgb(249, 242, 244);">value</span><span style="font-family: Consolas; color: rgb(51, 51, 51); background: rgb(249, 242, 244);"></span></p><p style="margin-top:5px;margin-right:12px;margin-bottom:5px;padding:0 0 0 0 "><span style=";font-family:微软雅黑;color:rgb(64,64,64);font-size:15px">比较标签中的变量可以支持对象的属性或者数组，甚至可以是系统变量，例如：当vo对象的属性（或者数组，或者自动判断）等于5就输出</span></p><p style="margin-top:5px;margin-right:12px;margin-bottom:5px;padding:0 0 0 0 "><span style="text-indent: 28px; font-family: Consolas; color: rgb(51, 51, 51); background: rgb(249, 242, 244);">&lt;eq</span><span style="text-indent: 28px; font-family: Consolas; background: rgb(249, 242, 244);">&nbsp;</span><span style="text-indent: 28px; font-family: Consolas; color: rgb(51, 51, 51); background: rgb(249, 242, 244);">name=&quot;vo.name&quot;</span><span style="text-indent: 28px; font-family: Consolas; background: rgb(249, 242, 244);">&nbsp;</span><span style="text-indent: 28px; font-family: Consolas; color: rgb(51, 51, 51); background: rgb(249, 242, 244);">value=&quot;5&quot;&gt;</span><span style="text-indent: 28px; font-family: Consolas; background: rgb(249, 242, 244);">{$vo.name}</span><span style="text-indent: 28px; font-family: Consolas; color: rgb(51, 51, 51); background: rgb(249, 242, 244);"></span></p><p style="margin-top:5px;margin-right:12px;margin-bottom:5px;padding:0 0 0 0 "><span style=";font-family:微软雅黑;color:rgb(64,64,64);font-size:15px">当vo对象的属性等于5就输出</span></p><p style="margin-top:5px;margin-right:12px;margin-bottom:5px;padding:0 0 0 0 "><span style="text-indent: 28px; font-family: Consolas; color: rgb(51, 51, 51); background: rgb(249, 242, 244);">&lt;eq</span><span style="text-indent: 28px; font-family: Consolas; background: rgb(249, 242, 244);">&nbsp;</span><span style="text-indent: 28px; font-family: Consolas; color: rgb(51, 51, 51); background: rgb(249, 242, 244);">name=&quot;vo:name&quot;</span><span style="text-indent: 28px; font-family: Consolas; background: rgb(249, 242, 244);">&nbsp;</span><span style="text-indent: 28px; font-family: Consolas; color: rgb(51, 51, 51); background: rgb(249, 242, 244);">value=&quot;5&quot;&gt;</span><span style="text-indent: 28px; font-family: Consolas; background: rgb(249, 242, 244);">{$vo.name}</span><span style="text-indent: 28px; font-family: Consolas; color: rgb(51, 51, 51); background: rgb(249, 242, 244);"></span></p><p style="margin-top:5px;margin-right:12px;margin-bottom:5px;padding:0 0 0 0 "><span style="color: rgb(64, 64, 64); font-family: 微软雅黑; font-size: 15px;">当$vo[&#39;name&#39;]等于5就输出</span></p><p style="margin-top:5px;margin-right:12px;margin-bottom:5px;padding:0 0 0 0 "><span style="text-indent: 28px; font-family: Consolas; color: rgb(51, 51, 51); background: rgb(249, 242, 244);">&lt;eq</span><span style="text-indent: 28px; font-family: Consolas; background: rgb(249, 242, 244);">&nbsp;</span><span style="text-indent: 28px; font-family: Consolas; color: rgb(51, 51, 51); background: rgb(249, 242, 244);">name=&quot;vo[&#39;name&#39;]&quot;</span><span style="text-indent: 28px; font-family: Consolas; background: rgb(249, 242, 244);">&nbsp;</span><span style="text-indent: 28px; font-family: Consolas; color: rgb(51, 51, 51); background: rgb(249, 242, 244);">value=&quot;5&quot;&gt;</span><span style="text-indent: 28px; font-family: Consolas; background: rgb(249, 242, 244);">{$vo.name}</span><span style="text-indent: 28px; font-family: Consolas; color: rgb(51, 51, 51); background: rgb(249, 242, 244);"></span></p><p style="margin-top:5px;margin-right:12px;margin-bottom:5px;padding:0 0 0 0 "><span style="font-family: 微软雅黑; color: rgb(64, 64, 64); font-size: 15px;">而且还可以支持对变量使用函数 当vo对象的属性值的字符串长度等于5就输出</span>&nbsp;</p><p style="margin-top:5px;margin-right:12px;margin-bottom:5px;padding:0 0 0 0 "><span style="font-family: Consolas; color: rgb(51, 51, 51); background: rgb(249, 242, 244);">&lt;eq</span><span style="font-family: Consolas; background: rgb(249, 242, 244);">&nbsp;</span><span style="font-family: Consolas; color: rgb(51, 51, 51); background: rgb(249, 242, 244);">name=&quot;vo:name|strlen&quot;</span><span style="font-family: Consolas; background: rgb(249, 242, 244);">&nbsp;</span><span style="font-family: Consolas; color: rgb(51, 51, 51); background: rgb(249, 242, 244);">value=&quot;5&quot;&gt;</span><span style="font-family: Consolas; background: rgb(249, 242, 244);">{$vo.name}</span><span style="font-family: Consolas; color: rgb(51, 51, 51); background: rgb(249, 242, 244);"></span></p><p style="margin-top:5px;margin-right:12px;margin-bottom:5px;padding:0 0 0 0 "><span style=";font-family:微软雅黑;color:rgb(64,64,64);font-size:15px">变量名可以支持系统变量的方式，例如：</span></p><p style="margin-top:5px;margin-right:12px;margin-bottom:5px;padding:0 0 0 0 "><span style="font-family: Consolas; background: rgb(249, 242, 244);"></span></p><p><span style=";font-family:Consolas;color:rgb(51,51,51);font-size:14px;background:rgb(249,242,244)">&lt;eq</span><span style="font-family: Consolas;font-size: 14px;background: rgb(249, 242, 244)">&nbsp;</span><span style=";font-family:Consolas;color:rgb(51,51,51);font-size:14px;background:rgb(249,242,244)">name=&quot;Think.get.name&quot;</span><span style="font-family: Consolas;font-size: 14px;background: rgb(249, 242, 244)">&nbsp;</span><span style=";font-family:Consolas;color:rgb(51,51,51);font-size:14px;background:rgb(249,242,244)">value=&quot;value&quot;&gt;</span><span style="font-family: Consolas;font-size: 14px;background: rgb(249, 242, 244)">相等</span><span style=";font-family:Consolas;color:rgb(51,51,51);font-size:14px;background:rgb(249,242,244)">&lt;else/&gt;</span><span style="font-family: Consolas;font-size: 14px;background: rgb(249, 242, 244)">不相等</span><span style=";font-family:Consolas;color:rgb(51,51,51);font-size:14px;background:rgb(249,242,244)">&lt;/eq&gt;</span></p><p style="margin-top:5px;margin-right:12px;margin-bottom:5px;padding:0 0 0 0 "><span style=";font-family:微软雅黑;color:rgb(64,64,64);font-size:15px">通常比较标签的值是一个字符串或者数字，如果需要使用变量，只需要在前面添加“$”标志：当vo对象的属性等于$a就输出</span></p><p style="margin-top:5px;margin-right:12px;margin-bottom:5px;padding:0 0 0 0 "><span style="font-family: Consolas; color: rgb(51, 51, 51); background: rgb(249, 242, 244);">&lt;eq</span><span style="font-family: Consolas; background: rgb(249, 242, 244);">&nbsp;</span><span style="font-family: Consolas; color: rgb(51, 51, 51); background: rgb(249, 242, 244);">name=&quot;vo:name&quot;</span><span style="font-family: Consolas; background: rgb(249, 242, 244);">&nbsp;</span><span style="font-family: Consolas; color: rgb(51, 51, 51); background: rgb(249, 242, 244);">value=&quot;$a&quot;&gt;</span><span style="font-family: Consolas; background: rgb(249, 242, 244);">{$vo.name}</span><span style="font-family: Consolas; color: rgb(51, 51, 51); background: rgb(249, 242, 244);"></span></p><p style="margin-top:5px;margin-right:12px;margin-bottom:5px;padding:0 0 0 0 "><span style=";font-family:微软雅黑;color:rgb(64,64,64);font-size:15px">所有的比较标签可以统一使用compare标签（其实所有的比较标签都是compare标签的别名），例如：当name变量的值等于5就输出</span></p><p style="margin-top:5px;margin-right:12px;margin-bottom:5px;padding:0 0 0 0 "><span style="font-family: Consolas; color: rgb(51, 51, 51); background: rgb(249, 242, 244);">&lt;compare</span><span style="font-family: Consolas; background: rgb(249, 242, 244);">&nbsp;</span><span style="font-family: Consolas; color: rgb(51, 51, 51); background: rgb(249, 242, 244);">name=&quot;name&quot;</span><span style="font-family: Consolas; background: rgb(249, 242, 244);">&nbsp;</span><span style="font-family: Consolas; color: rgb(51, 51, 51); background: rgb(249, 242, 244);">value=&quot;5&quot;</span><span style="font-family: Consolas; background: rgb(249, 242, 244);">&nbsp;</span><span style="font-family: Consolas; color: rgb(51, 51, 51); background: rgb(249, 242, 244);">type=&quot;eq&quot;&gt;</span><span style="font-family: Consolas; background: rgb(249, 242, 244);">value</span><span style="font-family: Consolas; color: rgb(51, 51, 51); background: rgb(249, 242, 244);"></span></p><p style="margin-top:5px;margin-right:12px;margin-bottom:5px;padding:0 0 0 0 "><span style=";font-family:微软雅黑;color:rgb(64,64,64);font-size:15px">等效于</span></p><p style="margin-top:5px;margin-right:12px;margin-bottom:5px;padding:0 0 0 0 "><span style="font-family: Consolas; color: rgb(51, 51, 51); background: rgb(249, 242, 244);">&lt;eq</span><span style="font-family: Consolas; background: rgb(249, 242, 244);">&nbsp;</span><span style="font-family: Consolas; color: rgb(51, 51, 51); background: rgb(249, 242, 244);">name=&quot;name&quot;</span><span style="font-family: Consolas; background: rgb(249, 242, 244);">&nbsp;</span><span style="font-family: Consolas; color: rgb(51, 51, 51); background: rgb(249, 242, 244);">value=&quot;5&quot;</span><span style="font-family: Consolas; background: rgb(249, 242, 244);">&nbsp;</span><span style="font-family: Consolas; color: rgb(51, 51, 51); background: rgb(249, 242, 244);">&gt;</span><span style="font-family: Consolas; background: rgb(249, 242, 244);">value</span><span style="font-family: Consolas; color: rgb(51, 51, 51); background: rgb(249, 242, 244);"></span></p><p style="margin-top: 5px; margin-right: 12px; margin-bottom: 5px; padding: 0px;"><span style="color: rgb(64, 64, 64); font-family: 微软雅黑; font-size: 15px;">其中type属性的值就是上面列出的比较标签名称</span></p>', 0, '利用thinkphp的模板&lt;eq&gt;比较标签实现编辑文章时，选中文章原所属栏目。代码如下：', 18, 12, '/BlogPic/2016-04-12/570c6ec716918.png');

-- --------------------------------------------------------

--
-- 表的结构 `tb_blog_cate`
--

CREATE TABLE IF NOT EXISTS `tb_blog_cate` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` char(15) NOT NULL DEFAULT '',
  `pid` smallint(6) unsigned NOT NULL DEFAULT '0',
  `sort` smallint(6) unsigned NOT NULL DEFAULT '0',
  `link` varchar(50) DEFAULT '',
  `english` char(10) NOT NULL COMMENT '栏目英文名称',
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`),
  KEY `pid` (`pid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=15 ;

--
-- 转存表中的数据 `tb_blog_cate`
--

INSERT INTO `tb_blog_cate` (`id`, `name`, `pid`, `sort`, `link`, `english`) VALUES
(2, '随心笔记', 0, 2, '', ''),
(6, 'Web开发', 0, 3, '', ''),
(7, '虎书问答', 0, 4, '', ''),
(8, '虎书许愿墙', 0, 5, '', ''),
(11, 'PHP', 6, 0, '', ''),
(12, 'ThinkPHP', 6, 2, '', ''),
(13, 'MySQL', 6, 1, '', ''),
(14, 'Linux', 6, 3, '', '');

-- --------------------------------------------------------

--
-- 表的结构 `tb_blog_user`
--

CREATE TABLE IF NOT EXISTS `tb_blog_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` char(20) NOT NULL DEFAULT '',
  `password` char(32) NOT NULL DEFAULT '',
  `logintime` int(10) NOT NULL DEFAULT '0',
  `loginip` char(20) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- 转存表中的数据 `tb_blog_user`
--

INSERT INTO `tb_blog_user` (`id`, `username`, `password`, `logintime`, `loginip`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 1461548941, '127.0.0.1');

-- --------------------------------------------------------

--
-- 表的结构 `tb_category`
--

CREATE TABLE IF NOT EXISTS `tb_category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` char(20) NOT NULL DEFAULT '' COMMENT '问题名称',
  `pid` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '父级ID',
  PRIMARY KEY (`id`),
  KEY `pid` (`pid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='问题分类表' AUTO_INCREMENT=215 ;

--
-- 转存表中的数据 `tb_category`
--

INSERT INTO `tb_category` (`id`, `name`, `pid`) VALUES
(1, '电脑/网络', 0),
(2, '手机/数码', 0),
(3, '生活', 0),
(4, '游戏', 0),
(5, '体育/运动', 0),
(6, '娱乐明星', 0),
(7, '休闲爱好', 0),
(8, '文化/艺术', 0),
(9, '社会民生', 0),
(10, '教育/科学', 0),
(11, '健康/医疗', 0),
(12, '商业/理财', 0),
(13, '情感/家庭', 0),
(14, '地区问题', 0),
(15, '电脑知识', 1),
(16, '互联网', 1),
(17, '操作系统', 1),
(18, '软件', 1),
(19, '硬件', 1),
(20, '编程开发', 1),
(21, '电脑安全', 1),
(22, '资源分享', 1),
(23, '笔记本电脑', 1),
(24, '手机/通讯', 2),
(25, '平板', 2),
(26, 'MP3/MP4', 2),
(27, '手机品牌', 2),
(28, '其他数码', 2),
(29, '手机系统', 2),
(30, '照相机/摄像机', 2),
(31, '数码品牌', 2),
(32, '购物时尚', 3),
(33, '美容塑身', 3),
(34, '美食', 3),
(35, '生活知识', 3),
(36, '品牌服装', 3),
(37, '出行旅游', 3),
(38, '交通', 3),
(39, '购车保养', 3),
(40, '购房置业', 3),
(41, '房屋装饰', 3),
(42, '风水', 3),
(43, '家电用品', 3),
(44, '烹饪', 3),
(45, '网游', 4),
(46, '单机游戏', 4),
(47, '网页游戏', 4),
(48, '盛大游戏', 4),
(49, '网易', 4),
(50, '九城游戏', 4),
(51, '腾讯游戏', 4),
(52, '完美游戏', 4),
(53, '久游游戏', 4),
(54, '巨人游戏', 4),
(55, '金山游戏', 4),
(56, '网龙游戏', 4),
(57, '电视游戏', 4),
(58, '足球', 5),
(59, '篮球', 5),
(60, '体育明星', 5),
(61, '综合赛事', 5),
(62, '田径', 5),
(63, '跳水游泳', 5),
(64, '小球运动', 5),
(65, '赛车赛事', 5),
(66, '强身健体', 5),
(67, '运动品牌', 5),
(68, '电影电视', 6),
(69, '明星', 6),
(70, '音乐', 6),
(71, '动漫', 6),
(72, '星座', 6),
(73, '摄影摄像', 7),
(74, '收藏', 7),
(75, '宠物', 7),
(76, '脑筋急转弯', 7),
(77, '谜语', 7),
(78, '幽默搞笑', 7),
(79, '起名', 7),
(80, '园艺艺术', 7),
(81, '花鸟鱼虫', 7),
(82, '茶艺', 7),
(83, '国内外文学', 8),
(84, '美术', 8),
(85, '舞蹈', 8),
(86, '散文/小说', 8),
(87, '图书音像', 8),
(88, '器乐/声乐', 8),
(89, '小品相声', 8),
(90, '戏剧戏曲', 8),
(91, '时事政治', 9),
(92, '舆论', 9),
(93, '就业/职场', 9),
(94, '历史话题', 9),
(95, '军事国防', 9),
(96, '节日假期', 9),
(97, '民族风情', 9),
(98, '法律知识', 9),
(99, '宗教', 9),
(100, '礼仪', 9),
(101, '学习辅助', 10),
(102, '考研/考证', 10),
(103, '外语', 10),
(104, '菁菁校园', 10),
(105, '人文学', 10),
(106, '理工学', 10),
(107, '公务员', 10),
(108, '留学/出国', 10),
(109, '健康知识', 11),
(110, '孕育/家教', 11),
(111, '内科', 11),
(112, '心理健康', 11),
(113, '外科', 11),
(114, '妇产科', 11),
(115, '儿科', 11),
(116, '皮肤科', 11),
(117, '五官科', 11),
(118, '男科', 11),
(119, '美容整形', 11),
(120, '中医', 11),
(121, '药品', 11),
(122, '心血管科', 11),
(123, '传染科', 11),
(124, '其它疾病', 11),
(125, '健康体检', 11),
(126, '医院', 11),
(127, '创业', 12),
(128, '企业管理', 12),
(129, '财务税务', 12),
(130, '银行', 12),
(131, '股票', 12),
(132, '金融/期货', 12),
(133, '基金债券', 12),
(134, '保险', 12),
(135, '贸易', 12),
(136, '外贸', 12),
(137, '商务文书', 12),
(138, '国民经济', 12),
(139, '个人理财', 12),
(140, '恋爱', 13),
(141, '朋友', 13),
(142, '婚嫁', 13),
(143, '两性', 13),
(144, '家庭', 13),
(145, '孩子教育', 13),
(146, '北京', 14),
(147, '上海', 14),
(148, '天津', 14),
(149, '重庆', 14),
(150, '黑龙江', 14),
(151, '吉林', 14),
(152, '辽宁', 14),
(153, '河北', 14),
(154, '内蒙古', 14),
(155, '山西', 14),
(156, '陕西', 14),
(157, '宁夏', 14),
(158, '甘肃', 14),
(159, '青海', 14),
(160, '新疆', 14),
(161, '西藏', 14),
(162, '四川', 14),
(163, '贵州', 14),
(164, '云南', 14),
(165, '河南', 14),
(166, '湖北', 14),
(167, '湖南', 14),
(168, '山东', 14),
(169, '江苏', 14),
(170, '浙江', 14),
(171, '安徽', 14),
(172, '江西', 14),
(173, '福建', 14),
(174, '广东', 14),
(175, '广西', 14),
(176, '海南', 14),
(177, '香港', 14),
(178, '澳门', 14),
(179, '台湾', 14),
(180, '海外地区', 14),
(181, '电脑配置', 15),
(182, '电脑日常维护', 15),
(183, '上网问题', 16),
(184, '新浪', 16),
(185, '腾讯', 16),
(186, 'Windows XP', 17),
(187, 'windows 7', 17),
(188, 'Windows Vista', 17),
(189, 'Windows 8', 17),
(190, '办公软件', 18),
(191, '网络软件', 18),
(192, '图像处理', 18),
(193, '系统软件', 18),
(194, '多媒体软件', 18),
(195, '硬盘', 19),
(196, '显示设备', 19),
(197, 'CPU', 19),
(198, '显卡', 19),
(199, '内存', 19),
(200, '主板', 19),
(201, '键盘/鼠标', 19),
(202, 'HTML', 20),
(203, 'DIV+CSS', 20),
(204, 'JavaScript', 20),
(205, 'jQuery', 20),
(206, 'PHP', 20),
(207, 'MySQL', 20),
(208, 'Linux', 20),
(209, 'Objective-C', 20),
(210, 'Java', 20),
(211, 'C/C++', 20);

-- --------------------------------------------------------

--
-- 表的结构 `tb_node`
--

CREATE TABLE IF NOT EXISTS `tb_node` (
  `id` smallint(6) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `title` varchar(50) DEFAULT NULL,
  `status` tinyint(1) DEFAULT '0',
  `remark` varchar(255) DEFAULT NULL,
  `sort` smallint(6) unsigned DEFAULT NULL,
  `pid` smallint(6) unsigned NOT NULL,
  `level` tinyint(1) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `level` (`level`),
  KEY `pid` (`pid`),
  KEY `status` (`status`),
  KEY `name` (`name`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=18 ;

--
-- 转存表中的数据 `tb_node`
--

INSERT INTO `tb_node` (`id`, `name`, `title`, `status`, `remark`, `sort`, `pid`, `level`) VALUES
(1, 'Admin', '后台应用', 1, NULL, 1, 0, 1),
(16, 'System', '系统设置', 1, NULL, 1, 1, 2),
(3, 'MsgManage', '愿望管理', 1, NULL, 1, 1, 2),
(4, 'delWish', '删除愿望', 1, NULL, 1, 3, 3),
(5, 'index', '愿望列表', 1, NULL, 1, 3, 3),
(6, 'Index', '前端应用', 1, NULL, 1, 0, 1),
(7, 'Rbac', 'Rbac权限控制', 1, NULL, 1, 1, 2),
(8, 'index', '用户列表', 1, NULL, 1, 7, 3),
(9, 'node', '节点列表', 1, NULL, 1, 7, 3),
(10, 'role', '角色列表', 1, NULL, 1, 7, 3),
(11, 'addUser', '添加用户', 1, NULL, 1, 7, 3),
(12, 'addNode', '添加节点', 1, NULL, 1, 7, 3),
(13, 'addRole', '添加角色', 1, NULL, 1, 7, 3);

-- --------------------------------------------------------

--
-- 表的结构 `tb_notes`
--

CREATE TABLE IF NOT EXISTS `tb_notes` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `content` varchar(255) NOT NULL DEFAULT '',
  `notespic` char(50) NOT NULL DEFAULT '',
  `addtime` int(10) unsigned DEFAULT '0',
  `title` char(20) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- 转存表中的数据 `tb_notes`
--

INSERT INTO `tb_notes` (`id`, `content`, `notespic`, `addtime`, `title`) VALUES
(1, '<p>alter table 表名 add 字段名 字段类型（长度）; 还可用after控制在某个字段之后，比如 alter table tb_user add username char(20) after id;</p>', '/NotesPic/2016-03-11/56e28aa11580d.png', 1457687201, 'mysql如何给数据库增加一个字段'),
(2, '<p>$_FILES 函数可获取上传的文件的所有信息：</p><p>&nbsp;&nbsp;&nbsp;&nbsp;$_FILES[&quot;file&quot;][&quot;name&quot;] - 被上传文件的名称</p><p>&nbsp;&nbsp;&nbsp;&nbsp;$_FILES[&quot;file&quot;][&quot;type&quot;] - 被上传文件的类型</p><p>&nbsp;&nbsp;&nbsp;&nbsp;$_FILES[&quot;file&quot;][&', '/NotesPic/2016-03-11/56e28b45204d6.png', 1457687365, 'php如何获取上传文件的信息'),
(3, '<p>/**</p><p>&nbsp;* 无极限分类（组合栏目列表）</p><p>&nbsp;* @param &nbsp;[Array] &nbsp;$cate &nbsp;[所有栏目数组]</p><p>&nbsp;* @param &nbsp;[Intger] $pid &nbsp; [所属父级的ID]</p><p>&nbsp;* @param &nbsp;[String] $html &nbsp;[子级栏目前填充标识]</p><p>&nbsp;*/</p>', '/NotesPic/2016-03-14/56e664936684c.png', 1457939378, '无极限分类'),
(4, '<p>“我在最好的时候遇到你，是我的运气。可是我没有时间了”<br/></p>', '/NotesPic/2016-04-12/570c508fdc667.jpg', 1458267186, '叶底藏花一度，梦里踏雪几回。');

-- --------------------------------------------------------

--
-- 表的结构 `tb_role`
--

CREATE TABLE IF NOT EXISTS `tb_role` (
  `id` smallint(6) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `pid` smallint(6) DEFAULT NULL,
  `status` tinyint(1) unsigned DEFAULT NULL,
  `remark` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `pid` (`pid`),
  KEY `status` (`status`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- 转存表中的数据 `tb_role`
--

INSERT INTO `tb_role` (`id`, `name`, `pid`, `status`, `remark`) VALUES
(1, 'Manager', NULL, 1, '网站管理员'),
(4, 'Editor', NULL, 1, '网站编辑');

-- --------------------------------------------------------

--
-- 表的结构 `tb_role_user`
--

CREATE TABLE IF NOT EXISTS `tb_role_user` (
  `role_id` mediumint(9) unsigned DEFAULT NULL,
  `user_id` char(32) DEFAULT NULL,
  KEY `group_id` (`role_id`),
  KEY `user_id` (`user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `tb_role_user`
--

INSERT INTO `tb_role_user` (`role_id`, `user_id`) VALUES
(1, '2'),
(4, '3'),
(1, '4'),
(4, '4'),
(1, '5'),
(4, '6'),
(1, '7'),
(4, '8'),
(1, '9'),
(4, '10'),
(1, '11'),
(4, '11');

-- --------------------------------------------------------

--
-- 表的结构 `tb_user`
--

CREATE TABLE IF NOT EXISTS `tb_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `account` char(20) NOT NULL DEFAULT '' COMMENT '用户帐号',
  `password` char(32) NOT NULL DEFAULT '' COMMENT '用户密码',
  `logintime` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '上次登录时间',
  `loginip` char(20) NOT NULL DEFAULT '' COMMENT '上次登录IP',
  `lock` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '是否锁定 0：未锁定 1：已锁定',
  `face` char(60) NOT NULL DEFAULT '' COMMENT '用户头像',
  `answer` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '回答数',
  `ask` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '提问数',
  `adopt` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '采纳数',
  `point` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '金币数',
  `exp` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '经验数',
  `registime` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '注册时间',
  `username` char(20) NOT NULL DEFAULT '' COMMENT '用户昵称',
  PRIMARY KEY (`id`),
  KEY `account` (`account`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='前台用户表' AUTO_INCREMENT=3 ;

--
-- 转存表中的数据 `tb_user`
--

INSERT INTO `tb_user` (`id`, `account`, `password`, `logintime`, `loginip`, `lock`, `face`, `answer`, `ask`, `adopt`, `point`, `exp`, `registime`, `username`) VALUES
(1, 'gb2311', 'e10adc3949ba59abbe56e057f20f883e', 1466521526, '127.0.0.1', 0, '576808fa1f676.png', 1, 2, 0, 1, 8, 1466171349, 'gb2311'),
(2, 'gb2312', 'e10adc3949ba59abbe56e057f20f883e', 1466239134, '127.0.0.1', 0, '', 2, 1, 1, 2, 8, 1466171526, 'gb2312');

-- --------------------------------------------------------

--
-- 表的结构 `tb_wish`
--

CREATE TABLE IF NOT EXISTS `tb_wish` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) NOT NULL COMMENT '呢称',
  `content` varchar(100) NOT NULL COMMENT '内容',
  `createtime` int(10) unsigned NOT NULL COMMENT '添加时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='愿望表' AUTO_INCREMENT=6 ;

--
-- 转存表中的数据 `tb_wish`
--

INSERT INTO `tb_wish` (`id`, `username`, `content`, `createtime`) VALUES
(1, 'test', '[抓狂][抓狂][抓狂]测试', 0),
(2, '测试', '[嘻嘻][抓狂]创建时间', 0),
(3, '时间刺客', '艾克[酷][嘻嘻][太开心]', 1457428972),
(4, '德玛西亚', '我将带头装逼[酷]', 1458891353),
(5, '误区二', '撒旦法[害羞]', 1461642289);

-- --------------------------------------------------------

--
-- 表的结构 `tb_wish_user`
--

CREATE TABLE IF NOT EXISTS `tb_wish_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` char(20) NOT NULL DEFAULT '' COMMENT '帐号',
  `password` char(32) NOT NULL DEFAULT '' COMMENT '密码',
  `loginip` varchar(20) NOT NULL COMMENT '登录IP',
  `logintime` int(10) NOT NULL COMMENT '登录时间',
  `lock` tinyint(1) NOT NULL DEFAULT '0' COMMENT '是否锁定：0：未锁定1：锁定',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=12 ;

--
-- 转存表中的数据 `tb_wish_user`
--

INSERT INTO `tb_wish_user` (`id`, `username`, `password`, `loginip`, `logintime`, `lock`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', '127.0.0.1', 1457495433, 0),
(9, 'lisi', 'dc3a8f1670d65bea69b7b65048a0ac40', '127.0.0.1', 1457423950, 0),
(10, 'wangwu', 'e10adc3949ba59abbe56e057f20f883e', '', 0, 0),
(11, 'zhaoliu', 'e10adc3949ba59abbe56e057f20f883e', '', 0, 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
