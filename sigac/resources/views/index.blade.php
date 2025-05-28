<!DOCTYPE html>
<html>
<head>
    <title>Lista de Alunos</title>
</head>
<body>
    <h1>Alunos</h1>

    <ul>
        @foreach ($alunos as $aluno)
            <li>{{ $aluno->nome }}</li>
        @endforeach
    </ul>
</body>
</html>
