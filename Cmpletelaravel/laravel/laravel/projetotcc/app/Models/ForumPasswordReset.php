<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ForumPasswordReset extends Model
{
    protected $table = 'forum_password_resets';
    public $timestamps = false;
    protected $fillable = ['email', 'token', 'created_at'];
}