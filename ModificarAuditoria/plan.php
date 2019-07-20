<?php 
    include("..//conexion2.php");
    $id = $_SESSION['id'];
    $sql = "select * from planificacion where IdAuditoria = $id order by IdPlanificacion desc";
    $res = $conexion -> query($sql);
    $Plan = $res->fetchAll(PDO::FETCH_OBJ);
    $Plan = $Plan[0];
 ?>

<!--Carousel Wrapper-->
<div id="plan" class="carousel slide carousel-fade" data-ride="carousel" >
 
  <!--/.Indicators-->
  <!--Slides-->
  <div class="carousel-inner" role="listbox">
    <!--First slide-->
    <div class="carousel-item active">
      <div class="d-block w-100">
          <div class="container" style="padding-top: 50px;">
              
             <div class=" row">
                <div class="col-md-12">
                   <div class="form-group">
                    <label for="General">Objetivo General</label>
                    <textarea class="form-control" id="General" rows="2" id="Plan_OGeneral" name="Plan_OGeneral" form="formularioPlan"><?php echo $Plan->ObjGeneral ?></textarea>
                  </div>
               </div>
             </div>

             <div class="row">
               <div class="col-md-12">
                   <div class="form-group">
                    <label for="Específicos">Objetivos Específicos</label>
                    <textarea class="form-control" id="Específicos" rows="2" id="Plan_Oespecifico" name="Plan_Oespecifico" form="formularioPlan"><?php echo $Plan->ObjEspecifico ?></textarea>
                  </div>
               </div>
             </div>

             <div class="row">
               <div class="col-md-12">
                   <div class="form-group">
                    <label for="Alcance">Alcance</label>
                    <textarea class="form-control" id="Alcance" rows="2" id="Plan_Alcance" name="Plan_Alcance" form="formularioPlan"><?php echo $Plan->Alcance ?></textarea>
                  </div>
               </div>
             </div>

             <br>
             <h3>Aclaraciones</h3>
             <hr>
              <div class="row">
               <div class="col-md-12">
                   <div class="form-group">
                    <label for="Realizará">¿Qué se Realizará?</label>
                    <textarea class="form-control" id="Realizará" rows="2" id="Plan_Realizar" name="Plan_Realizar" form="formularioPlan"><?php echo $Plan->Realizar ?></textarea>
                  </div>
               </div>
             </div>

             <div class="row">
               <div class="col-md-12">
                   <div class="form-group">
                    <label for="NRealizará">¿Qué no se Realizará?</label>
                    <textarea class="form-control" id="NRealizará" rows="2" id="Plan_NoRealizar" name="Plan_NoRealizar" form="formularioPlan"><?php echo $Plan->NoRealizar ?></textarea>
                  </div>
               </div>
             </div>

             <div class="row">
               <div class="col-md-12">
                   <div class="form-group">
                    <label for="Limitaciones">Limitaciones</label>
                    <textarea class="form-control" id="Limitaciones" rows="2" id="Plan_Limitaciones" name="Plan_Limitaciones" form="formularioPlan"><?php echo $Plan->Limitaciones ?></textarea>
                  </div>
               </div>
             </div>


          </div>
      </div>
      
    </div>
    <!--/First slide-->
    

  </div>
  <!--/.Slides-->
  
</div>
<!--/.Carousel Wrapper-->

