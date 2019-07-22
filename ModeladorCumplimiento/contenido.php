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

					<label for="NombreEmpresa">Nombre de la Prueba de Cumplimiento</label>
					<input type="text" class="form-control" required="" id="inputTitulo" name="NombreEmpresa" form="form1" onkeyup="Titulo()">

					<div class="container-fluid">
						<div class="row justify-content-around align-items-center">
							<div class="col-md-8">
								<select class="mdb-select md-form colorful-select dropdown-primary" id="internacional">
								  <option value="" disabled selected>Norma Internacional</option>
								  <?php 

								  	 $sql = "SELECT  MI.Codigo AS Codigo
										FROM detalleinternacional DI INNER JOIN  marcointernacional MI ON DI.IdInternacional=MI.IdInternacional
        	 							INNER JOIN auditoria A ON A.IdAuditoria=DI.IdAuditoria
										WHERE A.IdAuditoria=$id";

									  $sql = $conexion->query($sql);
									  while($row=mysqli_fetch_array($sql)){
									    $codigo = $row['Codigo'];
									    ?>
								        <option value="<?php echo $codigo; ?>"><?php echo $codigo; ?></option>

									    <?php
									  }

								    ?>
								  
								</select>
							</div>
							<div class="col-md-4">
								<button type="button" class="btn btn-primary" onclick="AgregarIntenacional()">Agregar</button>
							</div>
						</div>


						<div class="row justify-content-around align-items-center">
							<div class="col-md-8">
								<select class="mdb-select md-form colorful-select dropdown-primary" id="nacional">
								  <option value="" disabled selected>Norma Nacional</option>
								  <?php 

								  	 $sql = "SELECT  MI.Codigo AS Codigo
										FROM detallenacional DI INNER JOIN  marconacional MI ON DI.IdNacional=MI.IdNacional
        	 							INNER JOIN auditoria A ON A.IdAuditoria=DI.IdAuditoria
										WHERE A.IdAuditoria=$id";

									  $sql = $conexion->query($sql);
									  while($row=mysqli_fetch_array($sql)){
									    $codigo = $row['Codigo'];
									    ?>
								        <option value="<?php echo $codigo; ?>"><?php echo $codigo; ?></option>

									    <?php
									  }

								    ?>
								  
								</select>
							</div>
							<div class="col-md-4">
								<button type="button" class="btn btn-primary" onclick="AgregarNacional()">Agregar</button>
							</div>
						</div>

					</div>	

				<hr>	

				</form>

				<div class="md-form">
					  <textarea id="P1" class="md-textarea form-control" rows="2"></textarea>
					  <label for="P1">Pregunta</label>


						<div class="row">
							  <div class="col-md-12">

							    <select class="mdb-select colorful-select dropdown-primary md-form" multiple searchable="Buscar aquí ..." id="normaRelacionada" name="normaRelacionada[]">
							      <option value="" disabled selected>Norma Relacionada</option>
							      <label class="mdb-main-label">Label example</label>
    								<button class="btn-save btn btn-primary btn-sm">Save</button>
							    </select>
							    
							</div>
						</div>



					<div class="container-fluid">
						<div class="row justify-content-center">
							<button type="button" class="btn btn-primary" onclick="addPregunta()">Agregar Pregunta</button>
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
				            <div class="row">
				                <div class=" col-md-5">
				                  Marco Normativo
				                </div>
				                <div class=" col-md-7">
				                  <ul id="normas">
				                        
				                  </ul>
				                </div>
				            </div>
				            <hr>

				            <div class="row grey darken-1 white-text">
				                <div class=" col-md-5 white-text">
				                  Pregunta
				                </div>
				                <div class=" col-md-3 white-text">
				                  Marco Normativo
				                </div>
				                <div class=" col-md-4 white-text">
				                	Respuesta
				                </div>
				            </div>
				            <hr>

				            <div id="Fila" class="container">
				            	
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

	var tituloPrueba;
	var normas=[];

	var cuestion=[];
	var normaCuestion=[];
	var respuesta=[];

	function Titulo(){
		var title=document.getElementById('inputTitulo').value;
		$("#Titulo").empty();
        $("#Titulo").append(title);
        tituloPrueba=title;

	}

	function AgregarIntenacional(){

		var norma=document.getElementById('internacional').value;
		var pos = normas.indexOf(norma);
           if(pos!=-1)
           {
           	alert("La norma ya se encuentra registrada");
           }
           else
           {
           		var t1='<li>';
			 	t1=t1.concat(norma);
				t1=t1.concat("</li>");

				var h = document.getElementById("normas");
		        h.insertAdjacentHTML("beforeend",t1);
		        normas.push(norma);


		        t1='<option value="';
			 	t1=t1.concat(norma);
			 	t1=t1.concat('">');
			 	t1=t1.concat(norma);
				t1=t1.concat("</option>");
		        var h = document.getElementById("normaRelacionada");
		        h.insertAdjacentHTML("beforeend",t1);
           }

		
	}


		function AgregarNacional(){

		var norma=document.getElementById('nacional').value;
		var pos = normas.indexOf(norma);
           if(pos!=-1)
           {
           	alert("La norma ya se encuentra registrada");
           }
           else
           {
           		var t1='<li>';
			 	t1=t1.concat(norma);
				t1=t1.concat("</li>");

				var h = document.getElementById("normas");
		        h.insertAdjacentHTML("beforeend",t1);
		        normas.push(norma);

		         t1='<option value="';
			 	t1=t1.concat(norma);
			 	t1=t1.concat('">');
			 	t1=t1.concat(norma);
				t1=t1.concat("</option>");
		        var h = document.getElementById("normaRelacionada");
		        h.insertAdjacentHTML("beforeend",t1);
           }

		
	}

	var cont=1;



	function addPregunta(){

		var Pregunta=document.getElementById("P1").value;
		var Norma=$("#normaRelacionada").val();
		if (Pregunta.length<1 || Norma.length<1) {alert("Campos de Pregunta no llenados");}
		else{
		var t1='<div class="row" id="#'+String(cont)+'">';
		var t1=t1.concat('<div class="col-md-5"><h8>')+String(cont)+'. '+Pregunta+'</h8></div>';
		var t1=t1.concat('<div class="col-md-3">')+Norma+'</div>';
		var t1=t1.concat('<div class="col-md-4">')+
		'<div class="form-check form-check-inline"><input type="radio" class="form-check-input" id="'+cont+'1" name="'+cont+'" onclick="addRespuesta('+cont+',1)"><label class="form-check-label" for="'+cont+'1">Si</label></div><div class="form-check form-check-inline"><input type="radio" class="form-check-input" id="'+cont+'2" name="'+cont+'" onclick="addRespuesta('+cont+',0)"><label class="form-check-label" for="'+cont+'2">No</label></div>'+'</div></div><hr>';

		var h = document.getElementById("Fila");
		h.insertAdjacentHTML("beforeend",t1);
		cont++;

		cuestion.push(Pregunta);
		normaCuestion.push(Norma);
		normaCuestion.push("*");
		respuesta.push(false);

		var Pregunta=document.getElementById("P1").value="";
		var Norma=document.getElementById("normaRelacionada").value="";
		}	

	}


	function addRespuesta(cont,rpta)
	{
			respuesta[cont-1]=rpta;
	}


  var consulta="";
  var consultajax = $.ajax({});
  var error = true;
               

      function enviar(){

      	var respuestas=[];

      	document.getElementById("titleF").value=tituloPrueba;
      	document.getElementById("normasF").value=normas;
      	document.getElementById("preguntaF").value=cuestion;
      	document.getElementById("normaP").value=normaCuestion;
      	document.getElementById("respuestaF").value=respuesta;
      	document.getElementById("save").click();

      	for (var i = 1; i <= cont; i++) {
      		
      	}


      }
</script>