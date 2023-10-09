<?php

namespace App\Http\Controllers;
use Yajra\DataTables\Facades\DataTables;
use App\C_business;
use Illuminate\Http\Request;

class BusinessController extends Controller
{
    public function Business()
    {
        return view('control.paginas.business');
    }
    public function obtener_ultimo_id_business(){
        $ultimoNumeroTabla = C_business::select("id")->orderBy("id", "DESC")->take(1)->get();
        if(sizeof($ultimoNumeroTabla) == 0 || sizeof($ultimoNumeroTabla) == "" || sizeof($ultimoNumeroTabla) == null){
            $id = 1;
        }else{
            $id = $ultimoNumeroTabla[0]->id+1;   
        }
        return response()->json($id);
    }
    public function guardar_business(Request $request){
        $ultimoNumeroTabla = C_business::select("id")->orderBy("id", "DESC")->take(1)->get();
        if(sizeof($ultimoNumeroTabla) == 0 || sizeof($ultimoNumeroTabla) == "" || sizeof($ultimoNumeroTabla) == null){
            $id = 1;
        }else{
            $id = $ultimoNumeroTabla[0]->id+1;
        }   
        $business = new C_business;

        $business->empresa=$request->empresa;
        if ($request->hasFile('logo')){
            $file=$request->file('logo');
            $destinationPath = 'img/businesslogo/';
            $filename = time() . '-' . $file->getClientOriginalName();
            $uploadSuccess = $request->file('logo')->move($destinationPath, $filename);
            $business->logo = $destinationPath . $filename;

        }
        $business->direccion=$request->direccion;
        $business->rfc_e=$request->rfc_e;
        
        $business->status='ALTA';        
        $business->save();
        return response()->json($business);
    }
    public function listar_business (Request $request)
    {
        if($request->ajax()){
            $data = C_business::select('id','empresa','direccion','logo','rfc_e','status');
            return DataTables::of($data)
            ->addColumn('logo', function ($data) {
                $url= asset($data->logo);
                return '<img src="'.$url.'" class="img-fluid img-thumbnail" width="50px" height="50px"/>';
            })
            ->addColumn('operaciones', function($data){
                $operaciones = '<div class="container">'.
                                    '<div class="row">'.
                                            '<div class="col"><a href="javascript:void(0);" onclick="obtenerbusiness('.$data->id.')"><i class="fas fa-pen-square" aria-hidden="true"></i></a></div>'.
                                            '<div class="col"><a href="javascript:void(0);" onclick="verificarbajabusiness('.$data->id.')"><i class="fa fa-minus-square" aria-hidden="true"></i></a></div>'.
                                        '</div>'.
                                '</div>';
                return $operaciones;
            })
            ->rawColumns(['operaciones', 'logo'])
            ->make(true);
        }
    }

    public function obtener_business(Request $request){
        $business= C_business::where('id', $request->numero)->first();
        $permitirmodificacion = 1;
        if($business->status == 'BAJA'){ 
            $permitirmodificacion = 0;
        }
        $data = array(
            "business" => $business,
            "permitirmodificacion" => $permitirmodificacion
        );
        return response()->json($data);
    }
    public function modificar_business(Request $request){
        $business = C_business::where('id', $request->numero)->first();
        C_business::where('id', $request->numero)
        ->update([
            //atributo de la Base => $request-> nombre de la caja de texto
            
            'empresa'=> $request->empresa,
            'direccion'=> $request->direccion,
            'rfc_e'=> $request->rfc_e,
            
        ]);
        return response()->json($business);
    }
    public function verificar_baja_business(Request $request){
        //variable = $request->variable que recibe del archivo .js
        $numero = $request->numero;
        $business = C_business::where('id', $numero)->first();
        return response()->json($business);
    }
    public function baja_business(Request $request){
        $business = C_business::where('id', $request->num)->first();
        C_business::where('id', $request->num)
        ->update([
            'status'=> 'BAJA'
        ]);
        return response()->json($business);
    }
    
}

