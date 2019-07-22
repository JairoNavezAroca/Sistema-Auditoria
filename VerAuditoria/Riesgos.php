<?php 
  include("..//conexion2.php");
  session_start();
  $IdAuditoria = $_SESSION['id'];
  /**/
  $res = $conexion->query("select ac.Nombre as Activo, r.Amenazas as Amenaza, r.Impacto as Impacto from auditoria a join activos ac on a.IdAuditoria = ac.IdAuditoria join Riesgos r on r.IdActivo = ac.IdActivo where a.IdAuditoria = $IdAuditoria");
  $Riesgos = $res->fetchAll(PDO::FETCH_OBJ);
 ?>
<h1 class="text-center card-header">Identificación de Riesgos</h1>
<br>
<div class="container">
		<div class="row  blue darken-2 white-text ">
				<div class="col-md-4"><h3 class="font-weight-bold">Activo</h3></div>
				<div class="col-md-4"><h3 class="font-weight-bold">Amenazas y Vulnerabilidades</h3></div>
				<div class="col-md-4"><h3 class="font-weight-bold">Impacto</h3></div>
			</div>

			<?php 
      			foreach($Riesgos as $R){
      			?>
      			<div class="row ">
					<div class="col-md-4"><h5><?php echo $R->Activo ?></h5></div>
					<div class="col-md-4"><h5><?php echo $R->Amenaza ?></h5></div>
					<div class="col-md-4"><h5><?php echo $R->Impacto ?></h5></div>
				</div>
				<hr>
      			<?php 
      			}
			 ?>


</div>
