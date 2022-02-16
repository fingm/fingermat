<?php

/// insertar datos
    $sql ="INSERT INTO personas (nombre, apellido, documento) VALUES ('jkj','Cartro','49132601')";

//verificr si la inserción fue exitosa
    if (mysqli_query($conn, $sql)) {
        echo "Insertado Satisfactoriamente"."<br/>"."<br/>";
    }else {
        echo "Error al insertar: " . $sql . "<br>" . mysqli_error($conn);
    }

?>