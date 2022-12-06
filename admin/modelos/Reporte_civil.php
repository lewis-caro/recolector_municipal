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
  public function insertar($trabajador, $cargo, $login, $clave, $permisos) {

    // insertamos al usuario
    $sql = "INSERT INTO usuario ( idtrabajador, cargo, login, password,user_created) VALUES ('$trabajador', '$cargo', '$login', '$clave','" . $_SESSION['idusuario'] . "')";
    return ejecutarConsulta($sql);    

  }

  //Implementamos un método para editar registros
  public function editar($idusuario, $trabajador,$trabajador_old, $cargo, $login, $clave, $permisos) {   

    $sql = "UPDATE usuario SET 
    idtrabajador='$trab', cargo='$cargo', login='$login', password='$clave', user_updated= '" . $_SESSION['idusuario'] . "' WHERE idusuario='$idusuario'";
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
  public function eliminar($idusuario) {
    $sql = "UPDATE usuario SET estado_delete='0',user_delete= '" . $_SESSION['idusuario'] . "' WHERE idusuario='$idusuario'";

    $eliminar= ejecutarConsulta($sql);
        
    if ( $eliminar['status'] == false) {return $eliminar; }    

    //add registro en nuestra bitacora
    $sqlde = "INSERT INTO bitacora_bd( nombre_tabla, id_tabla, accion, id_user) VALUES ('usuario_permiso','$idusuario','Registro Eliminado','" . $_SESSION['idusuario'] . "')";
    $bitacorade = ejecutarConsulta($sqlde);

    if ( $bitacorade['status'] == false) {return $bitacorade; }   

    return $eliminar;

  }

  //Implementar un método para mostrar los datos de un registro a modificar
  public function mostrar($idusuario) {
    $sql = "SELECT u.idusuario, u.idtrabajador, u.cargo, u.login, u.password, u.estado, t.nombres 
    FROM usuario AS u, trabajador AS t WHERE u.idusuario='$idusuario' AND u.idtrabajador = t.idtrabajador;";

    return ejecutarConsultaSimpleFila($sql);
  }

  //Implementar un método para listar los registros
  public function tbla_principal() {
    $sql = "SELECT u.idusuario, u.nombres, u.dni, u.login, u.edad, u.direccion, u.telefono, u.email, u.img_perfil, tp.nombre as tipo_persona, z.nombre as zona, u.estado 
    FROM usuario as u, tipo_persona as tp, zonas as z 
    WHERE u.idtipo_persona = tp.idtipo_persona AND u.idzonas = z.idzonas AND u.estado=1 ORDER BY u.nombres ASC;";
    return ejecutarConsulta($sql);
  }
  
}

?>
