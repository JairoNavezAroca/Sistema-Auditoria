<?php 
  include("..//conexion2.php");
  session_start();
  $IdAuditoria = $_SESSION['id'];
  /**/
  $res = $conexion->query("select ObjGeneral as Obj from planificacion where IdAuditoria = $IdAuditoria");
  $Obj = $res->fetchAll(PDO::FETCH_OBJ);
  $Obj = $Obj[0];
 ?>
<h1 class="text-center card-header">Objetivo General</h1>
<br>
<?php echo $Obj->Obj ?>