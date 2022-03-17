<?php 
  include("main.php");

  if (isset($_SESSION['logeado']) && !$_SESSION['logeado']){
    header ('Location: '.$_SESSION['url']);
  }

  $mostrar =  new generica();
  $info = $mostrar->obtenerDatos(($mostrar->oBtenerDatosFiltrados($_POST['tipo'],$_POST['marca'],$_POST['hasta'])));


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
        <?PHP  
          if ($_SESSION['nivel'] == 'vendedor'){
        ?>
        <li><a href="clientes.php">clientes</a></li>
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

<div class="container">
  <div class="row">
    <div class="col s12">
      <h5><center>ALQUILERES</center></h5>
      <h6><center>busqueda</center></h6>
      <table>
        <tr>        
          <form action="alquileres.php" method="POST">
            <td>
              <div class="row">
                <div class="input-field col s12">
                  <input type="text" name = "tipo" class="validate">
                  <label id="textoFormularios" class="active">Tipo</label>
                </div>
              </div>
            </td>
            <td>
              <div class="row">
                <div class="input-field col s12">
                  <input type="text" name = "marca" class="validate">
                  <label id="textoFormularios" class="active">marca</label>
                </div>
              </div>
            </td>
            <td>
              <div class="row">
                <div class="input-field col s12">
                  <input type="text" name = "hasta" class="validate">
                  <label id="textoFormularios" class="active">$ Hasta</label>
                </div>
              </div>
            </td>
            <td>
              <div class="row"><!---------BUSCAR- FILTRADO------------>
                <div class="input-field col s12">
                  <button class="waves-light indigo lighten-1 btn-floating pulse tooltipped " type="submit" name="accion" value="mostrarFiltrado"  data-tooltip="buscar">
                    <i class="material-icons ">send</i>
                  </button>
                </div>
              </div>
            </td>
            <td><!---------BOTON ALQUILAR ------------->
                <div class = "row">
                <div class="input-field col s12">
                    <form action="alquileres.php" method="POST">
                     <a class="waves-effect waves-light btn modal-trigger btn-floating pulse tooltipped" data-tooltip="comfirmar alquiler" href="#modal1"><i class="material-icons ">send</i></a>
                    </form>
                  </div>
                </div>
              </td>
            </form>
          </tr>
      </table>
    </div>
  </div>
</div>            
<div class="container">
  <div class="row">
    <div class="col s12">              
      <table>      
        <tr>
          <th>Tipo</th>
          <th>Matricula</th>
          <th>Marca</th>
          <th>Modelo</th>
          <th>Color</th>
          <th>Año</th>
          <th>pasaj</th>
          <th>Disp</th>
          <th>Reservado</th>
          <th>Desde</th>
          <th>Hasta</th>
          <th>Foto</th>
          <th>Costo</th>
        </tr>      
        <?php

          foreach($info as $i => $data){	
        ?>
        <tr>
            <td><?=$data->vtype?></td>
            <td><?=$data->vmatricula?></td>
            <td><?=$data->vbrand?></td>
            <td><?=$data->vmodel?></td>      
            <td><?=$data->vcolor?></td>
            <td><?=$data->vyear?></td>
            <td><?=$data->vpassengers?></td>
            <td><?=$data->vavailability?></td>
            <td><?=$data->vreserved?></td>
            <td><?=$data->vrequired?></td>
            <td><?=$data->vreturn?></td>
            <td><?=$data->vphoto?></td>
            <td><?=$data->vcost?></td>      
            <th><!---------BOTON SELECCIONAR------------->
                <div>
                  <form action="alquileres.php" method="POST">
                    <button type="submit" class="btn-floating indigo darken-1 lighten-4 tooltipped"  onclick="marcar(this.id)" data-tooltip="click para seleccionar" >
                        <i class="material-icons ">add_circle</i>
                        <input type="hidden" name="accion" value="obtenerid" >
                        <input type="hidden" name="id"  value="<?=$data->idvehiculos?>"></a> 
                        <input type="hidden" name="tab" value="vehiculos" >
                    </button>
                  </form>
                </div>
            </th>
          </tr>
          <?php }?>
      </table>
    </div>
  </div>
</div>
  <!-- Modal Structure -->
  <div id="modal1" class="modal">
    <div class="modal-content">
      <h4><center> Alquiler</center></h4>
      <table>
        <form action="alquileres.php" method="POST">
        <tr>
          <th>Tipo</th>
          <th>Matricula</th>
          <th>Marca</th>
          <th>Modelo</th>
          <th>Color</th>
          <th>Año</th>
          <th>pasaj</th>
          <th>Disp</th>
          <th>Reservado</th>
          <th>Desde</th>
          <th>Hasta</th>
          <th>Foto</th>
          <th>Costo</th>
        </tr>    
        <tr>
          <td>
            <div class="input-field  s12">
              <?=$_SESSION['arrayMuestra'][0]->vtype?>
            </div>
          </td>
          <td>
            <div class="input-field  s12">
              <?=$_SESSION['arrayMuestra'][0]->vmatricula?>
            </div>
          </td>
          <td>
            <div class="input-field  s12">
              <?=$_SESSION['arrayMuestra'][0]->vbrand?>
            </div>
          </td>
          <td>
            <div class="input-field  s12">
              <?=$_SESSION['arrayMuestra'][0]->vmodel?>
            </div>
          </td>
          <td>
            <div class="input-field  s12">
              <?=$_SESSION['arrayMuestra'][0]->vcolor?>
            </div>
          </td>
          <td>
            <div class="input-field  s12">
              <?=$_SESSION['arrayMuestra'][0]->vyear?>
            </div>
          </td>
          <td>
            <div class="input-field  s12">
              <?=$_SESSION['arrayMuestra'][0]->vpassengers?>
            </div>
          </td>
          <td>
            <div class="input-field  s12">
              <?=$_SESSION['arrayMuestra'][0]->vavailability?>
            </div>
          </td>
          <td>
            <div class="input-field  s12">
             <?=$_SESSION['arrayMuestra'][0]->vreserved?>
            </div>
          </td>
          <td>
            <div class="input-field  s12">
              <?=$_SESSION['arrayMuestra'][0]->vrequired?>
            </div>
          </td>
          <td>
            <div class="input-field  s12">
              <?=$_SESSION['arrayMuestra'][0]->vreturn?>
            </div>
          </td>
          <td>
            <div class="input-field  s12">
             <?=$_SESSION['arrayMuestra'][0]->vphoto?>
            </div>
          </td>
          <td>
            <div class="input-field  s12">
             <?=$_SESSION['arrayMuestra'][0]->vcost?>
            </div>
          </td>
          </tr>
        </form>      
      </table>
    </div>
    <div>
    <form action="alquileres.php" method="POST">
      <table style="width: 50%;">
        <tr>
          <td>
            <div class="row">
              <div class="input-field col s12">
                <input type="text" name = "desde" class="validate">
                <label id="textoFormularios" class="active">desde</label>
              </div>
            </div>
          </td>
          <td>
            <div class="row">
              <div class="input-field col s12">
                <input type="text" name = "hasta" class="validate">
                <label id="textoFormularios" class="active">hasta</label>
              </div>
            </div>
          </td>
          <td>
            <button class="btn-floating btn-large yellow pulse tooltipped" type="submit" data-tooltip="click para alquilar" >
              <i class="material-icons right">edit</i>
              <input type="hidden" name="accion" value="alquilarVehiculo">
            </button>
          </td>
        </tr>
      </table>
    </form>
  </div>
    <div class="modal-footer">
      <a href="#!" class="modal-close waves-effect waves-green RED btn"><i class="material-icons ">close</i></a>
    </div>
  </div>
   
  <!--  Scripts-->
  <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
  <script src="../js/materialize.js"></script>
  <script src="../js/init.js"></script>
  
  <script>
    function marcar(this_id){
    //    alert(this_id);
      };
          
  </script>
  </body>
</html>
  