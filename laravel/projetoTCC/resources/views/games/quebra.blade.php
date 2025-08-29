<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Quebra-Cabeça</title>
    <link rel="icon" href="{{asset('favicons/favicon.ico.png')}}" type="image/png">
    <link rel="icon" href="{{asset('favicons/apple-touch-icon.png')}}" type="image/png">
    <link rel="icon" href="{{asset('favicons/favicon-16x16.png')}}" type="image/png">
    <link rel="icon" href="{{asset('favicons/favicon-32x32.png')}}" type="image/png">
    
    <link href="{{asset('css/csspadrao.css')}}" rel="stylesheet">
    <link href="{{asset('css/reset.css')}}" rel="stylesheet">
    <link href="{{asset('css/cssimage.css')}}" rel="stylesheet">
    <link href="{{asset('css/quebra.css')}}" rel="stylesheet">
    <link href="{{asset('css/boneco.css')}}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;700&family=Montserrat:wght@400;600;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;700&family=Montserrat:wght@400;600;700&display=swap" rel="stylesheet">


</head>
<body class="body">
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
    
    <div class="container-meio">
        <div class="game">
            <div class="game__header">
                <h1>Quebra-Cabeça</h1>
            </div>
            <div class="game__content">
                <div class="board" id="board"></div>

                <div class="panel">
                    <div class="upload-container">
                        <label for="imageUpload" style="font-weight:600; margin-bottom:5px;">Use sua própria imagem:</label>
                        <div class="upload-btn">
                            <button class="btn-outline" style="width:100%;">
                                Escolher Arquivo
                                <input type="file" id="imageUpload" accept="image/*">
                            </button>
                        </div>
                        <small style="color:#666; text-align:center;">Ou selecione uma abaixo:</small>
                    </div>

                    <div class="controls-row">
                        <select id="imageSelect" class="btn-outline">
                            <option value="imagens/quebra.jpg">Quebra-Cabeça Padrão</option>
                            <option value="imagens/mapa.jpg">Natureza</option>
                            <option value="imagens/cores.jpg">Animais</option>
                            <option value="https://source.unsplash.com/random/600x600/?city">Cidade</option>
                            <option value="https://source.unsplash.com/random/600x600/?art">Arte</option>
                        </select>
                        <select id="levelSelect" class="btn-outline">
                            <option value="3">3x3</option>
                            <option value="4">4x4</option>
                            <option value="5">5x5</option>
                        </select>
                        <button class="btn" id="btnShuffle">Resetar</button>
                    </div>
                    <div class="tray" id="tray"></div>
                    <a href="/atividades" class="btn btn-voltar"><center>Voltar</center></a>
                </div>
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
            </div>
        </div>

        <!-- Overlay vitória -->
        <div class="overlay" id="overlay">
            <div class="modal">
                <div class="emoji">🎉</div>
                <div class="title">Parabéns!</div>
                <p>Você completou o quebra-cabeça!</p>
                <center><button class="btn" id="btnAgain">Jogar Novamente</button></center>
            </div>
        </div>
    </div>

    
    <div id="character-container">
    <img id="characterImage" src="/imagens/1.png" alt="Personagem" class="character">
    <div id="speechBubble" class="speech-bubble" style="display: none;">
        <p id="speechText"></p>
    </div>
</div>

    
    <script src="js/quebra.js"></script>

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