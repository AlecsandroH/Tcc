<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Caça ao Tesouro</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #f5f7fa 0%, #e4f0fb 100%);
            margin: 0;
            padding: 20px;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }

        .game-container {
            max-width: 800px;
            width: 100%;
            background: white;
            border-radius: 20px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }

        .game-header {
            background: linear-gradient(90deg, #4CAF50, #8BC34A);
            color: white;
            padding: 20px;
            text-align: center;
        }

        .game-header h2 {
            margin: 0;
            font-size: 28px;
            font-weight: 600;
        }

        .game-content {
            padding: 20px;
            text-align: center;
            position: relative;
            min-height: 400px;
            background-image: url('https://preview.redd.it/the-treasure-map-i-created-for-a-role-playing-game-v0-mogabs02qkie1.png?width=640&crop=smart&auto=webp&s=885d20495e40188d295dc1b56bfffcf205c349dd');
            background-size: cover;
            background-position: center;
            border-radius: 0 0 20px 20px;
        }

        .target-display {
            background: rgba(255, 255, 255, 0.8);
            display: inline-block;
            padding: 10px 20px;
            border-radius: 50px;
            margin-bottom: 20px;
            font-size: 20px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
        }

        .treasure-object {
            position: absolute;
            width: 60px;
            height: 60px;
            font-size: 40px;
            cursor: pointer;
            transition: all 0.3s ease;
            text-shadow: 2px 2px 4px rgba(0,0,0,0.3);
            animation: float 3s infinite alternate;
        }

        .treasure-object:hover {
            transform: scale(1.2) rotate(15deg);
        }

        @keyframes float {
            from { transform: translateY(0); }
            to { transform: translateY(-10px); }
        }

        .game-footer {
            background: #f9f9f9;
            padding: 20px;
            border-top: 1px solid #eee;
        }

        .details-container {
            margin-bottom: 20px;
        }

        details {
            background: white;
            border-radius: 10px;
            padding: 15px;
            margin-bottom: 15px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.05);
        }

        summary {
            font-weight: 600;
            cursor: pointer;
            outline: none;
            color: #4CAF50;
        }

        .details-content {
            margin-top: 10px;
            color: #555;
            line-height: 1.5;
        }

        .btn-voltar {
            background: linear-gradient(135deg, #4CAF50, #8BC34A);
            color: white;
            border: none;
            padding: 12px 25px;
            border-radius: 50px;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            box-shadow: 0 4px 10px rgba(76, 175, 80, 0.3);
            text-decoration: none;
            display: inline-block;
        }

        .btn-voltar:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 15px rgba(76, 175, 80, 0.4);
        }

        .win-message {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(0, 0, 0, 0.8);
            display: flex;
            justify-content: center;
            align-items: center;
            z-index: 1000;
            opacity: 0;
            visibility: hidden;
            transition: all 0.3s ease;
        }

        .win-message.active {
            opacity: 1;
            visibility: visible;
        }

        .win-content {
            background: white;
            padding: 40px;
            border-radius: 20px;
            text-align: center;
            max-width: 400px;
            width: 90%;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.3);
        }

        .win-emoji {
            font-size: 60px;
            margin-bottom: 20px;
            animation: bounce 1s infinite alternate;
        }

        @keyframes bounce {
            from { transform: translateY(0); }
            to { transform: translateY(-15px); }
        }

        @media (max-width: 600px) {
            .treasure-object {
                width: 50px;
                height: 50px;
                font-size: 30px;
            }
        }
    </style>
</head>
<body>
    <div class="game-container">
        <div class="game-header">
            <h2>Caça ao Tesouro</h2>
        </div>
        
        <div class="game-content">
            <div class="target-display">
                Encontre: <span id="target"></span>
            </div>
            <div id="objects"></div>
        </div>
        
        <div class="game-footer">
            <div class="details-container">
                <details>
                    <summary>Como jogar?</summary>
                    <div class="details-content">
                        <p>Encontre o objeto indicado no mapa do tesouro!</p>
                        <p>Clique nos objetos espalhados pelo mapa até encontrar o correto.</p>
                        <p>Este jogo ajuda no desenvolvimento da atenção e percepção visual.</p>
                    </div>
                </details>
            </div>
            
            <a href="/atividades" class="btn-voltar">Voltar</a>
        </div>
    </div>

    <div class="win-message" id="winMessage">
        <div class="win-content">
            <div class="win-emoji">🏆</div>
            <div class="win-text">Tesouro Encontrado!</div>
            <button class="btn-voltar" id="btnJogarNovamente" style="margin-top: 20px;">Jogar Novamente</button>
        </div>
    </div>

    <script>
        const items = ['🍎', '🍌', '🍇', '🍉', '🍓', '🍊', '🍋', '🍒', '🥥', '🍍'];
        const target = items[Math.floor(Math.random() * items.length)];
        document.getElementById('target').innerText = target;
        
        const objectsDiv = document.getElementById('objects');
        const positions = [];
        
    ''
        for (let i = 0; i < 15; i++) {
            const item = items[Math.floor(Math.random() * items.length)];
            const left = 10 + Math.random() * 80;
            const top = 10 + Math.random() * 70;
            
            positions.push({ item, left, top });
        }
        
    
        if (!positions.some(pos => pos.item === target)) {
            const index = Math.floor(Math.random() * positions.length);
            positions[index].item = target;
        }
        
        
        positions.forEach((pos, idx) => {
            const obj = document.createElement('div');
            obj.className = 'treasure-object';
            obj.innerText = pos.item;
            obj.style.left = `${pos.left}%`;
            obj.style.top = `${pos.top}%`;
            
            obj.onclick = () => {
                if (pos.item === target) {
                    showWinMessage();
                } else {
                    obj.style.animation = 'shake 0.5s';
                    setTimeout(() => {
                        obj.style.animation = 'float 3s infinite alternate';
                    }, 500);
                }
            };
            
            objectsDiv.appendChild(obj);
        });
        
        function showWinMessage() {
            document.getElementById('winMessage').classList.add('active');
        }
        
        document.getElementById('btnJogarNovamente').addEventListener('click', () => {
            document.getElementById('winMessage').classList.remove('active');
            location.reload();
        });
        
        // Animação de shake para quando errar
        const style = document.createElement('style');
        style.innerHTML = `
            @keyframes shake {
                0%, 100% { transform: translateX(0); }
                10%, 30%, 50%, 70%, 90% { transform: translateX(-5px); }
                20%, 40%, 60%, 80% { transform: translateX(5px); }
            }
        `;
        document.head.appendChild(style);
    </script>
</body>
</html>