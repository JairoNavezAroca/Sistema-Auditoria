<?php 
  include("..//conexion.php");
  $sql = "select * from Auditoria order by IdAuditoria desc";
  $sql = $conexion->query($sql);
  ?>

<br><br><br>
<div class="container-fluid" >
  <div class="row justify-content-center align-items-center">
    <div class="container">
<br><br>

  <?php 
    while($row=mysqli_fetch_array($sql)){
      $id = $row['IdAuditoria'];
      $titulo = $row['Titulo'];
      $titulo = "$id - $titulo";
 ?>
  <div class="row justify-content-center align-items-center">
    <div class="col-md-6 text-right mt-2">
        <h4><?php echo $titulo ?></h4> 
    </div>
      <div class="col-md-2 text-center mt-2 pr-10">
         <a class="btn btn-success btn-block animated fadeInRight" href="../VerAuditoria/main.php?id=<?php echo $id?>"><i class="fas fa-eye ml-1" style=""></i> Ver</a>    
       </div>


        <div class="col-md-3 text-center mt-2 ">
         <a class="btn btn-blue btn-block animated fadeInRight" href="../ModificarAuditoria/main.php?id=<?php echo $id?>" ><i class="fas fa-user-cog ml-1" style=""></i> Modificar</a>    
       </div>
  </div>
<?php 
    }
 ?>

  <hr>
    </div>
  </div>


</div>