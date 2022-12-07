<div class="col-md-3 left_col" >
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="inicio.php" class="site_title"><img src="../dist/svg/logo_loginA.png" alt="" width="70px" height="70"></i></a>
            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            
            <!-- /menu profile quick info -->

            <br />

            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <h3>General</h3>
                <ul class="nav side-menu">
                  <!-------------------------INICIO--------------------------> 
                    <?php if ($_SESSION['inicioA'] == 1) {  ?>
                        
                        <li>
                            <a><i href="inicioA.php" class="fa fa-home"></i> Home </a>
                        </li>
                    <?php } ?>
                  <!-------------------------INICIO-------------------------->
                  <!-------------------------INICIO--------------------------> 
                  <?php if ($_SESSION['inicioT'] == 1) {  ?>
                        
                        <li>
                            <a><i href="inicioT.php" class="fa fa-home"></i> Home </a>
                        </li>
                    <?php } ?>
                  <!-------------------------INICIO--------------------------> 
                  <!-------------------------INICIO--------------------------> 
                  <?php if ($_SESSION['inicioC'] == 1) {  ?>
                        
                        <li>
                            <a><i href="inicioC.php" class="fa fa-home"></i> Home </a>
                        </li>
                    <?php } ?>
                  <!-------------------------INICIO--------------------------> 

                  <!-------------------------ACCESOS------------------------->
                    <?php if ($_SESSION['acceso'] == 1) {  ?>
                        
                        <li><a><i class="fa fa-tasks"></i> Acceso <span class="fa fa-chevron-down"></span></a>
                            <ul class="nav child_menu">
                                <li>
                                    <a href="usuarios.php">Usuarios</a>
                                </li>
                                <li>
                                    <a href="permisos.php">Permisos</a>
                                </li>
                            </ul>
                        </li>
                    <?php } ?>
                   <!-------------------------ACCESOS------------------------->

                   <!-------------------------Designar------------------------->
                    <?php if ($_SESSION['designar'] == 1) {  ?>

                      <li><a><i class="fa fa-desktop"></i> Designar Zona <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                          <li><a href="general_elements.html">General Elements</a></li>
                          <li><a href="media_gallery.html">Media Gallery</a></li>
                          <li><a href="typography.html">Typography</a></li>
                          <li><a href="icons.html">Icons</a></li>
                          <li><a href="glyphicons.html">Glyphicons</a></li>
                          <li><a href="widgets.html">Widgets</a></li>
                          <li><a href="invoice.html">Invoice</a></li>
                          <li><a href="inbox.html">Inbox</a></li>
                          <li><a href="calendar.html">Calendar</a></li>
                        </ul>
                      </li>

                    <?php  } ?>
                   <!-------------------------Designar------------------------->
                   
                   <!-------------------------Designar------------------------->
                   <?php if ($_SESSION['reportes'] == 1) {  ?>

                    <li><a><i class="fa fa-bars"></i> Reportes <span class="fa fa-chevron-down"></span></a>
                      <ul class="nav child_menu">

                      <?php if ($_SESSION['inicioT'] == 1) {  ?>
                          <li><a href="tareas_trabajador.php">Reportes de Trabajadores</a></li><?php  } ?>
                          <?php if ($_SESSION['inicioC'] == 1) {  ?>
                          <li><a href="reporte_civil.php">Reportes de civil</a></li><?php  } ?>
                        
                      </ul>
                    </li>

                    <?php  } ?>
                    <!-------------------------Designar------------------------->

                </ul>
              </div>
              

            </div>
            <!-- /sidebar menu -->
          </div>
        </div>