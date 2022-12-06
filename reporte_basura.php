
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="icon" href="images/favicon.ico" type="image/ico" />

    <title>Gentelella Alela! |</title>

    <!-- Bootstrap -->
    <link href="admin/plugins/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet" />
    <!-- Font Awesome -->
    <link href="admin/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" />
    <!-- NProgress -->
    <link href="admin/plugins/nprogress/nprogress.css" rel="stylesheet" />
    <!-- iCheck -->
    <link href="admin/plugins/iCheck/skins/flat/green.css" rel="stylesheet" />

    <!-- bootstrap-progressbar -->
    <link href="admin/plugins/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet" />
    <!-- JQVMap -->
    <link href="admin/plugins/jqvmap/dist/jqvmap.min.css" rel="stylesheet" />
    <!-- bootstrap-daterangepicker -->
    <link href="admin/plugins/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet" />

    <!-- Custom Theme Style -->
    <link href="admin/build/css/custom.min.css" rel="stylesheet" />
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="index.html" class="site_title"><i class="fa fa-paw"></i> <span>Gentelella Alela!</span></a>
            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            <div class="profile clearfix">
              <div class="profile_pic">
                <img src="images/img.jpg" alt="admin." class="img-circle profile_img" />
              </div>
              <div class="profile_info">
                <span>Bienvenido,</span>
                <h2>JHB</h2>
              </div>
            </div>
            <!-- /menu profile quick info -->

            <br />

            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <h3>GENERAL</h3>
                <ul class="nav side-menu">
                  <li>
                    <a href="javascript:void(0)"><i class="fa fa-home"></i>Inicio<span class="label label-success pull-right"></span></a>
                  </li>
                </ul>
              </div>

              <div class="menu_section">
                <h3>REPORTES</h3>
                <ul class="nav side-menu">
                  <li>
                    <a href="reporte_basura.php"><i class="fa fa-home"></i>Reportar mi Basura<span class="label label-success pull-right"></span></a>
                  </li>
                </ul>

                <ul class="nav side-menu">
                  <li>
                    <a href="javascript:void(0)"><i class="fa fa-home"></i>Mi Reciclaje<span class="label label-success pull-right"></span></a>
                  </li>
                </ul>
              </div>
            </div>
            <!-- /sidebar menu -->

            <!-- /menu footer buttons -->
            <div class="sidebar-footer hidden-small">
              <a data-toggle="tooltip" data-placement="top" title="Settings">
                <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Lock">
                <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Logout" href="login.php">
                <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
              </a>
            </div>
            <!-- /menu footer buttons -->
          </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav">
          <div class="nav_menu">
            <div class="nav toggle">
              <a id="menu_toggle"><i class="fa fa-bars"></i></a>
            </div>
            <nav class="nav navbar-nav">
              <ul class="navbar-right">
                <li class="nav-item dropdown open" style="padding-left: 15px;">
                  <a href="javascript:;" class="user-profile dropdown-toggle" aria-haspopup="true" id="navbarDropdown" data-toggle="dropdown" aria-expanded="false"> <img src="images/img.jpg" alt="" />John Doe </a>
                  <div class="dropdown-menu dropdown-usermenu pull-right" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="javascript:;"> Profile</a>
                    <a class="dropdown-item" href="javascript:;">
                      <span class="badge bg-red pull-right">50%</span>
                      <span>Settings</span>
                    </a>
                    <a class="dropdown-item" href="javascript:;">Help</a>
                    <a class="dropdown-item" href="login.html"><i class="fa fa-sign-out pull-right"></i> Log Out</a>
                  </div>
                </li>

                <li role="presentation" class="nav-item dropdown open">
                  <a href="javascript:;" class="dropdown-toggle info-number" id="navbarDropdown1" data-toggle="dropdown" aria-expanded="false">
                    <i class="fa fa-envelope-o"></i>
                    <span class="badge bg-green">6</span>
                  </a>
                  <ul class="dropdown-menu list-unstyled msg_list" role="menu" aria-labelledby="navbarDropdown1">
                    <li class="nav-item">
                      <a class="dropdown-item">
                        <span class="image"><img src="images/img.jpg" alt="Profile Image" /></span>
                        <span>
                          <span>John Smith</span>
                          <span class="time">3 mins ago</span>
                        </span>
                        <span class="message">
                          Film festivals used to be do-or-die moments for movie makers. They were .
                        </span>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a class="dropdown-item">
                        <span class="image"><img src="images/img.jpg" alt="Profile Image" /></span>
                        <span>
                          <span>John Smith</span>
                          <span class="time">3 mins ago</span>
                        </span>
                        <span class="message">
                          Film festivals used to be do-or-die moments for movie makers. They were where...
                        </span>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a class="dropdown-item">
                        <span class="image"><img src="images/img.jpg" alt="Profile Image" /></span>
                        <span>
                          <span>John Smith</span>
                          <span class="time">3 mins ago</span>
                        </span>
                        <span class="message">
                          Film festivals used to be do-or-die moments for movie makers. They were where...
                        </span>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a class="dropdown-item">
                        <span class="image"><img src="images/img.jpg" alt="Profile Image" /></span>
                        <span>
                          <span>John Smith</span>
                          <span class="time">3 mins ago</span>
                        </span>
                        <span class="message">
                          Film festivals used to be do-or-die moments for movie makers. They were where...
                        </span>
                      </a>
                    </li>
                    <li class="nav-item">
                      <div class="text-center">
                        <a class="dropdown-item">
                          <strong>See All Alerts</strong>
                          <i class="fa fa-angle-right"></i>
                        </a>
                      </div>
                    </li>
                  </ul>
                </li>
              </ul>
            </nav>
          </div>
        </div>
        <!-- /top navigation -->

        <!-- page content -->
        <div class="right_col" role="main">
          <div class="row">
            <div class="col-md-12 col-sm-12">
              <div class="dashboard_graph">
                <div class="row x_title">
                  <div class="col-md-6">
                    <h3>Repportar Residuos y Basura</h3>
                  </div>
                </div>

                <div class="">
                  <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                    <div class="row g-3">
                      <div class="col-sm-4">
                        <div class="form-floating">
                          <label for="gname">Imagen: </label>
                          <input type="file" class="form-control bg-light border-2" id="gname" name="img" required />
                        </div>
                      </div>

                      <div class="col-sm-4">
                        <div class="form-floating">
                          <label for="apell">Dirección:</label>
                          <input type="text" class="form-control bg-light border-3" id="apell" name="apellidos" placeholder="Apellidos" required />
                        </div>
                      </div>

                      <div class="col-sm-4">
                        <div class="form-floating">
                          <label for="correo">Correo:</label>
                          <input type="email" class="form-control bg-light border-3" id="correo" name="correo" placeholder="Correo" required />
                        </div>
                        <br />
                      </div>

                      <div class="col-sm-4">
                        <div class="form-floating">
                          <label for="tc">Telefono / Celular</label>
                          <input type="number" class="form-control bg-light border-3" id="tc" name="celular" placeholder="Celular" required />
                        </div>
                      </div>

                      <div class="col-sm-4">
                        <div class="form-floating">
                          <label for="us">Usuario</label>
                          <input type="text" class="form-control bg-light border-3" id="us" name="usu" placeholder="Usuario" required />
                        </div>
                      </div>

                      <div class="col-sm-4">
                        <div class="form-floating">
                          <label for="con">Contraseña</label>
                          <input type="password" class="form-control bg-light border-3" id="con" name="password" placeholder="Contraseña" required />
                        </div>
                        <br />
                      </div>

                      <div class="col-12 text-lg-right">
                        <input type="submit" name="registrar" class="btn btn-primary py-3 px-4" value="Guardar" />
                      </div>

                      <!--Alerta
                                                    <div class="alert alert-danger" role="alert">
                                                        El correo ya esta en uso!
                                                    </div>-->
                    </div>
                  </form>
                </div>

                <div class="clearfix"></div>
              </div>
            </div>
          </div>
        </div>
        <!-- /page content -->

        <!-- footer content -->
        <footer>
          <div class="pull-right">Gentelella - Bootstrap Admin Template by <a href="https://colorlib.com">Colorlib</a></div>
          <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
      </div>
    </div>

    <!-- jQuery -->
    <script src="admin/plugins/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="admin/plugins/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <!-- FastClick -->
    <script src="admin/plugins/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="admin/plugins/nprogress/nprogress.js"></script>
    <!-- Chart.js -->
    <script src="admin/plugins/Chart.js/dist/Chart.min.js"></script>
    <!-- gauge.js -->
    <script src="admin/plugins/gauge.js/dist/gauge.min.js"></script>
    <!-- bootstrap-progressbar -->
    <script src="admin/plugins/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
    <!-- iCheck -->
    <script src="admin/plugins/iCheck/icheck.min.js"></script>
    <!-- Skycons -->
    <script src="admin/plugins/skycons/skycons.js"></script>
    <!-- Flot -->
    <script src="admin/plugins/Flot/jquery.flot.js"></script>
    <script src="admin/plugins/Flot/jquery.flot.pie.js"></script>
    <script src="admin/plugins/Flot/jquery.flot.time.js"></script>
    <script src="admin/plugins/Flot/jquery.flot.stack.js"></script>
    <script src="admin/plugins/Flot/jquery.flot.resize.js"></script>
    <!-- Flot plugins -->
    <script src="admin/plugins/flot.orderbars/js/jquery.flot.orderBars.js"></script>
    <script src="admin/plugins/flot-spline/js/jquery.flot.spline.min.js"></script>
    <script src="admin/plugins/flot.curvedlines/curvedLines.js"></script>
    <!-- DateJS -->
    <script src="admin/plugins/DateJS/build/date.js"></script>
    <!-- JQVMap -->
    <script src="admin/plugins/jqvmap/dist/jquery.vmap.js"></script>
    <script src="admin/plugins/jqvmap/dist/maps/jquery.vmap.world.js"></script>
    <script src="admin/plugins/jqvmap/examples/js/jquery.vmap.sampledata.js"></script>
    <!-- bootstrap-daterangepicker -->
    <script src="admin/plugins/moment/min/moment.min.js"></script>
    <script src="admin/plugins/bootstrap-daterangepicker/daterangepicker.js"></script>

    <!-- Custom Theme Scripts -->
    <script src="admin/build/js/custom.min.js"></script>

    <script src="js/reporte_basura.js"></script>
  </body>
</html>
