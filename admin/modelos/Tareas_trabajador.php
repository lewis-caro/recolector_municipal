<?php
//Incluímos inicialmente la conexión a la base de datos
require "../config/Conexion_v2.php";

class Tareas_trabajador
{
  //Implementamos nuestro constructor
  public function __construct()
  {
  }

  //Implementamos un método para eliminar usuario
 public function eliminar($idreporte) {
    $sql = "UPDATE reporte SET estado='0' WHERE idreporte='$idreporte'";

    return ejecutarConsulta($sql);

  }

  //Recuperamos la tarea borrada por error
  public function recuperar($idreporte) {
    $sql = "UPDATE reporte SET estado='1' WHERE idreporte='$idreporte'";

    return ejecutarConsulta($sql);

  }

  //Implementar un método para listar los registros
  public function tbla_principal($estado) {
    $sql = "SELECT r.idreporte, r.idusuario, r.idtipo_residuo, r.descripcion, r.referencia, 
                    r.img, r.fecha, r.estado, z.nombre as zona, u.nombres as nombre_civil, tr.nombres as tipo_residuo
    FROM `reporte` as r, usuario as u, zonas as z, tipo_residuo as tr
    WHERE r.idusuario=u.idusuario and u.idzonas=z.idzonas AND r.idtipo_residuo=tr.idtipo_residuo AND r.estado='$estado';";

    return ejecutarConsultaArray($sql);
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

   //Implementar un método para mostrar los datos de un registro a modificar
  public function mostrar($idreporte) {
    $sql = "SELECT * FROM `reporte` WHERE idreporte='$idreporte'";

    return ejecutarConsultaSimpleFila($sql);
  }

  public function barras_reporte() {
    $sql_1 = "SELECT u.nombres, COUNT(u.idusuario) as cantidad_reporte
    FROM usuario as u, reporte as r, tipo_residuo as tr
    WHERE u.idusuario = r.idusuario AND r.idtipo_residuo = tr.idtipo_residuo AND u.idtipo_persona = 4 
    GROUP BY u.idusuario 
    ORDER BY COUNT(u.idusuario) DESC;";
    $cant_1 =  ejecutarConsultaArray($sql_1);

    $sql_2 = "SELECT COUNT(u.idusuario) as total_reporte 
    FROM usuario as u, reporte as r, tipo_residuo as tr 
    WHERE u.idusuario = r.idusuario AND r.idtipo_residuo = tr.idtipo_residuo AND u.idtipo_persona = 4 
    ORDER BY COUNT(u.idusuario) DESC;";
    $cant_2 =  ejecutarConsultaSimpleFila($sql_2);

    return $retorno = [
      'status' => true,
      'message' => 'todoo ok os gomero',
      'data'=> [
        'user_cant' => $cant_1['data'],
        'total_reporte' => empty( $cant_2['data'])? 0 : (empty( $cant_2['data']['total_reporte']) ? 0 : floatval($cant_2['data']['total_reporte'])),
      ]
      
    ];
  }
//Modificado jheys
  public function tarea_ph() {
    $sql_1 = "SELECT * FROM `reporte` WHERE estado=1;";
    $cant_1 =  ejecutarConsultaArray($sql_1);

    $sql_2 = "SELECT COUNT(u.idusuario) as total_reporte 
    FROM usuario as u, reporte as r, tipo_residuo as tr 
    WHERE u.idusuario = r.idusuario AND r.idtipo_residuo = tr.idtipo_residuo AND u.idtipo_persona = 4 
    ORDER BY COUNT(u.idusuario) DESC;";
    $cant_2 =  ejecutarConsultaSimpleFila($sql_2);

    return $retorno = [
      'status' => true,
      'message' => 'todoo ok os gomero',
      'data'=> [
        'user_cant' => $cant_1['data'],
        'total_reporte' => empty( $cant_2['data'])? 0 : (empty( $cant_2['data']['total_reporte']) ? 0 : floatval($cant_2['data']['total_reporte'])),
      ]
      
    ];
  }

  
  
}



?>
