/*
Navicat MySQL Data Transfer

Source Server         : localhost_3306
Source Server Version : 50525
Source Host           : localhost:3306
Source Database       : yii2final

Target Server Type    : MYSQL
Target Server Version : 50525
File Encoding         : 65001

Date: 2017-06-25 16:08:21
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for indetail
-- ----------------------------
DROP TABLE IF EXISTS `indetail`;
CREATE TABLE `indetail` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `inventory_id` varchar(255) NOT NULL COMMENT 'เลขที่ใบรับเข้า',
  `product_id` int(11) NOT NULL COMMENT 'วัสดุ',
  `price` double NOT NULL DEFAULT '0' COMMENT 'ราคา',
  `qty` int(11) NOT NULL DEFAULT '0' COMMENT 'จำนวนรับ',
  `exp` date DEFAULT NULL COMMENT 'EXP',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of indetail
-- ----------------------------
