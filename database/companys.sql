/*
Navicat MySQL Data Transfer

Source Server         : localhost_3306
Source Server Version : 50525
Source Host           : localhost:3306
Source Database       : yii2final

Target Server Type    : MYSQL
Target Server Version : 50525
File Encoding         : 65001

Date: 2017-06-25 09:39:51
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for companys
-- ----------------------------
DROP TABLE IF EXISTS `companys`;
CREATE TABLE `companys` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL COMMENT 'บริษัท',
  `tel` varchar(45) DEFAULT NULL COMMENT 'Tel',
  `addr` varchar(255) DEFAULT NULL COMMENT 'ที่อยู่',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COMMENT='บริษัท';

-- ----------------------------
-- Records of companys
-- ----------------------------
INSERT INTO `companys` VALUES ('1', 'บ.เค.เอส.ที เช็นทรัลชัพพลาย จก. USA.', null, null);
INSERT INTO `companys` VALUES ('2', 'ไตรรงค์', null, null);
INSERT INTO `companys` VALUES ('3', 'GM เมดไลน์ จก.', null, null);
INSERT INTO `companys` VALUES ('4', 'กรุงเทพครุภัณฑ์เวชภัณฑ์', null, null);
INSERT INTO `companys` VALUES ('5', 'คุณสุชิน', null, null);
INSERT INTO `companys` VALUES ('6', 'เจริญการช่าง', null, null);
INSERT INTO `companys` VALUES ('7', 'ชัยศิลโทรทัศน์', null, null);
INSERT INTO `companys` VALUES ('8', 'ชัยอมรอลูมินั้มแอนกลาส', null, null);
INSERT INTO `companys` VALUES ('9', 'โชควัฒนากระจกอลูมิเนียม', null, null);
