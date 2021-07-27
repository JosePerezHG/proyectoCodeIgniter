-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 28-11-2020 a las 03:21:55
-- Versión del servidor: 10.4.14-MariaDB
-- Versión de PHP: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `bd_ayuda`
--

DELIMITER $$
--
-- Procedimientos
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_buscar_personaxdni` (IN `v_dni` CHAR(8))  BEGIN

select p.dni v1,nombre v2, apellidos v3, telefono v4,t.descripcion v5, v.direccion v6, v.referencia v7,e.descripcion v8   from miembro m inner join persona p on (p.codper=m.codper) inner join vivienda v on (v.codvivienda=m.codvivienda)
inner join tipomiembro t on (t.cotipom=m.cotipom) inner join estadov e on e.codestado=v.codestado

where p.dni=v_dni;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_listar_accesos` (IN `v_id_user` INT)  BEGIN
select p.idpagina v1 ,concat
(p.controlador,p.metodo) v2
from accesos a inner join paginas p on a.idpagina=p.idpagina where a.id_user=v_id_user and a.estado=1;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_listar_estado` ()  BEGIN
select codestado v1,descripcion v2 from estadov ;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_listar_persona` ()  BEGIN
select codper v1,dni v2,nombre v3,apellidos v4,telefono v5,correo v6,direccion v7,fecha v8,estado v9,
case estado when  0 then 'Fallecido' when  1 then 'Saludable' when  2 then 'Herido' end v10, fotop v11
from persona ;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_listar_vivienda` ()  BEGIN
select v.codvivienda v1,v.direccion v2,v.referencia v3, v.codestado v4,e.descripcion v5,zona v6,coordUTMx v7,coordutmy v8, foto v9
from vivienda v inner join estadov e on v.codestado=e.codestado;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_registrar_persona` (IN `v_dni` CHAR(8), IN `v_nombre` VARCHAR(50), IN `v_apellidos` VARCHAR(90), IN `v_telefono` VARCHAR(15), IN `v_correo` VARCHAR(200), IN `v_direccion` TEXT, IN `v_fecha` DATE, IN `v_estado` SMALLINT, IN `v_fotop` VARCHAR(200), OUT `v_res` INT)  BEGIN
declare exit handler
  for SQLEXCEPTION
begin
rollback;
set v_res=false;
end;

start transaction;
insert into persona
(dni,nombre,apellidos,telefono,
correo,direccion,fecha,estado,fotop)
values (v_dni,upper(v_nombre),
upper(v_apellidos),v_telefono,
v_correo,upper(v_direccion),v_fecha,v_estado,v_fotop);
commit;
set v_res=true;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_registrar_vivienda` (IN `v_direccion` VARCHAR(45), IN `v_referencia` TEXT, IN `v_codestado` INT, IN `v_zona` TEXT, IN `v_coordUTMx` VARCHAR(45), IN `v_coordutmy` VARCHAR(45), IN `v_foto` VARCHAR(200), OUT `v_res` BOOL)  BEGIN
declare exit handler
  for SQLEXCEPTION
begin
rollback;
set v_res=false;
end;

start transaction;
insert into vivienda
(direccion,referencia,codestado,zona,
coordUTMx,coordutmy,fechareg,foto)
values (upper(v_direccion),upper(v_referencia),v_codestado,v_zona,
v_coordUTMx,v_coordutmy,now(),v_foto);
commit;
set v_res=true;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_reporte1` ()  BEGIN
select case when fotop is not null then 'Con foto'
        else 'Sin foto' end as v1,count(*) as v2 from persona
group by
case when fotop is not null then 'Con foto'
        else 'Sin foto' end;


END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_validarUsuario` (IN `v_user` CHAR(20), IN `v_clave` TEXT)  BEGIN
select id_user v1, login v2, clave v3,id_tipo v4, descripcion v5 from  usuario

where login=v_user;

END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `accesos`
--

CREATE TABLE `accesos` (
  `idacceso` int(10) UNSIGNED NOT NULL,
  `idpagina` int(10) UNSIGNED NOT NULL,
  `estado` smallint(5) UNSIGNED NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

--
-- Volcado de datos para la tabla `accesos`
--

INSERT INTO `accesos` (`idacceso`, `idpagina`, `estado`, `id_user`) VALUES
(1, 1, 1, 5),
(2, 2, 1, 5),
(3, 3, 1, 5),
(4, 4, 1, 5),
(5, 1, 1, 6);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estadov`
--

CREATE TABLE `estadov` (
  `codestado` int(10) UNSIGNED NOT NULL,
  `descripcion` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `estadov`
--

INSERT INTO `estadov` (`codestado`, `descripcion`) VALUES
(1, 'Normal'),
(2, 'Inhabiltable'),
(3, 'Derrumbada'),
(4, 'Parcialmente Derrumbada');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `keys`
--

CREATE TABLE `keys` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `key` varchar(40) NOT NULL,
  `level` int(2) NOT NULL,
  `ignore_limits` tinyint(1) NOT NULL DEFAULT 0,
  `is_private_key` tinyint(1) NOT NULL DEFAULT 0,
  `ip_addresses` text DEFAULT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `keys`
--

INSERT INTO `keys` (`id`, `user_id`, `key`, `level`, `ignore_limits`, `is_private_key`, `ip_addresses`, `date_created`) VALUES
(1, 1, '123456', 0, 0, 0, NULL, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `miembro`
--

CREATE TABLE `miembro` (
  `comiembro` int(10) UNSIGNED NOT NULL,
  `cotipom` int(10) UNSIGNED NOT NULL,
  `fechareg` date NOT NULL,
  `codper` int(10) NOT NULL,
  `codvivienda` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `miembro`
--

INSERT INTO `miembro` (`comiembro`, `cotipom`, `fechareg`, `codper`, `codvivienda`) VALUES
(1, 1, '2017-02-02', 21, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `paginas`
--

CREATE TABLE `paginas` (
  `idpagina` int(10) UNSIGNED NOT NULL,
  `controlador` varchar(250) NOT NULL,
  `metodo` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

--
-- Volcado de datos para la tabla `paginas`
--

INSERT INTO `paginas` (`idpagina`, `controlador`, `metodo`) VALUES
(1, 'persona', 'index'),
(2, 'persona', 'doSave'),
(3, 'persona', 'doList'),
(4, 'perfil', 'index');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `persona`
--

CREATE TABLE `persona` (
  `codper` int(11) NOT NULL,
  `dni` char(8) COLLATE utf8_spanish_ci NOT NULL,
  `nombre` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `apellidos` varchar(90) COLLATE utf8_spanish_ci NOT NULL,
  `telefono` varchar(15) COLLATE utf8_spanish_ci NOT NULL,
  `correo` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `direccion` text COLLATE utf8_spanish_ci DEFAULT NULL,
  `fecha` date NOT NULL,
  `estado` smallint(6) NOT NULL,
  `fotop` varchar(200) COLLATE utf8_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `persona`
--

INSERT INTO `persona` (`codper`, `dni`, `nombre`, `apellidos`, `telefono`, `correo`, `direccion`, `fecha`, `estado`, `fotop`) VALUES
(21, '42412134', 'MANUEL', 'OCAS', '14986563', 'CORR@H.COM', 'CALE 123', '1980-02-02', 1, NULL),
(23, '42412174', 'JUAN', 'OCAS', '14986564', 'JUAN@H.COM', 'CALE 12322', '1980-02-02', 1, NULL),
(24, '40784283', 'ANTHONY', 'FARIAS CRUZ', 'AH. LA PRIMAVER', '979188720', 'FHFHFH@G.COM', '1980-01-10', 1, NULL),
(25, '45231452', 'ANTHONY', 'GOMEZ ALDAÑA', 'AH. LA PRIMAVER', '979188720', 'FHFHFH@G.COM', '1960-01-10', 0, NULL),
(26, '42134785', 'ANTHONY', 'BIENAVENTURA LOPEZ', 'AH. LA PRIMAVER', '979188720', 'FHFHFH@G.COM', '1980-01-10', 0, NULL),
(27, '14523131', 'CARLOS', 'GOMEZ', 'AH PERU', 'HHFJFJHF@HH.COM', 'CALLE 12', '1980-01-01', 1, NULL),
(28, '45464614', 'JUAN', 'PEREZ CRUZ', 'AH PERU', 'FGG@H.COM', 'CALLE 12', '1980-01-01', 1, NULL),
(29, '46531134', 'JULIO', 'ROPEZ', 'AH PERU', 'HHDSHDH@H.,COM', 'calle 12', '1980-01-03', 1, NULL),
(30, '46494676', 'PATY', 'GOMEZ', 'AH PERU', 'CALLE 12', 'CAÑE', '1980-01-02', 1, NULL),
(31, '45663178', 'PATY', 'OULLO GOMEZ', 'AH PERU', 'CALLE 12', 'CALLE3', '1980-01-03', 1, NULL),
(32, '45978423', 'JULIO', 'LOPEZ FARIAS', 'AH PERU', 'CALLE 12', 'CALLE 5523', '1986-01-01', 0, NULL),
(33, '48536895', 'CARLOS', 'SALDIVA', '986969589', 'cooreo@gmail.com', 'CALLE 123', '2020-01-01', 1, NULL),
(34, '48536899', 'CARLOS', 'SALDIVA', '986969589', 'cooreo@gmail.com', 'CALLE 123', '2020-01-01', 1, NULL),
(35, '23432123', 'MABEL ', 'FIESTAS ROPJAS', '969698745', '444@gmail.com', 'CALLE 123', '1980-01-10', 0, NULL),
(39, '23432124', 'MABEL JUANA', 'FIESTAS ROPJAS', '986958745', '5444@gmail.com', 'CALLE 123', '1980-01-10', 0, NULL),
(41, '23432163', 'MABEL MARIBEL', 'FIESTAS ROPJAS', '987457812', 'alkk444@gmail.com', 'CALLE 123', '1980-01-10', 0, NULL),
(42, '13456789', 'JUAN CARLOS', 'MAURICIO', '987654321', 'anthonytavara@gmail.com', 'CALLE SAN JUAN 23', '1990-01-10', 2, NULL),
(43, '65678970', 'JUAN CARLOS', 'GOMEZ GOMEZ', '987654321', '1506rosavegas@gmail.com', 'CALLE SAN JUAN 23', '2020-10-01', 0, NULL),
(44, '87654328', 'JOSE JOSE', 'GOMEZ GOMEZ', '6565656', 'anhony@gmail.com', 'CALLE SAN JUAN 23', '2020-10-01', 0, NULL),
(45, '99678987', 'JUAN CARLOS', 'GOMEZ GOMEZ', '99999999', '1506rosavegas@gmail.com', 'CALLE SAN JUAN 23', '2020-10-09', 0, NULL),
(46, '98678987', 'JUAN CARLOS', 'GOMEZ GOMEZ', '987654321', '1506rosavegas@gmail.com', 'CALLE SAN JUAN 23', '2020-10-23', 0, NULL),
(47, '65678987', 'JUAN CARLOS', 'GOMEZ GOMEZ', '6565656', '100000@idepunp.unp.edu.pe', 'CALLE SAN JUAN 23', '2020-10-01', 0, NULL),
(48, '65678897', 'JUAN CARLOS', 'GOMEZ GOMEZ', '99999999', 'anthonytavara@gmail.com', 'CALLE SAN JUAN 23', '2020-10-09', 0, NULL),
(50, '55678897', 'JOSE JOSE', 'GOMEZ GOMEZ', '99999999', 'anhony@gmail.com', 'CALLE SAN JUAN 23', '2020-10-15', 0, NULL),
(51, '15678987', 'MARIA AANA', 'GOMEZ GOMEZ', '99999999', 'anthonytavara@gmail.com', 'CALLE SAN JUAN 23', '2020-10-01', 0, NULL),
(52, '45454649', 'PEDRO JULIO', 'CASTRO FARIAS', '987757573', 'castro@gmail.com', 'CALLE 123', '1990-01-01', 1, 'prueba'),
(53, '34561234', 'JUAN CARLOS', 'LOPEZ LOPEZ', '87987654', 'correo2@gmail.com', 'CALLE SAN JUAN 123', '2000-01-01', 1, '1603933882_9ed2792b603905470399.jpg'),
(54, '65679987', 'JUAN CARLOS', 'GOMEZ GOMEZ', '987654321', 'juanc@gmail.com', 'CALLE SAN JUAN 23', '1980-10-10', 1, '1603934388_3e25cbc04865f88c3d46.jpg'),
(55, '34561239', 'JUAN CARLOS MARIO', 'LOPEZ LOPEZ', '87987654', 'correo2@gmail.com', 'CALLE SAN JUAN 123', '2000-01-01', 1, '1605147694_7cd5ced86bc5165469e7.jpg'),
(56, '34561212', 'JUAN CARLOS MARIO', 'LOPEZ LOPEZ', '87987654', 'correo2@gmail.com', 'CALLE SAN JUAN 123', '2000-01-01', 1, '1605148665_785df85f1ccc883e604b.jpg'),
(57, '34561267', 'JUAN CARLOS RIOS', 'LOPEZ LOPEZ', '87987654', 'correo2@gmail.com', 'CALLE SAN JUAN 123', '2000-01-01', 1, '1605321145_90be494e4844a4273d74.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipomiembro`
--

CREATE TABLE `tipomiembro` (
  `cotipom` int(10) UNSIGNED NOT NULL,
  `descripcion` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tipomiembro`
--

INSERT INTO `tipomiembro` (`cotipom`, `descripcion`) VALUES
(1, 'Jefe de Familia'),
(2, 'Familiar Directo'),
(3, 'Habitante');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_usuario`
--

CREATE TABLE `tipo_usuario` (
  `id_tipo` int(11) NOT NULL,
  `descripcion` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tipo_usuario`
--

INSERT INTO `tipo_usuario` (`id_tipo`, `descripcion`) VALUES
(4, 'Administrador'),
(5, 'Secretaria');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id_user` int(11) NOT NULL,
  `login` char(20) NOT NULL,
  `clave` text NOT NULL,
  `id_tipo` int(11) NOT NULL,
  `descripcion` varchar(50) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id_user`, `login`, `clave`, `id_tipo`, `descripcion`) VALUES
(5, 'mperez@gmail.com', '$2y$10$1uMxVboNrzjI4wtU8Ykqxeu8p5i9gsms6wmQ.12mFGub5g6FUpJLW', 1, 'Jefe '),
(6, 'jperez@gmail.com', '$2y$10$1uMxVboNrzjI4wtU8Ykqxeu8p5i9gsms6wmQ.12mFGub5g6FUpJLW', 1, 'Usuario de prueba');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vivienda`
--

CREATE TABLE `vivienda` (
  `codvivienda` int(10) UNSIGNED NOT NULL,
  `direccion` varchar(45) NOT NULL,
  `referencia` text DEFAULT NULL,
  `codestado` int(10) UNSIGNED NOT NULL,
  `zona` text NOT NULL,
  `coordUTMx` varchar(45) DEFAULT NULL,
  `coordutmy` varchar(45) DEFAULT NULL,
  `fechareg` date NOT NULL,
  `foto` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `vivienda`
--

INSERT INTO `vivienda` (`codvivienda`, `direccion`, `referencia`, `codestado`, `zona`, `coordUTMx`, `coordutmy`, `fechareg`, `foto`) VALUES
(1, 'CALLE H-123 ', 'FRENTE AL PARQUE XY', 2, 'IGNACIO MERINO - PIURA', '-5.1992655', '-80.62728', '2017-05-20', NULL),
(2, 'CALLE H-124 ', 'FRENTE AL PARQUE XY', 1, 'IGNACIO MERINO - PIURA', '-32.4563431', '-80.2513639', '2017-05-20', '1602562419_905badf12690a4c5343f.jpg'),
(3, 'CALLE GRAU 123', 'FRENTE AL GRIFO', 1, 'Sector oeste', '-6.5626', '-8.36232', '2020-10-12', '1602562473_75306bceee131dd67e9d.jpg'),
(4, 'CALLE GRAU 123', 'FRENTE AL GRIFO', 1, 'Sector oeste', '-6.5626', '-8.36232', '2020-10-12', '1602562579_3dd47dde3c051adcea8c.jpg'),
(8, 'CALLE ABISMO 123', 'ABISMO DE HELL', 1, 'Sector oeste', '-6.5626', '-8.36232', '2020-10-14', '1602700126_4ba9077b4699ce2eb63c.jpg'),
(13, 'CALLE CARLOS 123', 'FRENTE AL PARQUE', 1, 'Industtrial', '-4.567799', '-8.899999', '2020-10-21', NULL),
(15, 'CALLE CARLOS 123', 'FRENTE AL PARQUE', 1, 'Industtrial', '-4.567799', '-8.899999', '2020-10-21', '1603328501_34fec830cb07024d9092.jpeg'),
(16, 'CALLE SAN MARTRIN 234B', 'CASA ROSADA', 1, 'cerca rio', '-8.5', '-5.5', '2020-10-21', '1603332877_eda376c81b9fb61b2859.jpg'),
(17, 'CALLE SAN MARTRIN 234B', 'FRENTE AL COLEGIO', 1, 'Zon alibre de ruidos', '-8.6785', '-6.5', '2020-10-21', '1603333215_169ae332dfd94fd56af7.jpg'),
(18, 'CALLE SAN MARTRIN 265', 'REFRECNIA PRUEBA', 1, 'zona x', '3.6', '4.5', '2020-10-21', '1603338447_4acbef86b7d3561bc0df.jpg'),
(19, 'CALLE SAN MARTRIN 234GG', 'XALLLE ', 3, 'zna ind', '-5.1', '-4.5', '2020-10-21', '1603338577_33d3259337e1e450b588.jpg'),
(20, 'CALLE CARLOS 123', 'FRENTE AL PARQUE', 1, 'Industtrial', '-4.567799', '-8.899999', '2020-10-23', '1603501533_6a1845219daf3811f143.jpg'),
(21, 'CALLE SAN MARTRIN 234X', 'FRENTE PAR    QUE INDUSTRIAL      ', 1, 'Zona reservadaS                ', '-9.987646', '-5.6798', '2020-10-23', '1603505809_fc6f9e6e318a79802044.jpg'),
(22, 'SANTA CECILIAR 123', '                       CASA BONTA FRENTE AL COLEGIO ', 1, 'Residecnal   ', '-5.67111', '-6.76868', '2020-10-23', '1603507578_be54a9bbc90d528bf4db.jpg');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `accesos`
--
ALTER TABLE `accesos`
  ADD PRIMARY KEY (`idacceso`),
  ADD KEY `FK_accesos_2` (`idpagina`);

--
-- Indices de la tabla `estadov`
--
ALTER TABLE `estadov`
  ADD PRIMARY KEY (`codestado`);

--
-- Indices de la tabla `keys`
--
ALTER TABLE `keys`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `miembro`
--
ALTER TABLE `miembro`
  ADD PRIMARY KEY (`comiembro`),
  ADD KEY `FK_miembro_1` (`codvivienda`),
  ADD KEY `FK_miembro_2` (`cotipom`),
  ADD KEY `FK_miembro_3` (`codper`);

--
-- Indices de la tabla `paginas`
--
ALTER TABLE `paginas`
  ADD PRIMARY KEY (`idpagina`);

--
-- Indices de la tabla `persona`
--
ALTER TABLE `persona`
  ADD PRIMARY KEY (`codper`),
  ADD UNIQUE KEY `dni` (`dni`);

--
-- Indices de la tabla `tipomiembro`
--
ALTER TABLE `tipomiembro`
  ADD PRIMARY KEY (`cotipom`);

--
-- Indices de la tabla `tipo_usuario`
--
ALTER TABLE `tipo_usuario`
  ADD PRIMARY KEY (`id_tipo`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `Ref55` (`id_tipo`);

--
-- Indices de la tabla `vivienda`
--
ALTER TABLE `vivienda`
  ADD PRIMARY KEY (`codvivienda`) USING BTREE,
  ADD KEY `FK_vivienda_1` (`codestado`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `accesos`
--
ALTER TABLE `accesos`
  MODIFY `idacceso` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `estadov`
--
ALTER TABLE `estadov`
  MODIFY `codestado` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `keys`
--
ALTER TABLE `keys`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `miembro`
--
ALTER TABLE `miembro`
  MODIFY `comiembro` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `paginas`
--
ALTER TABLE `paginas`
  MODIFY `idpagina` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `persona`
--
ALTER TABLE `persona`
  MODIFY `codper` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT de la tabla `tipomiembro`
--
ALTER TABLE `tipomiembro`
  MODIFY `cotipom` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `tipo_usuario`
--
ALTER TABLE `tipo_usuario`
  MODIFY `id_tipo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `vivienda`
--
ALTER TABLE `vivienda`
  MODIFY `codvivienda` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `accesos`
--
ALTER TABLE `accesos`
  ADD CONSTRAINT `FK_accesos_2` FOREIGN KEY (`idpagina`) REFERENCES `paginas` (`idpagina`);

--
-- Filtros para la tabla `miembro`
--
ALTER TABLE `miembro`
  ADD CONSTRAINT `FK_miembro_1` FOREIGN KEY (`codvivienda`) REFERENCES `vivienda` (`codvivienda`),
  ADD CONSTRAINT `FK_miembro_2` FOREIGN KEY (`cotipom`) REFERENCES `tipomiembro` (`cotipom`),
  ADD CONSTRAINT `FK_miembro_3` FOREIGN KEY (`codper`) REFERENCES `persona` (`codper`);

--
-- Filtros para la tabla `vivienda`
--
ALTER TABLE `vivienda`
  ADD CONSTRAINT `FK_vivienda_1` FOREIGN KEY (`codestado`) REFERENCES `estadov` (`codestado`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
