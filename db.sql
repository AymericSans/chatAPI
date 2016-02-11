SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

CREATE SCHEMA IF NOT EXISTS `chatAPI` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ;
USE `chatAPI` ;

-- -----------------------------------------------------
-- Table `chatAPI`.`users`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `chatAPI`.`users` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(45) NULL,
  `first-name` VARCHAR(45) NULL,
  `year` INT UNSIGNED NOT NULL,
  `class` INT UNSIGNED NOT NULL,
  `photo` VARCHAR(255) NULL,
  `created-at` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `chatAPI`.`group`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `chatAPI`.`group` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(70) NULL,
  `author_id` INT UNSIGNED NOT NULL,
  PRIMARY KEY (`id`),
  CONSTRAINT `fk_group_users1`
    FOREIGN KEY (`author_id`)
    REFERENCES `chatAPI`.`users` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

CREATE INDEX `fk_group_users1_idx` ON `chatAPI`.`group` (`author_id` ASC);


-- -----------------------------------------------------
-- Table `chatAPI`.`messages`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `chatAPI`.`messages` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `content` LONGTEXT NULL,
  `created-at` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP,
  `group_id` INT UNSIGNED NOT NULL,
  `users_id` INT UNSIGNED NOT NULL,
  PRIMARY KEY (`id`),
  CONSTRAINT `fk_messages_group1`
    FOREIGN KEY (`group_id`)
    REFERENCES `chatAPI`.`group` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_messages_users1`
    FOREIGN KEY (`users_id`)
    REFERENCES `chatAPI`.`users` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

CREATE INDEX `fk_messages_group1_idx` ON `chatAPI`.`messages` (`group_id` ASC);

CREATE INDEX `fk_messages_users1_idx` ON `chatAPI`.`messages` (`users_id` ASC);


-- -----------------------------------------------------
-- Table `chatAPI`.`group_members`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `chatAPI`.`group_members` (
  `group_id` INT UNSIGNED NOT NULL,
  `users_id` INT UNSIGNED NOT NULL,
  PRIMARY KEY (`group_id`, `users_id`),
  CONSTRAINT `fk_group_has_users_group`
    FOREIGN KEY (`group_id`)
    REFERENCES `chatAPI`.`group` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_group_has_users_users1`
    FOREIGN KEY (`users_id`)
    REFERENCES `chatAPI`.`users` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

CREATE INDEX `fk_group_has_users_users1_idx` ON `chatAPI`.`group_members` (`users_id` ASC);

CREATE INDEX `fk_group_has_users_group_idx` ON `chatAPI`.`group_members` (`group_id` ASC);


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
