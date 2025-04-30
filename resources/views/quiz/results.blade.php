@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card shadow-lg border-0 rounded-4">
                <div class="card-header bg-info text-white rounded-top-4">
                    <h3 class="mb-0"><i class="fas fa-clipboard-check me-2"></i>Assessment Results</h3>
                </div>
                
                <div class="card-body p-4">
                    <div class="alert alert-{{ $score >= 10 ? 'danger' : 'success' }} text-center">
                        <h4 class="alert-heading">Your Score: {{ $score }}/27</h4>
                        <p class="mb-0">{{ $interpretation }}</p>
                    </div>

                    <div class="row g-4">
                        <div class="col-md-6">
                            <div class="card h-100 border-info">
                                <div class="card-body">
                                    <h5 class="card-title text-info">
                                        <i class="fas fa-lightbulb me-2"></i>Recommendations
                                    </h5>
                                    <ul class="list-group list-group-flush">
                                        @if($score <= 4)
                                        <li class="list-group-item">Continue self-care practices</li>
                                        <li class="list-group-item">Regular mood tracking</li>
                                        @elseif($score <= 9)
                                        <li class="list-group-item">Consider counseling sessions</li>
                                        <li class="list-group-item">Practice mindfulness exercises</li>
                                        @elseif($score <= 14)
                                        <li class="list-group-item">Professional consultation recommended</li>
                                        <li class="list-group-item">Join support groups</li>
                                        @else
                                        <li class="list-group-item">Immediate professional help advised</li>
                                        <li class="list-group-item">24/7 crisis support available</li>
                                        @endif
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="card h-100 border-info">
                                <div class="card-body">
                                    <h5 class="card-title text-info">
                                        <i class="fas fa-hands-helping me-2"></i>Resources
                                    </h5>
                                    <div class="list-group">
                                        <a href="#" class="list-group-item list-group-item-action">
                                            <i class="fas fa-phone-volume me-2"></i>
                                            Crisis Hotline: 1-800-273-TALK (8255)
                                        </a>
                                        <a href="#" class="list-group-item list-group-item-action">
                                            <i class="fas fa-globe me-2"></i>
                                            Find a Therapist (PsychologyToday.com)
                                        </a>
                                        <a href="#" class="list-group-item list-group-item-action">
                                            <i class="fas fa-mobile-alt me-2"></i>
                                            Mental Health Apps Recommendation
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="text-center mt-4">
                        <a href="{{ route('dashboard') }}" class="btn btn-info">
                            <i class="fas fa-home me-2"></i>Return to Dashboard
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection