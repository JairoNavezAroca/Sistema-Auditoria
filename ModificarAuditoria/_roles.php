<?php 
	include("..//conexion.php");

  	session_start();
	$id = $_SESSION['id'];

	$rol = $_POST['Roles'];
	for ($i=0; $i < count($rol); $i++) { 
		$rol[$i] = explode('.',$rol[$i]);
	}
	
	for ($i=0; $i < count($rol); $i++) { 
		//update detalleauditores set IdRol = 2 where Iddetalle =1
		$sql = 'update detalleauditores';
		$IdRol = $rol[$i][1];
		$Iddetalle = $rol[$i][0];
		$sql = "$sql set IdRol = $IdRol where Iddetalle = $Iddetalle";
		$conexion->query($sql);
	}

	$id = $_SESSION['id'];
	header("Location:main.php?id=$id");
 ?>