@extends('layout2')

@section('title', 'infoFast - Publicaciones')
@section('contenido')

<br><br><br><br><br><br>


<div class="container">
    <div class="row">
        <div class="col-sm-2 col-md-3"></div>
        <div class="col-sm-9 col-md-7">
            @if(null !== session('mensaje'))

                <div class="fixed-top aparecido-bottom-top" style="margin-top: 75px;margin-left: 73%;margin-right: 2%;" id="mensaje">
                    <div class="alert alert-success" style="b">
                        <span><i class="fal fa-check-circle"></i> {{ session('mensaje') }}</span>        
                    </div>
                </div>
                
            @endif
            @if(null !== session('error'))

                <div class="fixed-top aparecido-bottom-top" style="margin-top: 75px;margin-left: 73%;margin-right: 2%;" id="mensaje">
                    <div class="alert alert-danger" style="b">
                        <span><i class="fal fa-times-circle"></i> {{ session('error') }}</span>        
                    </div>
                </div>
                
            @endif
            <div class="aparecido">
                <div style="width: 80%;margin-left: 20%;">

                    {{ view('publi_template') }}

                    @foreach($publicaciones as $publi)
                    <?php publi($publi) ?>
                    @endforeach
                

                        </div><br><br><br>
                        <div style="width: 80%;margin-left: 20%;">
                    <center>
                        <span style="font-size: 200%;">No hay mas Publicaciones</span><br><br>
                        <span>En este momento no hay publicaciones.<br>Espera a que alguien publique algo</span><br>
                    </center>
                </div>
            </div>
        </div>
        <div class="col-sm-0 col-md-2"></div>
    </div>
    
</div>
<br><br><br>
</div>



@endsection