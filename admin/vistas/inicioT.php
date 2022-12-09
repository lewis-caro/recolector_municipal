<?php
  //Activamos el almacenamiento en el buffer
  ob_start();
  session_start();

  if (!isset($_SESSION["nombres"])){
    header("Location: index.php?file=".basename($_SERVER['PHP_SELF']));
  }else{ ?>

    <!DOCTYPE html>
    <html lang="en">
      <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <!-- Meta, title, CSS, favicons, etc. -->
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="icon" href="../dist/svg/logo-icono.svg" type="image/ico" />

        <title> Inicio | Admin </title>

        <?php $title = "Inicio"; require 'head.php'; ?>

      </head>

      <body class="nav-md">
        <div class="container body">
          <div class="main_container">
             
            <?php 
              //------Navegador y Menú -----
              require 'aside.php';
              require 'nav.php';
              
              //-----------Navegador y Menú ----------------
              if ($_SESSION['inicioT'] == 1) {
                //-----------------------------
                ?>
                 <!-- page content -->
                  <div class="right_col" role="main">
                    <!-- top tiles -->
                    <div class="row" style="display: inline-block;" >
                      <div class="tile_count">
                      
                        <h1>Bienvenido Trabajador</h1>
                      </div>
                    </div>
                      <!--Graficos-->
                      <div class="row">

                        <div class="col-md-6 col-sm-6">
                          <div class="x_panel tile fixed_height_320">
                            <div class="x_title">
                              <h2><b>Reporte de Civiles</b></h2>
                              <ul class="nav navbar-right panel_toolbox">
                                <li>
                                  <a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                </li>
                                <li class="dropdown">
                                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                                </li>
                                <li>
                                  <a class="close-link"><i class="fa fa-close"></i></a>
                                </li>
                              </ul>
                              <div class="clearfix"></div>
                            </div>

                            <!--Contenidos de graficos-->
                            <div class="x_content" id="chart_barras"> 
                            </div>

                          </div>
                        </div>

                        <div class="col-md-6 col-sm-6">
                          <div class="x_panel tile fixed_height_320 overflow_hidden">
                            <div class="x_title">
                              <h2><b>Mis Tareas</b></h2>
                              <ul class="nav navbar-right panel_toolbox">
                                <li>
                                  <a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                </li>
                                <li class="dropdown">
                                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                                  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                  </div>
                                </li>
                                <li>
                                  <a class="close-link"><i class="fa fa-close"></i></a>
                                </li>
                              </ul>
                              <div class="clearfix"></div>
                            </div>

                            <div class="x_content" id="chart_circulo">
                              <table class="" style="width: 100%;">
                                <tbody>
                                  <tr>
                                    <th style="width: 37%;">
                                    <p><i>Tareas</i></p> 
                                    </th>
                                    <th>
                                      <div class="col-lg-7 col-md-7 col-sm-7">
                                      <p><i>Leyenda</i></p>
                                      </div>
                                      <div class="col-lg-5 col-md-5 col-sm-5">
                                      <p><i>Progreso</i></p>
                                      </div>
                                    </th>
                                  </tr>
                                  <tr>
                                    <td>
                                      <iframe class="chartjs-hidden-iframe" style="width: 100%; display: block; border: 0px; height: 0px; margin: 0px; position: absolute; inset: 0px;"></iframe>
                                      <canvas class="canvasDoughnut" height="140" width="140" style="margin: 15px 10px 10px 0px; width: 140px; height: 140px;"></canvas>
                                    </td>
                                    <td>
                                      <table class="tile_info">
                                        <tbody>
                                          <tr>
                                            <td>
                                              <p><i class="fa fa-square golden"></i>Pendientes</p>
                                            </td>
                                            <td>70%</td>
                                          </tr>
                                          <tr>
                                            <td>
                                              <p><i class="fa fa-square green"></i>Hechas</p>
                                            </td>
                                            <td>30%</td>
                                          </tr>
                                        </tbody>
                                      </table>
                                    </td>
                                  </tr>
                                </tbody>
                              </table>
                            </div>
                            
                          </div>
                        </div>

                      </div>

                  </div>
                 <!-- /page content -->
                <?php
              }else{ 
                // -------Mensaje de no acceso -------
                require 'noacceso.php';
              }
              // ----------Footer -----------------
              require 'footer.php';
             ?>

          </div>
        </div>
      
        <?php require 'script.php' ?>
        <script src="scripts/tareas_trabajador.js"></script>
      </body>
    </html>
    <?php
  }
  ob_end_flush();
?>