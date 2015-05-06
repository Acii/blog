CREATE SCHEMA IF NOT EXISTS `blogsystem` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci 

CREATE TABLE IF NOT EXISTS `blogsystem`.`users` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `name` NVARCHAR(100) NOT NULL,
  `passHash` CHAR(60) NOT NULL,
  `isAdmin` TINYINT(1) NULL DEFAULT 0,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `name_UNIQUE` (`name` ASC));

CREATE TABLE IF NOT EXISTS `blogsystem`.`posts` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `title` NVARCHAR(100) NOT NULL,
  `description` NVARCHAR(500) NOT NULL,
  `dataCreate` DATETIME NULL DEFAULT CURRENT_TIMESTAMP,
  `authorId` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_Posts_users1_idx` (`authorId` ASC),
  UNIQUE INDEX `title_UNIQUE` (`title` ASC),
  CONSTRAINT `fk_Posts_users1`
    FOREIGN KEY (`authorId`)
    REFERENCES `blogsystem`.`users` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION);
	
CREATE TABLE IF NOT EXISTS `blogsystem`.`comments` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `name` NVARCHAR(50) NOT NULL,
  `email` NVARCHAR(50) NULL,
  `content` TEXT NULL,
  `postId` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_Comments_Posts1_idx` (`postId` ASC),
  CONSTRAINT `fk_Comments_Posts1`
    FOREIGN KEY (`PostId`)
    REFERENCES `blogsystem`.`posts` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION);
	
	
CREATE TABLE IF NOT EXISTS `blogsystem`.`tags` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `title` NVARCHAR(100) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `title_UNIQUE` (`title` ASC));

  
 CREATE TABLE IF NOT EXISTS `blogsystem`.`postsTagas` (
  `postId` INT NOT NULL,
  `tagId` INT NOT NULL,
  INDEX `fk_PostsTagas_Posts1_idx` (`postId` ASC),
  PRIMARY KEY (`postId`, `tagId`),
  INDEX `fk_postsTagas_Tags1_idx` (`tagId` ASC),
  CONSTRAINT `fk_PostsTagas_Posts1`
    FOREIGN KEY (`postId`)
    REFERENCES `blogsystem`.`posts` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_postsTagas_Tags1`
    FOREIGN KEY (`tagId`)
    REFERENCES `blogsystem`.`tags` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION);
	
	
