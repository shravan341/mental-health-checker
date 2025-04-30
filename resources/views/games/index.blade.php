@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card shadow-lg border-0 rounded-4">
                <div class="card-header bg-success text-white rounded-top-4">
                    <h3 class="mb-0"><i class="fas fa-gamepad me-2"></i>Therapeutic Games</h3>
                </div>
                
                <div class="card-body p-4">
                    <div class="row g-4">
                        <!-- Breathing Exercise Game -->
                        <div class="col-md-6">
                            <div class="card h-100 border-success">
                                <div class="card-body text-center">
                                    <i class="fas fa-wind fa-3x text-success mb-3"></i>
                                    <h5 class="fw-bold text-success">Breathing Exercise</h5>
                                    <p class="text-muted small">Guided breathing for stress relief</p>
                                    <a href="{{ route('games.breathing') }}" class="btn btn-success">
                                        Start Exercise <i class="fas fa-play ms-2"></i>
                                    </a>
                                </div>
                            </div>
                        </div>

                        <!-- Memory Match Game -->
                        <div class="col-md-6">
                            <div class="card h-100 border-success">
                                <div class="card-body text-center">
                                    <i class="fas fa-brain fa-3x text-success mb-3"></i>
                                    <h5 class="fw-bold text-success">Memory Match</h5>
                                    <p class="text-muted small">Improve focus with card matching</p>
                                    <a href="{{ route('games.breathing') }}" class="btn btn-success">
                                        Start Exercise <i class="fas fa-play ms-2"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="text-center mt-4">
                        <a href="{{ route('dashboard') }}" class="btn btn-outline-success">
                            <i class="fas fa-arrow-left me-2"></i>Back to Dashboard
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection