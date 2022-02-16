<?php

    $nombre = $_GET['nombre'];
    $apellido = $_GET['apellido'];
    $edad = $_GET['edad'];
    $m_menor;
    if($edad <= 33){
        $m_menor = "Joven";
    } else {
        $m_menor = "Veterano";
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <style>
            .table {
                border: 1px solid black;
            }
            .div2 {
                margin-left: 30%;
            }
        </style>
    </head>
    <body>
        <div> 
            <form method="$_GET" action="formulario.php">
                <table class="table">
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
                            <label>Apellido</label>
                        </td>
                        <td>
                            <input type="text" name = "apellido" >
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label>Edad</label>
                        </td>
                        <td>
                            <input type="number" name ="edad">
                        </td>
                        <button>enviar</button>
                    </tr>
                </table>
            </form>  
        </div>
        <a href="formulario.php">enviar</a>
        <div class="div2">
            <table class="table">
                <tr>
                    <th>Nombre |</th>
                    <th>Apellido |</th>
                    <th>Edad |</th>
                    <th>Mayor de 30</th>
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
                    <td>
                        <?=$m_menor?>
                    </td>
                </tr>
            </table>
        </div>         
    </body>
</html>