<?php 
	include("..//conexion.php");

  	session_start();
	$id = $_SESSION['id'];

	$Nombres = $_POST['Nombres'];
	$Cargo = $_POST['Cargo'];

	$sql = 'insert into entrevistas(IdAuditoria, Nombres, Cargo) values';
	$sql = "$sql ($id, '$Nombres', '$Cargo')";
	$conexion->query($sql);
 ?>