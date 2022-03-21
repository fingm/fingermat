<?php

class usuario extends generica{
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

?>