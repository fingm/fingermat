<?php 
  include("../../controladores/controlador.php");
  
  if (!isset($_SESSION['seguridad'])){
    header ('Location: '.'sinacceso.php');
    $cerrar = new generica();
    $cerrar->eliminarSesion();
  }
  //--------------------paginacion-------------------------
  if (isset($_GET['pagina'])){
    
    $pagina = $_GET['pagina'];
    if ($pagina =="" || $pagina < 0){
      $pagina = 0;
    }else{
      $pagina = 0;
      $sigPagina =  $pagina++;
      $antPagina = $pagina--;
    }
  }

  $mostrar = new generica();
  $pre = $mostrar->obtenerDatos($mostrar->datosFiltrados('clientes',"","","","","",""));
  $max = count($pre);
  $min =0;
  $info = $mostrar->obtenerDatos($mostrar->datosFiltrados('clientes',"","","","",$min,$max));
  
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
      <h5><center>INGRESO DE NUEVOS CLIENTES</center></h5>
      <table>
        <tr>        
          <form action="clientes.php" method="POST">
            <td>
              <div class="row">
                <div class="input-field col s12">
                  <input type="text" name = "cl_nombre" class="validate">
                  <label id="textoFormularios" class="active">Nombre</label>
                </div>
              </div>
            </td>
            <td>
              <div class="row">
                <div class="input-field col s12">
                  <input type="text"  name = "cl_apellido" class="validate">
                  <label id="textoFormularios" class="active" >Apellido</label>
                </div>
              </div>
            </td>
            <td>
              <div class="row">
                <div class="input-field col s12">
                  <input type="text" name = "cl_usuario" class="validate">
                  <label id="textoFormularios" class="active">usuario</label>
                </div>
              </div>
            </td>
            <td>
              <div class="row">
                <div class="input-field col s12">
                  <input type="text" name = "cl_contraseña" class="validate">
                  <label id="textoFormularios" class="active" >Contraseña</label>
                </div>
              </div>
            </td>
            <td>
              <div class="row">
                <div class="input-field col s12">
                  <input type="text" name = "cl_direccion" class="validate">
                  <label id="textoFormularios" class="active">Direccion</label>
                </div>
              </div>
            </td>
            <td>
              <div class="row">
                <div class="input-field col s12">
                  <input type="text" name = "cl_telefono" class="validate">
                  <label id="textoFormularios" class="active">Telefono</label>
                </div>
              </div>
            </td>
            <td>
              <div class="row">
                <div class="input-field col s12">
                  <input type="text" name = "cl_email" class="validate">
                  <label id="textoFormularios" class="active" >Email</label>
                </div>
              </div>
            </td>
            <td>
              <div class="row">
                <div class="input-field col s12">
                  <input type="text" name = "cl_tdoc" class="validate">
                  <label id="textoFormularios" class="active">T.doc</label>
                </div>
              </div>
            </td>
            <td>
              <div class="row">
                <div class="input-field col s12">
                  <input type="text" name = "cl_documento" class="validate">
                  <label id="textoFormularios" class="active">Documento</label>
                </div>
              </div>
            </td>
            <td>
              <div class="row">
                <div class="input-field col s12">
                  <input type="text" name = "cl_estado" class="validate">
                  <label id="textoFormularios" class="active">Estado</label>
                </div>
              </div>
            </td>
            <td>
              <div class="row"><!---------BOTON INGRESAR------------->
                <div class="input-field col s12">
                  <button class="waves-light indigo lighten-1 btn-floating pulse tooltipped " type="submit" name="accion" value="ingresarCliente"  data-tooltip="insertar Cliente">
                    <i class="material-icons ">send</i>
                  </button>
                </div>
              </div>
            </td>
            </form>
            <td><!---------BOTON EDITAR ----------------------------->
              <div class = "row">
              <div class="input-field col s12">
                  <form action="#modal1" method="POST">
                    <button type="submit" class="btn-floating pulse  green lighten-3 tooltipped" data-tooltip="editar Cliente seleccionado">
                        <a class=" modal-trigger " href="#modal1">     
                        <i class="material-icons ">edit</i>
                    </button>
                  </form>
                </div>
              </div>
            </td>
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
          <th>Nombre</th>
          <th>Apellido</th>
          <th>Usuario</th>
          <th>Direccion</th>
          <th>Telefono</th>
          <th>Email</th>
          <th>T.Doc</th>
          <th>Documento</th>
          <th>Estado</th>
        </tr>
        <?php
          foreach($info as $i => $data){	
        ?>
        <tr>
          <td><?=$data->names?></td>
          <td><?=$data->lastname?></td>
          <td><?=$data->username?></td>
          <td><?=$data->addres?></td>
          <td><?=$data->phone?></td> 
          <td><?=$data->email?></td>
          <td><?=$data->dtype?></td>
          <td><?=$data->document?></td>
          <td><?=$data->cond?></td>   
          <th><!------------------BOTON SELECCIONAR------------->
              <div>
                <form action="clientes.php" method="POST">
                  <button type="submit" id="<?=$data->idclientes?>" class="btn-floating indigo darken-1 lighten-4 tooltipped"  onclick="marcar(this.id)" data-tooltip="click para seleccionar" >
                      <i class="material-icons ">add_circle</i>
                      <input type="hidden" name="accion" value="obtenerid" >
                      <input type="hidden" name="id"  value="<?=$data->idclientes?>"></a> 
                      <input type="hidden" name="tab" value="clientes" >
                  </button>
                </form>
              </div>
          </th>
      </tr>
      <?php }?>
      <tr><!------------------PAGINACION----------------------->
        <td colspan="6" >
            <ul class="pagination center">
              <li class="disabled">
                <a href="clientes.php?pagina=<?=$antPagina?>">
                <i class="material-icons">chevron_left</i></a>
              </li>
              <li class="active"><a href="#!">1</a></li>
              <li class="waves-effect"><a href="#!">2</a></li>
              <li class="waves-effect"><a href="#!">3</a></li>
              <li class="waves-effect"><a href="#!">4</a></li>
              <li class="waves-effect"><a href="#!">5</a></li>
              <li class="waves-effect">
                <a href="clientes.php?pagina=<?=$sigPagina?>">
                <i class="material-icons">chevron_right</i></a>
              </li>
            </ul>
          </td>
        </tr>
      </table>
    </div>
  </div>
</div>
  <!------------------------- Modal Structure ---------------------->
  <div id="modal1" class="modal">
    <div class="modal-content row">
      <h5><center>MODIFICAR CLIENTE</center></h5>
      <table class="row">
        <tr>
          <th id="formBedicion">
            <div class="col s1">
              Nombre
            </div>
          </th>
          <th id="formBedicion">
            <div class="col s1">
              Apellido
            </div>
          </th>
          <th id="formBedicion">
            <div class="col s1">
              usuario
            </div>
          </th>
          <th id="formBedicion">
            <div class="col s1">
              Contraseña
            </div>
          </th>
          <th id="formBedicion">
            <div class="col s1">
             Direccion
            </div>
          </th>
          <th id="formBedicion">
            <div class="col s1">
              Telefono
            </div>
          </th>
          <th id="formBedicion">
            <div class="col s1">
                Email
            </div>
          </th>
          <th id="formBedicion">
            <div class=" col s1">
                T.Doc
            </div>
          </th>
          <th id="formBedicion">
            <div class=" col s1">
             Documento
            </div>
          </th>
          <th id="formBedicion">
            <div class="col s1">
              Estado
            </div>
          </th>
        </tr>
        <tr>
          <form action="clientes.php" method="POST">
            <td id="formBedicion">
              <div class="input-field  s12">
                  <input id="formBedicion2"; type="text" name = "dato_1" class="validate formEdicion">
                  <label id="textoFormularios" class="active formEdicion" ><?=$_SESSION['arrayMuestra'][0]->names?></label>
              </div>
            </td>
            <td id="formBedicion">
              <div class="input-field  s12">
                  <input  id="formBedicion2" type="text" name = "dato_2" class="validate">
                  <label id="textoFormularios" class="active" id="textoFormularios" ><?=$_SESSION['arrayMuestra'][0]->lastname?></label>
              </div>
            </td>
            <td id="formBedicion">
              <div class="input-field s12">
                  <input id="formBedicion2" type="text" name = "dato_3" class="validate">
                  <label id="textoFormularios" class="active"><?=$_SESSION['arrayMuestra'][0]->username?></label>
              </div>
            </td>
            <td id="formBedicion">
              <div class="input-field  s12">
                  <input id="formBedicion2" type="password" name = "dato_4" class="validate">
                  <label id="textoFormularios" class="active"><?=$_SESSION['arrayMuestra'][0]->passwords?></label>
              </div>
            </td>
            <td id="formBedicion">
              <div class="input-field s12">
                  <input id="formBedicion2" type="text" name = "dato_5" class="validate">
                  <label id="textoFormularios" class="active"><?=$_SESSION['arrayMuestra'][0]->addres?></label>
              </div>
            </td>
            <td id="formBedicion">
              <div class="input-field  s1">
                  <input id="formBedicion2" type="text" name = "dato_6" class="validate">
                  <label id="textoFormularios" class="active" ><?=$_SESSION['arrayMuestra'][0]->phone?></label>
              </div>
            </td>
            <td id="formBedicion">
              <div class="input-field s12">
                  <input  id="formBedicion2" type="text" name = "dato_7" class="validate">
                  <label id="textoFormularios" class="active"><?=$_SESSION['arrayMuestra'][0]->email?></label>
              </div>
            </td>
            <td id="formBedicion">
              <div class="input-field s12">
                  <input id="formBedicion2" type="text" name = "dato_8" class="validate">
                  <label id="textoFormularios" style="width:30px;" class="active"><?=$_SESSION['arrayMuestra'][0]->dtype?></label>
              </div>
            </td>
            <td>
              <div class="input-field  s12">
                  <input id="formBedicion2" type="text" name = "dato_9" class="validate">
                  <label id="textoFormularios" class="active"><?=$_SESSION['arrayMuestra'][0]->document?></label>
              </div>
            </td>
            <td id="formBedicion">
              <div class="input-field  s12">
                  <input id="formBedicion2"  type="text" name = "dato_10" class="validate">
                  <label id="textoFormularios" class="active"><?=$_SESSION['arrayMuestra'][0]->cond?></label>
              </div>
            </td>
          </tr>
          <tr>
            <td></td><td></td><td></td><td></td><td></td><td></td><td></td>
            <td>
              <div class="input-field col s12">
                    <button class="btn-floating btn-small indigo darken-1 pulse modal-close tooltipped" type="reset" data-tooltip="click para cancelar" >
                      <i class="material-icons right">clear</i>
                      <input type="hidden" name="accion" value="modificarDato2">
                    </button>
              </div>
            </td>
            <td>
              <form action="clientes.php" method="POST">
                <div class="input-field col s12">
                    <button class="btn-floating btn-small purple darken-4 pulse tooltipped" type="submit" data-tooltip="click para modificar" >
                      <i class="material-icons right">edit</i>
                      <input type="hidden" name="accion" value="modificarDato2">
                    </button>
                </div>
              </form>
            </td>
            <td>
              <form action="clientes.php" method = "POST">
                  <div class="input-field col s12">
                    <button class="btn-floating btn-small red pulse tooltipped" data-tooltip="click para eliminar">
                      <i class="material-icons">clear
                      <input type="hidden" name="accion" value="eliminar" >
                    </button>
                </div>
              </form>
            </td>
          </form>
        </tr> 
      </table>
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
  