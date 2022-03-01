<?php

    function conectar(){  
        $servername = "localhost";
        $database = "libreriaCoceco";
        $username = "root";
        $password = "Newton9.80";
        // Create connection
        $conn = mysqli_connect($servername, $username, $password, $database);
        // Check connection
        if (!$conn) {
            die("Error de coneccion: " . mysqli_connect_error());
        }
       //   echo "Connecccion Satisfactoria"."<br/>"."<br/>";
        return $conn;
    }
    
    function desconectar(){
        //cerramos coneccion 
        mysqli_close($conn);
     //   echo("cerramos");
    }

    function insertarBoletas($nueva,$pos){
            $conn = conectar();
            $fecha_base = $nueva[$pos]['fecha'];
            $nombre_base = $nueva[$pos]['nombre'];
            $coche_base = $nueva[$pos]['coche'];
            $gasto_base = $nueva[$pos]['gasto'];
            $pos_base = $nueva[$pos]['pos'];
            $efectivo_base = $nueva[$pos]['efectivo'];
            $cuota_base = $nueva[$pos]['cuota'];        
            $sql ="INSERT INTO boletas (fecha, nombre, coche,gasto, pos, efectivo, cuota) VALUES ('$fecha_base', '$nombre_base', '$coche_base','$gasto_base', '$pos_base', '$efectivo_base', '$cuota_base')";
            //verificr si la inserción fue exitosa
            if (mysqli_query($conn, $sql)) {
              //  echo "Insertado Satisfactoriamente"."<br/>"."<br/>";
            }else {
                echo "Error al insertar: " . $sql . "<br>" . mysqli_error($conn);
            }
            $conn = desconectar();
    }
    function insertarGastos($nueva2,$pos2){
            $conn = conectar();
            $fecha2_base = $nueva2[$pos2]['fecha2'];
            $coche2_base = $nueva2[$pos2]['coche2'];
            $gasto2_base = $nueva2[$pos2]['gasto2'];
            $detalle2_base = $nueva2[$pos2]['detalle2'];
            $sql2 = "INSERT INTO gastos (fecha,coche,gasto,detalle) VALUES ('$fecha2_base', '$coche2_base', '$gasto2_base', '$detalle2_base')";
            if (mysqli_query($conn, $sql2)) {
                //  echo "Insertado Satisfactoriamente"."<br/>"."<br/>";
              }else {
                  echo "Error al insertar: " . $sql2 . "<br>" . mysqli_error($conn);
              }
            $con = desconectar();
    }
    function borrarTodo (){
        @session_start();
        @session_destroy();
        return 0;
    }
    function sumar($arreglo , $lugar){
        foreach ($arreglo as $key => $datos){
            if ((isset($datos['fecha']) && $datos['fecha'] != "" ) || (isset($datos['fecha2']) && $datos['fecha2'] != "" )){
                $total += $datos[$lugar];
            }
         }  
        return $total;
    }   
?>