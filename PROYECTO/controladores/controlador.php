<?php

require_once("/var/www/html/fingermat/PROYECTO/modelos/clase_generica.php");

//-------------------FORMULARIO LOGIN----------------------------
@session_start();
$_SESSION['todo'];
if (isset($_POST['accion']) && $_POST['accion'] != ""){
    if($_POST['accion'] == 'ingresar'){
        if(!empty($_POST['usernameForma']) && !empty($_POST['passwordForma'])){
            
            $noInyeccion= array("username" => $_POST['usernameForma'],"password" => $_POST['passwordForma']);

            $username = $noInyeccion["username"];
            $password = $noInyeccion["password"];
            $login =  new generica();
            $estado = $login->obtenerDatos($login->datosFiltrados('usuarios','username',$username,'passwords',$password,"",""));
            @session_start();

            //----VERIFICO SI EXISTE EL USUARIO Y CONTRASEÑA
            if (empty($estado) ){
                $_SESSION['usu'] = true;
                $estado = $login->obtenerDatos($login->datosFiltrados('usuarios','username',$username,'passwords',$password,"",""));
            } else if ($estado[0]->cond == activado){
                $_SESSION['seguridad'] = true;
                $_SESSION['logeado']   = true;
                $_SESSION['nivel']     = $estado[0]->acceslevel;
                $_SESSION['url']       = 'backend/vistas/alquileres.php';
                $_SESSION['username']  = $_POST['usernameForma'];
                $_SESSION['password']  = $_POST['passwordForma'];   
            }else{
                $_SESSION['estado'] = true;
            }
        }
    }
    if ($_POST['accion'] == 'salirForma'){
        $_SESSION['logeado']=false;
        $_SESSION['url']= '../../backend.php';
        $sesion = new generica();
        $sesion->eliminarSesion();
    }
    if ($_POST['accion'] == 'ingresarVehiculo'){//------INGRESAR NUEVO VEHICULO-------
        if  (isset($_FILES['insImagen']['name']) && !empty($_POST['tipo']) && !empty($_POST['matricula']) && !empty($_POST['marca']) && !empty($_POST['modelo']) &&
            !empty($_POST['color']) && !empty($_POST['año']) && !empty($_POST['pasajeros']) && !empty($_POST['precio'])){
            
            $ruta ="../librerias/imagenes/".$_FILES['insImagen']['name'];
           
            if(copy($_FILES['insImagen']['tmp_name'],$ruta)){
              // $foto = $_FILES['insImagen']['name']; 
            } else{
             //   echo("no funciona");
            }
            $foto = $_FILES['insImagen']['name'];      

            $tipo       = $_POST['tipo'];     
            $matricula  = $_POST['matricula'];  
            $marca      = $_POST['marca'];  
            $modelo     = $_POST['modelo'];  
            $color      = $_POST['color'];  
            $año        = $_POST['año'];  
            $pasajeros  = $_POST['pasajeros'];  
            $disponible = "si";
            $desde      = NULL;  
            $hasta      = NULL;  
            $precio     = $_POST['precio'];             

            $nuevoVehiculo = new vehiculo();    
            $nuevoVehiculo->constructVehiculo($tipo,$matricula,$marca,$modelo,$color,$año,$pasajeros,$disponible,$desde,$hasta,$foto,$precio);
            $nuevoVehiculo->insertarVehiculo();
        }
    }
    if ($_POST['accion'] == 'ingresarUsuario'){//------INGRESAR NUEVO USUARIO-------
        if  (!empty($_POST['usu_nombre']) && !empty($_POST['usu_apellido']) && !empty($_POST['usu_usuario']) && !empty($_POST['usu_contraseña']) &&
            !empty($_POST['usu_email']) && !empty($_POST['usu_tdoc']) && !empty($_POST['usu_documento']) && !empty($_POST['usu_estado']) && !empty($_POST['usu_nacceso']) ){
            $usuNombre      = $_POST['usu_nombre'];
            $usuApellido    = $_POST['usu_apellido'];
            $usuUsuario     = $_POST['usu_usuario'];
            $usuContraseña  = $_POST['usu_contraseña'];
            $usuEmail       = $_POST['usu_email'];
            $usuTdoc        = $_POST['usu_tdoc'];
            $usuDocumento   = $_POST['usu_documento'];
            $usuEstado      = $_POST['usu_estado'];
            $usuNacceso     = $_POST['usu_nacceso'];    

            $nuevoUsu = new usuario();    
            $nuevoUsu->constructUsuario($usuNombre,$usuApellido,$usuUsuario,$usuContraseña,$usuEmail,$usuTdoc,$usuDocumento,$usuEstado,$usuNacceso);
            $nuevoUsu->insertarUsuario();
        }
    }
    if ($_POST['accion'] == 'ingresarCliente'){//------INGRESAR NUEVO CLIENTE-------
        if  (!empty($_POST['cl_nombre']) && !empty($_POST['cl_apellido']) && !empty($_POST['cl_usuario']) && !empty($_POST['cl_contraseña']) &&
            !empty($_POST['cl_direccion']) && !empty($_POST['cl_telefono']) && !empty($_POST['cl_email']) && !empty($_POST['cl_tdoc']) &&
            !empty($_POST['cl_documento']) && !empty($_POST['cl_estado'])){
            $clNombre      = $_POST['cl_nombre'];
            $clApellido    = $_POST['cl_apellido'];
            $clUsuario     = $_POST['cl_usuario'];
            $clContraseña  = $_POST['cl_contraseña'];
            $clDireccion   = $_POST['cl_direccion'];
            $clTelefono    = $_POST['cl_telefono'];
            $clEmail       = $_POST['cl_email'];
            $clTdoc        = $_POST['cl_tdoc'];
            $clDocumento   = $_POST['cl_documento'];
            $clEstado      = $_POST['cl_estado'];

            $nuevoCl = new cliente();    
            $nuevoCl->constructCliente($clNombre,$clApellido,$clUsuario,$clContraseña,$clDireccion,$clTelefono,$clEmail,$clTdoc,$clDocumento,$clEstado);
            $nuevoCl->insertarCliente();
        }
    }
    if ($_POST['accion'] == 'obtenerid'){//------OBTENER ID-------
        $_SESSION['id'] = $_POST['id'];
        $_SESSION['tab'] = $_POST['tab'];
      
        if ($_POST['tab'] == 'usuarios'){
            $_SESSION['col'] = 'idusuarios';
        }else if ($_POST['tab'] == 'vehiculos'){
            $_SESSION['col'] = 'idvehiculos';
        }else if ($_POST['tab'] == 'clientes'){
            $_SESSION['col'] = 'idclientes';
        }
        $_SESSION['valid'] = $_POST['valid'];
        
        $linea = new generica();
        $arrayMuestra = array($linea->obtenerDatos($linea->datosFiltrados($_POST['tab'],$_SESSION['col'],$_POST['id'],"","","","")));
        $_SESSION['arrayMuestra'] = $arrayMuestra[0];
    }
    if ($_POST['accion'] == 'modificarDato2'){//-------MODIFICAR DATO------
        $modificar = new generica();
        $modificar->modificarTabla($_SESSION['tab'],$_SESSION['col'], $_SESSION['id']);
    }
    if ($_POST['accion'] == 'eliminar'){//------ELIMINAR USUARIO-------
        $eliminar = new generica();
        $eliminar->ejecutarInstruccion($eliminar->eliminarDeTablas($_SESSION['tab'],$_SESSION['col'],$_SESSION['id']),"");
    }
    if ($_POST['accion'] == 'mostrarFiltrado'){//------BUSQUEDA VEHICULOS-------
        $mostrar =  new generica();
        $arrayMuestra = array($mostrar->obtenerDatos($mostrar->datosFiltrados('vehiculos','idvehiculos',$_POST['id'],"","","","")));
        $_SESSION['arrayMuestra'] = $arrayMuestra[0];
    }
    if ($_POST['accion'] == 'alquilarVehiculo'){//------ALQUILAR VEHICULO-------
        if (isset($_SESSION['valid']) && $_SESSION['valid']=='si'){
            $alquilar = new generica();
            $alquilar->modificarTabla('alquilar','idvehiculos',$_SESSION['id']);
        }    
     }
    if ($_POST['accion'] == 'devolverVehiculo'){//------DEVOLVER VEHICULO-------
        if ($_SESSION['valid']=='no'){
            $devolver = new generica();
            $devolver->modificarTabla('devolver','idvehiculos', $_SESSION['id']);
        }
    }
}
?>