@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card shadow-lg border-0 rounded-4">
                <div class="card-header bg-primary text-white py-4 rounded-top-4">
                    <div class="d-flex justify-content-between align-items-center">
                        <h3 class="mb-0 fw-bold"><i class="fas fa-brain me-2"></i>Mental Health Dashboard</h3>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="btn btn-light btn-sm">
                                <i class="fas fa-sign-out-alt me-2"></i>Logout
                            </button>
                        </form>
                    </div>
                </div>

                <div class="card-body p-5">
                    <div class="text-center">
                        <h2 class="display-6 fw-bold text-primary mb-4">Welcome, {{ Auth::user()->name }}! 👋</h2>
                        <p class="lead text-muted">Your Mental Wellness Journey Starts Here</p>
                        
                        <div class="mt-5">
                            <div class="row g-4">
                                <!-- Mental Health Quiz Card -->
                                <div class="col-md-4">
                                    <div class="card border-primary h-100 rounded-3 hover-shadow">
                                        <div class="card-body text-center">
                                            <i class="fas fa-clipboard-check fa-3x text-info mb-3"></i>
                                            <h5 class="fw-bold text-info">Mental Health Assessment</h5>
                                            <p class="text-muted small">Take our quick quiz to evaluate your current mental state</p>
                                            <a href="{{ route('quiz.start') }}" class="btn btn-info btn-sm mt-2">
                                                Start Quiz <i class="fas fa-arrow-right ms-2"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>

                                <!-- Mental Games Card -->
                                <div class="col-md-4">
                                    <div class="card border-success h-100 rounded-3 hover-shadow">
                                        <div class="card-body text-center">
                                            <i class="fas fa-gamepad fa-3x text-success mb-3"></i>
                                            <h5 class="fw-bold text-success">Therapeutic Games</h5>
                                            <p class="text-muted small">Engage in stress-relief activities and mindfulness exercises</p>
                                            <a href="{{ route('games.index') }}" class="btn btn-success btn-sm mt-2">
                                                Play Now <i class="fas fa-play ms-2"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>

                                <!-- Analysis Card -->
                                <div class="col-md-4">
                                    <div class="card border-warning h-100 rounded-3 hover-shadow">
                                        <div class="card-body text-center">
                                            <i class="fas fa-chart-pie fa-3x text-warning mb-3"></i>
                                            <h5 class="fw-bold text-warning">Progress Analysis</h5>
                                            <p class="text-muted small">View your mental health progress and game performance</p>
                                            <a href="{{ route('analysis.show') }}" class="btn btn-warning btn-sm mt-2">
                                                View Reports <i class="fas fa-chart-line ms-2"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Recent Activity Section -->
                            <div class="row mt-5">
                                <div class="col-md-12">
                                    <div class="card border-0 shadow-sm">
                                        <div class="card-body">
                                            <h5 class="fw-bold text-secondary mb-4">
                                                <i class="fas fa-history me-2"></i>Recent Activities
                                            </h5>
                                            <div class="activity-timeline">
                                                <!-- Sample Activity Items -->
                                                <div class="activity-item d-flex">
                                                    <div class="activity-icon text-primary me-3">
                                                        <i class="fas fa-check-circle"></i>
                                                    </div>
                                                    <div class="activity-content">
                                                        <span class="text-muted">Completed Mental Health Quiz - </span>
                                                        <span class="fst-italic">5 minutes ago</span>
                                                    </div>
                                                </div>
                                                <div class="activity-item d-flex mt-3">
                                                    <div class="activity-icon text-success me-3">
                                                        <i class="fas fa-gamepad"></i>
                                                    </div>
                                                    <div class="activity-content">
                                                        <span class="text-muted">Played Stress Relief Game - </span>
                                                        <span class="fst-italic">2 hours ago</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

<style>
    .hover-shadow:hover {
        transform: translateY(-5px);
        transition: transform 0.3s ease;
        box-shadow: 0 10px 20px rgba(0,0,0,0.1);
    }
    .activity-timeline {
        border-left: 2px solid #eee;
        padding-left: 20px;
        margin-left: 8px;
    }
    .activity-item {
        position: relative;
        padding-bottom: 15px;
    }
    .activity-item:last-child {
        padding-bottom: 0;
    }
    .activity-icon {
        position: absolute;
        left: -30px;
        background: white;
    }
</style>