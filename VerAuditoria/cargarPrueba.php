<form id="formularioX" method="POST" >

<?php 


	$IdPrueba=$_POST['id_prueba'];
	include("..//conexion.php");
	
 	$sql = "SELECT Nombre,Normas FROM pruebaCumplimiento WHERE IdPrueba='".$IdPrueba."'";
	$sql=$conexion->query($sql);

	 while($row=mysqli_fetch_array($sql))
	 	{	$normas=$row[1];
	 		?>
	 			<div class="modal-header">
				            <h4 class="modal-title w-100" id="myModalLabel">P<?php echo $IdPrueba.'. '.$row[0]; ?></h4>
				            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
				              <span aria-hidden="true">&times;</span>
				            </button>
				 </div>

				 <input form="formularioX" class="d-none" type="text" id="<?php echo $IdPrueba; ?>" value="<?php echo $IdPrueba; ?>" name="idPrueba">

				 <div class="row">
				 	<div class="text-left col-md-6 mt-2">

						 	<label for="Auditado">Auditado</label>
							<input type="text" class="form-control"  id="Auditado" name="Auditado" form="formularioX" required="">
						
				 	</div>

				 	<div class="text-left col-md-4 mt-2">
				 		  <label for="date">Fecha de ejecución</label>
						  <input type="date" id="date" class="form-control datepicker" form="formularioX" name="date" required="">
						 
						
				 	</div>
				 </div>
				
				 <hr>
				
				<div class="row">
				 	<div class="text-left col-md-12 mt-2">
				 		
						 	<label for="institucion">Institución</label>
							<input type="text" class="form-control" id="institucion" name="institucion" form="formularioX" required="">
						
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

		                  		$normas=explode(",", $normas);

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
                <div class=" col-md-5 white-text">
                  Pregunta
                </div>
                <div class=" col-md-3 white-text">
                  Respuesta
                </div>
                <div class=" col-md-4 white-text">
                  Observación
                </div>
            </div>
            <hr>

            <?php 
            	$sql = "SELECT * FROM detallepruebacumplimiento WHERE IdPrueba='".$IdPrueba."'";
				$sql=$conexion->query($sql);
				$cont=1;

				 while($row=mysqli_fetch_array($sql))
				 	{
				 			
				 			?>
				<div class="row ">
	                <div class=" col-md-5">
	                  	<?php echo $cont.". ".$row[2]; ?>
	                </div>
	                <input form="formularioX" class="d-none" type="text" id="<?php echo $row[0]; ?>" value="<?php echo $row[0]; ?>" name="<?php echo $row[0]; ?>">
	                <div class=" col-md-3">
	                    <div class="container-fluid">
	                      <div class="row align-items-center" style="height: 100%;">
	                            <div class="form-check">
	                              <input type="checkbox" class="form-check-input" id="<?php echo "a".$row[0]; ?>"  form="formularioX" name="<?php echo "a".$row[0]; ?>">
	                              <label class="form-check-label" for="<?php echo "a".$row[0]; ?>">Si</label>
	                            </div>
	                            <div class="form-check">
	                              <input type="checkbox" class="form-check-input" id="<?php echo "b".$row[0]; ?>" form="formularioX" name="<?php echo "b".$row[0]; ?>">
	                              <label class="form-check-label" for="<?php echo "b".$row[0]; ?>">No</label>
	                            </div>
	                      </div>
	                    </div>
	                </div>
	                <div class="col-md-4">
	                	<input type="text" class="form-control" id="<?php echo "o".$row[0]; ?>" name="<?php echo "o".$row[0]; ?>" form="formularioX">
	                </div>

	            </div>

            	<hr>
				 			<?php $cont++;
				 	}
             ?>
            
	 		<?php
	 	}
 ?>
 <button type="submit" form="formularioX"></button>
</form>

