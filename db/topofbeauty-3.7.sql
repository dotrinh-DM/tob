/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50534
Source Host           : localhost:3306
Source Database       : topofbeauty

Target Server Type    : MYSQL
Target Server Version : 50534
File Encoding         : 65001

Date: 2014-08-27 09:58:02
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for tbl_brand
-- ----------------------------
DROP TABLE IF EXISTS `tbl_brand`;
CREATE TABLE `tbl_brand` (
  `id_brand` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(500) DEFAULT NULL,
  `desc` text,
  `image` varchar(500) DEFAULT NULL,
  PRIMARY KEY (`id_brand`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tbl_brand
-- ----------------------------
INSERT INTO `tbl_brand` VALUES ('16', 'Tyu', '&lt;p&gt;ghgh&lt;/p&gt;', 'image53fc3a96b529f.jpg');
INSERT INTO `tbl_brand` VALUES ('17', 'drgdfg', '&lt;p&gt;fgh&lt;/p&gt;', 'image53fc32e992df8.jpg');
INSERT INTO `tbl_brand` VALUES ('18', 'a', '&lt;p&gt;&amp;aacute;d&lt;/p&gt;', 'image53fc3a3dd93f4.jpg');
