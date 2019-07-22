<?php 
  include("..//conexion2.php");
  session_start();
  $IdAuditoria = $_SESSION['id'];
  /**/
  $res = $conexion->query("select ObjEspecifico as Especifico from planificacion where IdAuditoria = $IdAuditoria");
  $Obj = $res->fetchAll(PDO::FETCH_OBJ);
  $Obj = $Obj[0];
 ?>
 <h1 class="text-center card-header">Objetivos Específicos</h1>
<br>

<div class="card">
	<?php 
		$vector = explode(chr(13),$Obj->Especifico);
		//$vector = explode('.',$Obj->Especifico);
		foreach ($vector as $v) {
			echo '<h4 class="ml-3 mt-3"><li>'.$v.'</li></h4>';
		}
	 ?>
</div>
