<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comentario extends Model
{
    use HasFactory;

    protected $fillable = [
        'post_id',
        'forum_id',
        'conteudo',
    ];

    public function post()
    {
        return $this->belongsTo(Post::class);
    }

    public function forum()
    {
        return $this->belongsTo(Forum::class);
    }
}   