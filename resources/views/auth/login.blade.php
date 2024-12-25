@extends('layouts.app')

@section('content')

    <div class="forms-container">
        <div class="signin-signup">
            <!-- Sign In Form -->
            <form method="POST" action="{{ route('login') }}" class="sign-in-form">
                @csrf
                <h2 class="title">Sign In</h2>
                <div class="input-field">
                    <i class="fas fa-envelope"></i>
                    <input id="email" type="email" name="email" placeholder="Email" value="{{ old('email') }}" required autofocus>
                </div>
                <div class="input-field">
                    <i class="fas fa-lock"></i>
                    <input id="password" type="password" name="password" placeholder="Password" required>
                </div>
                <button type="submit" class="btn">Login</button>

                <!-- Tambahkan Lupa Password -->
                <div class="forgot-password">
                    <a href="{{ route('password.request') }}">Lupa Password?</a>
                </div>

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
                <h3>New Here?</h3>
                <p>Join us and create an account to get started!</p>
                <a href="{{ route('register') }}">
                    <button class="btn transparent" id="sign-up-btn">Register</button>
                </a>
            </div>

    </div>
</div>
@endsection