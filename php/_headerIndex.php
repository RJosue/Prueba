<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <title><?php echo $titulo ?></title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta content="" name="keywords">
  <meta content="" name="description">


  <link rel=StyleSheet href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css" type="text/css">
  <link rel=StyleSheet href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" type="text/css">
  <!-- Favicons -->
  <link href="img/favicon.png" rel="icon">
  <link href="img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Poppins:300,400,500,700" rel="stylesheet">

  <!-- Bootstrap CSS File -->
  <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">


  <!-- Libraries CSS Files -->
  <link href="lib/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <link href="lib/animate/animate.min.css" rel="stylesheet">

  <!-- Main Stylesheet File -->
  <link href="css/style.css" rel="stylesheet">



  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://code.highcharts.com/highcharts.src.js"></script>
  <script src="https://code.highcharts.com/modules/exporting.js"></script>

</head>

<body>

  <!--==========================
  Header
  ============================-->
  <header id="header">
    <div class="container">

      <div id="logo" class="pull-left">

        <!-- Uncomment below if you prefer to use a text logo -->
        <!--<h1><a href="#hero">Regna</a></h1>-->
      </div>

      <nav id="nav-menu-container">
        <ul class="nav-menu">
          <li class=""><a href="index.php">Inicio</a></li>
          <li class="menu-has-children"><a href="#about">Capacitaciones</a>
            <ul>
              <li><a href="php/diplomados.php">Diplomados</a></li>
              <li><a href="php/cisco.php">Cisco</a></li>
              <li><a href="php/techacademy.php">Tech Academy</a></li>
              <li><a href="php/cursos_basicos.php">Cursos básicos</a></li>
            </ul>
          </li>
          <li class="menu-has-children"><a href="#">Administracion</a>
            <ul>
              <li><a href="php/agregarcurso.php">Agregar Curso</a></li>
              <li><a href="php/roles.php">Administrar Roles</a></li>
              <li><a href="php/estadisticas.php">Estadisticas</a></li>
            </ul>
          </li>
          <li><a href="php/gestioncursos.php">Gestion de Curso</a></li>
          <li><a href="php/miscursos.php">Mis Cursos</a></li>
          <li><a href="php/horario.php">Horario</a></li>
          <li><a href="php/sugerencia.php">Sugerencias</a></li>
          <?php session_start();
          if (isset($_SESSION['nombre'])) { ?>
            <li><a href="php/salir.php">CERRAR SESSION</a></li>
          <?php
          } else { ?>
            <li><a href="php/login.php">INICIAR SESSION</a></li>
          <?php } ?>
        </ul>
      </nav><!-- #nav-menu-container -->
    </div>
  </header><!-- #header -->