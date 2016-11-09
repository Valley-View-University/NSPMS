#NSPMS DataBase

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
