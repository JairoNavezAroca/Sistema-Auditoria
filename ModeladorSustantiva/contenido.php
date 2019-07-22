<?php 
  include("..//conexion.php");
  session_start();
  $id = $_SESSION['id'];
  $sql = "select * from Auditoria where IdAuditoria = $id";
  $sql = $conexion->query($sql);
  while($row=mysqli_fetch_array($sql)){
    $titulo = $row['Titulo'];
  }
?>

<div class="container-fluid">
	<div class="row">
<!-- ASIDE PARA ARMAR LA PREGUNTA -->
		<div class="col-lg-4">
			<div class="container-fluid pt-3">
				<h7 class="text-center font-weight-bold"> <?php echo $titulo; ?></h7>
				<hr>

			    <form id="form1">

					<label for="NombreEmpresa">Nombre de la Prueba Sustantiva</label>
					<input type="text" class="form-control" required="" id="inputTitulo" name="NombreEmpresa" form="form1" onkeyup="Titulo()">

					<div class="container-fluid">
						<div class="row justify-content-around align-items-center">
							<div class="col-md-12">
								<select class="mdb-select md-form colorful-select dropdown-primary" id="IdPrueba" onchange="CargarPreguntas();">
								  <option value="" disabled selected>Prueba de Cumplimiento</option>
								  <?php 

								  	$sql = "SELECT IdPrueba,Nombre FROM pruebacumplimiento WHERE IdAuditoria=$id";
  							   		$sql = $conexion->query($sql);
  									while($row=mysqli_fetch_array($sql)){
									    ?>
								        <option value="<?php echo $row[0]; ?>"><?php echo $row[1]; ?></option>

									    <?php
									  }

								    ?>
								  
								</select>
							</div>
						</div>


						<div class="row justify-content-around align-items-center">
							<div class="col-md-12" id="">
								<select class="mdb-select md-form colorful-select dropdown-primary" id="contenedorPreguntas" onchange="MostrarPregunta();">
								  <option value="" disabled selected>Pregunta Relacionada</option>
								</select>
							</div>
						</div>

						<div class="row justify-content-around align-items-center">
							<div class="col-md-12">
								<select class="mdb-select md-form colorful-select dropdown-primary" id="IdAuditor" onchange="MostrarAuditor();">
								  <option value="" disabled selected>Auditor Responsable</option>
								  <?php 

								  	$sql = "SELECT IdAuditor, Apellidos, Nombres FROM auditor";
  							   		$sql = $conexion->query($sql);
  									while($row=mysqli_fetch_array($sql)){
									    ?>
								        <option value="<?php echo $row[0]; ?>"><?php echo $row[1]." ".$row[2]; ?></option>

									    <?php
									  }

								    ?>
								  
								</select>
							</div>
						</div>

					</div>	

				<hr>	

				</form>

				<div class="md-form">
					  <textarea id="P1" class="md-textarea form-control" rows="2"></textarea>
					  <label for="P1">Prueba Sustantiva</label>


					<div class="container-fluid">
						<div class="row justify-content-center">
							<button type="button" class="btn btn-primary" onclick="addPregunta()">Agregar Prueba</button>
						</div>
					</div>



				</div>


			</div>
		</div>


<!-- CONTENEDOR QUE DA VISTA PREVIA AL CUESTIONARIO-->
		<div class="col-lg-8" id="contenedor">
			<div class="container">
					<h1 class="text-center" id="Titulo" ></h1>
					<hr>
					<h5 class="text-left" id="NombrePruebaCumplimiento" ></h5>
					
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
				    		<div class="row" id="cajaPregunta">
				                <div class=" col-md-8" id="Pregunta">
				                  Pregunta
				                </div>
				                <div class=" col-md-4" id="Respuesta">
				                	Respuesta
				                </div>
				            </div>
				    <hr>

				            <div class="row grey darken-1 white-text">
				                <div class=" col-md-8 white-text">
				                  Pruebas Sustantivas
				                </div>
				                <div class=" col-md-4 white-text">
				                	Responsable
				                </div>
				            </div>
				    <hr>

				    		 <div class="row">
				                <div class=" col-md-8 ">
				                  <div class="container-fluid" id="Fila">
				                  	
				                  </div>
				                </div>
				                <div class=" col-md-4" id="Responsable">
				                	
				                </div>
				            </div>

				           

				    <div class="container-fluid">
						<div class="row justify-content-center">

							<button type="button" class="btn btn-success" onclick="enviar()">Guardar</button>
						</div>

					</div>

					<form id="formulario" method="POST" action="cargar.php" target="_blank">
						<input type="" name="titleF" id="titleF" value="" class="d-none">
						<input type="" name="normasF" id="normasF" value="" class="d-none">
						<input type="" name="preguntaF" id="preguntaF" value="" class="d-none">
						<input type="" name="respuestaF" id="respuestaF" value="" class="d-none">
						<input type="" name="normaP" id="normaP" value="" class="d-none">
						<button type="submit" form="formulario" class="d-none" id="save"></button>
					</form>
				           

				        </div>
		</div>
	</div>
</div>


<script>
	 var consulta="";
     var consultajax = $.ajax({});
     var error = true;

      function CargarPreguntas(){

      	var texto = $("#IdPrueba").find('option:selected').text();
		$("#NombrePruebaCumplimiento").empty();
        $("#NombrePruebaCumplimiento").append("Prueba de Cumplimiento: "+texto);

        if(consultajax && consultajax.readyState != 4) { 
              error = false;
              consultajax.abort();
        }
        error = true;    
        opcion = document.getElementById("IdPrueba").value;
        consultajax = $.ajax({
              type: "POST",
              url: "cargarPreguntas.php",
              data: "IdPrueba="+opcion,
              dataType: "html",
              beforeSend: function(){
               $("#contenedorPreguntas").html("<br><br><div style='width: 3rem; height: 3rem;' class='spinner-grow text-success' role='status'><span class='sr-only'>Loading...</span></div>");
               console.log("cargando");
                          },
              error: function(){
                if(error)
                  alert("error peticion ajax");
              },
              success: function(data){
              $("#contenedorPreguntas").empty();
              $("#contenedorPreguntas").append(data);
              }
        });
      }


       function MostrarPregunta(){


        if(consultajax && consultajax.readyState != 4) { 
              error = false;
              consultajax.abort();
        }
        error = true;    
        opcion = $("#contenedorPreguntas").val();
        consultajax = $.ajax({
              type: "POST",
              url: "MostrarPregunta.php",
              data: "IdPregunta="+opcion,
              dataType: "html",
              beforeSend: function(){
               $("#cajaPregunta").html("<br><br><div style='width: 3rem; height: 3rem;' class='spinner-grow text-success' role='status'><span class='sr-only'>Loading...</span></div>");
               console.log("cargando");
                          },
              error: function(){
                if(error)
                  alert("error peticion ajax");
              },
              success: function(data){
              $("#cajaPregunta").empty();
              $("#cajaPregunta").append(data);
              }
        });
      }



function MostrarAuditor()
{
	var auditor = $("#IdAuditor").find('option:selected').text();
	$("#Responsable").empty();
     $("#Responsable").append(auditor);
}


var cont=1;

	function addPregunta(){

		var Pregunta=document.getElementById("P1").value;
		if (Pregunta.length<1) {alert("Campos de Prueba no llenados");}
		else{
		var t1='<div class="row" id="#'+String(cont)+'">';
		var t1=t1.concat('<div class="col-md-5"><h8>')+String(cont)+'. '+Pregunta+'</h8></div>';

		var h = document.getElementById("Fila");
		h.insertAdjacentHTML("beforeend",t1);
		cont++;


		var Pregunta=document.getElementById("P1").value="";
		}	

	}

	function Titulo(){
		var title=document.getElementById('inputTitulo').value;
		$("#Titulo").empty();
        $("#Titulo").append(title);
        tituloPrueba=title;

	}

	
</script>