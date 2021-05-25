@extends('layout2')

@section('title', 'infoFast - Configuracion')
@section('contenido')

<br><br><br><br><br>
<div class="container">
    <div class="aparecido">
        <div class="row">
            <div class="col-sm-1 col-md-3"></div>
            <div class="col-sm-10 col-md-9">
                <div class="panel" style="box-shadow: 0 6px 20px 0 rgba(0, 0, 0, 0.1);border-radius: 20px;">
                    <br>
                        <span style="font-size: 250%;"><i class="fal fa-cog"></i> Configuración</span>
                        <br><br>
                        <hr>
                        <br><br>
                        <div style="font-size: 150%;">
                            <div class="row">
                                <div class="col-6">
                                    Tema de color
                                </div>
                                <div class="col-6" style="">
                                    <!--
                                    <div class="custom-control custom-switch">
                                        <input type="checkbox" class="custom-control-input" id="switch1">
                                        <label class="custom-control-label" for="switch1"></label>
                                    </div>  
                                    -->
                                    <select name="color" class="form-control col-6" style="float: right ;">
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
                    <br>
                </div>
            </div>
        </div>
        <br><br><br>
    </div>
</div>

@endsection