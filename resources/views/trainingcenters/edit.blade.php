@extends('layouts.app')

@section('content')

    <h1>Editar TrainingCenter</h1>

    <form action="{{route('trainingcenter.update', $trainingcenter['id'])}}" method="POST" enctype="multipart/form-data">

        @csrf
        @method('PUT')

        <label>
            Nombre:
            <br>
            <input type="text" name="name" value="{{old('name', $trainingcenter['name'] ?? '') }}">
        </label>
        <br><br>
        <label>
            Ubicación:
            <br>
            <input type="text" name="location" value="{{old('location', $trainingcenter['location'] ?? '') }}">
        </label>
        <br>

        <br><br>
        <button type="submit" class="btn btn-outline-success btn-sm">Enviar Formulario:</button>
        <br><br>
    </form>

@endsection
