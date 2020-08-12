@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">  
                    <div class="row justify-content-between">
                        <div class="col-3">
                            Propietarios
                        </div>
                        
                    </div>
                </div>

                <div class="card-body">
                    <table class="table table-bordered" style="border-collapse:collapse;">
                        <thead>
                            <tr>
                                <tr>
                                    <th>No.</th>
                                    <th>Marca</th>
                                    <th>Cantidad</th>
                                </tr>
                            </tr>
                        </thead>
                        <tbody>
                            @if (isset($vehiculos))
                            @foreach ($vehiculos as $vehiculo)
                             
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ucfirst(strtolower($vehiculo->marca))}}</td>
                                <td>{{$vehiculo->cantidad}}</td>
                            </tr>
                              
                            @endforeach
                            @else
                            <tr class="p">
                                <td colspan="5">
                                <div class="p-3">
                                        <p> Sin Registros </p>
                                    </div> 
                                </td> 
                            </tr>
                            @endif
                        </tbody>
                    </table>
                    @include('propietario.edit')
                </div>
            </div>
        </div>
    </div>
</div>
@endsection