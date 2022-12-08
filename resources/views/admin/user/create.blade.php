@extends('layouts.app')
@section('aside_menu')
@include('layouts.aside')
@endsection
@section('titulo_ventana', 'Crear usuario')

@section('Contenido_app')

<br><br>
<div class="col-12">
    <div class="card shadow">
        <div class=" card-body">
            <form action="/user/guardar" method="POST">
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
                        placeholder="Ingrese el nombre del usuario" value="{{old('name')}}" minlength="5"
                        maxlength="20">
                    <small class="text-danger">{{$errors->first('name')}}</small>
                </div>
                <div class="form-group">
                    <label for="apellido">Apellido</label>
                    <input type="text" class="form-control" id="apellido" name="lastName"
                        placeholder="Ingrese el apellido del usuario" value="{{old('lastname')}}" minlength="5"
                        maxlength="20">
                    <small class="text-danger">{{$errors->first('lastName')}}</small>
                </div>
                <div class="form-group">
                    <label for="direccion">Dirección</label>
                    <input type="text" class="form-control" id="direccion" name="address"
                        placeholder="Ingrese la dirección del usuario" value="{{old('address')}}" minlength="5"
                        maxlength="20">
                    <small class="text-danger">{{$errors->first('address')}}</small>

                </div>
                <div class="form-group">
                    <label for="telefono">Teléfono</label>
                    <input type="number" class="form-control" id="telefono" name="phone"
                        placeholder="Ingrese el telefono del usuario" value="{{old('nombre')}}" minlength="5"
                        maxlength="20">
                    <small class="text-danger">{{$errors->first('phone')}}</small>

                </div>
                <div class="form-group">
                    <label for="correo">Correo</label>
                    <input type="email" class="form-control" id="correo" name="email"
                        placeholder="Ingrese el correo del usuario" value="{{old('email')}}" minlength="5"
                        maxlength="30">
                    <small class="text-danger">{{$errors->first('email')}}</small>

                </div>
                <div class="form-group">
                    <label for="contraseña">Contraseña</label>
                    <input type="password" class="form-control" id="contraseña" name="password"
                        placeholder="Ingrese la contraseña del usuario" value="{{old('nombre')}}" minlength="5"
                        maxlength="20">
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
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary">Guardar</button>
                </div>
            </form>
        </div>
    </div>
</div>



@endsection