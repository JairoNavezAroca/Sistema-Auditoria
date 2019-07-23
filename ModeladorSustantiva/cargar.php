<?php 

include("..//conexion.php");
 session_start();
 $id = $_SESSION['id'];

 //$normas = $_POST['normasF'];
 $pregunta = $_POST['preguntaF'];
 $normasPrueba=$_POST['normasF'];
 $normaPregunta = $_POST['normaP'];
 $respuesta=$_POST['respuestaF'];

 $IDPREGUNTA = $_POST['IDPREGUNTA'];///////////////////
 $IDAUDITORRR = $_POST['IDAUDITORRR'];///////////////////
 $LISTADODEPREGUNTAS = $_POST['LISTADODEPREGUNTAS'];///////////////////
echo $LISTADODEPREGUNTAS.'<br>';
 $titulo = $_POST['titleF'];
 $idPrueba=0;
  
  //$normas=explode(",", $normas);
  $pregunta=explode(",", $pregunta);
  $normaPregunta=explode("*", $normaPregunta);
  $respuesta=explode(",", $respuesta);
   $sql = "INSERT INTO PruebaSustantiva(IdAuditor,IdPregunta,Nombre) VALUES($IDAUDITORRR, $IDPREGUNTA,'$titulo')";
   echo $sql;
   if($conexion->query($sql)){

       $sql = "SELECT IdPrueba FROM PruebaSustantiva order by IdPrueba desc LIMIT 1";
       $sql=$conexion->query($sql);
       while($row=mysqli_fetch_array($sql)){
           $idPrueba = $row['IdPrueba'];
           echo $idPrueba;
          }
        echo $titulo;
      $cont1=sizeof($pregunta);

      $LISTADODEPREGUNTAS = explode(',', $LISTADODEPREGUNTAS);
      for ( $i=0; $i < count($LISTADODEPREGUNTAS); $i++) { 
        
        if (strlen($LISTADODEPREGUNTAS[$i]) > 1){
          $sql = "INSERT INTO DetallePruebaSustantiva(IdPrueba,Descripcion) VALUES ($idPrueba,'$LISTADODEPREGUNTAS[$i]')";
          if($conexion->query($sql)){ echo "<h1>Prueba de cumplimiento guardada con Exito.</h1>";}else{
            echo "mal";
          }
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




 ?><?php 

if (false){


include("..//conexion.php");
 //session_start();
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
      $cont1=count($pregunta);

      for ( $i=0; $i < $cont1; $i++) { 
        

      $sql = "INSERT INTO DetallePruebaCumplimiento(IdPrueba,Pregunta,Norma,Respuesta) VALUES ('".$idPrueba."','".$pregunta[$i]."','".$normaPregunta[$i]."', '".$respuesta[$i]."')";
      echo $sql;
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


}


  $id = $_SESSION['id'];
  //header("Location:../ModificarAuditoria/main.php?id=$id");
 ?>