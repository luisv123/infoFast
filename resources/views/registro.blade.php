@extends('layout')

@section('title', 'infoFast - Registrarse')
@section('contenido')

<br><br><br><br><br>
<div class="container">
    <div class="aparecido">
        <div class="row">
            <div class="col-sm-1 col-md-3"></div>
            <div class="col-sm-10 col-md-6">
                <div class="panel" style="box-shadow: 0 6px 20px 0 rgba(0, 0, 0, 0.1);border-radius: 20px;">
                    <br><br>
                    <center>
                        <span style="font-size: 250%;">Registro</span><br>
                    </center>
                    <br>
                    <form action="{{ url('/registro') }}" method="post">
                        @csrf

                        Nombre
                        <input type="text" name="nombre" class="input">
                        <br>

                        Apellido
                        <input type="text" name="apellido" class="input">
                        <br>

                        Edad
                        <input type="number" name="edad" class="input" min="15" max="125"><br>

                        Usuario
                        <input type="text" name="usuario" class="input">
                        <br>

                        Tipo de Cuenta
                        <select name="modo" class="input" style="background: white;">
                            <option value="privada">Privada</option>
                            <option value="publica">Publica</option>
                        </select>
                        <br>
                        <div class="row">
                            <div class="col-10">
                                Contraseña
                                <input type="password" id="pw" name="pw" class="input">
                                <br>
                            </div>
                            <div class="col-2" id="btn">
                                <br>
                                <button class="btn" type="button" onclick="show()"><i class="fal fa-eye"></i></button>
                            </div>
                        </div>
                        <br>
                        <button class="btn btn-form" type="submit" style="width: 100%;">Registrar</button>
                        @if(null !== session('error'))

                            <br><br><button class="form-control btn btn-danger" disabled="">
                            {{ session('error') }}
                        </button>

                        @endif
                        <br><br><br>
                        <span>Ya tienes cuenta?, <a href="{{ url('/logeo') }}">Inicia Sesion</a>!</span>
                        <br><br>
                    </form>
                </div>
            </div>
            <div class="col-sm-1 col-md-3"></div>
        </div>
        <br><br><br>
    </div>
</div>

<script>
    check.checked = false;
    function show() {
        document.getElementById('pw').type = 'text';
        document.getElementById('btn').innerHTML = '<button class="btn" type="button" onclick="hide()"><i class="fal fa-eye-slash"></i></button>';
    }
    function hide() {
        document.getElementById('pw').type = 'password';
        document.getElementById('btn').innerHTML = '<button class="btn" type="button" onclick="show()"><i class="fal fa-eye"></i></button>';
    }
    
</script>
@endsection