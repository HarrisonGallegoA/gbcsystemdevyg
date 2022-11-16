@extends('layouts.app')
@section('aside_menu')
@include('layouts.aside')
@endsection
@section('titulo_ventana', 'Lista Domos')

@section('Contenido_app')

<br>
<div class="row">
    <div class="col">
        <div class="col-sm-8 col-sm-offset-2">
            <a class="btn btn-info col-3" href="/domo/caracteristicas"><i class="fa-solid fa-igloo"></i>
                Agregar
                Domo</a>
        </div>
        <br>
    </div>
</div>

<div class="card shadow mb-4 col-12">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-striped table-bordered dt-responsive nowrap" id="dataTable" width="100%"
                cellspacing="0">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Descripción</th>
                        <th scope="col">capacidad</th>
                        <th scope="col">numero de baños</th>
                        <th scope="col">tipo domo</th>
                        <th scope="col">Estado</th>
                        <th scope="col">Caracteristicas</th>
                        <th scope="col">Acciones</th>
                    </tr>
                </thead>
                <tbody>

                    @foreach ($domos as $value)
                    <tr>
                        <th scope="row">{{$value->id}}</th>
                        <td>{{ $value->nombre }}</td>
                        <td>{{ $value->descripcion }}</td>
                        <td>{{ $value->capacidad }}</td>
                        <td>{{ $value->numerobaños }}</td>
                        <td>{{ $value->tipodomo }}</td>
                        <td>
                            @if($value->estado == 1)

                            <button class="btn btn-success col-9"><i
                                    class="fa-sharp fa-solid fa-power-off"></i></button>

                            @elseif ($value->estado == 2)

                            <button class="btn btn-danger col-9"><i class="fa-sharp fa-solid fa-power-off"></i></button>
                            @endif
                        </td>
                        <td>
                            <a class="btn btn-info col-10" href="/domo/listar?id={{$value->id}}"><i
                                    class="fa-solid fa-eye">
                            </a></i>
                        </td>

                        <td>
                            <a href="#editarDomoCaracteristica{{$value->id}}" data-toggle="modal"
                                data-target="#editarDomoCaracteristica{{$value->id}}"><i
                                class="fas fa-user-edit fa-lg"></i>
                            </a>
                        </td>
                    </tr>
                    @endforeach
                    
                </tbody>
            </table>
        </div>
    </div>

    {{-- <div class="modal fade" id="editarDomoCaracteristica{{$value->id}}" tabindex="-1" role="dialog" aria-labelledby="editarDomoCaracteristica"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Editar Domo</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <form action="{{route('domocaracteristicaactualizar', $value)}}" method="post">
                    <div class="modal-body">
                        @csrf @method('PUT')

                        <div class="form-group">
                            <label for="nombre">Nombre Domo</label>
                            <input type="text" class="form-control" name="nombre" id="nombredomo"
                                placeholder="Ingrese el nombre del domo" value="{{old('nombre', $value->nombre)}}">
                            <small class="text-danger">{{$errors->first('nombre')}}</small>
                        </div>
                        <div class="form-group">
                            <label for="capacidad">capacidad</label>
                            <input type="number" class="form-control" name="capacidad" id="capacidad"
                                placeholder="Ingrese la capacidad del domo"
                                value="{{old('capacidad', $value->capacidad)}}">
                            <small class="text-danger">{{$errors->first('capacidad')}}</small>
                        </div>
                        <div class="form-group">
                            <label for="descripcion">descripcion</label>
                            <textarea class="form-control" name="descripcion" id="descripcion"
                                rows="2">{{old('descripcion', $value->descripcion)}}</textarea>
                            <small class="text-danger">{{$errors->first('descripcion')}}</small>

                        </div>
                        <div class="form-group">
                            <label for="tipodomo">Tipo Domo</label>
                            <input type="text" class="form-control" id="tipodomo" name="tipodomo"
                                placeholder="ingrese el tipo del domo" value="{{old('tipodomo', $value->tipodomo)}}">
                            <small class="text-danger">{{$errors->first('tipodomo')}}</small>
                        </div>

                        <div class="form-group">
                            <label for="numerobaños">numero baños</label>
                            <input type="number" class="form-control" id="numerobaños" name="numerobaños"
                                placeholder="ingrese el numero de baños"
                                value="{{old('numerobaños', $value->numerobaños)}}">
                            <small class="text-danger">{{$errors->first('numerobaños')}}</small>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                        <button type="submit" class="btn btn-primary">Actualizar</button>
                    </div>
                </form>
            </div>
        </div>
    </div> 
    
    
    actualizado--}}
</div>

@if(count($caracteristicas) > 0 )
<div class="card shadow mb-4 col-10">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead class="thead-dark">
                    </tr>
                    <th>Nombre</th>
                    <th>detalle</th>
                    <th>Cantidad</th>
                </thead>
                <tbody>
                    @foreach ($caracteristicas as $value)
                    <tr>
                        <td>{{ $value->nombre }}</td>
                        <td>{{ $value->detalle }}</td>
                        <td>{{ $value->cantidad_c }}</td>
                    </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
    </div>
</div>
<br>
<br>
<br>
<br>

@endif
@endsection

@section('scripts')

@if(session('status'))
@if(session('status')== "1")
<script>
    Swal.fire({
  icon: 'success',
  title: 'Se guardo el Domo',
  showConfirmButton: false,
  timer: 2500

})
</script>
@endif
@endif

@endsection