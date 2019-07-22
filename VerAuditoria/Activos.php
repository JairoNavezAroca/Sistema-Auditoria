<?php 
  include("..//conexion2.php");
  session_start();
  $IdAuditoria = $_SESSION['id'];
  /**/
  $res = $conexion->query("select * from auditoria a join activos ac on a.IdAuditoria = $IdAuditoria");
  $Activos = $res->fetchAll(PDO::FETCH_OBJ);
 ?>
<h1 class="text-center card-header">Activos de la empresa</h1>
<br>

<div class="container">
		<div class="row  blue darken-2 white-text ">
				<div class="col-md-4"><h3 class="font-weight-bold">Activo</h3></div>
				<div class="col-md-4"><h3 class="font-weight-bold">Descripción</h3></div>
				<div class="col-md-4"><h3 class="font-weight-bold">Importancia</h3></div>
			</div>
			<?php 
      			foreach($Activos as $A){
      			?>
      			<div class="row ">
					<div class="col-md-4"><h5><?php echo $A->Nombre ?></h5></div>
					<div class="col-md-4"><h5><?php echo $A->Descripcion ?></h5></div>
					<div class="col-md-4"><h5><?php echo $A->Importancia ?></h5></div>
				</div>
				<hr>
      			<?php 
      			}
			 ?>
</div>