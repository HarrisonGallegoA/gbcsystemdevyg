@extends('layouts.app')
@section('aside_menu')
@include('layouts.aside')
@endsection
@section('titulo_ventana', 'Lista Domos')

@section('Contenido_app')

<br>
<div class="row">
    <div class="col">
        <div class="col-sm-8 col-sm-offset-2">
            <a class="btn btn-info col-3" href="/domo/caracteristicas"><i class="fa-solid fa-igloo"></i>
                Agregar
                Domo</a>
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
                        <th scope="col">#</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Descripción</th>
                        <th scope="col">capacidad</th>
                        <th scope="col">numero de baños</th>
                        <th scope="col">tipo domo</th>
                        <th scope="col">Estado</th>
                        <th scope="col">Caracteristicas</th>
                        <th scope="col">Acciones</th>
                    </tr>
                </thead>
                <tbody>

                    @foreach ($domos as $value)
                    <tr>
                        <th scope="row">{{$value->id}}</th>
                        <td>{{ $value->nombre }}</td>
                        <td>{{ $value->descripcion }}</td>
                        <td>{{ $value->capacidad }}</td>
                        <td>{{ $value->numerobaños }}</td>
                        <td>{{ $value->tipodomo }}</td>
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
                            <form action="{{ url('domo/editar', $value->id) }}" method="GET"> <button
                                    class="btn btn-warning btn-xs"> <i class="fa -sharp fa-solid fa-pen-to-square"></i>
                                </button> </form>
                        </td>
                    </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
    </div>
</div>


@if (count($caracteristicas) > 0)
<div class="card shadow mb-4 col-10">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead class="thead-dark">
                    </tr>
                    <th>Nombre</th>
                    <th>detalle</th>
                    <th>Cantidad</th>
                </thead>
                <tbody>
                    @foreach ($caracteristicas as $value)
                    <tr>
                        <td>{{ $value->nombre }}</td>
                        <td>{{ $value->detalle }}</td>
                        <td>{{ $value->cantidad_c }}</td>
                    </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
    </div>
</div>
<br>
<br>
<br>
<br>

@endif
@endsection

@section('scripts')

@if (session('status'))
@if (session('status') == '1')
<script>
    Swal.fire({
                    icon: 'success',
                    title: 'Perfecto!',
                    text: 'El domo se guardo correctamente!',
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
                    text: 'El domo se actualizo correctamente!',
                    showConfirmButton: false,
                    timer: 2500

                })
</script>
@endif
@endif

@endsection