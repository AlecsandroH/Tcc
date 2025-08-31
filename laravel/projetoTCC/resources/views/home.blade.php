<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pagina Inicial</title>
    <!--Link Favicons-->
    <link rel="icon" href="{{asset('favicons/favicon.ico.png')}}" type="image/png">
    <link rel="icon" href="{{asset('favicons/apple-touch-icon.png')}}" type="image/png">
    <link rel="icon" href="{{asset('favicons/favicon-16x16.png')}}" type="image/png">
    <link rel="icon" href="{{asset('favicons/favicon-32x32.png')}}" type="image/png">
      
       <!--Link css-->
    <link href="{{asset('css/botoes.css')}}" rel="stylesheet">
    <link href="{{asset('css/cssimage.css')}}" rel="stylesheet">
    <link href="{{asset('css/csspadrao.css')}}" rel="stylesheet">
    <link href="{{asset('css/textos.css')}}" rel="stylesheet">
     <link href="{{asset('css/carroseulinicio.css')}}" rel="stylesheet">
    <link href="{{asset('css/inicio.css')}}" rel="stylesheet">
    <link href="{{asset('css/reset.css')}}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;700&family=Montserrat:wght@400;600;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;700&family=Montserrat:wght@400;600;700&display=swap" rel="stylesheet">

    
  
   
</head>
<body>
    <header class="div-cabecalho">
        <a href="/" class="logo">
            <span class="logo-icon"><img src="imagens/testelogonome.png" alt="logo" width="50%" height="50%"></span>
        </a>
        
        <ul class="nav-links">
            <li><a href="/">Início</a></li>
            <li><a href="/tutorial">Tutorial</a></li>
            <li><a href="/sobrenos">Sobre Nós</a></li>
            <li><a href="/atividades">Atividades</a></li>
            <li><a href="/convivendocomtea">Convivendo com TEA</a></li>
            <li><a href="/telaoqautismo">O que é o autismo</a></li>
        </ul>

</header>
    <div class="hero-section">
        <div class="cabeçalho-imagem">
            <img src="imagens/mapa.jpg" alt="Imagem representativa">
        </div>
        <div class="cabeçalho-texto">
            <h1>Bem-vindo ao Apoio Azul</h1>
            <p> Conectando e Informando </p>
<p>Dedicamos esse espaço ao apoio e comunidade reunindo recursos e informações relacionadas ao TEA, valorizando o que é importante para o desenvolvimento e cotidiano.</p>
        </div>
    </div>

    <div class="div-meio">
        <div class="textos-inicio">
            <h2>Recursos e Informações</h2>
        </div>
        
        <div class="container">
            <div class="manual-item">
                <h2>Informações de Apoio</h2>
                <p>Material completo com orientações e recursos disponíveis para apoio e assistência em diversas situações.</p>
            </div>
            
            <div class="manual-item">
                <h2>Dúvidas Frequentes</h2>
                <p> Como é feito o diagnóstico?<br><br>
                     O Autismo possuí graus? Quais?<br><br>
                    Crianças com autismo possuem quais dificuldades com aprendizado?<br><br>
                    Como é feito o tratamento?<br>
                    </p>
            </div>
            
            <div class="manual-item">
                <h2>Leis e Direitos</h2>
                <p><li>Benefício de Prestação Continuada (BPC/LOAS)<br><br></li>
                <li>Carteira de Identificação do Autista (CIA)<br><br></li>
                <li>Acompanhamento Psicopedagógico</li><br>
                <li>Atendimento prioritário</li><br>
                <li>Inclusão escolar</li><br><br>    

                </p>
            </div>
        </div>
        
        <button id="btn-inicio-oqautismo" onclick="window.location.href='/telaoqautismo';">
            O que é Autismo
        </button>

    <div class="pages-carousel">
    <h2>Nossas Páginas</h2>
    
    <button class="page-arrow left" onclick="scrollPages(-1)">‹</button>
    <button class="page-arrow right" onclick="scrollPages(1)">›</button>
    
    <div class="pages-wrapper" id="pagesWrapper">
        <div class="page-card">
            <img src="{{ asset('imagens/cores.jpg') }}" alt="Tutorial">
            <div class="page-body">
                <h4>Tutorial</h4>
                <p>Aprenda a usar o site</p>
                   <br/>
                <a href="/tutorial" class ="btnvermais">Ver mais</a>
            </div>
        </div>

        <div class="page-card">
            <img src="{{ asset('imagens/memoria.jpg') }}" alt="Sobre nós">
            <div class="page-body">
                <h4>Sobre Nós</h4>
                <p>Conheça o projeto</p>
                <br/>
                <br/>
                <a href="/sobrenos" class ="btnvermais">Ver mais</a>
            </div>
        </div>

        <div class="page-card">
            <img src="{{ asset('imagens/objetos.jpg') }}" alt="Atividades">
            <div class="page-body">
                <h4>Atividades</h4>
                <p>Explore nossas atividades</p>
</br>
                <a href="/atividades" class ="btnvermais">Ver mais</a>
            </div>
        </div>

        <div class="page-card">
            <img src="{{ asset('imagens/quebra.jpg') }}" alt="Convivendo com TEA">
            <div class="page-body">
                <h4>Convivendo com TEA</h4>
                Dicas para o cotidiano</br>
                <br/>
                <a href="/convivendocomtea" class ="btnvermais">Ver mais</a>
            </div>
        </div>

        <div class="page-card">
            <img src="{{ asset('imagens/quebra.jpg') }}" alt="Autismo">
            <div class="page-body">
                <h4>O que é o Autismo</h4>
                <p>Saiba mais sobre o TEA</p>
                
                <a href="/telaoqautismo" class ="btnvermais">Ver mais</a>
            </div>
        </div>
    </div>
</div>


    <div class="div-inicio-direitos">
        <div class="div-direitos-texto">
            <h3>Direitos e Informações</h3>
            <p>Conteúdo informativo sobre direitos e recursos disponíveis</p>
        </div>
        <button id="btn-inicio-convivendocomtea" onclick="window.location.href='/convivendocomtea';">
            Convivendo com TEA
        </button>
    </div>


<script src="js/carroseulinicio.js"></script>

        
</div>
</div>






    <footer class="div-final">

        <ul class="nav-links">
            <li><a href="/">Início</a></li>
            <li><a href="/tutorial">Tutorial</a></li>
            <li><a href="/sobrenos">Sobre Nós</a></li>
            <li><a href="/atividades">Atividades</a></li>
            <li><a href="/convivendocomtea">Convivendo com TEA</a></li>
            <li><a href="/telaoqautismo">O que é o autismo</a></li>
        </ul>


            <span class="logo-icon"><img src="favicons/apple-touch-icon.png" alt="logo" width="50%" height="50%"></span>
        
</footer>
   
</body>
</html>