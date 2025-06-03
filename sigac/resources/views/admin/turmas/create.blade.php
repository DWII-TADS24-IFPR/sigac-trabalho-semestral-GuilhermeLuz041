<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adicionar Turma</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
</head>
<body>
    <div class="page-container">

        <div class="actions-top">
            <a href="{{ route('admin.turmas.index') }}" class="btn-return">
                <i class="fas fa-arrow-left"></i> Voltar para Lista
            </a>
        </div>

        <h1 class="page-title">Adicionar Nova Turma</h1>

        @if ($errors->any())
            <div class="error-message">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        
        <form method="POST" action="{{ route('turmas.store') }}" class="form-eixo">
            @csrf

            <div class="form-group">
                <div class="form-group horizontal-group">
                <div class="input-block">
                    <label for="ano">Ano:</label>
                    <input type="number" step="1.0" id="ano" name="ano" value="{{ old('ano') }}" required>
                </div>

                <div class="input-block">
                    <label for="curso_id">Curso:</label>
                    <select id="curso_id" name="curso_id" required>
                        <option value="">Selecione um nível</option>
                        @foreach($cursos as $curso)
                            <option value="{{ $curso->id }}" {{ old('curso_id') == $curso->id ? 'selected' : '' }}>
                                {{ $curso->nome }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="form-actions">
                <button type="submit" class="btn-add">
                    <i class="fas fa-save"></i> Salvar
                </button>
                <a href="{{ route('admin.turmas.index') }}" class="btn-return">
                    <i class="fas fa-times"></i> Cancelar
                </a>
            </div>
        </form>
    </div>
</body>
</html>
