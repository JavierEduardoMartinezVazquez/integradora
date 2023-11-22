<?php

namespace App\Http\Controllers;
use Yajra\DataTables\DataTables;
use App\C_compras;
use App\C_productos;
use PDF;
use App\User;

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
        $compras->cantidadcompra=$request->cantidadcompra;
        $compras->total=$request->total;
        $compras->status='ALTA';        
        $compras->save();
        return response()->json($compras);
    }

    public function agregarAlCarrito(Request $request)
    {
        // Recuperar los datos del producto que se agregará al carrito
        $productoId = $request->input('producto_id');
        $producto = C_productos::find($productoId);

        // Recuperar la cantidad del formulario
        $cantidadcompra = $request->input('quantity');

        // Calcular el total
        $total = $cantidadcompra * $producto->precio;

        // Registro
        $compra = new C_compras();
        $compra->producto = $producto->producto;
        $compra->precio = $producto->precio;
        $compra->cantidadcompra = $cantidadcompra; // Asignar la cantidad
        $compra->total=$total;
        $compra->status="ALTA";
        // Guardar
        $compra->save();

        // Redirigir
        return redirect()->route('Compras');
    }
    public function vaciarCarrito()
    {
        // Eliminar todas las compras
        C_compras::truncate();
    
        // Redirigir a la página de compras
        return redirect()->route('Compras')->with('success', 'Carrito vacio');;
    }
    

    public function listar_compras (Request $request)
    {
        if($request->ajax()){
            $data = C_compras::select('id', 'producto', 'precio', 'cantidadcompra', 'total', 'status');
             // Filtrar por status 'ALTA'
        $data->where('status', 'ALTA');

        // Calcular el valor total final
        $totalFinal = $data->sum('total');

        // Devolver el valor total final como parte de la respuesta
        return DataTables::of($data)
            ->addColumn('total_final', function () use ($totalFinal) {
                return number_format($totalFinal, 2); // Formatear el total final según tus necesidades
            })
            ->addColumn('operaciones', function($data){
                $operaciones = '<div class="container">'.
                                    /* '<div class="row">'. */
                                            /* '<div class="col"><a href="javascript:void(0);" onclick="obtenercompras('.$data->id.')"><i class="fas fa-pen-square" aria-hidden="true"></i></a></div>'. */
                                            /* '<div class="col"><a href="javascript:void(0);" class="btn btn-danger" onclick="verificarbajacompras('.$data->id.')"></i></a></div>'. */
                                           '<a class="paddingmenuopciones" href="'.route('recibo_pdf',$data->id).'" target="_blank"><div class="btn btn-success" aria-hidden="true">Pagar</div></a>'.
                                            /* '<div class="col"><a class="paddingmenuopciones" href="'.url('EliminarDelCarrito').'" target="_blank"><i class="botton btn link" aria-hidden="true">Eliminar</i></a></div>'.*/
                                            '<a href="javascript:void(0);" class="btn btn-danger" onclick="verificarbajacompras('.$data->id.')">Eliminar</a>'.
                                        /* '</div>'. */
                                '</div>';
                return $operaciones;
            })
            ->rawColumns(['operaciones'])
            ->make(true);
        }
        return view('control.paginas.compras', compact('totalFinal'));
    }

    
    public function recibo_pdf($productoId){
        //dd($user_id);
        $customPaper = array(0,0,325.00,394.00);

        $compra = C_compras::find($productoId);
        $pdf = PDF::loadView('control.paginas.recibo', compact('compra'))
        ->setPaper($customPaper);
        //->setOption('margin-left', 2)
        //->setOption('margin-right', 2)
        //->setOption('margin-bottom', 10);
        return $pdf->stream();
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
            'cantidadcompra'=>$request->cantidadcompra,
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

