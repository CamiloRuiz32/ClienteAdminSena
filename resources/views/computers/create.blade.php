@extends('layouts.app')

@section('content')

    <h1>Crear Computador</h1>

    <form action="{{ route('computer.store') }}" method="POST" enctype="multipart/form-data">

        @csrf

        <label>
            Número:
            <br>
            <input type="text" name="number" value="{{ old('number') }}" class="form-control">
        </label>
        <br><br>
        <label>
            Marca:
            <br>
            <input type="text" name="brand" value="{{ old('brand') }}" class="form-control">
        </label>
        <br><br>

        <div class="mb-3">
            <label class="form-label">Foto del computador</label>
            <input type="file" name="imagen" class="form-control" accept="image/*" required>
        </div>

        <br>
        <button type="submit" class="btn btn-outline-success btn-sm">Enviar Formulario</button>
        <br><br>
    </form>

    <a href="{{ route('computers.index') }}" class="btn btn-secondary btn-sm">Volver</a>

@endsection
