<?php 
  	include("..//conexion2.php");
  	session_start();
  	$IdAuditoria = $_SESSION['id'];
	/**/
	$res = $conexion->query("select * from empresa e inner join rubro r on e.IdRubro = r.IdRubro inner join Auditoria a on a.IdEmpresa = e.IdEmpresa where a.IdAuditoria = $IdAuditoria");
	$Empresa = $res->fetchAll(PDO::FETCH_OBJ);
	$Empresa = $Empresa[0];

 ?>	
	<h1 class="text-center card-header">Organigráma</h1>
	<br>
<div class="row justify-content-center">
	<img src="../Recursos/img/organigrama.png" width="60%" class="border">
</div>
<br>
<div class="card">
	<div class="card-header">
		<?php echo $Empresa->Ubicacion; ?>
	</div>
</div>

