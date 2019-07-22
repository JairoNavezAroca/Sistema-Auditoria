<?php 
  include("..//conexion2.php");
  session_start();
  $IdAuditoria = $_SESSION['id'];
  /**/
  $res = $conexion->query("select Realizar, NoRealizar from planificacion where IdAuditoria = $IdAuditoria");
  $Obj = $res->fetchAll(PDO::FETCH_OBJ);
  $Obj = $Obj[0];
 ?>
<h1 class="text-center card-header">Aclaraciones</h1>
<br>

<h3 class="mt-2 ml-3">¿Que se realizará en nuestro trabajo de auditoria?</h3>
	<ul>
		<?php 
			$Obj->Realizar = trim($Obj->Realizar);
			$vector = explode(chr(13),$Obj->Realizar);
			foreach ($vector as $v) {
				echo "<li>$v</li>";
			}
		 ?>
	</ul>

<br>

<h3 class="mt-2 ml-3">¿Qué no se realizará en nuestro trabajo de auditoria?</h3>
	<ul>
		<?php 
			$Obj->NoRealizar = trim($Obj->NoRealizar);
			$vector = explode(chr(13),$Obj->NoRealizar);
			foreach ($vector as $v) {
				echo "<li>$v</li>";
			}
		 ?>
	</ul>