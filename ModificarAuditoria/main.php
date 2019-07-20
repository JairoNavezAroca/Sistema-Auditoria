
<!DOCTYPE html>
<html lang="es">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>SGA</title>
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <!-- Bootstrap core CSS -->
  <link href="../recursos/css/bootstrap.min.css" rel="stylesheet">
  <!-- Material Design Bootstrap -->
  <link href="../recursos/css/mdb.min.css" rel="stylesheet">
  <!-- Your custom styles (optional) -->
  <link href="../recursos/css/style.css" rel="stylesheet">
  <link href="../recursos/fuentes/css/all.css" rel="stylesheet">
  <!-- JQuery -->
  <script type="text/javascript" src="../recursos/css/jquery-3.3.1.min.js.descarga"></script>
</head>
<body >

<?php 
  session_start();
  $_SESSION['id'] = $_GET['id'];
 ?>

<!-- BARRA DE NAVEGACIÓN-->
<?php include("navbar.php"); ?>
<?php include("Contenido.php"); ?>

<?php include("modificarGeneralidades.php") ?>
<?php include("gestionactivos.php") ?>
<?php include("gestionriesgos.php") ?>
<?php include("NuevoPlanAuditoria.php") ?>
<?php include("AsignacionRoles.php") ?>
<?php include("PersonasEntrevistar.php") ?>
<?php include("PlanDeProyectos.php") ?>
<?php include("NuevoEntregable.php") ?>
<?php include("PruebasCumplimiento.php") ?>




   <!-- SCRIPTS -->
  
  <!-- Bootstrap tooltips -->
  <script type="text/javascript" src="../recursos/css/popper.min.js.descarga"></script>
  <!-- Bootstrap core JavaScript -->
  <script type="text/javascript" src="../recursos/css/bootstrap.min.js.descarga"></script>
  <!-- MDB core JavaScript -->
  <script type="text/javascript" src="../recursos/css/mdb.min.js.descarga"></script>

  <script>

         // SideNav Initialization
        $(".button-collapse").sideNav();
        var sideNavScrollbar = document.querySelector('.custom-scrollbar');
        Ps.initialize(sideNavScrollbar);
        new WOW().init();


  
    </script>

    <script>
  $('.carousel').carousel({
    interval: 2000000
})

  // Material Select Initialization
$(document).ready(function() {
$('.mdb-select').materialSelect();
});

// Data Picker Initialization
$('.datepicker').pickadate();
</script>



</body>
</html>