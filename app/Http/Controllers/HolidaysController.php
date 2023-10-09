<?php

namespace App\Http\Controllers;
use Yajra\DataTables\DataTables;
use App\C_holidays;

use Illuminate\Http\Request;

class HolidaysController extends Controller
{
    public function Holidays()
    {
        return view('control.paginas.holidays');
    }
    public function obtener_ultimo_id_holidays(){
        $ultimoNumeroTabla = C_holidays::select("id")->orderBy("id", "DESC")->take(1)->get();
        if(sizeof($ultimoNumeroTabla) == 0 || sizeof($ultimoNumeroTabla) == "" || sizeof($ultimoNumeroTabla) == null){
            $id = 1;
        }else{
            $id = $ultimoNumeroTabla[0]->id+1;   
        }
        return response()->json($id);
    }
    public function guardar_holidays(Request $request){
        $ultimoNumeroTabla = C_holidays::select("id")->orderBy("id", "DESC")->take(1)->get();
        if(sizeof($ultimoNumeroTabla) == 0 || sizeof($ultimoNumeroTabla) == "" || sizeof($ultimoNumeroTabla) == null){
            $id = 1;
        }else{
            $id = $ultimoNumeroTabla[0]->id+1;
        }
        $holidays = new C_holidays;
        $holidays->empleado=$request->empleado;
        $holidays->paterno=$request->paterno;
        $holidays->materno=$request->materno;
        $holidays->solicitud=$request->solicitud;
        $holidays->sucursal=$request->sucursal;
        $holidays->area=$request->area;
        $holidays->ingreso=$request->ingreso;
        $holidays->inicio=$request->inicio;
        $holidays->final=$request->final;
        $holidays->totaldias=$request->totaldias;
        $holidays->inlabores=$request->inlabores;
        $holidays->disponibles=$request->disponibles;
        $holidays->pago=$request->pago;
        $holidays->status='ALTA';        
        $holidays->save();
        return response()->json($holidays);
    }
    public function listar_holidays (Request $request)
    {
        if($request->ajax()){
            $data = C_holidays::select('id', 'empleado', 'paterno', 'materno', 'solicitud', 'sucursal', 'area', 'ingreso', 'inicio', 'final', 'totaldias', 'inlabores', 'disponibles', 'pago', 'status');
            return DataTables::of($data)
            ->addColumn('operaciones', function($data){
                $operaciones = '<div class="container">'.
                                    '<div class="row">'.
                                            '<div class="col"><a href="javascript:void(0);" onclick="obtenerholidays('.$data->id.')"><i class="fas fa-pen-square" aria-hidden="true"></i></a></div>'.
                                            '<div class="col"><a href="javascript:void(0);" onclick="verificarbajaholidays('.$data->id.')"><i class="fa fa-minus-square" aria-hidden="true"></i></a></div>'.
                                        '</div>'.
                                '</div>';
                return $operaciones;
            })
            ->rawColumns(['operaciones'])
            ->make(true);
        }
    }

    public function obtener_holidays(Request $request){
        $holidays= C_holidays::where('id', $request->numero)->first();
        $permitirmodificacion = 1;
        if($holidays->status == 'BAJA'){ 
            $permitirmodificacion = 0;
        }
        $data = array(
            "holidays" => $holidays,
            "permitirmodificacion" => $permitirmodificacion
        );
        return response()->json($data);
    }
    public function modificar_holidays(Request $request){
        $holidays = C_holidays::where('id', $request->numero)->first();
        C_holidays::where('id', $request->numero)
        ->update([
            //atributo de la Base => $request-> nombre de la caja de texto
            'empleado'=>$request->empleado,
            'paterno'=>$request->paterno,
            'materno'=>$request->materno,
            'solicitud'=>$request->solicitud,
            'sucursal'=>$request->sucursal,
            'area'=>$request->area,
            'ingreso'=> $request->ingreso,
            'inicio'=> $request->inicio,
            'final'=> $request->final,
            'totaldias'=> $request->totaldias,
            'inlabores'=> $request->inlabores,
            'disponibles'=> $request->disponibles,
            'pago'=> $request->pago
        ]);
        return response()->json($holidays);
    }
    public function verificar_baja_holidays(Request $request){
        //variable = $request->variable que recibe del archivo .js
        $numero = $request->numero;
        $holidays = C_holidays::where('id', $numero)->first();
        return response()->json($holidays);
    }
    public function baja_holidays(Request $request){
        $holidays = C_holidays::where('id', $request->num)->first();
        C_holidays::where('id', $request->num)
        ->update([
            'status'=> 'BAJA'
        ]);
        return response()->json($holidays);
    }
}

