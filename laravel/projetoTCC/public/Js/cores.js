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

const characterImage = document.getElementById("characterImage");
const speechBubble = document.getElementById("speechBubble");
const speechText = document.getElementById("speechText");
const btnJogarNovamente = document.getElementById("btnJogarNovamente");
const comoJogarDetails = document.getElementById("comoJogarDetails");
const paraQueServeDetails = document.getElementById("paraQueServeDetails");

// Variáveis para controlar as animações
let talkingInterval;
let isTalking = false;

// Seleciona 8 cores aleatórias
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
            // Acertou - mostra mensagem de vitória
            showMessage('win', `Parabéns! Você acertou a cor ${target.nome}!`);
        } else {
            // Errou - mostra mensagem de erro
            showMessage('error', `Você clicou em ${cor.nome}<br>Mas precisava encontrar ${target.nome}`);
        }
    };
    buttonsDiv.appendChild(btn);
});

// Adicionar evento para o botão "Como jogar?"
comoJogarDetails.addEventListener('toggle', function() {
    if (this.open) {
        showCharacterMessage("encontre uma cor específica. Clique no quadrado que corresponde à cor solicitada. Se acertar, você ganha! Se errar, tente novamente. Este jogo ajuda no reconhecimento de cores e é especialmente útil para crianças com TEA.", "normal", 8000);
    }
});

// Adicionar evento para o botão "Para o que serve o Jogo?"
paraQueServeDetails.addEventListener('toggle', function() {
    if (this.open) {
        showCharacterMessage("Este jogo ajuda no reconhecimento de cores e desenvolvimento da percepção visual. É especialmente útil para crianças com TEA, auxiliando no desenvolvimento cognitivo.", "normal", 7000);
    }
});

function showMessage(type, text) {
    const message = document.getElementById('message');
    const messageText = document.getElementById('messageText');
    const messageEmoji = document.getElementById('messageEmoji');
    
    message.className = 'message'; // Reseta as classes
    message.classList.add(type);
    
    messageText.innerHTML = text;
    messageEmoji.textContent = type === 'win' ? '🎉' : '😕';
    
    message.classList.add('active');
    
    // Esconder o botão inicialmente
    btnJogarNovamente.classList.add('hidden');
    
    if (type === 'win') {
        playerWin();
    } else {
        playerLose();
    }
}

// Botão Jogar Novamente
btnJogarNovamente.addEventListener('click', function() {
    document.getElementById('message').classList.remove('active');
    location.reload();
});

// função para mostrar mensagem do personagem
function showCharacterMessage(text, mood, duration = 5000) {
    // Parar qualquer animação anterior
    stopTalking();
    
    speechText.innerText = text;
    speechBubble.style.display = "block";

    if (mood === "feliz") {
        characterImage.src = "/imagens/4.png";
    } else if (mood === "triste") {
        characterImage.src = "/imagens/2.png";
    } else {
        characterImage.src = "/imagens/1.png";
    }

    // Iniciar animação de fala
    startTalking(duration);
    
    // Esconder balão após o tempo especificado
    setTimeout(() => {
        speechBubble.style.display = "none";
        stopTalking();
        
        // Mostrar o botão "Jogar Novamente" apenas se for o final do jogo
        if (mood === "feliz" || mood === "triste") {
            btnJogarNovamente.classList.remove('hidden');
        }
    }, duration);
}

function startTalking(duration) {
    isTalking = true;
    let i = 0;
    
    talkingInterval = setInterval(() => {
        if (isTalking) {
            characterImage.src = (i % 2 === 0) ? "/imagens/1.png" : "/imagens/4.png";
            i++;
        }
    }, 300);
}

function stopTalking() {
    isTalking = false;
    if (talkingInterval) {
        clearInterval(talkingInterval);
    }
    characterImage.src = "/imagens/1.png";
}

// exemplo: acertou
function playerWin() {
    showCharacterMessage("Parabéns, você acertou! 🎉", "feliz", 5000);
    new Audio("/sons/acerto.mp3").play();
}

// exemplo: errou
function playerLose() {
    showCharacterMessage("Ops, tente de novo! 😢", "triste", 5000);
    new Audio("/sons/erro.mp3").play();
}