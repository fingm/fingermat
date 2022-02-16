<?php
    $arrDeArr[1] = array();
    $miArray = array("1"=>$_GET['nombre'],"2"=>$_GET['apellido'],"3"=>$_GET['edad']);
    $miArray = array("1"=>$_GET['nombre'],"2"=>$_GET['apellido'],"3"=>$_GET['edad']);

?>

<!DOCTYPE html>
<html>
    <head>
        <title>TRY FORM</title>
    </head>
    <body>
        <form method="$_GET" action="tryform.php">
            <table>
                <tr>
                    <th>
                        Nombre
                    </th>
                    <th>
                        Apellido
                    </th>
                    <th>
                        Edad
                    </th>
                </tr>
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
                    <button>Enviar</button>
                </tr>
            </table>
        </form>
        <table>
            <tr>
                <th>Nombre |</th>
                <th>Apellido |</th>
                <th>Edad |</th>
            </tr>
            <tr>
                <td>
                   <?=$miArray[1]?>
                </td>
                <td>
                   <?=$miArray[2]?>
                </td>
                <td>
                    <?=$miArray[3]?>
                </td>
            </tr>
        </table>
        <a href="tryform.php"></a>
    </body>
</html>