@extends('layouts.app')
@section('aside_menu')
@include('layouts.aside')
@endsection
@section('titulo_ventana', 'Agenda')

@section('Contenido_app')




 <div class="d-grid gap-2 d-md-flex justify-content-md-end">
        <a class="btn btn-info me-md-2" href="{{ route('reservadetalleindex')}}"><i class="bi bi-calendar2-plus"></i>
            Nueva reserva</a>
    </div>
</div>

<br>
<div class="container">
    <div id="agenda">
    </div>
</div>

{{-- <!-- Button trigger modal -->
<button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#modalagenda">
  Launch
</button> --}}

<!-- Modal -->
<div class="modal fade" id="ModalAgenda" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Agenda</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
            </div>
            <div class="modal-body">
                <form action="{{-- {{route('agregarAgenda')}} --}}" method="GET" action="" id="formularioAgenda" name="formularioAgenda">

            {!! csrf_field() !!}{{-- <i class="fas fa-caret-square-up    "></i> --}}


               {{--  <div class="form-group">
                  <label for="id">ID</label>
                  <input type="text"
                    class="form-control" name="id" id="id" aria-describedby="helpId" placeholder="">
                  <small id="helpId" class="form-text text-muted"></small>
                </div> --}}


                <div class="form-group">
                        <label for="idDomo">Domo</label>

                        <select class="form-control" name="idDomo" id="idDomo">
                            @forelse($domo as $domo)
                            <option value="{{$domo->id}}">{{$domo->nombre}}</option>
                            @empty
                            <option>No existen</option>
                            @endforelse
                        </select>
                        <small class="text-danger">{{$errors->first('idDomo')}}</small>
                        <input type="hidden" name="idAgenda" id="idAgenda">
                    </div>
                    <div class="row">
                            <div class="form-group col-md-6">
                            <label for="fechainicio">Fecha Inicio</label>
                                <input type="date" class="form-control" name="fechainicio" id="fechainicio" aria-describedby="helpId" placeholder="">
                                <small class="text-danger">{{$errors->first('fechainicio')}}</small>

                            </div>
                            <div class="form-group col-md-6">
                            <label for="horainicio">Hora Inicio</label>
                                <input type="time" class="form-control" name="horainicio" id="horainicio"
                                 placeholder=" Ingrese la hora"  value="{{old('horainicio')}}">
                                <small id="helpId" class="form-text text-muted">Hora Inicio</small>
                                <small class="text-danger">{{$errors->first('horainicio')}}</small>
                            </div>


                       </div>
                       <div class="row">
                            <div class="form-group col-md-6">
                            <label for="fechafinal">Fecha Final</label>
                                <input type="date" class="form-control" name="fechafinal" id="fechafinal" aria-describedby="helpId" placeholder="">
                                <small id="helpId" class="form-text text-muted"></small>
                                <small class="text-danger">{{$errors->first('fechafinal')}}</small>

                            </div>
                            <div class="form-group col-md-6">
                            <label for="horafinal">Hora Final</label>
                                <input type="time" class="form-control" name="horafinal" id="horafinal" aria-describedby="helpId" placeholder="">
                                <small class="text-danger">{{$errors->first('horafinal')}}</small>
                            </div>
                           {{--  <div class="form-group col-md-12">
                                <label for="estado">Estado</label>
                                <select class="form-control" name="estado" id="estado">
                                    <option value="1">Activo</option>
                                    <option value="2">Inactivo</option>
                                </select>

                            </div> --}}

                            </form>
            </div>

               <div class="modal-footer">
               <button type="button" class="btn btn-success"id="btnGuardar">Guardar</button>
               <button type="button" class="btn btn-warning"id="btnModificar" disabled>Modificar</button>
               {{-- <button type="button" class="btn btn-danger"id="btnEliminar" disabled>Eliminar</button> --}}
               <button type="button" class="btn btn-primary" data-dismiss="modal">Cerrar</button>

            </div>
        </div>
    </div>
</div>

@endsection



