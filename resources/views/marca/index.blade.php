@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">  
                    @isset($msg)
                      <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>{{$msg}}</strong>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                    @endisset
                    <div class="row justify-content-between">
                        <div class="col-3">
                            Marca de Vehiculos
                        </div>
                        <div class="col-4">
                            <form action="" method="get">
                                @csrf
                                <div class="input-group">
                                    <input type="text" class="form-control" name="buscador" placeholder="Buscar marca nombre..." aria-label="Recipient's username with two button addons" aria-describedby="button-addon4">
                                    <div class="input-group-append" id="button-addon4">
                                    <button class="btn btn-outline-secondary" type="button">Buscar</button>
                                    <a href="#" class="btn btn-outline-success ml-1" data-toggle="modal" data-target="#create-marca">Crear Marca</a>
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
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if (isset($marcas))
                              @foreach ($marcas as $item)
                                <tr>
                                <td>{{$item->id}}</td>
                                <td>{{$item->nombre}}</td>
                                <td>
                                    <a href="#" id="{{$item->id}}" class="btn btn-outline-warning btn-edit-marca">Editar Marca</a>
                                </td>
                                </tr>
                              @endforeach
                            @else
                            <tr class="p">
                                <td colspan="3">
                                    <div class="p-3">
                                            <p> Sin Registros </p>
                                    </div> 
                                </td> 
                            </tr>
                            @endif
                         
                        </tbody>
                    </table>
                    @include('marca.edit')
                    @include('marca.create')
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    $(document).ready(()=>{
        // enviar formulario para crear la marca 
        /*$('#form-marca-create').on('submit',(e)=>{
            e.preventDefault();
            var formData = new FormData(document.getElementById("form-marca-create"));
            $.ajax({
              url: '{{url('marca')}}', // point to server-side PHP script
              cache: false,
              contentType: false,
              processData: false,
              data: formData,
              type: 'POST',
              success: function(result) {
                  console.log(result);
              }
            });
        });*/
        // abrir el modal con la informacion del registro para actualizar
        $('.btn-edit-marca').on('click',(e)=>{
            let id = e.currentTarget.id;
            let url = '{{url('marca')}}';
            url =  url+`/${id}/edit`;
            $.ajax({
              url: url, // point to server-side PHP script
              type: 'GET',
              success: function(result) {
                  console.log(result);
                
              }
            });
        });
    });

    function TrData(data) {
        var fila = `
        <tr>
        <td>${item->id}}</td>
        <td>${item->nombre}</td>
        <td>
            <a href="#" id="${item->id}" class="btn btn-outline-warning btn-edit-marca">Editar Marca</a>
        </td>
        </tr>
        
        `;
    }
    </script>
@endsection