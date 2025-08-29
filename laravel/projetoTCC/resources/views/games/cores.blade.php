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

    <style>
        .game-container {
            max-width: 800px;
            width: 100%;
            background: white;
            margin-top: 10px;
            margin-bottom: 50px;
            border-radius: 20px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            justify-content: center;
            align-items: center;
            
        }

        .game-header {
            background: linear-gradient(90deg, #4c5baf, #4a66c3);
            color: white;
            padding: 20px;
            text-align: center;
            position: relative;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .game-header h2 {
            margin: 0;
            font-size: 28px;
            font-weight: 600;
            flex: 1;
            text-align: center;
        }

        .header-controls {
            display: flex;
            gap: 15px;
        }

        .control-btn {
            background: rgba(255, 255, 255, 0.2);
            border: none;
            border-radius: 50%;
            width: 40px;
            height: 40px;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .control-btn:hover {
            background: rgba(255, 255, 255, 0.3);
            transform: scale(1.1);
        }

        .control-btn img {
            width: 24px;
            height: 24px;
        }

        .game-content {
            padding: 30px;
            text-align: center;
        }

        .target-display {
            font-size: 24px;
            margin-bottom: 30px;
            color: #333;
        }

        .target-color {
            font-weight: bold;
            text-transform: uppercase;
            padding: 5px 10px;
            border-radius: 5px;
            background: #f0f0f0;
        }

        .colors-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 15px;
            margin-bottom: 30px;
        }

        .color-btn {
            height: 100px;
            border: none;
            border-radius: 15px;
            cursor: pointer;
            transition: all 0.3s ease;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
            position: relative;
            overflow: hidden;
        }

        .color-btn:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 15px rgba(0,0,0,0.2);
        }

        .color-btn::after {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(255,255,255,0.3);
            opacity: 0;
            transition: opacity 0.3s;
        }

        .color-btn:hover::after {
            opacity: 1;
        }

        .game-footer {
            background: #f9f9f9;
            padding: 20px;
            border-top: 1px solid #eee;
        }

        .btn-voltar {
            background: linear-gradient(135deg, #4c56af, #4a60c3);
            color: white;
            border: none;
            padding: 12px 25px;
            border-radius: 50px;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            box-shadow: 0 4px 10px rgba(76, 86, 175, 0.3);
            display: inline-block;
            text-decoration: none;
        }

        .btn-voltar:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 15px rgba(76, 78, 175, 0.4);
        }

        .red { background-color: #FF5252; }
        .blue { background-color: #4285F4; }
        .green { background-color: #4CAF50; }
        .yellow { background-color: #FFD600; }
        .purple { background-color: #9C27B0; }
        .orange { background-color: #FF9800; }
        .pink { background-color: #E91E63; }
        .teal { background-color: #009688; }
        .cyan { background-color: #00BCD4; }
        .lime { background-color: #CDDC39; }
        .brown { background-color: #795548; }
        .gray { background-color: #9E9E9E; }

        @media (max-width: 768px) {
            .colors-grid {
                grid-template-columns: repeat(3, 1fr);
            }
        }

        @media (max-width: 480px) {
            .colors-grid {
                grid-template-columns: repeat(2, 1fr);
            }
            
            .game-content {
                padding: 20px;
            }
        }
        
        .message {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(0, 0, 0, 0.8);
            display: flex;
            justify-content: center;
            align-items: center;
            visibility: hidden;
            opacity: 0;
            transition: all 0.3s ease;
            z-index: 2000;
        }

        .message.active {
            opacity: 1;
            visibility: visible;
        }

        .message-content {
            background: white;
            padding: 30px;
            border-radius: 15px;
            text-align: center;
            max-width: 500px;
            width: 90%;
            transform: scale(0.9);
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }

        .message.active .message-content {
            transform: scale(1);
        }

        .message.win .message-content {
            background: linear-gradient(135deg, #f6f9fc, #e3f2fd);
            border: 5px solid #4CAF50;
            box-shadow: 0 10px 30px rgba(76, 175, 80, 0.3);
        }

        .message.error .message-content {
            background: linear-gradient(135deg, #fef7f7, #ffebee);
            border: 5px solid #FF5252;
            box-shadow: 0 10px 30px rgba(255, 82, 82, 0.3);
        }

        .message-character {
            width: 120px;
            height: 120px;
            margin: 0 auto 15px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .message-character img {
            max-width: 100%;
            max-height: 100%;
        }

        .message-text {
            font-size: 22px;
            margin-bottom: 25px;
            color: #333;
            font-weight: 600;
        }

        .message-buttons {
            display: flex;
            gap: 10px;
            justify-content: center;
        }

        .message-btn {
            padding: 12px 25px;
            border-radius: 50px;
            border: none;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            background: linear-gradient(135deg, #4c5eaf, #4a60c3);
            color: white;
            box-shadow: 0 4px 10px rgba(76, 86, 175, 0.3);
        }

        .message-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 15px rgba(76, 78, 175, 0.4);
        }

        .message-btn.hidden {
            display: none;
        }

        .confetti {
            position: absolute;
            width: 10px;
            height: 10px;
            background-color: #f0f;
            opacity: 0.8;
            border-radius: 0;
        }

        @keyframes confetti-fall {
            0% {
                transform: translateY(-100px) rotate(0deg);
                opacity: 1;
            }
            100% {
                transform: translateY(500px) rotate(360deg);
                opacity: 0;
            }
        }

        .win-title {
            font-size: 28px;
            color: #4CAF50;
            margin-bottom: 15px;
            font-weight: 700;
        }

        .info-modal {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(0, 0, 0, 0.8);
            display: flex;
            justify-content: center;
            align-items: center;
            visibility: hidden;
            opacity: 0;
            transition: all 0.3s ease;
            z-index: 2000;
        }

        .info-modal.active {
            opacity: 1;
            visibility: visible;
        }

        .info-content {
            background: white;
            padding: 30px;
            border-radius: 15px;
            max-width: 600px;
            width: 90%;
            transform: scale(0.9);
            transition: all 0.3s ease;
            position: relative;
        }

        .info-modal.active .info-content {
            transform: scale(1);
        }

        .info-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }

        .info-title {
            font-size: 24px;
            color: #4c5baf;
            margin: 0;
        }

        .close-btn {
            background: none;
            border: none;
            font-size: 24px;
            cursor: pointer;
            color: #999;
        }

        .info-body {
            display: flex;
            gap: 20px;
            align-items: center;
        }

        .info-character {
            flex: 0 0 150px;
        }

        .info-character img {
            max-width: 100%;
        }

        .info-text {
            flex: 1;
            font-size: 16px;
            line-height: 1.6;
            color: #333;
        }

        .info-speech {
            background: #f0f5ff;
            padding: 15px;
            border-radius: 10px;
            margin-top: 15px;
            position: relative;
        }

        .info-speech:after {
            content: '';
            position: absolute;
            bottom: -10px;
            left: 20px;
            border-width: 10px 10px 0;
            border-style: solid;
            border-color: #f0f5ff transparent transparent transparent;
        }

        @media (max-width: 768px) {
            .info-body {
                flex-direction: column;
            }
            
            .info-character {
                flex: 0 0 auto;
            }
        }

        @media (max-width: 480px) {
            .message-buttons {
                flex-direction: column;
            }
            
            .message-btn {
                width: 100%;
            }
        }
    </style>
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
    
    <center>
        <div class="game-container">
            <div class="game-header">
                <div class="header-controls">
                    <button class="control-btn" id="btnInfo">
                        <img src="data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSIyNCIgaGVpZ2h0PSIyNCIgdmlld0JveD0iMCAwIDI0IDI0IiBmaWxsPSJub25lIiBzdHJva2U9ImN1cnJlbnRDb2xvciIgc3Ryb2tlLXdpZHRoPSIyIiBzdHJva2UtbGluZWNhcD0icm91bmQiIHN0cm9rZS1saW5lam9pbj0icm91bmQiPjxjaXJjbGUgY3g9IjEyIiBjeT0iMTIiIHI9IjEwIj48L2NpcmNsZT48bGluZSB4MT0iMTIiIHkxPSIxNiIgeDI9IjEyIiB5Mj0iMTIiPjwvbGluZT48bGluZSB4MT0iMTIiIHkxPSI4IiB4Mj0iMTIuMDEiIHkyPSI4Ij48L2xpbmU+PC9zdmc+" alt="Informações">
                    </button>
                    <button class="control-btn" id="btnSound">
                        <img src="data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSIyNCIgaGVpZ2h0PSIyNCIgdmlld0JveD0iMCAwIDI0IDI0IiBmaWxsPSJub25lIiBzdHJva2U9ImN1cnJlbnRDb2xvciIgc3Ryb2tlLXdpZHRoPSIyIiBzdHJva2UtbGluZWNhcD0icm91bmQiIHstcm9rZS1saW5lam9pbj0icm91bmQiPjxwb2x5Z29uIHBvaW50cz0iMTEgNSA2IDkgMiA5IDIgMTUgNiAxNSAxMSAxOSAxMSA1Ij48L3BvbHlnb24+PHBhdGggZD0iTTE5LjA3IDQuOTNhMTAgMTAgMCAwIDEgMCAxNC4xNE0xNS41NCA4LjQ2YTUgNSAwIDAgMSAwIDcuMDciPjwvcGF0aD48L3N2Zz4=" alt="Som">
                    </button>
                </div>
                <h2>Jogo das Cores</h2>
                <div style="width: 70px;"></div> <!-- Espaçador para centralizar o título -->
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
                <div class="message-character" id="messageCharacter">
                    <img src="/imagens/1.png" alt="Personagem">
                </div>
                <div class="win-title" id="winTitle">Vitória!</div>
                <div class="message-text" id="messageText"></div>
                
                <div class="message-buttons">
                    <button class="message-btn hidden" id="btnJogarNovamente">Jogar Novamente</button>
                </div>
            </div>
        </div>

        <div class="info-modal" id="infoModal">
            <div class="info-content">
                <div class="info-header">
                    <h3 class="info-title">Sobre o Jogo</h3>
                    <button class="close-btn" id="closeInfo">&times;</button>
                </div>
                <div class="info-body">
                    <div class="info-character">
                        <img src="/imagens/1.png" alt="Personagem" id="infoCharImage">
                    </div>
                    <div class="info-text">
                        <h4>Como jogar?</h4>
                        <p>O jogo vai pedir para você encontrar uma cor específica
                        
                        <h4>Para que serve?</h4>
                        <p>Este jogo ajuda no reconhecimento de cores e desenvolvimento da percepção visual
                        
                        <div class="info-speech" id="infoSpeech">
                            Clique no ícone de som para eu explicar!
                        </div>
                    </div>
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

    <script>
        const colors = [
            { nome: 'Vermelho', valor: 'red', classe: 'red' },
            { nome: 'Azul', valor: 'blue', classe: 'blue' },
            { nome: 'Verde', valor: 'green', classe: 'green' },
            { nome: 'Amarelo', valor: 'yellow', classe: 'yellow' },
            { nome: 'Roxo', valor: 'purple', classe: 'purple' },
            { nome: 'Laranja', valor: 'orange', classe: 'orange' },
            { nome: 'Rosa', valor: 'pink', classe: 'pink' },
            { nome: 'Verde-água', valor: 'teal', classe: 'teal' },
            { nome: 'Ciano', valor: 'cyan', classe: 'cyan' },
            { nome: 'Lima', valor: 'lime', classe: 'lime' },
            { nome: 'Marrom', valor: 'brown', classe: 'brown' },
            { nome: 'Cinza', valor: 'gray', classe: 'gray' }
        ];

        // Elementos DOM
        const messageCharacter = document.getElementById("messageCharacter");
        const messageText = document.getElementById("messageText");
        const btnJogarNovamente = document.getElementById("btnJogarNovamente");
        const infoModal = document.getElementById("infoModal");
        const btnInfo = document.getElementById("btnInfo");
        const btnSound = document.getElementById("btnSound");
        const closeInfo = document.getElementById("closeInfo");
        const infoCharImage = document.getElementById("infoCharImage");
        const infoSpeech = document.getElementById("infoSpeech");

        // Variáveis de controle
        let talkingInterval;
        let isTalking = false;
        let soundEnabled = true;
        let currentAudio = null;

        // Inicialização do jogo
        const selectedColors = [];
        while (selectedColors.length < 8) {
            const randomIndex = Math.floor(Math.random() * colors.length);
            if (!selectedColors.includes(colors[randomIndex])) {
                selectedColors.push(colors[randomIndex]);
            }
        }

        let target = selectedColors[Math.floor(Math.random() * selectedColors.length)];
        document.getElementById('targetColor').innerText = target.nome;
        document.getElementById('targetColor').style.color = target.valor;

        const buttonsDiv = document.getElementById('buttons');
        selectedColors.forEach(cor => {
            let btn = document.createElement('button');
            btn.className = `color-btn ${cor.classe}`;
            btn.onclick = () => {
                if (cor.nome === target.nome) {
                    showMessage('win', `Parabéns! Você acertou a cor ${target.nome}!`);
                } else {
                    showMessage('error', `Você clicou em ${cor.nome}<br>Mas precisava encontrar ${target.nome}`);
                }
            };
            buttonsDiv.appendChild(btn);
        });

        // Event Listeners
        btnInfo.addEventListener('click', () => {
            infoModal.classList.add('active');
        });

        closeInfo.addEventListener('click', () => {
            infoModal.classList.remove('active');
            stopTalking();
        });

        btnSound.addEventListener('click', () => {
            soundEnabled = !soundEnabled;
            if (soundEnabled) {
                btnSound.innerHTML = '<img src="data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSIyNCIgaGVpZ2h0PSIyNCIgdmlld0JveD0iMCAwIDI0IDI0IiBmaWxsPSJub25lIiBzdHJva2U9ImN1cnJlbnRDb2xvciIgc3Ryb2tlLXdpZHRoPSIyIiBzdHJva2UtbGluZWNhcD0icm91bmQiIHN0cm9rZS1saW5lam9pbj0icm91bmQiPjxwb2x5Z29uIHBvaW50cz0iMTEgNSA2IDkgMiA5IDIgMTUgNiAxNSAxMSAxOSAxMSA1Ij48L3BvbHlnb24+PHBhdGggZD0iTTE5LjA3IDQuOTNhMTAgMTAgMCAwIDEgMCAxNC4xNE0xNS41NCA4LjQ2YTUgNSAwIDAgMSAwIDcuMDciPjwvcGF0aD48L3N2Zz4=" alt="Som">';
                speakInfo();
            } else {
                btnSound.innerHTML = '<img src="data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSIyNCIgaGVpZ2h0PSIyNCIgdmlld0JveD0iMCAwIDI0IDI0IiBmaWxsPSJub25lIiBzdHJva2U9ImN1cnJlbnRDb2xvciIgc3Ryb2tlLXdpZHRoPSIyIiBzdHJva2UtbGluZWNhcD0icm91bmQiIHN0cm9rZS1saW5lam9pbj0icm91bmQiPjxwb2x5Z29uIHBvaW50cz0iMTEgNSA2IDkgMiA5IDIgMTUgNiAxNSAxMSAxOSAxMSA1Ij48L3BvbHlnb24+PGxpbmUgeDE9IjE3IiB5MT0iOSIgeDI9IjIzIiB5Mj0iMTUiPjwvbGluZT48bGluZSB4MT0iMjMiIHkxPSI5IiB4Mj0iMTciIHkyPSIxNSI+PC9saW5lPjwvc3ZnPg==" alt="Som Desligado">';
                stopTalking();
            }
        });

        btnJogarNovamente.addEventListener('click', function() {
            if (currentAudio) {
                currentAudio.pause();
                currentAudio.currentTime = 0;
            }
            document.getElementById('message').classList.remove('active');
            location.reload();
        });

        // Funções do jogo
        function showMessage(type, text) {
            const message = document.getElementById('message');
            const winTitle = document.getElementById('winTitle');
            
            message.className = 'message';
            message.classList.add(type);
            
            messageText.innerHTML = text;
            
            if (type === 'win') {
                winTitle.style.display = 'block';
                messageCharacter.innerHTML = '<img src="/imagens/4.png" alt="Personagem Feliz">';
                playerWin();
            } else {
                winTitle.style.display = 'none';
                messageCharacter.innerHTML = '<img src="/imagens/2.png" alt="Personagem Triste">';
                playerLose();
            }
            
            message.classList.add('active');
            btnJogarNovamente.classList.add('hidden');
            
            // Iniciar animação de fala na mensagem
            startTalkingMessage(type === 'win' ? 'feliz' : 'triste');
            
            // Mostrar botão após animação
            setTimeout(() => {
                stopTalkingMessage();
                btnJogarNovamente.classList.remove('hidden');
            }, 4000);
        }

        function startTalkingMessage(mood) {
            isTalking = true;
            let i = 0;
            const characterImg = messageCharacter.querySelector('img');
            const originalSrc = characterImg.src;
            
            talkingInterval = setInterval(() => {
                if (isTalking) {
                    if (mood === 'feliz') {
                        characterImg.src = (i % 2 === 0) ? "/imagens/4.png" : "/imagens/3.png";
                    } else {
                        characterImg.src = (i % 2 === 0) ? "/imagens/2.png" : "/imagens/5.png";
                    }
                    i++;
                }
            }, 300);
        }

        function stopTalkingMessage() {
            isTalking = false;
            if (talkingInterval) {
                clearInterval(talkingInterval);
            }
        }

        function speakInfo() {
            if (!soundEnabled) return;
            
            stopTalking();
            isTalking = true;
            let i = 0;
            
            // Animação de fala no modal
            const talkingIntervalModal = setInterval(() => {
                if (isTalking) {
                    infoCharImage.src = (i % 2 === 0) ? "/imagens/1.png" : "/imagens/4.png";
                    i++;
                }
            }, 300);
            
            // Texto explicativo com efeito de digitação
            const fullText = "Olá! Eu vou te explicar como jogar. Você precisa encontrar a cor que é pedida na tela.";
            let charIndex = 0;
            infoSpeech.textContent = "";
            
            const typeInterval = setInterval(() => {
                if (charIndex < fullText.length) {
                    infoSpeech.textContent += fullText.charAt(charIndex);
                    charIndex++;
                } else {
                    clearInterval(typeInterval);
                    setTimeout(() => {
                        clearInterval(talkingIntervalModal);
                        infoCharImage.src = "/imagens/1.png";
                        isTalking = false;
                    }, 1000);
                }
            }, 50);
        }

        function stopTalking() {
            isTalking = false;
            if (talkingInterval) {
                clearInterval(talkingInterval);
            }
        }

        function playSound(sound) {
            if (!soundEnabled) return;
            if (currentAudio) {
                currentAudio.pause();
            }
            currentAudio = new Audio(sound);
            currentAudio.play();
        }

        function playerWin() {
            playSound("/sons/acerto.mp3");
        }

        function playerLose() {
            playSound("/sons/erro.mp3");
        }
    </script>
</body>
</html>