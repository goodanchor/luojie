-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- 主机: localhost
-- 生成日期: 2015-03-03 09:42:59
-- 服务器版本: 5.5.41-0ubuntu0.14.04.1
-- PHP 版本: 5.5.9-1ubuntu4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 数据库: `luojie`
--

-- --------------------------------------------------------

--
-- 表的结构 `count`
--

CREATE TABLE IF NOT EXISTS `count` (
  `date` int(3) unsigned NOT NULL COMMENT '今天日期',
  `today` int(2) unsigned NOT NULL COMMENT '是否今天？1:0',
  `counts` tinyint(10) unsigned NOT NULL DEFAULT '1' COMMENT '该日流量',
  `countall` int(11) unsigned NOT NULL DEFAULT '1' COMMENT '总流量',
  PRIMARY KEY (`date`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='统计访问量';

--
-- 转存表中的数据 `count`
--

INSERT INTO `count` (`date`, `today`, `counts`, `countall`) VALUES
(2, 0, 1, 11),
(3, 1, 12, 22);

-- --------------------------------------------------------

--
-- 表的结构 `courses`
--

CREATE TABLE IF NOT EXISTS `courses` (
  `cid` int(3) NOT NULL AUTO_INCREMENT COMMENT '课程id',
  `cname` varchar(20) NOT NULL COMMENT '课程名',
  `cdes` varchar(200) NOT NULL COMMENT '课程描述',
  PRIMARY KEY (`cid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='课程表' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `notice`
--

CREATE TABLE IF NOT EXISTS `notice` (
  `noticeid` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '公告id',
  `title` varchar(20) NOT NULL COMMENT '标题',
  `content` varchar(200) NOT NULL COMMENT '内容',
  `time` int(11) unsigned NOT NULL COMMENT '发布时间',
  `top` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '置顶？1：置顶；0：否',
  `ifshow` tinyint(1) unsigned NOT NULL DEFAULT '1' COMMENT '显示？1：显示；0：否',
  `userid` int(10) NOT NULL COMMENT '发布者id',
  `cases` tinyint(1) NOT NULL COMMENT '课程类别',
  PRIMARY KEY (`noticeid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='公告表' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `passage`
--

CREATE TABLE IF NOT EXISTS `passage` (
  `passageid` int(10) NOT NULL AUTO_INCREMENT COMMENT '文章id',
  `cid` int(5) NOT NULL COMMENT '课程id',
  `title` varchar(20) NOT NULL COMMENT '文章标题',
  `content` text NOT NULL COMMENT '文章内容',
  `time` int(11) unsigned NOT NULL COMMENT '发布时间',
  `ifshow` tinyint(1) NOT NULL DEFAULT '1' COMMENT '显示？1：显示；0：否',
  `userid` int(10) unsigned NOT NULL COMMENT '作者',
  `cases` tinyint(1) NOT NULL COMMENT '课程类别',
  PRIMARY KEY (`passageid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='文章表' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `upload`
--

CREATE TABLE IF NOT EXISTS `upload` (
  `fileid` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT 'fileid',
  `filename` varchar(90) NOT NULL COMMENT '文件名',
  `fileaddress` varchar(40) NOT NULL COMMENT '文件地址',
  `uploadtime` int(11) unsigned NOT NULL COMMENT '上传时间',
  `dowloadtimes` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '下载次数',
  `userid` int(10) unsigned NOT NULL COMMENT '上传者id',
  `description` varchar(140) NOT NULL COMMENT '文件描述',
  `avilible` tinyint(1) NOT NULL DEFAULT '1' COMMENT '可下载？1：可；0：否',
  `cases` tinyint(1) NOT NULL COMMENT '课程类别',
  PRIMARY KEY (`fileid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='上传表' AUTO_INCREMENT=50 ;

--
-- 转存表中的数据 `upload`
--

INSERT INTO `upload` (`fileid`, `filename`, `fileaddress`, `uploadtime`, `dowloadtimes`, `userid`, `description`, `avilible`, `cases`) VALUES
(46, '2015-02-26 17:23:53 的屏幕截图.png', 'ac09dfa0d3092e62b669af0b277b8991.png', 1425031893, 9, 1, '', 1, 0),
(47, 'order.php', 'ac9381b0e639680f648f531ff571d95f.php', 1425343536, 0, 1, '', 1, 0),
(48, '所有课程选课名单.xls', '282da49e9208088b7ec60a37092d56fc.xls', 1425343547, 0, 1, '', 1, 0),
(49, 'default', 'dbc947d0b062c0b8198487fe663d82f4.', 1425344264, 0, 1, '', 1, 0);

-- --------------------------------------------------------

--
-- 表的结构 `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `userid` int(10) NOT NULL AUTO_INCREMENT COMMENT 'userid',
  `username` varchar(16) NOT NULL COMMENT '用户名',
  `password` varchar(32) NOT NULL COMMENT '密码',
  `name` varchar(16) NOT NULL COMMENT '姓名',
  `title` varchar(16) NOT NULL COMMENT '职称',
  `ip` varchar(15) NOT NULL COMMENT '登录ip',
  `lasttime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT '最后登录时间',
  `power` tinyint(2) NOT NULL COMMENT '权限',
  PRIMARY KEY (`userid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='用户表' AUTO_INCREMENT=2 ;

--
-- 转存表中的数据 `user`
--

INSERT INTO `user` (`userid`, `username`, `password`, `name`, `title`, `ip`, `lasttime`, `power`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin', 'admin', '127.0.0.1', '2015-03-03 01:19:39', 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
