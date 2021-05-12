
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
    
    <div class="navbar-expand-md fixed-top nav-left col-sm-1 col-md-3" style="box-shadow: 0 6px 20px 0 rgba(0, 0, 0, 0.1);">
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


            
        </div>
    </div>
    <div class="fixed-bottom col-sm-1 col-md-3 aparecido-b-t">
        <form action="{{ url('/salir') }}" method="POST">
            @csrf
            <button class="btn bg-degraded btn-form" style="color: white;width: 100%;margin-top:  45vh;text-align: left;padding-left: 20px;">
                <i class="fal fa-sign-out-alt fa-flip-horizontal" style="font-size: 125%;"></i>
                <span style="font-size: 100%;margin-bottom: 100px !important;margin-left: 10px;width: 50% !important;">SALIR</span>
            </button><br><br>
        </form>
    </div>

    <nav class="navbar navbar-expand-md bg-degraded navbar-dark navbar-xg fixed-top nav" style="border-bottom: 2px solid white;">

        <div id="btn_despl navbar-toggler">
        <!--
                Aqui ira el estilo de la navbar cuando se vea atravez de un telèfono movil
        -->
        </div>

        <div class="collapse navbar-collapse" id="collapsibleNavbar">
            <ul class="navbar-nav" style="padding: 0px !important;width: 100%;padding-right: 0px">
                <li class="nav-item">
                    <a class="nav-link btn link-navbar"><img src="/static/logo2.png" style="max-width: 25px;" alt="Logo"></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link btn link-navbar" href="{{ url('/publicaciones') }}">Inicio</a>
                </li>
                <li class="nav-item" style="margin-right: 20px;">
                    <form action="{{ url('/busqueda/') }}" method="POST">
                        @csrf
                        <input type="search" name="busqueda" class="form-control input_busqueda" placeholder="Buscar ..." style="border-radius: 999px;">
                    </form>
                </li>
                <li class="nav-item">
                    <a class="nav-link btn link-navbar"><i class="fal fa-bell" style="font-size: 150%;"></i></a>
                </li>
            </ul>
        </div>
    </nav>
    

@yield('contenido')
    <script src="/static/js/jquery.min.js"></script>
    <script src="/static/js/bootstrap.min.js"></script>
    <script src="/static/js/popper.min.js"></script>
</body>
</html>

