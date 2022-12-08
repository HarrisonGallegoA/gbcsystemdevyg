@extends('layouts.app')
@section('aside_menu')
@include('layouts.aside')
@endsection
@section('titulo_ventana', 'Actualizar Reserva')

@section('Contenido_app')
<br><br>

<form action="{{ url('reserva/actualizar', $reserva->id) }}" method="post">
    @csrf
    @method('PUT')
    <div class="col-12">
        <div class="card shadow">
            <div class="card-body" >

               <div class="form-group ">
                    <label for="user_id">ID</label>
                    <select name="user_id" id="user_id" class="form-control" disabled>
                        @foreach ($users as $value)
                        <option value="{{ $value->id }}">{{ $value->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group ">
                    <label for="fechainicio">Fecha Inicio</label>
                    <input type="date" class="form-control" placeholder=""
                        name="fechainicio" value="{{$reserva->fechainicio}}"required>
                        <small class="text-danger">{{$errors->first('fechainicio')}}</small>
                </div>
                <div class="form-group">
                    <label for="fechareserva">Fecha Reserva</label>
                    <input type="date" class="form-control" placeholder=""
                        name="fechareserva" value="{{ $reserva->fechareserva}}" required>
                        <small class="text-danger">{{$errors->first('fechareserva')}}</small>
                </div>
                <div class="form-group">
                    <label for="fechafinal">Fecha Final</label>
                    <input type="date" class="form-control" placeholder=""
                        name="fechafinal"  value="{{ $reserva->fechafinal}}"required>
                        <small class="text-danger">{{$errors->first('fechafinal')}}</small>
                </div>
                <div class="form-group">
                    <label for="fechapagoparcial">Fecha Pago Parcial</label>
                    <input type="date" class="form-control" placeholder=""
                        name="fechapagoparcial"  value="{{ $reserva->fechapagoparcial}}"required>
                        <small class="text-danger">{{$errors->first('fechapagoparcial')}}</small>
                </div>

                    <div class="form-group">
                        <label for="pagoparcial">Pago Parcial</label>
                        <input type="number" class="form-control" placeholder="Ingrese el pago parcial" name="pagoparcial"
                        value="{{ $reserva->pagoparcial}}" required>
                        <small class="text-danger">{{$errors->first('pagoparcial')}}</small>
                    </div>
                    <div class="form-group">
                        <label for="totalpagoparcial">Total Pago Parcial</label>
                        <input type="number" class="form-control" placeholder="Ingrese el total de pago parcial  "
                            name="totalpagoparcial" value="{{   $reserva->totalpagoparcial }}" required>
                            <small class="text-danger">{{$errors->first('totalpagoparcial')}}</small>
                    </div>
                <div class="form-group">
                    <label for="totalservicio">Total Servicios</label>
                    <input type="number" class="form-control" placeholder="Ingrese el total servicios"
                        name="totalservicio"value="{{   $reserva->totalservicio }}" required>
                        <small class="text-danger">{{$errors->first('totalservicio')}}</small>
                </div>
                <div class="form-group">
                    <label for="domo_id">Domo</label>
                    <select name="domo_id" class="form-control" required>
                     {{--    <option value="">Seleccione</option> --}}
                        @foreach($domos as $value)
                        <option value="{{ $value->id}}" value="{{ $reserva->domo_id }}">{{ $value->nombre }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="id_plan">Plan</label>
                    <select name="id_plan" class="form-control" required>
                        {{-- <option value="">Seleccione</option> --}}
                        @foreach($planes as $value)
                        <option value="{{ $value->id }}" value="{{ $reserva->id_plan }}">{{ $value->nombre }}</option>
                        @endforeach
                    </select>
                </div>
                    <div class="form-group">
                        <label for="estado">Estado</label>
                        <select class="form-control" name="estado" id="estado">

                            <option value="1">Activo</option>

                            <option value="2">Inactivo</option>

                        </select>
                    </div>
                    <br>
                    <div class="col-sm-12 col-sm-offset-2">
                    <button type="submit" class="btn btn-info btn-block">Actualizar</button>
                    </div>
            </div>
        </div>
    </div>
</form>




@endsection