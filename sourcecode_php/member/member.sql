
CREATE TABLE  member (
  id int(11) NOT NULL auto_increment,
  username varchar(255) NOT NULL DEFAULT '' ,
  password varchar(255) NOT NULL DEFAULT '' ,
  name varchar(255) NOT NULL DEFAULT '' ,
  lastname varchar(255) NOT NULL DEFAULT '' ,
  gender varchar(10) NOT NULL DEFAULT '' ,
  birthday date NOT NULL DEFAULT '0000-00-00' ,
  address varchar(255) ,
  email varchar(255) ,
  PRIMARY KEY (id)
);

INSERT INTO member VALUES("1", "nott", "MTIzMzIx", "Thisan", "Tipsuppathanon", "M", "2000-01-22", "BKK", "nott@netdesign.ac.th");
