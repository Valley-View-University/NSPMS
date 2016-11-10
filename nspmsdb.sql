#NSPMS DataBase

CREATE TABLE IF NOT EXISTS `company_info` (
  `company_id` int(11) NOT NULL AUTO_INCREMENT,
  `comapny_name` varchar(85) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(85) COLLATE utf8_unicode_ci NOT NULL,
  `location` varchar(85) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(85) COLLATE utf8_unicode_ci NOT NULL,
  `phone_number` varchar(85) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`company_id`)
) 


CREATE TABLE nss_admin(
nsid int(11) PRIMARY KEY AUTO_INCREMENT,
fname varchar(85),
mname varchar(85),
lname varchar(85),
userid varchar(85) UNIQUE,
password varchar(85),
tstamp DATETIME NULL
);

CREATE TABLE institution(  
institution_name varchar (100),
inid varchar PRIMARY KEY,
city varchar (25),
email  varchar (25),
telephone varchar(15)
);

CREATE TABLE student(
fname varchar(45),
mname varchar(45), 
lname varchar(45),
sid int(11) PRIMARY KEY AUTO_INCREMENT,
studentid int(15),  
password varchar(85),
email varchar(72),
telephone int(15),
institution_name varchar(100),
nss_code varchar(45),
nationality varchar(45),
dob date,
pin varchar(30),  
gender enum('F','M'),
raddress varchar(100),
kin_name varchar(100),
kin_address varchar(100),
kin_telephone varchar(15),
kin_relationship varchar(20),
kin_email varchar(72),  
avatar varchar(100),  
course_study varchar(50),
on_leave enum('Y','N'),
organization_name varchar(100)  
);
