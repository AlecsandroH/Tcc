<?php

namespace Database\Seeders;
use App\Models\Forum;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class Forumseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Forums::create(
            [
            'login' => 'adm',
            'senha' => '123',
            ]
        );
    }
}
