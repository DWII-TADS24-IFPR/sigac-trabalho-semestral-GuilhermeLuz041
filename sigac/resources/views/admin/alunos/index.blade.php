<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Lista de Alunos - SIGAC</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
</head>
<body>
    <div class="page-container">
        
        <div class="actions-top">
            <a href="{{ route('admin.dashboard') }}" class="btn-return">
                <i class="fas fa-arrow-left"></i> Voltar para Dashboard
            </a>
            <a href="{{ route('alunos.create') }}" class="btn-add">
                <i class="fas fa-plus"></i> Adicionar Novo Aluno
            </a>
        </div>

        <h1 class="page-title">Lista de alunos</h1>

        @if (session('success'))
            <div class="success-message">
                {{ session('success') }}
            </div>
        @endif

        <table class="table-list">
            <thead>
                <tr>
                    <th>ID</th> 
                    <th>Nome do Aluno</th>
                    <th>Turma</th>
                    <th class="text-right">Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach($alunos as $aluno)
                <tr>
                    <td>{{ $aluno->id }}</td> 
                    <td>{{ $aluno->user->nome }}</td>
                    <td>{{ $aluno->turma->ano }}</td>
                    <td class="actions-cell">
                        <a href="{{ route('alunos.edit', $aluno->id) }}" class="btn-action btn-edit">
                            <i class="fas fa-edit"></i> Editar
                        </a>
                        <form action="{{ route('alunos.destroy', $aluno->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn-action btn-delete" onclick="return confirm('Tem certeza que deseja excluir este aluno?')">
                                <i class="fas fa-trash-alt"></i> Excluir
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
                @if($alunos->isEmpty())
                <tr>
                    <td colspan="3" style="text-align:center;">Nenhum aluno cadastrado.</td>
                </tr>
                @endif
            </tbody>
        </table>
    </div>
</body>
</html>
