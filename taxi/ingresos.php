<?php
    include("funciones.php");
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
            <ul class="itemsSection"> <a href="socios.php">Socios</a></ul>
            <ul class="itemsSection"> <a href="ingresoDeGastos.php">ingresar Gastos</a></ul>
            <ul class="itemsSection"> <a href="ingresoDeCuotas.php">Ingresar Cuotas</a></ul>
            <ul class="itemsSection"> <a href="ingresos.php">Entradas / Salidas</a></ul>
            <ul class="itemsSection"> <a href="salidas.php">Entradas / Salidas</a></ul>
        </div>
    </section>
    <aside >
        <div class="divDoblesUno">
            <table class="tablaIngresosGeneral"> 
                <h3><center>INGRESOS</center></h3>
                <tr>
                    <th class="tablaIngresos">Fecha</th>
                    <th class="tablaIngresos">Nombre</th>
                    <th class="tablaIngresos">Coche</th>
                    <th class="tablaIngresos">Gasto</th>
                    <th class="tablaIngresos">Pos</th>
                    <th class="tablaIngresos">Efectivo</th>
                    <th class="tablaIngresos">Cuota</th>
                </tr>
                <?php
                    $consulta = "SELECT * FROM boletas";
                    $conexion = conectar();
                    $resultado = mysqli_query($conexion,$consulta);
                    while($row = mysqli_fetch_assoc($resultado)){  
                ?>
                <tr>
                    <th class="tablaIngresos"><?php echo ($row["fecha"]);?></th>
                    <th class="tablaIngresos"><?php echo ($row["nombre"]);?></th>
                    <th class="tablaIngresos"><?php echo ($row["coche"]);?></th>
                    <th class="tablaIngresos"><?php echo ($row["gasto"]);?></th>
                    <th class="tablaIngresos"><?php echo ($row["pos"]);?></th>
                    <th class="tablaIngresos"><?php echo ($row["efectivo"]);?></th>
                    <th class="tablaIngresos"><?php echo ($row["cuota"]);?></th>
                </tr>
               <?php } 
                    $conexion = desconectar();
               ?>

            </table>
        </div>
        <div class="divDoblesUno" style="margin-left : 150px;">
            <table class="tablaIngresosGeneral"> 
                <h3><center>GASTOS</center></h3>
                <tr>
                    <th class="tablaIngresos">Fecha</th>
                    <th class="tablaIngresos">Coche</th>
                    <th class="tablaIngresos">Gasto</th>
                    <th class="tablaIngresos">Detalle</th>
                </tr>
                <?php
                    $consulta = "SELECT * FROM gastos";
                    $conexion = conectar();
                    $resultado = mysqli_query($conexion,$consulta);
                    while($row = mysqli_fetch_assoc($resultado)){  
                ?>
                <tr>
                    <th class="tablaIngresos"><?php echo ($row["fecha"]);?></th>
                    <th class="tablaIngresos"><?php echo ($row["coche"]);?></th>
                    <th class="tablaIngresos"><?php echo ($row["gasto"]);?></th>
                    <th class="tablaIngresos"><?php echo ($row["detalle"]);?></th>
                </tr>
               <?php }
                $consulta = desconectar();
               ?>

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
