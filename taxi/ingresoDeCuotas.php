<?php
      include("funciones.php");

      if (isset($_POST['accion']) && $_POST['accion'] == "borrarTodo"){
          borrarTodo();
      }   

      @session_start();

    //inicializo los arrays que voy a utilizar. Uno para ingreso de cuotas, otro para gastos.
    $arrayTabla = array();

    //si no existe tabla, la creo
    if (!isset($_SESSION['tabla'])){
        $_SESSION['tabla'] = array();
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
  
    //----------BOLETAS--------------
    if (isset($_POST['accion']) && $_POST['accion'] == "enviarTodoBoletas"){
        $cont = 0;
        while ( isset($arrayTabla) && $arrayTabla != "" && $arrayTabla[$cont]['fecha'] != "" ){
            insertarBoletas($arrayTabla,$cont);
            $cont ++;
        }
        borrarTodo();
    }

    //--------------eliminar elementos de CUOTAS-----------

    if (isset($_POST['accion']) && $_POST['accion'] == "eliminar"){
        if (isset($_POST['idRegistro']) && $_POST['idRegistro'] != ""){
            $idRegistro = $_POST['idRegistro'];
            $_SESSION['tabla'][$idRegistro]['fecha'] = "";
        }
    }
    
    //-------guardar en $arrayTabla tabla CUOTAS generada-----------

    foreach($_SESSION['tabla'] as $key => $datos){
        if ($datos['fecha'] != ""){
            $arrayTabla[$key] =$datos;
        }
    }  

    //----------BOLETAS--------------
    if (isset($_POST['accion']) && $_POST['accion'] == "enviarTodoBoletas"){
        $cont = 0;
        while ( isset($arrayTabla) && $arrayTabla != "" && $arrayTabla[$cont]['fecha'] != "" ){
            insertarBoletas($arrayTabla,$cont);
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
            <form action="ingresoDeCuotas.php" method="POST">
                <button type="submit" name= "borrarTodo">Borrar todo
                    <input type="hidden" name="accion" value="borrarTodo">
                </button>
            </form>
        </div>
    </section>
   
<!--------------tabla de ingreso de datos BOLETAS--------------------->        
    <aside>    
        <div >
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
                    <form action="ingresoDeCuotas.php" method="POST">    
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
                                    <form action="ingresoDeCuotas.php" method="POST">
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
                                <form action="ingresoDeCuotas.php" method = "POST">
                                    <button type="submit" name="enviarTodoBoletas" style="background-color :#f5c894;" >enviar Todo
                                            <input type="hidden" name="accion" value="enviarTodoBoletas">
                                    </button>        
                                </form>
                            </td>
                        </tr>
                    </table>
            </div>    
    </aside>
    <footer>
        <center>pagina creada por Matias Cartro</center> 
        <table>
        </table>
    </footer>
    </body>
</html>
