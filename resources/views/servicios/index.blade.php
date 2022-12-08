@extends('layouts.app')
@section('aside_menu')
@include('layouts.aside')
@endsection
@section('titulo_ventana', 'Servicios')

@section('Contenido_app')

<div class="row">
    <div class="col-sm-8 col-sm-offset-2">
        <a class="btn btn-info col-3" data-toggle="modal" data-target="#crearServicio"><i class="fa-solid fa-horse"></i> Nuevo
            Servicio</a>
    </div>
</div>

<!-- Modal CREAR Domo-->
<div class="modal fade" id="crearServicio" tabindex="-1" role="dialog" aria-labelledby="crearServicio" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Crear Servicio</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form action="{{route('servicioGuardar')}}" method="post">
                <div class="modal-body">
                    @csrf

                    {{-- @if($errors->any())
                    @foreach($errors->all() as $error)
                    <p>{{$error}}</p>
                    @endforeach
                    @endif --}}

                    <div class="form-group">
                        <label for="nombre">Nombre</label>
                        <input type="text" class="form-control" name="nombre" id="nombre"
                            placeholder="Ingrese el nombre del servicio" value="{{old('nombre')}}"  minlength="5"  maxlength="20" required>
                        <small class="text-danger">{{$errors->first('nombre')}}</small>
                    </div>

                    <div class="form-group">
                        <label for="descripcion">Descripción</label>
                        <textarea class="form-control" name="descripcion" id="descripcion"
                            rows="2"  minlength="10"  maxlength="99" required>{{old('descripcion')}}</textarea>
                        <small class="text-danger">{{$errors->first('descripcion')}}</small>

                    </div>

                    <div class="form-group">
                        <label for="precio">Precio</label>
                        <input type="number" class="form-control" name="precio" id="precio"
                            placeholder="Ingrese el precio" value="{{old('precio')}}"  min="10000" max="1000000"  required >
                        <small class="text-danger">{{$errors->first('precio')}}</small>
                    </div>

                    <div class="form-group">
                        <label for="tiempo">Tiempo</label>
                        <input type="time" class="form-control" id="tiempo" name="tiempo"
                            placeholder="ingrese la fecha" value="{{old('tiempo')}}" required>
                        <small class="text-danger">{{$errors->first('tiempo')}}</small>
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
<!-- FIN Modal CREAR Domo-->




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
                        <th scope="col">Descripcion</th>
                        <th scope="col">Precio</th>
                        <th scope="col">Tiempo</th>
                        <th scope="col">Estado</th>
                        <th scope="col">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($servicios as $servicio)
                    <tr>
                        <th scope="row">{{$servicio->id}}</th>
                        <td>{{$servicio->nombre}}</td>
                        <td>{{$servicio->descripcion}}</td>
                        <td>{{$servicio->precio}}</td>
                        <td>{{$servicio->tiempo}}</td>
                        <td>
                            @if($servicio->estado == 1)

                            <button class="btn btn-success col-9"><i class="fa-sharp fa-solid fa-power-off"></i></button>

                            @elseif ($servicio->estado == 2)

                            <button class="btn btn-danger col-9"><i class="fa-sharp fa-solid fa-power-off"></i></button>
                            @endif
                        </td>
                        <td>

                            {{-- <form action="{{route('servicioEliminar', $servicio)}}" method="post" class="formulario-eliminar">
                                <a href="#mostrarServicio{{$servicio->id}}" data-toggle="modal"
                                    data-target="#mostrarServicio{{$servicio->id}}"><i
                                        class="fas fa-info-circle fa-lg text-success"></i></a> --}}
                                <a class="btn btn-warning" href="#editarServicio{{$servicio->id}}" data-toggle="modal"
                                    data-target="#editarServicio{{$servicio->id}}"
                                    style="margin-left: 20px; margin-right: 20px;"><i class="fa-sharp fa-solid fa-pen-to-square"></i></a>

                                {{-- @csrf @method('DELETE')
                                <button type="submit " style="border: none"><i
                                        class="fas fa-trash-alt fa-lg text-danger"></i></button>
                            </form> --}}
                        </td>
                    </tr>
            </div>
        </div>


    <!-- Modal MOSTRAR Domo-->

    <div class="modal fade" id="mostrarServicio{{$servicio->id}}" tabindex="-1" role="dialog" aria-labelledby="mostrarServicio"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Mostrar Servicio</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <form>
                    <div class="modal-body">

                        <div class="form-group">
                            <label for="nombre">Nombre</label>
                            <input type="text" class="form-control" name="nombre" id="nombre"
                                placeholder="Ingrese el nombre" value="{{old('nombre', $servicio->nombre)}}" disabled>
                            <small class="text-danger">{{$errors->first('nombre')}}</small>
                        </div>

                        <div class="form-group">
                            <label for="descripcion">Descripción</label>
                            <textarea class="form-control" name="descripcion" id="descripcion"
                                rows="2" disabled>{{old('descripcion', $servicio->descripcion)}}</textarea>
                            <small class="text-danger">{{$errors->first('descripcion')}}</small>

                        </div>

                        <div class="form-group">
                            <label for="precio">Precio</label>
                            <input type="number" class="form-control" name="precio" id="precio"
                                placeholder="Ingrese su edad" value="{{old('precio', $servicio->precio)}}" disabled>
                            <small class="text-danger">{{$errors->first('precio')}}</small>
                        </div>

                        <div class="form-group">
                            <label for="tiempo">Tiempo</label>
                            <input type="time" class="form-control" id="tiempo" name="tiempo"
                                placeholder="ingrese un email" value="{{old('tiempo', $servicio->tiempo)}}" disabled>
                            <small class="text-danger">{{$errors->first('tiempo')}}</small>
                        </div>

                        <div class="form-group">
                            <label for="estado">Estado</label>
                            <select class="form-control" name="estado" id="estado" disabled>
                                <option value="1">Activo</option>
                                <option value="2">Inactivo</option>
                            </select>
<<<<<<< HEAD

=======
<<<<<<< HEAD
>>>>>>> ramaharrison
=======
>>>>>>> 58b9f956979fc516fa1111ec86763cfe024cdb95
>>>>>>> main
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Modal Editar domo-->

    <div class="modal fade" id="editarServicio{{$servicio->id}}" tabindex="-1" role="dialog" aria-labelledby="editarServicio"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Editar Servicio</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <form action="{{route('servicioActualizar', $servicio)}}" method="post">
                    <div class="modal-body">
                        @csrf @method('PUT')

                        
                        <div class="form-group">
                            <label for="nombre">Nombre</label>
                            <input type="text" class="form-control" name="nombre" id="nombre"
                                placeholder="Ingrese el nombre del servicio" value="{{($servicio->nombre)}}" minlength="5"  maxlength="20" required>
                            <small class="text-danger">{{$errors->first('nombre')}}</small>
                        </div>

                        <div class="form-group">
                            <label for="descripcion">Descripción</label>
                            <textarea class="form-control" name="descripcion" id="descripcion"
                                rows="2" minlength="10"  maxlength="99" required>{{old('descripcion', $servicio->descripcion)}}</textarea>
                            <small class="text-danger">{{$errors->first('descripcion')}}</small>

                        </div>

                        <div class="form-group">
                            <label for="precio">Precio</label>
                            <input type="number" class="form-control" name="precio" id="precio"
                                placeholder="Ingrese el precio" value="{{old('precio', $servicio->precio)}}" min="10000" max="1000000" required>
                            <small class="text-danger">{{$errors->first('precio')}}</small>
                        </div>

                        <div class="form-group">
                            <label for="date">Tiempo</label>
                            <input type="time" class="form-control" id="tiempo" name="tiempo"
                                placeholder="ingrese la fecha" value="{{old('tiempo', $servicio->tiempo)}}" required>
                            <small class="text-danger">{{$errors->first('tiempo')}}</small>
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
                        <button type="submit" class="btn btn-primary">Actualizar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- FIN Modal Editar EMPLEADO-->
    <!-- FIN Modal MOSTRAR EMPLEADO-->

    @empty
    <!--No hay empleados-->
    @endforelse
    </tbody>
    </table>
</div>
</div>
</div>
<!--</div>
</div>-->

{{-- <div class="d-flex justify-content-center">
    {{ $domos->links() }}
</div> --}}


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

@if (session('mensaje')=="Servicio eliminado")
<script>
    Swal.fire(
            'Deleted!',
            'Your file has been deleted.',
            'success'
        )
</script>

@endif

@if (session('mensaje')=="Servicio eliminado")
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
        $('#crearServicio').modal('show')
    })
</script>
@endif

@endsection()
@endsection
