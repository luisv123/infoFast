<?php
	session_start();

	if (!isset($_SESSION["id"])) {
        header("Location: ../registro/index.php");
        die();        
    }


$contenido = nl2br($_POST["contenido"]);
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
/*
if ($_FILES['subir']['type'] == 'image/png' || $_FILES['subir']['type'] == 'image/jpg' || $_FILES['subir']['type'] == 'image/PNG' || $_FILES['subir']['type'] == 'image/JPG' || $_FILES['subir']['type'] == 'image/jpeg' || $_FILES['subir']['type'] == 'image/JPEG') {

	$_FILES['subir']['type'];


}
*/
	$sql = "INSERT INTO post (autor_id, contenido)
VALUES ('$_SESSION[id]', '$contenido')";



if ($conn->query($sql) === TRUE){
    header("Location: agregar.php");
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();

include '../plantillas/final.php';

?>