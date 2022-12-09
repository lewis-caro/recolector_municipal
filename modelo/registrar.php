<?php
//Incluímos inicialmente la conexión a la base de datos
require "../config/Conexion_v2.php";

class Registrar_civil
{
  //Implementamos nuestro constructor
  public function __construct()
  {
  }

  //Implementamos un método para insertar registros
  public function insertar($idzona, $nom, $ape , $dni , $correo, $celular, $usuario ,$password ) {
    $nombres = $nom.' '.$ape;
    //var_dump($nombres);die();
    $sql = "INSERT INTO usuario(idtipo_persona, idzonas, nombres, dni, login, password, telefono, email) 
    VALUES ('4','$idzona', '$nombres', '$dni', '$usuario', '$password', '$celular', '$correo')";
    return  ejecutarConsulta($sql);
  }

  public function select2Zona() {
   
    $sql = "SELECT * FROM `zonas` WHERE estado ='1';";
    return  ejecutarConsultaArray($sql);
  }


}

?>
