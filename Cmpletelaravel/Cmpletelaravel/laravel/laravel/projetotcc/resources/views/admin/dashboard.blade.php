<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin - Fórum</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        .navbar .dropdown-toggle {
            transition: all 0.3s ease;
            border: none;
            background: none;
            color: white;
        }
        .navbar .dropdown-toggle:hover {
            background-color: rgba(255,255,255,0.1);
            border-radius: 5px;
        }
        .dropdown-item {
            transition: all 0.2s ease;
        }
        .dropdown-item:hover {
            background-color: #007bff;
            color: white;
        }
        .avatar-nav {
            width: 32px;
            height: 32px;
            object-fit: cover;
            border: 2px solid rgba(255,255,255,0.3);
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="#">Admin Dashboard</a>
            
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('forum.index') }}">Voltar ao Fórum</a>
                    </li>
                    
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle d-flex align-items-center" href="#" role="button" 
                           data-bs-toggle="dropdown" aria-expanded="false">
                            <img src="{{ Auth::guard('forum')->user()->avatar_url }}" 
                                 alt="Avatar" 
                                 class="rounded-circle avatar-nav me-2">
                            <span class="me-2">{{ Auth::guard('forum')->user()->nome }}</span>
                            <span class="badge bg-danger">ADMIN</span>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li><a class="dropdown-item" href="{{ route('forum.profile') }}">
                                <i class="fas fa-user me-2"></i>Meu Perfil
                            </a></li>
                            <li><a class="dropdown-item" href="{{ route('forum.index') }}">
                                <i class="fas fa-comments me-2"></i>Ir para o Fórum
                            </a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li>
                                <form method="POST" action="{{ route('forum.logout') }}" id="logout-form">
                                    @csrf
                                    <button type="submit" class="dropdown-item">
                                        <i class="fas fa-sign-out-alt me-2"></i>Sair
                                    </button>
                                </form>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container-fluid mt-4">
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        <div class="row">
            <!-- Stats Cards -->
            <div class="col-md-3 mb-4">
                <div class="card bg-primary text-white">
                    <div class="card-body">
                        <h5>Total Posts</h5>
                        <h2>{{ $totalPosts }}</h2>
                    </div>
                </div>
            </div>
            <div class="col-md-3 mb-4">
                <div class="card bg-success text-white">
                    <div class="card-body">
                        <h5>Total Comentários</h5>
                        <h2>{{ $totalComentarios }}</h2>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <!-- Gráfico Postagens -->
            <div class="col-md-6 mb-4">
                <div class="card">
                    <div class="card-header">
                        <h5>Postagens por Data</h5>
                    </div>
                    <div class="card-body">
                        <canvas id="postagensChart" width="400" height="200"></canvas>
                    </div>
                </div>
            </div>

            <!-- Gráfico Comentários -->
            <div class="col-md-6 mb-4">
                <div class="card">
                    <div class="card-header">
                        <h5>Comentários por Data</h5>
                    </div>
                    <div class="card-body">
                        <canvas id="comentariosChart" width="400" height="200"></canvas>
                    </div>
                </div>
            </div>
        </div>

        <!-- Posts Recentes -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h5>Posts Recentes</h5>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>Título</th>
                                        <th>Autor</th>
                                        <th>Data</th>
                                        <th>Comentários</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($postsRecentes as $post)
                                    <tr>
                                        <td>{{ Str::limit($post->titulo, 50) }}</td>
                                        <td>{{ $post->forum->nome }}</td>
                                        <td>{{ $post->created_at->format('d/m/Y H:i') }}</td>
                                        <td>{{ $post->comentarios->count() }}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Scripts do Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    
    <script>
        // Inicializar dropdowns
        document.addEventListener('DOMContentLoaded', function() {
            // Inicializar todos os dropdowns
            var dropdownElementList = [].slice.call(document.querySelectorAll('.dropdown-toggle'));
            var dropdownList = dropdownElementList.map(function (dropdownToggleEl) {
                return new bootstrap.Dropdown(dropdownToggleEl);
            });

            // Gráfico de Postagens
            const postagensCtx = document.getElementById('postagensChart').getContext('2d');
            if (postagensCtx) {
                new Chart(postagensCtx, {
                    type: 'line',
                    data: {
                        labels: {!! json_encode($postagensPorData->pluck('data')) !!},
                        datasets: [{
                            label: 'Postagens',
                            data: {!! json_encode($postagensPorData->pluck('total')) !!},
                            borderColor: 'rgb(75, 192, 192)',
                            tension: 0.1
                        }]
                    }
                });
            }

            // Gráfico de Comentários
            const comentariosCtx = document.getElementById('comentariosChart').getContext('2d');
            if (comentariosCtx) {
                new Chart(comentariosCtx, {
                    type: 'bar',
                    data: {
                        labels: {!! json_encode($comentariosPorData->pluck('data')) !!},
                        datasets: [{
                            label: 'Comentários',
                            data: {!! json_encode($comentariosPorData->pluck('total')) !!},
                            backgroundColor: 'rgb(54, 162, 235)'
                        }]
                    }
                });
            }

            // Auto-dismiss alerts
            setTimeout(() => {
                const alerts = document.querySelectorAll('.alert');
                alerts.forEach(alert => {
                    const bsAlert = new bootstrap.Alert(alert);
                    bsAlert.close();
                });
            }, 5000);

            // Prevenir submit duplo no logout
            const logoutForm = document.getElementById('logout-form');
            if (logoutForm) {
                logoutForm.addEventListener('submit', function(e) {
                    const button = this.querySelector('button');
                    button.disabled = true;
                    button.innerHTML = '<i class="fas fa-spinner fa-spin me-2"></i>Saindo...';
                });
            }
        });
    </script>
</body>
</html>