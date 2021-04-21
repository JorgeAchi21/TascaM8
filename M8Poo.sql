-- Database: M8POO
-- ------------------------------------------------------
-- Creacion de bbdd
CREATE DATABASE IF NOT EXISTS `M8POO`

-- Cambiando a la bbdd por defecto
USE M8POO

-- Crenado la tabla `compra`
CREATE TABLE `compra` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(150) NOT NULL,
  `cantidad` int NOT NULL,
  `precio` float NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=66 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Añadiendo datos a la tabla `compra`
INSERT INTO `compra` VALUES 
(46,'Pan',1,24.71),
(47,'Arroz',1,10.1),
(48,'Harina',2,11.1),
(49,'Sal',9,12.2),
(63,'Pasta',2,25.3),
(64,'Macarrones',2,10.1),
(65,'Sal gorda',3,11.2);
