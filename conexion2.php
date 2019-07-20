<?php
/*
	Pequeño, muy pequeño sistema de ventas en PHP con MySQL

	@author parzibyte

	No olvides visitar parzibyte.me/blog para más cosas como esta
*/
$usuario = "root";
$contraseña = "";
$nombre_base_de_datos = "SistemaAuditoria";
try{
	$conexion = new PDO('mysql:host=localhost;dbname='.$nombre_base_de_datos, $usuario, $contraseña);
	 $conexion->query("set names utf8;");
    $conexion->setAttribute(PDO::ATTR_EMULATE_PREPARES, FALSE);
    $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $conexion->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
}catch(Exception $e){
	echo "Ocurrió algo con la base de datos: " . $e->getMessage();
}
?>