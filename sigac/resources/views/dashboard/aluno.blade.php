<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Dashboard do Aluno - SIGAC</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body class="dashboard-aluno">
    <header class="header">
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="btn btn-logout">Sair</button>
        </form>
        <h1>Dashboard do Aluno</h1>
    </header>

    <div style="height: 100px;"></div> 

    <div class="dashboard-container">
        <a href="#" class="btn btn-aluno">Solicitar Horas Complementares</a>
        <a href="#" class="btn btn-aluno">Gerar Declaração de Cumprimento</a>
    </div>
</body>
</html>
