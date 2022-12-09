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
          if ($_SESSION['inicioC'] == 1) {
            //-----------------------------
            ?>
              <!-- page content -->
              <div class="right_col" role="main">
                <!-- top tiles -->
                <div class="row" style="display: inline-block;" >
                  <div class="tile_count">
                  
                    <h1>Bienvenido Civil</h1>

                    
                      <div class="clearfix">
                        <div class="row">
                          <div class="col-md-12 col-sm-12">
                            <div class="x_panel">
                              <div class="x_title">
                                <h2>Home informativa</h2>
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
                              <div class="x_content">
                                <div class="col-md-7 col-sm-7">
                                  
                                  <!--<div class="product-image">
                                    <img src="../dist/img/inicio.webp" alt="..." />
                                  </div>-->

                                  <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                                    <div class="carousel-inner">

                                      <div class="carousel-item active">
                                        <img class="d-block w-100" src="../dist/img/inicio.webp" alt="First slide">
                                      </div>
                                      <div class="carousel-item">
                                        <img class="d-block w-100" src="../dist/img/1m.jpg" alt="Second slide">
                                      </div>
                                      <div class="carousel-item">
                                        <img class="d-block w-100" src="../dist/img/3m.jpg" alt="Third slide">
                                      </div>                                      
                                    </div>

                                    <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                                      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                      <span class="sr-only">Previous</span>
                                    </a>
                                    <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                                      <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                      <span class="sr-only">Next</span>
                                    </a>
                                    
                                  </div><br>

                                  <div class="row">
                                    <!--  -->
                                    <div class="col-4">
                                      <div class="card" >
                                        <img class="card-img-top" src="../dist/img/br.webp" alt="Card image cap" />
                                        <div class="card-body">
                                          <p class="card-text text-lowercase">El principal motivo para reciclar el plástico es porque sus residuos tardan entre 100 y 1.000 años en degradarse.
                                                               El carbón y el plástico del que esté fabricado no se disuelve.</p>
                                        </div>
                                      </div>
                                    </div>
                                    <!--  -->
                                    <div class="col-4">
                                      <div class="card " >
                                        <img class="card-img-top" src="../dist/img/lt.webp" alt="Card image cap" />
                                        <div class="card-body">
                                          <p class="card-text">El reciclaje de una lata de conserva evita el uso de nuevas materias primas y energía.</p>
                                        </div>
                                      </div>
                                    </div>
                                    <!--  -->
                                    <div class="col-4">
                                      <div class="card " >
                                        <img class="card-img-top" src="../dist/img/vd.webp" alt="Card image cap" />
                                        <div class="card-body">
                                          <p class="card-text">El vidrio es fácil de limpiar, esterilizar y reutilizar. 
                                                               El vidrio es el único material en contacto con alimentos que la Administración de Drogas y 
                                                               Alimentos de los Estados Unidos considera «generalmente reconocido como seguro«.</p>
                                        </div>
                                      </div>
                                    </div>                                     
                                  </div>
                                  <!-- /.row -->
                                </div>

                                <div class="col-md-5 col-sm-5" style="border: 0px solid #e5e5e5;">
                                  <h3 class="prod_title"><b>¿Cómo podemos disminuir la cantidad de desechos sólidos?</b></h3>

                                  <p>El reciclaje de desechos sólidos es una vía para la disminución de desechos a nivel global. 
                                    Este proceso consiste en utilizar de nuevo materiales que considerados inservibles, pero que aún son aptos 
                                    para crear otros productos o re-fabricar los mismos.</p>
                                  <br />

                                  <div >
                                    <h2><i><b>Tips para disminuir los desechos sólidos desde casa</b></i></h2>
                                  
                                    
                                      <p><b>1.</b> Comencemos por <b>recolectar y reciclar</b>, con esto se puede generar 
                                          incluso fuentes de empleo (recuerda que debemos separar el plástico, papel, cartón, 
                                          vidrio, materia orgánica y lo demás para ponerlo en el recipiente correcto).</p>
                                      
                                      <p><b>2.</b> Hagamos composta en nuestros <b>hogares </b> los desechos no peligrosos.</p>
                                      
                                      <p><b>3.</b> Reduzcamos la producción y consumo de <b>plástico y basura marina</b>, evitemos usar bolsas plásticas, por ejemplo.</p>
                                      
                                      <p><b>4.</b> <b>No desperdiciar comida</b>, recordemos que muchos no la tienen y estaríamos desperdiciando agua, energía y todo lo que implica elaborarla.</p>
                                     
                                  </div>
                                  <br />

                                  <div class="">
                                    <div class="product_price">
                                      <h1 class="price">12,6 Millones</h1>
                                      <span class="price-tax">Es la cantidad de muertes al año por los desechos sólidos</span>
                                      <br />
                                    </div>
                                  </div>
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

<?php } ob_end_flush(); ?>