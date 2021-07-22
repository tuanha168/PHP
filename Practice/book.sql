CREATE SCHEMA `Practice1` ;
GO;

CREATE TABLE `Practice`.`BookStore` (
  `bookid` INT(11) NOT NULL AUTO_INCREMENT,
  `authorid` INT(11) NOT NULL DEFAULT 0,
  `title` VARCHAR(55) CHARACTER SET 'utf8' COLLATE 'utf8_general_ci' NOT NULL,
  `ISBN` VARCHAR(25) CHARACTER SET 'utf8' COLLATE 'utf8_general_ci' NOT NULL,
  `pub_year` SMALLINT(6) NOT NULL DEFAULT 0,
  `available` TINYINT(4) NOT NULL,
  PRIMARY KEY (`bookid`)
);

CREATE TABLE `Practice`.`Author` (
  `authorid` int NOT NULL AUTO_INCREMENT,
  `name` varchar(55) CHARACTER SET 'utf8' COLLATE 'utf8_unicode_ci' NOT NULL,
  PRIMARY KEY (`authorid`)
);

INSERT INTO `Practice`.`Author` (`name`)
VALUES
  ('J.R.R. Tolkien'),
  ('Tom Clancy'),
  ('Isaac Asimov');

INSERT INTO `Practice`.`BookStore` (`authorid`, `title`, `ISBN`, `pub_year`, `available`)
VALUES 
  ('1', 'The Two Towers', '0', '1954', '1'),
  ('1', 'The Return of The King', '1', '1955', '1'),
  ('3', 'Teeth of the Tiger', '5', '2003', '1'),
  ('3', 'Executive Orders', '6', '1996', '1'),
  ('1', 'The Hobbit', '7', '1937', '1'),
  ('3', 'The Sum of All Fears', '8', '1991', '1'),
  ('3', 'Red Rabbit', '9', '2000', '0');
