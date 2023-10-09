<?php

namespace App\Http\Controllers;
use Yajra\DataTables\Facades\DataTables;
use App\C_nominas;
use Illuminate\Http\Request;

class nominasController extends Controller
{
    public function nominas()
    {
        return view('control.paginas.nominas');
    }
    public function obtener_ultimo_id_nominas(){
        $ultimoNumeroTabla = C_nominas::select("id")->orderBy("id", "DESC")->take(1)->get();
        if(sizeof($ultimoNumeroTabla) == 0 || sizeof($ultimoNumeroTabla) == "" || sizeof($ultimoNumeroTabla) == null){
            $id = 1;
        }else{
            $id = $ultimoNumeroTabla[0]->id+1;   
        }
        return response()->json($id);
    }
    public function guardar_nominas(Request $request){
        $ultimoNumeroTabla = C_nominas::select("id")->orderBy("id", "DESC")->take(1)->get();
        if(sizeof($ultimoNumeroTabla) == 0 || sizeof($ultimoNumeroTabla) == "" || sizeof($ultimoNumeroTabla) == null){
            $id = 1;
        }else{
            $id = $ultimoNumeroTabla[0]->id+1;
        }
        $nominas = new C_nominas;
        $nominas->nombre=$request->nombre;
        $nominas->status='ALTA';        
        $nominas->save();
        return response()->json($nominas);
    }
    public function listar_nominas (Request $request)
    {
        if($request->ajax()){
            $data = C_nominas::select('id','nombre','status');
            return DataTables::of($data)
            ->addColumn('operaciones', function($data){
                $operaciones = '<div class="container">'.
                                    '<div class="row">'.
                                            '<div class="col"><a href="javascript:void(0);" onclick="obtenernominas('.$data->id.')"><i class="fas fa-pen-square" aria-hidden="true"></i></a></div>'.
                                            '<div class="col"><a href="javascript:void(0);" onclick="verificarbajanominas('.$data->id.')"><i class="fa fa-minus-square" aria-hidden="true"></i></a></div>'.
                                        '</div>'.
                                '</div>';
                return $operaciones;
            })
            ->rawColumns(['operaciones'])
            ->make(true);
        }
    }

    public function obtener_nominas(Request $request){
        $nominas= C_nominas::where('id', $request->numero)->first();
        $permitirmodificacion = 1;
        if($nominas->status == 'BAJA'){ 
            $permitirmodificacion = 0;
        }
        $data = array(
            "nominas" => $nominas,
            "permitirmodificacion" => $permitirmodificacion
        );
        return response()->json($data);
    }
    public function modificar_nominas(Request $request){
        $nominas = C_nominas::where('id', $request->numero)->first();
        C_nominas::where('id', $request->numero)
        ->update([
            //atributo de la Base => $request-> nombre de la caja de texto
            'nombre'=> $request->nombre
        ]);
        return response()->json($nominas);
    }
    public function verificar_baja_nominas(Request $request){
        //variable = $request->variable que recibe del archivo .js
        $numero = $request->numero;
        $nominas = C_nominas::where('id', $numero)->first();
        return response()->json($nominas);
    }
    public function baja_nominas(Request $request){
        $nominas = C_nominas::where('id', $request->num)->first();
        C_nominas::where('id', $request->num)
        ->update([
            'status'=> 'BAJA'
        ]);
        return response()->json($nominas);
    }
}
