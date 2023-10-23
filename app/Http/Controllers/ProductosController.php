<?php

namespace App\Http\Controllers;
use Yajra\DataTables\Facades\DataTables;
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

        $productos->producto=$request->producto;
        if ($request->hasFile('fotografia')){
            $file=$request->file('fotografia');
            $destinationPath = 'img/productosfoto/';
            $filename = time() . '-' . $file->getClientOriginalName();
            $uploadSuccess = $request->file('fotografia')->move($destinationPath, $filename);
            $productos->fotografia = $destinationPath . $filename;

        }
        $productos->precio=$request->precio;
        $productos->existencias=$request->existencias;
        
        $productos->status='ALTA';        
        $productos->save();
        return response()->json($productos);
    }
    public function listar_productos (Request $request)
    {
        if($request->ajax()){
            $data = C_productos::select('id','producto','precio','fotografia','existencias','status');
            return DataTables::of($data)
            ->addColumn('fotografia', function ($data) {
                $url= asset($data->fotografia);
                return '<img src="'.$url.'" class="img-fluid img-thumbnail" width="50px" height="50px"/>';
            })
            ->addColumn('operaciones', function($data){
                $operaciones = '<div class="container">'.
                                    '<div class="row">'.
                                            '<div class="col"><a href="javascript:void(0);" onclick="obtenerproductos('.$data->id.')"><i class="fas fa-pen-square" aria-hidden="true"></i></a></div>'.
                                            '<div class="col"><a href="javascript:void(0);" onclick="verificarbajaproductos('.$data->id.')"><i class="fa fa-minus-square" aria-hidden="true"></i></a></div>'.
                                        '</div>'.
                                '</div>';
                return $operaciones;
            })
            ->rawColumns(['operaciones', 'fotografia'])
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
            
            'producto'=> $request->producto,
            'precio'=> $request->precio,
            'existencias'=> $request->existencias,
            
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

