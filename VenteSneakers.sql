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
  `date_naissance` DATETIME NOT NULL,
  `mdp` VARCHAR(255) NOT NULL,
  `whoAmI` VARCHAR(45) NOT NULL,
  `adresse` VARCHAR(70) NOT NULL,
  `city` VARCHAR(45) NOT NULL,
  `postal_code` VARCHAR(45) NOT NULL,
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

-- -----------------------------------------------------
-- Table `VenteSneakers`.`Chat`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `VenteSneakers`.`Chat` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `User_email` VARCHAR(45) NOT NULL,
  `message` TEXT NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE = InnoDB;

SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;

INSERT INTO User (email, name, firstname, date_naissance, mdp, whoAmI, adresse, city, postal_code, country, phone)
VALUES ('andrekhella@gmail.com', 'khella', 'andre', '1990-01-01', '$2y$10$EXkPEf2IpUOZpcj3R5.EWuIfoPML5kARcnohMUxaR841xIZKSXpHa', 'user', '123 rue Principale', 'Ville', '12345', 'Pays', '1234567890');

INSERT INTO Item (idItem, name, sellBO, sellBID, sellBIN, category, info, delivery_price, price, fromTime, toTime, Itemcol, User_email_seller) VALUES (1, 'Nike Air Max 90', 1, 0, 0, 'Sneakers', 'Chaussures de sport', 5.0, 150.0, '2023-07-08 15:58:09.000000', '2023-07-10 12:00:00', NULL, 'andrekhella@gmail.com');
INSERT INTO Item (idItem, name, sellBO, sellBID, sellBIN, category, info, delivery_price, price, fromTime, toTime, Itemcol, User_email_seller) VALUES (2, 'Adidas Stan Smith', 0, 1, 0, 'Sneakers', 'Chaussures décontractées', 3.0, 100.0, '2023-07-09 09:30:00', '2023-07-12 18:00:00', NULL, 'andrekhella@gmail.com');
INSERT INTO Item (idItem, name, sellBO, sellBID, sellBIN, category, info, delivery_price, price, fromTime, toTime, Itemcol, User_email_seller) VALUES (3, 'Puma Suede Classic', 0, 0, 1, 'Sneakers', 'Chaussures rétro', 4.0, 80.0, '2023-07-10 14:00:00', '2023-07-15 12:00:00', NULL, 'andrekhella@gmail.com');
INSERT INTO Item (idItem, name, sellBO, sellBID, sellBIN, category, info, delivery_price, price, fromTime, toTime, Itemcol, User_email_seller) VALUES (4, 'Converse Chuck Taylor All Star', 1, 0, 0, 'Sneakers', 'Chaussures en toile', 5.0, 70.0, '2023-07-11 11:30:00', '2023-07-16 15:00:00', NULL, 'andrekhella@gmail.com');
INSERT INTO Item (idItem, name, sellBO, sellBID, sellBIN, category, info, delivery_price, price, fromTime, toTime, Itemcol, User_email_seller) VALUES (5, 'Reebok Classic Leather', 0, 1, 0, 'Sneakers', 'Chaussures de style rétro', 3.5, 90.0, '2023-07-12 10:00:00', '2023-07-18 12:00:00', NULL, 'andrekhella@gmail.com');
INSERT INTO Item (idItem, name, sellBO, sellBID, sellBIN, category, info, delivery_price, price, fromTime, toTime, Itemcol, User_email_seller) VALUES (6, 'New Balance 574', 0, 0, 1, 'Sneakers', 'Chaussures de course', 4.0, 120.0, '2023-07-13 14:30:00', '2023-07-20 10:00:00', NULL, 'andrekhella@gmail.com');
INSERT INTO Item (idItem, name, sellBO, sellBID, sellBIN, category, info, delivery_price, price, fromTime, toTime, Itemcol, User_email_seller) VALUES (7, 'Vans Old Skool', 1, 0, 0, 'Sneakers', 'Chaussures de skate', 5.0, 80.0, '2023-07-14 16:00:00', '2023-07-22 14:00:00', NULL, 'andrekhella@gmail.com');
INSERT INTO Item (idItem, name, sellBO, sellBID, sellBIN, category, info, delivery_price, price, fromTime, toTime, Itemcol, User_email_seller) VALUES (8, 'Asics Gel-Lyte III', 0, 1, 0, 'Sneakers', 'Chaussures de course légères', 3.5, 130.0, '2023-07-15 09:30:00', '2023-07-25 16:00:00', NULL, 'andrekhella@gmail.com');
INSERT INTO Item (idItem, name, sellBO, sellBID, sellBIN, category, info, delivery_price, price, fromTime, toTime, Itemcol, User_email_seller) VALUES (9, 'Nike Dunk Low', 0, 0, 1, 'Sneakers', 'Chaussures de basketball', 4.0, 160.0, '2023-07-16 12:00:00', '2023-07-28 11:30:00', NULL, 'andrekhella@gmail.com');