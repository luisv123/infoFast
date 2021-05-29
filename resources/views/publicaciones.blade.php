@extends('layout2')

@section('title', 'infoFast - Publicaciones')
@section('contenido')

<br><br><br><br><br><br>

<!--  MODAL PARA CREAR PUBLICACIONES  -->




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
            	@foreach($publicaciones as $publi)
                    <?php
                        //$publi_user = DB::select('select * from usuarios where id = :id', ['id' => $publi->id_user]);
                        $publi_user   = \App\Usuario::where('id', '=', $publi->id_user)->get();
                        $publi_like   = \App\Like::where('publicacion_id', '=', $publi->id)->get();;
                        $publi_com    = \App\Comentario::where('publicacion_id', '=', $publi->id)->orderBy('id', 'desc')->get();
                        $publi_refast = \App\Publicacion::where('id', '=', $publi->id)->where('id_publi_original', '=', $publi->id)->get();

                        $like = 0;
                        foreach ($publi_like as $publi_l) {
                            $like ++;
                            
                            if ($publi_l->usuario_id == $_SESSION['id']) {
                                $yo_like = 1;
                            }
                        }

                        $comentario = 0;
                        foreach ($publi_com as $publi_c) {
                            $comentario ++;
                            
                            if ($publi_c->usuario_id == $_SESSION['id']) {
                                $yo_com = 1;
                            }
                        }
                        $refast = 0;
                        foreach ($publi_refast as $publi_r) {
                            $refast ++;
                            
                            if ($publi_r->id_user == $_SESSION['id']) {
                                $yo_refast = 1;
                            }
                        }

                        ?>
                
                	<div class="panel" style="box-shadow: 0 6px 20px 0 rgba(0, 0, 0, 0.1);border-radius: 20px;">
                    
                        <div class="row">
                        	<div class="col-2">
                                <form action="{{ url('/perfil/') }}/{{ $publi_user[0]->id }}" method="POST">
                                    @method('GET')
                                    <button class="btn" style="width: 100%;border-radius: 999px;padding: 0PX;">
                        	        <img src="/foto/{{ $publi_user[0]->foto_perfil }}" alt="perfil" style="border-radius: 999px;width: 100%;border: 1px solid rgba(0,0,0,0.125);">
                                    </button>
                                </form>
                                
                        	</div>
                        	<div class="col-10">
                                <?php
                                    $nombre = explode(" ", $publi_user[0]->nombre);
                                    $apellido = explode(" ", $publi_user[0]->apellido);
                                ?>
                                <span style="font-size: 200%;">{{ $nombre[0] }} {{ $apellido[0] }}</span>
                                <!--
                                    <button class="btn" style="border-radius: 999px;float: right;border: 2px solid red;color: red;opacity: 50%;">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                -->
                                <button style="float: right;" class="btn" data-toggle="collapse" data-target="#more{{ $publi->id }}"><i class="fal fa-ellipsis-v" style="font-size: 120%;" data-target="#more{{ $publi->id }}"></i></button>

                                <div style="position: absolute;width: 100%;">
                                    <div class="row">
                                        <div class="col-sm-1 col-md-6"></div>
                                        <div class="col-sm-11 col-md-6">
                                            <div class="panel collapse" style="box-shadow: 0 6px 20px 0 rgba(0, 0, 0, 0.1);border-radius: 10px 10px 10px 10px;padding: 5px;" id="more{{ $publi->id }}">
                                                @if($publi->id_user == $_SESSION['id'])
                                                <form action="{{ url('publicaciones/borrar') }}/{{$publi->id}}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="btn" style="width: 100%;color: red !important;text-align: left;"><i class="fal fa-trash"></i> Borrar</button>
                                                </form>
                                                <button class="btn" style="width: 100%;text-align: left;"><i class="fal fa-pencil"></i> Editar</button>
                                                
                                                @endif
                                                @if($publi->id_user !== $_SESSION['id'])
                                                <button class="btn" style="width: 100%;text-align: left;"><i class="fal fa-bookmark"></i> Guardar</button>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                        	</div>
                            
                        </div>
                        <hr style="width: 100% !important;margin-right: 10px;margin-left: 10px">
                        <?php
                        if(!empty($publi->id_publi_original)){
                            $refast_user = \App\Usuario
                            ::where('id', '=', $publi->id_user_original)
                            ->get();
                        }
                        ?>
                        <p style="text-align: justify;padding-bottom: 0px;">
                            <?php
                            if($publi->contenido !== "/n") {
                                echo "<br>";
                                $arr = explode("/n", $publi->contenido);
                                foreach ($arr as $a) {
                                    echo $a. "<br>";
                                }
                            }
                            ?>
                        </p>
                        <?php
                        if(!empty($publi->adjunto)) {
                            $tipo1 = explode(".", $publi->adjunto);
                            $tipo = end($tipo1);
                            if($tipo == "png" || $tipo == "PNG" || 
                            $tipo == "jpg" || $tipo == "JPG" || 
                            $tipo == "jpeg" || $tipo == "JPEG"){
                            ?>
                                <img src="/subidos/{{ $publi->adjunto }}" alt="FOTO" style="width: 100%;border-radius: 20px;">
                            <?php
                            }
                            if($tipo == "gif" || $tipo == "GIF") {
                                
                                ?>
                                <img src="/subidos/{{ $publi->adjunto }}" alt="FOTO" style="width: 100%;border-radius: 20px;"><br>
                                <p style="font-size: 150%;font-weight: 400;color: white;text-shadow: -1px 0 black, 0 1px rgba(0,0,0,0.5), 1px 0 rgba(0,0,0,0.5), 0 -1px rgba(0,0,0,0.5);margin-top: -10% !important;margin-left: 5%;">GIF</p><br>
                                <?php
                            }

                            if( $tipo == "mp4" || $tipo == "MP4" || 
                            $tipo == "mkv" || $tipo == "MKV"){
                            ?>
                                <video src="/subidos/{{ $publi->adjunto }}" style="width: 100%;border-radius: 20px;" controls></video>
                            <?php
                            }

                            if( $tipo == "mp3" || $tipo == "MP3"){
                            ?>
                                <audio src="/subidos/{{ $publi->adjunto }}" style="width: 100%;border-radius: 20px;" controls></audio>
                            <?php
                            }
                        }
                       ?>
                        <hr style="width: 100% !important;margin-right: 10px;margin-left: 10px">

                        <div class="row" style="width: 100%;">
                            <div class="col-4">
                                <center>
                                    <form action="{{ url('/publicaciones/like/') }}/{{ $publi->id }}" method="POST">
                                        @csrf
                                        @method('GET')
                                        @if(isset($yo_like))
                                            <button class="btn anim-like-active anim-like" title="Quitar me gusta a esta publicacion">
                                            <i class="fal fa-thumbs-up"></i>
                                            </button>
                                            <span class="recize color-blue-like">{{ $like }}</span>
                                        @endif
                                        @if(!isset($yo_like))
                                            <button class="btn anim-like" title="Agregar un me gusta a esta publicacion">
                                            <i class="fal fa-thumbs-up"></i>
                                            </button>
                                            <span class="recize">{{ $like }}</span>
                                        @endif
                                    </form>
                                </center>
                            </div>
                            <div class="col-4">
                                <center id="com_btn{{ $publi->id }}">
                                    @if(isset($yo_com))
                                    <button class="btn anim-like-active anim-like" data-toggle="collapse" data-target="#com{{ $publi->id }}">
                                        <i class="fal fa-comment-alt"></i>
                                    </button>
                                    <span class="recize color-blue-like">{{ $comentario }}</span>
                                    @endif
                                    @if(!isset($yo_com))
                                    <button class="btn anim-like" data-toggle="collapse" data-target="#com{{ $publi->id }}">
                                        <i class="fal fa-comment-alt"></i>
                                    </button>
                                    <span class="recize">{{ $comentario }}</span>
                                    @endif
                                </center>
                            </div>
                            <div class="col-4">
                                <center>
                                    <form action="{{ url('/publicaciones/refast') }}/{{ $publi->id }}" method="POST">
                                        @csrf
                                        @method('POST')
                                        <button class="btn anim-like">
                                            <i class="fal fa-share"></i>
                                        </button>
                                        <span class="recize">{{ $refast }}</span>
                                    </form>
                                </center>
                            </div>
                        </div>

                        <div style="width: 100%;" class="collapse" id="com{{ $publi->id }}">
                            <hr style="width: 100% !important;margin-right: 10px;margin-left: 10px">
                            <form action="{{ url('/publicaciones/comentario/') }}/{{ $publi->id }}" method="POST">
                            @csrf
                            @method('GET')

                            <input type="text" name="comentario" class="input" placeholder="Escribe un comentario" autocomplete="off">

                            </form>

                            <br>
                            
                            @if(empty($publi_com[0]->id))
                            <center>
                                <span style="font-size: 150%;">No hay Comentarios</span><br>
                                <span>Se el primero en comentar!</span>
                            </center>
                            @endif
                            @if(!empty($publi_com[0]->id))
                            <div style="max-height: 250px;overflow-y: auto;">
                            
                            <br>
                            @foreach($publi_com as $com)
                            <?php
                                $com_usuario = DB::table('usuarios')
                                    ->where('id', '=', $com->usuario_id)
                                    ->get();
                            ?>
                            <div class="panel" style="padding: 10px;">
                                <span style="font-size: 150%;">
                                    <img src="/foto/{{ $com_usuario[0]->foto_perfil }}" alt="F" style="border-radius: 999px; width: 40px;border: 1px solid rgba(0,0,0,0.25);">
                                {{ $com_usuario[0]->nombre }} {{ $com_usuario[0]->apellido }}
                                </span>
                                <hr>
                                <span style="font-size: 75%;">{{ $com->comentario }}</span>
                            </div><br>
                            @endforeach
                            
                            </div>
                            @endif
                        </div>
                    </div><br><br><br>
                @endforeach
                </div><br><br><br>
                <div style="width: 80%;margin-left: 20%;">
            <center>
                <span style="font-size: 200%;">No hay mas Publicaciones</span><br><br>
                <span>En este momento no hay publicaciones.<br>Espera a que alguien publique algo</span><br>
            </center>
            <div style="width: 80%;margin-left: 20%;">
        
        </div>
        <div class="col-sm-0 col-md-2"></div>
    </div>
    
</div>
<br><br><br>
</div>

<script>
    document.getElementById('btn_publi_c').disabled = true;
    document.getElementById('btn_publi_c').style = "opacity: 50%;width: 100%;border-radius: 10px;color: white;";
    document.getElementById('btn_publi_c').className = "btn bg-degraded disabled";
    document.getElementById('btn_publi_c').title = "No puedes publicar algo por que el campo de texto esta vacio y no hay multimedia subida";

    function changed() {
        var text = document.getElementById('text_publi_c');
        var multi = document.getElementById('cargar_img');
        var label = document.getElementById('label_img');
        var btn = document.getElementById('btn_publi_c');
        if (text.value == "" && multi.value == "") {
            btn.disabled = true;
            btn.style = "opacity: 50%;width: 100%;border-radius: 10px;color: white;";
            btn.className = "btn bg-degraded disabled";
            btn.title = "No puedes publicar algo por que el campo de texto esta vacio y no hay multimedia subida";
        }else {

            btn.disabled = false;
            btn.style = "opacity: 100%;width: 100%;";
            btn.className = "btn btn-form bg-degraded";
            btn.title = "";
        }
        if(multi.value == "") {
            label.style="color: #212529;"
        }else {
            label.style="color: #2684f0;"
        }
    }
    function changed2() {
        alert("Hola");
    }
    setTimeout(function() {
        document.getElementById('mensaje').innerHTML = '';
    },5000)
</script>

@endsection