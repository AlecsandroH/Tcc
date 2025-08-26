<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jogo das Cores</title>
    <link rel="icon" href="{{asset('favicons/favicon.ico.png')}}" type="image/png">
    <link rel="icon" href="{{asset('favicons/apple-touch-icon.png')}}" type="image/png">
    <link rel="icon" href="{{asset('favicons/favicon-16x16.png')}}" type="image/png">
    <link rel="icon" href="{{asset('favicons/favicon-32x32.png')}}" type="image/png">
    
    <link href="{{asset('css/csspadrao.css')}}" rel="stylesheet">
    <link href="{{asset('css/reset.css')}}" rel="stylesheet">
    <link href="{{asset('css/cssimage.css')}}" rel="stylesheet">
    <link href="{{asset('css/cores.css')}}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;700&family=Montserrat:wght@400;600;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;700&family=Montserrat:wght@400;600;700&display=swap" rel="stylesheet">


</head>
<body>
    <header class="div-cabecalho">
        <a href="/" class="logo">
            <span class="logo-icon"><img src="favicons/apple-touch-icon.png" alt="logo" width="50%" height="50%"></span>
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
    
    <center>
        <div class="game-container">
            <div class="game-header">
                <h2>Jogo das Cores</h2>
            </div>
            
            <div class="game-content">
                <div class="target-display">
                    Encontre a cor: <span id="targetColor" class="target-color"></span>
                </div>
                
                <div class="colors-grid" id="buttons"></div>
            </div>
            
            <div class="game-footer">
                <div class="details-container">
                    <details>
                        <summary>Como jogar?</summary>
                        <div class="details-content">
                            <p>O jogo vai pedir para você encontrar uma cor específica. Clique no quadrado que corresponde à cor solicitada. Se acertar, você ganha! Se errar, tente novamente.</p>
                            <p>Este jogo ajuda no reconhecimento de cores e é especialmente útil para crianças com TEA.</p>
                        </div>
                    </details>
                    <details>
                        <summary>Para o que serve o Jogo?</summary>
                        <div class="details-content">
                            <p>texto</p>
                            <p>trexto.</p>
                        </div>
                    </details>
                </div>
                
                <a href="/atividades" class="btn-voltar">Voltar</a>
            </div>
        </div>

        <div class="message" id="message">
            <div class="message-content">
                <span class="message-emoji" id="messageEmoji"></span>
                <div class="message-text" id="messageText"></div>
                <div class="message-buttons">
                    <button class="message-btn" id="btnJogarNovamente">Jogar Novamente</button>
                </div>
            </div>
        </div>
    </center>

    <script src="js/cores.js"></script>
    
    <footer class="div-final">
        <ul class="nav-links">
            <li><a href="/">Início</a></li>
            <li><a href="/tutorial">Tutorial</a></li>
            <li><a href="/sobrenos">Sobre nós</a></li>
            <li><a href="/atividades">Atividades</a></li>
            <li><a href="/convivendocomtea">Convivendo com TEA</a></li>
            <li><a href="/telaoqautismo">O que é o autismo</a></li>
        </ul>

        <span class="logo-icon"><img src="favicons/apple-touch-icon.png" alt="logo" width="50%" height="50%"></span>
    </footer>
</body>
</html>