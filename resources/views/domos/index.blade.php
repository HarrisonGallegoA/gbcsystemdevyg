@extends('layouts.app')
@section('aside_menu')
@include('layouts.aside')
@endsection
@section('titulo_ventana', 'Domos')

@section('Contenido_app')



<div class="row">
    <div class="col-sm-8 col-sm-offset-2">
        <a class="btn btn-info col-3" data-toggle="modal" data-target="#crearDomo"><i class="fa-solid fa-dungeon"></i>
            Nuevo
            Domo</a>
    </div>
</div>

<!-- Modal CREAR Domo-->
<div class="modal fade" id="crearDomo" tabindex="-1" role="dialog" aria-labelledby="crearDomo" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Crear Domo</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form action="{{route('domoGuardar')}}" method="post">
                <div class="modal-body">
                    @csrf

                    @if($errors->any())
                    @foreach($errors->all() as $error)
                    <p>{{$error}}</p>
                    @endforeach
                    @endif

                    <div class="form-group">
                        <label for="nombredomo">Nombre Domo</label>
                        <input type="text" class="form-control" name="nombredomo" id="nombredomo"
                            placeholder="Ingrese el nombre del domo" value="{{old('nombredomo')}}">
                        <small class="text-danger">{{$errors->first('nombredomo')}}</small>
                    </div>

                    <div class="form-group">
                        <label for="capacidad">capacidad</label>
                        <input type="number" class="form-control" name="capacidad" id="capacidad"
                            placeholder="Ingrese la capacidad del domo" value="{{old('capacidad')}}">
                        <small class="text-danger">{{$errors->first('capacidad')}}</small>
                    </div>
                    <div class="form-group">
                        <label for="descripcion">Descripcion</label>
                        <textarea class="form-control" name="descripcion" id="descripcion"
                            rows="2">{{old('descripcion')}}</textarea>
                        <small class="text-danger">{{$errors->first('descripcion')}}</small>

                    </div>
                    <div class="form-group">
                        <label for="tipodomo">tipodomo</label>
                        <select class="form-control" name="tipodomo" id="tipodomo">
                            <option value="1">Domo Familiar</option>
                            <option value="2">Domo Pareja</option>
                        </select>

                    </div>

                    <div class="form-group">
                        <label for="numerobaños">numero baños</label>
                        <input type="number" class="form-control" id="numerobaños" name="numerobaños"
                            placeholder="ingrese el numero de baños" value="{{old('numerobaños')}}">
                        <small class="text-danger">{{$errors->first('numerobaños')}}</small>
                    </div>

                    <div class="form-group">
                        <label for="idCaracteristicas">Caracteristica</label>
                        <select class="form-control" name="idCaracteristicas" id="idCaracteristicas">
                            @forelse($caracteristicas as $caracteristica)
                            <option value="{{$caracteristica->id}}">{{$caracteristica->nombre}}</option>
                            @empty
                            <option>No existen</option>
                            @endforelse
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
                        <th scope="col">descripcion</th>
                        <th scope="col">capacidad</th>
                        <th scope="col">numero Baños</th>
                        <th scope="col">tipodomo</th>
                        <th scope="col">caracteristicas</th>
                        <th scope="col">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($domos as $domo)
                    <tr>
                        <th scope="row">{{$domo->id}}</th>
                        <td>{{$domo->nombredomo}}</td>
                        <td>{{$domo->descripcion}}</td>
                        <td>{{$domo->capacidad}}</td>
                        <td>{{$domo->numerobaños}}</td>
                        <td>{{$domo->tipodomo}}</td>
                        <td>{{$domo->caracteristicaDomo->nombre}}</td>
                        <td>

                          {{--   <form action="{{route('domoEliminar', $domo)}}" method="post" class="formulario-eliminar">
                                <a href="#mostrarDomo{{$domo->id}}" data-toggle="modal"
                                    data-target="#mostrarDomo{{$domo->id}}"><i
                                        class="fas fa-info-circle fa-lg text-success"></i></a> --}}
                                <a href="#editarDomo{{$domo->id}}" data-toggle="modal"
                                    data-target="#editarDomo{{$domo->id}}"
                                    style="margin-left: 20px; margin-right: 20px;"><i
                                        class="fas fa-user-edit fa-lg"></i></a>

                                {{-- @csrf @method('DELETE')
                                <button type="submit " style="border: none"><i
                                        class="fas fa-trash-alt fa-lg text-danger"></i></button> --}}
                           {{--  </form> --}}
                           <td>
                            @if($domo->estado == 1)

                            <button class="btn btn-success col-9"><i class="fa-sharp fa-solid fa-power-off"></i></button>

                            @elseif ($domo->estado == 2)

                            <button class="btn btn-danger col-9"><i class="fa-sharp fa-solid fa-power-off"></i></button>
                            @endif</td>
                        <td>
                        </td>
                    </tr>
        </div>
    </div>


    <!-- Modal MOSTRAR Domo-->

    <div class="modal fade" id="mostrarDomo{{$domo->id}}" tabindex="-1" role="dialog" aria-labelledby="mostrarDomo"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Mostrar Domo</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <form>
                    <div class="modal-body">

                        <div class="form-group">
                            <label for="nombredomo">Nombre domo</label>
                            <input type="text" class="form-control" name="nombredomo" id="nombredomo"
                                placeholder="Ingrese el nombre del domo"
                                value="{{old('nombredomo', $domo->nombredomo)}}" disabled>
                            <small class="text-danger">{{$errors->first('nombredomo')}}</small>
                        </div>
                        <div class="form-group">
                            <label for="capacidad">capacidad</label>
                            <input type="number" class="form-control" name="capacidad" id="capacidad"
                                placeholder="Ingrese la capacidad del domo"
                                value="{{old('capacidad', $domo->capacidad)}}" disabled>
                            <small class="text-danger">{{$errors->first('capacidad')}}</small>
                        </div>
                        <div class="form-group">
                            <label for="descripcion">descripcion</label>
                            <textarea class="form-control" name="descripcion" id="descripcion" rows="2"
                                disabled>{{old('descripcion', $domo->descripcion)}}</textarea>
                            <small class="text-danger">{{$errors->first('descripcion')}}</small>

                        </div>
                        <div class="form-group">
                            <label for="tipodomo">Tipo Domo</label>
                            <input type="text" class="form-control" id="tipodomo" name="tipodomo"
                                placeholder="ingrese el tipo de domo" value="{{old('tipodomo', $domo->tipodomo)}}"
                                disabled>
                            <small class="text-danger">{{$errors->first('tipodomo')}}</small>
                        </div>

                        <div class="form-group">
                            <label for="numerobaños">numero baños</label>
                            <input type="number" class="form-control" id="numerobaños" name="numerobaños"
                                placeholder="ingrese el numero de baños"
                                value="{{old('numerobaños', $domo->numerobaños)}}" disabled>
                            <small class="text-danger">{{$errors->first('numerobaños')}}</small>
                        </div>

                        <div class="form-group">
                            <label for="cargo">Caracteristica</label>
                            <input type="text" class="form-control" id="caracteristica" name="caracteristica"
                                placeholder="ingrese un email"
                                value="{{old('caracteristica', $domo->caracteristicaDomo->nombre)}}" disabled>
                            <small class="text-danger">{{$errors->first('correo')}}</small>
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

    <div class="modal fade" id="editarDomo{{$domo->id}}" tabindex="-1" role="dialog" aria-labelledby="editarDomo"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Editar Domo</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <form action="{{route('domoActualizar', $domo)}}" method="post">
                    <div class="modal-body">
                        @csrf @method('PUT')

                        {{-- @if($errors->any())
                        @foreach($errors->all() as $error)
                        <p>{{$error}}</p>
                        @endforeach
                        @endif --}}


                        <div class="form-group">
                            <label for="nombredomo">Nombre Domo</label>
                            <input type="text" class="form-control" name="nombredomo" id="nombredomo"
                                placeholder="Ingrese el nombre del domo"
                                value="{{old('nombredomo', $domo->nombredomo)}}">
                            <small class="text-danger">{{$errors->first('nombredomo')}}</small>
                        </div>
                        <div class="form-group">
                            <label for="capacidad">capacidad</label>
                            <input type="number" class="form-control" name="capacidad" id="capacidad"
                                placeholder="Ingrese la capacidad del domo"
                                value="{{old('capacidad', $domo->capacidad)}}">
                            <small class="text-danger">{{$errors->first('capacidad')}}</small>
                        </div>
                        <div class="form-group">
                            <label for="descripcion">descripcion</label>
                            <textarea class="form-control" name="descripcion" id="descripcion"
                                rows="2">{{old('descripcion', $domo->descripcion)}}</textarea>
                            <small class="text-danger">{{$errors->first('descripcion')}}</small>

                        </div>
                        <div class="form-group">
                            <label for="tipodomo">Tipo Domo</label>
                            <input type="text" class="form-control" id="tipodomo" name="tipodomo"
                                placeholder="ingrese el tipo del domo" value="{{old('tipodomo', $domo->tipodomo)}}">
                            <small class="text-danger">{{$errors->first('tipodomo')}}</small>
                        </div>

                        <div class="form-group">
                            <label for="numerobaños">numero baños</label>
                            <input type="number" class="form-control" id="numerobaños" name="numerobaños"
                                placeholder="ingrese el numero de baños"
                                value="{{old('numerobaños', $domo->numerobaños)}}">
                            <small class="text-danger">{{$errors->first('numerobaños')}}</small>
                        </div>

                        <div class="form-group">
                            <label for="idCaracteristicas">caracteristicas</label>
                            <select class="form-control" name="idCaracteristicas" id="idCaracteristicas">
                                @forelse($caracteristicas as $caracteristica)
                                <option value="{{$caracteristica->id}}">{{$caracteristica->nombre}}</option>
                                @empty
                                <option>No existen</option>
                                @endforelse
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

@if (session('mensaje')=="Domo eliminado")
<script>
    Swal.fire(
            'Deleted!',
            'Your file has been deleted.',
            'success'
        )
</script>

@endif

@if (session('mensaje')=="Domo eliminado")
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
        $('#crearDomo').modal('show')
    })
</script>
@endif

@endsection()
@endsection
