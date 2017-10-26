CREATE TABLE `category` (
  `c_id` int(11) NOT NULL auto_increment,
  `c_name` varchar(200) default NOT NULL,
  PRIMARY KEY  (`c_id`)
) ENGINE=MyISAM;

INSERT INTO `category` VALUES (1, 'IT');
INSERT INTO `category` VALUES (2, 'Business');
INSERT INTO `category` VALUES (3, 'Life Style');
