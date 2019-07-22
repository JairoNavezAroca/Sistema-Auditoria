<h1 class="text-center card-header">Plan de Entregables</h1>
<br>
<?php 
  include("..//conexion2.php");
  session_start();
  $IdAuditoria = $_SESSION['id'];
  /**/
  $res = $conexion->query("select * from DetalleArchivos where IdAuditoria = $IdAuditoria");
  $Obj = $res->fetchAll(PDO::FETCH_OBJ);
  	?>
		<ul class="ml-4">
  	<?php 
         foreach ($Obj as $o){
          ?>
			       <li><?php echo $o->Nombre ?></li>
          <?php
        }
  	?>
		</ul>
