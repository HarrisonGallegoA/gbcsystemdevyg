@extends('layouts.app')
@section('aside_menu')
@include('layouts.aside')
@endsection
@section('titulo_ventana', 'Usuarios')
<script>
    import Swal from 'sweetalert2'
</script>
@section('Contenido_app')


<div class="col-12 d-flex justify-content-end mb-4">
            <a class="btn btn-info col-2" href="{{ route('crearUsuario') }}"><i
                class="bi bi-person-plus"></i>
                Crear usuario</a>
</div>

<div class="card shadow mb-4 col-12">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-striped table-bordered dt-responsive nowrap" id="dataTable" width="100%"
                cellspacing="0">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Documento</th>
                        <th>Nombre</th>
                        <th>Apellido</th>
                        <th>Dirección</th>
                        <th>Teléfono</th>
                        <th>Correo</th>
                        <th>Estado</th>
                        <th>Rol</th>
                        <th>Acciones</th>
                    </tr>
                </thead>

                <tbody>

                    @foreach ($users as $user )
                    <tr>
                        <td> {{ $user->id }} </td>
                        <td> {{ $user->document }} </td>
                        <td> {{ $user->name }} </td>
                        <td> {{ $user->lastName }} </td>
                        <td> {{ $user->address }} </td>
                        <td> {{ $user->phone }} </td>
                        <td> {{ $user->email }} </td>
                        <td>

                            @if($user->status == '2')
                            <span class="btn btn-danger"><i class="bi bi-toggle-off"></i></span>
                            @else
                            <span class="btn btn-success"><i class="bi bi-toggle-on"></i></span>
                            @endif

                        </td>
                        <td> {{ $user->getRoleNames()->first() ? $user->getRoleNames()->first() : 'No asignado' }}</td>
                        <td>
                            <button class="btn btn-warning btn-sm" data-toggle="modal"
                                data-target="#modalEditar{{$user->id}}"> <i class="bi bi-pencil-fill"></i> </button>


                        </td>


                        <div class="modal fade" id="modalUsuario" tabindex="-1" role="dialog"
                            aria-labelledby="modalUsuario" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Crear Usuario</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                    <form action="{{ route('user.store', $user) }}" method="POST">
                                        
                                            @csrf
                                            <div class="form-group">
                                                <label for="documento">Documento</label>
                                                <input type="number" class="form-control" name="document" id="document"
                                                    placeholder="Ingrese el documento del usuario">{{old('document')}}
                                                <small class="text-danger">{{$errors->first('document')}}</small>
                                            </div>
                                            <div class="form-group">
                                                <label for="nombre">Nombre</label>
                                                <input type="text" class="form-control" name="name" id="name"
                                                    placeholder="Ingrese el nombre del usuario" value="{{old('name')}}"
                                                    minlength="5" maxlength="20">
                                                <small class="text-danger">{{$errors->first('name')}}</small>
                                            </div>
                                            <div class="form-group">
                                                <label for="apellido">Apellido</label>
                                                <input type="text" class="form-control" id="apellido" name="lastName"
                                                    placeholder="Ingrese el apellido del usuario"
                                                    value="{{old('lastname')}}" minlength="5" maxlength="20">
                                                <small class="text-danger">{{$errors->first('lastName')}}</small>
                                            </div>
                                            <div class="form-group">
                                                <label for="direccion">Dirección</label>
                                                <input type="text" class="form-control" id="direccion" name="address"
                                                    placeholder="Ingrese la dirección del usuario"
                                                    value="{{old('address')}}" minlength="5" maxlength="20">
                                                <small class="text-danger">{{$errors->first('address')}}</small>

                                            </div>
                                            <div class="form-group">
                                                <label for="telefono">Teléfono</label>
                                                <input type="number" class="form-control" id="telefono" name="phone"
                                                    placeholder="Ingrese el telefono del usuario"
                                                    value="{{old('nombre')}}" minlength="5" maxlength="20">
                                                <small class="text-danger">{{$errors->first('phone')}}</small>

                                            </div>
                                            <div class="form-group">
                                                <label for="correo">Correo</label>
                                                <input type="email" class="form-control" id="correo" name="email"
                                                    placeholder="Ingrese el correo del usuario" value="{{old('email')}}"
                                                    minlength="5" maxlength="30">
                                                <small class="text-danger">{{$errors->first('email')}}</small>

                                            </div>
                                            <div class="form-group">
                                                <label for="contraseña">Contraseña</label>
                                                <input type="password" class="form-control" id="contraseña"
                                                    name="password" placeholder="Ingrese la contraseña del usuario"
                                                    value="{{old('nombre')}}" minlength="5" maxlength="20">
                                                <small class="text-danger">{{$errors->first('password')}}</small>

                                            </div>
                                            <div class="form-group">
                                                <label for="estado">Estado</label>
                                                <select class="form-control" name="status" id="status">
                                                    <option value="1">Activo</option>
                                                    <option value="2">Inactivo</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleFormControlInput1">Rol</label>
                                                <select name="role" class="form-control" id="">
                                                    @foreach ($roles as $role)
                                                    <option value="{{ $role->id }}">{{ $role->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-dismiss="modal">Cancelar</button>
                                            <button type="submit" class="btn btn-primary">Guardar</button>
                                        </div>
                                    </div>
                                    </form>
                                
                                </div>
                            </div>
                        </div>

                        <!-- Modal -->

                        <div class="modal fade" id="modalEditar{{$user->id}}" tabindex="-1" role="dialog"
                            aria-labelledby="modalUsuario" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Editar de Usuario</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{ route('userUpdate', $user) }}" method="POST">
                                            @csrf
                                            @method('PUT')
                                            <div class="form-group">
                                                <label for="exampleFormControlInput1">Documento</label>
                                                <input type="number" value="{{ old('document', $user->document) }}"
                                                    class="form-control" id="exampleFormControlInput1" name="document">
                                            </div>

                                            <div class="form-group">
                                                <label for="exampleFormControlInput1">Nombre</label>
                                                <input type="text" value="{{ old('name', $user->name) }}"
                                                    class="form-control" id="exampleFormControlInput1" name="name">
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleFormControlInput1">Apellido</label>
                                                <input type="text" value="{{ old('lastName', $user->lastName) }}"
                                                    class="form-control" id="exampleFormControlInput1" name="lastName">
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleFormControlInput1">Dirección</label>
                                                <input type="text" value="{{ old('address', $user->address) }}"
                                                    class="form-control" id="exampleFormControlInput1" name="address">
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleFormControlInput1">Teléfono</label>
                                                <input type="number" value="{{ old('phone', $user->phone) }}"
                                                    class="form-control" id="exampleFormControlInput1" name="phone">
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleFormControlInput1">Correo</label>
                                                <input type="email" value="{{ old('email', $user->email) }}"
                                                    class="form-control" id="exampleFormControlInput1" name="email">
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleFormControlInput1">Contraseña</label>
                                                <input type="password" value="{{ old('password', $user->password) }}"
                                                    class="form-control" id="exampleFormControlInput1" name="password">
                                            </div>
                                            <div class="form-group">
                                                <label for="estado">Estado</label>
                                                <select class="form-control" name="status" id="status">
                                                    <option value="1">Activo</option>
                                                    <option value="2">Inactivo</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleFormControlInput1">Rol</label>
                                                <select name="role" class="form-control" id="">
                                                    @foreach ($roles as $role)
                                                    <option value="{{ $role->id }}" {{ old('role',$user->
                                                        getRoleNames()->first())==$role->name ? 'selected' : ''}}>{{
                                                        $role->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-dismiss="modal">Cancelar</button>
                                        <button type="submit" class="btn btn-primary">Editar</button>
                                    </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                        </td>
                    </tr>

                    @endforeach



                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Modal -->



@endsection

@section('scripts')

@if(session('status'))
@if(session('status')== "1")
<script>
    Swal.fire({
  icon: 'success',
  title: 'Perfecto!',
  text: 'Usuario guardado',
  showConfirmButton: false,
  timer: 2500

})
</script>
@endif

@if(session('status')== "2")
<script>
    Swal.fire({
        icon: 'success',
        title: 'Perfecto!',
        text: 'Usuario actualizado',
        showConfirmButton: false,
        timer: 2500
    })
</script>
@endif
@endif

@endsection