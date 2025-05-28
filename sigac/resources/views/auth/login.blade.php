<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <title>Login - SIGAC</title>
</head>
<body>
    <div class="login-container">
        <h1>Entrar no SIGAC</h1>

        @if ($errors->any())
            <div class="error-message">
                <ul style="margin:0; padding-left: 1.2rem;">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <label for="email">Email</label>
            <input id="email" type="email" name="email" value="" required autofocus />

            <label for="password">Senha</label>
            <input id="password" type="password" name="password" required autocomplete="current-password" />

            <button type="submit">Entrar</button>
        </form>

        <div class="register-link">
            Não tem conta? <a href="">Cadastre-se</a>
        </div>
    </div>
</body>
</html>
