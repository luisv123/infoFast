<?php	
	$servername = "127.0.0.1";
$username = "palili";
$password = "palili";
$db = "blog";
// Create connection
$conn = mysqli_connect($servername, $username, $password, $db);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "SELECT * FROM usuarios";
$resultado = mysqli_query($conn, $sql);

if (mysqli_num_rows($resultado) > 0) {
    while($row = mysqli_fetch_assoc($resultado)) {
        echo "<a style=\"padding: 10px;width: 100% !important;color: white;background: ". $row["color"] .";\" href=\"perfil.php?cod=".$row['id']."\" class=\"btn\"><div class=\"row\"><div class=\"col-1\"><img src=\"".$row['foto_perfil']."\" style=\"border-radius: 10000px;width: 100px;height: 100px;\"></div><div class=\"col-11\"><br><h3 style=\"margin: none;\">".$row['nombre']." ".$row['apellido']."</h3></div></div></a><br><br>";
    }
} else {
    echo "<br><div class=\"jumbotron blue\"><h4 class=\"container\">No hay usuarios con el nombre $_GET[friends].</h4></div>";
}

mysqli_close($conn);
?>