@extends('layout')

@section('title', 'infoFast - Iniciar Sesion')
@section('contenido')

<br><br><br><br><br>
<div class="container">
    <div class="aparecido">
        <div class="row">
            <div class="col-sm-1 col-md-3"></div>
            <div class="col-sm-10 col-md-6">
                <div class="panel" style="box-shadow: 0 6px 20px 0 rgba(0, 0, 0, 0.1);border-radius: 20px;">
                    <center>
                        <br><br>
                        <span style="font-size: 250%;">Inicio de Sesion</span><br>
                        <br>
                    </center>
                    <form action="{{ url('/logeo') }}" method="post">
                        @csrf

                        Usuario
                        <input type="text" name="usuario" class="input">
                        <br>

                        <div class="row">
                            <div class="col-10">
                                Contraseña
                                <input type="password" id="pw" name="pw" class="input">
                            </div>
                            <div class="col-2" id="btn">
                                <br>
                                <button class="btn" type="button" onclick="show()"><i class="fal fa-eye"></i></button>
                            </div>
                        </div>
                        <button class="btn btn-form" style="width: 100%;" type="submit">Entrar</button>
                        @if(null !== session('error'))

                            <br><br><button class="form-control btn btn-danger" disabled="">
                            {{ session('error') }}
                        </button>

                        @endif

                        <br><br><br>
                        <span>No tienes cuenta?, <a href="{{ url('/registro') }}">Registrate</a>!</span>
                    </form>
                    <br><br>
                </div>
            </div>
            <div class="col-sm-1 col-md-3"></div>
        </div>
        <br><br><br>
    </div>
</div>

<script>
    function show() {
        document.getElementById('pw').type = 'text';
        document.getElementById('btn').innerHTML = '<button class="btn" type="button" onclick="hide()"><i class="fal fa-eye-slash"></i></button>';
    }
    function hide() {
        document.getElementById('pw').type = 'password';
        document.getElementById('btn').innerHTML = '<button class="btn" type="button" onclick="show()"><i class="fal fa-eye"></i></button>';
    }
    setTimeout(function() {
        document.getElementById('nombre').focus()
        //alert('Hola :D');
    },3750);
</script>
@endsection