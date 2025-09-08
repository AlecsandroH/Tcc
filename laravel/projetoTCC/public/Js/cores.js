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
const messageText = document.getElementById("messageText");
const victoryContainer = document.getElementById("victoryContainer");
const victoryText = document.getElementById("victoryText");
const standardMessage = document.getElementById("standardMessage");
const btnJogarNovamente = document.getElementById("btnJogarNovamente");
const btnSound = document.getElementById("btnSound");
const soundIcon = document.getElementById("soundIcon");
const assistant = document.getElementById("assistant");
const assistantImg = document.getElementById("assistantImg");
const assistantSpeech = document.getElementById("assistantSpeech");


// Variáveis de controle
let talkingInterval;
let isTalking = false;
let soundEnabled = true;
let currentAudio = null;
let currentTextAnimation = null;
let assistantActive = false;
let assistantSpriteInterval;

// Verificar se é a primeira visita usando sessionStorage
const isFirstVisit = sessionStorage.getItem('firstVisit') === null;

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
        
        // Destacar a cor correta
        const correctButton = document.querySelector(`.color-btn[data-color="${target.nome}"]`);
        if (correctButton) {
            correctButton.classList.add('highlight-correct');
            setTimeout(() => {
                correctButton.classList.remove('highlight-correct');
            }, 5000);
        }
    } else {
        hideAssistantMessage();

    }
});

// Funções do jogo
function showMessage(type, text) {
    const message = document.getElementById('message');
    
    message.className = 'message';
    message.classList.add(type);
    
    if (type === 'win') {
        // Mostrar mensagem de vitória com boneco
        standardMessage.classList.add('hidden');
        victoryContainer.classList.remove('hidden');
        victoryText.innerHTML = text;
        playerWin();
        
        // Mostrar assistente feliz
        assistantImg.src = "/imagens/1.png";
        showAssistantMessage("Parabéns! Você acertou! 🎉", 5000);
    } else {
        // Mostrar mensagem de erro com boneco
        standardMessage.classList.remove('hidden');
        victoryContainer.classList.add('hidden');
        messageText.innerHTML = text;
        playerLose();
        
        // Mostrar assistente encorajador
        assistantImg.src = "/imagens/4.png";
        showAssistantMessage("Tente novamente! Você consegue! 💪", 4000);
    }
    
    message.classList.add('active');
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
    createConfetti();
}

function playerLose() {
    playSound("/sons/erro.mp3");
}

function showAssistantMessage(text, duration = 5000) {
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
        spriteIndex = spriteIndex % 3 + 1; 
     }, 200);
    
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
        // Não resetar a imagem para manter a expressão atual
    }, duration);
}

function hideAssistantMessage() {
    assistantSpeech.classList.remove('active');
    assistant.classList.remove('talking');
    if (assistantSpriteInterval) {
        clearInterval(assistantSpriteInterval);
    }
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

// Inicialização - Mostrar mensagem apenas na primeira visita
if (isFirstVisit) {
    setTimeout(() => {
        showAssistantMessage("Olá! Sou seu assistente. Clique em mim para obter ajuda ou no ícone de som para controlar o áudio!", 5000);
        // Marcar que já visitou nesta sessão
        sessionStorage.setItem('firstVisit', 'false');
    }, 2000);
}