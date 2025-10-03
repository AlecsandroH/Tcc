<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fórum</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        .post-card {
            border: 1px solid #ddd;
            border-radius: 10px;
            padding: 20px;
            margin-bottom: 20px;
            background: white;
        }
        .comentario-card {
            background: #f8f9fa;
            border-radius: 5px;
            padding: 15px;
            margin: 10px 0;
        }
        .admin-badge {
            background: #dc3545;
            color: white;
            padding: 2px 8px;
            border-radius: 3px;
            font-size: 12px;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="/">Fórum</a>
            
            <div class="navbar-nav ms-auto">
            {{-- Na navbar, substitua esta parte --}}
@auth('forum')
    <div class="navbar-nav ms-auto">
        <div class="nav-item dropdown">
            <a class="nav-link dropdown-toggle d-flex align-items-center" href="#" role="button" 
               data-bs-toggle="dropdown" aria-expanded="false">
                <img src="{{ Auth::guard('forum')->user()->avatar_url }}" 
                     alt="Avatar" 
                     class="rounded-circle me-2" 
                     style="width: 32px; height: 32px; object-fit: cover;">
                <span class="me-2">{{ Auth::guard('forum')->user()->nome }}</span>
                @if(Auth::guard('forum')->user()->email === 'admin@forum.com')
                    <span class="badge bg-danger ms-1">ADMIN</span>
                @endif
            </a>
            <ul class="dropdown-menu dropdown-menu-end">
                <li><a class="dropdown-item" href="{{ route('forum.profile') }}">
                    <i class="fas fa-user me-2"></i>Meu Perfil
                </a></li>
                
                @if(Auth::guard('forum')->user()->email === 'admin@forum.com')
                <li><a class="dropdown-item" href="{{ route('forum.admin.dashboard') }}">
                    <i class="fas fa-chart-bar me-2"></i>Dashboard Admin
                </a></li>
                @endif
                
                <li><hr class="dropdown-divider"></li>
                <li>
                    <form method="POST" action="{{ route('forum.logout') }}" class="d-inline">
                        @csrf
                        <button type="submit" class="dropdown-item">
                            <i class="fas fa-sign-out-alt me-2"></i>Sair
                        </button>
                    </form>
                </li>
            </ul>
        </div>
    </div>
@endauth
            </div>
        </div>
    </nav>

    <div class="container mt-4">
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        @auth('forum')
        <div class="card mb-4">
            <div class="card-header">
                <h5>Criar Nova Postagem</h5>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('forum.post.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <input type="text" class="form-control" name="titulo" placeholder="Título" required>
                    </div>
                    <div class="mb-3">
                        <textarea class="form-control" name="conteudo" rows="3" placeholder="Conteúdo" required></textarea>
                    </div>
                    <div class="mb-3">
                        <input type="file" class="form-control" name="imagem" accept="image/*">
                    </div>
                    <button type="submit" class="btn btn-primary">Publicar</button>
                </form>
            </div>
        </div>
        @endauth

        <div class="posts-container">
            @foreach($posts as $post)
            <div class="post-card">
                <div class="d-flex justify-content-between align-items-center mb-2">
                    <h5>{{ $post->titulo }}</h5>
                    <small class="text-muted">{{ $post->created_at->format('d/m/Y H:i') }}</small>
                </div>
                
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <span class="text-primary">{{ $post->forum->nome }}</span>
                    @if(Auth::guard('forum')->check() && 
                       (Auth::guard('forum')->id() === $post->forum_id || 
                        Auth::guard('forum')->user()->email === 'admin@forum.com'))
                    <form method="POST" action="{{ route('forum.post.destroy', $post) }}">
                        @csrf @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" 
                                onclick="return confirm('Tem certeza?')">Excluir</button>
                    </form>
                    @endif
                </div>

                <p>{{ $post->conteudo }}</p>

                @if($post->imagem)
                <div class="mb-3">
                    <img src="{{ asset('storage/' . $post->imagem) }}" alt="Imagem do post" 
                         class="img-fluid rounded" style="max-height: 300px;">
                </div>
                @endif

                <hr>
        
                <div class="comentarios-section">
                    <h6>Comentários ({{ $post->comentarios->count() }})</h6>
                    
                    @auth('forum')
                    <form method="POST" action="{{ route('forum.comentario.store', $post) }}" class="mb-3">
                        @csrf
                        <div class="input-group">
                            <input type="text" class="form-control" name="conteudo" placeholder="Adicionar comentário" required>
                            <button type="submit" class="btn btn-outline-primary">Comentar</button>
                        </div>
                    </form>
                    @endauth

                    @foreach($post->comentarios as $comentario)
                    <div class="comentario-card">
                        <div class="d-flex justify-content-between align-items-center">
                            <strong>{{ $comentario->forum->nome }}</strong>
                            <small>{{ $comentario->created_at->format('H:i - d/m') }}</small>
                        </div>
                        <p class="mb-1">{{ $comentario->conteudo }}</p>
                        
                        @if(Auth::guard('forum')->check() && 
                           (Auth::guard('forum')->id() === $comentario->forum_id || 
                            Auth::guard('forum')->user()->email === 'admin@forum.com'))
                        <form method="POST" action="{{ route('forum.comentario.destroy', $comentario) }}">
                            @csrf @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm mt-1" 
                                    onclick="return confirm('Excluir comentário?')">Excluir</button>
                        </form>
                        @endif
                    </div>
                    @endforeach
                </div>
            </div>
            @endforeach
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Auto-dismiss alerts after 5 seconds
        setTimeout(() => {
            const alerts = document.querySelectorAll('.alert');
            alerts.forEach(alert => {
                const bsAlert = new bootstrap.Alert(alert);
                bsAlert.close();
            });
        }, 5000);
    </script>
</body>
</html>