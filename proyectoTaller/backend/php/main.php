<?php

//------------------------CLASE GENERICA---------------------------
class generica {
    //----------ELIMINAR SESION-------------
    public function accesLevel($entrada){
        $aux;
        if ($entrada == 'administrador'){
            $aux= 1;
        }else if ($entrada == 'encargado'){
            $aux= 2;
        }else if ($entrada == 'vendedor'){
            $aux= 3;
        }
        return $aux;    
    }
    
    function eliminarSesion (){
        @session_start();
        @session_destroy();
    }
    //----------EJECUTAR INSTRUCCION-------------
    function ejecutarInstruccion($consulta,$auxiliar){
        $nueva = new conexion();
        $nueva->constructConection('localhost','root','Newton9.80','autosUrRentACar');
        $this->conexion= $nueva->conect();
       
        //instancia
        $this->sqlPreparado = $this->conexion->prepare($consulta);
        //ejecucion
        $this->sqlRespuesta = $this->sqlPreparado->execute($auxiliar);
        return $this->sqlRespuesta;
    }
    //--------------------------OBTENER DATOS--------------------------
    function obtenerDatos ($consulta){
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

    //------------ELIMINAR DE TABLAS------------
    public function eliminarUsuario ($idUsuario,$tabla){
        if ($tabla == 'vehiculos'){
            $idusuarios = 'idvehiculos';
        }else if ($tabla == 'usuarios'){
            $idusuarios = 'idusuarios';            
        }else if ($tabla == 'clientes'){
            $idusuarios = 'idclientes';
        }        
        $this->sqlEliminarUsu = "DELETE FROM $tabla WHERE $idusuarios=$idUsuario";
        $this->ejecutar = new generica();
        $this->ejecutar->ejecutarInstruccion($this->sqlEliminarUsu,$s=array());
    }
    
    //------------VERIFICAR DATOS------------
    public function datos ($tabla,$cond1,$cond2){
        $this->resultado = "SELECT * FROM $tabla WHERE username = '$cond1' and passwords = '$cond2'";
        return $this->resultado;
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
        //echo ("Conexión realizada Satisfactoriamente");
        return $this->con;
    }
}

//----------------------CLASE VEHICULO------------------------------------
class vehiculo  {
    protected $vtype;
    protected $vbrand;
    protected $vmodel;
    protected $vcolor;
    protected $vyear;
    protected $vpassengers;
    protected $vavailability;
    protected $vreturn;
    protected $vphoto;
    protected $vcost;
  
    private $sqlIngresarVehiculo;
    private $arrayVehiculo;
    private $ejecutar;

    public function constructVehiculo($cvtype,$cvbrand,$cvmodel,$cvcolor,$cvyear,$cvpassengers,$cvavailability,$cvreturn,$cvphoto,$cvcost){
        $this->vtype         = $cvtype;
        $this->vbrand        = $cvbrand;
        $this->vmodel        = $cvmodel;
        $this->vcolor        = $cvcolor;
        $this->vyear         = $cvyear;
        $this->vpassengers   = $cvpassengers;
        $this->vavailability = $cvavailability;
        $this->vreturn       = $cvreturn; 
        $this->vphoto        = $cvphoto;
        $this->vcost         = $cvcost;
    }

    public function insertarVehiculo() {
        $this->sqlIngresarVehiculo   = "INSERT INTO vehiculos SET
            vtype                    =  :vtype,
            vbrand                   =  :vbrand,
            vmodel                   =  :vmodel,
            vcolor                   =  :vcolor,
            vyear                    =  :vyear,
            vpassengers              =  :vpassengers,
            vavailability            =  :vavailability,
            vreturn                  =  :vreturn,
            vphoto                   =  :vphoto,
            vcost                    =  :vcost;";

        $this->arrayVehiculo = array (
            "vtype"         => $this->vtype,
            "vbrand"        => $this->vbrand,
            "vmodel"        => $this->vmodel,
            "vcolor"        => $this->vcolor,
            "vyear"         => $this->vyear,
            "vpassengers"   => $this->vpassengers,
            "vavailability" => $this->vavailability,
            "vreturn"       => $this->vreturn,
            "vphoto"        => $this->vphoto,
            "vcost"         => $this->vcost
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

    private $sqlIngresarCliente;
    private  $arrayCliente;
    private $conexion;
    private  $ejecutar;

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
            $estado = $login->obtenerDatos($login->datos('usuarios',$username,$password));

            //----VERIFICO SI EXISTE EL USUARIO Y CONTRASEÑA
            if (empty($estado) ){
                echo("El usuario o contraseña no son correctos");
            } else{
                @session_start();
                $_SESSION['logeado']=true;
                $_SESSION['url']= 'backend/php/alquileres.php';

                //----MANTENGO LOS DATOS MIENTRAS SE TIENE ABIERTA LE SESION            
                $_SESSION['username']   = $_POST['usernameForma'];
                $_SESSION['password']   = $_POST['passwordForma'];   
                $_SESSION['acceslevel'] = $estado[0]->acceslevel; 
                $nivel = new generica;
                $_SESSION['nivel']= $nivel->accesLevel($_SESSION['acceslevel']);
            }
        }
    }
    if ($_POST['accion'] == 'salirForma'){
        $_SESSION['logeado']=false;
        $_SESSION['url']= '../../backend.php';
        $sesion = new generica();
        $sesion->eliminarSesion();
    }
}

//-------------------LLAMADO A CLASES----------------------------

/*
$nuevo = new vehiculo();
$nuevo->constructVehiculo('utilitario','dodge','ram','blanca','2020','6','disponible','2022-02-23','www.carlos.com','100');
$nuevo->insertarVehiculo();

$cl = new cliente();
$cl->constructCliente('Fantino','Cartro','fanta01','xzczxc','sayago 1066','099652363','f@gmail.com','CI','58594891','activado');
$cl->insertarCliente();

$nuevo = new usuario();
$nuevo->constructUsuario('Matiasss','Cartro','gato','123456789','matiascartro@gmail.com','CI','49132602','activado','administrador');
$nuevo->insertarUsuario();*/

function elimusu($uno,$dos){
    $n = new generica();
    $n->eliminarUsuario($uno,$dos);
}
//elimusu();

?>