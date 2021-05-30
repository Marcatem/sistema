<!-- formulacion de creacion de empleados-->
<form action="{{url('/empleados')}}" method="post" enctype="multipart/form-data">
@csrf

    <label for="Nombre">Nombre</label>
    <input type="text" name="Nombre" id="Nombre">
    <br>
    <br>
    <label for="ApellidoPaterno">ApellidoPaterno</label>
    <input type="text" name="ApellidoPaterno" id="ApellidoPaterno">
    <br>
    <br>
    <label for="ApellidoMaterno">ApellidoMaterno</label>
    <input type="text" name="ApellidoMaterno" id="ApellidoMaterno">
    <br>
    <br>
    <label for="Correo">Correo</label>
    <input type="text" name="Correo" id="Correo">
    <br>
    <br>
    <label for="Foto">Foto</label>
    <input type="file" name="Foto" id="Foto">
    <br>
    <br>
    <input type="submit" value="Guardar datos">
</form>