<?php

$nombre = $_GET['nombre']; // $_GET es un array asociativo
$edad = $_GET['edad'];
$color = $_GET ['color'];

?>


<!DOCTYPE html>
<html>
    <head>
        <title>Estructuras de control</title>
    </head>
    <body>
        <form method="$_GET" action="struct_control.php"> <!-- El metodo get te muestra los datos en la barra de navegacion  -->
            <table>
            <tr>
                <td>
                    <label>Nombre</label>
                </td>
                <td>
                    <input type="text" name = "nombre">
                </td>
            </tr>
            <tr>
                <td>
                    <label>Edad</label>
                </td>
                <td>
                    <input type="number" name = "edad">
                </td>
            </tr>
            <tr>
                <td>
                    <label>color</label>
                </td>
                <td>
                    <input type="text" name = "color">
                </td>
                <button>Enviar</button>
            </tr>
            </table>
        </form>    
        <a href="struct_control.php?nombre=elnombre">click</a>
        <table >
                <tr>
                    <td>
                        <?=$nombre?>
                    </td>
                </tr>
                <tr>
                    <td>
                        <?=$edad?>
                    </td>
                </tr>
                <tr>
                    <td>
                        <?=$color?>
                    </td>

                </tr>
            </table>
    </body>
</html>