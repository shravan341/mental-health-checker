@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center min-vh-100 align-items-center">
        <div class="col-md-8 col-lg-6">
            <div class="card shadow-lg border-0 rounded-4">
                <div class="card-header bg-primary text-white text-center py-4 rounded-top-4">
                    <h3 class="mb-0 fw-bold"><i class="fas fa-user-plus me-2"></i>Create Account</h3>
                </div>

                <div class="card-body p-5">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="mb-4">
                            <label for="name" class="form-label text-muted">Full Name</label>
                            <input id="name" type="text" 
                                   class="form-control @error('name') is-invalid @enderror" 
                                   name="name" value="{{ old('name') }}" 
                                   required autocomplete="name" autofocus
                                   placeholder="Enter your name">
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="email" class="form-label text-muted">Email Address</label>
                            <input id="email" type="email" 
                                   class="form-control @error('email') is-invalid @enderror" 
                                   name="email" value="{{ old('email') }}" 
                                   required autocomplete="email"
                                   placeholder="Enter your email">
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="password" class="form-label text-muted">Password</label>
                            <input id="password" type="password" 
                                   class="form-control @error('password') is-invalid @enderror" 
                                   name="password" required autocomplete="new-password"
                                   placeholder="Enter password">
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="password-confirm" class="form-label text-muted">Confirm Password</label>
                            <input id="password-confirm" type="password" class="form-control" 
                                   name="password_confirmation" required autocomplete="new-password"
                                   placeholder="Confirm password">
                        </div>

                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary btn-lg py-3">
                                <i class="fas fa-user-plus me-2"></i>Register
                            </button>
                        </div>
                    </form>
                </div>
            </div>
            
            <div class="text-center mt-4">
                <p class="text-muted">Already have an account? 
                    <a href="{{ route('login') }}" class="text-primary fw-bold">Login</a>
                </p>
            </div>
        </div>
    </div>
</div>
@endsection