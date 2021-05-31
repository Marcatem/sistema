<!-- edicion de la tabla empleados-->
<h1>{{$modo}} empleado</h1>
<label for="Nombre">Nombre</label>
<input type="text" name="Nombre" id="Nombre" value="{{isset($empleado->Nombre)? $empleado->Nombre:''}}">
<br>
<br>
<label for="ApellidoPaterno">ApellidoPaterno</label>
<input type="text" name="ApellidoPaterno" id="ApellidoPaterno" value="{{isset($empleado->ApellidoPaterno)? $empleado->ApellidoPaterno:''}}">
<br>
<br>
<label for="ApellidoMaterno">ApellidoMaterno</label>
<input type="text" name="ApellidoMaterno" id="ApellidoMaterno" value="{{isset($empleado->ApellidoMaterno)? $empleado->ApellidoMaterno:''}}">
<br>
<br>
<label for="Correo">Correo</label>
<input type="text" name="Correo" id="Correo" value="{{isset($empleado->Correo)?$empleado->Correo:''}}">
<br>
<br>
<label for="Foto">Foto</label>
@if(isset($empleado->Foto))
<img src="{{asset('storage'). '/'.$empleado->Foto}}" alt="300" width="300">
@endif
<input type="file" name="Foto" id="Foto" value="">
<br>
<br>

<a href="{{url('empleados')}}"> Regresar</a>

<input type="submit" value="{{$modo}} datos">