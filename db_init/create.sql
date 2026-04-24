
CREATE DATABASE IF NOT EXISTS `projecte`
CHARACTER SET utf8mb4
COLLATE utf8mb4_unicode_ci;

GRANT ALL PRIVILEGES ON projecte.* TO 'usuari'@'%';
FLUSH PRIVILEGES;


USE `projecte`;


SET FOREIGN_KEY_CHECKS = 0;



DROP TABLE IF EXISTS `ACTUACIO`;
DROP TABLE IF EXISTS `INCIDENCIA`;
DROP TABLE IF EXISTS `TECNIC`;
DROP TABLE IF EXISTS `DEPARTAMENT`;
DROP TABLE IF EXISTS `TIPO`;


-- TAULA DEPARTAMENT

CREATE TABLE `DEPARTAMENT` (
  `idDepartament` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`idDepartament`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------
-- TAULA TECNIC
-- --------------------------------------------------------

CREATE TABLE `TECNIC` (
  `idTecnic` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`idTecnic`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------
-- TAULA TIPO
-- --------------------------------------------------------

CREATE TABLE `TIPO` (
  `idTipo` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`idTipo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------
-- TAULA INCIDENCIA
-- --------------------------------------------------------

CREATE TABLE `INCIDENCIA` (
  `idIncidencia` int(11) NOT NULL AUTO_INCREMENT,
  `descripcio` varchar(2000) NOT NULL,
  `data` timestamp NULL DEFAULT NULL,
  `dataFinalitzacio` date DEFAULT NULL,
  `tecnic` int(11) DEFAULT NULL,
  `departament` int(11) DEFAULT NULL,
  `tipo` int(11) DEFAULT NULL,
  `prioritat` enum('Alta','Mitja','Baixa') DEFAULT NULL,
  PRIMARY KEY (`idIncidencia`),
  KEY `tecnic` (`tecnic`),
  KEY `departament` (`departament`),
  KEY `tipo` (`tipo`),
  CONSTRAINT `INCIDENCIA_ibfk_1` FOREIGN KEY (`tecnic`) REFERENCES `TECNIC` (`idTecnic`),
  CONSTRAINT `INCIDENCIA_ibfk_2` FOREIGN KEY (`departament`) REFERENCES `DEPARTAMENT` (`idDepartament`),
  CONSTRAINT `INCIDENCIA_ibfk_3` FOREIGN KEY (`tipo`) REFERENCES `TIPO` (`idTipo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------
-- TAULA ACTUACIO
-- --------------------------------------------------------

CREATE TABLE `ACTUACIO` (
  `idActuacio` int(11) NOT NULL AUTO_INCREMENT,
  `descripcio` varchar(2000) NOT NULL,
  `visible` int(1) DEFAULT NULL,
  `data` timestamp NULL DEFAULT NULL,
  `temps` int(11) DEFAULT NULL,
  `incidencia` int(11) DEFAULT NULL,
  PRIMARY KEY (`idActuacio`),
  KEY `incidencia` (`incidencia`),
  CONSTRAINT `ACTUACIO_ibfk_1` FOREIGN KEY (`incidencia`) REFERENCES `INCIDENCIA` (`idIncidencia`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------
-- FINAL
-- --------------------------------------------------------

SET FOREIGN_KEY_CHECKS = 1;

COMMIT;