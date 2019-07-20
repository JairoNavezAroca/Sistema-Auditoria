<?php 
	include("..//conexion.php");

/*
	1
	NombreEmpresa
	Rubros
	Mision
	Vision
	Estrategias
	Ubicacion
	Organigrama

	2
	Titulo
	Motivos
	ObjetosAuditables

	3
	JefeId
	EquipoAuditor

	4
	MarcosInternacionales

	5
	MarcosNacionales

	6
	Mof
	Rof
*/

	$IdEmpresa = $_POST['IdEmpresa'];
	$NombreEmpresa = $_POST['NombreEmpresa'];
	$Rubro = $_POST['Rubro'];
	$Mision = $_POST['Mision'];
	$Vision = $_POST['Vision'];
	$Estrategias = $_POST['Estrategias'];
	$Ubicacion = $_POST['Ubicacion'];
	$Organigrama = $_POST['Organigrama'];

	$Titulo = $_POST['Titulo'];
	$Motivos = $_POST['Motivos'];
	$ObjetosAuditables = $_POST['ObjetosAuditables'];

	$JefeId = $_POST['JefeId'];
	//$JefeId = 1; // id del jefe auditor
	$IdAuditor = $JefeId; // id del jefe auditor
	$EquipoAuditor = $_POST['EquipoAuditor'];

	$MarcosInternacionales = $_POST['MarcosInternacionales'];

	$MarcosNacionales = $_POST['MarcosNacionales'];

/*
	$Mof = $_POST['Mof'];
	$Rof = $_POST['Rof'];
*/

	if ($IdEmpresa == -1){
		$sql = 'insert into empresa(Nombre, Mision, Vision, Estrategias, Ubicacion, Organigrama, IdRubro) values';
		$sql = "$sql ('$NombreEmpresa', '$Mision', '$Vision', '$Estrategias', '$Ubicacion', '$Organigrama',$Rubro)";
		$conexion->query($sql);
		$IdEmpresa = ultimoId('select max(IdEmpresa) from empresa');
	}

	$sql = 'insert into auditoria(Titulo,Motivos,IdEmpresa,IdAuditor) values';
	$sql = "$sql ('$Titulo','$Motivos',$IdEmpresa,$IdAuditor)";
	$conexion->query($sql);
	$IdAuditoria = ultimoId('select max(IdAuditoria) from auditoria');

	for ($i=0; $i < count($ObjetosAuditables); $i++) { 
		$sql = 'insert into detalleObjetos(IdAuditoria, IdObjeto) values';
		$sql = "$sql ($IdAuditoria,$ObjetosAuditables[$i])";
		$conexion->query($sql);
	}

	for ($i=0; $i < count($EquipoAuditor); $i++) { 
		$sql = 'insert into detalleAuditores(IdAuditoria, IdAuditor) values';
		$sql = "$sql ($IdAuditoria,$EquipoAuditor[$i])";
		$conexion->query($sql);
	}

	for ($i=0; $i < count($MarcosInternacionales); $i++) { 
		$sql = 'insert into detalleInternacional(IdAuditoria, IdInternacional) values';
		$sql = "$sql ($IdAuditoria,$MarcosInternacionales[$i])";
		$conexion->query($sql);
	}

	for ($i=0; $i < count($MarcosNacionales); $i++) { 
		$sql = 'insert into detalleNacional(IdAuditoria, IdNacional) values';
		$sql = "$sql ($IdAuditoria,$MarcosNacionales[$i])";
		$conexion->query($sql);
	}

	function ultimoId($consulta){
		include("..//conexion.php");
		$res = $conexion->query($consulta);
		$id = mysqli_fetch_row($res)[0];
		return $id;
	}
	
	header ("Location: ../PanelAdmin/main.php");
 ?>
