<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Usuario;
use Session;
use DB;

class UsuarioController extends Controller
{

    public function cerrarSesion(){
    	Session::forget('miSession');
    	return View::make('welcome');
    }
   

	public function vista(){
		return view('welcome');
	}

	public function iniciar(Request $request){
		$result = Usuario::where('usu_rut', '=',$request -> usu_rut)
			->where('usu_contraseña','=',$request -> usu_contraseña)
			->get();

		if ($result -> isEmpty()) {
			return back()->withErrors(['usu_rut' => 'Las credenciales ingresadas son incorrectas'])
				->withInput(request(['usu_rut']));
		}


		$usuario = DB::table('sol_usuarios')
			->join('sol_tipos_usuario','sol_tipos_usuario.tip_codigo','=','sol_usuarios.tip_codigo')
			->where('usu_rut','=',$request -> usu_rut)
			->select('usu_rut','usu_nombre','sol_tipos_usuario.tip_nombre','sol_usuarios.tip_codigo')
			->get();
		Session::put('miSesion', $usuario);
    	return redirect()->route('Solicitud');
	}


}
