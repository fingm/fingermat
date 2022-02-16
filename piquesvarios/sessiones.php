<?php


@session_start();

$_SESSION['saludo'] = "Hola a todos"; //variables globales

//unset borra variables

$saludo ;

if( isset ($saludo)) {
    $algo = 10;
} else {
    $algo = 'No existia';
}

?>


<!DOCTYPE html>

<html>
    <head>
        <title>Sessiones</title>
    </head>
    <body>
        <h1><?=$saludo?></h1>
        <h1><?=$algo?></h1>
    </body>
</html>