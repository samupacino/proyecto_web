-- MySQL Script generated by MySQL Workbench
-- Fri Sep 15 22:40:56 2023
-- Model: New Model    Version: 1.0
-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------
-- -----------------------------------------------------
-- Schema controlinventariobd
-- -----------------------------------------------------
DROP SCHEMA IF EXISTS `controlinventariobd` ;

-- -----------------------------------------------------
-- Schema controlinventariobd
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `controlinventariobd` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci ;
USE `controlinventariobd` ;

-- -----------------------------------------------------
-- Table `controlinventariobd`.`almacen`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `controlinventariobd`.`almacen` ;

CREATE TABLE IF NOT EXISTS `controlinventariobd`.`almacen` (
  `idALMACEN` INT NOT NULL,
  `NOMBRE` VARCHAR(45) NULL DEFAULT NULL,
  `DESCRIPCION` VARCHAR(45) NULL DEFAULT NULL,
  `DIRECCION` VARCHAR(45) NULL DEFAULT NULL,
  PRIMARY KEY (`idALMACEN`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_0900_ai_ci;


-- -----------------------------------------------------
-- Table `controlinventariobd`.`documento`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `controlinventariobd`.`documento` ;

CREATE TABLE IF NOT EXISTS `controlinventariobd`.`documento` (
  `idTIPO_DOCUMENTO` INT NOT NULL,
  `DOCUMENTO` VARCHAR(45) NULL DEFAULT NULL,
  PRIMARY KEY (`idTIPO_DOCUMENTO`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_0900_ai_ci;


-- -----------------------------------------------------
-- Table `controlinventariobd`.`clientes_proveedores`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `controlinventariobd`.`clientes_proveedores` ;

CREATE TABLE IF NOT EXISTS `controlinventariobd`.`clientes_proveedores` (
  `idCLIENTES_PROVEEDORES` INT NOT NULL,
  `NOMBRES_RAZONSOCIAL` VARCHAR(100) NULL DEFAULT NULL,
  `APELLIDO_PATERNO` VARCHAR(45) NULL DEFAULT NULL,
  `APELLIDO_MATERNO` VARCHAR(45) NULL DEFAULT NULL,
  `DIRECCION` VARCHAR(45) NULL DEFAULT NULL,
  `TELEFONO` INT NULL DEFAULT NULL,
  `EMAIL` VARCHAR(45) NULL DEFAULT NULL,
  `TIPO_DOCUMENTO` INT NULL DEFAULT NULL,
  PRIMARY KEY (`idCLIENTES_PROVEEDORES`),
  CONSTRAINT `TIPO_DOCUMENTO`
    FOREIGN KEY (`TIPO_DOCUMENTO`)
    REFERENCES `controlinventariobd`.`documento` (`idTIPO_DOCUMENTO`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_0900_ai_ci;

CREATE INDEX `TIPO_DOCUMENTO_idx` ON `controlinventariobd`.`clientes_proveedores` (`TIPO_DOCUMENTO` ASC) VISIBLE;


-- -----------------------------------------------------
-- Table `controlinventariobd`.`unidad_medida`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `controlinventariobd`.`unidad_medida` ;

CREATE TABLE IF NOT EXISTS `controlinventariobd`.`unidad_medida` (
  `idUNIDAD_MEDIDA` INT NOT NULL,
  `UNIDAD` VARCHAR(45) NULL DEFAULT NULL,
  PRIMARY KEY (`idUNIDAD_MEDIDA`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_0900_ai_ci;


-- -----------------------------------------------------
-- Table `controlinventariobd`.`producto`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `controlinventariobd`.`producto` ;

CREATE TABLE IF NOT EXISTS `controlinventariobd`.`producto` (
  `idPRODUCTO` INT NOT NULL,
  `NOMBRE` VARCHAR(50) NULL DEFAULT NULL,
  `MARCA` VARCHAR(45) NULL DEFAULT NULL,
  `UNIDAD_MEDIDA` INT NOT NULL,
  `ALMACEN` INT NOT NULL,
  PRIMARY KEY (`idPRODUCTO`),
  CONSTRAINT `ALMACEN`
    FOREIGN KEY (`ALMACEN`)
    REFERENCES `controlinventariobd`.`almacen` (`idALMACEN`),
  CONSTRAINT `UNIDAD_MEDIDA`
    FOREIGN KEY (`UNIDAD_MEDIDA`)
    REFERENCES `controlinventariobd`.`unidad_medida` (`idUNIDAD_MEDIDA`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_0900_ai_ci;

CREATE UNIQUE INDEX `idPRODUCTO_UNIQUE` ON `controlinventariobd`.`producto` (`idPRODUCTO` ASC) VISIBLE;

CREATE INDEX `UNIDAD_MEDIDA_idx` ON `controlinventariobd`.`producto` (`UNIDAD_MEDIDA` ASC) VISIBLE;

CREATE INDEX `ALMACEN_idx` ON `controlinventariobd`.`producto` (`ALMACEN` ASC) VISIBLE;


-- -----------------------------------------------------
-- Table `controlinventariobd`.`tipo_comprobante`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `controlinventariobd`.`tipo_comprobante` ;

CREATE TABLE IF NOT EXISTS `controlinventariobd`.`tipo_comprobante` (
  `idTIPO_COMPROBANTE` INT NOT NULL,
  `NOMBRE_COMPROBANTE` VARCHAR(45) NULL DEFAULT NULL,
  PRIMARY KEY (`idTIPO_COMPROBANTE`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_0900_ai_ci;


-- -----------------------------------------------------
-- Table `controlinventariobd`.`tipo_movimiento`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `controlinventariobd`.`tipo_movimiento` ;

CREATE TABLE IF NOT EXISTS `controlinventariobd`.`tipo_movimiento` (
  `idTIPO_MOVIMIENTO` INT NOT NULL,
  `NOMBRE_MOVIMIENTO` VARCHAR(45) NULL DEFAULT NULL,
  PRIMARY KEY (`idTIPO_MOVIMIENTO`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_0900_ai_ci;


-- -----------------------------------------------------
-- Table `controlinventariobd`.`permisos`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `controlinventariobd`.`permisos` ;

CREATE TABLE IF NOT EXISTS `controlinventariobd`.`permisos` (
  `idPERMISOS` INT NOT NULL,
  `PERMISO` VARCHAR(45) NULL DEFAULT NULL,
  `DESCRIPCION` VARCHAR(100) NULL DEFAULT NULL,
  PRIMARY KEY (`idPERMISOS`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_0900_ai_ci;


-- -----------------------------------------------------
-- Table `controlinventariobd`.`usuario`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `controlinventariobd`.`usuario` ;

CREATE TABLE IF NOT EXISTS `controlinventariobd`.`usuario` (
  `idUSUARIO` INT NOT NULL,
  `NOMBRES` VARCHAR(45) NOT NULL,
  `APELLIDO_PATERNO` VARCHAR(45) NOT NULL,
  `APELLIDO_MATERNO` VARCHAR(45) NOT NULL,
  `CELULAR` VARCHAR(45) NOT NULL,
  `EMAIL` VARCHAR(100) NULL DEFAULT NULL,
  `CARGO` VARCHAR(45) NOT NULL,
  `ID_PERMISO` INT NULL DEFAULT NULL,
  PRIMARY KEY (`idUSUARIO`),
  CONSTRAINT `ID_PERMISO`
    FOREIGN KEY (`ID_PERMISO`)
    REFERENCES `controlinventariobd`.`permisos` (`idPERMISOS`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_0900_ai_ci;

CREATE INDEX `ID_PERMISO_idx` ON `controlinventariobd`.`usuario` (`ID_PERMISO` ASC) VISIBLE;


-- -----------------------------------------------------
-- Table `controlinventariobd`.`movimiento_stock`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `controlinventariobd`.`movimiento_stock` ;

CREATE TABLE IF NOT EXISTS `controlinventariobd`.`movimiento_stock` (
  `idMOVIMIENTO_STOCK` INT NOT NULL,
  `FECHA` DATE NOT NULL,
  `TIPO_COMPROBANTE` INT NOT NULL,
  `SERIE_COMPROBANTE` VARCHAR(4) NOT NULL,
  `NUMERO_COMPROBANTE` INT NOT NULL,
  `CANTIDAD` DOUBLE NOT NULL,
  `ID_PRODUCTO` INT NOT NULL,
  `TIPO_MOVIMIENTO` INT NOT NULL,
  `CLIENTE_PROVEEDOR` INT NOT NULL,
  `USUARIO` INT NULL DEFAULT NULL,
  PRIMARY KEY (`idMOVIMIENTO_STOCK`),
  CONSTRAINT `CLIENTE_PROVEEDOR`
    FOREIGN KEY (`CLIENTE_PROVEEDOR`)
    REFERENCES `controlinventariobd`.`clientes_proveedores` (`idCLIENTES_PROVEEDORES`),
  CONSTRAINT `ID_PRODUCTO`
    FOREIGN KEY (`ID_PRODUCTO`)
    REFERENCES `controlinventariobd`.`producto` (`idPRODUCTO`),
  CONSTRAINT `TIPO_COMPROBANTE`
    FOREIGN KEY (`TIPO_COMPROBANTE`)
    REFERENCES `controlinventariobd`.`tipo_comprobante` (`idTIPO_COMPROBANTE`),
  CONSTRAINT `TIPO_MOVIMIENTO`
    FOREIGN KEY (`TIPO_MOVIMIENTO`)
    REFERENCES `controlinventariobd`.`tipo_movimiento` (`idTIPO_MOVIMIENTO`),
  CONSTRAINT `USUARIO`
    FOREIGN KEY (`USUARIO`)
    REFERENCES `controlinventariobd`.`usuario` (`idUSUARIO`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_0900_ai_ci;

CREATE INDEX `TIPO_COMPROBANTE_idx` ON `controlinventariobd`.`movimiento_stock` (`TIPO_COMPROBANTE` ASC) VISIBLE;

CREATE INDEX `ID_PRODUCTO_idx` ON `controlinventariobd`.`movimiento_stock` (`ID_PRODUCTO` ASC) VISIBLE;

CREATE INDEX `TIPO_MOVIMIENTO_idx` ON `controlinventariobd`.`movimiento_stock` (`TIPO_MOVIMIENTO` ASC) VISIBLE;

CREATE INDEX `CLIENTE_PROVEEDOR_idx` ON `controlinventariobd`.`movimiento_stock` (`CLIENTE_PROVEEDOR` ASC) VISIBLE;

CREATE INDEX `USUARIO_idx` ON `controlinventariobd`.`movimiento_stock` (`USUARIO` ASC) VISIBLE;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;