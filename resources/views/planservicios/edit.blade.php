@extends('layouts.app')
@section('aside_menu')
@include('layouts.aside')
@endsection
@section('titulo_ventana', 'Actualizar Plan')

@section('Contenido_app')
<hr>
<br>
<form action="{{ url('plan/actualizar', $planes->id) }}" method="post">
    @csrf
    @method('PUT')
    <div class="col-12">
        <div class="card shadow">
            <div class="card-body">
    
                    <div class="form-group">
                        <label for="nombre">Nombre Plan</label>
                        <input type="text" class="form-control" name="nombre" id="nombre"
                            placeholder="Ingrese el nombre del plan" value="{{($planes->nombre)}}">
                    </div>

                    <div class="form-group">
                        <label for="">Domo</label>
                        <select class="form-control" name="domo_id" id="domo_id">
                            @forelse($domos as $value)
                            <option value="{{$value->id}}">{{$value->nombre}}</option>
                            @empty
                            <option>No existen</option>
                            @endforelse
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="totalplan">Total plan</label>
                        <input type="number" class="form-control" name="totalplan" id="totalplan"
                            placeholder="Ingrese el total plan" value="{{($planes->totalplan)}}">
                    </div>
                    <div class="form-group">
                        <label for="descripcion">Descripcion</label>
                        <textarea class="form-control" name="descripcion" id="descripcion"
                            rows="2">{{($planes->descripcion)}}</textarea>
                    </div>
                    
                    <div class="form-group">
                        <label for="totalservicio">Total servicio</label>
                        <input type="text" class="form-control" id="totalservicio" name="totalservicio"
                            placeholder="ingrese el total del plan" value="{{($planes->totalservicio)}}">
                    </div>

                    <div class="form-group">
                        <label for="precioplan">Precio plan</label>
                        <input type="number" class="form-control" id="precioplan" name="precioplan"
                            placeholder="ingrese el precio del plan" value="{{($planes->precioplan)}}">
                    </div>
                    <div class="form-group">
                        <label for="estado">Estado</label>
                        <select class="form-control" name="estado" id="estado">
                            
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

    <br><br>



@endsection