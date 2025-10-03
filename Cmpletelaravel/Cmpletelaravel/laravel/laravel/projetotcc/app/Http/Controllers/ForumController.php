<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Comentario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ForumController extends Controller
{
    public function index()
    {
        $posts = Post::with(['forum', 'comentarios.forum'])->latest()->get();
        return view('forum.index', compact('posts'));
    }

    public function storePost(Request $request)
    {
        // Verificar se o usuário está logado
        if (!Auth::guard('forum')->check()) {
            return redirect()->route('forum.login')->with('error', 'Faça login para postar.');
        }

        $request->validate([
            'titulo' => 'required|string|max:255',
            'conteudo' => 'required|string',
            'imagem' => 'nullable|image|max:2048',
        ]);

        $imagemPath = null;
        if ($request->hasFile('imagem')) {
            $imagemPath = $request->file('imagem')->store('posts', 'public');
        }

        Post::create([
            'forum_id' => Auth::guard('forum')->id(),
            'titulo' => $request->titulo,
            'conteudo' => $request->conteudo,
            'imagem' => $imagemPath,
        ]);

        return redirect()->route('forum.index')->with('success', 'Post criado com sucesso!');
    }

    public function storeComentario(Request $request, Post $post)
    {
        // Verificar se o usuário está logado
        if (!Auth::guard('forum')->check()) {
            return redirect()->route('forum.login')->with('error', 'Faça login para comentar.');
        }

        $request->validate([
            'conteudo' => 'required|string',
        ]);

        Comentario::create([
            'post_id' => $post->id,
            'forum_id' => Auth::guard('forum')->id(),
            'conteudo' => $request->conteudo,
        ]);

        return redirect()->route('forum.index')->with('success', 'Comentário adicionado!');
    }

    public function destroyPost(Post $post)
    {
        if (!Auth::guard('forum')->check()) {
            return redirect()->route('forum.login')->with('error', 'Faça login para executar esta ação.');
        }

        // Verifica se é o dono do post ou admin
        if ($post->forum_id === Auth::guard('forum')->id() || 
            (Auth::guard('forum')->check() && Auth::guard('forum')->user()->email === 'admin@forum.com')) {
            
            // Deletar imagem se existir
            if ($post->imagem) {
                Storage::disk('public')->delete($post->imagem);
            }
            
            $post->delete();
            return redirect()->route('forum.index')->with('success', 'Post deletado com sucesso!');
        }

        return redirect()->route('forum.index')->with('error', 'Você não tem permissão para deletar este post.');
    }

    public function destroyComentario(Comentario $comentario)
    {
        if (!Auth::guard('forum')->check()) {
            return redirect()->route('forum.login')->with('error', 'Faça login para executar esta ação.');
        }

        // Verifica se é o dono do comentário ou admin
        if ($comentario->forum_id === Auth::guard('forum')->id() || 
            (Auth::guard('forum')->check() && Auth::guard('forum')->user()->email === 'admin@forum.com')) {
            
            $comentario->delete();
            return redirect()->route('forum.index')->with('success', 'Comentário deletado!');
        }

        return redirect()->route('forum.index')->with('error', 'Você não tem permissão para deletar este comentário.');
    }
}