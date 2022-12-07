<?php
  ob_start();
  if (strlen(session_id()) < 1) {
    session_start(); //Validamos si existe o no la sesión
  }

  if (!isset($_SESSION["nombres"])) {
    $retorno = ['status'=>'login', 'message'=>'Tu sesion a terminado pe, inicia nuevamente', 'data' => [] ];
    echo json_encode($retorno);  //Validamos el acceso solo a los usuarios logueados al sistema.
  } else {
    if ($_SESSION['reportes'] == 1) {
      require_once "../modelos/Tareas_trabajador.php";

      $tareas_trabajador = new Tareas_trabajador();

      date_default_timezone_set('America/Lima'); $date_now = date("d-m-Y h.i.s A");

      $idreporte   = isset($_POST["idreporte"]) ? limpiarCadena($_POST["idreporte"]) : "";
      $nombre_civil   = isset($_POST["nombre_civil"]) ? limpiarCadena($_POST["nombre_civil"]) : "";
      $zona   = isset($_POST["zona"]) ? limpiarCadena($_POST["zona"]) : "";
      $idtipo_residuo   = isset($_POST["idtipo_residuo"]) ? limpiarCadena($_POST["idtipo_residuo"]) : "";
      $referencia       = isset($_POST["referencia"]) ? limpiarCadena($_POST["referencia"]) : "";
      $descripcion  = isset($_POST["descripcion"]) ? limpiarCadena($_POST["descripcion"]) : "";
      

      switch ($_GET["op"]) {


        case 'desactivar':
          $rspta = $tareas_trabajador->eliminar($_POST["idreporte"]);
          echo json_encode($rspta, true);
        break;

        case 'recuperar':
          $rspta = $tareas_trabajador->recuperar($_POST["idreporte"]);
          echo json_encode($rspta, true);
        break;


        case 'tbla_principal':
          $estado = '1';
          $rspta = $tareas_trabajador->tbla_principal($estado);
          //Vamos a declarar un array
          $data = [];  $cont = 1; 

          $toltip = '<script> $(function () { $(\'[data-toggle="tooltip"]\').tooltip(); }); </script>';

          if ($rspta['status']) {   
          
            foreach ($rspta['data'] as $key => $value) {                
              
              $data[] = [
                "0"=>$cont++,
                "1" => $value['img'],
                "2" => $value['nombre_civil'],
                "3" => $value['zona'],
                "4" => $value['tipo_residuo'],
                "5" => $value['referencia'],
                "6" => $value['descripcion'],
                "7" => ($value['estado'] ? '<span class="text-center badge badge-warning">Pendiente</span>' : '<span class="text-center badge badge-success">Realizadas</span>').$toltip,

                "8"  => '<button class="btn btn-info  btn-sm" onclick="borrar(' . $value['idreporte'] . ',\''.$value['nombre_civil'].'\')" data-toggle="tooltip" data-original-title="Eliminar"><i class="fa fa-check"></i></button>',
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

        //Tabla tareas hechas
        case 'tbla_principal2':
          $estado = '0';
          $rspta = $tareas_trabajador->tbla_principal($estado);
          //Vamos a declarar un array
          $data = [];  $cont = 1; 

          $toltip = '<script> $(function () { $(\'[data-toggle="tooltip"]\').tooltip(); }); </script>';

          if ($rspta['status']) {   
          
            foreach ($rspta['data'] as $key => $value) {                
              
              $data[] = [
                "0"=>$cont++,
                "1" => $value['img'],
                "2" => $value['nombre_civil'],
                "3" => $value['zona'],
                "4" => $value['tipo_residuo'],
                "5" => $value['referencia'],
                "6" => $value['descripcion'],
                "7" => ($value['estado'] ? '<span class="text-center badge badge-warning">Pendiente</span>' : '<span class="text-center badge badge-success">Realizadas</span>').$toltip,
                "8"  => '<button class="btn btn-success  btn-sm" onclick="recuperar(' . $value['idreporte'] . ',\''.$value['nombre_civil'].'\')" data-toggle="tooltip" data-original-title="Eliminar"><i class="fa fa-refresh"></i></button>',
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


        case 'salir':
          //Limpiamos las variables de sesión
          session_unset();
          //Destruìmos la sesión
          session_destroy();
          //Redireccionamos al login
          header("Location: ../index.php");
        break;

        default: 
          $rspta = ['status'=>'error_code', 'message'=>'Te has confundido en escribir en el <b>swich.</b>', 'data'=>[]]; echo json_encode($rspta, true); 
        break;
      }
    } else {
      $retorno = ['status'=>'nopermiso', 'message'=>'Tu sesion a terminado pe, inicia nuevamente', 'data' => [] ];
      echo json_encode($retorno);
    }    
  }  

  ob_end_flush();
?>
