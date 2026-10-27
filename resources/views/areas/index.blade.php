@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h1 class="mb-4">Lista de Áreas</h1>

    <div class="mb-3">
        <a href="{{ route('area.create') }}" class="btn btn-outline-success btn-sm">Nueva área</a>
    </div>

    <table class="table table-bordered table-striped">
        <thead class="thead-dark">
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th colspan="3">Acciones</th>
            </tr>
        </thead>
        <tbody>
            @if(isset($areas) && is_array($areas))
                @foreach ($areas as $area)
                    <tr>
                        <td>{{ $area['id'] ?? '' }}</td>
                        <td>{{ $area['name'] ?? '' }}</td>
                        <td>
                            <a href="{{ route('area.show', $area['id']) }}" class="btn btn-info btn-sm">Ver más</a>
                        </td>
                        <td>
                            <a href="{{ route('area.edit', $area['id']) }}" class="btn btn-warning btn-sm">Editar</a>
                        </td>
                        <td>
                            <form action="{{ route('area.destroy', $area['id']) }}" method="POST" style="display: inline-block;" onsubmit="return confirm('¿Estás seguro de eliminar esta área?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            @else
                <tr>
                    <td colspan="5" class="text-center">No hay áreas registradas</td>
                </tr>
            @endif
        </tbody>
    </table>
</div>
@endsection