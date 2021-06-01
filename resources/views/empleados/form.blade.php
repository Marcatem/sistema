<!-- edicion de la tabla empleados-->
<h1>{{$modo}} empleado</h1>

<!--si hay errores mayor que cero -->
@if(count($errors)>0)
<!--traeme todos los errores y me los vas a mostrar de uno en uno-->
<div class="alert alert-danger form-group" role="alert">
    <ul>
        @foreach($errors->all() as $error)
        <li>
            {{$error}}
        </li>
        @endforeach
    </ul>

    @endif
</div>

<div class="form-group ">
    <label for="Nombre">Nombre</label>
    <input class="form-control" type="text" name="Nombre" id="Nombre" value="{{isset($empleado->Nombre)? $empleado->Nombre:''}}">

</div>

<div class="form-group ">
    <label for="ApellidoPaterno">Apellido Paterno</label>
    <input class="form-control" type="text" name="ApellidoPaterno" id="ApellidoPaterno" value="{{isset($empleado->ApellidoPaterno)? $empleado->ApellidoPaterno:''}}">

</div>

<div class="form-group ">
    <label for="ApellidoMaterno">Apellido Materno</label>
    <input class="form-control" type="text" name="ApellidoMaterno" id="ApellidoMaterno" value="{{isset($empleado->ApellidoMaterno)? $empleado->ApellidoMaterno:''}}">

</div>

<div class="form-group ">
    <label for="Correo">Correo</label>
    <input class="form-control" type="text" name="Correo" id="Correo" value="{{isset($empleado->Correo)?$empleado->Correo:''}}">

</div>


<div class="form-group ">
    <label for="Foto"></label>
    @if(isset($empleado->Foto))
    <img class="img-thumbnail img-fluid" src="{{asset('storage'). '/'.$empleado->Foto}}" alt="300" width="300">
    @endif
    <input class="form-control" type="file" name="Foto" id="Foto" value="">

</div>



<a class="btn btn-success" href="{{url('empleados')}}"> Regresar</a>

<input class="btn btn-primary" type="submit" value="{{$modo}} datos">