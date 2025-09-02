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
            position: relative;
        }

        .control-btn:hover {
            background: rgba(255, 255, 255, 0.3);
            transform: scale(1.1);
        }

        .control-btn.active {
            background: rgba(255, 255, 255, 0.4);
            box-shadow: 0 0 10px rgba(255, 255, 255, 0.5);
        }

        .control-btn img {
            width: 24px;
            height: 24px;
            transition: all 0.3s ease;
        }

        .control-btn.active img {
            transform: scale(1.1);
        }

        .btn-tooltip {
            position: absolute;
            bottom: -35px;
            left: 50%;
            transform: translateX(-50%);
            background: rgba(0, 0, 0, 0.8);
            color: white;
            padding: 5px 10px;
            border-radius: 5px;
            font-size: 12px;
            white-space: nowrap;
            opacity: 0;
            visibility: hidden;
            transition: all 0.3s ease;
            z-index: 100;
        }

        .control-btn:hover .btn-tooltip {
            opacity: 1;
            visibility: visible;
            bottom: -30px;
        }

        .game-content {
            padding: 30px;
            text-align: center;
            position: relative;
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
            
            .header-controls {
                gap: 10px;
            }
            
            .control-btn {
                width: 35px;
                height: 35px;
            }
            
            .control-btn img {
                width: 20px;
                height: 20px;
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

        .error-title {
            font-size: 28px;
            color: #FF5252;
            margin-bottom: 15px;
            font-weight: 700;
        }

        /* Estilos para o assistente - AUMENTADO */
        .assistant {
            position: fixed;
            bottom: 20px;
            right: 20px;
            width: 120px; /* Aumentado de 80px */
            height: 120px; /* Aumentado de 80px */
            cursor: pointer;
            z-index: 1000;
            transition: transform 0.3s ease;
        }

        .assistant:hover {
            transform: scale(1.1);
        }

        .assistant img {
            width: 100%;
            height: 100%;
            object-fit: contain;
            border-radius: 50%;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
            border: 3px solid #4c5baf;
            transition: all 0.3s ease;
        }

        .assistant:hover img {
            box-shadow: 0 6px 20px rgba(0, 0, 0, 0.3);
            border-color: #4CAF50;
        }

        .assistant.talking img {
            animation: assistantTalk 0.5s infinite alternate;
        }

        @keyframes assistantTalk {
            0% { transform: scale(1); }
            100% { transform: scale(1.05); }
        }

        .assistant-speech {
            position: absolute;
            bottom: 130px; /* Ajustado para o assistente maior */
            right: 0;
            background: white;
            padding: 12px 15px;
            border-radius: 15px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
            max-width: 200px;
            opacity: 0;
            visibility: hidden;
            transition: all 0.3s ease;
            font-size: 14px;
        }

        .assistant-speech.active {
            opacity: 1;
            visibility: visible;
        }

        .assistant-speech:after {
            content: '';
            position: absolute;
            bottom: -10px;
            right: 15px;
            border-width: 10px 10px 0;
            border-style: solid;
            border-color: white transparent transparent transparent;
        }

        .game-hint {
            position: absolute;
            top: 10px;
            right: 10px;
            background: rgba(255, 255, 255, 0.9);
            padding: 10px;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            font-size: 14px;
            max-width: 200px;
            opacity: 0;
            visibility: hidden;
            transition: all 0.3s ease;
        }

        .game-hint.active {
            opacity: 1;
            visibility: visible;
        }

        /* Novos estilos para mensagem de vitória */
        .victory-container {
            text-align: center;
            padding: 20px;
        }

        .victory-icon {
            font-size: 60px;
            margin-bottom: 20px;
            color: #4CAF50;
            animation: victoryPulse 1.5s infinite;
        }

        @keyframes victoryPulse {
            0% { transform: scale(1); }
            50% { transform: scale(1.2); }
            100% { transform: scale(1); }
        }

        .victory-title {
            font-size: 32px;
            color: #4CAF50;
            margin-bottom: 10px;
            font-weight: 700;
        }

        .victory-text {
            font-size: 18px;
            margin-bottom: 25px;
            color: #333;
        }

        @media (max-width: 768px) {
            .assistant {
                width: 100px; /* Ajustado para responsividade */
                height: 100px;
                bottom: 15px;
                right: 15px;
            }

            .assistant-speech {
                bottom: 110px; /* Ajustado para o assistente maior */
                max-width: 150px;
                font-size: 12px;
            }
            
            .victory-icon {
                font-size: 50px;
            }
            
            .victory-title {
                font-size: 28px;
            }
        }

        @media (max-width: 480px) {
            .message-buttons {
                flex-direction: column;
            }
            
            .message-btn {
                width: 100%;
            }
            
            .assistant {
                width: 80px; /* Ajustado para responsividade */
                height: 80px;
                bottom: 10px;
                right: 10px;
            }
            
            .assistant-speech {
                bottom: 90px; /* Ajustado para o assistente maior */
                max-width: 120px;
                font-size: 11px;
                padding: 8px 10px;
            }
            
            .victory-icon {
                font-size: 40px;
            }
            
            .victory-title {
                font-size: 24px;
            }
            
            .victory-text {
                font-size: 16px;
            }
        }

        .hidden {
            display: none !important;
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
    
    <!-- Assistente flutuante - AUMENTADO -->
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
                <div class="game-hint" id="gameHint"></div>
                
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
                    <div class="victory-icon">🎉</div>
                    <div class="victory-title">Vitória!</div>
                    <div class="victory-text" id="victoryText"></div>
                </div>
                
                <div id="standardMessage">
                    <div class="message-character" id="messageCharacter">
                        <img src="/imagens/1.png" alt="Personagem">
                    </div>
                    <div class="win-title hidden" id="winTitle">Vitória!</div>
                    <div class="error-title hidden" id="errorTitle">Tente Novamente</div>
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
        const victoryContainer = document.getElementById("victoryContainer");
        const victoryText = document.getElementById("victoryText");
        const standardMessage = document.getElementById("standardMessage");
        const winTitle = document.getElementById("winTitle");
        const errorTitle = document.getElementById("errorTitle");
        const btnJogarNovamente = document.getElementById("btnJogarNovamente");
        const btnSound = document.getElementById("btnSound");
        const soundIcon = document.getElementById("soundIcon");
        const assistant = document.getElementById("assistant");
        const assistantImg = document.getElementById("assistantImg");
        const assistantSpeech = document.getElementById("assistantSpeech");
        const gameHint = document.getElementById("gameHint");

        // Variáveis de controle
        let talkingInterval;
        let isTalking = false;
        let soundEnabled = true;
        let currentAudio = null;
        let currentTextAnimation = null;
        let assistantActive = false;
        let assistantSpriteInterval;

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
            btn.setAttribute('data-color', cor.nome);
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
        btnSound.addEventListener('click', () => {
            soundEnabled = !soundEnabled;
            if (soundEnabled) {
                soundIcon.innerHTML = '<polygon points="11 5 6 9 2 9 2 15 6 15 11 19 11 5"></polygon><path d="M19.07 4.93a10 10 0 0 1 0 14.14M15.54 8.46a5 5 0 0 1 0 7.07"></path>';
                btnSound.querySelector('.btn-tooltip').textContent = 'Desativar Som';
                btnSound.classList.add('active');
                showAssistantMessage("Som ativado! Clique em mim se precisar de ajuda.");
            } else {
                soundIcon.innerHTML = '<polygon points="11 5 6 9 2 9 2 15 6 15 11 19 11 5"></polygon><line x1="23" y1="9" x2="17" y2="15"></line><line x1="17" y1="9" x2="23" y2="15"></line>';
                btnSound.querySelector('.btn-tooltip').textContent = 'Ativar Som';
                btnSound.classList.remove('active');
                showAssistantMessage("Som desativado. Clique novamente para ativar.");
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

        // Interação com o assistente
        assistant.addEventListener('click', () => {
            assistantActive = !assistantActive;
            if (assistantActive) {
                showAssistantMessage("Procure a cor " + target.nome + " entre os botões coloridos! Clique na cor " + target.nome + " para vencer!");
                showHint("Dica: A cor que você procura é " + target.nome);
                
                // Destacar a cor correta
                const correctButton = document.querySelector(`.color-btn[data-color="${target.nome}"]`);
                if (correctButton) {
                    correctButton.style.boxShadow = "0 0 0 3px #4CAF50, 0 8px 15px rgba(0,0,0,0.2)";
                    setTimeout(() => {
                        correctButton.style.boxShadow = "0 4px 8px rgba(0,0,0,0.1)";
                    }, 3000);
                }
            } else {
                hideAssistantMessage();
                hideHint();
            }
        });

        // Funções do jogo
        function showMessage(type, text) {
            const message = document.getElementById('message');
            
            message.className = 'message';
            message.classList.add(type);
            
            if (type === 'win') {
                // Mostrar mensagem de vitória sem personagem
                standardMessage.classList.add('hidden');
                victoryContainer.classList.remove('hidden');
                victoryText.innerHTML = text;
                winTitle.classList.add('hidden');
                errorTitle.classList.add('hidden');
                playerWin();
            } else {
                // Mostrar mensagem padrão com personagem para erros
                standardMessage.classList.remove('hidden');
                victoryContainer.classList.add('hidden');
                winTitle.classList.add('hidden');
                errorTitle.classList.remove('hidden');
                messageText.innerHTML = text;
                messageCharacter.innerHTML = '<img src="/imagens/2.png" alt="Personagem Triste">';
                playerLose();
            }
            
            message.classList.add('active');
            
            // Iniciar animação de fala na mensagem se for erro
            if (type === 'error') {
                startTalkingMessage('triste');
            }
        }

        function startTalkingMessage(mood) {
            isTalking = true;
            let i = 0;
            const characterImg = messageCharacter.querySelector('img');
            
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
            showAssistantMessage("Parabéns! Você acertou! Clique em 'Jogar Novamente' para continuar.", 5000);
            createConfetti();
        }

        function playerLose() {
            playSound("/sons/erro.mp3");
            showAssistantMessage("Tente novamente! Você consegue! A cor correta é " + target.nome + ".", 4000);
        }

        function showAssistantMessage(text, duration = 3000) {
            // Parar qualquer animação anterior
            if (currentTextAnimation) {
                clearInterval(currentTextAnimation);
            }
            
            if (assistantSpriteInterval) {
                clearInterval(assistantSpriteInterval);
            }
            
            // Configurar a fala do assistente
            assistantSpeech.textContent = "";
            assistantSpeech.classList.add('active');
            assistant.classList.add('talking');
            
            // Animar o assistente
            assistant.style.transform = 'scale(1.1)';
            setTimeout(() => {
                assistant.style.transform = 'scale(1)';
            }, 300);
            
            // Animação de sprites do assistente (troca de imagens)
            let spriteIndex = 1;
            assistantSpriteInterval = setInterval(() => {
                assistantImg.src = `/imagens/${spriteIndex}.png`;
                spriteIndex = spriteIndex % 5 + 1; // Cicla entre 1.png e 5.png
            }, 500);
            
            // Animação de digitação
            let charIndex = 0;
            currentTextAnimation = setInterval(() => {
                if (charIndex < text.length) {
                    assistantSpeech.textContent += text.charAt(charIndex);
                    charIndex++;
                } else {
                    clearInterval(currentTextAnimation);
                }
            }, 40);
            
            // Esconder a mensagem após o tempo especificado
            setTimeout(() => {
                assistantSpeech.classList.remove('active');
                assistant.classList.remove('talking');
                assistantActive = false;
                clearInterval(assistantSpriteInterval);
                assistantImg.src = "/imagens/1.png"; // Volta para a imagem padrão
            }, duration);
        }

        function hideAssistantMessage() {
            assistantSpeech.classList.remove('active');
            assistant.classList.remove('talking');
            if (assistantSpriteInterval) {
                clearInterval(assistantSpriteInterval);
            }
            assistantImg.src = "/imagens/1.png"; // Volta para a imagem padrão
        }

        function showHint(text) {
            gameHint.textContent = text;
            gameHint.classList.add('active');
        }

        function hideHint() {
            gameHint.classList.remove('active');
        }

        function createConfetti() {
            const messageContent = document.querySelector('.message-content');
            const colors = ['#4CAF50', '#FFD600', '#4285F4', '#E91E63', '#9C27B0', '#FF9800'];
            
            for (let i = 0; i < 50; i++) {
                const confetti = document.createElement('div');
                confetti.className = 'confetti';
                confetti.style.left = Math.random() * 100 + '%';
                confetti.style.backgroundColor = colors[Math.floor(Math.random() * colors.length)];
                confetti.style.animation = `confetti-fall ${Math.random() * 3 + 2}s linear forwards`;
                messageContent.appendChild(confetti);
                
                // Remover após a animação
                setTimeout(() => {
                    confetti.remove();
                }, 5000);
            }
        }

        // Inicialização
        setTimeout(() => {
            showAssistantMessage("Olá! Sou seu assistente. Clique em mim para obter ajuda ou no ícone de som para controlar o áudio!", 5000);
        }, 2000);
    </script>
</body>
</html>