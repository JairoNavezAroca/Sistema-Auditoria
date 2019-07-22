<?php 
	include("..//conexion.php");

  	session_start();
	$id = $_SESSION['id'];

	$Entregable_NombreEntregable = $_POST['nombreEntregable'];
	$Entregable_ArchivoEntregable = $_POST['archivoEntregable'];

	echo $Entregable_NombreEntregable;


	$sql = 'insert into DetalleArchivos(IdAuditoria, Nombre) values';
	$sql = "$sql ($id, '$Entregable_NombreEntregable')";
	echo $sql;
	$conexion->query($sql);

	$id = $_SESSION['id'];
	header("Location:main.php?id=$id");
 ?>