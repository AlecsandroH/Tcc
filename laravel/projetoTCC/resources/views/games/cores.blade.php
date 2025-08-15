<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Jogo das Cores</title>
    <style>
        body { 
            text-align: center; 
            font-family: Arial, sans-serif; 
            background: #f0f0f0; 
        }
        h2 {
            font-size: 28px;
            margin-top: 20px;
        }
        .color-btn { 
            width: 120px; 
            height: 120px; 
            margin: 10px; 
            border: none; 
            cursor: pointer; 
            border-radius: 15px;
            box-shadow: 0 4px 6px rgba(0,0,0,0.2);
            transition: transform 0.2s;
        }
        .color-btn:hover {
            transform: scale(1.1);
        }
    </style>
</head>
<body>
    <h2>Escolha a cor: <span id="targetColor"></span></h2>
    <div id="buttons"></div>

    <script>
        const colors = [
            { nome: 'Vermelho', valor: 'red' },
            { nome: 'Azul', valor: 'blue' },
            { nome: 'Verde', valor: 'green' },
            { nome: 'Amarelo', valor: 'yellow' }
        ];

        let target = colors[Math.floor(Math.random() * colors.length)];
        document.getElementById('targetColor').innerText = target.nome;

        const buttonsDiv = document.getElementById('buttons');
        colors.forEach(cor => {
            let btn = document.createElement('button');
            btn.className = 'color-btn';
            btn.style.background = cor.valor;
            btn.onclick = () => {
                if (cor.nome === target.nome) {
                    alert('Parabéns!');
                    location.reload();
                } else {
                    alert('Tente novamente!');
                }
            };
            buttonsDiv.appendChild(btn);
        });
    </script>
</body>
</html>