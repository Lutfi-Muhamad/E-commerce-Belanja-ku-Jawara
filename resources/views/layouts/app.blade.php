<!DOCTYPE html>
<html lang="en">

<head>
    <script src="{{ asset('js/app.js') }}" defer></script> <!-- Menambahkan file JS -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <!-- Link to custom CSS -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    @stack('styles') <!-- For adding additional styles -->
</head>

<body class="custom-bg">

    <!-- Header -->
    <header class="header">
        <div class="container">
            <a href="{{ url('/') }}" class="brand">MyApp</a>
            <nav>
                <ul class="nav-links">
                    <li><a href="{{ route('login') }}" class="nav-link">Login</a></li>
                    <li><a href="{{ route('register') }}" class="nav-link">Register</a></li>
                    <li><a href="{{ route('password.request') }}" class="nav-link">Forgot Password?</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <!-- Main Content Area -->
    <main class="main-content">
        <div class="form-container">
            @yield('content') <!-- Content will be inserted here -->
        </div>
    </main>

    <!-- JS Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    @stack('scripts') <!-- For adding additional scripts -->
</body>

</html>
