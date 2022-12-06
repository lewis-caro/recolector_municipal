<!--INSERTACION DE DATOS AL DISEÑO ANTERIOR-->

<?php

    /*include 'config/conexion.php';


    //Validar que exista un boton registrar
   if(isset($_POST['registrar'])) {

        $mensaje = "";
        $nombre = $conect->real_escape_string($_POST['nombres']);
        $apellidos = $conect->real_escape_string($_POST['apellidos']);
        $correo = $conect->real_escape_string($_POST['correo']);
        $celular = $conect->real_escape_string($_POST['celular']);
        $usuario = $conect->real_escape_string($_POST['usu']);
        $passw = $conect->real_escape_string($_POST['password']);

        //Validar para que el regsitro no exista
        $validar = "SELECT * FROM registro WHERE usuario = '$usuario' ";
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

            $insertar = "INSERT INTO registro (nombres, apellidos, correo, celular, usuario, password) VALUES ('$nombre', '$apellidos', '$correo', '$celular', '$usuario', '$passw')";

            $guardar = $conect->query($insertar);

            if($guardar > 0){
                $mensaje.="<h3 class='text-success'> Tu regsitro ah sido exitoso</h3>";
            }
            else{
                $mensaje.="<h3 class='text-danger'> Tu regsitro no se ha sido exitoso</h3>";
            }
        }

   }*/

?>

<!--INSETACION DE DATOS EN LA DATA ACTUALIZADA ENVIANDO DATOS A DOS TABLAS-->
<?php

    include 'config/conexion.php';


    //Validar que exista un boton registrar
   if(isset($_POST['registrar'])) {

        $mensaje = "";
        $nombre = $conect->real_escape_string($_POST['nombres']);
        $apellidos = $conect->real_escape_string($_POST['apellidos']);
        $correo = $conect->real_escape_string($_POST['correo']);
        $celular = $conect->real_escape_string($_POST['celular']);
        $usuario = $conect->real_escape_string($_POST['usu']);
        $passw = $conect->real_escape_string($_POST['password']);

        //Validar para que el regsitro no exista
        $validar = "SELECT * FROM usuario WHERE login = '$usuario' ";
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

            $insertar = "INSERT INTO usuario (idusuario, idtipo_persona, idzonas, nombres, apellidos, 
                                    dni, login, password, edad, direccion, telefono, email, img_perfil, estado) 
                        VALUES ('$nombre', '$apellidos', '$correo', '$celular', '$usuario', '$passw')";

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