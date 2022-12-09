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
            if ($_SESSION['inicioA'] == 1) {
                //-----------------------------
              ?>
              <!-- page content -->
              <div class="right_col" role="main">
                <div class="">
                  <!-------------- Titulo y Buscador------------->
                  <div class="page-title">
                    <div class="title_left">
                      <h3>Reporte Civil</h3>
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
                                <div id="gender" class="btn-group">
                                  <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal-agregar-zona" onclick=""><i class="fa fa-plus"></i> Agregar</button>
                                </div>
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
                                  <div class="card-box table-responsive">
                                    <table id="tabla-zona" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                                      <thead>
                                        <tr>
                                          <th class="center">#</th>
                                          <th>Nombre Zona</th>
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
                    <!-- MODAL - AGREGAR MATERIAL -->
                    <div class="modal fade" id="modal-agregar-zona">
                      <div class="modal-dialog modal-dialog-scrollable modal-lg">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h2 class="modal-title name-modal-title-agregar">Agregar Nueva Zona</h2>
                            <ul class="nav navbar-right panel_toolbox"></ul>
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
                          </div>

                          <div class="modal-body">
                            <!-- form start -->
                            <form id="form-zona" name="form-zona" method="POST" autocomplete="off">
                              <div class="card-body">
                                <div class="row" id="cargando-1-fomulario">
                                  <!-- id Usuarios -->
                                  <input type="hidden" name="idzona" id="idzona" />  


                                  <!-- Telefono -->
                                  <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                                    <div class="form-group">
                                      <label for="zona">Nombre Zona: <sup class="text-danger">(unico*)</sup></label>
                                      <input type="text" name="zona" class="form-control" id="zona" placeholder="zona." />
                                    </div>
                                  </div>

                                  <!-- barprogress -->
                                  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin-top:20px;">
                                    <div class="progress" id="barra_progress_div">
                                      <div id="barra_progress" class="progress-bar" role="progressbar" aria-valuenow="2" aria-valuemin="0" aria-valuemax="100" style="min-width: 2em; width: 0%;">
                                        0%
                                      </div>
                                    </div>
                                  </div>
                                </div>

                                <div class="row" id="cargando-2-fomulario" style="display: none;">
                                  <div class="col-lg-12 text-center">
                                    <i class="fas fa-spinner fa-pulse fa-6x"></i><br />
                                    <br />
                                    <h4>Cargando...</h4>
                                  </div>
                                </div>
                              </div>
                              <!-- /.card-body -->
                              <button type="submit" style="display: none;" id="submit-form-zona">Submit</button>
                            </form>
                          </div>
                          <div class="modal-footer justify-content-between">
                            <button type="button" class="btn btn-danger" onclick="limpiar_form_material();">Close</button>
                            <button type="submit" class="btn btn-success" id="guardar_registro_zona">Guardar Cambios</button>
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
        <script type="text/javascript" src="scripts/agregar_zona.js"></script>
      </body>
    </html>

    <?php 
  }
  ?>
?>
