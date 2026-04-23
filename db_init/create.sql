
CREATE DATABASE IF NOT EXISTS projecte


GRANT ALL PRIVILEGES ON projecte.* TO 'usuari'@'%';
FLUSH PRIVILEGES;


USE projecte;

-- Estructura de la taula `ACTUACIO`
--

CREATE TABLE `ACTUACIO` (
  `idActuacio` int(11) NOT NULL,
  `descripcio` varchar(2000) NOT NULL,
  `visible` int(1) DEFAULT NULL,
  `data` timestamp NULL DEFAULT NULL,
  `temps` int(11) DEFAULT NULL,
  `incidencia` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_uca1400_ai_ci;

-- --------------------------------------------------------

--
-- Estructura de la taula `DEPARTAMENT`
--

CREATE TABLE `DEPARTAMENT` (
  `idDepartament` int(11) NOT NULL,
  `nom` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_uca1400_ai_ci;

-- --------------------------------------------------------

--
-- Estructura de la taula `INCIDENCIA`
--

CREATE TABLE `INCIDENCIA` (
  `idIncidencia` int(11) NOT NULL,
  `descripcio` varchar(2000) NOT NULL,
  `data` timestamp NULL DEFAULT NULL,
  `dataFinalitzacio` date DEFAULT NULL,
  `tecnic` int(11) DEFAULT NULL,
  `departament` int(11) DEFAULT NULL,
  `tipo` int(11) DEFAULT NULL,
  `prioritat` enum('Alta','Mitja','Baixa') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_uca1400_ai_ci;

-- --------------------------------------------------------

--
-- Estructura de la taula `TECNIC`
--

CREATE TABLE `TECNIC` (
  `idTecnic` int(11) NOT NULL,
  `nom` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_uca1400_ai_ci;

-- --------------------------------------------------------

--
-- Estructura de la taula `TIPO`
--

CREATE TABLE `TIPO` (
  `idTipo` int(11) NOT NULL,
  `nom` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_uca1400_ai_ci;

--
-- Índexs per a les taules bolcades
--

--
-- Índexs per a la taula `ACTUACIO`
--
ALTER TABLE `ACTUACIO`
  ADD PRIMARY KEY (`idActuacio`),
  ADD KEY `incidencia` (`incidencia`);

--
-- Índexs per a la taula `DEPARTAMENT`
--
ALTER TABLE `DEPARTAMENT`
  ADD PRIMARY KEY (`idDepartament`);

--
-- Índexs per a la taula `INCIDENCIA`
--
ALTER TABLE `INCIDENCIA`
  ADD PRIMARY KEY (`idIncidencia`),
  ADD KEY `tecnic` (`tecnic`),
  ADD KEY `departament` (`departament`),
  ADD KEY `tipo` (`tipo`);

--
-- Índexs per a la taula `TECNIC`
--
ALTER TABLE `TECNIC`
  ADD PRIMARY KEY (`idTecnic`);

--
-- Índexs per a la taula `TIPO`
--
ALTER TABLE `TIPO`
  ADD PRIMARY KEY (`idTipo`);

--
-- AUTO_INCREMENT per les taules bolcades
--

--
-- AUTO_INCREMENT per la taula `ACTUACIO`
--
ALTER TABLE `ACTUACIO`
  MODIFY `idActuacio` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT per la taula `DEPARTAMENT`
--
ALTER TABLE `DEPARTAMENT`
  MODIFY `idDepartament` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT per la taula `INCIDENCIA`
--
ALTER TABLE `INCIDENCIA`
  MODIFY `idIncidencia` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT per la taula `TECNIC`
--
ALTER TABLE `TECNIC`
  MODIFY `idTecnic` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT per la taula `TIPO`
--
ALTER TABLE `TIPO`
  MODIFY `idTipo` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restriccions per a les taules bolcades
--

--
-- Restriccions per a la taula `ACTUACIO`
--
ALTER TABLE `ACTUACIO`
  ADD CONSTRAINT `ACTUACIO_ibfk_1` FOREIGN KEY (`incidencia`) REFERENCES `INCIDENCIA` (`idIncidencia`);

--
-- Restriccions per a la taula `INCIDENCIA`
--
ALTER TABLE `INCIDENCIA`
  ADD CONSTRAINT `INCIDENCIA_ibfk_1` FOREIGN KEY (`tecnic`) REFERENCES `TECNIC` (`idTecnic`),
  ADD CONSTRAINT `INCIDENCIA_ibfk_2` FOREIGN KEY (`departament`) REFERENCES `DEPARTAMENT` (`idDepartament`),
  ADD CONSTRAINT `INCIDENCIA_ibfk_3` FOREIGN KEY (`tipo`) REFERENCES `TIPO` (`idTipo`);
COMMIT;




-- Afegim algunes dades inicials a la taula incidencia

INSERT INTO incidencia (id) VALUES (1);
INSERT INTO incidencia (tecnic) VALUES (2);            
INSERT INTO incidencia (tipo) VALUES ('Mitja');   