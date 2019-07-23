<h1 class="text-center card-header">Pruebas de Cumplimiento Ejecutadas</h1>
<br>

<script>
	function PasarR(id){
			document.getElementById("parametro").value=id;
			document.getElementById("MostrarPruebaR").click();
	}
</script>

<?php 
	include("..//conexion.php");
 	session_start();
 	$id = $_SESSION['id'];	

 	$sql = "SELECT * FROM PruebaCumplimientoRealizada pr JOIN PruebaCumplimiento pc ON pr.IdPrueba=pc.IdPrueba WHERE pc.IdAuditoria='".$id."' ORDER BY  pr.FechaEjecucion DESC";
	$sql=$conexion->query($sql);

	?>
		<div class="row  grey text-white">
   				<div class="col-md-3"><h6>Fecha de Ejecución</h6></div>
				<div class="col-md-4"><h6>Nombre de Prueba</h6></div>
				<div class="col-md-3"><h6>Auditado</h6></div>
		</div>
		<br>
	<?php

	 while($row=mysqli_fetch_array($sql))
	 	{
   			?>


   			<div class="row justify-content-around">
   				<div class="col-md-3"><h6><?php echo $row['FechaEjecucion']  ?></h6></div>
				<div class="col-md-4"><h6><?php echo $row['Nombre'] ?></h6></div>
				<div class="col-md-3"><h6><?php echo $row['Auditado'] ?></h6></div>
				<div class="col-md-2"><a class="btn btn-blue btn-block animated fadeInRight" onclick="PasarR(<?php echo $row['IdPruebaRealizada'] ?>)" data-toggle="modal" data-target="#DocInv"><i class="fas fa-eye fa-2x "></i><div>Mostrar</div></a></div>
			</div>

			<hr>

   			<?php
  		}
 ?>
