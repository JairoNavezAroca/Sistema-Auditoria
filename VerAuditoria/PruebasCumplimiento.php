<h1 class="text-center card-header">Pruebas de Cumplimiento</h1>
<br>

<script>
	function Pasar(id){
			document.getElementById("parametro").value=id;
			document.getElementById("MostrarPrueba").click();
	}
</script>

<?php 
	include("..//conexion.php");
 	session_start();
 	$id = $_SESSION['id'];	

 	$sql = "SELECT * FROM pruebaCumplimiento WHERE IdAuditoria='".$id."' order by IdPrueba desc";
	$sql=$conexion->query($sql);

	 while($row=mysqli_fetch_array($sql))
	 	{
   			?>

   			<div class="row justify-content-around">
				<div class="col-md-7"><h4><?php echo $row['Nombre'] ?></h4></div>
				<div class="col-md-4"><a class="btn btn-blue btn-block animated fadeInRight" onclick="Pasar(<?php echo $row['IdPrueba'] ?>)" data-toggle="modal" data-target="#DocInv"><i class="fas fa-eye fa-2x "></i><div>Mostrar</div></a></div>
			</div>

			<hr>

   			<?php
  		}
 ?>



<!--

<div class="row justify-content-around">
	<div class="col-md-7"><h4>Documentación de Inventarios</h4></div>
	<div class="col-md-4"><a class="btn btn-blue btn-block animated fadeInRight" data-toggle="modal" data-target="#DocInv"><i class="fas fa-eye fa-2x "></i><div>Mostrar</div></a></div>
</div>

<hr>

<div class="row justify-content-around">
	<div class="col-md-7"><h4>Documentación de licencia de software</h4></div>
	<div class="col-md-4"><a class="btn btn-blue btn-block animated fadeInRight" data-toggle="modal" data-target="#DocLic"><i class="fas fa-eye fa-2x "></i><div>Mostrar</div></a></div>
</div>

-->