<?php
   include("funciones.php");
   if (isset($_POST['accion']) && $_POST['accion'] == 'ingresar'){
        if (!empty($_POST['socio_nombre']) && !empty($_POST['socio_apellido']) && !empty($_POST['socio_email']) && !empty($_POST['socio_telefono']) && !empty($_POST['socio_fdeingreso']) && !empty($_POST['socio_legajo'])){
            $conn = conectar();
            $nombre_socio = $_POST['socio_nombre'];
            $apellido_socio = $_POST['socio_apellido'];
            $email_socio = $_POST['socio_email'];
            $telefono_socio = $_POST['socio_telefono'];
            $fdeingreso_socio = $_POST['socio_fdeingreso'];
            $legajo_socio = $_POST['socio_legajo'];   
            $sql = "INSERT INTO socios (nombre, apellido, email, telefono, fdeingreso, legajo) VALUES ('$nombre_socio','$apellido_socio','$email_socio','$telefono_socio','$fdeingreso_socio','$legajo_socio')";
                        //verificr si la inserción fue exitosa
                        if (mysqli_query($conn, $sql)) {
                           //   echo "Insertado Satisfactoriamente"."<br/>"."<br/>";
                          }else {
                              echo "Error al insertar: " . $sql . "<br>" . mysqli_error($conn);
                          }
                          $conn = desconectar();
            $conn = desconectar(); 
        }
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
    <section >
        <div>
        <ul class="itemsSection"> <a href="index.php">inicio</a></ul>
            <ul class="itemsSection"><a href="socios.php">Socios</a></ul>
            <ul class="itemsSection"> <a href="ingresoDeGastos.php">ingresar Gastos</a></ul>
            <ul class="itemsSection"><a href="ingresoDeCuotas.php">Ingresar Cuotas</a></ul>
            <ul class="itemsSection"> <a href="ingresos.php">Entradas / Salidas</a></ul>
            <ul class="itemsSection"> <a href="salidas.php">Entradas / Salidas</a></ul>
        </div>
    </section>
    <aside>
        <div>
            <h3><center>INGRESAR SOCIO</center></h3>
            <table class="tablaSocios">
                <tr>
                    <th class = "celdasSocios">Nombre</th>
                    <th class = "celdasSocios">Apellido</th>
                    <th class = "celdasSocios">Email</th>
                    <th class = "celdasSocios">Telefono</th>
                    <th class = "celdasSocios">F. de Ingreso</th>
                    <th class = "celdasSocios">Legajo</th>
                    <th class = "celdasSocios">#</th>
                </tr>
                <tr>
                    <form action="socios.php" method ="POST">
                        <td>
                            <input class="formularioSocios" type="text" name="socio_nombre">
                        </td>
                        <td>
                            <input class="formularioSocios" type="text" name="socio_apellido">
                        </td>
                        <td>
                            <input class="formularioSocios" type="text" name="socio_email">
                        </td>
                        <td>
                            <input class="formularioSocios" type="number" name="socio_telefono">
                        </td>
                        <td>
                            <input class="formularioSocios" type="text" name="socio_fdeingreso">
                        </td>
                        <td>
                            <input class="formularioSocios" type="number" name="socio_legajo">
                        </td>
                        <td>
                            <input style="width:60px;" type="submit" name="accion" value="ingresar">
                        </td>
                    </form>
                </tr>
            </table>
        </div>
        <div>
            <div>
                <h3><center>SOCIOS</center></h3>
                <table class="tablaSocios">
                    <tr>
                        <th class = "celdasSocios">Nombre</th>
                        <th class = "celdasSocios">Apellido</th>
                        <th class = "celdasSocios">Email</th>
                        <th class = "celdasSocios">Telefono</th>
                        <th class = "celdasSocios">F. de Ingreso</th>
                        <th class = "celdasSocios">Legajo</th>
                        <th class = "celdasSocios">#</th>
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
