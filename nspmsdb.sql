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
institutionId varchar PRIMARY KEY,
city varchar (25),
email  varchar (25),
telephone varchar(15),
);
