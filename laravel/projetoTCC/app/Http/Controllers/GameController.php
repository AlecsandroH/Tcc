<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GameController extends Controller
{
    public function index()
    {
        return view('atividades');
    }

    public function cores()
    {
        return view('games.cores');
    }

    public function memoria()
    {
        return view('games.memoria');
    }

    public function objetos()
    {
        return view('games.objetos');
    }

    public function quebra()
    {
        return view('games.quebra');
    }
}