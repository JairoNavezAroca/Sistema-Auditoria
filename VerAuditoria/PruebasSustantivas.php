<h1 class="text-center card-header">Pruebas Sustantivas</h1>
<br>

<script>
	function Pasar(id){
			document.getElementById("parametrosust").value=id;
			document.getElementById("MostrarPruebaSust").click();
	}
</script>

<?php 
	include("..//conexion.php");
 	session_start();
 	$id = $_SESSION['id'];	

 	$sql = "SELECT * from pruebasustantiva ps join detallepruebacumplimiento dpc on ps.IdPregunta = dpc.IdDetalle join pruebacumplimiento pc on pc.IdPrueba = dpc.IdPrueba where pc.IdAuditoria = $id order by ps.IdPrueba desc";
	//echo $sql;
	$sql=$conexion->query($sql);
	/*
SELECT * from pruebasustantiva ps join detallepruebacumplimiento dpc on ps.IdPregunta = dpc.IdDetalle join pruebacumplimiento pc on pc.IdPrueba = dpc.IdPrueba where pc.IdAuditoria = 1
	*/
	 while($row=mysqli_fetch_array($sql))
	 	{
   			?>

   			<div class="row justify-content-around">
				<div class="col-md-7"><h4><?php echo $row[3] ?></h4></div>
				<div class="col-md-4"><a class="btn btn-blue btn-block animated fadeInRight" onclick="Pasar(<?php echo $row[0] ?>)" data-toggle="modal" data-target="#DocLicS"><i class="fas fa-eye fa-2x "></i><div>Mostrar</div></a></div>
			</div>

			<hr>

   			<?php
  		}
 ?>
<!--
<div class="row justify-content-around">
	<div class="col-md-7"><h4>Documentación de Inventarios</h4></div>
	<div class="col-md-4"><a class="btn btn-blue btn-block animated fadeInRight" data-toggle="modal" data-target="#DocLicS"><i class="fas fa-eye fa-2x "></i><div>Mostrar</div></a></div>
</div>

<hr>

-->
<!--
<div class="row justify-content-around">
	<div class="col-md-7"><h4>Documentación de licencia de software</h4></div>
	<div class="col-md-4"><a class="btn btn-blue btn-block animated fadeInRight" data-toggle="modal" data-target="#DocInv"><i class="fas fa-eye fa-2x "></i><div>Mostrar</div></a></div>
</div>
-->