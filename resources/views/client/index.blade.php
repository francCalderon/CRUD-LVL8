@extends('theme.base')

@section('content')

<div class="container py-5 text-center">
    <h1>Listado de Clientes</h1>
    <div class="conainer py-5">
        <a href="{{ route('client.create') }}" class="btn btn-primary">Crear Cliente</a>
    </div>

    @if (Session::has('mensaje'))
    <div class="alert alert-info my-5">
        {{Session::get('mensaje')}}
    </div>
    @endif

    <table class="table caption-top">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Saldo</th>
                <th>Acciones</th>
            </tr>
        </thead>

        <tbody class="table-group-divider">
            @forelse ($clients as $detail)
        <tr>
            <td>{{$detail->name}}</td>
            <td>{{$detail->due}}</td>
            <td>{{$detail->comments}}</td>
            <td>
                <a href="{{route('client.edit', $detail)}}" class="btn btn-warning">Editar</a>

                <form action="{{route('client.destroy', $detail)}}" method="post" class="d-inline">
                    @method('DELETE')
                    @csrf
                    <button type="submit" class="btn btn-danger" onclick="return confirm('Estás seguro de Eliminar este cliente')" >Eliminar</button>
                </form>                
            </td>
        </tr>
        @empty
        <tr>
            <td colspan="3">No hay registros</td>
        </tr>
        @endforelse

        </tbody>
        
    </table>

    @if ($clients->count())
    {{ $clients->links()}}
    @endif



</div>

@endsection
