<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Sicredi')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<style>
    h2 {
        font-weight: bold;
        color: #4CAF50; /* Verde Sicredi */
    }
    .btn-outline-success {
        border-color: #4CAF50;
        color: #4CAF50;
    }
    .btn-outline-success:hover {
        background-color: #4CAF50;
        color: white;
    }
</style>
<body>
    
    <header>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="{{ route('home') }}">
                <img src="https://www.sicredi.com.br/static/home/assets/header/logo-svg2.svg" alt="Sicredi Logo" class="img-fluid" style="max-width: 200px;">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto"> 
                    <li class="nav-item">
                        <a class="btn btn-outline-success me-2" href="{{ route('user.show', Auth::user()) }}">Meu Usuário</a>
                    </li>
                    @can('viewAny', App\Models\User::class)
                    <li class="nav-item">
                        <a class="btn btn-outline-success  me-2" href="{{ route('user.index') }}">Gerenciar Usuários</a>
                    </li>
                    @endcan
                    {{-- alterado para previnir ataques de CSRF
                    <li class="nav-item">
                        <a class="btn btn-danger me-2" href="{{ route('login.logout') }}">Logout</a>
                    </li> --}}
                    <li class="nav-item">
                        <form id="logout-form" action="{{ route('login.logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                        <a class="btn btn-danger me-2" href="#" 
                           onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                           Logout
                        </a>
                    </li>
                </ul>
            </div>
        </nav>
    </header>

    <div class="container">
        @yield('content')
    </div>

    <footer class="text-center mt-5">
        <p>© 2024 Teste Pratico</p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
