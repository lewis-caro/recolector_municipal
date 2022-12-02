<div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="inicio.php" class="site_title"><i class="fa fa-paw"></i> <span>Gentelella Alela!</span></a>
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
                    <?php if ($_SESSION['inicio'] == 1) {  ?>
                        
                        <li>
                            <a><i href="inicio.php" class="fa fa-home"></i> Home </a>
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
                   <?php if ($_SESSION['acceso'] == 1) {  ?>

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

                </ul>
              </div>
              <div class="menu_section">
                <h3>Live On</h3>
                <ul class="nav side-menu">
                  <li><a><i class="fa fa-bug"></i> Additional Pages <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="e_commerce.html">E-commerce</a></li>
                      <li><a href="projects.html">Projects</a></li>
                      <li><a href="project_detail.html">Project Detail</a></li>
                      <li><a href="contacts.html">Contacts</a></li>
                      <li><a href="profile.html">Profile</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-windows"></i> Extras <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="page_403.html">403 Error</a></li>
                      <li><a href="page_404.html">404 Error</a></li>
                      <li><a href="page_500.html">500 Error</a></li>
                      <li><a href="plain_page.html">Plain Page</a></li>
                      <li><a href="login.html">Login Page</a></li>
                      <li><a href="pricing_tables.html">Pricing Tables</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-sitemap"></i> Multilevel Menu <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                        <li><a href="#level1_1">Level One</a>
                        <li><a>Level One<span class="fa fa-chevron-down"></span></a>
                          <ul class="nav child_menu">
                            <li class="sub_menu"><a href="level2.html">Level Two</a>
                            </li>
                            <li><a href="#level2_1">Level Two</a>
                            </li>
                            <li><a href="#level2_2">Level Two</a>
                            </li>
                          </ul>
                        </li>
                        <li><a href="#level1_2">Level One</a>
                        </li>
                    </ul>
                  </li>                  
                  <li><a href="javascript:void(0)"><i class="fa fa-laptop"></i> Landing Page <span class="label label-success pull-right">Coming Soon</span></a></li>
                </ul>
              </div>

            </div>
            <!-- /sidebar menu -->
          </div>
        </div>