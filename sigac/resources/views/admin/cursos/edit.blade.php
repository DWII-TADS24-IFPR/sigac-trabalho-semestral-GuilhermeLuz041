<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Editar Curso</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
</head>
<body>
    <div class="page-container">

        <div class="actions-top">
            <a href="{{ route('admin.cursos.index') }}" class="btn-return">
                <i class="fas fa-arrow-left"></i> Voltar para Lista
            </a>
        </div>

        <h1 class="page-title">Editar Eixo</h1>

        @if ($errors->any())
            <div class="error-message">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('cursos.update', $curso->id) }}" class="form-eixo">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="nome">Nome do Curso:</label>
                <input type="text" id="nome" name="nome" value="{{ old('nome', $curso->nome) }}" required>

                <label for="sigla">Sigla do Curso:</label>
                <input type="text" id="sigla" name="sigla" value="{{ old('sigla', $curso->sigla) }}" required>
            </div>

            <div class="form-group horizontal-group">
                <div class="input-block">
                    <label for="total_horas">Total de Horas:</label>
                    <input type="number" step="1" id="total_horas" name="total_horas" value="{{ old('total_horas', $curso->total_horas) }}" required>
                </div>

                <div class="input-block">
                    <label for="nivel_id">Nível:</label>
                    <select id="nivel_id" name="nivel_id" required>
                        <option value="">Selecione um nível</option>
                        @foreach($niveis as $nivel)
                            <option value="{{ $nivel->id }}" {{ (old('nivel_id', $curso->nivel_id) == $nivel->id) ? 'selected' : '' }}>
                                {{ $nivel->nome }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="input-block">
                    <label for="eixo_id">Eixo:</label>
                    <select id="eixo_id" name="eixo_id" required>
                        <option value="">Selecione um eixo</option>
                        @foreach($eixos as $eixo)
                            <option value="{{ $eixo->id }}" {{ (old('eixo_id', $curso->eixo_id) == $eixo->id) ? 'selected' : '' }}>
                                {{ $eixo->nome }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="form-actions">
                <button type="submit" class="btn-add">
                    <i class="fas fa-save"></i> Atualizar
                </button>
                <a href="{{ route('admin.cursos.index') }}" class="btn-return">
                    <i class="fas fa-times"></i> Cancelar
                </a>
            </div>
        </form>
    </div>
</body>
</html>
