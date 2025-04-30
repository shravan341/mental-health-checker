<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AnalysisController extends Controller
{
    public function show()
    {
        return view('analysis.show'); // Create a view at resources/views/analysis/show.blade.php
    }
}
