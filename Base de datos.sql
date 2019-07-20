drop database if exists SistemaAuditoria;
create database SistemaAuditoria;
use SistemaAuditoria;

/*
	 PRIMARY KEY AUTO_INCREMENT
*/




CREATE TABLE Activos
(
	IdActivo             int NOT NULL PRIMARY KEY AUTO_INCREMENT,
	Descripcion          VARCHAR(100) NULL,
	Importancia          VARCHAR(100) NULL,
	IdAuditoria          int NOT NULL,
	Nombre               VARCHAR(50) NULL
);

CREATE TABLE Auditor
(
	IdAuditor            int NOT NULL PRIMARY KEY AUTO_INCREMENT,
	Apellidos            varchar(50) NULL,
	Nombres              varchar(50) NULL,
	Perfil               varchar(30) NULL
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
	IdAuditoria          int NOT NULL PRIMARY KEY AUTO_INCREMENT,
	IdDetalle            int NOT NULL,
	Nombre               varchar(100) NULL,
	Ruta                 varchar(100) NULL
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



CREATE TABLE Entregables
(
	IdEntregable         int NOT NULL PRIMARY KEY AUTO_INCREMENT,
	Descripcion          text NULL,
	Documento            text NULL,
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
	Codigo               varchar(20) NULL,
	Detalle              varchar(100) NULL
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
	Amenazas             VARCHAR(100) NULL,
	Impacto              VARCHAR(100) NULL,
	Probabilidad         float NULL
);




CREATE TABLE Rol
(
	IdRol                int NOT NULL PRIMARY KEY AUTO_INCREMENT,
	Descripcion          varchar(100) NULL
);



CREATE TABLE Rubro
(
	IdRubro              int NOT NULL PRIMARY KEY AUTO_INCREMENT,
	Descripcion          varchar(20) NULL
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



ALTER TABLE Entregables
ADD FOREIGN KEY R_25 (IdAuditoria) REFERENCES Auditoria (IdAuditoria);



ALTER TABLE Planes
ADD FOREIGN KEY R_23 (IdAuditoria) REFERENCES Auditoria (IdAuditoria);



ALTER TABLE Planes
ADD FOREIGN KEY R_24 (IdAuditor) REFERENCES Auditor (IdAuditor);



ALTER TABLE Planificacion
ADD FOREIGN KEY R_21 (IdAuditoria) REFERENCES Auditoria (IdAuditoria);



ALTER TABLE Riesgos
ADD FOREIGN KEY R_19 (IdActivo) REFERENCES Activos (IdActivo);















use SistemaAuditoria;

insert into Rubro(Descripcion) values
	('Educacion'),
	('Informática'),
	('Adminsitración'),
	('Inmoviliaria');

insert into Auditor(Apellidos, Nombres, Perfil) values
	('Navez Aroca', 'Jairo','perfil 0001'),
	('Briceño Montaño', 'Javier','perfil 0020'),
	('Olivares Ruiz', 'Cintia','perfil 0300'),
	('Argomedo de la Cruz', 'Jhon','perfil 4000');

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
	('Especialista en Ofimática'),
	('Especialista en Data Warehouse'),
	('Especialista en Ofimática');


insert into MarcoInternacional(Codigo, Detalle) values
	('APO13.02','Definir y gestionar un plan de tratamiento del riesgo de la seguridad de la información.'),
	('EDM04.01','Examinar y evaluar continuamente la necesidad actual y futura de los recursos relacionados con TI, las opciones para la asignación de recursos (incluyendo estrategias de aprovisionamiento) y los principios de asignación y gestión para cumplir de manera óptima con las necesidades de la empresa.'),
	('DSS04','Gestionar la continuidad'),
	('IEEE 1062:1998','En este estándar se describe una práctica que puede ser utilizada para la adquisición de cualquier producto de software, para cualquier tipo de plataforma computacional, independiente de su tamaño y complejidad.'),
	('Modelo CMMI-ACQ','El Modelo CMMI – ACQ está diseñado especialmente para las organizaciones que adquieren software y servicios correlacionados. Proporciona una orientación para gestionar los proyectos relacionados con la adquisición de productos y servicios.');


insert into MarcoNacional(Codigo, Detalle) values
	('NTP-ISO/IEC 17799','Tecnología de Información.Código de Buenas prácticas para la gestión de Seguridad.'),
	('DECRETO SUPREMO Nº 013-2003-PCM','Dictan medidas para garantizar la legalidad de la adquisición de programas de software en entidades y dependencias del Sector Público. Asimismo, dicta directrices para el correcto inventariado de software.'),
	('DECRETO SUPREMO Nº 026-2016-PCM/La ley Nº 27269','Ley de firmas y certificados digitales. Nos permitirá evaluar que las licencias de las aplicaciones adquiridas sean legales.'),
	('Resolución Nª 039-98/SBN','Ofrece las directrices para una correcta planeación y ejecución de inventariado de muebles físicos que posee una entidad del estado peruano.'),
	('Resolución Nª 158-97','Para poder identificar los tipos de bienes que pueden ser inventariados, así como las características que deben de tener.');




insert into Empresa(IdRubro,Nombre,Mision,Vision,Estrategias,Ubicacion) values (1,'Colegio de Alto Rendimiento - La Libertad','Ser una institución educativa con estándares internacionales de acreditación que consoliden el modelo educativo propio de la red de Colegios de Alto Rendimiento, sirviendo de referente de calidad académica, organizacional y de gestión en la región, que contribuya a mejorar la educación pública como base del desarrollo nacional y mundial.','Somos una institución educativa pública acreditada, parte de la Red de Colegios de Alto Rendimiento, que sobre la base del Programa Diploma del Bachillerato Internacional, fortalece las competencias personales, académicas y socioemocionales de estudiantes de alto desempeño, con miras a forjar ciudadanos íntegros y líderes comprometidos con el desarrollo del país y del mundo.','* Educar a los alumnos bajo una guía basada en los diversos estándares internacionales con la finalidad de formar alumnos con competencias académicas y socioemocionales, y profesionalmente preparados para el futuro del mañana.
*Ofrecer un servicio responsable y oportuno.
*Ser un equipo integrado, donde se desarrolle un trabajo eficiente entre los miembros de la institución.','La institución se encuentra a unos 15 minutos de viaje desde la ciudad de Virú, sus alrededores son poco poblados y está parcialmente aislado de las actividades de la ciudad. La ubicación de esta institución favorece a sus objetivos institucionales, ya que al funcionar como internado, es conveniente alejar a los estudiantes de posibles distracciones y peligros existentes en la ciudad.');


insert into Auditoria(IdEmpresa,IdAuditor,Titulo,Motivos) values (1,1,'Auditoria ofimática al departamento de Bienestar Estudiantil del Colegio de Alto Rendimiento de la Libertad','Geográficamente, el Colegio de Alto Rendimiento de La Libertad, se encuentra ubicado en el campamento San José, provincia de Virú, departamento de La Libertad
Desde la fundación del colegio de alto rendimiento de la libertad en el campamento San José el año 2015  la gestión de inventario, las adquisiciones de aplicaciones ofimáticas y sus respectivas licencias no han llevado un correcto control dentro de la institución, por lo que dicha institución requiere una auditoría para verificar si los procesos actuales cumplen con los objetivos que se plantea el colegio.
Este colegio, cuenta con diversos departamentos: Bienestar y Desarrollo del Estudiante, Tópico, Académica, Biblioteca y Asistencia Social. Esta auditoria se realizará en el departamento de Bienestar estudiantil ya que maneja muchos procesos relacionados al alumno, como lo son: recopilar información del alumno, de sus padres y de su entorno en general, además de otros datos como los datos de su colegio de origen, entre otros. Asimismo, se encarga de velar por el bienestar integral del alumno, teniendo varias oficinas que comparten información, y desempeñan diferentes funciones (Oficina de Psicología, Oficina de Servicio Social, Oficina de Tutoría, Oficina de convivencia escolar). 
Las aplicaciones ofimáticas del área de Bienestar estudiantil manejan información de mucha importancia para la entidad educativa, pero dada la complejidad de insertar grandes cantidades de datos en dichas aplicaciones, estos son administrados de forma física (reportes, fichas y archivos) y digital (documentos administrados en hojas de cálculo), siendo el punto referencial de selección la importancia y frecuencia de utilización de los mismos.
El ambiente en donde funciona el área de Bienestar estudiantil, así como sus diversas oficinas presentan ciertas limitaciones de espacio, y las computadoras utilizadas en dicho ambiente pueden no estar en un lugar adecuado. Asimismo, el proceso de trasladar información desde un área a otra se dificulta debido al mal manejo en el almacenamiento de información.');




insert into DetalleInternacional(IdAuditoria,IdInternacional) values
	(1,2),
	(1,3),
	(1,4);

insert into DetalleNacional(IdAuditoria,IdNacional) values
	(1,1),
	(1,2),
	(1,3),
	(1,4),
	(1,5);

insert into DetalleObjetos(IdAuditoria,IdObjeto) values
	(1,1),
	(1,2);



insert into DetalleAuditores(IdAuditoria,IdAuditor) values
	(1,1),
	(1,2),
	(1,3),
	(1,4);


insert into Activos(IdAuditoria, Nombre, Descripcion, Importancia) values 
	(1, 'Computadoras HP – Intel Corei3 – 4 gb RAM', 'Computadoras usadas para la gestión de información del jefe de departamento', 'Importancia'),
	(1, 'Microsoft Office 2016 Professional', 'Paquete de aplicaciones ofimáticas para la gestión de información.', 'Importancia');

insert into Riesgos(IdAuditoria, IdActivo, Amenazas, Impacto, Probabilidad) values 
	(1, 1, 'Computadoras usadas para la gestión de información del jefe de departamento.', 'Computadoras usadas para la gestión de información del jefe de departamento.', '50'),
	(1, 2, 'Paquete de aplicaciones ofimáticas para la gestión de información.', 'Paquete de aplicaciones ofimáticas para la gestión de información.', '50');


insert into Planificacion(IdAuditoria, ObjGeneral, ObjEspecifico, Alcance, Realizar, NoRealizar, Limitaciones) values 
	(1, 'Determinar mediante evidencias si se está ejecutando un correcto control y uso de las aplicaciones ofimáticas dentro del departamento de Bienestar estudiantil del Colegio de Alto Rendimiento de la Libertad (COAR) .', 'a)Comprobar el correcto control de inventario físico. b)Comprobar el correcto control de inventario de licencias de software. c)Verificar la correcta asignación, tanto de las aplicaciones ofimáticas como del hardware, dependiendo del tipo de función que desarrollarán. d)Verificar que el ambiente donde se encuentra los recursos informáticos es el adecuado para su buena utilización y aprovechamiento de estos.', 'I.La presente auditoria solo evaluará los procesos y actividades dentro del departamento de Bienestar Estudiantil del Colegio de Alto Rendimiento de La Libertad. II.Las oficinas del departamento de Bienestar Estudiantil involucradas en la auditoria serán la Oficina de Servicio Social, la Oficina de Convivencia Estudiantil y la oficina de Coordinación Psicopedagógica. III.Se buscará verificar la correcta utilización de las aplicaciones ofimáticas, así como del hardware, tomando en cuenta la función que deben cumplir. IV.Se evaluará la necesidad actual y futura de recursos relacionados con TI basándonos en la norma EDM04.01. V. Se evaluará el correcto proceso de adquisición de software basándonos en las normas IEEE 1062:1998 y la norma CMMI-ACQ. VI. Se valuará la correcta adquisición de licencias de software, así como el correcto inventariado de las mismas, bajo las directrices del decreto supremo Nº 013-2003-PCM y Nº 026-2016-PCM/La ley Nª 27269. VII.Se evaluará el correcto inventariado de equipos físicos bajo el reglamento de la Resolución Nª 039-98/SBN, reglamento Para el Inventario Nacional de Bienes Muebles del Estado. VIII.Se identificarán los equipos de hardware que pueden ser inventariados bajo las reglas de la Resolución Nª 158-97/SBN Catálogo Nacional de Bienes Muebles del Estado.', 'Solo se verificará el cumplimiento de instrumentos de gestión (MOF y ROF) con respecto al departamento de Bienestar Estudiantil, normas y políticas que incidan en el control de inventarios. Se verificará la existencia del Plan de Inventariado de equipos físicos. Se verificará la existencia del Plan de Inventariado de licencias de Software. Se verificará la existencia del Plan para adquisiciones de Software. Se verificará la existencia de un Plan para la asignación de aplicaciones ofimáticas.', 'Solo se verificará el cumplimiento de instrumentos de gestión (MOF y ROF) con respecto al departamento de Bienestar Estudiantil, normas y políticas que incidan en el control de inventarios. No se cambiará o desinstalará las aplicaciones ofimáticas existentes. No se elaborará ningún plan de adquisiciones de software ni otro que no existiera.', 'Entre los distintos factores que limitan el desarrollo de nuestro proyecto podemos mencionar: Existencia de políticas de seguridad en la institución que limitan el libre tránsito del equipo auditor por las oficinas del departamento de Bienestar estudiantil. La ubicación de la institución auditada se encuentra a 3 horas de viaje desde la locación del equipo auditor.');



