<?php 
	include("..//conexion.php");

  	session_start();
	$id = $_SESSION['id'];

	$Riesgos_Activo = $_POST['Riesgos_Activo'];
	$Riesgos_Amenaza = $_POST['Riesgos_Amenaza'];
	$Riesgos_Impacto = $_POST['Riesgos_Impacto'];
	$Riesgos_Probabilidad = $_POST['Riesgos_Probabilidad'];



	$sql = 'insert into Riesgos(IdAuditoria, IdActivo, Amenazas, Impacto, Probabilidad) values';
	$sql = "$sql ($id, $Riesgos_Activo, '$Riesgos_Amenaza', '$Riesgos_Impacto', '$Riesgos_Probabilidad')";
	$conexion->query($sql);
	echo $sql;
 ?>