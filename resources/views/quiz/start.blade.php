@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card shadow-lg border-0 rounded-4">
                <div class="card-header bg-info text-white rounded-top-4">
                    <h3 class="mb-0"><i class="fas fa-brain me-2"></i>Mental Health Assessment</h3>
                </div>
                
                <div class="card-body p-4">
                    <form id="quizForm" method="POST" action="{{ route('quiz.submit') }}">
                        @csrf
                        
                        <div class="progress mb-4" style="height: 8px;">
                            <div class="progress-bar bg-info" role="progressbar" style="width: 0%" 
                                 aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>

                        @foreach($questions as $index => $question)
                        <div class="quiz-step" data-step="{{ $index + 1 }}" >
                            <div class="card mb-4 border-info">
                                <div class="card-body">
                                    <h5 class="card-title text-secondary mb-4">
                                        Question {{ $index + 1 }} of {{ count($questions) }}
                                    </h5>
                                    <p class="lead">{{ $question }}</p>
                                    
                                    <div class="btn-group-vertical w-100" role="group">
                                        @foreach([
                                            0 => 'Not at all',
                                            1 => 'Several days',
                                            2 => 'More than half the days',
                                            3 => 'Nearly every day'
                                        ] as $value => $label)
                                        <label class="btn btn-outline-secondary text-start ps-4 py-3">
                                            <input type="radio" name="answers[{{ $index }}]" 
                                                   value="{{ $value }}" required>
                                            {{ $label }}
                                        </label>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach

                        <div class="d-flex justify-content-between mt-4">
                            <button type="button" class="btn btn-secondary btn-prev" disabled>
                                <i class="fas fa-arrow-left me-2"></i>Previous
                            </button>
                            <button type="button" class="btn btn-info btn-next">
                                Next <i class="fas fa-arrow-right ms-2"></i>
                            </button>
                            <button type="submit" class="btn btn-success btn-submit" style="display: none;">
                                Submit Assessment <i class="fas fa-check ms-2"></i>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@section('scripts')
<style>
    .quiz-step {
    display: none; /* Hide all by default */
    max-height: 70vh;
    overflow-y: auto;
    padding: 0 15px;
    transition: all 0.3s ease;
}
.quiz-step:first-child {
    display: block; /* Show first question */
}
.btn-group-vertical label {
    cursor: pointer;
}
.btn-outline-secondary:hover {
    background-color: #f8f9fa;
}
    </style>

<script>
    
    document.addEventListener('DOMContentLoaded', function() {
    const steps = document.querySelectorAll('.quiz-step');
    const prevBtn = document.querySelector('.btn-prev');
    const nextBtn = document.querySelector('.btn-next');
    const submitBtn = document.querySelector('.btn-submit');
    const progressBar = document.querySelector('.progress-bar');
    let currentStep = 0;

    function updateProgress() {
        const progress = ((currentStep + 1) / steps.length) * 100;
        progressBar.style.width = `${progress}%`;
    }

    function updateButtons() {
        prevBtn.disabled = currentStep === 0;
        nextBtn.style.display = currentStep >= steps.length - 1 ? 'none' : 'block';
        submitBtn.style.display = currentStep >= steps.length - 1 ? 'block' : 'none';
    }

    nextBtn.addEventListener('click', function() {
        if (!steps[currentStep].querySelector('input:checked')) {
            alert('Please select an answer!');
            return;
        }

        steps[currentStep].style.display = 'none';
        currentStep++;
        steps[currentStep].style.display = 'block';
        updateProgress();
        updateButtons();
    });

    prevBtn.addEventListener('click', function() {
        steps[currentStep].style.display = 'none';
        currentStep--;
        steps[currentStep].style.display = 'block';
        updateProgress();
        updateButtons();
    });

    updateButtons();
});
</script>
@endsection



@endsection