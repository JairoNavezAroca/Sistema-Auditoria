
<?php 
if(isset($_POST["Auditado"])) 
{

  $Auditado=$_POST["Auditado"];
  $Fecha=$_POST["date"];
  $institucion=$_POST["institucion"];
  $idPrueba=$_POST["idPrueba"];
  
  $respuesta;
  $idPruebaRealizada;
  $observacion;
include("..//conexion.php");

  $sql = "INSERT INTO PruebaCumplimientoRealizada(Auditado,FechaEjecucion,institucion,IdPrueba) VALUES('".$Auditado."','".$Fecha."','".$institucion."','".$idPrueba."')";
   if($conexion->query($sql)){

       $sql = "SELECT * FROM PruebaCumplimientoRealizada ORDER BY IdPruebaRealizada DESC LIMIT 1";
       $sql=$conexion->query($sql);
       $row=mysqli_fetch_array($sql);
       $idPruebaRealizada=$row[0];
       
             $sql1= "SELECT * FROM detallepruebacumplimiento WHERE IdPrueba='".$_POST["idPrueba"]."'";
             $sql1=$conexion->query($sql1);


                 while($row1=mysql_fetch_array($sql1))
                   {
                    
                    ?>  
                          <script>alert("d2323");</script>
                    <?php

                   if(isset($_POST['a'.$row1[0]]))$respuesta=1;
                   else $respuesta=0;

                   if(isset($_POST['o'.$row1[0]]))$observacion=$_POST['o'.$row1[0]];
                   else $observacion=" ";
                    
                     $sql = "INSERT INTO DetallePruebaCumplimientoRealizada(IdPruebaRealizada,IdPregunta,Respuesta,Observacion)VALUES('".$idPruebaRealizada."','".$row1[0]."','".$respuesta."','".$observacion."')";
                     if($conexion->query($sql))
                     {
                        ?>  
                          <script>alert("dd");</script>
                        <?php
                     } 
                     else
                     {
                      ?>  
                          <script>alert("dd3");</script>
                        <?php
                     }

                  }

                  ?>  
                          <script>alert("nada");</script>
                        <?php

         
       }

     }

  ?>
       



<?php 
  /*
      $sentencia = $base_de_datos->query("SELECT * FROM productos;");
      $productos = $sentencia->fetchAll(PDO::FETCH_OBJ);


      foreach($productos as $producto)
  */

  include("..//conexion2.php");
  $IdAuditoria = $_GET['id'];
  session_start();
  $_SESSION['id'] = $_GET['id'];
  /**/
  $res = $conexion->query("select * from auditoria where IdAuditoria = $IdAuditoria");
  $Auditoria = $res->fetchAll(PDO::FETCH_OBJ);
  $Auditoria = $Auditoria[0];




//  echo '<br><br><br><br><br><br>';
//  echo $Auditoria->Titulo;
    echo '<br>';
 ?>


<style type="text/css">
  
  .asideL{
    background: #3f51b5  !important;
  }
  .asideL:hover{
    background: #283593 !important;
  }
  .itemL:hover{
    border-left: solid orange 5px !important; 
    height: 100% !important;
  }
</style>

<div class="container-fluid">
      <div class="row">
                      <!--ASIDE-->
            <div style="height: 95vh;  overflow: auto; border-right: solid rgba(1,1,1,0.2) 3px !important;" class="pt-5 px-0 mx-0 col-md-3 d-xl-block d-none">
                    <!--Accordion wrapper-->
                <div class="accordion md-accordion" id="accordionEx" role="tablist" aria-multiselectable="true">

                  <!-- Accordion card -->
                  <div class="card">

                    <!-- Card header -->
                    <div class="card-header border  asideL" role="tab" id="headingOne1">
                      <a data-toggle="collapse" data-parent="#accordionEx" href="#collapseOne1" aria-expanded="true"
                        aria-controls="collapseOne1" class=" white-text " style="">
                        <h5 class="mb-0 font-weight-bold ">
                          I. Datos Generales<i class="fas fa-angle-down rotate-icon"></i>
                        </h5>
                      </a>
                    </div>

                    <!-- Card body -->
                    <div id="collapseOne1" class="collapse show" role="tabpanel" aria-labelledby="headingOne1" data-parent="#accordionEx">

                      <div role="tab" class="border tab" style="cursor: pointer;" onclick="LaFuncionMagica('Generalidades.php')">
                          <div style="border-left: solid white 5px; height: 100%;" class="itemL">
                            <h5 class="pl-4 py-1">Generalidades</h5>
                          </div>
                      </div>

                      <div role="tab" class="border tab" style="cursor: pointer;" onclick="LaFuncionMagica('Organigrama.php')">
                          <div style="border-left: solid white 5px; height: 100%;" class="itemL">
                            <h5 class="pl-4 py-1">Organigráma</h5>
                          </div>
                      </div>

                     <div role="tab" class="border tab" style="cursor: pointer;" onclick="LaFuncionMagica('Problematica.php')">
                          <div style="border-left: solid white 5px; height: 100%;" class="itemL">
                            <h5 class="pl-4 py-1">Realidad Probemática</h5>
                          </div>
                      </div>
                    </div>

                  </div>
                  <!-- Accordion card -->

                  <!-- Accordion card -->
                  <div class="card">

                    <!-- Card header -->
                    <div class="card-header border  asideL" role="tab" id="headingOne2">
                      <a data-toggle="collapse" data-parent="#accordionEx" href="#collapseOne2" aria-expanded="false"
                        aria-controls="collapseOne2" class=" white-text " style="">
                        <h5 class="mb-0 font-weight-bold ">
                          II.Información de la Auditoria<i class="fas fa-angle-down rotate-icon"></i>
                        </h5>
                      </a>
                    </div>

                    <!-- Card body -->
                    <div id="collapseOne2" class="collapse " role="tabpanel" aria-labelledby="headingOne2" data-parent="#accordionEx">
                      <div role="tab" class="border tab" style="cursor: pointer;"onclick="LaFuncionMagica('Objetos.php')">
                          <div style="border-left: solid white 5px; height: 100%;" class="itemL">
                            <h5 class="pl-4 py-1">Identificación de los Objetos auditables</h5>
                          </div>
                      </div>

                      <div role="tab" class="border tab" style="cursor: pointer;" onclick="LaFuncionMagica('Normas.php')">
                          <div style="border-left: solid white 5px; height: 100%;" class="itemL">
                            <h5 class="pl-4 py-1">Marco Normativo/Referencial aplicable</h5>
                          </div>
                      </div>
                    </div>
                  <!-- Accordion card -->

                  <!-- Accordion card -->
                  <div class="card">

                    <!-- Card header -->
                    <div class="card-header border  asideL" role="tab" id="headingOne3">
                      <a data-toggle="collapse" data-parent="#accordionEx" href="#collapseOne3" aria-expanded="false"
                        aria-controls="collapseOne3" class=" white-text " style="">
                        <h5 class="mb-0 font-weight-bold ">
                          III.Análisis de Riesgos<i class="fas fa-angle-down rotate-icon"></i>
                        </h5>
                      </a>
                    </div>

                    <!-- Card body -->
                    <div id="collapseOne3" class="collapse " role="tabpanel" aria-labelledby="headingOne3" data-parent="#accordionEx">
                      <div role="tab" class="border tab" style="cursor: pointer;" onclick="LaFuncionMagica('Activos.php')">
                          <div style="border-left: solid white 5px; height: 100%;" class="itemL">
                            <h5 class="pl-4 py-1">Activos de la Empresa</h5>
                          </div>
                      </div>

                      <div role="tab" class="border tab" style="cursor: pointer;" onclick="LaFuncionMagica('Riesgos.php')">
                          <div style="border-left: solid white 5px; height: 100%;" class="itemL">
                            <h5 class="pl-4 py-1">Identificación de Riesgos</h5>
                          </div>
                      </div>

                    </div>

                  </div>
                  <!-- Accordion card -->


                  <!-- Accordion card -->
                  <div class="card">

                    <!-- Card header -->
                    <div class="card-header border  asideL" role="tab" id="headingOne4">
                      <a data-toggle="collapse" data-parent="#accordionEx" href="#collapseOne4" aria-expanded="false"
                        aria-controls="collapseOne4" class=" white-text " style="">
                        <h5 class="mb-0 font-weight-bold ">
                          IV.Plan de auditoria<i class="fas fa-angle-down rotate-icon"></i>
                        </h5>
                      </a>
                    </div>

                    <!-- Card body -->
                    <div id="collapseOne4" class="collapse " role="tabpanel" aria-labelledby="headingOne4" data-parent="#accordionEx">
                      <div role="tab" class="border tab" style="cursor: pointer;" onclick="LaFuncionMagica('ObjGeneral.php')">
                          <div style="border-left: solid white 5px; height: 100%;" class="itemL">
                            <h5 class="pl-4 py-1">Objetivo general</h5>
                          </div>
                      </div>

                      <div role="tab" class="border tab" style="cursor: pointer;" onclick="LaFuncionMagica('ObjEspecificos.php')">
                          <div style="border-left: solid white 5px; height: 100%;" class="itemL">
                            <h5 class="pl-4 py-1">Objetivos Específicos</h5>
                          </div>
                      </div>

                       <div role="tab" class="border tab" style="cursor: pointer;" onclick="LaFuncionMagica('Alineamiento.php')">
                          <div style="border-left: solid white 5px; height: 100%;" class="itemL">
                            <h5 class="pl-4 py-1">Alineamiento de la auditoria a la estrategia del negocio</h5>
                          </div>
                      </div>

                       <div role="tab" class="border tab" style="cursor: pointer;"  onclick="LaFuncionMagica('Alcance.php')">
                          <div style="border-left: solid white 5px; height: 100%;" class="itemL">
                            <h5 class="pl-4 py-1">Alcance</h5>
                          </div>
                      </div>

                       <div role="tab" class="border tab" style="cursor: pointer;" onclick="LaFuncionMagica('Aclaraciones.php')">
                          <div style="border-left: solid white 5px; height: 100%;" class="itemL">
                            <h5 class="pl-4 py-1">Aclaraciones</h5>
                          </div>
                      </div>

                      <div role="tab" class="border tab" style="cursor: pointer;" onclick="LaFuncionMagica('Limitaciones.php')">
                          <div style="border-left: solid white 5px; height: 100%;" class="itemL">
                            <h5 class="pl-4 py-1">Limitaciones</h5>
                          </div>
                      </div>

                      <div role="tab" class="border tab" style="cursor: pointer;" onclick="LaFuncionMagica('Perfil.php')">
                          <div style="border-left: solid white 5px; height: 100%;" class="itemL">
                            <h5 class="pl-4 py-1">Perfil del equipo de auditoria</h5>
                          </div>
                      </div>

                      <div role="tab" class="border tab" style="cursor: pointer;" onclick="LaFuncionMagica('Roles.php')">
                          <div style="border-left: solid white 5px; height: 100%;" class="itemL">
                            <h5 class="pl-4 py-1">Asignación de Roles</h5>
                          </div>
                      </div>

                      <div role="tab" class="border tab" style="cursor: pointer;" onclick="LaFuncionMagica('PlanProyecto.php')">
                          <div style="border-left: solid white 5px; height: 100%;" class="itemL">
                            <h5 class="pl-4 py-1">Plan de Proyectos</h5>
                          </div>
                      </div>

                      <div role="tab" class="border tab" style="cursor: pointer;" onclick="LaFuncionMagica('PlanEntregable.php')">
                          <div style="border-left: solid white 5px; height: 100%;" class="itemL">
                            <h5 class="pl-4 py-1">Plan de Entregables</h5>
                          </div>
                      </div>

                    </div>

                  </div>
                  <!-- Accordion card -->


                  <!-- Accordion card -->
                  <div class="card">

                    <!-- Card header -->
                    <div class="card-header border  asideL" role="tab" id="headingOne5">
                      <a data-toggle="collapse" data-parent="#accordionEx" href="#collapseOne5" aria-expanded="false"
                        aria-controls="collapseOne5" class=" white-text " style="">
                        <h5 class="mb-0 font-weight-bold ">
                          V.Diseño de Intrumentos<i class="fas fa-angle-down rotate-icon"></i>
                        </h5>
                      </a>
                    </div>

                    <!-- Card body -->
                    <div id="collapseOne5" class="collapse " role="tabpanel" aria-labelledby="headingOne5" data-parent="#accordionEx">
                      <div role="tab" class="border tab" style="cursor: pointer;" onclick="LaFuncionMagica('PruebasCumplimiento.php')">
                          <div style="border-left: solid white 5px; height: 100%;" class="itemL">
                            <h5 class="pl-4 py-1">Pruebas de Cumplimiento</h5>
                          </div>
                      </div>

                      <div role="tab" class="border tab" style="cursor: pointer;" onclick="LaFuncionMagica('PruebasSustantivas.php')">
                          <div style="border-left: solid white 5px; height: 100%;" class="itemL">
                            <h5 class="pl-4 py-1">Pruebas Sustantivas</h5>
                          </div>
                      </div>

                    </div>

                  </div>
                  <!-- Accordion card -->

                  <!-- Accordion card -->
                  <div class="card">

                    <!-- Card header -->
                    <div class="card-header border  asideL" role="tab" id="headingOne6">
                      <a data-toggle="collapse" data-parent="#accordionEx" href="#collapseOne6" aria-expanded="false"
                        aria-controls="collapseOne6" class=" white-text " style="">
                        <h5 class="mb-0 font-weight-bold ">
                          VI. Pruebas Realizadas<i class="fas fa-angle-down rotate-icon"></i>
                        </h5>
                      </a>
                    </div>

                    <!-- Card body -->
                    <div id="collapseOne6" class="collapse " role="tabpanel" aria-labelledby="headingOne6" data-parent="#accordionEx">
                      <div role="tab" class="border tab" style="cursor: pointer;" onclick="LaFuncionMagica('PruebasCumplimientoR.php')">
                          <div style="border-left: solid white 5px; height: 100%;" class="itemL">
                            <h5 class="pl-4 py-1">Pruebas de Cumplimiento</h5>
                          </div>
                      </div>

                      <div role="tab" class="border tab" style="cursor: pointer;" onclick="LaFuncionMagica('PruebasSustantivasR.php')">
                          <div style="border-left: solid white 5px; height: 100%;" class="itemL">
                            <h5 class="pl-4 py-1">Pruebas Sustantivas</h5>
                          </div>
                      </div>

                    </div>

                  </div>
                  <!-- Accordion card -->

                    <!-- Accordion card -->
                  <div class="card">

                    <!-- Card header -->
                    <div class="card-header border  asideL" role="tab" id="headingOne7">
                      <a data-toggle="collapse" data-parent="#accordionEx" href="#collapseOne7" aria-expanded="false"
                        aria-controls="collapseOne7" class=" white-text " style="">
                        <h5 class="mb-0 font-weight-bold ">
                          VII. Generar Reporte<i class="fas fa-angle-down rotate-icon"></i>
                        </h5>
                      </a>
                    </div>

                    <!-- Card body -->
                    <div id="collapseOne7" class="collapse " role="tabpanel" aria-labelledby="headingOne7" data-parent="#accordionEx">
                      <div role="tab" class="border tab" style="cursor: pointer;" >
                          <div style="border-left: solid white 5px; height: 100%;" class="itemL">
                            <a class="pl-4 py-1" href="../phpword/Templatee.php"> Datos de la auditoria</a>
                          </div>
                      </div>

                      <div role="tab" class="border tab" style="cursor: pointer;" onclick="LaFuncionMagica('PruebasSustantivasR.php')">
                          <div style="border-left: solid white 5px; height: 100%;" class="itemL">
                            <h5 class="pl-4 py-1"></h5>
                          </div>
                      </div>

                    </div>

                  </div>
                  <!-- Accordion card -->

                </div>
                <!-- Accordion wrapper -->
            </div>
            </div>




                          <!--MENU PRINCIPAL-->
              <div class="pt-5 mx-0 px-0 col-xl-9 col-md-12" style=" overflow:auto; height: 95vh;">
                
                  <div class="container" id="contenedor">
                    <img src="../Recursos/img/coar.jpg" width="100%">
                  </div>
              </div>

      </div>
</div>








<script>
// Data Picker Initialization



                var consulta="";
               var consultajax = $.ajax({});
               var error = true;
               

      function LaFuncionMagica(enlace){
        if(consultajax && consultajax.readyState != 4) { 
              error = false;
              consultajax.abort();
        }
        error = true;    
        opcion = 1;
        consultajax = $.ajax({
              type: "POST",
              url: enlace,
              data: "a="+opcion,
              dataType: "html",
              beforeSend: function(){
               $("#contenedor").html("<br><br><div style='width: 3rem; height: 3rem;' class='spinner-grow text-success' role='status'><span class='sr-only'>Loading...</span></div>");
               console.log("cargando");
                          },
              error: function(){
                if(error)
                  alert("error peticion ajax");
              },
              success: function(data){
              $("#contenedor").empty();
              $("#contenedor").append(data);
              }
        });
      }

        function MostrarContenidoPrueba(){
        if(consultajax && consultajax.readyState != 4) { 
              error = false;
              consultajax.abort();
        }
        error = true;    
        opcion =document.getElementById('parametro').value;
        consultajax = $.ajax({
              type: "POST",
              url: 'cargarPrueba.php',
              data: "id_prueba="+opcion,
              dataType: "html",
              beforeSend: function(){
               $("#cajaPreguntas").html("<br><br><div style='width: 3rem; height: 3rem;' class='spinner-grow text-success' role='status'><span class='sr-only'>Loading...</span></div>");
               console.log("cargando");
                          },
              error: function(){
                if(error)
                  alert("error peticion ajax");
              },
              success: function(data){
              $("#cajaPreguntas").empty();
              $("#cajaPreguntas").append(data);
              }
        });
      }
</script>



