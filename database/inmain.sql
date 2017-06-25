/*
Navicat MySQL Data Transfer

Source Server         : localhost_3306
Source Server Version : 50525
Source Host           : localhost:3306
Source Database       : yii2final

Target Server Type    : MYSQL
Target Server Version : 50525
File Encoding         : 65001

Date: 2017-06-25 09:40:10
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for inmain
-- ----------------------------
DROP TABLE IF EXISTS `inmain`;
CREATE TABLE `inmain` (
  `id` varchar(255) NOT NULL COMMENT 'เลขที่ใบรับเข้า',
  `company_id` int(11) DEFAULT NULL COMMENT 'บริษัท',
  `bill_no` int(11) DEFAULT NULL COMMENT 'เลขที่ใบส่งของ',
  `inventory` enum('i','o') DEFAULT NULL,
  `date` date DEFAULT NULL COMMENT 'วันรับของ',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of inmain
-- ----------------------------
