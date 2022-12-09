<?php
  ob_start();
  if (strlen(session_id()) < 1) {
    session_start(); //Validamos si existe o no la sesión
  }

  if (!isset($_SESSION["nombres"])) {
    $retorno = ['status'=>'login', 'message'=>'Tu sesion a terminado pe, inicia nuevamente', 'data' => [] ];
    echo json_encode($retorno);  //Validamos el acceso solo a los usuarios logueados al sistema.
  } else {
    if ($_SESSION['inicioA'] == 1) {
      require_once "../modelos/Agregar_zona.php";

      $zonas = new Zonas();

      date_default_timezone_set('America/Lima'); $date_now = date("d-m-Y h.i.s A");

      $idzonas   = isset($_POST["idzonas"]) ? limpiarCadena($_POST["idzonas"]) : "";
      $nombre_zona   = isset($_POST["nombre"]) ? limpiarCadena($_POST["nombre"]) : "";
           

      switch ($_GET["op"]) {

        /*case 'guardar_y_editar_zona':
          
          if (empty($idzona)) {
            $rspta = $zonas->insertar( $idzona, $nombre_zona);
            echo json_encode($rspta, true);
          } else {
            $rspta = $zonas->editar($idzona, $nombre_zona);
            echo json_encode($rspta, true);
          }

        break;*/

        /*----------------------------------------*/
        
        case 'guardar_y_editar_zona':
            //DOC 1//
            if (!file_exists($_FILES['doc1']['tmp_name']) || !is_uploaded_file($_FILES['doc1']['tmp_name'])) {
  
              $flat_doc1 = false;  $doc1 = $_POST["doc_old_1"];
  
            } else {
  
              $flat_doc1 = true;  $ext_doc1 = explode(".", $_FILES["doc1"]["name"]);            
                
              $doc1 = $date_now .' '. rand(0, 20) . round(microtime(true)) . rand(21, 41) . '.' . end($ext_doc1);
  
              move_uploaded_file($_FILES["doc1"]["tmp_name"], "../dist/docs/reporte_residuo/img/" . $doc1);
              
            }
            if (empty($idzonas)) {
              $rspta = $zonas->insertar($nombre_zona);
              echo json_encode($rspta, true);
            } else {
              $rspta = $zonas->editar($idzonas, $nombre_zona);
              echo json_encode($rspta, true);
            }
          break;

        /*--------------------------------------------------------------- */

        //Borramos mi registro en reporte
        case 'borrar':
          echo json_encode($rspta, true);
        break;

        case 'mostrar':
          $rspta = $zonas->mostrar($idzonas);
          //Codificar el resultado utilizando json
          echo json_encode($rspta, true);
        break;

        case 'tbla_principal':
          $rspta = $zonas->tbla_principal();
          //Vamos a declarar un array
          $data = [];  $cont = 1; 

          $toltip = '<script> $(function () { $(\'[data-toggle="tooltip"]\').tooltip(); }); </script>';

          if ($rspta['status']) {   
          
            foreach ($rspta['data'] as $key => $value) {                
              
              $data[] = [
                "0"=>$cont++,
                "1" => $value['nombre'],
                "2"  =>  
                '<button class="btn btn-primary btn-sm" onclick="cargar(' . $value['idzonas'] . ')" data-toggle="tooltip" data-original-title="Editar"><i class="fa fa-pencil"></i></button>' . 
                '<button class="btn btn-danger  btn-sm" onclick="borrar(' . $value['idzonas'] . ',\''.$value['nombre'].'\')" data-toggle="tooltip" data-original-title="Eliminar"><i class="fa fa-trash"></i></button>',
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
