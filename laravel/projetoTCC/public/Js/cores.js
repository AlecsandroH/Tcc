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


function showMessage(type, text) {
    const message = document.getElementById('message');
    const messageText = document.getElementById('messageText');
    const messageEmoji = document.getElementById('messageEmoji');
    
    message.className = 'message'; // Reseta as classes
    message.classList.add(type);
    
    messageText.innerHTML = text;
    messageEmoji.textContent = type === 'win' ? '🎉' : '😕';
    
    message.classList.add('active');
    
   
    if (type === 'error') {
        setTimeout(() => {
            message.classList.remove('active');
        }, 3000);
    }
}

// Botão Jogar Novamente
document.getElementById('btnJogarNovamente').addEventListener('click', function() {
    document.getElementById('message').classList.remove('active');
    location.reload();
});

