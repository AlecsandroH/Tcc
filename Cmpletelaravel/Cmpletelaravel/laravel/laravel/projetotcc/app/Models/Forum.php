<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Forum extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $table = 'forums';

    protected $fillable = [
        'nome',
        'email',
        'senha',
        'avatar',
        'bio',
    ];

    protected $hidden = [
        'senha',
        'remember_token',
    ];

    public function getAuthPassword()
    {
        return $this->senha;
    }

    public function checkPassword($currentPassword)
    {
        return password_verify($currentPassword, $this->senha);
    }

    // Relacionamentos
    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    public function comentarios()
    {
        return $this->hasMany(Comentario::class);
    }

    // Accessor para avatar
    public function getAvatarUrlAttribute()
    {
        if ($this->avatar) {
            return asset('storage/' . $this->avatar);
        }
        return asset('images/default-avatar.png');
    }

    
}