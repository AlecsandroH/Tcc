<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Atividades</title>

    <link rel="icon" href="{{asset('favicons/favicon.ico.png')}}" type="image/png">
    <link rel="icon" href="{{asset('favicons/apple-touch-icon.png')}}" type="image/png">
    <link rel="icon" href="{{asset('favicons/favicon-16x16.png')}}" type="image/png">
    <link rel="icon" href="{{asset('favicons/favicon-32x32.png')}}" type="image/png">
      

    <link href="{{asset('css/csspadrao.css')}}" rel="stylesheet">
    <link href="{{asset('css/reset.css')}}" rel="stylesheet">
    <link href="{{asset('css/cssimage.css')}}" rel="stylesheet">
    <link href="{{asset('css/atividades.css')}}" rel="stylesheet">
    <link href="{{asset('css/textos.css')}}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;700&family=Montserrat:wght@400;600;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;700&family=Montserrat:wght@400;600;700&display=swap" rel="stylesheet">



    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">


<header class="div-cabecalho">
        <a href="/" class="logo">
     <span class="logo-icon"><img src="imagens/testelogonome.png" alt="logo" width="50%" height="50%"></span>
        </a>
        
        <ul class="nav-links">
            <li><a href="/">Início</a></li>
            <li><a href="/tutorial">Tutorial</a></li>
            <li><a href="/sobrenos">Sobre nós</a></li>
            <li><a href="/atividades">Atividades</a></li>
            <li><a href="/convivendocomtea">Convivendo com TEA</a></li>
            <li><a href="/telaoqautismo">O que é o autismo</a></li>
        </ul>

</header>

<div class="container mt-5">
    <div class="games-carousel">
        <h1 class="text-center games-title">Jogos Educativos para Crianças com TEA</h1>

        <div id="carouselGames" class="carousel slide" data-bs-ride="carousel" data-bs-interval="5000">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselGames" data-bs-slide-to="0" class="active"></button>
                <button type="button" data-bs-target="#carouselGames" data-bs-slide-to="1"></button>
                <button type="button" data-bs-target="#carouselGames" data-bs-slide-to="2"></button>
                <button type="button" data-bs-target="#carouselGames" data-bs-slide-to="3"></button>
            </div>
            
            <div class="carousel-inner">
                <!-- Jogo 1 -->
                <div class="carousel-item active">
                    <div class="game-card">
                        <img src="{{ asset('imagens/cores.jpg') }}" class="d-block w-100 game-img" alt="Jogo das Cores">
                        <div class="game-body">
                            <h4 class="game-title">Jogo das Cores</h4>
                            <p class="textos-var2">Aprenda cores de forma divertida</p>
                            <br/>
                            <a href="{{ route('jogo.cores') }}" class="btn play-btn"><span class="textos-var2">Jogar Agora</span></a>
                        </div>
                    </div>
                </div>
                
                <!-- Jogo 2 -->
                <div class="carousel-item">
                    <div class="game-card">
                        <img src="{{ asset('imagens/memoria.jpg') }}" class="d-block w-100 game-img" alt="Jogo da Memória">
                        <div class="game-body">
                            <h4 class="game-title">Jogo da Memória</h4>
                            <p class="textos-var2">Desenvolva sua memória visual</p>
                            <br/>
                            <a href="{{ route('jogo.memoria') }}" class="btn play-btn"><span class="textos-var2">Jogar Agora</span></a>
                        </div>
                    </div>
                </div>
                
                <!-- Jogo 3 -->
                <div class="carousel-item">
                    <div class="game-card">
                        <img src="{{ asset('imagens/objetos.jpg') }}" class="d-block w-100 game-img" alt="Caça ao Objeto">
                        <div class="game-body">
                            <h4 class="game-title">Caça ao Objeto</h4>
                            <p class="textos-var2">Encontre os objetos escondidos</p>
                            <a href="{{ route('jogo.objetos') }}" class="btn play-btn">Jogar Agora</a>
                        </div>
                    </div>
                </div>
                
                <!-- Jogo 4 -->
                <div class="carousel-item">
                    <div class="game-card">
                        <img src="{{ asset('imagens/quebra.jpg') }}" class="d-block w-100 game-img" alt="Quebra-Cabeça">
                        <div class="game-body">
                            <h4 class="game-title">Quebra-Cabeça</h4>
                            <p class="font">Monte peças e divirta-se</p>
                            <a href="{{ route('jogo.quebra') }}" class="btnplay-btn">Jogar Agora</a>
                        </div>
                    </div>
                </div>
            </div>
            
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselGames" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Anterior</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselGames" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Próximo</span>
            </button>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>


    <footer class="div-final">

        <ul class="nav-links">
            <li><a href="/">Início</a></li>
            <li><a href="/tutorial">Tutorial</a></li>
            <li><a href="/sobrenos">Sobre Nós</a></li>
            <li><a href="/atividades">Atividades</a></li>
            <li><a href="/convivendocomtea">Convivendo com TEA</a></li>
            <li><a href="/telaoqautismo">O que é o autismo</a></li>
        </ul>


            <span class="logo-icon"><img src="favicons/apple-touch-icon.png" alt="logo" width="50%" height="50%"></span>
        
</footer>
    
</body>
</html>