<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;

class publicacioController extends Controller
{
    public function index()
    {
        $publicaciones = \App\Publicacion::
            orderBy('id', 'desc')
            ->get();

        session_start();
        if(!isset($_SESSION['id'])){
            session_destroy();
            return Redirect::to('/');
        }else {
            return view('publicaciones', ['publicaciones' => $publicaciones]);
        }
    }

    public function store(Request $request)
    {
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
                $name = "";

                if(Request::hasFile('multimedia')){
                    
                    $file = Request::file('multimedia');
                    $ult_publi = \App\Publicacion
                    ::limit(1)
                    ->orderBy('id', 'desc')
                    ->get();

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

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
