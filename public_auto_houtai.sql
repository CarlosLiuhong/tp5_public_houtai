/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50540
Source Host           : localhost:3306
Source Database       : public_auto_houtai

Target Server Type    : MYSQL
Target Server Version : 50540
File Encoding         : 65001

Date: 2017-06-27 15:12:55
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for ht_admin
-- ----------------------------
DROP TABLE IF EXISTS `ht_admin`;
CREATE TABLE `ht_admin` (
  `id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `user_name` varchar(60) NOT NULL DEFAULT '',
  `password` varchar(32) NOT NULL DEFAULT '',
  `code` char(6) NOT NULL DEFAULT 'liuhai' COMMENT '随机码',
  `create_time` int(11) NOT NULL DEFAULT '0',
  `last_login` int(11) DEFAULT '0',
  `last_ip` varchar(15) DEFAULT '',
  PRIMARY KEY (`id`),
  UNIQUE KEY `user_name` (`user_name`) USING BTREE
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ht_admin
-- ----------------------------
INSERT INTO `ht_admin` VALUES ('1', 'admins', '7e3e1430f250e4949e7a2c9f5b66dd40', '117715', '1487751188', '0', '');
INSERT INTO `ht_admin` VALUES ('9', '123', 'bd248d3947ce6bb8791980806f24a811', '731192', '1497496249', '0', '');

-- ----------------------------
-- Table structure for ht_admin_log
-- ----------------------------
DROP TABLE IF EXISTS `ht_admin_log`;
CREATE TABLE `ht_admin_log` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `create_time` int(10) unsigned NOT NULL DEFAULT '0',
  `user_id` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `action` varchar(255) NOT NULL DEFAULT '',
  `ip` varchar(15) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`),
  KEY `create_time` (`create_time`),
  KEY `user_id` (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ht_admin_log
-- ----------------------------

-- ----------------------------
-- Table structure for ht_article_category
-- ----------------------------
DROP TABLE IF EXISTS `ht_article_category`;
CREATE TABLE `ht_article_category` (
  `cat_id` smallint(5) NOT NULL AUTO_INCREMENT,
  `tab_id` int(10) DEFAULT NULL COMMENT '标签id',
  `unique_id` varchar(30) DEFAULT '' COMMENT '唯一标记',
  `cat_name` varchar(255) NOT NULL DEFAULT '' COMMENT '分类名称',
  `keywords` varchar(255) DEFAULT '' COMMENT '关键字',
  `description` varchar(255) DEFAULT '' COMMENT '描述',
  `parent_id` smallint(5) DEFAULT '0' COMMENT '父id',
  `sort` tinyint(1) unsigned DEFAULT '50' COMMENT '排序',
  PRIMARY KEY (`cat_id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ht_article_category
-- ----------------------------
INSERT INTO `ht_article_category` VALUES ('11', '17', '', '分类21', '', '', '0', '50');
INSERT INTO `ht_article_category` VALUES ('12', '17', '', '分类22', '', '', '0', '50');
INSERT INTO `ht_article_category` VALUES ('10', '15', '科技干货', '科技干货', '科技干货', '科技干货', '0', '3');

-- ----------------------------
-- Table structure for ht_base_article
-- ----------------------------
DROP TABLE IF EXISTS `ht_base_article`;
CREATE TABLE `ht_base_article` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `tab_id` int(11) DEFAULT NULL COMMENT '标签位id',
  `cat_id` smallint(5) NOT NULL DEFAULT '0' COMMENT '分类id',
  `titles` varchar(150) NOT NULL DEFAULT '' COMMENT '标题',
  `defined` text,
  `contents` longtext COMMENT '内容',
  `images` varchar(255) NOT NULL DEFAULT '' COMMENT '图片',
  `keywords` varchar(255) NOT NULL DEFAULT '' COMMENT '关键字',
  `click` smallint(6) unsigned NOT NULL DEFAULT '0' COMMENT '点击数',
  `description` varchar(255) NOT NULL DEFAULT '' COMMENT '描述',
  `sort` int(5) unsigned DEFAULT '0' COMMENT '排序',
  `show_status` enum('2','1') DEFAULT '1' COMMENT '展示状态 1展示 2不展示',
  `add_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '添加时间',
  `add_user` varchar(100) DEFAULT NULL COMMENT '添加人',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=26 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ht_base_article
-- ----------------------------

-- ----------------------------
-- Table structure for ht_info
-- ----------------------------
DROP TABLE IF EXISTS `ht_info`;
CREATE TABLE `ht_info` (
  `name` varchar(50) DEFAULT NULL,
  `en_name` varchar(255) NOT NULL,
  `value` text
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ht_info
-- ----------------------------
INSERT INTO `ht_info` VALUES ('网站标题', 'stitle', '企福宝内网');
INSERT INTO `ht_info` VALUES ('网站LOGO', 'slogo', './uploads/logo/20170426\\0da204183fece26dab70f1e289035f72.gif');
INSERT INTO `ht_info` VALUES ('网站域名', 'surl', 'test');
INSERT INTO `ht_info` VALUES ('副加标题', 'sentitle', '');
INSERT INTO `ht_info` VALUES ('网站关键字', 'skeywords', 'keywords');
INSERT INTO `ht_info` VALUES ('网站描述', 'sdescription', 'describe');
INSERT INTO `ht_info` VALUES ('联系人', 's_name', '李岩');
INSERT INTO `ht_info` VALUES ('手机', 's_phone', '123456789901');
INSERT INTO `ht_info` VALUES ('电话', 's_tel', '3');
INSERT INTO `ht_info` VALUES ('400电话', 's_400', '');
INSERT INTO `ht_info` VALUES ('传真', 's_fax', '4');
INSERT INTO `ht_info` VALUES ('QQ', 's_qq', '5');
INSERT INTO `ht_info` VALUES ('QQ群', 's_qqu', '');
INSERT INTO `ht_info` VALUES ('Email', 's_email', '2');
INSERT INTO `ht_info` VALUES ('地址', 's_address', '天顺仁和');
INSERT INTO `ht_info` VALUES ('底部信息', 'scopyright', '© Copyright © 2016.QFB All rights reserved.');

-- ----------------------------
-- Table structure for ht_menu
-- ----------------------------
DROP TABLE IF EXISTS `ht_menu`;
CREATE TABLE `ht_menu` (
  `menu_id` int(10) NOT NULL AUTO_INCREMENT COMMENT '菜单id',
  `pmenu_id` int(10) DEFAULT '0' COMMENT '父级菜单id',
  `menu_level` int(5) NOT NULL DEFAULT '0' COMMENT '菜单层级',
  `menu_name` varchar(30) NOT NULL COMMENT '菜单名称',
  `menu_order` int(5) NOT NULL DEFAULT '999' COMMENT '排序',
  PRIMARY KEY (`menu_id`)
) ENGINE=MyISAM AUTO_INCREMENT=21 DEFAULT CHARSET=utf8 COMMENT='后台主要分类模块表';

-- ----------------------------
-- Records of ht_menu
-- ----------------------------
INSERT INTO `ht_menu` VALUES ('17', '0', '0', '基础数据管理', '99');
INSERT INTO `ht_menu` VALUES ('19', '0', '0', '文章管理', '99');
INSERT INTO `ht_menu` VALUES ('20', '19', '1', '文章列表', '99');
INSERT INTO `ht_menu` VALUES ('18', '17', '1', '文章分类管理', '99');

-- ----------------------------
-- Table structure for ht_menu_tab
-- ----------------------------
DROP TABLE IF EXISTS `ht_menu_tab`;
CREATE TABLE `ht_menu_tab` (
  `tab_id` int(10) NOT NULL AUTO_INCREMENT COMMENT 'tabid',
  `menu_id` int(10) NOT NULL DEFAULT '0' COMMENT '菜单id',
  `tab_name` varchar(30) NOT NULL COMMENT 'tab名称',
  `tab_tablename` varchar(100) NOT NULL COMMENT 'tab操作对应表名',
  `tab_show_type` enum('2','1') NOT NULL DEFAULT '1' COMMENT 'tab内容页展示类型 1内容页，2列表页',
  `tab_content_type` enum('4','3','2','1') NOT NULL DEFAULT '1' COMMENT '内容类型 1文章类型，2下载类型',
  `tab_order` int(5) NOT NULL DEFAULT '99' COMMENT 'tab排序',
  PRIMARY KEY (`tab_id`)
) ENGINE=MyISAM AUTO_INCREMENT=18 DEFAULT CHARSET=utf8 COMMENT='menu对应内部tab表';

-- ----------------------------
-- Records of ht_menu_tab
-- ----------------------------
INSERT INTO `ht_menu_tab` VALUES ('15', '18', '分类列表', 'ht_article_category', '2', '1', '99');
INSERT INTO `ht_menu_tab` VALUES ('16', '20', '文章列表', 'ht_base_article', '2', '1', '99');
INSERT INTO `ht_menu_tab` VALUES ('17', '18', '分类列表2', 'ht_article_category', '2', '1', '99');

-- ----------------------------
-- Table structure for ht_menu_tab_field
-- ----------------------------
DROP TABLE IF EXISTS `ht_menu_tab_field`;
CREATE TABLE `ht_menu_tab_field` (
  `tbf_id` int(10) NOT NULL AUTO_INCREMENT,
  `menu_id` int(10) NOT NULL COMMENT '菜单id',
  `tab_id` int(10) NOT NULL COMMENT 'tabid',
  `tbf_table` varchar(100) NOT NULL COMMENT '表名',
  `tbf_field` varchar(100) NOT NULL COMMENT '表对应字段',
  `tbf_field_name` varchar(100) NOT NULL COMMENT '字段显示名称',
  `tbf_field_extension` varchar(100) DEFAULT NULL COMMENT '字段扩展 1table, 2widget',
  `tbf_table_in` varchar(100) DEFAULT NULL COMMENT '外连入表名',
  `tbf_table_in_field` varchar(100) DEFAULT NULL COMMENT '外连入表对应字段',
  `tbf_table_in_field_show` varchar(100) DEFAULT NULL COMMENT '外连入表对应字段需显示的字段',
  `tbf_widget` varchar(100) DEFAULT NULL COMMENT '对应公共插件',
  `is_title` enum('2','1') DEFAULT '2' COMMENT '是否在title中显示 2不显示 1显示',
  `tbf_field_type` varchar(100) NOT NULL COMMENT '显示字段对应类型 text,number,radio,select',
  `tbf_show` enum('2','1') DEFAULT '2' COMMENT '是否显示 2不显示，1显示',
  `tbf_empty` enum('1','2') DEFAULT '1' COMMENT '是否为空 2不可为空，1可为空',
  `tbf_order` int(5) DEFAULT NULL COMMENT '字段排序',
  PRIMARY KEY (`tbf_id`),
  UNIQUE KEY `menu_id` (`menu_id`,`tab_id`,`tbf_table`,`tbf_field`) USING BTREE
) ENGINE=MyISAM AUTO_INCREMENT=55 DEFAULT CHARSET=utf8 COMMENT='tab标签对应表及字段名称';

-- ----------------------------
-- Records of ht_menu_tab_field
-- ----------------------------
INSERT INTO `ht_menu_tab_field` VALUES ('46', '20', '16', 'ht_base_article', 'titles', '标题', '', '', '', '', '', '1', 'text', '1', '', '99');
INSERT INTO `ht_menu_tab_field` VALUES ('39', '18', '15', 'ht_article_category', 'unique_id', '唯一标识', '', '', '', '', '', '', 'text', '1', '1', '99');
INSERT INTO `ht_menu_tab_field` VALUES ('40', '18', '15', 'ht_article_category', 'cat_name', '分类名称', '', '', '', '', '', '1', 'text', '1', '1', '99');
INSERT INTO `ht_menu_tab_field` VALUES ('41', '18', '15', 'ht_article_category', 'keywords', '关键字', '', '', '', '', '', '', 'text', '1', '1', '99');
INSERT INTO `ht_menu_tab_field` VALUES ('42', '18', '15', 'ht_article_category', 'description', '描述', '', '', '', '', '', '', 'textarea', '1', '1', '99');
INSERT INTO `ht_menu_tab_field` VALUES ('43', '18', '15', 'ht_article_category', 'sort', '排序', '', '', '', '', '', '1', 'number', '1', '1', '99');
INSERT INTO `ht_menu_tab_field` VALUES ('45', '20', '16', 'ht_base_article', 'cat_id', '文章所属分类', '1', 'ht_article_category', 'cat_id', 'cat_name', '', '1', 'select', '1', '', '99');
INSERT INTO `ht_menu_tab_field` VALUES ('47', '20', '16', 'ht_base_article', 'contents', '文章内容', '', '', '', '', '', '', 'kindeditor', '1', '1', '99');
INSERT INTO `ht_menu_tab_field` VALUES ('48', '20', '16', 'ht_base_article', 'images', '缩略图', '', '', '', '', '', '', 'image', '1', '1', '99');
INSERT INTO `ht_menu_tab_field` VALUES ('49', '20', '16', 'ht_base_article', 'keywords', '文章关键字', '', '', '', '', '', '', 'text', '1', '1', '99');
INSERT INTO `ht_menu_tab_field` VALUES ('50', '20', '16', 'ht_base_article', 'description', '文章描述', '', '', '', '', '', '', 'textarea', '1', '1', '99');
INSERT INTO `ht_menu_tab_field` VALUES ('51', '20', '16', 'ht_base_article', 'sort', '文章排序', '', '', '', '', '', '1', 'number', '1', '1', '99');
INSERT INTO `ht_menu_tab_field` VALUES ('52', '20', '16', 'ht_base_article', 'show_status', '显示', '2', '', '', '', 'shifou', '1', 'radio', '1', '', '99');
INSERT INTO `ht_menu_tab_field` VALUES ('53', '18', '17', 'ht_article_category', 'cat_name', '分类名称', '', '', '', '', '', '1', 'text', '1', '2', '99');
INSERT INTO `ht_menu_tab_field` VALUES ('54', '18', '17', 'ht_article_category', 'description', '分类描述', '', '', '', '', '', '1', 'text', '1', '1', '99');
