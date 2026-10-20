<div class="container mt-4">
<h1 class="mb-4">Lista de TrainingCenters</h1>

    <table class="table table-bordered table-striped">
        <thead class="thead-dark">
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Location</th>
                <th>Acciones</th>
            </tr>
        </thead>

        <tbody>
             <div>
                    <a href="{{route('trainingcenter.create') }}" class="btn btn-outline-success btn-sm">Nueva TrainingCenters</a>
                    <br><br>
                </div>
            @foreach ($trainingcenters as $trainingcenter)
                <tr>
                    <td>{{ $trainingcenter['id'] }}</td>
                    <td>{{ $trainingcenter['name'] }}</td>
                    <td>{{ $trainingcenter['location'] }}</td>
                    <td>
                        <a href="{{route('trainingcenter.show', $trainingcenter['id']) }}" class="btn btn-info btn-sm">
                            Ver más
                        </a>
                    </td>
                <td>
                 <a href="{{route('trainingcenter.edit', $trainingcenter['id']) }}" class="btn btn-warning btn-sm">Editar</a>
                        </td>
                        <td>
                            <form action="{{route('trainingcenter.destroy', $trainingcenter['id']) }}" method="POST"
                                style="display: inline-block;"
                                onsubmit="return confirm('¿Estás seguro de eliminar esta categoría?')">

                                @csrf
                                @method('DELETE')

                                <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
