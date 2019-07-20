	<option value="" disabled selected>Código</option>
	<?php 
		include("..//..//conexion.php");

		session_start();
		$id = $_SESSION['id'];
		$sql = "select IdInternacional from DetalleInternacional where IdAuditoria = $id";
		$res = $conexion -> query($sql);
		$arreglo = array();
		while($row = mysqli_fetch_row($res)){
			$temp = $row[0];
			$arreglo[] = $temp;
		}
		
		$res = $conexion -> query("select * from marcointernacional");
		while($row = mysqli_fetch_row($res)){
			$id = $row[0];
			$descripcion = $row[2].' / '.$row[1];
			$adicional = '';

			if (in_array($id, $arreglo, true))
				$adicional = ' selected';
			?>
				<option value="<?php echo $id ?>"<?php echo $adicional; ?>><?php echo $descripcion ?></option>
			<?php 
		}
	 ?>