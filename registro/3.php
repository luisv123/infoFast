	<?php

		
	session_start();

	$servername = "127.0.0.1";

	$username = "palili";

	$password = "palili";

	$dbname = "blog";

	$nombre = $_SESSION["fname"];

	$apellido = $_SESSION["lname"];

	$mail = $_SESSION["mail"];

	$infofast = $_SESSION["infofast"];

	$color = $_POST["color"];

	$dn = $_POST["dn"];

	$mn = $_POST["mn"];

	$an = $_POST["an"];

	$contrasena = hash('sha512', $_POST['pw1']);

	$sexo = $_POST["sexo"];

	$sexo = $_POST["sexo"];

	if ($sexo == 'm') {
		$foto_perfil = '../img/sin_hombre.png';
	}elseif ($sexo == 'f') {
		$foto_perfil = '../img/sin_mujer.png';
	}else {
		$foto_perfil = '../img/sin foto de perfil.jpg';
	}

	$hora_registro = date("h:i");

	$fecha_registro = date("d/m/y");


	$conn = new mysqli($servername, $username, $password, $dbname);

	if ($conn->connect_error) {
	    die("Connection failed: " . $conn->connect_error);

	}

	$sql = "INSERT INTO usuarios(
	nombre,
	apellido,
	mail,
	password,
	infofast,
	color,
	dn,
	mn,
	an,
	sexo,
	foto_perfil,
	fecha_registro,
	hora_registro) VALUES (
	'$nombre',
	'$apellido',
	'$mail',
	'$contrasena',
	'$infofast',
	'$color',
	$dn,
	'$mn',
	$an,
	'$sexo',
	'$foto_perfil',
	'$fecha_registro',
	'$hora_registro'
	)";


	if ($conn->query($sql) === TRUE) {
	   $_SESSION['pw'] = $contrasena;

	   $_SESSION['nombre'] = $infofast;

	   header('Location: ../entradas/index.php');

	} else {
	    echo "Error: " . $sql . "<br>" . $conn->error;

	}

	$conn->close();

?>