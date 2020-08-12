<?php

namespace App\Http\Controllers;

use App\Vehiculo;
use App\Marca;
use App\Propietario;
use Illuminate\Http\Request;
use App\Http\Requests\ValidateVehiculo;


class VehiculoController extends Controller
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
    public function index()
    {
        $vehiculo = Vehiculo::orderBy('marca')->groupBy('marca')->selectRaw('count(marca) as cantidad ,marca')->get();
        return view('vehiculo.index')->with('vehiculos',$vehiculo);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //$marcas = Marca::all();
        return view('vehiculo.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ValidateVehiculo $request)
    {
        $propietario = Propietario::where('cedula',$request->cedula)->first();
        if($propietario == null){
            $propietario = new Propietario();
            $propietario->nombre = $request->nombre;
            $propietario->apellido = $request->apellido;
            $propietario->telefono = $request->telefono;
            $propietario->cedula = $request->cedula;
            $propietario->save();
        }

        $vehiculo = new Vehiculo();
        $vehiculo->placa = $request->placa;
        $vehiculo->tipo = $request->tipo;
        $vehiculo->modelo = $request->modelo;
        $vehiculo->marca = $request->marca;
        $vehiculo->propietario_id = $propietario->id;
        $vehiculo->save();

        \Session::flash('msg',"$vehiculo->tipo Con Placa $vehiculo->placa Propietario $propietario->nombre $propietario->apellido  Creado Correctamente"); 
        return redirect('propietario');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Vehiculo  $vehiculo
     * @return \Illuminate\Http\Response
     */
    public function show($vehiculo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Vehiculo  $vehiculo
     * @return \Illuminate\Http\Response
     */
    public function edit($vehiculo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Vehiculo  $vehiculo
     * @return \Illuminate\Http\Response
     */
    public function update(ValidateVehiculo $request,$id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Vehiculo  $vehiculo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Vehiculo $id)
    {
        //
    }
}
