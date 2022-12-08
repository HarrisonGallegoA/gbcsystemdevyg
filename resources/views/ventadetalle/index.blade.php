@extends('layouts.app')
@section('aside_menu')
    @include('layouts.aside')
@endsection
@section('titulo_ventana', 'Lista Ventas')

@section('Contenido_app')
    <br>
    <div class="row">
        <div class="col">
            <div class="col-sm-8 col-sm-offset-2">
                <a class="btn btn-info col-3" href="/venta/listar"><i class="fa-solid fa-money-bill-transfer"></i>
                    Lista de Ventas</a>
            </div>
            <br>
            @if (session('status'))
                @if (session('status'))
                    <div class="alert alert-danger">
                        {{ session('status') }}
                    </div>
                @endif
            @endif
        </div>
    </div>

    <form action="/venta/guardar" method="post">
        @csrf
        <div class="row">
            <div class="col-6">
                <div class="card shadow">
                    <div class="card-header">
                        <h5 class="text-center">Crear Venta</h5>
                    </div>

                    <div class="row card-body">

                        <div class="form-group col-6">
                            <label for="reserva_id">Reserva</label>
                            <select name="reserva_id" id="reserva_id" class="form-control" required>
                                @foreach ($reserva as $value)
                                    <option value="{{ $value->id }}">{{ $value->user_id }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-12" style="margin-top: 3%;">
                            <button type="submit" class="btn btn-info btn-block">Guardar</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>




    @endsection