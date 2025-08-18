<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Caça ao Tesouro</title>

    <link rel="icon" href="{{asset('favicons/favicon.ico.png')}}" type="image/png">
    <link rel="icon" href="{{asset('favicons/apple-touch-icon.png')}}" type="image/png">
    <link rel="icon" href="{{asset('favicons/favicon-16x16.png')}}" type="image/png">
    <link rel="icon" href="{{asset('favicons/favicon-32x32.png')}}" type="image/png">
    
    <link href="{{asset('css/csspadrao.css')}}" rel="stylesheet">
    <link href="{{asset('css/reset.css')}}" rel="stylesheet">
    <link href="{{asset('css/cssimage.css')}}" rel="stylesheet">
     <link href="{{asset('css/objetos.css')}}" rel="stylesheet">
</head>
<body>


<header class="div-cabecalho">
        <a href="/" class="logo">
            <span class="logo-icon"><img src="favicons/apple-touch-icon.png" alt="logo" width="50%" height="50%"></span>
        </a>
        
        <ul class="nav-links">
            <li><a href="/">Início</a></li>
            <li><a href="#">Tutorial</a></li>
            <li><a href="/sobrenos">Sobre nós</a></li>
            <li><a href="/atividades">Atividades</a></li>
            <li><a href="/convivendocomtea">Convivendo com TEA</a></li>
            <li><a href="/telaoqautismo">O que é o autismo</a></li>
        </ul>

</header>
    <div class="container-meio">
    <div class="game-container">
        <div class="game-header">
            <h2>Caça ao Tesouro</h2>
        </div>
        
        <div class="game-content">
            <div class="target-display">
                Encontre: <span id="target"></span>
            </div>
            <div id="objects"></div>
        </div>
        
        <div class="game-footer">
            <div class="details-container">
                <details>
                    <summary>Como jogar?</summary>
                    <div class="details-content">
                        <p>Encontre o objeto indicado no mapa do tesouro!</p>
                        <p>Clique nos objetos espalhados pelo mapa até encontrar o correto.</p>
                        <p>Este jogo ajuda no desenvolvimento da atenção e percepção visual.</p>
                    </div>
                </details>

                <details>
                    <summary>Objetivo</summary>
                    <div class="details-content">
                        <p>Este jogo ajuda no desenvolvimento da atenção e percepção visual.</p>
                    </div>
                </details>
            </div>
            
            <a href="/atividades" class="btn-voltar">Voltar</a>
        </div>
    </div>

    <div class="win-message" id="winMessage">
        <div class="win-content">
            <div class="win-emoji">🏆</div>
            <div class="win-text">Tesouro Encontrado!</div>
            <button class="btn-voltar" id="btnJogarNovamente" style="margin-top: 20px;">Jogar Novamente</button>
        </div>
    </div>

    <script src="js/objetos.js"></script>

</div>

        <footer class="div-final">

        <ul class="nav-links">
            <li><a href="/">Início</a></li>
            <li><a href="#">Tutorial</a></li>
            <li><a href="#">Sobre agente</a></li>
            <li><a href="/atividades">Atividades</a></li>
            <li><a href="/convivendocomtea">Convivendo com TEA</a></li>
            <li><a href="/telaoqautismo">O que é o autismo</a></li>
        </ul>


            <span class="logo-icon"><img src="favicons/apple-touch-icon.png" alt="logo" width="50%" height="50%"></span>
        
</footer>
</body>
</html>