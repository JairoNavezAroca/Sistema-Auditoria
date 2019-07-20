-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 20-07-2019 a las 23:44:45
-- Versión del servidor: 10.1.37-MariaDB
-- Versión de PHP: 5.6.40

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `sistemaauditoria`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `activos`
--

CREATE TABLE `activos` (
  `IdActivo` int(11) NOT NULL,
  `Descripcion` varchar(100) DEFAULT NULL,
  `Importancia` varchar(100) DEFAULT NULL,
  `IdAuditoria` int(11) NOT NULL,
  `Nombre` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `auditor`
--

CREATE TABLE `auditor` (
  `IdAuditor` int(11) NOT NULL,
  `Apellidos` varchar(50) DEFAULT NULL,
  `Nombres` varchar(50) DEFAULT NULL,
  `Perfil` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `auditor`
--

INSERT INTO `auditor` (`IdAuditor`, `Apellidos`, `Nombres`, `Perfil`) VALUES
(1, 'Navez Aroca', 'Jairo', 'Conocimiento del uso de la herramienta XPCSPYP.exe;Conocimiento en elaboración de inventarios con la herramienta OCS Inventory.;Proactivo.'),
(2, 'Briceño Montaño', 'Javier', 'Conocimiento en elaboración y ejecución de proyectos.;Conocimiento en ejecución de inventariado físico.;Proactivo.;Conocimiento en funcionamiento de aplicaciones ofimáticas.'),
(3, 'Olivares Ruiz', 'Cintia', 'Conocimiento de normas y leyes para el licenciamiento de software;Conocimiento en reglamento y funciones de entidades públicas.;Proactivo.'),
(4, 'Argomedo de la Cruz', 'Jhon', 'Conocimiento de funcionalidades de aplicaciones ofimáticas.;Conocimiento en elaboración de informes y cronogramas de trabajo.;Proactivo.;');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `auditoria`
--

CREATE TABLE `auditoria` (
  `IdAuditoria` int(11) NOT NULL,
  `Titulo` text,
  `Motivos` text,
  `IdEmpresa` int(11) NOT NULL,
  `IdAuditor` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `auditoria`
--

INSERT INTO `auditoria` (`IdAuditoria`, `Titulo`, `Motivos`, `IdEmpresa`, `IdAuditor`) VALUES
(1, 'Auditoria ofimática al departamento de Bienestar Estudiantil del Colegio de Alto Rendimiento de la Libertad', 'Geográficamente, el Colegio de Alto Rendimiento de La Libertad, se encuentra ubicado en el campamento San José, provincia de Virú, departamento de La Libertad\r\nDesde la fundación del colegio de alto rendimiento de la libertad en el campamento San José el año 2015  la gestión de inventario, las adquisiciones de aplicaciones ofimáticas y sus respectivas licencias no han llevado un correcto control dentro de la institución, por lo que dicha institución requiere una auditoría para verificar si los procesos actuales cumplen con los objetivos que se plantea el colegio.\r\nEste colegio, cuenta con diversos departamentos: Bienestar y Desarrollo del Estudiante, Tópico, Académica, Biblioteca y Asistencia Social. Esta auditoria se realizará en el departamento de Bienestar estudiantil ya que maneja muchos procesos relacionados al alumno, como lo son: recopilar información del alumno, de sus padres y de su entorno en general, además de otros datos como los datos de su colegio de origen, entre otros. Asimismo, se encarga de velar por el bienestar integral del alumno, teniendo varias oficinas que comparten información, y desempeñan diferentes funciones (Oficina de Psicología, Oficina de Servicio Social, Oficina de Tutoría, Oficina de convivencia escolar). \r\nLas aplicaciones ofimáticas del área de Bienestar estudiantil manejan información de mucha importancia para la entidad educativa, pero dada la complejidad de insertar grandes cantidades de datos en dichas aplicaciones, estos son administrados de forma física (reportes, fichas y archivos) y digital (documentos administrados en hojas de cálculo), siendo el punto referencial de selección la importancia y frecuencia de utilización de los mismos.\r\nEl ambiente en donde funciona el área de Bienestar estudiantil, así como sus diversas oficinas presentan ciertas limitaciones de espacio, y las computadoras utilizadas en dicho ambiente pueden no estar en un lugar adecuado. Asimismo, el proceso de trasladar información desde un área a otra se dificulta debido al mal manejo en el almacenamiento de información.', 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detallearchivos`
--

CREATE TABLE `detallearchivos` (
  `IdAuditoria` int(11) NOT NULL,
  `IdDetalle` int(11) NOT NULL,
  `Nombre` varchar(100) DEFAULT NULL,
  `Ruta` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalleauditores`
--

CREATE TABLE `detalleauditores` (
  `IdDetalle` int(11) NOT NULL,
  `IdAuditor` int(11) DEFAULT NULL,
  `IdAuditoria` int(11) DEFAULT NULL,
  `IdRol` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalleinstitucional`
--

CREATE TABLE `detalleinstitucional` (
  `IdDetalle` int(11) NOT NULL,
  `IdAuditoria` int(11) DEFAULT NULL,
  `IdInstitucional` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalleinternacional`
--

CREATE TABLE `detalleinternacional` (
  `IdDetalle` int(11) NOT NULL,
  `IdAuditoria` int(11) DEFAULT NULL,
  `IdInternacional` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `detalleinternacional`
--

INSERT INTO `detalleinternacional` (`IdDetalle`, `IdAuditoria`, `IdInternacional`) VALUES
(1, 1, 2),
(2, 1, 3),
(3, 1, 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detallenacional`
--

CREATE TABLE `detallenacional` (
  `IdDetalle` int(11) NOT NULL,
  `IdAuditoria` int(11) DEFAULT NULL,
  `IdNacional` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `detallenacional`
--

INSERT INTO `detallenacional` (`IdDetalle`, `IdAuditoria`, `IdNacional`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 1, 3),
(4, 1, 4),
(5, 1, 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalleobjetos`
--

CREATE TABLE `detalleobjetos` (
  `IdDetalle` int(11) NOT NULL,
  `IdObjeto` int(11) DEFAULT NULL,
  `IdAuditoria` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detallepruebacumplimiento`
--

CREATE TABLE `detallepruebacumplimiento` (
  `IdDetalle` int(11) NOT NULL,
  `IdPrueba` int(11) NOT NULL,
  `Pregunta` varchar(100) DEFAULT NULL,
  `Norma` varchar(100) DEFAULT NULL,
  `Respuesta` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detallepruebasustantiva`
--

CREATE TABLE `detallepruebasustantiva` (
  `IdDetalle` int(11) NOT NULL,
  `IdPrueba` int(11) DEFAULT NULL,
  `Descripcion` varchar(50) DEFAULT NULL,
  `Resultado` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empresa`
--

CREATE TABLE `empresa` (
  `IdEmpresa` int(11) NOT NULL,
  `Nombre` text,
  `Mision` text,
  `Vision` text,
  `Estrategias` text,
  `Ubicacion` text,
  `Organigrama` text,
  `IdRubro` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `empresa`
--

INSERT INTO `empresa` (`IdEmpresa`, `Nombre`, `Mision`, `Vision`, `Estrategias`, `Ubicacion`, `Organigrama`, `IdRubro`) VALUES
(1, 'Colegio de Alto Rendimiento - La Libertad', 'Ser una institución educativa con estándares internacionales de acreditación que consoliden el modelo educativo propio de la red de Colegios de Alto Rendimiento, sirviendo de referente de calidad académica, organizacional y de gestión en la región, que contribuya a mejorar la educación pública como base del desarrollo nacional y mundial.', 'Somos una institución educativa pública acreditada, parte de la Red de Colegios de Alto Rendimiento, que sobre la base del Programa Diploma del Bachillerato Internacional, fortalece las competencias personales, académicas y socioemocionales de estudiantes de alto desempeño, con miras a forjar ciudadanos íntegros y líderes comprometidos con el desarrollo del país y del mundo.', '* Educar a los alumnos bajo una guía basada en los diversos estándares internacionales con la finalidad de formar alumnos con competencias académicas y socioemocionales, y profesionalmente preparados para el futuro del mañana.\r\n*Ofrecer un servicio responsable y oportuno.\r\n*Ser un equipo integrado, donde se desarrolle un trabajo eficiente entre los miembros de la institución.', 'La institución se encuentra a unos 15 minutos de viaje desde la ciudad de Virú, sus alrededores son poco poblados y está parcialmente aislado de las actividades de la ciudad. La ubicación de esta institución favorece a sus objetivos institucionales, ya que al funcionar como internado, es conveniente alejar a los estudiantes de posibles distracciones y peligros existentes en la ciudad.', NULL, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `entrevistas`
--

CREATE TABLE `entrevistas` (
  `IdEntrevista` int(11) NOT NULL,
  `Nombres` varchar(50) DEFAULT NULL,
  `Cargo` varchar(50) DEFAULT NULL,
  `Fecha` date DEFAULT NULL,
  `IdAuditoria` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `marcoinstitucional`
--

CREATE TABLE `marcoinstitucional` (
  `IdInstitucional` int(11) NOT NULL,
  `Codigo` text,
  `Detalle` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `marcointernacional`
--

CREATE TABLE `marcointernacional` (
  `IdInternacional` int(11) NOT NULL,
  `Detalle` text,
  `Codigo` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `marcointernacional`
--

INSERT INTO `marcointernacional` (`IdInternacional`, `Detalle`, `Codigo`) VALUES
(1, 'Definir y gestionar un plan de tratamiento del riesgo de la seguridad de la información.', 'APO13.02'),
(2, 'Examinar y evaluar continuamente la necesidad actual y futura de los recursos relacionados con TI, las opciones para la asignación de recursos (incluyendo estrategias de aprovisionamiento) y los principios de asignación y gestión para cumplir de manera óptima con las necesidades de la empresa.', 'EDM04.01'),
(3, 'Gestionar la continuidad', 'DSS04'),
(4, 'En este estándar se describe una práctica que puede ser utilizada para la adquisición de cualquier producto de software, para cualquier tipo de plataforma computacional, independiente de su tamaño y complejidad.', 'IEEE 1062:1998'),
(5, 'El Modelo CMMI – ACQ está diseñado especialmente para las organizaciones que adquieren software y servicios correlacionados. Proporciona una orientación para gestionar los proyectos relacionados con la adquisición de productos y servicios.', 'Modelo CMMI-ACQ');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `marconacional`
--

CREATE TABLE `marconacional` (
  `IdNacional` int(11) NOT NULL,
  `Codigo` text,
  `Detalle` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `marconacional`
--

INSERT INTO `marconacional` (`IdNacional`, `Codigo`, `Detalle`) VALUES
(1, 'NTP-ISO/IEC 17799', 'Tecnología de Información.Código de Buenas prácticas para la gestión de Seguridad.'),
(2, 'DECRETO SUPREMO Nº 013-2003-PCM', 'Dictan medidas para garantizar la legalidad de la adquisición de programas de software en entidades y dependencias del Sector Público. Asimismo, dicta directrices para el correcto inventariado de software.'),
(3, 'DECRETO SUPREMO Nº 026-2016-PCM/La ley Nº 27269', 'Ley de firmas y certificados digitales. Nos permitirá evaluar que las licencias de las aplicaciones adquiridas sean legales.'),
(4, 'Resolución Nª 039-98/SBN', 'Ofrece las directrices para una correcta planeación y ejecución de inventariado de muebles físicos que posee una entidad del estado peruano.'),
(5, 'Resolución Nª 158-97', 'Para poder identificar los tipos de bienes que pueden ser inventariados, así como las características que deben de tener.');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `objetoauditable`
--

CREATE TABLE `objetoauditable` (
  `IdObjeto` int(11) NOT NULL,
  `Descripcion` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `objetoauditable`
--

INSERT INTO `objetoauditable` (`IdObjeto`, `Descripcion`) VALUES
(1, 'Software Ofimático'),
(2, 'Seguridad de la información'),
(3, 'Sistemas de la información'),
(4, 'Redes');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `planes`
--

CREATE TABLE `planes` (
  `IdPlan` int(11) NOT NULL,
  `Descripcion` varchar(100) DEFAULT NULL,
  `FInicio` date DEFAULT NULL,
  `FTermino` date DEFAULT NULL,
  `Horas` int(11) DEFAULT NULL,
  `IdAuditoria` int(11) NOT NULL,
  `IdAuditor` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `planificacion`
--

CREATE TABLE `planificacion` (
  `IdAuditoria` int(11) NOT NULL,
  `IdPlanificacion` int(11) NOT NULL,
  `ObjGeneral` text,
  `ObjEspecifico` text,
  `Alcance` text,
  `Realizar` text,
  `NoRealizar` text,
  `Limitaciones` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pruebacumplimiento`
--

CREATE TABLE `pruebacumplimiento` (
  `IdPrueba` int(11) NOT NULL,
  `IdAuditoria` int(11) NOT NULL,
  `FechaRegistro` datetime DEFAULT CURRENT_TIMESTAMP,
  `Nombre` varchar(20) NOT NULL,
  `Normas` varchar(300) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pruebasustantiva`
--

CREATE TABLE `pruebasustantiva` (
  `IdPrueba` int(11) NOT NULL,
  `IdAuditor` int(11) NOT NULL,
  `IdPregunta` int(11) NOT NULL,
  `Nombre` varchar(50) DEFAULT NULL,
  `Resultado` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `riesgos`
--

CREATE TABLE `riesgos` (
  `IdRiesgo` int(11) NOT NULL,
  `IdActivo` int(11) NOT NULL,
  `IdAuditoria` int(11) NOT NULL,
  `Amenazas` varchar(100) DEFAULT NULL,
  `Impacto` varchar(100) DEFAULT NULL,
  `Probabilidad` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rol`
--

CREATE TABLE `rol` (
  `IdRol` int(11) NOT NULL,
  `Descripcion` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `rol`
--

INSERT INTO `rol` (`IdRol`, `Descripcion`) VALUES
(1, 'Jefe de Auditoría'),
(2, 'Especialista en Redes de Datos'),
(3, 'Especialista en Bases de Datos'),
(4, 'Especialista en Cableado Estructurado'),
(5, 'Especialista en Seguridad Informática'),
(6, 'Especialista en Ofimática'),
(7, 'Especialista en Data Warehouse'),
(8, 'Especialista en Ofimática'),
(9, 'Especialista en Gestión de Proyectos'),
(10, 'Especialista en Legislación informática'),
(11, 'Especialista en Ofimática'),
(12, 'Especialista en Seguridad de la informacion');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rubro`
--

CREATE TABLE `rubro` (
  `IdRubro` int(11) NOT NULL,
  `Descripcion` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `rubro`
--

INSERT INTO `rubro` (`IdRubro`, `Descripcion`) VALUES
(1, 'Educacion'),
(2, 'Informática'),
(3, 'Adminsitración'),
(4, 'Inmoviliaria');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `activos`
--
ALTER TABLE `activos`
  ADD PRIMARY KEY (`IdActivo`),
  ADD KEY `R_20` (`IdAuditoria`);

--
-- Indices de la tabla `auditor`
--
ALTER TABLE `auditor`
  ADD PRIMARY KEY (`IdAuditor`);

--
-- Indices de la tabla `auditoria`
--
ALTER TABLE `auditoria`
  ADD PRIMARY KEY (`IdAuditoria`),
  ADD KEY `R_4` (`IdEmpresa`),
  ADD KEY `R_7` (`IdAuditor`);

--
-- Indices de la tabla `detallearchivos`
--
ALTER TABLE `detallearchivos`
  ADD PRIMARY KEY (`IdDetalle`),
  ADD KEY `R_16` (`IdAuditoria`);

--
-- Indices de la tabla `detalleauditores`
--
ALTER TABLE `detalleauditores`
  ADD PRIMARY KEY (`IdDetalle`),
  ADD KEY `R_5` (`IdAuditor`),
  ADD KEY `R_6` (`IdAuditoria`),
  ADD KEY `R_17` (`IdRol`);

--
-- Indices de la tabla `detalleinstitucional`
--
ALTER TABLE `detalleinstitucional`
  ADD PRIMARY KEY (`IdDetalle`),
  ADD KEY `R_12` (`IdAuditoria`),
  ADD KEY `R_15` (`IdInstitucional`);

--
-- Indices de la tabla `detalleinternacional`
--
ALTER TABLE `detalleinternacional`
  ADD PRIMARY KEY (`IdDetalle`),
  ADD KEY `R_10` (`IdAuditoria`),
  ADD KEY `R_13` (`IdInternacional`);

--
-- Indices de la tabla `detallenacional`
--
ALTER TABLE `detallenacional`
  ADD PRIMARY KEY (`IdDetalle`),
  ADD KEY `R_11` (`IdAuditoria`),
  ADD KEY `R_14` (`IdNacional`);

--
-- Indices de la tabla `detalleobjetos`
--
ALTER TABLE `detalleobjetos`
  ADD PRIMARY KEY (`IdDetalle`),
  ADD KEY `R_8` (`IdObjeto`),
  ADD KEY `R_9` (`IdAuditoria`);

--
-- Indices de la tabla `detallepruebacumplimiento`
--
ALTER TABLE `detallepruebacumplimiento`
  ADD PRIMARY KEY (`IdDetalle`),
  ADD KEY `IdPrueba` (`IdPrueba`);

--
-- Indices de la tabla `detallepruebasustantiva`
--
ALTER TABLE `detallepruebasustantiva`
  ADD PRIMARY KEY (`IdDetalle`),
  ADD KEY `IdPrueba` (`IdPrueba`);

--
-- Indices de la tabla `empresa`
--
ALTER TABLE `empresa`
  ADD PRIMARY KEY (`IdEmpresa`),
  ADD KEY `R_3` (`IdRubro`);

--
-- Indices de la tabla `entrevistas`
--
ALTER TABLE `entrevistas`
  ADD PRIMARY KEY (`IdEntrevista`),
  ADD KEY `R_22` (`IdAuditoria`);

--
-- Indices de la tabla `marcoinstitucional`
--
ALTER TABLE `marcoinstitucional`
  ADD PRIMARY KEY (`IdInstitucional`);

--
-- Indices de la tabla `marcointernacional`
--
ALTER TABLE `marcointernacional`
  ADD PRIMARY KEY (`IdInternacional`);

--
-- Indices de la tabla `marconacional`
--
ALTER TABLE `marconacional`
  ADD PRIMARY KEY (`IdNacional`);

--
-- Indices de la tabla `objetoauditable`
--
ALTER TABLE `objetoauditable`
  ADD PRIMARY KEY (`IdObjeto`);

--
-- Indices de la tabla `planes`
--
ALTER TABLE `planes`
  ADD PRIMARY KEY (`IdPlan`),
  ADD KEY `R_23` (`IdAuditoria`),
  ADD KEY `R_24` (`IdAuditor`);

--
-- Indices de la tabla `planificacion`
--
ALTER TABLE `planificacion`
  ADD PRIMARY KEY (`IdPlanificacion`),
  ADD KEY `R_21` (`IdAuditoria`);

--
-- Indices de la tabla `pruebacumplimiento`
--
ALTER TABLE `pruebacumplimiento`
  ADD PRIMARY KEY (`IdPrueba`),
  ADD KEY `IdAuditoria` (`IdAuditoria`);

--
-- Indices de la tabla `pruebasustantiva`
--
ALTER TABLE `pruebasustantiva`
  ADD PRIMARY KEY (`IdPrueba`),
  ADD KEY `IdAuditor` (`IdAuditor`),
  ADD KEY `IdPregunta` (`IdPregunta`);

--
-- Indices de la tabla `riesgos`
--
ALTER TABLE `riesgos`
  ADD PRIMARY KEY (`IdRiesgo`),
  ADD KEY `R_19` (`IdActivo`);

--
-- Indices de la tabla `rol`
--
ALTER TABLE `rol`
  ADD PRIMARY KEY (`IdRol`);

--
-- Indices de la tabla `rubro`
--
ALTER TABLE `rubro`
  ADD PRIMARY KEY (`IdRubro`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `activos`
--
ALTER TABLE `activos`
  MODIFY `IdActivo` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `auditor`
--
ALTER TABLE `auditor`
  MODIFY `IdAuditor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `auditoria`
--
ALTER TABLE `auditoria`
  MODIFY `IdAuditoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `detallearchivos`
--
ALTER TABLE `detallearchivos`
  MODIFY `IdDetalle` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `detalleauditores`
--
ALTER TABLE `detalleauditores`
  MODIFY `IdDetalle` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `detalleinstitucional`
--
ALTER TABLE `detalleinstitucional`
  MODIFY `IdDetalle` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `detalleinternacional`
--
ALTER TABLE `detalleinternacional`
  MODIFY `IdDetalle` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `detallenacional`
--
ALTER TABLE `detallenacional`
  MODIFY `IdDetalle` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `detalleobjetos`
--
ALTER TABLE `detalleobjetos`
  MODIFY `IdDetalle` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `detallepruebacumplimiento`
--
ALTER TABLE `detallepruebacumplimiento`
  MODIFY `IdDetalle` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `detallepruebasustantiva`
--
ALTER TABLE `detallepruebasustantiva`
  MODIFY `IdDetalle` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `empresa`
--
ALTER TABLE `empresa`
  MODIFY `IdEmpresa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `entrevistas`
--
ALTER TABLE `entrevistas`
  MODIFY `IdEntrevista` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `marcoinstitucional`
--
ALTER TABLE `marcoinstitucional`
  MODIFY `IdInstitucional` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `marcointernacional`
--
ALTER TABLE `marcointernacional`
  MODIFY `IdInternacional` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `marconacional`
--
ALTER TABLE `marconacional`
  MODIFY `IdNacional` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `objetoauditable`
--
ALTER TABLE `objetoauditable`
  MODIFY `IdObjeto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `planes`
--
ALTER TABLE `planes`
  MODIFY `IdPlan` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `planificacion`
--
ALTER TABLE `planificacion`
  MODIFY `IdPlanificacion` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `pruebacumplimiento`
--
ALTER TABLE `pruebacumplimiento`
  MODIFY `IdPrueba` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `pruebasustantiva`
--
ALTER TABLE `pruebasustantiva`
  MODIFY `IdPrueba` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `riesgos`
--
ALTER TABLE `riesgos`
  MODIFY `IdRiesgo` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `rol`
--
ALTER TABLE `rol`
  MODIFY `IdRol` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `rubro`
--
ALTER TABLE `rubro`
  MODIFY `IdRubro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `activos`
--
ALTER TABLE `activos`
  ADD CONSTRAINT `R_20` FOREIGN KEY (`IdAuditoria`) REFERENCES `auditoria` (`IdAuditoria`);

--
-- Filtros para la tabla `auditoria`
--
ALTER TABLE `auditoria`
  ADD CONSTRAINT `R_4` FOREIGN KEY (`IdEmpresa`) REFERENCES `empresa` (`IdEmpresa`),
  ADD CONSTRAINT `R_7` FOREIGN KEY (`IdAuditor`) REFERENCES `auditor` (`IdAuditor`);

--
-- Filtros para la tabla `detallearchivos`
--
ALTER TABLE `detallearchivos`
  ADD CONSTRAINT `R_16` FOREIGN KEY (`IdAuditoria`) REFERENCES `auditoria` (`IdAuditoria`);

--
-- Filtros para la tabla `detalleauditores`
--
ALTER TABLE `detalleauditores`
  ADD CONSTRAINT `R_17` FOREIGN KEY (`IdRol`) REFERENCES `rol` (`IdRol`),
  ADD CONSTRAINT `R_5` FOREIGN KEY (`IdAuditor`) REFERENCES `auditor` (`IdAuditor`),
  ADD CONSTRAINT `R_6` FOREIGN KEY (`IdAuditoria`) REFERENCES `auditoria` (`IdAuditoria`);

--
-- Filtros para la tabla `detalleinstitucional`
--
ALTER TABLE `detalleinstitucional`
  ADD CONSTRAINT `R_12` FOREIGN KEY (`IdAuditoria`) REFERENCES `auditoria` (`IdAuditoria`),
  ADD CONSTRAINT `R_15` FOREIGN KEY (`IdInstitucional`) REFERENCES `marcoinstitucional` (`IdInstitucional`);

--
-- Filtros para la tabla `detalleinternacional`
--
ALTER TABLE `detalleinternacional`
  ADD CONSTRAINT `R_10` FOREIGN KEY (`IdAuditoria`) REFERENCES `auditoria` (`IdAuditoria`),
  ADD CONSTRAINT `R_13` FOREIGN KEY (`IdInternacional`) REFERENCES `marcointernacional` (`IdInternacional`);

--
-- Filtros para la tabla `detallenacional`
--
ALTER TABLE `detallenacional`
  ADD CONSTRAINT `R_11` FOREIGN KEY (`IdAuditoria`) REFERENCES `auditoria` (`IdAuditoria`),
  ADD CONSTRAINT `R_14` FOREIGN KEY (`IdNacional`) REFERENCES `marconacional` (`IdNacional`);

--
-- Filtros para la tabla `detalleobjetos`
--
ALTER TABLE `detalleobjetos`
  ADD CONSTRAINT `R_8` FOREIGN KEY (`IdObjeto`) REFERENCES `objetoauditable` (`IdObjeto`),
  ADD CONSTRAINT `R_9` FOREIGN KEY (`IdAuditoria`) REFERENCES `auditoria` (`IdAuditoria`);

--
-- Filtros para la tabla `detallepruebacumplimiento`
--
ALTER TABLE `detallepruebacumplimiento`
  ADD CONSTRAINT `detallepruebacumplimiento_ibfk_1` FOREIGN KEY (`IdPrueba`) REFERENCES `pruebacumplimiento` (`IdPrueba`);

--
-- Filtros para la tabla `detallepruebasustantiva`
--
ALTER TABLE `detallepruebasustantiva`
  ADD CONSTRAINT `detallepruebasustantiva_ibfk_1` FOREIGN KEY (`IdPrueba`) REFERENCES `pruebasustantiva` (`IdPrueba`);

--
-- Filtros para la tabla `empresa`
--
ALTER TABLE `empresa`
  ADD CONSTRAINT `R_3` FOREIGN KEY (`IdRubro`) REFERENCES `rubro` (`IdRubro`);

--
-- Filtros para la tabla `entrevistas`
--
ALTER TABLE `entrevistas`
  ADD CONSTRAINT `R_22` FOREIGN KEY (`IdAuditoria`) REFERENCES `auditoria` (`IdAuditoria`);

--
-- Filtros para la tabla `planes`
--
ALTER TABLE `planes`
  ADD CONSTRAINT `R_23` FOREIGN KEY (`IdAuditoria`) REFERENCES `auditoria` (`IdAuditoria`),
  ADD CONSTRAINT `R_24` FOREIGN KEY (`IdAuditor`) REFERENCES `auditor` (`IdAuditor`);

--
-- Filtros para la tabla `planificacion`
--
ALTER TABLE `planificacion`
  ADD CONSTRAINT `R_21` FOREIGN KEY (`IdAuditoria`) REFERENCES `auditoria` (`IdAuditoria`);

--
-- Filtros para la tabla `pruebacumplimiento`
--
ALTER TABLE `pruebacumplimiento`
  ADD CONSTRAINT `pruebacumplimiento_ibfk_1` FOREIGN KEY (`IdAuditoria`) REFERENCES `auditoria` (`IdAuditoria`);

--
-- Filtros para la tabla `pruebasustantiva`
--
ALTER TABLE `pruebasustantiva`
  ADD CONSTRAINT `pruebasustantiva_ibfk_1` FOREIGN KEY (`IdAuditor`) REFERENCES `auditor` (`IdAuditor`),
  ADD CONSTRAINT `pruebasustantiva_ibfk_2` FOREIGN KEY (`IdPregunta`) REFERENCES `detallepruebacumplimiento` (`IdDetalle`);

--
-- Filtros para la tabla `riesgos`
--
ALTER TABLE `riesgos`
  ADD CONSTRAINT `R_19` FOREIGN KEY (`IdActivo`) REFERENCES `activos` (`IdActivo`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
