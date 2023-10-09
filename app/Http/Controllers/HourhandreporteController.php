<?php

namespace App\Http\Controllers;
use Yajra\DataTables\DataTables;
use App\C_hourhandreporte;

use Illuminate\Http\Request;

class HourhandreporteController extends Controller
{
    public function Hourhandreporte()
    {
        return view('control.paginas.hourhandreporte');
    }
    public function obtener_ultimo_id_hourhandreporte(){
        $ultimoNumeroTabla = C_hourhandreporte::select("id")->orderBy("id", "DESC")->take(1)->get();
        if(sizeof($ultimoNumeroTabla) == 0 || sizeof($ultimoNumeroTabla) == "" || sizeof($ultimoNumeroTabla) == null){
            $id = 1;
        }else{
            $id = $ultimoNumeroTabla[0]->id+1;   
        }
        return response()->json($id);
    }
    public function guardar_hourhandreporte(Request $request){
        $ultimoNumeroTabla = C_hourhandreporte::select("id")->orderBy("id", "DESC")->take(1)->get();
        if(sizeof($ultimoNumeroTabla) == 0 || sizeof($ultimoNumeroTabla) == "" || sizeof($ultimoNumeroTabla) == null){
            $id = 1;
        }else{
            $id = $ultimoNumeroTabla[0]->id+1;
        }
        $hourhandreporte = new C_hourhandreporte;
        $hourhandreporte->entrada=$request->entrada;
        $hourhandreporte->salida=$request->salida;
        $hourhandreporte->empresa=$request->empresa;
        $hourhandreporte->status='ALTA';        
        $hourhandreporte->save();
        return response()->json($hourhandreporte);
    }
    public function listar_hourhandreporte (Request $request)
    {
        if($request->ajax()){
            $data = C_hourhandreporte::select('id', 'entrada', 'salida', 'empresa', 'status');
            return DataTables::of($data)
            ->addColumn('operaciones', function($data){
                $operaciones = '<div class="container">'.
                                    '<div class="row">'.
                                            '<div class="col"><a href="javascript:void(0);" onclick="obtenerhourhandreporte('.$data->id.')"><i class="fas fa-pen-square" aria-hidden="true"></i></a></div>'.
                                            '<div class="col"><a href="javascript:void(0);" onclick="verificarbajahourhandreporte('.$data->id.')"><i class="fa fa-minus-square" aria-hidden="true"></i></a></div>'.
                                        '</div>'.
                                '</div>';
                return $operaciones;
            })
            ->rawColumns(['operaciones'])
            ->make(true);
        }
    }

    public function obtener_hourhandreporte(Request $request){
        $hourhandreporte= C_hourhandreporte::where('id', $request->numero)->first();
        $permitirmodificacion = 1;
        if($hourhandreporte->status == 'BAJA'){ 
            $permitirmodificacion = 0;
        }
        $data = array(
            "hourhandreporte" => $hourhandreporte,
            "permitirmodificacion" => $permitirmodificacion
        );
        return response()->json($data);
    }
    public function modificar_hourhandreporte(Request $request){
        $hourhandreporte = C_hourhandreporte::where('id', $request->numero)->first();
        C_hourhandreporte::where('id', $request->numero)
        ->update([
            //atributo de la Base => $request-> nombre de la caja de texto
            'entrada'=> $request->entrada,
            'salida'=> $request->salida,
            'empresa'=> $request->empresa
        ]);
        return response()->json($hourhandreporte);
    }
    public function verificar_baja_hourhandreporte(Request $request){
        //variable = $request->variable que recibe del archivo .js
        $numero = $request->numero;
        $hourhandreporte = C_hourhandreporte::where('id', $numero)->first();
        return response()->json($hourhandreporte);
    }
    public function baja_hourhandreporte(Request $request){
        $hourhandreporte = C_hourhandreporte::where('id', $request->num)->first();
        C_hourhandreporte::where('id', $request->num)
        ->update([
            'status'=> 'BAJA'
        ]);
        return response()->json($hourhandreporte);
    }
}

