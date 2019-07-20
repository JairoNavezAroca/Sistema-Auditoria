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
  <link href="recursos/css/bootstrap.min.css" rel="stylesheet">
  <!-- Material Design Bootstrap -->
  <link href="recursos/css/mdb.min.css" rel="stylesheet">
  <!-- Your custom styles (optional) -->
  <link href="recursos/css/style.css" rel="stylesheet">
  <link href="recursos/fuentes/css/all.css" rel="stylesheet">

  <link rel="stylesheet" type="text/css" href="estilos.css">
  <!-- JQuery -->
  <script type="text/javascript" src="recursos/css/jquery-3.3.1.min.js.descarga"></script>
</head>
<body>

<!-- BARRA DE NAVEGACIÓN-->
<?php include("navbar/navbar.php"); ?>
<?php include("navbar/login.php"); ?>
<?php include("navbar/registro.php"); ?>

<?php include("navbar/contenido.php");?>



<?php //include ("index2.php"); ?>
<?php include("navbar/footer.php");?>







   <!-- SCRIPTS -->
  
  <!-- Bootstrap tooltips -->
  <script type="text/javascript" src="recursos/css/popper.min.js.descarga"></script>
  <!-- Bootstrap core JavaScript -->
  <script type="text/javascript" src="recursos/css/bootstrap.min.js.descarga"></script>
  <!-- MDB core JavaScript -->
  <script type="text/javascript" src="recursos/css/mdb.min.js.descarga"></script>

  <script>

         // SideNav Initialization
        $(".button-collapse").sideNav();
        var sideNavScrollbar = document.querySelector('.custom-scrollbar');
        Ps.initialize(sideNavScrollbar);
        new WOW().init();

    
    </script>


</body>
</html>