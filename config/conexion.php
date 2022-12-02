<?php

$ser = "localhost";
$usu = "root";
$pass ="";
$bd = "mdbs";

$conect = mysqli_connect($ser, $usu, $pass, $bd);

if($conect->connect_error){
    die("Error al concetar a la BD".$conect->connect_error);
}
else{
    //echo "Conexion Exitosa";
}

?>