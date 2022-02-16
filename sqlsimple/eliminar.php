<?php

//Borrar elementos de la tabla MySql
    $sql = "DELETE FROM personas WHERE apellido = 'Casrtro'";

//verificamos si la eliminacion fue exitosa

    if ($conn->query($sql) === TRUE) {
        echo "Borrado con exito"."<br/>"."<br/>";
    } else {
        echo "Error al borrar: " . $conn->error;
    }

?>