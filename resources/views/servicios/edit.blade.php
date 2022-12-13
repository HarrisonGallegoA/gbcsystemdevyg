<form action="{{route('servicioActualizar')}}" method="post">
    <div class="modal-body">
        @csrf @method('PUT')

        
        <div class="form-group">
            <label for="nombre">Nombre</label>
            <input type="text" class="form-control" name="nombre" id="nombre"
                placeholder="Ingrese el nombre del servicio" value="{{($servicio->nombre)}}" minlength="5"  maxlength="20" required>
            <small class="text-danger">{{$errors->first('nombre')}}</small>
        </div>

        <div class="form-group">
            <label for="descripcion">Descripción</label>
            <textarea class="form-control" name="descripcion" id="descripcion"
                rows="2" minlength="10"  maxlength="99" required>{{old('descripcion', $servicio->descripcion)}}</textarea>
            <small class="text-danger">{{$errors->first('descripcion')}}</small>

        </div>

        <div class="form-group">
            <label for="precio">Precio</label>
            <input type="number" class="form-control" name="precio" id="precio"
                placeholder="Ingrese el precio" value="{{old('precio', $servicio->precio)}}" min="10000" max="1000000" required>
            <small class="text-danger">{{$errors->first('precio')}}</small>
        </div>

        <div class="form-group">
            <label for="date">Tiempo</label>
            <input type="time" class="form-control" id="tiempo" name="tiempo"
                placeholder="ingrese la fecha" value="{{old('tiempo', $servicio->tiempo)}}" required>
            <small class="text-danger">{{$errors->first('tiempo')}}</small>
        </div>


        <div class="form-group">
            <label for="estado">Estado</label>
            <select class="form-control" name="estado" id="estado">
                @if($servicio->estado == 1)
                <option value="1" selected>Activo</option>
                <option value="2" >Inactivo</option>
                @elseif ($servicio->estado == 2)
                <option value="1" >Activo</option>
                <option value="2" selected>Inactivo</option>
                @endif
            </select>
        </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary">Atrás</button>
        <button type="submit" class="btn btn-primary">Actualizar</button>
    </div>
</form>