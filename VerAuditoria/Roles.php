<?php 
  include("..//conexion2.php");
  session_start();
  $IdAuditoria = $_SESSION['id'];
  /**/
  $res = $conexion->query("SELECT * from detalleauditores a join auditor r on r.IdAuditor = a.IdAuditor join rol l on l.IdRol = a.IdRol where a.IdAuditoria = $IdAuditoria");
  $Obj = $res->fetchAll(PDO::FETCH_OBJ);
    ?>
    <section class="text-center my-1 p-1">
    <h2 class="h1-responsive font-weight-bold my-5">Asignación de Roles</h2>
    <?php 
        $i = 1;
        $extra = '';
        $ll[1] = 'col-lg-4 col-md-12 mb-lg-0 mb-4';
        $ll[2] = 'col-lg-4 col-md-6 mb-md-0 mb-4';
        $ll[3] = 'col-lg-4 col-md-6';
        foreach ($Obj as $o){
          if($i==1){
            ?>
              <div class="row">
            <?php
          }
          ?>
              <div class="<?php echo "$ll[$i] $extra"; ?>">
                <!--Card-->
                <div class="card testimonial-card">
                  <!--Background color-->
                  <div class="card-up info-color"></div>
                  <!--Avatar-->
                  <div class="avatar mx-auto white">
                    <img src="https://mdbootstrap.com/img/Photos/Avatars/img%20(9).jpg" class="rounded-circle img-fluid">
                  </div>
                  <div class="card-body">
                    <!--Name-->
                    <h4 class="font-weight-bold mb-4"><?php echo $o->Apellidos.' '.$o->Nombres ?></h4>
                    <hr>
                    <h5><?php echo $o->Descripcion ?></h5>
                    <!--Quotation-->
                    <ul class="text-left">
                      <li><b>Carrera: </b>Ing.Sistemas</li>
                      <li><b>Celular: </b>981559813</li>
                    </ul>
                  </div>
                </div>
                <!--Card-->
              </div>
         <?php
          if($i==3){
            ?>
              </div>
            <?php
          }
          $i++;
          if ($i==4){
            $i = 1;
            $extra = 'mt-4';
          }
        }
    ?>


<!--

<section class="text-center my-1 p-1">

  <h2 class="h1-responsive font-weight-bold my-5">Asignación de Roles</h2>
  

  <div class="row">

    <div class="col-lg-4 col-md-12 mb-lg-0 mb-4">
      <div class="card testimonial-card">
        <div class="card-up info-color"></div>
        <div class="avatar mx-auto white">
          <img src="https://mdbootstrap.com/img/Photos/Avatars/img%20(9).jpg" class="rounded-circle img-fluid">
        </div>
        <div class="card-body">
          <h4 class="font-weight-bold mb-4">Briceño Montaño Javier</h4>
          <hr>
          <h5>Jefe de Auditoría</h5>
          <ul class="text-left">
            <li><b>Carrera: </b>Ing.Sistemas</li>
            <li><b>Celular: </b>981559813</li>
          </ul>
        </div>
      </div>
    </div>

    <div class="col-lg-4 col-md-6 mb-md-0 mb-4">
      <div class="card testimonial-card">
        <div class="card-up blue-gradient">
        </div>
        <div class="avatar mx-auto white">
          <img src="https://mdbootstrap.com/img/Photos/Avatars/img%20(20).jpg" class="rounded-circle img-fluid">
        </div>
        <div class="card-body">
          <h4 class="font-weight-bold mb-4">Argomedo de la Cruz Jhon</h4>
          <hr>
          <h5>Auditor Especialista</h5>
          <ul class="text-left">
            <li><b>Carrera: </b>Ing.Sistemas</li>
            <li><b>Celular: </b>981551213</li>
          </ul>
        </div>
      </div>
    </div>

    <div class="col-lg-4 col-md-6">
      <div class="card testimonial-card">
        <div class="card-up indigo"></div>
        <div class="avatar mx-auto white">
          <img src="https://mdbootstrap.com/img/Photos/Avatars/img%20(10).jpg" class="rounded-circle img-fluid">
        </div>
        <div class="card-body">
          <h4 class="font-weight-bold mb-4">Olivares Ruiz Melissa</h4>
          <h5>Auditor Especialista:</h5>
          <ul class="text-left">
            <li><b>Carrera: </b>Ing.Sistemas</li>
            <li><b>Celular: </b>981559127</li>
          </ul>
        </div>
      </div>
    </div>

  </div>


  <div class="row">

    <div class="col-lg-4 col-md-12 mb-lg-0 mb-4 mt-4">
      <div class="card testimonial-card">
        <div class="card-up info-color"></div>
        <div class="avatar mx-auto white">
          <img src="https://mdbootstrap.com/img/Photos/Avatars/img%20(9).jpg" class="rounded-circle img-fluid">
        </div>
        <div class="card-body">
          <h4 class="font-weight-bold mb-4">Naves Aroca Jairo</h4>
          <h5>Auditor Especialista</h5>
          <ul class="text-left">
            <li><b>Carrera: </b>Ing.Sistemas</li>
            <li><b>Celular: </b>981559812</li>
          </ul>
        </div>
      </div>
    </div>
   </div>

</section>
-->