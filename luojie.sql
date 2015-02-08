-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- 主机: localhost
-- 生成日期: 2015-02-08 18:05:39
-- 服务器版本: 5.5.41-0ubuntu0.14.04.1
-- PHP 版本: 5.5.9-1ubuntu4.5

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
-- 表的结构 `notice`
--

CREATE TABLE IF NOT EXISTS `notice` (
  `noticeid` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '公告id',
  `title` varchar(20) NOT NULL COMMENT '标题',
  `content` varchar(200) NOT NULL COMMENT '内容',
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT '发布时间',
  `top` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '置顶？1：置顶；0：否',
  `show` tinyint(1) unsigned NOT NULL DEFAULT '1' COMMENT '显示？1：显示；0：否',
  `userid` int(10) NOT NULL COMMENT '发布者id',
  PRIMARY KEY (`noticeid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='公告表' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `passage`
--

CREATE TABLE IF NOT EXISTS `passage` (
  `passageid` int(10) NOT NULL AUTO_INCREMENT COMMENT '文章id',
  `title` varchar(20) NOT NULL COMMENT '文章标题',
  `content` text NOT NULL COMMENT '文章内容',
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT '发布时间',
  `show` tinyint(1) NOT NULL DEFAULT '1' COMMENT '显示？1：显示；2：否',
  `userid` int(10) NOT NULL COMMENT '作者',
  PRIMARY KEY (`passageid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='文章表' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `upload`
--

CREATE TABLE IF NOT EXISTS `upload` (
  `fileid` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT 'fileid',
  `filename` varchar(20) NOT NULL COMMENT '文件名',
  `fileaddress` varchar(40) NOT NULL COMMENT '文件地址',
  `uploadtime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT '上传时间',
  `dowloadtimes` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '下载次数',
  `userid` int(10) unsigned NOT NULL COMMENT '上传者id',
  `description` varchar(140) NOT NULL COMMENT '文件描述',
  `avilible` tinyint(1) NOT NULL DEFAULT '1' COMMENT '是否可下载',
  PRIMARY KEY (`fileid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='上传表' AUTO_INCREMENT=1 ;

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
  `power` tinyint(4) NOT NULL DEFAULT '0' COMMENT '权限',
  PRIMARY KEY (`userid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='用户表' AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
