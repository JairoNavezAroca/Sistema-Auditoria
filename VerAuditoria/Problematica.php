<?php 
  include("..//conexion2.php");
  session_start();
  $IdAuditoria = $_SESSION['id'];
  /**/
  $res = $conexion->query("select * from auditoria where IdAuditoria = $IdAuditoria");
  $Auditoria = $res->fetchAll(PDO::FETCH_OBJ);
  $Auditoria = $Auditoria[0];
	
 ?>
<h1 class="text-center card-header">Realidad problemática / Motivo de la auditoría</h1>
<br>

<div class="card-body px-4">
	<?php echo $Auditoria->Motivos; ?>
</div>