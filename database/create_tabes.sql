CREATE DATABASE IF NOT EXISTS db1_pwypaustralia;

DROP TABLE IF EXISTS db1_pwypaustralia.letters;
CREATE TABLE db1_pwypaustralia.letters
(
	id int unsigned not null auto_increment,
	firstname varchar(70) not null,
	lastname varchar(70) not null,
	postcode varchar(10) not null,
	email varchar(200) not null,
	message text,
	
	PRIMARY KEY(id)
) ENGINE=INNODB DEFAULT CHARSET=utf8;