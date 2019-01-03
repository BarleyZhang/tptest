/*
Navicat MySQL Data Transfer

Source Server         : 本地测试-localhost
Source Server Version : 50553
Source Host           : localhost:3306
Source Database       : tp5

Target Server Type    : MYSQL
Target Server Version : 50553
File Encoding         : 65001

Date: 2019-01-03 17:06:49
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for news
-- ----------------------------
DROP TABLE IF EXISTS `news`;
CREATE TABLE `news` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键',
  `title` varchar(255) DEFAULT NULL COMMENT '资讯名称',
  `img` varchar(255) DEFAULT NULL COMMENT '资讯图片',
  `author` varchar(100) DEFAULT NULL COMMENT '资讯作者',
  `pv` int(11) DEFAULT NULL COMMENT '访问量',
  `content` text COMMENT '资讯内容',
  `create_time` datetime DEFAULT NULL COMMENT '发布时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of news
-- ----------------------------
INSERT INTO `news` VALUES ('1', '快速入门tp5', '/static/image/header.png', 'Barley', '1000', '这里一篇很长很长的文章', null);
INSERT INTO `news` VALUES ('2', '快速入门tp5.1', '/static/image/header.png', 'Zhangsan', '10000', '这里一篇很长很长的文章', null);

-- ----------------------------
-- Table structure for shorturl
-- ----------------------------
DROP TABLE IF EXISTS `shorturl`;
CREATE TABLE `shorturl` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键id',
  `shorturl` varchar(100) DEFAULT NULL COMMENT '地址码',
  `url` varchar(255) DEFAULT NULL COMMENT '原始地址',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of shorturl
-- ----------------------------
INSERT INTO `shorturl` VALUES ('1', '1o98Q4', 'http://tp5/index/news/index/id/1');
INSERT INTO `shorturl` VALUES ('2', 'yPXcu1', 'http://tp5/index/news/index/id/2');

-- ----------------------------
-- Table structure for user
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键',
  `mobile` varchar(255) NOT NULL COMMENT '手机号',
  `name` varchar(255) NOT NULL COMMENT '用户姓名',
  `email` varchar(255) NOT NULL COMMENT '用户邮箱',
  `status` tinyint(1) NOT NULL COMMENT '用户状态',
  `create_time` int(10) unsigned NOT NULL COMMENT '用户创建时间',
  `update_time` int(10) unsigned NOT NULL COMMENT '用户更新时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of user
-- ----------------------------
INSERT INTO `user` VALUES ('1', '18888888888', 'barley', 'barley@admin.com', '1', '1546506249', '1546506249');
