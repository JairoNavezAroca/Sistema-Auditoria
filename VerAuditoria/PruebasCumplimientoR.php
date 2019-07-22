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
   				<div class="col-md-3"><h6><?php echo $row['FechaRegistro']  ?></h6></div>
				<div class="col-md-4"><h6><?php echo $row['Nombre'] ?></h6></div>
				<div class="col-md-3"><h6>Briceño Montaño Javier</h6></div>
				<div class="col-md-2"><a class="btn btn-blue btn-block animated fadeInRight" onclick="Pasar(<?php echo $row['IdPrueba'] ?>)" data-toggle="modal" data-target="#DocInv"><i class="fas fa-eye fa-2x "></i><div>Mostrar</div></a></div>
			</div>

			<hr>

   			<?php
  		}
 ?>
