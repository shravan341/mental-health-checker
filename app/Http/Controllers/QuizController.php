<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class QuizController extends Controller
{
    public function start()
    {
        $questions = [
            'Little interest or pleasure in doing things',
            'Feeling down, depressed, or hopeless',
            'Trouble falling or staying asleep, or sleeping too much',
            'Feeling tired or having little energy',
            'Poor appetite or overeating',
            'Feeling bad about yourself - or that you are a failure or have let yourself or your family down',
            'Trouble concentrating on things, such as reading the newspaper or watching television',
            'Moving or speaking so slowly that other people could have noticed? Or the opposite - being so fidgety or restless that you have been moving around a lot more than usual',
            'Thoughts that you would be better off dead or of hurting yourself in some way'
        ];

        return view('quiz.start', compact('questions'));
    }

    public function submit(Request $request)
    {
        $validated = $request->validate([
            'answers' => 'required|array|size:9',
            'answers.*' => 'required|integer|between:0,3'
        ]);

        $totalScore = array_sum($request->answers);

        // Store result in database if needed
        Auth::user()->quizResults()->create([
            'score' => $totalScore,
            'answers' => json_encode($request->answers)
        ]);

        return redirect()->route('quiz.results', ['score' => $totalScore]);
    }

    public function results($score)
    {
        $interpretation = $this->interpretScore($score);
        return view('quiz.results', compact('score', 'interpretation'));
    }

    private function interpretScore($score)
    {
        return match (true) {
            $score <= 4 => 'Minimal depression',
            $score <= 9 => 'Mild depression',
            $score <= 14 => 'Moderate depression',
            $score <= 19 => 'Moderately severe depression',
            default => 'Severe depression',
        };
    }
}
