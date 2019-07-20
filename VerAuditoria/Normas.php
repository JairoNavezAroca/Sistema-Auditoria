<?php 
  include("..//conexion2.php");
  session_start();
  $IdAuditoria = $_SESSION['id'];
  /**/
  $res = $conexion->query("select * from detalleinternacional d join marcointernacional m on d.IdInternacional = m.IdInternacional where d.IdAuditoria = $IdAuditoria");
  $Internacional = $res->fetchAll(PDO::FETCH_OBJ);
  /**/
  $res = $conexion->query("select * from detallenacional d join marconacional m on d.IdNacional = m.IdNacional where d.IdAuditoria = $IdAuditoria");
  $Nacional = $res->fetchAll(PDO::FETCH_OBJ);
 ?>

<h1 class="text-center card-header">Marco Normativo/Referencial Aplicable</h1>
<br>

<h3 class="font-weight-bold">A.Normativa/Marco Referencial Internacional</h3>
	<div class="pt-2 ml-4">
		<div class="container">

			<div class="row  blue darken-2 white-text ">
				<div class="col-md-4"><h3 class="font-weight-bold">Norma</h3></div>
				<div class="col-md-8"><h3 class="font-weight-bold">Descripción</h3></div>
			</div>
			<?php 
      			foreach($Internacional as $I){
      			?>
      			<div class="row ">
					<div class="col-md-4"><h5><?php echo $I->Codigo ?></h5></div>
					<div class="col-md-8"><h5 ><?php echo $I->Detalle ?></h5></div>
				</div>
				<hr>
      			<?php 
      			}
			 ?>
		</div>
	</div>
<br>

<h3 class="font-weight-bold">B.Normativa/Marco referencial Nacional</h3>
	<div class="pt-2 ml-4">
		<div class="container">
			<div class="row  blue darken-2 white-text ">
				<div class="col-md-4"><h3 class="font-weight-bold">Norma</h3></div>
				<div class="col-md-8"><h3 class="font-weight-bold">Descripción</h3></div>
			</div>
			<?php 
      			foreach($Nacional as $N){
      			?>
      			<div class="row ">
					<div class="col-md-4"><h5><?php echo $N->Codigo ?></h5></div>
					<div class="col-md-8"><h5 ><?php echo $N->Detalle ?></h5></div>
				</div>
				<hr>
      			<?php 
      			}
			 ?>
		</div>
	</div>

	<br>

<h3 class="font-weight-bold">C.Normativa Institucional</h3>
<div class="row justify-content-center">
	<div class="col-md-4">
		<a class="btn btn-primary btn-lg " role="button" aria-pressed="true" target="_blank" href="../Recursos/MOF.pdf">MOF</a>
	</div>

	<div class="col-md-4">
		<a class="btn btn-secondary btn-lg " role="button" aria-pressed="true" target="_blank" href="../Recursos/ROF.pdf">ROF</a>
	</div>
</div>
