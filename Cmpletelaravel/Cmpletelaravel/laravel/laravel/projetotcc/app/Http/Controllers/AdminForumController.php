<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Comentario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AdminForumController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:forum');
        $this->middleware('forum.admin');
    }

    public function dashboard()
    {
        // Gráfico de postagens por data
        $postagensPorData = Post::select(
            DB::raw('DATE(created_at) as data'),
            DB::raw('COUNT(*) as total')
        )
        ->groupBy('data')
        ->orderBy('data', 'desc')
        ->limit(30)
        ->get();

        $comentariosPorData = Comentario::select(
            DB::raw('DATE(created_at) as data'),
            DB::raw('COUNT(*) as total')
        )
        ->groupBy('data')
        ->orderBy('data', 'desc')
        ->limit(30)
        ->get();

        $totalPosts = Post::count();
        $totalComentarios = Comentario::count();
        $postsRecentes = Post::with('forum')->latest()->limit(5)->get();

        return view('admin.dashboard', compact(
            'postagensPorData',
            'comentariosPorData',
            'totalPosts',
            'totalComentarios',
            'postsRecentes'
        ));
    }
}