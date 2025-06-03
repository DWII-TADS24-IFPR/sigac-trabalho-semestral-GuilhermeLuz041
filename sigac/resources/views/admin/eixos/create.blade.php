<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adicionar Eixo</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
</head>
<body>
    <div class="page-container">

        <div class="actions-top">
            <a href="{{ route('admin.eixos.index') }}" class="btn-return">
                <i class="fas fa-arrow-left"></i> Voltar para Lista
            </a>
        </div>

        <h1 class="page-title">Adicionar Novo Eixo</h1>

        @if ($errors->any())
            <div class="error-message">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        
        <form method="POST" action="{{ route('eixos.store') }}" class="form-eixo">
            @csrf

            <div class="form-group">
                <label for="nome">Nome do Eixo:</label>
                <input type="text" id="nome" name="nome" value="{{ old('nome') }}" required>
            </div>

            <div class="form-actions">
                <button type="submit" class="btn-add">
                    <i class="fas fa-save"></i> Salvar
                </button>
                <a href="{{ route('admin.eixos.index') }}" class="btn-return">
                    <i class="fas fa-times"></i> Cancelar
                </a>
            </div>
        </form>
    </div>
</body>
</html>
