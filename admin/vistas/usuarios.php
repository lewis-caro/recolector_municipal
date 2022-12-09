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

        <title>Usuarios | Admin</title>

        <?php $title = "Usuarios"; require 'head.php'; ?>

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
        <div class="container body">
          <div class="main_container">
            <?php 
            //------Navegador y Menú -----
            require 'aside.php';
            require 'nav.php';
            
            //-----------Navegador y Menú ----------------
            if ($_SESSION['acceso'] == 1) {
                //-----------------------------
              ?>
              <!-- page content -->
              <div class="right_col" role="main">
                <div class="">
                  <!-------------- Titulo y Buscador------------->
                  <div class="page-title">
                    <div class="title_left">
                      <h3>Administrar Usuarios</h3>
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
                                  <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal-agregar-usuario" onclick=""><i class="fa fa-plus"></i> Agregar</button>
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
                                    <table id="tabla-usuarios" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                                      <thead>
                                        <tr>
                                          <th class="center">#</th>
                                          <th>Nombres y DNI</th>
                                          <th>Telefono</th>
                                          <th>Usuario</th>
                                          <th>Contraseña</th>
                                          <th>Tipo Usuario</th>
                                          <th>E-mail</th>
                                          <th>Estado</th>
                                          <th class="">Acciones</th>
                                        </tr>
                                      </thead>
                                      <tbody>
                                        <tr>
                                          
                                          <td></td>
                                        </tr>
                                      </tbody>
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
                    <div class="modal fade" id="modal-agregar-usuario">
                      <div class="modal-dialog modal-dialog-scrollable modal-lg">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h2 class="modal-title name-modal-title-agregar">Agregar Usuario</h2>
                            <ul class="nav navbar-right panel_toolbox"></ul>
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                          </div>

                          <div class="modal-body">
                            <!-- form start -->
                            <form id="form-usuario" name="form-usuario" method="POST" autocomplete="off">
                              <div class="card-body">
                                <div class="row" id="cargando-1-fomulario">
                                  <!-- id Usuarios -->
                                  <input type="hidden" name="idusuario" id="idusuario" />

                                  <!-- Telefono -->
                                  <div class="col-12 col-sm-12 col-md-3 col-lg-3">
                                    <div class="form-group">
                                      <label for="dni">DNI <sup class="text-danger">(unico*)</sup></label>
                                      <input type="text" name="dni" class="form-control" id="dni" placeholder="DNI." />
                                    </div>
                                  </div>

                                  <!-- Nombre -->
                                  <div class="col-12 col-sm-12 col-md-9 col-lg-9">
                                    <div class="form-group">
                                      <label for="nombre_usuario">Nombre <sup class="text-danger">(unico*)</sup></label>
                                      <input type="text" name="nombre_usuario" class="form-control" id="nombre_usuario" placeholder="Nombres y Apellidos." />
                                    </div>
                                  </div>

                                  <!-- Telefono -->
                                  <div class="col-12 col-sm-12 col-md-2 col-lg-2">
                                    <div class="form-group">
                                      <label for="edad">Edad <sup class="text-danger">(unico*)</sup></label>
                                      <input type="text" name="edad" class="form-control" id="edad" placeholder="Edad." />
                                    </div>
                                  </div>

                                  <!-- Telefono -->
                                  <div class="col-12 col-sm-12 col-md-5 col-lg-5">
                                    <div class="form-group">
                                      <label for="telefono">Telefono <sup class="text-danger">(unico*)</sup></label>
                                      <input type="text" name="telefono" class="form-control" id="telefono" placeholder="Telefono." />
                                    </div>
                                  </div>

                                  <!-- Categoria -->
                                  <div class="col-12 col-sm-12 col-md-5 col-lg-5">
                                    <div class="form-group">
                                      <label for="idtipo_persona">Rol <sup class="text-danger">(unico*)</sup></label>
                                      <select name="idtipo_persona" id="idtipo_persona" class="form-control select2" style="width: 100%;">
                                      <option value="1">Adminstrador</option> 
                                        <option value="2">Adminstrador</option>
                                        <option value="3">Trabajador</option>
                                        <option value="4">Civil</option>                                        
                                      </select>
                                    </div>
                                  </div>

                                  <!-- Usuario -->
                                  <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                                    <div class="form-group">
                                      <label for="login">Usuario <sup class="text-danger">(unico*)</sup></label>
                                      <input type="text" name="login" class="form-control" autocomplete="off" id="login" placeholder="Usuario." />
                                    </div>
                                  </div>

                                  <!-- Contraseña -->
                                  <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                                    <div class="form-group">
                                      <label for="password">Password <sup class="text-danger">(unico*)</sup></label>
                                      <input type="password" name="password" class="form-control" autocomplete="off" id="password" placeholder="password." />
                                    </div>
                                  </div>

                                  <!-- Correo -->
                                  <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                                    <div class="form-group">
                                      <label for="email">Correo <sup class="text-danger">(unico*)</sup></label>
                                      <input type="text" name="email" class="form-control" id="email" placeholder="Correo." />
                                    </div>
                                  </div>

                                  <!-- Zona -->
                                  <div class="col-12 col-sm-12 col-md-4 col-lg-4">
                                    <div class="form-group">
                                      <label for="idzonas">Zona <sup class="text-danger">(unico*)</sup></label>
                                      <select name="idzonas" id="idzonas" class="form-control select2" style="width: 100%;"> 
                                        <option value="1">NINGUNO</option>
                                        <option value="2">LA FLORIDA</option>
                                        <option value="3">7 ESQUINAS</option>
                                      </select>
                                    </div>
                                  </div>

                                  <!-- Telefono -->
                                  <div class="col-12 col-sm-12 col-md-8 col-lg-8">
                                    <div class="form-group">
                                      <label for="direccion">Dirección <sup class="text-danger">(unico*)</sup></label>
                                      <input type="text" name="direccion" class="form-control" id="direccion" placeholder="Dirección." />
                                    </div>
                                  </div>

                                  <!--imagen-material
                                                          <div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-6">
                                                              <label for="foto1">Imagen</label>
                                                              <div style="text-align: center;">
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
                                                              <div class="text-center" id="foto1_nombre"> el nombre de la foto aqui</div>
                                                              </div>
                                                          </div>-->
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
                              <button type="submit" style="display: none;" id="submit-form-usuario">Submit</button>
                            </form>
                          </div>
                          <div class="modal-footer justify-content-between">
                            <button type="button" class="btn btn-danger" onclick="limpiar_form_usuario();">Close</button>
                            <button type="submit" class="btn btn-success" id="guardar_registro_usuario">Guardar Cambios</button>
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
        <script type="text/javascript" src="scripts/usuario.js"></script>
      </body>
    </html>

    <?php 
  }
  ?>
?>
