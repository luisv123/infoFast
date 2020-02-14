<?php 

session_start();

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
  <link rel="stylesheet" href="../css/estilos.css">
  
</head>
<body>
<?php 
	
	include '../plantillas/inicio1.php';

	$servername = "127.0.0.1";

	$username = "palili";

	$password = "palili";

	$db = "blog";

	$conn = mysqli_connect($servername, $username, $password, $db);

	if (!$conn) {
	    die("Connection failed: " . mysqli_connect_error());

	}

	$sql = "SELECT * FROM post WHERE autor_id = $_SESSION[id] ORDER BY id DESC LIMIT 1";

	$resultado = mysqli_query($conn, $sql);


	if (mysqli_num_rows($resultado) > 0) {
	    $row = mysqli_fetch_assoc($resultado);
	} else {
	    echo "<br><div class=\"jumbotron blue\"><h4 class=\"container\">No hay usuarios con el nombre $_GET[friends].</h4></div>";
	    die();
	}

?>
<br><br><br><br>
<div class="container">
    <div class="row" id="row">

<div class="col-md-3 col-sm-1">
      
</div>
    <div class="col-md-6 col-sm-10 row">
   
        
    <div class="card" style="width: 100%">   

        <div class="card-header">
			<div class="row" style="padding: 10px;">
                <div class="col-2">
                	<a href="perfil.php?cod=<?php echo $_SESSION["id"];?>" class="btn" style="border-radius: 1000px;padding: none;">
                    	<img src="<?php echo $_SESSION["foto_perfil"]; ?>" alt="I M G" class="icon">
                    </a>
                </div>
                <div class="col-1"></div>
                <div class="col-8">
                    <h4><?php echo $_SESSION["nombre"].' '.$_SESSION["apellido"]; ?></h4>
                </div>
            </div>

        </div>

        <div class="card-body">
        <div style="padding: 10px;">
            <p><?php echo $row['contenido']; ?></p>
            <br>

            </div>
            </div>
            <div class="card-footer">   
            	<div class="row">
            		<div class="col-3">
            			<center>
	            			<button class="btn bf">
	            				<i class="fas fa-thumbs-up"></i> 0
	            			</button>
	            		</center>
            		</div>
            		<div class="col-3">
            			<center>
	            			<button class="btn bf">
	            				<i class="fas fa-thumbs-down"></i> 0
	            			</button>
	            		</center>
            		</div>
            		<div class="col-3">
            			<center>
	            			<button class="btn bf">
	            				<i class="fas fa-comment"></i> 0
	            			</button>
	            		</center>
            		</div>
            		<div class="col-3">
            			<center>
	            			<button class="btn bf">
	            				<i class="fas fa-share"></i> 0
	            			</button>
	            		</center>
            		</div>
            	</div>
			</div>
			</div>
			<br>
			<div class="row" style="width: 100%;">
				<div class="col-6">
					<form action="1.php">
						<button class="btn btn-success" style="width: 100%;">Aceptar</button>
					</form>
				</div>
				<div class="col-6">
					<button data-toggle="modal" data-target="#cancel" type="button" class="btn btn-danger" style="width: 100%;">Cancelar</button>
				</div>

			</div>
			<br><br>
    <div class="col-md-3 col-sm-1"></div>
    

</div>
<div class="modal fade" id="cancel">
  <div class="modal-dialog">
    <div class="modal-content">

      <div class="modal-header">
        <h4 class="modal-title">Orden exitosa</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <div class="modal-body">
        Publicacion borrada exitosamente!!!
      </div>

      <div class="modal-footer">
        <form action="1.php">
			<button class="btn btn-success">Aceptar</button>
		</form>
      </div>

    </div>
  </div>
</div>
<?php

	mysqli_close($conn);


	include '../plantillas/final.php';

?>