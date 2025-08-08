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
<body class="bg-gray-100">

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
    <!-- Conteúdo principal do seu site -->
    <div class="container mx-auto px-4 py-8">
        <h1 class="text-3xl font-bold mb-6">Meu Site Principal</h1>
        
<!-- Botão para abrir o fórum -->
<button data-open-forum class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700 mb-6">
    Abrir Fórum
</button>


        <!-- Área onde as postagens recentes aparecerão -->
        <div id="recentPosts" class="mb-8">
            <h2 class="text-xl font-semibold mb-4">Postagens Recentes</h2>
            <div id="postsContainer" class="space-y-4">
                @foreach($posts as $post)
                    @include('partials.post', ['post' => $post])
                @endforeach
            </div>
        </div>
        
        <!-- Restante do conteúdo do seu site -->
        <div class="bg-white p-6 rounded-lg shadow">
            <p>Conteúdo principal do seu site aqui...</p>
        </div>
    </div>
    
    <!-- Modal do Fórum -->
    <div id="forumModal" class="forum-modal">
        <div class="forum-content">
            <div class="flex justify-between items-center mb-4">
                <h2 class="text-2xl font-bold">Fórum Rápido</h2>
                <button onclick="forum.close()"class="text-gray-500 hover:text-gray-700">
                    ✕
                </button>
            </div>
            
            <!-- Formulário de postagem -->
            <form id="postForm" class="mb-6">
                @csrf
                <div class="mb-4">
                    <label for="author_name" class="block text-sm font-medium text-gray-700">Nome (opcional)</label>
                    <input type="text" name="author_name" id="author_name" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                </div>
                <div class="mb-4">
                    <label for="content" class="block text-sm font-medium text-gray-700">Mensagem</label>
                    <textarea name="content" id="content" rows="3" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" required></textarea>
                </div>
                <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">Postar</button>
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

</body>
</html>