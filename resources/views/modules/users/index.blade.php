@extends('layouts.main')

@section('content')
    <div class="container mt-4">
        <h2>Crear usuarios</h2>
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <a href="{{ route('create') }}" class="btn btn-primary">
                            Agregar
                        </a>
                        <hr>
                        <table class="table table-sm table-bordered text-center">
                            <thead>
                                <tr>
                                    <th>Nombre</th>
                                    <th>ID</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                                <tbody>
                                    @forelse ($items as $item) 
                                    <tr>
                                        <td>{{ $item->name}}</td>
                                        <td>{{ $item->id}}</td>
                                        <td>
                                            <form action="{{ route('delete', $item->id) }}" method="post">
                                                @csrf
                                                @method('DELETE')
                                                <a href="{{ route('show', $item->id) }}" class="btn btn-primary">Mostrar</a>
                                                <a href="{{ route('edit', $item->id) }}" class="btn btn-secondary">Editar</a>
                                                <button class="btn btn-danger">Borrar</button>
                                            </form>
                                        </td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td>No hay datos que mostrar</td>
                                    </tr>
                                    @endforelse
                                </tbody>
                        </table>
                        <div class="d-flex justify-content-end">
                            {{ $items->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
