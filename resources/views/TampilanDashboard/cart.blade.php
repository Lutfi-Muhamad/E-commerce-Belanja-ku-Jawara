<style>
    /* CSS untuk Keranjang Belanja */
    body {
        font-family: 'Roboto', sans-serif;
        background-color: #f9f9f9;
        margin: 0;
        padding: 0;
    }

    /* Container utama */
    .container {
        margin-top: 50px;
        background-color: #ffffff;
        box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
        border-radius: 8px;
        padding: 20px;
    }

    /* Heading */
    h2 {
        font-size: 28px;
        font-weight: bold;
        color: #333333;
        margin-bottom: 20px;
        text-transform: uppercase;
        letter-spacing: 1px;
    }

    /* Tabel */
    .table {
        margin-bottom: 0;
        border-collapse: collapse;
        width: 100%;
    }

    .table thead {
        background-color: #333333;
        color: #ffffff;
        text-transform: uppercase;
        font-size: 14px;
        letter-spacing: 1px;
    }

    .table th,
    .table td {
        padding: 12px;
        text-align: center;
        border-bottom: 1px solid #dddddd;
    }

    .table tbody tr:hover {
        background-color: #f1f1f1;
    }

    /* Input Jumlah */
    input[type="number"] {
        border: 1px solid #cccccc;
        border-radius: 4px;
        padding: 5px;
        text-align: center;
        font-size: 14px;
    }

    /* Tombol */
    button,
    a.btn {
        font-size: 14px;
        padding: 8px 16px;
        border-radius: 4px;
        text-decoration: none;
        display: inline-block;
        text-align: center;
        transition: background-color 0.3s ease, color 0.3s ease;
    }

    .btn-warning {
        background-color: #ffcc00;
        color: #ffffff;
        border: none;
    }

    .btn-warning:hover {
        background-color: #e6b800;
    }

    .btn-danger {
        background-color: #e74c3c;
        color: #ffffff;
        border: none;
    }

    .btn-danger:hover {
        background-color: #c0392b;
    }

    .btn-success {
        background-color: #27ae60;
        color: #ffffff;
        border: none;
    }

    .btn-success:hover {
        background-color: #1e8449;
    }

    /* Tombol dengan Ikon */
    .btn i {
        margin-right: 5px;
    }

    /* Tombol navigasi di bawah */
    .d-flex a {
        width: 48%;
        text-align: center;
    }

    /* Responsif */
    @media (max-width: 768px) {
        .container {
            padding: 10px;
        }

        h2 {
            font-size: 24px;
        }

        button,
        a.btn {
            font-size: 12px;
            padding: 6px 12px;
        }

        input[type="number"] {
            width: 100%;
        }
    }
</style>

@include('TampilanDashboard.header')
<br><br><br>
<div class="container my-5">
    <h2 class="mb-4 text-center">Keranjang Belanja</h2>
    <div class="table-responsive">
        <table class="table table-bordered text-center align-middle">
            <thead class="table-dark">
                <tr>
                    <th>Nama Produk</th>
                    <th>Harga</th>
                    <th>Jumlah</th>
                    <th>Total</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($cart as $item)
                    <tr>
                        <td class="align-middle">{{ $item['name'] }}</td>
                        <td class="align-middle">Rp {{ number_format($item['price'], 0, ',', '.') }}</td>
                        <td class="align-middle">
                            <form action="{{ route('cart.update', $item['id']) }}" method="POST"
                                class="d-flex justify-content-center align-items-center gap-2">
                                @csrf
                                <input type="number" name="quantity" value="{{ $item['quantity'] }}" min="1"
                                    class="form-control text-center w-50" style="max-width: 80px;">
                                <button type="submit" class="btn btn-warning btn-sm">Update</button>
                            </form>
                        </td>
                        <td class="align-middle">Rp {{ number_format($item['price'] * $item['quantity'], 0, ',', '.') }}
                        </td>
                        <td class="align-middle">
                            <a href="{{ route('cart.remove', $item['id']) }}" class="btn btn-danger btn-sm">
                                <i class="bi bi-trash"></i> Hapus
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="d-flex justify-content-between mt-4">
        <a href="{{ route('cart.clear') }}" class="btn btn-danger">
            <i class="bi bi-cart-x"></i> Kosongkan Keranjang
        </a>
        <a href="{{ route('cart.checkout') }}" class="btn btn-success">
            <i class="bi bi-cart-check"></i> Proses Pembelian
        </a>
    </div>
</div>

<!-- Optional Bootstrap icons -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
