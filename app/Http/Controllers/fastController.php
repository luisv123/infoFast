<?php

namespace App\Http\Controllers;

//use Illuminate\Http\Request;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use App\Usuario;
class fastController extends Controller
{

    public function logeo2() {
        $pw   = hash("sha512", Request::input('pw'));
        $user = Request::input('usuario');
        $val = \Illuminate\Support\Facades\DB::table('usuarios')->where('usuario', '=', $user)->where('pw', '=', $pw)->get();
        

        if (!empty($val[0]->id)){
            session_start();
            $_SESSION['id']       = $val[0]->id;
            $_SESSION['nombre']   = $val[0]->nombre;
            $_SESSION['apellido'] = $val[0]->apellido;
            $_SESSION['edad']     = $val[0]->edad;
            $_SESSION['idioma']   = $val[0]->idioma;
            $_SESSION['usuario']  = $val[0]->usuario;
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
        if (!empty(Request::input('nombre')) && !empty(Request::input('apellido')) && !empty(Request::input('edad')) && !empty(Request::input('usuario')) && !empty(Request::input('pw')) && !empty(Request::input('modo'))) {
            
            $val = DB::table('usuarios')->where('usuario', '=', Request::input('usuario'))->get();

            if(!isset($val[0]->id)) {
                $usr = new Usuario;
                $usr::create([
                    'nombre'        => Request::input('nombre'),
                    'apellido'      => Request::input('apellido'),
                    'edad'          => Request::input('edad'),
                    'idioma'        => 'es',
                    'usuario'       => Request::input('usuario'),
                    'pw'            => hash("sha512", Request::input('pw')),
                    'modo'          => Request::input('modo'),
                    'color'         => 'claro',
                    'foto_perfil'   => 'sin_foto.png',
                    'fondo_perfil'  => 'sin_fondo.png'
                ]);
                //echo substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2);
                var_dump($usr);

                $val = DB::table('usuarios')
                    ->where('usuario', '=', Request::input('usuario'))
                    ->get();

                session_start();
                $_SESSION['id']       = $val[0]->id;
                $_SESSION['nombre']   = Request::input('nombre');
                $_SESSION['apellido'] = Request::input('apellido');
                $_SESSION['edad']     = Request::input('edad');
                $_SESSION['idioma']   = $val[0]->idioma;
                $_SESSION['usuario']  = Request::input('usuario');
                $_SESSION['modo']     = Request::input('modo');
                $_SESSION['color']    = 'claro';
                $_SESSION['foto']     = 'sin_foto.png';
                $_SESSION['fondo']    = 'sin_fondo.png';
                $nombre = explode(" ", $val[0]->nombre);
                $apellido = explode(" ", $val[0]->apellido);
                $_SESSION['nombre_completo'] = $nombre[0]." ".$apellido[0];

                return Redirect::to('/publicaciones');
            }else {
                Request::session()->flash('error', 'Usuario Ocupado');
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
            $datos = DB::table('usuarios')
                ->where('id', '=', $id)
                ->get();

            return view('perfil', ['datos' => $datos]);
        }
        
    }

    public function buscar() {
        session_start();

        $datos = DB::table('usuarios')
            ->where('nombre', 'like', '%'.Request::input('busqueda').'%')
            ->orWhere('apellido', 'like', '%'.Request::input('busqueda').'%')
            ->orWhere('usuario', 'like', '%'.Request::input('busqueda').'%')
            ->get();

        //var_dump($datos);

        return view('buscar', ['datos' => $datos, 'busqueda' => Request::input('busqueda')]);
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
