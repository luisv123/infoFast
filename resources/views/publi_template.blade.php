<?php
    function publi($publi)
    {
       
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
        $guardado = \App\Guardado::
            where('id_user', '=', $_SESSION['id'])
            ->where('id_publi', '=', $publi->id)
            ->get();
        ?>
    <div class="modal fade" id="edit_publicacion{{ $publi->id }}">
        <div class="modal-dialog modal-dialog-centered modal-xm">
            <div class="modal-content" id="changemodal" style="border-radius: 20px;">
                <form action="{{ url('publicaciones/editar/'.$publi->id.'') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="modal-header">
                        <span class="modal-title" style="font-size: 150%;">Editar Publicacion</span>
                        <button type="button" class="btn close" data-dismiss="modal"><i class="fal fa-times"></i></button>
                    </div>
                    <div class="modal-body" style="padding: 0px;b">
                        <?php
                            $contenido = explode('/n', $publi->contenido);
                        ?>
                        <textarea name="contenido" class="form-control" placeholder="Escribe el contenido de tu publicacion" style="border: none;border-radius: 5px;min-height: 250px;max-height: 250px;background: transparent;" id="text_publi_c" oninput="changed()"
                        ><?php foreach ($contenido as $con) {
                            echo $con."
";
                        } ?></textarea>

                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-form bg-degraded" id="btn_publi_c" style="width: 100%;">Editar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="panel" id="{{ $publi->id }}">

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
                <span style="font-size: 150%;">{{ $nombre[0] }} {{ $apellido[0] }}</span>
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
                            <div class="panel collapse" style="border-radius: 5px;padding: 0px;padding-top: 10px;padding-bottom: 10px;" id="more{{ $publi->id }}">
                                @if($publi->id_user == $_SESSION['id'])
                                <form action="{{ url('publicaciones/borrar') }}/{{$publi->id}}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-option" style="color: red !important;"><i class="fal fa-trash"></i> Borrar</button>
                                </form>
                                <button class="btn btn-option" data-toggle="modal" data-target="#edit_publicacion{{ $publi->id }}"><i class="fal fa-edit"></i> Editar</button>
                                
                                @endif
                                @if($publi->id_user !== $_SESSION['id'])
                                    @if(empty($guardado[0]->id))
                                    <form action="{{ url('publicaciones/guardar') }}/{{$publi->id}}" method="POST">
                                        @csrf
                                        <button class="btn btn-option"><i class="fal fa-bookmark"></i> Guardar</button>
                                    </form>
                                    @endif
                                    @if(!empty($guardado[0]->id))
                                    <form action="{{ url('guardados/borrar') }}/{{$publi->id}}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-option"><i class="fal fa-trash"></i> Quitar</button>
                                    </form>
                                    @endif
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
        <hr>
        <?php
        if(!empty($publi->id_publi_original)){
            $refast_user = \App\Usuario
            ::where('id', '=', $publi->id_user_original)
            ->get();
        }
        ?>
        <p style="text-align: justify;padding-bottom: 0px;">
            <?php
            $arr = explode(' ', $publi->contenido);
            $cont = "";
            foreach($arr as $r) {
                if(filter_var($r, FILTER_VALIDATE_URL)){
                    $cont .= "es un link ".$r." ja!";
                }else {
                    $cont .= $r;
                }
                $cont .= " ";
            }
            
            if($cont !== "/n") {
                echo "<br>";
                $arr = explode("/n", $cont);
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
                <img src="/subidos/{{ $publi->adjunto }}" alt="FOTO" style="width: 100%;border-radius: 20px;"><br>
                <?php
            }
            
            if($tipo == "gif" || $tipo == "GIF") {
                
                ?>
                <img src="/subidos/{{ $publi->adjunto }}" alt="FOTO" style="width: 100%;border-radius: 20px;filter: blur(-8px);"><br>
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
        <hr>

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
            
            <form action="{{ url('/publicaciones/comentario/') }}/{{ $publi->id }}" method="POST">
            @csrf
            @method('GET')
            <hr>
            <input type="text" name="comentario" placeholder="Escribe un comentario" autocomplete="off" style="background: transparent;border: none;padding: 5px;width: 100%;margin: none;">
            <hr>
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
            @for( $i = 0 ; $i < $comentario ; $i++ )
            <?php
                $com_usuario = DB::table('usuarios')
                    ->where('id', '=', $publi_com[$i]->usuario_id)
                    ->get();
            ?>
            <div class="panel" style="padding: 10px;">
                <span style="font-size: 150%;">
                    <img src="/foto/{{ $com_usuario[0]->foto_perfil }}" alt="F" style="border-radius: 999px; width: 40px;border: 1px solid rgba(0,0,0,0.25);">
                {{ $com_usuario[0]->nombre }} {{ $com_usuario[0]->apellido }}
                </span>
                <hr>
                <span style="font-size: 75%;">{{ $publi_com[$i]->comentario }}</span>
            </div><br>
            @endfor
            
            </div>
            @endif
        </div>
    </div><br><br><br> 

<?php
    }
?>