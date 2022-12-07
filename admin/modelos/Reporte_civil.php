<?php
//Incluímos inicialmente la conexión a la base de datos
require "../config/Conexion_v2.php";

class Reporte_Civil
{
  //Implementamos nuestro constructor
  public function __construct()
  {
  }

  //Implementamos un método para insertar registros
  public function insertar( $idtipo_residuo, $descripcion,  $referencia,  $img, $fecha) {

    // insertamos al usuario
    $sql = "INSERT INTO reporte( idusuario, idtipo_residuo, descripcion, referencia, img, fecha) 
    VALUES ('" . $_SESSION['idusuario'] . "','$idtipo_residuo', '$descripcion', '$referencia', '$img', '$fecha')";
    return ejecutarConsulta($sql);    

  }

  //Implementamos un método para editar registros
  public function editar($idreporte, $idtipo_residuo, $descripcion,  $referencia,  $img, $fecha) {   

    $sql = "UPDATE reporte SET idtipo_residuo='$idtipo_residuo',
                    descripcion='$descripcion',referencia='$referencia',img='$img',fecha='$fecha',estado='1' 
            WHERE idreporte='$idreporte'";
    return ejecutarConsulta($sql);      

  }

  //Implementamos un método para desactivar categorías
  public function desactivar($idusuario) {
    $sql = "UPDATE usuario SET estado='0', user_trash= '" . $_SESSION['idusuario'] . "' WHERE idusuario='$idusuario'";

    $desactivar = ejecutarConsulta($sql);
    
    if ( $desactivar['status'] == false) {return $desactivar; }    

    //add registro en nuestra bitacora
    $sqlde = "INSERT INTO bitacora_bd( nombre_tabla, id_tabla, accion, id_user) VALUES ('usuario_permiso','$idusuario','Registro desactivado','" . $_SESSION['idusuario'] . "')";
    $bitacorade = ejecutarConsulta($sqlde);

    if ( $bitacorade['status'] == false) {return $bitacorade; }   

    return $desactivar;
  }

  //Implementamos un método para activar :: !!sin usar ::
  public function activar($idusuario) {
    $sql = "UPDATE usuario SET estado='1', user_updated= '" . $_SESSION['idusuario'] . "' WHERE idusuario='$idusuario'";

    $activar= ejecutarConsulta($sql);
        
    if ( $activar['status'] == false) {return $activar; }    

    //add registro en nuestra bitacora
    $sqlde = "INSERT INTO bitacora_bd( nombre_tabla, id_tabla, accion, id_user) VALUES ('usuario_permiso','$idusuario','Registro activado','" . $_SESSION['idusuario'] . "')";
    $bitacorade = ejecutarConsulta($sqlde);

    if ( $bitacorade['status'] == false) {return $bitacorade; }   

    return $activar;
  }

  //Implementamos un método para eliminar usuario
  public function eliminar($idreporte) {
    $sql = "UPDATE reporte SET estado='0' WHERE idreporte='$idreporte'";

    return ejecutarConsulta($sql);

  }

  //Implementar un método para mostrar los datos de un registro a modificar
  public function mostrar($idreporte) {
    $sql = "SELECT * FROM `reporte` WHERE idreporte='$idreporte'";

    return ejecutarConsultaSimpleFila($sql);
  }

  //Implementar un método para listar los registros
  public function tbla_principal() {
    $sql = "SELECT r.idreporte, r.idusuario, r.idtipo_residuo, r.descripcion, r.referencia, r.img, r.fecha, r.estado, tr.nombres as tipo_residuo 
    FROM `reporte`as r, tipo_residuo as tr 
    WHERE r.idtipo_residuo = tr.idtipo_residuo AND r.estado=1;";
    return ejecutarConsulta($sql);
  }

  //Implementar un método para listar los registros
  public function select2ReporteCivil() {
    $sql = "SELECT idusuario, idtipo_persona, idzonas, nombres, dni, login, password, edad, direccion, telefono, email, img_perfil, estado 
    FROM usuario as u, tipo_persona as tp 
    WHERE u.idtipo_persona = tp.idtipo_persona AND tp.idtipo_persona = '4' AND u.estado = '1' ORDER BY tp.nombres ASC;";
    return ejecutarConsultaArray($sql);
  }

  //Implementar un método para listar los registros
  public function select2TipoResiduo() {
    $sql = "SELECT * FROM `tipo_residuo` WHERE estado = '1' ORDER BY idtipo_residuo ASC;";
    return ejecutarConsultaArray($sql);
  }
  
  
}



?>
