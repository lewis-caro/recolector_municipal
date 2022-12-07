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
  public function insertar($nombres, $apellidos , $correo, $celular, $usuario ,$password ) {
    $nombres = $nombres.' '.$apellidos;
    //var_dump($nombres);die();
    $sql = "INSERT INTO usuario(idtipo_persona, idzonas, nombres, dni, login, password, email) 
    VALUES ('3','1','$nombres','0000','$usuario','$password','$correo')";
    return  ejecutarConsulta($sql);
  }



}

?>
