<?php 
    //Datos para la conexión con el servidor
    $host = "127.0.0.1:3306"; 				//TU HOST//
    $db = "SistemaAuditoria";		//TU BASE DE DATOS//
    $dbuser = "root";	 	//TU USUARIO DEL HOST//
    $dbpwd = "";	//TU CONTRASEÑA//
    //Creando la conexión, nuevo objeto mysqli
    $conexion = new mysqli($host,$dbuser,$dbpwd,$db);
    //Si sucede algún error la función muere e imprimir el error
    if($conexion->connect_error){
        die("Error en la conexion");
    }
    $conexion->set_charset("utf8");
 ?>