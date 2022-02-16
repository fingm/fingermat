<?PHP 

//array predefinido
$predefinido = array("elemento1","elemento2");
foreach($predefinido as $elementos){
    echo $elementos."<br/>";
}

//array asociativo
$asoc = array("clave1" => "elemento1","clave2" => "elemento2");

foreach($asoc as $clave => $elemento) {
    echo $clave."=".$elemento."<br/>";
}

print_r($asoc);
?>

<!DOCTYPE html>
<html>
    <head>

    </head>
    <body>
    
    </body>
</html>