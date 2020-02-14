<?php
session_start();
	if (isset($_POST["enviar"])) {
		$servernames = "127.0.0.1";
		$usernames = "palili";
		$passwords = "palili";
		$dbs = "blog";

		$conns = mysqli_connect($servernames, $usernames, $passwords, $dbs);

		if (!$conns) {
		    die("Connection failed: " . mysqli_connect_error());
		}
		$_SESSION['pw'] = hash('sha512', $_POST['clave']);
		$_SESSION['nombre'] = $_POST['nombre'];
		
		$pws = hash('sha512', $_POST['clave']);
		$nombres = $_POST['nombre'];
		$sqls = "SELECT * FROM usuarios WHERE infofast = '$nombres' && password = '$pws'";
		$resultados = mysqli_query($conns, $sqls);

		if (mysqli_num_rows($resultados) > 0) {
			
		    include '1.php';

		    die();
		} else {
		  
		}

		mysqli_close($conns);
	}
	session_destroy();

	include '../plantillas/inicio.php';
?>
<br><br><br>
<div class="container">
	
	<div class="row">
		<div class="col-md-3 col-sm-1"></div>
		<div class="col-md-6 col-sm-10">
		<center>
		<div class="jumbotron blue">
			<h1>Iniciar Sesion</h1>
			<br>
			<form method="POST" action="../iniciar_sesion/index.php">
				<input type="text" name="nombre" class="form-control ex" placeholder="Usuario"><br>
				<input type="password" name="clave" class="form-control ex" placeholder="Contraseña"><br>
				<button type="submit" name="enviar" class="button btn" style="width: 100%;padding-top: 15px;padding-bottom: 15px">Iniciar <i class="fas fa-sign-in-alt"></i></button>
			</form>
			<?php 
				if (isset($_POST["enviar"])) {
					if (empty($_POST["nombre"]) || empty($_POST["clave"])) {
						echo '
				<br>
				<div class="alert alert-danger" style="background:#ff3737;color:white;border:none">
					<b>Hay campos vacios</b>
				</div>
							';
							include '../plantillas/final.php';
							die();
					}
					$servername = "127.0.0.1";
$username = "palili";
$password = "palili";
$db = "blog";

$conn = mysqli_connect($servername, $username, $password, $db);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
$pw = hash('sha512', $_POST['clave']);
$nombre = $_POST['nombre'];
$sql = "SELECT * FROM usuarios WHERE infofast = '$nombre' && password = '$pw'";
$resultado = mysqli_query($conn, $sql);

if (mysqli_num_rows($resultado) > 0) {
    
} else {
    echo '
				<br>
				<div class="alert alert-danger" style="background:#ff3737;color:white;border:none">
					<b>Usuario o Contraseña incorrecto</b>
				</div>
							';
}

mysqli_close($conn);
				}
			 ?>
			 </center>
		</div>

	</div>
	<div class="col-md-3 col-sm-1"></div>
</div>
</div>
<?php
	include '../plantillas/final.php';
?>