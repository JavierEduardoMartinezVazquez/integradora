<?php

namespace App\Http\Controllers;

use DB;
use PDF;
Use Helpers;
use App\Role;
use App\User;
use App\C_Roles;
use Carbon\Carbon;
use App\C_business;
use App\C_hourhand;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Hash;
//use Illuminate\Foundation\Auth\User;
class UserController extends Controller
{
    public function User()
    {
        return view('control.paginas.user');
    }
    public function obtener_ultimo_id_user(){
        $ultimoNumeroTabla = User::select("id")->orderBy("id", "DESC")->take(1)->get();
        if(sizeof($ultimoNumeroTabla) == 0 || sizeof($ultimoNumeroTabla) == "" || sizeof($ultimoNumeroTabla) == null){
            $id = 1;
        }else{
            $id = $ultimoNumeroTabla[0]->id+1;
        }
        return response()->json($id);
    }

    public function obtener_empresa(Request $request){
        if($request->ajax()){
            $data = C_business::where('status', 'ALTA')->orderBy("id", "ASC")->get();
            return DataTables::of($data)
                ->addColumn('operaciones', function($data){
                    $boton = '<div class="btn bg-green btn-xs waves-effect" onclick="seleccionarempresa('.$data->nombre.',\')">Seleccionar</div>';
                    return $boton;
                })
                ->rawColumns(['operaciones'])
                ->make(true);
        }
    }
    public function obtener_horario(Request $request){
        if($request->ajax()){
            $data = C_hourhand::where('status', 'ALTA')->orderBy("id", "ASC")->get();
            return DataTables::of($data)
                ->addColumn('operaciones', function($data){
                    $boton = '<div class="btn bg-green btn-xs waves-effect" onclick="seleccionarhorario('.$data->id.',\')">Seleccionar</div>';
                    return $boton;
                })
                ->rawColumns(['operaciones'])
                ->make(true);
        }
    }
    /* public function obtener_empresa_id(){
        $empresas = empresa::all();
        $select_empresa= "<option >Seleccionar...</option>";
        foreach($business as $empresa){
            $select_empresa = $select_empresa."<option value='".$business->empresa."'>".$business->empresa."</option>";
        }
        return response()->json($select_empresa);
    } */
    public function obtener_roles(){
        $roles = Role::all();
        $select_roles= "<option >Seleccionar...</option>";
        foreach($roles as $rol){
            $select_roles = $select_roles."<option value='".$rol->name."'>".$rol->name."</option>";
        }
        return response()->json($select_roles);

    }

    public function obtener_empresaid(){
        $empresa = C_business::all();
        $select_empresaid= "<option >Seleccionar empresa...</option>";
        foreach($empresa as $business){
            $select_empresaid = $select_empresaid."<option value='".$business->id."'>".$business->empresa."</option>";
        }
        return response()->json($select_empresaid);

    }

    public function guardar_user(Request $request){
        $email=$request->email;
        $ExisteUsuario = User::where('email', $email)->first();
        if($ExisteUsuario == true){
            $user = 1;
	    }else{
            $ultimoNumeroTabla = User::select("id")->orderBy("id", "DESC")->take(1)->get();
            if(sizeof($ultimoNumeroTabla) == 0 || sizeof($ultimoNumeroTabla) == "" || sizeof($ultimoNumeroTabla) == null){
                $id = 1;
            }else{
                $id = $ultimoNumeroTabla[0]->id+1;
        }
            $user = new User;
            $user->name=$request->nombre;
            $user->lastname_p=$request->paterno;
            $user->lastname_m=$request->materno;
            $user->email=$request->email;
            $user->password=Hash::make($request->pass);
            $user->nss=$request->nss;
            $user->tel=$request->tel;
            $user->curp=$request->curp;
            $user->rfc=$request->rfc;
            $user->empresa_id=$request->empresa_id;
            $user->puesto=$request->puesto;
            $user->ingreso=$request->ingreso;
            $user->horariolv_id=$request->horariolv_id;
            $user->horariosab_id=$request->horariosab_id;
            $user->diasvacaciones=$request->diasvacaciones;
            $user->rol=$request->rol;
            $user->foto=$request->foto;
            if ($request->hasFile('foto')){
                $file=$request->file('foto');
                $destinationPath = 'img/usersfoto/';
                $filename = time() . '-' . $file->getClientOriginalName();
                $uploadSuccess = $request->file('foto')->move($destinationPath, $filename);
                $user->foto = $destinationPath . $filename;

            }
            $user->status="ALTA";
            $user->save();

            $user->assignRole($request->rol);
/*             $user->assignRole($request->empresa_id); */
            $user->assignempresa_id =$request->empresa_id;


        }
        return response()->json($user);

    }
    public function listar_user (Request $request)
    {
        if($request->ajax()){
            //$data = User::select('id','name','lastname_p','lastname_m','email','nss','tel','curp','rfc','empresa_id','puesto','ingreso','horariolv_id','horariosab_id','diasvacaciones','rol','foto','status');
            $data = DB::table('users as u')
            ->leftjoin('business as b', 'u.empresa_id', '=', 'b.id')                                     
            ->select('u.id', 'u.name', 'u.lastname_p', 'u.lastname_m', 'u.email', 'u.nss', 'u.tel', 'u.curp', 'u.rfc', 'b.empresa AS empresa_id', 'u.puesto', 'u.ingreso', 'u.horariolv_id', 'u.horariosab_id', 'u.diasvacaciones', 'u.rol', 'u.foto', 'u.status')
            ->orderBy('id','DESC')
            ->get();
            return DataTables::of($data)
            ->addColumn('foto', function ($data) {
                $url= asset($data->foto);
                return '<img src="'.$url.'" class="img-fluid img-thumbnail" width="50px" height="50px"/>';
            })
            ->addColumn('operaciones', function($data){
                $operaciones = '<div class="container">'.
                                    '<div class="row">'.
                                            '<div class="col"><a href="javascript:void(0);" onclick="obteneruser('.$data->id.')"><i class="fas fa-pen-square" aria-hidden="true"></i></a></div>'.
                                            '<div class="col"><a href="javascript:void(0);" onclick="verificarbajauser('.$data->id.')"><i class="fa fa-minus-square" aria-hidden="true"></i></a></div>'.
                                            '<div class="col"><a class="paddingmenuopciones" href="'.route('credencial_pdf',$data->id).'" target="_blank"><i class="fa fa-address-card" aria-hidden="true"></i></a></div>'.
                                        '</div>'.
                                '</div>';
                return $operaciones;
            })
            ->rawColumns(['operaciones','foto'])
            ->make(true);
        }
    }

    public function obtener_user(Request $request){
        $user= User::where('id', $request->numero)->first();
        $permitirmodificacion = 1;
        $getroles = Role::orderBy("id", "DESC")->get();
        $select_roles= "<option>Selecciona...</option>";
        foreach($getroles as $getrol){
            if($getrol->name == $user->rol){
                $select_roles = $select_roles."<option value='".$getrol->name."' selected>".$getrol->name."</option>";
            }else{
                $select_roles = $select_roles."<option value='".$getrol->name."'>".$getrol->name."</option>";
            }
        }
        if($user->status == 'BAJA'){
            $permitirmodificacion = 0;
        }
        $data = array(
            "user" => $user,
            "fechadeingresocorp" => Carbon::parse($user->fechaingresocorp)->format('Y-m-d')."T".Carbon::parse($user->fechaingresocorp)->format('H:i'),
            "fechadeingresoemp" => Carbon::parse($user->fechaingresoemp)->format('Y-m-d')."T".Carbon::parse($user->fechaingresoemp)->format('H:i'),
            "fechadebaja" => Helpers::formatoinputdatetime($user->fechabaja),
            "select_roles" => $select_roles,
            "permitirmodificacion" => $permitirmodificacion
        );
        return response()->json($data);
    }
    public function modificar_user(Request $request){
        $user = User::where('id', $request->numero)->first();
        User::where('id', $request->numero)
        ->update([
            //atributo de la Base => $request-> nombre de la caja de texto
            'name'=> $request->nombre,
            'lastname_p' => $request->paterno,
            'lastname_m' => $request->materno,
            'tel' => $request->tel,
            'curp' => $request->curp,
            'rfc' => $request->rfc,
            //'rol' => $request->rol,
        ]);
        //$user->assignRole($request->rol);


        return response()->json($user);
    }
    public function verificar_baja_user(Request $request){
        //variable = $request->variable que recibe del archivo .js
        $numero = $request->numero;
        $user = User::where('id', $numero)->first();
        return response()->json($user);
    }
    public function baja_user(Request $request){
        $user = User::where('id', $request->num)->first();
        User::where('id', $request->num)
        ->update([
            'status'=> 'BAJA'
        ]);
        return response()->json($user);
    }
    public function credencial_pdf($user_id){
        //dd($user_id);
        $customPaper = array(0,0,325.00,394.00);

        $user = User::find($user_id);
        $pdf = PDF::loadView('control.paginas.credencial', compact('user'))
        ->setPaper($customPaper);
        //->setOption('margin-left', 2)
        //->setOption('margin-right', 2)
        //->setOption('margin-bottom', 10);
        return $pdf->stream();
    }

}
