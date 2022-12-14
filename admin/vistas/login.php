<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Login | </title>

    <link rel="apple-touch-icon" href="../dist/svg/logo-icono.svg">
    <link rel="shortcut icon" href="../dist/svg/logo-icono.svg">

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback" />
    <!-- Font Awesome -->
    <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css" />
    <!-- SweetAlert2 -->
    <link rel="stylesheet" href="../plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css" />
    <!-- Toastr -->
    <link rel="stylesheet" href="../plugins/toastr/toastr.min.css" />
    <!-- Theme style -->
    <link rel="stylesheet" href="../dist/css/adminlte.min.css" />
    
    

    <style>
      .btn-outline-warning {
        color: #34322d !important;
        border-color: #139a1a !important;
      }
      .btn-outline-warning:hover {
        color: #1f2d3d !important;
        border-color: #139a1a !important;
        background-color: #139a1a;
      }     
      .imagen-fondo-login{
        background-repeat: no-repeat; background-size: cover;
      }  
    </style>
  </head>

  <body class="hold-transition imagen-fondo-login login-page" style="background-image: url('../dist/img/0fondo_login.jpg');">
    <div class="login-box">
      
      <!-- /.login-logo -->
      <div class="card" style="background-color: #ffffff96; border-radius: 20px;">
        <div class="card-body login-card-body" style="background-color: #ffffff4d; border-radius: 20px;">
          <div class="login-logo">
            <a href="login.html"> <img src="../dist/svg/logo_loginA.png" alt="" width="270px" height="270"> </a>
          </div>
          <p class="login-box-msg">Ingrese sus credenciales para ingresar al sistema.</p>

          <form method="post" autocomplet="off" id="frmAcceso">
            <div class="input-group mb-3">
              <input type="text" id="logina" name="logina"  class="form-control" placeholder="Usuario" required autocomplet="off" />
              <div class="input-group-append">
                <div class="input-group-text" style="background: linear-gradient(to right, #ffffff 10%, #ea2222 100%);">
                  <span class="fa fa-user" style="color: #040404;"></span>
                </div>
              </div>
            </div>
            <div class="input-group mb-3 ">
              <input type="password" id="clavea" name="clavea"  class="form-control" placeholder="Password" required autocomplet="off"/>
              <div class="input-group-append">
                <div class="input-group-text" style="background: linear-gradient(to right, #ffffff 10%, #139a1a 100%);">
                  <span class="fas fa-lock" style="color: #040404;"></span>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-12">
                <button type="submit" class="btn btn-outline-success btn-block login-btn">Ingresar</button>
                <!-- <input type="submit" value="Ingresar" class="btn btn-outline-warning btn-block login-btn" /> -->
              </div>

              <!--Alerta de conteo de inicio de sesi??n incorrecto-->
              <div align="center" class="alert" id="mensaje" style="display: none; width: 100%; font-size: 20px;"></div>
              <!-- /.col -->
            </div>
          </form>
        </div>
        <!-- /.login-card-body -->
      </div>
    </div>


    <!-- jQuery -->
    <script src="../plugins/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="../plugins/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <!-- SweetAlert2 -->
    <script src="../plugins/sweetalert2/sweetalert2.min.js"></script>
    <!-- Toastr -->
    <script src="../plugins/toastr/toastr.min.js"></script>
    <!-- AdminLTE App -->
    <script src="../dist/js/adminlte.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <!-- <script src="../dist/js/demo.js"></script> -->

    <!-- Funciones Crud -->
    <script type="text/javascript" src="../dist/js/funcion_crud.js"></script>
    <!-- Funciones Generales -->
    <script type="text/javascript" src="../dist/js/funcion_general.js"></script>

    <script>
      $(function () {
        var Toast = Swal.mixin({
          toast: true,
          position: "top-end",
          showConfirmButton: false,
          timer: 3000,
        });
      });
    </script>

   
    <script type="text/javascript" src="../vistas/scripts/login.js"></script>
  </body>
</html>
