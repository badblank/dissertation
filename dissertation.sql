/*
Navicat MySQL Data Transfer

Source Server         : 本机
Source Server Version : 50711
Source Host           : localhost:3306
Source Database       : dissertation

Target Server Type    : MYSQL
Target Server Version : 50711
File Encoding         : 65001

Date: 2018-04-08 00:43:28
*/

SET FOREIGN_KEY_CHECKS=0;
-- ----------------------------
-- Table structure for `course`
-- ----------------------------
DROP TABLE IF EXISTS `course`;
CREATE TABLE `course` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cGrade` varchar(5) DEFAULT NULL,
  `cName` varchar(20) DEFAULT NULL,
  `tID` varchar(13) DEFAULT NULL,
  `cClass` varchar(30) DEFAULT NULL,
  `aID` varchar(13) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of course
-- ----------------------------
INSERT INTO course VALUES ('1', '2015', '论文', '123456', '15-本科', '1');

-- ----------------------------
-- Table structure for `docs`
-- ----------------------------
DROP TABLE IF EXISTS `docs`;
CREATE TABLE `docs` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(200) DEFAULT NULL,
  `type` varchar(5) DEFAULT NULL,
  `size` float unsigned DEFAULT NULL,
  `origin_path` varchar(200) DEFAULT NULL,
  `path` varchar(200) DEFAULT NULL,
  `status` enum('pending','success','fail') DEFAULT 'pending',
  `pid` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of docs
-- ----------------------------
INSERT INTO docs VALUES ('1', '分析：视觉数据和ai的“致命应用”_472402', 'pdf', '107.05', '2018/04/73b70f26a2849418fe202eef5b432977.pdf', '', 'pending', '1427152016');

-- ----------------------------
-- Table structure for `present`
-- ----------------------------
DROP TABLE IF EXISTS `present`;
CREATE TABLE `present` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sID` varchar(13) DEFAULT NULL,
  `sName` varchar(20) DEFAULT NULL,
  `sDelDate` date DEFAULT NULL,
  `sAddTimes` int(11) DEFAULT NULL,
  `sCourse` varchar(255) DEFAULT NULL,
  `sTeacher` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of present
-- ----------------------------

-- ----------------------------
-- Table structure for `student`
-- ----------------------------
DROP TABLE IF EXISTS `student`;
CREATE TABLE `student` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sID` varchar(13) DEFAULT NULL,
  `sName` varchar(20) DEFAULT NULL,
  `sCourse` varchar(30) DEFAULT NULL,
  `sAssistant` varchar(13) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of student
-- ----------------------------
INSERT INTO student VALUES ('1', '1427152056', '小明', '1', '1');
INSERT INTO student VALUES ('2', '1427152073', '小花', '1', '1');
INSERT INTO student VALUES ('3', '1427152012', '二伟', '1', '1');
INSERT INTO student VALUES ('4', '1427152013', '里狗剩', '1', '1');
INSERT INTO student VALUES ('5', '1427152014', '老王', '1', '1');
INSERT INTO student VALUES ('6', '1427152015', '小红', '1', '1');
INSERT INTO student VALUES ('7', '1427152016', '丽丽', '1', '1');
INSERT INTO student VALUES ('8', '1427152017', '花花', '1', '1');
INSERT INTO student VALUES ('9', '1427152079', '杜昂', '1', '1');

-- ----------------------------
-- Table structure for `teacher_course`
-- ----------------------------
DROP TABLE IF EXISTS `teacher_course`;
CREATE TABLE `teacher_course` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `school` varchar(255) DEFAULT NULL,
  `course` varchar(255) DEFAULT NULL,
  `credit` varchar(255) DEFAULT NULL,
  `zhouci` varchar(255) DEFAULT NULL,
  `singleOrTwin` varchar(255) DEFAULT NULL,
  `week` varchar(255) DEFAULT NULL,
  `jieci` varchar(255) DEFAULT NULL,
  `zhoushu` varchar(255) DEFAULT NULL,
  `placeOfClass` varchar(255) DEFAULT NULL,
  `teacher` varchar(255) DEFAULT NULL,
  `nameOfClass` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=275 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of teacher_course
-- ----------------------------
INSERT INTO teacher_course VALUES ('1', '金明校区', '基本电路与电子学', '2.0', '1-18', '单', '三', '3-4节', '9', '曾宪梓楼306', '柴秀丽', '16-1');
INSERT INTO teacher_course VALUES ('2', '金明校区', '基本电路与电子学', '2.0', '1-18', '0', '五', '1-2节', '18', '7号教学楼7202', '柴秀丽', '16-1');
INSERT INTO teacher_course VALUES ('3', '金明校区', '基本电路与电子学', '2.0', '1-18', '0', '日', '7-9节', '18', '金明综合楼6204', '柴秀丽', '其他');
INSERT INTO teacher_course VALUES ('4', '金明校区', '网络管理', '3.0', '1-18', '0', '四', '1-2节', '18', '金明综合楼2304', '陈国强', '14-2');
INSERT INTO teacher_course VALUES ('5', '金明校区', '网络管理', '3.0', '1-18', '0', '二', '3-4节', '18', '金明综合楼3509', '陈国强', '14-2');
INSERT INTO teacher_course VALUES ('6', '金明校区', '网络管理实验', '1.0', '1-18', '0', '二', '7-8节', '18', '网络实训室', '陈国强', '14-2（第1组）');
INSERT INTO teacher_course VALUES ('7', '金明校区', '网络管理实验', '1.0', '1-18', '0', '二', '9-10节', '18', '网络实训室', '陈国强', '14-2（第2组）');
INSERT INTO teacher_course VALUES ('8', '金明校区', 'C语言程序设计', '4.0', '1-18', '0', '四', '3-4节', '18', '608实验室', '陈辉', '16-5');
INSERT INTO teacher_course VALUES ('9', '金明校区', 'C语言程序设计', '4.0', '1-18', '0', '二', '9-10节', '18', '608实验室', '陈辉', '16-5');
INSERT INTO teacher_course VALUES ('10', '金明校区', 'C语言程序设计', '4.0', '1-18', '0', '四', '1-2节', '18', '608实验室', '陈辉', '16-5');
INSERT INTO teacher_course VALUES ('11', '金明校区', '移动应用开发技术', '3.0', '1-18', '双', '五', '3-4节', '9', '7号教学楼7202', '陈小潘', '15-3');
INSERT INTO teacher_course VALUES ('12', '金明校区', '移动应用开发技术', '3.0', '1-18', '0', '四', '1-2节', '18', '606实验室', '陈小潘', '15-3');
INSERT INTO teacher_course VALUES ('13', '金明校区', '移动应用开发技术', '3.0', '1-18', '0', '三', '1-2节', '18', '金明综合楼2302', '陈小潘', '15-3');
INSERT INTO teacher_course VALUES ('14', '金明校区', '移动应用开发技术', '3.0', '1-18', '0', '三', '3-4节', '18', '金明综合楼2302', '陈小潘', '15-4');
INSERT INTO teacher_course VALUES ('15', '金明校区', '移动应用开发技术', '3.0', '1-18', '双', '五', '1-2节', '9', '金明综合楼5104', '陈小潘', '15-4');
INSERT INTO teacher_course VALUES ('16', '金明校区', '移动应用开发技术', '3.0', '1-18', '0', '四', '3-4节', '18', '606实验室', '陈小潘', '15-4');
INSERT INTO teacher_course VALUES ('17', '金明校区', '编译原理', '4.0', '1-18', '0', '三', '7-8节', '18', '金明综合楼5102', '崔翔', '14-1-1');
INSERT INTO teacher_course VALUES ('18', '金明校区', '编译原理', '4.0', '1-18', '双', '三', '3-4节', '9', '201实验室', '崔翔', '14-1-1');
INSERT INTO teacher_course VALUES ('19', '金明校区', '编译原理', '4.0', '1-18', '0', '五', '7-8节', '18', '金明综合楼5201', '崔翔', '14-1-1');
INSERT INTO teacher_course VALUES ('20', '金明校区', '编译原理', '4.0', '1-18', '单', '三', '3-4节', '9', '201实验室', '崔翔', '14-1-2');
INSERT INTO teacher_course VALUES ('21', '金明校区', '编译原理', '4.0', '1-18', '0', '五', '3-4节', '18', '金明综合楼5105', '崔翔', '14-1-2');
INSERT INTO teacher_course VALUES ('22', '金明校区', '编译原理', '4.0', '1-18', '0', '三', '9-10节', '18', '金明综合楼5102', '崔翔', '14-1-2');
INSERT INTO teacher_course VALUES ('23', '金明校区', '过程控制', '3.0', '1-18', '0', '四', '3-4节', '18', '金明综合楼1302', '杜海顺', '14-4');
INSERT INTO teacher_course VALUES ('24', '金明校区', '过程控制', '3.0', '1-18', '单', '二', '3-4节', '9', '金明综合楼5104', '杜海顺', '14-4');
INSERT INTO teacher_course VALUES ('25', '民生校区', '过程控制', '0', '0', '单', '二', '%s', '0', '4号教学楼4304', '杜海顺', '14民生自动化');
INSERT INTO teacher_course VALUES ('26', '民生校区', '过程控制', '0', '0', '0', '四', '1-2', '0', '4号教学楼4304', '杜海顺', '14民生自动化');
INSERT INTO teacher_course VALUES ('27', '金明校区', '计算机组成原理', '4.0', '1-18', '0', '三', '3-4节', '18', '金明综合楼6203', '杜晓玉', '15-1');
INSERT INTO teacher_course VALUES ('28', '金明校区', '计算机组成原理', '4.0', '1-18', '0', '五', '3-4节', '18', '611实验室', '杜晓玉', '15-1');
INSERT INTO teacher_course VALUES ('29', '金明校区', '计算机组成原理', '4.0', '1-18', '0', '一', '1-2节', '18', '金明综合楼6203', '杜晓玉', '15-1');
INSERT INTO teacher_course VALUES ('30', '金明校区', '计算机组成原理', '4.0', '1-18', '0', '五', '1-2节', '18', '611实验室', '杜晓玉', '15-2');
INSERT INTO teacher_course VALUES ('31', '金明校区', '计算机组成原理', '4.0', '1-18', '0', '三', '1-2节', '18', '金明综合楼6203', '杜晓玉', '15-2');
INSERT INTO teacher_course VALUES ('32', '金明校区', '计算机组成原理', '4.0', '1-18', '0', '一', '3-4节', '18', '金明综合楼6203', '杜晓玉', '15-2');
INSERT INTO teacher_course VALUES ('33', '金明校区', '计算机组成原理', '0', '0', '0', '一', '7-8节', '0', '金明综合楼3403', '杜晓玉', '2014-维大计算机班');
INSERT INTO teacher_course VALUES ('34', '金明校区', '计算机组成原理实验', '0', '0', '0', '二', '7-8节', '0', '611实验室', '杜晓玉', '2014-维大计算机班');
INSERT INTO teacher_course VALUES ('35', '金明校区', '计算机组成原理', '0', '0', '0', '三', '7-8节', '0', '金明综合楼3401', '杜晓玉', '2014-维大计算机班');
INSERT INTO teacher_course VALUES ('36', '金明校区', '无线网络技术', '3.0', '1-18', '0', '四', '9-10节', '18', '网络实训室', '凡高娟', '14-2');
INSERT INTO teacher_course VALUES ('37', '金明校区', '无线网络技术', '3.0', '1-18', '双', '二', '1-2节', '9', '金明综合楼3509', '凡高娟', '14-2');
INSERT INTO teacher_course VALUES ('38', '金明校区', '无线网络技术', '3.0', '1-18', '0', '四', '3-4节', '18', '金明综合楼3509', '凡高娟', '14-2');
INSERT INTO teacher_course VALUES ('39', '金明校区', '数据库系统原理及应用', '3.0', '1-18', '0', '六', '1-2节', '18', '金明综合楼4103', '范明虎', '16-3');
INSERT INTO teacher_course VALUES ('40', '金明校区', '数据库系统原理及应用', '3.0', '1-18', '0', '五', '1-2节', '18', '201实验室', '范明虎', '16-3');
INSERT INTO teacher_course VALUES ('41', '金明校区', '数据库系统原理及应用', '3.0', '1-18', '单', '二', '7-8节', '9', '曾宪梓楼211', '范明虎', '16-3');
INSERT INTO teacher_course VALUES ('42', '金明校区', '数据库系统原理及应用', '3.0', '1-18', '0', '六', '3-4节', '18', '金明综合楼4103', '范明虎', '16-4');
INSERT INTO teacher_course VALUES ('43', '金明校区', '数据库系统原理及应用', '3.0', '1-18', '单', '二', '9-10节', '9', '曾宪梓楼211', '范明虎', '16-4');
INSERT INTO teacher_course VALUES ('44', '金明校区', '数据库系统原理及应用', '3.0', '1-18', '0', '五', '3-4节', '18', '201实验室', '范明虎', '16-4');
INSERT INTO teacher_course VALUES ('45', '金明校区', '操作系统', '0', '0', '0', '二', '3-4节', '0', '201实验室', '范明虎', '2014-维大计算机班');
INSERT INTO teacher_course VALUES ('46', '金明校区', '操作系统', '0', '0', '0', '五', '7-8节', '0', '金明综合楼3209', '范明虎', '2014-维大计算机班');
INSERT INTO teacher_course VALUES ('47', '金明校区', '操作系统', '0', '0', '0', '六', '7-8节', '0', '金明综合楼3209', '范明虎', '2014-维大计算机班');
INSERT INTO teacher_course VALUES ('48', '金明校区', '软件需求分析与建模', '3.0', '1-18', '单', '二', '9-10节', '9', '201实验室', '冯洪海', '14-3');
INSERT INTO teacher_course VALUES ('49', '金明校区', '软件需求分析与建模', '3.0', '1-18', '双', '二', '9-10节', '9', '7号教学楼7304', '冯洪海', '14-3');
INSERT INTO teacher_course VALUES ('50', '金明校区', '软件需求分析与建模', '3.0', '1-18', '0', '四', '3-4节', '18', '7号教学楼7204', '冯洪海', '14-3');
INSERT INTO teacher_course VALUES ('51', '金明校区', '软件工程', '0', '0', '0', '三', '1-2', '0', '金明综合楼5204', '冯洪海', '2015级中美计算机航空方向');
INSERT INTO teacher_course VALUES ('52', '金明校区', '软件工程', '0', '0', '0', '五', '7-8', '0', '曾宪梓楼206', '冯洪海', '2015级中美计算机航空方向');
INSERT INTO teacher_course VALUES ('53', '金明校区', '软件工程实验', '0', '3-18', '单', '二', '7-8', '0', '608实验室', '冯洪海', '2015级中美计算机航空方向');
INSERT INTO teacher_course VALUES ('54', '金明校区', '空中交通管制', '0', '0', '0', '三', '7-9', '0', '金明综合楼6304', '葛强', '2015级中美计算机航空方向专业');
INSERT INTO teacher_course VALUES ('55', '金明校区', '多媒体开发技术', '3.0', '1-18', '双', '二', '9-10节', '9', '曾宪梓楼211', '郭彦伟', '14-1-1');
INSERT INTO teacher_course VALUES ('56', '金明校区', '多媒体开发技术', '3.0', '1-18', '双', '二', '1-2节', '9', '608实验室', '郭彦伟', '14-1-1');
INSERT INTO teacher_course VALUES ('57', '金明校区', '多媒体开发技术', '3.0', '1-18', '0', '四', '1-2节', '18', '金明综合楼5402', '郭彦伟', '14-1-1');
INSERT INTO teacher_course VALUES ('58', '金明校区', '多媒体开发技术', '3.0', '1-18', '0', '四', '3-4节', '18', '金明综合楼5402', '郭彦伟', '14-1-2');
INSERT INTO teacher_course VALUES ('59', '金明校区', '多媒体开发技术', '3.0', '1-18', '双', '二', '7-8节', '9', '曾宪梓楼211', '郭彦伟', '14-1-2');
INSERT INTO teacher_course VALUES ('60', '金明校区', '多媒体开发技术', '3.0', '1-18', '双', '二', '3-4节', '9', '608实验室', '郭彦伟', '14-1-2');
INSERT INTO teacher_course VALUES ('61', '金明校区', '计算机组成原理', '4.0', '1-18', '0', '三', '3-4节', '18', '金明综合楼2304', '郭拯危', '15-3');
INSERT INTO teacher_course VALUES ('62', '金明校区', '计算机组成原理', '4.0', '1-18', '0', '三', '7-8节', '18', '611实验室', '郭拯危', '15-3');
INSERT INTO teacher_course VALUES ('63', '金明校区', '计算机组成原理', '4.0', '1-18', '0', '一', '1-2节', '18', '金明综合楼2204', '郭拯危', '15-3');
INSERT INTO teacher_course VALUES ('64', '金明校区', '计算机组成原理', '4.0', '1-18', '0', '四', '9-10节', '18', '611实验室', '郭拯危', '15-4');
INSERT INTO teacher_course VALUES ('65', '金明校区', '计算机组成原理', '4.0', '1-18', '0', '一', '3-4节', '18', '金明综合楼2204', '郭拯危', '15-4');
INSERT INTO teacher_course VALUES ('66', '金明校区', '计算机组成原理', '4.0', '1-18', '0', '三', '1-2节', '18', '金明综合楼2304', '郭拯危', '15-4');
INSERT INTO teacher_course VALUES ('67', '金明校区', 'Web系统与技术', '3.0', '1-18', '0', '四', '3-4节', '18', '金明综合楼5202', '韩道军', '14-1-1');
INSERT INTO teacher_course VALUES ('68', '金明校区', 'Web系统与技术', '3.0', '1-18', '0', '二', '7-8节', '18', '金明综合楼5202', '韩道军', '14-1-1');
INSERT INTO teacher_course VALUES ('69', '金明校区', 'Web系统与技术实验', '1.0', '1-18', '0', '二', '3-4节', '18', '606实验室', '韩道军', '14-1-1');
INSERT INTO teacher_course VALUES ('70', '金明校区', 'Web系统与技术', '3.0', '1-18', '0', '四', '1-2节', '18', '金明综合楼5202', '韩道军', '14-1-2');
INSERT INTO teacher_course VALUES ('71', '金明校区', 'Web系统与技术', '3.0', '1-18', '0', '二', '9-10节', '18', '金明综合楼5202', '韩道军', '14-1-2');
INSERT INTO teacher_course VALUES ('72', '金明校区', 'Web系统与技术实验', '1.0', '1-18', '0', '五', '7-8节', '18', '611实验室', '韩道军', '14-1-2');
INSERT INTO teacher_course VALUES ('73', '金明校区', '计算机网络', '0', '0', '0', '三', '7-8', '0', '曾宪梓楼310', '韩志杰', '2014-计算机(航）X10.11.12');
INSERT INTO teacher_course VALUES ('74', '金明校区', '计算机网络', '0', '0', '0', '四', '3-4', '0', '网络实训室', '韩志杰', '2014-计算机(航）X10.11.12');
INSERT INTO teacher_course VALUES ('75', '金明校区', '计算机网络', '0', '0', '0', '五', '3-4', '0', '曾宪梓楼310', '韩志杰', '2014-计算机(航）X10.11.12');
INSERT INTO teacher_course VALUES ('76', '金明校区', '计算机网络', '0', '0', '0', '三', '9-10节', '0', '曾宪梓楼310', '韩志杰', '2014-维大计算机班');
INSERT INTO teacher_course VALUES ('77', '金明校区', '计算机网络', '0', '0', '0', '四', '1-2节', '0', '网络实训室', '韩志杰', '2014-维大计算机班');
INSERT INTO teacher_course VALUES ('78', '金明校区', '计算机网络', '0', '0', '0', '五', '1-2节', '0', '曾宪梓楼310', '韩志杰', '2014-维大计算机班');
INSERT INTO teacher_course VALUES ('79', '金明校区', '电路', '3.0', '1-18', '0', '五', '1-2节', '18', '金明综合楼6202', '侯彦东', '16-5');
INSERT INTO teacher_course VALUES ('80', '金明校区', '电路', '3', '1-18', '0', '二', '7-8节', '18', '金明综合楼6303', '侯彦东', '%s');
INSERT INTO teacher_course VALUES ('81', '民生校区', '电路', '0', '0', '0', '二', '%s', '0', '1号教学楼1201', '侯彦东', '16民生自动化');
INSERT INTO teacher_course VALUES ('82', '民生校区', '电路', '0', '0', '0', '五', '3-4', '0', '1号教学楼1203', '侯彦东', '16民生自动化');
INSERT INTO teacher_course VALUES ('83', '金明校区', '网络应用编程', '4.0', '1-18', '0', '四', '3-4节', '18', '金明综合楼2306', '侯彦娥', '15-3');
INSERT INTO teacher_course VALUES ('84', '金明校区', '网络应用编程', '4.0', '1-18', '0', '二', '7-8节', '18', '7号教学楼7204', '侯彦娥', '15-3');
INSERT INTO teacher_course VALUES ('85', '金明校区', '网络应用编程', '4.0', '1-18', '0', '一', '3-4节', '18', '201实验室', '侯彦娥', '15-3');
INSERT INTO teacher_course VALUES ('86', '金明校区', '网络应用编程', '4.0', '1-18', '0', '二', '9-10节', '18', '7号教学楼7204', '侯彦娥', '15-4');
INSERT INTO teacher_course VALUES ('87', '金明校区', '网络应用编程', '4.0', '1-18', '0', '一', '1-2节', '18', '201实验室', '侯彦娥', '15-4');
INSERT INTO teacher_course VALUES ('88', '金明校区', '网络应用编程', '4.0', '1-18', '0', '四', '1-2节', '18', '金明综合楼3203', '侯彦娥', '15-4');
INSERT INTO teacher_course VALUES ('89', '金明校区', '网络应用编程', '0', '0', '0', '一', '7-8', '0', '201实验室', '侯彦娥', '2014-计算机(航）X10.11.12');
INSERT INTO teacher_course VALUES ('90', '金明校区', '网络应用编程', '0', '0', '0', '二', '3-4', '0', '金明综合楼3409', '侯彦娥', '2014-计算机(航）X10.11.12');
INSERT INTO teacher_course VALUES ('91', '金明校区', '网络应用编程', '0', '0', '0', '四', '9-10', '0', '金明综合楼3409', '侯彦娥', '2014-计算机(航）X10.11.12');
INSERT INTO teacher_course VALUES ('92', '金明校区', '基本电路与电子学', '2.0', '1-18', '0', '四', '1-2节', '18', '曾宪梓楼311', '金勇', '16-3');
INSERT INTO teacher_course VALUES ('93', '金明校区', '基本电路与电子学', '2.0', '1-18', '单', '二', '3-4节', '9', '曾宪梓楼406', '金勇', '16-3');
INSERT INTO teacher_course VALUES ('94', '金明校区', '基本电路与电子学', '2.0', '1-18', '0', '四', '3-4节', '18', '曾宪梓楼311', '金勇', '16-4');
INSERT INTO teacher_course VALUES ('95', '金明校区', '基本电路与电子学', '2.0', '1-18', '单', '二', '1-2节', '9', '曾宪梓楼406', '金勇', '16-4');
INSERT INTO teacher_course VALUES ('96', '金明校区', '工程项目训练（二）', '0', '0', '0', '五', '9-10', '0', '自动化实验室', '胡振涛', '14民生自动化');
INSERT INTO teacher_course VALUES ('97', '金明校区', '计算机图形学', '2.0', '1-18', '0', '五', '3-4节', '18', '金明综合楼5202', '姜保庆', '14-1-1');
INSERT INTO teacher_course VALUES ('98', '金明校区', '单片机原理与应用', '3.0', '1-18', '0', '二', '7-8节', '18', '金明综合楼5204', '李军伟', '14-4');
INSERT INTO teacher_course VALUES ('99', '金明校区', '单片机原理与应用', '3.0', '1-18', '0', '五', '1-2节', '18', '金明综合楼5204', '李军伟', '14-4');
INSERT INTO teacher_course VALUES ('100', '金明校区', '单片机原理与应用实验', '1.0', '1-18', '0', '六', '3-4节', '18', '自动化实验室', '李军伟', '14-4');
INSERT INTO teacher_course VALUES ('101', '民生校区', '单片机原理与应用', '0', '0', '0', '二', '9-10', '0', '4号教学楼4101', '李军伟', '14民生自动化');
INSERT INTO teacher_course VALUES ('102', '民生校区', '单片机原理与应用', '0', '0', '0', '五', '3-4', '0', '4号教学楼4202', '李军伟', '14民生自动化');
INSERT INTO teacher_course VALUES ('103', '金明校区', '单片机原理与应用实验', '0', '0', '0', '六', '7-8', '0', '自动化实验室', '李军伟', '14民生自动化');
INSERT INTO teacher_course VALUES ('104', '金明校区', '数据结构', '4.0', '1-18', '0', '五', '7-8节', '18', '608实验室', '李征', '15-3');
INSERT INTO teacher_course VALUES ('105', '金明校区', '数据结构', '4.0', '1-18', '0', '四', '9-10节', '18', '金明综合楼2203', '李征', '15-3');
INSERT INTO teacher_course VALUES ('106', '金明校区', '数据结构', '4.0', '1-18', '0', '二', '9-10节', '18', '金明综合楼2203', '李征', '15-3');
INSERT INTO teacher_course VALUES ('107', '金明校区', '数据结构', '0', '0', '0', '二', '3-4', '0', '曾宪梓楼206', '李征', '2015级中美计算机航空方向');
INSERT INTO teacher_course VALUES ('108', '金明校区', '数据结构', '0', '0', '0', '五', '1-2', '0', '金明综合楼6302', '李征', '2015级中美计算机航空方向');
INSERT INTO teacher_course VALUES ('109', '金明校区', '数据结构实验', '0', '3-18', '0', '五', '3-4节', '0', '608实验室', '李征', '2015级中美计算机航空方向');
INSERT INTO teacher_course VALUES ('110', '金明校区', '数据结构', '4.0', '1-18', '0', '四', '1-2节', '18', '金明综合楼5307', '刘春', '15-1');
INSERT INTO teacher_course VALUES ('111', '金明校区', '数据结构', '4.0', '1-18', '0', '四', '9-10节', '18', '201实验室', '刘春', '15-1');
INSERT INTO teacher_course VALUES ('112', '金明校区', '数据结构', '4.0', '1-18', '0', '二', '9-10节', '18', '金明综合楼2204', '刘春', '15-1');
INSERT INTO teacher_course VALUES ('113', '金明校区', '数据结构', '4.0', '1-18', '0', '二', '7-8节', '18', '金明综合楼2204', '刘春', '15-2');
INSERT INTO teacher_course VALUES ('114', '金明校区', '数据结构', '4.0', '1-18', '0', '四', '3-4节', '18', '金明综合楼5307', '刘春', '15-2');
INSERT INTO teacher_course VALUES ('115', '金明校区', '数据结构', '4.0', '1-18', '0', '五', '7-8节', '18', '201实验室', '刘春', '15-2');
INSERT INTO teacher_course VALUES ('116', '金明校区', '网络信息安全', '2.0', '1-18', '双', '五', '7-8节', '9', '7号教学楼7302', '刘辉', '14-2');
INSERT INTO teacher_course VALUES ('117', '金明校区', '网络信息安全', '2.0', '1-18', '0', '三', '7-8节', '18', '7号教学楼7204', '刘辉', '14-2');
INSERT INTO teacher_course VALUES ('118', '金明校区', '网络信息安全实验', '1.0', '1-18', '0', '三', '1-2节', '18', '网络实训室', '刘辉', '14-2（第1组）');
INSERT INTO teacher_course VALUES ('119', '金明校区', '网络信息安全实验', '1.0', '1-18', '0', '五', '3-4节', '18', '网络实训室', '刘辉', '14-2（第2组）');
INSERT INTO teacher_course VALUES ('120', '金明校区', '计算机组成原理', '0', '0', '0', '一', '1-2', '0', '7号教学楼7304', '刘辉', '2015级中美计算机航空方向');
INSERT INTO teacher_course VALUES ('121', '金明校区', '计算机组成原理', '0', '0', '0', '二', '1-2', '0', '曾宪梓楼206', '刘辉', '2015级中美计算机航空方向');
INSERT INTO teacher_course VALUES ('122', '金明校区', '计算机组成原理实验', '0', '3-18', '0', '三', '3-4', '0', '611实验室', '刘辉', '2015级中美计算机航空方向');
INSERT INTO teacher_course VALUES ('123', '金明校区', '工程项目训练（二）', '1.0', '1-18', '0', '五', '9-10节', '18', '606实验室', '马骏', '14-2');
INSERT INTO teacher_course VALUES ('124', '金明校区', '基本电路与电子学实验', '1.0', '1-18', '0', '二', '7-8节', '18', '物理学院A楼', '马晓燕', '16-4');
INSERT INTO teacher_course VALUES ('125', '金明校区', '计算机图形学实验', '1.0', '1-18', '0', '一', '3-4节', '18', '611实验室', '苗茹', '14-1-1');
INSERT INTO teacher_course VALUES ('126', '金明校区', '计算机图形学', '2.0', '1-18', '0', '一', '7-8节', '18', '金明综合楼5102', '苗茹', '14-1-2');
INSERT INTO teacher_course VALUES ('127', '金明校区', '计算机图形学实验', '1.0', '1-18', '0', '一', '1-2节', '18', '611实验室', '苗茹', '14-1-2');
INSERT INTO teacher_course VALUES ('128', '金明校区', '电力电子技术', '2.0', '1-18', '0', '四', '1-2节', '18', '金明综合楼2301', '秦春斌', '15-5');
INSERT INTO teacher_course VALUES ('129', '金明校区', '电力电子技术', '2.0', '1-18', '单', '二', '9-10节', '9', '自动化实验室', '秦春斌', '15-5');
INSERT INTO teacher_course VALUES ('130', '民生校区', '电力电子技术', '0', '0', '单', '二', '1-2', '0', '1号教学楼1304', '秦春斌', '15民生自动化');
INSERT INTO teacher_course VALUES ('131', '民生校区', '电力电子技术', '0', '0', '0', '四', '3-4', '0', '1号教学楼1103', '秦春斌', '15民生自动化');
INSERT INTO teacher_course VALUES ('132', '金明校区', '数字图像处理', '2.0', '1-18', '0', '三', '9-10节', '18', '金明综合楼5401', '宋相法', '14-1-1');
INSERT INTO teacher_course VALUES ('133', '金明校区', '数字图像处理', '2.0', '1-18', '单', '一', '1-2节', '9', '金明综合楼5401', '宋相法', '14-1-1');
INSERT INTO teacher_course VALUES ('134', '金明校区', '数字图像处理实验', '1.0', '1-18', '0', '三', '1-2节', '18', '608实验室', '宋相法', '14-1-1');
INSERT INTO teacher_course VALUES ('135', '金明校区', '数字图像处理', '2.0', '1-18', '单', '一', '3-4节', '9', '金明综合楼5401', '宋相法', '14-1-2');
INSERT INTO teacher_course VALUES ('136', '金明校区', '数字图像处理', '2.0', '1-18', '0', '三', '7-8节', '18', '金明综合楼5401', '宋相法', '14-1-2');
INSERT INTO teacher_course VALUES ('137', '金明校区', '数字图像处理实验', '1.0', '1-18', '0', '一', '9-10节', '18', '201实验室', '宋相法', '14-1-2');
INSERT INTO teacher_course VALUES ('138', '金明校区', 'C++程序设计', '4.0', '1-18', '0', '六', '1-2节', '18', '608实验室', '王建林', '16-1');
INSERT INTO teacher_course VALUES ('139', '金明校区', 'C++程序设计', '4.0', '1-18', '0', '三', '9-10节', '18', '608实验室', '王建林', '16-1');
INSERT INTO teacher_course VALUES ('140', '金明校区', 'C++程序设计', '4.0', '1-18', '0', '三', '7-8节', '18', '608实验室', '王建林', '16-1');
INSERT INTO teacher_course VALUES ('141', '金明校区', 'C++程序设计', '4.0', '1-18', '0', '一', '7-8节', '18', '608实验室', '王建林', '16-2');
INSERT INTO teacher_course VALUES ('142', '金明校区', 'C++程序设计', '4.0', '1-18', '0', '一', '9-10节', '18', '608实验室', '王建林', '16-2');
INSERT INTO teacher_course VALUES ('143', '金明校区', 'C++程序设计', '4', '1-18', '0', '六', '3-4节', '18', '608实验室', '王建林', '%s');
INSERT INTO teacher_course VALUES ('144', '金明校区', 'C语言程序设计', '0', '0', '0', '一', '%s', '0', '606实验室', '王娟', '16民生自动化');
INSERT INTO teacher_course VALUES ('145', '金明校区', 'C语言程序设计', '0', '0', '0', '五', '7-8', '0', '606实验室', '王娟', '16民生自动化');
INSERT INTO teacher_course VALUES ('146', '金明校区', '单片机原理与接口技术', '4.0', '1-18', '0', '二', '7-8节', '18', '金明综合楼6304', '王俊', '15-5');
INSERT INTO teacher_course VALUES ('147', '金明校区', '单片机原理与接口技术', '4.0', '1-18', '0', '四', '3-4节', '18', '金明综合楼5107', '王俊', '15-5');
INSERT INTO teacher_course VALUES ('148', '民生校区', '单片机原理与接口技术', '0', '0', '0', '二', '3-4', '0', '1号教学楼1402', '王俊', '15民生自动化');
INSERT INTO teacher_course VALUES ('149', '民生校区', '单片机原理与接口技术', '0', '0', '0', '四', '9-10', '0', '2号教学楼2202', '王俊', '15民生自动化');
INSERT INTO teacher_course VALUES ('150', '金明校区', '仪表与检测', '4.0', '1-18', '0', '一', '3-4节', '18', '金明综合楼5107', '王胜', '15-5');
INSERT INTO teacher_course VALUES ('151', '金明校区', '仪表与检测', '4.0', '1-18', '0', '三', '3-4节', '18', '金明综合楼2201', '王胜', '15-5');
INSERT INTO teacher_course VALUES ('152', '民生校区', '仪表与检测', '0', '0', '0', '一', '7-8', '0', '2号教学楼2305', '王胜', '15民生自动化');
INSERT INTO teacher_course VALUES ('153', '民生校区', '仪表与检测', '0', '0', '0', '三', '7-8', '0', '1号教学楼1302', '王胜', '15民生自动化');
INSERT INTO teacher_course VALUES ('154', '金明校区', '复变函数', '3.0', '1-18', '0', '一', '9-10节', '18', '金明综合楼6302', '魏倩', '16-5');
INSERT INTO teacher_course VALUES ('155', '金明校区', '复变函数', '3', '1-18', '单', '四', '9-10节', '9', '金明综合楼6302', '魏倩', '%s');
INSERT INTO teacher_course VALUES ('156', '民生校区', '复变函数', '0', '0', '0', '一', '%s', '0', '1号教学楼1303', '魏倩', '16民生自动化');
INSERT INTO teacher_course VALUES ('157', '民生校区', '复变函数', '0', '0', '单', '四', '1-2', '0', '1号教学楼1103', '魏倩', '16民生自动化');
INSERT INTO teacher_course VALUES ('158', '金明校区', '基本电路与电子学实验', '1.0', '1-18', '0', '三', '1-2节', '18', '物理学院A楼', '吴永辉', '16-1');
INSERT INTO teacher_course VALUES ('159', '金明校区', '基本电路与电子学实验', '1.0', '1-18', '0', '二', '9-10节', '18', '物理学院A楼', '吴永辉', '16-2');
INSERT INTO teacher_course VALUES ('160', '金明校区', '基本电路与电子学实验', '1.0', '1-18', '0', '二', '11-12节', '18', '物理学院A楼', '吴永辉', '16-3');
INSERT INTO teacher_course VALUES ('161', '金明校区', '电路实验', '1.0', '1-18', '0', '二', '1-2节', '18', '物理学院A楼', '吴永辉', '16-5（第1组）');
INSERT INTO teacher_course VALUES ('162', '金明校区', '电路实验', '1', '1-18', '0', '二', '3-4节', '18', '物理学院A楼', '吴永辉', '16-5（第2组）');
INSERT INTO teacher_course VALUES ('163', '金明校区', '电路实验', '0', '0', '0', '五', '9-10', '0', '物理学院A楼', '吴永辉', '16民生自动化');
INSERT INTO teacher_course VALUES ('164', '金明校区', '基本电路与电子学实验', '1.0', '1-18', '0', '四', '9-10节', '18', '物理学院A楼', '吴永辉', '其他');
INSERT INTO teacher_course VALUES ('165', '金明校区', '网络应用编程', '4.0', '1-18', '0', '一', '3-4节', '18', '608实验室', '肖春静', '15-1');
INSERT INTO teacher_course VALUES ('166', '金明校区', '网络应用编程', '4.0', '1-18', '0', '四', '3-4节', '18', '金明综合楼6103', '肖春静', '15-1');
INSERT INTO teacher_course VALUES ('167', '金明校区', '网络应用编程', '4.0', '1-18', '0', '二', '7-8节', '18', '金明综合楼2202', '肖春静', '15-1');
INSERT INTO teacher_course VALUES ('168', '金明校区', '网络应用编程', '4.0', '1-18', '0', '二', '9-10节', '18', '金明综合楼2202', '肖春静', '15-2');
INSERT INTO teacher_course VALUES ('169', '金明校区', '网络应用编程', '4.0', '1-18', '0', '一', '1-2节', '18', '608实验室', '肖春静', '15-2');
INSERT INTO teacher_course VALUES ('170', '金明校区', '网络应用编程', '4.0', '1-18', '0', '四', '1-2节', '18', '金明综合楼6103', '肖春静', '15-2');
INSERT INTO teacher_course VALUES ('171', '金明校区', '网络应用编程', '0', '0', '0', '二', '1-2节', '0', '金明综合楼3108', '肖春静', '2014-维大计算机班');
INSERT INTO teacher_course VALUES ('172', '金明校区', '网络应用编程', '0', '0', '0', '三', '3-4节', '0', '608实验室', '肖春静', '2014-维大计算机班');
INSERT INTO teacher_course VALUES ('173', '金明校区', '网络应用编程', '0', '0', '0', '五', '3-4节', '0', '金明综合楼3308', '肖春静', '2014-维大计算机班');
INSERT INTO teacher_course VALUES ('174', '金明校区', '编译原理', '4.0', '1-18', '单', '二', '1-2节', '9', '608实验室', '谢谦', '14-3');
INSERT INTO teacher_course VALUES ('175', '金明校区', '编译原理', '4.0', '1-18', '0', '二', '7-8节', '18', '金明综合楼4103', '谢谦', '14-3');
INSERT INTO teacher_course VALUES ('176', '金明校区', '编译原理', '4.0', '1-18', '0', '四', '1-2节', '18', '7号教学楼7304', '谢谦', '14-3');
INSERT INTO teacher_course VALUES ('177', '金明校区', '软件测试', '3.0', '1-18', '0', '三', '3-4节', '18', '金明综合楼2204', '谢谦', '14-3');
INSERT INTO teacher_course VALUES ('178', '金明校区', '软件测试', '3.0', '1-18', '单', '五', '7-8节', '9', '7号教学楼7204', '谢谦', '14-3');
INSERT INTO teacher_course VALUES ('179', '金明校区', '软件测试', '3.0', '1-18', '单', '二', '3-4节', '9', '608实验室', '谢谦', '14-3');
INSERT INTO teacher_course VALUES ('180', '金明校区', '工程项目训练（二）', '1.0', '1-18', '0', '五', '9-10节', '18', '201实验室', '谢谦', '14-3');
INSERT INTO teacher_course VALUES ('181', '金明校区', '编译原理', '0', '0', '0', '二', '9-10节', '0', '金明综合楼4103', '谢谦', '2014-维大计算机班');
INSERT INTO teacher_course VALUES ('182', '金明校区', '编译原理', '0', '0', '0', '四', '3-4节', '0', '金明综合楼3308', '谢谦', '2014-维大计算机班');
INSERT INTO teacher_course VALUES ('183', '金明校区', '编译原理', '0', '0', '单', '三', '1-2节', '0', '201实验室', '谢谦', '2014-维大计算机班');
INSERT INTO teacher_course VALUES ('184', '金明校区', 'C++程序设计', '4.0', '1-18', '0', '一', '7-8节', '18', '606实验室', '闫永航', '16-3');
INSERT INTO teacher_course VALUES ('185', '金明校区', 'C++程序设计', '4.0', '1-18', '0', '六', '3-4节', '18', '606实验室', '闫永航', '16-3');
INSERT INTO teacher_course VALUES ('186', '金明校区', 'C++程序设计', '4.0', '1-18', '0', '一', '9-10节', '18', '606实验室', '闫永航', '16-3');
INSERT INTO teacher_course VALUES ('187', '金明校区', 'C++程序设计', '4.0', '1-18', '0', '三', '7-8节', '18', '606实验室', '闫永航', '16-4');
INSERT INTO teacher_course VALUES ('188', '金明校区', 'C++程序设计', '4.0', '1-18', '0', '三', '9-10节', '18', '606实验室', '闫永航', '16-4');
INSERT INTO teacher_course VALUES ('189', '金明校区', 'C++程序设计', '4.0', '1-18', '0', '六', '1-2节', '18', '606实验室', '闫永航', '16-4');
INSERT INTO teacher_course VALUES ('190', '金明校区', '工程项目训练（二）', '1.0', '1-18', '0', '五', '9-10节', '18', '608实验室', '阎朝坤', '14-1-1');
INSERT INTO teacher_course VALUES ('191', '明伦校区', 'Linux操作系统', '0', '0', '0', '二', '7-8节', '0', '10号楼300', '阎朝坤', '2016-计算机13.14.15');
INSERT INTO teacher_course VALUES ('192', '明伦校区', 'Linux操作系统', '0', '0', '0', '三', '7-8节', '0', '10号楼300', '阎朝坤', '2016-计算机13.14.15');
INSERT INTO teacher_course VALUES ('193', '明伦校区', 'Linux操作系统', '0', '0', '0', '二', '9-10节', '0', '10号楼300', '阎朝坤', '2016-计算机16.17.18');
INSERT INTO teacher_course VALUES ('194', '明伦校区', 'Linux操作系统', '0', '0', '0', '三', '9-10节', '0', '10号楼300', '阎朝坤', '2016-计算机16.17.18');
INSERT INTO teacher_course VALUES ('195', '金明校区', '移动应用开发技术', '3.0', '1-18', '0', '三', '1-2节', '18', '7号教学楼7402', '杨伟', '15-1');
INSERT INTO teacher_course VALUES ('196', '金明校区', '移动应用开发技术', '3.0', '1-18', '0', '五', '1-2节', '18', '608实验室', '杨伟', '15-1');
INSERT INTO teacher_course VALUES ('197', '金明校区', '移动应用开发技术', '3.0', '1-18', '单', '五', '7-8节', '9', '7号教学楼7302', '杨伟', '15-1');
INSERT INTO teacher_course VALUES ('198', '金明校区', '移动应用开发技术', '3.0', '1-18', '0', '三', '3-4节', '18', '7号教学楼7402', '杨伟', '15-2');
INSERT INTO teacher_course VALUES ('199', '金明校区', '移动应用开发技术', '3.0', '1-18', '单', '五', '3-4节', '9', '7号教学楼7202', '杨伟', '15-2');
INSERT INTO teacher_course VALUES ('200', '金明校区', '移动应用开发技术', '3.0', '1-18', '0', '四', '9-10节', '18', '608实验室', '杨伟', '15-2');
INSERT INTO teacher_course VALUES ('201', '金明校区', 'Web系统与技术', '3.0', '1-18', '0', '一', '3-4节', '18', '7号教学楼7202', '杨阳', '14-2');
INSERT INTO teacher_course VALUES ('202', '金明校区', 'Web系统与技术', '3.0', '1-18', '0', '三', '3-4节', '18', '金明综合楼2303', '杨阳', '14-2');
INSERT INTO teacher_course VALUES ('203', '金明校区', 'Web系统与技术实验', '1.0', '1-18', '0', '三', '9-10节', '18', '201实验室', '杨阳', '14-2');
INSERT INTO teacher_course VALUES ('204', '金明校区', 'Web系统与技术', '3.0', '1-18', '0', '一', '1-2节', '18', '7号教学楼7202', '杨阳', '14-3');
INSERT INTO teacher_course VALUES ('205', '金明校区', 'Web系统与技术', '3.0', '1-18', '0', '三', '1-2节', '18', '金明综合楼2303', '杨阳', '14-3');
INSERT INTO teacher_course VALUES ('206', '金明校区', 'Web系统与技术实验', '1.0', '1-18', '0', '三', '7-8节', '18', '201实验室', '杨阳', '14-3');
INSERT INTO teacher_course VALUES ('207', '金明校区', '数据结构', '4.0', '1-18', '0', '五', '3-4节', '18', '606实验室', '袁科', '15-4');
INSERT INTO teacher_course VALUES ('208', '金明校区', '数据结构', '4.0', '1-18', '0', '二', '7-8节', '18', '金明综合楼2302', '袁科', '15-4');
INSERT INTO teacher_course VALUES ('209', '金明校区', '数据结构', '4.0', '1-18', '0', '五', '7-8节', '18', '金明综合楼5202', '袁科', '15-4');
INSERT INTO teacher_course VALUES ('210', '金明校区', '航空学', '0', '0', '0', '一', '7-8', '0', '7号教学楼7404', '袁科', '2016级中美工管专业');
INSERT INTO teacher_course VALUES ('211', '金明校区', '航空学', '0', '0', '0', '二', '9-10', '0', '金明综合楼2302', '袁科', '2016级中美工管专业');
INSERT INTO teacher_course VALUES ('212', '金明校区', '计算机控制技术', '4.0', '1-18', '0', '二', '9-10节', '18', '金明综合楼6303', '张德华', '14-4');
INSERT INTO teacher_course VALUES ('213', '金明校区', '计算机控制技术', '4.0', '1-18', '0', '四', '1-2节', '18', '7号教学楼7402', '张德华', '14-4');
INSERT INTO teacher_course VALUES ('214', '民生校区', '计算机控制技术', '0', '0', '0', '二', '%s', '0', '4号教学楼4103', '张德华', '14民生自动化');
INSERT INTO teacher_course VALUES ('215', '民生校区', '计算机控制技术', '0', '0', '0', '四', '3-4', '0', '4号教学楼4404', '张德华', '14民生自动化');
INSERT INTO teacher_course VALUES ('216', '金明校区', '计算机控制技术', '0', '0', '0', '六', '1-2', '0', '自动化实验室', '张德华', '14民生自动化');
INSERT INTO teacher_course VALUES ('217', '金明校区', '操作系统', '0', '0', '0', '三', '1-2节', '0', '606实验室', '张帆', '2014-计算机(航）X10.11.12');
INSERT INTO teacher_course VALUES ('218', '金明校区', '操作系统', '0', '0', '0', '三', '3-4节', '0', '金明综合楼3408', '张帆', '2014-计算机(航）X10.11.12');
INSERT INTO teacher_course VALUES ('219', '金明校区', '操作系统', '0', '0', '0', '五', '1-2节', '0', '金明综合楼3408', '张帆', '2014-计算机(航）X10.11.12');
INSERT INTO teacher_course VALUES ('220', '金明校区', '机场设计', '0', '0', '0', '五', '7-8', '0', '金明综合楼3303', '张戈', '2014-计算机(航）X10.11.12');
INSERT INTO teacher_course VALUES ('221', '金明校区', '机场设计', '0', '0', '单', '二', '9-10', '0', '606实验室', '张戈', '2014-计算机(航）X10.11.12');
INSERT INTO teacher_course VALUES ('222', '金明校区', '机场设计', '0', '0', '双', '二', '7-8', '0', '金明综合楼3101', '张戈', '2014-计算机(航）X10.11.12');
INSERT INTO teacher_course VALUES ('223', '明伦校区', '网络管理', '0', '1-16', '0', '一', '1-2', '0', '十号楼220', '张戈', '2015计算机13.14.15');
INSERT INTO teacher_course VALUES ('224', '明伦校区', '网络管理', '0', '1-16', '0', '三', '1-2', '0', '综合教学楼219', '张戈', '2015计算机13.14.15');
INSERT INTO teacher_course VALUES ('225', '金明校区', '工程项目训练（二）', '1.0', '1-18', '0', '五', '9-10节', '18', '611实验室', '张瑾', '14-1-2');
INSERT INTO teacher_course VALUES ('226', '明伦校区', '数据库系统原理及应用', '0', '0', '0', '二', '7-9节', '0', '十号楼128', '张瑾', '2015计算机13.14.15');
INSERT INTO teacher_course VALUES ('227', '明伦校区', '数据库系统原理及应用', '0', '0', '0', '五', '1-4节', '0', '综合楼613', '张瑾', '2015计算机13.14.15');
INSERT INTO teacher_course VALUES ('228', '金明校区', '航空高级计算机应用', '0', '0', '0', '一', '3-4', '0', '金明综合楼4202', '张磊', '2014-计算机(航）X10.11.12');
INSERT INTO teacher_course VALUES ('229', '金明校区', '航空高级计算机应用', '0', '0', '双', '二', '9-10', '0', '金明综合楼3101', '张磊', '2014-计算机(航）X10.11.12');
INSERT INTO teacher_course VALUES ('230', '金明校区', '航空高级计算机应用', '0', '0', '0', '二', '1-2', '0', '606实验室', '张磊', '2014-计算机(航）X10.11.12');
INSERT INTO teacher_course VALUES ('231', '金明校区', 'C++程序设计（二）', '0', '0', '0', '二', '7-8', '0', '金明综合楼2203', '张磊', '2016级中美计算机航空方向');
INSERT INTO teacher_course VALUES ('232', '金明校区', 'C++程序设计（二）实验', '0', '3-18', '0', '三', '3-4', '0', '606实验室', '张磊', '2016级中美计算机航空方向');
INSERT INTO teacher_course VALUES ('233', '金明校区', 'C++', '0', '0', '0', '一', '7-8', '0', '曾宪梓楼303', '张磊', '2016-中德生物D3.4');
INSERT INTO teacher_course VALUES ('234', '金明校区', 'C++', '0', '0', '0', '一', '9-10', '0', '611实验室', '张磊', '2016-中德生物D3.4');
INSERT INTO teacher_course VALUES ('235', '金明校区', '专业英语（二）', '1.0', '1-18', '0', '一', '9-10节', '18', '曾宪梓楼406', '张延锋', '14-1-1');
INSERT INTO teacher_course VALUES ('236', '金明校区', '专业英语（二）', '1.0', '1-18', '0', '五', '1-2节', '18', '7号教学楼7302', '张延锋', '14-1-2');
INSERT INTO teacher_course VALUES ('237', '金明校区', '专业英语（二）', '1.0', '1-18', '0', '一', '7-8节', '18', '曾宪梓楼406', '张延锋', '14-2');
INSERT INTO teacher_course VALUES ('238', '金明校区', '专业英语（二）', '1.0', '1-18', '0', '五', '3-4节', '18', '7号教学楼7302', '张延锋', '14-3');
INSERT INTO teacher_course VALUES ('239', '金明校区', '数据库系统原理及应用', '3.0', '1-18', '0', '六', '3-4节', '18', '201实验室', '张重生', '16-1');
INSERT INTO teacher_course VALUES ('240', '金明校区', '数据库系统原理及应用', '3.0', '1-18', '0', '四', '3-4节', '18', '曾宪梓楼211', '张重生', '16-1');
INSERT INTO teacher_course VALUES ('241', '金明校区', '数据库系统原理及应用', '3.0', '1-18', '单', '六', '9-10节', '9', '金明综合楼4103', '张重生', '16-1');
INSERT INTO teacher_course VALUES ('242', '金明校区', '数据库系统原理及应用', '3.0', '1-18', '0', '六', '1-2节', '18', '201实验室', '张重生', '16-2');
INSERT INTO teacher_course VALUES ('243', '金明校区', '数据库系统原理及应用', '3.0', '1-18', '0', '四', '1-2节', '18', '曾宪梓楼211', '张重生', '16-2');
INSERT INTO teacher_course VALUES ('244', '金明校区', '数据库系统原理及应用', '3.0', '1-18', '单', '六', '7-8节', '9', '金明综合楼4103', '张重生', '16-2');
INSERT INTO teacher_course VALUES ('245', '明伦校区', 'Web数据库技术', '0', '1-16', '0', '一', '%s', '0', '综合楼613', '赵建辉', '2015计算机13.15（1）-机房');
INSERT INTO teacher_course VALUES ('246', '明伦校区', 'Web数据库技术', '0', '1-16', '0', '五', '9-10', '0', '综合楼613', '赵建辉', '2015计算机13.15（1）-机房');
INSERT INTO teacher_course VALUES ('247', '明伦校区', 'Web数据库技术', '0', '1-16', '0', '一', '7-8', '0', '综合楼613', '赵建辉', '2015计算机14.15（2）-机房');
INSERT INTO teacher_course VALUES ('248', '明伦校区', 'Web数据库技术', '0', '1-16', '0', '五', '7-8', '0', '综合楼613', '赵建辉', '2015计算机14.15（2）-机房');
INSERT INTO teacher_course VALUES ('249', '明伦校区', '高级语言程序设计', '0', '0', '0', '一', '1-2', '0', '10号楼200', '赵建辉', '2016-计算机13.14.15');
INSERT INTO teacher_course VALUES ('250', '明伦校区', '高级语言程序设计', '0', '0', '0', '二', '9-10', '0', '10号楼200', '赵建辉', '2016-计算机13.14.15');
INSERT INTO teacher_course VALUES ('251', '明伦校区', '高级语言程序设计', '0', '0', '0', '三', '%s', '0', '10号楼200', '赵建辉', '2016-计算机13.14.15');
INSERT INTO teacher_course VALUES ('252', '明伦校区', '高级语言程序设计', '0', '0', '0', '一', '%s', '0', '10号楼200', '赵建辉', '2016-计算机16.17.18');
INSERT INTO teacher_course VALUES ('253', '明伦校区', '高级语言程序设计', '0', '0', '0', '二', '%s', '0', '10号楼200', '赵建辉', '2016-计算机16.17.18');
INSERT INTO teacher_course VALUES ('254', '明伦校区', '高级语言程序设计', '0', '0', '0', '三', '7-8', '0', '10号楼200', '赵建辉', '2016-计算机16.17.18');
INSERT INTO teacher_course VALUES ('255', '明伦校区', 'Web开发与内容管理系统', '0', '0', '0', '一', '3-4节', '0', '10号楼300', '赵伟', '2016-计算机13.14.15');
INSERT INTO teacher_course VALUES ('256', '明伦校区', 'Web开发与内容管理系统', '0', '0', '0', '五', '9-10', '0', '10号楼300', '赵伟', '2016-计算机13.14.15');
INSERT INTO teacher_course VALUES ('257', '明伦校区', 'Web开发与内容管理系统', '0', '0', '0', '一', '1-2', '0', '10号楼300', '赵伟', '2016-计算机16.17.18');
INSERT INTO teacher_course VALUES ('258', '明伦校区', 'Web开发与内容管理系统', '0', '0', '0', '五', '7-8', '0', '10号楼300', '赵伟', '2016-计算机16.17.18');
INSERT INTO teacher_course VALUES ('259', '金明校区', '软件项目管理', '3.0', '1-18', '0', '三', '9-10节', '18', '7号教学楼7302', '周兵', '14-3');
INSERT INTO teacher_course VALUES ('260', '金明校区', '软件项目管理', '3.0', '1-18', '0', '五', '1-2节', '18', '606实验室', '周兵', '14-3');
INSERT INTO teacher_course VALUES ('261', '金明校区', '软件项目管理', '3.0', '1-18', '双', '五', '7-8节', '9', '7号教学楼7204', '周兵', '14-3');
INSERT INTO teacher_course VALUES ('262', '明伦校区', 'IT管理', '0', '1-16', '0', '一', '7-8', '0', '综合楼314', '周兵', '2015计算机13.15（1）-机房');
INSERT INTO teacher_course VALUES ('263', '明伦校区', 'IT管理', '0', '1-16', '0', '二', '1-2', '0', '综合楼314', '周兵', '2015计算机13.15（1）-机房');
INSERT INTO teacher_course VALUES ('264', '明伦校区', 'IT管理', '0', '1-16', '0', '一', '9-10', '0', '综合楼314', '周兵', '2015计算机14.15（2）-机房');
INSERT INTO teacher_course VALUES ('265', '明伦校区', 'IT管理', '0', '1-16', '0', '二', '3-4', '0', '综合楼314', '周兵', '2015计算机14.15（2）-机房');
INSERT INTO teacher_course VALUES ('266', '金明校区', '基本电路与电子学', '2.0', '1-18', '单', '二', '7-8节', '9', '金明综合楼3509', '周福娜', '16-2');
INSERT INTO teacher_course VALUES ('267', '金明校区', '基本电路与电子学', '2.0', '1-18', '0', '五', '3-4节', '18', '曾宪梓楼206', '周福娜', '16-2');
INSERT INTO teacher_course VALUES ('268', '金明校区', '工程项目训练（二）', '1.0', '1-18', '0', '五', '9-10节', '18', '自动化实验室', '周福娜', '14-4');
INSERT INTO teacher_course VALUES ('269', '金明校区', '现代控制论', '3.0', '1-18', '0', '五', '3-4节', '18', '金明综合楼5204', '周林', '14-4');
INSERT INTO teacher_course VALUES ('270', '金明校区', '现代控制论', '3.0', '1-18', '双', '二', '3-4节', '9', '金明综合楼5104', '周林', '14-4');
INSERT INTO teacher_course VALUES ('271', '民生校区', '现代控制论', '0', '0', '双', '二', '1-2', '0', '实训楼5507', '周林', '14民生自动化');
INSERT INTO teacher_course VALUES ('272', '民生校区', '现代控制论', '0', '0', '0', '五', '1-2', '0', '4号教学楼4202', '周林', '14民生自动化');
INSERT INTO teacher_course VALUES ('273', '金明校区', '航空气象学', '0', '0', '0', '二', '3-4', '0', '金明综合楼6301', '左宪禹', '2016级中美计算机航空方向');
INSERT INTO teacher_course VALUES ('274', '金明校区', '航空气象学', '0', '0', '0', '五', '%s', '0', '金明综合楼6301', '左宪禹', '2016级中美计算机航空方向');

-- ----------------------------
-- Table structure for `test`
-- ----------------------------
DROP TABLE IF EXISTS `test`;
CREATE TABLE `test` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `test` int(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of test
-- ----------------------------

-- ----------------------------
-- Table structure for `tpresent`
-- ----------------------------
DROP TABLE IF EXISTS `tpresent`;
CREATE TABLE `tpresent` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tID` varchar(13) DEFAULT NULL,
  `tName` varchar(20) DEFAULT NULL,
  `tRecordTime` date DEFAULT NULL,
  `bool` int(1) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tpresent
-- ----------------------------

-- ----------------------------
-- Table structure for `tuser`
-- ----------------------------
DROP TABLE IF EXISTS `tuser`;
CREATE TABLE `tuser` (
  `tName` varchar(30) DEFAULT NULL,
  `tID` varchar(11) NOT NULL,
  `tPassword` varchar(255) DEFAULT 'e10adc3949ba59abbe56e057f20f883e',
  `tIsAssistant` int(2) DEFAULT '0',
  `tPower` int(1) DEFAULT '0',
  `tTime` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`tID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tuser
-- ----------------------------
INSERT INTO tuser VALUES ('admin', '123456', 'e10adc3949ba59abbe56e057f20f883e', '0', '10', null);
INSERT INTO tuser VALUES ('二伟', '1427152012', 'e10adc3949ba59abbe56e057f20f883e', '0', '0', null);
INSERT INTO tuser VALUES ('里狗剩', '1427152013', 'e10adc3949ba59abbe56e057f20f883e', '0', '0', null);
INSERT INTO tuser VALUES ('老王', '1427152014', 'e10adc3949ba59abbe56e057f20f883e', '0', '0', null);
INSERT INTO tuser VALUES ('小红', '1427152015', 'e10adc3949ba59abbe56e057f20f883e', '0', '0', null);
INSERT INTO tuser VALUES ('丽丽', '1427152016', 'e10adc3949ba59abbe56e057f20f883e', '0', '0', null);
INSERT INTO tuser VALUES ('花花', '1427152017', 'e10adc3949ba59abbe56e057f20f883e', '0', '0', null);
INSERT INTO tuser VALUES ('小明', '1427152056', 'e10adc3949ba59abbe56e057f20f883e', '0', '0', null);
INSERT INTO tuser VALUES ('小花', '1427152073', 'e10adc3949ba59abbe56e057f20f883e', '0', '0', null);
INSERT INTO tuser VALUES ('杜昂', '1427152079', 'e10adc3949ba59abbe56e057f20f883e', '0', '0', null);
