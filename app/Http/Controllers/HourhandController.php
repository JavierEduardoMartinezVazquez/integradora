<?php

namespace App\Http\Controllers;
use Yajra\DataTables\DataTables;
use App\C_hourhand;

use Illuminate\Http\Request;

class HourhandController extends Controller
{
    public function Hourhand()
    {
        return view('control.paginas.hourhand');
    }
    public function obtener_ultimo_id_hourhand(){
        $ultimoNumeroTabla = C_hourhand::select("id")->orderBy("id", "DESC")->take(1)->get();
        if(sizeof($ultimoNumeroTabla) == 0 || sizeof($ultimoNumeroTabla) == "" || sizeof($ultimoNumeroTabla) == null){
            $id = 1;
        }else{
            $id = $ultimoNumeroTabla[0]->id+1;   
        }
        return response()->json($id);
    }
    public function guardar_hourhand(Request $request){
        $ultimoNumeroTabla = C_hourhand::select("id")->orderBy("id", "DESC")->take(1)->get();
        if(sizeof($ultimoNumeroTabla) == 0 || sizeof($ultimoNumeroTabla) == "" || sizeof($ultimoNumeroTabla) == null){
            $id = 1;
        }else{
            $id = $ultimoNumeroTabla[0]->id+1;
        }
        $hourhand = new C_hourhand;
        $hourhand->entrada=$request->entrada;
        $hourhand->salida=$request->salida;
        $hourhand->status='ALTA';        
        $hourhand->save();
        return response()->json($hourhand);
    }
    public function listar_hourhand (Request $request)
    {
        if($request->ajax()){
            $data = C_hourhand::select('id', 'entrada', 'salida', 'status');
            return DataTables::of($data)
            ->addColumn('operaciones', function($data){
                $operaciones = '<div class="container">'.
                                    '<div class="row">'.
                                            '<div class="col"><a href="javascript:void(0);" onclick="obtenerhourhand('.$data->id.')"><i class="fas fa-pen-square" aria-hidden="true"></i></a></div>'.
                                            '<div class="col"><a href="javascript:void(0);" onclick="verificarbajahourhand('.$data->id.')"><i class="fa fa-minus-square" aria-hidden="true"></i></a></div>'.
                                        '</div>'.
                                '</div>';
                return $operaciones;
            })
            ->rawColumns(['operaciones'])
            ->make(true);
        }
    }

    public function obtener_hourhand(Request $request){
        $hourhand= C_hourhand::where('id', $request->numero)->first();
        $permitirmodificacion = 1;
        if($hourhand->status == 'BAJA'){ 
            $permitirmodificacion = 0;
        }
        $data = array(
            "hourhand" => $hourhand,
            "permitirmodificacion" => $permitirmodificacion
        );
        return response()->json($data);
    }
    public function modificar_hourhand(Request $request){
        $hourhand = C_hourhand::where('id', $request->numero)->first();
        C_hourhand::where('id', $request->numero)
        ->update([
            //atributo de la Base => $request-> nombre de la caja de texto
            'entrada'=> $request->entrada,
            'salida'=> $request->salida
        ]);
        return response()->json($hourhand);
    }
    public function verificar_baja_hourhand(Request $request){
        //variable = $request->variable que recibe del archivo .js
        $numero = $request->numero;
        $hourhand = C_hourhand::where('id', $numero)->first();
        return response()->json($hourhand);
    }
    public function baja_hourhand(Request $request){
        $hourhand = C_hourhand::where('id', $request->num)->first();
        C_hourhand::where('id', $request->num)
        ->update([
            'status'=> 'BAJA'
        ]);
        return response()->json($hourhand);
    }
}

