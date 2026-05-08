@extends('layouts.main')

@section('content')
    <div class="container mt-4">
        <h2>Crear usuarios</h2>
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <a href="{{ route('index') }}" class="btn btn-primary">
                            Home
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
                                            <form action="{{ route('restore', $item->id) }}" method="POST">
                                                @csrf
                                                @method('PATCH')
                                                <button type="submit" class="btn btn-success btn-sm">Restaurar</button>
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
