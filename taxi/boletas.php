<?php
    include("funciones.php");

    if (isset($_POST['accion']) && $_POST['accion'] == "borrarTodo"){
        borrarTodo();
    }    

    @session_start();
    
    //inicializo los arrays que voy a utilizar. Uno para ingreso de cuotas, otro para gastos.
    $arrayTabla = array();
    $arrayTablaGastos = array();
    
    //si no existe tabla, la creo
    if (!isset($_SESSION['tabla'])){
        $_SESSION['tabla'] = array();
    }

    //si no existe tabla, la creo
    if (!isset($_SESSION['tabla2'])){
        $_SESSION['tabla2'] = array();
    }

    //-------Ingreso de datos de formulario de boletas-----------

    if (isset($_POST['accion']) && $_POST['accion'] == "cargar"){
        if(!empty($_POST['numFecha']) && !empty($_POST['txtNombre']) && !empty($_POST['numCoche']) && !empty($_POST['numGasto']) && !empty($_POST['numPos']) && !empty($_POST['numEfectivo']) && !empty($_POST['numCuota'])){
                $numFecha = $_POST['numFecha'];
                $txtNombre = $_POST['txtNombre']; 
                $numCoche = $_POST['numCoche'];
                $numGasto = $_POST['numGasto'];
                $numPos = $_POST['numPos'];
                $numEfectivo = $_POST['numEfectivo'];
                $numCuota = $_POST['numCuota'];
                $posicion = count($_SESSION['tabla']);
                $_SESSION['tabla'][$posicion] = array("fecha"=>$numFecha,"nombre"=>$txtNombre,"coche"=>$numCoche,"gasto"=>$numGasto,"pos"=>$numPos,"efectivo"=>$numEfectivo,"cuota"=>$numCuota);
        }
    } 

    //-------Ingreso de datos de formulario de gastos-----------

    if (isset($_POST['accion']) && $_POST['accion'] == "carga"){
        if(!empty($_POST['numFecha2']) && !empty($_POST['numCoche2']) && !empty($_POST['numGasto2']) && !empty($_POST['txtDetalle2'])){
                $numFecha2 = $_POST['numFecha2'];
                $numCoche2 = $_POST['numCoche2'];              
                $numGasto2 = $_POST['numGasto2'];
                $txtDetalle2 = $_POST['txtDetalle2']; 
                $posicion = count($_SESSION['tabla2']);
                $_SESSION['tabla2'][$posicion] = array("fecha2"=>$numFecha2,"coche2"=>$numCoche2,"gasto2"=>$numGasto2,"detalle2"=>$txtDetalle2);
        }
    }

    //--------------eliminar elementos de CUOTAS-----------

    if (isset($_POST['accion']) && $_POST['accion'] == "eliminar"){
        if (isset($_POST['idRegistro']) && $_POST['idRegistro'] != ""){
            $idRegistro = $_POST['idRegistro'];
            $_SESSION['tabla'][$idRegistro]['fecha'] = "";
        }
    }

    //--------------eliminar elementos de la GASTOS-----------//

    if (isset($_POST['accion']) && $_POST['accion'] == "eliminar2"){
        if (isset($_POST['idRegistro2']) && $_POST['idRegistro2'] != ""){
            $idRegistro = $_POST['idRegistro2'];
            $_SESSION['tabla2'][$idRegistro]['fecha2'] = "";
        }
    }

    //-------guardar en $arrayTabla tabla CUOTAS generada-----------

    foreach($_SESSION['tabla'] as $key => $datos){
        if ($datos['fecha'] != ""){
            $arrayTabla[$key] =$datos;
        }
    }

    //-------guardar en $arrayTabla tabla GASTOS generada-----------//

    foreach($_SESSION['tabla2'] as $key => $datos){
        if ($datos['fecha2'] != ""){
            $arrayTablaGastos[$key] = $datos;
        }
    }

    //----------------------calculo de totales----------------//
    function sumar($arreglo , $lugar){
        foreach ($arreglo as $key => $datos){
            if ((isset($datos['fecha']) && $datos['fecha'] != "" ) || (isset($datos['fecha2']) && $datos['fecha2'] != "" )){
                $total += $datos[$lugar];
            }
         }  
        return $total;
    }

 //--------------CARGA BASE DE DATOS-------------------

    //----------BOLETAS--------------
    if (isset($_POST['accion']) && $_POST['accion'] == "enviarTodoBoletas"){
        $cont = 0;
        while ( isset($arrayTabla) && $arrayTabla != "" && $arrayTabla[$cont]['fecha'] != "" ){
            insertarBoletas($arrayTabla,$cont);
            $cont ++;
        }
        borrarTodo();
    }

    //----------GASTOS--------------
    if (isset($_POST['accion']) && $_POST['accion'] == "enviarTodoGastos"){
        $cont = 0;
        while (isset($arrayTablaGastos) && $arrayTablaGastos != "" && $arrayTablaGastos[$cont]['fecha2'] != "" ){
            insertarGastos($arrayTablaGastos,$cont);
            $cont ++;
        }
        borrarTodo();
    }
?>

<!DOCTYPE html>
<html>
    <head>
      <link rel="stylesheet" href="estilos.css">
    </head>
    <body>
    <nav>
    </nav>
    <header> 
        <div>
            <div class="headerInd">
                <center><img src="coop.png" width="65px" ></center>
            </div>
            <div class="headerInd">
                <h2><center>C.O.CE.CO</center></h2>
            </div>
            <div class="headerInd">
                <center><img src="coop.png" width="65px" ></center>
            </div>
        </div>
    </header>
    <section class="divsections">
        <div>
            <ul class="itemsSection"> <a href="index.php">inicio</a></ul>
            <ul class="itemsSection"><a href="socios.php">Socios</a></ul>
            <ul class="itemsSection"> <a href="boletas.php">ingresar boletas</a></ul>
            <ul class="itemsSection">Quienes somos</ul>
        </div>
        
        <div style="margin-top: 600px; margin-left: 100px;">
            <form action="boletas.php" method="POST">
                <button type="submit" name= "borrarTodo">Borrar todo
                    <input type="hidden" name="accion" value="borrarTodo">
                </button>
            </form>
        </div>
    </section>
    <aside>
<!--------------tabla de ingreso de datos BOLETAS--------------------->        
        <div>
            <div class="divTablaUno" >
                <h3><center>INGRESAR LAS CUOTAS</center></h3>
                <table>
                    <tr>
                        <th class="divTableCell">Fecha</th> 
                        <th class="divTableCell">Nombre</th>    
                        <th class="divTableCell">Coche</th>
                        <th class="divTableCell">Gasto</th>
                        <th class="divTableCell">Pos</th>
                        <th class="divTableCell">Efectivo</th>
                        <th class="divTableCell">Cuota</th>
                        <th class="divTableCell">#</th>
                    </tr>
                    <form action="boletas.php" method="POST">    
                        <tr>
                            <td class="divTableCell"><input class="divFormCell" type="number" id="idFecha" name="numFecha" ></td>    
                            <td class="divTableCell"><input class="divFormCell" type="text" id="idNombre" name="txtNombre"></td>
                            <td class="divTableCell"><input class="divFormCell" type="number" id="idCoche" name="numCoche"></td>
                            <td class="divTableCell"><input class="divFormCell" type="number" id="idGasto" name="numGasto"></td>
                            <td class="divTableCell"><input class="divFormCell" type="number" id="idPos" name="numPos"></td>
                            <td class="divTableCell"><input class="divFormCell" type="number" id="idEfectivo" name="numEfectivo"></td>
                            <td class="divTableCell"><input class="divFormCell" type="number" id="idCuota" name="numCuota"></td>
                            <td> <input type="submit" value="cargar" name="accion"> </td>
                        </tr>
                    </form>
                        <?php foreach($arrayTabla as $key => $datos){ ?> 
                            <tr>
                                <td><?=$datos['fecha']?></td>
                                <td><?=$datos['nombre']?></td> 
                                <td><?=$datos['coche']?></td> 
                                <td><?=$datos['gasto']?></td> 
                                <td><?=$datos['pos']?></td> 
                                <td><?=$datos['efectivo']?></td>
                                <td><?=$datos['cuota']?></td> 
                                <td>  
                                    <form action="boletas.php" method="POST">
                                        <button type="submit" name="eliminar">$
                                            <input type="hidden" name="accion" value="eliminar">
                                            <input type="hidden" name="idRegistro" value="<?=$key?>">
                                        </button>
                                    </form>
                                </td>   
                            </tr>
                        <?php } ?>
                            <tr><!-- Esta es la fila de totales-->
                                <td></td>    
                                <td></td>
                                <td class="result1">total $</td>
                                <td class="result1"><?=sumar($arrayTabla,'gasto')?></td> 
                                <td class="result1"><?=sumar($arrayTabla,'pos')?></td> 
                                <td class="result1"><?=sumar($arrayTabla,'efectivo')?></td>
                                <td class="result1"><?=sumar($arrayTabla,'cuota')?></td> 
                                <td>
                                    <form action="boletas.php" method = "POST">
                                        <button type="submit" name="enviarTodoBoletas" style="background-color :#f5c894;" >enviar Todo
                                             <input type="hidden" name="accion" value="enviarTodoBoletas">
                                        </button>        
                                    </form>
                                </td>
                            </tr>
                </table>
            </div>
<!--------------------------Ingreso de gastos--------------------------- -->          
            <div>
                <div class="divTablaDos" >
                    <h3><center>INGRESAR LOS GASTOS</center></h3>
                    <table>
                        <tr>
                            <th class="divTableCell2">Fecha</th> 
                            <th class="divTableCell2">Coche</th>
                            <th class="divTableCell2">Gasto</th>
                            <th class="divTableCell2">Detalle</th>
                            <th class="divTableCell2" >#</th>
                        </tr>
                        <form action="boletas.php" method="POST">    
                            <tr">
                                <td class="divTableCell"><input class="divFormCell2"  style="margin-left: 10px;" type="number" id="idFecha2" name="numFecha2" ></td>    
                                <td class="divTableCell"><input class="divFormCell2" type="number" id="idCoche2" name="numCoche2"></td>
                                <td class="divTableCell"><input class="divFormCell2" type="number" id="idGasto2" name="numGasto2"></td>
                                <td class="divTableCell"><input class="divFormCell2" type="text" style="width: 250px;"  id="idDetalle2" name="txtDetalle2"></td>
                                <td><input type="submit" value="carga" name="accion"></td>
                            </tr>
                        </form>
                            <?php foreach($arrayTablaGastos as $key => $datos){ ?> 
                                <tr>
                                    <td><?=$datos['fecha2']?></td>
                                    <td><?=$datos['coche2']?></td> 
                                    <td><?=$datos['gasto2']?></td> 
                                    <td><?=$datos['detalle2']?></td> 
                                    <td>  
                                        <form action="boletas.php" method="POST">
                                            <button type="submit" name="eliminar2">$
                                                <input type="hidden" name="accion" value="eliminar2">
                                                <input type="hidden" name="idRegistro2" value="<?=$key?>">
                                            </button>
                                        </form>
                                    </td>   
                                </tr>
                            <?php } ?>

                            <tr>
                                <td></td>
                                <td class="result1">Total $</td>
                                <td class="result1"><?=sumar($arrayTablaGastos,'gasto2')?></td>
                                <td>
                                    <form action="boletas.php" method = "POST">
                                        <button type="submit" name="enviarTodoGastos" style="background-color :#f5c894;" >enviar Todo
                                             <input type="hidden" name="accion" value="enviarTodoGastos">
                                        </button>        
                                    </form>
                                </td>
                            </tr>
                    </table>

                </div>                
            </div>

        </div>
    </aside>
    <footer>
        <center>pagina creada por Matias Cartro</center> 
        <table>
        </table>
    </footer>
    </body>
</html>
