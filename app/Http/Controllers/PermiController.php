<?php

namespace App\Http\Controllers;
use Yajra\DataTables\Facades\DataTables;
use App\C_permi;
use Illuminate\Http\Request;

class PermiController extends Controller
{
    public function Permi()
    {
        return view('control.paginas.permi');
    }
    public function obtener_ultimo_id_permi(){
        $ultimoNumeroTabla = C_permi::select("id")->orderBy("id", "DESC")->take(1)->get();
        if(sizeof($ultimoNumeroTabla) == 0 || sizeof($ultimoNumeroTabla) == "" || sizeof($ultimoNumeroTabla) == null){
            $id = 1;
        }else{
            $id = $ultimoNumeroTabla[0]->id+1;   
        }
        return response()->json($id);
    }
    public function guardar_permi(Request $request){
        $ultimoNumeroTabla = C_permi::select("id")->orderBy("id", "DESC")->take(1)->get();
        if(sizeof($ultimoNumeroTabla) == 0 || sizeof($ultimoNumeroTabla) == "" || sizeof($ultimoNumeroTabla) == null){
            $id = 1;
        }else{
            $id = $ultimoNumeroTabla[0]->id+1;
        }   
        $permi = new C_permi;
        $permi->nombre=$request->nombre;
        $permi->motivo=$request->motivo;
        $permi->autorizacion=$request->autorizacion;
        $permi->fecha=$request->fecha;
        
        $permi->status='ALTA';        
        $permi->save();
        return response()->json($permi);
    }
    public function listar_permi (Request $request)
    {
        if($request->ajax()){
            $data = C_permi::select('id','nombre','motivo','fecha','autorizacion','status');
            return DataTables::of($data)
            ->addColumn('operaciones', function($data){
                $operaciones = '<div class="container">'.
                                    '<div class="row">'.
                                            '<div class="col"><a href="javascript:void(0);" onclick="obtenerpermi('.$data->id.')"><i class="fas fa-pen-square" aria-hidden="true"></i></a></div>'.
                                            '<div class="col"><a href="javascript:void(0);" onclick="verificarbajapermi('.$data->id.')"><i class="fa fa-minus-square" aria-hidden="true"></i></a></div>'.
                                        '</div>'.
                                '</div>';
                return $operaciones;
            })
            ->rawColumns(['operaciones'])
            ->make(true);
        }
    }

    public function obtener_permi(Request $request){
        $permi= C_permi::where('id', $request->numero)->first();
        $permitirmodificacion = 1;
        if($permi->status == 'BAJA'){ 
            $permitirmodificacion = 0;
        }
        $data = array(
            "permi" => $permi,
            "permitirmodificacion" => $permitirmodificacion
        );
        return response()->json($data);
    }
    public function modificar_permi(Request $request){
        $permi = C_permi::where('id', $request->numero)->first();
        C_permi::where('id', $request->numero)
        ->update([
            //atributo de la Base => $request-> nombre de la caja de texto
            'nombre'=> $request->nombre,
            'motivo'=> $request->motivo,
            'fecha'=> $request->fecha,
            'autorizacion'=> $request->autorizacion
            
        ]);
        return response()->json($permi);
    }
    public function verificar_baja_permi(Request $request){
        //variable = $request->variable que recibe del archivo .js
        $numero = $request->numero;
        $permi = C_permi::where('id', $numero)->first();
        return response()->json($permi);
    }
    public function baja_permi(Request $request){
        $permi = C_permi::where('id', $request->num)->first();
        C_permi::where('id', $request->num)
        ->update([
            'status'=> 'BAJA'
        ]);
        return response()->json($permi);
    }
}

