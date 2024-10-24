@extends('layouts.app')
@section('title', 'Usuários')
@section('content')

<div class="container-fluid">
    <div class="row align-items-center justify-content-center">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Email</th>
                    <th scope="col">Role</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr>
                        <td>{{$user->id}}</td>
                        <td>{{$user->name}}</td>
                        <td>{{$user->email}}</td>
                        <td>{{$user->role->name}}</td>
                        <td>
                            <a class="btn btn-warning me-2" href="{{ route('user.edit', $user->id) }}">Editar</a>
                            <form action="{{ route('user.destroy', $user->id) }}" method="POST" style="display:inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Deletar</button>
                            </form>
                        </td>
                    </tr> 
                @endforeach
            </tbody> 
        </table>
        <div calss= 'row'>
            {{-- Tentei muito definir o pagination.blade.php como default mas ele insiste em usar o tailwind como defaul --}}
            {{-- Alerta de gambiarra, coloquei o código do bootstrap-5 no arquivo tailwind.blade.php e agora está carregando o bootstrap por padrão na paginação --}}
            {{$users->links()}} 
            {{-- $users->links('vendor.pagination.pagination')--}}
        </div>
    </div>
</div>


@endsection