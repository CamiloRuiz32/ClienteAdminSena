@extends('layouts.app')

@section('content')
<div class="container my-5">
    <h2 class="mb-4 text-success">Detalles del Computador</h2>

    <div class="table-responsive">
        <table class="table table-bordered table-hover">
            <thead class="table-success">
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Número</th>
                    <th scope="col">Marca</th>
                    <th scope="col">Foto</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{ $computer['id'] ?? '' }}</td>
                    <td>{{ $computer['number'] ?? '' }}</td>
                    <td>{{ $computer['brand'] ?? '' }}</td>
                    <td>
                        @if(!empty($computer['imagen_url']))
                            <img src="{{ $computer['imagen_url'] }}" alt="Foto del computador" style="max-width: 200px; border-radius: 8px;">
                        @endif
                    </td>
                </tr>
            </tbody>
        </table>
    </div>

    <a href="{{ route('computers.index') }}" class="btn btn-secondary btn-sm">Volver</a>
</div>
@endsection