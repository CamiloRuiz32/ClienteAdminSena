@extends('layouts.app')

@section('content')
    <h1>Crear Área</h1>

    <form action="{{ route('area.store') }}" method="POST">

        @csrf

        <label>
            Nombre:
            <br>
            <input type="text" name="name" value="{{ old('name') }}" class="form-control">
        </label>
        <br><br>
        <button type="submit" class="btn btn-outline-success btn-sm">Enviar Formulario</button>
        <br><br>
    </form>

    <a href="{{ route('areas.index') }}" class="btn btn-secondary btn-sm">Volver</a>
@endsection
