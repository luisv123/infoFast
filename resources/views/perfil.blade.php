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
				<form action="{{ url('configuracion/') }}" method="POST">
					@method('GET')
					<img src="/fondo/{{  $datos[0]->fondo_perfil }}" alt="FONDO DE PERFIL" style="width: 100%;height: 300px !important;border-radius: 10px;">
					<img src="/foto/{{  $datos[0]->foto_perfil }}" alt="FOTO_PERFIL" style="border-radius: 999px;width: 18%;margin-top: -10%;margin-left: 5%;border: 1.5px solid rgba(0,0,0,0.25);">
					<span style="font-size: 250%;">{{ $datos[0]->nombre }} {{ $datos[0]->apellido }}</span>
					@if($datos[0]->id == $_SESSION['id'])
					<button style="font-size: 150%;margin-left: 23%;" class="btn btn-form">Editar Perfil</button>
					@endif
				</form>
        		<br><br><br>
        		<div class="row" style="font-size: 200%;">
        			<div class="col-6" style="text-align: right;">
        				<p>Nombre de Cuenta</p>
        				<p>Edad</p>
						<p>Amigos</p>
        			</div>
        			<div class="col-6">
        				<p style="color: #2684f0;"><span>@</span>{{ $datos[0]->usuario }}</p>
        				<p>{{ $datos[0]->edad }} años</p>
						<p>{{ rand(0,1000) }}</p>
        			</div>
        		</div>

				<ul class="pagination justify-content-center">
					<li class="page-item" onclick="publicaciones()"><button class="page-link">Publicaciones</button></li>
					<li class="page-item" onclick="amigos()"><button class="page-link">Amigos</button></li>
				</ul> 
				<br><br>

				<div class="row" id="publicaciones">
					<div class="col-sm-0 col-md-3"></div>
					<div class="col-sm-9 col-md-7">

						{{ view('publi_template') }}

						@foreach($publicaciones as $publi)
						<?php publi($publi) ?>
						@endforeach

					</div>
				</div>

				<div id="amigos">
					<div class="panel">
						Odett
					</div>
					<br><br><br>
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

<script>
	document.getElementById('publicaciones').style = "";
	document.getElementById('amigos').style        = "display: none;";

	function publicaciones() {
		document.getElementById('publicaciones').style = "";
		document.getElementById('amigos').style        = "display: none;";
	}
	function amigos() {
		document.getElementById('publicaciones').style = "display: none;";
		document.getElementById('amigos').style        = "";
	}
</script>
@endsection