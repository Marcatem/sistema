<!-- edicion de la tabla empleados-->
<label for="Nombre">Nombre</label>
<input type="text" name="Nombre" id="Nombre" value="{{$empleado->Nombre}}">
<br>
<br>
<label for="ApellidoPaterno">ApellidoPaterno</label>
<input type="text" name="ApellidoPaterno" id="ApellidoPaterno" value="{{$empleado->ApellidoPaterno}}">
<br>
<br>
<label for="ApellidoMaterno">ApellidoMaterno</label>
<input type="text" name="ApellidoMaterno" id="ApellidoMaterno" value="{{$empleado->ApellidoMaterno}}">
<br>
<br>
<label for="Correo">Correo</label>
<input type="text" name="Correo" id="Correo" value="{{$empleado->Correo}}">
<br>
<br>
<label for="Foto">Foto</label>
<img src="{{asset('storage'). '/'.$empleado->Foto}}" alt="300" width="300">
<input type="file" name="Foto" id="Foto" value="">
<br>
<br>
<input type="submit" value="Guardar datos">