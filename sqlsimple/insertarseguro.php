<?php
    include("coneccion.php");

/// insertar datos
    $sql ="INSERT INTO personas (nombre, apellido, documento) VALUES ('jkj','Cartro','49132601')";

//verificr si la inserción fue exitosa
    if (mysqli_query($conn, $sql)) {
        echo "Insertado Satisfactoriamente"."<br/>"."<br/>";
    }else {
        echo "Error al insertar: " . $sql . "<br>" . mysqli_error($conn);
    }

//Borrar elementos de la tabla MySql
    $sql = "DELETE FROM personas WHERE apellido = 'indues'";

//verificamos si la eliminacion fue exitosa

    if ($conn->query($sql) === TRUE) {
        echo "Borrado con exito"."<br/>"."<br/>";
    } else {
        echo "Error al borrar: " . $conn->error;
    }



?>

<!DOCTYPE html>

<html>
    <head>
        <title>Trabajando con PHP y mySql</title>
    </head>
    <body>
        
        <?php

//----------------------------mostrar base de datos
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
                    <td>Nombre : <?php echo $nombre ?></td>
                    <td>Apellido : <?php echo $apellido ?></td>
                    <td>Documento : <?php echo $documento ?></td>
                </tr>
            </table>
        </div>   
    <?php            }

            } ?>
       
       <?php
       //cerramos coneccion 
        mysqli_close($conn);?>
<!----------------------------FIN mostrar base de datos---------->        
    </body>
</html>