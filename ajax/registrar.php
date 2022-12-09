<?php
  ob_start();
    
    require_once "../modelo/registrar.php";

    $registrar_civil = new Registrar_civil();

    $idzona         = isset($_POST["idzona"]) ? limpiarCadena($_POST["idzona"]) : "";
    $nombres_civ    = isset($_POST["nombre_civ"]) ? limpiarCadena($_POST["nombre_civ"]) : "";
    $dni            = isset($_POST["num_documento_civ"]) ? limpiarCadena($_POST["num_documento_civ"]) : "";
    $apellidos_civ  = isset($_POST["apellidos_civ"]) ? limpiarCadena($_POST["apellidos_civ"]) : "";
    $correo         = isset($_POST["correo"]) ? limpiarCadena($_POST["correo"]) : "";
    $celular        = isset($_POST["celular"]) ? limpiarCadena($_POST["celular"]) : "";
    $usuario        = isset($_POST["usuario"]) ? limpiarCadena($_POST["usuario"]) : "";
    $password       = isset($_POST["password"]) ? limpiarCadena($_POST["password"]) : "";

    

    switch ($_GET["op"]) {

      case 'guardar_y_editar_civil':
        
        $rspta = $registrar_civil->insertar($idzona, $nombres_civ, $apellidos_civ , $dni , $correo, $celular, $usuario ,$password );
        echo json_encode($rspta, true);
        
      break;

      case 'select2Zona':

        $rspta=$registrar_civil->select2Zona(); $cont = 1; $data = "";

        if ($rspta['status'] == true) {

          foreach ($rspta['data'] as $key => $value) {
            $data .= '<option  value=' . $value['idzonas'] . ' title="'.$value['nombre'].'">' . $cont++ . '. ' . $value['nombre'] . '</option>';
          }

          $retorno = array('status' => true, 'message' => 'Salió todo ok',  'data' => $data, );
  
          echo json_encode($retorno, true);

        } else {

          echo json_encode($rspta, true); 
        } 
      break;

      default: 
        $rspta = ['status'=>'error_code', 'message'=>'Te has confundido en escribir en el <b>swich.</b>', 'data'=>[]]; echo json_encode($rspta, true); 
      break;
    }
    
  

  ob_end_flush();
?>
