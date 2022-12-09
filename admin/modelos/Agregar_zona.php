<?php
//Incluímos inicialmente la conexión a la base de datos
require "../config/Conexion_v2.php";

class Zonas
{
  //Implementamos nuestro constructor
  public function __construct()
  {
  }

  //Implementamos un método para insertar registros
  public function insertar( $nombre_zona) {

    // insertamos al usuario
    $sql = "INSERT INTO zonas(nombre) 
    VALUES ('" . $_SESSION['idzonas'] . "', '$nombre_zona')";

    return ejecutarConsulta($sql); 
    
    //INSERT INTO `zonas`(`idzonas`, `nombre`, `horario`, `estado`) VALUES ('[value-1]','[value-2]','[value-3]','[value-4]')

  }

  //Implementamos un método para editar registros
  public function editar($idzonas, $nombre_zona) {   

    $sql = "UPDATE zonas SET nombre=$nombre_zona WHERE idzonas=$idzonas ";
    return ejecutarConsulta($sql);      

  }
  public function eliminar($idzonas) {
    $sql = "UPDATE zonas SET estado='0' WHERE idzonas='$idzonas' ";

    return ejecutarConsulta($sql);

  }

  //Implementar un método para mostrar los datos de un registro a modificar
  public function mostrar($idzonas) {
    $sql = "SELECT nombre FROM zonas WHERE idzonas= '$idzonas' ";
    //SELECT nombre FROM zonas WHERE idzonas=$idzona

    return ejecutarConsultaSimpleFila($sql);
  }

  //Implementar un método para listar los registros
  public function tbla_principal() {
    $sql = "SELECT idzonas, nombre FROM zonas";
    return ejecutarConsulta($sql);
  }
  
}



?>
