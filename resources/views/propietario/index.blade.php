@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">  
                    
                    @if(Session::has('msg'))
                    
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>{{Session::get('msg')}}</strong>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                    @endif
                    <div class="row justify-content-between">
                        <div class="col-3">
                            Propietarios
                        </div>
                        <div class="col-5">
                            <form action="" method="get">
                                <div class="input-group">
                                    <input type="text" class="form-control" name="buscador" placeholder="Buscador ..." aria-label="Recipient's username with two button addons" aria-describedby="button-addon4">
                                    <div class="input-group-append" id="button-addon4">
                                    <button class="btn btn-outline-secondary dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Buscar</button>
                                        <div class="dropdown-menu">
                                          <button type="submit" name="button" value="nombre" class="dropdown-item">Nombre Propietario</button>
                                          <button type="submit" name="button" value="cedula" class="dropdown-item">Cedula Propietario</button>
                                            <button type="submit" name="button"  value="placa" class="dropdown-item">Placa Vehiculo</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    <table class="table table-bordered" style="border-collapse:collapse;">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Nombre</th>
                                <th>Apellido</th>
                                <th>Telefono</th>
                                <th>Vehiculos</th>
                                <!--<th>Acciones</th>-->
                            </tr>
                        </thead>
                        <tbody>
                            @if (isset($propietario))
                            @foreach ($propietario as $item)
                            <tr colspan="5" data-toggle="collapse" data-target="#propietario-{{$item->id}}" class="accordion-toggle">
                               <td>{{ $loop->iteration }}</td>
                               <td>{{$item->nombre}}</td>
                               <td>{{$item->apellido}}</td>
                               <td>{{$item->telefono}}</td>
                               <td>{{count($item['vehiculos'])}}</td>
                               <!--<td>
                                   <a href="#" class="btn btn-outline-warning" data-toggle="modal" data-target="#exampleModal">Editar</a>
                               </td>-->
                           </tr>
                           <tr class="hiddenRow accordian-body collapse p-3" id="propietario-{{$item->id}}">
                               <th>No.</th>
                               <th>Placa</th>
                               <th>Marca</th>
                               <th>Modelo</th>
                               <th>Tipo</th>
                           </tr>
                               @foreach ($item['vehiculos'] as $vehiculo)
                                
                               <tr class="hiddenRow accordian-body collapse p-3" id="propietario-{{$item->id}}">
                                   <td>{{$vehiculo->id}}</td>
                                   <td>{{$vehiculo->placa}}</td>
                                   <td>{{$vehiculo->marca}}</td>
                                   <td>{{$vehiculo->modelo}}</td>
                                   <td>{{$vehiculo->tipo}}</td>
                               </tr>
                                 
                               @endforeach
           
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