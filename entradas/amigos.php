<?php session_start();

if (!isset($_SESSION["id"])) {
        header("Location: ../registro/index.php");
        die();        
    }

?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
    <meta name="viewport" content="i">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="shorcut icon" href="../index/ico.ico">
  <title><?php echo $_GET['friends']; ?> - infofast</title>
    <link href="../css/bootstrap.min.css" rel="stylesheet">
        <link href="../css/font.css" rel="stylesheet">
        <link href="../css/estilos.css" rel="stylesheet">
  <?php  

  if ($_GET['friends'] == "askew") {
    ?>
    <style>
      body{
         -ms-transform: rotate(0.5deg); /* IE 9 */
    -webkit-transform: rotate(0.5deg); /* Safari */
    transform: rotate(0.5deg);
      }
    </style>
    <?php 
  }

  ?>
</head>
<body>
  <?php 
    $_SESSION["busqueda"] = $_GET['friends'];
     include '../plantillas/inicio1.php';
  ?>
  <br><br><br>
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

$sql = "SELECT * FROM usuarios WHERE nombre LIKE '%".$_GET['friends']."%' || apellido LIKE '%".$_GET['friends']."%' && nombre != $_SESSION[nombre] && apellido != $_SESSION[apellido]";
$resultado = mysqli_query($conn, $sql);

if (mysqli_num_rows($resultado) > 0) {
    echo "<div class=\"jumbotron blue\">";
    while($row = mysqli_fetch_assoc($resultado)) {
        echo "<a style=\"padding: 10px;width: 100% !important;color: white;background: ". $row["color"] .";\" href=\"perfil.php?cod=".$row['id']."\" class=\"btn\"><div class=\"row\"><div class=\"col-1\"><img src=\"".$row['foto_perfil']."\" style=\"border-radius: 10000px;width: 100px;height: 100px;\"></div><div class=\"col-11\"><br><h3 style=\"margin: none;\">".$row['nombre']." ".$row['apellido']."</h3></div></div></a><br><br>";
    }
    echo "</div>";
} else {
    echo "<br><br><br><br><br><center><h3><i class='fas fa-search'></i></h3><h4 class=\"container\">No hay usuarios con el nombre '$_GET[friends]'</h4></center>";
}

mysqli_close($conn);
?>

<div name="bar_configuration" class="bar_configuration asdf" id="bar_configuration" style="
    margin-left: 75%;
    padding: 0;
    width: 25%;
    background-color: blue !important;
 /* Make it stick, even on scroll */
    overflow: auto;
  "></div>
<?php  
	include '../plantillas/final.php';
?>