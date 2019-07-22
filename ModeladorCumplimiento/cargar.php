<?php 

include("..//conexion.php");
 session_start();
 $id = $_SESSION['id'];

 $titulo = $_POST['titleF'];
 //$normas = $_POST['normasF'];
 $pregunta = $_POST['preguntaF'];
 $normasPrueba=$_POST['normasF'];
 $normaPregunta = $_POST['normaP'];
 $respuesta=$_POST['respuestaF'];
 $idPrueba=0;
	
	//$normas=explode(",", $normas);
	$pregunta=explode(",", $pregunta);
	$normaPregunta=explode("*", $normaPregunta);
  $respuesta=explode(",", $respuesta);
	 $sql = "INSERT INTO PruebaCumplimiento(IdAuditoria,Nombre,Normas) VALUES('".$id."', '".$titulo."','".$normasPrueba."')";

	 if($conexion->query($sql)){

	 		 $sql = "SELECT IdPrueba FROM PruebaCumplimiento WHERE Nombre='".$titulo."' order by IdPrueba desc LIMIT 1";
	 		 $sql=$conexion->query($sql);
	 		 while($row=mysqli_fetch_array($sql)){
   				 $idPrueba = $row['IdPrueba'];
           echo $idPrueba;
           
  				}
        echo $titulo;
  		$cont1=sizeof($pregunta);

  		for ( $i=0; $i < $cont1; $i++) { 
  			

      $sql = "INSERT INTO DetallePruebaCumplimiento(IdPrueba,Pregunta,Norma,Respuesta) VALUES ('".$idPrueba."','".$pregunta[$i]."','".$normaPregunta[$i]."', '".$respuesta[$i]."')";
       if($conexion->query($sql)){ echo "<h1>Prueba de cumplimiento guardada con Exito.</h1>";}else{
        echo "mal";
       }

  		}





/*
  			$sql="SELECT IdNacional FROM marconacional WHERE Codigo='".$normaPregunta."'";
	 		$sql=$conexion->query($sql);
	 		 while($row=mysqli_fetch_array($sql)){
   				 $idnorma = $row['IdNacional'];	
  				}


  			if(strlen($idnorma)<1){
  			$sql = "SELECT IdInternacional FROM marcointernacional WHERE Codigo='".$normaPregunta."'";
	 		$sql= $conexion->query($sql);
	 		 while($row=mysqli_fetch_array($sql)){
   				 $idnorma = $row['IdInternacional'];
  				}
  			}
*/
  		//echo $idPrueba;
  		//echo $idnorma;

		}
		else{
			
		}




 ?>