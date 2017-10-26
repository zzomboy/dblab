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
-- โครงสร้างตาราง `answer`
-- 

CREATE TABLE `answer` (
  `answer_id` int(2) NOT NULL auto_increment,
  `question_id` int(2) NOT NULL,
  `answer` char(255) NOT NULL,
  `score` int(10) NOT NULL,
  PRIMARY KEY  (`answer_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

-- 
-- dump ตาราง `answer`
-- 

INSERT INTO `answer` VALUES (1, 1, 'ASP.NET', 0);
INSERT INTO `answer` VALUES (2, 1, 'ASP', 0);
INSERT INTO `answer` VALUES (3, 1, 'PHP', 0);

-- --------------------------------------------------------

-- 
-- โครงสร้างตาราง `question`
-- 

CREATE TABLE `question` (
  `question_id` int(2) NOT NULL auto_increment,
  `question` char(255) NOT NULL,
  `datadate` datetime NOT NULL,
  PRIMARY KEY  (`question_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

-- 
-- dump ตาราง `question`
-- 

INSERT INTO `question` VALUES (1, 'ภาษาใดได้รับความนิยมมากที่สุดสำหรับเขียน web application ทุกวันนี้', '2010-08-22 21:01:34');
