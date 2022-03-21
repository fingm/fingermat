<?php

class vehiculo extends generica {
    public $vtype;
    public $vmatricula;
    public $vbrand;
    public $vmodel;
    public $vcolor;
    public $vyear;
    public $vpassengers;
    public $vavailability;
    public $vrequired;
    public $vreturn;
    public $vphoto;
    public $vcost;
  
    public $sqlIngresarVehiculo;
    public $arrayVehiculo;
    public $ejecutar;

    public function constructVehiculo($cvtype,$cvmatricula,$cvbrand,$cvmodel,$cvcolor,$cvyear,$cvpassengers,$cvavailability,$cvrequired,$cvreturn,$cvphoto,$cvcost){
        $this->vtype         = $cvtype;
        $this->vmatricula    = $cvmatricula;
        $this->vbrand        = $cvbrand;
        $this->vmodel        = $cvmodel;
        $this->vcolor        = $cvcolor;
        $this->vyear         = $cvyear;
        $this->vpassengers   = $cvpassengers;
        $this->vavailability = $cvavailability;
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
            "vrequired"       => $this->vrequired,
            "vreturn"         => $this->vreturn,
            "vphoto"          => $this->vphoto,
            "vcost"           => $this->vcost
        ); 
       
        $this->ejecutar = new generica();
        $this->ejecutar->ejecutarInstruccion($this->sqlIngresarVehiculo,$this->arrayVehiculo);
    }
}

?>