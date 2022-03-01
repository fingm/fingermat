<?php 
     include("funciones.php");

     if (isset($_POST['accion']) && $_POST['accion'] == "borrarTodo"){
         borrarTodo();
     }    
 
     @session_start();

     $arrayTablaGastos = array();  

    //si no existe tabla, la creo
    if (!isset($_SESSION['tabla2'])){
        $_SESSION['tabla2'] = array();
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
    //--------------eliminar elementos de la GASTOS-----------//

    if (isset($_POST['accion']) && $_POST['accion'] == "eliminar2"){
        if (isset($_POST['idRegistro2']) && $_POST['idRegistro2'] != ""){
            $idRegistro = $_POST['idRegistro2'];
            $_SESSION['tabla2'][$idRegistro]['fecha2'] = "";
        }
    }

    //-------guardar en $arrayTabla tabla GASTOS generada-----------//

    foreach($_SESSION['tabla2'] as $key => $datos){
        if ($datos['fecha2'] != ""){
            $arrayTablaGastos[$key] = $datos;
        }
    }
    //---------CARGA BSAE DE DATOS--------------
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
            <ul class="itemsSection"> <a href="ingresoDeGastos.php">ingresar Gastos</a></ul>
            <ul class="itemsSection"><a href="ingresoDeCuotas.php">Ingresar Cuotas</a></ul>
            <ul class="itemsSection"> <a href="ingresos.php">Entradas / Salidas</a></ul>
            <ul class="itemsSection"> <a href="salidas.php">Entradas / Salidas</a></ul>
        </div>
        <div style="margin-top: 600px; margin-left: 100px;">
            <form action="ingresoDeGastos.php" method="POST">
                <button type="submit" name= "borrarTodo">Borrar todo
                    <input type="hidden" name="accion" value="borrarTodo">
                </button>
            </form>
        </div>
    </section>
   
<!--------------tabla de ingreso de datos BOLETAS--------------------->        
    <aside>    
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
                        <form action="ingresoDeGastos.php" method="POST">    
                            <tr">
                                <td class="divTableCell"><input class="divFormCell2" type="number" id="idFecha2" name="numFecha2" ></td>    
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
                                        <form action="ingresoDeGastos.php" method="POST">
                                            <button type="submit" name="eliminar2">$
                                                <input type="hidden" name="accion" value="eliminar2">
                                                <input type="hidden" name="idRegistro2" value="<?=$key?>">
                                            </button>
                                        </form>
                                    </td>   
                                </tr>
                            <?php } ?>
                            <tr>
                                <td class="result1">Total $</td>
                                <td class="result1"><?=sumar($arrayTablaGastos,'gasto2')?></td>
                                <td>
                                    <form action="ingresoDeGastos.php" method = "POST">
                                        <button type="submit" name="enviarTodoGastos" style="background-color :#f5c894;" >enviar Todo
                                             <input type="hidden" name="accion" value="enviarTodoGastos">
                                        </button>        
                                    </form>
                                </td>
                            </tr>
                    </table>
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

