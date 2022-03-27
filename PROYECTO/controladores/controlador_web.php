<?php
    require_once("/var/www/html/fingermat/PROYECTO/modelos/clase_generica.php");

    @session_start();

    if (isset($_POST['accion']) && $_POST['accion'] != ""){
        if($_POST['accion'] == 'logearse'){
            if(!empty($_POST['usuario']) && !empty($_POST['contraseña'])){

                $noInyeccion= array("username" => $_POST['usuario'],"password" => $_POST['contraseña']);
    
                $username = $noInyeccion["username"];
                $password = $noInyeccion["password"];
                $login =  new generica();

                $estado = $login->obtenerDatos($login->datosFiltrados('clientes','username',$username,'passwords',$password,"",""));
                @session_start();
    
                //----VERIFICO SI EXISTE EL USUARIO Y CONTRASEÑA
                if ($estado[0]->cond == activado){
                    $_SESSION['logeado']   = true;
                    $_SESSION['username']  = $_POST['usuario'];
                    $_SESSION['password']  = $_POST['contraseña'];   
                }
            }
        }
        if ($_POST['accion'] == 'cerrarSesion'){
            $_SESSION['logeado'] = false;
            $sesion = new generica();
            $sesion->eliminarSesion();
        }

}






?>