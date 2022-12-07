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
      $clavehash = hash("SHA256", $clavea);

      $rspta = $usuario->verificar($logina, $clavea);   //$fetch = $rspta->fetch_object();

      if ( $rspta['status'] == true ) {
        if ( !empty($rspta['data']) ) {

          // ultima sesion
          //$ultima_sesion = $usuario->ultima_sesion($rspta['data']['idusuario']);

          //Declaramos las variables de sesión
          $_SESSION['idusuario'] = $rspta['data']['idusuario'];
          $_SESSION['nombre'] = $rspta['data']['nombres'];
          $_SESSION['imagen'] = $rspta['data']['img_perfil'];
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
          in_array(4, $valores) ? ($_SESSION['resportes'] = 1): ($_SESSION['resportes'] = 0);        
        

        

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
  require_once "../modelos/Usuario.php";
  require_once "../modelos/Permiso.php";    

  $usuario = new Usuario();  
  $permisos = new Permiso();

  // ::::::::::::::::::::::::::::::::: D A T O S   U S U A R I O S :::::::::::::::::::::::::::::
  $idusuario        = isset($_POST["idusuario"]) ? limpiarCadena($_POST["idusuario"]) : "";
  $dni              = isset($_POST["dni"]) ? limpiarCadena($_POST["dni"]) : "";
  $nombre_usuario   = isset($_POST["nombres"]) ? limpiarCadena($_POST["nombres"]) : "";
  $edad             = isset($_POST["edad"]) ? limpiarCadena($_POST["edad"]) : "";
  $telefono         = isset($_POST["telefono"]) ? limpiarCadena($_POST["telefono"]) : "";
  $login            = isset($_POST["login"]) ? limpiarCadena($_POST["login"]) : "";
  $clave            = isset($_POST["password"]) ? limpiarCadena($_POST["password"]) : "";
  $tipo_usuario     = isset($_POST["tipo_usuario"]) ? limpiarCadena($_POST["tipo_usuario"]) : "";
  $email			      = isset($_POST["email"])? limpiarCadena($_POST["email"]):"";
  $zona             = isset($_POST["zona"])? $_POST["zona"] :"";
  $direccion 		    = isset($_POST["direccion"])? limpiarCadena($_POST["direccion"]):"";
  //$permiso = isset($_POST['permiso']) ? $_POST['permiso'] : "";


  switch ($_GET["op"]) {

    case 'guardar_y_editar_usuario':

      $clavehash = "";

      if (!empty($clave)) {
        //Hash SHA256 en la contraseña
        $clavehash = hash("SHA256", $clave);
      } else {
        if (!empty($clave_old)) {
          // enviamos la contraseña antigua
          $clavehash = $clave_old;
        } else {
          //Hash SHA256 en la contraseña
          $clavehash = hash("SHA256", "123456");
        }
      }

      if (empty($idusuario)) {

        $rspta = $usuario->insertar($idtipo_persona, $idzona, $dni, $nombres, $edad, $telefono, $login, $clave, $email, $direccion, $img_perfil, $permisos);

        echo json_encode($rspta, true);

      } else {

        $rspta = $usuario->editar($idusuario, $trabajador,$trabajador_old, $cargo, $login, $clavehash, $permiso);

        echo json_encode($rspta, true);
      }
    break;

    case 'desactivar':

      $rspta = $usuario->desactivar($_GET["id_tabla"]);

      echo json_encode($rspta, true);

    break;

    case 'activar':

      $rspta = $usuario->activar($_GET["id_tabla"]);

      echo json_encode($rspta, true);

    break;

    case 'eliminar':

      $rspta = $usuario->eliminar($_GET["id_tabla"]);

      echo json_encode($rspta, true);

    break;

    case 'mostrar':

      $rspta = $usuario->mostrar($idusuario);
      //Codificar el resultado utilizando json
      echo json_encode($rspta, true);

    break;

    case 'tbla_principal':

      $rspta = $usuario->listar();
      //echo json_encode($rspta, true);
          
      //Vamos a declarar un array
      $data = []; 
      $imagen_error = "this.src='../dist/svg/user_default.svg'"; $cont=1;
      $toltip = '<script> $(function () { $(\'[data-toggle="tooltip"]\').tooltip(); }); </script>';

      if ($rspta['status']) {
        foreach ($rspta['data'] as $key => $value) {
          $data[] = [
            "0"=>$cont++,
            "1" => $value['telefono'],
            "2" => '<div class="user-block">'. 
              '<span class="username"><p class="text-primary m-b-02rem" >' . $value['nombres'] . '</p></span>'. 
              '<span class="description"> DNI: ' . $value['dni'] . ' </span>'.
            '</div>',
            "3" => $value['telefono'],
            "4" => $value['login'],
            "5" => $value['password'],
            "6" => $value['tipo_persona'],
            "7" => $value['email'],
            "8" => ($value['estado'] ? '<span class="text-center badge badge-success">Activado</span>' : '<span class="text-center badge badge-danger">Desactivado</span>').$toltip,
            "9"  => $value['estado'] ? '<button class="btn btn-warning btn-sm" onclick="mostrar(' . $value['idusuario'] . ')" data-toggle="tooltip" data-original-title="Editar"><i class="fas fa-pencil-alt"></i></button>' .
            ($value['tipo_persona']=='Administrador' ? ' <button class="btn btn-danger btn-sm disabled" data-toggle="tooltip" data-original-title="El administrador no se puede eliminar."><i class="fas fa-skull-crossbones"></i> </button>' : ' <button class="btn btn-danger  btn-sm" onclick="eliminar(' . $value['idusuario'] .', \''.encodeCadenaHtml($value['nombres']).'\')" data-toggle="tooltip" data-original-title="Eliminar o papelera"><i class="fas fa-skull-crossbones"></i> </button>' ) :
            '<button class="btn btn-warning  btn-sm" onclick="mostrar(' . $value['idusuario'] . ')" data-toggle="tooltip" data-original-title="Editar"><i class="fas fa-pencil-alt"></i></button>' . 
            ' <button class="btn btn-primary  btn-sm" onclick="activar(' . $value['idusuario'] . ')" data-toggle="tooltip" data-original-title="Recuperar"><i class="fa fa-check"></i></button>',
          ];
          
        }
        
        $results = [
          "sEcho" => 1, //Información para el datatables
          "iTotalRecords" => count($data), //enviamos el total registros al datatable
          "iTotalDisplayRecords" => 1, //enviamos el total registros a visualizar
          "data" => $data,
        ];
        echo json_encode($results, true);
      } else {
        echo $rspta['code_error'] .' - '. $rspta['message'] .' '. $rspta['data'];
      }

    break;

    case 'permisos':
      //Obtenemos todos los permisos de la tabla permisos      
      $rspta = $permisos->listar();

      if ( $rspta['status'] ) {

        //Obtener los permisos asignados al usuario
        $id = $_GET['id'];
        $marcados = $usuario->listarmarcados($id);
        //Declaramos el array para almacenar todos los permisos marcados
        $valores = [];

        if ($marcados['status']) {

          //Almacenar los permisos asignados al usuario en el array
          foreach ($marcados['data'] as $key => $value) {
            array_push($valores, $value['idpermiso']);
          }

          $data = ""; $num = 8;  $stado_close = false;
          //Mostramos la lista de permisos en la vista y si están o no marcados <label for=""></label>
          foreach ($rspta['data'] as $key => $value) {

            $div_open = ''; $div_close = '';

            if ( ($key + 1) == 1 ) {                  
              $div_open = '<ol class="list-unstyled row"><div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xl-3">'. 
              '<li class="text-primary"><input class="h-1rem w-1rem" type="checkbox" id="marcar_todo" onclick="marcar_todos_permiso();"> ' .
                '<label for="marcar_todo" class="marcar_todo">Marcar Todo</label>'.
              '</li>';                 
            } else {
              if ( ($key + 1) == $num ) { 
                $div_close = '</div>';
                $num += 9;
                $stado_close = true;
              } else {
                if ($stado_close) {
                  $div_open = '<div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xl-3">';
                  $stado_close = false; 
                }             
              }
            }               
            
            $sw = in_array($value['idpermiso'], $valores) ? 'checked' : '';

            $data .= $div_open.'<li>'. 
              '<div class="form-group mb-0">'.
                '<div class="custom-control custom-checkbox">'.
                  '<input id="permiso_'.$value['idpermiso'].'" class="custom-control-input permiso h-1rem w-1rem" type="checkbox" ' . $sw . ' name="permiso[]" value="' . $value['idpermiso'] . '"> '.
                  '<label for="permiso_'.$value['idpermiso'].'" class="custom-control-label font-weight-normal" >' .$value['icono'] .' '. $value['nombre'].'</label>' . 
                '</div>'.
              '</div>'.
            '</li>'. $div_close;
          }

          $retorno = array(
            'status' => true, 
            'message' => 'Salió todo ok', 
            'data' => $data.'</ol>', 
          );

          echo json_encode($retorno, true);

        } else {
          echo json_encode($marcados, true);
        }

      } else {
        echo json_encode($rspta, true);
      }    

    break;    

    case 'select2Trabajador':

      $rspta = $usuario->select2_trabajador();  $data = "";

      if ($rspta['status']) {

        foreach ($rspta['data'] as $key => $value) {
          $data  .= '<option value=' . $value['idtrabajador'] . ' title="'.$value['imagen_perfil'].'">' . $value['nombres'] . ' - ' . $value['numero_documento'] . '</option>';
        }
    
        $retorno = array(
          'status' => true, 
          'message' => 'Salió todo ok', 
          'data' => $data, 
        );

        echo json_encode($retorno, true);
      } else {
        echo json_encode($rspta, true);
      }    
    break;    

    case 'obtener_cargo_trabajador':
      $rspta=$usuario->mostrar_cargo_trabajador($_POST['idtrabajador']);
      echo json_encode($rspta, true);
    break;
    
    // ::::::::::::::::::::::::::::::::: S E C C I O N   T R A B A J A D O R :::::::::::::::::::::::::::::
    case 'guardar_y_editar_usuario':

      // imgen de perfil
      if (!file_exists($_FILES['foto1']['tmp_name']) || !is_uploaded_file($_FILES['foto1']['tmp_name'])) {

        $imagen1=$_POST["foto1_actual"]; $flat_img1 = false;

      } else {

        $ext1 = explode(".", $_FILES["foto1"]["name"]); $flat_img1 = true;						

        $imagen1 = rand(0, 20) . round(microtime(true)) . rand(21, 41) . '.' . end($ext1);

        move_uploaded_file($_FILES["foto1"]["tmp_name"], "../dist/docs/trabajador/perfil/" . $imagen1);
        
      }

      if (empty($idtrabajador)){

        $rspta=$alltrabajador->insertar($idcargo_trabajador,$nombre, $tipo_documento, $num_documento, $direccion, $telefono, $nacimiento, $edad,  $email, $banco, $cta_bancaria_format, $cci_format, $titular_cuenta, $ruc,$sueldo_mensual,$sueldo_diario, $imagen1);
        
        echo json_encode($rspta, true);

      }else {            
        $rspta = array( 'status' => false, 'message' => 'No hay editar usuario en este modulo', );      
        echo json_encode($rspta, true);
      }            

    break;

    // default: 
    //   $rspta = ['status'=>'error_code', 'message'=>'Te has confundido en escribir en el <b>swich.</b>', 'data'=>[]]; echo json_encode($rspta, true); 
    // break;
  }
  
  ob_end_flush();
?>
