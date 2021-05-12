@extends('layout2')

@section('title', 'infoFast - Publicaciones')
@section('contenido')

<br><br><br><br><br><br>

<!--  MODAL PARA CREAR PUBLICACIONES  -->

<div class="modal fade" id="cpublicacion">
    <div class="modal-dialog modal-dialog-centered modal-xm">
        <div class="modal-content" id="changemodal" style="border-radius: 20px;">
            <form action="{{ url('publicaciones/crear/') }}" method="POST">
                @csrf
                <div class="modal-header">
                    <span class="modal-title" style="font-size: 150%;">Crear Publicacion</span>
                    <button type="button" class="btn close" data-dismiss="modal"><i class="fal fa-times"></i></button>
                </div>
                <div class="modal-body" style="padding: 0px;b">
                    <textarea name="contenido" class="form-control" placeholder="Escribe el contenido de tu publicacion" style="border: none;border-radius: 5px;min-height: 250px;max-height: 250px;border-bottom: 1px solid rgba(0,0,0,0.125);" id="text_publi_c" oninput="changed()"></textarea>
                    <button class="btn" type="button"><i class="fal fa-link" style="font-size: 150%;"></i></button>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-form bg-degraded" id="btn_publi_c" style="width: 100%;">Agregar</button>
                </div>
            </form>
      </div>
    </div>
</div>


<div class="container">
    <div class="row">
        <div class="col-sm-2 col-md-4"></div>
        <div class="col-sm-8 col-md-6">
            @if(null !== session('mensaje'))

                <div class="fixed-top aparecido-bottom-top" style="margin-top: 75px;margin-left: 73%;margin-right: 2%;" id="mensaje">
                    <div class="alert alert-success" style="b">
                        <span><i class="fal fa-check-circle"></i> {{ session('mensaje') }}</span>        
                    </div>
                </div>
                
            @endif
            <div class="aparecido">
                <button data-toggle="modal" data-target="#cpublicacion" class="btn bg-degraded btn-form" style="box-shadow: 0 6px 20px 0 rgba(0, 0, 0, 0.1);width: 100%;">Crear una publicacion <i class="fal fa-plus"></i></button><br><br><br>
            	@foreach($publicaciones as $publi)
                    <?php
                        $publi_user = DB::select('select * from usuarios where id = :id', ['id' => $publi->id_user]);
                        $publi_like = DB::table('likes')->where('publicacion_id', '=', $publi->id)->get();
                        $publi_com = DB::table('comentarios')
                            ->where('publicacion_id', '=', $publi->id)
                            ->orderBy('id', 'desc')
                            ->get();
                        $refast_user = DB::table('usuarios')
                            ->where('id', '=', $publi->id_user_original)
                            ->get();

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

/*                        $refasts = 0;
                        foreach ($refast as $) {
                            # code...
                        }
                        */                        
                        
                        ?>

                	<div class="panel" style="box-shadow: 0 6px 20px 0 rgba(0, 0, 0, 0.1);border-radius: 20px;">
                        <div class="row">
                        	<div class="col-2">
                                <form action="{{ url('/perfil/') }}/{{ $publi_user[0]->id }}" method="POST">
                                    @method('GET')
                                    <button class="btn bg-degraded" style="width: 100%;border-radius: 999px;padding: 2px;">
                        	        <img src="/foto/{{ $publi_user[0]->foto_perfil }}" alt="perfil" style="border-radius: 999px;width: 100%;">
                                    </button>
                                </form>
                                
                        	</div>
                        	<div class="col-10">
                                <form method="POST" action="{{ url('publicaciones/borrar') . '/' . $publi->id }}">
                                    @csrf
                                    @method('DELETE')
                                    <?php
                                        $nombre = explode(" ", $publi_user[0]->nombre);
                                        $apellido = explode(" ", $publi_user[0]->apellido);
                                    ?>
                            		<span style="font-size: 200%;">{{ $nombre[0] }} {{ $apellido[0] }}</span>
                                    @if($publi_user[0]->id == $_SESSION['id'])
                                        <button class="btn" style="border-radius: 999px;float: right;border: 2px solid red;color: red;opacity: 50%;">
                                            <i class="fas fa-trash"></i>
                                        </button>

                                    @endif
                                </form>
                        	</div>
                        </div>
                        <hr style="width: 100% !important;margin-right: 10px;margin-left: 10px">
                        <?php
                        if(!empty($publi->id_user_original)){
                            $refast_user = DB::table('usuarios')
                                ->where('id', '=', $publi->id_user_original)
                                ->get();
                            
                        }
                        ?>
                        <p style="padding: 10px;text-align: justify;padding-bottom: 0px;"><br>
                            <?php
                                $arr = explode("/n", $publi->contenido);
                                foreach ($arr as $a) {
                                    echo $a. "<br>";
                                }
                            ?>
                        </p>
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
                                            <span class="recize" style="color: blue;">{{ $like }}</span>
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
                                    <span class="recize" style="color: blue;">{{ $comentario }}</span>
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
                                        <span class="recize">56</span>
                                    </form>
                                </center>
                            </div>
                        </div>

                        <div style="width: 100%;" class="collapse" id="com{{ $publi->id }}">
                            <hr style="width: 100% !important;margin-right: 10px;margin-left: 10px">
                            <form action="{{ url('/publicaciones/comentario/') }}/{{ $publi->id }}" method="POST">
                            @csrf
                            @method('GET')

                            <input type="text" name="comentario" class="input" placeholder="Escribe un comentario">

                            </form>

                            <br>
                            
                            @if(empty($publi_com[0]->id))
                            <center>
                                <span style="font-size: 150%;">No hay Comentarios</span><br>
                                <span>Se el primero en comentar!</span>
                            </center>
                            @endif
                            @if(!empty($publi_com[0]->id))
                            <div style="max-height: 250px;overflow-y: auto;border-bottom: 1px solid rgba(0,0,0,0.25);border-top: 1px solid rgba(0,0,0,0.25);">
                            
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

            <center>
                <span style="font-size: 200%;">No hay mas Publicaciones</span><br><br>
                <span>En este momento no hay publicaciones.<br>Espera a que alguien publique algo</span><br>
            </center>

        </div>
    </div>
    <div class="col-sm-2 col-md-2"></div>
</div>
<br><br><br>
</div>

<script>
    document.getElementById('btn_publi_c').disabled = true;
    document.getElementById('btn_publi_c').style = "opacity: 50%;width: 100%;border-radius: 5px 20px 5px 20px;color: white;";
    document.getElementById('btn_publi_c').className = "btn bg-degraded disabled";
    document.getElementById('btn_publi_c').title = "No puedes publicar algo por que el campo de texto esta vacio";

    function changed() {
        var text = document.getElementById('text_publi_c');
        var btn = document.getElementById('btn_publi_c');
        if (text.value == "") {
            btn.disabled = true;
            btn.style = "opacity: 50%;width: 100%;border-radius: 5px 20px 5px 20px;color: white;";
            btn.className = "btn bg-degraded disabled";
            btn.title = "No puedes publicar algo por que el campo de texto esta vacio";
        }else {
            btn.disabled = false;
            btn.style = "opacity: 100%;width: 100%;";
            btn.className = "btn btn-form bg-degraded";
            btn.title = "";
        }
    }
    setTimeout(function() {
        document.getElementById('mensaje').innerHTML = '';
    },5000)
</script>

@endsection