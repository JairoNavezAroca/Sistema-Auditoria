<?php 
	include("..//conexion.php");

  	session_start();
	$id = $_SESSION['id'];

	$Plan_OGeneral = $_POST['Plan_OGeneral'];
	$Plan_Oespecifico = $_POST['Plan_Oespecifico'];
	$Plan_Alcance = $_POST['Plan_Alcance'];
	$Plan_Realizar = $_POST['Plan_Realizar'];
	$Plan_NoRealizar = $_POST['Plan_NoRealizar'];
	$Plan_Limitaciones = $_POST['Plan_Limitaciones'];
//////////////////////
	$sql = "delete from Planificacion where IdAuditoria = $id";
	$conexion->query($sql);
	/////////////////////////////////////
	$sql = 'insert into Planificacion(IdAuditoria, ObjGeneral, ObjEspecifico, Alcance, Realizar, NoRealizar, Limitaciones) values';
	$sql = "$sql ($id, '$Plan_OGeneral', '$Plan_Oespecifico', '$Plan_Alcance', '$Plan_Realizar', '$Plan_NoRealizar', '$Plan_Limitaciones')";
	$conexion->query($sql);

	$id = $_SESSION['id'];
	header("Location:main.php?id=$id");
 ?>