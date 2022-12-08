@extends('layouts.app')
@section('aside_menu')
@include('layouts.aside')
@endsection
@section('titulo_ventana', 'Actualizar venta')

@section('Contenido_app')
<br><br>

<form action="{{ url('venta/actualizar', $venta->id) }}" method="post">
    @csrf
    @method('PUT')
    <div class="col-12">
        <div class="card shadow">
            <div class="card-body" >

                <div class="form-group ">
                    <label for="user_id">Usuario</label>
                    <select name="user_id" id="user_id" class="form-control" disabled>
                        @foreach ($users as $value)
                        <option value="{{ $value->id }}">{{ $value->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group ">
                    <label for="fechainicio">Fecha Inicio</label>
                    <input type="date" class="form-control" disabled
                        name="fechainicio" value="{{$venta->fechainicio}}"required>
                </div>
                <div class="form-group">
                    <label for="fechareserva">Fecha Reserva</label>
                    <input type="date" class="form-control" disabled placeholder=""
                        name="fechareserva" value="{{ $venta->fechareserva}}" required>
                </div>
                <div class="form-group">
                    <label for="fechafinal">Fecha Final</label>
                    <input type="date" class="form-control" disabled placeholder=""
                        name="fechafinal"  value="{{ $venta->fechafinal}}"required>
                </div>
                <div class="form-group">
                    <label for="fechapagoparcial">Fecha Pago Parcial</label>
                    <input type="date" class="form-control" disabled placeholder=""
                        name="fechapagoparcial"  value="{{ $venta->fechapagoparcial}}"required>
                </div>

                    <div class="form-group">
                        <label for="pagoparcial">Pago Parcial</label>
                        <input type="number" class="form-control" disabled placeholder="Ingrese el pago parcial" name="pagoparcial"
                        value="{{ $venta->pagoparcial}}" required>
                    </div>
                    <div class="form-group">
                        <label for="totalpagoparcial">Total Pago</label>
                        <input type="number" class="form-control" placeholder="Ingrese el total de pago parcial  "
                            name="totalpagoparcial" value="{{   $venta->totalpagoparcial }}" required>
                    </div>
                <div class="form-group">
                    <label for="totalservicio">Total Servicios</label>
                    <input type="number" class="form-control" disabled placeholder="Ingrese el total servicios"
                        name="totalservicio"value="{{   $venta->totalservicio }}" required>
                </div>
                <div class="form-group">
                    <label for="domo_id">Domo</label>
                    <select name="domo_id" class="form-control" disabled required>
                     {{--    <option value="">Seleccione</option> --}}
                        @foreach($domos as $value)
                        <option value="{{ $value->id}}" value="{{ $venta->domo_id }}">{{ $value->nombre }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="id_plan">Plan</label>
                    <select name="id_plan" class="form-control" disabled required>
                        {{-- <option value="">Seleccione</option> --}}
                        @foreach($planes as $value)
                        <option value="{{ $value->id }}" value="{{ $venta->id_plan }}">{{ $value->nombre }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="estado">Estado</label>
                    <select class="form-control" name="estado">
                        <option value="1">Pagado</option>
                        <option value="2">Anulado</option>
                    </select>

                </div>
                    <br>
                    <div class="col-sm-6 col-sm-offset-2">
                    <button type="submit" class="btn btn-info btn-block">Actualizar</button>
                    </div>
            </div>
        </div>
    </div>
</form>




@endsection