	<option value="" disabled selected>Empresa/Entidad del rubro</option>
	<?php 
		include("..//..//conexion.php");
		$res = $conexion -> query("select * from rubro");
		while($row = mysqli_fetch_row($res)){
			$id = $row[0];
			$descripcion = $row[1];
			?>
				<option value="<?php echo $id ?>"><?php echo $descripcion ?></option>
			<?php 
		}
	 ?>