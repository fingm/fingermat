<?php

class conexion {

    public function conect(){
        include("/var/www/html/fingermat/PROYECTO/configuracion/configuracion.php");
        
        $host = $arrayConfigCr['MySQL']['host'];
        $usuario =$arrayConfigCr['MySQL']['user'];
        $contraseña=$arrayConfigCr['MySQL']['password'];

        $dbname = $arrayConfigCr['MySQL']['dbName'];
        $this->con = new PDO("mysql:host=".$host.";dbname=".$dbname,$usuario,$contraseña); 
        $this->con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $this->con;
    }
}

?>