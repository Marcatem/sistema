<!-- formulacion de creacion de empleados-->
<form action="{{url('/empleados')}}" method="post" enctype="multipart/form-data">
@csrf

@include('empleados.form');
</form>