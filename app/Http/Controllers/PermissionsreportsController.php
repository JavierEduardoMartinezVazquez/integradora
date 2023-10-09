<?php

namespace App\Http\Controllers;
use Yajra\DataTables\Facades\DataTables;
use App\C_permissionsreports;
use Illuminate\Http\Request;

class permissionsreportsController extends Controller
{
    public function permissionsreports()
    {
        return view('control.paginas.permissionsreports');
    }
    public function obtener_ultimo_id_permissionsreports(){
        $ultimoNumeroTabla = C_permissionsreports::select("id")->orderBy("id", "DESC")->take(1)->get();
        if(sizeof($ultimoNumeroTabla) == 0 || sizeof($ultimoNumeroTabla) == "" || sizeof($ultimoNumeroTabla) == null){
            $id = 1;
        }else{
            $id = $ultimoNumeroTabla[0]->id+1;   
        }
        return response()->json($id);
    }
    public function guardar_permissionsreports(Request $request){
        $ultimoNumeroTabla = C_permissionsreports::select("id")->orderBy("id", "DESC")->take(1)->get();
        if(sizeof($ultimoNumeroTabla) == 0 || sizeof($ultimoNumeroTabla) == "" || sizeof($ultimoNumeroTabla) == null){
            $id = 1;
        }else{
            $id = $ultimoNumeroTabla[0]->id+1;
        }
        $permissionsreports = new C_permissionsreports;
        $permissionsreports->nombre=$request->nombre;
        $permissionsreports->motivo=$request->motivo;
        
        $permissionsreports->status='ALTA';        
        $permissionsreports->save();
        return response()->json($permissionsreports);
    }
    public function listar_permissionsreports (Request $request)
    {
        if($request->ajax()){
            $data = C_permissionsreports::select('id','nombre','motivo','status');
            return DataTables::of($data)
            ->addColumn('operaciones', function($data){
                $operaciones = '<div class="container">'.
                                    '<div class="row">'.
                                            '<div class="col"><a href="javascript:void(0);" onclick="obtenerpermissions('.$data->id.')"><i class="fas fa-pen-square" aria-hidden="true"></i></a></div>'.
                                            '<div class="col"><a href="javascript:void(0);" onclick="verificarbajapermissions('.$data->id.')"><i class="fa fa-minus-square" aria-hidden="true"></i></a></div>'.
                                        '</div>'.
                                '</div>';
                return $operaciones;
            })
            ->rawColumns(['operaciones'])
            ->make(true);
        }
    }

    public function obtener_permissionsreports(Request $request){
        $permissionsreports= C_permissionsreports::where('id', $request->numero)->first();
        $permitirmodificacion = 1;
        if($permissionsreports->status == 'BAJA'){ 
            $permitirmodificacion = 0;
        }
        $data = array(
            "permissionsreports" => $permissionsreports,
            "permitirmodificacion" => $permitirmodificacion
        );
        return response()->json($data);
    }
    public function modificar_permissionsreports(Request $request){
        $permissionsreports = C_permissionsreports::where('id', $request->numero)->first();
        C_permissionsreports::where('id', $request->numero)
        ->update([
            //atributo de la Base => $request-> nombre de la caja de texto
            'nombre'=> $request->nombre,
            'motivo'=> $request->motivo
        ]);
        return response()->json($permissionsreports);
    }
    public function verificar_baja_permissionsreports(Request $request){
        //variable = $request->variable que recibe del archivo .js
        $numero = $request->numero;
        $permissionsreports = C_permissionsreports::where('id', $numero)->first();
        return response()->json($permissionsreports);
    }
    public function baja_permissionsreports(Request $request){
        $permissionsreports = C_permissionsreports::where('id', $request->num)->first();
        C_permissionsreports::where('id', $request->num)
        ->update([
            'status'=> 'BAJA'
        ]);
        return response()->json($permissionsreports);
    }
}

