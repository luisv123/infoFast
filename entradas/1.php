<?php
session_start();
if (!isset($_SESSION['id'])) {
        header("Location: ../registro/index.php");
        die();        
    }

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shorcut icon" href="../index/ico.ico">
    <title>infofast</title>
    <link href="../css/bootstrap.min.css" rel="stylesheet">
        <link href="../css/font.css" rel="stylesheet">
        <link href="../css/estilos.css" rel="stylesheet">
    <script type="text/javascript">
        function svideo() {
            document.getElementById('bif').innerHTML = 
            '<div class="jumbotron white" style="box-shadow: 0 2px 4px 0 rgba(0, 0, 0, 0.1), 0 3px 10px 0 rgba(0, 0, 0, 0.19) !important;border: none;padding: 0px !important;min-height: 200px;"><button class="btn" onclick="qa()" style="background: <?php echo $_SESSION["color"];?>;border-radius: 0px !important;width: 100%"><i class="fas fa-video"></i> Mis Videos</button><br><br><center>No hay Videos</center><><br><button class="btn" onclick="simagenes()" style="background: <?php echo $_SESSION["color"];?>;border-radius: 0px !important;width: 100%"><i class="fas fa-image"></i> Mis Imagenes</button><br><button class="btn" onclick="sgifs()" style="background: <?php echo $_SESSION["color"];?>;border-radius: 0px !important;width: 100%"><i class="fas fa-square fa-spin"></i> Mis Gifs</button></div>';
        }
        function qa() {
            document.getElementById('bif').innerHTML = 
            '<div class="jumbotron white" style="box-shadow: 0 2px 4px 0 rgba(0, 0, 0, 0.1), 0 3px 10px 0 rgba(0, 0, 0, 0.19) !important;border: none;padding: 0px !important;min-height: 200px;"><button class="btn" onclick="svideo()" style="background: <?php echo $_SESSION["color"];?>;border-radius: 0px !important;width: 100%"><i class="fas fa-video"></i> Mis Videos</button><br><button class="btn" onclick="simagenes()" style="background: <?php echo $_SESSION["color"];?>;border-radius: 0px !important;width: 100%"><i class="fas fa-image"></i> Mis Imagenes</button><br><button class="btn" onclick="sgifs()" style="background: <?php echo $_SESSION["color"];?>;border-radius: 0px !important;width: 100%"><i class="fas fa-square fa-spin"></i> Mis Gifs</button></div>';
        }
        function simagenes() {
            document.getElementById('bif').innerHTML = 
            '<div class="jumbotron white" style="box-shadow: 0 2px 4px 0 rgba(0, 0, 0, 0.1), 0 3px 10px 0 rgba(0, 0, 0, 0.19) !important;border: none;padding: 0px !important;min-height: 200px;"><button class="btn" onclick="svideo()" style="background: <?php echo $_SESSION["color"];?>;border-radius: 0px !important;width: 100%"><i class="fas fa-video"></i> Mis Videos</button><br><button class="btn" onclick="qa()" style="background: <?php echo $_SESSION["color"];?>;border-radius: 0px !important;width: 100%"><i class="fas fa-image"></i> Mis Imagenes</button><br><br><center>No hay Imagenes</center><br><button class="btn" onclick="sgifs()" style="background: <?php echo $_SESSION["color"];?>;border-radius: 0px !important;width: 100%"><i class="fas fa-square fa-spin"></i> Mis Gifs</button></div>';
        }
        function sgifs() {
            document.getElementById('bif').innerHTML = 
            '<div class="jumbotron white" style="box-shadow: 0 2px 4px 0 rgba(0, 0, 0, 0.1), 0 3px 10px 0 rgba(0, 0, 0, 0.19) !important;border: none;padding: 0px !important;min-height: 200px;"><button class="btn" onclick="svideo()" style="background: <?php echo $_SESSION["color"];?>;border-radius: 0px !important;width: 100%"><i class="fas fa-video"></i> Mis Videos</button><br><button class="btn" onclick="simagenes()" style="background: <?php echo $_SESSION["color"];?>;border-radius: 0px !important;width: 100%"><i class="fas fa-image"></i> Mis Imagenes</button><br><button class="btn" onclick="qa()" style="background: <?php echo $_SESSION["color"];?>;border-radius: 0px !important;width: 100%"><i class="fas fa-square fa-spin"></i> Mis Gifs</button><br><br><center>No hay Gifs</center></div>';
        }
        
    </script>
</head>
<body>
<?php 

    session_start();
    
    if (isset($_SESSION['nombre'])) {
        
  include '../plantillas/inicio1.php';
?>
<br><br><br><br>

<div class="modal fade" id="bd">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal body -->
      <div class="modal-body">
        <h1 style="text-align: center;">Feliz Cumpleaños</h1>
        Feliz cumpleaños <?php echo $_SESSION['nombre']; ?> <?php echo $_SESSION['apellido']; ?>, infoFast te desea un feliz cumpleaños
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-success" data-dismiss="modal">Aceptar</button>
      </div>

    </div>
  </div>
</div>
        

<div class="container">
    <div class="row" id="row">

<div class="col-md-3 col-sm-1" id="bif">
        <div class="jumbotron white" style="box-shadow: 0 2px 4px 0 rgba(0, 0, 0, 0.1), 0 3px 10px 0 rgba(0, 0, 0, 0.19) !important;border: none;padding: 0px !important;min-height: 200px;">
        <button class="btn" onclick="svideo()" style="background: <?php echo $_SESSION["color"];?>;border-radius: 0px !important;width: 100%"><i class="fas fa-video"></i> Mis Videos</button><br>
        <button class="btn" onclick="simagenes()" style="background: <?php echo $_SESSION["color"];?>;border-radius: 0px !important;width: 100%"><i class="fas fa-image"></i> Mis Imagenes</button><br>
        <button class="btn" onclick="sgifs()" style="background: <?php echo $_SESSION["color"];?>;border-radius: 0px !important;width: 100%"><i class="fas fa-square fa-spin"></i> Mis Gifs</button>
    </div>
</div>
    <div class="col-md-6 col-sm-10 row">
     <div class="jumbotron white" style="padding: 5px !important;">
            <button type="button" data-toggle="modal" data-target="#post" class="btn" style="background: <?php echo $_SESSION['color']; ?>;width: 100%;margin: none;">¿Que estas pensando <?php echo $_SESSION['nombre']; ?>?</button>
        </div>
        <div class="modal fade" id="post">
  <div class="modal-dialog">
    <div class="modal-content">

      <div class="modal-header">
        <h4 class="modal-title">Crear Publicacion</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <div class="modal-body">
        <div style="border: 1px solid #ced4da;border-radius: 4px;padding: 5px;">
             <form action="../entradas/agregar1.php" method="post">
            <textarea name="contenido" style="border: none;background: transparent;max-height: 93px;width: 100%;overflow: none;scroll-behavior: none" placeholder="Escribe tu publicacion" rows="3" autofocus></textarea>

            <!--
            <div class="row" style="margin: 5px;width: 100%;">
                <div class="col-2">
                    <button class="btn">
                        <b>N</b>
                    </button>
                </div>
                <div class="col-2">
                    <button class="btn">
                        <i>C</i>
                    </button>
                </div>
                <div class="col-2">
                    <button class="btn">
                        <span style="text-decoration: underline;">S</span>
                    </button>
                </div>
                <div class="col-2">
                    <button class="btn">
                        <span style="text-decoration: line-through;">K</span>
                    </button>
                </div>
                <div class="col-2">
                    <button class="btn">
                        <i class="fas fa-link"></i>
                    </button>
                </div>
                <div class="col-2">
                    <button class="btn">
                        <i class="fas fa-smile"></i>
                    </button>
                </div>
            </div>
            -->
        </div>

      </div>

     
      <div class="modal-footer">
        <div class="row col-12">
            <div class="col-6">
               
                    <button type="submit" class="btn btn-primary" style="width: 100%">Aceptar</button>
                </form>
            </div>
            <div class="col-6">
                <button type="button" class="btn btn-danger" style="width: 100%" data-dismiss="modal">Cancelar</button>
            </div>
        </div>
      </div>

    </div>
  </div>
</div>
                <br><br>
                <?php  

                    $servername = "127.0.0.1";

                $username = "palili";

                $password = "palili";

                $db = "blog";

                $conn = mysqli_connect($servername, $username, $password, $db);

                if (!$conn) {
                    die("Connection failed: " . mysqli_connect_error());

                }

                $sql = "SELECT * FROM post ORDER BY id DESC";

                $resultado = mysqli_query($conn, $sql);


                if (mysqli_num_rows($resultado) > 0) {
                    while ($row = mysqli_fetch_assoc($resultado)) {

                
                ?>
                <div id="<?php echo $row['id']; ?>"></div>
    <div class="card" style="width: 100%" id="<?php echo $row['id']; ?>">   

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
                            <a href="#<?php echo $row['id']; ?>?i=<?php echo $row['id']; ?>&amp;a=like" class="btn bf">
                                <i class="fas fa-thumbs-up"></i> 0
                            </a>
                        </center>
                    </div>
                    <div class="col-3">
                        <center>
                            <a href="#<?php echo $row['id']; ?>?i=<?php echo $row['id']; ?>&amp;a=dislike" class="btn bf">
                                <i class="fas fa-thumbs-down"></i> 0
                            </a>
                        </center>
                    </div>
                    <div class="col-3">
                        <center>
                            <a href="#<?php echo $row['id']; ?>?i=<?php echo $row['id']; ?>&amp;a=comment" class="btn bf">
                                <i class="fas fa-comment"></i> 0
                            </a>
                        </center>
                    </div>
                    <div class="col-3">
                        <center>
                            <a href="#<?php echo $row['id']; ?>?i=<?php echo $row['id']; ?>&amp;a=share" class="btn bf">
                                <i class="fas fa-share"></i> 0
                            </a>
                        </center>
                    </div>
                </div>
            </div>
            </div>
            <br><br>
            <script>
                setInterval(<?php echo $row['id']; ?>(), 1000);

                window.onload = function <?php echo $row['id']; ?>(){
            
            var vars = new XMLHttpRequest();
            vars.onreadystatechange = function(){
                if(vars.readyState == 4 && vars.status == 200){
                    document.getElementById('<?php echo $row['id']; ?>').innerHTML = vars.responseText;
                }
            }
        
        vars.open("GET", "1.2.php", true);
        vars.send() 

        }
            </script>
                <?php  

                }


                ?>
            
    <div class="col-md-3 col-sm-1"></div>
    
</div>
</div>

<?php
}


    $bd = $_SESSION['dn']."/".$_SESSION['id']

?>
    <?php
    }
    include '../plantillas/final.php';

?>