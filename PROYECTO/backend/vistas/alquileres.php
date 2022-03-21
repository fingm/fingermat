<?php 
  include("../../controladores/controlador.php");

  if (!isset($_SESSION['seguridad'])){
    header ('Location: '.'sinacceso.php');
    $cerrar = new generica();
    $cerrar->eliminarSesion();
  }

  if (isset($_SESSION['logeado']) && !$_SESSION['logeado']){
    header ('Location: '.$_SESSION['url']);
  }
  //--------------------paginacion-------------------------
  $mostrar = new generica();
  $pre = $mostrar->obtenerDatos($mostrar->datosFiltrados('clientes',"","","","","",""));
  $max = count($pre);
  $min =0;
  
  if (isset($_GET['paginaAlquileres'])){

    $pagina = $_GET['paginaAlquileres'];
    if ($pagina == "" || $pagina <= 0){
      $pagina = 0;
      $antPagina= $pagina;
    }else{
      $antPagina = $pagina - 1;
    }

    $limPagina = $max / 4;

    if($limPagina <= ($pagina + 1)){
      $sigPagina = $pagina;
    }else{
      $sigPagina = $pagina + 1;		
    }

    $pagLim = $pagina;
    $puntoSalida = $pagina * 5;

  }else{
    $pagina = 0;
    $sigPagina = $pagina + 1;
    $antPagina = $pagina;
    $limPagina = $totalRegistros / 4;
  }

  if ($pagina ==0){
    $actual = 0;
  }else{
    $actual = ($pagina*4);
  }
  $mostrar =  new generica();
  $info = $mostrar->obtenerDatos(($mostrar->oBtenerDatosFiltrados($_POST['tipo'],$_POST['marca'],$_POST['hasta'],$actual,4)));
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
                    <i class="material-icons ">search</i>
                  </button>
                </div>
              </div>
            </td>
            <td><!---------BOTON ALQUILAR ------------->
                <div class = "row">
                <div class="input-field col s12">
                    <form action="alquileres.php" method="POST">
                     <a class="waves-effect waves-light btn modal-trigger btn-floating pulse tooltipped" data-tooltip="alquilar o devolver" href="#modal1"><i class="material-icons ">add_shopping_cart</i></a>
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
            <td><?=$data->vrequired?></td>
            <td><?=$data->vreturn?></td>
            <td>
             <img src="../../librerias/imagenes/<?=$data->vphoto?>"; width="170px">
            </td>
            <td><?=$data->vcost?></td>      
            <th><!---------BOTON SELECCIONAR------------->
                <div>
                  <form action="alquileres.php" method="POST">
                    <button type="submit" class="btn-floating indigo darken-1 lighten-4 tooltipped"  onclick="marcar(this.id)" data-tooltip="click para seleccionar" >
                        <i class="material-icons ">add_circle</i>
                        <input type="hidden" name="accion" value="obtenerid" >
                        <input type="hidden" name="id"  value="<?=$data->idvehiculos?>"></a> 
                        <input type="hidden" name="tab" value="vehiculos" >
                        <input type="hidden" name="valid" value="<?=$data->vavailability?>">
                    </button>
                  </form>
                </div>
            </th>
          </tr>
          <?php }?>
          <tr><!------------------PAGINACION----------------------->
              <td colspan="11" >
                <ul class="pagination center">
                  <li class="waves-effect">
                    <a href="alquileres.php?paginaAlquileres=<?=$antPagina?>">
                    <i class="material-icons">chevron_left</i></a>
                  </li>
                  <li class="waves-effect">
                    <a href="alquileres.php?paginaAlquileres=<?=$sigPagina?>">
                    <i class="material-icons">chevron_right</i></a>
                  </li>
                </ul>
              </td>
            </tr>
      </table>
    </div>
  </div>
</div>
  <!-- Modal Structure -->
  <div id="modal1" class="modal">
    <div class="modal-content">
      <h4><center>Reservar</center></h4>
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
    <div class="container">
      <form action="alquileres.php" method="POST">
        <table>
          <tr>
            <th><center>desde</center></th>
            <th><center>hasta</center></th>
            <th></th><th></th>
            <th><center>devolver vehiculo</center></th>
          </tr>
          <tr>
            <td style="width: 15%;">
              <input type="date" class="datepicker validate" placeholder="desde" name="desde">
            </td>
            <td style="width: 15%;">
                <input type="date" class="datepicker validate" placeholder="hasta" name="hasta">
            </td>
            <td></td>
            <td>
              <button class="btn-floating btn-small light-blue darken-4 pulse tooltipped" type="submit" data-tooltip="click para alquilar" >
                <input type="hidden" name="accion" value="alquilarVehiculo">  
                <i class="material-icons right">add_shopping_cart</i>
              </button>
            </td>
            </form>
            <td>
              <form action="alquileres.php" method = "POST">
                <button class="btn-floating btn-small orange lighten-1 pulse tooltipped" style="margin-left:45%;" data-tooltip="click para devolver">
                  <i class="material-icons">autorenew</i>
                  <input type="hidden" name="accion" value="devolverVehiculo" >
                </button>
              </form>
            </td>
          </tr>
        </table>
    </div>
    <div class="modal-footer">
      <a href="#!" class="modal-close waves-effect waves-green RED btn"><i class="material-icons">close</i></a>
    </div>
  </div>
   
  <!--  Scripts-->
  <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
  <script src="../js/materialize.js"></script>
  <script src="../js/init.js"></script>
  <script>
    document.addEventListener('DOMContentLoaded', function() {
      var elems = document.querySelectorAll('.datepicker');
      var instances = M.Datepicker.init(elems, options);
    });
  </script>

  <script>
    function marcar(this_id){
    //    alert(this_id);
      };
          
  </script>
  </body>
</html>
  