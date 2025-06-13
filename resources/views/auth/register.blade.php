@extends('layouts.app')
@section('content')

<style>
    body {
        background-image: url('/images/event-bg.jpg');
     
        background-size: cover;
        background-repeat: no-repeat;
        background-position: center;
        background-attachment: fixed;
    }

    .register-card {
        background: rgba(255, 255, 255, 0.95);
        padding: 40px;
        border-radius: 15px;
        box-shadow: 0 8px 25px rgba(0, 0, 0, 0.2);
        backdrop-filter: blur(5px);
        transition: all 0.3s ease;
    }

    .register-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 35px rgba(0, 0, 0, 0.3);
    }

    .register-card h2 {
        font-weight: bold;
        margin-bottom: 25px;
        text-align: center;
        color: #2c3e50;
    }

    .form-control {
        border-radius: 8px;
        box-shadow: none !important;
    }

    .form-label {
        font-weight: 600;
        color: #333;
    }

    .btn-success {
        border-radius: 8px;
        padding: 10px;
        font-weight: 600;
        font-size: 16px;
    }

    .btn-success:hover {
        background-color: #28a745;
        box-shadow: 0 5px 15px rgba(40, 167, 69, 0.3);
    }
</style>

<div class="container">
    <div class="row justify-content-center align-items-center" style="min-height: 100vh;">
        <div class="col-md-6">
            <div class="register-card">
                <h2><i class="bi bi-person-plus-fill me-2"></i>Register</h2>
                <form method="POST" action="{{ route('register') }}">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label"><i class="bi bi-person-fill me-1"></i> Name</label>
                        <input type="text" name="name" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label"><i class="bi bi-envelope-fill me-1"></i> Email</label>
                        <input type="email" name="email" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label"><i class="bi bi-lock-fill me-1"></i> Password</label>
                        <input type="password" name="password" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label"><i class="bi bi-shield-lock-fill me-1"></i> Confirm Password</label>
                        <input type="password" name="password_confirmation" class="form-control" required>
                    </div>
                    <button class="btn btn-success w-100"><i class="bi bi-box-arrow-in-right me-1"></i> Register</button>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection