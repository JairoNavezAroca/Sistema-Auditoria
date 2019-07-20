	<option value="" disabled selected>Equipo Auditor</option>
	<?php 
		include("..//..//conexion.php");

		session_start();
		$id = $_SESSION['id'];
		$sql = "select IdAuditor from DetalleAuditores where IdAuditoria = $id";
		$res = $conexion -> query($sql);
		$arreglo = array();
		while($row = mysqli_fetch_row($res)){
			$temp = $row[0];
			$arreglo[] = $temp;
		}

		$res = $conexion -> query("select * from auditor");
		while($row = mysqli_fetch_row($res)){
			$id = $row[0];
			$auditor = $row[1].' '.$row[2];
			$adicional = '';

			if (in_array($id, $arreglo, true))
				$adicional = ' selected';
			?>
				<option value="<?php echo $id; ?>"<?php echo $adicional; ?>><?php echo $auditor; ?></option>
			<?php 
		}
	 ?>