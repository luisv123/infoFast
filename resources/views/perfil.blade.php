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
					<img src="/fondo/sin_fondo.png" alt="FONDO DE PERFIL" style="width: 100%;max-height: 825px;border-radius: 10px;">
					<img src="/foto/sin_foto.png" alt="FOTO_PERFIL" style="border-radius: 999px;width: 18%;margin-top: -10%;margin-left: 5%;border: 1.5px solid rgba(0,0,0,0.25);">
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

				<ul class="nav nav-tabs">
					<li class="nav-item">
						<a class="nav-link active" href="#">Publicaciones</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="#">Amigos</a>
					</li>
				</ul> 
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