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
					<br><br><button style="font-size: 150%;" class="btn btn-form col-4">Editar Perfil</button>
					@endif
				</form>
				<form action="/seguir/{{ $datos[0]->id }}" method="POST">
					@if($datos[0]->id !== $_SESSION['id'])
						@if(!empty($siguiendo[0]->id))
							@csrf
							<br><br><button style="font-size: 150%;" class="btn btn-form bg-degraded col-4">SIGUIENDO <i class="fal fa-minus"></i></button>
						@endif
						@if(empty($siguiendo[0]->id))
							@csrf
							<br><br><button style="font-size: 150%;" class="btn btn-form col-4">SEGUIR <i class="fal fa-plus"></i></button>
						@endif
					@endif
				</form>
        		<br><br><br>
        		<div class="row" style="font-size: 200%;">
        			<div class="col-6" style="text-align: right;">
        				<p>Nombre de Cuenta</p>
        				<p>Edad</p>
						<p>Seguidores</p>
        			</div>
        			<div class="col-6">
        				<p style="color: #2684f0;"><span>@</span>{{ $datos[0]->usuario }}</p>
        				<p>{{ $datos[0]->edad }} años</p>
						<p>{{ rand(0,1000) }}</p>
        			</div>
        		</div>

				<ul class="nav nav-tabs nav-justified">
					<li class="nav-item">
						<a class="nav-link active" data-toggle="tab" href="#publi">Publicaciones</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" data-toggle="tab" href="#seguidores">Seguidores</a>
					</li>
				</ul>

				<div class="tab-content">
					<div class="tab-pane container active" id="publi">
						<div class="row">
							<br><br><br><br>
							{{ view('publi_template') }}
		
							@foreach($publicaciones as $publi)
							<?php publi($publi) ?>
							@endforeach
						</div>
					</div>
					<div class="tab-pane container fade" id="seguidores">
						<div class="row">
							No tienes seguidores
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