<?php

class conexion {

    public function conect(){
        require_once("/var/www/html/fingermat/PROYECTO/configuracion/configuracion.php");
        $host = 'localhost';
        $usuario ='root';
        $contraseña="Newton9.80";
        $dbname = "autosUrRentACar";

        $this->con = new PDO("mysql:host=".$host.";dbname=".$dbname,$usuario,$contraseña); 
        $this->con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $this->con;
    }
}

?>