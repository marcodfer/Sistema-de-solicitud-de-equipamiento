<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TipoDeUsuario;

class TipoUController extends Controller
{
	public function vista(){
		return view('welcome');
	}

    public function create(Request $request){
    	$tipoUsuario = new TipoDeUsuario();

    	$tipoUsuario -> tip_nombre = $request -> tip_nombre;

    	$tipoUsuario -> save();

    	return redirect('/create');
    }
}
