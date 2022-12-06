<?php
/*
$ser = "localhost";
$usu = "root";
$pass ="";
//$bd = "mdbs";
$bd = "mdbs";

$conect = mysqli_connect($ser, $usu, $pass, $bd);

if($conect->connect_error){
    die("Error al concetar a la BD".$conect->connect_error);
}
else{
    //echo "Conexion Exitosa";
}*/

?>

<!--Conexion a otra bd llamada recolector municipal-->

<?php

$ser = "localhost";
$usu = "root";
$pass ="";
//$bd = "mdbs";
$bd = "recolector_municipal";

$conect = mysqli_connect($ser, $usu, $pass, $bd);

if($conect->connect_error){
    die("Error al concetar a la BD".$conect->connect_error);
}
else{
    //echo "Conexion Exitosa";
}

?>
