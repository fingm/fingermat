<?php
    
    require_once("clase_conexion.php");
    include("clase_clientes.php");
    include("clase_vehiculos.php");
    include("clase_usuarios.php");

class generica {
    public function eliminarSesion (){
        @session_start();
        @session_destroy();
    }
    //----------EJECUTAR INSTRUCCION CON DEVOLUCION---------------------------
    public function ejecutarInstruccion($consulta,$auxiliar){
        $nueva = new conexion();
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
    //--------------------------OBTENER DATOS----------------------------------
    public function obtenerDatos ($consulta){
        $nueva = new conexion();
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
        $this->conexion= $nueva->conect();
        
        //instancia
        $this->consulta = $this->conexion->prepare($consulta);
        //ejecucion
        $this->consulta->execute();
    }
    //------------VERIFICAR DATOS LOGIN---------------------------------------
    public function datosFiltrados($tabla,$columna1,$cond1,$columna2,$cond2,$l1,$l2){
        if ($cond1 == "" && $cond2 == ""){
            if ($l2==""){
                $this->resultado = "SELECT * FROM $tabla";
            }else{
                $this->resultado = "SELECT * FROM $tabla LIMIT $l1,$l2";
            }
        }else if ( $cond2 == ""){
            $this->resultado = "SELECT * FROM $tabla WHERE $columna1 = '$cond1'";
        }else{
            $this->resultado = "SELECT * FROM $tabla WHERE $columna1 = '$cond1' and $columna2 = '$cond2'";
        }
        return $this->resultado;
    }
    //------------VERIFICAR DATOS LOGIN---------------------------------------
    public function datosFiltradosPaginacion($tabla,$l1,$l2){
              $this->resultado = "SELECT * FROM $tabla LIMIT $l1,$l2";
        return $this->resultado;
    }
    //--------------------BUSCADOR--------------------------------------------
    public function oBtenerDatosFiltrados($cond1,$cond2,$cond3,$l1,$l2){
        if ($cond1 == "" && $cond2 == "" && $cond3 == ""){
            $this->resultado = "SELECT * FROM vehiculos  LIMIT $l1,$l2";
        }else if ($cond2 == "" && $cond3 == ""){
            $this->resultado = "SELECT * FROM vehiculos WHERE vtype = '$cond1' LIMIT $l1,$l2";
        }else if ($cond1 == "" && $cond3 == ""){
            $this->resultado = "SELECT * FROM vehiculos WHERE vbrand = '$cond2' LIMIT $l1,$l2";
        }else if ($cond1 == "" && $cond2 == ""){
            $this->resultado = "SELECT * FROM vehiculos WHERE vcost <= '$cond3' LIMIT $l1,$l2";
        }else if ($cond3 == ""){
            $this->resultado = "SELECT * FROM vehiculos WHERE vtype = '$cond1' and vbrand = '$cond2' LIMIT $l1,$l2";
        }else if ($cond2 == ""){
            $this->resultado = "SELECT * FROM vehiculos WHERE vtype = '$cond1' and vcost <= '$cond3' LIMIT $l1,$l2";
        }else if ($cond1 == ""){
            $this->resultado = "SELECT * FROM vehiculos WHERE vbrand = '$cond2' and vcost <= '$cond3' LIMIT $l1,$l2";
        }else if ($cond1 != "" && $cond2 != "" && $cond3 != ""){
            $this->resultado = "SELECT * FROM vehiculos WHERE vtype = '$cond1' and vbrand = '$cond2' and vcost <= '$cond3' LIMIT $l1,$l2";
        }
        return $this->resultado;
    }

    //------------ELIMINAR DE TABLAS---------------------------------------------------
    public function eliminarDeTablas ($tabla,$campo,$idcampo){
        $this->sqlEliminarDeTablas = "DELETE FROM $tabla WHERE $campo = $idcampo";
        return $this->sqlEliminarDeTablas;
    }
    //------------MODIFICAR CAMPO------------------------------------------------------
    public function modificarCampo($tabla,$campo,$dato,$columnaid,$datoCampoid){
        $this->consulta = "UPDATE $tabla SET $campo ='$dato' WHERE $columnaid = '$datoCampoid'";
        return $this->consulta;
    }
    //------------MODIFICAR datos-------------------------------------------------------
    public function modificarTabla($tabla,$columna,$datoColumna){
        if ($tabla == 'usuarios'){
           $arrayDatos= array("names"=>$_POST['dato_1'],"lastname"=>$_POST['dato_2'],"username"=>$_POST['dato_3'],"passwords"=>$_POST['dato_4'],"email"=>$_POST['dato_5'],"dtype"=>$_POST['dato_6'],"document"=>$_POST['dato_7'],"cond"=>$_POST['dato_8'],"acceslevel"=>$_POST['dato_9']);
        }else if ($tabla == 'vehiculos'){
            $arrayDatos= array("vtype"=>$_POST['dato_1'],"vmatricula"=>$_POST['dato_2'],"vbrand"=>$_POST['dato_3'],"vmodel"=>$_POST['dato_4'],"vcolor"=>$_POST['dato_5'],"vyear"=>$_POST['dato_6'],"vpassengers"=>$_POST['dato_7'],"vavailability"=>$_POST['dato_8'],"vrequired"=>$_POST['dato_10'],"vreturn"=>$_POST['dato_11'],"vphoto"=>$_POST['dato_12'],"vcost"=>$_POST['dato_13']);
         }else if ($tabla == 'clientes'){
            $arrayDatos= array("names"=>$_POST['dato_1'],"lastname"=>$_POST['dato_2'],"username"=>$_POST['dato_3'],"addres"=>$_POST['dato_5'],"phone"=>$_POST['dato_6'],"email"=>$_POST['dato_7'],"dtype"=>$_POST['dato_8'],"document"=>$_POST['dato_9'],"cond"=>$_POST['dato_10']);
         }else if ($tabla == 'alquilar'){
            $arrayDatos= array("names"=>$_POST['dato_1'],"lastname"=>$_POST['dato_2'],"username"=>$_POST['dato_3'],"addres"=>$_POST['dato_5'],"phone"=>$_POST['dato_6'],"email"=>$_POST['dato_7'],"dtype"=>$_POST['dato_8'],"document"=>$_POST['dato_9'],"cond"=>$_POST['dato_10']);
            $tabla = 'vehiculos';
            $arrayDatos= array("vavailability"=>'no',"vrequired"=>$_POST['desde'],"vreturn"=>$_POST['hasta']);   
        }else if ($tabla == 'devolver'){
            $arrayDatos= array("names"=>$_POST['dato_1'],"lastname"=>$_POST['dato_2'],"username"=>$_POST['dato_3'],"addres"=>$_POST['dato_5'],"phone"=>$_POST['dato_6'],"email"=>$_POST['dato_7'],"dtype"=>$_POST['dato_8'],"document"=>$_POST['dato_9'],"cond"=>$_POST['dato_10']);
            $tabla = 'vehiculos';
            $arrayDatos= array("vavailability"=>'si',"vrequired"=> NULL );   
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

?>