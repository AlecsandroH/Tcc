<?php

namespace Database\Seeders;

use App\Models\Forum;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class Forumseeder extends Seeder
{
    public function run()
    {
        Forum::create([
            'nome' => 'Administrador',
            'email' => 'admin@forum.com',
            'senha' => Hash::make('123'),
        ]);
    }
}