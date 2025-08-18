<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jogo da Memória</title>
        <link rel="icon" href="{{asset('favicons/favicon.ico.png')}}" type="image/png">
    <link rel="icon" href="{{asset('favicons/apple-touch-icon.png')}}" type="image/png">
    <link rel="icon" href="{{asset('favicons/favicon-16x16.png')}}" type="image/png">
    <link rel="icon" href="{{asset('favicons/favicon-32x32.png')}}" type="image/png">
    
    <link href="{{asset('css/csspadrao.css')}}" rel="stylesheet">
    <link href="{{asset('css/reset.css')}}" rel="stylesheet">
    <link href="{{asset('css/cssimage.css')}}" rel="stylesheet">
     <link href="{{asset('css/memoria.css')}}" rel="stylesheet">

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
    <div class="conteiner-meio">
    <div class="game-container">
        <div class="game-header">
            <h2>Jogo da Memória</h2>
        </div>
        
        <div class="game-content">
            <div class="memory-board" id="board"></div>
            
            <div class="win-message" id="winMessage">
                <div class="win-text">Parabéns! Você venceu!</div>
                <button class="btn-jogar-novamente" id="btnJogarNovamente">Jogar Novamente</button>
            </div>
        </div>
        
        <div class="game-footer">
            <div class="details-container">
                <details>
                    <summary>Como jogar?</summary>
                    <div class="details-content">
                        <p>Encontre todos os pares de cartas iguais virando duas cartas por vez.</p>
                        <p>Se as cartas forem iguais, elas desaparecem. Se forem diferentes, elas viram de volta.</p>
                    </div>
                </details>

                <details>
                    <summary>Qual o objetivo?</summary>
                    <div class="details-content">
                        <p>Este jogo ajuda a desenvolver a memória visual e é especialmente útil para crianças com TEA.</p>
                    </div>
                </details>
            </div>
            
            <a href="/atividades" class="btn-voltar">Voltar</a>
        </div>
    </div>
 </div>

    <script src="js/memoria.js"></script>

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