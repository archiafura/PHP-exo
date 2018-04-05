-- MySQL Script generated by MySQL Workbench
-- Thu Apr  5 15:31:10 2018
-- Model: New Model    Version: 1.0
-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema PHPDieppe
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema PHPDieppe
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `PHPDieppe` DEFAULT CHARACTER SET utf8 ;
USE `PHPDieppe` ;

-- -----------------------------------------------------
-- Table `PHPDieppe`.`T_ROLE`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `PHPDieppe`.`T_ROLE` (
  `ID_ROLE` INT NOT NULL AUTO_INCREMENT,
  `ROLLABEL` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`ID_ROLE`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `PHPDieppe`.`T_USERS`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `PHPDieppe`.`T_USERS` (
  `ID_USERS` INT NOT NULL AUTO_INCREMENT,
  `USERNAME` VARCHAR(45) NOT NULL,
  `USERFIRSTNAME` VARCHAR(80) NULL,
  `USERMAIL` VARCHAR(160) NOT NULL,
  `USERPASSWORD` CHAR(40) NOT NULL,
  `ID_ROLE` INT NOT NULL,
  PRIMARY KEY (`ID_USERS`, `ID_ROLE`),
  INDEX `fk_T_USERS_T_ROLE_idx` (`ID_ROLE` ASC),
  CONSTRAINT `fk_T_USERS_T_ROLE`
    FOREIGN KEY (`ID_ROLE`)
    REFERENCES `PHPDieppe`.`T_ROLE` (`ID_ROLE`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `PHPDieppe`.`T_ARTICLE`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `PHPDieppe`.`T_ARTICLE` (
  `ID_ARTICLE` INT NOT NULL AUTO_INCREMENT,
  `ARTICLE` VARCHAR(200) NOT NULL,
  `ARTCHAPO` VARCHAR(200) NULL,
  `ARTCONTENT` TEXT NOT NULL,
  `ARTDATETIME` DATETIME NULL,
  `T_ARTICLEcol` VARCHAR(45) NULL,
  `ID_USERS` INT NOT NULL,
  `ID_ROLE` INT NOT NULL,
  PRIMARY KEY (`ID_ARTICLE`, `ID_USERS`, `ID_ROLE`),
  INDEX `fk_T_ARTICLE_T_USERS1_idx` (`ID_USERS` ASC, `ID_ROLE` ASC),
  CONSTRAINT `fk_T_ARTICLE_T_USERS1`
    FOREIGN KEY (`ID_USERS` , `ID_ROLE`)
    REFERENCES `PHPDieppe`.`T_USERS` (`ID_USERS` , `ID_ROLE`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `PHPDieppe`.`T_CATEGORIE`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `PHPDieppe`.`T_CATEGORIE` (
  `ID_CATEGORIE` INT NOT NULL AUTO_INCREMENT,
  `CATLABEL` VARCHAR(120) NOT NULL,
  PRIMARY KEY (`ID_CATEGORIE`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `PHPDieppe`.`T_ARTICLE_has_T_CATEGORIE`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `PHPDieppe`.`T_ARTICLE_has_T_CATEGORIE` (
  `ID_ARTICLE` INT NOT NULL,
  `ID_USERS` INT NOT NULL,
  `ID_ROLE` INT NOT NULL,
  `ID_CATEGORIE` INT NOT NULL,
  PRIMARY KEY (`ID_ARTICLE`, `ID_USERS`, `ID_ROLE`, `ID_CATEGORIE`),
  INDEX `fk_T_ARTICLE_has_T_CATEGORIE_T_CATEGORIE1_idx` (`ID_CATEGORIE` ASC),
  INDEX `fk_T_ARTICLE_has_T_CATEGORIE_T_ARTICLE1_idx` (`ID_ARTICLE` ASC, `ID_USERS` ASC, `ID_ROLE` ASC),
  CONSTRAINT `fk_T_ARTICLE_has_T_CATEGORIE_T_ARTICLE1`
    FOREIGN KEY (`ID_ARTICLE` , `ID_USERS` , `ID_ROLE`)
    REFERENCES `PHPDieppe`.`T_ARTICLE` (`ID_ARTICLE` , `ID_USERS` , `ID_ROLE`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_T_ARTICLE_has_T_CATEGORIE_T_CATEGORIE1`
    FOREIGN KEY (`ID_CATEGORIE`)
    REFERENCES `PHPDieppe`.`T_CATEGORIE` (`ID_CATEGORIE`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
