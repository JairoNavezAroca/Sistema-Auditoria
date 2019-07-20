	<?php 
		include("..//..//conexion.php");
		$res = $conexion -> query("select * from auditor");
		while($row = mysqli_fetch_row($res)){
			$id = $row[0];
			$auditor = $row[1].' '.$row[2];
			?>
				<option value="<?php echo $id; ?>"><?php echo $auditor; ?></option>
			<?php 
		}
	 ?>