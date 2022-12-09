<?php
//Incluímos inicialmente la conexión a la base de datos
require "../config/Conexion_v2.php";

class Usuario
{
  //Implementamos nuestro constructor
  public function __construct()
  {
  }
  //$idcargo_trabajador,$nombre, $tipo_documento, $num_documento, $direccion, $telefono, $nacimiento, $edad,  $email, $banco, $cta_bancaria,  $cci,  $titular_cuenta, $ruc,$sueldo_mensual,$sueldo_diario, $imagen1
  //Implementamos un método para insertar registros
  public function insertar($idtipo_persona, $idzona, $dni, $nombre_usuario, $edad, $telefono, $login, $clave, $email, $direccion, $img_perfil, $permisos) {

    // insertamos al usuario
    $sql = "INSERT INTO usuario ( idtipo_persona, idzonas, dni, nombres, edad, telefono, login, password, email, direccion) 
    VALUES ('$idtipo_persona', '$idzona', '$dni', '$nombre_usuario', '$edad', '$telefono', '$login', '$clave', '$email', '$direccion')";
    return ejecutarConsulta($sql);

  }

  //Implementamos un método para editar registros
  /*public function editar($idusuario, $trabajador,$trabajador_old, $cargo, $login, $clave, $permisos) {
    $trab = "";
    if (empty($trabajador)) {$trab = $trabajador_old;}else{$trab = $trabajador; }
    // var_dump($trab);die();
    $update_user = '[]';
    
    //Eliminamos todos los permisos asignados para volverlos a registrar
    $sqldel = "DELETE FROM usuario_permiso WHERE idusuario='$idusuario'";
    $delete =  ejecutarConsulta($sqldel); if ( $delete['status'] == false) {return $delete; }   

    $sql = "UPDATE usuario SET 
    idtrabajador='$trab', cargo='$cargo', login='$login', password='$clave', user_updated= '" . $_SESSION['idusuario'] . "' WHERE idusuario='$idusuario'";
    $update_user = ejecutarConsulta($sql); if ($update_user['status'] == false) {return $update_user; }     
    
    //add registro en nuestra bitacora
    $sql5_1 = "INSERT INTO bitacora_bd( nombre_tabla, id_tabla, accion, id_user) VALUES ('usuario', '$idusuario' ,'Editamos los campos del usuario','" . $_SESSION['idusuario'] . "')";
    $bitacora5_1 = ejecutarConsulta($sql5_1); if ( $bitacora5_1['status'] == false) {return $bitacora5_1; }  

    $num_elementos = 0; $sw = "";

    if ($permisos != "") {      

      while ($num_elementos < count($permisos)) {

        $sql_detalle = "INSERT INTO usuario_permiso(idusuario, idpermiso,user_created) VALUES('$idusuario', '$permisos[$num_elementos]','" . $_SESSION['idusuario'] . "')";

        $sw = ejecutarConsulta_retornarID($sql_detalle);  

        if ( $sw['status'] == false) {return $sw; }

        //add registro en nuestra bitacora
        $sqlsw = "INSERT INTO bitacora_bd( nombre_tabla, id_tabla, accion, id_user) VALUES ('usuario_permiso','" .  $sw['data'] . "','Asigamos nuevos persmisos cuando editamos usuario','" . $_SESSION['idusuario'] . "')";
        $bitacorasw = ejecutarConsulta($sqlsw);

        if ( $bitacorasw['status'] == false) {return $bitacorasw; }

        $num_elementos = $num_elementos + 1;

      }

      return $sw;
    
    }

  }*/
  public function editar($idusuario, $idtipo_persona, $idzona, $nombre, $dni, $login, $pass, $edad, $direccion, $telefono, $email) {   


  }

  //Implementamos un método para desactivar categorías
  public function desactivar($idusuario) {
    $sql = "UPDATE usuario SET estado='0', user_trash= '" . $_SESSION['idusuario'] . "' WHERE idusuario='$idusuario'";

    $desactivar = ejecutarConsulta($sql);
    
    if ( $desactivar['status'] == false) {return $desactivar; }    
   

    return $desactivar;
  }

  //Implementamos un método para activar :: !!sin usar ::
  public function activar($idusuario) {
    $sql = "UPDATE usuario SET estado='1', user_updated= '" . $_SESSION['idusuario'] . "' WHERE idusuario='$idusuario'";

    $activar= ejecutarConsulta($sql);
        

    return $activar;
  }

  //Implementamos un método para eliminar usuario
  public function eliminar($idusuario) {
    $sql = "UPDATE usuario SET estado='0' WHERE idusuario='$idusuario' ";

   // UPDATE reporte SET estado='0' WHERE idreporte='$idreporte'

    $eliminar= ejecutarConsulta($sql);
        
    
    return $eliminar;

  }

  //Implementar un método para mostrar los datos de un registro a modificar
  public function mostrar($idusuario) {
    $sql = "SELECT u.idusuario, u.idtrabajador, u.cargo, u.login, u.password, u.estado, t.nombres 
    FROM usuario AS u, trabajador AS t WHERE u.idusuario='$idusuario' AND u.idtrabajador = t.idtrabajador;";

    return ejecutarConsultaSimpleFila($sql);
  }

  //Implementar un método para listar los registros
  public function listar() {
    $sql = "SELECT u.idusuario, u.nombres, u.dni, u.login, u.password, u.edad, u.direccion, u.telefono, u.email, u.img_perfil, tp.nombre as tipo_persona, z.nombre as zona, u.estado 
    FROM usuario as u, tipo_persona as tp, zonas as z 
    WHERE u.idtipo_persona = tp.idtipo_persona AND u.idzonas = z.idzonas AND u.estado=1 ORDER BY tp.nombre ASC;";
    return ejecutarConsultaArray($sql);
  }

  //Implementar un método para listar los permisos marcados
  public function listarmarcados($idusuario) {
    $sql = "SELECT * FROM usuario_permiso WHERE idusuario='$idusuario' and estado = '1' ";
    return ejecutarConsulta($sql);
  }

  //Función para verificar el acceso al sistema
  public function verificar($login, $clave) {
    $sql = "SELECT u.idusuario, u.nombres, u.dni, u.login, u.edad, u.direccion, u.telefono, u.email, u.img_perfil, tp.nombre as tipoPersona, z.nombre as zona
		FROM usuario as u, tipo_persona as tp, zonas as z
		WHERE u.login='$login' AND u.password='$clave' AND u.estado=1 and u.idtipo_persona = tp.idtipo_persona and u.idzonas = z.idzonas;";
    return ejecutarConsultaSimpleFila($sql);
  }

  //Función para verificar el acceso al sistema
  public function ultima_sesion($id) {
    $sql = "UPDATE usuario SET last_sesion= current_timestamp() WHERE idusuario = '$id';";
    return ejecutarConsulta($sql);
  }

  //Seleccionar Trabajador Select2
  public function select2_trabajador() {
    $sql = "SELECT t.idtrabajador, t.nombres, t.numero_documento, t.imagen_perfil
    FROM trabajador as t 
    LEFT JOIN usuario as u ON t.idtrabajador=u.idtrabajador WHERE t.estado =1 AND t.estado_delete=1 AND u.idtrabajador IS NULL;";
    return ejecutarConsulta($sql);
  }

  public function mostrar_cargo_trabajador($id_trabajador) {
    $sql = "SELECT t.idtrabajador, ct.nombre as cargo FROM trabajador as t, cargo_trabajador as ct WHERE t.idcargo_trabajador= ct.idcargo_trabajador AND t.idtrabajador='$id_trabajador';";
    return ejecutarConsultaSimpleFila($sql);
  }
  
}

?>
