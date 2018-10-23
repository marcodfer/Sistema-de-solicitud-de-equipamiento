<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Equipo;
use App\Http\Requests;
use Carbon\Carbon;
class EquipoController extends Controller
{
    public function vista(){
    	return view('equipoAdm');
    }

    public function create(Request $request){
    		$Equipo = new Equipo();

//Sale Function name must be a string

    		$Equipo -> equ_codigo = $request -> equ_codigo;
    		$Equipo -> equ_modelo = $request -> equ_modelo;
    		$Equipo -> equ_marca = $request -> equ_marca;
    		$Equipo -> equ_numero_serie =$request -> equ_numero_serie;
    		$Equipo -> equ_tipo_equipo =$request -> equ_tipo_equipo; 
    		$Equipo -> est_codigo =  1; 
    		$Equipo -> equ_fecha_adquisicion =$request -> equ_fecha_adquisicion; 
    		$Equipo -> equ_fecha_ingreso = Carbon::now();  
    		$Equipo -> save();
    		return redirect('/create');

    }
}
