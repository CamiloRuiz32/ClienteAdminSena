@extends('layouts.app')

@section('content')

    <h1>Editar Computador</h1>

    <form action="{{ route('computer.update', $computer['id']) }}" method="POST">

        @csrf
        @method('PUT')

        <label>
            Número:
            <br>
            <input type="text" name="number" value="{{ old('number', $computer['number'] ?? '') }}" class="form-control">
        </label>
        <br><br>
        <label>
            Marca:
            <br>
            <input type="text" name="brand" value="{{ old('brand', $computer['brand'] ?? '') }}" class="form-control">
        </label>
        <br><br>

        <button type="submit" class="btn btn-outline-success btn-sm">Enviar Formulario</button>
        <br><br>
    </form>

    <a href="{{ route('computers.index') }}" class="btn btn-secondary btn-sm">Volver</a>

@endsection
