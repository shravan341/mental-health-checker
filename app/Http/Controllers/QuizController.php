<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\QuizResult;
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
        $questions = $this->start()['questions'];
        
        $validated = $request->validate([
            'answers' => 'required|array|size:'.count($questions),
            'answers.*' => 'required|integer|between:0,3'
        ]);
    
        $totalScore = array_sum($validated['answers']);
    
        // Store results for logged-in users
        if (Auth::check()) {
            Auth::user()->quizResults()->create([
                'score' => $totalScore,
                'answers' => $validated['answers']
            ]);
        }
    
        return redirect()->route('analysis.show')->with([
            'score' => $totalScore,
            'answers' => $validated['answers'],
            'questions' => $questions
        ]);
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