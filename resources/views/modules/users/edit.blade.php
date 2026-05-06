@extends('layouts.main')

<div class="container">
    <h2>Actualizar usuario: {{ $item->name }} </h2>
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('update', $item->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <label for="name">Escriba el nombre</label>
                        <input type="text" name="name" id="name" class="form-control" 
                        value="{{ old('name', $item->name) }}" required>
                        <button class="btn btn-warning mt-3">Actualizar</button>
                        <a href="{{ route('index') }}" class="btn btn-secondary mt-3">Cancelar</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

