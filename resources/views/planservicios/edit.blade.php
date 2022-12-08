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
    {{-- <div class="col-12">
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
    </div> --}}
    <div class="row">
        <div class="col-6">
            <div class="card shadow">
                <div class="card-header">
                    <h5 class="text-center">Crear Plan</h5>
                </div>
                <div class="row card-body">
                    <div class="form-group col-6">
                        <label for="nombre">Nombre</label>
                        <input type="text" class="form-control" name="nombre" id="nombre"
                            placeholder="Ingrese el nombre del plan" value="{{($planes->nombre)}}">
                        <small class="text-danger">{{$errors->first('nombre')}}</small>
                    </div>
                    <div class="form-group col-6">
                        <label for="descripcion">Descripción</label>
                        <textarea class="form-control" name="descripcion" id="descripcion"
                            rows="2">{{($planes->descripcion)}}</textarea>
                        <small class="text-danger">{{$errors->first('descripcion')}}</small>
                    </div>
                    <div class="form-group col-6">
                        <label for="precioplan">Precio plan</label>
                        <input type="number" class="form-control" id="precioplan" name="precioplan"
                            placeholder="ingrese el precio del plan" value="{{($planes->precioplan)}}">
                        <small class="text-danger">{{$errors->first('precioplan')}}</small>
                    </div>
                    <div class="form-group col-6">
                        <label for=" ">Domo</label>
                        <select name="domo_id" class="form-control" required>
                            <option value="">Seleccione</option>
                            @foreach($domos as $domo)                            
                            <option value="{{ $domo->id }}" {{ $domo->id == $planes->domo_id ? 'selected' : '' }}>{{ $domo->nombre }}</option>
                            @endforeach
                            
                        </select>
                    </div>
                    <div class="form-group col-6">
                        <label for="totalservicio">Total servicios</label>
                        <input type="text" class="form-control" id="totalservicio" name="totalservicio"
                            placeholder="ingrese el total del plan" value="{{($planes->totalservicio)}}">
                        <small class="text-danger">{{$errors->first('totalservicio')}}</small>

                    </div>
                    <div class="form-group col-6">
                        <label for="totalplan">Total</label>
                        <input type="number" class="form-control" name="totalplan" id="totalplan"
                            placeholder="Ingrese el total plan" value="{{($planes->totalplan)}}">
                        <small class="text-danger">{{$errors->first('totalplan')}}</small>
                    </div>

                    <div class="form-group col-6">
                        <label for="estado">Estado</label>
                        <select class="form-control" name="estado" id="estado">

                            <option value="1">Activo</option>

                            <option value="2">Inactivo</option>

                        </select>
                    </div>

                    {{-- <div class="form-group col-6">
                        <label for="">Total plan</label>
                        <input type="number" class="form-control" placeholder="Total" name="totalplan" disabled>
                    </div> --}}
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
                                <option value="{{ $value->id }}">{{ $value->nombre }} ${{ $value->precio }}</option>

                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-12">
                        <button onclick="agregar_servicio()" type="button" class="btn btn-success float-right"><i
                                class="fa-solid fa-plus"></i></button>
                    </div>
                </div>
                @foreach ($servicioplan as $servicioid)

                @endforeach
                <div class="card shadow">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead class="thead-dark">
                                    <tr>
                                        <th>Nombre</th>
                                        <th>Precio</th>
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

<br><br>



@endsection

@section('scripts')
<script>
    let serviciosD = [''];
    let suma = 0;
    let resta=0;

    function cargarServiciosPlan() {
        const servicios = JSON.parse('{!! json_encode($servicios)!!}')
        console.log('servicios DB',servicios);
        const serviciosPlan = JSON.parse('{!! json_encode($servicioplan) !!}')
        console.log('servicios plan',serviciosPlan);
        let serviciosIds = []

        serviciosPlan.forEach(servcio => {
            serviciosIds.push(servcio.servicio_id)
        });
        let serviciosMostrar = []
        servicios.forEach(servicio=>{
            if (serviciosIds.includes(servicio.id)) {
                serviciosMostrar.push(servicio)
                serviciosD.push(servicio.id.toString())
                $("#tblServicios").append(`
                    <tr id="tr-${servicio.id}">
                        <td>
                            <input type="hidden" name="servicio_id[]" value="${servicio.id} "/>
                            ${servicio.nombre}
                        </td>
                        <td>
                            ${servicio.precio}
                        </td>
                        
                        <td>
                            <button type="button" class="btn btn-danger" onclick="eliminar_servicio(${servicio.id})"><i class="fa-solid fa-trash"></i></button>
                        </td>
                    <tr>
                
                `);
                suma = suma + parseInt(precio);
                        console.log(suma) 
                        document.getElementById('totalservicio').value = suma;
            }
        })
       
        

    }
    cargarServiciosPlan()
    function agregar_servicio(){
                    let servicio_id = $("#servicios option:selected").val();
                    let servicio_text = $("#servicios option:selected").text();
                    let precio_ser = servicio_text.split("$");
                    let precio = precio_ser[1];

                    /* let cantidad = $("#cantidad").val(); */
                    let existe = serviciosD.includes(servicio_id)
                                        
                        if (existe) {
                            Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: 'El servicio ya existe!',
                            showConfirmButton: false,
                            timer: 1500
                        })
                            
                        } else {
                            serviciosD.push(servicio_id)
                            console.log(serviciosD); 
                            $("#tblServicios").append(`
                            <tr id="tr-${servicio_id}">
                                <td>
                                    <input type="hidden" name="servicio_id[]" value="${servicio_id} "/>
                                    ${precio_ser[0]}
                                </td>
                                <td>
                                    ${precio}
                                </td>
                                
                                <td>
                                    <button type="button" class="btn btn-danger" onclick="eliminar_servicio(${servicio_id})"><i class="fa-solid fa-trash"></i></button>
                                </td>
                            <tr>
                        
                        `);
                        suma = suma + parseInt(precio);
                        console.log(suma) 
                        document.getElementById('totalservicio').value = suma;
                        }
                    
        
                    /* console.log(caracteristicasD); */
                    }
                function eliminar_servicio(id){
                    const index = serviciosD.indexOf(id.toString())
                    if(index>-1){
                        serviciosD.splice(index, 1);
                        // const precio = document.querySelector('#tr-'+id).children[1]                                                
                        // suma = suma - precio;
                        // console.log(suma) 
                        // document.getElementById('totalservicio').value = suma; 
                        $("#tr-" + id).remove();
                    }
                        console.log("Nuevo araray",serviciosD);
                }

</script>




@endsection