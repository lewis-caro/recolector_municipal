<?php 

error_reporting(0);

//Llamar a la conxeion de bd
include 'config/conexion.php';

    
    $mensaje="";
    
if(isset($_POST['entrar'])){

    $ruser = $conect->real_escape_string($_POST['correo']);
    $rpass = $conect->real_escape_string($_POST['password']);

    //Consulta que extraiga los datod de la BD
    $consulta = "SELECT * FROM registro WHERE usuario = '$ruser' and password = '$rpass' ";
    
    if($resultado = $conect->query($consulta)){

        while($row = $resultado->fetch_array()){
            $userok = $row['usuario'];
            $passok = $row['password'];

        }
        $resultado->close();

    }
    $conect->close();

    if(isset($ruser) && isset($rpass)){

        if($ruser == $userok && $rpass == $passok){
        
            $_SESSION['inicio'] = TRUE;
            $_SESSION['usuario'] = $usuario;

            header("location:inicio.php");
    
        }else{
    
            //header("location:login.php");

            $mensaje.="<div class='alert alert-danger alert-dismissible fade show' role='alert'>
            <strong>Oh noo!</strong> Tus datos no son correctos, ¡Vueleve a Intentarlo!.
            <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                <span aria-hidden='true'>&times;</span>
            </button>
            </div>";
    
        }

    }
    else{

      /*$mensaje.="<div class='alert alert-danger alert-dismissible fade show' role='alert'>
            <strong>Oh noo!</strong> Tus datos no son correctos, ¡Vueleve a Intentarlo!.
            <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                <span aria-hidden='true'>&times;</span>
            </button>
            </div>";*/
    

    }


    //echo $ruser. $rpass;

    /*if($usu == $ruser & $pass == $rpass){
        
        $mensaje.="<div class='alert alert-success alert-dismissible fade show' role='alert'>
        <strong>Hey Bien Hecho!</strong> Tus datos son correctos.
        <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
            <span aria-hidden='true'>&times;</span>
        </button>
        </div>";

    }else{

        $mensaje.="<div class='alert alert-danger alert-dismissible fade show' role='alert'>
        <strong>Oh noo!</strong> Tus datos no son correctos.
        <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
            <span aria-hidden='true'>&times;</span>
        </button>
        </div>";

    }*/

}




?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Login - MDBS</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback" />
    <!-- Font Awesome -->
    <link rel="stylesheet" href="admin/plugins/fontawesome-free/css/all.min.css" />
    <!-- SweetAlert2 -->
    <link rel="stylesheet" href="admin/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css" />
    <!-- Toastr -->
    <link rel="stylesheet" href="admin/plugins/toastr/toastr.min.css" />
    <!-- Theme style -->
    <link rel="stylesheet" href="admin/dist/css/adminlte.min.css" />
    
    <!-- Bootstrap -->
    <link href="admin/plugins/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="admin/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="admin/plugins/nprogress/nprogress.css" rel="stylesheet">
    <!-- Animate.css -->
    <link href="admin/plugins/animate.css/animate.min.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="admin/build/css/custom.min.css" rel="stylesheet">

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

  <body class="hold-transition imagen-fondo-login login-page" style="background-image: url('admin/dist/img/0fondo_login.jpg');">
    <div class="login-box">
      
      <!-- /.login-logo -->
      <div class="card" style="background-color: #ffffff96; border-radius: 20px;">
        <div class="card-body login-card-body" style="background-color: #ffffff4d; border-radius: 20px;">
          <div class="login-logo">
            <a href="login.html"> <img src="admin/dist/svg/logo_loginA.png" alt="" width="270px" height="270"> </a>
          </div>
          <p class="login-box-msg">Ingrese sus credenciales para ingresar al sistema.</p>

          <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" >
            <div class="input-group mb-3">
              <input type="text" name="correo" autocomplete="off" class="form-control" placeholder="Usuario" required/>
              <div class="input-group-append">
                <div class="input-group-text" style="background: linear-gradient(to right, #ffffff 10%, #ea2222 100%);">
                  <span class="fa fa-user" style="color: #040404;"></span>
                </div>
              </div>
            </div>

            <div class="input-group mb-3 ">
              <input type="password" name="password" autocomplete="off" class="form-control" placeholder="Password" required/>
              <div class="input-group-append">
                <div class="input-group-text" style="background: linear-gradient(to right, #ffffff 10%, #139a1a 100%);">
                  <span class="fas fa-lock" style="color: #040404;"></span>
                </div>
              </div>
            </div>
            
            <div class="row">
              <div class="col-12">
                <button type="submit" name="entrar" class="btn btn-outline-success btn-block ">Ingresar</button>
                <i><a href="index.php" class="btn btn-outline-warning btn-block ">Regresar</a></i>
                <!-- <input type="submit" value="Ingresar" class="btn btn-outline-warning btn-block login-btn" /> -->
              </div>
              <!-- /.col -->
            </div>
          </form>
        </div>
        <!-- /.login-card-body -->
      </div><br>
      <?php echo $mensaje; ?>
    </div>

    <!-- jQuery -->
    <script src="admin/plugins/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="admin/plugins/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <!-- SweetAlert2 -->
    <script src="admin/plugins/sweetalert2/sweetalert2.min.js"></script>
    <!-- Toastr -->
    <script src="admin/plugins/toastr/toastr.min.js"></script>
    <!-- AdminLTE App -->
    <script src="admin/dist/js/adminlte.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <!-- <script src="admin/dist/js/demo.js"></script> -->

    <!-- Funciones Crud -->
    <script type="text/javascript" src="admin/dist/js/funcion_crud.js"></script>
    <!-- Funciones Generales -->
    <script type="text/javascript" src="admin/dist/js/funcion_general.js"></script>

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
    <script type="text/javascript" src="js/login.js"></script>
  </body>
</html>
