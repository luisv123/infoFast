<?php

	session_start();




$servername = "127.0.0.1";
$username = "palili";
$password = "palili";
$dbname = "blog";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$nombres = $_SESSION['nombre'];
$pw = $_SESSION['nombre'];
$pws = hash('sha512', $pw);
echo $sql = "SELECT * FROM usuarios WHERE infofast='$nombres' && password='$pws'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
}

	
	echo $_SESSION['id'] = $row['id'];

	echo $_SESSION['nombre'] = $row['nombre'];

	echo $_SESSION['apellido'] = $row['apellido'];

	echo $_SESSION['email'] = $row['email'];

	echo $_SESSION['password'] = $row['password'];

	echo $_SESSION['fecha_registro'] = $row['fecha_registro'];

	echo $_SESSION['hora_registro'] = $row['hora_registro'];

	echo $_SESSION['infofast'] = $row['infofast'];

	echo $_SESSION['color'] = $row['color'];

	echo $_SESSION['sexo'] = $row['sexo'];

	echo $_SESSION['dia_nacimiento'] = $row['dia_nacimiento'];

	echo $_SESSION['mes_nacimiento'] = $row['mes_nacimiento'];

	echo $_SESSION['ano_nacimiento'] = $row['ano_nacimiento'];

	echo $_SESSION['foto_perfil'] = $row['foto_perfil'];

	header('Location: ../entradas/perfil.php?cod=' . $row["id"]);
$conn->close();
?> 