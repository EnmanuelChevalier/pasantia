<?php
$servidor="localhost";
$basedeDatos="g";
$usuario="root";
$contrasenia="";

try{

    $conexion= new PDO("mysql:host=$servidor;dbname=$basedeDatos",$usuario,$contrasenia);
   

}catch(Exception $error){
    echo $error->getMessage();

}

?>