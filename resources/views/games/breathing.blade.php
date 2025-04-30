@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-lg border-0 rounded-4">
                <div class="card-header bg-success text-white rounded-top-4">
                    <h3 class="mb-0"><i class="fas fa-wind me-2"></i>Breathing Exercise</h3>
                </div>
                
                <div class="card-body p-4 text-center">
                    <div class="breathing-container mb-4">
                        <div class="circle" id="breathingCircle">
                            <div class="inner-text" id="breathingText">Click Start</div>
                        </div>
                    </div>

                    <div class="instructions mb-4">
                        <p class="lead" id="instructions">
            Inhale deeply through your nose for 4 seconds<br>
            Hold your breath for 4 seconds<br>
            Exhale slowly through your mouth for 6 seconds
        </p>
                        <div class="timer" id="timer">00:00</div>
                    </div>

                    <button class="btn btn-success btn-lg" id="startButton">
                        <i class="fas fa-play me-2"></i>Start Exercise
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

@section('scripts')
<style>
.breathing-container {
    display: flex;
    justify-content: center;
    align-items: center;
    height: 300px;
}

.circle {
    width: 200px;
    height: 200px;
    border-radius: 50%;
    background: #38c172;
    display: flex;
    justify-content: center;
    align-items: center;
    transition: all 6s ease-in-out;
    animation: pulse 4s infinite;
}

.inner-text {
    color: white;
    font-size: 1.5rem;
    text-align: center;
    padding: 20px;
}

@keyframes breathe {
    0% { transform: scale(1); }
    50% { transform: scale(1.2); }
    100% { transform: scale(1); }
}

@keyframes pulse {
    0% { box-shadow: 0 0 0 0 rgba(56, 193, 114, 0.4); }
    70% { box-shadow: 0 0 0 20px rgba(56, 193, 114, 0); }
    100% { box-shadow: 0 0 0 0 rgba(56, 193, 114, 0); }
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const circle = document.getElementById('breathingCircle');
    const text = document.getElementById('breathingText');
    const timer = document.getElementById('timer');
    const startButton = document.getElementById('startButton');
    let isRunning = false;
    let seconds = 0;
    let interval;

    const phases = [
        { duration: 4, action: 'Breathe In', scale: 1.2 },
        { duration: 4, action: 'Hold', scale: 1.2 },
        { duration: 6, action: 'Breathe Out', scale: 1 }
    ];

    function updateTimer() {
        const mins = Math.floor(seconds / 60);
        const secs = seconds % 60;
        timer.textContent = `${String(mins).padStart(2, '0')}:${String(secs).padStart(2, '0')}`;
        seconds++;
    }

    function startExercise() {
        if (!isRunning) {
            isRunning = true;
            startButton.innerHTML = '<i class="fas fa-pause me-2"></i>Pause';
            let phaseIndex = 0;
            
            function runPhase() {
                if (!isRunning) return;
                
                const phase = phases[phaseIndex];
                text.textContent = phase.action;
                circle.style.transform = `scale(${phase.scale})`;
                
                setTimeout(() => {
                    phaseIndex = (phaseIndex + 1) % phases.length;
                    runPhase();
                }, phase.duration * 1000);
            }

            interval = setInterval(updateTimer, 1000);
            runPhase();
        } else {
            isRunning = false;
            startButton.innerHTML = '<i class="fas fa-play me-2"></i>Resume';
            clearInterval(interval);
        }
    }

    startButton.addEventListener('click', startExercise);
});
</script>
@endsection
@endsection