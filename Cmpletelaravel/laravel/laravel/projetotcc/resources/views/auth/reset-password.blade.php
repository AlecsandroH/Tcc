<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Redefinir Senha - Fórum</title>
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
        .password-requirements {
            font-size: 0.875rem;
            color: #6c757d;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="auth-card">
            <h2 class="text-center mb-4">Redefinir Senha</h2>
            <p class="text-muted text-center mb-4">Digite seu email e sua nova senha</p>

            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif

            @if($errors->any())
                <div class="alert alert-danger">
                    @foreach($errors->all() as $error)
                        <p class="mb-0">{{ $error }}</p>
                    @endforeach
                </div>
            @endif

            <form method="POST" action="{{ route('forum.password.update') }}">
                @csrf
                
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control @error('email') is-invalid @enderror" 
                           id="email" name="email" value="{{ old('email') }}" required autofocus>
                    @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label">Nova Senha</label>
                    <input type="password" class="form-control @error('password') is-invalid @enderror" 
                           id="password" name="password" required>
                    @error('password')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                    <div class="password-requirements">
                        A senha deve ter pelo menos 6 caracteres
                    </div>
                </div>

                <div class="mb-3">
                    <label for="password_confirmation" class="form-label">Confirmar Nova Senha</label>
                    <input type="password" class="form-control" 
                           id="password_confirmation" name="password_confirmation" required>
                </div>

                <button type="submit" class="btn btn-primary w-100 mb-3">Redefinir Senha</button>

                <div class="text-center">
                    <a href="{{ route('forum.login') }}" class="text-decoration-none">← Voltar para o login</a>
                </div>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Auto-dismiss alerts after 5 seconds
        setTimeout(() => {
            const alerts = document.querySelectorAll('.alert');
            alerts.forEach(alert => {
                const bsAlert = new bootstrap.Alert(alert);
                bsAlert.close();
            });
        }, 5000);

        // Mostrar/ocultar senha
        document.addEventListener('DOMContentLoaded', function() {
            const passwordInputs = document.querySelectorAll('input[type="password"]');
            passwordInputs.forEach(input => {
                const toggleButton = document.createElement('button');
                toggleButton.type = 'button';
                toggleButton.innerHTML = '👁️';
                toggleButton.style.background = 'none';
                toggleButton.style.border = 'none';
                toggleButton.style.position = 'absolute';
                toggleButton.style.right = '10px';
                toggleButton.style.top = '50%';
                toggleButton.style.transform = 'translateY(-50%)';
                toggleButton.style.cursor = 'pointer';
                
                const inputWrapper = input.parentElement;
                inputWrapper.style.position = 'relative';
                input.style.paddingRight = '40px';
                
                toggleButton.addEventListener('click', function() {
                    if (input.type === 'password') {
                        input.type = 'text';
                        toggleButton.innerHTML = '🔒';
                    } else {
                        input.type = 'password';
                        toggleButton.innerHTML = '👁️';
                    }
                });
                
                inputWrapper.appendChild(toggleButton);
            });
        });
    </script>
</body>
</html>