@extends('layouts.app')
@section('aside_menu')
@include('layouts.aside')
@endsection
@section('titulo_ventana', 'Reserva')

@section('Contenido_app')


<div class="card shadow mb-4 col-12">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-striped table-bordered dt-responsive nowrap" id="dataTable" width="100%"
                cellspacing="0">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Planes</th>
                        <th scope="col">Servicios</th>
                        <th scope="col">Pagos</th>
                        <th scope="col">Estado</th>
                        <th scope="col">Acciones</th>
                    </tr>
                </thead>
                <tbody>

                    @foreach ($reserva as $value)
                    <tr>
                        <th scope="row">{{$value->id}}</th>
                        <td>{{ $value->nombre }}</td>
                        <td>{{ $value->Planes }}</td>
                        <td>{{ $value->Servicios }}</td>
                        <td>{{ $value->Pagos }}</td>

                        <td>
                            @if($value->estado == 1)

                            <button class="btn btn-success col-9"><i
                                    class="fa-sharp fa-solid fa-power-off"></i></button>

                            @elseif ($value->estado == 2)

                            <button class="btn btn-danger col-9"><i class="fa-sharp fa-solid fa-power-off"></i></button>
                            @endif
                        </td>
                        <td>
                            <a class="btn btn-info col-10" href="/domo/listar?id={{$value->id}}"><i
                                    class="fa-solid fa-eye">
                            </a></i>
                        </td>

                        <td>
                            <a href="#editarDomoCaracteristica{{$value->id}}" data-toggle="modal"
                                data-target="#editarDomoCaracteristica{{$value->id}}"><i
                                class="fas fa-user-edit fa-lg"></i>
                            </a>
                        </td>
                    </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
    </div>


</div>



@endsection
