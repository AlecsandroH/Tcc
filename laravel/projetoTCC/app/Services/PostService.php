<?php

namespace App\Services;

class PostService
{
    protected $filePath;

    public function __construct()
    {
        $this->filePath = storage_path('app/posts.json');
        
        // Criar arquivo se não existir
        if (!file_exists($this->filePath)) {
            file_put_contents($this->filePath, json_encode([]));
        }
    }

    public function getAllPosts()
    {
        $content = file_get_contents($this->filePath);
        return json_decode($content, true) ?? [];
    }

public function deletePost($postId, $userToken)
{
    $posts = $this->getAllPosts();
    
    // Encontra o índice do post
    $index = array_search($postId, array_column($posts, 'id'));
    
    if ($index !== false && $posts[$index]['user_token'] === $userToken) {
        array_splice($posts, $index, 1);
        file_put_contents($this->filePath, json_encode($posts));
        return true;
    }
    
    return false;
}

public function addPost($data)
{
    $posts = $this->getAllPosts();
    
    $newPost = [
        'id' => uniqid(),
        'author_name' => $data['author_name'] ?? 'Anônimo',
        'content' => $data['content'],
        'user_token' => $data['user_token'] ?? null

    ];
    
    array_unshift($posts, $newPost);
    file_put_contents($this->filePath, json_encode($posts));
    
    return $newPost;
}
    
}

