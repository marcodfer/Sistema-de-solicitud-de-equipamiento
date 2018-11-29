<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Auditoria;
use App\EstSolicitud;
use Session;


class DetalleController extends Controller
{
    public function showDetalle($id){
        $Solicitud =  DB::table('sol_solicitudes')
            ->join('sol_estados_solicitud','sol_estados_solicitud.est_codigo','=','sol_solicitudes.est_codigo')
            ->join('sol_salas','sol_salas.sal_codigo','=','sol_solicitudes.sal_codigo')
            ->join('sol_sedes','sol_sedes.sed_codigo','=','sol_salas.sed_codigo')
            ->join('sol_usuarios','sol_usuarios.usu_rut','=','sol_solicitudes.usu_rut')
            ->join('sol_tipos_usuario','sol_tipos_usuario.tip_codigo','=','sol_usuarios.tip_codigo')
            ->where('sol_solicitudes.sol_codigo','=',$id)
            ->select('sol_codigo','sol_titulo','sol_motivo','sol_fecha_entrega','sol_solicitudes.usu_rut','sol_sedes.sed_nombre','sol_solicitudes.sal_codigo','sol_solicitudes.est_codigo','sol_estados_solicitud.est_nombre','sol_tipos_usuario.tip_nombre')
            ->get();
            

        $equipos = DB::table('sol_equipos')
        	->join('sol_detalle_solicitud','sol_equipos.equ_codigo','=','sol_detalle_solicitud.equ_codigo')
        	->join('sol_tipos_equipo','sol_equipos.equ_tipo_equipo','=','sol_tipos_equipo.tip_id')
        	->where('sol_detalle_solicitud.sol_codigo','=',$id)
        	->select('sol_equipos.equ_codigo','equ_modelo','equ_marca','equ_numero_serie','sol_tipos_equipo.tip_nombre')
        	->get();

        $modificacion = DB::table('sol_auditoria_solicitud')
    		->where('sol_codigo','=',$id)
    		->select('aud_rut','equ_codigo','aud_observacion','aud_fecha_modificacion')
    		->get();


        return view('detalleSolicitud')
        	->with('listaSolicitud',$Solicitud)
        	->with('equipos',$equipos)
        	->with('eliminados',$modificacion);
    }

    public function quitarEquipo($id, $solicitud){

    	$usuarios = json_decode(Session::get('miSesion'));

    	$detalle = DB::table('sol_detalle_solicitud')
    		->where('sol_codigo','=',$solicitud)
    		->where('equ_codigo','=',$id)
    		->select('det_id')
			->get();

		$auditoria = new Auditoria();

		$auditoria -> aud_rut = $usuarios[0]->usu_rut;
		$auditoria -> det_id = $detalle[0]->det_id;
		$auditoria -> sol_codigo = $solicitud;
		$auditoria -> equ_codigo = $id;
		$auditoria -> aud_observacion = 'Eliminar';
		$auditoria -> aud_fecha_modificacion = now();
		$auditoria -> save();

		DB::table('sol_detalle_solicitud')
			->where('det_id','=',$detalle[0]->det_id)
			->delete();

		$Solicitud =  DB::table('sol_solicitudes')
            ->join('sol_estados_solicitud','sol_estados_solicitud.est_codigo','=','sol_solicitudes.est_codigo')
            ->join('sol_salas','sol_salas.sal_codigo','=','sol_solicitudes.sal_codigo')
            ->join('sol_sedes','sol_sedes.sed_codigo','=','sol_salas.sed_codigo')
            ->join('sol_usuarios','sol_usuarios.usu_rut','=','sol_solicitudes.usu_rut')
            ->join('sol_tipos_usuario','sol_tipos_usuario.tip_codigo','=','sol_usuarios.tip_codigo')
            ->where('sol_solicitudes.sol_codigo','=',$solicitud)
            ->select('sol_codigo','sol_titulo','sol_motivo','sol_fecha_entrega','sol_solicitudes.usu_rut','sol_sedes.sed_nombre','sol_solicitudes.sal_codigo','sol_solicitudes.est_codigo','sol_estados_solicitud.est_nombre','sol_tipos_usuario.tip_nombre')
            ->get();
            

        $equipos = DB::table('sol_equipos')
        	->join('sol_detalle_solicitud','sol_equipos.equ_codigo','=','sol_detalle_solicitud.equ_codigo')
        	->join('sol_tipos_equipo','sol_equipos.equ_tipo_equipo','=','sol_tipos_equipo.tip_id')
        	->where('sol_detalle_solicitud.sol_codigo','=',$solicitud)
        	->select('sol_equipos.equ_codigo','equ_modelo','equ_marca','equ_numero_serie','sol_tipos_equipo.tip_nombre')
        	->get();

    	$modificacion = DB::table('sol_auditoria_solicitud')
    		->where('sol_codigo','=',$solicitud)
    		->select('aud_rut','equ_codigo','aud_observacion','aud_fecha_modificacion')
    		->get();



        return view('detalleSolicitud')
        	->with('listaSolicitud',$Solicitud)
        	->with('equipos',$equipos)
        	->with('eliminados',$modificacion);

    }

    public function modificar(Request $request){
        
        $codigo = $request -> codigo;
        switch ($request->input('action')) {
            case 'aceptar':
                DB::table('sol_solicitudes')
                    ->where('sol_codigo','=', $codigo)
                    ->update(['est_codigo' => 2]);
                break;
            case 'rechazar':
                DB::table('sol_solicitudes')
                    ->where('sol_codigo','=', $codigo)
                    ->update(['est_codigo' => 3]);
                break;
            case 'finalizar':
                DB::table('sol_solicitudes')
                    ->where('sol_codigo','=', $codigo)
                    ->update(['est_codigo' => 4]);
                break;
            case 'cancelar':
                DB::table('sol_solicitudes')
                    ->where('sol_codigo','=', $codigo)
                    ->update(['est_codigo' => 5]);
                break;
        }

        return redirect()->route('ListaSolicitudes');

    }
}
