@extends('layouts.app')

@section('content')
<div class="forms-container">
    <div class="gantipassword">
        <!-- Form Kirim Token Reset Password -->
        <form method="POST" action="{{ route('password.sendEmail') }}" class="sign-in-form">
            @csrf
            <h2 class="title">Lupa Password</h2>
            <p>Masukkan email Anda untuk menerima tautan reset password.</p>
            <div class="input-field">
                <i class="fas fa-envelope"></i>
                <input id="email" type="email" name="email" placeholder="Email" value="{{ old('email') }}" required autofocus>
            </div>
            <button type="submit" class="btn">Kirim Token Reset</button>
        </form>

        <hr class="divider">

        <!-- Form Reset Password Langsung -->
        <form method="POST" action="{{ route('password.resetPassword') }}" class="sign-in-form">
            @csrf
            <h2 class="title">Reset Password</h2>
            <p>Langsung ubah password dengan memasukkan token yang diterima:</p>
            <div class="input-field">
                <i class="fas fa-envelope"></i>
                <input id="email" type="email" name="email" placeholder="Email" value="{{ old('email') }}" required>
            </div>
            <div class="input-field">
                <i class="fas fa-key"></i>
                <input id="token" type="text" name="token" placeholder="Token" value="{{ old('token') }}" required>
            </div>
            <div class="input-field">
                <i class="fas fa-lock"></i>
                <input id="password" type="password" name="password" placeholder="Password Baru" required>
            </div>
            <div class="input-field">
                <i class="fas fa-lock"></i>
                <input id="password_confirmation" type="password" name="password_confirmation" placeholder="Konfirmasi Password" required>
            </div>
            <button type="submit" class="btn">Reset Password</button>
        </form>

        <!-- Tampilkan status atau pesan error -->
        @if (session('status'))
            <div class="status-message">
                {{ session('status') }}
            </div>
        @endif

        @if ($errors->any())
            <div class="error-messages">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    </div>
</div>

<div class="panels-container">
    <div class="panel left-panel">
        <div class="content">
            <h3>Back to Login</h3>
            <p>Kembali ke halaman login jika Anda sudah memiliki akun.</p>
            <a href="{{ route('login') }}">
                <button class="btn transparent" id="sign-in-btn">Login</button>
            </a>
        </div>
    </div>
</div>
@endsection