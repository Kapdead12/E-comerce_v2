@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Crear Nuevo Rol</h1>

    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('roles.store') }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="name">Nombre del Rol:</label>
            <input type="text" name="name" id="name" class="form-control" required>
        </div>

        <div class="form-group mt-3">
            <label for="permissions">Permisos:</label>
            @foreach($permissions as $permission)
                <div>
                    <input type="checkbox" name="permissions[]" value="{{ $permission->name }}">
                    <label>{{ $permission->name }}</label>
                </div>
            @endforeach
        </div>

        <button type="submit" class="btn btn-primary mt-3">Crear Rol</button>
    </form>
</div>
@endsection
