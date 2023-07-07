SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema VenteSneakers
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema VenteSneakers
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `VenteSneakers` DEFAULT CHARACTER SET utf8 ;
USE `VenteSneakers` ;

-- -----------------------------------------------------
-- Table `VenteSneakers`.`User`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `VenteSneakers`.`User` (
  `email` VARCHAR(100) NOT NULL,
  `name` VARCHAR(45) NOT NULL,
  `firstname` VARCHAR(45) NOT NULL,
  `fate_naissance` DATETIME NOT NULL,
  `mdp` VARCHAR(45) NOT NULL,
  `whoAmI` VARCHAR(45) NOT NULL,
  `adresse` VARCHAR(70) NOT NULL,
  `city` VARCHAR(45) NOT NULL,
  `postacl_code` VARCHAR(45) NOT NULL,
  `country` VARCHAR(45) NOT NULL,
  `phone` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`email`))
ENGINE = InnoDB;



-- -----------------------------------------------------
-- Table `VenteSneakers`.`Bill_info`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `VenteSneakers`.`Bill_info` (
  `idBill_info` INT NOT NULL AUTO_INCREMENT,
  `type_of_payment` VARCHAR(45) NULL,
  `card_number` VARCHAR(45) NULL,
  `name_on_card` VARCHAR(45) NULL,
  `expiration_date` DATETIME NULL,
  `cvc` INT NULL,
  `User_email` VARCHAR(100) NOT NULL,
  PRIMARY KEY (`idBill_info`, `User_email`),
  INDEX `fk_Bill_info_User_idx` (`User_email` ASC),
  CONSTRAINT `fk_Bill_info_User`
    FOREIGN KEY (`User_email`)
    REFERENCES `VenteSneakers`.`User` (`email`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

-- -----------------------------------------------------
-- Table `VenteSneakers`.`Item`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `VenteSneakers`.`Item` (
  `idItem` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(45) NOT NULL,
  `sellBO` TINYINT NULL,
  `sellBID` TINYINT NULL,
  `sellBIN` TINYINT NULL,
  `category` VARCHAR(45) NOT NULL,
  `info` VARCHAR(100) NULL,
  `delivery_price` DOUBLE NULL DEFAULT 1,
  `price` DOUBLE NULL,
  `fromTime` DATETIME NOT NULL,
  `toTime` DATETIME NULL,
  `Itemcol` VARCHAR(45) NULL,
  `User_email_seller` VARCHAR(100) NOT NULL,
  PRIMARY KEY (`idItem`, `User_email_seller`),
  INDEX `fk_Item_User1_idx` (`User_email_seller` ASC),
  CONSTRAINT `fk_Item_User1`
    FOREIGN KEY (`User_email_seller`)
    REFERENCES `VenteSneakers`.`User` (`email`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `VenteSneakers`.`Order`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `VenteSneakers`.`Order` (
  `idOrder` INT NOT NULL AUTO_INCREMENT,
  `date_m` DATETIME NOT NULL,
  `status` TINYINT NOT NULL,
  `price` DOUBLE NULL,
  `max_price` DOUBLE NULL,
  `User_email` VARCHAR(100) NOT NULL,
  `Item_idItem` INT NOT NULL,
  PRIMARY KEY (`idOrder`, `User_email`, `Item_idItem`),
  INDEX `fk_Order_User1_idx` (`User_email` ASC),
  INDEX `fk_Order_Item1_idx` (`Item_idItem` ASC),
  CONSTRAINT `fk_Order_User1`
    FOREIGN KEY (`User_email`)
    REFERENCES `VenteSneakers`.`User` (`email`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Order_Item1`
    FOREIGN KEY (`Item_idItem`)
    REFERENCES `VenteSneakers`.`Item` (`idItem`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

-- -----------------------------------------------------
-- Table `VenteSneakers`.`Card`
-- -----------------------------------------------------
-- -----------------------------------------------------
-- Table `VenteSneakers`.`Card`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `VenteSneakers`.`Card` (
  `User_email` VARCHAR(100) NOT NULL,
  `Item_idItem` INT NOT NULL,
  `Item_User_email_seller` VARCHAR(100) NOT NULL,
  PRIMARY KEY (`User_email`, `Item_idItem`, `Item_User_email_seller`),
  INDEX `fk_User_has_Item_Item1_idx` (`Item_idItem`, `Item_User_email_seller`),
  INDEX `fk_User_has_Item_User1_idx` (`User_email`),
  CONSTRAINT `fk_User_has_Item_User1`
    FOREIGN KEY (`User_email`)
    REFERENCES `VenteSneakers`.`User` (`email`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_User_has_Item_Item1`
    FOREIGN KEY (`Item_idItem` , `Item_User_email_seller`)
    REFERENCES `VenteSneakers`.`Item` (`idItem` , `User_email_seller`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;