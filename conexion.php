<?php
	//conexion con la base de datos y el servidor
	$link = mysql_connect("localhost","root","") or die("<h2>No se encuentra el servidor</h2>");
	$db = mysql_select_db("mdbs",$link) or die("<h2>Error de Conexion</h2>");

	//obtenemos los valores del formulario
	$nombres = $_POST['nombres'];
	$apellidos = $_POST['apellidos'];
	$correo = $_POST['correo'];
    $celular = $_POST['celular'];
	$password = $_POST['password'];
    $rpass = $_POST['password'];

	//Obtiene la longitus de un string
	$req = (strlen($nombres)*strlen($apellidos)*strlen($correo)*strlen($celular)*strlen($password)*strlen($rpass)) or die("No se han llenado todos los campos");

	//se confirma la contraseÃ±a
	if ($password != $rpass) {
		die('Las contraseñas no coinciden, Verifique <br /> <a href="index.php">Volver</a>');
	}

	//se encripta la contraseÃ±a
	$ContraUser = md5($password);

	//ingresamos la informacion a la base de datos
	mysql_query("INSERT INTO datos VALUES('','$nombres','$apellidos','$correo','$celular','$ContraUser')",$link) or die("<h2>Error Guardando los datos</h2>");
	echo'
		<script>
			alert("Registro Exitoso");
			location.href="index.php";
		</script>
	'
?>