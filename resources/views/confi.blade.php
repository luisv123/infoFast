@extends('layout2')

@section('title', 'infoFast - Configuracion')
@section('contenido')

<br><br><br><br><br>
<div class="container">
    <div class="aparecido">
        <div class="row">
            <div class="col-sm-3 col-md-3"></div>
            <div class="col-sm-9 col-md-9">
                <div class="panel" style="box-shadow: 0 6px 20px 0 rgba(0, 0, 0, 0.1);border-radius: 20px;">
                    <br>
                        <form action="{{ url('configuracion/') }}" method="POST">
                            @csrf
                            <span style="font-size: 250%;"><i class="fal fa-cog"></i> Configuración</span>
                            <br><br>
                            <hr>
                            <br><br>
                            <!--
                            CAMBIAR DATOS PERSONALES
                            -->
                            <div style="font-size: 150%;">
                                <div class="row">
                                    <div class="col-6">
                                        Nombre
                                    </div>
                                    <div class="col-6">
                                        <input type="text" name="nombre" class="form-control col-6" style="float: right;" value="{{ $_SESSION['nombre'] }}">
                                    </div>
                                </div><br><br>
                                <div class="row">
                                    <div class="col-6">
                                        Apellido
                                    </div>
                                    <div class="col-6">
                                        <input type="text" name="apellido" class="form-control col-6" style="float: right;" value="{{ $_SESSION['apellido'] }}">
                                    </div>
                                </div><br><br>
                                <div class="row">
                                    <div class="col-6">
                                        E-mail
                                    </div>
                                    <div class="col-6">
                                        <input type="text" name="mail" class="form-control col-6" style="float: right;" value="">
                                    </div>
                                </div><br><br>
                                <div class="row">
                                    <div class="col-6">
                                        Usuario
                                    </div>
                                    <div class="col-6">
                                        <input type="text" name="usuario" class="form-control col-6" style="float: right;" value="{{ $_SESSION['usuario'] }}">
                                    </div>
                                </div><br><br>
                                <div class="row">
                                    <div class="col-sm-12 col-md-6">
                                        <center>
                                            <input type="file" name="foto" id="foto" style="display: none;">
                                            <label for="foto" class="form-control btn btn-form col-9 pointer-hover" title="Seleccione una imagen y la imagen seleccionada sera su foto de perfil (avatar)">Cambiar foto de perfil</label><br>
                                        </center>
                                    </div>
                                    <div class="col-sm-12 col-md-6">
                                        <center>
                                            <input type="file" name="fondo" id="fondo" style="display: none;">
                                            <label for="fondo" class="form-control btn btn-form col-9 pointer-hover" title="Seleccione una imagen y la imagen seleccionada sera su fondo de perfil">Cambiar fondo de perfil</label><br>
                                        </center>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <hr>
                            <br><br>
                            <div style="font-size: 150%;">
                                <div class="row">
                                    <div class="col-6">
                                        Tema de color
                                    </div>
                                    <div class="col-6" style="">
                                        <select name="color" class="custom-select col-6" style="float: right ;">
                                            <option selected="selected" value="claro">Claro</option>
                                            <option value="oscuro">Oscuro</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <br><br>
                            <hr>
                            <br><br>
                            <button class="btn btn-form" style="width: 25%;">Guardar</button>
                        </form>
                    <br>
                </div>
            </div>
        </div>
        <br><br><br>
    </div>
</div>

@endsection