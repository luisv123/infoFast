
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="icon" href="/static/logo3.png">

    <title id="title">@yield('title')</title>

    <link rel="stylesheet" href="/static/css/bootstrap.min.css">
    @if($_SESSION['color'] == 'claro')
    <link rel="stylesheet" href="/static/css/estilos.css">
    @endif
    @if($_SESSION['color'] == 'oscuro')
    <link rel="stylesheet" href="/static/css/estilos_dark.css">
    @endif

    <script src="/static/js/all.min.js"></script>
    
</head>
<body>
    
    <div class="fixed-top nav-left">
        <br><br><br><br>
        <div class="aparecido">
            <form action="{{ url('/perfil/') }}/{{ $_SESSION['id'] }}" method="POST">
                @csrf
                @method("GET")
                <button class="btn bg-degraded btn-form" style="color: white;width: 100%;text-align: left;padding: 15px;">
                    <i class="fal fa-user-circle" style="font-size: 150%;"></i>
                    <span style="font-size: 100%;margin-left: 10px;float: right;">{{ strtoupper($_SESSION['nombre_completo']) }}</span>
                </button><br><br>
            </form>

            <form action="/guardados" method="POST">
                @csrf
                @method("GET")
                <button class="btn bg-degraded btn-form" style="color: white;width: 100%;text-align: left;padding: 15px;">
                    <i class="fal fa-bookmark" style="font-size: 150%;"></i>
                    <span style="font-size: 100%;margin-left: 10px;float: right;">GUARDADOS</span>
                </button><br><br>
            </form>

            <button class="btn bg-degraded btn-form" style="color: white;width: 100%;text-align: left;padding: 15px;">
            <i class="fal fa-user-friends" style="font-size: 150%;"></i>
                <span style="font-size: 100%;margin-left: 10px;float: right;">SEGUIDORES</span>
            </button><br><br>
            <form action="{{ url('/salir') }}" method="POST">
                @csrf
                <button class="btn bg-degraded btn-form" style="color: white;width: 100%;text-align: left;padding: 15px;">
                    <i class="fal fa-sign-out fa-flip-horizontal" style="font-size: 150%;"></i>
                    <span style="font-size: 100%;margin-left: 10px;float: right;">SALIR</span>
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
                <button style="color: white;" class="nav-link btn link-navbar" data-toggle="modal" data-target="#cpublicacion">CREAR PUBLICACION <i class="fal fa-plus"></i></button>
            </li>
            <li class="nav-item">
                <button style="color: white;" class="nav-link btn link-navbar" data-toggle="collapse" data-target="#notificaciones">
                    <i class="fal fa-bell" style="font-size: 150%;"></i>
                    <span class="noti-plus">9+</span>
                </button>
            </li>
            <li class="nav-item" id="btn_info_show">
                <button data-toggle="collapse" data-target="#panel-info" style="color: white;" class="nav-link btn link-navbar"><img src="/foto/{{ $_SESSION['foto'] }}" alt="perfil" style="border-radius: 999px;max-width: 25px;"></button>
            </li>

            <div class="col-sm-11 col-md-3 justify-content-end" style="position: absolute;margin-top: 350px !important;float: right !important;">
                <div class="panel collapse" id="panel-info">
                    <center>
                        <img src="/foto/{{ $_SESSION['foto'] }}" alt="perfil" style="border-radius: 999px;width: 25%;border: 1px solid rgba(0,0,0,0.125);"><br><br>
                        <span style="font-size: 150%;" class="color">{{ $_SESSION['nombre_completo'] }}</span><br>
                    </center>
                    <div class="row">
                        <div class="col-4">
                            <form action="{{ url('/configuracion') }}" method="POST">
                                @method('GET')
                                <button class="btn btn-form">
                                    <i class="fal fa-cog fa-spin"></i>
                                </button>
                            </form>
                        </div>
                        <div class="col-4">
                            <form  action="{{ url('/perfil/') }}/{{ $_SESSION['id'] }}" method="POST">
                                @csrf
                                @method('GET')
                                <button class="btn btn-form">
                                    <i class="fal fa-user"></i>
                                </button>
                            </form>
                        </div>
                        <div class="col-4">
                            <form action="{{ url('/salir') }}" method="POST">
                                @csrf
                                <button class="btn btn-form">
                                    <i class="fal fa-sign-out"></i>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-sm-11 col-md-3 justify-content-end" style="position: absolute;margin-top: 350px !important;float: right !important;margin-right: 70px;">
                <div class="panel collapse" id="notificaciones" style="box-shadow: 0 6px 20px 0 rgba(0, 0, 0, 0.1);border-radius: 20px 5px 20px 20px;">
                    <span style="font-size: 175%;">Notificaciones</span><br>
                    <hr><br>
                    <div style="min-height: 150px;max-height: 150px;overflow-y: auto;">
                        @for( $i = 0 ; $i < 25 ; $i++ )
                        <div style="border-radius: 15px;border: 1px solid gray;padding: 15px;">
                            Hola
                        </div><br>
                        @endfor
                    </div>
                </div>
            </div>

        </div>
        
    </nav>
    
    <div class="modal fade" id="cpublicacion">
        <div class="modal-dialog modal-dialog-centered modal-xm">
            <div class="modal-content" id="changemodal" style="border-radius: 20px;">
                <form action="{{ url('publicaciones/crear/') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-header">
                        <span class="modal-title" style="font-size: 150%;">Crear Publicacion</span>
                        <button type="button" class="btn" data-dismiss="modal"><i class="fal fa-times"></i></button>
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
        var btn = document.getElementById('btn_publi_c');
        btn.disabled = true;
        btn.style = "opacity: 50%";
        btn.className = "btn btn-form";
        btn.title = "No puedes publicar algo por que el campo de texto esta vacio y no hay multimedia subida";

        function changed() {
            var text = document.getElementById('text_publi_c');
            var multi = document.getElementById('cargar_img');
            var label = document.getElementById('label_img');
            var btn = document.getElementById('btn_publi_c');
            if (text.value == "" && multi.value == "") {
                btn.disabled = true;
                btn.style = "opacity: 50%";
                btn.className = "btn btn-form";
                btn.title = "No puedes publicar algo por que el campo de texto esta vacio y no hay multimedia subida";
            }else {

                btn.disabled = false;
                btn.style = "opacity: 100%;width: 100%;";
                btn.className = "btn btn-form";
                btn.title = "";
            }
            if(multi.value == "") {
                label.style="color: #212529;"
            }else {
                label.style="color: #2684f0;"
            }
        }
        function changed2() {
            alert("Hola");
        }
        setTimeout(function() {
            document.getElementById('mensaje').innerHTML = '';
        },5000)
    </script>
    <script src="/static/js/jquery.min.js"></script>
    <script src="/static/js/bootstrap.min.js"></script>
    <script src="/static/js/popper.min.js"></script>
</body>
</html>

