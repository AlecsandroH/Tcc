  const emojis = ['🍎', '🍌', '🍇', '🍉', '🍒', '🍓', '🍊', '🍋'];
        let cards = [...emojis, ...emojis];
        let board = document.getElementById('board');
        let firstCard = null;
        let lockBoard = false;
        let matchedPairs = 0;
        const winMessage = document.getElementById('winMessage');
        const btnJogarNovamente = document.getElementById('btnJogarNovamente');

 
        iniciarJogo();

    
        btnJogarNovamente.addEventListener('click', iniciarJogo);

        function iniciarJogo() {
        
            board.innerHTML = '';
            matchedPairs = 0;
            winMessage.style.display = 'none';
            
     
            cards.sort(() => Math.random() - 0.5);

      
            cards.forEach(emoji => {
                const card = document.createElement('div');
                card.className = 'memory-card';
                card.dataset.emoji = emoji;
                
                const cardInner = document.createElement('div');
                cardInner.className = 'memory-card-inner';
                
                const cardFront = document.createElement('div');
                cardFront.className = 'memory-card-front';
                cardFront.textContent = '?';
                
                const cardBack = document.createElement('div');
                cardBack.className = 'memory-card-back';
                cardBack.textContent = emoji;
                
                cardInner.appendChild(cardFront);
                cardInner.appendChild(cardBack);
                card.appendChild(cardInner);
                
                card.addEventListener('click', flipCard);
                board.appendChild(card);
            });

        
            mostrarCartasInicialmente();
        }

        function mostrarCartasInicialmente() {
            const allCards = document.querySelectorAll('.memory-card');
            
            
            allCards.forEach(card => {
                card.classList.add('flipped');
            });

            setTimeout(() => {
                allCards.forEach(card => {
                    card.classList.remove('flipped');
                });
            }, 3000);
        }

        function flipCard() {
            if (lockBoard) return;
            if (this === firstCard) return;
            if (this.classList.contains('flipped')) return;

            this.classList.add('flipped');

            if (!firstCard) {
                firstCard = this;
                return;
            }

            secondCard = this;
            checkForMatch();
        }

        function checkForMatch() {
            const isMatch = firstCard.dataset.emoji === secondCard.dataset.emoji;

            if (isMatch) {
                disableCards();
                matchedPairs++;
                if (matchedPairs === emojis.length) {
                    setTimeout(() => {
                        winMessage.style.display = 'flex';
                    }, 500);
                }
            } else {
                unflipCards();
            }
        }

        function disableCards() {
            setTimeout(() => {
                firstCard.classList.add('matched');
                secondCard.classList.add('matched');
                firstCard.removeEventListener('click', flipCard);
                secondCard.removeEventListener('click', flipCard);
                resetBoard();
            }, 500); 
        }

        function unflipCards() {
            lockBoard = true;
            setTimeout(() => {
                firstCard.classList.remove('flipped');
                secondCard.classList.remove('flipped');
                resetBoard();
            }, 1000);
        }

        function resetBoard() {
            [firstCard, lockBoard] = [null, false];
        }