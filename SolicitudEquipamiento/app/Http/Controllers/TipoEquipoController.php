<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TipoEquipo;

class TipoEquipoController extends Controller
{
    public function vista(){
        return view("equipoAdm");

    }

    public function create(Request $request){
    		$TipoEquipo = new TipoEquipo();

            $TipoEquipo -> tip_id = $request -> tip_id;
    		$TipoEquipo -> tip_nombre = $request -> tip_nombre;
    		$TipoEquipo -> save();
    		return redirect('/equipoAdm');
    }
  
	public function read(Request $request){
		$TipoEquipo =  TipoEquipo::all();
		return view ('/equipoAdm', ['TipoEquipo'=>$TipoEquipo]);
	} 
}
