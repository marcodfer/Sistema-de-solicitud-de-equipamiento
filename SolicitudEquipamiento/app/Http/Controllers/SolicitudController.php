<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TSolicitud;
use App\TipoDeEquipo;
use App\TipoDeUsuario;
use App\Sede;
use App\Equipo;
use App\Detalle;
use DB;
use Carbon\Carbon;
use Session;

class SolicitudController extends Controller
{
    public function vista(){
    	$TipoEquipo = TipoDeEquipo::all();
    	$TipoUsuario = TipoDeUsuario::all();
    	$Sede = Sede::all();
    	return view('Solicitud')
    		->with('TiposEquipo',$TipoEquipo)
    		->with('TiposUsuario',$TipoUsuario)
    		->with('Sedes',$Sede);
    }

    public function read(Request $request){
        $usuarios = json_decode(Session::get('miSesion'));
    	$TipoEquipo = TipoDeEquipo::all();
    	$Solicitud =  DB::table('sol_detalle_solicitud')
    		->join('sol_solicitudes','sol_solicitudes.sol_codigo','=','sol_detalle_solicitud.sol_codigo')
    		->join('sol_equipos','sol_equipos.equ_codigo','=','sol_detalle_solicitud.equ_codigo')
    		->where('sol_solicitudes.usu_rut','=',$usuarios[0]->usu_rut)
    		->select('sol_solicitudes.sol_fecha_creacion','sol_solicitudes.sol_fecha_entrega','sol_solicitudes.sol_codigo','sol_solicitudes.usu_rut','sol_solicitudes.est_codigo','sol_solicitudes.sal_codigo')
            ->distinct()
    		->get();
		return view ('ListaSolicitud')
			->with('ListaS', $Solicitud)
			->with('TiposEquipo',$TipoEquipo);
    }

    public function generar(Request $request){

    	$TipoEquipo = TipoDeEquipo::all();
    	$Sede = Sede::all();
		$equipos = DB::table('sol_equipos')
		    		->join('sol_estados_equipo','sol_estados_equipo.est_codigo','=','sol_equipos.est_codigo')
		            ->join('sol_tipos_equipo','sol_equipos.equ_tipo_equipo','=','sol_tipos_equipo.tip_id')
		            ->where('sol_estados_equipo.est_nombre','=','Disponible')
		            ->where('sol_tipos_equipo.tip_id','=',$request->input('equ_tipo_equipo'))
		            ->limit($request->input('cantidad'))
		            ->select('sol_equipos.equ_codigo','equ_modelo','equ_marca','equ_numero_serie','sol_equipos.est_codigo')
		            ->get();

        if($request->input('generar')){
			
			$solicitud = new TSolicitud();
			$usuarios = json_decode(Session::get('miSesion'));

    		$solicitud -> sol_titulo = $request -> sol_titulo;
    		$solicitud -> sol_motivo = $request -> sol_motivo;
    		$solicitud -> sol_fecha_creacion = Carbon::now();
    		$solicitud -> sol_fecha_entrega	= $request -> fecha . " " . $request -> hora;
    		$solicitud -> usu_rut = $usuarios[0]->usu_rut;
    		$solicitud -> sal_codigo = $request -> aula;
    		$solicitud -> est_codigo = 1;
    		$solicitud -> save();

    		$id = $solicitud -> id;

    		foreach ($equipos as $equipo) {
    			DB::table('sol_equipos')
    			->where('equ_codigo',$equipo -> equ_codigo)
    			->update(['sol_equipos.est_codigo' => 2]);


				$detalleS = new Detalle();
				$detalleS -> sol_codigo = $id;
				$detalleS -> equ_codigo = $equipo -> equ_codigo;
				$detalleS -> save();
    		}
            $Solicitud =  DB::table('sol_detalle_solicitud')
                ->join('sol_solicitudes','sol_solicitudes.sol_codigo','=','sol_detalle_solicitud.sol_codigo')
                ->join('sol_equipos','sol_equipos.equ_codigo','=','sol_detalle_solicitud.equ_codigo')
                ->where('sol_solicitudes.usu_rut','=',$usuarios[0]->usu_rut)
                ->select('sol_solicitudes.sol_fecha_creacion','sol_solicitudes.sol_fecha_entrega','sol_solicitudes.sol_codigo','sol_solicitudes.usu_rut','sol_solicitudes.est_codigo','sol_solicitudes.sal_codigo')
                ->distinct()
                ->get();
            return view ('ListaSolicitud')
                ->with('ListaS', $Solicitud)
                ->with('TiposEquipo',$TipoEquipo);
		}else{
	        return view('/Solicitud')
	        	->with('TablaInventario', $equipos)
	        	->with('Sedes',$Sede)
	    		->with('TiposEquipo',$TipoEquipo)
	    		->with('aula',$request->input('aula'));
    	}


    }
}
