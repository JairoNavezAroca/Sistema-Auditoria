	<option selected>Responsable</option>
	<?php 
		include("..//..//conexion.php");
		session_start();
		$id = $_SESSION['id'];
		$res = $conexion -> query("select * from auditor,detalleauditores where auditor.IdAuditor=detalleauditores.IdAuditor and detalleauditores.IdAuditoria = $id");
		while($row = mysqli_fetch_row($res)){
			$id = $row[0];
			$auditor = $row[1].' '.$row[2];
			?>
				<option value="<?php echo $id; ?>"><?php echo $auditor; ?></option>
			<?php 
		}
	 ?>
