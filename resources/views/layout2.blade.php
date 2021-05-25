
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="icon" href="/static/logo.png">

    <title id="title">@yield('title')</title>

    <link rel="stylesheet" href="/static/css/bootstrap.min.css">
    <link rel="stylesheet" href="/static/css/estilos.css">

    <script src="/static/js/all.min.js"></script>
</head>
<body>
    
    <div class="fixed-top nav-left navbar-left" style="box-shadow: 0 6px 20px 0 rgba(0, 0, 0, 0.1);width: 20%;float: right !important;margin-right: 75%;padding: 10px;">
        <br><br><br><br>
        <div class="aparecido-b-t">
            <form action="{{ url('/perfil/') }}/{{ $_SESSION['id'] }}" method="POST">
                @csrf
                @method("GET")
                <button class="btn bg-degraded btn-form" style="color: white;width: 100%;text-align: left;padding-left: 20px;">
                    <i class="fal fa-user-circle" style="font-size: 150%;"></i>
                    <span style="font-size: 100%;margin-bottom: 100px !important;margin-left: 10px;">{{ strtoupper($_SESSION['nombre_completo']) }}</span>
                </button><br><br>
            </form>

            <button class="btn bg-degraded btn-form" style="color: white;width: 100%;text-align: left;padding-left: 20px;">
                <i class="fal fa-bookmark" style="font-size: 150%;"></i>
                <span style="font-size: 100%;margin-bottom: 100px !important;margin-left: 10px;width: 50% !important;">GUARDADOS</span>
            </button><br><br>

            <button class="btn bg-degraded btn-form" style="color: white;width: 100%;text-align: left;padding-left: 20px;">
            <i class="fal fa-user-friends" style="font-size: 150%;"></i>
                <span style="font-size: 100%;margin-bottom: 100px !important;margin-left: 10px;">AMIGOS</span>
            </button><br><br>
            <form action="{{ url('/salir') }}" method="POST">
                @csrf
                @method("GET")
                <button class="btn bg-degraded btn-form" style="color: white;width: 100%;text-align: left;padding-left: 20px;">
                    <i class="fal fa-sign-out fa-flip-horizontal" style="font-size: 150%;"></i>
                    <span style="font-size: 100%;margin-bottom: 100px !important;margin-left: 10px;">SALIR</span>
                </button><br><br>
            </form>
        </div>
    </div>

    <nav class="navbar navbar-expand-md bg-degraded navbar-dark navbar-xg fixed-top nav" style="border-bottom: 1px solid white;">

        <div id="btn_despl navbar-toggler">
            <!--
                    Aqui ira el estilo de la navbar cuando se vea atravez de un telèfono movil
            -->
            </div>

        <a class="navbar-brand"><img src="/static/logo2.png" style="max-width: 25px;" alt="Logo"></a>

        <div class="collapse navbar-collapse" id="collapsibleNavbar">
            <ul class="navbar-nav" style="padding: 0px !important;width: 100%;padding-right: 0px">
                <li class="nav-item">
                    <a class="nav-link btn link-navbar" href="{{ url('/publicaciones') }}">Inicio</a>
                </li>
                <li class="nav-item" style="margin-right: 20px;">
                    <form action="{{ url('/busqueda/') }}" method="POST">
                        @csrf
                        <input type="search" name="busqueda" class="form-control input_busqueda" placeholder="Buscar ..." style="border-radius: 999px;">
                    </form>
                </li>
            </ul>
        </div>
        <div class="collapse navbar-collapse justify-content-end" id="collapsibleNavbar">
            <li class="nav-item">
                <button style="color: white;" class="nav-link btn link-navbar" data-toggle="modal" data-target="#cpublicacion"><i class="fal fa-plus" style="font-size: 150%;"></i></button>
            </li>
            <li class="nav-item">
                <button style="color: white;" class="nav-link btn link-navbar"><i class="fal fa-bell" style="font-size: 150%;"></i></button>
            </li>
            <li class="nav-item" id="btn_info_show">
                <button onclick="info_show()" style="color: white;" class="nav-link btn link-navbar"><img src="/foto/{{ $_SESSION['foto'] }}" alt="perfil" style="border-radius: 999px;max-width: 25px;"></button>
            </li>
        </div>
    </nav>
    <div id="panel-info" class="fixed-top" style="margin-top: 75px;float: right !important;display: none;">
        <div class="row" style="width: 100%;">
            <div class="col-sm-1 col-md-9"></div>
            <div class="col-sm-11 col-md-3">
                <div class="panel" style="box-shadow: 0 6px 20px 0 rgba(0, 0, 0, 0.1);border-radius: 20px 5px 20px 20px;">
                    <center>
                        <img src="/foto/{{ $_SESSION['foto'] }}" alt="perfil" style="border-radius: 999px;width: 25%;border: 1px solid rgba(0,0,0,0.125);"><br><br>
                        <span style="font-size: 150%;">{{ $_SESSION['nombre_completo'] }}</span><br>
                        <hr>
                    </center>
                    <form action="{{ url('/configuracion') }}" method="POST">
                        @method('GET')
                        <button class="btn bg-degraded" style="width: 100%;color: white;">
                            <i class="fal fa-cog fa-spin"></i> Configuracion    
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="cpublicacion">
        <div class="modal-dialog modal-dialog-centered modal-xm">
            <div class="modal-content" id="changemodal" style="border-radius: 20px;">
                <form action="{{ url('publicaciones/crear/') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-header">
                        <span class="modal-title" style="font-size: 150%;">Crear Publicacion</span>
                        <button type="button" class="btn close" data-dismiss="modal"><i class="fal fa-times"></i></button>
                    </div>
                    <div class="modal-body" style="padding: 0px;b">
                        <textarea name="contenido" class="form-control" placeholder="Escribe el contenido de tu publicacion" style="border: none;border-radius: 5px;min-height: 250px;max-height: 250px;background: transparent;" id="text_publi_c" oninput="changed()"></textarea>
                    </div>
                    <div class="modal-footer" style="padding: 0px;b">
                        <input type="file" onchange="changed()" id="cargar_img" name="multimedia" style="display: none;">
                        <label id="label_img" for="cargar_img" class="btn" type="button"><i class="fal fa-camera" id="icon_img"></i></label>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-form bg-degraded" id="btn_publi_c" style="width: 100%;">Agregar</button>
                    </div>
                </form>
          </div>
        </div>
    </div>

@yield('contenido')
    <script>
        function info_show() {
            document.getElementById('panel-info').style = 'margin-top: 75px;float: right !important;';
            document.getElementById('btn_info_show').innerHTML = '<button onclick="info_hide()" style="color: white;" class="nav-link btn link-navbar"><img src="/foto/{{ $_SESSION["foto"] }}" alt="perfil" style="border-radius: 999px;max-width: 25px;"></button>';
        }
        function info_hide() {
            document.getElementById('panel-info').style = 'margin-top: 75px;float: right !important;display: none;';
            document.getElementById('btn_info_show').innerHTML = '<button onclick="info_show()" style="color: white;" class="nav-link btn link-navbar"><img src="/foto/{{ $_SESSION["foto"] }}" alt="perfil" style="border-radius: 999px;max-width: 25px;"></button>';
        }
    </script>
    <script src="/static/js/jquery.min.js"></script>
    <script src="/static/js/bootstrap.min.js"></script>
    <script src="/static/js/popper.min.js"></script>
</body>
</html>

