<?php include("main.php");

if (isset($_SESSION['logeado']) && !$_SESSION['logeado']){
  header ('Location: '.$_SESSION['url']);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>
  <title>Starter Template - Materialize</title>

  <!-- CSS  -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link href="../css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <link href="../css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
</head>

<body>

  <!-----------------------NAV-------------------------------->
  <nav>
    <div class="nav-wrapper">
      <ul id="nav-mobile" class="left hide-on-med-and-down">
        <li><a href="alquileres.php">alquileres</a></li>
        <?PHP  
          if ($_SESSION['nivel'] == 'administrador'){
        ?>
        <li><a href="clientes.php">clientes</a></li>
        <li><a href="vehiculos.php">vehiculos</a></li>
        <li><a href="usuarios.php">usuarios</a></li>
        <?php } ?>  
        <?PHP  
          if ($_SESSION['nivel'] == 'encargado'){
        ?>
        <li><a href="clientes.php">clientes</a></li>
        <li><a href="vehiculos.php">vehiculos</a></li>
        <?php } ?>     
      </ul>
      <ul id="nav-mobile" class="right hide-on-med-and-down">
        <li style="width:40px;"><i class="Large material-icons">account_circle</i></li>
        <li style="width:310px;"><?php echo('logeado como : '.$_SESSION['username'].'@usuarioautosur') ?></li>
        <li >
          <form action="alquileres.php" method="POST";>
            <button class="btn waves-effect waves-light red lighten-2" type="submit" name="accion" value="salirForma">salir
            </button>
          </form>
        </li>
        <li style="width:50px;"></li>
      </ul>
    </div>
  </nav>
  
  <!----------------- SECCION DEL MEDIO---------------------->

  <div class="section no-pad-bot" style="margin-top:4%" id="index-banner">
    <h3><center>ESTAMOS EN ALQUILERES</center></h3>
  </div>
  
  <!--  Scripts-->
  <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
  <script src="../js/materialize.js"></script>
  <script src="../js/init.js"></script>

  </body>
</html>
