<?php

@session_start();
    if (!isset($_SESSION['tabla'])){
        $_SESSION['tabla'] = array(); 
        $_SESSION['tabla'][1]= array("Nombre"=>"Matias","Apellido"=>"Cartro","Edad"=>"32");
        $_SESSION['tabla'][3]= array("Nombre"=>"Fantino","Apellido"=>"Cartro","Edad"=>"11");
        $_SESSION['tabla'][4]= array("Nombre"=>"Luciano","Apellido"=>"Cartro","Edad"=>"6");
        $_SESSION['tabla'][4]= array("Nombre"=>"Martino","Apellido"=>"Cartro","Edad"=>"0");
    }   
        foreach($_SESSION['tabla'] as $datos){
            print_r($datos);

        } 
        $nombre = $_POST['nombre'];
        $apellido = $_POST['apellido'];
        $edad = $_POST['edad'];
?>




<!DOCTYPE html>
<html>
    <head>
        <title>Formulario PHP</title>
    </head>
    <body>

    <form action="form1.php" method="POST">
        <p>Nombre:<input type="text" name="nombre"/></p>
        <p>Apellido: <input type="text" name="apellido"/></p> <!--name = nombre de la variable temporal -->
        <p>Edad: <input type="number" name="edad"/></p>
        <p> <input type="submit" value="Enviar"> </p> <!-- Value = lo que dice el boton -->
    </form>
        <table>
            <tr>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Edad</th>
            </tr>
            <tr>
                <td>
                    <?=$nombre?>
                </td>
                <td>
                    <?=$apellido?>
                </td>
                <td>
                    <?=$edad?>
                </td>
            </tr>
        </table>
    
    
    </body>
</html>