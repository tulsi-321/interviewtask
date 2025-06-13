@extends('layouts.app')
@section('title', 'Login')

@push('styles')
<style>
    body {
        background: url('/images/event-bg2.jpg') no-repeat center center fixed;
        background-size: cover;
    }

    .login-card {
        background-color: rgba(255, 255, 255, 0.9);
        padding: 35px;
        border-radius: 18px;
        box-shadow: 0 8px 25px rgba(0, 0, 0, 0.25);
    }

    .login-card h2 {
        text-align: center;
        margin-bottom: 25px;
        color: #1d1d1d;
        font-weight: 700;
    }

    .login-card h2 i {
        margin-right: 8px;
    }

    .form-label i {
        margin-right: 6px;
    }
</style>
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
@endpush

@section('content')
<div class="row justify-content-center align-items-center" style="min-height: 100vh;">
    <div class="col-md-6 col-lg-5">
        <div class="login-card">
            <h2><i class="fas fa-sign-in-alt"></i>Login</h2>
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="mb-3">
                    <label class="form-label"><i class="fas fa-envelope"></i>Email</label>
                    <input type="email" name="email" class="form-control" required autofocus>
                </div>
                <div class="mb-3">
                    <label class="form-label"><i class="fas fa-lock"></i>Password</label>
                    <input type="password" name="password" class="form-control" required>
                </div>
                <div class="d-grid">
                    <button class="btn btn-success w-100"><i class="fas fa-sign-in-alt"></i> Login</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection