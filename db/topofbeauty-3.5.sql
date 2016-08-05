/*
Navicat MySQL Data Transfer

Source Server         : localhost_3306
Source Server Version : 50534
Source Host           : localhost:3306
Source Database       : topofbeauty

Target Server Type    : MYSQL
Target Server Version : 50534
File Encoding         : 65001

Date: 2014-08-26 01:52:59
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for tbl_category
-- ----------------------------
DROP TABLE IF EXISTS `tbl_category`;
CREATE TABLE `tbl_category` (
  `id_category` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(500) DEFAULT NULL,
  `desc` text,
  `image` varchar(500) DEFAULT NULL,
  `status` tinyint(2) DEFAULT '0',
  PRIMARY KEY (`id_category`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tbl_category
-- ----------------------------
INSERT INTO `tbl_category` VALUES ('1', 'Sản phẩm uốn ép', 'sdasdasdsa', '1.jpg', '1');
INSERT INTO `tbl_category` VALUES ('2', 'Sản phẩm nhuộm', 'sdf', '195.GIF', '1');
INSERT INTO `tbl_category` VALUES ('3', 'Sản phẩm tạo kiểu', 'sdfsdfs', '3.jpg', '1');
INSERT INTO `tbl_category` VALUES ('4', 'Sản phẩm dưỡng', 'sdfsdfsdf', '4.jpg', '1');
INSERT INTO `tbl_category` VALUES ('8', 'sd', 'g', '3766.gif', '1');
INSERT INTO `tbl_category` VALUES ('12', 'sdf', 'd', '', '1');
INSERT INTO `tbl_category` VALUES ('13', 'df', 'fds', '', '0');
INSERT INTO `tbl_category` VALUES ('18', 'đá 1', '&lt;div class=\\&quot;title_news\\&quot;&gt;\r\n&lt;h1&gt;C&amp;ocirc;ng an điều tra vụ 3 trẻ tử vong khi mổ từ thiện&lt;/h1&gt;\r\n&lt;/div&gt;\r\n&lt;div class=\\&quot;short_intro txt_666\\&quot;&gt;Cảnh s&amp;aacute;t đ&amp;atilde; ni&amp;ecirc;m phong to&amp;agrave;n bộ ph&amp;ograve;ng mổ, dụng cụ, thuốc men nơi Trung t&amp;acirc;m Nụ Cười thực hiện ca phẫu thuật để l&amp;agrave;m r&amp;otilde; nguy&amp;ecirc;n nh&amp;acirc;n c&amp;aacute;c b&amp;eacute; tử vong.&amp;nbsp;&lt;/div&gt;\r\n&lt;div class=\\&quot;relative_new\\&quot;&gt;\r\n&lt;ul class=\\&quot;list_news_dot_3x3_300\\&quot;&gt;\r\n&lt;li&gt;&lt;a href=\\&quot;http://vnexpress.net/tin-tuc/thoi-su/3-tre-ho-ham-ech-tu-vong-sau-khi-duoc-chua-tu-thien-3036196.html\\&quot;&gt;3 trẻ hở h&amp;agrave;m ếch tử vong sau khi được chữa từ thiện&lt;/a&gt;&lt;/li&gt;\r\n&lt;/ul&gt;\r\n&lt;/div&gt;\r\n&lt;div id=\\&quot;left_calculator\\&quot;&gt;\r\n&lt;div class=\\&quot;fck_detail width_common\\&quot;&gt;\r\n&lt;p&gt;Ng&amp;agrave;y 25/8,&amp;nbsp;Thiếu tướng Trần Ngọc Kh&amp;aacute;nh, gi&amp;aacute;m đốc C&amp;ocirc;ng an tỉnh Kh&amp;aacute;nh H&amp;ograve;a, cho biết đ&amp;atilde; v&amp;agrave;o cuộc điều tra vụ 3 trẻ tử vong sau khi được mổ h&amp;agrave;m ếch từ thiện. Cảnh s&amp;aacute;t ni&amp;ecirc;m ph&amp;ograve;ng to&amp;agrave;n bộ ph&amp;ograve;ng mổ nơi đo&amp;agrave;n của Trung t&amp;acirc;m nghi&amp;ecirc;n cứu v&amp;agrave; hỗ trợ phẫu thuật Nụ Cười (OSCA) l&amp;agrave;m việc, dụng cụ v&amp;agrave; thuốc men d&amp;ugrave;ng cho c&amp;aacute;c ca mổ để phục vụ c&amp;ocirc;ng t&amp;aacute;c điều tra.&lt;/p&gt;\r\n&lt;p&gt;\\&quot;C&amp;ocirc;ng an tỉnh cũng kiểm tra giấy ph&amp;eacute;p h&amp;agrave;nh nghề của những b&amp;aacute;c sĩ tham gia phẫu thuật, đồng thời vận động c&amp;aacute;c gia đ&amp;igrave;nh c&amp;oacute; con tử vong đồng &amp;yacute; cho mổ tử thi để t&amp;igrave;m nguy&amp;ecirc;n nh&amp;acirc;n\\&quot;, Tướng Kh&amp;aacute;nh n&amp;oacute;i.&lt;/p&gt;\r\n&lt;table class=\\&quot;tplCaption\\&quot; border=\\&quot;0\\&quot; cellspacing=\\&quot;0\\&quot; cellpadding=\\&quot;3\\&quot; align=\\&quot;center\\&quot;&gt;\r\n&lt;tbody&gt;\r\n&lt;tr&gt;\r\n&lt;td&gt;&lt;img src=\\&quot;http://m.f29.img.vnecdn.net/2014/08/25/me-em-be-3219-1408978169.jpg\\&quot; alt=\\&quot;me-em-be-3219-1408978169.jpg\\&quot; data-natural-=\\&quot;\\&quot; data-width=\\&quot;500\\&quot; data-pwidth=\\&quot;480\\&quot; /&gt;&lt;/td&gt;\r\n&lt;/tr&gt;\r\n&lt;tr&gt;\r\n&lt;td&gt;\r\n&lt;p class=\\&quot;Image\\&quot;&gt;Mẹ b&amp;eacute; g&amp;aacute;i thẫn thờ sau khi con ra đ&amp;igrave;. Ảnh: &lt;em&gt;Xu&amp;acirc;n Hương&lt;/em&gt;&lt;/p&gt;\r\n&lt;/td&gt;\r\n&lt;/tr&gt;\r\n&lt;/tbody&gt;\r\n&lt;/table&gt;\r\n&lt;p class=\\&quot;Normal\\&quot;&gt;Li&amp;ecirc;n quan đến việc 3 trẻ hở h&amp;agrave;m ếch ở Kh&amp;aacute;nh H&amp;ograve;a đ&amp;atilde; lần lượt qua đời sau khi được g&amp;acirc;y m&amp;ecirc; để phẫu thuật miễn ph&amp;iacute;, gi&amp;aacute;m đốc Trung t&amp;acirc;m Nụ Cười Đặng Thị Thu Ho&amp;agrave;i cho biết, trong đợt phẫu thuật n&amp;agrave;y c&amp;oacute; 5 b&amp;aacute;c sĩ phụ tr&amp;aacute;ch chuy&amp;ecirc;n m&amp;ocirc;n, c&amp;ograve;n lại l&amp;agrave; những t&amp;igrave;nh nguyện vi&amp;ecirc;n đi theo để phụ gi&amp;uacute;p c&amp;aacute;c c&amp;ocirc;ng việc kh&amp;aacute;c.&lt;/p&gt;\r\n&lt;p class=\\&quot;Normal\\&quot;&gt;Ng&amp;agrave;y 23/8, trong &amp;ecirc; k&amp;iacute;p phẫu thuật c&amp;oacute; hai b&amp;aacute;c sĩ chuy&amp;ecirc;n ng&amp;agrave;nh g&amp;acirc;y m&amp;ecirc; l&amp;agrave; b&amp;aacute;c sĩ Ph&amp;iacute; Thị Hồng L&amp;ecirc; (bệnh vi&amp;ecirc;n Răng H&amp;agrave;m Mặt TP HCM) v&amp;agrave; b&amp;aacute;c sĩ Nguyễn Thị Thanh B&amp;igrave;nh, trước đ&amp;acirc;y l&amp;agrave;m cho bệnh viện Ung bướu H&amp;agrave; Nội (đ&amp;atilde; nghỉ hưu 5 năm). C&amp;aacute;c b&amp;aacute;c sĩ n&amp;agrave;y đều đ&amp;oacute; bằng cấp chuy&amp;ecirc;n m&amp;ocirc;n l&amp;acirc;u năm v&amp;agrave; c&amp;oacute; nhiều kinh ngiệm trong phẫu thuật. Trong ba ch&amp;aacute;u bị sự cố th&amp;igrave; ch&amp;aacute;u Pi năng Tuấn Hữu (1 tuổi) v&amp;agrave; ch&amp;aacute;u Nguyễn Ngọc Tuyết V&amp;acirc;n (2 tuổi) được b&amp;aacute;c sĩ B&amp;igrave;nh g&amp;acirc;y m&amp;ecirc;, c&amp;ograve;n ch&amp;aacute;u Nguyễn Quang Minh (2 tuổi) được b&amp;aacute;c sĩ L&amp;ecirc; g&amp;acirc;y m&amp;ecirc;.&lt;/p&gt;\r\n&lt;p&gt;\\&quot;Ch&amp;uacute;ng t&amp;ocirc;i đ&amp;atilde; l&amp;agrave;m rất kỹ c&amp;aacute;c quy tr&amp;igrave;nh\\&quot;, b&amp;agrave; Ho&amp;agrave;i khẳng định khi được hỏi liệu c&amp;oacute; sai s&amp;oacute;t g&amp;igrave; trong quy tr&amp;igrave;nh g&amp;acirc;y m&amp;ecirc;, phẫu thuật dẫn đến hậu quả đ&amp;aacute;ng tiếc n&amp;agrave;y.&lt;/p&gt;\r\n&lt;p&gt;Theo b&amp;agrave; Ho&amp;agrave;i, đầu ti&amp;ecirc;n trung t&amp;acirc;m kh&amp;aacute;m s&amp;agrave;ng lọc 89 ch&amp;aacute;u, sau đ&amp;oacute; chọn được 68 ch&amp;aacute;u. X&amp;eacute;t nghiệm m&amp;aacute;u để s&amp;agrave;ng lọc lần cuối, trung t&amp;acirc;m chọn được 56 ch&amp;aacute;u đủ điều kiện để phẫu thuật. \\&quot;Những ch&amp;aacute;u n&amp;agrave;y sẽ được c&amp;aacute;c b&amp;aacute;c sĩ của đo&amp;agrave;n tiến h&amp;agrave;nh phẫu thuật trong hai ng&amp;agrave;y 23-24/8, nhưng sau khi c&amp;oacute; 3 ch&amp;aacute;u bị sự cố ch&amp;uacute;ng t&amp;ocirc;i đ&amp;atilde; ngưng việc phẫu thuật lại. Nguy&amp;ecirc;n&lt;/p&gt;\r\n&lt;/div&gt;\r\n&lt;/div&gt;', 'image53fb6d52b37e4.JPG', '1');


/*
Navicat MySQL Data Transfer

Source Server         : localhost_3306
Source Server Version : 50534
Source Host           : localhost:3306
Source Database       : topofbeauty

Target Server Type    : MYSQL
Target Server Version : 50534
File Encoding         : 65001

Date: 2014-08-26 01:52:46
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for tbl_product
-- ----------------------------
DROP TABLE IF EXISTS `tbl_product`;
CREATE TABLE `tbl_product` (
  `id_product` int(11) NOT NULL AUTO_INCREMENT,
  `id_category` int(11) DEFAULT NULL,
  `name` varchar(500) DEFAULT NULL,
  `desc` text,
  `image` varchar(500) DEFAULT NULL,
  `status` tinyint(2) DEFAULT '0',
  PRIMARY KEY (`id_product`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tbl_product
-- ----------------------------
INSERT INTO `tbl_product` VALUES ('6', '2', '23', '34', '42', '1');
INSERT INTO `tbl_product` VALUES ('7', '2', 'fgh', '', null, '1');
INSERT INTO `tbl_product` VALUES ('11', '4', 'ươ ô 1', '&lt;p&gt;ơtghfghfgh 1&lt;/p&gt;', 'image53fb80888149d.JPG', '0');
INSERT INTO `tbl_product` VALUES ('12', '3', 'ư', '&lt;p&gt;sdfsdf&lt;/p&gt;', 'image53fb80752a5bf.JPG', '1');
