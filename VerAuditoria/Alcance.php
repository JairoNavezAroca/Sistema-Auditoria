<?php 
  include("..//conexion2.php");
  session_start();
  $IdAuditoria = $_SESSION['id'];
  /**/
  $res = $conexion->query("select Alcance from planificacion where IdAuditoria = $IdAuditoria");
  $Obj = $res->fetchAll(PDO::FETCH_OBJ);
  $Obj = $Obj[0];
 ?>
<br>
<div class="container">
		<div class="row  blue darken-2 white-text ">
				<div class="col-md-4"><h3 class="font-weight-bold">Estratégica / Alcance</h3></div>

		</div>
		<?php 
			//$vector = str_replace('\r\n', '.', $Obj->Alcance);
			$Obj->Alcance = trim($Obj->Alcance);
			$vector = explode(chr(13),$Obj->Alcance);
			//$vector = explode('. ',$vector);
			foreach ($vector as $v) {
				echo '<h5 class="hoverAqui"><li>'.$v."</li></h5>";
				echo '<hr>';
			}
		 ?>
</div>