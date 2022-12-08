@extends('layouts.app')
@section('aside_menu')
@include('layouts.aside')
@endsection
@section('titulo_ventana', 'Actualizar Domo')

@section('Contenido_app')
<br><br>

<form action="{{ url('domo/actualizar', $domos->id) }}" method="post">
    @csrf
    @method('PUT')
    <div class="col-12">
        <div class="card shadow">
            <div class="card-body">

                <div class="row card-body">
                    <div class="form-group col-6">
                        <label for="nombre">Nombre</label>
                        <input type="text" class="form-control" name="nombre" value="{{ $domos->nombre }}" required>
                    </div>

                    <div class="form-group col-6">
                        <label for="descripcion">Descripción</label>
                        <input type="text" class="form-control" name="descripcion" value="{{ $domos->descripcion }}"
                            required>
                    </div>
                    <div class="form-group col-6">
                        <label for="">Capacidad</label>
                        <input type="number" class="form-control" name="capacidad" value="{{ $domos->capacidad }}"
                            required>
                    </div>

                    <div class="form-group col-6">
                        <label for="numerobaños">Número de baños</label>
                        <input type="number" class="form-control" name="numerobaños" value="{{ $domos->numerobaños }}"
                            required>
                    </div>

                    <div class="form-group col-6">
                        <label for="tipodomo">Tipo de domo</label>
                        <select class="form-control" name="tipodomo" id="tipodomo">
                            <option value="Familiar">Familiar</option>
                            <option value="Pareja">Pareja</option>
                        </select>
                    </div>


                    <div class="form-group col-6">
                        <label for="estado">Estado</label>
                        <select class="form-control" name="estado">
                            <option value="1">Activo</option>
                            <option value="2">Inactivo</option>
                        </select>

                    </div>


                    <br>

                    <button type="submit" class="btn btn-info btn-block">Actualizar</button>
                </div>
            </div>
        </div>
</form>
<br><br><br>


@endsection