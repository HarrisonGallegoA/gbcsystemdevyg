@extends('layouts.app')
@section('aside_menu')
@include('layouts.aside')
@endsection
@section('titulo_ventana', 'Características')

@section('Contenido_app')

<div class="row">
    <div class="col-sm-8 col-sm-offset-2">
        <a class="btn btn-info col-3" data-toggle="modal" data-target="#crearCaracteristica"><i
                class="fa-solid fa-boxes-stacked"></i> Nueva
            Característica</a>
    </div>
</div>

<!-- Modal CREAR caracteristica-->
<div class="modal fade" id="crearCaracteristica" tabindex="-1" role="dialog" aria-labelledby="crearCaracteristica"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Crear Caracteristica</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form action="{{route('caracteristicaGuardar')}}" method="post">
                <div class="modal-body">
                    @csrf

                    {{-- @if($errors->any())
                    @foreach($errors->all() as $error)
                    <p>{{$error}}</p>
                    @endforeach
                    @endif --}}

                    <div class="form-group">
                        <label for="nombre">Nombre Caracteristica</label>
                        <input type="text" class="form-control" name="nombre" id="nombre"
                            placeholder="Ingrese el nombre de la caracteristica" value="{{old('nombre')}}">
                        <small class="text-danger">{{$errors->first('nombre')}}</small>
                    </div>

                    <div class="form-group">
                        <label for="detalle">Detalle</label>
                        <textarea class="form-control" name="detalle" id="detalle"
                            rows="2">{{old('detalle')}}</textarea>
                        <small class="text-danger">{{$errors->first('detalle')}}</small>
                    </div>

                    <div class="form-group">
                        <label for="cantidad">Cantidad</label>
                        <input type="number" class="form-control" name="cantidad" id="cantidad"
                            placeholder="Ingrese la cantidad" value="{{old('cantidad')}}">
                        <small class="text-danger">{{$errors->first('cantidad')}}</small>
                    </div>
                    <div class="form-group">
                        <label for="estado">Estado</label>
                        <select class="form-control" name="estado" id="estado">
                            <option value="1">Activo</option>
                            <option value="2">Inactivo</option>
                        </select>

                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-primary">Guardar</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- FIN Modal CREAR Caracteristica-->

<br>
<!--@if (session('mensaje'))
<div class="alert alert-success">
    {{ session('mensaje') }}
</div>
@endif-->
<div class="card shadow mb-4 col-12">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-striped table-bordered dt-responsive nowrap" id="dataTable" width="100%"
                cellspacing="0">
                <thead>

                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Detalle</th>
                        <th scope="col">Cantidad</th>
                        <th scope="col">Estado</th>
                        <th scope="col">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($caracteristicas as $caracteristica)
                    <tr>
                        <th scope="row">{{$caracteristica->id}}</th>
                        <td>{{$caracteristica->nombre}}</td>
                        <td>{{$caracteristica->detalle}}</td>
                        <td>{{$caracteristica->cantidad}}</td>
                        <td>
                            @if($caracteristica->estado == 1)

                            <button class="btn btn-success col-9"><i class="fa-sharp fa-solid fa-power-off"></i></button>

                            @elseif ($caracteristica->estado == 2)

                            <button class="btn btn-danger col-9"><i class="fa-sharp fa-solid fa-power-off"></i></button>
                            @endif
                        </td>
                        <td>

                          {{--   <form action="{{route('caracteristicaEliminar', $caracteristica)}}" method="post"
                                class="formulario-eliminar"> --}}
                                <a href="{{$caracteristica->id}}" data-toggle="modal"
                                    data-target="#mostrarCaracteristica{{$caracteristica->id}}"><i
                                        class="fas fa-info-circle fa-lg text-success"></i></a>
                                <a class="btn btn-warning" href="#editarCaracteristica{{$caracteristica->id}}" data-toggle="modal"
                                    data-target="#editarCaracteristica{{$caracteristica->id}}"
                                    style="margin-left: 20px; margin-right: 20px;"><i class="fa-sharp fa-solid fa-pen-to-square"></i></a>

                                {{-- @csrf @method('DELETE')
                                <button type="submit " style="border: none"><i
                                        class="fas fa-trash-alt fa-lg text-danger"></i></button> --}}
                           {{--  </form> --}}
                        </td>
                        {{-- <td>
                            @if($caracteristica->estado == 1)

                            <button class="btn btn-success col-9"><i class="fa-sharp fa-solid fa-power-off"></i></button>

                            @elseif ($caracteristica->estado == 2)

                            <button class="btn btn-danger col-9"><i class="fa-sharp fa-solid fa-power-off"></i></button>
                            @endif</td>
                        <td> --}}
                    </tr>
        </div>
    </div>


    <!-- Modal MOSTRAR Domo-->

    <div class="modal fade" id="mostrarCaracteristica{{$caracteristica->id}}" tabindex="-1" role="dialog"
        aria-labelledby="mostrarCaracteristica" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Mostrar Caracteristica</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <form>
                    <div class="modal-body">

                        <div class="form-group">
                            <label for="nombre">Nombre Caracteristica</label>
                            <input type="text" class="form-control" name="nombre" id="nombre"
                                placeholder="Ingrese el nombre" value="{{old('nombre', $caracteristica->nombre)}}"
                                disabled>
                            <small class="text-danger">{{$errors->first('nombre')}}</small>
                        </div>
                        <div class="form-group">
                            <label for="cantidad">Cantidad</label>
                            <input type="number" class="form-control" name="cantidad" id="cantidad"
                                placeholder="Ingrese su edad" value="{{old('cantidad', $caracteristica->cantidad)}}"
                                disabled>
                            <small class="text-danger">{{$errors->first('cantidad')}}</small>
                        </div>
                        <div class="form-group">
                            <label for="detalle">Detalle</label>
                            <textarea class="form-control" name="detalle" id="detalle" rows="2"
                                disabled>{{old('detalle', $caracteristica->detalle)}}</textarea>
                            <small class="text-danger">{{$errors->first('detalle')}}</small>
                        </div>
                        <div class="form-group">
                            <label for="estado">Estado</label>
                            <select class="form-control" name="estado" id="estado" disabled>
                                <option value="1">Activo</option>
                                <option value="2">Inactivo</option>
                            </select>

                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Modal Editar domo-->

    <div class="modal fade" id="editarCaracteristica{{$caracteristica->id}}" tabindex="-1" role="dialog"
        aria-labelledby="editarCaracteristica" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Editar Caracteristica</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <form action="{{route('caracteristicaActualizar', $caracteristica)}}" method="post">
                    <div class="modal-body">
                        @csrf @method('PUT')

                        @if($errors->any())
                        @foreach($errors->all() as $error)
                        <p>{{$error}}</p>
                        @endforeach
                        @endif


                        <div class="form-group">
                            <label for="nombre">Nombre Domo</label>
                            <input type="text" class="form-control" name="nombre" id="nombre"
                                placeholder="Ingrese el nombre" value="{{old('nombre', $caracteristica->nombre)}}">
                            <small class="text-danger">{{$errors->first('nombre')}}</small>
                        </div>
                        <div class="form-group">
                            <label for="cantidad">cantidad</label>
                            <input type="number" class="form-control" name="cantidad" id="cantidad"
                                placeholder="Ingrese su edad" value="{{old('cantidad', $caracteristica->cantidad)}}">
                            <small class="text-danger">{{$errors->first('cantidad')}}</small>
                        </div>
                        <div class="form-group">
                            <label for="detalle">Detalle</label>
                            <textarea class="form-control" name="detalle" id="detalle"
                                rows="2">{{old('detalle', $caracteristica->detalle)}}</textarea>
                            <small class="text-danger">{{$errors->first('detalle')}}</small>
                        </div>

                        <div class="form-group">
                            <label for="estado">Estado</label>
                            <select class="form-control" name="estado" id="estado">
                                <option value="1">Activo</option>
                                <option value="2">Inactivo</option>
                            </select>

                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                            <button type="submit" class="btn btn-primary">Actualizar</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@empty
<!--No hay empleados-->
@endforelse
</tbody>
</table>
</div>
</div>
</div>


{{-- <div class="d-flex justify-content-center">
    {{ $caracteristicas->links() }}
</div>--}}


@section('scripts')

<script>
    $('.formulario-eliminar').submit(function(e){
        e.preventDefault(); // previene que se haga el submit
        Swal.fire({
            title: 'Estás seguro?',
            text: "No podrás revertir esto!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Si, bórralo!'
        }).then((result) => {
            if (result.isConfirmed) {
                this.submit();

            }
        })
    });

</script>

@if (session('mensaje')=="Caracteristica eliminada")
<script>
    Swal.fire(
            'Deleted!',
            'Your file has been deleted.',
            'success'
        )
</script>

@endif

@if (session('mensaje')=="Caracteristica eliminada")
<script>
    Swal.fire(
            'Deleted!',
            'Your file has been deleted.',
            'success'
        )
</script>

@endif

@if (session('mensaje'))
<script>
    Swal.fire(
            //'El empleado se guardó con éxito!',
            '{{ session('mensaje') }}',
            'Presione el boton ok para cerrar!',
            'success'
        )
</script>
@endif
@if($errors->any())
<script>
    $(document).ready(function(){
        $('#crearCaracteristica').modal('show')
    })
</script>
@endif

@endsection()
@endsection
