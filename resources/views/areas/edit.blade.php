@extends('layouts.app')

@section('content')

    <h1>Editar Área</h1>

    <form action="{{ route('area.update', $area['id']) }}" method="POST">

        @csrf
        @method('PUT')

        <label>
            Nombre:
            <br>
            <input type="text" name="name" value="{{ old('name', $area['name'] ?? '') }}" class="form-control">
        </label>
        <br><br>

        <button type="submit" class="btn btn-outline-success btn-sm">Enviar Formulario</button>
        <br><br>
    </form>

    <a href="{{ route('areas.index') }}" class="btn btn-secondary btn-sm">Volver</a>

@endsection
