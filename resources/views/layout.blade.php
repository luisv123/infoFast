<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="icon" href="/static/logo.png">

    <title>@yield('title')</title>

    <link rel="stylesheet" href="static/css/bootstrap.min.css">
    <link rel="stylesheet" href="static/css/estilos.css">

    <script src="static/js/all.min.js"></script>
</head>
<body>
    <nav class="navbar navbar-expand-md bg-degraded navbar-dark navbar-xg fixed-top nav" style="border-bottom: 2px solid white;">

        <div id="btn_despl navbar-toggler">
        <!--
                    Aqui ira el estilo de la navbar cuando se vea atravez de un telèfono movil
        -->
        </div>

        <a href="{{ url('/') }}" class="navbar-brand"><img src="/static/logo2.png" style="max-width: 25px;" alt="Logo"></a>

        <div class="collapse navbar-collapse justify-content-end" id="collapsibleNavbar">
            <ul class="navbar-nav">
                <li class="nav-item" style="">
                    <a href="{{ url('registro/') }}" class="nav-link btn link-navbar btn-navbar weight">Registrarse</a>
                </li>
                <li class="nav-item float-right">
                    <a href="{{ url('logeo/') }}" class="nav-link btn link-navbar btn-navbar weight">Iniciar Sesion</a>
                </li>
            </ul>
        </div>
    </nav>

@yield('contenido')
    <script src="static/js/jquery.min.js"></script>
    <script src="static/js/bootstrap.min.js"></script>
    <script src="static/js/popper.min.js"></script>
</body>
</html>

