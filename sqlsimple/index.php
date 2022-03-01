<?php
    include("coneccion.php");
    include("insertar.php");
    include("eliminar.php");
?>

<!DOCTYPE html>

<html>
    <head>
        <title>Trabajando con PHP y mySql</title>
        <link rel="stylesheet" href="algo.css">
    </head>
    <body>
<div>
        <table>
            <tr>
                <th class="algo">Nombre:</th>
                <th class="algo">Apellido:</th>
                <th class="algo">Documento:</th>
            </tr>
        </table>

    <?php

    //----------------------------mostrar base de datos--------

    $consulta = "SELECT * FROM personas";
                $resultado = mysqli_query($conn,$consulta);
                if ($resultado){
    
                    while ($row = $resultado->fetch_array()){
                        $nombre = $row['nombre'];
                        $apellido = $row['apellido'];
                        $documento = $row['documento'];
    ?>
            <div>   
                <table>
                    <tr>
                        <td class="algo"><?php echo $nombre ?></td>
                        <td class="algo"><?php echo $apellido ?></td>
                        <td class="algo"><?php echo $documento ?></td>
                        <td><input ></td>
                    </tr>
                </table>
            </div>   
            <?php            }

                } ?>
</div>       
       <?php
       //cerramos coneccion 
        mysqli_close($conn);?> 
    

<!----------------------------FIN mostrar base de datos---------->        
    </body>
</html>