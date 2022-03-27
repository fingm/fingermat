<?php
  require_once("controladores/controlador_web.php");
  
  $mostrar = new generica();
  $vehiculo = $mostrar->obtenerDatos($mostrar->datosFiltrados('vehiculos',"","","","","",""));
 
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1"/>
  <title>Parallax Template - Materialize</title>

  <!-- CSS  -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link href="web/css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <link href="web/css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
</head>
<body >
  <nav class="light-blue darken-1" role="navigation">
    <div class="nav-wrapper container" >
      <form action="index.php" method="POST">
      <!----------------------SE MUESTRA SI NO ESTA LOGEADO-------------------------->
        <?php
          if(!$_SESSION['logeado']){
        ?>
        <ul class="right hide-on-med-and-down" style="height:50px;">
          <div class="row ">
              <div class="row">
                <div class="input-field col s12">
                  <button class="waves-effect blue darken-1 btn-small">ingresar
                    <input type="hidden" name="accion" value="logearse">
                  </button> 
                <div>
              <div>  
          </div>
        </ul>
        <ul class="right hide-on-med-and-down" style="height:50px; width:170px;">
          <div class="row">
            <form class="col s12">
              <div class="row">
                <div class="input-field col s12">
                  <input placeholder="contraseña" name ="contraseña" id="first_name" type="password" class="validate white-text text-darken-2">
                <div>
              <div>    
          </div>
        </ul>
        <ul class="right hide-on-med-and-down" style="height:50px; width:170px;">
          <div class="row">
              <div class="row">
                <div class="input-field col s12">
                  <input placeholder="Usuario" name="usuario" id="first_name" type="text" class="validate white-text text-darken-2">
                <div>
              <div>  
          </div>
        </ul>
        <?php } else {?>
      <!----------------------SE MUESTRA SI ESTA LOGEADO-------------------------->
          <ul class="right hide-on-med-and-down" style="height:50px;">
          <div class="row ">
              <div class="row">
                <div class="input-field col s12">
                  <button class="waves-effect blue darken-1 btn-small">cerrar sesión
                    <input type="hidden" name="accion" value="cerrarSesion">
                  </button> 
                <div>
              <div>  
          </div>
        </ul>
        <ul class="right hide-on-med-and-down" style="height:20px; width:250px;">
          <div class="row">
            <form class="col s12" >
              <div class="row" style="font-size: 16px;">
                logeado como @<?=$_SESSION['username']; ?>
              <div>    
          </div>
        </ul>
        <?php }   ?>      
        <ul class="left hide-on-med-and-down" style="height:50px;">
          <div class="row ">
              <div class="row">
                <div class="input-field col s12" style="font-size: 40px;">
                  AUTOSUR ALQUILER DE VEHICULOS
                <div>
              <div>  
          </div>
        </ul>
        <ul class="right hide-on-med-and-down" style="height:50px;">
          <div class="row">
              <div class="row">
                <div class="input-field col s6 white-text text-darken-2 ">
                <div>
              <div>    
            </form>
          </div>
        </ul>
      </form>
      <ul id="nav-mobile" class="sidenav">
        <li><a href="#">Navbar Link</a></li>
      </ul>
      <a href="#" data-target="nav-mobile" class="sidenav-trigger"><i class="material-icons">menu</i></a>
    </div>
  </nav>

  <section>

    <div id="index-banner" class="parallax-container">
      <div class="section no-pad-bot">
        <div class="container">
          <br><br>

          <br><br>
        </div>
      </div>
      <div class="parallax"><img src="web/librerias/alquiler.jpg" alt="Unsplashed background img 1"></div>
    </div>
  -
  <!---------------------------------SECCION DE FOTOS---------------------------------------------------->
    <div class="container ">
      <div class="section">
      <div class="carousel carousel-slider">
        <?php foreach($vehiculo as $key  => $info){ ?> 

          <a class="carousel-item" style="width: 500px;" href="#<?=$info->idvehiculos?>!"> <img id="carouselImg" src="librerias/imagenes/<?=$info->vphoto?>"></a>
        

        <?php } ?>
        </div>

      </div>
    </div>


    <div class="parallax-container valign-wrapper">
      <div class="section no-pad-bot">
        <div class="container">

        </div>
      </div>
      <div class="parallax"><img src="web/librerias/alquiler.jpg" alt="Unsplashed background img 2"></div>
    </div>

  </section>



  <footer class="page-footer teal">
    <div class="container">
      <div class="row">
        <div class="col l6 s12">
          <h5 class="white-text">Sobre Nosotros</h5>
          <p class="grey-text text-lighten-4">Somos una empresa con mas de 25 años de trayectoria. Avalados por la satisfaccion
             de nuestros clientes. Contamos con con vehiculos de toda clase. Utilitarios, sedan, minivan, camionetas,etc.</p>
        </div>
      </div>
    </div>
    <div class="footer-copyright">
      <div class="container">
      Made by <a class="brown-text text-lighten-3" href="http://materializecss.com">Materialize</a>
      </div>
    </div>
  </footer>


  <!--  Scripts-->
  <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
  <script src="web/js/materialize.js"></script>
  <script src="web/js/init.js"></script>

  </body>
</html>
