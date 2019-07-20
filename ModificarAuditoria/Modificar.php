<?php 
	include("..//conexion.php");
	session_start();
	$IdAuditoria = $_SESSION['id'];

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

	$JefeNombre = $_POST['JefeNombre'];
	$JefeNombre = 2; // id del jefe auditor
	$IdAuditor = $JefeNombre; // id del jefe auditor
	$EquipoAuditor = $_POST['EquipoAuditor'];

	$MarcosInternacionales = $_POST['MarcosInternacionales'];

	$MarcosNacionales = $_POST['MarcosNacionales'];

/*
	$Mof = $_POST['Mof'];
	$Rof = $_POST['Rof'];
*/

	$IdEmpresa = obtener("select IdEmpresa from auditoria where IdAuditoria = $IdAuditoria");
	$sql = "update empresa set Nombre = '$NombreEmpresa', Mision = '$Mision', Vision = '$Vision', Estrategias = '$Estrategias', Ubicacion = '$Ubicacion', Organigrama = '$Organigrama', IdRubro = $Rubro where IdEmpresa = $IdEmpresa";
	echo $sql.'<br>';
	$conexion->query($sql);


	$sql = "update auditoria set Titulo = '$Titulo', Motivos = '$Motivos', IdAuditor = $IdAuditor where IdAuditoria = $IdAuditoria";
	echo $sql;
	$conexion->query($sql);





	$conexion->query("delete from detalleObjetos where IdAuditoria = $IdAuditoria");
	for ($i=0; $i < count($ObjetosAuditables); $i++) { 
		$sql = 'insert into detalleObjetos(IdAuditoria, IdObjeto) values';
		$sql = "$sql ($IdAuditoria,$ObjetosAuditables[$i])";
		$conexion->query($sql);
	}

	$conexion->query("delete from detalleAuditores where IdAuditoria = $IdAuditoria");
	for ($i=0; $i < count($EquipoAuditor); $i++) { 
		$sql = 'insert into detalleAuditores(IdAuditoria, IdAuditor) values';
		$sql = "$sql ($IdAuditoria,$EquipoAuditor[$i])";
		$conexion->query($sql);
	}

	$conexion->query("delete from detalleInternacional where IdAuditoria = $IdAuditoria");
	for ($i=0; $i < count($MarcosInternacionales); $i++) { 
		$sql = 'insert into detalleInternacional(IdAuditoria, IdInternacional) values';
		$sql = "$sql ($IdAuditoria,$MarcosInternacionales[$i])";
		$conexion->query($sql);
	}

	$conexion->query("delete from detalleNacional where IdAuditoria = $IdAuditoria");
	for ($i=0; $i < count($MarcosNacionales); $i++) { 
		$sql = 'insert into detalleNacional(IdAuditoria, IdNacional) values';
		$sql = "$sql ($IdAuditoria,$MarcosNacionales[$i])";
		$conexion->query($sql);
	}





	function obtener($consulta){
		include("..//conexion.php");
		$res = $conexion->query($consulta);
		$id = mysqli_fetch_row($res);
		return $id[0];
	}
	
	header ("Location: ../ModificarAuditoria/main.php?id=$IdAuditoria");
 ?>
