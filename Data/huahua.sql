/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50710
Source Host           : localhost:3306
Source Database       : huahua

Target Server Type    : MYSQL
Target Server Version : 50710
File Encoding         : 65001

Date: 2016-08-20 09:44:49
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `admin`
-- ----------------------------
DROP TABLE IF EXISTS `admin`;
CREATE TABLE `admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `admin_name` varchar(20) NOT NULL COMMENT '管路员账号',
  `admin_password` varchar(20) NOT NULL COMMENT '管理员密码',
  `r` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of admin
-- ----------------------------

-- ----------------------------
-- Table structure for `admin_tree`
-- ----------------------------
DROP TABLE IF EXISTS `admin_tree`;
CREATE TABLE `admin_tree` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tree_text` varchar(255) DEFAULT NULL,
  `tree_url` varchar(255) DEFAULT NULL,
  `tree_state` varchar(255) DEFAULT 'open',
  `pid` int(11) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of admin_tree
-- ----------------------------
INSERT INTO `admin_tree` VALUES ('1', '商品管理', '', null, '0');
INSERT INTO `admin_tree` VALUES ('2', '商品列表', '/index', 'open', '1');
INSERT INTO `admin_tree` VALUES ('3', '商品添加', '/index', 'open', '1');
INSERT INTO `admin_tree` VALUES ('4', '新闻管理', null, '', '0');
INSERT INTO `admin_tree` VALUES ('5', '新闻添加', '/index', 'open', '4');
INSERT INTO `admin_tree` VALUES ('6', '新闻列表', '/index', 'open', '4');

-- ----------------------------
-- Table structure for `shop_news`
-- ----------------------------
DROP TABLE IF EXISTS `shop_news`;
CREATE TABLE `shop_news` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `news_title` varchar(50) NOT NULL,
  `news_intr` varchar(500) DEFAULT NULL,
  `news_classid` int(11) DEFAULT NULL,
  `news_content` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of shop_news
-- ----------------------------
INSERT INTO `shop_news` VALUES ('1', '测试', '试试', '1', '按时大大');
INSERT INTO `shop_news` VALUES ('2', 'aa', 'aa', '2', '22');

-- ----------------------------
-- Table structure for `shop_prod`
-- ----------------------------
DROP TABLE IF EXISTS `shop_prod`;
CREATE TABLE `shop_prod` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `prod_name` varchar(50) DEFAULT NULL COMMENT '商品名称',
  `prod_intr` longtext COMMENT '商品简介',
  `prod_classid` int(11) DEFAULT NULL COMMENT '商品类别|{"tb":"shop_prod_class","id":"id","text":"class_name"}',
  `is_public` bit(1) DEFAULT b'0' COMMENT '是否发布',
  `add_time` datetime DEFAULT NULL COMMENT '入库时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of shop_prod
-- ----------------------------
INSERT INTO `shop_prod` VALUES ('1', '3213', '', '1', '', '0000-00-00 00:00:00');

-- ----------------------------
-- Table structure for `shop_prod_class`
-- ----------------------------
DROP TABLE IF EXISTS `shop_prod_class`;
CREATE TABLE `shop_prod_class` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `class_name` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of shop_prod_class
-- ----------------------------
INSERT INTO `shop_prod_class` VALUES ('1', '计算机图书');
INSERT INTO `shop_prod_class` VALUES ('2', '人文类图书');

-- ----------------------------
-- Table structure for `shop_user`
-- ----------------------------
DROP TABLE IF EXISTS `shop_user`;
CREATE TABLE `shop_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(30) NOT NULL,
  `user_pwd` varchar(100) NOT NULL,
  `user_regtime` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of shop_user
-- ----------------------------
INSERT INTO `shop_user` VALUES ('1', 'Lee', 'skDtwJ4UI+/a+GlHZ/0wfQ==', '2016-07-20 17:25:56');

-- ----------------------------
-- Procedure structure for `SP_question`
-- ----------------------------
DROP PROCEDURE IF EXISTS `SP_question`;
DELIMITER ;;
CREATE DEFINER=`skip-grants user`@`skip-grants host` PROCEDURE `SP_question`()
BEGIN
	DECLARE Is_End INT DEFAULT 0;
	DECLARE _str VARCHAR(50) DEFAULT '';
	DECLARE _id INT;
	DECLARE _answer VARCHAR(50);
	DECLARE cur CURSOR FOR SELECT id,answer FROM question_library where id > 100 ORDER BY RAND() LIMIT 10;
  DECLARE CONTINUE HANDLER FOR NOT FOUND SET Is_End = 1;
	OPEN cur;
	FETCH cur INTO _id,_answer;
	WHILE Is_End != 1 DO
		SELECT CONCAT(_id,',',_str) INTO _str;
		FETCH cur INTO _id,_answer;
	END WHILE;
	CLOSE cur;
	SELECT left(_str,LENGTH(_str)-1) AS question;  #去掉最后一个字符串“，”
END
;;
DELIMITER ;

-- ----------------------------
-- Procedure structure for `SP_SPLIT`
-- ----------------------------
DROP PROCEDURE IF EXISTS `SP_SPLIT`;
DELIMITER ;;
CREATE DEFINER=`skip-grants user`@`skip-grants host` PROCEDURE `SP_SPLIT`()
BEGIN

#变量定义
DECLARE _id varchar(50) DEFAULT '';
DECLARE _i INT DEFAULT 0;
DECLARE _cnt INT DEFAULT 0;


#创建临时表
DROP TEMPORARY TABLE IF EXISTS temp_table;
CREATE TEMPORARY TABLE temp_table(id BIGINT(20) NOT NULL);  

#获取数据源
SELECT robot INTO _id FROM `pool_question_New` GROUP BY RAND();
#SELECT question INTO _id FROM `user` WHERE wx_name = '李钊鸿';
SELECT 1+(LENGTH(_id) - LENGTH(REPLACE(_id,',',''))) INTO _cnt;

WHILE _i < _cnt DO
    SET _i =_i + 1;
    #SET @result = REVERSE(SUBSTRING_INDEX(REVERSE(SUBSTRING_INDEX(_id,',',_i)),',',1));
    #INSERT INTO temp_table(id) VALUES (@result);
		SELECT REVERSE(SUBSTRING_INDEX(REVERSE(SUBSTRING_INDEX(_id,',',_i)),',',1));
END WHILE;





END
;;
DELIMITER ;
