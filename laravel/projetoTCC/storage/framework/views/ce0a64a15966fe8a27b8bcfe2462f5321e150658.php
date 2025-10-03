<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Caça ao Objeto</title>
    <style>
        body{ font-family: Arial; text-align:center; background:#f0f0f0; }
        .obj { width:80px; height:80px; display:inline-block; margin:10px; cursor:pointer; border-radius:10px; font-size:40px; }
    </style>
</head>
<body>
    <h2>Encontre o objeto: <span id="target"></span></h2>
    <div id="objects"></div>

    <script>
        const items = ['🍎','🍌','🍇','🍉','🍓'];
        const target = items[Math.floor(Math.random()*items.length)];
        document.getElementById('target').innerText=target;
        const div = document.getElementById('objects');
        let shuffled = [...items].sort(()=>Math.random()-0.5);
        shuffled.forEach(i=>{
            let obj=document.createElement('div');
            obj.className='obj';
            obj.innerText=i;
            obj.onclick=()=>{ if(i===target) alert('Parabéns!'); else alert('Tente novamente!'); };
            div.appendChild(obj);
        });
    </script>
</body>
</html><?php /**PATH C:\Users\STI\Documents\GitHub\Nova pasta\Tcc\laravel\projetoTCC\resources\views/games/objetos.blade.php ENDPATH**/ ?>