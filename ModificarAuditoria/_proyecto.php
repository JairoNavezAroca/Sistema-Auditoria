<?php 
	include("..//conexion.php");

  	session_start();
	$id = $_SESSION['id'];

	$Proyecto_DescripcionAct = $_POST['Proyecto_DescripcionAct'];
	$Proyecto_Fecha_Inicio = $_POST['Proyecto_Fecha_Inicio'];
	$Proyecto_Fecha_Final = $_POST['Proyecto_Fecha_Final'];
	$Proyecto_HorasCantidad = $_POST['Proyecto_HorasCantidad'];
	$Proyecto_Responsable = $_POST['Proyecto_Responsable'];

	$FInicio = date('Y-m-d', strtotime($Proyecto_Fecha_Inicio));
	$FFinal = date('Y-m-d', strtotime($Proyecto_Fecha_Final));


	$sql = 'insert into Planes(IdAuditoria, Descripcion, FInicio, FTermino, Horas, IdAuditor) values';
	$sql = "$sql ($id, '$Proyecto_DescripcionAct', '$FInicio', '$FFinal', '$Proyecto_HorasCantidad', $Proyecto_Responsable)";
	echo $sql;
	$conexion->query($sql);
 ?>