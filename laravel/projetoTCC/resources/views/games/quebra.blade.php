<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Quebra-Cabeça</title>
    <style>
        body{ font-family:Arial; text-align:center; background:#f0f0f0; }
        .piece { width:100px; height:100px; display:inline-block; margin:5px; background:#ccc; line-height:100px; font-size:30px; cursor:pointer; border-radius:10px; }
    </style>
</head>
<body>
    <h2>Monte a sequência: 1 2 3 4</h2>
    <div id="board"></div>

    <script>
        let numbers=[1,2,3,4].sort(()=>Math.random()-0.5);
        const board=document.getElementById('board');
        let selected=[];
        numbers.forEach(n=>{
            let p=document.createElement('div');
            p.className='piece';
            p.innerText=n;
            p.onclick=()=>{
                selected.push(n);
                p.style.background='#7CFC00';
                if(selected.length===4){
                    if(selected.join('')==='1234') alert('Parabéns!');
                    else alert('Tente novamente!');
                    location.reload();
                }
            };
            board.appendChild(p);
        });
    </script>
</body>
</html>