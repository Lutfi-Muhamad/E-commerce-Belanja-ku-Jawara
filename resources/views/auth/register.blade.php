@extends('layouts.app')

@section('content')

    <div class="forms-container">
        <div class="signin-signup">
            <!-- Sign Up Form -->
            <form method="POST" action="{{ route('register') }}" class="sign-up-form">
                @csrf
                <h2 class="title">Register</h2>
                <div class="input-field">
                    <i class="fas fa-user"></i>
                    <input id="name" type="text" name="name" placeholder="Nama" value="{{ old('name') }}"
                        required autofocus>
                </div>
                <div class="input-field">
                    <i class="fas fa-envelope"></i>
                    <input id="email" type="email" name="email" placeholder="Email" value="{{ old('email') }}"
                        required>
                </div>
                <div class="input-field">
                    <i class="fas fa-lock"></i>
                    <input id="password" type="password" name="password" placeholder="Password" required>
                </div>
                <div class="input-field">
                    <i class="fas fa-lock"></i>
                    <input id="password_confirmation" type="password" name="password_confirmation"
                        placeholder="Konfirmasi Password" required>
                </div>
                <button type="submit" class="btn">Register</button>
                @if ($errors->any())
                    <div class="error-messages">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
            </form>
        </div>
    </div>
    <div class="panels-container">
        <div class="panel left-panel">
            <div class="content">
                <h3>One of Us?</h3>
                <p>Already have an account? Sign in to continue.</p>
                <a href="{{ route('login') }}" class="btn btn-primary btn-lg">
                    <button class="btn transparent" id="sign-in-btn">Sign In</button>
                </a>
                </a>
            </div>

        </div>
    </div>

@endsection
