
					<?php 
						include("..//conexion.php");
						$IdPregunta=$_POST["IdPregunta"];
						$sql = "SELECT Pregunta, Respuesta FROM detallepruebacumplimiento WHERE IdDetalle=$IdPregunta LIMIT 1";
						$sql = $conexion->query($sql);
							while($row=mysqli_fetch_array($sql))
							{
								
					?>
		 					<div class=" col-md-8" id="Pregunta">
				                  <?php echo $row[0]; ?>
				            </div>

				            <div class=" col-md-4" id="Respuesta">
				                	<div class="container-fluid">
				                      <div class="row align-items-center" style="height: 100%;">
				                            <div class="form-check">
				                              <input type="checkbox" class="form-check-input" id="1" 
				                              	<?php 
				                              		switch ($row[1]) {
				                              		 	case 1:
				                              		 		echo "checked";
				                              		 		break;
				                              		 	
				                              		 	case 0:
				                              		 		echo "disabled";
				                              		 		break;
				                              		 } 
				                              	 ?>
				                              >
				                              <label class="form-check-label" for="1">Si</label>
				                            </div>
				                            <div class="form-check">
				                              <input type="checkbox" class="form-check-input" id="2"
				                              	<?php 
				                              		switch ($row[1]) {
				                              		 	case 0:
				                              		 		echo "checked";
				                              		 		break;
				                              		 	
				                              		 	case 1:
				                              		 		echo "disabled";
				                              		 		break;
				                              		 } 
				                              	 ?>
				                               >
				                              <label class="form-check-label" for="2">No</label>
				                            </div>
				                      </div>
				                    </div>
				             </div>

					<?php
							}

					?>
								  
