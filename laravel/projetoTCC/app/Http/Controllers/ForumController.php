<?php

namespace App\Http\Controllers;

use App\Services\PostService;
use Illuminate\Http\Request;

class ForumController extends Controller
{
    protected $postService;

    public function __construct(PostService $postService)
    {
        $this->postService = $postService;
    }

    public function index()
    {
        $posts = $this->postService->getAllPosts();
        return view('forum', compact('posts')); // Mudei para welcome.blade.php
    }

public function store(Request $request)
{
    $request->validate([
        'content' => 'required|min:3',
        'author_name' => 'nullable|max:50',
        'user_token' => 'required'
    ]);

    $newPost = $this->postService->addPost($request->all());

    return response()->json([
        'success' => true,
        'post' => $newPost
    ]);
}

public function destroy($id, Request $request)
{
    $deleted = $this->postService->deletePost($id, $request->input('user_token'));
    
    return response()->json([
        'success' => $deleted
    ]);
}
    public function getPosts()
    {
        $posts = $this->postService->getAllPosts();
        return response()->json($posts);
    }
}