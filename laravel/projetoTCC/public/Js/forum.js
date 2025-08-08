// Verifica se o token CSRF existe
function getCsrfToken() {
    const metaTag = document.querySelector('meta[name="csrf-token"]');
    if (!metaTag) {
        console.error('Meta tag CSRF não encontrada!');
        return null;
    }
    return metaTag.content;
}

// Gera ou recupera um token único para o usuário
function getUserToken() {
    let token = document.cookie.replace(/(?:(?:^|.*;\s*)forum_user_token\s*=\s*([^;]*).*$)|^.*$/, "$1");
    
    if (!token) {
        token = 'user_' + Math.random().toString(36).substring(2, 15);
        document.cookie = `forum_user_token=${token}; path=/; max-age=${60*60*24*30}`; // 30 dias
    }
    
    return token;
}

// Função principal quando o DOM estiver carregado
document.addEventListener('DOMContentLoaded', function() {
    // Elementos do DOM
    const forumModal = document.getElementById('forumModal');
    const postForm = document.getElementById('postForm');
    
    if (!forumModal || !postForm) {
        console.error('Elementos do fórum não encontrados!');
        return;
    }

    // Funções do fórum
    const forum = {
        userToken: getUserToken(),
            
        open: function() {
            forumModal.style.display = 'flex';
            this.fetchPosts();
        },
        
        close: function() {
            forumModal.style.display = 'none';
        },
        
        fetchPosts: async function() {
            try {
                const response = await fetch('/posts');
                if (!response.ok) throw new Error('Erro ao buscar posts');
                
                const posts = await response.json();
                this.updatePosts(posts);
            } catch (error) {
                console.error('Erro ao carregar posts:', error);
            }
        },
        
        // Função para deletar post
        deletePost: async function(postId) {
            if (!confirm('Tem certeza que deseja deletar esta postagem?')) {
                return;
            }
            
            try {
                const response = await fetch(`/posts/${postId}`, {
                    method: 'DELETE',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': getCsrfToken(),
                        'X-Requested-With': 'XMLHttpRequest'
                    },
                    body: JSON.stringify({ 
                        user_token: this.userToken 
                    })
                });
                
                const result = await response.json();
                
                if (result.success) {
                    this.fetchPosts(); // Atualiza a lista após deletar
                } else {
                    console.error('Erro ao deletar post:', result);
                    alert('Não foi possível deletar a postagem. Você só pode deletar suas próprias postagens.');
                }
            } catch (error) {
                console.error('Erro ao deletar post:', error);
                alert('Ocorreu um erro ao tentar deletar a postagem.');
            }
        },
        
        updatePosts: function(posts) {
            const renderPost = (post) => {
                const date = new Date(post.created_at);
                const isOwner = post.user_token === this.userToken;
                
                return `
                    <div class="bg-white p-4 rounded-lg shadow mb-4 relative">
                        <div class="flex justify-between items-start">
                            <h3 class="font-semibold">${post.author_name || 'Anônimo'}</h3>
                            <span class="text-sm text-gray-500">
                                ${date.toLocaleString()}
                            </span>
                        </div>
                        <p class="mt-2 text-gray-800">${post.content}</p>
                        
                        ${isOwner ? `
                        <button onclick="forum.deletePost('${post.id}')" 
                                class="absolute top-2 right-2 text-red-500 hover:text-red-700 text-sm"
                                title="Deletar minha postagem">
                            Deletar
                        </button>
                        ` : ''}
                    </div>
                `;
            };
            
            const containers = [
                'modalPostsContainer',
                'postsContainer'
            ];
            
            containers.forEach(containerId => {
                const container = document.getElementById(containerId);
                if (container) {
                    container.innerHTML = posts.map(renderPost).join('');
                }
            });
        },
        
        submitForm: async function(e) {
            e.preventDefault();
            
            const form = e.target;
            const formData = new FormData(form);
            const csrfToken = getCsrfToken();
            
            // Adiciona o token do usuário ao FormData
            formData.append('user_token', this.userToken);
            
            if (!csrfToken) {
                console.error('Token CSRF não disponível');
                return;
            }
            
            try {
                const response = await fetch('/posts', {
                    method: 'POST',
                    body: formData,
                    headers: {
                        'X-Requested-With': 'XMLHttpRequest',
                        'X-CSRF-TOKEN': csrfToken
                    }
                });
                
                const result = await response.json();
                
                if (result.success) {
                    form.reset();
                    this.fetchPosts();
                } else {
                    console.error('Erro no servidor:', result);
                }
            } catch (error) {
                console.error('Erro ao enviar post:', error);
            }
        }
    };
    
    // Event listeners
    postForm.addEventListener('submit', (e) => forum.submitForm(e));
    
    // Botões de abrir/fechar (se existirem)
    document.querySelectorAll('[data-open-forum]').forEach(btn => {
        btn.addEventListener('click', () => forum.open());
    });
    
    document.querySelectorAll('[data-close-forum]').forEach(btn => {
        btn.addEventListener('click', () => forum.close());
    });
    
    // Atualização periódica (opcional)
    setInterval(() => forum.fetchPosts(), 30000);
    
    // Disponibiliza o objeto forum globalmente para debug
    window.forum = forum;
});