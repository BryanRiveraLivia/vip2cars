<h1>Lista de Vehículos</h1>
<a href="{{ route('vehicles.create') }}">Nuevo vehículo</a>

@if(session('success'))
    <p>{{ session('success') }}</p>
@endif

<table>
    <tr>
        <th>Placa</th><th>Marca</th><th>Modelo</th><th>Cliente</th><th>Acciones</th>
    </tr>
    @foreach($vehicles as $v)
        <tr>
            <td>{{ $v->placa }}</td>
            <td>{{ $v->marca }}</td>
            <td>{{ $v->modelo }}</td>
            <td>{{ $v->nombre_cliente }} {{ $v->apellidos_cliente }}</td>
            <td>
                <a href="{{ route('vehicles.edit', $v) }}">Editar</a>
                <form action="{{ route('vehicles.destroy', $v) }}" method="POST">
                    @csrf @method('DELETE')
                    <button type="submit">Eliminar</button>
                </form>
            </td>
        </tr>
    @endforeach
</table>
