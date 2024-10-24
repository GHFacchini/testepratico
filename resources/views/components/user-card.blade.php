<div class="card" style="width: 30rem;">
    <div class="card-header text-center fs-3">
        Detalhes do Usuário
    </div>
    <ul class="list-group list-group-flush fs-5">
        <li class="list-group-item"><strong>Nome:</strong> {{ $user->name }}</li>
        <li class="list-group-item"><strong>Email:</strong> {{ $user->email }}</li>
        <li class="list-group-item"><strong>Role:</strong> {{ $user->role->name }}</li>
    </ul>
    <div class="card-body text-center">
        <a href="{{ route('user.edit', $user->id) }}" class="btn btn-warning me-2">Editar</a>
        <form action="{{ route('user.destroy', $user->id) }}" method="POST" style="display:inline">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">Deletar</button>
        </form>
    </div>
</div>