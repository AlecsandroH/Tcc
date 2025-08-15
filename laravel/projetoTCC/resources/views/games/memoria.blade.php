<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Jogo da Memória</title>
    <style>
        body { text-align:center; font-family: Arial; background:#f0f0f0; }
        .card { width: 100px; height: 100px; margin:10px; display:inline-block; background:#ccc; border-radius:15px; cursor:pointer; font-size:50px; line-height:100px; }
        .matched { visibility:hidden; }
    </style>
</head>
<body>
    <h2>Jogo da Memória</h2>
    <div id="board"></div>

    <script>
        const symbols = ['🍎','🍌','🍇','🍉'];
        let cards = [...symbols, ...symbols];
        cards.sort(() => Math.random() - 0.5);
        const board = document.getElementById('board');
        let firstCard=null;

        cards.forEach(symbol => {
            let card = document.createElement('div');
            card.className='card';
            card.dataset.symbol = symbol;
            card.innerText='';
            card.onclick = () => {
                if(card.innerText===''){
                    card.innerText=card.dataset.symbol;
                    if(!firstCard) firstCard=card;
                    else{
                        if(firstCard.dataset.symbol===card.dataset.symbol){
                            setTimeout(()=>{ firstCard.classList.add('matched'); card.classList.add('matched'); firstCard=null; }, 500);
                        } else {
                            setTimeout(()=>{ firstCard.innerText=''; card.innerText=''; firstCard=null; }, 800);
                        }
                    }
                }
            };
            board.appendChild(card);
        });
    </script>
</body>
</html>