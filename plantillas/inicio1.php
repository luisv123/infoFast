
<?php
    $foto = $_SESSION["foto_perfil"];
    $nombre = $_SESSION["nombre"];
    $apellido = $_SESSION["apellido"];
?>
    <script src="../js/all.min.js"></script>
<script>
    function infouser() {
        document.getElementById('infouser').innerHTML = 
        '<div class="jumbotron infouser fixed-top"><div class="row"><div class="col-3><button class="btn" style="border-radius: 10000px;padding: 0px;"><img src="<?php echo $foto; ?>" style="width:50px;border-radius: 1000px"></button></div><div class="col-9"><h4><?php echo $nombre . " " . $apellido; ?></h4><?php echo $_SESSION["infofast"]; ?><br><br><br><a href="perfil.php?cod=<?php echo $_SESSION["id"]; ?>" class="btn" style="width: 100%;border: 1px solid black;border-radius: 10000px;"><i class="fas fa-user"></i> Perfil</a></div></div></div>';
        document.getElementById('boton_user').innerHTML = 
            '<button onclick="qinfouser()" class="nav-item btn" style="border-radius: 10000px;"><img src="<?php echo $_SESSION["foto_perfil"]; ?>" style="width:30px;border-radius: 1000px"></button>';
    }
    function qinfouser() {
        document.getElementById('infouser').innerHTML = 
        '';
        document.getElementById('boton_user').innerHTML = 
            '<button onclick="infouser()" class="nav-item btn" style="border-radius: 10000px;"><img src="<?php echo $_SESSION["foto_perfil"]; ?>" style="width:30px;border-radius: 1000px"></button>';
    }
    function ba() {
        document.getElementById('nav').innerHTML = 
            '<div class="input-group mb-3 input-group-lg fixed-top" style="margin: 0px;padding: 0px;box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);"><input type="search" class="form-control" style="background: white;border: 0px solid white;" placeholder="Buscar Amigos . . ." autofocus><div class="input-group-append"><button style="background:white;border: 0px solid white;" onclick="qba()"> <i class="fas fa-arrow-left"></i></button></div></div>';
    }
    function qba() {
  document.getElementById('buscarf').innerHTML =
  '<nav class="navbar navbar-expand-md bg fixed-top" style="background: <?php echo $_SESSION["color"]; ?>;border: none;"><!-- Toggler/collapsibe Button --><div class="row"><div class="col-2"><button class="navbar-toggler" type="button" data-toggle="collapse" style="border: none;"><i class="fas fa-sign-out-alt"></i></button></div><div class="col-2"><button onclick="buscarf()" class="navbar-toggler" type="button" data-toggle="collapse" style="border: none;"><i class="fas fa-search"></i></button></div><div class="col-2"><button class="navbar-toggler" type="button"  data-toggle="collapse" style="border: none;"><i class="fas fa-link"></i></button></div><div class="col-2"><button class="navbar-toggler" type="button"  data-toggle="collapse" style="border: none;"><i class="fas fa-users"></i></button></div><div class="col-2"><button class="navbar-toggler" type="button"  data-toggle="collapse" style="border: none;"><i class="fas fa-bell"></i></button></div></div><!-- Navbar links --><div class="collapse navbar-collapse" id="collapsibleNavbar"><ul class="navbar-nav"><li class="nav-item asdf"><form action="../iniciar_sesion/index.php"><button type="submit" class="nav-item"><i class="fas fa-sign-in-alt"></i></button></form></li><form action="amigos.php" method="post"><input type="search" class="buscar form-control" placeholder="Buscar Amigos..." name="friends"></form><li class="nav-item asdf" style="position: fixed;right: 0;margin-right: 216px;"><form action="agregar.php"><button class="nav-item"><i class="fas fa-link"></i></button></form></li><li class="nav-item asdf" style="position: fixed;right: 0;margin-right: 163px;"><button class="nav-item"><i class="fas fa-users"></i></button></li><li class="float-right asdfs fixed-right" style="position: fixed;right: 116px;"><button class="nav-item"><i class="fas fa-bell"></i></button></li></ul></div></nav> ';
//#ced4da
}
</script>
<div id="nav">
    

<nav class="navbar navbar-expand-md bg fixed-top" style="background: <?php echo $_SESSION["color"]; ?>;border: none;">
  

      <button style="color: white !important;" class="navbar-toggler" type="button" data-toggle="modal" data-target="#cerrar">
        <i class="fas fa-sign-out-alt"></i>
      </button>
      <form action="1.php">
          <button class="navbar-toggler" style="color: white !important;">
            <i class="fas fa-globe-americas"></i>
          </button>
      </form>
      <button class="navbar-toggler" style="color: white !important;">
        <i class="fas fa-envelope"></i>
      </button>
      <button class="navbar-toggler" style="color: white !important;">
        <i class="fas fa-bell"></i>
      </button>
      <button class="navbar-toggler" onclick="ba()">
        <i class="fas fa-search"></i>
      </button>
      <button class="navbar-toggler">
        <img src="<?php echo $_SESSION["foto_perfil"]; ?>" style="width:30px;border-radius: 1000px">
      </button>
  <div class="collapse navbar-collapse" id="collapsibleNavbar">
    <ul class="navbar-nav">
      <li class="nav-item asdf" style="margin-right: 70px;">
        	<button type="button" class="btn nav-item" style="color: white !important;" style="border-radius: 10000px;" data-toggle="modal" data-target="#cerrar"><i class="fas fa-sign-out-alt"></i></button>
      </li>
      <li class="nav-item asdf">
        <form action="1.php">
            <button style="color: white !important;" type="submit" class="btn nav-item" style="border-radius: 10000px;"><i class="fas fa-globe-americas"></i></button>
        </form>
      </li>
      <li class="nav-item asdf">
        	<button style="color: white !important;" type="submit" class="btn nav-item" style="border-radius: 10000px;"><i class="fas fa-envelope"></i></button>
      </li>
      <li class="nav-item asdf">
        <span class="no-leido"></span>
        	<button style="color: white !important;" class="btn nav-item" style="border-radius: 10000px;"><i class="fas fa-bell"></i></button>
      </li>
      <li class="nav-item asdf" style="float: center !important;margin-left: 50px">
      <form class="form-inline" action="amigos.php">
          <div class="input-group mb-3">
  <input type="search" value="<?php echo $_SESSION["busqueda"]; ?>" class="form-control  form-control-lg" name="friends" placeholder="Buscar Amigos . . .">
  <div class="input-group-append">
    <button class="btn btn-success" type="submit" style="height: 48px"><i class="fas fa-search"></i></button>
  </div>
        </form>
      </li>
      <li class="float-right asdfs fixed-right" id="boton_user" style="position: fixed;
    right: 0;">
          <button onclick="infouser()" class="nav-item btn" style="border-radius: 10000px;"><img src="<?php echo $_SESSION["foto_perfil"]; ?>" style="width:30px;border-radius: 1000px"></button>
      </li>
    </ul>
  </div>
</nav> 
</div>

<div class="modal fade" id="cerrar">
  <div class="modal-dialog">
    <div class="modal-content">

      <div class="modal-header">
        <h4 class="modal-title">Cerrar Sesion</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <div class="modal-body">
        Esta seguro de cerrar la sesion <?php echo $_SESSION['nombre'] . " " . $_SESSION['apellido']; ?>
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <div class="row col-12">
            <div class="col-6">
                <form action="../entradas/cerrar.php">
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
<div id="infouser">
    
</div>