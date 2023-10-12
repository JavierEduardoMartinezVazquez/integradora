<?php

namespace App\Http\Controllers;
use Yajra\DataTables\DataTables;
use App\C_productos;

use Illuminate\Http\Request;

class ProductosController extends Controller
{
    public function Productos()
    {
        return view('control.paginas.productos');
    }
    public function obtener_ultimo_id_productos(){
        $ultimoNumeroTabla = C_productos::select("id")->orderBy("id", "DESC")->take(1)->get();
        if(sizeof($ultimoNumeroTabla) == 0 || sizeof($ultimoNumeroTabla) == "" || sizeof($ultimoNumeroTabla) == null){
            $id = 1;
        }else{
            $id = $ultimoNumeroTabla[0]->id+1;   
        }
        return response()->json($id);
    }
    public function guardar_productos(Request $request){
        $ultimoNumeroTabla = C_productos::select("id")->orderBy("id", "DESC")->take(1)->get();
        if(sizeof($ultimoNumeroTabla) == 0 || sizeof($ultimoNumeroTabla) == "" || sizeof($ultimoNumeroTabla) == null){
            $id = 1;
        }else{
            $id = $ultimoNumeroTabla[0]->id+1;
        }
        $productos = new C_productos;
        $productos->paquete=$request->paquete;
        $productos->cantidad=$request->cantidad;
        $productos->precio=$request->precio;
        $productos->existencia=$request->existencia;
        $productos->status='ALTA';        
        $productos->save();
        return response()->json($productos);
    }
    public function listar_productos (Request $request)
    {
        if($request->ajax()){
            $data = C_productos::select('id', 'paquete', 'cantidad', 'precio', 'existencia', 'status');
            return DataTables::of($data)
            ->addColumn('operaciones', function($data){
                $operaciones = '<div class="container">'.
                                    '<div class="row">'.
                                            '<div class="col"><a href="javascript:void(0);" onclick="obtenerproductos('.$data->id.')"><i class="fas fa-pen-square" aria-hidden="true"></i></a></div>'.
                                            '<div class="col"><a href="javascript:void(0);" onclick="verificarbajaproductos('.$data->id.')"><i class="fa fa-minus-square" aria-hidden="true"></i></a></div>'.
                                        '</div>'.
                                '</div>';
                return $operaciones;
            })
            ->rawColumns(['operaciones'])
            ->make(true);
        }
    }

    public function obtener_productos(Request $request){
        $productos= C_productos::where('id', $request->numero)->first();
        $permitirmodificacion = 1;
        if($productos->status == 'BAJA'){ 
            $permitirmodificacion = 0;
        }
        $data = array(
            "productos" => $productos,
            "permitirmodificacion" => $permitirmodificacion
        );
        return response()->json($data);
    }
    public function modificar_productos(Request $request){
        $productos = C_productos::where('id', $request->numero)->first();
        C_productos::where('id', $request->numero)
        ->update([
            //atributo de la Base => $request-> nombre de la caja de texto
            'paquete'=> $request->paquete,
            'cantidad'=> $request->cantidad,
            'precio'=> $request->precio,
            'existencia'=> $request->existencia
        ]);
        return response()->json($productos);
    }
    public function verificar_baja_productos(Request $request){
        //variable = $request->variable que recibe del archivo .js
        $numero = $request->numero;
        $productos = C_productos::where('id', $numero)->first();
        return response()->json($productos);
    }
    public function baja_productos(Request $request){
        $productos = C_productos::where('id', $request->num)->first();
        C_productos::where('id', $request->num)
        ->update([
            'status'=> 'BAJA'
        ]);
        return response()->json($productos);
    }
}

