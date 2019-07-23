<script type="text/javascript">
			var normasGenerales=[];
			var totales =[];
			var normasPregunta=[];
			
			var conteoGeneral=[];
			var conteoIndividual=[];
		</script>

<?php 
	$IdPrueba=$_POST['id_prueba'];
	include("..//conexion.php");
	
 	$sql = "SELECT Nombre,Normas FROM pruebaCumplimiento WHERE IdPrueba='".$IdPrueba."'";
	$sql=$conexion->query($sql);


	 while($row=mysqli_fetch_array($sql))
	 	{	$normas=$row[1];
	 		?>
	 			<div class="modal-header">
				            <h4 class="modal-title w-100" id="myModalLabel"><?php echo $row[0]; ?></h4>
				            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
				              <span aria-hidden="true">&times;</span>
				            </button>
				 </div>

				<div class="row">
		                <div class=" col-md-5">
		                  Marco Normativo
		                </div>
		                <div class=" col-md-7">
		                  <ul>
		                  		<?php 

		                  		$normas=explode(",", $normas);
		                  		?>

		                  			 
		                  		<?php


		                  		foreach ($normas as $key => $value) {
		                  			?>
		                  				 <li><?php echo $value; ?></li>
		                  				<script>
		                  				 	normasGenerales.push("<?php echo $value ?>");
		                  				 	conteoGeneral.push(0);
		                  				 	conteoIndividual.push(0);
		                  				</script>
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
		<script type="text/javascript">
			var idpreguntas = [];
			var respuestas = [];
		</script>
            <?php 
            	$sql = "SELECT * FROM detallepruebacumplimiento WHERE IdPrueba='".$IdPrueba."'";
				$sql=$conexion->query($sql);
				$cont=1;

				 while($row=mysqli_fetch_array($sql))
				 	{
				 			echo $cont.". ".$row[2];
				 			echo "<br><br>Normas Relacionadas<br>";
				 			$listanormas = split(',',$row[3]);
				 			$cond = true;
				 			?> <script>var aux=[]; normasPregunta=aux;</script> <?php
				 			foreach ($listanormas as $item) {
				 				if (strlen($item) > 0){
				 					echo "<li>$item </li><br>";
				 					$cond = false;

				 					?>
				 						<script>
				 							normasPregunta.push("<?php echo $item; ?>");
				 						</script>
				 					<?php
				 				}
				 			} ?>  <script>totales.push(normasPregunta);</script> <?php
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
			                              <input type="checkbox" class="form-check-input" id="<?php echo "a".$row[0]; ?>"  onchange = 'evaluar();' value="1">
			                              <label class="form-check-label" for="<?php echo "a".$row[0]; ?>">Si</label>
			                            </div>
			                            <div class="form-check">
			                              <input type="checkbox" class="form-check-input" id="<?php echo "b".$row[0]; ?>"  onchange = 'evaluar();' value="0">
			                              <label class="form-check-label" for="<?php echo "b".$row[0]; ?>"s>No</label>
			                            </div>
			                      </div>
			                    </div>
			                </div>

			            </div>
		            	<hr>

			             <script type="text/javascript">
			             	idpreguntas.push(<?php echo $row[0] ?>);
			             	respuestas.push(<?php echo $row[4] ?>);
			             </script>
				 			<?php $cont++;
				 	}
             ?>
             <div class="row">
	            <div class='col-md-4'></div>
	            <div class='col-md-3'><span id='PORCENTAJE'>Porcentaje de cumplimiento: 0%</span></div>
	            <div class='progress col-md-5'>
				  <div id='PROGRESO' class="progress-bar progress-bar-success progress-bar-striped active" role="progressbar" style="width: 0%" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100"></div>
				</div>


             </div>

             <div id="Contenedor">
             	
             </div>


	 		<?php
	 	}

 ?>


 <script type="text/javascript">

 	function reinicia(){
 		for (var j = 0; j <conteoGeneral.length; j++){ 
 			conteoGeneral[j]=0;
 			conteoIndividual[j]=0;
 		}
 	}

 	function evaluar(){
 		reinicia();
 		//console.log(normasGenerales);
 		var puntaje = 0;
 		var tamaño = idpreguntas.length;
 		for (var i = 0; i < tamaño; i++) {

 			for (var j = 0; j < totales[i].length; j++){
 				var posNorma=normasGenerales.indexOf(totales[i][j]);
 					if(posNorma>-1)
 							conteoGeneral[posNorma]+=1;
 			}

 			//console.log(totales[i][0]);
 			var a = document.getElementById("a"+String(idpreguntas[i]));
 			var b = document.getElementById("b"+String(idpreguntas[i]));
 			if (a.checked && b.checked == true){
 				a.checked = false;
 				b.checked = false;
 			}
 			if (respuestas[i] == 1)
 				if (a.checked == true)
 				{
 					puntaje	+= 1;
 					for (var j = 0; j < totales[i].length; j++)
 						{
 							var posNorma=normasGenerales.indexOf(totales[i][j]);
 									if(posNorma>-1)
 										conteoIndividual[posNorma]+=1;
 						}
 				}
 			if (respuestas[i] == 0)
 				if (b.checked == true)
 				{
 					puntaje	+= 1;
 					for (var j = 0; j < totales[i].length; j++)
 						{
 							var posNorma=normasGenerales.indexOf(totales[i][j]);
 									if(posNorma>-1)
 										conteoIndividual[posNorma]+=1;
 						}
 				}
 			var PORCENTAJE = document.getElementById("PORCENTAJE");
 			PORCENTAJE.innerHTML = "Porcentaje: " + String(100*puntaje/tamaño) + "%";
 			$("#PROGRESO")
 				.css("width", 100*puntaje/tamaño + "%")
      			.attr("aria-valuenow", 100*puntaje/tamaño)
      			.text(100*puntaje/tamaño + "%");


 		}

 		var Contenedor = document.getElementById("Contenedor");
 		Contenedor.innerHTML = "<div></div>";
 		
 		for (var j = 0; j < normasGenerales.length; j++){
 				var porc=100*(conteoIndividual[j]/conteoGeneral[j]);
 				Contenedor.innerHTML+="<div class='row'>"+normasGenerales[j]+"</div>"+"<div class='row'><div class='progress col-md-6'> <div id='"+normasGenerales[j]+"' class='progress-bar progress-bar-success progress-bar-striped active' role='progressbar' style='width:"+porc+"%' aria-valuenow='"+porc+"' aria-valuemin='0' aria-valuemax='100'></div> </div></div>"+"<div class='row'>"+porc+ "%"+"</div><br>";

 		}
 	}


 </script>


