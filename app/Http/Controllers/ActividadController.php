<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Actividad;
use App\Models\Categoria;
use Carbon\Carbon;
use DataTables;

class ActividadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = ['categorias' => Categoria::get()];
        return view("Actividades",$data);
    }
    public function listar(Request $request)
    {
        if ($request->ajax()) {
            if($request->user()->id_rol==1){
                $data = Actividad::get();
            }else{
                $data = Actividad::
                select('*')
                ->where("Id_user",'=',$request->user()->id)
                ->get();
            }
            
            $categoria = Categoria::get();

            $arreglo = [];

            foreach ($data as $val) {
                foreach ($categoria as $cat) {
                    if($cat->id=== $val->Categoria){
                        if($val->Status =="1"){
                            $datos  =  (object) [
                                'id'            =>  $val->id,
                                'Descripcion'         =>  $val->Descripcion,
                                'Titulo'      =>  $val->Titulo,
                                'Categoria'        =>  $cat->Descripcion,
                                'Fecha'  =>  $val->Fecha,
                                'Status'  =>  "Activo"
                            ];
                            array_push($arreglo, $datos);
                        }else{
                            $datos  =  (object) [
                                'id'            =>  $val->id,
                                'Descripcion'         =>  $val->Descripcion,
                                'Titulo'      =>  $val->Titulo,
                                'Categoria'        =>  $cat->Descripcion,
                                'Fecha'  =>  $val->Fecha,
                                'Status'  =>  "Inactivo"
                            ];
                            array_push($arreglo, $datos);
                        }
                    }
                }
            }
            return Datatables::of($arreglo)
                ->addIndexColumn()
                ->addColumn('action', function($row){
                    return '
                    <div class="flex item-center justify-center">
                        <div id="getEditarActividad" data-id="'.$row->id.'" class="w-4 mr-2 transform hover:text-purple-500 hover:scale-110">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                            </svg>
                        </div>
                        <div id="getEliminarActividad" data-id="'.$row->id.'" class="w-4 mr-2 transform hover:text-purple-500 hover:scale-110">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                            </svg>
                        </div>
                    </div>';
                })
                ->rawColumns(['action'])
                ->make(true);
        }
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'descripcion' => 'required|max:255',
            'titulo' => 'required|max:255',
            'categoria' => 'required',
            'status' => 'required',
            'fecha' => 'required',
        ]);
        if ($validator->fails()) {
            // return redirect('categoria.save')
            //             ->withErrors($validator)
            //             ->withInput();
            return response()->json(['error'=>$validator->errors()]);
        }else{
            
            $actividad = new Actividad();
            $actividad->Descripcion      =   $request->descripcion; 
            $actividad->Titulo      =   $request->titulo; 
            $actividad->Categoria      =   $request->categoria; 
            $actividad->Fecha       =  $request->fecha;
            $actividad->Status      =   $request->status; 
            $actividad->Id_user      =   $request->user()->id; 
            $actividad->save();
            return response()->json(['success'=>'Validado']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        // $categoria = new Categoria();
        $data = Actividad::findOrFail($request->id);
        return response()->json(["actividad"=>$data]);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'descripcion' => 'required|max:255',
            'titulo' => 'required|max:255',
            'categoria' => 'required',
            'status' => 'required',
            'fecha' => 'required',
        ]);
        if ($validator->fails()) {
            // return redirect('categoria.save')
            //             ->withErrors($validator)
            //             ->withInput();
            return response()->json(['error'=>$validator->errors()]);
        }else{
            $actividad = Actividad::findOrFail($request->id);
            $actividad->Descripcion      =   $request->descripcion; 
            $actividad->Titulo      =   $request->titulo; 
            $actividad->Categoria      =   $request->categoria; 
            $actividad->Fecha       =  $request->fecha;
            $actividad->Status      =   $request->status; 
            $actividad->save();
            return response()->json(['success'=>'Validado']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $actividad = Actividad::where('id', $request->id)->delete();
    }
}
