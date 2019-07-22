<?php 
  include("..//conexion2.php");
  session_start();
  $IdAuditoria = $_SESSION['id'];
  /**/
  $res = $conexion->query("select * from Planes p join auditor a on a.idauditor = p.idauditor where IdAuditoria = $IdAuditoria");
  $Obj = $res->fetchAll(PDO::FETCH_OBJ);
  //$Obj = $Obj[0];
 ?>
 
<h1 class="text-center card-header">Plan de Proyectos</h1>
<br>

<div class="table-responsive table-hover">
  <table class="table">
    <thead>
      <tr>
        <th scope="col">Actividad</th>
        <th scope="col">Duración</th>
        <th scope="col">Comienzo</th>
        <th scope="col">Fin</th>
        <th scope="col">Encargado</th>
      </tr>
    </thead>
    <tbody>
      <?php 
        foreach ($Obj as $o){
          ?>
            <tr>
              <td><?php echo $o->Descripcion ?></td>
              <td><?php echo $o->Horas ?></td>
              <td><?php echo $o->FInicio ?></td>
              <td><?php echo $o->FTermino ?></td>
              <td><?php echo $o->Apellidos.' '.$o->Nombres ?></td>
            </tr>
          <?php
        }
      ?>
    </tbody>
  </table>
</div>