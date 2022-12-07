<?php
  //Activamos el almacenamiento en el buffer
  ob_start();
  session_start();

  if (!isset($_SESSION["nombre"])){
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
                                  <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal-agregar-reporte" onclick=""><i class="fa fa-plus"></i> Agregar</button>
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
                                    <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                                      <thead>
                                        <tr>
                                          <th class="center">#</th>
                                          <th>Imagen</th>
                                          <th>Descripción</th>
                                          <th>Tipo Residuo</th>
                                          <th>Zona</th>
                                          <th>Referencia</th>
                                          <th>fecha</th>
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
                    <div class="modal fade" id="modal-agregar-reporte">
                      <div class="modal-dialog modal-dialog-scrollable modal-lg">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h2 class="modal-title name-modal-title-agregar">Agregar Reporte</h2>
                            <ul class="nav navbar-right panel_toolbox"></ul>
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
                          </div>

                          <div class="modal-body">
                            <!-- form start -->
                            <form id="form-reporte" name="form-reporte" method="POST" autocomplete="off">
                              <div class="card-body">
                                <div class="row" id="cargando-1-fomulario">
                                  <!-- id Usuarios -->
                                  <input type="hidden" name="idreporte" id="idreporte" />                                  

                                  <!-- Tipo Residuo -->
                                  <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                                    <div class="form-group">
                                      <label for="idtipo_residuo">Tipo Residuo: <sup class="text-danger">(unico*)</sup></label>
                                      <select name="idtipo_residuo" id="idtipo_residuo" class="form-control select2" style="width: 100%;">                                        
                                                                          
                                      </select>
                                    </div>
                                  </div>

                                   <!-- Fecha -->
                                  <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                                    <div class="form-group">
                                      <label for="fecha_hoy">Fecha <sup class="text-danger">(unico*)</sup></label>
                                      <input type="date" name="fecha_hoy" class="form-control" autocomplete="off" id="fecha_hoy" /><br>
                                    </div>
                                  </div>

                                  <!-- Telefono -->
                                  <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                                    <div class="form-group">
                                      <label for="referencia">Referencia: <sup class="text-danger">(unico*)</sup></label>
                                      <input type="text" name="referencia" class="form-control" id="referencia" placeholder="Referencia." />
                                    </div>
                                  </div>

                                 

                                  <!-- Des -->
                                  <div class="col-12 col-sm-12 ">
                                    <div class="form-group">
                                      <label for="desc">Descripción: <sup class="text-danger">(unico*)</sup></label>
                                      <textarea type="text" name="descripcion" class="form-control" id="descripcion" placeholder="descripcion"></textarea><br>
                                    </div>
                                  </div>

                                  <div class="col-12 col-sm-6 col-md-6 col-lg-4" >                               
                                    <div class="row text-center">
                                      <div class="col-md-12" style="padding-top: 15px; padding-bottom: 5px;">
                                        <label for="cip" class="control-label" > Img </label>
                                      </div>
                                      <div class="col-6 col-md-6 col-lg-6 col-xl-6 text-center">
                                        <button type="button" class="btn btn-success btn-block btn-xs" id="doc1_i">
                                          <i class="fas fa-file-upload"></i> Subir.
                                        </button>
                                        <input type="hidden" id="doc_old_1" name="doc_old_1" />
                                        <input style="display: none;" id="doc1" type="file" name="doc1" accept="image/*" class="docpdf" /> 
                                      </div>
                                      <div class="col-6 col-md-6 col-lg-6 col-xl-6 text-center">
                                        <button type="button" class="btn btn-info btn-block btn-xs" onclick="re_visualizacion(1);">
                                          <i class="fa fa-eye"></i> PDF.
                                        </button>
                                      </div>
                                    </div>                              
                                    <div id="doc1_ver" class="text-center mt-4">
                                      <img src="../dist/svg/pdf_trasnparent.svg" alt="" width="50%" >
                                    </div>
                                    <div class="text-center" id="doc1_nombre"><!-- aqui va el nombre del pdf --></div>

                                    <!-- linea divisoria -->
                                    <div class="col-lg-12 borde-arriba-naranja mt-2"> </div>
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
                              <button type="submit" style="display: none;" id="submit-form-reporte">Submit</button>
                            </form>
                          </div>
                          <div class="modal-footer justify-content-between">
                            <button type="button" class="btn btn-danger" onclick="limpiar_form_material();">Close</button>
                            <button type="submit" class="btn btn-success" id="guardar_registro_reporte">Guardar Cambios</button>
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
        <script type="text/javascript" src="scripts/reporte_civil.js"></script>
      </body>
    </html>

    <?php 
  }
  ?>
?>
