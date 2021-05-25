@extends('layout')

@section('title', 'infoFast - Inicio')
@section('contenido')
<style>
    body {
        background: linear-gradient(to right, #4141ff, #9f41ff);
    }
    
</style>
<div style="background: #ededf2;">
<br><br><br><br><br>
    <div class="aparecido-left-right">
        <div class="container">
            <div class="row">
                <div class="col-md-5 col-sm-12">
                    <span style="font-size: 270%;">Bienvenido a infoFast</span><br>
                    <span style="font-size: 150%;">Comparte ideas y opiniones con gente de todo el mundo</span><br><br><br>
                    <div class="row">
                        <div class="col-6">
                            <a href="{{ url('logeo/') }}" class="btn btn-form weight" style="width: 100%;text-decoration: none;">
                            Usar infofast</a>
                        </div>
                    </div>
                    <br><br>
                </div>
                <div class="col-md-4 col-sm-0"></div>
                <div class="col-md-3 col-sm-12">
                    <center>
                        <img src="/static/logo.png" style="max-width: 50%;" alt="infoFast" style="margin-left: 50%;">
                    </center>
                </div>
            </div>
        </div>
        <br><br>
    </div>
</div>

<div class="skew_ini"><br><br><br><br></div>
<div class="container">
    <br><br><br><br><br><br><br><br><br>
    <div class="row" style="color: #636b6f;">
        <div class="col-md-4 col-sm-12 aparecido-b-t">
            <div class="panel">
                <span style="font-size: 175%;">Blog o personal?</span><br><br>
                <p>Puedes elegir entre crear una cuenta personal en la que solo las personas que tu elijas ven tu contenido, o, tener una cuenta tipo blog en la que cualquier persona pueda ver tu contenido</p>
            </div><br>
        </div>
        <div class="col-md-4 col-sm-12 aparecido-b-t">
            <div class="panel">
                <span style="font-size: 175%;">Variedad multimedia</span><br><br>
                <p>Puedes publicar combinaciones de texto con videos, imagenes, gifs, incluso audio! Tambien puedes publicar multimedia sin necesidad de contenido, o ,texto sin archivos multimedia</p>
            </div><br>
        </div>
        <div class="col-md-4 col-sm-12 aparecido-b-t">
            <div class="panel">
                <span style="font-size: 175%;">Borra y edita</span><br><br>
                <p>Puedes crear tantas publicaciones como quieras o borrar y editar tus publicaciones, cuentas y comentarios cuando quieras. Unque cuidado: Una ves que borres algo no podras desacerlo nunca</p>
            </div><br>
        </div>
    </div>
</div>
<br><br><br><br><br><br>
<div style="background: rgba(255,255,255,0.75);padding: 15px;color: #4141ff;">
    <center>
        © 2021 infoFast
    </center>
</div>
@endsection