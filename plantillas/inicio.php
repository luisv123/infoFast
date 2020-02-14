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
          <button onclick="ini()" class="btn nav-item" style="border-radius: 1000px;"><i class="fas fa-home"></i></button>
      </li>
      <li class="nav-item asdf">
        <button onclick="us()" class="btn nav-item" style="border-radius: 1000px;"><i class="fas fa-users"></i> Usuarios</button>
      </li>
      <li class="float-right asdfs fixed-right" style="position: fixed;
    right: 0;margin-right: 134px;">
          <button onclick="is()" class="btn nav-item" style="border-radius: 1000px;"><i class="fas fa-sign-in-alt"></i> Iniciar Sesion</button>
      </li>
      <li class="float-right asdfs fixed-right" style="position: fixed;
    right: 0;">
          <button onclick="reg()" class="btn nav-item" style="border-radius: 1000px;"><i class="fas fa-plus"></i> Registrarse</button>
      </li>
    </ul>
  </div>
</nav> 

