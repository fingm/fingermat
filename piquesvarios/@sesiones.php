<?php
    /* SESSION Normal

    @session_start();
    $_SESSION['miSesion'] = "Primer prueba";
    echo $_SESSION['miSesion']; */

    // Esta session es un array
    @session_start();

    $_SESSION['miSesion'] = array();
    $_SESSION['miSesion'][0] = "facultad";
    $_SESSION['miSesion'][1] = 2020;

    //De esta manera puedo acceder a cada elemento del array
     echo $_SESSION['miSesion'][1];
    // Para ver todo el arreglo puedo usar:
    print_r($_SESSION['miSesion']);

    session_destroy();
    
    unset($_SESSION['miSesion']);
    print_r($_SESSION['miSesion']);
?>

