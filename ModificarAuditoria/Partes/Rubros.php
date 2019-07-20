	<option value="" disabled selected>Empresa/Entidad del rubro</option>
	<?php 
		include("..//..//conexion.php");

		session_start();
		$id = $_SESSION['id'];
		$sql = "select IdRubro from Auditoria A inner join Empresa E on A.IdEmpresa = E.IdEmpresa where IdAuditoria = $id";
		$res = $conexion -> query($sql);
		$arreglo = array();
		while($row = mysqli_fetch_row($res)){
			$temp = $row[0];
			$arreglo[] = $temp;
		}

		$res = $conexion -> query("select * from rubro");
		while($row = mysqli_fetch_row($res)){
			$id = $row[0];
			$descripcion = $row[1];
			$adicional = '';

			if (in_array($id, $arreglo, true))
				$adicional = ' selected';
			?>
				<option value="<?php echo $id ?>"<?php echo $adicional; ?>><?php echo $descripcion ?></option>
			<?php 
		}
	 ?>
	 