<!-- mostrar la lista de empleados-->

@extends('layouts.app')

@section('content')
<div class="container">

    <!--si hay un mensaje muestralo abajo -->
    @if(Session::has('mensaje'))
    {{Session::get('mensaje')}}
    @endif

    <a href="{{url('empleados/create')}}"> Registrar nuevo empleado</a>
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
                    <img src="{{asset('storage'). '/'.$empleado->Foto}}" alt="300" width="300">
                </td>


                <td>{{$empleado->Nombre}}</td>
                <td>{{$empleado->ApellidoPaterno}}</td>
                <td>{{$empleado->ApellidoMaterno}}</td>
                <td>{{$empleado->Correo}}</td>
                <td>
                    <a href="{{url('/empleados/'.$empleado->id.'/edit')}}"> Editar</a>
                    <form action="{{url('/empleados/'.$empleado->id)}}" method="post">
                        @csrf
                        {{method_field('DELETE')}}
                        <input type="submit" onclick="return confirm('Quires borrar?')" value="Borrar">
                    </form>

                </td>
            </tr>
            @endforeach
        </tbody>

    </table>
</div>
@endsection