<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adicionar Aluno</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
</head>
<body>
    <div class="page-container">

        <div class="actions-top">
            <a href="{{ route('admin.alunos.index') }}" class="btn-return">
                <i class="fas fa-arrow-left"></i> Voltar para Lista
            </a>
        </div>

        <h1 class="page-title">Adicionar Novo Aluno</h1>

        @if ($errors->any())
            <div class="error-message">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('alunos.store') }}" class="form-eixo">
            @csrf

            <div class="form-group horizontal-group">

                <div class="input-block">
                    
                </div>


                <div class="input-block">
                    <label for="turma_id">Turma:</label>
                    <select id="turma_id" name="turma_id" required>
                        <option value="">Selecione uma turma</option>
                        @foreach($turmas as $turma)
                            <option value="{{ $turma->id }}" {{ old('turma_id') == $turma->id ? 'selected' : '' }}>
                                Ano {{ $turma->ano }} - {{ $turma->curso->nome }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="form-actions">
                <button type="submit" class="btn-add">
                    <i class="fas fa-save"></i> Salvar
                </button>
                <a href="{{ route('admin.alunos.index') }}" class="btn-return">
                    <i class="fas fa-times"></i> Cancelar
                </a>
            </div>
        </form>
    </div>
</body>
</html>
