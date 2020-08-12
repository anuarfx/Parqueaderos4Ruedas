<?php

namespace App\Http\Controllers;

use App\Propietario;
use Illuminate\Http\Request;
use App\Http\Requests\ValidatePropietario;

class PropietarioController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if(isset($request->buscador) && isset($request->button)){
            if($request->button == "nombre"){
                $propietario = Propietario::with('Vehiculos')->where('nombre','like',"%$request->buscador%")->paginate(8);
                return view('propietario.index')->with('propietario',$propietario);
            }
            if($request->button == "cedula"){
                $propietario = Propietario::with('Vehiculos')->where('cedula','like',"%$request->buscador%")->paginate(8);
                return view('propietario.index')->with('propietario',$propietario);
            }
            if($request->button == "placa"){
                $propietario = Propietario::with(['Vehiculos' => function($query) use ($request){
                    $query->where('vehiculos.placa','like',"%$request->buscador%");
                }])->paginate(8);
                return view('propietario.index')->with('propietario',$propietario);
            }
        }
        $propietario = Propietario::with('Vehiculos')->paginate(8);
        return view('propietario.index')->with('propietario',$propietario);
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
    public function store(ValidatePropietario $request)
    {
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Propietario  $propietario
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Propietario  $propietario
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Propietario  $propietario
     * @return \Illuminate\Http\Response
     */
    public function update(ValidatePropietario $request,$id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Propietario  $propietario
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
