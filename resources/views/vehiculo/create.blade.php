@extends('layouts.app')

@section('content')

  <div class="container">
    <div class="card">
      <div class="card-body">
      <form action="{{url('vehiculo')}}" method="POST">
        @csrf
          <div class="row justify-content-center">
            <div class="col-6"><h6><strong>Informacion Propietario</strong></h6></div>
            <div class="col-6"><h6><strong>Informacion del Vehiculo</strong></h6></div>
        </div>
        <hr>
        <div class="row justify-content-center">
          <div class="col-6">
              <div class="form-group">
                  <label for="">Cedula</label>
                  <input type="text" name="cedula" class="form-control  @error('cedula') is-invalid @enderror" value="{{ old('cedula') }}" required>
                  @error('cedula')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                    @enderror
              </div>
              <div class="form-group">
                  <label for="">Nombre</label>
                  <input type="text" name="nombre" class="form-control  @error('nombre') is-invalid @enderror" value="{{ old('nombre') }}" required>
                  @error('nombre')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                  @enderror
              </div>
              <div class="form-group">
                  <label for="">Apellido</label>
                  <input type="text" name="apellido" class="form-control  @error('apellido') is-invalid @enderror" value="{{ old('apellido') }}" required>
                  @error('apellido')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                  @enderror
              </div>
              <div class="form-group">
                  <label for="">Telefono</label>
                  <input type="text" name="telefono" class="form-control  @error('telefono') is-invalid @enderror" value="{{ old('telefono') }}" required>
                  @error('telefono')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                      @enderror
              </div>
          </div>
          <div class="col-6">
            
                  <div class="form-group">
                      <label for="">Placa</label>
                      <input type="text" name="placa" class="form-control  @error('placa') is-invalid @enderror" value="{{ old('placa') }}" required>
                      @error('placa')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                      @enderror
                  </div>
                  <div class="form-group">
                      <label for="">Marca</label>
                      <select name="marca" id="" class="form-control  @error('marca') is-invalid @enderror" required>
                         <option value="" selected>Seleccionar</option>
                         <option value="Chevrolet" >Audi</option>
                         <option value="Kia" >Kia</option>
                         <option value="Renault">Renault</option>
                         <option value="Mazda">Mazda</option>
                         <option value="Akt" >Akt</option>
                         <option value="Honda" >Honda</option>
                         <option value="Yamaha" >Yamaha</option>
                         <option value="Suzuki" >Suzuki</option>
                      </select>
                      @error('marca')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                      @enderror
                  </div>
                  <div class="form-group">
                      <label for="">Tipo Vehiculo</label>
                      <select name="tipo" id="" class="form-control @error('tipo') is-invalid @enderror" required>
                          <option value="" selected>Seleccionar</option>
                          <option value="Automovil">Automovil</option>
                          <option value="Motocicleta">MotoCicleta</option>
                      </select>
                      @error('tipo')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                      @enderror
                  </div>
                  <div class="form-group">
                      <label for="">Modelo</label>
                      <input type="text" name="modelo" class="form-control @error('modelo') is-invalid @enderror" value="{{ old('modelo') }}" required>
                      @error('modelo')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                      @enderror
                  </div>
              
          </div>
      </div>
      <hr>
       <button type="submit" class="btn btn-outline-success">Agregar Nuevo Vehiculo</button>
        </form>
    </div>
  </div>
    
@endsection