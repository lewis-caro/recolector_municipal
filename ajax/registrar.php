<?php
  ob_start();
    
    require_once "../modelos/registrar.php";

    $registrar_civil = new Registrar_civil();

    $nombres    = isset($_POST["nombres"]) ? limpiarCadena($_POST["nombres"]) : "";
    $apellidos  = isset($_POST["apellidos"]) ? limpiarCadena($_POST["apellidos"]) : "";
    $correo     = isset($_POST["correo"]) ? limpiarCadena($_POST["correo"]) : "";
    $celular    = isset($_POST["celular"]) ? limpiarCadena($_POST["celular"]) : "";
    $usuario    = isset($_POST["usuario"]) ? limpiarCadena($_POST["usuario"]) : "";
    $password   = isset($_POST["password"]) ? limpiarCadena($_POST["password"]) : "";

    

    switch ($_GET["op"]) {

      case 'guardar_y_editar_civil':
        
        $rspta = $registrar_civil->insertar($nombres, $apellidos , $correo, $celular, $usuario ,$password );
        echo json_encode($rspta, true);
        
      break;

      default: 
        $rspta = ['status'=>'error_code', 'message'=>'Te has confundido en escribir en el <b>swich.</b>', 'data'=>[]]; echo json_encode($rspta, true); 
      break;
    }
    
  

  ob_end_flush();
?>
