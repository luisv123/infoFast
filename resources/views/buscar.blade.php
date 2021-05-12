@extends('layout2')

@section('title', 'infoFast - Buscar')
@section('contenido')

<div class="container">
    <br><br><br><br>
    <div class="row">
    	<div class="col-sm-2 col-md-3"></div>
    	<div class="col-sm-8 col-md-9 aparecido">
            @if(empty($datos[0]->id))
                <center>
                    <span style="font-size: 200%;">No hay resultados para la busqueda <i>"{{ $busqueda }}"</i></span><br><br>
                </center>
            @endif
            @foreach($datos as $data)
                <form action="{{ url('/perfil') }}/{{ $data->id }}" method="POST">
                    @method("GET")
                    <button id="{{ $data->id }}" style="display: none;"></button>
                </form>
                <label for="{{ $data->id }}" class="pointer-hover panel recize" style="width: 100%;">
                    <img src="/foto/{{ $data->foto_perfil }}" style="width: 10%;border-radius: 999px;border: 1px solid rgba(0,0,0,0.25);" alt="">

                    <span style="font-size: 200%;margin-left: 30px;">{{ $data->nombre }} {{ $data->apellido }}</span>

                    <span style="margin-left: 30px;float: right;">{{ '@'.$data->usuario }}</span>
                </label>
            @endforeach
    	</div>
    </div>
</div>


@endsection