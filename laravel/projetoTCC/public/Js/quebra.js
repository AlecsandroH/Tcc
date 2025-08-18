(function(){
    const board = document.getElementById('board');
    const tray = document.getElementById('tray');
    const overlay = document.getElementById('overlay');
    const btnAgain = document.getElementById('btnAgain');
    const btnShuffle = document.getElementById('btnShuffle');
    const levelSelect = document.getElementById('levelSelect');
    const imageSelect = document.getElementById('imageSelect');
    const imageUpload = document.getElementById('imageUpload');

    let GRID = parseInt(levelSelect.value);
    let IMG_URL = imageSelect.value;
    document.documentElement.style.setProperty('--grid', GRID);

    const slots = [];
    const state = { placed: Array(GRID*GRID).fill(null) };

      function updateSelectText() {
        // Remove qualquer opção de dispositivo existente
        const deviceOption = document.querySelector('option[value="device"]');
        if (deviceOption) {
            deviceOption.remove();
        }
        
        // Adiciona a nova opção
        const option = document.createElement('option');
        option.value = "device";
        option.textContent = "Imagem do dispositivo";
        option.selected = true;
        imageSelect.insertBefore(option, imageSelect.firstChild);
    }

    // Carregar imagem personalizada
    imageUpload.addEventListener('change', function(e) {
        const file = e.target.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function(event) {
                IMG_URL = event.target.result;
                updateSelectText(); // Atualiza o texto do select
                initGame();
            }
            reader.readAsDataURL(file);
        }
    });

    imageSelect.onchange = function() {
        if (this.value !== "device") {
            IMG_URL = this.value;
            imageUpload.value = ''; // Limpa upload
            
            // Remove a opção de dispositivo se existir
            const deviceOption = document.querySelector('option[value="device"]');
            if (deviceOption) {
                deviceOption.remove();
            }
            
            initGame();
        }
    };

    function createBoard(){
        board.innerHTML = '';
        slots.length = 0;
        for(let i=0; i<GRID*GRID; i++){
            const slot = document.createElement('div');
            slot.className = 'slot';
            slot.dataset.index = i;
            slot.addEventListener('dragover', e => e.preventDefault());
            slot.addEventListener('drop', onDropSlot);
            board.appendChild(slot);
            slots.push(slot);
        }
        board.style.backgroundImage = `url('${IMG_URL}')`;
    }

    function createPieces(){
        tray.innerHTML = '';
        
        const pieceSize = (360 - (8 * (GRID + 1))) / GRID;
        const coords = [];
        
        for(let r=0; r<GRID; r++){
            for(let c=0; c<GRID; c++){
                coords.push({r,c});
            }
        }
        
        shuffle(coords).forEach(({r,c}) => {
            const piece = document.createElement('div');
            piece.className = 'piece';
            piece.draggable = true;
            
            piece.style.width = `${pieceSize}px`;
            piece.style.height = `${pieceSize}px`;
            
            const correctIndex = r*GRID + c;
            piece.dataset.correct = correctIndex;
            
            const xPos = (c / (GRID-1)) * 100;
            const yPos = (r / (GRID-1)) * 100;
            
            piece.style.backgroundImage = `url('${IMG_URL}')`;
            piece.style.backgroundPosition = `${xPos}% ${yPos}%`;
            piece.style.backgroundSize = `${GRID * 100}% ${GRID * 100}%`;

            piece.addEventListener('dragstart', e => {
                e.dataTransfer.setData('piece', correctIndex);
                e.dataTransfer.setData('id', ensureId(piece));
            });
            
            tray.appendChild(piece);
        });
    }

    function ensureId(el){ if(!el.id) el.id = 'p_'+Math.random().toString(36).slice(2,9); return el.id; }

    function onDropSlot(e){
        e.preventDefault();
        if(this.children.length) return;
        const id = e.dataTransfer.getData('id');
        const piece = document.getElementById(id);
        const correct = parseInt(piece.dataset.correct);
        const slotIndex = parseInt(this.dataset.index);
        if(correct === slotIndex){
            this.appendChild(piece);
            state.placed[slotIndex] = correct;
            piece.draggable = false;
            checkWin();
        }
    }

    function checkWin(){
        if(state.placed.every((v,i)=> v===i)){
            overlay.classList.add('active');
        }
    }

    function shufflePieces(){
        state.placed.fill(null);
        slots.forEach(s=>{ if(s.firstChild) tray.appendChild(s.firstChild); });
        const arr = Array.from(tray.children);
        shuffle(arr).forEach(el=> tray.appendChild(el));
    }

    function shuffle(array){ return array.map(v=>({v, s:Math.random()})).sort((a,b)=>a.s-b.s).map(o=>o.v); }

    function initGame() {
        GRID = parseInt(levelSelect.value);
        document.documentElement.style.setProperty('--grid', GRID);
        state.placed = Array(GRID*GRID).fill(null);
        createBoard();
        createPieces();
    }


    btnAgain.onclick = ()=>{ overlay.classList.remove('active'); shufflePieces(); };
    btnShuffle.onclick = shufflePieces;
    levelSelect.onchange = initGame;
    imageSelect.onchange = function() {
        IMG_URL = this.value;
        imageUpload.value = '';
        initGame();
    };


    initGame();
})();