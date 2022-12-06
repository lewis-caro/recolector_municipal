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
            if ($_SESSION['resportes'] == 1) {
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
                                  <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal-agregar-material" onclick=""><i class="fa fa-plus"></i> Agregar</button>
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
                                          <th>Dwacripción</th>
                                          <th>Tipo Residuo</th>
                                          <th>Calle/Barrio/Zona</th>
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
                    <div class="modal fade" id="modal-agregar-material">
                      <div class="modal-dialog modal-dialog-scrollable modal-lg">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h2 class="modal-title name-modal-title-agregar">Agregar Usuario</h2>
                            <ul class="nav navbar-right panel_toolbox"></ul>
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
                          </div>

                          <div class="modal-body">
                            <!-- form start -->
                            <form id="form-materiales" name="form-materiales" method="POST" autocomplete="off">
                              <div class="card-body">
                                <div class="row" id="cargando-1-fomulario">
                                  <!-- id Usuarios -->
                                  <input type="hidden" name="idusuario" id="idusuario" />

                                  <!-- Des -->
                                  <div class="col-12 col-sm-12 ">
                                    <div class="form-group">
                                      <label for="desc">Descripción: <sup class="text-danger">(unico*)</sup></label>
                                      <textarea type="text" name="desc" class="form-control" id="desc" placeholder="Descripción"></textarea><br>
                                    </div>
                                  </div>

                                  <!-- Tipo Residuo -->
                                  <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                                    <div class="form-group">
                                      <label for="tp_residuo">Tipo Residuo: <sup class="text-danger">(unico*)</sup></label>
                                      <select name="tp_residuo" id="tp_residuo" class="form-control select2" style="width: 100%;"><br> 
                                        <option value="1">...</option>
                                        <option value="2">Basura</option>
                                        <option value="3">Reciclaje</option>                                        
                                      </select>
                                    </div>
                                  </div>

                                  <!-- Zona -->
                                  <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                                    <div class="form-group">
                                      <label for="dir">Calle - Zona - Barrio: <sup class="text-danger">(unico*)</sup></label>
                                      <input type="text" name="dir" class="form-control" id="dir" placeholder="Direccion." />
                                    </div>
                                  </div>

                                  <!-- Telefono -->
                                  <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                                    <div class="form-group">
                                      <label for="ref">Referencia: <sup class="text-danger">(unico*)</sup></label>
                                      <input type="text" name="ref" class="form-control" id="ref" placeholder="Referencia." />
                                    </div>
                                  </div>

                                  <!-- Fecha -->
                                  <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                                    <div class="form-group">
                                      <label for="fec">Fecha <sup class="text-danger">(unico*)</sup></label>
                                      <input type="date" name="fec" class="form-control" autocomplete="off" id="fec" /><br>
                                    </div>
                                  </div>

                                  <!-- Telefono -->
                                  <div class="col-12 col-sm-12">
                                    <div class="form-group">
                                      <label for="img">Subir Imagen; <sup class="text-danger">(unico*)</sup></label><br>
                                      <input type="file" name="img" />
                                    </div>
                                  </div>

                                  Vista Imagen Subida: <br>
                                  <div class="col-12 ">
                                      <label for="foto1"></label>
                                      <div style="text-align: rigth;">
                                      <img
                                          onerror="this.src='../dist/img/default/img_defecto_activo_fijo.png';"
                                          src="../dist/img/default/img_defecto_activo_fijo.png"
                                          class="img-thumbnail"
                                          id="foto1_i"
                                          style="cursor: pointer !important; height: 100% !important;"
                                          width="auto"
                                      />
                                      <input style="display: none;" type="file" name="foto1" id="foto1" accept="image/*" />
                                      <input type="hidden" name="foto1_actual" id="foto1_actual" />
                                      <div class="text-rigth" id="foto1_nombre"> el nombre de la foto aqui</div>
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
                              <button type="submit" style="display: none;" id="submit-form-materiales">Submit</button>
                            </form>
                          </div>
                          <div class="modal-footer justify-content-between">
                            <button type="button" class="btn btn-danger" onclick="limpiar_form_material();">Close</button>
                            <button type="submit" class="btn btn-success" id="guardar_registro">Guardar Cambios</button>
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
