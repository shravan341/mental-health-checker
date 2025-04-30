@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card shadow-lg border-0 rounded-4">
                <div class="card-header bg-primary text-white py-4 rounded-top-4">
                    <div class="d-flex justify-content-between align-items-center">
                        <h3 class="mb-0 fw-bold"><i class="fas fa-tachometer-alt me-2"></i>Dashboard</h3>
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
                        <p class="lead text-muted">You're successfully logged in to the Mental Health Checker</p>
                        
                        <div class="mt-5">
                            <div class="row g-4">
                                <div class="col-md-4">
                                    <div class="card border-primary h-100 rounded-3">
                                        <div class="card-body text-center">
                                            <i class="fas fa-user fa-3x text-primary mb-3"></i>
                                            <h5 class="fw-bold">Profile</h5>
                                            <p class="text-muted small">Manage your account settings</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="card border-primary h-100 rounded-3">
                                        <div class="card-body text-center">
                                            <i class="fas fa-cog fa-3x text-primary mb-3"></i>
                                            <h5 class="fw-bold">Settings</h5>
                                            <p class="text-muted small">Configure application preferences</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="card border-primary h-100 rounded-3">
                                        <div class="card-body text-center">
                                            <i class="fas fa-chart-line fa-3x text-primary mb-3"></i>
                                            <h5 class="fw-bold">Analytics</h5>
                                            <p class="text-muted small">View usage statistics</p>
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