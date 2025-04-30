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
            // Add as many questions as you need here
            'Feeling nervous, anxious, or on edge',
            'Not being able to stop worrying',
            'Feeling afraid as if something awful might happen',
            'Difficulty controlling your temper',
            'Feeling irritable or easily annoyed',
            'Avoiding social situations',
            'Loss of interest in personal appearance',
            'Difficulty enjoying activities you used to like',
            'Feeling disconnected from reality',
            'Experiencing unexplained physical pains',
            'Feeling like you let others down frequently'
        ];

        return view('quiz.start', compact('questions'));
    }

    public function submit(Request $request)
    {
        $questionCount = count($this->start()['questions']); // Get dynamic count
        $validated = $request->validate([
            'answers' => 'required|array|size:' . $questionCount,
            'answers.*' => 'required|integer|between:0,3'
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
