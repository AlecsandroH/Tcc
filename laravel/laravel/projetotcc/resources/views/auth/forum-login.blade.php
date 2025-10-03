<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Fórum</title>

    <!--Link Favicons-->
    <link rel="icon" href="{{asset('favicons/favicon.ico') }}" type="image/x-icon">
    <link rel="icon" href="{{asset('favicons/apple-touch-icon.png')}}" type="image/png">
    <link rel="icon" href="{{asset('favicons/favicon-16x16.png')}}" type="image/png">
    <link rel="icon" href="{{asset('favicons/favicon-32x32.png')}}" type="image/png">
      
    <!--Link css-->
    <link href="{{asset('css/botoes.css')}}" rel="stylesheet">
    <link href="{{asset('css/cssimage.css')}}" rel="stylesheet">
    <link href="{{asset('css/csspadrao.css')}}" rel="stylesheet">
    <link href="{{asset('css/login.css')}}" rel="stylesheet">
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

<div class="div-meio">
    <div class="container">
        <div class="auth-card">
            <h2 class="text-center mb-4">Login do Fórum</h2>

            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            @if($errors->any())
                <div class="alert alert-danger">
                    @foreach($errors->all() as $error)
                        <p>{{ $error }}</p>
                    @endforeach
                </div>
            @endif

            <form method="POST" action="{{ route('forum.login.submit') }}">
                @csrf
                
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" name="email" 
                           value="{{ old('email') }}" required autofocus>
                </div>

                <div class="mb-3">
                    <label for="senha" class="form-label">Senha</label>
                    <input type="password" class="form-control" id="senha" name="senha" required>
                </div>

                <button type="submit" class="btn btn-primary w-100 mb-3">Entrar</button>

                <div class="text-center mb-3">
    <a href="{{ route('forum.password.request') }}" class="text-decoration-none">
        Esqueci minha senha
    </a>
</div>


                <div class="text-center">
                    <p>Não tem uma conta? 
                        <a href="{{ route('forum.register') }}">Criar conta</a>
                    </p>
                </div>
            </form>
        </div>
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
</body>
</html>
