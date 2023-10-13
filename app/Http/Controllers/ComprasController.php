<?php

namespace App\Http\Controllers;
use Yajra\DataTables\DataTables;
use App\C_compras;

use Illuminate\Http\Request;

class ComprasController extends Controller
{
    public function Compras()
    {
        return view('control.paginas.compras');
    }
    public function obtener_ultimo_id_compras(){
        $ultimoNumeroTabla = C_compras::select("id")->orderBy("id", "DESC")->take(1)->get();
        if(sizeof($ultimoNumeroTabla) == 0 || sizeof($ultimoNumeroTabla) == "" || sizeof($ultimoNumeroTabla) == null){
            $id = 1;
        }else{
            $id = $ultimoNumeroTabla[0]->id+1;   
        }
        return response()->json($id);
    }
    public function guardar_compras(Request $request){
        $ultimoNumeroTabla = C_compras::select("id")->orderBy("id", "DESC")->take(1)->get();
        if(sizeof($ultimoNumeroTabla) == 0 || sizeof($ultimoNumeroTabla) == "" || sizeof($ultimoNumeroTabla) == null){
            $id = 1;
        }else{
            $id = $ultimoNumeroTabla[0]->id+1;
        }
        $compras = new C_compras;
        $compras->producto=$request->producto;
        $compras->precio=$request->precio;
        $compras->total=$request->total;
        $compras->metodopago=$request->metodopago;
        $compras->usuario=$request->usuario;
        $compras->tel=$request->tel;
        $compras->direccion=$request->direccion;
        $compras->status='ALTA';        
        $compras->save();
        return response()->json($compras);
    }
    public function listar_compras (Request $request)
    {
        if($request->ajax()){
            $data = C_compras::select('id', 'producto', 'precio', 'total', 'metodopago', 'usuario', 'tel', 'direccion', 'status');
            return DataTables::of($data)
            ->addColumn('operaciones', function($data){
                $operaciones = '<div class="container">'.
                                    '<div class="row">'.
                                            '<div class="col"><a href="javascript:void(0);" onclick="obtenercompras('.$data->id.')"><i class="fas fa-pen-square" aria-hidden="true"></i></a></div>'.
                                            '<div class="col"><a href="javascript:void(0);" onclick="verificarbajacompras('.$data->id.')"><i class="fa fa-minus-square" aria-hidden="true"></i></a></div>'.
                                        '</div>'.
                                '</div>';
                return $operaciones;
            })
            ->rawColumns(['operaciones'])
            ->make(true);
        }
    }

    public function obtener_compras(Request $request){
        $compras= C_compras::where('id', $request->numero)->first();
        $permitirmodificacion = 1;
        if($compras->status == 'BAJA'){ 
            $permitirmodificacion = 0;
        }
        $data = array(
            "compras" => $compras,
            "permitirmodificacion" => $permitirmodificacion
        );
        return response()->json($data);
    }
    public function modificar_compras(Request $request){
        $compras = C_compras::where('id', $request->numero)->first();
        C_compras::where('id', $request->numero)
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
        return response()->json($compras);
    }
    public function verificar_baja_compras(Request $request){
        //variable = $request->variable que recibe del archivo .js
        $numero = $request->numero;
        $compras = C_compras::where('id', $numero)->first();
        return response()->json($compras);
    }
    public function baja_compras(Request $request){
        $compras = C_compras::where('id', $request->num)->first();
        C_compras::where('id', $request->num)
        ->update([
            'status'=> 'BAJA'
        ]);
        return response()->json($compras);
    }
}

