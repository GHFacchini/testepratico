@extends('layouts.app')

@section('title', 'Editar Usuário')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    Editar Usuário
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route('user.update', $user->id) }}">
                        @csrf
                        @method('PATCH')

                        <div class="form-group mb-3">
                            <label for="name">Nome</label>
                            <input type="text" name="name" class="form-control" value="{{ old('name', $user->name) }}">
                            @error('name')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label for="email">Email</label>
                            <input type="email" name="email" class="form-control" value="{{ old('email', $user->email) }}">
                            @error('email')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label for="password">Senha</label>
                            <input type="password" name="password" class="form-control">
                            @error('password')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label for="password_confirmation">Confirme a Senha</label>
                            <input type="password" name="password_confirmation" class="form-control">
                        </div>

                        @can('updateRole', $user)
                        <div class="form-group mb-3">
                            <label for="role">Role</label>
                            <select name="role" class="form-control">
                                <option value="" selected></option> 
                                <option value="{{ \App\Enums\Role::Admin }}">Admin</option>
                                <option value="{{ \App\Enums\Role::User }}">User</option>
                            </select>
                        </div>
                        @endcan

                        <button type="submit" class="btn btn-primary">Salvar Alterações</button>
                        <a href="{{ route('user.show', $user->id) }}" class="btn btn-secondary">Cancelar</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
