CREATE DATABASE `my_recipes`;
CREATE TABLE `my_recipes`.`users` ( `user_id` INT NOT NULL AUTO_INCREMENT , `full_name` VARCHAR(64) NOT NULL , `email` VARCHAR(512) NOT NULL , `password` VARCHAR(512) NOT NULL , `age` INT NOT NULL , PRIMARY KEY (`user_id`)) ENGINE = MyISAM;
CREATE TABLE `my_recipes`.`recipes` ( `recipe_id` INT NOT NULL AUTO_INCREMENT , `title` VARCHAR(128) NOT NULL , `recipe` TEXT NOT NULL , `author` VARCHAR(512) NOT NULL , `is_enabled` BOOLEAN NOT NULL , PRIMARY KEY (`recipe_id`)) ENGINE = MyISAM;
