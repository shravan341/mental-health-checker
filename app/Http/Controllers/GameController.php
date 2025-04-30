<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GameController extends Controller
{
    public function index()
    {
        return view('games.index'); // Create a view at resources/views/games/index.blade.php
    }
}