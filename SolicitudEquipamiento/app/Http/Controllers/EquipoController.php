<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Equipo;
use App\Baja;
use App\Mantenimiento;
use App\Http\Requests;
use App\EliminarEquipo;
use Carbon\Carbon;
use DB;

class EquipoController extends Controller
{
    public function vista(){
    	return view('AgregarEquipo');
    }

    public function create(Request $request){
    		$Equipo = new Equipo();


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
            ->paginate(10);
    return view ('/ListarEquipos', ['TablaInventario'=>$Equipo]);
    }

    public function show($id){
        $Equipo =  DB::table('sol_equipos')
            ->join('sol_estados_equipo','sol_estados_equipo.est_codigo','=','sol_equipos.est_codigo')
            ->join('sol_tipos_equipo','sol_equipos.equ_tipo_equipo','=','sol_tipos_equipo.tip_id')
            ->select('sol_equipos.equ_codigo','sol_equipos.equ_modelo','sol_equipos.equ_marca','sol_equipos.equ_numero_serie','sol_estados_equipo.est_nombre','equ_tipo_equipo','sol_tipos_equipo.tip_nombre','sol_equipos.equ_fecha_adquisicion')->where ('sol_equipos.equ_codigo','=',$id)
            
            ->first();
            
    return view ('/DetalleDeEquipo', ['detalle'=>$Equipo]);


    }

    public function update(Request $request){
        
        DB::table('sol_equipos')
            ->where('equ_codigo','=', $request -> equ_codigo)
            ->update(['equ_modelo' => $request -> equ_modelo]);

         DB::table('sol_equipos')
            ->where('equ_codigo','=', $request -> equ_codigo)
            ->update(['equ_marca' => $request -> equ_marca]);

         DB::table('sol_equipos')
            ->where('equ_codigo','=', $request -> equ_codigo)
            ->update(['equ_numero_serie' => $request -> equ_numero_serie]);

        DB::table('sol_equipos')
            ->where('equ_codigo','=', $request -> equ_codigo)
            ->update(['equ_fecha_adquisicion' => $request -> equ_fecha_adquisicion]);

             $check = $request -> get('options');   

             if ($check == 'mantencion') {

                DB::table('sol_equipos')
                ->where('equ_codigo','=', $request -> equ_codigo)
                ->update(['est_codigo' => 4]);

                $Mantenimiento = new Mantenimiento();
                $Mantenimiento -> equ_fecha_inicio = $request -> FInicio;
                $Mantenimiento -> equ_fecha_fin = $request -> FTermino;
                $Mantenimiento -> equ_obervacion = $request -> Mtextarea;
                $Mantenimiento -> equ_codigo = $request -> equ_codigo;
                $Mantenimiento -> save();
                }
            else if ($check == 'baja') {
                DB::table('sol_equipos')
                ->where('equ_codigo','=', $request -> equ_codigo)
                ->update(['est_codigo' => 3]);

                $Baja = new Baja();
                $Baja -> equ_fecha = Carbon::now(); 
                $Baja -> equ_observacion = $request -> Btextarea;
                $Baja -> equ_codigo = $request -> equ_codigo;
                $Baja -> save();
            }
        
        $Equipo =  DB::table('sol_equipos')
            ->join('sol_estados_equipo','sol_estados_equipo.est_codigo','=','sol_equipos.est_codigo')
            ->join('sol_tipos_equipo','sol_equipos.equ_tipo_equipo','=','sol_tipos_equipo.tip_id')
            ->select('sol_equipos.equ_codigo','equ_modelo','equ_marca','equ_numero_serie','sol_estados_equipo.est_nombre','sol_tipos_equipo.tip_nombre','equ_fecha_adquisicion')
            ->paginate(10);
            
         return view ('/ListarEquipos')
         ->with('TablaInventario',$Equipo);

        // if (condition) {
             # code...
         //}
    }

     public function delete(Request $request){

             $EliminarEquipo = new EliminarEquipo();

                $EliminarEquipo -> equ_codigo = $request -> equ_codigo;
                $EliminarEquipo -> equ_modelo = $request -> equ_modelo;
                $EliminarEquipo -> equ_marca = $request -> equ_marca;
                $EliminarEquipo -> equ_numero_serie = $request -> equ_numero_serie;
                $EliminarEquipo -> equ_tipo_equipo = $request -> equ_tipo_equipo; 
                $EliminarEquipo -> equ_fecha_adquisicion =$request -> equ_fecha_adquisicion; 
                $EliminarEquipo -> equ_fecha_ingreso = Carbon::now();  
                $EliminarEquipo -> save();

            DB::table('sol_equipos')
            ->where('equ_codigo','=', $request -> equ_codigo)
            ->delete();

           return redirect('/ListarEquipos');
}

}
