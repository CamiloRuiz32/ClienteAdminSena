@extends('layouts.app')

@section('content')
    <h1>Crear TrainingCenter</h1>

    <form action="{{route('trainingcenter.store') }}" method="POST" enctype="multipart/form-data">

        @csrf

        <label>
            Nombre:
            <br>
            <input type="text" name="name">
        </label>
        <br><br>
        <label>
            Ubicación:
            <br>
            <input type="text" name="location">
        </label>
        <br><br>
        <button type="submit" class="btn btn-outline-success btn-sm">Enviar Formulario:</button>
        <br><br>
    </form>
@endsection
