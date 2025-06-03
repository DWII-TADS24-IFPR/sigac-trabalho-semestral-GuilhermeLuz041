<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Home - SIGAC</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>

    <div class="home-container">
        <h1>Bem-vindo ao SIGAC</h1>
        <p>Sistema Integrado de Gestão de Atividades Curriculares</p>

        @auth
            <p>Olá, {{ auth()->user()->email }}! Você está logado.</p>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="btn-home-login">Sair</button>
            </form>
        @else
            <a href="{{ route('login') }}" class="btn-home-login">Login</a>
        @endauth
    </div>

</body>
</html>
