@extends('layouts.app')
@section('aside_menu')
@include('layouts.aside')
@endsection
@section('titulo_ventana', 'Agregar Plan')

@section('Contenido_app')
<br>
<div class="row">
    <div class="col">
        <div class="col-sm-8 col-sm-offset-2">
            <a class="btn btn-info col-3" href="/plan/listar"><i class="fa-solid fa-igloo"></i></i>
                Lista de Planes</a>
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



<form action="/plan/guardar" method="post">
    @csrf
    <div class="row">
        <div class="col-6">
            <div class="card shadow">
                <div class="card-header">
                    <h5 class="text-center">Crear Plan</h5>
                </div>
                <div class="row card-body">
                    <div class="form-group col-6">
                        <label for="nombre">Nombre</label>
                        <input type="text" class="form-control" placeholder="Ingrese el nombre del domo" name="nombre"
                            required>
                    </div>
                    <div class="form-group col-6">
                        <label for="descripcion">Descripción</label>
                        <textarea class="form-control" name="descripcion" placeholder="Ingrese una descripción" rows="2"
                            required></textarea>
                    </div>
                    <div class="form-group col-6">
                        <label for="">precio plan</label>
                        <input type="number" class="form-control" placeholder="Ingrese una la capacidad"
                            name="precioplan" required>
                    </div>
                    <div class="form-group col-6">
                        <label for="    ">Domo</label>
                        <select name="domo_id" class="form-control" required>
                            <option value="">Seleccione</option>
                            @foreach($domos as $value)
                            <option value="{{ $value->id }}">{{ $value->nombre }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group col-6">
                        <label for="precioservicio">Total servicios</label>
                        <input type="number" class="form-control" placeholder="Ingrese el numero de baños"
                            name="totalservicio" required>
                    </div>
                    <div class="form-group col-6">
                        <label for="">Total</label>
                        <input type="number" class="form-control" placeholder="Ingrese una la capacidad"
                            name="totalplan" required>
                    </div>

                    <div class="form-group col-6">
                        <label for="">Total plan</label>
                        <input type="number" class="form-control" placeholder="Total"
                            name="totalplan" disabled>
                    </div>
                    {{-- <div class="form-group col-6">
                        <label for="">Estado</label>
                        <select name="" id="" class="form-control">
                            <option value="1">Activo</option>
                            <option value="2">Inactivo</option>
                        </select>
                    </div> --}}
                </div>
            </div>

            <div class="col-12" style="margin-top: 3%;">
                <button type="submit" class="btn btn-info btn-block">Guardar</button>
            </div>

        </div>
        <div class="col-6">
            <div class="card shadow">
                <div class="card-header">
                    <h5 class="text-center">Añadir Servicio</h5>
                </div>
                <div class="row card-body">
                    <div class="col-6">
                        <div class="form-group ">
                            <label for="">Nombre</label>
                            <select name="servicios" id="servicios" class="form-control" required>
                                @foreach ($servicios as $value)
                                <option value="{{ $value->id }}">{{ $value->nombre }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-12">
                        <button onclick="agregar_servicio()" type="button" class="btn btn-success float-right"><i
                                class="fa-solid fa-plus"></i></button>
                    </div>
                </div>
                <div class="card shadow">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead class="thead-dark">
                                    <tr>
                                        <th>Nombre</th>
                                        <th>Opciones</th>
                                    </tr>
                                </thead>
                                <tbody id="tblServicios">

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>

<br><br><br>

@endsection

@section('scripts')
<script>
    let serviciosD = [''];
    function agregar_servicio(){
                    let servicio_id = $("#servicios option:selected").val();
                    let servicio_text = $("#servicios option:selected").text();
                    /* let cantidad = $("#cantidad").val(); */
                    let existe = serviciosD.includes(servicio_id)
                                        
                        
                        if (existe) {
                            alert("El servicio ya existe")
                            
                        } else {
                            serviciosD.push(servicio_id)
                            console.log(serviciosD); 
                            $("#tblServicios").append(`
                            <tr id="tr-${servicio_id}">
                                <td>
                                    <input type="hidden" name="servicio_id[]" value="${servicio_id} "/>
                                    ${servicio_text}
                                </td>
                                <td>
                                    <button type="button" class="btn btn-danger" onclick="eliminar_servicio(${servicio_id})"><i class="fa-solid fa-trash"></i></button>
                                </td>
                            <tr>
                        
                        `);
                        }
                    
        
                    /* console.log(caracteristicasD); */
                    }
                function eliminar_servicio(id){
                    const index = serviciosD.indexOf(id.toString())
                    if(index>-1){
                        serviciosD.splice(index, 1);
                        $("#tr-" + id).remove();
                    }
                     console.log("Nuevo araray",serviciosD);
                }

</script>




@endsection