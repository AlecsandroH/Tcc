<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Meu Perfil - Fórum</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .profile-card {
            border-radius: 15px;
            box-shadow: 0 0 20px rgba(0,0,0,0.1);
        }
        .avatar-container {
            position: relative;
            width: 150px;
            height: 150px;
            margin: 0 auto;
        }
        .avatar-img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            border-radius: 50%;
            border: 3px solid #007bff;
        }
        .avatar-actions {
            position: absolute;
            bottom: 0;
            right: 0;
        }
        .nav-pills .nav-link.active {
            background-color: #007bff;
        }
        .password-toggle {
            cursor: pointer;
            border: none;
            background: none;
        }
    </style>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="/">Fórum</a>
        
        <div class="navbar-nav ms-auto">
            <a class="nav-link" href="{{ route('forum.index') }}">Voltar ao Fórum</a>
            
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
    </div>
</nav>
    <div class="container mt-4">
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        @if($errors->any())
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                @foreach($errors->all() as $error)
                    <p class="mb-0">{{ $error }}</p>
                @endforeach
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        <div class="row">
            <div class="col-md-4">
                <div class="card profile-card">
                    <div class="card-body text-center">
                        <div class="avatar-container mb-3">
                            <img src="{{ $user->avatar_url }}" alt="Avatar" class="avatar-img">
                            @if($user->avatar)
                            <div class="avatar-actions">
                                <form method="POST" action="{{ route('forum.profile.avatar.delete') }}" class="d-inline">
                                    @csrf
                                    <button type="submit" class="btn btn-danger btn-sm rounded-circle" 
                                            onclick="return confirm('Remover foto de perfil?')" title="Remover foto">
                                        ×
                                    </button>
                                </form>
                            </div>
                            @endif
                        </div>
                        
                        <h4>{{ $user->nome }}</h4>
                        <p class="text-muted">{{ $user->email }}</p>
                        
                        @if($user->bio)
                            <p class="text-muted">{{ $user->bio }}</p>
                        @else
                            <p class="text-muted fst-italic">Nenhuma biografia adicionada</p>
                        @endif
                        
                        <div class="mt-3">
                            <small class="text-muted">
                                Membro desde: {{ $user->created_at->format('d/m/Y') }}
                            </small>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-8">
                <div class="card profile-card">
                    <div class="card-header">
                        <ul class="nav nav-pills card-header-pills">
                            <li class="nav-item">
                                <a class="nav-link active" href="#perfil" data-bs-toggle="tab">Editar Perfil</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#senha" data-bs-toggle="tab">Alterar Senha</a>
                            </li>
                        </ul>
                    </div>

                    <div class="card-body">
                        <div class="tab-content">
                            <!-- Aba Editar Perfil -->
                            <div class="tab-pane fade show active" id="perfil">
                                <form method="POST" action="{{ route('forum.profile.update') }}" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    
                                    <div class="mb-3">
                                        <label for="avatar" class="form-label">Foto de Perfil</label>
                                        <input type="file" class="form-control" id="avatar" name="avatar" accept="image/*">
                                        <div class="form-text">Formatos: JPG, PNG. Máximo: 2MB</div>
                                    </div>

                                    <div class="mb-3">
                                        <label for="nome" class="form-label">Nome</label>
                                        <input type="text" class="form-control" id="nome" name="nome" 
                                               value="{{ old('nome', $user->nome) }}" required>
                                    </div>

                                    <div class="mb-3">
                                        <label for="email" class="form-label">Email</label>
                                        <input type="email" class="form-control" id="email" name="email" 
                                               value="{{ old('email', $user->email) }}" required>
                                    </div>

                                    <div class="mb-3">
                                        <label for="bio" class="form-label">Biografia</label>
                                        <textarea class="form-control" id="bio" name="bio" rows="3" 
                                                  maxlength="500">{{ old('bio', $user->bio) }}</textarea>
                                        <div class="form-text"><span id="bio-counter">0</span>/500 caracteres</div>
                                    </div>

                                    <button type="submit" class="btn btn-primary">Salvar Alterações</button>
                                </form>
                            </div>

                            <!-- Aba Alterar Senha -->
                            <div class="tab-pane fade" id="senha">
                                <form method="POST" action="{{ route('forum.profile.password.update') }}">
                                    @csrf
                                    @method('PUT')
                                    
                                    <div class="mb-3">
                                        <label for="current_password" class="form-label">Senha Atual</label>
                                        <div class="input-group">
                                            <input type="password" class="form-control" id="current_password" 
                                                   name="current_password" required>
                                            <button type="button" class="btn btn-outline-secondary password-toggle" 
                                                    data-target="current_password">
                                                👁️
                                            </button>
                                        </div>
                                    </div>

                                    <div class="mb-3">
                                        <label for="new_password" class="form-label">Nova Senha</label>
                                        <div class="input-group">
                                            <input type="password" class="form-control" id="new_password" 
                                                   name="new_password" required>
                                            <button type="button" class="btn btn-outline-secondary password-toggle" 
                                                    data-target="new_password">
                                                👁️
                                            </button>
                                        </div>
                                        <div class="form-text">Mínimo 6 caracteres</div>
                                    </div>

                                    <div class="mb-3">
                                        <label for="new_password_confirmation" class="form-label">Confirmar Nova Senha</label>
                                        <div class="input-group">
                                            <input type="password" class="form-control" id="new_password_confirmation" 
                                                   name="new_password_confirmation" required>
                                            <button type="button" class="btn btn-outline-secondary password-toggle" 
                                                    data-target="new_password_confirmation">
                                                👁️
                                            </button>
                                        </div>
                                    </div>

                                    <button type="submit" class="btn btn-primary">Alterar Senha</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Contador de caracteres para biografia
        const bioTextarea = document.getElementById('bio');
        const bioCounter = document.getElementById('bio-counter');
        
        if (bioTextarea && bioCounter) {
            bioCounter.textContent = bioTextarea.value.length;
            
            bioTextarea.addEventListener('input', function() {
                bioCounter.textContent = this.value.length;
            });
        }

        // Toggle de visibilidade de senha
        document.querySelectorAll('.password-toggle').forEach(button => {
            button.addEventListener('click', function() {
                const targetId = this.getAttribute('data-target');
                const input = document.getElementById(targetId);
                
                if (input.type === 'password') {
                    input.type = 'text';
                    this.innerHTML = '🔒';
                } else {
                    input.type = 'password';
                    this.innerHTML = '👁️';
                }
            });
        });

        // Preview de imagem antes do upload
        const avatarInput = document.getElementById('avatar');
        if (avatarInput) {
            avatarInput.addEventListener('change', function(e) {
                const file = e.target.files[0];
                if (file) {
                    const reader = new FileReader();
                    reader.onload = function(e) {
                        const avatarImg = document.querySelector('.avatar-img');
                        if (avatarImg) {
                            avatarImg.src = e.target.result;
                        }
                    }
                    reader.readAsDataURL(file);
                }
            });
        }

        // Auto-dismiss alerts
        setTimeout(() => {
            document.querySelectorAll('.alert').forEach(alert => {
                alert.style.display = 'none';
            });
        }, 5000);
    </script>
</body>
</html>