<?php 
  include("..//conexion2.php");
  session_start();
  $IdAuditoria = $_SESSION['id'];
  /**/
  $res = $conexion->query("SELECT * from detalleauditores a join auditor r on r.IdAuditor = a.IdAuditor join rol l on l.IdRol = a.IdRol where a.IdAuditoria = $IdAuditoria");
  $Obj = $res->fetchAll(PDO::FETCH_OBJ);
    ?>
    <section class="text-center my-1 p-1">
    <h2 class="h1-responsive font-weight-bold my-5">Perfil del Equipo Auditor</h2>
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
            <!--Grid column-->
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
                    <?php 
                        $listaperfil = split(';', $o->Perfil);
                        foreach ($listaperfil as $item) {
                          echo "<li>$item</li>";
                        }
                     ?>
                    <li>Conocimiento en elaboración y ejecución de proyectos.</li>
                    <li>Conocimiento en ejecución de inventariado físico.</li>
                    <li>Proactivo.</li>
                    <li>Conocimiento en funcionamiento de aplicaciones ofimáticas.</li>
                  </ul>
                </div>
              </div>
              <!--Card-->
            </div>
            <!--Grid column-->
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

  <h2 class="h1-responsive font-weight-bold my-5">Perfil del Equipo Auditor</h2>
  

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
          <h5>Especialista en Gestión de Proyectos</h5>
          <ul class="text-left">
            <li>Conocimiento en elaboración y ejecución de proyectos.</li>
            <li>Conocimiento en ejecución de inventariado físico.</li>
            <li>Proactivo.</li>
            <li>Conocimiento en funcionamiento de aplicaciones ofimáticas.</li>
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
          <h5>Especialista en Legislación informática</h5>
          <ul class="text-left">
            <li>Conocimiento de normas y leyes para el licenciamiento de software</li>
            <li>Conocimiento en reglamento y funciones de entidades públicas.</li>
            <li>Proactivo.</li>
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
          <hr>
          <h5>Especialista en Ofimática</h5>
          <ul class="text-left">
            <li>Conocimiento de funcionalidades de aplicaciones ofimáticas.</li>
            <li>Conocimiento en elaboración de informes y cronogramas de trabajo.</li>
            <li>Proactivo.</li>
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
          <hr>
          <h5>Especialista en Gestión de Proyectos</h5>
          <ul class="text-left">
            <li>Conocimiento del uso de la herramienta XPCSPYP.exe</li>
            <li>Conocimiento en elaboración de inventarios con la herramienta OCS Inventory.</li>
            <li>Proactivo.</li>
          </ul>
        </div>
      </div>
    </div>
   </div>

</section>
-->