<?php

namespace App\Http\Controllers;

//use Illuminate\Http\Request;


use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use App\Usuario;
use App\Publicacion;
use App\Seguidor;
class fastController extends Controller
{

    public function logeo2() {
        $pw   = hash("sha512", Request::input('pw'));
        $user = Request::input('usuario');
        if(filter_var($user, FILTER_VALIDATE_EMAIL)){
            $val = Usuario
            ::where('email', '=', $user)
            ->where('pw', '=', $pw)
            ->get();
        }else {
            $val = Usuario
            ::where('usuario', '=', $user)
            ->where('pw', '=', $pw)
            ->get();
        }
        

        if (!empty($val[0]->id)){
            session_start();
            $_SESSION['id']       = $val[0]->id;
            $_SESSION['nombre']   = $val[0]->nombre;
            $_SESSION['apellido'] = $val[0]->apellido;
            $_SESSION['edad']     = $val[0]->edad;
            $_SESSION['idioma']   = $val[0]->idioma;
            $_SESSION['usuario']  = $val[0]->usuario;
            $_SESSION['email']    = $val[0]->email;
            $_SESSION['modo']     = $val[0]->modo;
            $_SESSION['color']    = $val[0]->color;
            $_SESSION['foto']     = $val[0]->foto_perfil;
            $_SESSION['fondo']    = $val[0]->fondo_perfil;

            $nombre = explode(" ", $val[0]->nombre);
            $apellido = explode(" ", $val[0]->apellido);
            $_SESSION['nombre_completo'] = $nombre[0]." ".$apellido[0];

            return Redirect::to('/publicaciones');
        }else {
            Request::session()->flash('error', 'Usuario o contraseña incorrectos');
            return Redirect::to('/logeo');
        }
    }

    public function registro2() {
        if (!empty(Request::input('nombre'))
        && !empty(Request::input('apellido'))
        && !empty(Request::input('edad'))
        && !empty(Request::input('usuario'))
        && !empty(Request::input('email'))
        && !empty(Request::input('pw'))
        && !empty(Request::input('modo'))) {
            if(filter_var(Request::input('email'), FILTER_VALIDATE_EMAIL)) {
                $val = Usuario
                ::where('usuario', '=', Request::input('usuario'))
                ->get();

                if(!isset($val[0]->id)) {
                    $val = Usuario
                        ::where('email', '=', Request::input('email'))
                        ->get();
                    if(!isset($val[0]->id)) {
                        $usr = new Usuario;
                        $usr::create([
                            'nombre'        => Request::input('nombre'),
                            'apellido'      => Request::input('apellido'),
                            'edad'          => Request::input('edad'),
                            'idioma'        => 'es',
                            'usuario'       => Request::input('usuario'),
                            'email'         => Request::input('email'),
                            'pw'            => hash("sha512", Request::input('pw')),
                            'modo'          => Request::input('modo'),
                            'color'         => 'claro',
                            'foto_perfil'   => 'sin_foto.png',
                            'fondo_perfil'  => 'sin_fondo.png'
                        ]);
                        //echo substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2);
                        var_dump($usr);

                        $val = Usuario
                            ::where('usuario', '=', Request::input('usuario'))
                            ->get();

                        session_start();
                        $_SESSION['id']       = $val[0]->id;
                        $_SESSION['nombre']   = Request::input('nombre');
                        $_SESSION['apellido'] = Request::input('apellido');
                        $_SESSION['edad']     = Request::input('edad');
                        $_SESSION['idioma']   = $val[0]->idioma;
                        $_SESSION['usuario']  = Request::input('usuario');
                        $_SESSION['email']  = Request::input('email');
                        $_SESSION['modo']     = Request::input('modo');
                        $_SESSION['color']    = 'claro';
                        $_SESSION['foto']     = 'sin_foto.png';
                        $_SESSION['fondo']    = 'sin_fondo.png';
                        $nombre = explode(" ", $val[0]->nombre);
                        $apellido = explode(" ", $val[0]->apellido);
                        $_SESSION['nombre_completo'] = $nombre[0]." ".$apellido[0];

                        return Redirect::to('/publicaciones');
                    }else {
                        Request::session()->flash('error', 'E-mail Ocupado');
                        return Redirect::to('/registro');
                    }
                }else {
                    Request::session()->flash('error', 'Usuario Ocupado');
                    return Redirect::to('/registro');
                }
            }else {
                Request::session()->flash('error', 'E-mail Invalido');
                return Redirect::to('/registro');
            }
        }else {
            Request::session()->flash('error', 'Campos Vacios');
            return Redirect::to('/registro');
        }
    }

    public function perfil($id) {
        session_start();
        if(!isset($_SESSION['id'])){
            session_destroy();
            return Redirect::to('/');
        }else {
            $datos = Usuario
                ::where('id', '=', $id)
                ->orderBy('id', 'desc')
                ->get();

            $publicaciones = Publicacion
                ::where('id_user', '=', $datos[0]->id)
                ->get();

            $siguiendo = Seguidor
                ::where('enviador', '=', $_SESSION['id'])
                ->where('receptor', '=', $datos[0]->id)
                ->get();

            return view('perfil', ['datos' => $datos , 'publicaciones' => $publicaciones , 'siguiendo' => $siguiendo]);
        }
        
    }

    public function buscar() {
        session_start();

        $aux = explode('@', Request::input('busqueda'));
        if(isset($aux[1])){
            $a = "";
            foreach($aux as $au){
                $a .= $au;
            }
            $datos = Usuario
                ::where('nombre', 'like', '%'.$a.'%')
                ->orWhere('apellido', 'like', '%'.$a.'%')
                ->orWhere('usuario', 'like', '%'.$a.'%')
                ->get();
        }else {

        $datos = Usuario
            ::where('nombre', 'like', '%'.Request::input('busqueda').'%')
            ->orWhere('apellido', 'like', '%'.Request::input('busqueda').'%')
            ->orWhere('usuario', 'like', '%'.Request::input('busqueda').'%')
            ->get();

        }

        //var_dump($datos);

        return view('buscar', ['datos' => $datos, 'busqueda' => Request::input('busqueda')]);
    }

    public function configuracion() {
        session_start();
        if(!isset($_SESSION['id'])){
            session_destroy();
            return Redirect::to('/');
        }else {
            if(!empty(Request::input('nombre')) 
            && Request::input('nombre') !== $_SESSION['nombre']
            && !empty(Request::input('apellido')) 
            && Request::input('apellido') !== $_SESSION['apellido']
            && !empty(Request::input('email')) 
            && Request::input('email') !== $_SESSION['email']
            && !empty(Request::input('usuario')) 
            && Request::input('usuario') !== $_SESSION['usuario']) {
                $user = \App\Usuario::find($_SESSION['id']);
                $user->nombre = Request::input('nombre');
                $_SESSION['nombre'] = Request::input('nombre');

                $user->apellido = Request::input('apellido');
                $_SESSION['apellido'] = Request::input('apellido');

                if(filter_var(Request::input('email'), FILTER_VALIDATE_EMAIL)) {
                    $_SESSION['email'] = Request::input('email');
                    $user->email = Request::input('email');
                }
                
                $aux = \App\Usuario::where('usuario', '=', Request::input('usuario'))->get();
                if(!isset($aux[0]->id)) {
                    $user->usuario = Request::input('usuario');
                    $_SESSION['usuario'] = Request::input('usuario');
                }
                $user->save();

                $nombre = explode(" ", Request::input('nombre'));
                $apellido = explode(" ", Request::input('apellido'));
                $_SESSION['nombre_completo'] = $nombre[0]." ".$apellido[0];

                if(!filter_var(Request::input('email'), FILTER_VALIDATE_EMAIL)) {
                    Request::session()->flash('error', 'No se pudo actualizar el E-mail');
                }elseif(isset($aux[0]->id)) {
                    Request::session()->flash('error', 'No se pudo actualizar el nombre de usuario');
                }elseif(isset($aux[0]->id) && !filter_var(Request::input('email'), FILTER_VALIDATE_EMAIL)) {
                    Request::session()->flash('error', 'No se pudo actualizar el nombre de usuario ni el E-mail');
                }

                echo Request::input('nombre');
            }
            if(Request::input('color') !== $_SESSION['color']) {
                $user = Usuario::find($_SESSION['id']);

                $user->color       = Request::input('color');
                $user->save();
                $_SESSION['color'] = Request::input('color');
            }
            return Redirect::to('/publicaciones');
        }
    }

    public function seguir($id) {
        session_start();
        if(!isset($_SESSION['id'])){
            session_destroy();
            return Redirect::to('/');
        }else {
            $val = Usuario::find($id);
            if(!empty($val->id)) {
                $val = Seguidor::
                  where('enviador', '=', $_SESSION['id'])
                ->where('receptor', '=', $id)
                ->get();
                if(!empty($val[0]->id)) {
                    Seguidor::
                      where('enviador', '=', $_SESSION['id'])
                    ->where('receptor', '=', $id)
                    ->delete();
                }else {
                    Seguidor::create([
                        'enviador' => $_SESSION['id'],
                        'receptor' => $id
                    ]);
                }
                    
            }
        }
        return Redirect::to('/perfil/'. $id);
    }

    public function salir() {
        session_start();
        if(!empty($_SESSION['id'])){
            session_destroy();
            return Redirect::to('/');
        }else {
            return Redirect::to('/');
        }
    }
}
