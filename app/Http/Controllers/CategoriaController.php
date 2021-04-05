<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Categoria;
use Carbon\Carbon;
use DataTables;

class CategoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('Categorias');
    }
    public function listar(Request $request)
    {
        if ($request->ajax()) {
            $data = Categoria::get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($row){
                    return '
                    <div class="flex item-center justify-center">
                        <div id="getEditarCategoria" data-id="'.$row->id.'" class="w-4 mr-2 transform hover:text-purple-500 hover:scale-110">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                            </svg>
                        </div>
                        <div id="getEliminarCategoria" data-id="'.$row->id.'" class="w-4 mr-2 transform hover:text-purple-500 hover:scale-110">
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
        ]);
        if ($validator->fails()) {
            // return redirect('categoria.save')
            //             ->withErrors($validator)
            //             ->withInput();
            return response()->json(['error'=>$validator->errors()]);
        }else{
            $mytime = Carbon::now('America/Mexico_City');
            
            $categoria = new Categoria();
            $categoria->Descripcion      =   $request->descripcion;
            $categoria->Fecha       =  $mytime->toDateString();
            $categoria->save();
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
        $data = Categoria::where('id', $request->id)->first();

        $html = '<div class="form-group">
                    
                    <label for="descripcionc">Descripción</label>
                    <input  type="text" class="form-control cambiar-entrada" name="descripcionc" id="descripcionc" value="'.$data->Descripcion.'">
                    <span class="text-danger error-text descripcionc_err"></span>
                </div>';

        return response()->json(['html'=>$html]);
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
            'descripcionc' => 'required|max:255',
        ]);
        if ($validator->fails()) {
            // return redirect('categoria.save')
            //             ->withErrors($validator)
            //             ->withInput();
            return response()->json(['error'=>$validator->errors()]);
        }else{
            
            $categoria = Categoria::findOrFail($request->id);
            $categoria->Descripcion      =   $request->descripcionc;
            $categoria->save();
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
        $categoria = Categoria::where('id', $request->id)->delete();
    }
}
