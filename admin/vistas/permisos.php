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
            <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
            <!-- Meta, title, CSS, favicons, etc. -->
            <meta charset="utf-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <link rel="icon" href="../dist/svg/logo-icono.svg" type="image/ico" />

            <title> Usuarios | Admin </title>

            <?php $title = "Permisos"; require 'head.php'; ?>

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
                                    <h3>Users <small>Some examples to get you started</small></h3>
                                </div>
                               
                                <div class="title_right">
                                    <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                                        <div class="input-group">
                                            <input type="text" class="form-control" placeholder="Search for...">
                                            <span class="input-group-btn">
                                            <button class="btn btn-secondary" type="button">Go!</button>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--------------Titulo y Buscador------------->
                            
                            <div class="clearfix"></div>
                            <div class="row">
                                <div class="col-md-12 col-sm-12 ">
                                    <div class="x_panel">
                                        <div class="x_title">
                                            <h2>Responsive example<small>Users</small></h2>
                                            <ul class="nav navbar-right panel_toolbox">
                                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                            </li>
                                            <li class="dropdown">
                                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                    <a class="dropdown-item" href="#">Settings 1</a>
                                                    <a class="dropdown-item" href="#">Settings 2</a>
                                                </div>
                                            </li>
                                            <li><a class="close-link"><i class="fa fa-close"></i></a>
                                            </li>
                                            </ul>
                                            <div class="clearfix"></div>
                                        </div>
                                        <div class="x_content">
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <div class="card-box table-responsive">
                                                        <p class="text-muted font-13 m-b-30">
                                                            Responsive is an extension for DataTables that resolves that problem by optimising the table's layout for different screen sizes through the dynamic insertion and removal of columns from the table.
                                                        </p>
                                            
                                                        <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                                                            <thead>
                                                                <tr>
                                                                <th>First name</th>
                                                                <th>Last name</th>
                                                                <th>Position</th>
                                                                <th>Office</th>
                                                                <th>Age</th>
                                                                <th>Start date</th>
                                                                <th>Salary</th>
                                                                <th>Extn.</th>
                                                                <th>E-mail</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr>
                                                                <td>Tiger</td>
                                                                <td>Nixon</td>
                                                                <td>System Architect</td>
                                                                <td>Edinburgh</td>
                                                                <td>61</td>
                                                                <td>2011/04/25</td>
                                                                <td>$320,800</td>
                                                                <td>5421</td>
                                                                <td>t.nixon@datatables.net</td>
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
        </body>
        </html>

        <?php 
    }
    ?>
?>