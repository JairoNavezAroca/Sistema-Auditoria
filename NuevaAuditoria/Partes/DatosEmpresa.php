<?php 
	$id = $_POST['id'];
	include("..//..//conexion.php");
		$res = $conexion -> query("select * from empresa where IdEmpresa = $id");
		while($row = mysqli_fetch_row($res)){
			echo $row[1];
			echo '&';
			echo $row[2];
			echo '&';
			echo $row[3];
			echo '&';
			echo $row[4];
			echo '&';
			echo $row[5];
			echo '&';
			echo $row[6];
			echo '&';
			echo $row[7];
		}


 ?>