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
                <a class="btn btn-info col-3" href="/venta/servicios"><i class="fa-solid fa-money-bill-transfer"></i>
                    Agregar
                    Venta</a>
            </div>
            <br>
        </div>
    </div>
    <div class="card shadow mb-4 col-12">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped table-bordered dt-responsive nowrap" id="dataTable" width="100%"
                    cellspacing="0">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Usuario</th>
                            <th>Pago Parcial</th>
                            <th>Total Pago</th>
                            <th>Fecha Reserva </th>
                            <th>Fecha Inicio</th>
                            <th>Fecha Final</th>
                            <th>Fecha Pago Parcial</th>
                            <th>Total Servicio</th>
                            <th>Domo</th>
                            <th>Plan</th>
                            <th>Estado</th>
                            <th>Servicios</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($venta as $value)
                            <tr>
                                <th scope="row">{{ $value->id }}</th>
                                <td>{{ $value->users }}</td>
                                <td>{{ $value->pagoparcial }}</td>
                                <td>{{ $value->totalpagoparcial }}</td>
                                <td>{{ $value->fechareserva }}</td>
                                <td>{{ $value->fechainicio }}</td>
                                <td>{{ $value->fechafinal }}</td>
                                <td>{{ $value->fechapagoparcial }}</td>
                                <td>{{ $value->totalservicio }}</td>
                                <td>{{ $value->domo }}</td>
                                <td>{{ $value->plan }}</td>
                                <td>
                                    @if ($value->estado == 1)
                                        <button class="btn btn-success col-9">Pagada</button>
                                    @elseif ($value->estado == 2)
                                        <button class="btn btn-danger col-9">Anulada</i></button>
                                    @endif
                                </td>
                                <td>
                                    <a class="btn btn-info col-10" href="/venta/listar?id={{ $value->id }}"><i
                                            class="fa-solid fa-eye">
                                    </a></i>
                                </td>
                                <td>
                                    <form action="{{ url('venta/editar', $value->id) }}" method="GET">
                                        <button class="btn btn-warning btn-xs">
                                            <i class="fa-sharp fa-solid fa-pen-to-square"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- Button trigger modal -->
    <!-- Modal -->
    {{-- <div class="modal fade" id="servicios{{ $value->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Servicios</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                @if (count($servicios) > 0)

                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead class="thead-dark">
                                    </tr>
                                    <t>
                                        <th>Nombre</th>
                                        <th>Descripcion</th>
                                        <th>Precio</th>
                                        <th>Tiempo</th>
                                        </tr>
                                </thead>
                                <tbody>
                                    @foreach ($servicios as $value)
                                    <tr>
                                        <td>{{$value->nombre}}</td>
                                        <td>{{$value->descripcion}}</td>
                                        <td>{{$value->precio}}</td>
                                        <td>{{$value->tiempo}}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                @else
                <div class="alert alert-warning">
                    Este plan no tiene servicios
                </div>
                @endif
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
 </div>  --}}


    @if (count($servicios) > 0)
        <div class="card shadow mb-4 col-10">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead class="thead-dark">
                            </tr>
                            <th>Nombre</th>
                            <th>Descripcion</th>
                            <th>Precio</th>
                            <th>Tiempo</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($servicios as $value)
                                <tr>
                                    <td>{{ $value->nombre }}</td>
                                    <td>{{ $value->descripcion }}</td>
                                    <td>{{ $value->precio }}</td>
                                    <td>{{ $value->tiempo }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    @endif


@endsection

@section('scripts')

    @if (session('status'))
        @if (session('status') == '1')
            <script>
                Swal.fire({
                    icon: 'success',
                    title: 'Perfecto!',
                    text: 'Venta guardado',
                    showConfirmButton: false,
                    timer: 2500

                })
            </script>
        @endif
        @if (session('status') == '2')
            <script>
                Swal.fire({
                    icon: 'success',
                    title: 'Perfecto!',
                    text: 'Venta actualizada',
                    showConfirmButton: false,
                    timer: 2500
                })
            </script>
        @endif
    @endif


@endsection