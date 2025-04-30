@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card shadow-lg border-0 rounded-4">
                <div class="card-header bg-success text-white rounded-top-4">
                    <h3 class="mb-0"><i class="fas fa-chart-line me-2"></i>Your Analysis</h3>
                </div>
                
                <div class="card-body p-4">
                    <div class="alert alert-success">
                        <h4 class="alert-heading">
                            Your Total Score: {{ $score }} / {{ count($questions) * 3 }}
                        </h4>
                        <p class="mb-0">
                            @if($score <= 9)
                            Minimal concerns - Keep up the good work!
                            @elseif($score <= 19)
                            Mild concerns - Consider self-care practices
                            @elseif($score <= 29)
                            Moderate concerns - Professional consultation recommended
                            @else
                            Severe concerns - Please seek professional help
                            @endif
                        </p>
                    </div>

                    <div class="card mb-4 border-success">
                        <div class="card-header bg-light">
                            <h5 class="mb-0">Detailed Breakdown</h5>
                        </div>
                        <div class="card-body">
                            @foreach($questions as $index => $question)
                            <div class="mb-4">
                                <h6>Question {{ $index+1 }}: {{ $question }}</h6>
                                <div class="progress" style="height: 30px;">
                                    @php $severity = ['bg-success', 'bg-info', 'bg-warning', 'bg-danger']; @endphp
                                    <div class="progress-bar {{ $severity[$answers[$index]] }}" 
                                         style="width: {{ ($answers[$index]/3)*100 }}%">
                                        {{ ['Not at all','Several days','More than half','Nearly every day'][$answers[$index]] }}
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>

                    <div class="text-center">
                        <a href="{{ route('quiz.start') }}" class="btn btn-success">
                            <i class="fas fa-redo me-2"></i>Retake Assessment
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection