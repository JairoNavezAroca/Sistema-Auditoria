	<option value="0" disabled selected>Seleccione Activo</option>
	<?php 
		include("..//..//conexion.php");
  		session_start();
		$IdAuditoria = $_SESSION['id'];
		$res = $conexion -> query("select * from Activos where IdAuditoria = $IdAuditoria");
		while($row = mysqli_fetch_row($res)){
			$id = $row[0];
			$descripcion = $row[4];
			?>
				<option value="<?php echo $id ?>"><?php echo $descripcion ?></option>
			<?php 
		}
	 ?>