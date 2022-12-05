<?php

    /*include 'config/conexion.php';

    //Validar que exista un boton registrar
   if(isset($_POST['registrar'])) {

        $mensaje = "";
        $nombre = $conect->real_escape_string($_POST['nombres']);
        $apellidos = $conect->real_escape_string($_POST['apellidos']);
        $correo = $conect->real_escape_string($_POST['correo']);
        $celular = $conect->real_escape_string($_POST['celular']);
        $passw = $conect->real_escape_string($_POST['password']);
    
        //Consulta Para insertar los datos

        $insertar = "INSERT INTO registro (nombres, apellidos, correo, celular, password) VALUES ('$nombre', '$apellidos', '$correo', '$celular', '$passw')";

        $guardar = $conect->query($insertar);

        if($guardar > 0){
            $mensaje.="<h3 class='text-success'> Tu regsitro ah sido exitoso</h3>";
        }
        else{
            $mensaje.="<h3 class='text-danger'> Tu regsitro no se ha sido exitoso</h3>";
        }


   }*/

?>

<?php

    include 'config/conexion.php';

    //Validar que exista un boton registrar
   if(isset($_POST['registrar'])) {

        $mensaje = "";
        $nombre = $conect->real_escape_string($_POST['nombres']);
        $apellidos = $conect->real_escape_string($_POST['apellidos']);
        $correo = $conect->real_escape_string($_POST['correo']);
        $celular = $conect->real_escape_string($_POST['celular']);
        $passw = $conect->real_escape_string($_POST['password']);

        //Validar para que el regsitro no exista
        $validar = "SELECT * FROM registro WHERE correo = '$correo' ";
        $validando = $conect->query($validar);

        if($validando->num_rows > 0){

            $mensaje.="<div class='alert alert-success alert-dismissible fade show' role='alert'>
                    <strong>Lo Lamento!</strong> Este correo ya esta en uso
                    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                        <span aria-hidden='true'>&times;</span>
                    </button>
                    </div>";

        }
        else{    
        //Consulta Para insertar los datos

            $insertar = "INSERT INTO registro (nombres, apellidos, correo, celular, password) VALUES ('$nombre', '$apellidos', '$correo', '$celular', '$passw')";

            $guardar = $conect->query($insertar);

            if($guardar > 0){
                $mensaje.="<h3 class='text-success'> Tu regsitro ah sido exitoso</h3>";
            }
            else{
                $mensaje.="<h3 class='text-danger'> Tu regsitro no se ha sido exitoso</h3>";
            }
        }

   }

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>MDBS - Municipalidad Distrital Banda de Shilcayo</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Jost:wght@500;600;700&family=Open+Sans:wght@400;500&display=swap" rel="stylesheet">  

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/animate/animate.min.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="lib/lightbox/css/lightbox.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
</head>

<body>
    <!-- Spinner Start -->
    <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-border text-primary" role="status" style="width: 3rem; height: 3rem;"></div>
    </div>
    <!-- Spinner End -->


   


    <!-- Navbar Start -->
    <nav class="navbar navbar-expand-lg bg-white navbar-light sticky-top p-0">
        <a href="index.php" class="navbar-brand d-flex align-items-center px-4 px-lg-5">
            <h1 class="m-0">MDBS</h1>
            <h1 class="x-0"></h1>
        </a>
        <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav ms-auto p-4 p-lg-0">
                <a href="index.php" class="nav-item nav-link active">Inicio</a>
                <a href="" class="nav-item nav-link">Nosotros</a>
                <a href="" class="nav-item nav-link" data-target="#programas">Programas</a>
                <a href="" class="nav-item nav-link">Residuos</a>
                <!--<div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Pages</a>
                    <div class="dropdown-menu bg-light m-0">
                        <a href="feature.html" class="dropdown-item">Features</a>
                        <a href="quote.html" class="dropdown-item">Free Quote</a>
                        <a href="team.html" class="dropdown-item">Our Team</a>
                        <a href="testimonial.html" class="dropdown-item">Testimonial</a>
                        <a href="404.html" class="dropdown-item">404 Page</a>
                    </div>
                </div>-->
                <a href="" class="nav-item nav-link">Contactos</a>
            </div>
            
            <a href="login.php" class="btn btn-primary py-4 px-lg-4 rounded-0 d-none d-lg-block">Login<i class="fa fa-arrow-right ms-3"></i></a>
        </div>
    </nav>
    <!-- Navbar End -->


    <!-- Carousel Start -->
    <div class="container-fluid p-0 wow fadeIn" data-wow-delay="0.1s">
        <div id="header-carousel" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">

                <!--Navar 01 -->
                <div class="carousel-item active">
                    <img class="w-100" src="img/Inicio.jpg" alt="Image">
                    <div class="carousel-caption">
                        <div class="container">
                            <div class="row justify-content-center">
                                <div class="col-lg-8">
                                    <h1 class="display-1 text-white mb-5 animated slideInDown">Forma parte de un gran cambio</h1>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!--Navar 02-->
                <div class="carousel-item">
                    <img class="w-100" src="img/bd.webp" alt="Image">
                    <div class="carousel-caption">
                        <div class="container">
                            <div class="row justify-content-center">
                                <div class="col-lg-7">
                                    <h1 class="display-1 text-white mb-5 animated slideInDown">Vivamos en un mundo de belleza</h1>
                                    <a href="" class="btn btn-primary py-sm-3 px-sm-4">Explore More</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#header-carousel"
                data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#header-carousel"
                data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>
    <!-- Carousel End -->

    <!-- Top Feature Start -->
    <div class="container-fluid top-feature py-5 pt-lg-0">
        <div class="container py-5 pt-lg-0">
            <div class="row gx-0">
                <div class="col-lg-4 wow fadeIn" data-wow-delay="0.1s">
                    <div class="bg-white shadow d-flex align-items-center h-100 px-5" style="min-height: 160px;">
                        <div class="d-flex">
                            <div class="flex-shrink-0 btn-lg-square rounded-circle bg-light">
                                <i class="fa fa-times text-primary"></i>
                            </div>
                            <div class="ps-3">
                                <h4>Mision</h4>
                                <p><i>El Gobierno Local Distrital de la Banda de Shilcayo, promueve el desarrollo integral y ...</i></p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 wow fadeIn" data-wow-delay="0.3s">
                    <div class="bg-white shadow d-flex align-items-center h-100 px-5" style="min-height: 160px;">
                        <div class="d-flex">
                            <div class="flex-shrink-0 btn-lg-square rounded-circle bg-light">
                                <i class="fa fa-eye text-primary"></i>
                            </div>
                            <div class="ps-3">
                                <h4>Vision</h4>
                                <p><i>Hacer de La Banda de Shilcayo, una Ciudad competitiva y ecológica, que crece organizadamente ... </i></p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 wow fadeIn" data-wow-delay="0.5s">
                    <div class="bg-white shadow d-flex align-items-center h-100 px-5" style="min-height: 160px;">
                        <div class="d-flex">
                            <div class="flex-shrink-0 btn-lg-square rounded-circle bg-light">
                                <i class="fa fa-phone text-primary"></i>
                            </div>
                            <div class="ps-3">
                                <h4>Valores</h4>
                                <span>asas</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Top Feature End -->

     <!-- Facts Start -->
     <div class="container-fluid facts my-5 py-5" data-parallax="scroll" data-image-src="img/mbd.jpg">
        <div class="container py-5">
            <div class="row g-5">
                <div class="col-sm-6 col-lg-3 text-center wow fadeIn" data-wow-delay="0.1s">
                    <h1 class="display-4 text-white" data-toggle="counter-up">43481</h1>
                    <span class="fs-5 fw-semi-bold text-light">Total de Pobladores</span>
                </div>
                <div class="col-sm-6 col-lg-3 text-center wow fadeIn" data-wow-delay="0.3s">
                    <h1 class="display-4 text-white" data-toggle="counter-up">28670</h1>
                    <span class="fs-5 fw-semi-bold text-light">Territorio en Hectareas</span>
                </div>
                <div class="col-sm-6 col-lg-3 text-center wow fadeIn" data-wow-delay="0.5s">
                    <h1 class="display-4 text-white" data-toggle="counter-up">21525</h1>
                    <span class="fs-5 fw-semi-bold text-light">Total de Mujeres</span>
                </div>
                <div class="col-sm-6 col-lg-3 text-center wow fadeIn" data-wow-delay="0.7s">
                    <h1 class="display-4 text-white" data-toggle="counter-up">21956</h1>
                    <span class="fs-5 fw-semi-bold text-light">Total de Hombres</span>
                </div>
            </div>
        </div>
    </div>
    <!-- Facts End -->

    <!-- About Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="row g-5 align-items-end">
                <div class="col-lg-3 col-md-5 wow fadeInUp" data-wow-delay="0.1s">
                    <img class="img-fluid rounded" data-wow-delay="0.1s" src="img/fondo.jpg" style="width: 800px; height: 453px;">
                </div>

                <div id="navar" class="col-lg-6 col-md-7 wow fadeInUp" data-wow-delay="0.3s">
                    <h1 class="display-1 text-primary mb-0">61</h1>
                    <p class="text-primary mb-4">Años</p>
                    <h1 class="display-5 mb-4">Acciones de la Muncipalidad de la Banda de Shilcayo </h1>
                    <p class="mb-4">Nuestro municipio, trabaja arduamente para mantener limpias las calles y así poder dar un mejor ambiente al municipio.</p>
                    <a class="btn btn-primary py-3 px-4" href="">Explorar mas</a>
                </div>

                <div class="col-lg-3 col-md-12 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="row g-5">
                        <div class="col-12 col-sm-6 col-lg-12">
                            <div class="border-start ps-4">
                                <i class="fa fa-truck fa-3x text-primary mb-3"></i>
                                <h4 class="mb-3">Recolector de Basura</h4>
                                <div class="service-img rounded">
                                    <img class="img-fluid" src="img/b3.jpg" alt="">
                                </div>
                                    <i><span> Queridos pobladores el horario de recojo
                                        de la basura es a partir de las 3:00 am por favor tener
                                        lista su basura fuera de la casa para evitar incovenientes.
                                    </span></i>
                                </div>
                        </div>

                        <!--<div class="col-12 col-sm-6 col-lg-12">
                            <div class="border-start ps-4">
                                <i class="fa fa-users fa-3x text-primary mb-3"></i>
                                <h4 class="mb-3">Dedicated Team</h4>
                                <div class="service-img rounded">
                                    <img class="img-fluid" src="img/b3.jpg" alt="">
                                </div>
                                <span></span>
                            </div>
                        </div>-->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- About End -->


   


    <!-- Features Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="row g-5 align-items-center">
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s">
                    <p class="fs-5 fw-bold text-primary">El Reciclaje</p>
                    <h2 class="display-5 mb-4">Aprende a reciclar con sus 3 factores principales</h2>
                    <p class="mb-4" text-align>La denominada Regla de las Tres Erres pretende estimular la participación ciudadana, desde el ámbito del hogar, en la lucha contra la degradación del planeta mediante la reducción, la reutilización y el reciclaje de los  productos que consumimos</p>
                    <a class="btn btn-primary py-3 px-4" href="">Explorar mas</a>
                </div>
                <div class="col-lg-6">
                    <div class="row g-4 align-items-center">
                        <div class="col-md-6">
                            <div class="row g-4">

                                <div class="col-12 wow fadeIn" data-wow-delay="0.3s">
                                
                                    <div class="text-center rounded py-5 px-4" style="box-shadow: 0 0 45px rgba(0,0,0,.08);">
                                        <div class="btn-square bg-light rounded-circle mx-auto mb-4" style="width: 90px; height: 90px;">
                                            <i class="fa fa-trash fa-3x text-primary"></i>
                                        </div>
                                        <h4 class="mb-0">Reciclar </h4>
                                    </div>
                                </div>

                                <div class="col-12 wow fadeIn" data-wow-delay="0.5s">
                                    <div class="text-center rounded py-5 px-4" style="box-shadow: 0 0 45px rgba(0,0,0,.08);">
                                        <div class="btn-square bg-light rounded-circle mx-auto mb-4" style="width: 90px; height: 90px;">
                                            <i class="fa fa-recycle fa-3x text-primary"></i>
                                        </div>
                                        <h4 class="mb-0">Reutilizar</h4>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="col-md-6 wow fadeIn" data-wow-delay="0.7s">
                            <div class="text-center rounded py-5 px-4" style="box-shadow: 0 0 45px rgba(0,0,0,.08);">
                                <div class="btn-square bg-light rounded-circle mx-auto mb-4" style="width: 90px; height: 90px;">
                                    <i class="fa fa-check fa-3x text-primary"></i>
                                </div>
                                <h4 class="mb-0">Reducir</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Features End -->


    <!-- Service Start -->
    <div class="container-xxl py-5">
        <div class="container">

            <div id="programas" class="text-center mx-auto wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px;">
                <p class="fs-5 fw-bold text-primary">Nuestros Programas</p>
                <h1 class="display-5 mb-5">PROGRAMAS</h1>
            </div>

            <div class="row g-4">
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="service-item rounded d-flex h-100">
                        <div class="service-img rounded">
                            <img class="img-fluid" src="img/sis.png" alt="">
                        </div>
                        <div class="service-text rounded p-5">
                            <div class="btn-square rounded-circle mx-auto mb-3">
                                <img class="img-fluid" src="img/icon/sis.png" alt="Icon">
                            </div>
                            <h4 class="mb-3">SISFOH</h4>
                            <p class="mb-4">Es un sistema intersectorial del Gobierno Peruano que provee información socioeconómica a las intervenciones públicas y programas sociales para la identificación de sus potenciales usuarios, en beneficio de aquellos grupos poblacionales priorizados.</p>
                            <a class="btn btn-sm" href="https://www.mef.gob.pe/es/?option=com_content&language=es-ES&Itemid=100694&view=article&catid=750&id=4915&lang=es-ES"><i class="fa fa-plus text-primary me-2"></i>Leer Mas</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="service-item rounded d-flex h-100">
                        <div class="service-img rounded">
                            <img class="img-fluid" src="img/vsl.jpg" alt="">
                        </div>
                        <div class="service-text rounded p-5">
                            <div class="btn-square rounded-circle mx-auto mb-3">
                                <img class="img-fluid" src="img/icon/vl.png" alt="Icon">
                            </div>
                            <h4 class="mb-3">VASO DE LECHE</h4>
                            <p class="mb-4">Es un programa social de asistencia alimentaria en Perú cuyo objetivo es brindar una ración diaria de alimentos a personas consideradas como población vulnerable.</p>
                            <a class="btn btn-sm" href="https://www.mef.gob.pe/es/politica-economica-y-social-sp-2822/243-transferencias-de-programas/393-programa-de-vaso-de-leche"><i class="fa fa-plus text-primary me-2"></i>leer Mas</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="service-item rounded d-flex h-100">
                        <div class="service-img rounded">
                            <img class="img-fluid" src="img/rc.jpg" alt="">
                        </div>
                        <div class="service-text rounded p-5">
                            <div class="btn-square rounded-circle mx-auto mb-3">
                                <img class="img-fluid" src="img/icon/RC.png" alt="Icon">
                            </div>
                            <h4 class="mb-3">REGISTRO CIVIL</h4>
                            <p class="mb-4">Es un grupo administrativo o servicio público, encargado de dejar constancia de los hechos o actos relativos al estado civil de las personas físicas.</p>
                            <a class="btn btn-sm" href="https://www.reniec.gob.pe/portal/registroCivil.htm"><i class="fa fa-plus text-primary me-2"></i>leer Mas</a>
                        </div>
                    </div>
                </div>
                <!--
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="service-item rounded d-flex h-100">
                        <div class="service-img rounded">
                            <img class="img-fluid" src="img/service-4.jpg" alt="">
                        </div>
                        <div class="service-text rounded p-5">
                            <div class="btn-square rounded-circle mx-auto mb-3">
                                <img class="img-fluid" src="img/icon/icon-4.png" alt="Icon">
                            </div>
                            <h4 class="mb-3">Garden Maintenance </h4>
                            <p class="mb-4">Erat ipsum justo amet duo et elitr dolor, est duo duo eos lorem sed diam stet diam sed stet.</p>
                            <a class="btn btn-sm" href=""><i class="fa fa-plus text-primary me-2"></i>Read More</a>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="service-item rounded d-flex h-100">
                        <div class="service-img rounded">
                            <img class="img-fluid" src="img/service-5.jpg" alt="">
                        </div>
                        <div class="service-text rounded p-5">
                            <div class="btn-square rounded-circle mx-auto mb-3">
                                <img class="img-fluid" src="img/icon/icon-8.png" alt="Icon">
                            </div>
                            <h4 class="mb-3">Green Technology</h4>
                            <p class="mb-4">Erat ipsum justo amet duo et elitr dolor, est duo duo eos lorem sed diam stet diam sed stet.</p>
                            <a class="btn btn-sm" href=""><i class="fa fa-plus text-primary me-2"></i>Read More</a>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="service-item rounded d-flex h-100">
                        <div class="service-img rounded">
                            <img class="img-fluid" src="img/service-6.jpg" alt="">
                        </div>
                        <div class="service-text rounded p-5">
                            <div class="btn-square rounded-circle mx-auto mb-3">
                                <img class="img-fluid" src="img/icon/icon-2.png" alt="Icon">
                            </div>
                            <h4 class="mb-3">Urban Gardening</h4>
                            <p class="mb-4">Erat ipsum justo amet duo et elitr dolor, est duo duo eos lorem sed diam stet diam sed stet.</p>
                            <a class="btn btn-sm" href=""><i class="fa fa-plus text-primary me-2"></i>Read More</a>
                        </div>
                    </div>
                </div>-->

            </div>
        </div>
    </div>
    <!-- Service End -->


    <!-- Quote Start -->
    <div class="container-fluid quote my-5 py-5" data-parallax="scroll" data-image-src="img/mbd.jpg">
        <div class="container py-5">
            <div class="row justify-content-center">
                <div class="col-lg-7">
                    <div class="bg-white rounded p-4 p-sm-5 wow fadeIn" data-wow-delay="0.5s">
                        <h1 class="display-5 text-center mb-5">Incribirse al Programa</h1>
                        
                        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                            <div class="row g-3">

                                <div class="col-sm-6">
                                    <div class="form-floating">
                                        <input type="text" class="form-control bg-light border-0" id="gname" name="nombres" placeholder="Nombres" required>
                                        <label for="gname">Nombres</label>
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="form-floating">
                                        <input type="text" class="form-control bg-light border-0" id="apell" name="apellidos" placeholder="Apellidos" required>
                                        <label for="apell">Apellidos</label>
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="form-floating">
                                        <input type="email" class="form-control bg-light border-0" id="correo" name="correo" placeholder="Correo" required>
                                        <label for="correo">Correo</label>
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="form-floating">
                                        <input type="number" class="form-control bg-light border-0" id="tc" name="celular" placeholder="Celular"  required>
                                        <label for="tc">Telefono / Celular</label>
                                    </div>
                                </div>

                                <div class="col-sm-12">
                                    <div class="form-floating">
                                        <input type="password" class="form-control bg-light border-0" id="con" name="password" placeholder="Contraseña" required>
                                        <label for="con">Contraseña</label>
                                    </div>
                                </div>

                                <div class="col-12 text-center">
                                    <input type="submit" name="registrar" class="btn btn-primary py-3 px-4"  value="registrar">
                                </div>

                                <!--Alerta
                                <div class="alert alert-danger" role="alert">
                                    El correo ya esta en uso!
                                </div>-->

                            </div>
                        </form>
                    </div>
                </div>
                <?php //echo $mensaje; ?>
            </div>
        </div>
    </div>
    <!-- Quote End -->


    <!-- Projects Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center mx-auto wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px;">
                <p class="fs-5 fw-bold text-primary">Residuos Sólidos</p>
                <h1 class="display-5 mb-5">Los colores del reciclaje: aprende cómo reciclar mejor</h1>
            </div>
            <div class="row wow fadeInUp" data-wow-delay="0.3s">
                <div class="col-12 text-center">
                    <ul class="list-inline rounded mb-5" id="portfolio-flters">
                        <li class="mx-2 active" data-filter="*">Todo</li>
                        <li class="mx-2" data-filter=".uno">Tacho Gris</li>
                        <li class="mx-2" data-filter=".dos">Tacho Naranja</li>
                        <li class="mx-2" data-filter=".tres">Tacho Verde</li>
                        <li class="mx-2" data-filter=".cuatro">Tacho Amarillo</li>
                        <li class="mx-2" data-filter=".cinco">Tacho Azul</li>
                        <li class="mx-2" data-filter=".seis">Tacho Rojo</li>
                    </ul>
                </div>
            </div>
            <div class="row g-4 portfolio-container">
                <div class="col-lg-4 col-md-6 portfolio-item uno wow fadeInUp" data-wow-delay="0.1s">
                    <div class="portfolio-inner rounded">
                        <img class="img-fluid" src="img/bd.jpg" alt="" height="">
                        <div class="portfolio-text">
                            <h4 class="text-white mb-4">Desechos en general</h4>
                            <i class="text-white">Principalmente material biodegradable</i><br>
                            <div class="d-flex">
                                <a class="btn btn-lg-square rounded-circle mx-2" href="img/bd.jpg" data-lightbox="portfolio"><i class="fa fa-eye"></i></a>
                                <a class="btn btn-lg-square rounded-circle mx-2" href="https://ogabogota.unal.edu.co/residuos-biodegradables/"><i class="fa fa-link"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 portfolio-item dos wow fadeInUp" data-wow-delay="0.3s">
                    <div class="portfolio-inner rounded">
                        <img class="img-fluid" src="img/or.webp">
                        <div class="portfolio-text">
                            <h4 class="text-white mb-4">Orgánico</h4>
                            <i class="text-white">Huesos, Restos de alimentos, etc</i><br>
                            <div class="d-flex">
                                <a class="btn btn-lg-square rounded-circle mx-2" href="img/or.webp" data-lightbox="portfolio"><i class="fa fa-eye"></i></a>
                                <a class="btn btn-lg-square rounded-circle mx-2" href="https://www.valladolidrecicla.es/que-es-la-basura-organica/"><i class="fa fa-link"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 portfolio-item tres wow fadeInUp" data-wow-delay="0.5s">
                    <div class="portfolio-inner rounded">
                        <img class="img-fluid" src="img/vb.png" alt="">
                        <div class="portfolio-text">
                            <h4 class="text-white mb-4">Vidrio</h4>
                            <i class="text-white text-center">Botellas, Vidiros rotos, Importante no utilizar cerámica o cristales.</i><br>
                            <div class="d-flex">
                                <a class="btn btn-lg-square rounded-circle mx-2" href="img/vb.webp" data-lightbox="portfolio"><i class="fa fa-eye"></i></a>
                                <a class="btn btn-lg-square rounded-circle mx-2" href="http://www.anfevi.com/el-envase-de-vidrio/reciclado/"><i class="fa fa-link"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 portfolio-item cuatro wow fadeInUp" data-wow-delay="0.1s">
                    <div class="portfolio-inner rounded">
                        <img class="img-fluid" src="img/lb.png" alt="">
                        <div class="portfolio-text">
                            <h4 class="text-white mb-4">Plásticos y envases metálicos</h4>
                            <i class="text-white text-center">Latas o envases de alimentos y bebidas, bolsas, etc.</i><br>
                            <div class="d-flex">
                                <a class="btn btn-lg-square rounded-circle mx-2" href="img/lb.webp" data-lightbox="portfolio"><i class="fa fa-eye"></i></a>
                                <a class="btn btn-lg-square rounded-circle mx-2" href="https://studylib.es/doc/5432534/latas-y-vidrio-botellas-y-contenedores-de"><i class="fa fa-link"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 portfolio-item cinco wow fadeInUp" data-wow-delay="0.3s">
                    <div class="portfolio-inner rounded">
                        <img class="img-fluid" src="img/pc.jpg" alt="">
                        <div class="portfolio-text">
                            <h4 class="text-white mb-4">Papel</h4>
                            <i class="text-white text-center">Todo tipo de papeles y cartones, periódicos, revistas, papeles de envolver o folletos publicitarios entre otros.</i><br>
                            <div class="d-flex">
                                <a class="btn btn-lg-square rounded-circle mx-2" href="img/pc.png" data-lightbox="portfolio"><i class="fa fa-eye"></i></a>
                                <a class="btn btn-lg-square rounded-circle mx-2" href="https://reciclajedonacionesperu.org.pe/reciclaje-de-periodico-revistas/"><i class="fa fa-link"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 portfolio-item seis wow fadeInUp" data-wow-delay="0.5s">
                    <div class="portfolio-inner rounded">
                        <img class="img-fluid" src="img/bp.png" alt="">
                        <div class="portfolio-text">
                            <h4 class="text-white mb-4">Desechos Peligrosos</h4>
                            <i class="text-white text-center">Baterias, pilas, insecticidas, aceites, aerosoles, o productos tegnológicos además de residuos hospitalarios.</i><br>
                            <div class="d-flex">
                                <a class="btn btn-lg-square rounded-circle mx-2" href="img/bp.jpg" data-lightbox="portfolio"><i class="fa fa-eye"></i></a>
                                <a class="btn btn-lg-square rounded-circle mx-2" href="https://ecolec.es/informacion-y-recursos/sobre-las-pilas/"><i class="fa fa-link"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Projects End -->


    <!-- Team Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center mx-auto wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px;">
                <p class="fs-5 fw-bold text-primary">Our Team</p>
                <h1 class="display-5 mb-5">Equipo Municipal</h1>
            </div>
            <div class="row g-4">

                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="team-item rounded">
                        <img class="img-fluid" src="img/alcalde.jpg" style="width: 800px; height: 460px;">
                        <div class="team-text">
                            <h5 class="mb-0">JOSÉ AUGUSTO DEL ÁGUILA GARCÍA</h5>
                            <p class="text-primary">Alcalde</p>
                            <div class="team-social d-flex">
                                <a class="btn btn-square rounded-circle me-2" href=""><i class="fab fa-facebook-f"></i></a>
                                <a class="btn btn-square rounded-circle me-2" href=""><i class="fab fa-twitter"></i></a>
                                <a class="btn btn-square rounded-circle me-2" href=""><i class="fab fa-instagram"></i></a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="team-item rounded">
                        <img class="img-fluid" src="img/sf.jpg" style="width: 800px; height: 460px;">
                        <div class="team-text">
                            <h5 class="mb-0">LINDA LUZ PADILLA ANGULO</h5>
                            <p class="text-primary">Gerente Municipal</p>
                            <div class="team-social d-flex">
                                <a class="btn btn-square rounded-circle me-2" href=""><i class="fab fa-facebook-f"></i></a>
                                <a class="btn btn-square rounded-circle me-2" href=""><i class="fab fa-twitter"></i></a>
                                <a class="btn btn-square rounded-circle me-2" href=""><i class="fab fa-instagram"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="team-item rounded">
                        <img class="img-fluid" src="img/gf.jpg" style="width: 800px; height: 460px;">
                        <div class="team-text">
                            <h5 class="mb-0">AUGUSTO WIDERHAL MELÉNDEZ ARÉVALO</h5>
                            <p class="text-primary">Gerente de Administración y Finanzas</p>
                            <div class="team-social d-flex">
                                <a class="btn btn-square rounded-circle me-2" href=""><i class="fab fa-facebook-f"></i></a>
                                <a class="btn btn-square rounded-circle me-2" href=""><i class="fab fa-twitter"></i></a>
                                <a class="btn btn-square rounded-circle me-2" href=""><i class="fab fa-instagram"></i></a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="team-item rounded">
                        <img class="img-fluid" src="img/gd.jpeg" style="width: 800px; height: 460px;">
                        <div class="team-text">
                            <h5 class="mb-0">RICKY JORDY SINTI TUANAMA</h5>
                            <p class="text-primary">Gerente de Desarrollo Social</p>
                            <div class="team-social d-flex">
                                <a class="btn btn-square rounded-circle me-2" href=""><i class="fab fa-facebook-f"></i></a>
                                <a class="btn btn-square rounded-circle me-2" href=""><i class="fab fa-twitter"></i></a>
                                <a class="btn btn-square rounded-circle me-2" href=""><i class="fab fa-instagram"></i></a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="team-item rounded">
                        <img class="img-fluid" src="img/go.jpeg" style="width: 800px; height: 460px;">
                        <div class="team-text">
                            <h5 class="mb-0">CARLOS SAAVEDRA SALAS</h5>
                            <p class="text-primary">Gerente de Obras</p>
                            <div class="team-social d-flex">
                                <a class="btn btn-square rounded-circle me-2" href=""><i class="fab fa-facebook-f"></i></a>
                                <a class="btn btn-square rounded-circle me-2" href=""><i class="fab fa-twitter"></i></a>
                                <a class="btn btn-square rounded-circle me-2" href=""><i class="fab fa-instagram"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="team-item rounded">
                        <img class="img-fluid" src="img/au.jpg" style="width: 800px; height: 460px;">
                        <div class="team-text">
                            <h5 class="mb-0">AUGUSTO FRANCISCO RUBIO MAZA</h5>
                            <p class="text-primary">Gerente de Seguiridad Ciudadana, Tránsito y Fiscalización</p>
                            <div class="team-social d-flex">
                                <a class="btn btn-square rounded-circle me-2" href=""><i class="fab fa-facebook-f"></i></a>
                                <a class="btn btn-square rounded-circle me-2" href=""><i class="fab fa-twitter"></i></a>
                                <a class="btn btn-square rounded-circle me-2" href=""><i class="fab fa-instagram"></i></a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="team-item rounded">
                        <img class="img-fluid" src="img/sf.jpg" style="width: 800px; height: 460px;">
                        <div class="team-text">
                            <h5 class="mb-0">ELVIS JUNIOR BORBOR BARDALEZ</h5>
                            <p class="text-primary">Gerente de Desarrollo Económico y Ambiente</p>
                            <div class="team-social d-flex">
                                <a class="btn btn-square rounded-circle me-2" href=""><i class="fab fa-facebook-f"></i></a>
                                <a class="btn btn-square rounded-circle me-2" href=""><i class="fab fa-twitter"></i></a>
                                <a class="btn btn-square rounded-circle me-2" href=""><i class="fab fa-instagram"></i></a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="team-item rounded">
                        <img class="img-fluid" src="img/sf.jpg" style="width: 800px; height: 460px;">
                        <div class="team-text">
                            <h5 class="mb-0">MANUELITA DEL PILAR FASANANDO MENDOZA</h5>
                            <p class="text-primary">Gerente de Administración Tributaria</p>
                            <div class="team-social d-flex">
                                <a class="btn btn-square rounded-circle me-2" href=""><i class="fab fa-facebook-f"></i></a>
                                <a class="btn btn-square rounded-circle me-2" href=""><i class="fab fa-twitter"></i></a>
                                <a class="btn btn-square rounded-circle me-2" href=""><i class="fab fa-instagram"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="team-item rounded">
                        <img class="img-fluid" src="img/sf.jpg" style="width: 800px; height: 460px;">
                        <div class="team-text">
                            <h5 class="mb-0">SUSAN INDIRA FASANANDO LAM</h5>
                            <p class="text-primary">Gerente de Desarrollo Urbano y Catastro</p>
                            <div class="team-social d-flex">
                                <a class="btn btn-square rounded-circle me-2" href=""><i class="fab fa-facebook-f"></i></a>
                                <a class="btn btn-square rounded-circle me-2" href=""><i class="fab fa-twitter"></i></a>
                                <a class="btn btn-square rounded-circle me-2" href=""><i class="fab fa-instagram"></i></a>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- Team End -->


    <!-- Footer Start -->
    <div id="contacto" class="container-fluid bg-dark text-light footer mt-5 py-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container py-5">
            <div class="row g-5">
                <div class="col-lg-3 col-md-6">
                    <h4 class="text-white mb-4">Nuestra Oficina</h4>
                    <a href="https://goo.gl/maps/GVM98msBzqWUBqaK6"><p class="mb-2"><i class="fa fa-map-marker-alt me-3"></i></a>Jr. Yurimaguas No. 340</p><br>
                    <p class="mb-2"><i class="fa fa-phone-alt me-3"></i>+51 000 000 000</p>
                    <p class="mb-2"><i class="fa fa-envelope me-3"></i>nuestramuni@gmail.com</p>
                    <div class="d-flex pt-2">
                        <a class="btn btn-square btn-outline-light rounded-circle me-2" href=""><i class="fab fa-twitter"></i></a>
                        <a class="btn btn-square btn-outline-light rounded-circle me-2" href="https://www.facebook.com/MunicipalidadDistritalDeLaBandaDeShilcayo"><i class="fab fa-facebook-f"></i></a>
                        <a class="btn btn-square btn-outline-light rounded-circle me-2" href=""><i class="fab fa-youtube"></i></a>
                        <a class="btn btn-square btn-outline-light rounded-circle me-2" href=""><i class="fab fa-linkedin-in"></i></a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h4 class="text-white mb-4">Programas</h4>
                    <a class="btn btn-link" href="https://www.mdbsh.gob.pe/gdps/sisfoh.php">SISFOH</a>
                    <a class="btn btn-link" href="https://www.mdbsh.gob.pe/gdps/registro-civil.php">REGISTRO CIVIL</a>
                    <a class="btn btn-link" href="https://www.mdbsh.gob.pe/gdps/vaso-leche.php">VASO DE LECHE</a>
                    <a class="btn btn-link" href="https://www.mdbsh.gob.pe/gdps/instancia.php">INSTANCIA</a>
                    <a class="btn btn-link" href="https://www.mdbsh.gob.pe/gdps/ciam.php">CIAM</a>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h4 class="text-white mb-4">Quienes Somos</h4>
                    <a class="btn btn-link" href="https://www.mdbsh.gob.pe/visionmision.php">Mision y Vision</a>
                    <a class="btn btn-link" href="https://www.mdbsh.gob.pe/alcalde.php">El Alcalde</a>
                    <a class="btn btn-link" href="https://www.mdbsh.gob.pe/organigrama.php">Organigrama</a>

                </div>
                <div class="col-lg-3 col-md-6">
                    <h4 class="text-white mb-4">Nuestro Sitio Web</h4>
                    <p>Puedes visitar nuestra pagina web donde encontras la informcaión de nuestra organización</p>
                    <div class="position-relative w-100">
                        <a href="https://www.mdbsh.gob.pe/index.php" type="button" class="btn btn-primary py-2 position-absolute top-0 end-0 mt-2 me-2">Sitio Web</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer End -->


    <!-- Copyright Start -->
    <div class="container-fluid copyright py-4">
        <div class="container">
            <div class="row">
                <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                    &copy; <a class="border-bottom" href="#">nuestro site web</a>, gracias por visitarnos.
                </div>
                <div class="col-md-6 text-center text-md-end">
                    <!--/*** This template is free as long as you keep the footer author’s credit link/attribution link/backlink. If you'd like to use the template without the footer author’s credit link/attribution link/backlink, you can purchase the Credit Removal License from "https://htmlcodex.com/credit-removal". Thank you for your support. ***/-->
                    Designada por <a class="border-bottom" href="https://www.facebook.com/upeu.campustarapoto">UPeU</a> Hecho por <a href="">Estudiantes</a>
                </div>
            </div>
        </div>
    </div>
    <!-- Copyright End -->

    


    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square rounded-circle back-to-top"><i class="bi bi-arrow-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/wow/wow.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="lib/counterup/counterup.min.js"></script>
    <script src="lib/parallax/parallax.min.js"></script>
    <script src="lib/isotope/isotope.pkgd.min.js"></script>
    <script src="lib/lightbox/js/lightbox.min.js"></script>
    <!-- Template Javascript -->
    <script src="js/main.js"></script>
</body>

</html>