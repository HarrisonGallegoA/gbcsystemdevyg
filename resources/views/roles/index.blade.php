@extends('layouts.app')
@section('aside_menu')
@include('layouts.aside')
@endsection
@section('titulo_ventana', 'Roles')

@section('Contenido_app')


<div class="col-12 d-flex justify-content-end mb-4">
    <button class="btn btn-success btn-sm" data-toggle="modal" data-target="#modalUsuario"> Nuevo Rol <i class="bi bi-plus-circle-dotted"></i> </button>
</div>

<div class="card shadow mb-4 col-12">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-striped table-bordered dt-responsive nowrap" id="dataTable" width="100%"
                cellspacing="0">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Nombre Rol</th>
                        <th>Acciones</th>
                        <th>Estado</th>                      
                        
                    </tr>
                </thead>
                <tfoot>
                </tfoot>
                <tbody>
                    @forelse ($roles as $role)
                    <tr>
                        <th scope="row">{{$role->id}}</th>
                        <td>{{$role->name}}</td>
                        <td>
                            <button class="btn btn-warning btn-sm" data-toggle="modal" data-target="#modalEditar{{ $role->id }}"> <i class="bi bi-pen"></i> </button>

                            <!-- Modal Editar -->
                            <div class="modal fade" id="modalEditar{{ $role->id }}" tabindex="-1"
                                aria-labelledby="modalEditarLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="modalEditarLabel">Gestión de Roles</h5>
                                            <button type="button" class="close" data-dismiss="modal"
                                                aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="container">
                                                <h2 class="page-header">Actualizar rol</h2>

                                                <form action="{{ route('rolUpdate', $role) }}" method="POST">
                                                    @csrf @method('PUT')
                                                    <div class="form-group">
                                                        <!-- Nombre del Rol-->
                                                        <div class="mb-3">
                                                            <label for="nombre" class="form-label">Nombre del
                                                                rol</label>
                                                            <input type="text" class="form-control" id="name"
                                                                name="name"
                                                                placeholder="Ingresar el nombre del rol"
                                                                value="{{ old('nombre', $role->name) }}" required>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="estado">Estado</label>
                                                            <select class="form-control" name="status" id="status">
                                                                <option value="1">Activo</option>
                                                                <option value="2">Inactivo</option>
                                                            </select>
                                                        </div>
                                                        <div class="mb-3">
                                                            @foreach ($permisos as $permiso)
                                                                
                                                                    <div class="form-check">
                                                                        <input class="form-check-input"
                                                                            type="checkbox" name="permisos[]"
                                                                            @checked(in_array(
                                                                                    $permiso->id,
                                                                                    $role->permissions()->pluck('id')->toArray()
                                                                                ))
                                                                            value="{{ $permiso->id }}"
                                                                            id="">
                                                                        <label class="form-check-label"
                                                                            for="">
                                                                            {{ $permiso->name }}
                                                                        </label>
                                                                    </div>
                                                                </label>
                                                            @endforeach
                                                        </div>
                                                        <!-- opciones -->
                                                        <div class="modal-footer">
                                                            <button type="submit"
                                                                class="btn btn-success">Actualizar</button>
                                                            <button type="button" class="btn btn-secondary"
                                                                data-dismiss="modal">Cancelar</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                             
                        </td>
                        <td>@if($role->status == '2')
                            <span class="btn btn-danger"><i class="bi bi-toggle-off"></i></span>
                            @else
                            <span class="btn btn-success"><i class="bi bi-toggle-on"></i></span>
                            @endif</th></td>
                    
                    
                            
                    </tr>
                    @empty
                        No hay roles
                    @endforelse                
                </tbody>
            </table>
        </div>
    </div>
</div>



<!-- Modal -->

<div class="modal fade" id="modalUsuario" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Registro de Rol</h5>
                
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('rol.store') }}" method="POST">
                    @csrf
                <div class="form-group">
                    <label for="exampleFormControlInput1">Nombre Rol</label>
                    <input type="text" class="form-control" id="exampleFormControlInput1" name="nombreRol">
                </div>
                <div class="form-group">
                    <label for="estado">Estado</label>
                    <select class="form-control" name="status" id="status">
                        <option value="1">Activo</option>
                        <option value="2">Inactivo</option>
                    </select>
                </div>
                @foreach ($permisos as $permiso)
                <label>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="permisos[]"
                            value=" {{ $permiso->id }}" id="">
                        <label class="form-check-label" for="">
                            {{ $permiso->name }}
                        </label>
                    </div>

                </label>
            @endforeach
              
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                <button type="submit" class="btn btn-primary" >Guardar</button>
            </form>
            </div>
        </div>
    </div>
</div>

@endsection