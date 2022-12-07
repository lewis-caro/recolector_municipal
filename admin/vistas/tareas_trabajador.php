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
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <!-- Meta, title, CSS, favicons, etc. -->
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <link rel="icon" href="../dist/svg/logo-icono.svg" type="image/ico" />

        <title>Reporte Civil | Admin</title>

        <?php $title = "Reporte Civil"; require 'head.php'; ?>

        <style>
          .body {
            color: #34322d !important;
            border-color: #139a1a !important;
            background: #139a1a;
            background-repeat: no-repeat;
            background-size: cover;
          }
        </style>
      </head>

      <body class="nav-md">
        <div class="container body" style="background: #432345;">
          <div class="main_container">
            <?php 
            //------Navegador y Menú -----
            require 'aside.php';
            require 'nav.php';
            
            //-----------Navegador y Menú ----------------
            if ($_SESSION['reportes'] == 1) {
                //-----------------------------
              ?>
              <!-- page content -->
              <div class="right_col" role="main">
                <div class="">
                  <!-------------- Titulo y Buscador------------->
                  <div class="page-title">
                    <div class="title_left">
                      <h3>Lista de Tareas</h3>
                    </div>

                    <div class="title_right">
                      <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                        <div class="input-group">
                          <input type="text" class="form-control" placeholder="Search for..." />
                          <span class="input-group-btn">
                            <button class="btn btn-secondary" type="button">Go!</button>
                          </span>
                        </div>
                      </div>
                    </div>
                  </div>
                  <!--------------Titulo y Buscador------------->

                  <div class="clearfix"></div>
                  <section class="content">
                    <div class="container-fluid">
                      <div class="row">
                        <div class="col-md-12 col-sm-12">
                          <div class="x_panel">
                            <div class="x_title">
                              <div class="col-md-6 col-sm-6">
                              </div>

                              <ul class="nav navbar-right panel_toolbox">
                                <li>
                                  <a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                </li>
                                <li>
                                  <a class="close-link"><i class="fa fa-close"></i></a>
                                </li>
                              </ul>
                              <div class="clearfix"></div>
                            </div>
                            <div class="x_content">
                              <div class="row">
                                <div class="col-sm-12">
                                <title>Lista de Tareas Pendientes</title>
                                  <div class="card-box table-responsive">
                                    <table id="tabla-tareas-trabajador" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                                      <thead>
                                        <tr>
                                          <th class="center">#</th>
                                          <th>Imagen</th>
                                          <th>Nombre Civil</th>
                                          <th>Zona</th>
                                          <th>Tipo de Residuo</th>
                                          <th>referencia</th>
                                          <th>descripcion</th>
                                          <th>estado</th>
                                          <th class="">Acciones</th>
                                        </tr>
                                      </thead>
                                      <tbody></tbody>
                                    </table><br>
                                    <table id="tabla-tareas-trabajador2" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                                      <thead>
                                        <tr>
                                          <th class="center">#</th>
                                          <th>Imagen</th>
                                          <th>Nombre Civil</th>
                                          <th>Zona</th>
                                          <th>Tipo de Residuo</th>
                                          <th>referencia</th>
                                          <th>descripcion</th>
                                          <th>estado</th>
                                          <th class="">Acciones</th>
                                        </tr>
                                      </thead>
                                      <tbody></tbody>
                                    </table>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>

                  </section>
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
        <script type="text/javascript" src="../dist/js/funcion_crud.js"></script>
        <script type="text/javascript" src="../dist/js/funcion_general.js"></script>
        <script type="text/javascript" src="scripts/tareas_trabajador.js"></script>
      </body>
    </html>

    <?php 
  }
  ?>
?>
