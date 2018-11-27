<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Equipo;
use App\Baja;
use App\Mantenimiento;
use App\Http\Requests;
use App\EliminarEquipo;
use Carbon\Carbon;
use App\EstadoEquipo;
use App\TipoDeEquipo;
use DB;
class EquipoController extends Controller
{
    public function vista(){
        return view('AgregarEquipo');
    }
    public function create(Request $request){
        try {
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
            $request->session()->flash('alert-success', 'Se agrego equipo con exito');
            return redirect('/ListarEquipos');
        } catch (Exception $e) {
            $request->session()->flash('alert-danger', 'No se puedo agregar equipo');
            return redirect('/ListarEquipos');
        }
            
    }
    public function read(Request $request){
         try {
            
        } catch (Exception $e) {
            $request->session()->flash('alert-danger', 'No se puedo agregar equipo');
            return redirect('/ListarEquipos');
        }
            $tipoequipo =  TipoDeEquipo::all();

            $Equipo =  DB::table('sol_equipos')
            ->join('sol_estados_equipo','sol_estados_equipo.est_codigo','=','sol_equipos.est_codigo')
            ->join('sol_tipos_equipo','sol_equipos.equ_tipo_equipo','=','sol_tipos_equipo.tip_id')
            ->select('sol_equipos.equ_codigo','equ_modelo','equ_marca','equ_numero_serie','sol_estados_equipo.est_nombre','sol_tipos_equipo.tip_nombre','equ_fecha_adquisicion')
            ->paginate(3);
    return view ('/ListarEquipos', ['TablaInventario'=>$Equipo])
    ->with('tipoequipo', $tipoequipo);

    }

    public function Filtrar(Request $request){
        $input = $request->get('TBuscar'); 
        dd($input);   


            $tipoequipo =  TipoDeEquipo::all();

            $Equipo =  DB::table('sol_equipos')
            ->join('sol_estados_equipo','sol_estados_equipo.est_codigo','=','sol_equipos.est_codigo')
            ->join('sol_tipos_equipo','sol_equipos.equ_tipo_equipo','=','sol_tipos_equipo.tip_id')
            ->select('sol_equipos.equ_codigo','equ_modelo','equ_marca','equ_numero_serie','sol_estados_equipo.est_nombre','sol_tipos_equipo.tip_nombre','equ_fecha_adquisicion')
            ->paginate(3)
            ->get();
    return view ('/ListarEquipos', ['TablaInventario'=>$Equipo])
    ->with('tipoequipo', $tipoequipo);
    }


    public function show($id){

        $equipoId = DB::table('sol_equipos')
            ->where('equ_codigo','=', $id)->get();

        $estado = $equipoId[0] -> est_codigo;
        if($estado==1)
        {
            $estado = DB:: table('sol_estados_equipo')
            ->where('est_codigo','!=', 1)
            ->where('est_codigo','!=', 2 )->get();
            
            $Equipo =  DB::table('sol_equipos')
            ->join('sol_estados_equipo','sol_estados_equipo.est_codigo','=','sol_equipos.est_codigo')
            ->join('sol_tipos_equipo','sol_tipos_equipo.tip_id','=','sol_equipos.equ_tipo_equipo')
            ->select('sol_equipos.equ_codigo','sol_equipos.equ_modelo','sol_equipos.equ_fecha_ingreso','sol_equipos.est_codigo','sol_equipos.equ_marca','sol_equipos.equ_numero_serie','sol_estados_equipo.est_nombre','equ_tipo_equipo','sol_tipos_equipo.tip_nombre','sol_equipos.equ_fecha_adquisicion')->where ('sol_equipos.equ_codigo','=',$id)->first();
        } elseif ($estado==2){
            $estado = DB:: table('sol_estados_equipo')
            ->where('est_codigo','!=', 1)
            ->where('est_codigo','!=', 2 )
            ->where('est_codigo','!=', 3 )
            ->where('est_codigo','!=', 4 )
            ->get();

            $Equipo =  DB::table('sol_equipos')
            ->join('sol_estados_equipo','sol_estados_equipo.est_codigo','=','sol_equipos.est_codigo')
            ->join('sol_tipos_equipo','sol_tipos_equipo.tip_id','=','sol_equipos.equ_tipo_equipo')
            ->select('sol_equipos.equ_codigo','sol_equipos.equ_modelo','sol_equipos.equ_fecha_ingreso','sol_equipos.est_codigo','sol_equipos.equ_marca','sol_equipos.equ_numero_serie','sol_estados_equipo.est_nombre','equ_tipo_equipo','sol_tipos_equipo.tip_nombre','sol_equipos.equ_fecha_adquisicion')->where ('sol_equipos.equ_codigo','=',$id)->first();
        }elseif ($estado == 3) {
            $estado = DB:: table('sol_estados_equipo')
            ->where('est_codigo','!=', 2)
            ->where('est_codigo','!=', 3 )
            ->get();
            $Equipo =  DB::table('sol_equipos')
            ->join('sol_estados_equipo','sol_estados_equipo.est_codigo','=','sol_equipos.est_codigo')
            ->join('sol_tipos_equipo','sol_tipos_equipo.tip_id','=','sol_equipos.equ_tipo_equipo')
            ->join('sol_equipo_baja', 'sol_equipo_baja.equ_codigo','=','sol_equipos.equ_codigo')
            ->select('sol_equipos.equ_codigo','sol_equipos.equ_modelo','sol_equipos.equ_fecha_ingreso','sol_equipos.est_codigo','sol_equipos.equ_marca','sol_equipos.equ_numero_serie','sol_equipo_baja.equ_fecha','sol_equipo_baja.equ_observacion','sol_estados_equipo.est_nombre','equ_tipo_equipo','sol_tipos_equipo.tip_nombre','sol_equipos.equ_fecha_adquisicion')->where ('sol_equipos.equ_codigo','=',$id)->first();
        }elseif ($estado == 4) {
            $estado = DB:: table('sol_estados_equipo')
            ->where('est_codigo','!=', 2)
            ->where('est_codigo','!=', 4)
            ->get();
            $Equipo =  DB::table('sol_equipos')
            ->join('sol_estados_equipo','sol_estados_equipo.est_codigo','=','sol_equipos.est_codigo')
            ->join('sol_tipos_equipo','sol_tipos_equipo.tip_id','=','sol_equipos.equ_tipo_equipo')
            ->join('sol_equipo_mantencion','sol_equipo_mantencion.equ_codigo','=','sol_equipos.equ_codigo')
            ->select('sol_equipos.equ_codigo','sol_equipos.equ_modelo','sol_equipos.equ_fecha_ingreso','sol_equipos.equ_marca','sol_equipos.equ_numero_serie','sol_equipo_mantencion.equ_fecha_inicio','sol_equipo_mantencion.equ_fecha_fin','sol_equipo_mantencion.equ_observacion','sol_equipos.est_codigo','sol_estados_equipo.est_nombre','equ_tipo_equipo','sol_tipos_equipo.tip_nombre','sol_equipos.equ_fecha_adquisicion')->where ('sol_equipos.equ_codigo','=',$id)->first();
        }         
    return view ('/DetalleDeEquipo')
        ->with('detalle', $Equipo)
        ->with('estado', $estado);

    }


   public function FiltrarEquipo(Request $request){

        //metodo text
        $output='';

        $query = $request -> get('query');
        $query1 = $request -> get('query1');

        if ($query != "") {
            $data = DB::table('sol_equipos')
                ->where('equ_tipo_equipo','=')
                ->where('est_codigo','=',1)
                ->limit($query)
                ->select('equ_codigo','equ_modelo','equ_marca','equ_numero_serie')
                ->get();
        }else if($query != ""){
            $data = DB::table('sol_equipos')
                ->where('est_codigo','=',1)
                ->limit($query)
                ->select('equ_codigo','equ_modelo','equ_marca','equ_numero_serie')
                ->get();
        }else if($query1 != ""){
            $data = DB::table('sol_equipos')
                ->where('equ_tipo_equipo','=')
                ->where('est_codigo','=',1)
                ->select('equ_codigo','equ_modelo','equ_marca','equ_numero_serie')
                ->get();
        }else{
            echo json_encode($output);
        }

        $total_row = $data->count();

        if ($total_row > 0) {
            foreach ($data as $row) {
                $output.='<tr><td>'.$row->equ_codigo.'</td><td>'.$row->equ_modelo.'</td><td>'.$row->equ_marca.'</td><td>'.$row->equ_numero_serie.'</td></tr>';
            }
        }else{
            $output = '
            <tr>
                <td align="center" colspan="5">No quedan equipos disponibles</td>
            </tr>
            ';
        }
//fin metodo text
        echo json_encode($output);
    
    }

    public function update(Request $request){


        $tipoequipo =  TipoDeEquipo::all();

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

             $select = $request -> get('EstadoC');   
             if ($select == '4') {
                DB::table('sol_equipos')
                ->where('equ_codigo','=', $request -> equ_codigo)
                ->update(['est_codigo' => 4]);
                $Mantenimiento = new Mantenimiento();
                $Mantenimiento -> equ_fecha_inicio = $request -> FInicio;
                $Mantenimiento -> equ_fecha_fin = $request -> FTermino;
                $Mantenimiento -> equ_observacion = $request -> Mtextarea;
                $Mantenimiento -> equ_codigo = $request -> equ_codigo;
                $Mantenimiento -> save();
                }
            else if ($select == '3') {
                DB::table('sol_equipos')
                ->where('equ_codigo','=', $request -> equ_codigo)
                ->update(['est_codigo' => 3]);
                $Baja = new Baja();
                $Baja -> equ_fecha = Carbon::now(); 
                $Baja -> equ_observacion = $request -> Btextarea;
                $Baja -> equ_codigo = $request -> equ_codigo;
                $Baja -> save();
            }else if ($select == '1') {
                DB::table('sol_equipos')
                ->where('equ_codigo','=', $request -> equ_codigo)
                ->update(['est_codigo' => 1]);
            
            }
        
             $Equipo =  DB::table('sol_equipos')
            ->join('sol_estados_equipo','sol_estados_equipo.est_codigo','=','sol_equipos.est_codigo')
            ->join('sol_tipos_equipo','sol_equipos.equ_tipo_equipo','=','sol_tipos_equipo.tip_id')
            ->select('sol_equipos.equ_codigo','equ_modelo','equ_marca','equ_numero_serie','sol_estados_equipo.est_nombre','sol_tipos_equipo.tip_nombre', 'equ_fecha_adquisicion')
             
            ->paginate(3);

 $request->session()->flash('alert-success', 'User was successful added!');
         return view ('/ListarEquipos')
            ->with('TablaInventario', $Equipo)
            ->with('tipoequipo', $tipoequipo);

    }
   
}