<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;


class opinionesController extends Controller
{
    public function like($id) {
        session_start();
        if(!isset($_SESSION['id'])){
            session_destroy();
            return Redirect::to('/');
        }else {
            $aux = DB::table('publicaciones')->where('id', '=', $id)->get();
            if(isset($aux[0]->id)) {
                $aux = DB::table('likes')
                    ->where('publicacion_id', '=', $id)
                    ->where('usuario_id', '=', $_SESSION['id'])
                    ->get();
                if(!isset($aux[0]->id)) {
                    \App\Like::create([
                        'usuario_id'    => $_SESSION['id'],
                        'publicacion_id' => $id,
                    ]);

                    Request::session()->flash('mensaje', 'Me gusta agregado exitosamente');

                    return Redirect::to('/publicaciones');
                }else {
                    DB::table('likes')->where('id', '=', $aux[0]->id)->delete();

                    Request::session()->flash('mensaje', 'Me gusta eliminado exitosamente');

                    return Redirect::to('/publicaciones');
                }
            }
        }
    }

    public function comentario($id) {
        session_start();
        if(!isset($_SESSION['id'])){
            session_destroy();
            return Redirect::to('/');
        }else {
            if(!empty(Request::input('comentario'))){
                \App\Comentario::create([
                    'usuario_id'     => $_SESSION['id'],
                    'publicacion_id' => $id,
                    'comentario'     => Request::input('comentario')
                ]);

                    Request::session()->flash('mensaje', 'Comentario agregado exitosamente');

                    return Redirect::to('/publicaciones');
            }
        }
    }
}
