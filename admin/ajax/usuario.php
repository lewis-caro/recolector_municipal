<?php
  ob_start();
  if (strlen(session_id()) < 1) {
    session_start(); //Validamos si existe o no la sesión
  }

  switch ($_GET["op"]) {

    case 'verificar':

      require_once "../modelos/Usuario.php";
      $usuario = new Usuario(); 

      $logina = $_POST['logina'];
      $clavea = $_POST['clavea'];

      //Hash SHA256 en la contraseña
      //$clavehash = hash("SHA256", $clavea);

      $rspta = $usuario->verificar($logina, $clavea);   //$fetch = $rspta->fetch_object();

      if ( $rspta['status'] == true ) {
        if ( !empty($rspta['data']) ) {

          // ultima sesion
          $ultima_sesion = $usuario->ultima_sesion($rspta['data']['idusuario']);

          //Declaramos las variables de sesión
          $_SESSION['idusuario'] = $rspta['data']['idusuario'];
          $_SESSION['nombre'] = $rspta['data']['nombres'];
          $_SESSION['imagen'] = $rspta['data']['imagen_perfil'];
          $_SESSION['login'] = $rspta['data']['login'];
          $_SESSION['tipoPersona'] = $rspta['data']['tipoPersona'];
          $_SESSION['zona'] = $rspta['data']['zona'];
          $_SESSION['telefono'] = $rspta['data']['telefono'];
          $_SESSION['email'] = $rspta['data']['email'];

          //Obtenemos los permisos del usuario
          $marcados = $usuario->listarmarcados($rspta['data']['idusuario']);
          
          //Declaramos el array para almacenar todos los permisos marcados
          $valores = [];

          if ($rspta['status']) {
            //Almacenamos los permisos marcados en el array
            foreach ($marcados['data'] as $key => $value) {
              array_push($valores, $value['idpermisos']);
            }
            echo json_encode($rspta);
          }else{
            echo json_encode($marcados);
          }       

          //Determinamos los accesos del usuario
          in_array(1, $valores) ? ($_SESSION['inicio'] = 1): ($_SESSION['inicio'] = 0);
          in_array(2, $valores) ? ($_SESSION['acceso'] = 1): ($_SESSION['acceso'] = 0);
          in_array(3, $valores) ? ($_SESSION['designar'] = 1): ($_SESSION['designar'] = 0);  
          in_array(4, $valores) ? ($_SESSION['modulo4'] = 1): ($_SESSION['modulo4'] = 0);        
        

        

        } else {
          echo json_encode($rspta, true);
        }
      }else{
        
        echo json_encode($rspta, true);
      }
      
    break;
    
    case 'salir':
      //Limpiamos las variables de sesión
      session_unset();
      //Destruìmos la sesión
      session_destroy();
      //Redireccionamos al login
      header("Location: index.php?file=".(isset($_GET["file"]) ? $_GET["file"] : ""));
    break;

    // default: 
    //   $rspta = ['status'=>'error_code', 'message'=>'Te has confundido en escribir en el <b>swich.</b>', 'data'=>[]]; echo json_encode($rspta, true); 
    // break;
    
  }
 

  
  ob_end_flush();
?>
