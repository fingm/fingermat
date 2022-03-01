<?php 
    $servidor ="localhost";
    $usuario = "root";
    $clave = "Newton9.80";
    $conexion = new PDO("mysql:host=$servidor;dbname=TallerDeInfo",$usuario,$clave);
    $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo ("Conexión realizada Satisfactoriamente");
/*
//Elijo la sentencia sql
$sqlPersonas = "SELECT * FROM  personas ;";

//Preparo y ejecuto la sentencia
$mysqlPreparado = $conexion->prepare($sqlPersonas);
$respuesta = $mysqlPreparado->execute();
$lista = $mysqlPreparado->fetchall();
*/
if (isset($_POST['accion'])) {
    if ($_POST['accion'] != "") {
        if ($_POST['accion'] == "ingresar"){
            
            $nombre = $_POST['nombre'];
            $apellido = $_POST['apellido'];
            $edad= $_POST['edad'];

            $sql_ingreso_persona = "INSERT INTO personas SET
                                    nombre = :nombre,
                                    apellido = :apellido,
                                    edad = :edad;";

            $arrayPersona = array(
                "nombre" => $nombre,
                "apellido" => $apellido,
                "edad" => $edad
            );  
            
            $mysqlPreparado = $conexion->prepare($sql_ingreso_persona);
            $respuesta= $mysqlPreparado->execute($arrayPersona);
        }
    }
}

?>

<!DOCTYPE html>

<html>
    <head>
        <link rel="stylesheet" href="TrabajoConexion.css">
        <title>TRABAJO CONEXION</title>
    </head>
    <body>
        <aside>
            <table>
                <tr>
                    <td class="celdas">Nombre</td>
                    <td class="celdas">Apellido</td>
                    <td class="celdas">Edad</td>
                    <td class="celdas" style ="width: 50px;">#</td>
                </tr>
                <form action="TrabajoConexion.php" method="POST">
                    <tr>
                        <td>
                            <input type="text" name="nombre">
                        </td>
                        <td>
                            <input type="text" name="apellido">
                        </td>
                        <td>
                            <input type="number" name="edad">
                        </td>
                        <td>
                            <form action="TrabajoConexion" method="POST">
                                <button>
                                    enviar<input type="hidden" name="accion" value="ingresar">
                                </button>
                            </form>
                        </td>
                    </tr>
                </form>
            </table>
        </aside>
        

    </body>
</html>