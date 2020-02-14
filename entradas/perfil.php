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
  <title>infofast</title>
  <link rel="stylesheet" href="../css/bootstrap.min.css">
  <link rel="stylesheet" href="../css/font.css">
  <link rel="stylesheet" href="../css/estilos.css">
  
</head>
<body>
<?php
		include '../plantillas/inicio1.php';

	if (isset($_GET['cod'])) {
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
$sql = "SELECT * FROM usuarios WHERE id = $_GET[cod]";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    
} else {
    echo '<h1 style="text-align:center;float:center;">El servidor no supo que hacer</h1>';
		require '../plantillas/final.php';
		die();
}

	
	}else {
		echo '<h1 style="text-align:center;float:center;">El servidor no supo que hacer</h1>';
		require '../plantillas/final.php';
		die();
	}
	if ($row['sexo'] == 'm') {
		$sexo = 'masculino';
	}elseif ($row['sexo'] == 'f') {
		$sexo = 'femenino';
		
	}
?>
<br><br><br><br>
<div class="container">
			<center>
	<div class="jumbotron" style="background: <?php echo $row['color']; ?>;color:white;max-height: 155px !important;">

<?php
			if ($row['id'] !== $_SESSION['id']) {
				echo '<button class="btn" style="border: 1px solid white;color: white;float: right;">Seguir</button>';
			}


			?>
			<h3><?php echo $row['nombre']; ?> <?php echo $row['apellido'];
			?>
			</h3>
			<?php if ($row["id"] == $_SESSION["id"]): ?>
				<button class="btn" style="padding: none;border-radius: 100000px;">
			<?php endif ?>
			
			<img src="<?php echo $row['foto_perfil']; ?>" class="icon" style="width: 100px;height: 100px;border: 5px solid <?php echo $row["color"]; ?>;">
			<?php if ($row["id"] == $_SESSION["id"]): ?>
				</button>
			<?php endif ?>
			
		
	</div>	
	</center>
	<br><br>	
	<center>
    <div class="row" style="width: 100%;">

	<div class="col-md-3 col-sm-1"></div>
    <div class="col-md-6 col-sm-10">
   
    	<div class="jumbotron" style="background: <?php echo $row['color']; ?>;color:white;">
    		<p>Edad <strong><?php
    			for ($i=$row['an']; $i < 2020; $i++) { 
    				$u++;
    			}
    			echo $u;
    		?></strong>
    		 años
    	</p><br>
    	<p>E-mail <strong><?php echo $row['mail']; ?></strong></p><br>
    	<p>infoFast <strong><?php echo $row['infofast']; ?></strong></p><br>
    	<p>Genero <strong><?php
    	 if ($row['sexo'] == 'm') {
    	  	echo "masculino";
    	  }elseif ($row['sexo'] == 'f') {
    	  	echo "femenino";
    	  }else{
    	  	echo "otro";
    	  }
    	?></strong></p><br>
    	</div>

	</div>
    <div class="col-md-3 col-sm-1"></div>
    
</div>
</center>
</div>

<?php
	include '../plantillas/final.php';
	$conn->close();

?>