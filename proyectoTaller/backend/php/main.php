<?php

//------------------------CLASE GENERICA---------------------------
class generica {
    public function eliminarSesion (){
        @session_start();
        @session_destroy();
    }
    //----------EJECUTAR INSTRUCCION CON DEVOLUCION-------------
    public function ejecutarInstruccion($consulta,$auxiliar){
        $nueva = new conexion();
        $nueva->constructConection('localhost','root','Newton9.80','autosUrRentACar');
        $this->conexion= $nueva->conect();
       
        //instancia
        $this->sqlPreparado = $this->conexion->prepare($consulta);
        //ejecucion
        if ($auxiliar == ""){
            $this->sqlRespuesta = $this->sqlPreparado->execute();
        }else{
            $this->sqlRespuesta = $this->sqlPreparado->execute($auxiliar);
        }
        return $this->sqlRespuesta;
    }
    //--------------------------OBTENER DATOS--------------------------
    public function obtenerDatos ($consulta){
        $nueva = new conexion();
        $nueva->constructConection('localhost','root','Newton9.80','autosUrRentACar');
        $this->conexion= $nueva->conect();
       
        //instancia
        $this->consulta = $this->conexion->prepare($consulta);
        //ejecucion
        $this->consulta->execute();
        $this->resultado =$this->consulta->fetchAll(PDO::FETCH_OBJ);
        return $this->resultado;
    }
    //--------------------------EJECUTAR INSTRUCCION--------------------------
    public function ejecutarConsulta ($consulta){
        $nueva = new conexion();
        $nueva->constructConection('localhost','root','Newton9.80','autosUrRentACar');
        $this->conexion= $nueva->conect();
        
        //instancia
        $this->consulta = $this->conexion->prepare($consulta);
        //ejecucion
        $this->consulta->execute();
    }
    //------------VERIFICAR DATOS LOGIN-----
    public function datosFiltrados($tabla,$columna1,$cond1,$columna2,$cond2){
        if ($cond1 == "" && $cond2 == ""){
            $this->resultado = "SELECT * FROM $tabla ";
        }else if ( $cond2 == ""){
            $this->resultado = "SELECT * FROM $tabla WHERE $columna1 = '$cond1'";
        }else{
            $this->resultado = "SELECT * FROM $tabla WHERE $columna1 = '$cond1' and $columna2 = '$cond2'";
        }
        return $this->resultado;
    }
    //------------------BUSCADOR------------
    public function oBtenerDatosFiltrados($cond1,$cond2,$cond3){
        if ($cond1 == "" && $cond2 == "" && $cond3 == ""){
            $this->resultado = "SELECT * FROM vehiculos";
        }else if ($cond2 == "" && $cond3 == ""){
            $this->resultado = "SELECT * FROM vehiculos WHERE vtype = '$cond1'";
        }else if ($cond1 == "" && $cond3 == ""){
            $this->resultado = "SELECT * FROM vehiculos WHERE vbrand = '$cond2'";
        }else if ($cond1 == "" && $cond2 == ""){
            $this->resultado = "SELECT * FROM vehiculos WHERE vcost <= '$cond3'";
        }else if ($cond3 == ""){
            $this->resultado = "SELECT * FROM vehiculos WHERE vtype = '$cond1' and vbrand = '$cond2'";
        }else if ($cond2 == ""){
            $this->resultado = "SELECT * FROM vehiculos WHERE vtype = '$cond1' and vcost <= '$cond3'";
        }else if ($cond1 == ""){
            $this->resultado = "SELECT * FROM vehiculos WHERE vbrand = '$cond2' and vcost <= '$cond3'";
        }else if ($cond1 != "" && $cond2 != "" && $cond3 != ""){
            $this->resultado = "SELECT * FROM vehiculos WHERE vtype = '$cond1' and vbrand = '$cond2' and vcost <= '$cond3'";
        }
        return $this->resultado;
    }

    //------------ELIMINAR DE TABLAS------------
    public function eliminarDeTablas ($tabla,$campo,$idcampo){
        $this->sqlEliminarDeTablas = "DELETE FROM $tabla WHERE $campo = $idcampo";
        return $this->sqlEliminarDeTablas;
    }
    //------------MODIFICAR CAMPO------------
    public function modificarCampo($tabla,$campo,$dato,$columnaid,$datoCampoid){
        $this->consulta = "UPDATE $tabla SET $campo ='$dato' WHERE $columnaid = '$datoCampoid'";
        return $this->consulta;
    }
    //------------MODIFICAR datos------------
    public function modificarTabla($tabla,$columna,$datoColumna){
        if ($tabla == 'usuarios'){
           $arrayDatos= array("names"=>$_POST['dato_1'],"lastname"=>$_POST['dato_2'],"username"=>$_POST['dato_3'],"passwords"=>$_POST['dato_4'],"email"=>$_POST['dato_5'],"dtype"=>$_POST['dato_6'],"document"=>$_POST['dato_7'],"cond"=>$_POST['dato_8'],"acceslevel"=>$_POST['dato_9']);
        }else if ($tabla == 'vehiculos'){
            $arrayDatos= array("vtype"=>$_POST['dato_1'],"vmatricula"=>$_POST['dato_2'],"vbrand"=>$_POST['dato_3'],"vmodel"=>$_POST['dato_4'],"vcolor"=>$_POST['dato_5'],"vyear"=>$_POST['dato_6'],"vpassengers"=>$_POST['dato_7'],"vavailability"=>$_POST['dato_8'],"vreserved"=>$_POST['dato_9'],"vrequired"=>$_POST['dato_10'],"vreturn"=>$_POST['dato_11'],"vphoto"=>$_POST['dato_12'],"vcost"=>$_POST['dato_13']);
         }else if ($tabla == 'clientes'){
            $arrayDatos= array("names"=>$_POST['dato_1'],"lastname"=>$_POST['dato_2'],"username"=>$_POST['dato_3'],"addres"=>$_POST['dato_5'],"phone"=>$_POST['dato_6'],"email"=>$_POST['dato_7'],"dtype"=>$_POST['dato_8'],"document"=>$_POST['dato_9'],"cond"=>$_POST['dato_10']);
         }else if ($tabla == 'alquilar'){
            $arrayDatos= array("names"=>$_POST['dato_1'],"lastname"=>$_POST['dato_2'],"username"=>$_POST['dato_3'],"addres"=>$_POST['dato_5'],"phone"=>$_POST['dato_6'],"email"=>$_POST['dato_7'],"dtype"=>$_POST['dato_8'],"document"=>$_POST['dato_9'],"cond"=>$_POST['dato_10']);
            $tabla = 'vehiculos';
            $arrayDatos= array("vavailability"=>'no',"vreserved"=>'no',"vrequired"=>$_POST['desde'],"vreturn"=>$_POST['hasta']);   
        }

        foreach($arrayDatos as $key => $datos){
            if (isset($key) && $datos != ""){ 
                $this->sqlModificar = $this->modificarCampo($tabla,$key,$datos,$columna,$datoColumna);
                $this->algo = new generica();
                $this->algo->ejecutarConsulta($this->sqlModificar);
            }    
        }
    }
}
//------------------------CLASE CONEXION---------------------------
class conexion {
    private $servername;
    private $database;
    private $username;
    private $password;
    private $con;

    public function constructConection($v_servidor,$v_usuario,$v_clave,$v_dbname){
        $this->servername = $v_servidor;
        $this->username   = $v_usuario;
        $this->password   = $v_clave;
        $this->database   = $v_dbname;
    }

    public function conect(){
        $this->con = new PDO("mysql:host=$this->servername;dbname=$this->database",$this->username,$this->password); 
        $this->con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $this->con;
    }
}
//----------------------CLASE VEHICULO------------------------------------
class vehiculo  {
    public $vtype;
    public $vmatricula;
    public $vbrand;
    public $vmodel;
    public $vcolor;
    public $vyear;
    public $vpassengers;
    public $vavailability;
    public $vreserved;
    public $vrequired;
    public $vreturn;
    public $vphoto;
    public $vcost;
  
    public $sqlIngresarVehiculo;
    public $arrayVehiculo;
    public $ejecutar;

    public function constructVehiculo($cvtype,$cvmatricula,$cvbrand,$cvmodel,$cvcolor,$cvyear,$cvpassengers,$cvavailability,$cvreserved,$cvrequired,$cvreturn,$cvphoto,$cvcost){
        $this->vtype         = $cvtype;
        $this->vmatricula    = $cvmatricula;
        $this->vbrand        = $cvbrand;
        $this->vmodel        = $cvmodel;
        $this->vcolor        = $cvcolor;
        $this->vyear         = $cvyear;
        $this->vpassengers   = $cvpassengers;
        $this->vavailability = $cvavailability;
        $this->vreserved     = $cvreserved; 
        $this->vrequired     = $cvrequired;
        $this->vreturn       = $cvreturn; 
        $this->vphoto        = $cvphoto;
        $this->vcost         = $cvcost;
    }

    public function insertarVehiculo() {
        $this->sqlIngresarVehiculo   = "INSERT INTO vehiculos SET
            vtype                    =  :vtype,
            vmatricula               =  :vmatricula,
            vbrand                   =  :vbrand,
            vmodel                   =  :vmodel,
            vcolor                   =  :vcolor,
            vyear                    =  :vyear,
            vpassengers              =  :vpassengers,
            vavailability            =  :vavailability,
            vreserved                =  :vreserved,   
            vrequired                =  :vrequired,
            vreturn                  =  :vreturn,
            vphoto                   =  :vphoto,
            vcost                    =  :vcost;";

        $this->arrayVehiculo = array (
            "vtype"           => $this->vtype,
            "vmatricula"      => $this->vmatricula,
            "vbrand"          => $this->vbrand,
            "vmodel"          => $this->vmodel,
            "vcolor"          => $this->vcolor,
            "vyear"           => $this->vyear,
            "vpassengers"     => $this->vpassengers,
            "vavailability"   => $this->vavailability,
            "vreserved"       => $this->vreserved,
            "vrequired"       => $this->vrequired,
            "vreturn"         => $this->vreturn,
            "vphoto"          => $this->vphoto,
            "vcost"           => $this->vcost
        ); 
       
        $this->ejecutar = new generica();
        $this->ejecutar->ejecutarInstruccion($this->sqlIngresarVehiculo,$this->arrayVehiculo);
    }
}
//-------------------CLASE USUARIOS----------------------------
class usuario {
    public $uName;
    public $uLastname;
    public $uUsername;
    public $uPasswords;
    public $uEmail;
    public $uDtype;
    public $uDocument;
    public $uCond;
    public $uAccesLevel;

    private $sqlIngresarUsuario;
    private $sqlEliminarUsu;
    private $arrayUsuario;
    private $ejecutar;

    public function constructUsuario($name,$lastname,$username,$password,$email,$dtype,$document,$cond,$acceslevel){
        $this->uName       = $name;
        $this->uLastname   = $lastname;
        $this->uUsername   = $username;
        $this->uPasswords  = $password;
        $this->uEmail      = $email;
        $this->uDtype      = $dtype;
        $this->uDocument   = $document;
        $this->uCond       = $cond;
        $this->uAccesLevel = $acceslevel;
    }

    public function insertarUsuario() {
        $this->sqlIngresarUsuario = "INSERT INTO usuarios SET
            names                 =  :names,
            lastname              =  :lastname,
            username              =  :username,
            passwords             =  :passwords,
            email                 =  :email,
            dtype                 =  :dtype,
            document              =  :document,
            cond                  =  :cond,
            acceslevel            =  :acceslevel;";

        $this->arrayUsuario = array (
            "names"      => $this->uName,
            "lastname"   => $this->uLastname,
            "username"   => $this->uUsername,
            "passwords"  => $this->uPasswords,
            "email"      => $this->uEmail,
            "dtype"      => $this->uDtype,
            "document"   => $this->uDocument,
            "cond"       => $this->uCond,
            "acceslevel" => $this->uAccesLevel
        ); 
        $this->ejecutar = new generica();
        $this->ejecutar->ejecutarInstruccion($this->sqlIngresarUsuario,$this->arrayUsuario);
    }
}

//-------------------CLASE CLIENTE----------------------------
class cliente {
    public $cName;
    public $cLastname;
    public $cUsername;
    public $cPasswords;
    public $cAdres;
    public $cPhone;
    public $cEmail;
    public $cDtype;
    public $cDocument;
    public $cCond;

    public  $sqlIngresarCliente;
    public  $arrayCliente;
    public  $conexion;
    public  $ejecutar;

    public function constructCliente($name,$lastname,$username,$password,$adres,$phone,$email,$dtype,$document,$cond){
        $this->cName       = $name;
        $this->cLastname   = $lastname;
        $this->cUsername   = $username;
        $this->cPasswords  = $password;
        $this->cAdres      = $adres;
        $this->cPhone      = $phone;
        $this->cEmail      = $email;
        $this->cDtype      = $dtype;
        $this->cDocument   = $document;
        $this->cCond       = $cond;
    }

    public function insertarCliente() {
        $this->sqlIngresarCliente = "INSERT INTO clientes SET
            names                 =  :names,
            lastname              =  :lastname,
            username              =  :username,
            passwords             =  :passwords,
            addres                =  :addres,
            phone                 =  :phone,
            email                 =  :email,
            dtype                 =  :dtype,
            document              =  :document,
            cond                  =  :cond;";

        $this->arrayCliente = array (
            "names"      => $this->cName,
            "lastname"   => $this->cLastname,
            "username"   => $this->cUsername,
            "passwords"  => $this->cPasswords,
            "addres"     => $this->cAdres,
            "phone"      => $this->cPhone,
            "email"      => $this->cEmail,
            "dtype"      => $this->cDtype,
            "document"   => $this->cDocument,
            "cond"       => $this->cCond
        ); 
        $this->ejecutar = new generica();
        $this->ejecutar->ejecutarInstruccion($this->sqlIngresarCliente,$this->arrayCliente);
    }
}

//-------------------FORMULARIO LOGIN----------------------------
@session_start();
$_SESSION['todo'];
if (isset($_POST['accion']) && $_POST['accion'] != ""){
    //INGRESAR A PRINCIPAL PHP
    if($_POST['accion'] == 'ingresar'){
        if(!empty($_POST['usernameForma']) && !empty($_POST['passwordForma'])){
        
            $username = $_POST['usernameForma'];
            $password = $_POST['passwordForma'];
            $login =  new generica();
            $estado = $login->obtenerDatos($login->datosFiltrados('usuarios','username',$username,'passwords',$password));
            @session_start();

            //----VERIFICO SI EXISTE EL USUARIO Y CONTRASEÑA
            if (empty($estado) ){
                $_SESSION['usu'] = true;
                $estado = $login->obtenerDatos($login->datosFiltrados('usuarios','username',$username,'passwords',$password));
            } else if ($estado[0]->cond == activado){
                $_SESSION['seguridad'] = true;
                $_SESSION['logeado'] = true;
                $_SESSION['nivel']   = $estado[0]->acceslevel;
                $_SESSION['url']     = 'backend/php/alquileres.php';
                $_SESSION['username'] = $_POST['usernameForma'];
                $_SESSION['password'] = $_POST['passwordForma'];   
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
        if  (!empty($_POST['tipo']) && !empty($_POST['matricula']) && !empty($_POST['marca']) && !empty($_POST['modelo']) &&
            !empty($_POST['color']) && !empty($_POST['año']) && !empty($_POST['pasajeros'])
             && !empty($_POST['foto']) && !empty($_POST['precio'])){

            $tipo       = $_POST['tipo'];     
            $matricula  = $_POST['matricula'];  
            $marca      = $_POST['marca'];  
            $modelo     = $_POST['modelo'];  
            $color      = $_POST['color'];  
            $año        = $_POST['año'];  
            $pasajeros  = $_POST['pasajeros'];  
            $disponible = "si";
            $reservado  = "no";  
            $desde      = NULL;  
            $hasta      = NULL;  
            $foto       = $_POST['foto'];  
            $precio     = $_POST['precio'];             

            $nuevoVehiculo = new vehiculo();    
            $nuevoVehiculo->constructVehiculo($tipo,$matricula,$marca,$modelo,$color,$año,$pasajeros,$disponible,$reservado,$desde,$hasta,$foto,$precio);
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
            unset ($nuevoUsu);
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
            unset($nuevoCl);

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
        $linea = new generica();
        $arrayMuestra = array($linea->obtenerDatos($linea->datosFiltrados($_POST['tab'],$_SESSION['col'],$_POST['id'],"","","")));
        $_SESSION['arrayMuestra'] = $arrayMuestra[0];
    }
    if ($_POST['accion'] == 'modificarDato2'){
        $modificar = new generica();
        $modificar->modificarTabla($_SESSION['tab'],$_SESSION['col'], $_SESSION['id']);
    }
    if ($_POST['accion'] == 'eliminar'){//------ELIMINAR USUARIO-------
        $eliminar = new generica();
        $eliminar->ejecutarInstruccion($eliminar->eliminarDeTablas($_SESSION['tab'],$_SESSION['col'],$_SESSION['id']),"");
    }
    if ($_POST['accion'] == 'mostrarFiltrado'){//------ELIMINAR USUARIO-------
        $mostrar =  new generica();
        $arrayMuestra = array($mostrar->obtenerDatos($mostrar->datosFiltrados('vehiculos','idvehiculos',$_POST['id'],"","","")));
        $_SESSION['arrayMuestra'] = $arrayMuestra[0];
    }
    if ($_POST['accion'] == 'alquilarVehiculo'){
        $alquilar = new generica();
         $alquilar->modificarTabla('alquilar','idvehiculos', $_SESSION['id']);
    }
}
?>