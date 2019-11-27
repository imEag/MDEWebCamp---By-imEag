<!doctype html>
<html class="no-js" lang="">

<head>
  <!--PLANTILLA: HTML BOILERPLATE-->
  <meta charset="utf-8">
  <title></title>
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link rel="manifest" href="site.webmanifest">
  <link rel="apple-touch-icon" href="icon.png">
  <!-- Place favicon.ico in the root directory -->

  <link rel="stylesheet" href="css/normalize.css">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans|Oswald|PT+Sans" rel="stylesheet">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css"
    integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
  <link rel="stylesheet" href="https://unpkg.com/leaflet@1.4.0/dist/leaflet.css" />
  <link rel="stylesheet" href="css/main.css">
  
  <?php //Vamos a cargar un archivo dependiendo de la página
     $archivo = basename($_SERVER['PHP_SELF']); //se obtiene el nombre del archivo
     $pagina = str_replace(".php", "", $archivo); //se quita el .php del nombre(opcional)
     if($pagina == 'invitados' || $pagina == 'index' ) { //si la página es invitados
      echo '<link rel="stylesheet" href="css/colorbox.css">';
    } else if($pagina == 'conferencia') { //si la página es conferencia
      echo '<link rel="stylesheet" href="css/lightbox.css">';
     }
  ?>

  <meta name="theme-color" content="#fafafa">
</head>

<body class="<?php echo $pagina; ?>">
  <!--[if lte IE 9]>
    <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
  <![endif]-->

  <!-- Add your site or application content here -->
  <!--MI CODIGO-->
  <header class="site-header">
    <div class="hero">
      <div class="contenido-header">
        <nav class="redes-sociales">
          <a href="#"><i class="fab fa-facebook"></i></a>
          <a href="#"><i class="fab fa-twitter"></i></a>
          <a href="#"><i class="fab fa-pinterest"></i></a>
          <a href="#"><i class="fab fa-youtube"></i></a>
          <a href="#"><i class="fab fa-instagram"></i></a>
        </nav>
        <div class="informacion-evento">
          <p class="fecha"><i class="far fa-calendar-alt"></i>25-26 Noviembre</p>
          <p class="ciudad"><i class="fas fa-map-marker-alt"></i>Medellín, Co</p>
          <h1 class="nombre-sitio">MDEWebCamp</h1>
          <p class="slogan">La mejor conferencia de <span>Diseño Web</span></p>
        </div>
      </div>
    </div><!-- fin .hero-->
  </header>

  <div class="barra">
    <div class="contenedor grid-nav">
      <div class="logo">
        <a href="index.php"><img src="img/logo.svg" alt="imagen logo"></a>
      </div>

      <div class="menu-movil">
        <label for="check"><i class="fas fa-caret-square-down"></i></label>
      </div>
      <nav class="navegacion-principal">
        <a href="conferencia.php">Conferencia</a>
        <a href="calendario.php">Calendario</a>
        <a href="invitados.php">Invitados</a>
        <a href="registro.php">Reservaciones</a>
      </nav>
    </div>

    <div class="contenedor">
      <input type="checkbox" id="check">
      <nav class="navegacion-movil">
        <a href="#">Conferencia</a>
        <a href="#">Calendario</a>
        <a href="#">Invitados</a>
        <a href="#">Reservaciones</a>
      </nav>
    </div>
  </div>
  <!--fin .barra-->