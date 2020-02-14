<?php 

	session_start();
	if (!isset($_POST["nexts"])) {

		$_SESSION['fname'] = $_POST['fname'];

		$_SESSION['lname'] = $_POST['lname'];

		$_SESSION['mail'] = $_POST['mail'];

		$_SESSION['infofast'] = $_POST['infofast'];

		}
if (isset($_POST["nexts"])) {
	if (true) {
		include '3.php';
		die();
	}
}

?>
<div id="demo">
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
	<link rel="shorcut icon" href="../index/ico.ico">
	<title>infoFast</title>
	<link href="../css/bootstrap.min.css" rel="stylesheet">
        <link href="../css/font.css" rel="stylesheet">
        <link href="../css/estilos.css" rel="stylesheet">
<script>
            function is(){
            
            var vars = new XMLHttpRequest();
            vars.onreadystatechange = function(){
                if(vars.readyState == 4 && vars.status == 200){
                    document.getElementById('demo').innerHTML = vars.responseText;
                }
            }
        
        vars.open("GET", "../plantillas/is.php", true);
        vars.send() 

        }
        function reg(){
            
            var vars = new XMLHttpRequest();
            vars.onreadystatechange = function(){
                if(vars.readyState == 4 && vars.status == 200){
                    document.getElementById('demo').innerHTML = vars.responseText;
                }
            }
        
        vars.open("GET", "../plantillas/reg.php", true);
        vars.send() 

        }
        function us(){
            
            var vars = new XMLHttpRequest();
            vars.onreadystatechange = function(){
                if(vars.readyState == 4 && vars.status == 200){
                    document.getElementById('demo').innerHTML = vars.responseText;
                }
            }
        
        vars.open("GET", "../plantillas/us.php", true);
        vars.send() 

        }
        function ini(){
            
            var vars = new XMLHttpRequest();
            vars.onreadystatechange = function(){
                if(vars.readyState == 4 && vars.status == 200){
                    document.getElementById('demo').innerHTML = vars.responseText;
                }
            }
        
        vars.open("GET", "../plantillas/ini.php", true);
        vars.send() 

        }
        </script> 
</head>
<body>
	 <nav class="navbar navbar-expand-md bg fixed-top">
  
  <!-- Toggler/collapsibe Button -->
  <button style="border: 1px solid #b0aafe;margin: 5px" class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
    <i class="fas fa-bars" style="color:white;"></i>
  </button>

  <!-- Navbar links -->
  <div class="collapse navbar-collapse" id="collapsibleNavbar">
    <ul class="navbar-nav">
      <li class="nav-item asdf">
          <button data-toggle="modal" data-target="#ini" class="btn nav-item" style="border-radius: 1000px;"><i class="fas fa-home"></i></button>
      </li>
      <li class="nav-item asdf">
        <button data-toggle="modal" data-target="#us" class="btn nav-item" style="border-radius: 1000px;"><i class="fas fa-users"></i> Usuarios</button>
      </li>
      <li class="float-right asdfs fixed-right" style="position: fixed;
    right: 0;margin-right: 134px;">
          <button data-toggle="modal" data-target="#in" class="btn nav-item" style="border-radius: 1000px;"><i class="fas fa-sign-in-alt"></i> Iniciar Sesion</button>
      </li>
      <li class="float-right asdfs fixed-right" style="position: fixed;
    right: 0;">
          <button data-toggle="modal" data-target="#reg" class="btn nav-item" style="border-radius: 1000px;"><i class="fas fa-plus"></i> Registrarse</button>
      </li>
    </ul>
  </div>
</nav> 


<div class="modal fade" id="ini">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal body -->
      <div class="modal-body" style="text-align: center;font-size: 25px">
        Quiere cancelar el registro?
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <div class="row col-12">
            <div class="col-6">
                    <button onclick="ini()" type="button" class="btn btn-primary" style="width: 100%">Aceptar</button>
            </div>
            <div class="col-6">
                <button type="button" class="btn btn-danger" style="width: 100%" data-dismiss="modal">Cancelar</button>
            </div>
        </div>
      </div>

    </div>
  </div>
</div>


<div class="modal fade" id="us">
  <div class="modal-dialog">
    <div class="modal-content">

      <div class="modal-body" style="text-align: center;font-size: 25px">
        Quiere cancelar el registro?
      </div>

      <div class="modal-footer">
        <div class="row col-12">
            <div class="col-6">
                    <button onclick="us()" type="button" class="btn btn-primary" style="width: 100%">Aceptar</button>
            </div>
            <div class="col-6">
                <button type="button" class="btn btn-danger" style="width: 100%" data-dismiss="modal">Cancelar</button>
            </div>
        </div>
      </div>

    </div>
  </div>
</div>



<div class="modal fade" id="in">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal body -->
      <div class="modal-body" style="text-align: center;font-size: 25px">
        Quiere cancelar el registro?
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <div class="row col-12">
            <div class="col-6">
                    <button onclick="in()" type="button" class="btn btn-primary" style="width: 100%">Aceptar</button>
            </div>
            <div class="col-6">
                <button type="button" class="btn btn-danger" style="width: 100%" data-dismiss="modal">Cancelar</button>
            </div>
        </div>
      </div>

    </div>
  </div>
</div>



<div class="modal fade" id="reg">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal body -->
      <div class="modal-body" style="text-align: center;font-size: 25px">
        Quiere cancelar el registro?
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <div class="row col-12">
            <div class="col-6">
                    <button onclick="reg()" type="button" class="btn btn-primary" style="width: 100%">Aceptar</button>
            </div>
            <div class="col-6">
                <button type="button" class="btn btn-danger" style="width: 100%" data-dismiss="modal">Cancelar</button>
            </div>
        </div>
      </div>

    </div>
  </div>
</div>
<!--

								INICIO


-->
<br><br><br>
	<div class="container">
		<center>
			<div class="row">
			<div class="col-md-3 col-sm-0"></div>	
			<div class="col-md-6 col-sm-12">
			<div class="jumbotron blue">
				<h1>Registro</h1>
				<br>
				<form action="2.php" method="post">

					<div class="custom-file" style="width: 100% !important;">
    <input value="<?php echo $_POST["color"]; ?>" type="color" id="color" name="color" style="display: none;">
    <label for="color" class="btn form-control ex hover-btn" style="border: 1px solid #ced4da;width: 100%;margin-top: 0px;background-color: white;color: #79757d;margin-bottom: 1px;"><span style="padding-bottom: 5px !important;float: left;">Selecciona un color</span><br></label>
  </div><br><br><br>

					<div class="row">
						<div class="col-4">
							<select value="<?php echo $_POST["dn"]; ?>" class="form-control custom-select-lg" title="Dia nacimiento" name="dn">
								<option value="">Dia N.</option>
								<?php 
									for ($i=0; $i < 32; $i++) { 
										echo "<option value=\"".$i."\">".$i."</option>";
									}
								 ?>
							</select>
						</div>
						<div class="col-4">
							<select value="<?php echo $_POST["mn"]; ?>" class="form-control custom-select-lg" title="Mes nacimiento" name="mn">
								<option value="">Mes N.</option>
								<option value="Enero">Enero</option>
								<option value="Febrero">Febrero</option>
								<option value="Marzo">Marzo</option>
								<option value="Abril">Abril</option>
								<option value="Mayo">Mayo</option>
								<option value="Junio">Junio</option>
								<option value="Julio">Julio</option>
								<option value="Agosto">Agosto</option>
								<option value="Septiembre">Septiembre</option>
								<option value="Octubre">Octubre</option>
								<option value="Nobiembre">Nobiembre</option>
								<option value="Diciembre">Diciembre</option>
							</select>
						</div>
						<div class="col-4">
							<select value="<?php echo $_POST["an"]; ?>" class="form-control custom-select-lg" title="Año nacimiento" name="an">
								<option value="">Año N.</option>
								<?php 
									for ($i=1960; $i < 2020; $i++) { 
										echo "<option value=\"".$i."\">".$i."</option>";
									}
								 ?>
							</select>
						</div>
					</div>
<br>
					<div class="row">
						<div class="col-6">
							<input type="password" class="form-control ex" placeholder="Contraseña" name="pw1">
						</div>
						<div class="col-6">
							<input type="password" class="form-control ex" placeholder="Confirmar contraseña" name="pw2">
						</div>
					</div><br>
					 <div class="btn-group" style="width: 100%;max-height: 62px !important;" id="sexo">
						  <button onclick="h()" type="button" class="btn btn-primary" style="padding-top: 10px;padding-bottom: 10px;max-width: 50% !important;"><p><i class="fas fa-male fa-2x"></i></p></button>
						  <button onclick="m()" type="button" class="btn btn-danger" style="padding-top: 10<px;padding-bottom: 10px;max-width: 50% !important;"><p><i class="fas fa-female fa-2x"></i><p></button>
						</div> <br><br>
					<button class="button btn" name="nexts" style="width: 100%;padding-top: 15px;padding-bottom: 15px" type="submit">
						Registrar <b><i class="fas fa-plus"></i></b>
					</button>
				</form>
				<?php

					if (isset($_POST["nexts"])) {
						if (empty($_POST["dn"]) || empty($_POST["mn"]) || empty($_POST["an"]) || empty($_POST["pw1"]) || empty($_POST["pw2"]) || empty($_POST["pais"])) {
							echo '
								<br><div class="alert alert-danger" style="background: red;color: white;height:52px;border:none;"><b>Hay campos vacios</b></div>
							';
						}elseif ($_POST["color"] == "#ffffff") {
							echo '
								<br><div class="alert alert-danger" style="background: red;color: white;height:52px;border:none;"><b>Selecciona un color</b></div>
							';
						}elseif (!isset($_POST["sexo"])) {
							echo '
								<br><div class="alert alert-danger" style="background: red;color: white;height:52px;border:none;"><b>Selecciona tu genero</b></div>
							';
						}elseif ($_POST["pw1"] !== $_POST["pw2"]) {
							echo '
								<br><div class="alert alert-danger" style="background: red;color: white;height:52px;border:none;"><b>las contraseñas no coinciden</b></div>
							';
						}
					
					}
				?>
					</div>
					
				</center>
				</div>
				<div class="col-md-3 col-sm-0"></div>	
			</div>
		</div>
<?php
	
	include '../plantillas/final.php';
?>
</div>