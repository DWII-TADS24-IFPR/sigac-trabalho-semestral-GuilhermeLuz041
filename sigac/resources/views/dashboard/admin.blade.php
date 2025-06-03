<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Dashboard do Admin - SIGAC</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body class="dashboard-admin">
    <header class="header">
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="btn btn-logout">Sair</button>
        </form>
        <h1>Dashboard do Admin</h1>
    </header>

    <div style="height: 100px;"></div> 

    <div class="dashboard-container">
        <a href="{{ route('admin.alunos.index') }}" class="btn btn-admin">Manter Alunos</a>
        <a href="{{ route('admin.cursos.index') }}" class="btn btn-admin">Manter Cursos</a>
        <a href="{{ route('admin.eixos.index') }}" class="btn btn-admin">Manter Eixos</a>
        <a href="{{ route('admin.niveis.index') }}" class="btn btn-admin">Manter Níveis</a>
        <a href="{{ route('admin.turmas.index') }}" class="btn btn-admin">Manter Turma</a>
        <a href="{{ route('admin.categorias.index') }}" class="btn btn-admin">Manter Categorias</a>
        <a href="#" class="btn btn-admin">Avaliar Solicitações</a>
        <a href="#" class="btn btn-admin">Gerar Gráficos</a>
    </div>
</body>
</html>
