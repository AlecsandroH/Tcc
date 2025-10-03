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