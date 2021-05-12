@extends('layout2')

@section('title', 'infoFast - '.$datos[0]->nombre. " " .$datos[0]->apellido)
@section('contenido')

<div class="container">
    <br><br><br><br>
    <div class="row">
    	<div class="col-sm-2 col-md-3"></div>
    	<div class="col-sm-8 col-md-9 aparecido">
            @if(isset($datos[0]->id))
            <div>
        		<img src="/fondo/sin_fondo.png" alt="FONDO DE PERFIL" style="width: 100%;max-height: 825px;border-radius: 10px;">
        		<img src="/foto/sin_foto.png" alt="FOTO_PERFIL" style="border-radius: 999px;width: 18%;margin-top: -10%;margin-left: 5%;border: 1.5px solid rgba(0,0,0,0.25);">
                <button class="btn" style="padding: 5px;background: white;border: 1px solid rgba(0,0,0,0.25);border-radius: 999px;margin-top: -20%;margin-left: -5%;width: 35px;"><i class="fal fa-camera"></i></button>
                <span style="font-size: 250%;margin-top: -50%;">{{ $datos[0]->nombre }} {{ $datos[0]->apellido }}</span>
        		<br><br><br>
        		<div class="row" style="font-size: 200%;">
        			<div class="col-6" style="text-align: right;">
        				<p>Nombre de Cuenta</p>
        				<p>Edad</p>
						<p><i class="fal fa-spinner-third fa-spin"></i></p>
        			</div>
        			<div class="col-6">
        				<p><span>@</span>{{ $datos[0]->usuario }}</p>
        				<p>{{ $datos[0]->edad }} años</p>

        			</div>
        		</div>
            </div>
            @endif
            @if(!isset($datos[0]->id))

            <center>
                <span style="font-size: 250%">No hay usuarios con la identificacion {{ $aux }}</span>
            </center>

            @endif
    	</div>
    </div>
</div>


@endsection