<?php

namespace App\Http\Controllers;
use Yajra\DataTables\DataTables;
use App\C_ventas;

use Illuminate\Http\Request;

class VentasController extends Controller
{
    public function Ventas()
    {
        return view('control.paginas.ventas');
    }
    public function obtener_ultimo_id_ventas(){
        $ultimoNumeroTabla = C_ventas::select("id")->orderBy("id", "DESC")->take(1)->get();
        if(sizeof($ultimoNumeroTabla) == 0 || sizeof($ultimoNumeroTabla) == "" || sizeof($ultimoNumeroTabla) == null){
            $id = 1;
        }else{
            $id = $ultimoNumeroTabla[0]->id+1;   
        }
        return response()->json($id);
    }
    public function guardar_ventas(Request $request){
        $ultimoNumeroTabla = C_ventas::select("id")->orderBy("id", "DESC")->take(1)->get();
        if(sizeof($ultimoNumeroTabla) == 0 || sizeof($ultimoNumeroTabla) == "" || sizeof($ultimoNumeroTabla) == null){
            $id = 1;
        }else{
            $id = $ultimoNumeroTabla[0]->id+1;
        }
        $ventas = new C_ventas;
        $ventas->producto=$request->producto;
        $ventas->precio=$request->precio;
        $ventas->total=$request->total;
        $ventas->metodopago=$request->metodopago;
        $ventas->usuario=$request->usuario;
        $ventas->tel=$request->tel;
        $ventas->direccion=$request->direccion;
        $ventas->status='ALTA';        
        $ventas->save();
        return response()->json($ventas);
    }
    public function listar_ventas (Request $request)
    {
        if($request->ajax()){
            $data = C_ventas::select('id', 'producto', 'precio', 'total', 'metodopago', 'usuario', 'tel', 'direccion', 'status');
            return DataTables::of($data)
            ->addColumn('operaciones', function($data){
                $operaciones = '<div class="container">'.
                                    '<div class="row">'.
                                            '<div class="col"><a href="javascript:void(0);" onclick="obtenerventas('.$data->id.')"><i class="fas fa-pen-square" aria-hidden="true"></i></a></div>'.
                                            '<div class="col"><a href="javascript:void(0);" onclick="verificarbajaventas('.$data->id.')"><i class="fa fa-minus-square" aria-hidden="true"></i></a></div>'.
                                        '</div>'.
                                '</div>';
                return $operaciones;
            })
            ->rawColumns(['operaciones'])
            ->make(true);
        }
    }

    public function obtener_ventas(Request $request){
        $ventas= C_ventas::where('id', $request->numero)->first();
        $permitirmodificacion = 1;
        if($ventas->status == 'BAJA'){ 
            $permitirmodificacion = 0;
        }
        $data = array(
            "ventas" => $ventas,
            "permitirmodificacion" => $permitirmodificacion
        );
        return response()->json($data);
    }
    public function modificar_ventas(Request $request){
        $ventas = C_ventas::where('id', $request->numero)->first();
        C_ventas::where('id', $request->numero)
        ->update([
            //atributo de la Base => $request-> nombre de la caja de texto
            'producto'=>$request->producto,
            'precio'=>$request->precio,
            'total'=>$request->total,
            'metodopago'=>$request->metodopago,
            'usuario'=>$request->usuario,
            'tel'=>$request->tel,
            'direccion'=>$request->direccion
        ]);
        return response()->json($ventas);
    }
    public function verificar_baja_ventas(Request $request){
        //variable = $request->variable que recibe del archivo .js
        $numero = $request->numero;
        $ventas = C_ventas::where('id', $numero)->first();
        return response()->json($ventas);
    }
    public function baja_ventas(Request $request){
        $ventas = C_ventas::where('id', $request->num)->first();
        C_ventas::where('id', $request->num)
        ->update([
            'status'=> 'BAJA'
        ]);
        return response()->json($ventas);
    }
}

