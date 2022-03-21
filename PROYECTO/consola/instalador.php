<?php 
    require_once("../modelos/clase_generica.php");
    echo("---------------Instalador------------------------\n");

    $ObjetoGenerico = new generica();

    $arraySQL = array();

	$arraySQL[] = "
            SET SESSION FOREIGN_KEY_CHECKS=0;
			DROP TABLE IF EXISTS usuarios;
			DROP TABLE IF EXISTS clientes;
			DROP TABLE IF EXISTS vehiculos;
			SET SESSION FOREIGN_KEY_CHECKS=1;
	";

    $arraySQL[]="CREATE TABLE `usuarios` (
        `idusuarios` int NOT NULL AUTO_INCREMENT,
        `names` varchar(15) DEFAULT NULL,
        `lastname` varchar(15) DEFAULT NULL,
        `username` varchar(15) DEFAULT NULL,
        `passwords` varchar(40) DEFAULT NULL,
        `email` varchar(30) DEFAULT NULL,
        `dtype` enum('CI','PASSPORT') DEFAULT NULL,
        `document` varchar(15) DEFAULT NULL,
        `cond` enum('activado','desactivado') DEFAULT NULL,
        `acceslevel` enum('administrador','encargado','vendedor') DEFAULT NULL,
        PRIMARY KEY (`idusuarios`)
        )"; 

    $arraySQL[]="CREATE TABLE `clientes` (
        `idclientes` int NOT NULL AUTO_INCREMENT,
        `names` varchar(15) DEFAULT NULL,
        `lastname` varchar(15) DEFAULT NULL,
        `username` varchar(15) DEFAULT NULL,
        `passwords` varchar(40) DEFAULT NULL,
        `addres` varchar(50) DEFAULT NULL,
        `phone` varchar(20) DEFAULT NULL,
        `email` varchar(30) DEFAULT NULL,
        `dtype` enum('CI','PASAPORTE') DEFAULT NULL,
        `document` varchar(15) DEFAULT NULL,
        `cond` enum('activado','desactivado') DEFAULT NULL,
        PRIMARY KEY (`idclientes`)
        )";

    $arraySQL[]="CREATE TABLE `vehiculos` (
        `idvehiculos` int NOT NULL AUTO_INCREMENT,
        `vtype` varchar(10) DEFAULT NULL,
        `vmatricula` varchar(20) DEFAULT NULL,
        `vbrand` varchar(10) DEFAULT NULL,
        `vmodel` varchar(10) DEFAULT NULL,
        `vcolor` varchar(10) DEFAULT NULL,
        `vyear` varchar(4) DEFAULT NULL,
        `vpassengers` int DEFAULT NULL,
        `vavailability` enum('si','no') DEFAULT NULL,
        `vrequired` date DEFAULT NULL,
        `vreturn` date DEFAULT NULL,
        `vphoto` varchar(50) DEFAULT NULL,
        `vcost` int DEFAULT NULL,
        PRIMARY KEY (`idvehiculos`)
    )";

    $arraySQL[]="INSERT INTO `usuarios` VALUES
        (1,'Matias','Cartro','mcartro','123456789','matiascartro@gmail.com','CI','49132602','activado','administrador'),
        (2,'Fantino','Cartro','fcartro','123456789','fantinocartro@gmail.com','CI','65412356','activado','vendedor'),
        (3,'Luciano','Cartro','lcartro','123456789','lucianocartro@gmail.com','CI','545678912','activado','encargado');
    ";

    $arraySQL[]="INSERT INTO `clientes` VALUES
        (1,'Steven','Tyler','styler','123456789','Avenida2015','099456987','styler@gmail','CI','491326451','activado'),
        (2,'Angus','Young','mrguitar','123456789','Battle 1245','099123741','ayoung@gmail','CI','45623217','activado'),
        (3,'Steven','Tyler','styler','123456789','Avenida2015','099456987','styler@gmail','CI','491326451','activado'),
        (4,'Angus','Young','mrguitar','123456789','Battle 1245','099123741','ayoung@gmail','CI','45623217','activado'),
        (5,'Steven','Tyler','styler','123456789','Avenida2015','099456987','styler@gmail','CI','491326451','activado'),
        (6,'Angus','Young','mrguitar','123456789','Battle 1245','099123741','ayoung@gmail','CI','45623217','activado'),
        (7,'Steven','Tyler','styler','123456789','Avenida2015','099456987','styler@gmail','CI','491326451','activado'),
        (8,'Angus','Young','mrguitar','123456789','Battle 1245','099123741','ayoung@gmail','CI','45623217','activado'),
        (9,'Steven','Tyler','styler','123456789','Avenida2015','099456987','styler@gmail','CI','491326451','activado'),
        (10,'Angus','Young','mrguitar','123456789','Battle 1245','099123741','ayoung@gmail','CI','45623217','activado'),
        (11,'Steven','Tyler','styler','123456789','Avenida2015','099456987','styler@gmail','CI','491326451','activado'),
        (12,'Angus','Young','mrguitar','123456789','Battle 1245','099123741','ayoung@gmail','CI','45623217','activado'),
        (13,'Steven','Tyler','styler','123456789','Avenida2015','099456987','styler@gmail','CI','491326451','activado'),
        (14,'Angus','Young','mrguitar','123456789','Battle 1245','099123741','ayoung@gmail','CI','45623217','activado'),
        (15,'Steven','Tyler','styler','123456789','Avenida2015','099456987','styler@gmail','CI','491326451','activado'),
        (16,'Angus','Young','mrguitar','123456789','Battle 1245','099123741','ayoung@gmail','CI','45623217','activado'),
        (17,'Steven','Tyler','styler','123456789','Avenida2015','099456987','styler@gmail','CI','491326451','activado'),
        (18,'Angus','Young','mrguitar','123456789','Battle 1245','099123741','ayoung@gmail','CI','45623217','activado'),
        (19,'Bob','Dylan','mrnashville','123456789','Mississipi 1300','096781234','dylanbob@gmail','CI','45789451','activado');
    ";

    $arraySQL[]="INSERT INTO `vehiculos` VALUES
        (1,'sedan','svg 1245','BMW','325 i','negro','2019','5','si',NULL,NULL,'bmw1.jpg','150'),
        (2,'sedan','aasd 8841','Chevrolet','prisma','azul','2018','5','si',NULL,NULL,'byd1.jpg','95'),
        (3,'utilitario','aas 4555','Jack','l123','blanco','2016','8','si',NULL,NULL,'renault1.jpg','250'),
        (4,'utilitario','smg 6517','Renault','s6547','gris','2015','10','si',NULL,NULL,'fiat1.jpg','220'),
        (5,'utilitario','ass 4475','Scania','G440','blanco','2019','4','si',NULL,NULL,'bmw2.jpg','300');
    ";

    foreach ($arraySQL as $tabla){
    $ObjetoGenerico->ejecutarInstruccion($tabla,"");
    }
    echo("\n\n---------------Instalacion completa------------------------\n");

    /*(2,'Jimmy','Page','jguitar','123456789','Batlle 4567','099456127,'fpage@gmail.com','CI','21567843','activado'),
    (3,'Angus','Young','ayoung','123456789','Rambla 4571','094587444','ayoung@gmail.com','CI','12345744','activado');*/
?>



