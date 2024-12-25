<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Produk Toko</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/header.css') }}">
    <style>
        .product-card {
            border: 1px solid #ddd;
            border-radius: 8px;
            padding: 20px;
            margin-bottom: 30px;
        }

        .product-card img {
            border-radius: 8px;
            max-height: 350px;
            object-fit: cover;
        }

        .product-card .card-body {
            padding: 10px;
        }

        .product-card .card-title {
            font-size: 18px;
            font-weight: bold;
        }

        .product-card .card-text {
            font-size: 16px;
        }

        .product-card .btn {
            width: 100%;
        }
    </style>
</head>

<body>
    @include('TampilanDashboard.header')
    <br><br><br><br>

    <!-- Main Content -->
    <div class="container mt-5">
        <h2>Produk</h2>

        <div class="row">
            @auth
                @foreach ($products as $product)
                    <div class="col-md-3">
                        <div class="product-card card">
                            <img src="{{ asset('storage/' . json_decode($product->product_photo)[0]) }}"
                                class="card-img-top" alt="{{ $product->name_product }}">
                            <div class="card-body">
                                <h5 class="card-title">{{ $product->name_product }}</h5>
                                <p class="card-text">Rp {{ number_format($product->product_price, 0, ',', '.') }}</p>
                                <p class="card-text">{{ $product->product_description }}</p>
                                <form action="{{ route('cart.add', $product->id) }}" method="POST">
                                    @csrf
                                    <button type="submit" class="btn btn-primary">Tambah ke Keranjang</button>
                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach
            @else
                <div class="col-12">
                    <p class="alert alert-warning">Silakan login untuk melihat produk dan menambahkannya ke keranjang.</p>
                </div>
            @endauth
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
