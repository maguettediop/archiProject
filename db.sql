

SET @sAdminEmail = 'max@gmail.com';
SET @sAdminPassword = '$2y$14$kefF6aqkuOEWo7CIFduNf.7O8BuGR4uWrIAFcHWm2u99OcLPDFWOe';


CREATE TABLE IF NOT EXISTS Posts (
  id int(10) unsigned NOT NULL AUTO_INCREMENT,
  title varchar(50) DEFAULT NULL,
  body longtext NOT NULL,
  createdDate datetime DEFAULT NOW(),
  PRIMARY KEY (id)
) DEFAULT CHARSET=utf8;


CREATE TABLE IF NOT EXISTS Admins (
  id int(10) unsigned NOT NULL AUTO_INCREMENT,
  email varchar(120) NOT NULL,
  password char(60) NOT NULL,
  PRIMARY KEY (id)
) DEFAULT CHARSET=utf8;

INSERT INTO Admins (email, password) VALUES
(@sAdminEmail, @sAdminPassword); 
