-- phpMyAdmin SQL Dump
-- version 2.10.3
-- http://www.phpmyadmin.net
-- 
-- โฮสต์: localhost
-- เวลาในการสร้าง: 
-- รุ่นของเซิร์ฟเวอร์: 5.0.51
-- รุ่นของ PHP: 5.2.14

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

-- 
-- ฐานข้อมูล: `phpbook`
-- 

-- --------------------------------------------------------

-- 
-- โครงสร้างตาราง `webboard_post`
-- 

CREATE TABLE `webboard_post` (
  `question_id` int(10) NOT NULL auto_increment,
  `subject` varchar(255) NOT NULL,
  `datadate` datetime NOT NULL,
  `subject_detail` text NOT NULL,
  `attach_file` varchar(255) default NULL,
  `name` varchar(50) NOT NULL,
  `ip_address` varchar(15) NOT NULL,
  `view` int(2) NOT NULL,
  `reply` int(2) NOT NULL,
  PRIMARY KEY  (`question_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

-- 
-- dump ตาราง `webboard_post`
-- 

INSERT INTO `webboard_post` VALUES (1, 'ดาต้าเบสเซิร์ฟเวอร์ (Database Server)ที่ได้รับความนิยมมากที่สุด', '2010-10-31 02:49:46', 'MySQL โปรแกรม Database Server ทีได้รับความนิยมมากในปัจจุบัน เนื่องจากเป็นของฟรี และมีประสิทธิภาพสูงในการทำงาน สามารถรองรับข้อมูลในฐานข้อมูลได้เป็นล้่าน ๆ เรคคอดเลยทีเดียว อีกทั้งยังมีความสามารถในการประมวลผล และความน่าเชื่อถือที่สูงมาก', '1288468186', 'Nott', '127.0.0.1', 2, 1);

-- --------------------------------------------------------

-- 
-- โครงสร้างตาราง `webboard_reply`
-- 

CREATE TABLE `webboard_reply` (
  `reply_id` int(10) NOT NULL auto_increment,
  `question_id` int(10) NOT NULL,
  `datadate` datetime NOT NULL,
  `reply_detail` text NOT NULL,
  `attach_file` varchar(255) NOT NULL,
  `name` varchar(50) NOT NULL,
  `ip_address` varchar(15) NOT NULL,
  PRIMARY KEY  (`reply_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

-- 
-- dump ตาราง `webboard_reply`
-- 

INSERT INTO `webboard_reply` VALUES (1, 1, '2010-10-31 03:00:58', 'ในปัจจุบัน เว็บไซต์ที่ถูกพัฒนาจาก PHP มีมากขึ้นทุกวัน ซึ่งมันเป็นภาษาที่่ง่าย ๆ และได้ถูกนำเอา MySQL เข้ามาเป็นฐานข้อมูลของเว็บไซต์ ทั้งเว็บไซต์นี้เอง ก็ใช้ฐานข้อมูล MySQL เหมือนกัน ซึ่งจะเห็นได้ว่า ฐานข้อมูล MySQL เป็นที่ใช้กันอย่างแพร่หลาย และเป็นที่ยอมรับแล้วว่า ดีจริง ๆ', '1288468858', 'Nott', '127.0.0.1');
