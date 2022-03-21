<?php 
  include("../../controladores/controlador.php");

  if (!isset($_SESSION['seguridad'])){
    header ('Location: '.'sinacceso.php');
    $cerrar = new generica();
    $cerrar->eliminarSesion();
  }
  
  $mostrar =  new generica();
  $info = $mostrar->obtenerDatos($mostrar->datosFiltrados('vehiculos',"","","","","","","",""));

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

<div class="container">
    <div class="row">
      <div class="col s12">
        <h5><center>INGRESO DE NUEVOS VEHICULOS</center></h5>
        <table>
          <tr>        
            <form action="vehiculos.php" method="POST" enctype="multipart/form-data">
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
                    <input type="text"  name = "matricula" class="validate">
                    <label id="textoFormularios" class="active" >Matricula</label>
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
                    <input type="text" name = "modelo" class="validate">
                    <label id="textoFormularios" class="active" >Modelo</label>
                  </div>
                </div>
              </td>
              <td>
                <div class="row">
                  <div class="input-field col s12">
                    <input type="text" name = "color" class="validate">
                    <label id="textoFormularios" class="active">Color</label>
                  </div>
                </div>
              </td>
              <td>
                <div class="row">
                  <div class="input-field col s12">
                    <input type="text" name = "año" class="validate">
                    <label id="textoFormularios" class="active">Año</label>
                  </div>
                </div>
              </td>
              <td>
                <div class="row">
                  <div class="input-field col s12">
                    <input type="text" name = "pasajeros" class="validate">
                    <label id="textoFormularios" class="active" >Pasajeros</label>
                  </div>
                </div>
              </td>
              <td>
                <div class="row">
                  <div class="input-field col s12">
                    <input type="text" name = "precio" class="validate">
                    <label id="textoFormularios" class="active">Costo</label>
                  </div>
                </div>
              </td>
              <td>
                <div class="file-field input-field col s12"><!-- INSERTAR FOTO-->
                  <div class="btn">
                    <span>Imagen</span>
                    <input type="file" name="insImagen" placeholder="imagen">
                  </div>
                </div>
              </td>
              <td>
                <div class="row"><!---------BOTON INGRESAR------------->
                  <div class="input-field col s12">
                    <button class="waves-light indigo lighten-1 btn-floating pulse tooltipped " type="submit" name="accion" value="ingresarVehiculo"  data-tooltip="insertar vehiculo">
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
                      <button type="submit" class="btn-floating pulse  green lighten-3 tooltipped" data-tooltip="editar vehiculo seleccionado">
                          <a class=" modal-trigger " href="#modal1">     
                          <i class="material-icons ">edit</i>
                      </button>
                    </form>
                  </div>
                </div>
              </td>
            </tr>  
        </table>      
    <div>
  <div>
</div>
  <div class="row col s12">
    <div >     
      <table> 
            <tr>
              <th>Tipo</th>
              <th>Matricula</th>
              <th>Marca</th>
              <th>Modelo</th>
              <th>Color</th>
              <th>Año</th>
              <th>pasajeros</th>
              <th>Disp</th>
              <th>Desde</th>
              <th>Hasta</th>
              <th>Costo</th>
              <th>Foto</th>
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
                <td><?=$data->vcost?></td>    
                <td>
                  <img src="../../librerias/imagenes/<?=$data->vphoto?>"; width="160px">
                </td>
 
                <th><!---------BOTON SELECCIONAR------------->
                    <div>
                      <form action="vehiculos.php" method="POST">
                        <button type="submit" id="<?=$data->idvehiculos?>" class="btn-floating indigo darken-1 lighten-4 tooltipped"  onclick="marcar(this.id)" data-tooltip="click para seleccionar" >
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
    <div class="modal-content row">
      <h5><center>MODIFICAR VEHICULO</center></h5>
      <table class="row s1">
        <tr>
          <th id="formBedicion">
            <div class="col s1">
              Tipo
            </div>
          </th>
          <th id="formBedicion">
            <div class="col s1">
              Mat
            </div>
          </th>
          <th id="formBedicion">
            <div class="col s1">
                Marca
            </div>
          </th>
          <th id="formBedicion">
            <div class="col s1">
              Modelo
            </div>
          </th>
          <th id="formBedicion">
            <div class="col s1">
              Color
            </div>
          </th>
          <th id="formBedicion">
            <div class="col s1">
              Año
            </div>
          </th>
          <th id="formBedicion">
            <div class="col s1">
                Pasaj
            </div>
          </th>
          <th id="formBedicion">
            <div class="col s1">
              Foto
            </div>
          </th>
          <th id="formBedicion">
            <div class="col s1">
              Costo
            </div>
          </th>
        </tr>
        <tr>
          <form action="vehiculos.php" method="POST">
            <td id="formBedicion">
              <div class="input-field  s12">
                  <input id="formBedicion2"; type="text" name = "dato_1" class="validate formEdicion">
                  <label id="textoFormularios" class="active formEdicion" ><?=$_SESSION['arrayMuestra'][0]->vtype?></label>
              </div>
            </td>
            <td id="formBedicion">
              <div class="input-field  s12">
                  <input  id="formBedicion2" type="text" name = "dato_2" class="validate">
                  <label id="textoFormularios" class="active" id="textoFormularios" ><?=$_SESSION['arrayMuestra'][0]->vmatricula?></label>
              </div>
            </td>
            <td id="formBedicion">
              <div class="input-field s12">
                  <input id="formBedicion2" type="text" name = "dato_3" class="validate">
                  <label id="textoFormularios" class="active"><?=$_SESSION['arrayMuestra'][0]->vbrand?></label>
              </div>
            </td>
            <td id="formBedicion">
              <div class="input-field  s12">
                  <input id="formBedicion2"" type="text" name = "dato_4" class="validate">
                  <label id="textoFormularios" class="active"><?=$_SESSION['arrayMuestra'][0]->vmodel?></label>
              </div>
            </td>
            <td id="formBedicion">
              <div class="input-field s12">
                  <input id="formBedicion2" type="text" name = "dato_5" class="validate">
                  <label id="textoFormularios" class="active"><?=$_SESSION['arrayMuestra'][0]->vcolor?></label>
              </div>
            </td>
            <td id="formBedicion">
              <div class="input-field  s1">
                  <input id="formBedicion2" type="text" name = "dato_6" class="validate">
                  <label id="textoFormularios" class="active" ><?=$_SESSION['arrayMuestra'][0]->vyear?></label>
              </div>
            </td>
            <td id="formBedicion">
              <div class="input-field s12">
                  <input  id="formBedicion2" type="text" name = "dato_7" class="validate">
                  <label id="textoFormularios" class="active"><?=$_SESSION['arrayMuestra'][0]->vpassengers?></label>
              </div>
            </td>
            <td id="formBedicion">
              <div class="input-field  s12">
                  <input id="formBedicion2" type="text" name = "dato_12" class="validate">
                  <label id="textoFormularios" class="active"><?=$_SESSION['arrayMuestra'][0]->vphoto?></label>
              </div>
            </td>
            <td id="formBedicion">
              <div class="input-field  s12">
                  <input id="formBedicion2" type="text" name = "dato_13" class="validate">
                  <label id="textoFormularios" class="active"><?=$_SESSION['arrayMuestra'][0]->vcost?></label>
              </div>
            </td>
          </tr>
          <tr>
            <td></td><td></td><td></td><td></td><td></td><td></td>
            <td>
              <div class="input-field col s12">
                    <button class="btn-floating btn-small indigo darken-1 pulse modal-close tooltipped" type="reset" data-tooltip="click para cancelar" >
                      <i class="material-icons right">clear</i>
                      <input type="hidden" name="accion" value="modificarDato2">
                    </button>
              </div>
            </td>
            <td>
              <form action="vehiculos.php" method="POST">
                <div class="input-field col s12">
                    <button class="btn-floating btn-small purple darken-4 pulse tooltipped" type="submit" data-tooltip="click para modificar" >
                      <i class="material-icons right">edit</i>
                      <input type="hidden" name="accion" value="modificarDato2">
                    </button>
                </div>
              </form>
            </td>
            <td>
              <form action="vehiculos.php" method = "POST">
                  <div class="input-field col s12">
                    <button class="btn-floating btn-small red pulse tooltipped" data-tooltip="click para eliminar">
                      <i class="material-icons">clear
                      <input type="hidden" name="accion" value="eliminar">
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
  