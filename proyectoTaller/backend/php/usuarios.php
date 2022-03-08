<?php include("main.php");
  $mostrar =  new generica();
  $info = $mostrar->obtenerDatos($mostrar->datosFiltrados('usuarios',"","","",""));

  if (isset($_SESSION['nivel']) && $_SESSION['nivel'] != 'administrador'){
    header ('Location: '.'sinacceso.php');
    $cerrar = new generica();
    $cerrar->eliminarSesion();
  }

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>
  <title>autosur/usuarios</title>

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
        <li><a href="clientes.php">clientes</a></li>
        <li><a href="vehiculos.php">vehiculos</a></li>
        <li><a href="usuarios.php">usuarios</a></li>
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
        <h5><center>INGRESO DE NUEVOS USUARIOS</center></h5>
        <table>
          <tr>        
            <form action="usuarios.php" method="POST">
              <td>
                <div class="row">
                  <div class="input-field col s12">
                    <input id="first_name2" type="text" name = "usu_nombre" class="validate">
                    <label id="textoFormularios" class="active" for="first_name2">Nombre</label>
                  </div>
                </div>
              </td>
              <td>
                <div class="row">
                  <div class="input-field col s12">
                    <input id="first_name2" type="text"  name = "usu_apellido" class="validate">
                    <label id="textoFormularios" class="active" for="first_name2">Apellido</label>
                  </div>
                </div>
              </td>
              <td>
                <div class="row">
                  <div class="input-field col s12">
                    <input id="first_name2" type="text" name = "usu_usuario" class="validate">
                    <label id="textoFormularios" class="active" for="first_name2">usuario</label>
                  </div>
                </div>
              </td>
              <td>
                <div class="row">
                  <div class="input-field col s12">
                    <input id="first_name2" type="password" name = "usu_contraseña" class="validate">
                    <label id="textoFormularios" class="active" for="first_name2">Contraseña</label>
                  </div>
                </div>
              </td>
              <td>
                <div class="row">
                  <div class="input-field col s12">
                    <input id="first_name2" type="text" name = "usu_email" class="validate">
                    <label id="textoFormularios" class="active" for="first_name2">Email</label>
                  </div>
                </div>
              </td>
              <td>
                <div class="row">
                  <div class="input-field col s12">
                    <input id="first_name2" type="text" name = "usu_tdoc" class="validate">
                    <label id="textoFormularios" class="active" for="first_name2">T.Documento</label>
                  </div>
                </div>
              </td>
              <td>
                <div class="row">
                  <div class="input-field col s12">
                    <input id="first_name2" type="text" name = "usu_documento" class="validate">
                    <label id="textoFormularios" class="active" for="first_name2">Documento</label>
                  </div>
                </div>
              </td>
              <td>
                <div class="row">
                  <div class="input-field col s12">
                    <input id="first_name2" type="text" name = "usu_estado" class="validate">
                    <label id="textoFormularios" class="active" for="first_name2">Estado</label>
                  </div>
                </div>
              </td>
              <td>
                <div class="row">
                  <div class="input-field col s12">
                    <input id="first_name2" type="text" name = "usu_nacceso" class="validate">
                    <label id="textoFormularios" class="active" for="first_name2">N.Acceso</label>
                  </div>
                </div>
              </td>
              <td>
                <div class="row"><!---------BOTON INGRESAR------------->
                  <div class="input-field col s12">
                    <button class="waves-light indigo lighten-1 btn-floating pulse tooltipped " type="submit" name="accion" value="ingresarUsuario"  data-tooltip="insertar usuario">
                      <i class="material-icons ">send</i>
                    </button>
                  </div>
                </div>
              </td>
              </form>
              <td><!---------BOTON EDITAR ------------->
                <div class = "row">
                <div class="input-field col s12">
                    <form action="#modal1" method="POST">
                      <button type="submit" class="btn-floating pulse  green lighten-3 tooltipped" data-tooltip="editar usuario seleccionado">
                          <a class=" modal-trigger " href="#modal1">     
                          <i class="material-icons ">edit</i>
                      </button>
                    </form>
                  </div>
                </div>
              </td>
            </tr>  
            <?php
              foreach($info as $i => $data){	
            ?>
                <tr>
                    <td><?=$data->names?></td>
                    <td><?=$data->lastname?></td>
                    <td><?=$data->username?></td>
                    <td><?=$data->passwords?></td>      
                    <td><?=$data->email?></td>
                    <td><?=$data->dtype?></td>
                    <td><?=$data->document?></td>
                    <td><?=$data->cond?></td>
                    <td><?=$data->acceslevel?></td>
                    <th><!---------BOTON SELECCIONAR------------->
                        <div>
                          <form action="usuarios.php" method="POST">
                            <button type="submit" id="<?=$data->idusuarios?>" class="btn-floating indigo darken-1 lighten-4 tooltipped"  onclick="marcar(this.id)" data-tooltip="click para seleccionar" >
                                <i class="material-icons ">add_circle</i>
                                <input type="hidden" name="accion" value="obtenerid" >
                                <input type="hidden" name="id"  value="<?=$data->idusuarios?>"></a> 
                                <input type="hidden" name="tab" value="usuarios" >
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
    <div class="modal-content row">
      <h5><center>MODIFICAR USUARIO</center></h5>
      <table class="row">
        <tr>
          <th>
            <div class="col s1">
              Nombre
            </div>
          </th>
          <th>
            <div class="col s1">
              Apellido
            </div>
          </th>
          <th>
            <div class="col s1">
                Usuario
            </div>
          </th>
          <th>
            <div class="col s1">
              Contraseña
            </div>
          </th>
          <th>
            <div class="col s1">
              Email
            </div>
          </th>
          <th>
            <div class="col s1">
                T.Doc
            </div>
          </th>
          <th>
            <div class=" col s1">
                Documento
            </div>
          </th>
          <th>
            <div class=" col s1">
              Estado
            </div>
          </th>
          <th>
            <div class="col s1">
              Acceso
            </div>
          </th>
        </tr>
        <tr>
          <form action="usuarios.php" method="POST">
            <td>
              <div class="input-field  s12">
                  <input id="first_name2"  style="width:80px;" type="text" name = "dato_1" class="validate formEdicion">
                  <label id="textoFormularios" class="active formEdicion" for="first_name2" ><?=$_SESSION['arrayMuestra'][0]->names?></label>
              </div>
            </td>
            <td>
              <div class="input-field  s12">
                  <input id="first_name2" type="text" name = "dato_2" class="validate">
                  <label id="textoFormularios" class="active" id="textoFormularios" for="first_name2"><?=$_SESSION['arrayMuestra'][0]->lastname?></label>
              </div>
            </td>
            <td>
              <div class="input-field s12">
                  <input id="first_name2" type="text" name = "dato_3" class="validate">
                  <label id="textoFormularios" class="active" for="first_name2"><?=$_SESSION['arrayMuestra'][0]->username?></label>
              </div>
            </td>
            <th>
              <div class="input-field  s12">
                  <input id="first_name2" type="password" name = "dato_4" class="validate">
                  <label id="textoFormularios" class="active" for="first_name2"><?=$_SESSION['arrayMuestra'][0]->passwords?></label>
              </div>
            </td>
            <td>
              <div class="input-field s12">
                  <input id="first_name2" type="text" style="width:160px;" name = "dato_5" class="validate">
                  <label id="textoFormularios" class="active" for="first_name2"><?=$_SESSION['arrayMuestra'][0]->email?></label>
              </div>
            </td>
            <td>
              <div class="input-field  s1">
                  <input id="first_name2" style="width:80px;" type="text" name = "dato_6" class="validate">
                  <label id="textoFormularios" class="active" for="first_name2"><?=$_SESSION['arrayMuestra'][0]->dtype?></label>
              </div>
            </td>
            <td>
              <div class="input-field s12">
                  <input id="first_name2" type="text" name = "dato_7" class="validate">
                  <label id="textoFormularios" class="active" for="first_name2"><?=$_SESSION['arrayMuestra'][0]->document?></label>
              </div>
            </td>
            <td>
              <div class="input-field s12">
                  <input id="first_name2" type="text" name = "dato_8" class="validate">
                  <label id="textoFormularios" class="active" for="first_name2"><?=$_SESSION['arrayMuestra'][0]->cond?></label>
              </div>
            </td>
            <td>
              <div class="input-field  s12">
                  <input id="first_name2" type="text" name = "dato_9" class="validate">
                  <label id="textoFormularios" class="active" for="first_name2"><?=$_SESSION['arrayMuestra'][0]->acceslevel?></label>
              </div>
            </td>
          </tr>
          <tr>
            <td></td><td></td><td></td><td></td><td></td><td></td>
            <td>
              <div class="input-field col s12">
                    <button class="btn-floating btn-large indigo darken-1 pulse modal-close tooltipped" type="reset" data-tooltip="click para cancelar" >
                      <i class="material-icons right">clear</i>
                      <input type="hidden" name="accion" value="modificarDato2">
                    </button>
              </div>
            </td>
            <td>
              <form action="usuarios.php" method="POST">
                <div class="input-field col s12">
                    <button class="btn-floating btn-large yellow pulse tooltipped" type="submit" data-tooltip="click para modificar" >
                      <i class="material-icons right">edit</i>
                      <input type="hidden" name="accion" value="modificarDato2">
                    </button>
                </div>
              </form>
            </td>
            <td>
              <form action="usuarios.php" method = "POST">
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
