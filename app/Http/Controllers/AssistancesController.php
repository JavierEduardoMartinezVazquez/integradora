<?php

namespace App\Http\Controllers;
use Yajra\DataTables\Facades\DataTables;
use App\C_assistances;
use App\Exports\AssistancesExport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\User;
use App\C_business;
use Helpers;
use Carbon\Carbon;
use DB;

class AssistancesController extends Controller
{


    public function Assistances(Request $request)
    {

        /* //dd($request->only('business'));
        $assistances = C_assistances::assistancesFilter($request->business);
        //$assistances = C_assistances::assistancesFilter($request->all()); */

        return view('control.paginas.assistances');
    }

    public function obtener_business(){
        $empresa = C_business::all();
        $select_business= "<option value='0'>Seleccionar una empresa...</option>";
        foreach($empresa as $business){
            $select_business = $select_business."<option value='".$business->id."'>".$business->empresa."</option>";
        }
        return response()->json($select_business);

    }

    public function obtener_ultimo_id_assistances(){
        $ultimoNumeroTabla = C_assistances::select("id")->orderBy("id", "DESC")->take(1)->get();
        if(sizeof($ultimoNumeroTabla) == 0 || sizeof($ultimoNumeroTabla) == "" || sizeof($ultimoNumeroTabla) == null){
            $id = 1;
        }else{
            $id = $ultimoNumeroTabla[0]->id+1;
        }
        return response()->json($id);
    }
    public function listar_assistances (Request $request)
    {
        if($request->ajax()){
            $business_id = $request->business_id;
            $entrydate_from = $request->entrydate_from;
            $entrydate_to = $request->entrydate_to;
            //$data = C_assistances::select('id','Usuario','business','Fecha','Entrada','Salida','Observaciones','status');
            $data = DB::table('assistances as a')
            ->leftjoin('users as b', 'a.Usuario', '=', 'b.id')
            ->leftjoin('business as c', 'a.business', '=', 'c.id')
            ->select('a.id', 'b.name as Usuario', 'c.empresa as business', 'c.id as business_id', 'a.Fecha', 'a.Entrada', 'a.Salida', 'a.Observaciones', 'a.status')
            ->where(function($q) use ($business_id, $entrydate_from, $entrydate_to) {
                if($business_id > 0){
                    $q->where('c.id', $business_id );
                }
                if($entrydate_from != null){
                    $q->whereDate('a.Fecha', '>=', $entrydate_from);
                }
                if($entrydate_to != null){
                    $q->whereDate('a.Fecha', '<=', $entrydate_to);
                }
            })
            ->orderBy('id','DESC')
            ->get();
            return DataTables::of($data)
            ->addColumn('operaciones', function($data){
                $operaciones = '<div class="container">'.
                                    '<div class="row">'.
                                            //'<div class="col"><a href="javascript:void(0);" onclick="obtenerassistances('.$data->id.')"><i class="fas fa-pen-square" aria-hidden="true"></i></a></div>'.
                                            '<div class="col"><a href="javascript:void(0);" onclick="verificarbajaassistances('.$data->id.')"><i class="fa fa-minus-square" aria-hidden="true"></i></a></div>'.
                                        '</div>'.
                                '</div>';
                return $operaciones;
            })
            ->rawColumns(['operaciones'])
            ->make(true);
        }
    }

    public function obtener_assistances(Request $request){
        $assistances= C_assistances::where('id', $request->numero)->first();
        $permitirmodificacion = 1;
        if($assistances->status == 'BAJA'){
            $permitirmodificacion = 0;
        }
        $data = array(
            "assistances" => $assistances,
            "permitirmodificacion" => $permitirmodificacion
        );
        return response()->json($data);
    }
    public function modificar_assistances(Request $request){
        $assistances = C_assistances::where('id', $request->numero)->first();
        C_assistances::where('id', $request->numero)
        ->update([
            //atributo de la Base => $request-> Usuario de la caja de texto
            'Usuario'=> $request->Usuario,
            'business'=> $request->business,
            'Fecha'=> $request->Fecha,
            'Entrada'=> $request->Entrada,
            'Salida'=> $request->Salida,
            'Observaciones'=> $request->Observaciones,

        ]);
        return response()->json($assistances);
    }
    public function verificar_baja_assistances(Request $request){
        //variable = $request->variable que recibe del archivo .js
        $numero = $request->numero;
        $assistances = C_assistances::where('id', $numero)->first();
        return response()->json($assistances);
    }
    public function baja_assistances(Request $request){
        $assistances = C_assistances::where('id', $request->num)->first();
        C_assistances::where('id', $request->num)
        ->update([
            'status'=> 'BAJA'
        ]);
        return response()->json($assistances);
    }
    public function export_excel(Request $request){
        ini_set('max_execution_time', 300); // 5 minutos
        ini_set('memory_limit', '-1');
        $columns = ['Usuario','business','Fecha','Entrada','Salida','Observaciones','status'];
        return Excel::download(new AssistancesExport($columns, $request->business_id ,$request->entrydate_from, $request->entrydate_to), "Asistencias.xlsx");
    }

    public function obtener_fecha_actual_datetimelocal(Request $request){
        $fechas = Helpers::fecha_exacta_accion_dateinput();
        return response()->json($fechas);
    }

    //Leer codigo de barras
    public function leercodigo(Request $request){
        $buscarcodigo = $request->buscarcodigo;

        $exiteusuario = User::where('id', $buscarcodigo)->count();
        if($exiteusuario > 0){

            $exiteasistencia = C_assistances::where('Usuario', $buscarcodigo)->whereDate('Fecha', Carbon::now()->format("Y-m-d"))->count();

            if($exiteasistencia===0){
                $ultimoNumeroTabla = C_assistances::select("id")->orderBy("id", "DESC")->take(1)->get();
                if(sizeof($ultimoNumeroTabla) == 0 || sizeof($ultimoNumeroTabla) == "" || sizeof($ultimoNumeroTabla) == null){
                    $id = 1;
                }else{
                    $id = $ultimoNumeroTabla[0]->id+1;
                }
                $empresa = User::where('id', $buscarcodigo)->first();
                $assistances = new C_assistances;
                $assistances->Usuario=$buscarcodigo;
                $assistances->business=$empresa->empresa_id;
                $assistances->Fecha=Carbon::now()->format("Y-m-d");
                $assistances->Entrada=Carbon::now()->format("H:i:s");
                $assistances->Observaciones='NINGUNA';

                $assistances->status='ALTA';
                $assistances->save();
            }
            else{

                C_assistances::where('Usuario', $buscarcodigo)->where('Fecha', Carbon::now()->format("Y-m-d"))
                    ->update([
                        'Salida'=> Carbon::now()->format("H:i:s")
                    ]);
            }

        }

        return response()->json($buscarcodigo);
    }
}

