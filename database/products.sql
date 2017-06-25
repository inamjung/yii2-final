/*
Navicat MySQL Data Transfer

Source Server         : localhost_3306
Source Server Version : 50525
Source Host           : localhost:3306
Source Database       : yii2final

Target Server Type    : MYSQL
Target Server Version : 50525
File Encoding         : 65001

Date: 2017-06-25 09:40:27
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for products
-- ----------------------------
DROP TABLE IF EXISTS `products`;
CREATE TABLE `products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL COMMENT 'ชื่อวัสดุ',
  `detail` text NOT NULL COMMENT 'คุณสมบัตเฉพาะ',
  `qty` int(11) NOT NULL COMMENT 'จำนวนคงเหลือ',
  `price` double NOT NULL COMMENT 'ราคา',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of products
-- ----------------------------
