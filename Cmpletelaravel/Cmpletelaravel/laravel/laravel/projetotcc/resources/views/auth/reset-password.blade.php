<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Redefinir Senha - Fórum</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;700&family=Montserrat:wght@400;600;700&display=swap" rel="stylesheet">
    <style>
        /* ===== ESTILOS GERAIS ===== */
        body {
            font-family: 'Montserrat', sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            margin: 0;
            padding: 20px;
        }

        /* ===== CARTÃO DE AUTENTICAÇÃO ===== */
        .auth-card {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            border-radius: 20px;
            box-shadow: 
                0 15px 35px rgba(0, 0, 0, 0.1),
                0 5px 15px rgba(0, 0, 0, 0.07);
            padding: 2.5rem;
            max-width: 450px;
            width: 100%;
            margin: 0 auto;
            border: 1px solid rgba(255, 255, 255, 0.2);
            position: relative;
            overflow: hidden;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .auth-card:hover {
            transform: translateY(-5px);
            box-shadow: 
                0 20px 40px rgba(0, 0, 0, 0.15),
                0 8px 20px rgba(0, 0, 0, 0.1);
        }

        .auth-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 5px;
            background: linear-gradient(90deg, #FF6B6B, #FFD166, #06D6A0, #118AB2);
            background-size: 400% 100%;
            animation: gradientShift 8s ease infinite;
        }

        @keyframes gradientShift {
            0%, 100% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
        }

        /* ===== TÍTULOS E TEXTO ===== */
        h2 {
            color: #2c3e50;
            text-align: center;
            margin-bottom: 1.5rem;
            font-size: 2rem;
            font-weight: 700;
            font-family: 'Playfair Display', serif;
            position: relative;
            padding-bottom: 0.5rem;
        }

        h2::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 50%;
            transform: translateX(-50%);
            width: 60px;
            height: 3px;
            background: linear-gradient(90deg, #FF6B6B, #FFD166, #06D6A0, #118AB2);
            border-radius: 2px;
        }

        .text-muted {
            color: #6c757d !important;
            font-size: 0.95rem;
        }

        .text-center {
            text-align: center;
        }

        .mb-3, .mb-4 {
            margin-bottom: 1.5rem;
        }

        .mb-4 {
            margin-bottom: 2rem;
        }

        /* ===== FORMULÁRIO ===== */
        .form-label {
            display: block;
            margin-bottom: 0.7rem;
            font-weight: 600;
            color: #34495e;
            font-size: 0.95rem;
            transition: color 0.3s ease;
        }

        .form-control {
            width: 100%;
            padding: 0.9rem 1.2rem;
            border: 2px solid #e8ecef;
            border-radius: 12px;
            font-size: 1rem;
            transition: all 0.3s ease;
            background-color: #f8f9fa;
            font-family: 'Montserrat', sans-serif;
            box-shadow: inset 0 2px 4px rgba(0, 0, 0, 0.05);
        }

        .form-control:focus {
            outline: none;
            border-color: #667eea;
            box-shadow: 
                0 0 0 3px rgba(102, 126, 234, 0.15),
                inset 0 2px 4px rgba(0, 0, 0, 0.05);
            background-color: white;
            transform: translateY(-2px);
        }

        .form-control:valid {
            border-color: #06D6A0;
        }

        .is-invalid {
            border-color: #e74c3c !important;
        }

        .is-invalid:focus {
            box-shadow: 0 0 0 3px rgba(231, 76, 60, 0.15) !important;
        }

        /* ===== BOTÕES ===== */
        .btn {
            display: inline-block;
            font-weight: 600;
            text-align: center;
            vertical-align: middle;
            cursor: pointer;
            border: 2px solid transparent;
            padding: 0.9rem 1.5rem;
            font-size: 1rem;
            border-radius: 12px;
            transition: all 0.3s ease;
            font-family: 'Montserrat', sans-serif;
            position: relative;
            overflow: hidden;
        }

        .btn-primary {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            box-shadow: 0 4px 15px rgba(102, 126, 234, 0.3);
            border: none;
        }

        .btn-primary:hover {
            background: linear-gradient(135deg, #764ba2 0%, #667eea 100%);
            transform: translateY(-3px);
            box-shadow: 0 8px 25px rgba(102, 126, 234, 0.4);
        }

        .btn-primary:active {
            transform: translateY(-1px);
            box-shadow: 0 4px 15px rgba(102, 126, 234, 0.3);
        }

        .w-100 {
            width: 100%;
        }

        /* ===== ALERTAS ===== */
        .alert {
            padding: 1.2rem 1.5rem;
            margin-bottom: 1.5rem;
            border-radius: 12px;
            font-size: 0.95rem;
            border-left: 4px solid;
            animation: slideIn 0.4s ease-out;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            border: none;
        }

        @keyframes slideIn {
            from {
                opacity: 0;
                transform: translateY(-20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .alert-success {
            background: linear-gradient(135deg, #f0f9f4 0%, #e8f5e8 100%);
            color: #0f5132;
            border-left-color: #06D6A0;
        }

        .alert-danger {
            background: linear-gradient(135deg, #fdf2f2 0%, #fce8e8 100%);
            color: #721c24;
            border-left-color: #e74c3c;
        }

        .alert-dismissible {
            padding-right: 4rem;
        }

        .btn-close {
            position: absolute;
            top: 50%;
            right: 1.2rem;
            transform: translateY(-50%);
            background: transparent url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 16 16' fill='%23000'%3e%3cpath d='M.293.293a1 1 0 011.414 0L8 6.586 14.293.293a1 1 0 111.414 1.414L9.414 8l6.293 6.293a1 1 0 01-1.414 1.414L8 9.414l-6.293 6.293a1 1 0 01-1.414-1.414L6.586 8 .293 1.707a1 1 0 010-1.414z'/%3e%3c/svg%3e") center/1em auto no-repeat;
            border: 0;
            border-radius: 50%;
            opacity: 0.6;
            width: 1.5em;
            height: 1.5em;
            padding: 0.25em;
            transition: all 0.3s ease;
        }

        .btn-close:hover {
            opacity: 1;
            background-color: rgba(0, 0, 0, 0.1);
        }

        /* ===== LINKS ===== */
        .text-decoration-none {
            text-decoration: none;
            color: #667eea;
            font-weight: 600;
            transition: all 0.3s ease;
            position: relative;
        }

        .text-decoration-none:hover {
            color: #764ba2;
            text-decoration: none;
        }

        .text-decoration-none::after {
            content: '';
            position: absolute;
            width: 0;
            height: 2px;
            bottom: -2px;
            left: 0;
            background-color: #764ba2;
            transition: width 0.3s ease;
        }

        .text-decoration-none:hover::after {
            width: 100%;
        }

        /* ===== REQUISITOS DE SENHA ===== */
        .password-requirements {
            font-size: 0.85rem;
            color: #6c757d;
            margin-top: 0.7rem;
            padding: 0.8rem;
            background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
            border-radius: 8px;
            border-left: 4px solid #667eea;
            box-shadow: inset 0 1px 3px rgba(0, 0, 0, 0.05);
        }

        .invalid-feedback {
            display: block;
            width: 100%;
            margin-top: 0.5rem;
            font-size: 0.875rem;
            color: #e74c3c;
            font-weight: 500;
            padding-left: 0.5rem;
        }

        /* ===== CONTAINER DE SENHA ===== */
        .password-container {
            position: relative;
        }

        .password-toggle {
            position: absolute;
            right: 15px;
            top: 50%;
            transform: translateY(-50%);
            background: none;
            border: none;
            cursor: pointer;
            color: #6c757d;
            font-size: 1.1rem;
            transition: all 0.3s ease;
            z-index: 10;
            padding: 6px;
            border-radius: 6px;
            width: 35px;
            height: 35px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .password-toggle:hover {
            color: #667eea;
            background-color: rgba(102, 126, 234, 0.1);
            transform: translateY(-50%) scale(1.1);
        }

        .password-container .form-control {
            padding-right: 50px;
        }

        /* ===== ANIMAÇÃO DE ENTRADA ===== */
        .container {
            animation: fadeInUp 0.8s ease-out;
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* ===== RESPONSIVIDADE ===== */
        @media (max-width: 768px) {
            body {
                padding: 15px;
            }
            
            .auth-card {
                padding: 2rem;
                margin: 1rem auto;
            }
            
            h2 {
                font-size: 1.7rem;
            }
        }

        @media (max-width: 480px) {
            .auth-card {
                padding: 1.5rem;
                border-radius: 15px;
            }
            
            h2 {
                font-size: 1.5rem;
            }
            
            .form-control {
                padding: 0.8rem 1rem;
            }
            
            .btn {
                padding: 0.8rem 1.2rem;
            }
            
            .password-container .form-control {
                padding-right: 45px;
            }
        }

        /* ===== ACESSIBILIDADE ===== */
        button:focus, 
        a:focus, 
        input:focus {
            outline: 3px solid rgba(102, 126, 234, 0.5);
            outline-offset: 2px;
        }

        /* Redução de movimento */
        @media (prefers-reduced-motion: reduce) {
            * {
                animation-duration: 0.01ms !important;
                animation-iteration-count: 1 !important;
                transition-duration: 0.01ms !important;
            }
            
            .auth-card::before {
                animation: none;
                background: #667eea;
            }
            
            .auth-card:hover {
                transform: none;
            }
        }

        /* ===== ESTADO DE CARREGAMENTO ===== */
        .btn-loading {
            position: relative;
            color: transparent !important;
        }

        .btn-loading::after {
            content: '';
            position: absolute;
            width: 20px;
            height: 20px;
            top: 50%;
            left: 50%;
            margin: -10px 0 0 -10px;
            border: 2px solid transparent;
            border-top: 2px solid #ffffff;
            border-radius: 50%;
            animation: spin 1s linear infinite;
        }

        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
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

            <form method="POST" action="{{ route('forum.password.update') }}" id="passwordForm">
                @csrf
                
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control @error('email') is-invalid @enderror" 
                           id="email" name="email" value="{{ old('email') }}" required autofocus>
                    @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3 password-container">
                    <label for="password" class="form-label">Nova Senha</label>
                    <input type="password" class="form-control @error('password') is-invalid @enderror" 
                           id="password" name="password" required>
                    <button type="button" class="password-toggle" id="togglePassword">👁️</button>
                    @error('password')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                    <div class="password-requirements">
                        A senha deve ter pelo menos 6 caracteres
                    </div>
                </div>

                <div class="mb-3 password-container">
                    <label for="password_confirmation" class="form-label">Confirmar Nova Senha</label>
                    <input type="password" class="form-control" 
                           id="password_confirmation" name="password_confirmation" required>
                    <button type="button" class="password-toggle" id="togglePasswordConfirmation">👁️</button>
                </div>

                <button type="submit" class="btn btn-primary w-100 mb-3" id="submitBtn">Redefinir Senha</button>

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
            // Função para alternar visibilidade
            function togglePasswordVisibility(inputId, toggleButton) {
                const input = document.getElementById(inputId);
                if (input.type === 'password') {
                    input.type = 'text';
                    toggleButton.textContent = '🔒';
                    toggleButton.setAttribute('aria-label', 'Ocultar senha');
                } else {
                    input.type = 'password';
                    toggleButton.textContent = '👁️';
                    toggleButton.setAttribute('aria-label', 'Mostrar senha');
                }
            }

            // Configurar botões de mostrar/ocultar
            const togglePassword = document.getElementById('togglePassword');
            const togglePasswordConfirmation = document.getElementById('togglePasswordConfirmation');

            if (togglePassword) {
                togglePassword.addEventListener('click', function() {
                    togglePasswordVisibility('password', togglePassword);
                });
            }

            if (togglePasswordConfirmation) {
                togglePasswordConfirmation.addEventListener('click', function() {
                    togglePasswordVisibility('password_confirmation', togglePasswordConfirmation);
                });
            }

            // Estado de carregamento do formulário
            const form = document.getElementById('passwordForm');
            const submitBtn = document.getElementById('submitBtn');

            if (form && submitBtn) {
                form.addEventListener('submit', function() {
                    submitBtn.classList.add('btn-loading');
                    submitBtn.disabled = true;
                });
            }

            // Validação em tempo real da confirmação de senha
            const passwordInput = document.getElementById('password');
            const confirmPasswordInput = document.getElementById('password_confirmation');

            if (passwordInput && confirmPasswordInput) {
                confirmPasswordInput.addEventListener('input', function() {
                    if (passwordInput.value !== confirmPasswordInput.value) {
                        confirmPasswordInput.classList.add('is-invalid');
                    } else {
                        confirmPasswordInput.classList.remove('is-invalid');
                    }
                });
            }
        });
    </script>
</body>
</html>