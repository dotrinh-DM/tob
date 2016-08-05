/*
Navicat MySQL Data Transfer

Source Server         : xampp
Source Server Version : 50536
Source Host           : localhost:3306
Source Database       : topofbeauty

Target Server Type    : MYSQL
Target Server Version : 50536
File Encoding         : 65001

Date: 2014-08-28 18:32:51
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for tbl_admins
-- ----------------------------
DROP TABLE IF EXISTS `tbl_admins`;
CREATE TABLE `tbl_admins` (
  `id_admins` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(80) NOT NULL,
  `password` varchar(500) NOT NULL,
  `email` varchar(150) DEFAULT NULL,
  `address` varchar(250) DEFAULT NULL,
  `phone` varchar(14) DEFAULT NULL,
  `status` int(10) unsigned DEFAULT '1',
  `date_create` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_admins`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

-- ----------------------------
-- Records of tbl_admins
-- ----------------------------
INSERT INTO `tbl_admins` VALUES ('1', 'admin', 'c4ca4238a0b923820dcc509a6f75849b', 'gggg@gmail.com', 'ha noi 11', '0984778052', '1', '2014-08-06 14:40:32');
INSERT INTO `tbl_admins` VALUES ('2', 'admin1', 'c4ca4238a0b923820dcc509a6f75849b', 'asd@gmail.com', 'dfsdf', '08078967868', '1', '2014-08-06 11:35:00');
INSERT INTO `tbl_admins` VALUES ('3', 'admin2', 'c4ca4238a0b923820dcc509a6f75849b', 'aaa@gmail.com', 'sf', '08007978786', '1', '2014-08-06 11:35:22');

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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tbl_brand
-- ----------------------------
INSERT INTO `tbl_brand` VALUES ('1', 'Sunsilk', null, null);
INSERT INTO `tbl_brand` VALUES ('2', 'Omo', null, null);
INSERT INTO `tbl_brand` VALUES ('3', 'Sunight', null, null);
INSERT INTO `tbl_brand` VALUES ('4', 'Rejoice', null, null);

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
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tbl_category
-- ----------------------------
INSERT INTO `tbl_category` VALUES ('1', 'Sản phẩm uốn ép', 'sdasdasdsa', '1.jpg', '1');
INSERT INTO `tbl_category` VALUES ('2', 'Sản phẩm nhuộm', 'sdf', '195.GIF', '1');
INSERT INTO `tbl_category` VALUES ('3', 'Sản phẩm tạo kiểu', 'sdfsdfs', '3.jpg', '1');
INSERT INTO `tbl_category` VALUES ('4', 'Sản phẩm dưỡng', 'sdfsdfsdf', '4.jpg', '1');

-- ----------------------------
-- Table structure for tbl_collections
-- ----------------------------
DROP TABLE IF EXISTS `tbl_collections`;
CREATE TABLE `tbl_collections` (
  `id_collection` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_user` int(10) unsigned NOT NULL,
  `title` varchar(500) NOT NULL,
  `idea` text,
  `curly_product` int(11) DEFAULT NULL,
  `dye_product` int(11) DEFAULT NULL,
  `style_product` int(11) DEFAULT NULL,
  `care_product` int(11) DEFAULT NULL,
  `technology` text,
  `date_create` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` tinyint(1) unsigned DEFAULT '0',
  `approve` tinyint(1) NOT NULL DEFAULT '1' COMMENT 'User accept then public album',
  `trash` tinyint(1) NOT NULL DEFAULT '0',
  `viewed` int(10) unsigned NOT NULL DEFAULT '0',
  `vote` int(10) unsigned NOT NULL DEFAULT '0',
  `like` int(10) unsigned NOT NULL DEFAULT '0',
  `unlike` int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_collection`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

-- ----------------------------
-- Records of tbl_collections
-- ----------------------------
INSERT INTO `tbl_collections` VALUES ('23', '25', 'album 1', '', null, null, null, null, 'jjhk', '2014-08-28 15:31:02', '1', '1', '0', '0', '0', '0', '0');
INSERT INTO `tbl_collections` VALUES ('24', '25', 'album 2', '', null, null, null, null, 'sd', '2014-08-28 15:31:03', '1', '1', '0', '0', '0', '0', '0');
INSERT INTO `tbl_collections` VALUES ('25', '25', 'album 3', '', null, null, null, null, 'sdfsd', '2014-08-28 15:31:03', '1', '1', '0', '1', '0', '0', '0');
INSERT INTO `tbl_collections` VALUES ('26', '25', 'album 4', '', null, null, null, null, 'sdfsdf', '2014-08-28 15:31:03', '1', '1', '0', '0', '0', '0', '0');
INSERT INTO `tbl_collections` VALUES ('27', '23', 'album 5', '', null, null, null, null, 'sdfsd', '2014-08-28 15:31:03', '1', '1', '0', '0', '0', '0', '0');
INSERT INTO `tbl_collections` VALUES ('28', '23', 'album 2.2', '', '0', '14', '11', '16', 'as', '2014-08-28 16:37:24', '1', '1', '0', '0', '0', '0', '0');
INSERT INTO `tbl_collections` VALUES ('30', '23', 'album 3', 'ádá', '0', '14', '11', '16', 'á', '2014-08-28 16:26:25', '1', '1', '0', '0', '0', '0', '0');
INSERT INTO `tbl_collections` VALUES ('31', '23', 'sđâs', 'áda', '0', '14', '11', '16', 'áđá', '2014-08-28 16:38:06', '1', '1', '0', '0', '0', '0', '0');
INSERT INTO `tbl_collections` VALUES ('32', '23', 'dfsf', 'asdasdas', '0', '14', '11', '16', 'asas', '2014-08-28 17:17:23', '1', '1', '0', '0', '0', '0', '0');

-- ----------------------------
-- Table structure for tbl_config
-- ----------------------------
DROP TABLE IF EXISTS `tbl_config`;
CREATE TABLE `tbl_config` (
  `id_config` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `alias` varchar(80) NOT NULL,
  `value` text,
  PRIMARY KEY (`id_config`)
) ENGINE=MyISAM AUTO_INCREMENT=65 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

-- ----------------------------
-- Records of tbl_config
-- ----------------------------
INSERT INTO `tbl_config` VALUES ('2', 'bn', 'bun');
INSERT INTO `tbl_config` VALUES ('4', 'width', '500');
INSERT INTO `tbl_config` VALUES ('5', 'height', '250');
INSERT INTO `tbl_config` VALUES ('15', ')*(^*%#%!$!,\\\\\\\\.\\\\\\\\\\\\\\\\/\\\\\\\\&lt;&gt;?&amp;lt;?', '\\\\n /n~!@#$#^^&amp;(&amp;)*)&lt;&gt;?,./');
INSERT INTO `tbl_config` VALUES ('12', '123', '0984778052sdffffffffffffff sdfs sd sdfsdfsfsdfdnfgilsdjhergerlghlsdghilerh gjelrgndfiogh erognlert erl;tberopt renltenrtl ;erjtp\'ẻ te\'the\'tpw etlet');
INSERT INTO `tbl_config` VALUES ('20', 'asdasd', '0984778052sdffffffffffffff sdfs sd sdfsdfsfsdfdnfgilsdjhergerlghlsdghilerh gjelrgndfiogh erognlert erl;tberopt renltenrtl ;erjtp\'ẻ te\'the\'tpw etlet');
INSERT INTO `tbl_config` VALUES ('19', '12333', '235923423424ss');
INSERT INTO `tbl_config` VALUES ('59', 'num_show_other_news', '5');
INSERT INTO `tbl_config` VALUES ('24', 'sdfsfsf', 'sdfsdf');
INSERT INTO `tbl_config` VALUES ('50', 'awards_content', '&lt;p&gt;Chương trình thực tế dành cho phụ nữ trong độ tuổi 30 do Tạp chí Tóc Đẹp phối hợp với Đài Truyền hình Hà Nội và thương hiệu sản phẩm chăm sóc tóc chuyên nghiệp Kléral System tổ chức đã thực hiện ghi hình số thứ 2, với sự tham gia của chuyên gia NTMT Hải Bún và nhân vật khách mời ca sỹ Mỹ Dung&lt;/p&gt;\r\n&lt;p&gt;&lt;br /&gt;Được biết đến với gout thời trang thanh lịch và tinh tế, NTMT Hải Bún luôn được các tín đồ thời trang tóc tin tưởng giao phó mái tóc. Và trong chương trình lần này, với vai trò chuyên gia anh đã thiết kế cho ca sỹ Mỹ Dung kiểu tóc bằng Ovan khá hiện đại.&lt;/p&gt;\r\n&lt;p&gt;&lt;br /&gt;Sau gần 5h thực hiện, kiểu tóc đã hoàn thành trong sự hài lòng tuyệt đối của nhân vật khách mời và ekip thực hiện chương trình&lt;/p&gt;');
INSERT INTO `tbl_config` VALUES ('60', 'address_email_send', 'khactung9x@gmail.com');
INSERT INTO `tbl_config` VALUES ('61', 'password_email_send', 'khactung230492');
INSERT INTO `tbl_config` VALUES ('62', 'name_website', 'topofbeauty.vn');
INSERT INTO `tbl_config` VALUES ('63', 'content_forgot_password_email_send', '<h2>Xin ch&agrave;o, mật khẩu của bạn đ&atilde; được reset</h2>\r\n<p>Bạn c&oacute; thể đăng nhập t&agrave;i khoản <a target=\"_blank\" href=\"http://topofbeauty.local/login\">topofbeauty.vn</a>&nbsp;bằng mật khẩu mới.</p>');
INSERT INTO `tbl_config` VALUES ('26', 'link_facebook', 'http://facebook.com');
INSERT INTO `tbl_config` VALUES ('27', 'link_youtube', 'http://youtube.com');
INSERT INTO `tbl_config` VALUES ('58', 'num_show_list_collection', '10');
INSERT INTO `tbl_config` VALUES ('51', 'awards_title', 'Giải Thưởng');
INSERT INTO `tbl_config` VALUES ('52', 'donors_title', 'Nhà Tài Trợ');
INSERT INTO `tbl_config` VALUES ('53', 'donors_content', '&lt;h4&gt;Nhà tìa trợ vàng:&lt;/h4&gt; &lt;h5&gt;tập đoàn abc.&lt;/h5&gt;&lt;br/&gt;&lt;br/&gt;&lt;h4&gt;Nhà tại trợ bạc:&lt;/h4&gt; &lt;h5&gt;công ty zxy.&lt;/h5&gt;');
INSERT INTO `tbl_config` VALUES ('54', 'jury_title', 'Ban Giám Khảo');
INSERT INTO `tbl_config` VALUES ('55', 'jury_content', '<b>Thành viên Ban giám khảo gồm có:</b><br/><br/><br/>Ông: <b>Nguyễn Khánh T</b><br/><br/>Ông: <b>Nguyễn Khắc T</b><br/><br/>Bà: <b>Trịnh Thành Đ</b>');
INSERT INTO `tbl_config` VALUES ('56', 'rules_title', 'thể lệ cuộc thi');
INSERT INTO `tbl_config` VALUES ('57', 'rules_content', '<p>Bạn tự tin vào phong cách và cá tính của mình? Bạn tự tin vào vóc dáng mình và không hề ngại ngần trước ống kính máy ảnh? Vậy tại sao bạn không thử sức một lần làm người mẫu và gửi về tấm ảnh đẹp và ưng ý nhất của bạn để giành cơ hội sở hữu chiếc Ultrabook Acer Aspire S3 tuyệt vời cùng cơ hội chụp ảnh với nhiếp ảnh gia chuyên nghiệp. Giờ bạn đã sẵn sàng chưa?</p>\r\n<p> </p>\r\n<p><strong>Đối tượng tham gia: </strong></p>\r\n<p>Tất cả công dân Việt Nam hoặc người nước ngoài sống và làm việc tại Việt Nam.</p>\r\n<p> </p>\r\n<p><strong>Thời gian cuộc thi: </strong></p>\r\n<p>Từ ngày 9/11/ 2012 đến ngày 9/12/2012</p>\r\n<p> </p>\r\n<p><strong>Cách thức tham gia: </strong></p>\r\n<p>-     Các bạn chụp ảnh thể hiện phong cách bản thân và gửi về <strong>tin nhắn</strong> trên trang Fanpage Acer Việt Nam để dự thi</p>\r\n<p>Kèm theo những thông tin sau:</p>\r\n<p><strong>Họ và tên:</strong></p>\r\n<p><strong>Sđt:</strong></p>\r\n<p><strong>Địa chỉ:</strong></p>\r\n<p><strong>Chú thích hình ảnh (không quá 200 từ):</strong></p>\r\n<p>-     Bạn hãy chọn ra 1 tấm ảnh ưng ý nhất của bạn và gửi về tham gia cuộc thi</p>\r\n<p>-     BTC sẽ đăng ảnh thí sinh tham dự lên Fanpage Acer Việt Nam để fans bình chọn</p>\r\n<p> </p>\r\n<p><strong>Giải thưởng: </strong></p>\r\n<p>-     1 giải nhất: Ultrabook Acer Aspire S3 + 1 áo thun thời trang</p>\r\n<p>-     1 giải nhì: Acer Vouchers trị giá 1,000,000 VND + 1 áo thun thời trang</p>\r\n<p>-     1 giải khuyến khích: Acer Vouchers trị giá 500,000 VND + 1 áo thun thời trang</p>\r\n<p> </p>\r\n<p><strong>Tiêu chí chấm giải:</strong></p>\r\n<p>-          Ảnh dự thi phải thể hiện được 3 tiêu chí: <strong>Super Strong - Super Smart - Super Sexy</strong></p>\r\n<p>-          BTC sẽ chọn ra 3 bức ảnh đẹp, thể hiện được tiêu chí cuộc thi vào vòng 2. Mỗi hình ảnh được chọn vào vòng 2 phải có ít nhất 30 likes ủng hộ.</p>\r\n<p>-          3 thí sinh xuất sắc nhất trong 3 bức ảnh được chọn sẽ tham gia chụp ảnh cùng nhiếp ảnh gia chuyên nghiệp và 3 bộ ảnh mới chụp này sẽ được đăng lên Fanpage AcerVN cho fans bình chọn.</p>\r\n<p>-          Kết quả vòng 3 được xét trên thang điểm 100: 50 điểm từ ban giám khảo và 50 điểm từ fans bình chọn (Theo đó người được fans bình chọn cao nhất sẽ được 50 điểm, người có lượt bình chọn thấp tiếp theo sẽ được lần lượt 40, 30 điểm). Cuối cùng Thí sinh được giải nhất là người có số điểm cao nhất, thí sinh được giải nhì là người được số điểm cao tiếp theo.</p>\r\n<p>-          Giải khuyến khích: dành cho fans chia sẻ poster cuộc thi về trang facebook cá nhân có lượng like nhiều nhất (tính đến hết vòng 1). Các bạn post/ share poster của cuộc thi về Facebook cá nhân và gửi link post về hộp thư tin nhắn trên Facebook Fan Page của Acer Việt Nam kèm theo thông tin cá nhân.</p>\r\n<p> </p>\r\n<p><strong>Thời gian cụ thể: </strong></p>\r\n<p>-          <strong>Vòng 1:</strong> <strong>từ ngày 09/11/2012 đến 22/11/2012</strong></p>\r\n<p>+ Thí sinh bắt đầu gửi ảnh và đăng tác phẩm dự thi lên Fanpage AcerVN.</p>\r\n<p>+ Kết thúc nhận ảnh dự thi vào 17:00 ngày 21/11/2012.</p>\r\n<p>+ BTC sẽ tổng kết số lượng like vào 15:00 ngày 22/11/2012.</p>\r\n<p>-          <strong>Vòng 2:</strong> <strong>từ 23/11/2012 đến 03/12/2012</strong></p>\r\n<p>+ 3 thí sinh xuất sắc nhất vòng 1 sẽ tham gia chụp ảnh cùng nhiếp ảnh gia chuyên nghiệp</p>\r\n<p>+ Chuẩn bị đưa 3 bộ ảnh mới thực hiện lên Fanpage AcerVN.</p>\r\n<p>-          <strong> Vòng chung kết:</strong> <strong>từ 04/11/2012 đến 10/12/2012</strong></p>\r\n<p>+ Đăng 3 album mới nhất của 3 thí sinh lên Fanpage AcerVN cho Fans bình chọn Album được yêu thích nhất.</p>\r\n<p>+ BTC sẽ tổng kết số lượt bình chọn vào 15:00 ngày 10/12/2012.</p>\r\n<p> </p>\r\n<p><strong>Thời gian trao giải:</strong></p>\r\n<p>BTC sẽ liên hệ với thí sinh thắng cuộc thông báo về thời gian, cách thức và địa điểm trao giải trong vòng một tuần kể từ sau ngày công bố kết quả.</p>\r\n<p> </p>\r\n<p><strong>Một số quy định:</strong></p>\r\n<p>- Tác phẩm dự thi phải đảm bảo không vi phạm vấn đề bản quyền từ phía các bên có liên quan. Những tác phẩm vi phạm sẽ không được chọn và BTC không chịu trách nhiệm về các vấn đề có liên quan.</p>\r\n<p>- Tác phẩm dự thi không vi phạm thuần phong mỹ tục Việt Nam.</p>\r\n<p>- Fans like ủng hộ phải là fans thực, nếu BTC phát hiện thí sinh sử dụng các phần mềm hay fans ảo sẽ không tính điểm cho thí sinh và tùy cấp độ vi phạm có thể hủy bỏ kết quả của thí sinh.  </p>\r\n<p>- BTC có quyền từ chối đăng hoặc xóa bỏ tác phẩm dự thi bất kì lúc nào nếu nhận thấy tác phẩm không phù hợp tiêu chí cuộc thi.</p>\r\n<p>- BTC được toàn quyền sử dụng tất cả những tác phẩm tham gia dự thi mà không phải thông báo hay xin phép thí sinh. </p>\r\n<p>- Tác phẩm dự thi đẹp sẽ được AcerVN chọn xuất hiện trên các phương tiện truyền thông.</p>');
INSERT INTO `tbl_config` VALUES ('64', 'content_register_email_send', '<h1>Ch&agrave;o mừng tới cuộc thi Topofbeauty</h1>\r\n<h3><a target=\"_blank\" href=\"http://topofbeauty.local\">Trang chủ</a></h3>');

-- ----------------------------
-- Table structure for tbl_district
-- ----------------------------
DROP TABLE IF EXISTS `tbl_district`;
CREATE TABLE `tbl_district` (
  `districtid` varchar(5) NOT NULL,
  `name` varchar(100) NOT NULL,
  `type` varchar(30) NOT NULL,
  `location` varchar(30) NOT NULL,
  `provinceid` varchar(5) NOT NULL,
  PRIMARY KEY (`districtid`),
  KEY `provinceid` (`provinceid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tbl_district
-- ----------------------------
INSERT INTO `tbl_district` VALUES ('001', 'Ba Đình', 'Quận', '21 02 08N, 105 49 38E', '01');
INSERT INTO `tbl_district` VALUES ('002', 'Hoàn Kiếm', 'Quận', '21 01 53N, 105 51 09E', '01');
INSERT INTO `tbl_district` VALUES ('003', 'Tây Hồ', 'Quận', '21 04 10N, 105 49 07E', '01');
INSERT INTO `tbl_district` VALUES ('004', 'Long Biên', 'Quận', '21 02 21N, 105 53 07E', '01');
INSERT INTO `tbl_district` VALUES ('005', 'Cầu Giấy', 'Quận', '21 01 52N, 105 47 20E', '01');
INSERT INTO `tbl_district` VALUES ('006', 'Đống Đa', 'Quận', '21 00 56N, 105 49 06E', '01');
INSERT INTO `tbl_district` VALUES ('007', 'Hai Bà Trưng', 'Quận', '21 00 27N, 105 51 35E', '01');
INSERT INTO `tbl_district` VALUES ('008', 'Hoàng Mai', 'Quận', '20 58 33N, 105 51 22E', '01');
INSERT INTO `tbl_district` VALUES ('009', 'Thanh Xuân', 'Quận', '20 59 44N, 105 48 56E', '01');
INSERT INTO `tbl_district` VALUES ('016', 'Sóc Sơn', 'Huyện', '21 16 55N, 105 49 46E', '01');
INSERT INTO `tbl_district` VALUES ('017', 'Đông Anh', 'Huyện', '21 08 16N, 105 49 38E', '01');
INSERT INTO `tbl_district` VALUES ('018', 'Gia Lâm', 'Huyện', '21 01 28N, 105 56 54E', '01');
INSERT INTO `tbl_district` VALUES ('019', 'Từ Liêm', 'Huyện', '21 02 39N, 105 45 32E', '01');
INSERT INTO `tbl_district` VALUES ('020', 'Thanh Trì', 'Huyện', '20 56 32N, 105 50 55E', '01');
INSERT INTO `tbl_district` VALUES ('024', 'Hà Giang', 'Thị Xã', '22 46 23N, 105 02 39E', '02');
INSERT INTO `tbl_district` VALUES ('026', 'Đồng Văn', 'Huyện', '23 14 34N, 105 15 48E', '02');
INSERT INTO `tbl_district` VALUES ('027', 'Mèo Vạc', 'Huyện', '23 09 10N, 105 26 38E', '02');
INSERT INTO `tbl_district` VALUES ('028', 'Yên Minh', 'Huyện', '23 04 20N, 105 10 13E', '02');
INSERT INTO `tbl_district` VALUES ('029', 'Quản Bạ', 'Huyện', '23 04 03N, 104 58 05E', '02');
INSERT INTO `tbl_district` VALUES ('030', 'Vị Xuyên', 'Huyện', '22 45 50N, 104 56 26E', '02');
INSERT INTO `tbl_district` VALUES ('031', 'Bắc Mê', 'Huyện', '22 45 48N, 105 16 26E', '02');
INSERT INTO `tbl_district` VALUES ('032', 'Hoàng Su Phì', 'Huyện', '22 41 37N, 104 40 06E', '02');
INSERT INTO `tbl_district` VALUES ('033', 'Xín Mần', 'Huyện', '22 38 05N, 104 28 35E', '02');
INSERT INTO `tbl_district` VALUES ('034', 'Bắc Quang', 'Huyện', '22 23 42N, 104 55 06E', '02');
INSERT INTO `tbl_district` VALUES ('035', 'Quang Bình', 'Huyện', '22 23 07N, 104 37 11E', '02');
INSERT INTO `tbl_district` VALUES ('040', 'Cao Bằng', 'Thị Xã', '22 39 20N, 106 15 20E', '04');
INSERT INTO `tbl_district` VALUES ('042', 'Bảo Lâm', 'Huyện', '22 52 37N, 105 27 28E', '04');
INSERT INTO `tbl_district` VALUES ('043', 'Bảo Lạc', 'Huyện', '22 52 31N, 105 42 41E', '04');
INSERT INTO `tbl_district` VALUES ('044', 'Thông Nông', 'Huyện', '22 49 09N, 105 57 05E', '04');
INSERT INTO `tbl_district` VALUES ('045', 'Hà Quảng', 'Huyện', '22 53 42N, 106 06 32E', '04');
INSERT INTO `tbl_district` VALUES ('046', 'Trà Lĩnh', 'Huyện', '22 48 14N, 106 19 47E', '04');
INSERT INTO `tbl_district` VALUES ('047', 'Trùng Khánh', 'Huyện', '22 49 31N, 106 33 58E', '04');
INSERT INTO `tbl_district` VALUES ('048', 'Hạ Lang', 'Huyện', '22 42 37N, 106 41 42E', '04');
INSERT INTO `tbl_district` VALUES ('049', 'Quảng Uyên', 'Huyện', '22 40 15N, 106 27 42E', '04');
INSERT INTO `tbl_district` VALUES ('050', 'Phục Hoà', 'Huyện', '22 33 52N, 106 30 02E', '04');
INSERT INTO `tbl_district` VALUES ('051', 'Hoà An', 'Huyện', '22 41 20N, 106 02 05E', '04');
INSERT INTO `tbl_district` VALUES ('052', 'Nguyên Bình', 'Huyện', '22 38 52N, 105 57 02E', '04');
INSERT INTO `tbl_district` VALUES ('053', 'Thạch An', 'Huyện', '22 28 51N, 106 19 51E', '04');
INSERT INTO `tbl_district` VALUES ('058', 'Bắc Kạn', 'Thị Xã', '22 08 00N, 105 51 10E', '06');
INSERT INTO `tbl_district` VALUES ('060', 'Pác Nặm', 'Huyện', '22 35 46N, 105 40 25E', '06');
INSERT INTO `tbl_district` VALUES ('061', 'Ba Bể', 'Huyện', '22 23 54N, 105 43 30E', '06');
INSERT INTO `tbl_district` VALUES ('062', 'Ngân Sơn', 'Huyện', '22 25 50N, 106 01 00E', '06');
INSERT INTO `tbl_district` VALUES ('063', 'Bạch Thông', 'Huyện', '22 12 04N, 105 51 01E', '06');
INSERT INTO `tbl_district` VALUES ('064', 'Chợ Đồn', 'Huyện', '22 11 18N, 105 34 43E', '06');
INSERT INTO `tbl_district` VALUES ('065', 'Chợ Mới', 'Huyện', '21 57 56N, 105 51 29E', '06');
INSERT INTO `tbl_district` VALUES ('066', 'Na Rì', 'Huyện', '22 09 48N, 106 05 09E', '06');
INSERT INTO `tbl_district` VALUES ('070', 'Tuyên Quang', 'Thị Xã', '21 49 40N, 105 13 12E', '08');
INSERT INTO `tbl_district` VALUES ('072', 'Nà Hang', 'Huyện', '22 28 34N, 105 21 03E', '08');
INSERT INTO `tbl_district` VALUES ('073', 'Chiêm Hóa', 'Huyện', '22 12 49N, 105 14 32E', '08');
INSERT INTO `tbl_district` VALUES ('074', 'Hàm Yên', 'Huyện', '22 05 46N, 105 00 13E', '08');
INSERT INTO `tbl_district` VALUES ('075', 'Yên Sơn', 'Huyện', '21 51 53N, 105 18 14E', '08');
INSERT INTO `tbl_district` VALUES ('076', 'Sơn Dương', 'Huyện', '21 40 22N, 105 22 57E', '08');
INSERT INTO `tbl_district` VALUES ('080', 'Lào Cai', 'Thành Phố', '22 25 07N, 103 58 43E', '10');
INSERT INTO `tbl_district` VALUES ('082', 'Bát Xát', 'Huyện', '22 35 50N, 103 44 49E', '10');
INSERT INTO `tbl_district` VALUES ('083', 'Mường Khương', 'Huyện', '22 41 05N, 104 08 26E', '10');
INSERT INTO `tbl_district` VALUES ('084', 'Si Ma Cai', 'Huyện', '22 39 46N, 104 16 05E', '10');
INSERT INTO `tbl_district` VALUES ('085', 'Bắc Hà', 'Huyện', '22 30 08N, 104 18 54E', '10');
INSERT INTO `tbl_district` VALUES ('086', 'Bảo Thắng', 'Huyện', '22 22 47N, 104 10 00E', '10');
INSERT INTO `tbl_district` VALUES ('087', 'Bảo Yên', 'Huyện', '22 17 38N, 104 25 02E', '10');
INSERT INTO `tbl_district` VALUES ('088', 'Sa Pa', 'Huyện', '22 18 54N, 103 54 18E', '10');
INSERT INTO `tbl_district` VALUES ('089', 'Văn Bàn', 'Huyện', '22 03 48N, 104 10 59E', '10');
INSERT INTO `tbl_district` VALUES ('094', 'Điện Biên Phủ', 'Thành Phố', '21 24 52N, 103 02 31E', '11');
INSERT INTO `tbl_district` VALUES ('095', 'Mường Lay', 'Thị Xã', '22 01 47N, 103 07 10E', '11');
INSERT INTO `tbl_district` VALUES ('096', 'Mường Nhé', 'Huyện', '22 06 11N, 102 30 54E', '11');
INSERT INTO `tbl_district` VALUES ('097', 'Mường Chà', 'Huyện', '21 50 31N, 103 03 15E', '11');
INSERT INTO `tbl_district` VALUES ('098', 'Tủa Chùa', 'Huyện', '21 58 19N, 103 23 01E', '11');
INSERT INTO `tbl_district` VALUES ('099', 'Tuần Giáo', 'Huyện', '21 38 03N, 103 21 06E', '11');
INSERT INTO `tbl_district` VALUES ('100', 'Điện Biên', 'Huyện', '21 15 19N, 103 03 19E', '11');
INSERT INTO `tbl_district` VALUES ('101', 'Điện Biên Đông', 'Huyện', '21 14 07N, 103 15 19E', '11');
INSERT INTO `tbl_district` VALUES ('102', 'Mường Ảng', 'Huyện', '', '11');
INSERT INTO `tbl_district` VALUES ('104', 'Lai Châu', 'Thị Xã', '22 23 15N, 103 24 22E', '12');
INSERT INTO `tbl_district` VALUES ('106', 'Tam Đường', 'Huyện', '22 20 16N, 103 32 53E', '12');
INSERT INTO `tbl_district` VALUES ('107', 'Mường Tè', 'Huyện', '22 24 16N, 102 43 11E', '12');
INSERT INTO `tbl_district` VALUES ('108', 'Sìn Hồ', 'Huyện', '22 17 21N, 103 18 12E', '12');
INSERT INTO `tbl_district` VALUES ('109', 'Phong Thổ', 'Huyện', '22 38 24N, 103 22 38E', '12');
INSERT INTO `tbl_district` VALUES ('110', 'Than Uyên', 'Huyện', '21 59 35N, 103 45 30E', '12');
INSERT INTO `tbl_district` VALUES ('111', 'Tân Uyên', 'Huyện', '', '12');
INSERT INTO `tbl_district` VALUES ('116', 'Sơn La', 'Thành Phố', '21 20 39N, 103 54 52E', '14');
INSERT INTO `tbl_district` VALUES ('118', 'Quỳnh Nhai', 'Huyện', '21 46 34N, 103 39 02E', '14');
INSERT INTO `tbl_district` VALUES ('119', 'Thuận Châu', 'Huyện', '21 24 54N, 103 39 46E', '14');
INSERT INTO `tbl_district` VALUES ('120', 'Mường La', 'Huyện', '21 31 38N, 104 02 48E', '14');
INSERT INTO `tbl_district` VALUES ('121', 'Bắc Yên', 'Huyện', '21 13 23N, 104 22 09E', '14');
INSERT INTO `tbl_district` VALUES ('122', 'Phù Yên', 'Huyện', '21 13 33N, 104 41 51E', '14');
INSERT INTO `tbl_district` VALUES ('123', 'Mộc Châu', 'Huyện', '20 49 21N, 104 43 10E', '14');
INSERT INTO `tbl_district` VALUES ('124', 'Yên Châu', 'Huyện', '20 59 33N, 104 19 51E', '14');
INSERT INTO `tbl_district` VALUES ('125', 'Mai Sơn', 'Huyện', '21 10 08N, 103 59 36E', '14');
INSERT INTO `tbl_district` VALUES ('126', 'Sông Mã', 'Huyện', '21 06 04N, 103 43 56E', '14');
INSERT INTO `tbl_district` VALUES ('127', 'Sốp Cộp', 'Huyện', '20 52 46N, 103 30 38E', '14');
INSERT INTO `tbl_district` VALUES ('132', 'Yên Bái', 'Thành Phố', '21 44 28N, 104 53 42E', '15');
INSERT INTO `tbl_district` VALUES ('133', 'Nghĩa Lộ', 'Thị Xã', '21 35 58N, 104 29 22E', '15');
INSERT INTO `tbl_district` VALUES ('135', 'Lục Yên', 'Huyện', '22 06 44N, 104 43 12E', '15');
INSERT INTO `tbl_district` VALUES ('136', 'Văn Yên', 'Huyện', '21 55 55N, 104 33 51E', '15');
INSERT INTO `tbl_district` VALUES ('137', 'Mù Cang Chải', 'Huyện', '21 48 22N, 104 09 01E', '15');
INSERT INTO `tbl_district` VALUES ('138', 'Trấn Yên', 'Huyện', '21 42 20N, 104 48 56E', '15');
INSERT INTO `tbl_district` VALUES ('139', 'Trạm Tấu', 'Huyện', '21 30 40N, 104 28 03E', '15');
INSERT INTO `tbl_district` VALUES ('140', 'Văn Chấn', 'Huyện', '21 34 15N, 104 35 19E', '15');
INSERT INTO `tbl_district` VALUES ('141', 'Yên Bình', 'Huyện', '21 52 24N, 104 55 16E', '15');
INSERT INTO `tbl_district` VALUES ('148', 'Hòa Bình', 'Thành Phố', '20 50 36N, 105 19 20E', '17');
INSERT INTO `tbl_district` VALUES ('150', 'Đà Bắc', 'Huyện', '20 55 58N, 105 04 52E', '17');
INSERT INTO `tbl_district` VALUES ('151', 'Kỳ Sơn', 'Huyện', '20 54 06N, 105 23 18E', '17');
INSERT INTO `tbl_district` VALUES ('152', 'Lương Sơn', 'Huyện', '20 53 16N, 105 30 55E', '17');
INSERT INTO `tbl_district` VALUES ('153', 'Kim Bôi', 'Huyện', '20 40 34N, 105 32 15E', '17');
INSERT INTO `tbl_district` VALUES ('154', 'Cao Phong', 'Huyện', '20 41 23N, 105 17 48E', '17');
INSERT INTO `tbl_district` VALUES ('155', 'Tân Lạc', 'Huyện', '20 36 44N, 105 15 03E', '17');
INSERT INTO `tbl_district` VALUES ('156', 'Mai Châu', 'Huyện', '20 40 56N, 104 59 46E', '17');
INSERT INTO `tbl_district` VALUES ('157', 'Lạc Sơn', 'Huyện', '20 29 59N, 105 24 57E', '17');
INSERT INTO `tbl_district` VALUES ('158', 'Yên Thủy', 'Huyện', '20 25 42N, 105 37 59E', '17');
INSERT INTO `tbl_district` VALUES ('159', 'Lạc Thủy', 'Huyện', '20 29 12N, 105 44 06E', '17');
INSERT INTO `tbl_district` VALUES ('164', 'Thái Nguyên', 'Thành Phố', '21 33 20N, 105 48 26E', '19');
INSERT INTO `tbl_district` VALUES ('165', 'Sông Công', 'Thị Xã', '21 29 14N, 105 48 47E', '19');
INSERT INTO `tbl_district` VALUES ('167', 'Định Hóa', 'Huyện', '21 53 50N, 105 38 01E', '19');
INSERT INTO `tbl_district` VALUES ('168', 'Phú Lương', 'Huyện', '21 45 57N, 105 43 22E', '19');
INSERT INTO `tbl_district` VALUES ('169', 'Đồng Hỷ', 'Huyện', '21 41 10N, 105 55 43E', '19');
INSERT INTO `tbl_district` VALUES ('170', 'Võ Nhai', 'Huyện', '21 47 14N, 106 02 29E', '19');
INSERT INTO `tbl_district` VALUES ('171', 'Đại Từ', 'Huyện', '21 36 17N, 105 37 28E', '19');
INSERT INTO `tbl_district` VALUES ('172', 'Phổ Yên', 'Huyện', '21 27 08N, 105 45 19E', '19');
INSERT INTO `tbl_district` VALUES ('173', 'Phú Bình', 'Huyện', '21 29 36N, 105 57 42E', '19');
INSERT INTO `tbl_district` VALUES ('178', 'Lạng Sơn', 'Thành Phố', '21 51 19N, 106 44 50E', '20');
INSERT INTO `tbl_district` VALUES ('180', 'Tràng Định', 'Huyện', '22 18 09N, 106 26 32E', '20');
INSERT INTO `tbl_district` VALUES ('181', 'Bình Gia', 'Huyện', '22 03 56N, 106 19 01E', '20');
INSERT INTO `tbl_district` VALUES ('182', 'Văn Lãng', 'Huyện', '22 01 59N, 106 34 17E', '20');
INSERT INTO `tbl_district` VALUES ('183', 'Cao Lộc', 'Huyện', '21 53 05N, 106 50 34E', '20');
INSERT INTO `tbl_district` VALUES ('184', 'Văn Quan', 'Huyện', '21 51 04N, 106 33 04E', '20');
INSERT INTO `tbl_district` VALUES ('185', 'Bắc Sơn', 'Huyện', '21 48 57N, 106 15 28E', '20');
INSERT INTO `tbl_district` VALUES ('186', 'Hữu Lũng', 'Huyện', '21 34 33N, 106 20 33E', '20');
INSERT INTO `tbl_district` VALUES ('187', 'Chi Lăng', 'Huyện', '21 40 05N, 106 37 24E', '20');
INSERT INTO `tbl_district` VALUES ('188', 'Lộc Bình', 'Huyện', '21 40 41N, 106 58 12E', '20');
INSERT INTO `tbl_district` VALUES ('189', 'Đình Lập', 'Huyện', '21 32 07N, 107 07 25E', '20');
INSERT INTO `tbl_district` VALUES ('193', 'Hạ Long', 'Thành Phố', '20 52 24N, 107 05 23E', '22');
INSERT INTO `tbl_district` VALUES ('194', 'Móng Cái', 'Thành Phố', '21 26 31N, 107 55 09E', '22');
INSERT INTO `tbl_district` VALUES ('195', 'Cẩm Phả', 'Thị Xã', '21 03 42N, 107 17 22E', '22');
INSERT INTO `tbl_district` VALUES ('196', 'Uông Bí', 'Thị Xã', '21 04 33N, 106 45 07E', '22');
INSERT INTO `tbl_district` VALUES ('198', 'Bình Liêu', 'Huyện', '21 33 07N, 107 26 24E', '22');
INSERT INTO `tbl_district` VALUES ('199', 'Tiên Yên', 'Huyện', '21 22 24N, 107 22 50E', '22');
INSERT INTO `tbl_district` VALUES ('200', 'Đầm Hà', 'Huyện', '21 21 23N, 107 34 32E', '22');
INSERT INTO `tbl_district` VALUES ('201', 'Hải Hà', 'Huyện', '21 25 50N, 107 41 26E', '22');
INSERT INTO `tbl_district` VALUES ('202', 'Ba Chẽ', 'Huyện', '21 15 40N, 107 09 52E', '22');
INSERT INTO `tbl_district` VALUES ('203', 'Vân Đồn', 'Huyện', '20 56 17N, 107 28 02E', '22');
INSERT INTO `tbl_district` VALUES ('204', 'Hoành Bồ', 'Huyện', '21 06 30N, 107 02 43E', '22');
INSERT INTO `tbl_district` VALUES ('205', 'Đông Triều', 'Huyện', '21 07 10N, 106 34 36E', '22');
INSERT INTO `tbl_district` VALUES ('206', 'Yên Hưng', 'Huyện', '20 55 40N, 106 51 05E', '22');
INSERT INTO `tbl_district` VALUES ('207', 'Cô Tô', 'Huyện', '21 05 01N, 107 49 10E', '22');
INSERT INTO `tbl_district` VALUES ('213', 'Bắc Giang', 'Thành Phố', '21 17 36N, 106 11 18E', '24');
INSERT INTO `tbl_district` VALUES ('215', 'Yên Thế', 'Huyện', '21 31 29N, 106 09 27E', '24');
INSERT INTO `tbl_district` VALUES ('216', 'Tân Yên', 'Huyện', '21 23 23N, 106 05 55E', '24');
INSERT INTO `tbl_district` VALUES ('217', 'Lạng Giang', 'Huyện', '21 21 58N, 106 15 21E', '24');
INSERT INTO `tbl_district` VALUES ('218', 'Lục Nam', 'Huyện', '21 18 16N, 106 29 24E', '24');
INSERT INTO `tbl_district` VALUES ('219', 'Lục Ngạn', 'Huyện', '21 26 15N, 106 39 09E', '24');
INSERT INTO `tbl_district` VALUES ('220', 'Sơn Động', 'Huyện', '21 19 42N, 106 51 09E', '24');
INSERT INTO `tbl_district` VALUES ('221', 'Yên Dũng', 'Huyện', '21 12 22N, 106 14 12E', '24');
INSERT INTO `tbl_district` VALUES ('222', 'Việt Yên', 'Huyện', '21 16 16N, 106 04 59E', '24');
INSERT INTO `tbl_district` VALUES ('223', 'Hiệp Hòa', 'Huyện', '21 15 51N, 105 57 30E', '24');
INSERT INTO `tbl_district` VALUES ('227', 'Việt Trì', 'Thành Phố', '21 19 01N, 105 23 35E', '25');
INSERT INTO `tbl_district` VALUES ('228', 'Phú Thọ', 'Thị Xã', '21 24 54N, 105 13 46E', '25');
INSERT INTO `tbl_district` VALUES ('230', 'Đoan Hùng', 'Huyện', '21 36 56N, 105 08 42E', '25');
INSERT INTO `tbl_district` VALUES ('231', 'Hạ Hoà', 'Huyện', '21 35 13N, 105 00 22E', '25');
INSERT INTO `tbl_district` VALUES ('232', 'Thanh Ba', 'Huyện', '21 27 04N, 105 09 10E', '25');
INSERT INTO `tbl_district` VALUES ('233', 'Phù Ninh', 'Huyện', '21 26 59N, 105 18 13E', '25');
INSERT INTO `tbl_district` VALUES ('234', 'Yên Lập', 'Huyện', '21 22 21N, 105 01 25E', '25');
INSERT INTO `tbl_district` VALUES ('235', 'Cẩm Khê', 'Huyện', '21 23 04N, 105 05 25E', '25');
INSERT INTO `tbl_district` VALUES ('236', 'Tam Nông', 'Huyện', '21 18 24N, 105 14 59E', '25');
INSERT INTO `tbl_district` VALUES ('237', 'Lâm Thao', 'Huyện', '21 19 37N, 105 18 09E', '25');
INSERT INTO `tbl_district` VALUES ('238', 'Thanh Sơn', 'Huyện', '21 08 32N, 105 04 40E', '25');
INSERT INTO `tbl_district` VALUES ('239', 'Thanh Thuỷ', 'Huyện', '21 07 26N, 105 17 18E', '25');
INSERT INTO `tbl_district` VALUES ('240', 'Tân Sơn', 'Huyện', '', '25');
INSERT INTO `tbl_district` VALUES ('243', 'Vĩnh Yên', 'Thành Phố', '21 18 26N, 105 35 33E', '26');
INSERT INTO `tbl_district` VALUES ('244', 'Phúc Yên', 'Thị Xã', '21 18 55N, 105 43 54E', '26');
INSERT INTO `tbl_district` VALUES ('246', 'Lập Thạch', 'Huyện', '21 24 45N, 105 25 39E', '26');
INSERT INTO `tbl_district` VALUES ('247', 'Tam Dương', 'Huyện', '21 21 40N, 105 33 36E', '26');
INSERT INTO `tbl_district` VALUES ('248', 'Tam Đảo', 'Huyện', '21 27 34N, 105 35 09E', '26');
INSERT INTO `tbl_district` VALUES ('249', 'Bình Xuyên', 'Huyện', '21 19 48N, 105 39 43E', '26');
INSERT INTO `tbl_district` VALUES ('250', 'Mê Linh', 'Huyện', '21 10 53N, 105 42 05E', '01');
INSERT INTO `tbl_district` VALUES ('251', 'Yên Lạc', 'Huyện', '21 13 17N, 105 34 44E', '26');
INSERT INTO `tbl_district` VALUES ('252', 'Vĩnh Tường', 'Huyện', '21 14 58N, 105 29 37E', '26');
INSERT INTO `tbl_district` VALUES ('253', 'Sông Lô', 'Huyện', '', '26');
INSERT INTO `tbl_district` VALUES ('256', 'Bắc Ninh', 'Thành Phố', '21 10 48N, 106 03 58E', '27');
INSERT INTO `tbl_district` VALUES ('258', 'Yên Phong', 'Huyện', '21 12 40N, 105 59 36E', '27');
INSERT INTO `tbl_district` VALUES ('259', 'Quế Võ', 'Huyện', '21 08 44N, 106 11 06E', '27');
INSERT INTO `tbl_district` VALUES ('260', 'Tiên Du', 'Huyện', '21 07 37N, 106 02 19E', '27');
INSERT INTO `tbl_district` VALUES ('261', 'Từ Sơn', 'Thị Xã', '21 07 12N, 105 57 26E', '27');
INSERT INTO `tbl_district` VALUES ('262', 'Thuận Thành', 'Huyện', '21 02 24N, 106 04 10E', '27');
INSERT INTO `tbl_district` VALUES ('263', 'Gia Bình', 'Huyện', '21 03 55N, 106 12 53E', '27');
INSERT INTO `tbl_district` VALUES ('264', 'Lương Tài', 'Huyện', '21 01 33N, 106 13 28E', '27');
INSERT INTO `tbl_district` VALUES ('268', 'Hà Đông', 'Quận', '20 57 25N, 105 45 21E', '01');
INSERT INTO `tbl_district` VALUES ('269', 'Sơn Tây', 'Thị Xã', '21 05 51N, 105 28 27E', '01');
INSERT INTO `tbl_district` VALUES ('271', 'Ba Vì', 'Huyện', '21 09 40N, 105 22 43E', '01');
INSERT INTO `tbl_district` VALUES ('272', 'Phúc Thọ', 'Huyện', '21 06 32N, 105 34 52E', '01');
INSERT INTO `tbl_district` VALUES ('273', 'Đan Phượng', 'Huyện', '21 07 13N, 105 40 49E', '01');
INSERT INTO `tbl_district` VALUES ('274', 'Hoài Đức', 'Huyện', '21 01 25N, 105 42 03E', '01');
INSERT INTO `tbl_district` VALUES ('275', 'Quốc Oai', 'Huyện', '20 58 45N, 105 36 43E', '01');
INSERT INTO `tbl_district` VALUES ('276', 'Thạch Thất', 'Huyện', '21 02 17N, 105 33 05E', '01');
INSERT INTO `tbl_district` VALUES ('277', 'Chương Mỹ', 'Huyện', '20 52 46N, 105 39 01E', '01');
INSERT INTO `tbl_district` VALUES ('278', 'Thanh Oai', 'Huyện', '20 51 44N, 105 46 18E', '01');
INSERT INTO `tbl_district` VALUES ('279', 'Thường Tín', 'Huyện', '20 49 59N, 105 22 19E', '01');
INSERT INTO `tbl_district` VALUES ('280', 'Phú Xuyên', 'Huyện', '20 43 37N, 105 53 43E', '01');
INSERT INTO `tbl_district` VALUES ('281', 'Ứng Hòa', 'Huyện', '20 42 41N, 105 47 58E', '01');
INSERT INTO `tbl_district` VALUES ('282', 'Mỹ Đức', 'Huyện', '20 41 53N, 105 43 31E', '01');
INSERT INTO `tbl_district` VALUES ('288', 'Hải Dương', 'Thành Phố', '20 56 14N, 106 18 21E', '30');
INSERT INTO `tbl_district` VALUES ('290', 'Chí Linh', 'Huyện', '21 07 47N, 106 23 46E', '30');
INSERT INTO `tbl_district` VALUES ('291', 'Nam Sách', 'Huyện', '21 00 15N, 106 20 26E', '30');
INSERT INTO `tbl_district` VALUES ('292', 'Kinh Môn', 'Huyện', '21 00 04N, 106 30 23E', '30');
INSERT INTO `tbl_district` VALUES ('293', 'Kim Thành', 'Huyện', '20 55 40N, 106 30 33E', '30');
INSERT INTO `tbl_district` VALUES ('294', 'Thanh Hà', 'Huyện', '20 53 19N, 106 25 43E', '30');
INSERT INTO `tbl_district` VALUES ('295', 'Cẩm Giàng', 'Huyện', '20 57 05N, 106 12 29E', '30');
INSERT INTO `tbl_district` VALUES ('296', 'Bình Giang', 'Huyện', '20 52 36N, 106 11 24E', '30');
INSERT INTO `tbl_district` VALUES ('297', 'Gia Lộc', 'Huyện', '20 51 01N, 106 17 34E', '30');
INSERT INTO `tbl_district` VALUES ('298', 'Tứ Kỳ', 'Huyện', '20 49 05N, 106 24 05E', '30');
INSERT INTO `tbl_district` VALUES ('299', 'Ninh Giang', 'Huyện', '20 45 13N, 106 20 09E', '30');
INSERT INTO `tbl_district` VALUES ('300', 'Thanh Miện', 'Huyện', '20 46 02N, 106 12 26E', '30');
INSERT INTO `tbl_district` VALUES ('303', 'Hồng Bàng', 'Quận', '20 52 37N, 106 38 32E', '31');
INSERT INTO `tbl_district` VALUES ('304', 'Ngô Quyền', 'Quận', '20 51 13N, 106 41 57E', '31');
INSERT INTO `tbl_district` VALUES ('305', 'Lê Chân', 'Quận', '20 50 12N, 106 40 30E', '31');
INSERT INTO `tbl_district` VALUES ('306', 'Hải An', 'Quận', '20 49 38N, 106 45 57E', '31');
INSERT INTO `tbl_district` VALUES ('307', 'Kiến An', 'Quận', '20 48 26N, 106 38 03E', '31');
INSERT INTO `tbl_district` VALUES ('308', 'Đồ Sơn', 'Quận', '20 42 41N, 106 44 54E', '31');
INSERT INTO `tbl_district` VALUES ('309', 'Kinh Dương', 'Quận', '', '31');
INSERT INTO `tbl_district` VALUES ('311', 'Thuỷ Nguyên', 'Huyện', '20 56 36N, 106 39 38E', '31');
INSERT INTO `tbl_district` VALUES ('312', 'An Dương', 'Huyện', '20 53 06N, 106 35 36E', '31');
INSERT INTO `tbl_district` VALUES ('313', 'An Lão', 'Huyện', '20 47 54N, 106 33 19E', '31');
INSERT INTO `tbl_district` VALUES ('314', 'Kiến Thụy', 'Huyện', '20 45 13N, 106 41 47E', '31');
INSERT INTO `tbl_district` VALUES ('315', 'Tiên Lãng', 'Huyện', '20 42 23N, 106 36 03E', '31');
INSERT INTO `tbl_district` VALUES ('316', 'Vĩnh Bảo', 'Huyện', '20 40 56N, 106 29 57E', '31');
INSERT INTO `tbl_district` VALUES ('317', 'Cát Hải', 'Huyện', '20 47 09N, 106 58 07E', '31');
INSERT INTO `tbl_district` VALUES ('318', 'Bạch Long Vĩ', 'Huyện', '20 08 41N, 107 42 51E', '31');
INSERT INTO `tbl_district` VALUES ('323', 'Hưng Yên', 'Thành Phố', '20 39 38N, 106 03 08E', '33');
INSERT INTO `tbl_district` VALUES ('325', 'Văn Lâm', 'Huyện', '20 58 31N, 106 02 51E', '33');
INSERT INTO `tbl_district` VALUES ('326', 'Văn Giang', 'Huyện', '20 55 51N, 105 57 14E', '33');
INSERT INTO `tbl_district` VALUES ('327', 'Yên Mỹ', 'Huyện', '20 53 45N, 106 01 21E', '33');
INSERT INTO `tbl_district` VALUES ('328', 'Mỹ Hào', 'Huyện', '20 55 35N, 106 05 34E', '33');
INSERT INTO `tbl_district` VALUES ('329', 'Ân Thi', 'Huyện', '20 48 49N, 106 05 30E', '33');
INSERT INTO `tbl_district` VALUES ('330', 'Khoái Châu', 'Huyện', '20 49 53N, 105 58 28E', '33');
INSERT INTO `tbl_district` VALUES ('331', 'Kim Động', 'Huyện', '20 44 47N, 106 01 47E', '33');
INSERT INTO `tbl_district` VALUES ('332', 'Tiên Lữ', 'Huyện', '20 40 05N, 106 07 59E', '33');
INSERT INTO `tbl_district` VALUES ('333', 'Phù Cừ', 'Huyện', '20 42 51N, 106 11 30E', '33');
INSERT INTO `tbl_district` VALUES ('336', 'Thái Bình', 'Thành Phố', '20 26 45N, 106 19 56E', '34');
INSERT INTO `tbl_district` VALUES ('338', 'Quỳnh Phụ', 'Huyện', '20 38 57N, 106 21 16E', '34');
INSERT INTO `tbl_district` VALUES ('339', 'Hưng Hà', 'Huyện', '20 35 38N, 106 12 42E', '34');
INSERT INTO `tbl_district` VALUES ('340', 'Đông Hưng', 'Huyện', '20 32 50N, 106 20 15E', '34');
INSERT INTO `tbl_district` VALUES ('341', 'Thái Thụy', 'Huyện', '20 32 33N, 106 32 32E', '34');
INSERT INTO `tbl_district` VALUES ('342', 'Tiền Hải', 'Huyện', '20 21 05N, 106 32 45E', '34');
INSERT INTO `tbl_district` VALUES ('343', 'Kiến Xương', 'Huyện', '20 23 52N, 106 25 22E', '34');
INSERT INTO `tbl_district` VALUES ('344', 'Vũ Thư', 'Huyện', '20 25 29N, 106 16 43E', '34');
INSERT INTO `tbl_district` VALUES ('347', 'Phủ Lý', 'Thành Phố', '20 32 19N, 105 54 55E', '35');
INSERT INTO `tbl_district` VALUES ('349', 'Duy Tiên', 'Huyện', '20 37 33N, 105 58 01E', '35');
INSERT INTO `tbl_district` VALUES ('350', 'Kim Bảng', 'Huyện', '20 34 19N, 105 50 41E', '35');
INSERT INTO `tbl_district` VALUES ('351', 'Thanh Liêm', 'Huyện', '20 27 31N, 105 55 09E', '35');
INSERT INTO `tbl_district` VALUES ('352', 'Bình Lục', 'Huyện', '20 29 23N, 106 02 52E', '35');
INSERT INTO `tbl_district` VALUES ('353', 'Lý Nhân', 'Huyện', '20 32 55N, 106 04 48E', '35');
INSERT INTO `tbl_district` VALUES ('356', 'Nam Định', 'Thành Phố', '20 25 07N, 106 09 54E', '36');
INSERT INTO `tbl_district` VALUES ('358', 'Mỹ Lộc', 'Huyện', '20 27 21N, 106 07 56E', '36');
INSERT INTO `tbl_district` VALUES ('359', 'Vụ Bản', 'Huyện', '20 22 57N, 106 05 35E', '36');
INSERT INTO `tbl_district` VALUES ('360', 'Ý Yên', 'Huyện', '20 19 48N, 106 01 55E', '36');
INSERT INTO `tbl_district` VALUES ('361', 'Nghĩa Hưng', 'Huyện', '20 05 37N, 106 08 59E', '36');
INSERT INTO `tbl_district` VALUES ('362', 'Nam Trực', 'Huyện', '20 20 08N, 106 12 54E', '36');
INSERT INTO `tbl_district` VALUES ('363', 'Trực Ninh', 'Huyện', '20 14 42N, 106 12 45E', '36');
INSERT INTO `tbl_district` VALUES ('364', 'Xuân Trường', 'Huyện', '20 17 53N, 106 21 43E', '36');
INSERT INTO `tbl_district` VALUES ('365', 'Giao Thủy', 'Huyện', '20 14 45N, 106 28 39E', '36');
INSERT INTO `tbl_district` VALUES ('366', 'Hải Hậu', 'Huyện', '20 06 26N, 106 16 29E', '36');
INSERT INTO `tbl_district` VALUES ('369', 'Ninh Bình', 'Thành Phố', '20 14 45N, 105 58 24E', '37');
INSERT INTO `tbl_district` VALUES ('370', 'Tam Điệp', 'Thị Xã', '20 09 42N, 103 52 43E', '37');
INSERT INTO `tbl_district` VALUES ('372', 'Nho Quan', 'Huyện', '20 18 46N, 105 42 48E', '37');
INSERT INTO `tbl_district` VALUES ('373', 'Gia Viễn', 'Huyện', '20 19 50N, 105 52 20E', '37');
INSERT INTO `tbl_district` VALUES ('374', 'Hoa Lư', 'Huyện', '20 15 04N, 105 55 52E', '37');
INSERT INTO `tbl_district` VALUES ('375', 'Yên Khánh', 'Huyện', '20 11 26N, 106 04 33E', '37');
INSERT INTO `tbl_district` VALUES ('376', 'Kim Sơn', 'Huyện', '20 02 07N, 106 05 27E', '37');
INSERT INTO `tbl_district` VALUES ('377', 'Yên Mô', 'Huyện', '20 07 45N, 105 59 45E', '37');
INSERT INTO `tbl_district` VALUES ('380', 'Thanh Hóa', 'Thành Phố', '19 48 26N, 105 47 37E', '38');
INSERT INTO `tbl_district` VALUES ('381', 'Bỉm Sơn', 'Thị Xã', '20 05 21N, 105 51 48E', '38');
INSERT INTO `tbl_district` VALUES ('382', 'Sầm Sơn', 'Thị Xã', '19 45 11N, 105 54 03E', '38');
INSERT INTO `tbl_district` VALUES ('384', 'Mường Lát', 'Huyện', '20 30 42N, 104 37 27E', '38');
INSERT INTO `tbl_district` VALUES ('385', 'Quan Hóa', 'Huyện', '20 29 15N, 104 56 35E', '38');
INSERT INTO `tbl_district` VALUES ('386', 'Bá Thước', 'Huyện', '20 22 48N, 105 14 50E', '38');
INSERT INTO `tbl_district` VALUES ('387', 'Quan Sơn', 'Huyện', '20 15 17N, 104 51 58E', '38');
INSERT INTO `tbl_district` VALUES ('388', 'Lang Chánh', 'Huyện', '20 08 58N, 105 07 40E', '38');
INSERT INTO `tbl_district` VALUES ('389', 'Ngọc Lặc', 'Huyện', '20 04 08N, 105 22 39E', '38');
INSERT INTO `tbl_district` VALUES ('390', 'Cẩm Thủy', 'Huyện', '20 12 20N, 105 27 22E', '38');
INSERT INTO `tbl_district` VALUES ('391', 'Thạch Thành', 'Huyện', '21 12 41N, 105 36 38E', '38');
INSERT INTO `tbl_district` VALUES ('392', 'Hà Trung', 'Huyện', '20 03 20N, 105 51 20E', '38');
INSERT INTO `tbl_district` VALUES ('393', 'Vĩnh Lộc', 'Huyện', '20 02 29N, 105 39 28E', '38');
INSERT INTO `tbl_district` VALUES ('394', 'Yên Định', 'Huyện', '20 00 31N, 105 37 44E', '38');
INSERT INTO `tbl_district` VALUES ('395', 'Thọ Xuân', 'Huyện', '19 55 39N, 105 29 14E', '38');
INSERT INTO `tbl_district` VALUES ('396', 'Thường Xuân', 'Huyện', '19 54 55N, 105 10 46E', '38');
INSERT INTO `tbl_district` VALUES ('397', 'Triệu Sơn', 'Huyện', '19 48 11N, 105 34 03E', '38');
INSERT INTO `tbl_district` VALUES ('398', 'Thiệu Hoá', 'Huyện', '19 53 56N, 105 40 57E', '38');
INSERT INTO `tbl_district` VALUES ('399', 'Hoằng Hóa', 'Huyện', '19 51 59N, 105 51 34E', '38');
INSERT INTO `tbl_district` VALUES ('400', 'Hậu Lộc', 'Huyện', '19 56 02N, 105 53 19E', '38');
INSERT INTO `tbl_district` VALUES ('401', 'Nga Sơn', 'Huyện', '20 00 16N, 105 59 26E', '38');
INSERT INTO `tbl_district` VALUES ('402', 'Như Xuân', 'Huyện', '19 5 55N, 105 20 22E', '38');
INSERT INTO `tbl_district` VALUES ('403', 'Như Thanh', 'Huyện', '19 35 19N, 105 33 09E', '38');
INSERT INTO `tbl_district` VALUES ('404', 'Nông Cống', 'Huyện', '19 36 58N, 105 40 54E', '38');
INSERT INTO `tbl_district` VALUES ('405', 'Đông Sơn', 'Huyện', '19 47 44N, 105 42 19E', '38');
INSERT INTO `tbl_district` VALUES ('406', 'Quảng Xương', 'Huyện', '19 40 53N, 105 48 01E', '38');
INSERT INTO `tbl_district` VALUES ('407', 'Tĩnh Gia', 'Huyện', '19 27 13N, 105 43 38E', '38');
INSERT INTO `tbl_district` VALUES ('412', 'Vinh', 'Thành Phố', '18 41 06N, 105 42 05E', '40');
INSERT INTO `tbl_district` VALUES ('413', 'Cửa Lò', 'Thị Xã', '18 47 26N, 105 43 31E', '40');
INSERT INTO `tbl_district` VALUES ('414', 'Thái Hoà', 'Thị Xã', '', '40');
INSERT INTO `tbl_district` VALUES ('415', 'Quế Phong', 'Huyện', '19 42 25N, 104 54 21E', '40');
INSERT INTO `tbl_district` VALUES ('416', 'Quỳ Châu', 'Huyện', '19 32 16N, 105 03 18E', '40');
INSERT INTO `tbl_district` VALUES ('417', 'Kỳ Sơn', 'Huyện', '19 24 36N, 104 09 45E', '40');
INSERT INTO `tbl_district` VALUES ('418', 'Tương Dương', 'Huyện', '19 19 15N, 104 35 41E', '40');
INSERT INTO `tbl_district` VALUES ('419', 'Nghĩa Đàn', 'Huyện', '19 21 19N, 105 26 33E', '40');
INSERT INTO `tbl_district` VALUES ('420', 'Quỳ Hợp', 'Huyện', '19 19 24N, 105 09 12E', '40');
INSERT INTO `tbl_district` VALUES ('421', 'Quỳnh Lưu', 'Huyện', '19 14 01N, 105 37 00E', '40');
INSERT INTO `tbl_district` VALUES ('422', 'Con Cuông', 'Huyện', '19 03 50N, 107 47 15E', '40');
INSERT INTO `tbl_district` VALUES ('423', 'Tân Kỳ', 'Huyện', '19 06 11N, 105 14 14E', '40');
INSERT INTO `tbl_district` VALUES ('424', 'Anh Sơn', 'Huyện', '18 58 04N, 105 04 30E', '40');
INSERT INTO `tbl_district` VALUES ('425', 'Diễn Châu', 'Huyện', '19 01 20N, 105 34 13E', '40');
INSERT INTO `tbl_district` VALUES ('426', 'Yên Thành', 'Huyện', '19 01 25N, 105 26 17E', '40');
INSERT INTO `tbl_district` VALUES ('427', 'Đô Lương', 'Huyện', '18 55 00N, 105 21 03E', '40');
INSERT INTO `tbl_district` VALUES ('428', 'Thanh Chương', 'Huyện', '18 44 11N, 105 12 59E', '40');
INSERT INTO `tbl_district` VALUES ('429', 'Nghi Lộc', 'Huyện', '18 47 41N, 105 31 30E', '40');
INSERT INTO `tbl_district` VALUES ('430', 'Nam Đàn', 'Huyện', '18 40 28N, 105 30 32E', '40');
INSERT INTO `tbl_district` VALUES ('431', 'Hưng Nguyên', 'Huyện', '18 41 13N, 105 37 41E', '40');
INSERT INTO `tbl_district` VALUES ('436', 'Hà Tĩnh', 'Thành Phố', '18 21 20N, 105 54 00E', '42');
INSERT INTO `tbl_district` VALUES ('437', 'Hồng Lĩnh', 'Thị Xã', '18 32 05N, 105 42 40E', '42');
INSERT INTO `tbl_district` VALUES ('439', 'Hương Sơn', 'Huyện', '18 26 47N, 105 19 36E', '42');
INSERT INTO `tbl_district` VALUES ('440', 'Đức Thọ', 'Huyện', '18 29 23N, 105 36 39E', '42');
INSERT INTO `tbl_district` VALUES ('441', 'Vũ Quang', 'Huyện', '18 19 30N, 105 26 38E', '42');
INSERT INTO `tbl_district` VALUES ('442', 'Nghi Xuân', 'Huyện', '18 38 46N, 105 46 17E', '42');
INSERT INTO `tbl_district` VALUES ('443', 'Can Lộc', 'Huyện', '18 26 39N, 105 46 13E', '42');
INSERT INTO `tbl_district` VALUES ('444', 'Hương Khê', 'Huyện', '18 11 36N, 105 41 24E', '42');
INSERT INTO `tbl_district` VALUES ('445', 'Thạch Hà', 'Huyện', '18 19 29N, 105 52 43E', '42');
INSERT INTO `tbl_district` VALUES ('446', 'Cẩm Xuyên', 'Huyện', '18 11 32N, 106 00 04E', '42');
INSERT INTO `tbl_district` VALUES ('447', 'Kỳ Anh', 'Huyện', '18 05 15N, 106 15 49E', '42');
INSERT INTO `tbl_district` VALUES ('448', 'Lộc Hà', 'Huyện', '', '42');
INSERT INTO `tbl_district` VALUES ('450', 'Đồng Hới', 'Thành Phố', '17 26 53N, 106 35 15E', '44');
INSERT INTO `tbl_district` VALUES ('452', 'Minh Hóa', 'Huyện', '17 44 03N, 105 51 45E', '44');
INSERT INTO `tbl_district` VALUES ('453', 'Tuyên Hóa', 'Huyện', '17 54 04N, 105 58 17E', '44');
INSERT INTO `tbl_district` VALUES ('454', 'Quảng Trạch', 'Huyện', '17 50 04N, 106 22 24E', '44');
INSERT INTO `tbl_district` VALUES ('455', 'Bố Trạch', 'Huyện', '17 29 13N, 106 06 54E', '44');
INSERT INTO `tbl_district` VALUES ('456', 'Quảng Ninh', 'Huyện', '17 15 15N, 106 32 31E', '44');
INSERT INTO `tbl_district` VALUES ('457', 'Lệ Thủy', 'Huyện', '17 07 35N, 106 41 47E', '44');
INSERT INTO `tbl_district` VALUES ('461', 'Đông Hà', 'Thành Phố', '16 48 12N, 107 05 12E', '45');
INSERT INTO `tbl_district` VALUES ('462', 'Quảng Trị', 'Thị Xã', '16 44 37N, 107 11 20E', '45');
INSERT INTO `tbl_district` VALUES ('464', 'Vĩnh Linh', 'Huyện', '17 01 35N, 106 53 49E', '45');
INSERT INTO `tbl_district` VALUES ('465', 'Hướng Hóa', 'Huyện', '16 42 19N, 106 40 14E', '45');
INSERT INTO `tbl_district` VALUES ('466', 'Gio Linh', 'Huyện', '16 54 49N, 106 56 16E', '45');
INSERT INTO `tbl_district` VALUES ('467', 'Đa Krông', 'Huyện', '16 33 58N, 106 55 49E', '45');
INSERT INTO `tbl_district` VALUES ('468', 'Cam Lộ', 'Huyện', '16 47 09N, 106 57 52E', '45');
INSERT INTO `tbl_district` VALUES ('469', 'Triệu Phong', 'Huyện', '16 46 32N, 107 09 12E', '45');
INSERT INTO `tbl_district` VALUES ('470', 'Hải Lăng', 'Huyện', '16 41 07N, 107 13 34E', '45');
INSERT INTO `tbl_district` VALUES ('471', 'Cồn Cỏ', 'Huyện', '19 09 39N, 107 19 58E', '45');
INSERT INTO `tbl_district` VALUES ('474', 'Huế', 'Thành Phố', '16 27 16N, 107 34 29E', '46');
INSERT INTO `tbl_district` VALUES ('476', 'Phong Điền', 'Huyện', '16 32 42N, 106 16 37E', '46');
INSERT INTO `tbl_district` VALUES ('477', 'Quảng Điền', 'Huyện', '16 35 21N, 107 29 31E', '46');
INSERT INTO `tbl_district` VALUES ('478', 'Phú Vang', 'Huyện', '16 27 20N, 107 42 28E', '46');
INSERT INTO `tbl_district` VALUES ('479', 'Hương Thủy', 'Huyện', '16 19 27N, 107 37 26E', '46');
INSERT INTO `tbl_district` VALUES ('480', 'Hương Trà', 'Huyện', '16 25 49N, 107 28 37E', '46');
INSERT INTO `tbl_district` VALUES ('481', 'A Lưới', 'Huyện', '16 13 59N, 107 16 12E', '46');
INSERT INTO `tbl_district` VALUES ('482', 'Phú Lộc', 'Huyện', '16 17 16N, 107 55 25E', '46');
INSERT INTO `tbl_district` VALUES ('483', 'Nam Đông', 'Huyện', '16 07 11N, 107 41 25E', '46');
INSERT INTO `tbl_district` VALUES ('490', 'Liên Chiểu', 'Quận', '16 07 26N, 108 07 04E', '48');
INSERT INTO `tbl_district` VALUES ('491', 'Thanh Khê', 'Quận', '16 03 28N, 108 11 00E', '48');
INSERT INTO `tbl_district` VALUES ('492', 'Hải Châu', 'Quận', '16 03 38N, 108 11 46E', '48');
INSERT INTO `tbl_district` VALUES ('493', 'Sơn Trà', 'Quận', '16 06 13N, 108 16 26E', '48');
INSERT INTO `tbl_district` VALUES ('494', 'Ngũ Hành Sơn', 'Quận', '16 00 30N, 108 15 09E', '48');
INSERT INTO `tbl_district` VALUES ('495', 'Cẩm Lệ', 'Quận', '', '48');
INSERT INTO `tbl_district` VALUES ('497', 'Hoà Vang', 'Huyện', '16 03 59N, 108 01 57E', '48');
INSERT INTO `tbl_district` VALUES ('498', 'Hoàng Sa', 'Huyện', '16 21 36N, 111 57 01E', '48');
INSERT INTO `tbl_district` VALUES ('502', 'Tam Kỳ', 'Thành Phố', '15 34 37N, 108 29 52E', '49');
INSERT INTO `tbl_district` VALUES ('503', 'Hội An', 'Thành Phố', '15 53 20N, 108 20 42E', '49');
INSERT INTO `tbl_district` VALUES ('504', 'Tây Giang', 'Huyện', '15 53 46N, 107 25 52E', '49');
INSERT INTO `tbl_district` VALUES ('505', 'Đông Giang', 'Huyện', '15 54 44N, 107 47 06E', '49');
INSERT INTO `tbl_district` VALUES ('506', 'Đại Lộc', 'Huyện', '15 50 10N, 107 58 27E', '49');
INSERT INTO `tbl_district` VALUES ('507', 'Điện Bàn', 'Huyện', '15 54 15N, 108 13 38E', '49');
INSERT INTO `tbl_district` VALUES ('508', 'Duy Xuyên', 'Huyện', '15 47 58N, 108 13 27E', '49');
INSERT INTO `tbl_district` VALUES ('509', 'Quế Sơn', 'Huyện', '15 41 03N, 108 05 34E', '49');
INSERT INTO `tbl_district` VALUES ('510', 'Nam Giang', 'Huyện', '15 36 37N, 107 33 52E', '49');
INSERT INTO `tbl_district` VALUES ('511', 'Phước Sơn', 'Huyện', '15 23 17N, 107 50 22E', '49');
INSERT INTO `tbl_district` VALUES ('512', 'Hiệp Đức', 'Huyện', '15 31 09N, 108 05 56E', '49');
INSERT INTO `tbl_district` VALUES ('513', 'Thăng Bình', 'Huyện', '15 42 29N, 108 22 04E', '49');
INSERT INTO `tbl_district` VALUES ('514', 'Tiên Phước', 'Huyện', '15 29 30N, 108 15 28E', '49');
INSERT INTO `tbl_district` VALUES ('515', 'Bắc Trà My', 'Huyện', '15 08 00N, 108 05 32E', '49');
INSERT INTO `tbl_district` VALUES ('516', 'Nam Trà My', 'Huyện', '15 16 40N, 108 12 15E', '49');
INSERT INTO `tbl_district` VALUES ('517', 'Núi Thành', 'Huyện', '15 26 53N, 108 34 49E', '49');
INSERT INTO `tbl_district` VALUES ('518', 'Phú Ninh', 'Huyện', '15 30 43N, 108 24 43E', '49');
INSERT INTO `tbl_district` VALUES ('519', 'Nông Sơn', 'Huyện', '', '49');
INSERT INTO `tbl_district` VALUES ('522', 'Quảng Ngãi', 'Thành Phố', '15 07 17N, 108 48 24E', '51');
INSERT INTO `tbl_district` VALUES ('524', 'Bình Sơn', 'Huyện', '15 18 45N, 108 45 35E', '51');
INSERT INTO `tbl_district` VALUES ('525', 'Trà Bồng', 'Huyện', '15 13 30N, 108 29 57E', '51');
INSERT INTO `tbl_district` VALUES ('526', 'Tây Trà', 'Huyện', '15 11 13N, 108 22 23E', '51');
INSERT INTO `tbl_district` VALUES ('527', 'Sơn Tịnh', 'Huyện', '15 11 49N, 108 45 03E', '51');
INSERT INTO `tbl_district` VALUES ('528', 'Tư Nghĩa', 'Huyện', '15 05 25N, 108 45 23E', '51');
INSERT INTO `tbl_district` VALUES ('529', 'Sơn Hà', 'Huyện', '14 58 35N, 108 29 09E', '51');
INSERT INTO `tbl_district` VALUES ('530', 'Sơn Tây', 'Huyện', '14 58 11N, 108 21 22E', '51');
INSERT INTO `tbl_district` VALUES ('531', 'Minh Long', 'Huyện', '14 56 49N, 108 40 19E', '51');
INSERT INTO `tbl_district` VALUES ('532', 'Nghĩa Hành', 'Huyện', '14 58 06N, 108 46 05E', '51');
INSERT INTO `tbl_district` VALUES ('533', 'Mộ Đức', 'Huyện', '11 59 13N, 108 52 21E', '51');
INSERT INTO `tbl_district` VALUES ('534', 'Đức Phổ', 'Huyện', '14 44 59N, 108 56 58E', '51');
INSERT INTO `tbl_district` VALUES ('535', 'Ba Tơ', 'Huyện', '14 42 52N, 108 43 44E', '51');
INSERT INTO `tbl_district` VALUES ('536', 'Lý Sơn', 'Huyện', '15 22 50N, 109 06 56E', '51');
INSERT INTO `tbl_district` VALUES ('540', 'Qui Nhơn', 'Thành Phố', '13 47 15N, 109 12 48E', '52');
INSERT INTO `tbl_district` VALUES ('542', 'An Lão', 'Huyện', '14 32 10N, 108 47 52E', '52');
INSERT INTO `tbl_district` VALUES ('543', 'Hoài Nhơn', 'Huyện', '14 30 56N, 109 01 56E', '52');
INSERT INTO `tbl_district` VALUES ('544', 'Hoài Ân', 'Huyện', '14 20 51N, 108 54 04E', '52');
INSERT INTO `tbl_district` VALUES ('545', 'Phù Mỹ', 'Huyện', '14 14 41N, 109 05 43E', '52');
INSERT INTO `tbl_district` VALUES ('546', 'Vĩnh Thạnh', 'Huyện', '14 14 26N, 108 44 08E', '52');
INSERT INTO `tbl_district` VALUES ('547', 'Tây Sơn', 'Huyện', '13 56 47N, 108 53 06E', '52');
INSERT INTO `tbl_district` VALUES ('548', 'Phù Cát', 'Huyện', '14 03 48N, 109 03 57E', '52');
INSERT INTO `tbl_district` VALUES ('549', 'An Nhơn', 'Huyện', '13 51 28N, 109 04 02E', '52');
INSERT INTO `tbl_district` VALUES ('550', 'Tuy Phước', 'Huyện', '13 46 30N, 109 05 38E', '52');
INSERT INTO `tbl_district` VALUES ('551', 'Vân Canh', 'Huyện', '13 40 35N, 108 57 52E', '52');
INSERT INTO `tbl_district` VALUES ('555', 'Tuy Hòa', 'Thành Phố', '13 05 42N, 109 15 50E', '54');
INSERT INTO `tbl_district` VALUES ('557', 'Sông Cầu', 'Thị Xã', '13 31 40N, 109 12 39E', '54');
INSERT INTO `tbl_district` VALUES ('558', 'Đồng Xuân', 'Huyện', '13 24 59N, 108 56 46E', '54');
INSERT INTO `tbl_district` VALUES ('559', 'Tuy An', 'Huyện', '13 15 19N, 109 12 21E', '54');
INSERT INTO `tbl_district` VALUES ('560', 'Sơn Hòa', 'Huyện', '13 12 16N, 108 57 17E', '54');
INSERT INTO `tbl_district` VALUES ('561', 'Sông Hinh', 'Huyện', '12 54 19N, 108 53 38E', '54');
INSERT INTO `tbl_district` VALUES ('562', 'Tây Hoà', 'Huyện', '', '54');
INSERT INTO `tbl_district` VALUES ('563', 'Phú Hoà', 'Huyện', '13 04 07N, 109 11 24E', '54');
INSERT INTO `tbl_district` VALUES ('564', 'Đông Hoà', 'Huyện', '', '54');
INSERT INTO `tbl_district` VALUES ('568', 'Nha Trang', 'Thành Phố', '12 15 40N, 109 10 40E', '56');
INSERT INTO `tbl_district` VALUES ('569', 'Cam Ranh', 'Thị Xã', '11 59 05N, 108 08 17E', '56');
INSERT INTO `tbl_district` VALUES ('570', 'Cam Lâm', 'Huyện', '', '56');
INSERT INTO `tbl_district` VALUES ('571', 'Vạn Ninh', 'Huyện', '12 43 10N, 109 11 18E', '56');
INSERT INTO `tbl_district` VALUES ('572', 'Ninh Hòa', 'Huyện', '12 32 54N, 109 06 11E', '56');
INSERT INTO `tbl_district` VALUES ('573', 'Khánh Vĩnh', 'Huyện', '12 17 50N, 108 51 56E', '56');
INSERT INTO `tbl_district` VALUES ('574', 'Diên Khánh', 'Huyện', '12 13 19N, 109 02 16E', '56');
INSERT INTO `tbl_district` VALUES ('575', 'Khánh Sơn', 'Huyện', '12 02 17N, 108 53 47E', '56');
INSERT INTO `tbl_district` VALUES ('576', 'Trường Sa', 'Huyện', '9 07 27N, 114 15 00E', '56');
INSERT INTO `tbl_district` VALUES ('582', 'Phan Rang-Tháp Chàm', 'Thành Phố', '11 36 11N, 108 58 34E', '58');
INSERT INTO `tbl_district` VALUES ('584', 'Bác Ái', 'Huyện', '11 54 45N, 108 51 29E', '58');
INSERT INTO `tbl_district` VALUES ('585', 'Ninh Sơn', 'Huyện', '11 42 36N, 108 44 55E', '58');
INSERT INTO `tbl_district` VALUES ('586', 'Ninh Hải', 'Huyện', '11 42 46N, 109 05 41E', '58');
INSERT INTO `tbl_district` VALUES ('587', 'Ninh Phước', 'Huyện', '11 28 56N, 108 50 34E', '58');
INSERT INTO `tbl_district` VALUES ('588', 'Thuận Bắc', 'Huyện', '', '58');
INSERT INTO `tbl_district` VALUES ('589', 'Thuận Nam', 'Huyện', '', '58');
INSERT INTO `tbl_district` VALUES ('593', 'Phan Thiết', 'Thành Phố', '10 54 16N, 108 03 44E', '60');
INSERT INTO `tbl_district` VALUES ('594', 'La Gi', 'Thị Xã', '', '60');
INSERT INTO `tbl_district` VALUES ('595', 'Tuy Phong', 'Huyện', '11 20 26N, 108 41 15E', '60');
INSERT INTO `tbl_district` VALUES ('596', 'Bắc Bình', 'Huyện', '11 15 52N, 108 21 33E', '60');
INSERT INTO `tbl_district` VALUES ('597', 'Hàm Thuận Bắc', 'Huyện', '11 09 18N, 108 03 07E', '60');
INSERT INTO `tbl_district` VALUES ('598', 'Hàm Thuận Nam', 'Huyện', '10 56 20N, 107 54 38E', '60');
INSERT INTO `tbl_district` VALUES ('599', 'Tánh Linh', 'Huyện', '11 08 26N, 107 41 22E', '60');
INSERT INTO `tbl_district` VALUES ('600', 'Đức Linh', 'Huyện', '11 11 43N, 107 31 34E', '60');
INSERT INTO `tbl_district` VALUES ('601', 'Hàm Tân', 'Huyện', '10 44 41N, 107 41 33E', '60');
INSERT INTO `tbl_district` VALUES ('602', 'Phú Quí', 'Huyện', '10 33 13N, 108 57 46E', '60');
INSERT INTO `tbl_district` VALUES ('608', 'Kon Tum', 'Thành Phố', '14 20 32N, 107 58 04E', '62');
INSERT INTO `tbl_district` VALUES ('610', 'Đắk Glei', 'Huyện', '15 08 13N, 107 44 03E', '62');
INSERT INTO `tbl_district` VALUES ('611', 'Ngọc Hồi', 'Huyện', '14 44 23N, 107 38 49E', '62');
INSERT INTO `tbl_district` VALUES ('612', 'Đắk Tô', 'Huyện', '14 46 49N, 107 55 36E', '62');
INSERT INTO `tbl_district` VALUES ('613', 'Kon Plông', 'Huyện', '14 48 13N, 108 20 05E', '62');
INSERT INTO `tbl_district` VALUES ('614', 'Kon Rẫy', 'Huyện', '14 32 56N, 108 13 09E', '62');
INSERT INTO `tbl_district` VALUES ('615', 'Đắk Hà', 'Huyện', '14 36 50N, 107 59 55E', '62');
INSERT INTO `tbl_district` VALUES ('616', 'Sa Thầy', 'Huyện', '14 16 02N, 107 36 30E', '62');
INSERT INTO `tbl_district` VALUES ('617', 'Tu Mơ Rông', 'Huyện', '', '62');
INSERT INTO `tbl_district` VALUES ('622', 'Pleiku', 'Thành Phố', '13 57 42N, 107 58 03E', '64');
INSERT INTO `tbl_district` VALUES ('623', 'An Khê', 'Thị Xã', '14 01 24N, 108 41 29E', '64');
INSERT INTO `tbl_district` VALUES ('624', 'Ayun Pa', 'Thị Xã', '', '64');
INSERT INTO `tbl_district` VALUES ('625', 'Kbang', 'Huyện', '14 18 08N, 108 29 17E', '64');
INSERT INTO `tbl_district` VALUES ('626', 'Đăk Đoa', 'Huyện', '14 07 02N, 108 09 36E', '64');
INSERT INTO `tbl_district` VALUES ('627', 'Chư Păh', 'Huyện', '14 13 30N, 107 56 33E', '64');
INSERT INTO `tbl_district` VALUES ('628', 'Ia Grai', 'Huyện', '13 59 25N, 107 43 16E', '64');
INSERT INTO `tbl_district` VALUES ('629', 'Mang Yang', 'Huyện', '13 57 26N, 108 18 37E', '64');
INSERT INTO `tbl_district` VALUES ('630', 'Kông Chro', 'Huyện', '13 45 47N, 108 36 04E', '64');
INSERT INTO `tbl_district` VALUES ('631', 'Đức Cơ', 'Huyện', '13 46 16N, 107 38 26E', '64');
INSERT INTO `tbl_district` VALUES ('632', 'Chư Prông', 'Huyện', '13 35 39N, 107 47 36E', '64');
INSERT INTO `tbl_district` VALUES ('633', 'Chư Sê', 'Huyện', '13 37 04N, 108 06 56E', '64');
INSERT INTO `tbl_district` VALUES ('634', 'Đăk Pơ', 'Huyện', '13 55 47N, 108 36 16E', '64');
INSERT INTO `tbl_district` VALUES ('635', 'Ia Pa', 'Huyện', '13 31 37N, 108 30 34E', '64');
INSERT INTO `tbl_district` VALUES ('637', 'Krông Pa', 'Huyện', '13 14 13N, 108 39 12E', '64');
INSERT INTO `tbl_district` VALUES ('638', 'Phú Thiện', 'Huyện', '', '64');
INSERT INTO `tbl_district` VALUES ('639', 'Chư Pưh', 'Huyện', '', '64');
INSERT INTO `tbl_district` VALUES ('643', 'Buôn Ma Thuột', 'Thành Phố', '12 39 43N, 108 10 40E', '66');
INSERT INTO `tbl_district` VALUES ('644', 'Buôn Hồ', 'Thị Xã', '', '66');
INSERT INTO `tbl_district` VALUES ('645', 'Ea H\'leo', 'Huyện', '13 13 52N, 108 12 30E', '66');
INSERT INTO `tbl_district` VALUES ('646', 'Ea Súp', 'Huyện', '13 10 59N, 107 46 49E', '66');
INSERT INTO `tbl_district` VALUES ('647', 'Buôn Đôn', 'Huyện', '12 52 45N, 107 45 20E', '66');
INSERT INTO `tbl_district` VALUES ('648', 'Cư M\'gar', 'Huyện', '12 53 47N, 108 04 16E', '66');
INSERT INTO `tbl_district` VALUES ('649', 'Krông Búk', 'Huyện', '12 56 27N, 108 13 54E', '66');
INSERT INTO `tbl_district` VALUES ('650', 'Krông Năng', 'Huyện', '12 59 41N, 108 23 42E', '66');
INSERT INTO `tbl_district` VALUES ('651', 'Ea Kar', 'Huyện', '12 48 17N, 108 32 42E', '66');
INSERT INTO `tbl_district` VALUES ('652', 'M\'đrắk', 'Huyện', '12 42 14N, 108 47 09E', '66');
INSERT INTO `tbl_district` VALUES ('653', 'Krông Bông', 'Huyện', '12 27 08N, 108 27 01E', '66');
INSERT INTO `tbl_district` VALUES ('654', 'Krông Pắc', 'Huyện', '12 41 20N, 108 18 42E', '66');
INSERT INTO `tbl_district` VALUES ('655', 'Krông A Na', 'Huyện', '12 31 51N, 108 05 03E', '66');
INSERT INTO `tbl_district` VALUES ('656', 'Lắk', 'Huyện', '12 19 20N, 108 12 17E', '66');
INSERT INTO `tbl_district` VALUES ('657', 'Cư Kuin', 'Huyện', '', '66');
INSERT INTO `tbl_district` VALUES ('660', 'Gia Nghĩa', 'Thị Xã', '', '67');
INSERT INTO `tbl_district` VALUES ('661', 'Đắk Glong', 'Huyện', '12 01 53N, 107 50 37E', '67');
INSERT INTO `tbl_district` VALUES ('662', 'Cư Jút', 'Huyện', '12 40 56N, 107 44 44E', '67');
INSERT INTO `tbl_district` VALUES ('663', 'Đắk Mil', 'Huyện', '12 31 08N, 107 42 24E', '67');
INSERT INTO `tbl_district` VALUES ('664', 'Krông Nô', 'Huyện', '12 22 16N, 107 53 49E', '67');
INSERT INTO `tbl_district` VALUES ('665', 'Đắk Song', 'Huyện', '12 14 04N, 107 36 30E', '67');
INSERT INTO `tbl_district` VALUES ('666', 'Đắk R\'lấp', 'Huyện', '12 02 30N, 107 25 59E', '67');
INSERT INTO `tbl_district` VALUES ('667', 'Tuy Đức', 'Huyện', '', '67');
INSERT INTO `tbl_district` VALUES ('672', 'Đà Lạt', 'Thành Phố', '11 54 33N, 108 27 08E', '68');
INSERT INTO `tbl_district` VALUES ('673', 'Bảo Lộc', 'Thị Xã', '11 32 48N, 107 47 37E', '68');
INSERT INTO `tbl_district` VALUES ('674', 'Đam Rông', 'Huyện', '12 02 35N, 108 10 26E', '68');
INSERT INTO `tbl_district` VALUES ('675', 'Lạc Dương', 'Huyện', '12 08 30N, 108 27 48E', '68');
INSERT INTO `tbl_district` VALUES ('676', 'Lâm Hà', 'Huyện', '11 55 26N, 108 11 31E', '68');
INSERT INTO `tbl_district` VALUES ('677', 'Đơn Dương', 'Huyện', '11 48 26N, 108 32 48E', '68');
INSERT INTO `tbl_district` VALUES ('678', 'Đức Trọng', 'Huyện', '11 41 50N, 108 18 58E', '68');
INSERT INTO `tbl_district` VALUES ('679', 'Di Linh', 'Huyện', '11 31 10N, 108 05 23E', '68');
INSERT INTO `tbl_district` VALUES ('680', 'Bảo Lâm', 'Huyện', '11 38 31N, 107 43 25E', '68');
INSERT INTO `tbl_district` VALUES ('681', 'Đạ Huoai', 'Huyện', '11 27 11N, 107 38 08E', '68');
INSERT INTO `tbl_district` VALUES ('682', 'Đạ Tẻh', 'Huyện', '11 33 46N, 107 32 00E', '68');
INSERT INTO `tbl_district` VALUES ('683', 'Cát Tiên', 'Huyện', '11 39 38N, 107 23 27E', '68');
INSERT INTO `tbl_district` VALUES ('688', 'Phước Long', 'Thị Xã', '', '70');
INSERT INTO `tbl_district` VALUES ('689', 'Đồng Xoài', 'Thị Xã', '11 31 01N, 106 50 21E', '70');
INSERT INTO `tbl_district` VALUES ('690', 'Bình Long', 'Thị Xã', '', '70');
INSERT INTO `tbl_district` VALUES ('691', 'Bù Gia Mập', 'Huyện', '11 56 57N, 106 59 21E', '70');
INSERT INTO `tbl_district` VALUES ('692', 'Lộc Ninh', 'Huyện', '11 49 28N, 106 35 11E', '70');
INSERT INTO `tbl_district` VALUES ('693', 'Bù Đốp', 'Huyện', '11 59 08N, 106 49 54E', '70');
INSERT INTO `tbl_district` VALUES ('694', 'Hớn Quản', 'Huyện', '11 37 37N, 106 36 02E', '70');
INSERT INTO `tbl_district` VALUES ('695', 'Đồng Phù', 'Huyện', '11 28 45N, 106 57 07E', '70');
INSERT INTO `tbl_district` VALUES ('696', 'Bù Đăng', 'Huyện', '11 46 09N, 107 14 14E', '70');
INSERT INTO `tbl_district` VALUES ('697', 'Chơn Thành', 'Huyện', '11 28 45N, 106 39 26E', '70');
INSERT INTO `tbl_district` VALUES ('703', 'Tây Ninh', 'Thị Xã', '11 21 59N, 106 07 47E', '72');
INSERT INTO `tbl_district` VALUES ('705', 'Tân Biên', 'Huyện', '11 35 14N, 105 57 53E', '72');
INSERT INTO `tbl_district` VALUES ('706', 'Tân Châu', 'Huyện', '11 34 49N, 106 17 48E', '72');
INSERT INTO `tbl_district` VALUES ('707', 'Dương Minh Châu', 'Huyện', '11 22 04N, 106 16 58E', '72');
INSERT INTO `tbl_district` VALUES ('708', 'Châu Thành', 'Huyện', '11 19 02N, 106 00 15E', '72');
INSERT INTO `tbl_district` VALUES ('709', 'Hòa Thành', 'Huyện', '11 15 31N, 106 08 44E', '72');
INSERT INTO `tbl_district` VALUES ('710', 'Gò Dầu', 'Huyện', '11 09 39N, 106 14 42E', '72');
INSERT INTO `tbl_district` VALUES ('711', 'Bến Cầu', 'Huyện', '11 07 50N, 106 08 25E', '72');
INSERT INTO `tbl_district` VALUES ('712', 'Trảng Bàng', 'Huyện', '11 06 18N, 106 23 12E', '72');
INSERT INTO `tbl_district` VALUES ('718', 'Thủ Dầu Một', 'Thị Xã', '11 00 01N, 106 38 56E', '74');
INSERT INTO `tbl_district` VALUES ('720', 'Dầu Tiếng', 'Huyện', '11 19 07N, 106 26 59E', '74');
INSERT INTO `tbl_district` VALUES ('721', 'Bến Cát', 'Huyện', '11 12 42N, 106 36 28E', '74');
INSERT INTO `tbl_district` VALUES ('722', 'Phú Giáo', 'Huyện', '11 20 21N, 106 47 48E', '74');
INSERT INTO `tbl_district` VALUES ('723', 'Tân Uyên', 'Huyện', '11 06 31N, 106 49 02E', '74');
INSERT INTO `tbl_district` VALUES ('724', 'Dĩ An', 'Huyện', '10 55 03N, 106 47 09E', '74');
INSERT INTO `tbl_district` VALUES ('725', 'Thuận An', 'Huyện', '10 55 58N, 106 41 59E', '74');
INSERT INTO `tbl_district` VALUES ('731', 'Biên Hòa', 'Thành Phố', '10 56 31N, 106 50 50E', '75');
INSERT INTO `tbl_district` VALUES ('732', 'Long Khánh', 'Thị Xã', '10 56 24N, 107 14 29E', '75');
INSERT INTO `tbl_district` VALUES ('734', 'Tân Phú', 'Huyện', '11 22 51N, 107 21 35E', '75');
INSERT INTO `tbl_district` VALUES ('735', 'Vĩnh Cửu', 'Huyện', '11 14 31N, 107 00 06E', '75');
INSERT INTO `tbl_district` VALUES ('736', 'Định Quán', 'Huyện', '11 12 41N, 107 17 03E', '75');
INSERT INTO `tbl_district` VALUES ('737', 'Trảng Bom', 'Huyện', '10 58 39N, 107 00 52E', '75');
INSERT INTO `tbl_district` VALUES ('738', 'Thống Nhất', 'Huyện', '10 58 29N, 107 09 26E', '75');
INSERT INTO `tbl_district` VALUES ('739', 'Cẩm Mỹ', 'Huyện', '10 47 05N, 107 14 36E', '75');
INSERT INTO `tbl_district` VALUES ('740', 'Long Thành', 'Huyện', '10 47 38N, 106 59 42E', '75');
INSERT INTO `tbl_district` VALUES ('741', 'Xuân Lộc', 'Huyện', '10 55 39N, 107 24 21E', '75');
INSERT INTO `tbl_district` VALUES ('742', 'Nhơn Trạch', 'Huyện', '10 39 18N, 106 53 18E', '75');
INSERT INTO `tbl_district` VALUES ('747', 'Vũng Tầu', 'Thành Phố', '10 24 08N, 107 07 05E', '77');
INSERT INTO `tbl_district` VALUES ('748', 'Bà Rịa', 'Thị Xã', '10 30 33N, 107 10 47E', '77');
INSERT INTO `tbl_district` VALUES ('750', 'Châu Đức', 'Huyện', '10 39 23N, 107 15 08E', '77');
INSERT INTO `tbl_district` VALUES ('751', 'Xuyên Mộc', 'Huyện', '10 37 46N, 107 29 39E', '77');
INSERT INTO `tbl_district` VALUES ('752', 'Long Điền', 'Huyện', '10 26 47N, 107 12 53E', '77');
INSERT INTO `tbl_district` VALUES ('753', 'Đất Đỏ', 'Huyện', '10 28 40N, 107 18 27E', '77');
INSERT INTO `tbl_district` VALUES ('754', 'Tân Thành', 'Huyện', '10 34 50N, 107 05 06E', '77');
INSERT INTO `tbl_district` VALUES ('755', 'Côn Đảo', 'Huyện', '8 42 25N, 106 36 05E', '77');
INSERT INTO `tbl_district` VALUES ('762', 'Thủ Đức', 'Quận', '10 51 20N, 106 45 05E', '79');
INSERT INTO `tbl_district` VALUES ('764', 'Gò Vấp', 'Quận', '10 50 12N, 106 39 52E', '79');
INSERT INTO `tbl_district` VALUES ('765', 'Bình Thạnh', 'Quận', '10 48 46N, 106 42 57E', '79');
INSERT INTO `tbl_district` VALUES ('766', 'Tân Bình', 'Quận', '10 48 13N, 106 39 03E', '79');
INSERT INTO `tbl_district` VALUES ('767', 'Tân Phú', 'Quận', '10 47 32N, 106 37 31E', '79');
INSERT INTO `tbl_district` VALUES ('768', 'Phú Nhuận', 'Quận', '10 48 06N, 106 40 39E', '79');
INSERT INTO `tbl_district` VALUES ('777', 'Bình Tân', 'Quận', '10 46 16N, 106 35 26E', '79');
INSERT INTO `tbl_district` VALUES ('783', 'Củ Chi', 'Huyện', '11 02 17N, 106 30 20E', '79');
INSERT INTO `tbl_district` VALUES ('784', 'Hóc Môn', 'Huyện', '10 52 42N, 106 35 33E', '79');
INSERT INTO `tbl_district` VALUES ('785', 'Bình Chánh', 'Huyện', '10 45 01N, 106 30 45E', '79');
INSERT INTO `tbl_district` VALUES ('786', 'Nhà Bè', 'Huyện', '10 39 06N, 106 43 35E', '79');
INSERT INTO `tbl_district` VALUES ('787', 'Cần Giờ', 'Huyện', '10 30 43N, 106 52 50E', '79');
INSERT INTO `tbl_district` VALUES ('794', 'Tân An', 'Thành Phố', '10 31 36N, 106 24 06E', '80');
INSERT INTO `tbl_district` VALUES ('796', 'Tân Hưng', 'Huyện', '10 49 05N, 105 39 26E', '80');
INSERT INTO `tbl_district` VALUES ('797', 'Vĩnh Hưng', 'Huyện', '10 52 54N, 105 45 58E', '80');
INSERT INTO `tbl_district` VALUES ('798', 'Mộc Hóa', 'Huyện', '10 47 09N, 105 57 56E', '80');
INSERT INTO `tbl_district` VALUES ('799', 'Tân Thạnh', 'Huyện', '10 37 44N, 105 57 07E', '80');
INSERT INTO `tbl_district` VALUES ('800', 'Thạnh Hóa', 'Huyện', '10 41 37N, 106 11 08E', '80');
INSERT INTO `tbl_district` VALUES ('801', 'Đức Huệ', 'Huyện', '10 51 57N, 106 15 48E', '80');
INSERT INTO `tbl_district` VALUES ('802', 'Đức Hòa', 'Huyện', '10 53 04N, 106 23 58E', '80');
INSERT INTO `tbl_district` VALUES ('803', 'Bến Lức', 'Huyện', '10 41 40N, 106 26 28E', '80');
INSERT INTO `tbl_district` VALUES ('804', 'Thủ Thừa', 'Huyện', '10 39 41N, 106 20 12E', '80');
INSERT INTO `tbl_district` VALUES ('805', 'Tân Trụ', 'Huyện', '10 31 47N, 106 30 06E', '80');
INSERT INTO `tbl_district` VALUES ('806', 'Cần Đước', 'Huyện', '10 32 21N, 106 36 33E', '80');
INSERT INTO `tbl_district` VALUES ('807', 'Cần Giuộc', 'Huyện', '10 34 43N, 106 38 35E', '80');
INSERT INTO `tbl_district` VALUES ('808', 'Châu Thành', 'Huyện', '10 27 52N, 106 30 00E', '80');
INSERT INTO `tbl_district` VALUES ('815', 'Mỹ Tho', 'Thành Phố', '10 22 14N, 106 21 52E', '82');
INSERT INTO `tbl_district` VALUES ('816', 'Gò Công', 'Thị Xã', '10 21 55N, 106 40 24E', '82');
INSERT INTO `tbl_district` VALUES ('818', 'Tân Phước', 'Huyện', '10 30 36N, 106 13 02E', '82');
INSERT INTO `tbl_district` VALUES ('819', 'Cái Bè', 'Huyện', '10 24 21N, 105 56 01E', '82');
INSERT INTO `tbl_district` VALUES ('820', 'Cai Lậy', 'Huyện', '10 24 20N, 106 06 05E', '82');
INSERT INTO `tbl_district` VALUES ('821', 'Châu Thành', 'Huyện', '20 25 21N, 106 16 57E', '82');
INSERT INTO `tbl_district` VALUES ('822', 'Chợ Gạo', 'Huyện', '10 23 45N, 106 26 53E', '82');
INSERT INTO `tbl_district` VALUES ('823', 'Gò Công Tây', 'Huyện', '10 19 55N, 106 35 02E', '82');
INSERT INTO `tbl_district` VALUES ('824', 'Gò Công Đông', 'Huyện', '10 20 42N, 106 42 54E', '82');
INSERT INTO `tbl_district` VALUES ('825', 'Tân Phú Đông', 'Huyện', '', '82');
INSERT INTO `tbl_district` VALUES ('829', 'Bến Tre', 'Thành Phố', '10 14 17N, 106 22 26E', '83');
INSERT INTO `tbl_district` VALUES ('831', 'Châu Thành', 'Huyện', '10 17 24N, 106 17 45E', '83');
INSERT INTO `tbl_district` VALUES ('832', 'Chợ Lách', 'Huyện', '10 13 26N, 106 09 08E', '83');
INSERT INTO `tbl_district` VALUES ('833', 'Mỏ Cày Nam', 'Huyện', '10 06 56N, 106 19 40E', '83');
INSERT INTO `tbl_district` VALUES ('834', 'Giồng Trôm', 'Huyện', '10 08 46N, 106 28 12E', '83');
INSERT INTO `tbl_district` VALUES ('835', 'Bình Đại', 'Huyện', '10 09 56N, 106 37 46E', '83');
INSERT INTO `tbl_district` VALUES ('836', 'Ba Tri', 'Huyện', '10 04 08N, 106 35 10E', '83');
INSERT INTO `tbl_district` VALUES ('837', 'Thạnh Phú', 'Huyện', '9 55 53N, 106 32 45E', '83');
INSERT INTO `tbl_district` VALUES ('838', 'Mỏ Cày Bắc', 'Huyện', '', '83');
INSERT INTO `tbl_district` VALUES ('842', 'Trà Vinh', 'Thị Xã', '9 57 09N, 106 20 39E', '84');
INSERT INTO `tbl_district` VALUES ('844', 'Càng Long', 'Huyện', '9 58 18N, 106 12 52E', '84');
INSERT INTO `tbl_district` VALUES ('845', 'Cầu Kè', 'Huyện', '9 51 23N, 106 03 33E', '84');
INSERT INTO `tbl_district` VALUES ('846', 'Tiểu Cần', 'Huyện', '9 48 37N, 106 12 06E', '84');
INSERT INTO `tbl_district` VALUES ('847', 'Châu Thành', 'Huyện', '9 52 57N, 106 24 12E', '84');
INSERT INTO `tbl_district` VALUES ('848', 'Cầu Ngang', 'Huyện', '9 47 14N, 106 29 19E', '84');
INSERT INTO `tbl_district` VALUES ('849', 'Trà Cú', 'Huyện', '9 42 06N, 106 16 24E', '84');
INSERT INTO `tbl_district` VALUES ('850', 'Duyên Hải', 'Huyện', '9 39 58N, 106 26 23E', '84');
INSERT INTO `tbl_district` VALUES ('855', 'Vĩnh Long', 'Thành Phố', '10 15 09N, 105 56 08E', '86');
INSERT INTO `tbl_district` VALUES ('857', 'Long Hồ', 'Huyện', '10 13 58N, 105 55 47E', '86');
INSERT INTO `tbl_district` VALUES ('858', 'Mang Thít', 'Huyện', '10 10 58N, 106 05 13E', '86');
INSERT INTO `tbl_district` VALUES ('859', 'Vũng Liêm', 'Huyện', '10 03 32N, 106 10 35E', '86');
INSERT INTO `tbl_district` VALUES ('860', 'Tam Bình', 'Huyện', '10 03 58N, 105 58 03E', '86');
INSERT INTO `tbl_district` VALUES ('861', 'Bình Minh', 'Huyện', '10 05 45N, 105 47 21E', '86');
INSERT INTO `tbl_district` VALUES ('862', 'Trà Ôn', 'Huyện', '9 59 20N, 105 57 56E', '86');
INSERT INTO `tbl_district` VALUES ('863', 'Bình Tân', 'Huyện', '', '86');
INSERT INTO `tbl_district` VALUES ('866', 'Cao Lãnh', 'Thành Phố', '10 27 38N, 105 37 21E', '87');
INSERT INTO `tbl_district` VALUES ('867', 'Sa Đéc', 'Thị Xã', '10 19 22N, 105 44 31E', '87');
INSERT INTO `tbl_district` VALUES ('868', 'Hồng Ngự', 'Thị Xã', '', '87');
INSERT INTO `tbl_district` VALUES ('869', 'Tân Hồng', 'Huyện', '10 52 48N, 105 29 21E', '87');
INSERT INTO `tbl_district` VALUES ('870', 'Hồng Ngự', 'Huyện', '10 48 13N, 105 19 00E', '87');
INSERT INTO `tbl_district` VALUES ('871', 'Tam Nông', 'Huyện', '10 44 06N, 105 30 58E', '87');
INSERT INTO `tbl_district` VALUES ('872', 'Tháp Mười', 'Huyện', '10 33 36N, 105 47 13E', '87');
INSERT INTO `tbl_district` VALUES ('873', 'Cao Lãnh', 'Huyện', '10 29 03N, 105 41 40E', '87');
INSERT INTO `tbl_district` VALUES ('874', 'Thanh Bình', 'Huyện', '10 36 38N, 105 28 51E', '87');
INSERT INTO `tbl_district` VALUES ('875', 'Lấp Vò', 'Huyện', '10 21 27N, 105 36 06E', '87');
INSERT INTO `tbl_district` VALUES ('876', 'Lai Vung', 'Huyện', '10 14 43N, 105 38 40E', '87');
INSERT INTO `tbl_district` VALUES ('877', 'Châu Thành', 'Huyện', '10 13 27N, 105 48 38E', '87');
INSERT INTO `tbl_district` VALUES ('883', 'Long Xuyên', 'Thành Phố', '10 22 22N, 105 25 33E', '89');
INSERT INTO `tbl_district` VALUES ('884', 'Châu Đốc', 'Thị Xã', '10 41 20N, 105 05 15E', '89');
INSERT INTO `tbl_district` VALUES ('886', 'An Phú', 'Huyện', '10 50 12N, 105 05 33E', '89');
INSERT INTO `tbl_district` VALUES ('887', 'Tân Châu', 'Thị Xã', '10 49 11N, 105 11 18E', '89');
INSERT INTO `tbl_district` VALUES ('888', 'Phú Tân', 'Huyện', '10 40 26N, 105 14 40E', '89');
INSERT INTO `tbl_district` VALUES ('889', 'Châu Phú', 'Huyện', '10 34 12N, 105 12 13E', '89');
INSERT INTO `tbl_district` VALUES ('890', 'Tịnh Biên', 'Huyện', '10 33 30N, 105 00 17E', '89');
INSERT INTO `tbl_district` VALUES ('891', 'Tri Tôn', 'Huyện', '10 24 41N, 104 56 58E', '89');
INSERT INTO `tbl_district` VALUES ('892', 'Châu Thành', 'Huyện', '10 25 39N, 105 15 31E', '89');
INSERT INTO `tbl_district` VALUES ('893', 'Chợ Mới', 'Huyện', '10 27 23N, 105 26 57E', '89');
INSERT INTO `tbl_district` VALUES ('894', 'Thoại Sơn', 'Huyện', '10 16 45N, 105 15 59E', '89');
INSERT INTO `tbl_district` VALUES ('899', 'Rạch Giá', 'Thành Phố', '10 01 35N, 105 06 20E', '91');
INSERT INTO `tbl_district` VALUES ('900', 'Hà Tiên', 'Thị Xã', '10 22 54N, 104 30 10E', '91');
INSERT INTO `tbl_district` VALUES ('902', 'Kiên Lương', 'Huyện', '10 20 21N, 104 39 46E', '91');
INSERT INTO `tbl_district` VALUES ('903', 'Hòn Đất', 'Huyện', '10 14 20N, 104 55 57E', '91');
INSERT INTO `tbl_district` VALUES ('904', 'Tân Hiệp', 'Huyện', '10 05 18N, 105 14 04E', '91');
INSERT INTO `tbl_district` VALUES ('905', 'Châu Thành', 'Huyện', '9 57 37N, 105 10 16E', '91');
INSERT INTO `tbl_district` VALUES ('906', 'Giồng Giềng', 'Huyện', '9 56 05N, 105 22 06E', '91');
INSERT INTO `tbl_district` VALUES ('907', 'Gò Quao', 'Huyện', '9 43 17N, 105 17 06E', '91');
INSERT INTO `tbl_district` VALUES ('908', 'An Biên', 'Huyện', '9 48 37N, 105 03 18E', '91');
INSERT INTO `tbl_district` VALUES ('909', 'An Minh', 'Huyện', '9 40 24N, 104 59 05E', '91');
INSERT INTO `tbl_district` VALUES ('910', 'Vĩnh Thuận', 'Huyện', '9 33 25N, 105 11 30E', '91');
INSERT INTO `tbl_district` VALUES ('911', 'Phú Quốc', 'Huyện', '10 13 44N, 103 57 25E', '91');
INSERT INTO `tbl_district` VALUES ('912', 'Kiên Hải', 'Huyện', '9 48 31N, 104 37 48E', '91');
INSERT INTO `tbl_district` VALUES ('913', 'U Minh Thượng', 'Huyện', '', '91');
INSERT INTO `tbl_district` VALUES ('914', 'Giang Thành', 'Huyện', '', '91');
INSERT INTO `tbl_district` VALUES ('916', 'Ninh Kiều', 'Quận', '10 01 58N, 105 45 34E', '92');
INSERT INTO `tbl_district` VALUES ('917', 'Ô Môn', 'Quận', '10 07 28N, 105 37 51E', '92');
INSERT INTO `tbl_district` VALUES ('918', 'Bình Thuỷ', 'Quận', '10 03 42N, 105 43 17E', '92');
INSERT INTO `tbl_district` VALUES ('919', 'Cái Răng', 'Quận', '9 59 57N, 105 46 56E', '92');
INSERT INTO `tbl_district` VALUES ('923', 'Thốt Nốt', 'Quận', '10 14 23N, 105 32 02E', '92');
INSERT INTO `tbl_district` VALUES ('924', 'Vĩnh Thạnh', 'Huyện', '10 11 35N, 105 22 45E', '92');
INSERT INTO `tbl_district` VALUES ('925', 'Cờ Đỏ', 'Huyện', '10 02 48N, 105 29 46E', '92');
INSERT INTO `tbl_district` VALUES ('926', 'Phong Điền', 'Huyện', '9 59 57N, 105 39 35E', '92');
INSERT INTO `tbl_district` VALUES ('927', 'Thới Lai', 'Huyện', '', '92');
INSERT INTO `tbl_district` VALUES ('930', 'Vị Thanh', 'Thị Xã', '9 45 15N, 105 24 50E', '93');
INSERT INTO `tbl_district` VALUES ('931', 'Ngã Bảy', 'Thị Xã', '', '93');
INSERT INTO `tbl_district` VALUES ('932', 'Châu Thành A', 'Huyện', '9 55 50N, 105 38 31E', '93');
INSERT INTO `tbl_district` VALUES ('933', 'Châu Thành', 'Huyện', '9 55 22N, 105 48 37E', '93');
INSERT INTO `tbl_district` VALUES ('934', 'Phụng Hiệp', 'Huyện', '9 47 20N, 105 43 29E', '93');
INSERT INTO `tbl_district` VALUES ('935', 'Vị Thuỷ', 'Huyện', '9 48 05N, 105 32 13E', '93');
INSERT INTO `tbl_district` VALUES ('936', 'Long Mỹ', 'Huyện', '9 40 47N, 105 30 53E', '93');
INSERT INTO `tbl_district` VALUES ('941', 'Sóc Trăng', 'Thành Phố', '9 36 39N, 105 59 00E', '94');
INSERT INTO `tbl_district` VALUES ('942', 'Châu Thành', 'Huyện', '', '94');
INSERT INTO `tbl_district` VALUES ('943', 'Kế Sách', 'Huyện', '9 49 30N, 105 57 25E', '94');
INSERT INTO `tbl_district` VALUES ('944', 'Mỹ Tú', 'Huyện', '9 38 21N, 105 49 52E', '94');
INSERT INTO `tbl_district` VALUES ('945', 'Cù Lao Dung', 'Huyện', '9 37 36N, 106 12 13E', '94');
INSERT INTO `tbl_district` VALUES ('946', 'Long Phú', 'Huyện', '9 34 38N, 106 06 07E', '94');
INSERT INTO `tbl_district` VALUES ('947', 'Mỹ Xuyên', 'Huyện', '9 28 16N, 105 55 51E', '94');
INSERT INTO `tbl_district` VALUES ('948', 'Ngã Năm', 'Huyện', '9 31 38N, 105 37 22E', '94');
INSERT INTO `tbl_district` VALUES ('949', 'Thạnh Trị', 'Huyện', '9 28 05N, 105 43 02E', '94');
INSERT INTO `tbl_district` VALUES ('950', 'Vĩnh Châu', 'Huyện', '9 20 50N, 105 59 58E', '94');
INSERT INTO `tbl_district` VALUES ('951', 'Trần Đề', 'Huyện', '', '94');
INSERT INTO `tbl_district` VALUES ('954', 'Bạc Liêu', 'Thị Xã', '9 16 05N, 105 45 08E', '95');
INSERT INTO `tbl_district` VALUES ('956', 'Hồng Dân', 'Huyện', '9 30 37N, 105 24 25E', '95');
INSERT INTO `tbl_district` VALUES ('957', 'Phước Long', 'Huyện', '9 23 13N, 105 24 41E', '95');
INSERT INTO `tbl_district` VALUES ('958', 'Vĩnh Lợi', 'Huyện', '9 16 51N, 105 40 54E', '95');
INSERT INTO `tbl_district` VALUES ('959', 'Giá Rai', 'Huyện', '9 15 51N, 105 23 18E', '95');
INSERT INTO `tbl_district` VALUES ('960', 'Đông Hải', 'Huyện', '9 08 11N, 105 24 42E', '95');
INSERT INTO `tbl_district` VALUES ('961', 'Hoà Bình', 'Huyện', '', '95');
INSERT INTO `tbl_district` VALUES ('964', 'Cà Mau', 'Thành Phố', '9 10 33N, 105 11 11E', '96');
INSERT INTO `tbl_district` VALUES ('966', 'U Minh', 'Huyện', '9 22 30N, 104 57 00E', '96');
INSERT INTO `tbl_district` VALUES ('967', 'Thới Bình', 'Huyện', '9 22 50N, 105 07 35E', '96');
INSERT INTO `tbl_district` VALUES ('968', 'Trần Văn Thời', 'Huyện', '9 07 36N, 104 57 27E', '96');
INSERT INTO `tbl_district` VALUES ('969', 'Cái Nước', 'Huyện', '9 00 31N, 105 03 23E', '96');
INSERT INTO `tbl_district` VALUES ('970', 'Đầm Dơi', 'Huyện', '8 57 48N, 105 13 56E', '96');
INSERT INTO `tbl_district` VALUES ('971', 'Năm Căn', 'Huyện', '8 46 59N, 104 58 20E', '96');
INSERT INTO `tbl_district` VALUES ('972', 'Phú Tân', 'Huyện', '8 52 47N, 104 53 35E', '96');
INSERT INTO `tbl_district` VALUES ('973', 'Ngọc Hiển', 'Huyện', '8 40 47N, 104 57 58E', '96');

-- ----------------------------
-- Table structure for tbl_images
-- ----------------------------
DROP TABLE IF EXISTS `tbl_images`;
CREATE TABLE `tbl_images` (
  `id_images` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_collection` int(10) unsigned NOT NULL,
  `link` varchar(150) DEFAULT NULL,
  `liked` int(11) NOT NULL DEFAULT '0',
  `vote` int(11) NOT NULL DEFAULT '0',
  `viewed` int(11) NOT NULL DEFAULT '0',
  `status` tinyint(1) DEFAULT '1',
  `date_create` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_images`)
) ENGINE=InnoDB AUTO_INCREMENT=147391 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tbl_images
-- ----------------------------
INSERT INTO `tbl_images` VALUES ('27', '23', 'img153fc124a60d22.jpg', '0', '0', '50', '1', '2014-08-28 17:44:17');
INSERT INTO `tbl_images` VALUES ('28', '23', 'img253fc124a614d5.jpg', '0', '0', '8', '1', '2014-08-28 13:49:02');
INSERT INTO `tbl_images` VALUES ('29', '23', 'img353fc124a70908.jpg', '0', '0', '11', '1', '2014-08-27 16:35:06');
INSERT INTO `tbl_images` VALUES ('30', '23', 'img453fc124a7294e.jpg', '0', '0', '14', '1', '2014-08-28 17:27:12');
INSERT INTO `tbl_images` VALUES ('31', '24', 'img153fc129f1b0c8.jpg', '0', '0', '9', '1', '2014-08-28 11:28:56');
INSERT INTO `tbl_images` VALUES ('32', '24', 'img253fc129f218ef.jpg', '0', '0', '15', '1', '2014-08-28 11:28:57');
INSERT INTO `tbl_images` VALUES ('33', '24', 'img353fc129f2207e.jpg', '0', '0', '5', '1', '2014-08-28 11:28:58');
INSERT INTO `tbl_images` VALUES ('34', '24', 'img453fc129f22c36.jpg', '0', '0', '4', '1', '2014-08-28 11:28:55');
INSERT INTO `tbl_images` VALUES ('35', '25', 'img153fc12eeec30a.jpg', '0', '0', '11', '1', '2014-08-27 18:10:00');
INSERT INTO `tbl_images` VALUES ('36', '25', 'img253fc12eef2bfa.jpg', '0', '0', '1', '1', '2014-08-27 18:09:54');
INSERT INTO `tbl_images` VALUES ('37', '25', 'img353fc12eef37c1.jpg', '0', '0', '3', '1', '2014-08-27 18:10:02');
INSERT INTO `tbl_images` VALUES ('38', '25', 'img453fc12eef3ee6.png', '0', '0', '9', '1', '2014-08-27 18:09:57');
INSERT INTO `tbl_images` VALUES ('147369', '26', 'img153fd964d0097c.jpg', '0', '0', '4', '1', '2014-08-28 13:57:44');
INSERT INTO `tbl_images` VALUES ('147370', '26', 'img253fd964d20c35.jpg', '0', '0', '3', '1', '2014-08-28 11:29:22');
INSERT INTO `tbl_images` VALUES ('147371', '26', 'img353fd964d22b72.jpg', '0', '0', '3', '1', '2014-08-28 11:29:20');
INSERT INTO `tbl_images` VALUES ('147372', '26', 'img453fd964d26775.jpg', '0', '0', '3', '1', '2014-08-28 11:29:25');
INSERT INTO `tbl_images` VALUES ('147373', '27', 'img153fed25bd3d53.jpg', '0', '0', '12', '1', '2014-08-28 17:50:17');
INSERT INTO `tbl_images` VALUES ('147374', '27', 'img253fed25be8b63.jpg', '0', '0', '2', '1', '2014-08-28 14:02:07');
INSERT INTO `tbl_images` VALUES ('147375', '27', 'img353fed25be9613.jpg', '0', '0', '7', '1', '2014-08-28 14:02:08');
INSERT INTO `tbl_images` VALUES ('147376', '27', 'img453fed25bea91f.jpg', '0', '0', '3', '1', '2014-08-28 14:02:16');
INSERT INTO `tbl_images` VALUES ('147377', '28', 'img153feefb5d10a2.jpg', '0', '0', '1', '1', '2014-08-28 16:00:41');
INSERT INTO `tbl_images` VALUES ('147379', '30', 'img153fef5b013fa8.jpg', '0', '0', '2', '1', '2014-08-28 16:26:33');
INSERT INTO `tbl_images` VALUES ('147380', '30', 'img253fef5b01491b.jpg', '0', '0', '2', '1', '2014-08-28 16:26:38');
INSERT INTO `tbl_images` VALUES ('147381', '30', 'img353fef5b01b2ff.jpg', '0', '0', '1', '1', '2014-08-28 16:26:32');
INSERT INTO `tbl_images` VALUES ('147382', '30', 'img453fef5b01bd21.jpg', '0', '0', '2', '1', '2014-08-28 16:26:45');
INSERT INTO `tbl_images` VALUES ('147383', '31', 'img153fef842d169f.jpg', '0', '0', '4', '1', '2014-08-28 16:38:56');
INSERT INTO `tbl_images` VALUES ('147384', '31', 'img253fef842d200b.jpg', '0', '0', '1', '1', '2014-08-28 16:38:59');
INSERT INTO `tbl_images` VALUES ('147385', '31', 'img353fef842d2d05.jpg', '0', '0', '1', '1', '2014-08-28 16:38:54');
INSERT INTO `tbl_images` VALUES ('147386', '31', 'img453fef842d38aa.jpg', '0', '0', '1', '1', '2014-08-28 16:38:58');
INSERT INTO `tbl_images` VALUES ('147387', '32', 'img153ff01a44394e.jpg', '0', '0', '33', '1', '2014-08-28 18:27:42');
INSERT INTO `tbl_images` VALUES ('147388', '32', 'img253ff01a4446e7.jpg', '0', '0', '0', '1', '2014-08-28 17:17:08');
INSERT INTO `tbl_images` VALUES ('147389', '32', 'img353ff01a445315.jpg', '0', '0', '2', '1', '2014-08-28 18:27:40');
INSERT INTO `tbl_images` VALUES ('147390', '32', 'img453ff01a445f23.jpg', '0', '0', '0', '1', '2014-08-28 17:17:08');

-- ----------------------------
-- Table structure for tbl_news
-- ----------------------------
DROP TABLE IF EXISTS `tbl_news`;
CREATE TABLE `tbl_news` (
  `id_news` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` text NOT NULL,
  `alias` text,
  `content` text,
  `status` int(10) unsigned DEFAULT '1',
  `creator` int(10) unsigned DEFAULT NULL,
  `date_create` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `type` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_news`)
) ENGINE=MyISAM AUTO_INCREMENT=44 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tbl_news
-- ----------------------------
INSERT INTO `tbl_news` VALUES ('6', 'fsdfsdfsd', 'fsdfsdfsd', '<p><em><strong>sdfsdfsd fsdfs dfsd</strong></em></p>', '1', '1', '2014-08-18 14:18:56', '0');
INSERT INTO `tbl_news` VALUES ('20', 'sdf', 'sdf', '<p>sfsfsdf</p>', '0', '1', '2014-08-18 14:34:50', '1');
INSERT INTO `tbl_news` VALUES ('21', 'sdfsf', 'sdfsf', '<p>sfsdfsf</p>', '1', '27', '2014-08-18 16:26:22', '1');
INSERT INTO `tbl_news` VALUES ('15', 'Kỹ thuật xử lý mảng trong PHP', 'Ky-thuat-xu-ly-mang-trong-PHP', '<div class=\"blogtitle\">\r\n<h3 class=\"color-articles\">Kỹ thuật xử l&yacute; mảng trong PHP</h3>\r\n</div>\r\n<div class=\"blogbody body-article\">\r\n<p>A. Kh&aacute;i niệm:<br />Mảng l&agrave; một biến đặc biệt v&agrave; c&oacute; thể lưu trữ nhiều gi&aacute; trị (c&ograve;n biến th&igrave; kh&ocirc;ng). Trong PHP c&oacute; 3 loại mảng: mảng số nguy&ecirc;n, mảng kết hợp v&agrave; mảng đa chiều.<br /><br /><img title=\"Click Here To See Image Full Size \" src=\"https://lh5.googleusercontent.com/-eLlF0pm2fqM/Tl-6H0UCv5I/AAAAAAAAANs/QW_4Y0vv9xk/s912/Untitled.jpg\" alt=\"Hình ảnh\" /><br /><br />B. C&aacute;c h&agrave;m xử l&yacute; mảng:<br /><br />1. print_r ($array)<br />Xem cấu tr&uacute;c của mảng<br /><br />2. count ($array)<br />Trả về gi&aacute; trị kiểu số nguy&ecirc;n l&agrave; số phần tử của mảng<br /><br />3. array_values ($array)<br />Trả về một mảng li&ecirc;n tục c&oacute; c&aacute;c phần tử c&oacute; gi&aacute; trị l&agrave; gi&aacute; trị lấy từ c&aacute;c phần tử của mảng $array<br /><br />4. array_keys ($array)<br />Trả về một mảng li&ecirc;n tục c&oacute; c&aacute;c phần tử c&oacute; gi&aacute; trị l&agrave; kh&oacute;a lấy từ c&aacute;c phần tử của mảng $array.<br /><br />5. array_pop ($array)<br />Loại bỏ phần tử cuối c&ugrave;ng của mảng. H&agrave;m trả về phần tử cuối c&ugrave;ng đ&atilde; được loại bỏ.<br /><br />6. array_push ($array, $val1, $val2, ... , $valn)<br />Th&ecirc;m một hoặc nhiều phần tử v&agrave;o cuối mảng $array. H&agrave;m trả về kiểu số nguy&ecirc;n l&agrave; số lượng phần tử của mảng $array mới<br /><br />7. array_shift ($array)<br />Loại bỏ phần tử đầu ti&ecirc;n của mảng. H&agrave;m trả về phần tử đầu ti&ecirc;n đ&atilde; được loại bỏ.<br /><br />8. array_unshift ($array, $val1, $val2, ... , $valn)<br />Th&ecirc;m một hoặc nhiều phần tử v&agrave;o đầu mảng $array. H&agrave;m trả về kiểu số nguy&ecirc;n l&agrave; số lượng phần tử của mảng $array mới<br /><br />9. array_flip ($array)<br />Trả về một mảng c&oacute; kh&oacute;a v&agrave; gi&aacute; trị được ho&aacute;n đổi cho nhau so với mảng $array (gi&aacute; trị th&agrave;nh kh&oacute;a v&agrave; kh&oacute;a th&agrave;nh gi&aacute; trị)<br /><br />10. sort ($array)<br />Sắp xếp mảng $array theo gi&aacute; trị tăng dần<br /><br />11. array_reverse ($array)<br />Đảo ngược vị tr&iacute; c&aacute;c phần tử của mảng<br /><br />12. array_merge ($array1, $array2, &hellip;, $arrayn) <br />Nhập 2 hay nhiều mảng th&agrave;nh một mảng duy nhất v&agrave; trả về mảng mới<br /><br />13. array_rand ($array, $number)<br />Lấy ng&acirc;u nhi&ecirc;n $number phần tử từ mảng $array v&agrave; đưa v&agrave;o m&agrave;ng mới (lấy gi&aacute; trị kh&oacute;a)<br /><br />14. array_search ($value,$array)<br />T&igrave;m phần tử mang gi&aacute; trị $value trong mảng $array. Trả về kh&oacute;a của phần tử t&igrave;m được.<br /><br />15. array_slice ($array, $begin. $finish)<br />Tr&iacute;ch lấy 1 đoạn phần tử của mảng $array từ vị tr&iacute; $begin đến vị tr&iacute; $finish. Phần tư đầu ti&ecirc;n (chỉ số 0), phần tử cuối c&ugrave;ng (chỉ số -1 hay count($array) - 1)<br /><br />16. array_unique ($array)<br />Loại bỏ những phần tử tr&ugrave;ng nhau trong mảng v&agrave; trả về mảng mới<br /><br />17. implode ($str, $array)<br />Chuyển c&aacute;c gi&aacute; trị của mảng $array th&agrave;nh một chuỗi bao gồm c&aacute;c phần tử c&aacute;ch nhau bởi k&yacute; tự $str<br /><br />18. explode ($delimiter, $str)<br />Chuyển một chuỗi th&agrave;nh một mảng. T&aacute;ch chuỗi dựa v&agrave;o $delimiter, mỗi đo&agrave;n t&aacute;ch ra sẽ th&agrave;nh một phần tử của mảng mới<br /><br />19. serialize ($value)<br />Chuyển chuỗi/mảng/đối tượng $value th&agrave;nh một chuỗi đặc biệt để lưu v&agrave;o cơ sở dữ liệu<br /><br />20. unserialize ($value)<br />Chuyển chuỗi đặc biệt được tạo từ serialize($value) về trạng th&aacute;i ban đầu<br /><br />21. array_key_exists ($key, $array)<br />Kiểm tra kh&oacute;a $key c&oacute; tồn tại trong mảng $array hay kh&ocirc;ng? Nếu c&oacute; trả về gi&aacute; trị true.<br /><br />22. in_array ($value, $array)<br />Kiểm tra gi&aacute; trị $value c&oacute; tồn tại trong mảng $array hay kh&ocirc;ng? Nếu c&oacute; trả về gi&aacute; trị true.<br /><br />23. array_diff ($array1, $array2)<br />Trả về một mảng bao gồm c&aacute;c phần tử c&oacute; gi&aacute; trị tồn tại trong mảng $array1 nhưng kh&ocirc;ng tồn tại trong mảng $array2<br /><br />24. array_diff_assoc ($array1, $array2)<br />Trả về một mảng bao gồm c&aacute;c phần tử c&oacute; kh&oacute;a tồn tại trong mảng $array1 nhưng kh&ocirc;ng tồn tại trong mảng $array2<br /><br />25. array_intersect ($array1, $array2)<br />Trả về một mảng bao gồm c&aacute;c phần tử giống nhau về gi&aacute; trị giữa 2 mảng $array1 v&agrave; $array2<br /><br />26. array_intersect_assoc ($array1, $array2)<br />Trả về một mảng bao gồm c&aacute;c phần tử giống nhau về kh&oacute;a v&agrave; gi&aacute; trị giữa 2 mảng $array1 v&agrave; $array2<br /><br />27. array_combine ($keys, $values)<br />Tạo một mảng mới c&oacute; kh&oacute;a được lấy từ mảng $keys v&agrave; gi&aacute; trị được lấy từ mảng $values theo tuần tự (Y&ecirc;u cầu số phần tử ở 2 mảng phải bằng nhau)</p>\r\n</div>', '0', '25', '2014-08-18 15:39:48', '1');
INSERT INTO `tbl_news` VALUES ('18', 'CodeIgniter User Guide Version 2.2.0', 'CodeIgniter-User-Guide-Version-2-2-0', '<h1>URL Helper</h1>\r\n<p>The URL Helper file contains functions that assist in working with URLs.</p>\r\n<h2>Loading this Helper</h2>\r\n<p>This helper is loaded using the following code:</p>\r\n<p><code>$this-&gt;load-&gt;helper(\'url\');</code></p>\r\n<p>The following functions are available:</p>\r\n<h2>site_url()</h2>\r\n<p>Returns your site URL, as specified in your config file. The index.php file &#40;or whatever you have set as your site <dfn>index_page</dfn> in your config file&#41; will be added to the URL, as will any URI segments you pass to the function, and the <dfn>url_suffix</dfn> as set in your config file.</p>\r\n<p>You are encouraged to use this function any time you need to generate a local URL so that your pages become more portable in the event your URL changes.</p>\r\n<p>Segments can be optionally passed to the function as a string or an array. Here is a string example:</p>\r\n<p><code>echo site_url(\"news/local/123\");</code></p>\r\n<p>The above example would return something like: http://example.com/index.php/news/local/123</p>\r\n<p>Here is an example of segments passed as an array:</p>\r\n<p><code>$segments = array(\'news\', \'local\', \'123\');<br /><br />echo site_url($segments);</code></p>\r\n<h2>base_url()</h2>\r\n<p>Returns your site base URL, as specified in your config file. Example:</p>\r\n<p><code>echo base_url();</code></p>\r\n<p>This function returns the same thing as site_url, without the <dfn>index_page</dfn> or <dfn>url_suffix</dfn> being appended.</p>\r\n<p>Also like site_url, you can supply segments as a string or an array. Here is a string example:</p>\r\n<p><code>echo base_url(\"blog/post/123\");</code></p>\r\n<p>The above example would return something like: http://example.com/blog/post/123</p>\r\n<p>This is useful because unlike site_url(), you can supply a string to a file, such as an image or stylesheet. For example:</p>\r\n<p><code>echo base_url(\"/_user_guide_src_ci/images/icons/edit.png\");</code></p>\r\n<p>This would give you something like: http://example.com/images/icons/edit.png</p>\r\n<h2>current_url()</h2>\r\n<p>Returns the full URL (including segments) of the page being currently viewed.</p>\r\n<h2>uri_string()</h2>\r\n<p>Returns the URI segments of any page that contains this function. For example, if your URL was this:</p>\r\n<p><code>http://some-site.com/blog/comments/123</code></p>\r\n<p>The function would return:</p>\r\n<p><code>/blog/comments/123</code></p>\r\n<h2>index_page()</h2>\r\n<p>Returns your site \"index\" page, as specified in your config file. Example:</p>\r\n<p><code>echo index_page();</code></p>\r\n<h2>anchor()</h2>\r\n<p>Creates a standard HTML anchor link based on your local site URL:</p>\r\n<p><code><a href=\"http://example.com\">Click Here</a></code></p>\r\n<p>The tag has three optional parameters:</p>\r\n<p><code>anchor(<var>uri segments</var>, <var>text</var>, <var>attributes</var>)</code></p>\r\n<p>The first parameter can contain any segments you wish appended to the URL. As with the <dfn>site_url()</dfn> function above, segments can be a string or an array.</p>\r\n<p><strong>Note:</strong>&nbsp; If you are building links that are internal to your application do not include the base URL (http://...). This will be added automatically from the information specified in your config file. Include only the URI segments you wish appended to the URL.</p>\r\n<p>The second segment is the text you would like the link to say. If you leave it blank, the URL will be used.</p>\r\n<p>The third parameter can contain a list of attributes you would like added to the link. The attributes can be a simple string or an associative array.</p>\r\n<p>Here are some examples:</p>\r\n<p><code>echo anchor(\'news/local/123\', \'My News\', \'title=\"News title\"\');</code></p>\r\n<p>Would produce: <a title=\"News title\" href=\"http://example.com/index.php/news/local/123\">My News</a></p>\r\n<p><code>echo anchor(\'news/local/123\', \'My News\', array(\'title\' =&gt; \'The best news!\'));</code></p>\r\n<p>Would produce: <a title=\"The best news!\" href=\"http://example.com/index.php/news/local/123\">My News</a></p>\r\n<h2>anchor_popup()</h2>\r\n<p>Nearly identical to the <dfn>anchor()</dfn> function except that it opens the URL in a new window. You can specify JavaScript window attributes in the third parameter to control how the window is opened. If the third parameter is not set it will simply open a new window with your own browser settings. Here is an example with attributes:</p>\r\n<p><code>$atts = array(<br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;\'width\'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;=&gt; \'800\',<br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;\'height\'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;=&gt; \'600\',<br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;\'scrollbars\' =&gt; \'yes\',<br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;\'status\'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;=&gt; \'yes\',<br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;\'resizable\'&nbsp;&nbsp;=&gt; \'yes\',<br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;\'screenx\'&nbsp;&nbsp;&nbsp;&nbsp;=&gt; \'0\',<br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;\'screeny\'&nbsp;&nbsp;&nbsp;&nbsp;=&gt; \'0\'<br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;);<br /><br />echo anchor_popup(\'news/local/123\', \'Click Me!\', $atts);</code></p>\r\n<p>Note: The above attributes are the function defaults so you only need to set the ones that are different from what you need. If you want the function to use all of its defaults simply pass an empty array in the third parameter:</p>\r\n<p><code>echo anchor_popup(\'news/local/123\', \'Click Me!\', array());</code></p>\r\n<h2>mailto()</h2>\r\n<p>Creates a standard HTML email link. Usage example:</p>\r\n<p><code>echo mailto(\'me@my-site.com\', \'Click Here to Contact Me\');</code></p>\r\n<p>As with the <dfn>anchor()</dfn> tab above, you can set attributes using the third parameter.</p>\r\n<h2>safe_mailto()</h2>\r\n<p>Identical to the above function except it writes an obfuscated version of the mailto tag using ordinal numbers written with JavaScript to help prevent the email address from being harvested by spam bots.</p>\r\n<h2>auto_link()</h2>\r\n<p>Automatically turns URLs and email addresses contained in a string into links. Example:</p>\r\n<p><code>$string = auto_link($string);</code></p>\r\n<p>The second parameter determines whether URLs and emails are converted or just one or the other. Default behavior is both if the parameter is not specified. Email links are encoded as safe_mailto() as shown above.</p>\r\n<p>Converts only URLs:</p>\r\n<p><code>$string = auto_link($string, \'url\');</code></p>\r\n<p>Converts only Email addresses:</p>\r\n<p><code>$string = auto_link($string, \'email\');</code></p>\r\n<p>The third parameter determines whether links are shown in a new window. The value can be TRUE or FALSE (boolean):</p>\r\n<p><code>$string = auto_link($string, \'both\', TRUE);</code></p>\r\n<h2>url_title()</h2>\r\n<p>Takes a string as input and creates a human-friendly URL string. This is useful if, for example, you have a blog in which you\'d like to use the title of your entries in the URL. Example:</p>\r\n<p><code>$title = \"What\'s wrong with CSS?\";<br /><br />$url_title = url_title($title);<br /><br />// Produces: Whats-wrong-with-CSS</code></p>\r\n<p>The second parameter determines the word delimiter. By default dashes are used.</p>\r\n<p><code>$title = \"What\'s wrong with CSS?\";<br /><br />$url_title = url_title($title, \'_\');<br /><br />// Produces: Whats_wrong_with_CSS</code></p>\r\n<p>The third parameter determines whether or not lowercase characters are forced. By default they are not. Options are boolean <dfn>TRUE</dfn>/<dfn>FALSE</dfn>:</p>\r\n<p><code>$title = \"What\'s wrong with CSS?\";<br /><br />$url_title = url_title($title, \'_\', TRUE);<br /><br />// Produces: whats_wrong_with_css</code></p>\r\n<h3>prep_url()</h3>\r\n<p>This function will add <kbd>http://</kbd> in the event that a scheme is missing from a URL. Pass the URL string to the function like this:</p>\r\n<p><code>$url = \"example.com\";<br /><br />$url = prep_url($url);</code></p>\r\n<h2>redirect()</h2>\r\n<p>Does a \"header redirect\" to the URI specified. If you specify the full site URL that link will be build, but for local links simply providing the URI segments to the controller you want to direct to will create the link. The function will build the URL based on your config file values.</p>\r\n<p>The optional second parameter allows you to choose between the \"location\" method (default) or the \"refresh\" method. Location is faster, but on Windows servers it can sometimes be a problem. The optional third parameter allows you to send a specific HTTP Response Code - this could be used for example to create 301 redirects for search engine purposes. The default Response Code is 302. The third parameter is <em>only</em> available with \'location\' redirects, and not \'refresh\'. Examples:</p>\r\n<p><code>if ($logged_in == FALSE)<br />{<br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;redirect(\'/login/form/\', \'refresh\');<br />}<br /><br />// with 301 redirect<br />redirect(\'/article/13\', \'location\', 301);</code></p>', '1', '1', '2014-08-18 14:34:35', '1');
INSERT INTO `tbl_news` VALUES ('19', 'Chốt đề xuất tăng lương tối thiểu lên 3,1 triệu đồng', 'Chot-de-xuat-tang-luong-toi-thieu-len-3-1-trieu-dong', '<div class=\"short_intro txt_666\">Đ&acirc;y l&agrave; phương &aacute;n được Hội đồng Tiền lương quốc gia chốt sau buổi l&agrave;m việc s&aacute;ng 6/8 v&agrave; sẽ được tr&igrave;nh l&ecirc;n Thủ tướng quyết định &aacute;p dụng từ năm sau.</div>\r\n<div class=\"relative_new\">\r\n<ul class=\"list_news_dot_3x3_300\">\r\n<li><a title=\"Chủ tịch VCCI: Doanh nghiệp sẽ sốc nếu lương tối thiểu tăng 23%\" href=\"http://kinhdoanh.vnexpress.net/tin-tuc/doanh-nghiep/chu-tich-vcci-doanh-nghiep-se-soc-neu-luong-toi-thieu-tang-23-3027127.html\">Chủ tịch VCCI: Doanh nghiệp sẽ sốc nếu lương tối thiểu tăng 23%</a>&nbsp;/&nbsp;<a title=\"Ông Đặng Ngọc Tùng: \'Năm sau, lương tối thiểu phải tăng lên 3,4 triệu đồng\'\" href=\"http://kinhdoanh.vnexpress.net/tin-tuc/doanh-nghiep/ong-dang-ngoc-tung-nam-sau-luong-toi-thieu-phai-tang-len-3-4-trieu-dong-3024725.html\">&Ocirc;ng Đặng Ngọc T&ugrave;ng: \'Năm sau, lương tối thiểu phải tăng l&ecirc;n 3,4 triệu đồng\'</a></li>\r\n</ul>\r\n</div>\r\n<div class=\"fck_detail width_common\">\r\n<p class=\"Normal\">Trao đổi với&nbsp;<em>VnExpress</em>, &ocirc;ng Mai Đức Ch&iacute;nh, Ph&oacute; chủ tịch Tổng Li&ecirc;n đo&agrave;n Lao động Việt Nam cho biết, Hội đồng Tiền lương Quốc gia s&aacute;ng nay vừa bỏ phiếu th&ocirc;ng qua phương &aacute;n tăng lương tối thiểu v&ugrave;ng cho năm 2015. Phương &aacute;n đạt 9 trong tổng số 14 l&aacute; phiếu đ&atilde; được lựa chọn.</p>\r\n<p class=\"Normal\">Theo đ&oacute;, lương tối thiểu tại v&ugrave;ng I sẽ tăng 400.000 đồng so với 2014 l&ecirc;n 3,1 triệu đồng một th&aacute;ng, c&aacute;c v&ugrave;ng kh&aacute;c, mức lương tăng từ 300.000-350.000 đồng. Cụ thể, mức lương c&aacute;c v&ugrave;ng như sau:</p>\r\n<table class=\"tbl_insert\" border=\"1\" cellspacing=\"0\" cellpadding=\"1\" align=\"center\">\r\n<tbody>\r\n<tr>\r\n<td><strong>V&ugrave;ng</strong></td>\r\n<td><strong>Lương tối thiểu năm 2015&nbsp;<em>(triệu đồng/th&aacute;ng)</em></strong></td>\r\n<td><strong>Lương tối thiểu năm 2014&nbsp;<em>(triệu đồng/th&aacute;ng)</em></strong></td>\r\n</tr>\r\n<tr>\r\n<td>I</td>\r\n<td>3.100.000</td>\r\n<td>2.700.000</td>\r\n</tr>\r\n<tr>\r\n<td>II</td>\r\n<td>2.75.000</td>\r\n<td>2.400.000</td>\r\n</tr>\r\n<tr>\r\n<td>III</td>\r\n<td>2.420.000</td>\r\n<td>2.100.000</td>\r\n</tr>\r\n<tr>\r\n<td>IV</td>\r\n<td>2.200.000</td>\r\n<td>1. 900.000</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n<p class=\"Normal\">&Ocirc;ng Ch&iacute;nh cho biết, đ&acirc;y l&agrave; phương &aacute;n được đại diện giới chủ doanh nghiệp đề xuất. Với mức n&agrave;y, lương tối thiểu ở mỗi v&ugrave;ng đều thấp hơn 100.000 đồng so với phương &aacute;n được Tổng li&ecirc;n đo&agrave;n đưa ra trong buổi s&aacute;ng nay.&nbsp;</p>\r\n<p class=\"Normal\">Theo &ocirc;ng Ch&iacute;nh, phương &aacute;n n&agrave;y sẽ được Hội đồng Tiền lương quốc gia b&aacute;o c&aacute;o tr&igrave;nh Ch&iacute;nh phủ quyết định. Do vậy, trong thời gian tới, Tổng Li&ecirc;n đo&agrave;n sẽ tiếp tục c&oacute; đề xuất tr&igrave;nh Thủ tướng với hi vọng đạt được mức lương tối thiểu như cơ quan n&agrave;y đ&atilde; đưa ra trước đ&oacute;.&nbsp;</p>\r\n<p class=\"Normal\">&Ocirc;ng Ch&iacute;nh cũng cho biết lộ tr&igrave;nh l&agrave; đến năm 2017, mức lương tối thiểu khu vực doanh nghiệp sẽ đạt mức nhu cầu thấp nhất. Do đ&oacute;, nếu năm nay mức lương tăng thấp hơn dự kiến th&igrave; những năm sau, doanh nghiệp sẽ phải \"nặng g&aacute;nh\" hơn. &nbsp;</p>\r\n<p class=\"Normal\">Theo quy định hiện h&agrave;nh, c&aacute;c doanh nghiệp v&agrave; cơ quan, tổ chức thuộc khu vực ngo&agrave;i ng&acirc;n s&aacute;ch nh&agrave; nước phải trả lương cho người động kh&ocirc;ng thấp hơn lương tối thiểu v&ugrave;ng. Đ&acirc;y cũng thường l&agrave; căn cứ để c&aacute;c đơn vị t&iacute;nh to&aacute;n mức đ&oacute;ng bảo hiểm x&atilde; hội cho người lao động.</p>\r\n<p class=\"Normal\">Nửa đầu năm nay, Viện C&ocirc;ng nh&acirc;n v&agrave; C&ocirc;ng đo&agrave;n, Tổng Li&ecirc;n đo&agrave;n Lao động đ&atilde; khảo s&aacute;t về vấn đề tiền lương, mức sống tối thiểu với 1.500 c&ocirc;ng nh&acirc;n, lao động tại 60 doanh nghiệp ở 12 tỉnh, th&agrave;nh. Kết quả cho thấy, mức lương hiện chỉ đ&aacute;p ứng 69-77% mức sống tối thiểu theo v&ugrave;ng. Do đ&oacute;, Tổng Li&ecirc;n đo&agrave;n từng đề ra phương &aacute;n tăng lương tối thiểu v&ugrave;ng I l&ecirc;n mức 3,4 triệu đồng.&nbsp;</p>\r\n<p class=\"Normal\">Tuy nhi&ecirc;n cộng đồng doanh nghiệp cho rằng mức tăng 23% ngay trong năm 2015 l&agrave; qu&aacute; cao khi t&igrave;nh h&igrave;nh sản xuất, kinh doanh chưa hết kh&oacute; khăn. Chủ tịch Ph&ograve;ng Thương mại v&agrave; C&ocirc;ng nghiệp Việt Nam (VCCI) Vũ Tiến Lộc cho rằng chỉ n&ecirc;n tăng khoảng 14% để đảm bảo đời sống người lao động đồng thời hỗ trợ doanh nghiệp.</p>\r\n<p class=\"Normal\">&nbsp;</p>\r\n<div class=\"embed-container\">&lt;iframe src=\"http://vnexpress.net/parser.php?id=22624&t=2&ft=video&si=1003159&ap=1&ishome=0\" width=\"480\" height=\"270\" frameborder=\"0\" allowfullscreen=\"allowfullscreen\"&gt;&lt;/iframe></div>\r\n<p>&nbsp;</p>\r\n<p class=\"Normal\">&nbsp;</p>\r\n</div>', '1', '29', '2014-08-18 15:03:15', '1');
INSERT INTO `tbl_news` VALUES ('22', 'sdfs333aa', 'sdfs333aa', '<p>dfsdfsdfsfsfssf 333</p>', '1', '22', '2014-08-18 16:23:24', '1');
INSERT INTO `tbl_news` VALUES ('25', 'câu hởi 1', 'cau-hoi-1', '<p>asjcd anh t&ugrave;ng</p>', '1', '23', '2014-08-18 15:41:45', '1');
INSERT INTO `tbl_news` VALUES ('24', 'tung', 'tung', '<p>tugn222</p>', '0', '30', '2014-08-18 17:26:10', '1');
INSERT INTO `tbl_news` VALUES ('26', 'câu hỏi 2', 'cau-hoi-2', '', '1', '19', '2014-08-18 17:01:14', '1');
INSERT INTO `tbl_news` VALUES ('27', 'dô đô storm', 'do-do-storm', '', '1', '30', '2014-08-20 14:19:53', '1');
INSERT INTO `tbl_news` VALUES ('29', 'Well , thanx for your answers! I tried some stuff but I Haven\\\'t managet to get any results yet - I am new to programming..  Below, you can find 2 of my attempts - the 1st trying to parse the links and in the second trying to replace file_get contents with Curl:', 'Well-thanx-for-your-answers-I-tried-some-stuff-but-I-Haven-t-managet-to-get-any-results-yet-I-am-new-to-programming-Below-you-can-find-2-of-my-attempts-the-1st-trying-to-parse-the-links-and-in-the-second-trying-to-replace-fileget-contents-with-Curl', '', '1', '0', '2014-08-18 17:59:17', '1');
INSERT INTO `tbl_news` VALUES ('28', 'sdkfsdkfsklf sfhsdsdihfsdl fshdhsfsih sh silf', 'sdkfsdkfsklf-sfhsdsdihfsdl-fshdhsfsih-sh-silf', '', '1', '19', '2014-08-18 17:59:25', '1');
INSERT INTO `tbl_news` VALUES ('30', '// set Customer data\r\n$order-&gt;setCustomer_email($customer-&gt;getEmail())\r\n-&gt;setCustomerFirstname($customer-&gt;getFirstname())\r\n-&gt;setCustomerLastname($customer-&gt;getLastname())\r\n-&gt;setCustomerGroupId($customer-&gt;getGroupId())\r\n-&gt;setCustomer_is_guest(0)\r\n-&gt;setCustomer($customer);\r\n- See more at: http://excellencemagentoblog.com/useful-code-snippets#sthash.03DwTUNH.dpuf', 'set-Customer-data-order-setCustomeremail-customer-getEmail-setCustomerFirstname-customer-getFirstname-setCustomerLastname-customer-getLastname-setCustomerGroupId-customer-getGroupId-setCustomerisguest-0-setCustomer-customer-See-more-at-http-excellencemagentoblog-com-useful-code-snippetssthash-03DwTUNH-dpuf', null, '0', '25', '2014-08-19 10:24:12', '1');
INSERT INTO `tbl_news` VALUES ('31', 'đô đô storm 1', 'do-do-storm-1', '<p>đ&ocirc; ăn dhit</p>', '0', '25', '2014-08-19 10:26:06', '1');
INSERT INTO `tbl_news` VALUES ('32', 'không\r\n\r\ncó trả\r\n\r\nlời 1', 'khong-co-tra-loi-1', '<p>kh&ocirc;ng</p>\r\n<p>c&oacute; trả</p>\r\n<p>lời</p>', '1', '24', '2014-08-19 11:07:28', '1');
INSERT INTO `tbl_news` VALUES ('33', 'dô đô storm 2', 'do-do-storm-2', '<div class=\"intro\">In this blog, i will share some advanced useful code snippets which come into use when developing custom modules</div>\r\n<p>&nbsp;</p>\r\n<h2>Create Order</h2>\r\n<p>Below is the php code to create an order in magento. It requires a valid customer account with shipping and billing address setup.</p>\r\n<div>\r\n<div id=\"highlighter_88470\" class=\"syntaxhighlighter  php\">\r\n<table border=\"0\" cellspacing=\"0\" cellpadding=\"0\">\r\n<tbody>\r\n<tr>\r\n<td class=\"gutter\">\r\n<div class=\"line number1 index0 alt2\">1</div>\r\n<div class=\"line number2 index1 alt1\">2</div>\r\n<div class=\"line number3 index2 alt2\">3</div>\r\n<div class=\"line number4 index3 alt1\">4</div>\r\n<div class=\"line number5 index4 alt2\">5</div>\r\n<div class=\"line number6 index5 alt1\">6</div>\r\n<div class=\"line number7 index6 alt2\">7</div>\r\n<div class=\"line number8 index7 alt1\">8</div>\r\n<div class=\"line number9 index8 alt2\">9</div>\r\n<div class=\"line number10 index9 alt1\">10</div>\r\n<div class=\"line number11 index10 alt2\">11</div>\r\n<div class=\"line number12 index11 alt1\">12</div>\r\n<div class=\"line number13 index12 alt2\">13</div>\r\n<div class=\"line number14 index13 alt1\">14</div>\r\n<div class=\"line number15 index14 alt2\">15</div>\r\n<div class=\"line number16 index15 alt1\">16</div>\r\n<div class=\"line number17 index16 alt2\">17</div>\r\n<div class=\"line number18 index17 alt1\">18</div>\r\n<div class=\"line number19 index18 alt2\">19</div>\r\n<div class=\"line number20 index19 alt1\">20</div>\r\n<div class=\"line number21 index20 alt2\">21</div>\r\n<div class=\"line number22 index21 alt1\">22</div>\r\n<div class=\"line number23 index22 alt2\">23</div>\r\n<div class=\"line number24 index23 alt1\">24</div>\r\n<div class=\"line number25 index24 alt2\">25</div>\r\n<div class=\"line number26 index25 alt1\">26</div>\r\n<div class=\"line number27 index26 alt2\">27</div>\r\n<div class=\"line number28 index27 alt1\">28</div>\r\n<div class=\"line number29 index28 alt2\">29</div>\r\n<div class=\"line number30 index29 alt1\">30</div>\r\n<div class=\"line number31 index30 alt2\">31</div>\r\n<div class=\"line number32 index31 alt1\">32</div>\r\n<div class=\"line number33 index32 alt2\">33</div>\r\n<div class=\"line number34 index33 alt1\">34</div>\r\n<div class=\"line number35 index34 alt2\">35</div>\r\n<div class=\"line number36 index35 alt1\">36</div>\r\n<div class=\"line number37 index36 alt2\">37</div>\r\n<div class=\"line number38 index37 alt1\">38</div>\r\n<div class=\"line number39 index38 alt2\">39</div>\r\n<div class=\"line number40 index39 alt1\">40</div>\r\n<div class=\"line number41 index40 alt2\">41</div>\r\n<div class=\"line number42 index41 alt1\">42</div>\r\n<div class=\"line number43 index42 alt2\">43</div>\r\n<div class=\"line number44 index43 alt1\">44</div>\r\n<div class=\"line number45 index44 alt2\">45</div>\r\n<div class=\"line number46 index45 alt1\">46</div>\r\n<div class=\"line number47 index46 alt2\">47</div>\r\n<div class=\"line number48 index47 alt1\">48</div>\r\n<div class=\"line number49 index48 alt2\">49</div>\r\n<div class=\"line number50 index49 alt1\">50</div>\r\n<div class=\"line number51 index50 alt2\">51</div>\r\n<div class=\"line number52 index51 alt1\">52</div>\r\n<div class=\"line number53 index52 alt2\">53</div>\r\n<div class=\"line number54 index53 alt1\">54</div>\r\n<div class=\"line number55 index54 alt2\">55</div>\r\n<div class=\"line number56 index55 alt1\">56</div>\r\n<div class=\"line number57 index56 alt2\">57</div>\r\n<div class=\"line number58 index57 alt1\">58</div>\r\n<div class=\"line number59 index58 alt2\">59</div>\r\n<div class=\"line number60 index59 alt1\">60</div>\r\n<div class=\"line number61 index60 alt2\">61</div>\r\n<div class=\"line number62 index61 alt1\">62</div>\r\n<div class=\"line number63 index62 alt2\">63</div>\r\n<div class=\"line number64 index63 alt1\">64</div>\r\n<div class=\"line number65 index64 alt2\">65</div>\r\n<div class=\"line number66 index65 alt1\">66</div>\r\n<div class=\"line number67 index66 alt2\">67</div>\r\n<div class=\"line number68 index67 alt1\">68</div>\r\n<div class=\"line number69 index68 alt2\">69</div>\r\n<div class=\"line number70 index69 alt1\">70</div>\r\n<div class=\"line number71 index70 alt2\">71</div>\r\n<div class=\"line number72 index71 alt1\">72</div>\r\n<div class=\"line number73 index72 alt2\">73</div>\r\n<div class=\"line number74 index73 alt1\">74</div>\r\n<div class=\"line number75 index74 alt2\">75</div>\r\n<div class=\"line number76 index75 alt1\">76</div>\r\n<div class=\"line number77 index76 alt2\">77</div>\r\n<div class=\"line number78 index77 alt1\">78</div>\r\n<div class=\"line number79 index78 alt2\">79</div>\r\n<div class=\"line number80 index79 alt1\">80</div>\r\n<div class=\"line number81 index80 alt2\">81</div>\r\n<div class=\"line number82 index81 alt1\">82</div>\r\n<div class=\"line number83 index82 alt2\">83</div>\r\n<div class=\"line number84 index83 alt1\">84</div>\r\n<div class=\"line number85 index84 alt2\">85</div>\r\n<div class=\"line number86 index85 alt1\">86</div>\r\n<div class=\"line number87 index86 alt2\">87</div>\r\n<div class=\"line number88 index87 alt1\">88</div>\r\n<div class=\"line number89 index88 alt2\">89</div>\r\n<div class=\"line number90 index89 alt1\">90</div>\r\n<div class=\"line number91 index90 alt2\">91</div>\r\n<div class=\"line number92 index91 alt1\">92</div>\r\n<div class=\"line number93 index92 alt2\">93</div>\r\n<div class=\"line number94 index93 alt1\">94</div>\r\n<div class=\"line number95 index94 alt2\">95</div>\r\n<div class=\"line number96 index95 alt1\">96</div>\r\n<div class=\"line number97 index96 alt2\">97</div>\r\n<div class=\"line number98 index97 alt1\">98</div>\r\n<div class=\"line number99 index98 alt2\">99</div>\r\n<div class=\"line number100 index99 alt1\">100</div>\r\n<div class=\"line number101 index100 alt2\">101</div>\r\n<div class=\"line number102 index101 alt1\">102</div>\r\n<div class=\"line number103 index102 alt2\">103</div>\r\n<div class=\"line number104 index103 alt1\">104</div>\r\n<div class=\"line number105 index104 alt2\">105</div>\r\n<div class=\"line number106 index105 alt1\">106</div>\r\n<div class=\"line number107 index106 alt2\">107</div>\r\n<div class=\"line number108 index107 alt1\">108</div>\r\n<div class=\"line number109 index108 alt2\">109</div>\r\n<div class=\"line number110 index109 alt1\">110</div>\r\n<div class=\"line number111 index110 alt2\">111</div>\r\n<div class=\"line number112 index111 alt1\">112</div>\r\n<div class=\"line number113 index112 alt2\">113</div>\r\n<div class=\"line number114 index113 alt1\">114</div>\r\n<div class=\"line number115 index114 alt2\">115</div>\r\n<div class=\"line number116 index115 alt1\">116</div>\r\n<div class=\"line number117 index116 alt2\">117</div>\r\n<div class=\"line number118 index117 alt1\">118</div>\r\n<div class=\"line number119 index118 alt2\">119</div>\r\n<div class=\"line number120 index119 alt1\">120</div>\r\n<div class=\"line number121 index120 alt2\">121</div>\r\n<div class=\"line number122 index121 alt1\">122</div>\r\n<div class=\"line number123 index122 alt2\">123</div>\r\n<div class=\"line number124 index123 alt1\">124</div>\r\n<div class=\"line number125 index124 alt2\">125</div>\r\n<div class=\"line number126 index125 alt1\">126</div>\r\n<div class=\"line number127 index126 alt2\">127</div>\r\n</td>\r\n<td class=\"code\">\r\n<div class=\"container\">\r\n<div class=\"line number1 index0 alt2\"><code class=\"php variable\">$id</code><code class=\"php plain\">=1; </code><code class=\"php comments\">// get Customer Id</code></div>\r\n<div class=\"line number2 index1 alt1\"><code class=\"php variable\">$customer</code> <code class=\"php plain\">= Mage::getModel(</code><code class=\"php string\">\'customer/customer\'</code><code class=\"php plain\">)-&gt;load(</code><code class=\"php variable\">$id</code><code class=\"php plain\">);</code></div>\r\n<div class=\"line number3 index2 alt2\">&nbsp;</div>\r\n<div class=\"line number4 index3 alt1\"><code class=\"php variable\">$transaction</code> <code class=\"php plain\">= Mage::getModel(</code><code class=\"php string\">\'core/resource_transaction\'</code><code class=\"php plain\">);</code></div>\r\n<div class=\"line number5 index4 alt2\"><code class=\"php variable\">$storeId</code> <code class=\"php plain\">= </code><code class=\"php variable\">$customer</code><code class=\"php plain\">-&gt;getStoreId();</code></div>\r\n<div class=\"line number6 index5 alt1\"><code class=\"php variable\">$reservedOrderId</code> <code class=\"php plain\">= Mage::getSingleton(</code><code class=\"php string\">\'eav/config\'</code><code class=\"php plain\">)-&gt;getEntityType(</code><code class=\"php string\">\'order\'</code><code class=\"php plain\">)-&gt;fetchNewIncrementId(</code><code class=\"php variable\">$storeId</code><code class=\"php plain\">);</code></div>\r\n<div class=\"line number7 index6 alt2\">&nbsp;</div>\r\n<div class=\"line number8 index7 alt1\"><code class=\"php variable\">$order</code> <code class=\"php plain\">= Mage::getModel(</code><code class=\"php string\">\'sales/order\'</code><code class=\"php plain\">)</code></div>\r\n<div class=\"line number9 index8 alt2\"><code class=\"php plain\">-&gt;setIncrementId(</code><code class=\"php variable\">$reservedOrderId</code><code class=\"php plain\">)</code></div>\r\n<div class=\"line number10 index9 alt1\"><code class=\"php plain\">-&gt;setStoreId(</code><code class=\"php variable\">$storeId</code><code class=\"php plain\">)</code></div>\r\n<div class=\"line number11 index10 alt2\"><code class=\"php plain\">-&gt;setQuoteId(0)</code></div>\r\n<div class=\"line number12 index11 alt1\"><code class=\"php plain\">-&gt;setGlobal_currency_code(</code><code class=\"php string\">\'USD\'</code><code class=\"php plain\">)</code></div>\r\n<div class=\"line number13 index12 alt2\"><code class=\"php plain\">-&gt;setBase_currency_code(</code><code class=\"php string\">\'USD\'</code><code class=\"php plain\">)</code></div>\r\n<div class=\"line number14 index13 alt1\"><code class=\"php plain\">-&gt;setStore_currency_code(</code><code class=\"php string\">\'USD\'</code><code class=\"php plain\">)</code></div>\r\n<div class=\"line number15 index14 alt2\"><code class=\"php plain\">-&gt;setOrder_currency_code(</code><code class=\"php string\">\'USD\'</code><code class=\"php plain\">);</code></div>\r\n<div class=\"line number16 index15 alt1\"><code class=\"php comments\">//Set your store currency USD or any other</code></div>\r\n<div class=\"line number17 index16 alt2\">&nbsp;</div>\r\n<div class=\"line number18 index17 alt1\"><code class=\"php comments\">// set Customer data</code></div>\r\n<div class=\"line number19 index18 alt2\"><code class=\"php variable\">$order</code><code class=\"php plain\">-&gt;setCustomer_email(</code><code class=\"php variable\">$customer</code><code class=\"php plain\">-&gt;getEmail())</code></div>\r\n<div class=\"line number20 index19 alt1\"><code class=\"php plain\">-&gt;setCustomerFirstname(</code><code class=\"php variable\">$customer</code><code class=\"php plain\">-&gt;getFirstname())</code></div>\r\n<div class=\"line number21 index20 alt2\"><code class=\"php plain\">-&gt;setCustomerLastname(</code><code class=\"php variable\">$customer</code><code class=\"php plain\">-&gt;getLastname())</code></div>\r\n<div class=\"line number22 index21 alt1\"><code class=\"php plain\">-&gt;setCustomerGroupId(</code><code class=\"php variable\">$customer</code><code class=\"php plain\">-&gt;getGroupId())</code></div>\r\n<div class=\"line number23 index22 alt2\"><code class=\"php plain\">-&gt;setCustomer_is_guest(0)</code></div>\r\n<div class=\"line number24 index23 alt1\"><code class=\"php plain\">-&gt;setCustomer(</code><code class=\"php variable\">$customer</code><code class=\"php plain\">);</code></div>\r\n<div class=\"line number25 index24 alt2\">&nbsp;</div>\r\n<div class=\"line number26 index25 alt1\"><code class=\"php comments\">// set Billing Address</code></div>\r\n<div class=\"line number27 index26 alt2\"><code class=\"php variable\">$billing</code> <code class=\"php plain\">= </code><code class=\"php variable\">$customer</code><code class=\"php plain\">-&gt;getDefaultBillingAddress();</code></div>\r\n<div class=\"line number28 index27 alt1\"><code class=\"php variable\">$billingAddress</code> <code class=\"php plain\">= Mage::getModel(</code><code class=\"php string\">\'sales/order_address\'</code><code class=\"php plain\">)</code></div>\r\n<div class=\"line number29 index28 alt2\"><code class=\"php plain\">-&gt;setStoreId(</code><code class=\"php variable\">$storeId</code><code class=\"php plain\">)</code></div>\r\n<div class=\"line number30 index29 alt1\"><code class=\"php plain\">-&gt;setAddressType(Mage_Sales_Model_Quote_Address::TYPE_BILLING)</code></div>\r\n<div class=\"line number31 index30 alt2\"><code class=\"php plain\">-&gt;setCustomerId(</code><code class=\"php variable\">$customer</code><code class=\"php plain\">-&gt;getId())</code></div>\r\n<div class=\"line number32 index31 alt1\"><code class=\"php plain\">-&gt;setCustomerAddressId(</code><code class=\"php variable\">$customer</code><code class=\"php plain\">-&gt;getDefaultBilling())</code></div>\r\n<div class=\"line number33 index32 alt2\"><code class=\"php plain\">-&gt;setCustomer_address_id(</code><code class=\"php variable\">$billing</code><code class=\"php plain\">-&gt;getEntityId())</code></div>\r\n<div class=\"line number34 index33 alt1\"><code class=\"php plain\">-&gt;setPrefix(</code><code class=\"php variable\">$billing</code><code class=\"php plain\">-&gt;getPrefix())</code></div>\r\n<div class=\"line number35 index34 alt2\"><code class=\"php plain\">-&gt;setFirstname(</code><code class=\"php variable\">$billing</code><code class=\"php plain\">-&gt;getFirstname())</code></div>\r\n<div class=\"line number36 index35 alt1\"><code class=\"php plain\">-&gt;setMiddlename(</code><code class=\"php variable\">$billing</code><code class=\"php plain\">-&gt;getMiddlename())</code></div>\r\n<div class=\"line number37 index36 alt2\"><code class=\"php plain\">-&gt;setLastname(</code><code class=\"php variable\">$billing</code><code class=\"php plain\">-&gt;getLastname())</code></div>\r\n<div class=\"line number38 index37 alt1\"><code class=\"php plain\">-&gt;setSuffix(</code><code class=\"php variable\">$billing</code><code class=\"php plain\">-&gt;getSuffix())</code></div>\r\n<div class=\"line number39 index38 alt2\"><code class=\"php plain\">-&gt;setCompany(</code><code class=\"php variable\">$billing</code><code class=\"php plain\">-&gt;getCompany())</code></div>\r\n<div class=\"line number40 index39 alt1\"><code class=\"php plain\">-&gt;setStreet(</code><code class=\"php variable\">$billing</code><code class=\"php plain\">-&gt;getStreet())</code></div>\r\n<div class=\"line number41 index40 alt2\"><code class=\"php plain\">-&gt;setCity(</code><code class=\"php variable\">$billing</code><code class=\"php plain\">-&gt;getCity())</code></div>\r\n<div class=\"line number42 index41 alt1\"><code class=\"php plain\">-&gt;setCountry_id(</code><code class=\"php variable\">$billing</code><code class=\"php plain\">-&gt;getCountryId())</code></div>\r\n<div class=\"line number43 index42 alt2\"><code class=\"php plain\">-&gt;setRegion(</code><code class=\"php variable\">$billing</code><code class=\"php plain\">-&gt;getRegion())</code></div>\r\n<div class=\"line number44 index43 alt1\"><code class=\"php plain\">-&gt;setRegion_id(</code><code class=\"php variable\">$billing</code><code class=\"php plain\">-&gt;getRegionId())</code></div>\r\n<div class=\"line number45 index44 alt2\"><code class=\"php plain\">-&gt;setPostcode(</code><code class=\"php variable\">$billing</code><code class=\"php plain\">-&gt;getPostcode())</code></div>\r\n<div class=\"line number46 index45 alt1\"><code class=\"php plain\">-&gt;setTelephone(</code><code class=\"php variable\">$billing</code><code class=\"php plain\">-&gt;getTelephone())</code></div>\r\n<div class=\"line number47 index46 alt2\"><code class=\"php plain\">-&gt;setFax(</code><code class=\"php variable\">$billing</code><code class=\"php plain\">-&gt;getFax());</code></div>\r\n<div class=\"line number48 index47 alt1\"><code class=\"php variable\">$order</code><code class=\"php plain\">-&gt;setBillingAddress(</code><code class=\"php variable\">$billingAddress</code><code class=\"php plain\">);</code></div>\r\n<div class=\"line number49 index48 alt2\">&nbsp;</div>\r\n<div class=\"line number50 index49 alt1\"><code class=\"php variable\">$shipping</code> <code class=\"php plain\">= </code><code class=\"php variable\">$customer</code><code class=\"php plain\">-&gt;getDefaultShippingAddress();</code></div>\r\n<div class=\"line number51 index50 alt2\"><code class=\"php variable\">$shippingAddress</code> <code class=\"php plain\">= Mage::getModel(</code><code class=\"php string\">\'sales/order_address\'</code><code class=\"php plain\">)</code></div>\r\n<div class=\"line number52 index51 alt1\"><code class=\"php plain\">-&gt;setStoreId(</code><code class=\"php variable\">$storeId</code><code class=\"php plain\">)</code></div>\r\n<div class=\"line number53 index52 alt2\"><code class=\"php plain\">-&gt;setAddressType(Mage_Sales_Model_Quote_Address::TYPE_SHIPPING)</code></div>\r\n<div class=\"line number54 index53 alt1\"><code class=\"php plain\">-&gt;setCustomerId(</code><code class=\"php variable\">$customer</code><code class=\"php plain\">-&gt;getId())</code></div>\r\n<div class=\"line number55 index54 alt2\"><code class=\"php plain\">-&gt;setCustomerAddressId(</code><code class=\"php variable\">$customer</code><code class=\"php plain\">-&gt;getDefaultShipping())</code></div>\r\n<div class=\"line number56 index55 alt1\"><code class=\"php plain\">-&gt;setCustomer_address_id(</code><code class=\"php variable\">$shipping</code><code class=\"php plain\">-&gt;getEntityId())</code></div>\r\n<div class=\"line number57 index56 alt2\"><code class=\"php plain\">-&gt;setPrefix(</code><code class=\"php variable\">$shipping</code><code class=\"php plain\">-&gt;getPrefix())</code></div>\r\n<div class=\"line number58 index57 alt1\"><code class=\"php plain\">-&gt;setFirstname(</code><code class=\"php variable\">$shipping</code><code class=\"php plain\">-&gt;getFirstname())</code></div>\r\n<div class=\"line number59 index58 alt2\"><code class=\"php plain\">-&gt;setMiddlename(</code><code class=\"php variable\">$shipping</code><code class=\"php plain\">-&gt;getMiddlename())</code></div>\r\n<div class=\"line number60 index59 alt1\"><code class=\"php plain\">-&gt;setLastname(</code><code class=\"php variable\">$shipping</code><code class=\"php plain\">-&gt;getLastname())</code></div>\r\n<div class=\"line number61 index60 alt2\"><code class=\"php plain\">-&gt;setSuffix(</code><code class=\"php variable\">$shipping</code><code class=\"php plain\">-&gt;getSuffix())</code></div>\r\n<div class=\"line number62 index61 alt1\"><code class=\"php plain\">-&gt;setCompany(</code><code class=\"php variable\">$shipping</code><code class=\"php plain\">-&gt;getCompany())</code></div>\r\n<div class=\"line number63 index62 alt2\"><code class=\"php plain\">-&gt;setStreet(</code><code class=\"php variable\">$shipping</code><code class=\"php plain\">-&gt;getStreet())</code></div>\r\n<div class=\"line number64 index63 alt1\"><code class=\"php plain\">-&gt;setCity(</code><code class=\"php variable\">$shipping</code><code class=\"php plain\">-&gt;getCity())</code></div>\r\n<div class=\"line number65 index64 alt2\"><code class=\"php plain\">-&gt;setCountry_id(</code><code class=\"php variable\">$shipping</code><code class=\"php plain\">-&gt;getCountryId())</code></div>\r\n<div class=\"line number66 index65 alt1\"><code class=\"php plain\">-&gt;setRegion(</code><code class=\"php variable\">$shipping</code><code class=\"php plain\">-&gt;getRegion())</code></div>\r\n<div class=\"line number67 index66 alt2\"><code class=\"php plain\">-&gt;setRegion_id(</code><code class=\"php variable\">$shipping</code><code class=\"php plain\">-&gt;getRegionId())</code></div>\r\n<div class=\"line number68 index67 alt1\"><code class=\"php plain\">-&gt;setPostcode(</code><code class=\"php variable\">$shipping</code><code class=\"php plain\">-&gt;getPostcode())</code></div>\r\n<div class=\"line number69 index68 alt2\"><code class=\"php plain\">-&gt;setTelephone(</code><code class=\"php variable\">$shipping</code><code class=\"php plain\">-&gt;getTelephone())</code></div>\r\n<div class=\"line number70 index69 alt1\"><code class=\"php plain\">-&gt;setFax(</code><code class=\"php variable\">$shipping</code><code class=\"php plain\">-&gt;getFax());</code></div>\r\n<div class=\"line number71 index70 alt2\">&nbsp;</div>\r\n<div class=\"line number72 index71 alt1\"><code class=\"php variable\">$order</code><code class=\"php plain\">-&gt;setShippingAddress(</code><code class=\"php variable\">$shippingAddress</code><code class=\"php plain\">)</code></div>\r\n<div class=\"line number73 index72 alt2\"><code class=\"php plain\">-&gt;setShipping_method(</code><code class=\"php string\">\'flatrate_flatrate\'</code><code class=\"php plain\">);</code></div>\r\n<div class=\"line number74 index73 alt1\"><code class=\"php comments\">/*-&gt;setShippingDescription($this-&gt;getCarrierName(\'flatrate\'));*/</code></div>\r\n<div class=\"line number75 index74 alt2\"><code class=\"php comments\">/*some error i am getting here need to solve further*/</code></div>\r\n<div class=\"line number76 index75 alt1\">&nbsp;</div>\r\n<div class=\"line number77 index76 alt2\"><code class=\"php comments\">//you can set your payment method name here as per your need</code></div>\r\n<div class=\"line number78 index77 alt1\"><code class=\"php variable\">$orderPayment</code> <code class=\"php plain\">= Mage::getModel(</code><code class=\"php string\">\'sales/order_payment\'</code><code class=\"php plain\">)</code></div>\r\n<div class=\"line number79 index78 alt2\"><code class=\"php plain\">-&gt;setStoreId(</code><code class=\"php variable\">$storeId</code><code class=\"php plain\">)</code></div>\r\n<div class=\"line number80 index79 alt1\"><code class=\"php plain\">-&gt;setCustomerPaymentId(0)</code></div>\r\n<div class=\"line number81 index80 alt2\"><code class=\"php plain\">-&gt;setMethod(</code><code class=\"php string\">\'purchaseorder\'</code><code class=\"php plain\">)</code></div>\r\n<div class=\"line number82 index81 alt1\"><code class=\"php plain\">-&gt;setPo_number(</code><code class=\"php string\">\' &ndash; \'</code><code class=\"php plain\">);</code></div>\r\n<div class=\"line number83 index82 alt2\"><code class=\"php variable\">$order</code><code class=\"php plain\">-&gt;setPayment(</code><code class=\"php variable\">$orderPayment</code><code class=\"php plain\">);</code></div>\r\n<div class=\"line number84 index83 alt1\">&nbsp;</div>\r\n<div class=\"line number85 index84 alt2\"><code class=\"php comments\">// let say, we have 1 product</code></div>\r\n<div class=\"line number86 index85 alt1\"><code class=\"php comments\">//check that your products exists</code></div>\r\n<div class=\"line number87 index86 alt2\"><code class=\"php comments\">//need to add code for configurable products if any</code></div>\r\n<div class=\"line number88 index87 alt1\"><code class=\"php variable\">$subTotal</code> <code class=\"php plain\">= 0;</code></div>\r\n<div class=\"line number89 index88 alt2\"><code class=\"php variable\">$products</code> <code class=\"php plain\">= </code><code class=\"php keyword\">array</code><code class=\"php plain\">(</code></div>\r\n<div class=\"line number90 index89 alt1\"><code class=\"php spaces\">&nbsp;&nbsp;&nbsp;&nbsp;</code><code class=\"php string\">\'1\'</code> <code class=\"php plain\">=&gt; </code><code class=\"php keyword\">array</code><code class=\"php plain\">(</code></div>\r\n<div class=\"line number91 index90 alt2\"><code class=\"php spaces\">&nbsp;&nbsp;&nbsp;&nbsp;</code><code class=\"php string\">\'qty\'</code> <code class=\"php plain\">=&gt; 2</code></div>\r\n<div class=\"line number92 index91 alt1\"><code class=\"php spaces\">&nbsp;&nbsp;&nbsp;&nbsp;</code><code class=\"php plain\">)</code></div>\r\n<div class=\"line number93 index92 alt2\"><code class=\"php plain\">);</code></div>\r\n<div class=\"line number94 index93 alt1\">&nbsp;</div>\r\n<div class=\"line number95 index94 alt2\"><code class=\"php keyword\">foreach</code> <code class=\"php plain\">(</code><code class=\"php variable\">$products</code> <code class=\"php keyword\">as</code> <code class=\"php variable\">$productId</code><code class=\"php plain\">=&gt;</code><code class=\"php variable\">$product</code><code class=\"php plain\">) {</code></div>\r\n<div class=\"line number96 index95 alt1\"><code class=\"php variable\">$_product</code> <code class=\"php plain\">= Mage::getModel(</code><code class=\"php string\">\'catalog/product\'</code><code class=\"php plain\">)-&gt;load(</code><code class=\"php variable\">$productId</code><code class=\"php plain\">);</code></div>\r\n<div class=\"line number97 index96 alt2\"><code class=\"php variable\">$rowTotal</code> <code class=\"php plain\">= </code><code class=\"php variable\">$_product</code><code class=\"php plain\">-&gt;getPrice() * </code><code class=\"php variable\">$product</code><code class=\"php plain\">[</code><code class=\"php string\">\'qty\'</code><code class=\"php plain\">];</code></div>\r\n<div class=\"line number98 index97 alt1\"><code class=\"php variable\">$orderItem</code> <code class=\"php plain\">= Mage::getModel(</code><code class=\"php string\">\'sales/order_item\'</code><code class=\"php plain\">)</code></div>\r\n<div class=\"line number99 index98 alt2\"><code class=\"php plain\">-&gt;setStoreId(</code><code class=\"php variable\">$storeId</code><code class=\"php plain\">)</code></div>\r\n<div class=\"line number100 index99 alt1\"><code class=\"php plain\">-&gt;setQuoteItemId(0)</code></div>\r\n<div class=\"line number101 index100 alt2\"><code class=\"php plain\">-&gt;setQuoteParentItemId(NULL)</code></div>\r\n<div class=\"line number102 index101 alt1\"><code class=\"php plain\">-&gt;setProductId(</code><code class=\"php variable\">$productId</code><code class=\"php plain\">)</code></div>\r\n<div class=\"line number103 index102 alt2\"><code class=\"php plain\">-&gt;setProductType(</code><code class=\"php variable\">$_product</code><code class=\"php plain\">-&gt;getTypeId())</code></div>\r\n<div class=\"line number104 index103 alt1\"><code class=\"php plain\">-&gt;setQtyBackordered(NULL)</code></div>\r\n<div class=\"line number105 index104 alt2\"><code class=\"php plain\">-&gt;setTotalQtyOrdered(</code><code class=\"php variable\">$product</code><code class=\"php plain\">[</code><code class=\"php string\">\'rqty\'</code><code class=\"php plain\">])</code></div>\r\n<div class=\"line number106 index105 alt1\"><code class=\"php plain\">-&gt;setQtyOrdered(</code><code class=\"php variable\">$product</code><code class=\"php plain\">[</code><code class=\"php string\">\'qty\'</code><code class=\"php plain\">])</code></div>\r\n<div class=\"line number107 index106 alt2\"><code class=\"php plain\">-&gt;setName(</code><code class=\"php variable\">$_product</code><code class=\"php plain\">-&gt;getName())</code></div>\r\n<div class=\"line number108 index107 alt1\"><code class=\"php plain\">-&gt;setSku(</code><code class=\"php variable\">$_product</code><code class=\"php plain\">-&gt;getSku())</code></div>\r\n<div class=\"line number109 index108 alt2\"><code class=\"php plain\">-&gt;setPrice(</code><code class=\"php variable\">$_product</code><code class=\"php plain\">-&gt;getPrice())</code></div>\r\n<div class=\"line number110 index109 alt1\"><code class=\"php plain\">-&gt;setBasePrice(</code><code class=\"php variable\">$_product</code><code class=\"php plain\">-&gt;getPrice())</code></div>\r\n<div class=\"line number111 index110 alt2\"><code class=\"php plain\">-&gt;setOriginalPrice(</code><code class=\"php variable\">$_product</code><code class=\"php plain\">-&gt;getPrice())</code></div>\r\n<div class=\"line number112 index111 alt1\"><code class=\"php plain\">-&gt;setRowTotal(</code><code class=\"php variable\">$rowTotal</code><code class=\"php plain\">)</code></div>\r\n<div class=\"line number113 index112 alt2\"><code class=\"php plain\">-&gt;setBaseRowTotal(</code><code class=\"php variable\">$rowTotal</code><code class=\"php plain\">);</code></div>\r\n<div class=\"line number114 index113 alt1\">&nbsp;</div>\r\n<div class=\"line number115 index114 alt2\"><code class=\"php variable\">$subTotal</code> <code class=\"php plain\">+= </code><code class=\"php variable\">$rowTotal</code><code class=\"php plain\">;</code></div>\r\n<div class=\"line number116 index115 alt1\"><code class=\"php variable\">$order</code><code class=\"php plain\">-&gt;addItem(</code><code class=\"php variable\">$orderItem</code><code class=\"php plain\">);</code></div>\r\n<div class=\"line number117 index116 alt2\"><code class=\"php plain\">}</code></div>\r\n<div class=\"line number118 index117 alt1\">&nbsp;</div>\r\n<div class=\"line number119 index118 alt2\"><code class=\"php variable\">$order</code><code class=\"php plain\">-&gt;setSubtotal(</code><code class=\"php variable\">$subTotal</code><code class=\"php plain\">)</code></div>\r\n<div class=\"line number120 index119 alt1\"><code class=\"php plain\">-&gt;setBaseSubtotal(</code><code class=\"php variable\">$subTotal</code><code class=\"php plain\">)</code></div>\r\n<div class=\"line number121 index120 alt2\"><code class=\"php plain\">-&gt;setGrandTotal(</code><code class=\"php variable\">$subTotal</code><code class=\"php plain\">)</code></div>\r\n<div class=\"line number122 index121 alt1\"><code class=\"php plain\">-&gt;setBaseGrandTotal(</code><code class=\"php variable\">$subTotal</code><code class=\"php plain\">);</code></div>\r\n<div class=\"line number123 index122 alt2\">&nbsp;</div>\r\n<div class=\"line number124 index123 alt1\"><code class=\"php variable\">$transaction</code><code class=\"php plain\">-&gt;addObject(</code><code class=\"php variable\">$order</code><code class=\"php plain\">);</code></div>\r\n<div class=\"line number125 index124 alt2\"><code class=\"php variable\">$transaction</code><code class=\"php plain\">-&gt;addCommitCallback(</code><code class=\"php keyword\">array</code><code class=\"php plain\">(</code><code class=\"php variable\">$order</code><code class=\"php plain\">, </code><code class=\"php string\">\'place\'</code><code class=\"php plain\">));</code></div>\r\n<div class=\"line number126 index125 alt1\"><code class=\"php variable\">$transaction</code><code class=\"php plain\">-&gt;addCommitCallback(</code><code class=\"php keyword\">array</code><code class=\"php plain\">(</code><code class=\"php variable\">$order</code><code class=\"php plain\">, </code><code class=\"php string\">\'save\'</code><code class=\"php plain\">));</code></div>\r\n<div class=\"line number127 index126 alt2\"><code class=\"php variable\">$transaction</code><code class=\"php plain\">-&gt;save();</code></div>\r\n</div>\r\n</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n</div>\r\n</div>\r\n<h2>Creating Customer</h2>\r\n<p>Below is a php code to create a customer account in magento.</p>\r\n<div>\r\n<div id=\"highlighter_614411\" class=\"syntaxhighlighter  php\">\r\n<table border=\"0\" cellspacing=\"0\" cellpadding=\"0\">\r\n<tbody>\r\n<tr>\r\n<td class=\"gutter\">\r\n<div class=\"line number1 index0 alt2\">1</div>\r\n<div class=\"line number2 index1 alt1\">2</div>\r\n<div class=\"line number3 index2 alt2\">3</div>\r\n<div class=\"line number4 index3 alt1\">4</div>\r\n<div class=\"line number5 index4 alt2\">5</div>\r\n<div class=\"line number6 index5 alt1\">6</div>\r\n<div class=\"line number7 index6 alt2\">7</div>\r\n<div class=\"line number8 index7 alt1\">8</div>\r\n<div class=\"line number9 index8 alt2\">9</div>\r\n<div class=\"line number10 index9 alt1\">10</div>\r\n<div class=\"line number11 index10 alt2\">11</div>\r\n<div class=\"line number12 index11 alt1\">12</div>\r\n<div class=\"line number13 index12 alt2\">13</div>\r\n<div class=\"line number14 index13 alt1\">14</div>\r\n<div class=\"line number15 index14 alt2\">15</div>\r\n<div class=\"line number16 index15 alt1\">16</div>\r\n<div class=\"line number17 index16 alt2\">17</div>\r\n<div class=\"line number18 index17 alt1\">18</div>\r\n<div class=\"line number19 index18 alt2\">19</div>\r\n<div class=\"line number20 index19 alt1\">20</div>\r\n</td>\r\n<td class=\"code\">\r\n<div class=\"container\">\r\n<div class=\"line number1 index0 alt2\"><code class=\"php variable\">$customer</code> <code class=\"php plain\">= Mage::getModel(</code><code class=\"php string\">\'customer/customer\'</code><code class=\"php plain\">);</code></div>\r\n<div class=\"line number2 index1 alt1\"><code class=\"php variable\">$password</code> <code class=\"php plain\">= </code><code class=\"php string\">\'test1234\'</code><code class=\"php plain\">;</code></div>\r\n<div class=\"line number3 index2 alt2\"><code class=\"php variable\">$email</code> <code class=\"php plain\">= </code><code class=\"php string\">\'dtest@gmail.com\'</code><code class=\"php plain\">;</code></div>\r\n<div class=\"line number4 index3 alt1\"><code class=\"php variable\">$customer</code><code class=\"php plain\">-&gt;setWebsiteId(Mage::app()-&gt;getWebsite()-&gt;getId());</code></div>\r\n<div class=\"line number5 index4 alt2\"><code class=\"php variable\">$customer</code><code class=\"php plain\">-&gt;loadByEmail(</code><code class=\"php variable\">$email</code><code class=\"php plain\">);</code></div>\r\n<div class=\"line number6 index5 alt1\"><code class=\"php keyword\">if</code><code class=\"php plain\">(!</code><code class=\"php variable\">$customer</code><code class=\"php plain\">-&gt;getId()) {</code></div>\r\n<div class=\"line number7 index6 alt2\"><code class=\"php spaces\">&nbsp;&nbsp;&nbsp;&nbsp;</code><code class=\"php variable\">$groups</code> <code class=\"php plain\">= Mage::getResourceModel(</code><code class=\"php string\">\'customer/group_collection\'</code><code class=\"php plain\">)-&gt;getData();</code></div>\r\n<div class=\"line number8 index7 alt1\"><code class=\"php spaces\">&nbsp;&nbsp;&nbsp;&nbsp;</code><code class=\"php variable\">$groupID</code> <code class=\"php plain\">= </code><code class=\"php string\">\'3\'</code><code class=\"php plain\">;</code></div>\r\n<div class=\"line number9 index8 alt2\">&nbsp;</div>\r\n<div class=\"line number10 index9 alt1\"><code class=\"php spaces\">&nbsp;&nbsp;&nbsp;&nbsp;</code><code class=\"php variable\">$customer</code><code class=\"php plain\">-&gt;setData( </code><code class=\"php string\">\'group_id\'</code><code class=\"php plain\">, </code><code class=\"php variable\">$groupID</code> <code class=\"php plain\">);</code></div>\r\n<div class=\"line number11 index10 alt2\"><code class=\"php spaces\">&nbsp;&nbsp;&nbsp;&nbsp;</code><code class=\"php variable\">$customer</code><code class=\"php plain\">-&gt;setEmail(</code><code class=\"php variable\">$email</code><code class=\"php plain\">);</code></div>\r\n<div class=\"line number12 index11 alt1\"><code class=\"php spaces\">&nbsp;&nbsp;&nbsp;&nbsp;</code><code class=\"php variable\">$customer</code><code class=\"php plain\">-&gt;setFirstname(</code><code class=\"php string\">\'test\'</code><code class=\"php plain\">);</code></div>\r\n<div class=\"line number13 index12 alt2\"><code class=\"php spaces\">&nbsp;&nbsp;&nbsp;&nbsp;</code><code class=\"php variable\">$customer</code><code class=\"php plain\">-&gt;setLastname(</code><code class=\"php string\">\'testing\'</code><code class=\"php plain\">);</code></div>\r\n<div class=\"line number14 index13 alt1\"><code class=\"php spaces\">&nbsp;&nbsp;&nbsp;&nbsp;</code><code class=\"php variable\">$customer</code><code class=\"php plain\">-&gt;setPassword(</code><code class=\"php variable\">$password</code><code class=\"php plain\">);</code></div>\r\n<div class=\"line number15 index14 alt2\">&nbsp;</div>\r\n<div class=\"line number16 index15 alt1\"><code class=\"php spaces\">&nbsp;&nbsp;&nbsp;&nbsp;</code><code class=\"php variable\">$customer</code><code class=\"php plain\">-&gt;setConfirmation(null);</code></div>\r\n<div class=\"line number17 index16 alt2\"><code class=\"php spaces\">&nbsp;&nbsp;&nbsp;&nbsp;</code><code class=\"php variable\">$customer</code><code class=\"php plain\">-&gt;save();</code></div>\r\n<div class=\"line number18 index17 alt1\">&nbsp;</div>\r\n<div class=\"line number19 index18 alt2\"><code class=\"php spaces\">&nbsp;&nbsp;&nbsp;&nbsp;</code><code class=\"php functions\">echo</code> <code class=\"php variable\">$customer</code><code class=\"php plain\">-&gt;getId();</code></div>\r\n<div class=\"line number20 index19 alt1\"><code class=\"php plain\">}</code></div>\r\n</div>\r\n</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n</div>\r\n</div>\r\n<h2>Creating Invoice</h2>\r\n<p>Below is a php code to create invoice for an order in magento.</p>\r\n<div>\r\n<div id=\"highlighter_145910\" class=\"syntaxhighlighter  php\">\r\n<table border=\"0\" cellspacing=\"0\" cellpadding=\"0\">\r\n<tbody>\r\n<tr>\r\n<td class=\"gutter\">\r\n<div class=\"line number1 index0 alt2\">1</div>\r\n<div class=\"line number2 index1 alt1\">2</div>\r\n<div class=\"line number3 index2 alt2\">3</div>\r\n<div class=\"line number4 index3 alt1\">4</div>\r\n<div class=\"line number5 index4 alt2\">5</div>\r\n<div class=\"line number6 index5 alt1\">6</div>\r\n<div class=\"line number7 index6 alt2\">7</div>\r\n<div class=\"line number8 index7 alt1\">8</div>\r\n<div class=\"line number9 index8 alt2\">9</div>\r\n<div class=\"line number10 index9 alt1\">10</div>\r\n<div class=\"line number11 index10 alt2\">11</div>\r\n<div class=\"line number12 index11 alt1\">12</div>\r\n<div class=\"line number13 index12 alt2\">13</div>\r\n<div class=\"line number14 index13 alt1\">14</div>\r\n<div class=\"line number15 index14 alt2\">15</div>\r\n<div class=\"line number16 index15 alt1\">16</div>\r\n<div class=\"line number17 index16 alt2\">17</div>\r\n<div class=\"line number18 index17 alt1\">18</div>\r\n<div class=\"line number19 index18 alt2\">19</div>\r\n<div class=\"line number20 index19 alt1\">20</div>\r\n<div class=\"line number21 index20 alt2\">21</div>\r\n<div class=\"line number22 index21 alt1\">22</div>\r\n<div class=\"line number23 index22 alt2\">23</div>\r\n<div class=\"line number24 index23 alt1\">24</div>\r\n<div class=\"line number25 index24 alt2\">25</div>\r\n<div class=\"line number26 index25 alt1\">26</div>\r\n</td>\r\n<td class=\"code\">\r\n<div class=\"container\">\r\n<div class=\"line number1 index0 alt2\"><code class=\"php variable\">$order</code> <code class=\"php plain\">= Mage::getModel(</code><code class=\"php string\">\'sales/order\'</code><code class=\"php plain\">)-&gt;loadByIncrementId(</code><code class=\"php string\">\'100000001\'</code><code class=\"php plain\">);</code></div>\r\n<div class=\"line number2 index1 alt1\"><code class=\"php keyword\">try</code> <code class=\"php plain\">{</code></div>\r\n<div class=\"line number3 index2 alt2\"><code class=\"php keyword\">if</code><code class=\"php plain\">(!</code><code class=\"php variable\">$order</code><code class=\"php plain\">-&gt;canInvoice())</code></div>\r\n<div class=\"line number4 index3 alt1\"><code class=\"php plain\">{</code></div>\r\n<div class=\"line number5 index4 alt2\"><code class=\"php plain\">Mage::throwException(Mage::helper(</code><code class=\"php string\">\'core\'</code><code class=\"php plain\">)-&gt;__(</code><code class=\"php string\">\'Cannot create an invoice.\'</code><code class=\"php plain\">));</code></div>\r\n<div class=\"line number6 index5 alt1\"><code class=\"php plain\">}</code></div>\r\n<div class=\"line number7 index6 alt2\"><code class=\"php spaces\">&nbsp;</code>&nbsp;</div>\r\n<div class=\"line number8 index7 alt1\"><code class=\"php variable\">$invoice</code> <code class=\"php plain\">= Mage::getModel(</code><code class=\"php string\">\'sales/service_order\'</code><code class=\"php plain\">, </code><code class=\"php variable\">$order</code><code class=\"php plain\">)-&gt;prepareInvoice();</code></div>\r\n<div class=\"line number9 index8 alt2\"><code class=\"php spaces\">&nbsp;</code>&nbsp;</div>\r\n<div class=\"line number10 index9 alt1\"><code class=\"php keyword\">if</code> <code class=\"php plain\">(!</code><code class=\"php variable\">$invoice</code><code class=\"php plain\">-&gt;getTotalQty()) {</code></div>\r\n<div class=\"line number11 index10 alt2\"><code class=\"php plain\">Mage::throwException(Mage::helper(</code><code class=\"php string\">\'core\'</code><code class=\"php plain\">)-&gt;__(</code><code class=\"php string\">\'Cannot create an invoice without products.\'</code><code class=\"php plain\">));</code></div>\r\n<div class=\"line number12 index11 alt1\"><code class=\"php plain\">}</code></div>\r\n<div class=\"line number13 index12 alt2\"><code class=\"php spaces\">&nbsp;</code>&nbsp;</div>\r\n<div class=\"line number14 index13 alt1\"><code class=\"php variable\">$invoice</code><code class=\"php plain\">-&gt;setRequestedCaptureCase(Mage_Sales_Model_Order_Invoice::CAPTURE_ONLINE);</code></div>\r\n<div class=\"line number15 index14 alt2\"><code class=\"php comments\">//Or you can use</code></div>\r\n<div class=\"line number16 index15 alt1\"><code class=\"php comments\">//$invoice-&gt;setRequestedCaptureCase(Mage_Sales_Model_Order_Invoice::CAPTURE_OFFLINE);</code></div>\r\n<div class=\"line number17 index16 alt2\"><code class=\"php variable\">$invoice</code><code class=\"php plain\">-&gt;register();</code></div>\r\n<div class=\"line number18 index17 alt1\"><code class=\"php variable\">$transactionSave</code> <code class=\"php plain\">= Mage::getModel(</code><code class=\"php string\">\'core/resource_transaction\'</code><code class=\"php plain\">)</code></div>\r\n<div class=\"line number19 index18 alt2\"><code class=\"php plain\">-&gt;addObject(</code><code class=\"php variable\">$invoice</code><code class=\"php plain\">)</code></div>\r\n<div class=\"line number20 index19 alt1\"><code class=\"php plain\">-&gt;addObject(</code><code class=\"php variable\">$invoice</code><code class=\"php plain\">-&gt;getOrder());</code></div>\r\n<div class=\"line number21 index20 alt2\"><code class=\"php spaces\">&nbsp;</code>&nbsp;</div>\r\n<div class=\"line number22 index21 alt1\"><code class=\"php variable\">$transactionSave</code><code class=\"php plain\">-&gt;save();</code></div>\r\n<div class=\"line number23 index22 alt2\"><code class=\"php plain\">}</code></div>\r\n<div class=\"line number24 index23 alt1\"><code class=\"php keyword\">catch</code> <code class=\"php plain\">(Mage_Core_Exception </code><code class=\"php variable\">$e</code><code class=\"php plain\">) {</code></div>\r\n<div class=\"line number25 index24 alt2\"><code class=\"php spaces\">&nbsp;</code>&nbsp;</div>\r\n<div class=\"line number26 index25 alt1\"><code class=\"php plain\">}</code></div>\r\n</div>\r\n</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n</div>\r\n</div>\r\n<h2>Create Shipment</h2>\r\n<p>Below is a php code to create a shipment for an order in magento.</p>\r\n<div>\r\n<div id=\"highlighter_285003\" class=\"syntaxhighlighter  php\">\r\n<table border=\"0\" cellspacing=\"0\" cellpadding=\"0\">\r\n<tbody>\r\n<tr>\r\n<td class=\"gutter\">\r\n<div class=\"line number1 index0 alt2\">1</div>\r\n<div class=\"line number2 index1 alt1\">2</div>\r\n<div class=\"line number3 index2 alt2\">3</div>\r\n<div class=\"line number4 index3 alt1\">4</div>\r\n<div class=\"line number5 index4 alt2\">5</div>\r\n<div class=\"line number6 index5 alt1\">6</div>\r\n<div class=\"line number7 index6 alt2\">7</div>\r\n<div class=\"line number8 index7 alt1\">8</div>\r\n<div class=\"line number9 index8 alt2\">9</div>\r\n<div class=\"line number10 index9 alt1\">10</div>\r\n<div class=\"line number11 index10 alt2\">11</div>\r\n<div class=\"line number12 index11 alt1\">12</div>\r\n<div class=\"line number13 index12 alt2\">13</div>\r\n</td>\r\n<td class=\"code\">\r\n<div class=\"container\">\r\n<div class=\"line number1 index0 alt2\"><code class=\"php variable\">$order</code> <code class=\"php plain\">= Mage::getModel(</code><code class=\"php string\">\'sales/order\'</code><code class=\"php plain\">)-&gt;loadByIncrementId(</code><code class=\"php string\">\'100000001\'</code><code class=\"php plain\">);</code></div>\r\n<div class=\"line number2 index1 alt1\"><code class=\"php keyword\">try</code> <code class=\"php plain\">{</code></div>\r\n<div class=\"line number3 index2 alt2\"><code class=\"php spaces\">&nbsp;&nbsp;&nbsp;&nbsp;</code><code class=\"php keyword\">if</code><code class=\"php plain\">(</code><code class=\"php variable\">$order</code><code class=\"php plain\">-&gt;canShip()) {</code></div>\r\n<div class=\"line number4 index3 alt1\"><code class=\"php spaces\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</code><code class=\"php comments\">//Create shipment</code></div>\r\n<div class=\"line number5 index4 alt2\"><code class=\"php spaces\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</code><code class=\"php variable\">$shipmentid</code> <code class=\"php plain\">= Mage::getModel(</code><code class=\"php string\">\'sales/order_shipment_api\'</code><code class=\"php plain\">)</code></div>\r\n<div class=\"line number6 index5 alt1\"><code class=\"php spaces\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</code><code class=\"php plain\">-&gt;create(</code><code class=\"php variable\">$order</code><code class=\"php plain\">-&gt;getIncrementId(), </code><code class=\"php keyword\">array</code><code class=\"php plain\">());</code></div>\r\n<div class=\"line number7 index6 alt2\"><code class=\"php spaces\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</code><code class=\"php comments\">//Add tracking information</code></div>\r\n<div class=\"line number8 index7 alt1\"><code class=\"php spaces\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</code><code class=\"php variable\">$ship</code> <code class=\"php plain\">= Mage::getModel(</code><code class=\"php string\">\'sales/order_shipment_api\'</code><code class=\"php plain\">)</code></div>\r\n<div class=\"line number9 index8 alt2\"><code class=\"php spaces\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</code><code class=\"php plain\">-&gt;addTrack(</code><code class=\"php variable\">$order</code><code class=\"php plain\">-&gt;getIncrementId(), </code><code class=\"php keyword\">array</code><code class=\"php plain\">());&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</code></div>\r\n<div class=\"line number10 index9 alt1\"><code class=\"php spaces\">&nbsp;&nbsp;&nbsp;&nbsp;</code><code class=\"php plain\">}</code></div>\r\n<div class=\"line number11 index10 alt2\"><code class=\"php plain\">}</code><code class=\"php keyword\">catch</code> <code class=\"php plain\">(Mage_Core_Exception </code><code class=\"php variable\">$e</code><code class=\"php plain\">) {</code></div>\r\n<div class=\"line number12 index11 alt1\"><code class=\"php spaces\">&nbsp;</code><code class=\"php plain\">print_r(</code><code class=\"php variable\">$e</code><code class=\"php plain\">);</code></div>\r\n<div class=\"line number13 index12 alt2\"><code class=\"php plain\">}</code></div>\r\n</div>\r\n</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n</div>\r\n</div>\r\n<h2>Creating Credit Memo</h2>\r\n<p>Below is a php code to create a credit memo for an order in magento.</p>\r\n<div>\r\n<div id=\"highlighter_633774\" class=\"syntaxhighlighter  php\">\r\n<table border=\"0\" cellspacing=\"0\" cellpadding=\"0\">\r\n<tbody>\r\n<tr>\r\n<td class=\"gutter\">\r\n<div class=\"line number1 index0 alt2\">1</div>\r\n<div class=\"line number2 index1 alt1\">2</div>\r\n<div class=\"line number3 index2 alt2\">3</div>\r\n<div class=\"line number4 index3 alt1\">4</div>\r\n<div class=\"line number5 index4 alt2\">5</div>\r\n<div class=\"line number6 index5 alt1\">6</div>\r\n<div class=\"line number7 index6 alt2\">7</div>\r\n<div class=\"line number8 index7 alt1\">8</div>\r\n<div class=\"line number9 index8 alt2\">9</div>\r\n<div class=\"line number10 index9 alt1\">10</div>\r\n<div class=\"line number11 index10 alt2\">11</div>\r\n<div class=\"line number12 index11 alt1\">12</div>\r\n<div class=\"line number13 index12 alt2\">13</div>\r\n<div class=\"line number14 index13 alt1\">14</div>\r\n<div class=\"line number15 index14 alt2\">15</div>\r\n<div class=\"line number16 index15 alt1\">16</div>\r\n<div class=\"line number17 index16 alt2\">17</div>\r\n<div class=\"line number18 index17 alt1\">18</div>\r\n<div class=\"line number19 index18 alt2\">19</div>\r\n<div class=\"line number20 index19 alt1\">20</div>\r\n<div class=\"line number21 index20 alt2\">21</div>\r\n<div class=\"line number22 index21 alt1\">22</div>\r\n<div class=\"line number23 index22 alt2\">23</div>\r\n<div class=\"line number24 index23 alt1\">24</div>\r\n<div class=\"line number25 index24 alt2\">25</div>\r\n<div class=\"line number26 index25 alt1\">26</div>\r\n<div class=\"line number27 index26 alt2\">27</div>\r\n<div class=\"line number28 index27 alt1\">28</div>\r\n<div class=\"line number29 index28 alt2\">29</div>\r\n<div class=\"line number30 index29 alt1\">30</div>\r\n<div class=\"line number31 index30 alt2\">31</div>\r\n<div class=\"line number32 index31 alt1\">32</div>\r\n<div class=\"line number33 index32 alt2\">33</div>\r\n<div class=\"line number34 index33 alt1\">34</div>\r\n<div class=\"line number35 index34 alt2\">35</div>\r\n<div class=\"line number36 index35 alt1\">36</div>\r\n<div class=\"line number37 index36 alt2\">37</div>\r\n<div class=\"line number38 index37 alt1\">38</div>\r\n<div class=\"line number39 index38 alt2\">39</div>\r\n<div class=\"line number40 index39 alt1\">40</div>\r\n<div class=\"line number41 index40 alt2\">41</div>\r\n<div class=\"line number42 index41 alt1\">42</div>\r\n<div class=\"line number43 index42 alt2\">43</div>\r\n<div class=\"line number44 index43 alt1\">44</div>\r\n<div class=\"line number45 index44 alt2\">45</div>\r\n<div class=\"line number46 index45 alt1\">46</div>\r\n<div class=\"line number47 index46 alt2\">47</div>\r\n<div class=\"line number48 index47 alt1\">48</div>\r\n<div class=\"line number49 index48 alt2\">49</div>\r\n<div class=\"line number50 index49 alt1\">50</div>\r\n<div class=\"line number51 index50 alt2\">51</div>\r\n<div class=\"line number52 index51 alt1\">52</div>\r\n</td>\r\n<td class=\"code\">\r\n<div class=\"container\">\r\n<div class=\"line number1 index0 alt2\"><code class=\"php variable\">$order</code> <code class=\"php plain\">= Mage::getModel(</code><code class=\"php string\">\'sales/order\'</code><code class=\"php plain\">)-&gt;load(</code><code class=\"php string\">\'100000001\'</code><code class=\"php plain\">, </code><code class=\"php string\">\'increment_id\'</code><code class=\"php plain\">);</code></div>\r\n<div class=\"line number2 index1 alt1\"><code class=\"php spaces\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</code><code class=\"php keyword\">if</code> <code class=\"php plain\">(!</code><code class=\"php variable\">$order</code><code class=\"php plain\">-&gt;getId()) {</code></div>\r\n<div class=\"line number3 index2 alt2\"><code class=\"php spaces\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</code><code class=\"php variable\">$this</code><code class=\"php plain\">-&gt;_fault(</code><code class=\"php string\">\'order_not_exists\'</code><code class=\"php plain\">);</code></div>\r\n<div class=\"line number4 index3 alt1\"><code class=\"php spaces\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</code><code class=\"php plain\">}</code></div>\r\n<div class=\"line number5 index4 alt2\"><code class=\"php spaces\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</code><code class=\"php keyword\">if</code> <code class=\"php plain\">(!</code><code class=\"php variable\">$order</code><code class=\"php plain\">-&gt;canCreditmemo()) {</code></div>\r\n<div class=\"line number6 index5 alt1\"><code class=\"php spaces\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</code><code class=\"php variable\">$this</code><code class=\"php plain\">-&gt;_fault(</code><code class=\"php string\">\'cannot_create_creditmemo\'</code><code class=\"php plain\">);</code></div>\r\n<div class=\"line number7 index6 alt2\"><code class=\"php spaces\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</code><code class=\"php plain\">}</code></div>\r\n<div class=\"line number8 index7 alt1\"><code class=\"php spaces\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</code><code class=\"php variable\">$data</code> <code class=\"php plain\">= </code><code class=\"php keyword\">array</code><code class=\"php plain\">();</code></div>\r\n<div class=\"line number9 index8 alt2\">&nbsp;</div>\r\n<div class=\"line number10 index9 alt1\"><code class=\"php spaces\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</code>&nbsp;</div>\r\n<div class=\"line number11 index10 alt2\"><code class=\"php spaces\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</code><code class=\"php variable\">$service</code> <code class=\"php plain\">= Mage::getModel(</code><code class=\"php string\">\'sales/service_order\'</code><code class=\"php plain\">, </code><code class=\"php variable\">$order</code><code class=\"php plain\">);</code></div>\r\n<div class=\"line number12 index11 alt1\"><code class=\"php spaces\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</code>&nbsp;</div>\r\n<div class=\"line number13 index12 alt2\"><code class=\"php spaces\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</code><code class=\"php variable\">$creditmemo</code> <code class=\"php plain\">= </code><code class=\"php variable\">$service</code><code class=\"php plain\">-&gt;prepareCreditmemo(</code><code class=\"php variable\">$data</code><code class=\"php plain\">);</code></div>\r\n<div class=\"line number14 index13 alt1\">&nbsp;</div>\r\n<div class=\"line number15 index14 alt2\"><code class=\"php spaces\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</code><code class=\"php comments\">// refund to Store Credit</code></div>\r\n<div class=\"line number16 index15 alt1\"><code class=\"php spaces\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</code><code class=\"php keyword\">if</code> <code class=\"php plain\">(</code><code class=\"php variable\">$refundToStoreCreditAmount</code><code class=\"php plain\">) {</code></div>\r\n<div class=\"line number17 index16 alt2\"><code class=\"php spaces\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</code><code class=\"php comments\">// check if refund to Store Credit is available</code></div>\r\n<div class=\"line number18 index17 alt1\"><code class=\"php spaces\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</code><code class=\"php keyword\">if</code> <code class=\"php plain\">(</code><code class=\"php variable\">$order</code><code class=\"php plain\">-&gt;getCustomerIsGuest()) {</code></div>\r\n<div class=\"line number19 index18 alt2\"><code class=\"php spaces\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</code><code class=\"php variable\">$this</code><code class=\"php plain\">-&gt;_fault(</code><code class=\"php string\">\'cannot_refund_to_storecredit\'</code><code class=\"php plain\">);</code></div>\r\n<div class=\"line number20 index19 alt1\"><code class=\"php spaces\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</code><code class=\"php plain\">}</code></div>\r\n<div class=\"line number21 index20 alt2\"><code class=\"php spaces\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</code><code class=\"php variable\">$refundToStoreCreditAmount</code> <code class=\"php plain\">= max(</code></div>\r\n<div class=\"line number22 index21 alt1\"><code class=\"php spaces\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</code><code class=\"php plain\">0,</code></div>\r\n<div class=\"line number23 index22 alt2\"><code class=\"php spaces\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</code><code class=\"php plain\">min(</code><code class=\"php variable\">$creditmemo</code><code class=\"php plain\">-&gt;getBaseCustomerBalanceReturnMax(), </code><code class=\"php variable\">$refundToStoreCreditAmount</code><code class=\"php plain\">)</code></div>\r\n<div class=\"line number24 index23 alt1\"><code class=\"php spaces\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</code><code class=\"php plain\">);</code></div>\r\n<div class=\"line number25 index24 alt2\"><code class=\"php spaces\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</code><code class=\"php keyword\">if</code> <code class=\"php plain\">(</code><code class=\"php variable\">$refundToStoreCreditAmount</code><code class=\"php plain\">) {</code></div>\r\n<div class=\"line number26 index25 alt1\"><code class=\"php spaces\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</code><code class=\"php variable\">$refundToStoreCreditAmount</code> <code class=\"php plain\">= </code><code class=\"php variable\">$creditmemo</code><code class=\"php plain\">-&gt;getStore()-&gt;roundPrice(</code><code class=\"php variable\">$refundToStoreCreditAmount</code><code class=\"php plain\">);</code></div>\r\n<div class=\"line number27 index26 alt2\"><code class=\"php spaces\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</code><code class=\"php variable\">$creditmemo</code><code class=\"php plain\">-&gt;setBaseCustomerBalanceTotalRefunded(</code><code class=\"php variable\">$refundToStoreCreditAmount</code><code class=\"php plain\">);</code></div>\r\n<div class=\"line number28 index27 alt1\"><code class=\"php spaces\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</code><code class=\"php variable\">$refundToStoreCreditAmount</code> <code class=\"php plain\">= </code><code class=\"php variable\">$creditmemo</code><code class=\"php plain\">-&gt;getStore()-&gt;roundPrice(</code></div>\r\n<div class=\"line number29 index28 alt2\"><code class=\"php spaces\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</code><code class=\"php variable\">$refundToStoreCreditAmount</code><code class=\"php plain\">*</code><code class=\"php variable\">$order</code><code class=\"php plain\">-&gt;getStoreToOrderRate()</code></div>\r\n<div class=\"line number30 index29 alt1\"><code class=\"php spaces\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</code><code class=\"php plain\">);</code></div>\r\n<div class=\"line number31 index30 alt2\"><code class=\"php spaces\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</code><code class=\"php comments\">// this field can be used by customer balance observer</code></div>\r\n<div class=\"line number32 index31 alt1\"><code class=\"php spaces\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</code><code class=\"php variable\">$creditmemo</code><code class=\"php plain\">-&gt;setBsCustomerBalTotalRefunded(</code><code class=\"php variable\">$refundToStoreCreditAmount</code><code class=\"php plain\">);</code></div>\r\n<div class=\"line number33 index32 alt2\"><code class=\"php spaces\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</code><code class=\"php comments\">// setting flag to make actual refund to customer balance after credit memo save</code></div>\r\n<div class=\"line number34 index33 alt1\"><code class=\"php spaces\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</code><code class=\"php variable\">$creditmemo</code><code class=\"php plain\">-&gt;setCustomerBalanceRefundFlag(true);</code></div>\r\n<div class=\"line number35 index34 alt2\"><code class=\"php spaces\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</code><code class=\"php plain\">}</code></div>\r\n<div class=\"line number36 index35 alt1\"><code class=\"php spaces\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</code><code class=\"php plain\">}</code></div>\r\n<div class=\"line number37 index36 alt2\"><code class=\"php spaces\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</code><code class=\"php variable\">$creditmemo</code><code class=\"php plain\">-&gt;setPaymentRefundDisallowed(true)-&gt;register();</code></div>\r\n<div class=\"line number38 index37 alt1\"><code class=\"php spaces\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</code><code class=\"php comments\">// add comment to creditmemo</code></div>\r\n<div class=\"line number39 index38 alt2\"><code class=\"php spaces\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</code><code class=\"php keyword\">if</code> <code class=\"php plain\">(!</code><code class=\"php functions\">empty</code><code class=\"php plain\">(</code><code class=\"php variable\">$comment</code><code class=\"php plain\">)) {</code></div>\r\n<div class=\"line number40 index39 alt1\"><code class=\"php spaces\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</code><code class=\"php variable\">$creditmemo</code><code class=\"php plain\">-&gt;addComment(</code><code class=\"php variable\">$comment</code><code class=\"php plain\">, </code><code class=\"php variable\">$notifyCustomer</code><code class=\"php plain\">);</code></div>\r\n<div class=\"line number41 index40 alt2\"><code class=\"php spaces\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</code><code class=\"php plain\">}</code></div>\r\n<div class=\"line number42 index41 alt1\"><code class=\"php spaces\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</code><code class=\"php keyword\">try</code> <code class=\"php plain\">{</code></div>\r\n<div class=\"line number43 index42 alt2\"><code class=\"php spaces\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</code><code class=\"php plain\">Mage::getModel(</code><code class=\"php string\">\'core/resource_transaction\'</code><code class=\"php plain\">)</code></div>\r\n<div class=\"line number44 index43 alt1\"><code class=\"php spaces\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</code><code class=\"php plain\">-&gt;addObject(</code><code class=\"php variable\">$creditmemo</code><code class=\"php plain\">)</code></div>\r\n<div class=\"line number45 index44 alt2\"><code class=\"php spaces\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</code><code class=\"php plain\">-&gt;addObject(</code><code class=\"php variable\">$order</code><code class=\"php plain\">)</code></div>\r\n<div class=\"line number46 index45 alt1\"><code class=\"php spaces\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</code><code class=\"php plain\">-&gt;save();</code></div>\r\n<div class=\"line number47 index46 alt2\"><code class=\"php spaces\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</code><code class=\"php comments\">// send email notification</code></div>\r\n<div class=\"line number48 index47 alt1\"><code class=\"php spaces\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</code><code class=\"php variable\">$creditmemo</code><code class=\"php plain\">-&gt;sendEmail(</code><code class=\"php variable\">$notifyCustomer</code><code class=\"php plain\">, (</code><code class=\"php variable\">$includeComment</code> <code class=\"php plain\">? </code><code class=\"php variable\">$comment</code> <code class=\"php plain\">: </code><code class=\"php string\">\'\'</code><code class=\"php plain\">));</code></div>\r\n<div class=\"line number49 index48 alt2\"><code class=\"php spaces\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</code><code class=\"php plain\">} </code><code class=\"php keyword\">catch</code> <code class=\"php plain\">(Mage_Core_Exception </code><code class=\"php variable\">$e</code><code class=\"php plain\">) {</code></div>\r\n<div class=\"line number50 index49 alt1\"><code class=\"php spaces\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</code><code class=\"php variable\">$this</code><code class=\"php plain\">-&gt;_fault(</code><code class=\"php string\">\'data_invalid\'</code><code class=\"php plain\">, </code><code class=\"php variable\">$e</code><code class=\"php plain\">-&gt;getMessage());</code></div>\r\n<div class=\"line number51 index50 alt2\"><code class=\"php spaces\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</code><code class=\"php plain\">}</code></div>\r\n<div class=\"line number52 index51 alt1\"><code class=\"php spaces\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</code><code class=\"php functions\">echo</code> <code class=\"php variable\">$creditmemo</code><code class=\"php plain\">-&gt;getIncrementId();</code></div>\r\n</div>\r\n</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n</div>\r\n</div>\r\n<div class=\"end\">These are only few code snippets. If you need any more additional code snippets let me know i will add them or you can your self submit more code snippets and i will publish them.</div>\r\n<p>- See more at: http://excellencemagentoblog.com/useful-code-snippets#sthash.03DwTUNH.dpuf</p>', '1', '0', '2014-08-20 14:19:40', '1');
INSERT INTO `tbl_news` VALUES ('35', 'tùng đại ka', 'tung-dai-ka', '', '1', '25', '2014-08-19 10:54:46', '1');
INSERT INTO `tbl_news` VALUES ('36', 'Đặc nhiệm cơ động - ‘quả đấm thép’ của Công an TP HCM', 'Dac-nhiem-co-dong-qua-dam-thep-cua-Cong-an-TP-HCM', '<div class=\"short_intro txt_666\">Đạp tung c&aacute;nh cửa, chỉ trong v&agrave;i gi&acirc;y, c&aacute;c cảnh s&aacute;t cơ động ập v&agrave;o khống chế nam thanh ni&ecirc;n đang giữ người t&igrave;nh l&agrave;m con tin, &ocirc;m b&igrave;nh gas cố thủ suốt 9 giờ trong căn ph&ograve;ng kh&oacute;a k&iacute;n.</div>\r\n<div id=\"left_calculator\">\r\n<div class=\"fck_detail width_common\">\r\n<p class=\"Normal\">Giữa c&aacute;i nắng oi bức của S&agrave;i G&ograve;n, rất đ&ocirc;ng cảnh s&aacute;t v&agrave; h&agrave;ng trăm người d&acirc;n hiếu kỳ v&acirc;y k&iacute;n d&atilde;y ph&ograve;ng trọ lợp t&ocirc;n lụp xụp tr&ecirc;n đường T&acirc;n Thới Hiệp (phường T&acirc;n Thới Hiệp, quận 12, TP HCM). B&ecirc;n trong lớp cửa gỗ kho&aacute; k&iacute;n, một nam thanh ni&ecirc;n đang khống chế người phụ nữ, li&ecirc;n tục g&agrave;o th&eacute;t bằng giọng kh&agrave;n đục, hăm doạ &ldquo;sẽ giết con n&agrave;y nếu ai x&ocirc;ng v&agrave;o\".</p>\r\n<p class=\"Normal\">Sau nhiều giờ cố thủ v&agrave; li&ecirc;n tục thay đổi y&ecirc;u s&aacute;ch, hắn quay ra &ocirc;m b&igrave;nh gas loại lớn, tay lăm lăm bật lửa doạ cho nổ tung. Trước t&igrave;nh h&igrave;nh n&agrave;y, c&ocirc;ng an địa phương phải nới lỏng v&ograve;ng v&acirc;y, di tản người d&acirc;n, xin chi viện. Nhận trọng tr&aacute;ch phải giải cứu con tin, đảm bảo an to&agrave;n t&iacute;nh mạng cho nhiều người, một tổ c&ocirc;ng t&aacute;c của Đại đội cảnh s&aacute;t đặc nhiệm thuộc Trung Đo&agrave;n cảnh s&aacute;t cơ động, C&ocirc;ng an TP HCM được trang bị vũ kh&iacute; c&oacute; mặt ngay sau đ&oacute;.</p>\r\n<table class=\"tplCaption\" border=\"0\" cellspacing=\"0\" cellpadding=\"3\" align=\"center\">\r\n<tbody>\r\n<tr>\r\n<td><img src=\"http://m.f29.img.vnecdn.net/2014/08/18/codongtphcm-8658-1408374920.jpg\" alt=\"codongtphcm-8658-1408374920.jpg\" data-natural-=\"\" data-width=\"500\" data-pwidth=\"480\" /></td>\r\n</tr>\r\n<tr>\r\n<td>\r\n<p class=\"Image\">Cảnh s&aacute;t cơ động trấn &aacute;p kẻ khống chế con tin tại quận 12. <em>Ảnh: Hồng Ph&uacute;c.</em></p>\r\n</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n<p class=\"Normal\">Điều nghi&ecirc;n hiện trường, c&aacute;c trinh s&aacute;t đặc nhiệm vạch kế hoạch phải v&agrave;o được căn ph&ograve;ng trọ số 3 được thiết kế k&iacute;n như chiếc hộp, c&oacute; duy nhất cửa ra v&agrave;o v&agrave; một cửa sổ. L&uacute;c n&agrave;y, g&atilde; thanh ni&ecirc;n ngồi trong g&oacute;c ph&ograve;ng c&ugrave;ng b&igrave;nh gas lớn. Người phụ nữ kh&ocirc;ng c&ograve;n bị khống chế nhưng đứng gần b&ecirc;n la lớn: &ldquo;Mấy người đi hết đi kh&ocirc;ng n&oacute; giết t&ocirc;i&rdquo;. Nghi phạm v&agrave; nạn nh&acirc;n được x&aacute;c định l&agrave; người t&igrave;nh của nhau. G&atilde; thanh ni&ecirc;n&nbsp;L&ecirc; Văn Tuấn (31 tuổi),nghiện ma t&uacute;y nặng, từng nhiều lần đe giết cả cha mẹ v&agrave; hiện hăm dọa sẽ giết con tin, cho nổ tung ph&ograve;ng trọ nếu c&ocirc;ng an kh&ocirc;ng cung cấp tiền, xe... cho hắn.</p>\r\n<p class=\"Normal\">&ldquo;Người phụ nữ c&oacute; nhiều dấu hiệu th&ocirc;ng đồng, khả năng bị anh ta g&acirc;y nguy hiểm kh&ocirc;ng cao, song kh&ocirc;ng loại trừ khả năng hắn quyết t&acirc;m cho nổ b&igrave;nh gas nếu ch&uacute;ng t&ocirc;i cứ thế x&ocirc;ng v&agrave;o. Kế hoạch l&uacute;c đ&oacute; được đặt ra l&agrave; phải l&agrave;m quyết liệt, gọn g&agrave;ng kh&ocirc;ng chủ quan&rdquo;, đại u&yacute; Trần Huỳnh Ho&agrave;ng Qu&acirc;n, Ph&oacute; đại đội trưởng, Đại đội đặc nhiệm, n&oacute;i.</p>\r\n<p class=\"Normal\">Chỉ v&agrave;i ph&uacute;t l&ecirc;n phương &aacute;n, hơn chục trinh s&aacute;t nhẹ nh&agrave;ng &eacute;m trước cửa ph&ograve;ng trọ. Sau tiếng gỗ g&atilde;y kh&ocirc; khốc, cửa ph&ograve;ng bị đạp tung, đạn kh&oacute;i được n&eacute;m v&agrave;o ph&ograve;ng. Trong t&iacute;ch tắc, g&atilde; thanh ni&ecirc;n bị khống chế, đ&egrave; s&aacute;t dưới đất, kh&ocirc;ng kịp phản ứng. Chỉ tham gia vụ việc trong khoảng thời gian rất ngắn nhưng c&aacute;c chiến sĩ cảnh s&aacute;t cơ động đ&atilde; kết th&uacute;c 9 tiếng đấu tranh căng thẳng với nghi can muốn cưỡng đoạt t&agrave;i sản.</p>\r\n<table class=\"tplCaption\" border=\"0\" cellspacing=\"0\" cellpadding=\"3\" align=\"center\">\r\n<tbody>\r\n<tr>\r\n<td><img src=\"http://m.f29.img.vnecdn.net/2014/08/18/canh-sat-co-dong-4066-1408376981.jpg\" alt=\"canh-sat-co-dong-4066-1408376981.jpg\" data-natural-=\"\" data-width=\"500\" data-pwidth=\"480\" /></td>\r\n</tr>\r\n<tr>\r\n<td>\r\n<p class=\"Image\">Cảnh s&aacute;t cơ động C&ocirc;ng an TP HCM l&agrave; lực lượng tinh nhuệ chuy&ecirc;n xử l&yacute; c&aacute;c t&igrave;nh huống an ninh trật tự phức tạp, nguy hiểm. Ảnh: <em>Quốc Thắng</em></p>\r\n</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n<p class=\"Normal\"><strong>Được mệnh danh l&agrave; &ldquo;Quả đấm th&eacute;p&rdquo; của C&ocirc;ng an TP HCM, 26 năm trước (16/8/1988),</strong> Trung Đo&agrave;n cảnh s&aacute;t cơ động (trực thuộc Ban Chỉ huy Cảnh s&aacute;t nh&acirc;n d&acirc;n - C&ocirc;ng an TP HCM) ra đời trong bối cảnh th&agrave;nh phố cần một lực lượng tinh nhuệ, ứng ph&oacute; kịp thời với c&aacute;c t&igrave;nh huống phức tạp, đảm bảo an ninh trật tự, sẵn s&agrave;ng trấn &aacute;p v&agrave; ngăn chặn kịp thời những vụ bạo loạn hoặc g&acirc;y rối trật tự c&ocirc;ng cộng, bố tr&iacute; đ&oacute;ng qu&acirc;n tại c&aacute;c cửa ng&otilde; của th&agrave;nh phố.</p>\r\n<p class=\"Normal\">Ngo&agrave;i những chiến c&ocirc;ng về giải cứu con tin, truy qu&eacute;t tệ nạn x&atilde; hội, bắt nhiều kẻ c&oacute; lệnh truy n&atilde;, trộm cướp&hellip; lực lượng cảnh s&aacute;t cơ động c&ograve;n thực hiện nhiều nhiệm vụ kh&oacute; khăn kh&aacute;c như bắt tr&ugrave;m ma t&uacute;y Phạm Văn Hạnh (tức Hạnh Cầm) hồi cuối th&aacute;ng 8/2003. Lần đ&oacute;, nhận được lệnh hỗ trợ, trung đo&agrave;n đ&atilde; điều động Đội Đặc nhiệm, 10 ch&oacute; nghiệp vụ v&agrave; một trung đội của Tiểu đo&agrave;n 3 tham gia phối hợp với ban chuy&ecirc;n &aacute;n để triệt ph&aacute; băng nh&oacute;m Hạnh Cầm tại x&atilde; Xu&acirc;n T&acirc;n (Long Kh&aacute;nh, Đồng Nai).</p>\r\n<p class=\"Normal\">Rạng s&aacute;ng 22/8/2013, nhiều mũi trinh s&aacute;t đ&atilde; cắt h&agrave;ng r&agrave;o, &aacute;p s&aacute;t mục ti&ecirc;u. Khi được lệnh, đồng loạt nhiều mũi tấn c&ocirc;ng trực hiện v&agrave;o căn nh&agrave; l&agrave; s&agrave;o huyệt bắt được t&ecirc;n n&agrave;y v&agrave; đồng bọn. Nhiều vũ kh&iacute;, heroin, ngoại tệ bị thu giữ.</p>\r\n<p class=\"Normal\">Mới đ&acirc;y, lợi dụng t&igrave;nh h&igrave;nh căng thẳng ở biển Đ&ocirc;ng, nhiều kẻ k&iacute;ch động người d&acirc;n đập ph&aacute; c&aacute;c khu c&ocirc;ng nghiệp, khu chế xuất c&oacute; c&aacute;c doanh nghiệp nước ngo&agrave;i hoạt động. Tại TP HCM, đ&acirc;y l&agrave; c&aacute;c mục ti&ecirc;u được ưu ti&ecirc;n bảo vệ n&ecirc;n h&agrave;ng ngh&igrave;n chiến sĩ cảnh s&aacute;t cơ động được huy động tham gia phối hợp, ngăn chặn, &aacute;n ngữ tại cổng tạo th&agrave;nh những h&agrave;ng r&agrave;o người, ngăn chặn đ&aacute;m đ&ocirc;ng qu&aacute; kh&iacute;ch. Suốt nhiều giờ t&uacute;c trực, lớp lớp c&aacute;c chiến sĩ tay chắc l&aacute; chắn, d&agrave;n h&agrave;ng ngang hứng chịu những đợt &ldquo;mưa&rdquo; gạch đ&aacute;,&nbsp; bom xăng, ớt bột, gậy gộc... Sau khi đẩy l&ugrave;i c&aacute;c nh&oacute;m ph&aacute; hoại, qu&aacute; kh&iacute;ch n&agrave;y, suốt nhiều ng&agrave;y sau đ&oacute; cảnh s&aacute;t cơ động vẫn thay nhau b&aacute;m trụ để bảo vệ mục ti&ecirc;u.</p>\r\n<table class=\"tplCaption\" border=\"0\" cellspacing=\"0\" cellpadding=\"3\" align=\"center\">\r\n<tbody>\r\n<tr>\r\n<td><img src=\"http://m.f29.img.vnecdn.net/2014/08/18/codong2-2222-1408374920.jpg\" alt=\"codong2-2222-1408374920.jpg\" data-natural-=\"\" data-width=\"500\" data-pwidth=\"480\" /></td>\r\n</tr>\r\n<tr>\r\n<td>\r\n<p class=\"Image\">Lực lượng cơ động được trang bị kh&iacute; t&agrave;i &nbsp;tối t&acirc;n được xem l&agrave; \"quả đấm th&eacute;p\" của c&ocirc;ng an TP HCM. Ảnh: <em>Quốc Thắng.</em></p>\r\n</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n<p class=\"Normal\">&ldquo;Đ&oacute; l&agrave; cuộc trấn &aacute;p quy m&ocirc; lớn nhất từ trước đến nay của Trung đo&agrave;n. Do triển khai lực lượng nhanh v&agrave; kịp thời theo chỉ đạo xử l&yacute; dứt điểm n&ecirc;n đ&atilde; giảm tối đa thiệt hại cho c&aacute;c cụm khu c&ocirc;ng nghiệp, khu chế xuất tại TP HCM so với c&aacute;c địa phương kh&aacute;c&rdquo;, trung t&aacute; Huỳnh Văn H&ugrave;ng, Ph&oacute; Trung đo&agrave;n trưởng Trung đo&agrave;n cảnh s&aacute;t cơ động (C&ocirc;ng an TP HCM) cho hay.</p>\r\n<p class=\"Normal\">Cũng theo trung t&aacute; H&ugrave;ng, đặc th&ugrave; của l&iacute;nh cơ động l&agrave; chiến đấu tập trung v&agrave; chủ yếu l&agrave; c&aacute;c chiến sĩ trẻ. Trung đo&agrave;n lu&ocirc;n chuẩn bị sẵn s&agrave;ng lực lượng, thường xuy&ecirc;n luyện tập thuần thục c&aacute;c kỹ năng, chiến thuật tấn c&ocirc;ng. Ngo&agrave;i ra, lực lượng cơ động gồm 4 tiểu đo&agrave;n l&ecirc;n nhiều kế hoach tuần tra kiểm so&aacute;t, phối hợp với c&aacute;c c&ocirc;ng an địa phương để đảm bảo an ninh trật tự nhiều khu vực phức tạp. &ldquo;Lực lượng trung đo&agrave;n đ&atilde; tham gia nhiều chuy&ecirc;n &aacute;n lớn, trấn &aacute;p c&aacute;c băng nh&oacute;m d&ugrave;ng h&agrave;ng n&oacute;ng, tội phạm ma tu&yacute; v&agrave; thường xuy&ecirc;n l&ecirc;n kế hoạch tuần tra kiểm so&aacute;t đảm bảo an ninh trật tự tr&ecirc;n địa b&agrave;n th&agrave;nh phố&rdquo;, vị ph&oacute; trung đo&agrave;n n&oacute;i.</p>\r\n<p class=\"Normal\"><strong>Video:&nbsp;<a title=\"Cảnh sát cơ động TP HCM luyện tập giải cứu con tin\" href=\"http://vnexpress.net/tin-tuc/phap-luat/dac-nhiem-co-dong-qua-dam-thep-cua-cong-an-tp-hcm-3032925-p2.html\">Cảnh s&aacute;t cơ động TP HCM luyện tập giải cứu con tin</a></strong></p>\r\n<table class=\"tbl_insert\" border=\"1\" cellspacing=\"0\" cellpadding=\"1\" align=\"center\">\r\n<tbody>\r\n<tr>\r\n<td>\r\n<p class=\"Normal\">Từ đầu năm đến nay, Trung đo&agrave;n cảnh s&aacute;t cơ động C&ocirc;ng an TP HCM&nbsp; tham gia tuần tra kiểm so&aacute;t v&agrave; phối hợp với gần 100.000 lượt c&aacute;n bộ, chiến sĩ, 348 lượt ch&oacute; nghiệp vụ; h&agrave;ng ngh&igrave;n lượt m&ocirc;t&ocirc;, xe b&aacute;n tải, can&ocirc; tuần tra&hellip; Đ&atilde; ph&aacute;t hiện, tiếp nhận xử l&yacute; gần 5.000 trường hợp c&oacute; h&agrave;nh vi vi phạm ph&aacute;p luật.</p>\r\n<p class=\"Normal\">Cảnh s&aacute;t cơ động đ&atilde; ph&aacute;t hiện v&agrave; b&agrave;n giao 108 vụ việc c&oacute; li&ecirc;n quan đến c&aacute;c hoạt động phạm ph&aacute;p h&igrave;nh sự. Trong đ&oacute;, nhiều vụ t&agrave;ng trữ vũ kh&iacute; qu&acirc;n dụng, hung kh&iacute;; h&agrave;ng chục nghi can t&agrave;ng trữ v&agrave; sử dụng ma tu&yacute; tr&aacute;i ph&eacute;p, vận chuyển thuốc l&aacute; lậu v&agrave; cả động vật qu&yacute; hiếm&hellip;</p>\r\n</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n</div>\r\n</div>', '1', '1', '2014-08-19 11:19:26', '0');
INSERT INTO `tbl_news` VALUES ('37', 'Thủ tướng bổ nhiệm 4 thứ trưởng mới', 'Thu-tuong-bo-nhiem-4-thu-truong-moi', '<div class=\"short_intro txt_666\">Thủ tướng Nguyễn Tấn Dũng vừa k&yacute; Quyết định bổ nhiệm c&aacute;c Thứ trưởng Tư ph&aacute;p, X&acirc;y dựng, Khoa học C&ocirc;ng nghệ v&agrave; Ph&oacute; thống đốc Ng&acirc;n h&agrave;ng Nh&agrave; nước Việt Nam.</div>\r\n<div class=\"relative_new\">\r\n<ul class=\"list_news_dot_3x3_300\">\r\n<li><a href=\"http://kinhdoanh.vnexpress.net/tin-tuc/ebank/ngan-hang/ngan-hang-nha-nuoc-co-pho-thong-doc-moi-3032890.html\">Ng&acirc;n h&agrave;ng Nh&agrave; nước c&oacute; Ph&oacute; thống đốc mới</a></li>\r\n</ul>\r\n</div>\r\n<div id=\"left_calculator\">\r\n<div class=\"fck_detail width_common\">\r\n<p class=\"Normal\">Theo quyết định của Thủ tướng, &ocirc;ng L&ecirc; Quang H&ugrave;ng, Cục trưởng Gi&aacute;m định nh&agrave; nước về chất lượng c&ocirc;ng tr&igrave;nh x&acirc;y dựng, giữ chức Thứ trưởng X&acirc;y dựng. &Ocirc;ng Nguyễn Kh&aacute;nh Ngọc, Vụ trưởng Ph&aacute;p luật quốc tế, Bộ Tư ph&aacute;p được bổ nhiệm Thứ trưởng Tư ph&aacute;p. &Ocirc;ng Phan Ch&iacute; Hiếu, Hiệu trưởng Đại học Luật H&agrave; Nội giữ chức Thứ trưởng Tư ph&aacute;p. &Ocirc;ng Phạm C&ocirc;ng Tạc, Ch&aacute;nh văn ph&ograve;ng Bộ Khoa học v&agrave; C&ocirc;ng nghệ nhận nhiệm vụ Thứ trưởng Khoa học v&agrave; C&ocirc;ng nghệ. B&agrave; Nguyễn Thị Hồng, Vụ trưởng Ch&iacute;nh s&aacute;ch tiền tệ, Ng&acirc;n h&agrave;ng Nh&agrave; nước Việt Nam được bổ nhiệm Ph&oacute; thống đốc Ng&acirc;n h&agrave;ng Nh&agrave; nước Việt Nam.&nbsp;</p>\r\n<p class=\"Normal\">T&acirc;n Thứ trưởng&nbsp;L&ecirc; Quang H&ugrave;ng (52 tuổi, qu&ecirc; Ph&uacute; Thọ) c&oacute; học vị Tiến sĩ kỹ thuật x&acirc;y dựng, Cao cấp l&yacute; luận ch&iacute;nh trị. &Ocirc;ng H&ugrave;ng từng giữ c&aacute;c chức vụ Ph&oacute; cục trưởng Gi&aacute;m định nh&agrave; nước về chất lượng c&ocirc;ng tr&igrave;nh x&acirc;y dựng, Bộ X&acirc;y dựng; Cục trưởng Gi&aacute;m định nh&agrave; nước về chất lượng c&ocirc;ng tr&igrave;nh x&acirc;y dựng, Bộ X&acirc;y dựng.</p>\r\n<p class=\"Normal\">&Ocirc;ng Nguyễn Kh&aacute;nh Ngọc (50 tuổi, qu&ecirc; H&agrave; Nội), từng đảm nhiệm c&aacute;c chức vụ: Ph&oacute; vụ trưởng Ph&aacute;p luật quốc tế, Ph&oacute; vụ trưởng Hợp t&aacute;c quốc tế, Vụ trưởng Hợp t&aacute;c quốc tế v&agrave; Vụ trưởng Ph&aacute;p luật quốc tế của Bộ Tư ph&aacute;p.</p>\r\n<p class=\"Normal\">&Ocirc;ng Phan Ch&iacute; Hiếu (45 tuổi, qu&ecirc; Ninh B&igrave;nh) từng giữ c&aacute;c chức vụ: Ph&oacute; ch&aacute;nh văn ph&ograve;ng Bộ Tư ph&aacute;p, Gi&aacute;m đốc Học viện Tư ph&aacute;p v&agrave; Hiệu trưởng Đại học Luật H&agrave; Nội.</p>\r\n<p class=\"Normal\">Thứ trưởng Phạm C&ocirc;ng Tạc (52 tuổi, qu&ecirc; Nam Định) từng giữ c&aacute;c chức vụ: Trưởng ph&ograve;ng Khoa học v&agrave; C&ocirc;ng nghệ nội bộ, Văn ph&ograve;ng Bộ Khoa học v&agrave; C&ocirc;ng nghệ, Ph&oacute; ch&aacute;nh văn ph&ograve;ng Bộ Khoa học v&agrave; C&ocirc;ng nghệ, Ch&aacute;nh văn ph&ograve;ng Bộ Khoa học v&agrave; C&ocirc;ng nghệ.</p>\r\n<p class=\"Normal\">B&agrave; Nguyễn Thị Hồng &nbsp;(46 tuổi, qu&ecirc; H&agrave; Nội) từng đảm nhiệm c&aacute;c chức vụ: Trưởng ph&ograve;ng C&aacute;n c&acirc;n thanh to&aacute;n quốc tế (Vụ Ch&iacute;nh s&aacute;ch tiền tệ), Ph&oacute; vụ trưởng Ch&iacute;nh s&aacute;ch tiền tệ, Vụ trưởng Ch&iacute;nh s&aacute;ch tiền tệ của Ng&acirc;n h&agrave;ng Nh&agrave; nước Việt Nam.</p>\r\n<p class=\"Normal\">C&aacute;c quyết định c&oacute; hiệu lực từ ng&agrave;y 16/8.</p>\r\n</div>\r\n</div>', '1', '1', '2014-08-19 11:24:44', '0');
INSERT INTO `tbl_news` VALUES ('38', 'Đình Bảo: \\\'Tôi không nuối tiếc quá khứ của AC&amp;M\\\' Đình Bảo: \\\'Tôi không nuối tiếc quá khứ của AC&amp;M\\\' Đình Bảo: \\\'Tôi không nuối tiếc quá khứ của AC&amp;M\\\'', 'Dinh-Bao-Toi-khong-nuoi-tiec-qua-khu-cua-AC-M-Dinh-Bao-Toi-khong-nuoi-tiec-qua-khu-cua-AC-M-Dinh-Bao-Toi-khong-nuoi-tiec-qua-khu-cua-AC-M', '<div class=\"block_timer_share\">\r\n<div class=\"block_timer left txt_666\"><a class=\"btn_facebook\" title=\"Chia sẻ bài viết lên facebook\" rel=\"nofollow\"><img src=\"http://st.f1.giaitri.vnexpress.net/i/v1/graphics/icon_fb.gif\" alt=\"Chia sẻ bài viết lên facebook\" /></a><a id=\"twitter\" class=\"btn_twitter\" title=\"Chia sẻ bài viết lên twitter\" rel=\"nofollow\" data-url=\"http://bit.ly/1rQpsUO\"></a><img src=\"http://st.f1.giaitri.vnexpress.net/i/v1/graphics/icon_tw.gif\" alt=\"Chia sẻ bài viết lên twitter\" /><a class=\"btn_google\" title=\"Chia sẻ bài viết lên google+\" rel=\"nofollow\"><img src=\"http://st.f1.giaitri.vnexpress.net/i/v1/graphics/icon_google.gif\" alt=\"Chia sẻ bài viết lên google+\" /></a><span class=\"drash_share\">|</span><a id=\"print_content\" title=\"Print\" rel=\"nofollow\"></a><img src=\"http://st.f1.giaitri.vnexpress.net/i/v1/graphics/icon_print.gif\" alt=\"Print\" /><a id=\"email_content\" class=\"login_5\" title=\"Email\" rel=\"nofollow\"></a><img src=\"http://st.f1.giaitri.vnexpress.net/i/v1/graphics/icon_letter.gif\" alt=\"Email\" /></div>\r\n</div>\r\n<div class=\"title_news\">\r\n<h1>Đ&igrave;nh Bảo: \'T&ocirc;i kh&ocirc;ng nuối tiếc qu&aacute; khứ của AC&amp;M\'</h1>\r\n</div>\r\n<div class=\"short_intro txt_666\">Cựu th&agrave;nh vi&ecirc;n nh&oacute;m nam đ&igrave;nh đ&aacute;m một thời chọn c&aacute;ch sống, l&agrave;m việc tự lập ở Mỹ. Sau s&aacute;u năm xa qu&ecirc;, anh thấy trưởng th&agrave;nh hơn trong suy nghĩ v&agrave; nghề nghiệp.</div>\r\n<div class=\"relative_new\">\r\n<ul class=\"list_news_dot_3x3_300\">\r\n<li><a title=\"Đình Bảo giúp Nam Khánh làm phòng thu 3 tỷ đồng\" href=\"http://giaitri.vnexpress.net/tin-tuc/nhac/lang-nhac/dinh-bao-giup-nam-khanh-lam-phong-thu-3-ty-dong-1914258.html\">Đ&igrave;nh Bảo gi&uacute;p Nam Kh&aacute;nh l&agrave;m ph&ograve;ng thu 3 tỷ đồng</a>&nbsp;/&nbsp;<a title=\"Nhóm AC&M chỉ còn 2 thành viên\" href=\"http://giaitri.vnexpress.net/tin-tuc/gioi-sao/trong-nuoc/nhom-ac-m-chi-con-2-thanh-vien-1902452.html\">Nh&oacute;m AC&amp;M chỉ c&ograve;n 2 th&agrave;nh vi&ecirc;n</a></li>\r\n</ul>\r\n</div>\r\n<div class=\"fck_detail width_common\">\r\n<p class=\"Normal\"><em>- Trong s&aacute;u năm g&acirc;y dựng sự nghiệp ở Mỹ, v&igrave; sao anh rất &iacute;t quay về Việt Nam?</em></p>\r\n<p class=\"Normal\">- T&ocirc;i &iacute;t về nước v&igrave; phải d&agrave;nh thời gian g&acirc;y dựng c&ocirc;ng việc, ổn định cuộc sống ở Mỹ. Để h&ograve;a nhập được v&agrave;o nhịp sống xứ người l&agrave; điều kh&ocirc;ng đơn giản. Thời gian đầu, ngo&agrave;i việc chống chọi với nỗi nhớ nh&agrave;, nhớ kh&ocirc;ng kh&iacute; rộn rịp n&aacute;o nức thường ng&agrave;y của S&agrave;i G&ograve;n, t&ocirc;i phải ra sức học tiếng Anh, rồi đi dạy ở trường nhạc Evergreen Valley College c&ugrave;ng giảng vi&ecirc;n bản xứ để cải thiện thu nhập.</p>\r\n<p class=\"Normal\"><em>- Thời gian qua, anh mưu sinh thế n&agrave;o?</em></p>\r\n<p class=\"Normal\">- Cuộc sống của t&ocirc;i s&aacute;u năm qua như một chuyến t&agrave;u tốc h&agrave;nh, d&ugrave; muốn hay kh&ocirc;ng n&oacute; phải lao nhanh để mau ch&oacute;ng đạt được điều n&oacute; muốn. Hai năm qua, t&ocirc;i k&yacute; hợp đồng trở th&agrave;nh ca sĩ độc quyền cho một trung t&acirc;m ca nhạc lớn của cộng đồng người Việt ở hải ngoại. Trung t&acirc;m cũng gi&uacute;p t&ocirc;i ra mắt album <em>C&aacute;nh gi&oacute;</em> v&agrave; được kh&aacute;n giả đ&oacute;n nhận. T&ocirc;i cũng tự m&igrave;nh g&acirc;y dựng một trường dạy nhạc nhỏ v&agrave; một ph&ograve;ng thu ri&ecirc;ng chứ kh&ocirc;ng phải đi l&agrave;m thu&ecirc;.</p>\r\n<p class=\"Normal\">Khi ổn định hơn, t&ocirc;i d&agrave;nh thời gian để quay về. Ba năm trước, t&ocirc;i về một tuần để <a href=\"http://giaitri.vnexpress.net/tin-tuc/nhac/lang-nhac/dinh-bao-giup-nam-khanh-lam-phong-thu-3-ty-dong-1914258.html\" target=\"_blank\">gi&uacute;p Nam Kh&aacute;nh</a> x&acirc;y dựng ph&ograve;ng thu. Vừa rồi, t&ocirc;i cũng về một tuần để hỗ trợ hai ca sĩ trẻ Mai Tiến Dũng v&agrave; T&oacute;c Ti&ecirc;n thực hiện phần quay CD trong nước. T&ocirc;i l&agrave; người h&ograve;a &acirc;m, thu &acirc;m v&agrave; l&agrave; gi&aacute;m đốc &acirc;m nhạc cho hai CD n&agrave;y tại ph&ograve;ng thu của m&igrave;nh ở Mỹ n&ecirc;n t&ocirc;i muốn về nước c&ugrave;ng cả hai để theo s&aacute;t c&ocirc;ng việc hơn.</p>\r\n<table class=\"tplCaption\" border=\"0\" cellspacing=\"0\" cellpadding=\"3\" align=\"center\">\r\n<tbody>\r\n<tr>\r\n<td><img src=\"http://m.f9.img.vnexpress.net/2014/08/19/dinh-bao-1-8163-1408408056.jpg\" alt=\"Ca sĩ Đình Bảo.\" data-natural-=\"\" data-width=\"400\" data-pwidth=\"480\" /></td>\r\n</tr>\r\n<tr>\r\n<td>\r\n<p class=\"Image\">Ca sĩ Đ&igrave;nh Bảo.</p>\r\n</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n<p class=\"Normal\"><em>- Xa m&ocirc;i trường &acirc;m nhạc trong nước kh&aacute; l&acirc;u, mỗi khi trở về cảm gi&aacute;c của anh ra sao?</em></p>\r\n<p class=\"Normal\">- Đời sống &acirc;m nhạc v&agrave; giải tr&iacute; trong nước ng&agrave;y c&agrave;ng đa dạng, m&agrave;u sắc. T&ocirc;i về đ&uacute;ng dịp Ho&agrave;ng B&aacute;ch vừa ra <a href=\"http://giaitri.vnexpress.net/tin-tuc/nhac/lang-nhac/hoang-bach-tim-cam-hung-viet-nhac-tu-the-gioi-tre-tho-cua-con-3026645.html\" target=\"_blank\">sản phẩm</a> &acirc;m nhạc mới n&ecirc;n cảm nhận được kh&ocirc;ng kh&iacute; l&agrave;m việc của c&aacute;c th&agrave;nh vi&ecirc;n AC&amp;M xưa, cũng như c&aacute;c ca sĩ, nghệ sĩ n&oacute;i chung. Những sự s&ocirc;i nổi ấy kh&ocirc;ng l&agrave;m t&ocirc;i cảm thấy lạc l&otilde;ng. Ngược lại, t&ocirc;i thấy bản th&acirc;n kh&aacute;c xưa rất nhiều, thấy m&igrave;nh c&oacute; bước tiến rất d&agrave;i kh&ocirc;ng phải chỉ trong chuyện ca h&aacute;t m&agrave; trong kiến thức v&agrave; tư duy &acirc;m nhạc, để th&iacute;ch ứng kịp thời với những thay đổi theo chiều hướng t&iacute;ch cực.</p>\r\n<p class=\"Normal\"><em>- Anh nuối tiếc g&igrave; về thời v&agrave;ng son của AC&amp;M?</em></p>\r\n<p class=\"Normal\">- T&ocirc;i kh&ocirc;ng nuối tiếc g&igrave; m&agrave; xem khoảng thời gian hoạt động c&ugrave;ng nh&oacute;m l&agrave; khoảng thời gian đẹp nhất của thời tuổi trẻ. Ng&agrave;y xưa, t&ocirc;i, Nam Kh&aacute;nh, Ho&agrave;ng B&aacute;ch, Thụy Vũ gắn kết với nhau từ một qu&aacute; tr&igrave;nh l&acirc;u d&agrave;i c&ugrave;ng nhau đi học ở trường nhạc, c&ugrave;ng nhau h&aacute;t b&egrave; trong c&aacute;c ph&ograve;ng thu. T&ocirc;i c&ograve;n nhớ, giai đoạn 2000 - 2004, c&aacute;c đĩa CD của những ca sĩ ở S&agrave;i G&ograve;n đều c&oacute; phần thu &acirc;m b&egrave; của AC&amp;M. Ch&uacute;ng t&ocirc;i c&oacute; thể hiểu nhau về c&aacute; t&iacute;nh v&agrave; gu &acirc;m nhạc, c&aacute;ch h&aacute;t v&agrave; chất giọng để l&agrave;m n&ecirc;n một nh&oacute;m nhạc ăn &yacute;. D&ugrave; điều ấy kh&ocirc;ng tồn tại l&acirc;u, ch&uacute;ng t&ocirc;i vẫn lu&ocirc;n đồng h&agrave;nh trong cuộc sống.</p>\r\n<p class=\"Normal\"><em>- V&igrave; sao anh quyết định sang Mỹ sống v&agrave; l&agrave;m việc khi con đường ca h&aacute;t trong nước đang rất thuận lợi?</em></p>\r\n<p class=\"Normal\">- Những ng&agrave;y đầu sang Mỹ, cũng c&oacute; l&uacute;c t&ocirc;i hoang mang v&igrave; sợ m&igrave;nh chọn hướng đi chưa đ&uacute;ng. Nhưng đến b&acirc;y giờ, c&oacute; thể n&oacute;i đ&oacute; l&agrave; một quyết định ho&agrave;n to&agrave;n đ&uacute;ng đắn. 10 năm học ở Nhạc viện TP HCM, học th&ecirc;m ở c&aacute;c thầy c&ocirc; trong nước gi&uacute;p t&ocirc;i hiểu sự học đ&oacute;ng vai tr&ograve; quan trọng như thế n&agrave;o với đời người. Ở Mỹ, t&ocirc;i như \"c&aacute; gặp nước\" khi được tiếp thu hệ thống gi&aacute;o dục cởi mở, hiện đại v&agrave; hiệu quả. T&ocirc;i c&oacute; thời gian v&agrave; điều kiện tốt nhất để đ&agrave;o s&acirc;u chuy&ecirc;n m&ocirc;n li&ecirc;n quan đến &acirc;m nhạc. T&ocirc;i đi học ng&agrave;nh kỹ sư &acirc;m thanh, học về s&aacute;ng t&aacute;c nhạc, học về luật bản quyền nghệ thuật v&agrave; thiết kế tiếng động cho phim ảnh... những điều m&agrave; nếu ở trong nước chắc t&ocirc;i &iacute;t nghĩ đến việc d&agrave;nh thời gian theo đuổi. C&agrave;ng học, t&ocirc;i c&agrave;ng thấy m&igrave;nh ngộ ra, \"vỡ\" ra nhiều điều để gi&uacute;p nghề nghiệp của m&igrave;nh.</p>\r\n<table class=\"tplCaption\" border=\"0\" cellspacing=\"0\" cellpadding=\"3\" align=\"center\">\r\n<tbody>\r\n<tr>\r\n<td><img src=\"http://m.f9.img.vnexpress.net/2014/08/19/dinh-bao-2-8962-1408408057.jpg\" alt=\"Sở trường của nam ca sĩ là dòng nhạc thính phòng, bán cổ điển và những khúc ballad ngọt ngào.\" data-natural-=\"\" data-width=\"500\" data-pwidth=\"480\" /></td>\r\n</tr>\r\n<tr>\r\n<td>\r\n<p class=\"Image\">Sở trường của nam ca sĩ l&agrave; d&ograve;ng nhạc th&iacute;nh ph&ograve;ng, b&aacute;n cổ điển v&agrave; những kh&uacute;c ballad ngọt ng&agrave;o.</p>\r\n</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n<p class=\"Normal\"><em>- Anh gặp kh&oacute; khăn v&agrave; &aacute;p lực g&igrave; khi hoạt động trong m&ocirc;i trường &acirc;m nhạc ở cộng đồng người Việt tại Mỹ?</em></p>\r\n<p class=\"Normal\">- Thời gian đầu, t&ocirc;i ở với bố mẹ tại San Jose nhưng về sau t&ocirc;i tự lập. Khi k&yacute; hợp đồng độc quyền với trung t&acirc;m ca nhạc, t&ocirc;i chuyển về miền Nam California để sinh sống. Đi h&aacute;t b&ecirc;n đ&oacute; kh&ocirc;ng s&ocirc;i nổi như b&ecirc;n n&agrave;y. Mỗi tuần ở Mỹ t&ocirc;i chỉ c&oacute; v&agrave;i s&ocirc;. Cộng đồng người Việt cũng rải r&aacute;c n&ecirc;n mỗi khi đi s&ocirc; phải di chuyển bằng m&aacute;y bay đến điểm diễn. Để c&oacute; thu nhập vững chắc, ngo&agrave;i đi h&aacute;t cuối tuần, t&ocirc;i tự m&igrave;nh g&acirc;y dựng n&ecirc;n một trường nhạc quy m&ocirc; nhỏ để duy tr&igrave; c&ocirc;ng việc dạy học.</p>\r\n<p class=\"Normal\">Kh&oacute; khăn v&agrave; &aacute;p lực th&igrave; ở nơi n&agrave;o cũng c&oacute;. Nhưng giới nghệ sĩ Việt Nam ở hải ngoại cũng hỗ trợ nhau trong c&ocirc;ng việc n&ecirc;n t&ocirc;i chưa thấy c&oacute; chuyện k&egrave;n cựa g&igrave; qu&aacute; đ&aacute;ng. Đương nhi&ecirc;n, sự cạnh tranh l&agrave; lu&ocirc;n tồn tại nhưng chuyện chơi xấu nhau th&igrave; t&ocirc;i chưa thấy.</p>\r\n<p class=\"Normal\"><em>- Cuộc sống h&agrave;ng ng&agrave;y hiện tại của anh ở Mỹ như thế n&agrave;o?</em></p>\r\n<p class=\"Normal\">- T&ocirc;i đi h&aacute;t cuối tuần, c&aacute;c ng&agrave;y trong tuần th&igrave; đi dạy học tại trường nhạc. Buổi tối, t&ocirc;i d&agrave;nh thời gian để l&agrave;m h&ograve;a &acirc;m v&agrave; thu &acirc;m cho c&aacute;c ca sĩ. Cuộc sống v&agrave; c&ocirc;ng việc n&oacute;i chung l&agrave; ổn. T&ocirc;i đi khắp nơi rồi m&agrave; chưa thấy chỗ n&agrave;o thi&ecirc;n nhi&ecirc;n, con người đẹp hiền h&ograve;a như ở tiểu bang California.</p>\r\n<p class=\"Normal\"><em>- Anh gắn b&oacute; với nghệ sĩ Việt n&agrave;o nhất khi sống ở Mỹ?</em></p>\r\n<p class=\"Normal\">- Ở Mỹ, t&ocirc;i thu&ecirc; nh&agrave; ở chung c&ugrave;ng ca sĩ <a href=\"http://giaitri.vnexpress.net/photo/sao-dep-sao-xau/toc-tien-khoe-ve-mong-manh-voi-vay-day-3024181.html\" target=\"_blank\">T&oacute;c Ti&ecirc;n</a> v&agrave; Mai Tiến Dũng. Đ&acirc;y l&agrave; hai đứa em th&acirc;n thiết trong nghề của t&ocirc;i. Mấy anh em ở với nhau rất vui, chỉ c&oacute; điều ở chung hai năm m&agrave; thỉnh thoảng mới nấu ăn tại nh&agrave; v&igrave; đứa n&agrave;o cũng bận. Một lần duy nhất t&ocirc;i được T&oacute;c Ti&ecirc;n nấu cho m&oacute;n t&ocirc;m kho thịt v&agrave; canh gi&ograve; heo, nhớ lại cũng thấy buồn cười. T&oacute;c Ti&ecirc;n bề ngo&agrave;i c&oacute; vẻ nổi loạn nhưng thực ra lại l&agrave; c&ocirc; g&aacute;i hiền l&agrave;nh, ngoan ngo&atilde;n. C&ograve;n Mai Tiến Dũng l&agrave; em trai của bạn g&aacute;i cũ của t&ocirc;i n&ecirc;n hai anh em cũng gắn b&oacute; với nhau.</p>\r\n<p class=\"Normal\">Khi l&agrave;m việc, t&ocirc;i được hoạt động c&ugrave;ng chị Thu Phương ở trung t&acirc;m ca nhạc. Hai chị em hợp t&aacute;c với nhau cũng kh&aacute; ăn &yacute; v&agrave; vui vẻ.</p>\r\n<table class=\"tplCaption\" border=\"0\" cellspacing=\"0\" cellpadding=\"3\" align=\"center\">\r\n<tbody>\r\n<tr>\r\n<td><img src=\"http://m.f9.img.vnexpress.net/2014/08/19/dinh-bao-3-4766-1408408057.jpg\" alt=\"Từ trái qua: Hoàng Bách, Đình Bảo\" data-natural-=\"\" data-width=\"500\" data-pwidth=\"480\" /></td>\r\n</tr>\r\n<tr>\r\n<td>\r\n<p class=\"Image\">Từ tr&aacute;i qua: Ho&agrave;ng B&aacute;ch, Đ&igrave;nh Bảo, Nam Kh&aacute;nh v&agrave; Thụy Vũ trong nh&oacute;m AC&amp;M một thời hoạt động s&ocirc;i nổi.</p>\r\n</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n<p class=\"Normal\"><em>- V&igrave; sao bao l&acirc;u nay anh chỉ h&aacute;t d&ograve;ng nhạc b&aacute;n cổ điển m&agrave; kh&ocirc;ng chịu thay đổi?</em></p>\r\n<p class=\"Normal\">- Cũng c&oacute; người n&oacute;i t&ocirc;i c&oacute; ngoại h&igrave;nh, c&oacute; chất giọng sao kh&ocirc;ng chọn d&ograve;ng nhạc dance, nhạc trẻ để dễ đến với nhiều kh&aacute;n giả hơn. Nhưng t&ocirc;i quan niệm, nghệ thuật n&oacute;i chung lu&ocirc;n đ&ograve;i hỏi người nghệ sĩ phải sống thật. Nếu giả tạo hay gượng &eacute;p bản th&acirc;n để chiều l&ograve;ng mọi người th&igrave; kh&oacute; tồn tại l&acirc;u. Nổi tiếng hơn th&igrave; ai m&agrave; kh&ocirc;ng th&iacute;ch nhưng t&ocirc;i kh&ocirc;ng thể n&agrave;o tạo cho m&igrave;nh vẻ sexy, gợi cảm hay nổi loạn kh&aacute;c với bản t&iacute;nh thật. T&ocirc;i chỉ muốn h&aacute;t những bản ballad, th&iacute;nh ph&ograve;ng hay d&ograve;ng nhạc cổ điển ph&ugrave; hợp sở trường.</p>\r\n<p class=\"Normal\"><em>- Hướng ph&aacute;t triển sắp tới của anh l&agrave; g&igrave;?</em></p>\r\n<p class=\"Normal\">- T&ocirc;i cứ canh c&aacute;nh nỗi lo l&agrave; m&igrave;nh đi l&acirc;u kh&aacute;n giả trong nước kh&ocirc;ng c&ograve;n nhớ tới. Sắp tới, t&ocirc;i muốn c&oacute; th&ecirc;m cơ hội về nước để \"h&acirc;m n&oacute;ng\" lại t&igrave;nh cảm với c&aacute;c fan cũ, l&agrave;m c&aacute;c đ&ecirc;m nhạc đo&agrave;n tụ với th&agrave;nh vi&ecirc;n nh&oacute;m AC&amp;M một thời chẳng hạn.</p>\r\n<p class=\"Normal\">Nhu cầu về thực hiện sản phẩm &acirc;m nhạc với kỹ thuật chất lượng cao của ca sĩ trong nước l&agrave; rất lớn. Hiện nay, c&aacute;c ca sĩ hay đo&agrave;n phim trong nước, khi c&oacute; điều kiện, đều mang sản phẩm của m&igrave;nh ra nước ngo&agrave;i thực hiện c&aacute;c kh&acirc;u kỹ thuật hoặc l&agrave;m hậu kỳ. V&igrave; thế, t&ocirc;i rất muốn &aacute;p dụng sở trường học của m&igrave;nh về chuy&ecirc;n ng&agrave;nh kỹ sư &acirc;m thanh v&agrave; thiết kế tiếng động để g&oacute;p phần v&agrave;o m&ocirc;i trường hoạt động của lĩnh vực n&agrave;y trong nước.</p>\r\n<table class=\"tbl_insert\" border=\"1\" cellspacing=\"0\" cellpadding=\"1\" align=\"center\">\r\n<tbody>\r\n<tr>\r\n<td>\r\n<p class=\"Normal\">Nh&oacute;m nhạc AC&amp;M th&agrave;nh lập năm 2001, gồm bốn th&agrave;nh vi&ecirc;n đều xuất th&acirc;n từ Nhạc viện TP HCM. Phong c&aacute;ch chủ đạo của nh&oacute;m l&agrave; Acapella. Nh&oacute;m gồm: ca sĩ Nam Kh&aacute;nh, hai anh em ruột Thụy Vũ, Đ&igrave;nh Bảo v&agrave; ca sĩ Ho&agrave;ng B&aacute;ch.</p>\r\n<p class=\"Normal\">Ngay từ những ng&agrave;y đầu, nh&oacute;m được sự dẫn dắt của NSND Trần Hiếu. Đ&acirc;y l&agrave; một trong số &iacute;t boyband được đ&aacute;nh gi&aacute; cao, c&oacute; khả năng h&aacute;t Acapella độc đ&aacute;o. Ngo&agrave;i th&agrave;nh c&ocirc;ng ở tr&igrave;nh diễn, th&agrave;nh vi&ecirc;n Ho&agrave;ng B&aacute;ch c&ograve;n c&oacute; khả năng s&aacute;ng t&aacute;c ri&ecirc;ng với một số t&aacute;c phẩm &acirc;m nhạc th&agrave;nh c&ocirc;ng.</p>\r\n<p class=\"Normal\">Tuy theo m&ocirc; h&igrave;nh h&aacute;t nh&oacute;m, AC&amp;M vẫn c&oacute; c&aacute;ch l&agrave;m việc \"mở\" khi mỗi th&agrave;nh vi&ecirc;n đều c&oacute; thể tr&igrave;nh diễn solo khi c&oacute; lời mời, hoặc ph&aacute;t h&agrave;nh album ri&ecirc;ng theo &yacute; th&iacute;ch. Bốn ch&agrave;ng trai của nh&oacute;m nhạc được y&ecirc;u th&iacute;ch n&agrave;y<a href=\"http://giaitri.vnexpress.net/tin-tuc/phim/sau-man-anh/ac-m-di-dong-phim-1893644.html\">từng v&agrave;o vai ch&iacute;nh </a>trong bộ phim truyền h&igrave;nh \"Acappella\" d&agrave;i 24 tập. Từ năm 2009, nh&oacute;m bắt đầu tan r&atilde; khi mỗi th&agrave;nh vi&ecirc;n đi theo hướng ph&aacute;t triển sự nghiệp &acirc;m nhạc ri&ecirc;ng.</p>\r\n</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n</div>', '1', '1', '2014-08-19 15:14:55', '0');
INSERT INTO `tbl_news` VALUES ('40', 'asda das', 'asda-das', '<p>d aadsa aada da&nbsp;</p>', '1', '1', '2014-08-20 09:13:17', '0');
INSERT INTO `tbl_news` VALUES ('39', 'Linh vật ngoại lai bị đề nghị dỡ khỏi di tích', 'Linh-vat-ngoai-lai-bi-de-nghi-do-khoi-di-tich', '<div class=\"short_intro txt_666\">Trước thực trạng cổng, khu di t&iacute;ch, c&ocirc;ng sở... b&agrave;y sư tử đ&aacute; c&oacute; h&igrave;nh d&aacute;ng theo mẫu Trung Quốc, ch&acirc;u &Acirc;u... Bộ Văn h&oacute;a y&ecirc;u cầu loại bỏ v&igrave; kh&ocirc;ng ph&ugrave; hợp với thuần phong mỹ tục Việt Nam.</div>\r\n<div id=\"left_calculator\">\r\n<div class=\"fck_detail width_common\">\r\n<p class=\"Normal\">Hiện tượng tỳ hưu, sư tử đ&aacute; c&oacute; h&igrave;nh d&aacute;ng theo mẫu Trung Quốc, ch&acirc;u &Acirc;u trước cổng, cửa c&aacute;c di t&iacute;ch, đền ch&ugrave;a, c&ocirc;ng sở Việt Nam rộ l&ecirc;n khoảng 10 năm trước v&agrave; ng&agrave;y c&agrave;ng phổ biến.&nbsp;</p>\r\n<p class=\"Normal\">Ngay tại H&agrave; Nội, c&oacute; thể bắt gặp đ&ocirc;i tỳ hưu Bắc Kinh ở ch&ugrave;a V&acirc;n Hồ (phố L&ecirc; Đại H&agrave;nh, Hai B&agrave; Trưng, H&agrave; Nội); đ&ocirc;i sư tử đ&aacute; Trung Quốc&nbsp;nhe răng, giơ m&oacute;ng vuốt ở Đ&ocirc;ng Miếu hơn 600 năm tuổi của l&agrave;ng C&oacute;t (phường Y&ecirc;n H&ograve;a, quận Cầu Giấy) hay cặp sư tử đ&aacute; theo phong c&aacute;ch ch&acirc;u &Acirc;u trước cổng di t&iacute;ch Đền - ch&ugrave;a B&agrave; Tấm (Dương X&aacute;, Gia L&acirc;m)... Dọc phố B&agrave; Triệu cũng c&oacute; kh&ocirc;ng &iacute;t sư tử đ&aacute; Trung Quốc k&iacute;ch cỡ &aacute;n ngữ cửa c&aacute;c t&ograve;a nh&agrave;.</p>\r\n<p class=\"Normal\"><strong><a href=\"http://vnexpress.net/photo/anh/linh-vat-ngoai-lai-an-ngu-den-chua-ha-noi-3032956.html\">Ảnh: Linh vật ngoại lai &aacute;n ngữ đền ch&ugrave;a H&agrave; Nội</a></strong></p>\r\n<p class=\"Normal\">Tại di t&iacute;ch ch&ugrave;a cổ Ch&acirc;n Ti&ecirc;n (900 năm tuổi, tr&ecirc;n&nbsp;phố B&agrave; Triệu),&nbsp;sư tử đ&aacute; được b&agrave;y theo phong c&aacute;ch &Acirc;u - &Aacute;. Cặp sư tử trước khu vườn th&aacute;p của ch&ugrave;a được l&agrave;m theo mẫu của Trung Quốc. Con sư tử được đức Phật ngồi l&ecirc;n, tr&ecirc;n đỉnh&nbsp;th&aacute;p lại theo tạo h&igrave;nh Ch&acirc;u &Acirc;u.</p>\r\n<p class=\"Normal\">Sư thầy Th&iacute;ch Đ&agrave;m Đức cho biết, những con sư tử n&agrave;y được nh&agrave; ch&ugrave;a l&agrave;m khoảng hai năm trước. \"Thầy kh&ocirc;ng để &yacute; lắm đ&oacute; l&agrave; sư tử Trung Quốc hay Việt Nam, chỉ nghĩ đặt n&oacute; ở khu vườn th&aacute;p cho oai vệ. Tuy h&igrave;nh tướng sư tử dữ dằn nhưng n&oacute; c&oacute; t&acirc;m từ\", sư thầy Đức n&oacute;i.</p>\r\n<table class=\"tplCaption\" border=\"0\" cellspacing=\"0\" cellpadding=\"3\" align=\"center\">\r\n<tbody>\r\n<tr>\r\n<td><img class=\"img_more\" src=\"http://m.f29.img.vnecdn.net/2014/08/19/anh2-8948-1408394815.jpg\" alt=\"anh2-8948-1408394815.jpg\" data-natural-=\"\" data-width=\"500\" data-pwidth=\"480\" /></td>\r\n</tr>\r\n<tr>\r\n<td>\r\n<p class=\"Image\">Sư tử đ&aacute; tạo h&igrave;nh của Trung Quốc được đặt trước vườn th&aacute;p ở di t&iacute;ch ch&ugrave;a cổ Ch&acirc;n Ti&ecirc;n (phố B&agrave; Triệu, H&agrave; Nội). Ảnh: <em>Qu&yacute; Đo&agrave;n.</em></p>\r\n</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n<p class=\"Normal\">Tại một số nơi&nbsp;ở c&aacute;c địa phương kh&aacute;c như: Ch&ugrave;a H&agrave; Ti&ecirc;n (Vĩnh Ph&uacute;c), bảo t&agrave;ng tỉnh Vĩnh Ph&uacute;c, đường l&ecirc;n ch&ugrave;a Linh Ứng (Đ&agrave; Nẵng)... cũng c&oacute; sư tử đ&aacute; kiểu Trung Quốc, ch&acirc;u &Acirc;u &aacute;n ngữ. Hầu hết những hiện vật c&oacute; nguồn gốc ngoại lai tại đền ch&ugrave;a, di t&iacute;ch l&agrave; do người d&acirc;n c&uacute;ng tiến.</p>\r\n<p class=\"Normal\">PGS Trần L&acirc;m Biền, ủy vi&ecirc;n Hội đồng Di sản văn h&oacute;a Quốc gia v&iacute;: \"Ch&uacute;ng ta th&agrave;nh c&aacute;i đu&ocirc;i của văn h&oacute;a nước ngo&agrave;i. Đem hai t&ecirc;n l&iacute;nh ngoại quốc canh cửa nh&agrave; m&igrave;nh, liệu c&oacute; được y&ecirc;n ổn\".&nbsp;</p>\r\n<p class=\"Normal\">PGS ph&acirc;n t&iacute;ch, sư tử đ&aacute;&nbsp;Việt Nam l&agrave; một linh vật biểu trưng cho sức mạnh Phật gi&aacute;o, xuất hiện từ thời L&yacute;. Trong hệ thống di t&iacute;ch văn h&oacute;a quốc gia ch&ugrave;a Phật T&iacute;ch (Bắc Ninh) được x&acirc;y dựng từ thời vua L&yacute; Th&aacute;nh T&ocirc;ng vẫn lưu giữ đ&ocirc;i sư tử đ&aacute; cổ.&nbsp;Những con&nbsp;sư tử đ&aacute; Việt Nam n&agrave;y c&oacute; tạo h&igrave;nh giống con l&acirc;n, tr&ecirc;n th&acirc;n m&igrave;nh c&oacute; nhiều hoa văn như đang c&otilde;ng cả bầu trời chuyển động, như đ&agrave;i sen đưa Đức Phật đi khai s&aacute;ng thế gian.&nbsp;Người Việt Nam chủ yếu l&agrave; n&ocirc;ng d&acirc;n t&iacute;nh t&igrave;nh hiền l&agrave;nh chất ph&aacute;c n&ecirc;n c&oacute; nền văn h&oacute;a cũng mềm mại, uyển chuyển. Sư tử đ&aacute; của ta v&igrave; thế tr&ocirc;ng cũng hiền l&agrave;nh, hướng nội.</p>\r\n<p class=\"Normal\">\"Sư tử đ&aacute; Trung Quốc th&igrave; h&igrave;nh tướng dữ dằn, mang t&iacute;nh đe dọa, thường đặt ở lăng mộ do ph&acirc;n h&oacute;a x&atilde; hội cao.&nbsp;Con tỳ hưu cũng l&agrave; của kinh tế thương mại ph&acirc;n h&oacute;a cao ở Trung Quốc. Con vật n&agrave;y kh&ocirc;ng c&oacute; hậu m&ocirc;n, chỉ ăn v&agrave;o m&agrave; kh&ocirc;ng thải ra giống như thương nh&acirc;n chỉ muốn thu tiền v&agrave;o m&agrave; kh&ocirc;ng bị mất m&aacute;t\", &ocirc;ng Biền n&oacute;i.&nbsp;</p>\r\n<p class=\"Normal\">Theo PGS Biền, do sự thiếu hiểu biết n&ecirc;n người d&acirc;n tin v&agrave;o lời đồn thổi sư tử đ&aacute;, tỳ hưu &aacute;n ngữ sẽ bảo vệ gia chủ, gi&uacute;p ph&aacute;t t&agrave;i n&ecirc;n đ&atilde; mua về nh&agrave; hoặc cung tiến v&agrave;o đền ch&ugrave;a, di t&iacute;ch để trấn an, cho nơi đ&oacute; oai phong.</p>\r\n<p class=\"Normal\">PGS Biền cực lực phản đối chuyện để sư tử, tỳ hưu ngoại lai trong di t&iacute;ch của tổ ti&ecirc;n bởi: \"Di t&iacute;ch kh&ocirc;ng chỉ gắn với vấn đề t&ocirc;n gi&aacute;o t&iacute;n ngưỡng m&agrave; vấn đề lớn hơn l&agrave; bản sắc văn h&oacute;a d&acirc;n tộc, l&agrave; lịch sử, t&acirc;m hồn của tổ ti&ecirc;n gửi lại cho mai sau\". Việc trưng b&agrave;y, sử dụng, cung tiến, biểu tượng, sản phẩm, linh vật v&agrave; c&aacute;c vật phẩm lạ kh&ocirc;ng ph&ugrave; hợp với thuần phong mỹ tục Việt Nam sẽ l&agrave;m m&eacute;o m&oacute; lịch sử, x&oacute;a nh&ograve;a bản sắc của nước ta.</p>\r\n<table class=\"tplCaption\" border=\"0\" cellspacing=\"0\" cellpadding=\"3\" align=\"center\">\r\n<tbody>\r\n<tr>\r\n<td><img src=\"http://m.f29.img.vnecdn.net/2014/08/19/sutu-5612-1408424011.jpg\" alt=\"Tượng Sư tử bằng Đá, thế kỷ 11 - 12 tại chùa Bà Tấm, Dương Xá, Gia Lâm, Hà Nội.\" data-natural-=\"\" data-width=\"500\" data-pwidth=\"480\" /></td>\r\n</tr>\r\n<tr>\r\n<td>\r\n<p class=\"Image\">Tượng sư tử bằng đ&aacute;&nbsp;thế kỷ 11-12 tại ch&ugrave;a B&agrave; Tấm, Dương X&aacute;, Gia L&acirc;m, H&agrave; Nội. Ảnh: <em>Giacngo.vn</em></p>\r\n</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n<p class=\"Normal\">Trước thực trạng nhiều di t&iacute;ch, đ&igrave;nh, ch&ugrave;a, c&ocirc;ng sở ở c&aacute;c địa phương sử dụng biểu tượng, linh vật như sư tử đ&aacute; theo tạo h&igrave;nh của Trung Quốc, ch&acirc;u &Acirc;u,&nbsp;Bộ Văn h&oacute;a đ&atilde; ra c&ocirc;ng văn số gửi Sở Văn h&oacute;a c&aacute;c tỉnh/th&agrave;nh, c&aacute;c cơ quan đơn vị đề nghị: Kh&ocirc;ng trưng b&agrave;y, sử dụng, cung tiến biểu tượng, sản phẩm, linh vật v&agrave; c&aacute;c vật phẩm lạ kh&ocirc;ng ph&ugrave; hợp với thuần phong mỹ tục Việt Nam; Tuy&ecirc;n truyền, vận động những nơi đang sử dụng th&aacute;o dỡ những vật phẩm n&oacute;i tr&ecirc;n ra khỏi nơi c&ocirc;ng cộng,&nbsp;đặc biệt l&agrave; c&aacute;c khu di t&iacute;ch lịch sử văn h&oacute;a tại địa phương; đồng thời giao cho&nbsp;Sở Văn h&oacute;a tuy&ecirc;n truyền, kiểm tra v&agrave; đề xuất xử l&yacute; nếu ph&aacute;t hiện sai phạm.</p>\r\n</div>\r\n</div>', '1', '1', '2014-08-19 14:57:55', '0');
INSERT INTO `tbl_news` VALUES ('41', 'a1231311', 'a1231311', '<p>31312131</p>', '1', '1', '2014-08-20 09:13:23', '0');
INSERT INTO `tbl_news` VALUES ('42', '1111111', '1111111', '<p>222222222</p>', '1', '1', '2014-08-20 09:13:30', '0');
INSERT INTO `tbl_news` VALUES ('43', '333333333333', '333333333333', '<p>4444444444444</p>', '1', '1', '2014-08-20 09:13:36', '0');

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
  `id_brand` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_product`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tbl_product
-- ----------------------------
INSERT INTO `tbl_product` VALUES ('6', '1', 'Sunsilk toc muot', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam volutpat dolor sed varius vulputate. Maecenas consectetur commodo massa at iaculis. Mauris quis lobortis diam. Sed orci odio, ', null, '1', '1');
INSERT INTO `tbl_product` VALUES ('7', '2', 'Omo thom tho', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam volutpat dolor sed varius vulputate. Maecenas consectetur commodo massa at iaculis. Mauris quis lobortis diam. Sed orci odio, ', null, '1', '2');
INSERT INTO `tbl_product` VALUES ('11', '3', 'sunight chanh', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam volutpat dolor sed varius vulputate. Maecenas consectetur commodo massa at iaculis. Mauris quis lobortis diam. Sed orci odio, ', null, '1', '3');
INSERT INTO `tbl_product` VALUES ('12', '4', 'Vim duck', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam volutpat dolor sed varius vulputate. Maecenas consectetur commodo massa at iaculis. Mauris quis lobortis diam. Sed orci odio, ', null, '1', '4');
INSERT INTO `tbl_product` VALUES ('13', '1', 'sunsilk ong mat', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam volutpat dolor sed varius vulputate. Maecenas consectetur commodo massa at iaculis. Mauris quis lobortis diam. Sed orci odio, ', null, '1', '1');
INSERT INTO `tbl_product` VALUES ('14', '2', 'omomatic', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam volutpat dolor sed varius vulputate. Maecenas consectetur commodo massa at iaculis. Mauris quis lobortis diam. Sed orci odio, ', null, '1', '2');
INSERT INTO `tbl_product` VALUES ('15', '3', 'sunight cam', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam volutpat dolor sed varius vulputate. Maecenas consectetur commodo massa at iaculis. Mauris quis lobortis diam. Sed orci odio, ', null, '1', '3');
INSERT INTO `tbl_product` VALUES ('16', '4', 'vim manh nhat', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam volutpat dolor sed varius vulputate. Maecenas consectetur commodo massa at iaculis. Mauris quis lobortis diam. Sed orci odio, ', null, '1', '4');

-- ----------------------------
-- Table structure for tbl_province
-- ----------------------------
DROP TABLE IF EXISTS `tbl_province`;
CREATE TABLE `tbl_province` (
  `provinceid` varchar(5) NOT NULL,
  `name` varchar(100) NOT NULL,
  `type` varchar(30) NOT NULL,
  PRIMARY KEY (`provinceid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tbl_province
-- ----------------------------
INSERT INTO `tbl_province` VALUES ('01', 'Hà Nội', 'Thành Phố');
INSERT INTO `tbl_province` VALUES ('02', 'Hà Giang', 'Tỉnh');
INSERT INTO `tbl_province` VALUES ('04', 'Cao Bằng', 'Tỉnh');
INSERT INTO `tbl_province` VALUES ('06', 'Bắc Kạn', 'Tỉnh');
INSERT INTO `tbl_province` VALUES ('08', 'Tuyên Quang', 'Tỉnh');
INSERT INTO `tbl_province` VALUES ('10', 'Lào Cai', 'Tỉnh');
INSERT INTO `tbl_province` VALUES ('11', 'Điện Biên', 'Tỉnh');
INSERT INTO `tbl_province` VALUES ('12', 'Lai Châu', 'Tỉnh');
INSERT INTO `tbl_province` VALUES ('14', 'Sơn La', 'Tỉnh');
INSERT INTO `tbl_province` VALUES ('15', 'Yên Bái', 'Tỉnh');
INSERT INTO `tbl_province` VALUES ('17', 'Hòa Bình', 'Tỉnh');
INSERT INTO `tbl_province` VALUES ('19', 'Thái Nguyên', 'Tỉnh');
INSERT INTO `tbl_province` VALUES ('20', 'Lạng Sơn', 'Tỉnh');
INSERT INTO `tbl_province` VALUES ('22', 'Quảng Ninh', 'Tỉnh');
INSERT INTO `tbl_province` VALUES ('24', 'Bắc Giang', 'Tỉnh');
INSERT INTO `tbl_province` VALUES ('25', 'Phú Thọ', 'Tỉnh');
INSERT INTO `tbl_province` VALUES ('26', 'Vĩnh Phúc', 'Tỉnh');
INSERT INTO `tbl_province` VALUES ('27', 'Bắc Ninh', 'Tỉnh');
INSERT INTO `tbl_province` VALUES ('30', 'Hải Dương', 'Tỉnh');
INSERT INTO `tbl_province` VALUES ('31', 'Hải Phòng', 'Thành Phố');
INSERT INTO `tbl_province` VALUES ('33', 'Hưng Yên', 'Tỉnh');
INSERT INTO `tbl_province` VALUES ('34', 'Thái Bình', 'Tỉnh');
INSERT INTO `tbl_province` VALUES ('35', 'Hà Nam', 'Tỉnh');
INSERT INTO `tbl_province` VALUES ('36', 'Nam Định', 'Tỉnh');
INSERT INTO `tbl_province` VALUES ('37', 'Ninh Bình', 'Tỉnh');
INSERT INTO `tbl_province` VALUES ('38', 'Thanh Hóa', 'Tỉnh');
INSERT INTO `tbl_province` VALUES ('40', 'Nghệ An', 'Tỉnh');
INSERT INTO `tbl_province` VALUES ('42', 'Hà Tĩnh', 'Tỉnh');
INSERT INTO `tbl_province` VALUES ('44', 'Quảng Bình', 'Tỉnh');
INSERT INTO `tbl_province` VALUES ('45', 'Quảng Trị', 'Tỉnh');
INSERT INTO `tbl_province` VALUES ('46', 'Thừa Thiên Huế', 'Tỉnh');
INSERT INTO `tbl_province` VALUES ('48', 'Đà Nẵng', 'Thành Phố');
INSERT INTO `tbl_province` VALUES ('49', 'Quảng Nam', 'Tỉnh');
INSERT INTO `tbl_province` VALUES ('51', 'Quảng Ngãi', 'Tỉnh');
INSERT INTO `tbl_province` VALUES ('52', 'Bình Định', 'Tỉnh');
INSERT INTO `tbl_province` VALUES ('54', 'Phú Yên', 'Tỉnh');
INSERT INTO `tbl_province` VALUES ('56', 'Khánh Hòa', 'Tỉnh');
INSERT INTO `tbl_province` VALUES ('58', 'Ninh Thuận', 'Tỉnh');
INSERT INTO `tbl_province` VALUES ('60', 'Bình Thuận', 'Tỉnh');
INSERT INTO `tbl_province` VALUES ('62', 'Kon Tum', 'Tỉnh');
INSERT INTO `tbl_province` VALUES ('64', 'Gia Lai', 'Tỉnh');
INSERT INTO `tbl_province` VALUES ('66', 'Đắk Lắk', 'Tỉnh');
INSERT INTO `tbl_province` VALUES ('67', 'Đắk Nông', 'Tỉnh');
INSERT INTO `tbl_province` VALUES ('68', 'Lâm Đồng', 'Tỉnh');
INSERT INTO `tbl_province` VALUES ('70', 'Bình Phước', 'Tỉnh');
INSERT INTO `tbl_province` VALUES ('72', 'Tây Ninh', 'Tỉnh');
INSERT INTO `tbl_province` VALUES ('74', 'Bình Dương', 'Tỉnh');
INSERT INTO `tbl_province` VALUES ('75', 'Đồng Nai', 'Tỉnh');
INSERT INTO `tbl_province` VALUES ('77', 'Bà Rịa - Vũng Tàu', 'Tỉnh');
INSERT INTO `tbl_province` VALUES ('79', 'Hồ Chí Minh', 'Thành Phố');
INSERT INTO `tbl_province` VALUES ('80', 'Long An', 'Tỉnh');
INSERT INTO `tbl_province` VALUES ('82', 'Tiền Giang', 'Tỉnh');
INSERT INTO `tbl_province` VALUES ('83', 'Bến Tre', 'Tỉnh');
INSERT INTO `tbl_province` VALUES ('84', 'Trà Vinh', 'Tỉnh');
INSERT INTO `tbl_province` VALUES ('86', 'Vĩnh Long', 'Tỉnh');
INSERT INTO `tbl_province` VALUES ('87', 'Đồng Tháp', 'Tỉnh');
INSERT INTO `tbl_province` VALUES ('89', 'An Giang', 'Tỉnh');
INSERT INTO `tbl_province` VALUES ('91', 'Kiên Giang', 'Tỉnh');
INSERT INTO `tbl_province` VALUES ('92', 'Cần Thơ', 'Thành Phố');
INSERT INTO `tbl_province` VALUES ('93', 'Hậu Giang', 'Tỉnh');
INSERT INTO `tbl_province` VALUES ('94', 'Sóc Trăng', 'Tỉnh');
INSERT INTO `tbl_province` VALUES ('95', 'Bạc Liêu', 'Tỉnh');
INSERT INTO `tbl_province` VALUES ('96', 'Cà Mau', 'Tỉnh');

-- ----------------------------
-- Table structure for tbl_tag
-- ----------------------------
DROP TABLE IF EXISTS `tbl_tag`;
CREATE TABLE `tbl_tag` (
  `id_tag` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_user` int(10) unsigned NOT NULL,
  `id_collection` int(10) unsigned NOT NULL,
  `status` int(10) unsigned DEFAULT '0',
  PRIMARY KEY (`id_tag`)
) ENGINE=InnoDB AUTO_INCREMENT=46 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tbl_tag
-- ----------------------------
INSERT INTO `tbl_tag` VALUES ('31', '23', '23', '1');
INSERT INTO `tbl_tag` VALUES ('32', '33', '24', '0');
INSERT INTO `tbl_tag` VALUES ('33', '21', '24', '0');
INSERT INTO `tbl_tag` VALUES ('34', '24', '25', '0');
INSERT INTO `tbl_tag` VALUES ('35', '28', '25', '0');
INSERT INTO `tbl_tag` VALUES ('36', '25', '26', '1');
INSERT INTO `tbl_tag` VALUES ('37', '23', '26', '1');
INSERT INTO `tbl_tag` VALUES ('38', '25', '27', '1');
INSERT INTO `tbl_tag` VALUES ('39', '23', '27', '1');
INSERT INTO `tbl_tag` VALUES ('40', '25', '28', '0');
INSERT INTO `tbl_tag` VALUES ('41', '21', '28', '0');
INSERT INTO `tbl_tag` VALUES ('42', '25', '32', '0');
INSERT INTO `tbl_tag` VALUES ('43', '22', '32', '0');
INSERT INTO `tbl_tag` VALUES ('44', '19', '32', '0');
INSERT INTO `tbl_tag` VALUES ('45', '21', '32', '0');

-- ----------------------------
-- Table structure for tbl_users
-- ----------------------------
DROP TABLE IF EXISTS `tbl_users`;
CREATE TABLE `tbl_users` (
  `id_user` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `password` varchar(500) NOT NULL,
  `email` varchar(150) NOT NULL,
  `user_type` int(10) unsigned DEFAULT NULL,
  `avatar` varchar(150) DEFAULT NULL,
  `first_name` varchar(80) DEFAULT NULL,
  `last_name` varchar(80) DEFAULT NULL,
  `alias_name` varchar(80) DEFAULT NULL,
  `phone` varchar(15) DEFAULT NULL,
  `facebook_name` varchar(150) DEFAULT NULL,
  `facebook_link` varchar(150) DEFAULT NULL,
  `address` varchar(150) DEFAULT NULL,
  `city` varchar(80) DEFAULT NULL,
  `district` varchar(80) DEFAULT NULL,
  `date_create` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` tinyint(1) DEFAULT '0',
  `introduce` text,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

-- ----------------------------
-- Records of tbl_users
-- ----------------------------
INSERT INTO `tbl_users` VALUES ('11', '202cb962ac59075b964b07152d234b70', 'fvbxcfgddf@gmail.com', '3', 'avatar53fd96d403412.jpg', 'sdf', 'sfsfssf', 'sdsfsf', '0943633644', '', '', '', '02', '032', '2014-08-27 15:29:50', '1', 'asdasdasd');
INSERT INTO `tbl_users` VALUES ('19', '202cb962ac59075b964b07152d234b70', 'khactung9x@gmail.com', '3', 'avatar53fd96d403412.jpg', 'Tung', 'Khac', 'Tung', '0943633646', 'ter4 ger6', 'facebook.com/khactung', 'ha noi', '01', '019', '2014-08-27 15:29:50', '1', 'ko cos ky thuat');
INSERT INTO `tbl_users` VALUES ('21', '202cb962ac59075b964b07152d234b70', '123@mail.com', '4', 'avatar53fd96d403412.jpg', 'admin', 'sfsfssf', 'sdsfsf', '0943633644', 'ter4 ger6', 'facebook.com/khactung', 'ha noi 11', '01', '280', '2014-08-27 15:29:50', '1', '1231');
INSERT INTO `tbl_users` VALUES ('22', '202cb962ac59075b964b07152d234b70', 'aaa@gmail.com', '2', 'avatar53fd96d403412.jpg', 'admin', 'sfsfssf', 'sdsfsf', '0789674345', 'f', 'facebook.com/khactung', 'ha noi', '92', '926', '2014-08-27 15:29:50', '1', 'rty');
INSERT INTO `tbl_users` VALUES ('23', '202cb962ac59075b964b07152d234b70', 'tungnguyen@gmail.com', '4', 'avatar53fed2b519e22.jpg', 'Tung Khac', 'sfsfssf', 'tung netbeans', '0789674345', 'f', '312', 'ha noi', '04', '045', '2014-08-28 13:56:53', '1', 'ưerwe');
INSERT INTO `tbl_users` VALUES ('24', '202cb962ac59075b964b07152d234b70', 'dfgdfg@gmail.com', '1', 'avatar53fd96d403412.jpg', 'sdf', 'sdfsdf', 'sdsfsf', '0943633644', 'tungkhac', '312', 'ha noi 1', '35', '347', '2014-08-27 15:29:50', '1', 'sr32 23  fsf df');
INSERT INTO `tbl_users` VALUES ('25', '202cb962ac59075b964b07152d234b70', 'thanhdo.trinh@gmail.com', '1', 'avatar53fed3683f417.jpg', 'trinh', 'do', 'jasontrinh', '0984576892', 'khac tung', 'facebook.com/khactung', '', '01', '019', '2014-08-28 13:59:52', '1', 'ươ ô i í ì ỉ ị');
INSERT INTO `tbl_users` VALUES ('26', '202cb962ac59075b964b07152d234b70', 'b@gmail.com', '3', 'avatar53fd96d403412.jpg', 'khac', 'tung', 'ko danh', '0987346644', 'fgnsdhfsd', 'vnsdldnfsldf', 'ha noi', '06', '061', '2014-08-27 15:29:50', '1', 'sdfgdg');
INSERT INTO `tbl_users` VALUES ('27', '202cb962ac59075b964b07152d234b70', 'c@gmail.COM', '4', 'avatar53fd96d403412.jpg', 'sdg', 'sdf', 'oiuywe', '09847780521', '', '', '', '89', '886', '2014-08-27 15:29:50', '1', '');
INSERT INTO `tbl_users` VALUES ('28', '202cb962ac59075b964b07152d234b70', 'ddd@gmail.com', '4', 'avatar53fd96d403412.jpg', 'dfg', 'rtt', 's', '0943633646', '', '', '', '35', '352', '2014-08-27 15:29:50', '1', 'qưeqeqw');
INSERT INTO `tbl_users` VALUES ('29', '202cb962ac59075b964b07152d234b70', 'daaa@gmail.com', '4', 'avatar53fd96d403412.jpg', 'sdf', 'sdf', 'sdfsdf', '09847780521', 'sdf', '312', '', '64', '623', '2014-08-27 15:29:50', '1', '5vroqt0');
INSERT INTO `tbl_users` VALUES ('30', '202cb962ac59075b964b07152d234b70', 'dawaa@gmail.com', '4', 'avatar53fd96d403412.jpg', 'sdf', 'sdf', 'sdfsdf', '09847780521', 'sdf', '312', '', '64', '623', '2014-08-27 15:29:50', '1', '5vroqt0');
INSERT INTO `tbl_users` VALUES ('31', '202cb962ac59075b964b07152d234b70', 'sdf@gmail.com', '2', 'avatar53fd96d403412.jpg', 'sdf', 'df', 'asd', '09436336465', '', '', '', '02', '031', '2014-08-27 15:29:50', '1', '');
INSERT INTO `tbl_users` VALUES ('32', '202cb962ac59075b964b07152d234b70', 'as@gmail.com', '2', 'avatar53fd96d403412.jpg', '', 'sdfsd', 'sdfsdf', '09847780521', 'fsdfs', 'fsfsdfs', 'sd', '22', '202', '2014-08-27 15:29:50', '1', 'qưeqeqeqeqe');
INSERT INTO `tbl_users` VALUES ('33', '202cb962ac59075b964b07152d234b70', 'ggwgg@gmail.com', '1', 'avatar53fd96d403412.jpg', 'asd', 'asda', 'aasd', '09847780521', '', '', 'tổ dân phố phú diễn, phường Phú Diễn - Quận Bắc Từ Liêm  thành phố Hà Nội', '64', '637', '2014-08-27 15:29:50', '1', '');
INSERT INTO `tbl_users` VALUES ('34', '202cb962ac59075b964b07152d234b70', 'tungnk1@smartosc.com', '1', 'avatar53fd96d403412.jpg', '', '', 'sdfsdfsdf', '0943633644', '', '', '', '64', '623', '2014-08-27 15:29:50', '1', '');
INSERT INTO `tbl_users` VALUES ('35', '4297f44b13955235245b2497399d7a93', 'THANHDO.TRINH+12@GMAIL.COM', '1', 'avatar53fd96d403412.jpg', '', '', 'jasontrinh 2', '0966977482', '', '', '', '89', '889', '2014-08-27 15:29:50', '1', 'ss');
