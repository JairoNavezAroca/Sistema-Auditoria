	<option value="" disabled selected>Código</option>
	<?php 
		include("..//..//conexion.php");
		$res = $conexion -> query("select * from marconacional");
		while($row = mysqli_fetch_row($res)){
			$id = $row[0];
			$descripcion = $row[2].' / '.$row[1];
			?>
				<option value="<?php echo $id ?>"><?php echo $descripcion ?></option>
			<?php 
		}
	 ?>