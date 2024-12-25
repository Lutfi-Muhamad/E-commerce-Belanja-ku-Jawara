<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome - Belanjaku</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            background: linear-gradient(135deg, #1a16e6, #1a16e6);
            color: #fff;
            font-family: 'Roboto', sans-serif;
        }

        .welcome-box {
            text-align: center;
            background: linear-gradient(135deg, #1a16e6, #1a16e6);

            color: #333;
            padding: 30px;
            border-radius: 10px;
            
        }

        .welcome-box h1 {
            font-size: 2.5rem;
            margin-bottom: 20px;
            color: #fff
        }

        .welcome-box .btn {
            margin: 10px 5px;
            font-weight: bold;
            background-color: white;
            color: #1a16e6
        }

        .btn:hover {
            background-color: #5451fe;
            color: white;
        }

        p {
            color: #fff
        }
    </style>
</head>

<body>
    <div class="welcome-box">
        <img src="images/belanjaku_logo.png" alt="" style="width: 20%">
        <h1>Selamat Datang di Belanjaku</h1>
        <p>Nikmati pengalaman belanja terbaik bersama kami.</p>
        <div class="d-flex justify-content-center">
            <a href="{{ route('login') }}" class="btn btn-primary btn-lg">Login</a>
            <a href="{{ route('register') }}" class="btn btn-outline-primary btn-lg">Registrasi</a>
        </div>
    </div>

    <!-- Bootstrap 5 JS Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
