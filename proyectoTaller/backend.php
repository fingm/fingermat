<?php 
  include("backend/php/main.php");
  if (isset($_SESSION['logeado']) && $_SESSION['logeado']){
    header ('Location: '.$_SESSION['url']);
  }
  if (isset($_SESSION['usu']) && $_SESSION['usu'] || isset($_SESSION['estado']) && $_SESSION['estado']){ 
    header("Refresh: 1; URL='backend.php'");
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>
  <title>GESTION AUTOSUR</title>

  <!-- CSS  -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link href="backend/css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <link href="backend/css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
</head>

<body>
  <!-----------------------NAV-------------------------------->
  <nav class="light-blue lighten-1" role="navigation">
    <div class="nav-wrapper container"><a id="logo-container" href="#" class="brand-logo">Logo</a>
      <ul id="nav-mobile" class="side-nav">
        <li><a href="#"></a></li>
        
      </ul>
      <a href="#" data-activates="nav-mobile" class="button-collapse"><i class="material-icons">menu</i></a>
    </div>

      

  </nav>
  
  <!----------------- SECCION DEL MEDIO---------------------->

  <div class="section no-pad-bot" style="margin-top:4%" id="index-banner">
    <div class="row s12" style="border:1px solid black; width:400px;" >
      <div>
        <div>
          <table class="centered responsive-table">
              <form action="backend.php" method="POST">
                <tr>
                  <td>
                    <div class="row">
                      <div class="input-field col s6">
                        <input id="idUserForma" type="text" name="usernameForma" class="validate" style="width:200%;">
                        <label class="active" for="first_name2">Usuario</label>
                      </div>
                  </div>
                  </td>
                </tr>
                <tr>
                  <td>
                  <div class="row">
                      <div class="input-field col s6">
                        <input id="idPasswordForma" type="password" class="validate" name="passwordForma" style="width:200%;" >
                        <label class="active" for="first_name2">Constraseña</label>
                      </div>
                  </div>
                  </td>
                </tr>
                <tr>
                  <td>
                    <button class="btn waves-effect waves-light" type="submit" name="accion" value="ingresar" style="margin-right:8%; float:right;">ingresar
                      <i class="material-icons right">send</i>
                    </button>
                  </td>
                </tr>
              </form>  
            </table>  
            <div>
              <?PHP if (isset($_SESSION['usu']) && $_SESSION['usu']){ 
                            $cerrar = new generica();
                            $cerrar->eliminarsesion();
              ?>
              <center  class="card-panel white-text  red darken-1"> <?php echo("EL USUARIO O CONTRASEÑA NO EXISTE");} ?></center>    
              <?PHP if (isset($_SESSION['estado']) && $_SESSION['estado']){ 
                            $cerrar = new generica();
                            $cerrar->eliminarsesion();
                            
              ?>
              <center  class="card-panel white-text  red darken-1"> <?php echo("EL USUARIO SE ENCUENTRA DESACTIVADO");} ?></center>    
            </div>
        </div>
      </div>
    </div>
  </div>
  

  <!--  Scripts-->
  <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
  <script src="backend/js/materialize.js"></script>
  <script src="backend/js/init.js"></script>

  </body>
</html>
