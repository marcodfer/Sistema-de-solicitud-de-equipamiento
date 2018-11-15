<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TipoDeEquipo;

class TipoDeEquipoController extends Controller
{
    public function vista(){
        return view("AgregarEquipo");

    }

    public function create(Request $request){
    		$TipoEquipo = new TipoDeEquipo();

            $TipoEquipo -> tip_id = $request -> tip_id;
    		$TipoEquipo -> tip_nombre = $request -> tip_nombre;
    		$TipoEquipo -> save();
    		return redirect('/AgregarEquipo');
    }
  
	public function read(Request $request){
		$TipoEquipo =  TipoDeEquipo::all();
		return view ('/AgregarEquipo', ['TipoEquipo'=>$TipoEquipo]);
	}
}
