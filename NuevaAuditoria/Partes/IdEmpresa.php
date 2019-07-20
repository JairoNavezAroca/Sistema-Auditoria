	<option value="-1" selected>Registrar Datos de la Empresa</option>
	<?php 
		include("..//..//conexion.php");
		$res = $conexion -> query("select * from empresa");
		while($row = mysqli_fetch_row($res)){
			$id = $row[0];
			$descripcion = $row[1];
			?>
				<option value="<?php echo $id ?>"><?php echo $descripcion ?></option>
			<?php 
		}
	 ?>