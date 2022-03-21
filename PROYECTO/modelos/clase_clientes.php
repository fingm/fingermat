<?php

class cliente extends generica{
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
?>