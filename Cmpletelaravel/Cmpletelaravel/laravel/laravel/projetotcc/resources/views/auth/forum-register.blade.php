<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Criar Conta - Fórum</title>
    
    <!--Link Favicons-->
    <link rel="icon" href="{{asset('favicons/favicon.ico') }}" type="image/x-icon">
    <link rel="icon" href="{{asset('favicons/apple-touch-icon.png')}}" type="image/png">
    <link rel="icon" href="{{asset('favicons/favicon-16x16.png')}}" type="image/png">
    <link rel="icon" href="{{asset('favicons/favicon-32x32.png')}}" type="image/png">
      
    <!--Link css-->
    <link href="{{asset('css/botoes.css')}}" rel="stylesheet">
    <link href="{{asset('css/cssimage.css')}}" rel="stylesheet">
    <link href="{{asset('css/csspadrao.css')}}" rel="stylesheet">
    <link href="{{asset('css/login/register.css')}}" rel="stylesheet">
    <link href="{{asset('css/reset.css')}}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;700&family=Montserrat:wght@400;600;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;700&family=Montserrat:wght@400;600;700&display=swap" rel="stylesheet">
</head>
<body>

<header class="div-cabecalho">
    <a href="/" class="logo">
        <span class="logo-icon"><img src="{{asset('imagens/logonome.png')}}" alt="logo" width="50%" height="50%"></span>
    </a>
        
    <ul class="nav-links">
        <li><a href="/">Início</a></li>
        <li><a href="/tutorial">Tutorial</a></li>
        <li><a href="/sobrenos">Sobre Nós</a></li>
        <li><a href="/atividades">Atividades</a></li>
        <li><a href="/convivendocomtea">Convivendo com TEA</a></li>
        <li><a href="/telaoqautismo">O que é o autismo</a></li>
    </ul>
</header>

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

    
<footer class="div-final">
    <ul class="nav-links">
        <li><a href="/">Início</a></li>
        <li><a href="/tutorial">Tutorial</a></li>
        <li><a href="/sobrenos">Sobre Nós</a></li>
        <li><a href="/atividades">Atividades</a></li>
        <li><a href="/convivendocomtea">Convivendo com TEA</a></li>
        <li><a href="/telaoqautismo">O que é o autismo</a></li>
    </ul>
    <span class="logo-icon"><img src="{{asset('favicons/apple-touch-icon.png')}}" alt="logo" width="50%" height="50%"></span>
</footer>


<script>
// Função para alternar a visibilidade da senha
function togglePasswordVisibility(inputId, toggleId) {
    const passwordInput = document.getElementById(inputId);
    const toggleButton = document.getElementById(toggleId);
    
    if (passwordInput.type === 'password') {
        passwordInput.type = 'text';
        toggleButton.textContent = 'Ocultar 🔒';
    } else {
        passwordInput.type = 'password';
        toggleButton.textContent = 'Mostrar 🔓';
    }
}

// Função para verificar a força da senha
function checkPasswordStrength(password) {
    let strength = 0;
    
    // Verificar comprimento
    if (password.length >= 8) strength += 1;
    
    // Verificar se contém letras minúsculas e maiúsculas
    if (password.match(/[a-z]/) && password.match(/[A-Z]/)) strength += 1;
    
    // Verificar se contém números
    if (password.match(/\d/)) strength += 1;
    
    // Verificar se contém caracteres especiais
    if (password.match(/[^a-zA-Z\d]/)) strength += 1;
    
    return strength;
}

// Função para atualizar o indicador de força da senha
function updatePasswordStrength() {
    const password = document.getElementById('senha').value;
    const strengthBar = document.querySelector('.password-strength-bar');
    const strengthContainer = document.querySelector('.password-strength');
    const feedback = document.querySelector('.password-feedback');
    
    const strength = checkPasswordStrength(password);
    
    // Remover todas as classes de força
    strengthContainer.classList.remove('weak', 'medium', 'strong');
    
    if (password.length === 0) {
        feedback.textContent = '';
        return;
    }
    
    if (strength <= 1) {
        strengthContainer.classList.add('weak');
        feedback.textContent = 'Senha fraca';
        feedback.style.color = '#e74c3c';
    } else if (strength <= 3) {
        strengthContainer.classList.add('medium');
        feedback.textContent = 'Senha média';
        feedback.style.color = '#f39c12';
    } else {
        strengthContainer.classList.add('strong');
        feedback.textContent = 'Senha forte';
        feedback.style.color = '#2ecc71';
    }
}

// Adicionar event listeners quando a página carregar
document.addEventListener('DOMContentLoaded', function() {
    // Adicionar botão de mostrar/ocultar senha
    const passwordInput = document.getElementById('senha');
    const passwordToggle = document.createElement('button');
    passwordToggle.type = 'button';
    passwordToggle.className = 'password-toggle';
    passwordToggle.id = 'toggleSenha';
    passwordToggle.textContent = 'Mostrar 🔓';
    passwordToggle.onclick = function() {
        togglePasswordVisibility('senha', 'toggleSenha');
    };
    
    const passwordContainer = passwordInput.parentNode;
    passwordContainer.classList.add('password-container');
    passwordContainer.appendChild(passwordToggle);
    
    // Adicionar indicador de força da senha
    const strengthIndicator = document.createElement('div');
    strengthIndicator.className = 'password-strength';
    strengthIndicator.innerHTML = '<div class="password-strength-bar"></div><div class="password-feedback"></div>';
    passwordContainer.appendChild(strengthIndicator);
    
    // Adicionar evento de input para verificar a força da senha
    passwordInput.addEventListener('input', updatePasswordStrength);
    
    // Adicionar botão de mostrar/ocultar para confirmação de senha
    const confirmPasswordInput = document.getElementById('senha_confirmation');
    const confirmPasswordToggle = document.createElement('button');
    confirmPasswordToggle.type = 'button';
    confirmPasswordToggle.className = 'password-toggle';
    confirmPasswordToggle.id = 'toggleSenhaConfirm';
    confirmPasswordToggle.textContent = 'Mostrar 🔓';
    confirmPasswordToggle.onclick = function() {
        togglePasswordVisibility('senha_confirmation', 'toggleSenhaConfirm');
    };
    
    const confirmPasswordContainer = confirmPasswordInput.parentNode;
    confirmPasswordContainer.classList.add('password-container');
    confirmPasswordContainer.appendChild(confirmPasswordToggle);
});
</script>
</body>
</html>