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
  ob_end_flush();
?>