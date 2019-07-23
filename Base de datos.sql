drop database if exists SistemaAuditoria;

create database SistemaAuditoria;

use SistemaAuditoria;

/*
	 PRIMARY KEY AUTO_INCREMENT
*/




CREATE TABLE Activos
(
	IdActivo             int NOT NULL PRIMARY KEY AUTO_INCREMENT,
	Descripcion          text NULL,
	Importancia          text NULL,
	IdAuditoria          int NOT NULL,
	Nombre               VARCHAR(100) NULL
);

CREATE TABLE Auditor
(
	IdAuditor            int NOT NULL PRIMARY KEY AUTO_INCREMENT,
	Apellidos            varchar(50) NULL,
	Nombres              varchar(50) NULL,
	Perfil               text NULL,
	Celular              varchar(25) null
);



CREATE TABLE Auditoria
(
	IdAuditoria          int NOT NULL PRIMARY KEY AUTO_INCREMENT,
	Titulo               text NULL,
	Motivos              text NULL,
	IdEmpresa            int NOT NULL,
	IdAuditor            int NULL
);



CREATE TABLE DetalleArchivos
(
	IdAuditoria          int NOT NULL,
	IdDetalle            int NOT NULL PRIMARY KEY AUTO_INCREMENT,
	Nombre               varchar(200) NULL,
	Ruta                 varchar(300) NULL
);


CREATE TABLE DetalleAuditores
(
	IdDetalle            int NOT NULL PRIMARY KEY AUTO_INCREMENT,
	IdAuditor            int NULL,
	IdAuditoria          int NULL,
	IdRol                int NULL
);


CREATE TABLE DetalleInstitucional
(
	IdDetalle            int NOT NULL PRIMARY KEY AUTO_INCREMENT,
	IdAuditoria          int NULL,
	IdInstitucional      int NULL
);



CREATE TABLE DetalleInternacional
(
	IdDetalle            int NOT NULL PRIMARY KEY AUTO_INCREMENT,
	IdAuditoria          int NULL,
	IdInternacional      int NULL
);




CREATE TABLE DetalleNacional
(
	IdDetalle            int NOT NULL PRIMARY KEY AUTO_INCREMENT,
	IdAuditoria          int NULL,
	IdNacional           int NULL
);




CREATE TABLE DetalleObjetos
(
	IdDetalle            int NOT NULL PRIMARY KEY AUTO_INCREMENT,
	IdObjeto             int NULL,
	IdAuditoria          int NULL
);




CREATE TABLE Empresa
(
	IdEmpresa            int NOT NULL PRIMARY KEY AUTO_INCREMENT,
	Nombre               text NULL,
	Mision               text NULL,
	Vision               text NULL,
	Estrategias          text NULL,
	Ubicacion            text NULL,
	Organigrama          text NULL,
	IdRubro              int NOT NULL
);



CREATE TABLE Entrevistas
(
	IdEntrevista         int NOT NULL PRIMARY KEY AUTO_INCREMENT,
	Nombres              varchar(50) NULL,
	Cargo                varchar(50) NULL,
	Fecha                date NULL,
	IdAuditoria          int NOT NULL
);



CREATE TABLE MarcoInstitucional
(
	IdInstitucional      int NOT NULL PRIMARY KEY AUTO_INCREMENT,
	Codigo               text NULL,
	Detalle              text NULL
);



CREATE TABLE MarcoInternacional
(
	IdInternacional      int NOT NULL PRIMARY KEY AUTO_INCREMENT,
	Detalle              text NULL,
	Codigo               text NULL
);



CREATE TABLE MarcoNacional
(
	IdNacional           int NOT NULL PRIMARY KEY AUTO_INCREMENT,
	Codigo               text NULL,
	Detalle              text NULL
);





CREATE TABLE ObjetoAuditable
(
	IdObjeto             int NOT NULL PRIMARY KEY AUTO_INCREMENT,
	Descripcion          varchar(50) NULL
);





CREATE TABLE Planes
(
	IdPlan               int NOT NULL PRIMARY KEY AUTO_INCREMENT,
	Descripcion          varchar(100) NULL,
	FInicio              date NULL,
	FTermino             date NULL,
	Horas                int NULL,
	IdAuditoria          int NOT NULL,
	IdAuditor            int NOT NULL
);




CREATE TABLE Planificacion
(
	IdAuditoria          int NOT NULL,
	IdPlanificacion      int NOT NULL PRIMARY KEY AUTO_INCREMENT,
	ObjGeneral           text NULL,
	ObjEspecifico        text NULL,
	Alcance              text NULL,
	Realizar             text NULL,
	NoRealizar           text NULL,
	Limitaciones         text NULL
);



CREATE TABLE Riesgos
(
	IdRiesgo             int NOT NULL PRIMARY KEY AUTO_INCREMENT,
	IdActivo             int NOT NULL,
	IdAuditoria          int NOT NULL,
	Amenazas             text NULL,
	Impacto              text NULL,
	Probabilidad         float NULL
);




CREATE TABLE Rol
(
	IdRol                int NOT NULL PRIMARY KEY AUTO_INCREMENT,
	Descripcion          text NULL
);



CREATE TABLE Rubro
(
	IdRubro              int NOT NULL PRIMARY KEY AUTO_INCREMENT,
	Descripcion          varchar(50) NULL
);




CREATE TABLE PruebaCumplimiento
(
	IdPrueba 			int NOT NULL PRIMARY KEY AUTO_INCREMENT,
	IdAuditoria			int NOT NULL,
	FechaRegistro		datetime  default NOW(),
	Nombre 				text NOT NULL,
	Normas				text,
	FOREIGN KEY (IdAuditoria) REFERENCES Auditoria(IdAuditoria)
);


CREATE TABLE DetallePruebaCumplimiento
(
	IdDetalle 		int NOT NULL PRIMARY KEY AUTO_INCREMENT,
	IdPrueba 		int NOT NULL,
	Pregunta		text,
	Norma           text,
	Respuesta		boolean,
	FOREIGN KEY (IdPrueba) REFERENCES PruebaCumplimiento(IdPrueba)
);

CREATE TABLE PruebaCumplimientoRealizada
(
	IdPruebaRealizada int NOT NULL PRIMARY KEY AUTO_INCREMENT,
	Auditado	text,
	FechaEjecucion	datetime,
	institucion 	text,
	IdPrueba 		int,
	FOREIGN KEY (IdPrueba) REFERENCES PruebaCumplimiento(IdPrueba)
);

CREATE TABLE DetallePruebaCumplimientoRealizada
(
	IdDetallePR 	int NOT NULL PRIMARY KEY AUTO_INCREMENT,
	IdPruebaRealizada int NOT NULL,
	IdPregunta		int,
	Respuesta		boolean,
	Observacion 	text,
	FOREIGN KEY (IdPruebaRealizada) REFERENCES PruebaCumplimientoRealizada(IdPruebaRealizada),
	FOREIGN KEY (IdPregunta) REFERENCES DetallePruebaCumplimiento(IdDetalle)
);

CREATE TABLE PruebaSustantiva
(
	IdPrueba 		int NOT NULL PRIMARY KEY AUTO_INCREMENT,
	IdAuditor 		int NOT NULL,
	IdPregunta 		int NOT NULL,
	Nombre 			varchar(100),
	Resultado		boolean,
	FOREIGN KEY (IdAuditor) REFERENCES Auditor(IdAuditor),
	FOREIGN KEY (IdPregunta) REFERENCES DetallePruebaCumplimiento(IdDetalle)
);

CREATE TABLE DetallePruebaSustantiva
(
	IdDetalle 				int NOT NULL PRIMARY KEY AUTO_INCREMENT,
	IdPrueba				int,
	Descripcion 			varchar(100),
	Resultado				boolean,
	FOREIGN KEY (IdPrueba) REFERENCES PruebaSustantiva(IdPrueba)

);




use SistemaAuditoria;


ALTER TABLE Activos
ADD FOREIGN KEY R_20 (IdAuditoria) REFERENCES Auditoria (IdAuditoria);



ALTER TABLE Auditoria
ADD FOREIGN KEY R_4 (IdEmpresa) REFERENCES Empresa (IdEmpresa);



ALTER TABLE Auditoria
ADD FOREIGN KEY R_7 (IdAuditor) REFERENCES Auditor (IdAuditor);



ALTER TABLE DetalleArchivos
ADD FOREIGN KEY R_16 (IdAuditoria) REFERENCES Auditoria (IdAuditoria);



ALTER TABLE DetalleAuditores
ADD FOREIGN KEY R_5 (IdAuditor) REFERENCES Auditor (IdAuditor);



ALTER TABLE DetalleAuditores
ADD FOREIGN KEY R_6 (IdAuditoria) REFERENCES Auditoria (IdAuditoria);



ALTER TABLE DetalleAuditores
ADD FOREIGN KEY R_17 (IdRol) REFERENCES Rol (IdRol);



ALTER TABLE DetalleInstitucional
ADD FOREIGN KEY R_12 (IdAuditoria) REFERENCES Auditoria (IdAuditoria);



ALTER TABLE DetalleInstitucional
ADD FOREIGN KEY R_15 (IdInstitucional) REFERENCES MarcoInstitucional (IdInstitucional);



ALTER TABLE DetalleInternacional
ADD FOREIGN KEY R_10 (IdAuditoria) REFERENCES Auditoria (IdAuditoria);



ALTER TABLE DetalleInternacional
ADD FOREIGN KEY R_13 (IdInternacional) REFERENCES MarcoInternacional (IdInternacional);



ALTER TABLE DetalleNacional
ADD FOREIGN KEY R_11 (IdAuditoria) REFERENCES Auditoria (IdAuditoria);



ALTER TABLE DetalleNacional
ADD FOREIGN KEY R_14 (IdNacional) REFERENCES MarcoNacional (IdNacional);



ALTER TABLE DetalleObjetos
ADD FOREIGN KEY R_8 (IdObjeto) REFERENCES ObjetoAuditable (IdObjeto);



ALTER TABLE DetalleObjetos
ADD FOREIGN KEY R_9 (IdAuditoria) REFERENCES Auditoria (IdAuditoria);



ALTER TABLE Empresa
ADD FOREIGN KEY R_3 (IdRubro) REFERENCES Rubro (IdRubro);



ALTER TABLE Entrevistas
ADD FOREIGN KEY R_22 (IdAuditoria) REFERENCES Auditoria (IdAuditoria);



ALTER TABLE Planes
ADD FOREIGN KEY R_23 (IdAuditoria) REFERENCES Auditoria (IdAuditoria);



ALTER TABLE Planes
ADD FOREIGN KEY R_24 (IdAuditor) REFERENCES Auditor (IdAuditor);



ALTER TABLE Planificacion
ADD FOREIGN KEY R_21 (IdAuditoria) REFERENCES Auditoria (IdAuditoria);



ALTER TABLE Riesgos
ADD FOREIGN KEY R_19 (IdActivo) REFERENCES Activos (IdActivo);





CREATE TABLE Estrategias
(
	IdEmpresa int,
	estrategia text,
	FOREIGN KEY (IdEmpresa) REFERENCES Empresa(IdEmpresa)
);

CREATE TABLE Organigrama
(
	IdEmpresa int,
	link text,
	descripcion text,
	FOREIGN KEY (IdEmpresa) REFERENCES Empresa(IdEmpresa)
);




use SistemaAuditoria;

INSERT INTO `auditor` (`IdAuditor`, `Apellidos`, `Nombres`, `Perfil`,`Celular`) VALUES
(1, 'Navez Aroca', 'Jairo', 'Conocimiento del uso de la herramienta XPCSPYP.exe;Conocimiento en elaboración de inventarios con la herramienta OCS Inventory.;Proactivo.','956504624'),
(2, 'Briceño Montaño', 'Javier', 'Conocimiento en elaboración y ejecución de proyectos.;Conocimiento en ejecución de inventariado físico.;Proactivo.;Conocimiento en funcionamiento de aplicaciones ofimáticas.','981559813'),
(3, 'Olivares Ruiz', 'Cintia', 'Conocimiento de normas y leyes para el licenciamiento de software;Conocimiento en reglamento y funciones de entidades públicas.;Proactivo.','942419208'),
(4, 'Argomedo de la Cruz', 'Jhon', 'Conocimiento de funcionalidades de aplicaciones ofimáticas.;Conocimiento en elaboración de informes y cronogramas de trabajo.;Proactivo.;','942419208');


insert into Rubro(Descripcion) values
	('Educacion'),
	('Informática'),
	('Adminsitración'),
	('Inmoviliaria');


insert into ObjetoAuditable(Descripcion) values
	('Software Ofimático'),
	('Seguridad de la información'),
	('Sistemas de la información'),
	('Redes');

insert into Rol(Descripcion) values
	('Especialista en Redes de Datos'),
	('Especialista en Bases de Datos'),
	('Especialista en Cableado Estructurado'),
	('Especialista en Seguridad Informática'),
	('Especialista en Data Warehouse'),
	('Especialista en Ofimática'),
	('Especialista en Gestión de Proyectos'),
	('Especialista en Legislación Informática'),
	('Especialista en Ofimática'),
	('Especialista en uso herramientas computacionales');





INSERT INTO `empresa` (`IdEmpresa`, `Nombre`, `Mision`, `Vision`, `Estrategias`, `Ubicacion`, `Organigrama`, `IdRubro`) VALUES
(1, 'Colegio de Alto Rendimiento - La Libertad', 'Ser una institución educativa con estándares internacionales de acreditación que consoliden el modelo educativo propio de la red de Colegios de Alto Rendimiento, sirviendo de referente de calidad académica, organizacional y de gestión en la región, que contribuya a mejorar la educación pública como base del desarrollo nacional y mundial.', 'Somos una institución educativa pública acreditada, parte de la Red de Colegios de Alto Rendimiento, que sobre la base del Programa Diploma del Bachillerato Internacional, fortalece las competencias personales, académicas y socioemocionales de estudiantes de alto desempeño, con miras a forjar ciudadanos íntegros y líderes comprometidos con el desarrollo del país y del mundo.', 'Educar a los alumnos bajo una guía basada en los diversos estándares internacionales con la finalidad de formar alumnos con competencias académicas y socioemocionales, y profesionalmente preparados para el futuro del mañana.\r\nOfrecer un servicio responsable y oportuno.\r\nSer un equipo integrado, donde se desarrolle un trabajo eficiente entre los miembros de la institución.', 'La institución se encuentra a unos 15 minutos de viaje desde la ciudad de Virú, sus alrededores son poco poblados y está parcialmente aislado de las actividades de la ciudad. La ubicación de esta institución favorece a sus objetivos institucionales, ya que al funcionar como internado, es conveniente alejar a los estudiantes de posibles distracciones y peligros existentes en la ciudad.', '', 1);


INSERT INTO Estrategias(IdEmpresa,estrategia) VALUES
(1,'Educar a los alumnos bajo una guía basada en los diversos estándares internacionales con la finalidad de formar alumnos con competencias académicas y socioemocionales, y profesionalmente preparados para el futuro del mañana.'),
(1,'Ofrecer un servicio responsable y oportuno.'),
(1,'Ser un equipo integrado, donde se desarrolle un trabajo eficiente entre los miembros de la institución.');

INSERT INTO Organigrama(IdEmpresa,link,descripcion) VALUES
	(1,'','En la estructura departamental de la institución no existe un área específica que administre los sistemas de información y/o tecnologías de la información. Por tanto cada departamento es independiente en  administrar y dar soporte a sus aplicaciones ofimáticas, asimismo controlar los recursos de hardware que utilizan. 
La inexistencia de un departamento de TI no favorece el cumplimiento de los objetivos institucionales.
');


insert into Auditoria(IdEmpresa,IdAuditor,Titulo,Motivos) values (1,1,'Auditoria ofimática al departamento de Bienestar Estudiantil del Colegio de Alto Rendimiento de la Libertad','Geográficamente, el Colegio de Alto Rendimiento de La Libertad, se encuentra ubicado en el campamento San José, provincia de Virú, departamento de La Libertad
Desde la fundación del colegio de alto rendimiento de la libertad en el campamento San José el año 2015  la gestión de inventario, las adquisiciones de aplicaciones ofimáticas y sus respectivas licencias no han llevado un correcto control dentro de la institución, por lo que dicha institución requiere una auditoría para verificar si los procesos actuales cumplen con los objetivos que se plantea el colegio.
Este colegio, cuenta con diversos departamentos: Bienestar y Desarrollo del Estudiante, Tópico, Académica, Biblioteca y Asistencia Social. Esta auditoria se realizará en el departamento de Bienestar estudiantil ya que maneja muchos procesos relacionados al alumno, como lo son: recopilar información del alumno, de sus padres y de su entorno en general, además de otros datos como los datos de su colegio de origen, entre otros. Asimismo, se encarga de velar por el bienestar integral del alumno, teniendo varias oficinas que comparten información, y desempeñan diferentes funciones (Oficina de Psicología, Oficina de Servicio Social, Oficina de Tutoría, Oficina de convivencia escolar). 
Las aplicaciones ofimáticas del área de Bienestar estudiantil manejan información de mucha importancia para la entidad educativa, pero dada la complejidad de insertar grandes cantidades de datos en dichas aplicaciones, estos son administrados de forma física (reportes, fichas y archivos) y digital (documentos administrados en hojas de cálculo), siendo el punto referencial de selección la importancia y frecuencia de utilización de los mismos.
El ambiente en donde funciona el área de Bienestar estudiantil, así como sus diversas oficinas presentan ciertas limitaciones de espacio, y las computadoras utilizadas en dicho ambiente pueden no estar en un lugar adecuado. Asimismo, el proceso de trasladar información desde un área a otra se dificulta debido al mal manejo en el almacenamiento de información.');




insert into MarcoInternacional(Codigo, Detalle) values
	('APO13.02','Definir y gestionar un plan de tratamiento del riesgo de la seguridad de la información.'),
	('EDM04.01','Examinar y evaluar continuamente la necesidad actual y futura de los recursos relacionados con TI, las opciones para la asignación de recursos (incluyendo estrategias de aprovisionamiento) y los principios de asignación y gestión para cumplir de manera óptima con las necesidades de la empresa.'),
	('DSS04','Gestionar la continuidad'),
	('IEEE 1062:1998','En este estándar se describe una práctica que puede ser utilizada para la adquisición de cualquier producto de software, para cualquier tipo de plataforma computacional, independiente de su tamaño y complejidad.'),
	('Modelo CMMI-ACQ','El Modelo CMMI – ACQ está diseñado especialmente para las organizaciones que adquieren software y servicios correlacionados. Proporciona una orientación para gestionar los proyectos relacionados con la adquisición de productos y servicios.');




insert into DetalleInternacional(IdAuditoria,IdInternacional) values
	(1,2),
	(1,3),
	(1,4);

insert into MarcoNacional(Codigo, Detalle) values
	('NTP-ISO/IEC 17799','Tecnología de Información.Código de Buenas prácticas para la gestión de Seguridad.'),
	('DECRETO SUPREMO Nº 013-2003-PCM','Dictan medidas para garantizar la legalidad de la adquisición de programas de software en entidades y dependencias del Sector Público. Asimismo, dicta directrices para el correcto inventariado de software.'),
	('DECRETO SUPREMO Nº 026-2016-PCM/La ley Nº 27269','Ley de firmas y certificados digitales. Nos permitirá evaluar que las licencias de las aplicaciones adquiridas sean legales.'),
	('Resolución Nª 039-98/SBN','Ofrece las directrices para una correcta planeación y ejecución de inventariado de muebles físicos que posee una entidad del estado peruano.'),
	('Resolución Nª 158-97','Para poder identificar los tipos de bienes que pueden ser inventariados, así como las características que deben de tener.');

insert into DetalleNacional(IdAuditoria,IdNacional) values
	(1,1),
	(1,2),
	(1,3),
	(1,4),
	(1,5);


INSERT INTO `activos` (`IdActivo`, `Descripcion`, `Importancia`, `IdAuditoria`, `Nombre`) VALUES
(1, 'Computadoras usadas para la gestión de información del jefe de departamento.', 'Computadoras usadas para la gestión de información del jefe de departamento.', 1, 'Computadoras HP – Intel Corei3 – 4 gb RAM'),
(2, 'Computadoras usadas para el desarrollo de las actividades laborales del personal de las diferentes o', 'Computadoras usadas para el desarrollo de las actividades laborales del personal de las diferentes o', 1, 'Computadoras DELL – Intel Corei3 – 4 gb RAM'),
(3, 'Paquete de aplicaciones ofimáticas para la gestión de información.', 'Paquete de aplicaciones ofimáticas para la gestión de información.', 1, 'Microsoft Office 2016 Professional');

--
-- Volcado de datos para la tabla `riesgos`
--

INSERT INTO `riesgos` (`IdRiesgo`, `IdActivo`, `IdAuditoria`, `Amenazas`, `Impacto`, `Probabilidad`) VALUES
(1, 1, 1, 'Virus informáticos descargados de internet.\r\nLa no centralización de la información.', 'Posible pérdida de información ya que los archivos donde se registran los datos pueden ser eliminado', 65),
(2, 2, 1, 'Virus informáticos descargados de internet.\r\nLa no centralización de la información.', 'Posible pérdida de información ya que los archivos donde se registran los datos pueden ser eliminado', 70);


INSERT INTO `planificacion` (`IdAuditoria`, `IdPlanificacion`, `ObjGeneral`, `ObjEspecifico`, `Alcance`, `Realizar`, `NoRealizar`, `Limitaciones`) VALUES
(1, 1, 'Determinar mediante evidencias si se está ejecutando un correcto control y uso de las aplicaciones ofimáticas dentro del departamento de Bienestar estudiantil del Colegio de Alto Rendimiento de la Libertad (COAR) .', 'Comprobar el correcto control de inventario físico.\r\nComprobar el correcto control de inventario de licencias de software.\r\nVerificar la correcta asignación, tanto de las aplicaciones ofimáticas como del hardware, dependiendo del tipo de función que desarrollarán.\r\nVerificar que el ambiente donde se encuentra los recursos informáticos es el adecuado para su buena utilización y aprovechamiento de estos.', 'La presente auditoria solo evaluará los procesos y actividades dentro del departamento de Bienestar Estudiantil del Colegio de Alto Rendimiento de La Libertad.\r\nLas oficinas del departamento de Bienestar Estudiantil involucradas en la auditoria serán la Oficina de Servicio Social, la Oficina de Convivencia Estudiantil y la oficina de Coordinación Psicopedagógica.\r\nSe buscará verificar la correcta utilización de las aplicaciones ofimáticas, así como del hardware, tomando en cuenta la función que deben cumplir.\r\nSe evaluará la necesidad actual y futura de recursos relacionados con TI basándonos en la norma EDM04.01.\r\nSe evaluará el correcto proceso de adquisición de software basándonos en las normas IEEE 1062:1998 y la norma CMMI-ACQ.\r\nSe valuará la correcta adquisición de licencias de software, así como el correcto inventariado de las mismas, bajo las directrices del decreto supremo Nº 013-2003-PCM y Nº 026-2016-PCM/La ley Nª 27269.\r\nSe evaluará el correcto inventariado de equipos físicos bajo el reglamento de la Resolución Nª 039-98/SBN, reglamento Para el Inventario Nacional de Bienes Muebles del Estado.\r\nSe identificarán los equipos de hardware que pueden ser inventariados bajo las reglas de la Resolución Nª 158-97/SBN Catálogo Nacional de Bienes Muebles del Estado.\r\n', 'Solo se verificará el cumplimiento de instrumentos de gestión (MOF y ROF) con respecto al departamento de Bienestar Estudiantil, normas y políticas que incidan en el control de inventarios.\r\nSe verificará la existencia del Plan de Inventariado de equipos físicos.\r\nSe verificará la existencia del Plan de Inventariado de licencias de Software.\r\nSe verificará la existencia del Plan para adquisiciones de Software.\r\nSe verificará la existencia de un Plan para la asignación de aplicaciones ofimáticas.\r\n', 'No se realizará ninguna corrección de la ubicación actual de los equipos computacionales.\r\nNo se cambiará o desinstalará las aplicaciones ofimáticas existentes.\r\nNo se elaborará ningún plan de adquisiciones de software ni otro que no existiera.\r\n', 'Existencia de políticas de seguridad en la institución que limitan el libre tránsito del equipo auditor por las oficinas del departamento de Bienestar estudiantil.\r\nLa ubicación de la institución auditada se encuentra a 3 horas de viaje desde la locación del equipo auditor.');




INSERT INTO `detalleobjetos` (`IdDetalle`, `IdObjeto`, `IdAuditoria`) VALUES
(1, 1, 1),
(2, 2, 1);



INSERT INTO `detalleauditores` (`IdDetalle`, `IdAuditor`, `IdAuditoria`, `IdRol`) VALUES
(1, 1, 1, 10),
(2, 2, 1, 7),
(3, 3, 1, 9),
(4, 4, 1, 8);


INSERT INTO `planes` (`IdPlan`, `Descripcion`, `FInicio`, `FTermino`, `Horas`, `IdAuditoria`, `IdAuditor`) VALUES
(1, 'Elaborar documento de los instrumentos de gestion', '2019-05-05', '2019-05-07', 2, 1, 1);
INSERT INTO `planes` (`IdPlan`, `Descripcion`, `FInicio`, `FTermino`, `Horas`, `IdAuditoria`, `IdAuditor`) VALUES
(2, 'Verificar la existencia de los instrumentos de gestión', '2019-05-08', '2019-07-09', 2, 1, 2);
INSERT INTO `planes` (`IdPlan`, `Descripcion`, `FInicio`, `FTermino`, `Horas`, `IdAuditoria`, `IdAuditor`) VALUES
(3, 'Elaborar y aplicar el checklist al personal', '2019-05-10', '2019-07-13', 2, 1, 2);
INSERT INTO `planes` (`IdPlan`, `Descripcion`, `FInicio`, `FTermino`, `Horas`, `IdAuditoria`, `IdAuditor`) VALUES
(4, 'Analizar y verificar el cumplimiento de los instrumentos de gestión', '2019-05-14', '2019-07-15', 2, 1, 3);
INSERT INTO `planes` (`IdPlan`, `Descripcion`, `FInicio`, `FTermino`, `Horas`, `IdAuditoria`, `IdAuditor`) VALUES
(5, 'Elaborar un documento de peticiòn para que autoricen la evaluaciòn del software', '2019-05-16', '2019-07-17', 2, 1, 1);
INSERT INTO `planes` (`IdPlan`, `Descripcion`, `FInicio`, `FTermino`, `Horas`, `IdAuditoria`, `IdAuditor`) VALUES
(6, 'verificar si el uso del software que usa la empresa es legitimo ', '2019-05-20', '2019-07-21', 2, 1, 4);


INSERT INTO `detallearchivos` (`IdAuditoria`, `IdDetalle`, `Nombre`, `Ruta`) VALUES
(1, 1, 'Informe de verificación de los instrumentos de Gestión (MOF)', NULL),
(1, 2, 'Informe de verificación de los instrumentos de Gestión (ROF)', NULL),
(1, 3, 'Informe de Evaluación de las aplicaciones ofimáticas(Documentación, Estructura y funcionalidades).', NULL),
(1, 4, 'Informe de evaluación del Inventario de Licencias de Software.', NULL),
(1, 5, 'Informe de evaluación del Inventario del equipo físico.', NULL),
(1, 6, 'Informe Corto de Auditoria (Borrador).', NULL),
(1, 7, 'Informe Detallado de Auditoria.', NULL);





INSERT INTO `pruebacumplimiento` (`IdPrueba`, `IdAuditoria`, `FechaRegistro`, `Nombre`, `Normas`) VALUES
(1, 1, '2019-07-22 18:17:57', 'Documentación de inventarios', 'DECRETO SUPREMO Nº 013-2003-PCM,Resolución Nª 039-98/SBN,Resolución Nª 158-97'),
(2, 1, '2019-07-22 18:20:20', 'Documentación de Licencia de Software', 'IEEE 1062:1998,DECRETO SUPREMO Nº 026-2016-PCM/La ley Nº 27269,DECRETO SUPREMO Nº 013-2003-PCM');

INSERT INTO `detallepruebacumplimiento` (`IdDetalle`, `IdPrueba`, `Pregunta`, `Norma`, `Respuesta`) VALUES
(1, 1, '¿Considera importante el establecimiento de políticas y estándares para la adquisición uso y control de recursos de hardware y aplicaciones en la institución?', 'DECRETO SUPREMO Nº 013-2003-PCM,', 1),
(2, 1, 'Con respecto a la pregunta anterior ¿La institución cuenta con esas políticas y estándares?', ',DECRETO SUPREMO Nº 013-2003-PCM,Resolución Nª 039-98/SBN,', 1),
(3, 1, ' ¿La institución cuenta con un plan de compras o adquisiciones de recursos informáticos?', ',Resolución Nª 158-97,', 1),
(4, 1, 'Explique cómo se lleva a cabo el proceso de compra de recursos informáticos para la institución', ',DECRETO SUPREMO Nº 013-2003-PCM,Resolución Nª 039-98/SBN,Resolución Nª 158-97,', 1),
(5, 1, 'La institución cuenta con mecanismos que garanticen el inventario de las adquisiciones de equipos', ',DECRETO SUPREMO Nº 013-2003-PCM,Resolución Nª 158-97,', 1),
(6, 1, '¿Cómo se realiza el proceso de actualización del inventario ofimático en la institución? descríbalo.', ',Resolución Nª 039-98/SBN,', 1),
(7, 1, '¿Participan activamente los usuarios en el proceso de actualización del inventario ofimático de la institución?', ',DECRETO SUPREMO Nº 013-2003-PCM,Resolución Nª 039-98/SBN,Resolución Nª 158-97,', 1),
(8, 1, '¿Se evalúan periódicamente los cambios de ubicación de los recursos informáticos de la institución?', ',DECRETO SUPREMO Nº 013-2003-PCM,Resolución Nª 039-98/SBN,', 1),
(9, 2, '¿El software fue adquirido con algún representante de la firma a la que pertenece?', 'DECRETO SUPREMO Nº 026-2016-PCM/La ley Nº 27269,', 1),
(10, 2, '¿La persona encargada de la instalación del software cuenta con la lista de licencias deseadas al equipo y departamento que corresponde? ', ',IEEE 1062:1998,DECRETO SUPREMO Nº 026-2016-PCM/La ley Nº 27269,', 1),
(11, 2, '¿El software que se utiliza para la cuestión operativa de la institución se actualiza o se hace cambio de versión cada cierto periodo de tiempo?', ',DECRETO SUPREMO Nº 013-2003-PCM,', 1),
(12, 2, '¿Se cuenta con alguna guía para saber el control de dichas licencias y en cómo se clasifica dentro de la empresa? ', ',DECRETO SUPREMO Nº 026-2016-PCM/La ley Nº 27269,DECRETO SUPREMO Nº 013-2003-PCM,', 1),
(13, 2, '¿Existe algún procedimiento de control para la adquisición y registro de licencias de software?', ',DECRETO SUPREMO Nº 026-2016-PCM/La ley Nº 27269,DECRETO SUPREMO Nº 013-2003-PCM,', 1),
(14, 2, '¿Se monitorea y/o supervisa el procedimiento mencionado en la pregunta anterior? ', ',DECRETO SUPREMO Nº 026-2016-PCM/La ley Nº 27269,DECRETO SUPREMO Nº 013-2003-PCM,', 1);


INSERT INTO `pruebasustantiva` (`IdPrueba`, `IdAuditor`, `IdPregunta`, `Nombre`, `Resultado`) VALUES
(1, 3, 3, 'Documentación de Licencia de Software 1 ', NULL),
(2, 2, 12, 'Documentación de Licencia de Software 2', NULL),
(3, 4, 9, 'Documentación de Licencia de Software 3', NULL),
(4, 1, 3, 'Documentación de Licencia de Software 4', NULL);

INSERT INTO `detallepruebasustantiva` (`IdDetalle`, `IdPrueba`, `Descripcion`, `Resultado`) VALUES
(1, 1, 'Verificar que exista un comité para la realización de inventario físico y de software', NULL),
(2, 1, 'Identificar los miembros que lo integran', NULL),
(3, 1, 'Verificar que exista un inventario de las adquisiciones físicas y de software', NULL),
(4, 1, 'Verificar que los inventarios sean actualizados con cada adquisición y de software', NULL),
(5, 2, 'Verificar la exitencia de la(s) guía(s)', NULL),
(6, 3, 'Verificar si existe un contrato por la compra del sofware', NULL),
(7, 3, 'Verificar si la fecha de contrato del sofware esta vigente', NULL),
(8, 3, 'Verificar si el sofware instalado en las computadoras es el mismo sofware contratado', NULL),
(9, 4, 'Verificar si existe un comité encargado de planear las compras o adquisiciones de recursos informati', NULL),
(10, 4, 'dentificar los mienbros que lo integran', NULL),
(11, 4, 'Verificar si hay programado un plan de posibles compras o adquisiciones de recursos informáticos', NULL);

