<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'forum_id',
        'titulo',
        'conteudo',
        'imagem',
    ];

    public function forum()
    {
        return $this->belongsTo(Forum::class);
    }

    public function comentarios()
    {
        return $this->hasMany(Comentario::class);
    }
}