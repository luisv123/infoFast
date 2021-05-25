<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;

class publicacionesController extends Controller
{
    public function publicaciones() {
        $publicaciones = DB::table('publicaciones')
            ->orderBy('id', 'desc')
            ->get();

        session_start();
        if(!isset($_SESSION['id'])){
            session_destroy();
            return Redirect::to('/');
        }else {
            return view('publicaciones', ['publicaciones' => $publicaciones]);
        }
    }


    public function publicaciones_crear() {
        session_start();
        if(!isset($_SESSION['id'])){
            session_destroy();
            return Redirect::to('/');
        }else {
            if (!empty(Request::input('contenido')) || !empty($_FILES['multimedia']['name'])) {
                $arr = explode("
", Request::input('contenido'));

                $contenido = "";
                foreach ($arr as $a) {
                    $contenido .= $a . "/n";
                }

                if(Request::hasFile('multimedia')){
                    
                    $file = Request::file('multimedia');
                    $ult_publi = DB::table('publicaciones')->limit(1)->orderBy('id', 'desc')->get();
                    if(!empty($ult_publi[0]->id)) {
                        $nombre = $ult_publi[0]->id +1;
                    }else {
                        $nombre = 1;
                    }

                    $tipo1 = explode(".", $file->getClientOriginalName());
                    $tipo = end($tipo1);
                    if($tipo == "png" || $tipo == "PNG" || 
                       $tipo == "jpg" || $tipo == "JPG" || 
                       $tipo == "jpeg" || $tipo == "JPEG" || 
                       $tipo == "gif" || $tipo == "GIF" || 
                       $tipo == "mp4" || $tipo == "MP4" || 
                       $tipo == "mkv" || $tipo == "MKV" ||
                       $tipo == "mp3" || $tipo == "MP3"){

                        $name = $nombre.".".$tipo;
                        echo "Hola D:";
                        //move_uploaded_file($_FILES['multimedia']['tmp_name'], '/home/lv/LaravelProjects/infofast/public/subidos/'.$file);
                        $file->move(public_path().'/subidos/',$name);
                        
                    }
                }
                
                \App\Publicacion::create([
                    'contenido'     => $contenido,
                    'adjunto'       => "sin_foto.png",
                    'id_user'       => $_SESSION['id'],
                    'adjunto'       => $name
                ]);
                Request::session()->flash('mensaje', 'Publicacion agregada exitosamente');

                return Redirect::to('/publicaciones');
            }
            
        }
    }

    public function publicaciones_refast($id) {
        session_start();
        if(!isset($_SESSION['id'])){
            session_destroy();
            return Redirect::to('/');
        }else {
            $val = DB::table('publicaciones')
                ->where('id', '=', $id)
                ->get();

            echo $val;

            //die();

            \App\Publicacion::create([
                'contenido'          => $val[0]->contenido,
                'adjunto'            => $val[0]->adjunto,
                'id_user'            => $_SESSION['id'],
                'id_user_original'   => $id,
            ]);
            
            echo "Hola";

            Request::session()->flash('mensaje', 'Re-fast agregado exitosamente');

            return Redirect::to('/publicaciones');
        }
    }


    public function publicaciones_borrar($id) {
        session_start();
        if(!isset($_SESSION['id'])){
            session_destroy();
            return Redirect::to('/');
        }else {
            $publi = DB::table('publicaciones')
            ->where('id', '=', $id)
            ->get();

            if(!empty($publi[0]->adjunto)) {
                unlink(public_path().'/subidos/'.$publi[0]->adjunto);
            }

            \Illuminate\Support\Facades\DB::table('publicaciones')
                ->where('id', '=', $id)
                ->delete();

            \Illuminate\Support\Facades\DB::table('publicaciones')
                ->where('id_user_original', '=', $id)
                ->delete();

            \Illuminate\Support\Facades\DB::table('likes')
                ->where('publicacion_id', '=', $id)
                ->delete();

            \Illuminate\Support\Facades\DB::table('comentarios')
                ->where('publicacion_id', '=', $id)
                ->delete();

            Request::session()->flash('mensaje', 'Publicacion borrada exitosamente');

            return Redirect::to('/publicaciones');
            
        }
    }
}
