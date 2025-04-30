@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card shadow-lg border-0 rounded-4">
                <div class="card-header bg-warning text-white rounded-top-4">
                    <h3 class="mb-0"><i class="fas fa-chart-pie me-2"></i>Progress Analysis</h3>
                </div>
                
                <div class="card-body p-4">
                    <div class="row g-4">
                        <!-- Quiz Progress -->
                        <div class="col-md-6">
                            <div class="card h-100 border-warning">
                                <div class="card-body">
                                    <h5 class="fw-bold text-warning">
                                        <i class="fas fa-clipboard-check me-2"></i>Assessment History
                                    </h5>
                                    <canvas id="quizProgressChart" style="height: 300px;"></canvas>
                                </div>
                            </div>
                        </div>

                        <!-- Game Performance -->
                        <div class="col-md-6">
                            <div class="card h-100 border-warning">
                                <div class="card-body">
                                    <h5 class="fw-bold text-warning">
                                        <i class="fas fa-gamepad me-2"></i>Game Performance
                                    </h5>
                                    <div class="list-group">
                                        <div class="list-group-item d-flex justify-content-between">
                                            <span>Breathing Exercises Completed:</span>
                                            <span class="badge bg-warning">15</span>
                                        </div>
                                        <div class="list-group-item d-flex justify-content-between">
                                            <span>Memory Match High Score:</span>
                                            <span class="badge bg-warning">85%</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Mood Tracker -->
                    <div class="row mt-4">
                        <div class="col-12">
                            <div class="card border-warning">
                                <div class="card-body">
                                    <h5 class="fw-bold text-warning">
                                        <i class="fas fa-smile me-2"></i>Mood Trends
                                    </h5>
                                    <canvas id="moodTrendChart" style="height: 200px;"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="text-center mt-4">
                        <a href="{{ route('dashboard') }}" class="btn btn-warning">
                            <i class="fas fa-arrow-left me-2"></i>Back to Dashboard
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Quiz Progress Chart
    new Chart(document.getElementById('quizProgressChart'), {
        type: 'line',
        data: {
            labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May'],
            datasets: [{
                label: 'Depression Scale Score',
                data: [12, 9, 7, 5, 4],
                borderColor: '#ffc107',
                tension: 0.4
            }]
        }
    });

    // Mood Trend Chart
    new Chart(document.getElementById('moodTrendChart'), {
        type: 'bar',
        data: {
            labels: ['Happy', 'Neutral', 'Sad'],
            datasets: [{
                label: 'Mood Distribution',
                data: [65, 25, 10],
                backgroundColor: ['#ffc107', '#adb5bd', '#ffc107']
            }]
        }
    });
});
</script>
@endsection
@endsection