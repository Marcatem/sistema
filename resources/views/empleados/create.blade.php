<!-- formulacion de creacion de empleados-->

@extends('layouts.app')

@section('content')
<div class="container">
    <form action="{{url('/empleados/create')}}" method="post" enctype="multipart/form-data">
        @csrf
        {{method_field('GET')}}

        @include('empleados.form',['modo'=>'Crear']);


    </form>
</div>
@endsection