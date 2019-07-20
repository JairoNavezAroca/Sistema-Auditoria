<!--Carousel Wrapper-->
<div id="roles" class="carousel slide carousel-fade" data-ride="carousel" >
 
  <!--/.Indicators-->
  <!--Slides-->
  <div class="carousel-inner" role="listbox">
    <!--First slide-->
    <div class="carousel-item active">
      <div class="d-block w-100">
          <div class="container" style="padding-top: 50px;">
              
             
<!-- Editable table -->
<div class="">
  <div class="">
    <div id="table" class="table-editable">
      <table class="table table-bordered table-responsive-md table-striped text-center">
        <thead>
          <tr>
            <th class="text-center">Equipo</th>
            <th class="text-center">Rol</th>
          </tr>
        </thead>
        <tbody>
          <?php 
            $auditoria = $_SESSION['id'];
            include("..//conexion.php");
            $res = $conexion -> query("select * from DetalleAuditores,Auditor where IdAuditoria = $auditoria and DetalleAuditores.IdAuditor = Auditor.IdAuditor");
            while($row = mysqli_fetch_row($res)){
            $IdDetalle = $row[0];
            $NombreAditor = "$row[5] $row[6]";
            ?>
              <tr>
                  <td class="pt-3-half"><?php echo $NombreAditor ?></td>
                  <td class="pt-3-half" contenteditable="true">
                    <select class="browser-default custom-select" name="<?php echo "Roles[]" ?>" id="Roles" form="formularioRoles">
                      <option selected disabled="">Roles</option>
                      <?php 
                        $res2 = $conexion -> query("select * from rol");
                        while($row2 = mysqli_fetch_row($res2)){
                          $IdRol = $row2[0];
                          $value = "$IdDetalle.$IdRol";
                          $descripcion2 = $row2[1];
                          ?>
                            <option value="<?php echo $value ?>"><?php echo $descripcion2 ?></option>
                          <?php 
                        }
                       ?>
                    </select>
                  </td>
                </tr>
            <?php 
            }
           ?>
        </tbody>
      </table>
    </div>
  </div>
</div>
<!-- Editable table -->
          </div>
      </div>
      
    </div>
    <!--/First slide-->
    

  </div>
  <!--/.Slides-->
  
</div>
<!--/.Carousel Wrapper-->

