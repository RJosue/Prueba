
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title><?php echo $titulo ?></title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta content="" name="keywords">
  <meta content="" name="description">

  <!-- Favicons -->
  <link href="../img/favicon.png" rel="icon">
  <link href="../img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Poppins:300,400,500,700" rel="stylesheet">

  <!-- Bootstrap CSS File -->
  <link href="../lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Libraries CSS Files -->
  <link href="../lib/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <link href="../lib/animate/animate.min.css" rel="stylesheet">

  <!-- Main Stylesheet File -->
  <link href="../css/style.css" rel="stylesheet">

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
          <li class=""><a href="../index.php">Inicio</a></li>
          <li class="menu-has-children"><a href="#about">Capacitaciones</a>
          <ul>
            <li><a href="diplomados.php">Diplomados</a></li>
            <li><a href="cisco.php">Cisco</a></li>
            <li><a href="techacademy.php">Tech Academy</a></li> 
          </ul>
          </li>
          <li class="menu-has-children"><a href="#">Administracion</a>
          <ul>
            <li><a href="agregarcurso.php">Agregar Curso</a></li>
            <li><a href="roles.php">Administrar Roles</a></li>
            <li><a href="estadisticas.php">Estadisticas</a></li>
          </ul>
          </li>
          <li><a href="gestioncursos.php">Gestion de Curso</a></li>
          <li><a href="horario.php">Horario</a></li>
          <li><a href="sugerencia.php">Sugerencias</a></li>
          <?php session_start(); 
          if(isset($_SESSION['nombre'])){?>
            <li><a href="salir.php">CERRAR SESSION</a></li>
          <?php
          }else{ ?>
          <li class="dropdown">  <!--  LOGIN MODAL TEST-->
            <a href="">INICIAR SESION</a>
            <div class="dropdown-content">            
              <h4>INICIAR SESION</h4>
              <div  class="form-group">
              <form action="autentificacion.php" method="POST">
              <div class="form-group my-2">
                <input type="text" name="user" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="  Cedula">
              </div>
              <div class="form-group my-2">
                <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="  Contraseña">
              </div>
              <button type="submit" class="btn btn-primary">INGRESAR</button>
                </form>
              </div>
            </div>
          </li>
          <?php
          }?>
        </ul>
      </nav><!-- #nav-menu-container -->
    </div>
  </header><!-- #header -->