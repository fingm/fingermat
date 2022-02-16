<?php

    if (isset($_GET['accion']) && $_GET['accion'] == "restablecer"){
        @session_start();
        @session_destroy();   
    }
    @session_start();
    $arrayTabla = array();

    if(!isset($_SESSION['miar']) ){
    $_SESSION['miar'] = array();
    }

// Verificacion e ingreso de la tabla
    if (isset($_GET['accion']) && $_GET['accion'] == "ingresar"){//1) Verifico si existe la accion, si existe verifico si es ingresar
        if(!empty($_GET['txtNombre']) && !empty($_GET['txtApellido']) && !empty($_GET['numEdad']) ){//verifico que ningun campo este vacio
            $txtNombre = $_GET['txtNombre'];
            $txtApellido = $_GET['txtApellido'];
            $numEdad = $_GET['numEdad'];
            $intLugar = count($_SESSION['miar']);
            $intLugar = $intLugar +1;
            $_SESSION['miar'][$intLugar] = array("nombre"=>$txtNombre,"apellido"=>$txtApellido,"edad"=>$numEdad);
        }
    }
 
//boton eliminar
    if (isset($_GET['accion']) && $_GET['accion'] == "eliminar"){
        if (isset($_GET['idRegistro']) && $_GET['idRegistro'] != ""){
            $idRegistro = $_GET['idRegistro'];
            $_SESSION['miar'][$idRegistro]['nombre'] = "";
        }
    }

//vamos a cargar los datos de entrada en un nuevo $arrayTabla
  //  $indiceExterno = 1;
    foreach($_SESSION['miar'] as $key => $datos){
        if ($datos['nombre'] != ""){
            $arrayTabla[$key] = $datos;
          //  $indiceExterno = $indiceExterno + 1 ;
        }
    }
?>  
<!-----------------Comienza HTML-------------------------------->
<!DOCTYPE html>
<html>
    <head>
        <title>Tabla de Matias Cartro</title>
        <style>
            .fileTable{
                margin-top: 5%;
                margin-left: 5%;
                width: 270px;
            }
            .formulario {
                margin-left: 0%;
                width: 100px;
            }
        </style>
    </head>
    <body>
<!-------------------Boton restablecer------------------------------>  
        <div>
            <form action="form_mati.php?action=restablecer" method="GET">
                <input type="hidden" name="accion" value="restablecer">
                <button type="submit" name="action">
                    restablecer
                </button>    
            </form>
        </div>  

<!-----------------------formulario--------------------------------->
        <div class="formulario">
            <form action="form_mati.php" method="GET">
                <tr>
                    <th>Nombre:</th>
                    <th>
                        <input type="text" id='idNombre' name="txtNombre">
                    </th>
                </tr>
                <tr>
                    <th>Apellido:</th>
                    <th>
                        <input type="text" id="idApellido" name="txtApellido">
                    </th>
                </tr>
                <tr>
                    <th>edad:</th>
                    <th>
                        <input type="number" id="idEdad" name="numEdad">
                    </th>
                </tr>
                <tr>
                    <input type="submit" value="ingresar" name="accion">
                </tr>
            </form>
        </div>

<!------------Tabla de nuevos datos--------------->
        <div class="fileTable">   
            <table>
                <tr>
                    <th class="fileTableCell">#</th>
                    <th class="fileTableCell">Nombre</th>
                    <th class="fileTableCell">Apellido</th>
                    <th class="fileTableCell">Edad</th>
                </tr>
<!-----------------Tabla que se genera----------------->
            <?php
                foreach($arrayTabla as $key => $datos){ ?>
                    <tr>
                        <td><?=$key?></td>
                        <td><?=$datos['nombre']?></td>
                        <td><?=$datos['apellido']?></td>
                        <td><?=$datos['edad']?></td>
                        <form accion="form_mati.php?actio=eliminar" method="GET">
                            <td>
                                <button type="submit" name="eliminar">borrar
                                     <input type="hidden" name="accion" value="eliminar">
                                     <input type="hidden" name="idRegistro" value="<?=$key?>">  
                                </button>
                            </td>
                        </form>
                    </tr>
                <?php
                    }
                ?>
            </table>
        </div> 
    </body>
</html>