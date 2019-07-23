<?php 
	$IdPrueba=$_POST['id_prueba'];
	include("..//conexion.php");
 	$sql = "select * from DetallePruebaSustantiva dps join PruebaSustantiva ps on ps.IdPrueba = dps.IdPrueba where ps.IdPrueba = $IdPrueba";
	$sql=$conexion->query($sql);
	$cond = true;
	 while($row=mysqli_fetch_array($sql))
	 {	
	 		if ($cond){
	 			$cond = false;
	 			echo "<h3>$row[7]</h3><hr>";
	 		?>
				<div class="row grey darken-1 white-text">
	                <div class=" col-md-8 white-text">
	                  Pregunta
	                </div>
	                <div class=" col-md-4 white-text">
	                  Respuesta 
	                </div>
	            </div>
	            <hr>
	            <div class="row ">
	                <div class=" col-md-8">
	                	<?php 
	                	$sql2 = "select * from detallepruebacumplimiento dpc join pruebasustantiva ps on ps.idpregunta = dpc.iddetalle where ps.idprueba = $IdPrueba";
						$sql2=$conexion->query($sql2);
						$row2=mysqli_fetch_array($sql2);
						echo $row2[2];
	                	 ?>
	                </div>
	                <div class=" col-md-4">
	                    <div class="container-fluid">
	                      <div class="row align-items-center" style="height: 100%;">
	                          <div class="form-check">
	                              <input type="checkbox" class="form-check-input" id="1b" checked="" >
	                              <label class="form-check-label" for="1b">Si</label>
	                           </div>
	                           <div class="form-check">
	                              <input type="checkbox" class="form-check-input" id="2b" >
	                              <label class="form-check-label" for="2b">No</label>
	                           </div>
	                      </div>
	                    </div>
	                </div>
            	</div>
            <hr>
	 	<?php 	
	 	}
	 }
	 $sql = "select * from DetallePruebaSustantiva dps join PruebaSustantiva ps on ps.IdPrueba = dps.IdPrueba join auditor a on a.IdAuditor = ps.IdAuditor where ps.IdPrueba = $IdPrueba";
	$sql=$conexion->query($sql);
	$cond = true;
	?>
 			<div class="row grey darken-1 white-text">
                <div class=" col-md-8 white-text">
                  Pruebas Sustantivas
                </div>
                <div class=" col-md-4 white-text">
                  Responsable
                </div>
            </div>
            <div class="row">
                <div class=" col-md-8 ">
                  <ol>
	<?php

	 while($row=mysqli_fetch_array($sql)){
	 	echo "<li>$row[2]</li>";
	 }
	 ?>
                  </ol>
                </div>
                <div class=" col-md-4">
                  <?php 
	 				$sql = "select * from DetallePruebaSustantiva dps join PruebaSustantiva ps on ps.IdPrueba = dps.IdPrueba join auditor a on a.IdAuditor = ps.IdAuditor where ps.IdPrueba = $IdPrueba";
					$sql=$conexion->query($sql);
					$cond = true;
					while($row=mysqli_fetch_array($sql)){
		                if ($cond){
		                	echo "$row[10] $row[11]";
							$cond = false;
		                }
					 }
                  ?>
                </div>
            </div>
	 <?php 
 ?>