<?php 
  	include("..//conexion2.php");
  	session_start();
  	$IdAuditoria = $_SESSION['id'];
	/**/
	$res = $conexion->query("select * from empresa e inner join rubro r on e.IdRubro = r.IdRubro inner join Auditoria a on a.IdEmpresa = e.IdEmpresa where a.IdAuditoria = $IdAuditoria");
	$Empresa = $res->fetchAll(PDO::FETCH_OBJ);
	$Empresa = $Empresa[0];

 ?>

<div class="container">
	<h1 class="text-center card-header">Generalidades</h1>
	
	<h3 class="font-weight-bold">1.Nombre de la Empresa:</h3>
	<h4 class="pt-2 ml-4"><?php echo $Empresa->Nombre; ?></h4>

	<h3 class="font-weight-bold">2.Giro de la Empresa:</h3>
	<h4 class="pt-2 ml-4"><?php echo $Empresa->Descripcion; ?></h4>

	<br>

	<h3 class="font-weight-bold">3.Direccionamiento estratégico actual:</h3>
		<h4 class="pt-2 ml-4 font-weight-bold">Misión:</h4>
			<p class="pt-2 ml-4">
				<?php echo $Empresa->Mision; ?>
			</p>

		<h4 class="pt-2 ml-4 font-weight-bold">Visión:</h4>
			<p class="pt-2 ml-4">
				<?php echo $Empresa->Vision; ?>
			</p>

		<h4 class="pt-2 ml-4 font-weight-bold">Estratégias:</h4>
			<h6 class="pt-2 ml-4">
				<?php echo $Empresa->Estrategias; ?>
			</h6>


</div>