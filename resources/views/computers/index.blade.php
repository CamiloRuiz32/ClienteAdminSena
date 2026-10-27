@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h1 class="mb-4">Lista de Computadores</h1>

    <div class="mb-3">
        <a href="{{ route('computer.create') }}" class="btn btn-outline-success btn-sm">Nuevo computador</a>
    </div>

    <table class="table table-bordered table-striped">
        <thead class="thead-dark">
            <tr>
                <th>ID</th>
                <th>Número</th>
                <th>Marca</th>
                <th>Foto</th>
                <th colspan="3">Acciones</th>
            </tr>
        </thead>

        <tbody>
            @if(isset($computers) && is_array($computers))
                @foreach ($computers as $computer)
                    <tr>
                        <td>{{ $computer['id'] ?? '' }}</td>
                        <td>{{ $computer['number'] ?? '' }}</td>
                        <td>{{ $computer['brand'] ?? '' }}</td>
                        <td>
                            @if(!empty($computer['imagen_url']))
                                <img src="{{ $computer['imagen_url'] }}" alt="Foto" style="max-width: 80px; border-radius: 6px;">
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('computer.show', $computer['id']) }}" class="btn btn-info btn-sm">Ver más</a>
                        </td>
                        <td>
                            <a href="{{ route('computer.edit', $computer['id']) }}" class="btn btn-warning btn-sm">Editar</a>
                        </td>
                        <td>
                            <form action="{{ route('computer.destroy', $computer['id']) }}" method="POST" style="display: inline-block;" onsubmit="return confirm('¿Estás seguro de eliminar este computador?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            @else
                <tr>
                    <td colspan="7" class="text-center">No hay computadores registrados</td>
                </tr>
            @endif
        </tbody>
    </table>
</div>
@endsection
