<!-- mostrar la lista de empleados-->

@extends('layouts.app')

@section('content')
<div class="container">

    <!--si hay un mensaje muestralo abajo -->
    <div class="alert alert-success alert-dismissible" role="alert">
        @if(Session::has('mensaje'))
        {{Session::get('mensaje')}}
        @endif

        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
    </div>



    <a href="{{url('empleados/create')}}" class="btn btn-success"> Registrar nuevo empleado</a>
    <br>
    <br>
    <table class="table table-light">

        <thead class="thead-light">
            <tr>
                <th></th>
                <th>Foto</th>
                <th>Nombre</th>
                <th>Apellido Paterno</th>
                <th>Apellido Materno</th>
                <th>Correo</th>
                <th>Acciones</th>
            </tr>
        </thead>

        <tbody>
            @foreach($empleados as $empleado)
            <tr>
                <td>{{$empleado->id}}</td>
                <td>
                    <!--en src ponemos la ruta de dicha imagen con asset nos da el acceso al deposito de storage
            -->
                    <img class="img-thumbnail img-fluid" src="{{asset('storage'). '/'.$empleado->Foto}}" alt="300" width="300">
                </td>


                <td>{{$empleado->Nombre}}</td>
                <td>{{$empleado->ApellidoPaterno}}</td>
                <td>{{$empleado->ApellidoMaterno}}</td>
                <td>{{$empleado->Correo}}</td>
                <td>
                    <a href="{{url('/empleados/'.$empleado->id.'/edit')}}" class="btn btn-warning"> Editar</a>
                    |
                    <form action="{{url('/empleados/'.$empleado->id)}}" method="post" class="d-inline">
                        @csrf
                        {{method_field('DELETE')}}
                        <input class="btn btn-danger" type="submit" onclick="return confirm('Quires borrar?')" value="Borrar">
                    </form>

                </td>
            </tr>
            @endforeach
        </tbody>

    </table>
</div>
@endsection