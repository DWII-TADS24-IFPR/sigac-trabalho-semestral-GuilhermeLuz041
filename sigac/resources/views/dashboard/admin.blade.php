<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Dashboard do Admin - SIGAC</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body class="dashboard-admin">
 
    <div class="logout-container">
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="btn btn-logout">Sair</button>
        </form>
    </div>
    
    <h1>Bem-vindo, Admin</h1>
    <div class="dashboard-container">
        <a href="" class="btn btn-admin">Manter Alunos</a>
        <a href="" class="btn btn-admin">Manter Cursos</a>
        <a href="" class="btn btn-admin">Manter Eixos</a>
        <a href="" class="btn btn-admin">Manter Níveis</a>
        <a href="" class="btn btn-admin">Manter Categorias</a>
        <a href="" class="btn btn-admin">Avaliar Solicitações</a>
    </div>
</body>
</html>