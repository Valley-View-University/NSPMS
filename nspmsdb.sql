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
