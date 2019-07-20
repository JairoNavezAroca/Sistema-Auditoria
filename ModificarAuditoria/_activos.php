<?php 
	include("..//conexion.php");

  	session_start();
	$id = $_SESSION['id'];

	$Activo_Nombre = $_POST['Activo_Nombre'];
	$Activo_Descripcion = $_POST['Activo_Descripcion'];
	$Activo_Importancia = $_POST['Activo_Importancia'];


	$sql = 'insert into Activos(IdAuditoria, Nombre, Descripcion, Importancia) values';
	$sql = "$sql ($id, '$Activo_Nombre', '$Activo_Descripcion', '$Activo_Importancia')";
	echo $sql;
	$conexion->query($sql);
 ?>