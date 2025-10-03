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
    <link href="{{asset('css/boneco.css')}}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;700&family=Montserrat:wght@400;600;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;700&family=Montserrat:wght@400;600;700&display=swap" rel="stylesheet">

</head>
<body>
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
    
    <!-- Assistente flutuante - SEMPRE VISÍVEL -->
    <div class="assistant" id="assistant">
        <img src="/imagens/1.png" alt="Assistente" id="assistantImg">
        <div class="assistant-speech" id="assistantSpeech">Olá! Posso te ajudar?</div>
    </div>
    
    <center>
        <div class="game-container">
            <div class="game-header">
                <div class="header-controls">
                    <button class="control-btn" id="btnSound">
                        <svg id="soundIcon" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <polygon points="11 5 6 9 2 9 2 15 6 15 11 19 11 5"></polygon>
                            <path d="M19.07 4.93a10 10 0 0 1 0 14.14M15.54 8.46a5 5 0 0 1 0 7.07"></path>
                        </svg>
                        <span class="btn-tooltip">Ativar/Desativar Som</span>
                    </button>
                </div>
                <h2>Jogo das Cores</h2>
                <div style="width: 40px;"></div> <!-- Espaçador para centralizar o título -->
            </div>
            
            <div class="game-content">
                
                <div class="target-display">
                    Encontre a cor: <span id="targetColor" class="target-color"></span>
                </div>
                
                <div class="colors-grid" id="buttons"></div>
            </div>

            <div class="game-footer">
                <a href="/atividades" class="btn-voltar">Voltar</a>
            </div>
        </div>

        <div class="message" id="message">
            <div class="message-content">
                <div id="victoryContainer" class="victory-container hidden">
                    <div class="assistant-in-message">
                        <img src="/imagens/3.png" alt="Assistente Feliz">
                    </div>
                    <div class="victory-title">Vitória!</div>
                    <div class="victory-text" id="victoryText"></div>
                </div>
                
                <div id="standardMessage">
                    <div class="assistant-in-message">
                        <img src="/imagens/4.png" alt="Assistente Pensativo">
                    </div>
                    <div class="error-title">Tente Novamente</div>
                    <div class="message-text" id="messageText"></div>
                </div>
                
                <div class="message-buttons">
                    <button class="message-btn" id="btnJogarNovamente">Jogar Novamente</button>
                </div>
            </div>
        </div>
    </center>

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

    <script src="/js/cores.js"></script>
</body>
</html>