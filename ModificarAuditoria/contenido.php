<?php 
  include("..//conexion.php");
  $id = $_GET['id'];
  $sql = "select * from Auditoria where IdAuditoria = $id";
  $sql = $conexion->query($sql);
  while($row=mysqli_fetch_array($sql)){
    $titulo = $row['Titulo'];
  }
?>
<br><br><br><br><br>
<h1 class="text-center"><?php echo $titulo; ?></h1>
<br><br>
<div class="container">
  <div class="row justify-content-around">
    <div class="col-md-4 mt-4">
      <a class="btn btn-blue btn-block animated fadeInRight" data-toggle="modal" data-target="#centralModalSm"><i class="fas fa-pencil-alt  mb-2 fa-3x"></i><div>Modificar Generalidades</div></a>
    </div>

    <div class="col-md-4 mt-4">
      <a class="btn btn-green btn-block animated fadeInRight" href="../VerAuditoria/main.php" data-toggle="modal" data-target="#activos"><i class="fas fa-check  mb-2 fa-3x"></i><div>Gestión de Activos</div></a>
    </div>

    <div class="col-md-4 mt-4">
      <a class="btn btn-blue btn-block animated fadeInRight" data-toggle="modal" data-target="#riesgos"><i class="fas fa-id-card  mb-2 fa-3x"></i><div>Gestión de Riesgos</div></a>
    </div>
  </div>




  <div class="row justify-content-around">
    <div class="col-md-4 mt-4">
      <a class="btn btn-default btn-block animated fadeInRight" data-toggle="modal" data-target="#plan" ><i class="fas fa-globe  mb-2 fa-3x" ></i><div>Planificación</div></a>
    </div>

    <div class="col-md-4 mt-4">
      <a class="btn btn-purple btn-block animated fadeInRight" data-toggle="modal" data-target="#roles"><i class="fas fa-clone  mb-2 fa-3x" ></i><div>Asignación de Roles</div></a>
    </div>

    <div class="col-md-4 mt-4">
      <a class="btn btn-red btn-block animated fadeInRight"data-toggle="modal" data-target="#entrevistar" ><i class="fas fa-user-cog  mb-2 fa-3x"></i><div>Personas a entrevistar</div></a>
    </div>
  </div>

  <div class="row justify-content-around mb-5">
    <div class="col-md-4 mt-4">
      <a class="btn btn-success btn-block animated fadeInRight" data-toggle="modal" data-target="#proyecto"><i class="fas fa-pencil-alt  mb-2 fa-3x"></i><div>Plan de Proyectos</div></a>
    </div>

    <div class="col-md-4 mt-4">
      <a class="btn btn-warning btn-block animated fadeInRight" href="../VerAuditoria/main.php" data-toggle="modal" data-target="#entregable"><i class="fas fa-check  mb-2 fa-3x"></i><div>Registrar entregables</div></a>
    </div>

    <div class="col-md-4 mt-4">
      <a class="btn btn-info btn-block animated fadeInRight" data-toggle="modal" data-target="#cumplimiento"><i class="fas fa-id-card  mb-2 fa-3x"></i><div>Pruebas de Cumplimiento</div></a>
    </div>
  </div>
</div>
