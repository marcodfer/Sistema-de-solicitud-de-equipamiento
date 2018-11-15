<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\EstadoEquipo;

class EstadoEquipoController extends Controller
{
    public function vista(){
        return view("DetalleDeEquipo");

    }

    public function create(Request $request){
    		$EstadoEquipo = new EstadoEquipo();

            $EstadoEquipo -> est_codigo = $request -> est_codigo;
    		$EstadoEquipo -> est_nombre = $request -> est_nombre;
    		$EstadoEquipo -> save();
    		return redirect('/DetalleDeEquipo');
    }
  
	public function read(Request $request){
		$EstadoEquipo =  EstadoEquipo::all();
		return view ('/DetalleDeEquipo', ['DatosEquipo'=>$EstadoEquipo]);
	} 
}
