<!DOCTYPE html>
<html>
<head>
     <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Fórum Dos Pais</title>
    <!--Link Favicons-->
    <link rel="icon" href="{{asset('favicons/favicon.ico.png')}}" type="image/png">
    <link rel="icon" href="{{asset('favicons/apple-touch-icon.png')}}" type="image/png">
    <link rel="icon" href="{{asset('favicons/favicon-16x16.png')}}" sizes="16x16" type="image/png">
    <link rel="icon" href="{{asset('favicons/favivon-32x32.png')}}" sizes="32x32" type="image/png">

    <!--Link css-->
    <link href="{{asset('css/botoes.css')}}" rel="stylesheet">
    <link href="{{asset('css/cssimage.css')}}" rel="stylesheet">
    <link href="{{asset('css/csspadrao.css')}}" rel="stylesheet">
    <link href="{{asset('css/textos.css')}}" rel="stylesheet">
    <link href="{{asset('css/forum.css')}}" rel="stylesheet">

</head>
<body>


<div class="div-cabecalho">
        <a href="/" class="logo">
            <span class="logo-icon"><img src="favicons/apple-touch-icon.png" alt="logo" width="50%" height="50%"></span>
        </a>

        
        <ul class="nav-links">
            <li><a href="/">Início</a></li>
            <li><a href="#">Tutorial</a></li>
            <li><a href="#">Sobre agente</a></li>
            <li><a href="#">Atividades</a></li>
            <li><a href="/convivendocomtea">Convivendo com TEA</a></li>
            <li><a href="/telaoqautismo">O que é o autismo</a></li>
        </ul>

</div>

<div class="div-meio">


    <div class="container mx-auto px-4 py-8">
        <h1 class="text-3xl font-bold mb-6">Converse com outras pessoas!</h1>
        
<!-- Botão para abrir o fórum -->
 <h2>Escreva como é sua experiencia, vivendo com um TEA</h2>
<button data-open-forum class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700 mb-6">
Sua experiencia
</button>


        <!-- Área onde as postagens recentes aparecerão -->
        <div id="recentPosts" class="mb-8">
            <h2>Postagens Recentes</h2>
            <div id="postsContainer" class="space-y-4">
                @foreach($posts as $post)
                    @include('partials.post', ['post' => $post])
                @endforeach
            </div>
        </div>
        

    </div>
    
    <!-- Modal do Fórum -->
    <div id="forumModal" class="forum-modal" >
        <div class="forum-content">
            <div class="flex justify-between items-center mb-4" style="display: flex; align-items: center; justify-content: space-between; margin-bottom: 1rem;">
                <h2 class="text-2xl font-bold">Fórum Rápido</h2>
<button onclick="forum.close()" >
    ✕
</button>
            </div>
            
            <!-- Formulário de postagem -->
<form id="postForm">
    @csrf
    <div class="form-message-group">
        <label for="author_name" id="sim" >Nome (opcional): </label>
        <input type="text" name="author_name" id="author_name" placeholder="Digite seu nome">
    </div>
    <div class="form-message-group">
        <label for="content">Mensagem: </label>
        <textarea name="content" id="content" rows="3" placeholder="Conte-nos Sua experiencia" required></textarea>
    </div>
    <button type="submit"><b>Postar</b></button>
</form>
            
            <!-- Lista de posts no modal -->
            <div id="modalPostsContainer" class="space-y-4">
                @foreach($posts as $post)
                    @include('partials.post', ['post' => $post])
                @endforeach
            </div>
        </div>
    </div>


    <!--Scripts/javascript-->
    <script src="/js/forum.js"> </script>

</div>
        <div class="div-final">
        <span class="font">
        <ul class="nav-links">
            <li><a href="/">Início</a></li>
            <li><a href="#">Tutorial</a></li>
            <li><a href="#">Sobre agente</a></li>
            <li><a href="#">Atividades</a></li>
            <li><a href="/convivendocomtea">Convivendo com TEA</a></li>
            <li><a href="/telaoqautismo">O que é o autismo</a></li>
        </ul>
        </span>

            <span class="logo-icon"><img src="favicons/apple-touch-icon.png" alt="logo" width="50%" height="50%"></span>
        
    </div>
   

</body>
</html>