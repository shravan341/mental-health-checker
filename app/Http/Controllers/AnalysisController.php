<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\QuizResult;
class AnalysisController extends Controller
{
    public function show()
    {
        if (!session()->has(['score', 'answers', 'questions'])) {
            return redirect()->route('quiz.start')->with('error', 'Please complete the assessment first.');
        }
    
        return view('analysis.show', [
            'score' => session('score'),
            'answers' => session('answers'),
            'questions' => session('questions')
        ]);
    }

private function interpretScore($score)
{
    return match(true) {
        $score <= 9  => 'Minimal concerns',
        $score <= 19 => 'Mild concerns',
        $score <= 29 => 'Moderate concerns',
        $score <= 39 => 'Severe concerns',
        default      => 'Critical concerns'
    };
}
}