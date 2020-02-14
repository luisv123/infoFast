<?php
/**/
	if(isset($_POST["next"])) {
		if(!empty($_POST["fname"]) && !empty($_POST["lname"]) && !empty($_POST["mail"]) && !empty($_POST["infofast"]) && filter_var($_POST["mail"], FILTER_VALIDATE_EMAIL)) {
			include '2.php';
			die();
		}
	} 

	include '../plantillas/inicio.php';
	
?>
<br><br><br>
	<div class="container">

		<div class="row">
			<div class="col-md-3 col-sm-1"></div>
			<div class="col-md-6 col-sm-10">
				<center>
					<div class="jumbotron blue">
						<h1>Registro</h1>
						<br>
						<form action="../registro/index.php" method="POST">
							<input type="text" name="fname" class="form-control ex" placeholder="Escribe tu nombre" value="<?php echo $_POST["fname"]; ?>"><br>

							<input type="text" name="lname" class="form-control ex" placeholder="Escribe tu apellido" value="<?php echo $_POST["lname"]; ?>"><br>

							<input type="text" name="mail" class="form-control ex" placeholder="Escribe tu E-mail" value="<?php echo $_POST["mail"]; ?>"><br>

							<input type="text" name="infofast" class="form-control ex" placeholder="Escribe tu nueva Cuenta" value="<?php echo $_POST["infofast"]; ?>"><br>

							<button class="btn button" style="width: 100%;padding-top: 15px;padding-bottom: 15px;color: #636b6f;" type="submit" name="next">
								Siguiente <b><i class="fas fa-arrow-right"></i></b>
							</button>
						</form>
				<?php

					if (isset($_POST["next"])) {
						if (empty($_POST["fname"]) || empty($_POST["lname"]) || empty($_POST["mail"]) || empty($_POST["infofast"])) {
							echo '
								<br><div class="alert alert-danger" style="background: red;color: white;height:52px;border:none;"><b>Hay campos vacios</b></div>
							';
						}
					elseif (!filter_var($_POST["mail"], FILTER_VALIDATE_EMAIL)) {
						
							echo '
								<br><div class="alert alert-danger" style="background: red;color: white;height:52px;border:none;"><b>El E-mail es invalido</b></div>
							';
						}
				}
				?>
				</div>
			</center>
		</div>
		<div class="col-md-3 col-sm-1"></div>
	</div>
	</div>
<?php
	include '../plantillas/final.php';
?>