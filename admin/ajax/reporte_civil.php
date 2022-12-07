<?php
  ob_start();
  if (strlen(session_id()) < 1) {
    session_start(); //Validamos si existe o no la sesión
  }

  if (!isset($_SESSION["nombre"])) {
    $retorno = ['status'=>'login', 'message'=>'Tu sesion a terminado pe, inicia nuevamente', 'data' => [] ];
    echo json_encode($retorno);  //Validamos el acceso solo a los usuarios logueados al sistema.
  } else {
    if ($_SESSION['reportes'] == 1) {
      require_once "../modelos/Reporte_civil.php";

      $reporte_civil = new Reporte_Civil();

      date_default_timezone_set('America/Lima'); $date_now = date("d-m-Y h.i.s A");

      $idreporte   = isset($_POST["idreporte"]) ? limpiarCadena($_POST["idreporte"]) : "";
      $idtipo_residuo   = isset($_POST["idtipo_residuo"]) ? limpiarCadena($_POST["idtipo_residuo"]) : "";
      $descripcion  = isset($_POST["descripcion"]) ? limpiarCadena($_POST["descripcion"]) : "";
      $referencia       = isset($_POST["referencia"]) ? limpiarCadena($_POST["referencia"]) : "";
      $fecha_hoy       = isset($_POST["fecha_hoy"]) ? limpiarCadena($_POST["fecha_hoy"]) : "";
      

      switch ($_GET["op"]) {

        case 'guardar_y_editar_reporte':
          //DOC 1//
          if (!file_exists($_FILES['doc1']['tmp_name']) || !is_uploaded_file($_FILES['doc1']['tmp_name'])) {

            $flat_doc1 = false;  $doc1 = $_POST["doc_old_1"];

          } else {

            $flat_doc1 = true;  $ext_doc1 = explode(".", $_FILES["doc1"]["name"]);            
              
            $doc1 = $date_now .' '. rand(0, 20) . round(microtime(true)) . rand(21, 41) . '.' . end($ext_doc1);

            move_uploaded_file($_FILES["doc1"]["tmp_name"], "../dist/docs/reporte_residuo/img/" . $doc1);
            
          }
          if (empty($idreporte)) {
            $rspta = $reporte_civil->insertar( $idtipo_residuo, $descripcion,  $referencia,  $doc1, $fecha_hoy);
            echo json_encode($rspta, true);
          } else {
            $rspta = $reporte_civil->editar($idreporte, $idtipo_residuo, $descripcion,  $referencia,  $doc1, $fecha_hoy);
            echo json_encode($rspta, true);
          }
        break;

        case 'desactivar':
          $rspta = $reporte_civil->desactivar($_GET["id_tabla"]);
          echo json_encode($rspta, true);
        break;

        //Borramos mi registro en reporte
        case 'borrar':
          $rspta = $reporte_civil->eliminar($_POST['idreporte']);
          echo json_encode($rspta, true);
        break;

        case 'mostrar':
          $rspta = $reporte_civil->mostrar($idproveedor);
          //Codificar el resultado utilizando json
          echo json_encode($rspta, true);
        break;

        case 'mostrar_mas_detalle':
          $rspta = $reporte_civil->mostrar($idproveedor);
          //Codificar el resultado utilizando json
          echo json_encode($rspta, true);
        break;

        case 'tbla_principal':
          $rspta = $reporte_civil->tbla_principal();
          //Vamos a declarar un array
          $data = [];  $cont = 1; 

          $toltip = '<script> $(function () { $(\'[data-toggle="tooltip"]\').tooltip(); }); </script>';

          if ($rspta['status']) {   
          
            foreach ($rspta['data'] as $key => $value) {                
              
              $data[] = [
                "0"=>$cont++,
                "1" => $value['img'],
                "2" => $value['descripcion'],
                "3" => $value['idtipo_residuo'],
                "4" => $value['referencia'],
                "5" => $value['fecha'],
                "6" => ($value['estado'] ? '<span class="text-center badge badge-success">Activado</span>' : '<span class="text-center badge badge-danger">Desactivado</span>').$toltip,

                "7"  =>  
                '<button class="btn btn-primary btn-sm" onclick="cargar(' . $value['idreporte'] . ')" data-toggle="tooltip" data-original-title="Editar"><i class="fa fa-pencil"></i></button>' . 
                '<button class="btn btn-danger  btn-sm" onclick="borrar(' . $value['idreporte'] . ',\''.$value['descripcion'].'\')" data-toggle="tooltip" data-original-title="Eliminar"><i class="fa fa-trash"></i></button>',
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

        case 'select2Empresa':

          $rspta=$reporte_civil->select2ReporteCivil(); $cont = 1; $data = "";
  
          if ($rspta['status'] == true) {
  
            foreach ($rspta['data'] as $key => $value) {
              $data .= '<option  value=' . $value['idusuario'] . ' title="'.$value['razon_social'].'">' . $cont++ . '. ' . $value['nombres'] .' - '. $value['dni'] . '</option>';
            }
  
            $retorno = array('status' => true, 'message' => 'Salió todo ok',  'data' => $data, );
    
            echo json_encode($retorno, true);
  
          } else {
  
            echo json_encode($rspta, true); 
          } 
        break;

        case 'select2TipoResiduo':

          $rspta=$reporte_civil->select2TipoResiduo(); $cont = 1; $data = "";
  
          if ($rspta['status'] == true) {
  
            foreach ($rspta['data'] as $key => $value) {
              $data .= '<option  value=' . $value['idtipo_residuo'] . ' title="'.$value['nombres'].'">' . $cont++ . '. ' . $value['nombres'] . '</option>';
            }
  
            $retorno = array('status' => true, 'message' => 'Salió todo ok',  'data' => $data, );
    
            echo json_encode($retorno, true);
  
          } else {
  
            echo json_encode($rspta, true); 
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
