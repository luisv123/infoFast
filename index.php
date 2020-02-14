
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>infoFast</title>

        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/font.css" rel="stylesheet">
        <link href="css/estilos.css" rel="stylesheet">

         <script>
            function is(){
            
            var vars = new XMLHttpRequest();
            vars.onreadystatechange = function(){
                if(vars.readyState == 4 && vars.status == 200){
                    document.getElementById('demo').innerHTML = vars.responseText;
                }
            }
        
        vars.open("GET", "plantillas/is.php", true);
        vars.send() 

        }
        function reg(){
            
            var vars = new XMLHttpRequest();
            vars.onreadystatechange = function(){
                if(vars.readyState == 4 && vars.status == 200){
                    document.getElementById('demo').innerHTML = vars.responseText;
                }
            }
        
        vars.open("GET", "plantillas/reg.php", true);
        vars.send() 

        }
        function us(){
            
            var vars = new XMLHttpRequest();
            vars.onreadystatechange = function(){
                if(vars.readyState == 4 && vars.status == 200){
                    document.getElementById('demo').innerHTML = vars.responseText;
                }
            }
        
        vars.open("GET", "plantillas/us.php", true);
        vars.send() 

        }
        function ini(){
            
            var vars = new XMLHttpRequest();
            vars.onreadystatechange = function(){
                if(vars.readyState == 4 && vars.status == 200){
                    document.getElementById('demo').innerHTML = vars.responseText;
                }
            }
        
        vars.open("GET", "plantillas/ini.php", true);
        vars.send() 

        }
        </script>   
    </head>
    <body>
<!--


 _        __       _____         _   
(_)_ __  / _| ___ |  ___|_ _ ___| |_ 
| | '_ \| |_ / _ \| |_ / _` / __| __|
| | | | |  _| (_) |  _| (_| \__ \ |_ 
|_|_| |_|_|  \___/|_|  \__,_|___/\__|
x

-->
        <div id="demo">
        <div class="flex-center position-ref full-height">
            
            <div class="content">
                <div class="title m-b-md">
                    infoFast
                </div>

                <div class="links">
                   
                    <button class="btn" onclick="us()" style="margin-bottom: 30px;"><i class="fas fa-users"></i> Usuarios</button>
                    <button class="btn" onclick="is()" style="margin-bottom: 30px;"><i class="fas fa-sign-in-alt"></i> Iniciar Sesion</button>
                    <button class="btn" onclick="reg()" style="margin-bottom: 30px;"><i class="fas fa-plus"></i> Registrarse</button>
                </div>
            </div>
        </div>
       
<?php 

    include 'plantillas/final.php';

?>
</div>
