<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\TSolicitud;
use App\TipoDeEquipo;
use App\TipoDeUsuario;
use App\Sede;
use App\Equipo;
use App\Detalle;
use App\SolicitudEquipamiento;
use App\Sala;
use App\Usuario;
use App\EstSolicitud;
use DB;
use Carbon\Carbon;
use Session;
use App\Mail\SolicitudEmail;
use Mail;

class SolicitudController extends Controller
{
    public function vista(){
    	$TipoEquipo = TipoDeEquipo::all();
    	$TipoUsuario = TipoDeUsuario::all();
    	$Sede = Sede::all();
        $usuarios = json_decode(Session::get('miSesion'));

        echo $usuarios[0]->tip_codigo;
    }

    public function mostrar(){
        $usuarios = json_decode(Session::get('miSesion'));
        $Sede = Sede::all();
        $TipoEquipo = TipoDeEquipo::all();
        $Sala = Sala::all();

        $verificarPermiso = DB::table('sol_usuarios')
            ->where('usu_rut','=', $usuarios[0]->usu_rut)
            ->select('tip_codigo')
            ->get();

        if ($verificarPermiso[0]->tip_codigo == 4) {
            $PendienteSol = DB::table('sol_solicitudes')
                ->join('sol_usuarios','sol_usuarios.usu_rut','=','sol_solicitudes.usu_rut')
                ->where('est_codigo', 1)
                ->select(DB::raw('count(*) as PendienteSol'))
                ->get();
            $AceptadoSol = DB::table('sol_solicitudes')
                ->join('sol_usuarios','sol_usuarios.usu_rut','=','sol_solicitudes.usu_rut')
                ->where('est_codigo', 2)
                ->select(DB::raw('count(*) as AceptadoSol'))
                ->get();
            $RechazadoSol = DB::table('sol_solicitudes')
                ->join('sol_usuarios','sol_usuarios.usu_rut','=','sol_solicitudes.usu_rut')
                ->where('est_codigo', 3)
                ->select(DB::raw('count(*) as RechazadoSol'))
                ->get();
        }else{
            $PendienteSol = DB::table('sol_solicitudes')
                ->join('sol_usuarios','sol_usuarios.usu_rut','=','sol_solicitudes.usu_rut')
                ->where('sol_solicitudes.usu_rut', $usuarios[0]->usu_rut)
                ->where('est_codigo', 1)
                ->select(DB::raw('count(*) as PendienteSol'))
                ->get();
            $AceptadoSol = DB::table('sol_solicitudes')
                ->join('sol_usuarios','sol_usuarios.usu_rut','=','sol_solicitudes.usu_rut')
                ->where('sol_solicitudes.usu_rut', $usuarios[0]->usu_rut)
                ->where('est_codigo', 2)
                ->select(DB::raw('count(*) as AceptadoSol'))
                ->get();
            $RechazadoSol = DB::table('sol_solicitudes')
                ->join('sol_usuarios','sol_usuarios.usu_rut','=','sol_solicitudes.usu_rut')
                ->where('sol_solicitudes.usu_rut', $usuarios[0]->usu_rut)
                ->where('est_codigo', 3)
                ->select(DB::raw('count(*) as RechazadoSol'))
                ->get();
        }

        return view('Solicitud')
            ->with('lista_tipoE',$TipoEquipo)
            ->with('lista_sede', $Sede)
            ->with('PendienteSol',$PendienteSol)
            ->with('AceptadoSol',$AceptadoSol)
            ->with('RechazadoSol',$RechazadoSol);
    }

    public function select(Request $request){
        if($request->ajax()){
            $output='';
            $query = $request -> get('query');

            if($query != ""){
                $data = DB::table('sol_salas')
                    ->where('sed_codigo','=',$query)
                    ->select('sal_codigo','sal_numero')
                    ->get();

                foreach ($data as $row) {
                    echo '<option value="'.$row->sal_codigo.'">'.$row->sal_numero.'</option>';
                }
            }else{
                echo '<option value="" disable="true" selected="true">Selecione aula</option>';
            }
        }
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

    public function buscarEquipo(Request $request){
        
        $output='';

        $query = $request -> get('query');
        $query1 = $request -> get('query1');

        if ($query != "" && $query1 != "") {
            $data = DB::table('sol_equipos')
                ->where('equ_tipo_equipo','=',$query1)
                ->where('est_codigo','=',1)
                ->limit($query)
                ->select('equ_codigo','equ_modelo','equ_marca','equ_numero_serie')
                ->paginate(15);
        }else if($query != "" && $query1 == ""){
            $data = DB::table('sol_equipos')
                ->where('est_codigo','=',1)
                ->limit($query)
                ->select('equ_codigo','equ_modelo','equ_marca','equ_numero_serie')
                ->get();
        }else if($query1 != "" && $query == ""){
            $data = DB::table('sol_equipos')
                ->where('equ_tipo_equipo','=',$query1)
                ->where('est_codigo','=',1)
                ->select('equ_codigo','equ_modelo','equ_marca','equ_numero_serie')
                ->paginate(15);
        }else{
            echo json_encode($output);
        }

        $total_row = $data->count();

        if ($total_row > 0) {
            $tabla = array('valor' => 1);
            foreach ($data as $row) {
                $output.='<tr><td>'.$row->equ_codigo.'</td><td>'.$row->equ_modelo.'</td><td>'.$row->equ_marca.'</td><td>'.$row->equ_numero_serie.'</td></tr>';
            }
        }else{
            $tabla = array('valor' => 0);
            $output = '
            <tr>
                <td align="center" colspan="5">No quedan equipos disponibles</td>
            </tr>
            ';
        }

        echo json_encode($output);

        
    }

    public function generar(Request $request){

        $usuarios = json_decode(Session::get('miSesion'));
    	$TipoEquipo = TipoDeEquipo::all();
    	$Sede = Sede::all();

        $result = Usuario::where('usu_rut', '=',$request -> rut)
            ->get();

        if ($result -> isEmpty()) {
            return back()->withErrors(['usu_rut' => 'El rut ingresado no existe'])
                ->withInput(request(['usu_rut']));
        }

		$equipos = DB::table('sol_equipos')
    		->join('sol_estados_equipo','sol_estados_equipo.est_codigo','=','sol_equipos.est_codigo')
            ->join('sol_tipos_equipo','sol_equipos.equ_tipo_equipo','=','sol_tipos_equipo.tip_id')
            ->where('sol_estados_equipo.est_nombre','=','Disponible')
            ->where('sol_tipos_equipo.tip_id','=',$request->input('equ_tipo_equipo'))
            ->limit($request->input('cantidad'))
            ->select('sol_equipos.equ_codigo','equ_modelo','equ_marca','equ_numero_serie','sol_equipos.est_codigo')
            ->paginate(15); 

        if($request->input('generar')){
			
			$solicitud = new TSolicitud();

    		$solicitud -> sol_titulo = $request -> sol_titulo;
    		$solicitud -> sol_motivo = $request -> sol_motivo;
    		$solicitud -> sol_fecha_creacion = Carbon::now();
    		$solicitud -> sol_fecha_entrega	= $request -> fecha . " " . $request -> hora;
    		$solicitud -> usu_rut = $request -> rut;
    		$solicitud -> sal_codigo = $request -> aula;
    		$solicitud -> est_codigo = 1;
    		$solicitud -> save();
            $request->session()->flash('alert-success', 'Se genero solicitud con exito');
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

            return view('ListaSolicitud');
		}else{
            $request->session()->flash('alert-success', 'Hubo un error al generar la solicitud');
	        return view('/Solicitud')
	        	->with('TablaInventario', $equipos)
	        	->with('Sedes',$Sede)
	    		->with('TiposEquipo',$TipoEquipo)
	    		->with('aula',$request->input('aula'));
    	}


    }

    public function vistas(Request $request){
        return view('ListaSolicitud');

    }

    public function FiltrarSol(Request $request){
        $EstSolicitud = EstSolicitud::all();
        $usuarios = json_decode(Session::get('miSesion'));

        $output='';

        $query = $request -> get('query');

        if($usuarios[0]->tip_codigo == 4){
           if ($query != "") {
            $data = DB::table('sol_solicitudes')
                ->join('sol_estados_solicitud','sol_solicitudes.est_codigo','=','sol_estados_solicitud.est_codigo')
                ->select('sol_fecha_entrega','sol_codigo','sol_estados_solicitud.est_nombre','sol_titulo','usu_rut','sal_codigo')
                ->where('sal_codigo', 'LIKE', '%'.$query.'%')
                ->orWhere('sol_titulo', 'LIKE', '%'.$query.'%')
                ->orWhere('sol_fecha_entrega', 'LIKE', '%'.$query.'%')
                ->orWhere('usu_rut', 'LIKE', '%'.$query.'%')
                ->orWhere('sol_estados_solicitud.est_nombre', 'LIKE', '%'.$query.'%')
                ->orWhere('sal_codigo', 'LIKE', '%'.$query.'%')
                ->paginate(15);
        }else{
            $data = DB::table('sol_solicitudes')
                ->join('sol_estados_solicitud','sol_solicitudes.est_codigo','=','sol_estados_solicitud.est_codigo')
                ->select('sol_fecha_entrega','sol_codigo','sol_estados_solicitud.est_nombre','sol_titulo','usu_rut','sal_codigo')
                ->paginate(15);
        }

            $total_row = $data->count();

        if ($total_row > 0) {
            foreach ($data as $row) {
                $output.='<tr><td>'.$row->sal_codigo.'</td><td>'.$row->sol_titulo.'</td><td>'.$row->sol_fecha_entrega.'</td><td>'.$row->usu_rut.'</td><td>'.$row->est_nombre.'</td><td>'.$row->sal_codigo.'</td><td><a href="/Solicitud/Detalle/'.$row->sol_codigo.'" ><input type="button" id="detalle" value="..." ></a></td></tr>';
            }
        }else{
            $output = '
            <tr>
                <td align="center" colspan="5">No quedan solicitudes disponibles</td>
            </tr>
            ';
        }
        echo json_encode($output);

        
        }else{
           if ($query != "") {
            $data = DB::table('sol_solicitudes')
                ->join('sol_estados_solicitud','sol_solicitudes.est_codigo','=','sol_estados_solicitud.est_codigo')
                ->select('sol_fecha_entrega','sol_codigo','sol_estados_solicitud.est_nombre','sol_titulo','usu_rut','sal_codigo')
                ->where('usu_rut','=',$usuarios[0]->usu_rut)
                ->where('sal_codigo', 'LIKE', '%'.$query.'%')
                ->orWhere('sol_titulo', 'LIKE', '%'.$query.'%')
                ->orWhere('sol_fecha_entrega', 'LIKE', '%'.$query.'%')
                ->orWhere('usu_rut', 'LIKE', '%'.$query.'%')
                ->orWhere('sol_estados_solicitud.est_nombre', 'LIKE', '%'.$query.'%')
                ->orWhere('sal_codigo', 'LIKE', '%'.$query.'%')
                ->paginate(15);
        }else{
            $data = DB::table('sol_solicitudes')
                ->join('sol_estados_solicitud','sol_solicitudes.est_codigo','=','sol_estados_solicitud.est_codigo')
                ->where('usu_rut','=',$usuarios[0]->usu_rut)
                ->select('sol_fecha_entrega','sol_codigo','sol_estados_solicitud.est_nombre','sol_titulo','usu_rut','sal_codigo')
               ->paginate(15);
        }

            $total_row = $data->count();

        if ($total_row > 0) {
            foreach ($data as $row) {
                $output.='<tr><td>'.$row->sal_codigo.'</td><td>'.$row->sol_titulo.'</td><td>'.$row->sol_fecha_entrega.'</td><td>'.$row->usu_rut.'</td><td>'.$row->est_nombre.'</td><td>'.$row->sal_codigo.'</td><td><a href="/Solicitud/Detalle'.$row->sol_codigo.'" ><input type="button" id="detalle" value="..." ></a></td></tr>';
            }
        }else{
            $output = '
            <tr>
                <td align="center" colspan="5">No quedan solicitudes disponibles</td>
            </tr>
            ';
        }
        echo json_encode($output);
        }
    }

}
