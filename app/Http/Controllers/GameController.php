<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class GameController extends Controller
{
    public function index()
    {
        return view('games.index'); // Create a view at resources/views/games/index.blade.php
    }
    public function breathing()
{
    // Track game completion for logged-in users
    if (Auth::check()) {
        Auth::user()->gameSessions()->create([
            'game_type' => 'breathing',
            'duration' => 300 // 5 minutes
        ]);
    }

    return view('games.breathing');
}
}