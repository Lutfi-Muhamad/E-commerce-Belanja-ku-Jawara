<style>
    <style>body {
        font-family: 'Roboto', sans-serif;
        background-color: #f8f9fa;
        margin: 0;
        padding: 0;
    }

    .container {
        max-width: 800px;
        margin: 20px auto;
        padding: 20px;
        background: #fff;
        border-radius: 8px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }

    h2 {
        text-align: center;
        margin-bottom: 20px;
        font-size: 24px;
        color: #333;
    }

    .table {
        width: 100%;
        border-collapse: collapse;
        margin-bottom: 20px;
    }

    .table th,
    .table td {
        border: 1px solid #ddd;
        text-align: left;
        padding: 8px;
    }

    .table th {
        background-color: #007bff;
        color: #fff;
        font-weight: bold;
    }

    .table tbody tr:nth-child(even) {
        background-color: #f2f2f2;
    }

    .table tbody tr:hover {
        background-color: #ddd;
    }

    h4 {
        text-align: right;
        margin-top: 20px;
        font-size: 20px;
        color: #333;
    }

    .btn {
        display: inline-block;
        text-decoration: none;
        background-color: #007bff;
        color: #fff;
        padding: 10px 20px;
        border-radius: 4px;
        text-align: center;
        font-size: 16px;
        font-weight: bold;
        transition: background-color 0.3s ease;
    }

    .btn:hover {
        background-color: #0056b3;
    }

    @media (max-width: 768px) {
        .container {
            padding: 15px;
        }

        h2 {
            font-size: 20px;
        }

        .btn {
            width: 100%;
            font-size: 14px;
        }
    }
</style>

</style>

@include('TampilanDashboard.header')
<br><br><br><br>

<div class="container">
    <h2>Checkout</h2>
    <table class="table">
        <thead>
            <tr>
                <th>Nama Produk</th>
                <th>Harga</th>
                <th>Jumlah</th>
                <th>Total</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($cart as $item)
                <tr>
                    <td>{{ $item['name'] }}</td>
                    <td>Rp {{ number_format($item['price'], 0, ',', '.') }}</td>
                    <td>{{ $item['quantity'] }}</td>
                    <td>Rp {{ number_format($item['price'] * $item['quantity'], 0, ',', '.') }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <h4>Total: Rp
        {{ number_format(array_sum(array_map(function ($item) {return $item['price'] * $item['quantity'];}, $cart)),0,',','.') }}
    </h4>
    <a href="{{ route('cart.clear') }}" class="btn btn-primary">Konfirmasi Pembelian</a>
</div>
