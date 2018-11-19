<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Equipo;
use App\Baja;
use App\Mantenimiento;
use App\Http\Requests;
use Carbon\Carbon;
use DB;

class EquipoController extends Controller
{
    public function vista(){
    	return view('AgregarEquipo');
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
    		return redirect('/ListarEquipos');

    }

    public function read(Request $request){

            $Equipo =  DB::table('sol_equipos')
            ->join('sol_estados_equipo','sol_estados_equipo.est_codigo','=','sol_equipos.est_codigo')
            ->join('sol_tipos_equipo','sol_equipos.equ_tipo_equipo','=','sol_tipos_equipo.tip_id')
            ->select('sol_equipos.equ_codigo','equ_modelo','equ_marca','equ_numero_serie','sol_estados_equipo.est_nombre','sol_tipos_equipo.tip_nombre','equ_fecha_adquisicion')
            ->get();
    return view ('/ListarEquipos', ['TablaInventario'=>$Equipo]);
    }

    public function show($id){
        $Equipo =  DB::table('sol_equipos')
            ->join('sol_estados_equipo','sol_estados_equipo.est_codigo','=','sol_equipos.est_codigo')
            ->join('sol_tipos_equipo','sol_equipos.equ_tipo_equipo','=','sol_tipos_equipo.tip_id')
            ->select('sol_equipos.equ_codigo','sol_equipos.equ_modelo','sol_equipos.equ_marca','sol_equipos.equ_numero_serie','sol_estados_equipo.est_nombre','sol_tipos_equipo.tip_nombre','sol_equipos.equ_fecha_adquisicion')->where ('sol_equipos.equ_codigo','=',$id)->
            first();
    return view ('/DetalleDeEquipo', ['detalle'=>$Equipo]);
    }

    public function update(Request $request){

        $equipoU = Equipo::find($request -> equ_codigo);
        $equipoU -> equ_modelo = $request -> equ_modelo;
        $equipoU -> equ_marca = $request -> equ_marca;
        $equipoU -> equ_numero_serie = $request -> equ_numero_serie;
        $equipoU -> equ_tipo_equipo = $request -> equ_tipo_equipo;
        $equipoU -> est_codigo = $request -> est_codigo;
        $equipoU -> equ_fecha_adquisicion = $request -> equ_fecha_adquisicion;
        $equipoU -> equ_fecha_ingreso = $request -> equ_fecha_ingreso;
        
         return view ('/ListarEquipos', ['detalle'=>$Equipo]);
    }
/*
    public function update($id){
       @switch($k)
            @case(0)
                fsdfsdf
            @breakswitch
             @case(1)
                sdfsdf
            @breakswitch
            @case(2)
                sdf
            @breakswitch
        @endswitch
    }*/
}
