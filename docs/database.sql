-- MySQL Script generated by MySQL Workbench
-- 07/22/15 00:41:12
-- Model: New Model    Version: 1.0
-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema teaching
-- -----------------------------------------------------
DROP SCHEMA IF EXISTS `teaching` ;

-- -----------------------------------------------------
-- Schema teaching
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `teaching` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ;
USE `teaching` ;

-- -----------------------------------------------------
-- Table `teaching`.`users`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `teaching`.`users` (
  `id` INT NOT NULL AUTO_INCREMENT COMMENT '',
  `email` VARCHAR(100) NOT NULL COMMENT '',
  `first_name` VARCHAR(30) NOT NULL COMMENT '',
  `surname` VARCHAR(150) NOT NULL COMMENT '',
  `password` VARCHAR(256) NOT NULL COMMENT '',
  `active` TINYINT(1) NOT NULL DEFAULT 1 COMMENT '',
  `created` DATETIME NOT NULL COMMENT '',
  `last_login` DATETIME NULL COMMENT '',
  PRIMARY KEY (`id`)  COMMENT '',
  UNIQUE INDEX `email_UNIQUE` (`email` ASC)  COMMENT '')
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `teaching`.`administrators`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `teaching`.`administrators` (
  `id` INT NOT NULL AUTO_INCREMENT COMMENT '',
  `user_id` INT NOT NULL COMMENT '',
  PRIMARY KEY (`id`)  COMMENT '',
  INDEX `fk_administrators_users1_idx` (`user_id` ASC)  COMMENT '',
  CONSTRAINT `fk_administrators_users1`
    FOREIGN KEY (`user_id`)
    REFERENCES `teaching`.`users` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `teaching`.`schools`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `teaching`.`schools` (
  `id` INT NOT NULL AUTO_INCREMENT COMMENT '',
  `name` VARCHAR(100) NOT NULL COMMENT '',
  `document` VARCHAR(45) NOT NULL COMMENT '',
  PRIMARY KEY (`id`)  COMMENT '',
  UNIQUE INDEX `document_UNIQUE` (`document` ASC)  COMMENT '')
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `teaching`.`professors`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `teaching`.`professors` (
  `id` INT NOT NULL AUTO_INCREMENT COMMENT '',
  `document` VARCHAR(45) NOT NULL COMMENT '',
  `user_id` INT NOT NULL COMMENT '',
  `school_id` INT NOT NULL COMMENT '',
  PRIMARY KEY (`id`)  COMMENT '',
  INDEX `fk_professors_users1_idx` (`user_id` ASC)  COMMENT '',
  INDEX `fk_professors_schools1_idx` (`school_id` ASC)  COMMENT '',
  CONSTRAINT `fk_professors_users1`
    FOREIGN KEY (`user_id`)
    REFERENCES `teaching`.`users` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_professors_schools1`
    FOREIGN KEY (`school_id`)
    REFERENCES `teaching`.`schools` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `teaching`.`studentclasses`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `teaching`.`studentclasses` (
  `id` INT NOT NULL AUTO_INCREMENT COMMENT '',
  `name` VARCHAR(45) NOT NULL COMMENT '',
  `school_id` INT NOT NULL COMMENT '',
  `professor_id` INT NOT NULL COMMENT '',
  PRIMARY KEY (`id`)  COMMENT '',
  INDEX `fk_studentclasses_schools1_idx` (`school_id` ASC)  COMMENT '',
  INDEX `fk_studentclasses_professors1_idx` (`professor_id` ASC)  COMMENT '',
  CONSTRAINT `fk_studentclasses_schools1`
    FOREIGN KEY (`school_id`)
    REFERENCES `teaching`.`schools` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_studentclasses_professors1`
    FOREIGN KEY (`professor_id`)
    REFERENCES `teaching`.`professors` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `teaching`.`students`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `teaching`.`students` (
  `id` INT NOT NULL AUTO_INCREMENT COMMENT '',
  `enrolment_n` INT NOT NULL COMMENT '',
  `rating_sum` INT NOT NULL DEFAULT 0 COMMENT '',
  `studentclasse_id` INT NOT NULL COMMENT '',
  `user_id` INT NOT NULL COMMENT '',
  `school_id` INT NOT NULL COMMENT '',
  PRIMARY KEY (`id`)  COMMENT '',
  INDEX `fk_students_studentclasses1_idx` (`studentclasse_id` ASC)  COMMENT '',
  INDEX `fk_students_users1_idx` (`user_id` ASC)  COMMENT '',
  INDEX `fk_students_schools1_idx` (`school_id` ASC)  COMMENT '',
  CONSTRAINT `fk_students_studentclasses1`
    FOREIGN KEY (`studentclasse_id`)
    REFERENCES `teaching`.`studentclasses` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_students_users1`
    FOREIGN KEY (`user_id`)
    REFERENCES `teaching`.`users` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_students_schools1`
    FOREIGN KEY (`school_id`)
    REFERENCES `teaching`.`schools` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `teaching`.`sections`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `teaching`.`sections` (
  `id` INT NOT NULL AUTO_INCREMENT COMMENT '',
  `name` VARCHAR(45) NOT NULL COMMENT '',
  `description` MEDIUMTEXT NOT NULL COMMENT '',
  PRIMARY KEY (`id`)  COMMENT '',
  UNIQUE INDEX `name_UNIQUE` (`name` ASC)  COMMENT '')
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `teaching`.`stages`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `teaching`.`stages` (
  `id` INT NOT NULL AUTO_INCREMENT COMMENT '',
  `number` INT NOT NULL COMMENT '',
  `description` VARCHAR(300) NULL COMMENT '',
  `sections_id` INT NOT NULL COMMENT '',
  PRIMARY KEY (`id`)  COMMENT '',
  INDEX `fk_stages_sections1_idx` (`sections_id` ASC)  COMMENT '',
  CONSTRAINT `fk_stages_sections1`
    FOREIGN KEY (`sections_id`)
    REFERENCES `teaching`.`sections` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `teaching`.`students_has_stages`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `teaching`.`students_has_stages` (
  `stage_id` INT NOT NULL COMMENT '',
  `rating` ENUM('0', '1', '2', '3') NOT NULL DEFAULT '0' COMMENT '',
  `student_id` INT NOT NULL COMMENT '',
  PRIMARY KEY (`stage_id`, `student_id`)  COMMENT '',
  INDEX `fk_students_has_stages_stages1_idx` (`stage_id` ASC)  COMMENT '',
  INDEX `fk_students_has_stages_students1_idx` (`student_id` ASC)  COMMENT '',
  CONSTRAINT `fk_students_has_stages_stages1`
    FOREIGN KEY (`stage_id`)
    REFERENCES `teaching`.`stages` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_students_has_stages_students1`
    FOREIGN KEY (`student_id`)
    REFERENCES `teaching`.`students` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
