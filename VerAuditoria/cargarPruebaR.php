
<?php 
	$IdPrueba=$_POST['id_prueba'];
	include("..//conexion.php");
	
 	$sql = "SELECT * FROM pruebaCumplimientoRealizada pr JOIN pruebaCumplimiento pc ON pr.IdPrueba=pc.IdPrueba WHERE pr.IdPruebaRealizada='".$IdPrueba."'";
	$sql=$conexion->query($sql);

	 while($row=mysqli_fetch_array($sql))
	 	{	
	 		$respuestas=explode(",", $row["Respuestas"]);
	 		$ID=$row["IdPrueba"];
	 		$porc=$row["PorcG"];
	 		$conteoGeneral=explode(",", $row["ConteoGeneral"]);
	 		$conteoIndividual=explode(",", $row["ConteoIndividual"]);
	 		$normasGenerales=explode(",", $row["Normas"]);

	 		 ?>
	 			<div class="modal-header">
				            <h4 class="modal-title w-100" id="myModalLabel"><?php echo $row["Nombre"]; ?></h4>
				            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
				              <span aria-hidden="true">&times;</span>
				            </button>
				 </div>

				 <div class="row">
				 	<div class="text-left col-md-6 mt-2">

						 	<label for="Auditado">Auditado</label>
							<input disabled=""   type="text" class="form-control"  id="Auditado" name="Auditado" value="<?php echo $row['Auditado'] ?>">
						
				 	</div>

				 	<div class="text-left col-md-4 mt-2">
				 		  <label for="date">Fecha de ejecución</label>
						  <input disabled="" type="text" id="date" class="form-control datepicker" name="date" value="<?php echo $row['FechaEjecucion'] ?>">
						 
						
				 	</div>
				 </div>

				  <hr>
				
				<div class="row">
				 	<div class="text-left col-md-12 mt-2">
				 		
						 	<label for="institucion">Institución</label>
							<input disabled=""  type="text" class="form-control" id="institucion" name="institucion" value="<?php echo $row['institucion'] ?>">
						
				 	</div>
				 </div>

				 <hr>

				<div class="row">
		                <div class=" col-md-5">
		                  Marco Normativo
		                </div>
		                <div class=" col-md-7">
		                  <ul>
		                  		<?php 

		                  		$normas=explode(",", $row["Normas"]);
		                  		?>

		                  			 
		                  		<?php


		                  		foreach ($normas as $key => $value) {
		                  			?>
		                  				 <li><?php echo $value; ?></li>
		                  				
		                  			<?php
		                  		}

		                  		 ?> 
		                    </ul>
		                </div>
            	</div>
            	 <hr>

            <div class="row grey darken-1 white-text">
                <div class=" col-md-8 white-text">
                  Pregunta
                </div>
                <div class=" col-md-4 white-text">
                  Respuesta
                </div>
            </div>
            <hr>
		
            <?php 
            	$sql = "SELECT * FROM detallepruebacumplimiento WHERE IdPrueba='".$ID."'";
				$sql=$conexion->query($sql);
				$cont=1;

				 while($row=mysqli_fetch_array($sql))
				 	{
				 			echo $cont.". ".$row[2];
				 			echo "<br><br>Normas Relacionadas<br>";
				 			$listanormas = split(',',$row[3]);
				 			$cond = true;
				 			
				 			foreach ($listanormas as $item) {
				 				if (strlen($item) > 0){
				 					echo "<li>$item </li><br>";
				 					$cond = false;

				 					
				 				}
				 			} 
				 			if ($cond)
				 				echo "No se han registrado normas para esta pregunta";
				 			?>
						<div class="row ">
			                <div class="col-md-5">
			                </div>
			                <div class="col-md-3">
			                  Cumple(Si/No):
			                </div>
			                <div class="col-md-4">
			                    <div class="container-fluid">
			                      <div class="row align-items-center" style="height: 100%;">
			                            <div class="form-check">
			                              <input type="checkbox" class="form-check-input" id="<?php echo "a".$row[0]; ?>"  value="1" 
			                              	<?php if($respuestas[$cont-1]==1) echo "checked"; ?>
			                             disabled >
			                              <label class="form-check-label" for="<?php echo "a".$row[0]; ?>">Si</label>
			                            </div>
			                            <div class="form-check">
			                              <input type="checkbox" class="form-check-input" id="<?php echo "b".$row[0]; ?>"   value="0"
			                             	 <?php if($respuestas[$cont-1]==0) echo "checked"; ?>
			                              disabled>
			                              <label class="form-check-label" for="<?php echo "b".$row[0]; ?>"s>No</label>
			                            </div>
			                      </div>
			                    </div>
			                </div>

			            </div>
		            	<hr>

			             
				 			<?php $cont++;
				 	}
             ?>
             <div class="row">
	            <div class='col-md-4'></div>
	            <div class='col-md-3'><span id='PORCENTAJE'>Grado general de cumplimiento:<?php echo $porc; ?>%</span></div>
	            <div class='progress col-md-5'>
				  <div id='PROGRESO' class="progress-bar progress-bar-success progress-bar-striped active" role="progressbar" style="width: <?php echo $porc; ?>%" aria-valuenow="<?php echo $porc; ?>" aria-valuemin="0" aria-valuemax="100"> </div>
				</div>


             </div>

             <hr>
             <h6>Grado de cumplimiento por norma:</h6>
             <div id="Contenedor">
             	
             </div>

             <div id="ContenedorRespuesta">
             	<?php 
             		
             		for ($i=0; $i < sizeof($normasGenerales) ; $i++) { 
             			$porc=100*($conteoIndividual[$i]/$conteoGeneral[$i]);
             			
             			?>
             			<div class='row'>
             				<?php echo $normasGenerales[$i]; ?>
             			</div>

             			<div class='row'>
             				<div class="progress col-md-6">
             					 <div id='<?php echo $normasGenerales[$i]; ?>' class="progress-bar progress-bar-success progress-bar-striped active" role="progressbar" style="width: <?php echo $porc; ?> %" aria-valuenow="<?php echo $porc; ?>" aria-valuemin="0" aria-valuemax="100">
             					 	
             					 </div> 
             				</div>
             			</div>

             			<div class='row'>
             				<?php echo $porc; ?>%
             			</div>

             			<br>

             				<?php

             		}

             		
             	 ?>
             </div>

	 		<?php
	 	}

 ?>


 
