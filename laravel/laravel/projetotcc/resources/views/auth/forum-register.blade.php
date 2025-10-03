<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Criar Conta - Fórum</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
            min-height: 100vh;
            display: flex;
            align-items: center;
        }
        .auth-card {
            background: white;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0,0,0,0.1);
            padding: 2rem;
            max-width: 400px;
            width: 100%;
            margin: 0 auto;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="auth-card">
            <h2 class="text-center mb-4">Criar Conta</h2>

            @if($errors->any())
                <div class="alert alert-danger">
                    Sua Senha deve ter pelo menos 6 caracteres
                </div>
            @endif

            <form method="POST" action="{{ route('forum.register.submit') }}">
                @csrf
                
                <div class="mb-3">
                    <label for="nome" class="form-label">Nome</label>
                    <input type="text" class="form-control" id="nome" name="nome" 
                           value="{{ old('nome') }}" required autofocus>
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" name="email" 
                           value="{{ old('email') }}" required>
                </div>

                <div class="mb-3">
                    <label for="senha" class="form-label">Senha</label>
                    <input type="password" class="form-control" id="senha" name="senha" required>
                </div>

                <div class="mb-3">
                    <label for="senha_confirmation" class="form-label">Confirmar Senha</label>
                    <input type="password" class="form-control" id="senha_confirmation" 
                           name="senha_confirmation" required>
                </div>

                <button type="submit" class="btn btn-primary w-100 mb-3">Criar Conta</button>

                <div class="text-center">
                    <p>Já tem uma conta? 
                        <a href="{{ route('forum.login') }}">Fazer login</a>
                    </p>
                </div>
            </form>
        </div>
    </div>
</body>
</html>