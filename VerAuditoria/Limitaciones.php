<?php 
  include("..//conexion2.php");
  session_start();
  $IdAuditoria = $_SESSION['id'];
  /**/
  $res = $conexion->query("select Limitaciones from planificacion where IdAuditoria = $IdAuditoria");
  $Obj = $res->fetchAll(PDO::FETCH_OBJ);
  $Obj = $Obj[0];
 ?>

<h1 class="text-center card-header">Limitaciones</h1>
<br>

<h3 class="mt-2 ml-3">Entre los distintos factores que limitan el desarrollo de nuestro proyecto podemos mencionar:</h3>
	<ol>
		<?php 
			$Obj->Limitaciones = trim($Obj->Limitaciones);
			$vector = explode(chr(13),$Obj->Limitaciones);
			foreach ($vector as $v) {
				echo '<li>'.$v.'</li>';
			}
		 ?>
	</ol>