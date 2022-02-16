<?php
    
    $arreglo = array("key1"=>$_GET['nombre'],"key2"=>"Cartro","key3"=>"32");
    $nombre = $_GET['nombre'];
    $apellido = $_GET['apellido'];
    $edad = $_GET['edad'];
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Nuevamente tablas</title>
        <style>
            body {
                background-color: sandybrown;
            }
            .divTabla{
                border: 1px solid black;
               margin-left: 40%;
            }
            .tabla {
                border: 1px solid black;
                background-color: #f9b769;
            }
        </style>
    </head>
    <body>
        <div>
            <form method="$_GET" action="tab.php">
                <table class="tabla">
                    <tr>
                        <th>NOMBRE</th>
                        <td><input type="text" name = "nombre"></td>
                    </tr>
                    <tr>
                         <th>APELLIDO</th>
                        <td><input type="text" name = "apellido"></td>
                    </tr>
                    <tr>
                        <th>EDAD</th>
                        <td><input type="number" name = "edad"></td>    
                    </tr>
                </table>
                <button>enviar</button>
            </form>
        </div>
        <div>
        <table class="divTabla">
                <tr>
                    <th>
                        NOMBRE |
                    </th>
                    <th>
                        APELLIDO |
                    </th>
                    <th>
                        EDAD
                    </th>
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
        </div>
    </body>
</html>