<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <!-- Link ke file CSS terpisah -->
    <link rel="stylesheet" href="{{ asset('css/dashboard_admin.css') }}">
</head>

<body>
    <h1>Admin Dashboard</h1>

    <!-- Tambah Produk Button -->
    <a href="{{ route('products.create') }}" class="add-product-btn">Tambah Produk</a>

    <!-- Tampilkan pesan sukses jika ada -->
    @if (session('success'))
        <div class="success-message">
            {{ session('success') }}
        </div>
    @endif

    <!-- Konten Utama (letakkan semua konten di dalam tag <main>) -->
    <main>
        <!-- Tabel Produk -->
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nama Produk</th>
                    <th>Merk</th>
                    <th>Harga</th>
                    <th>Deskripsi</th>
                    <th>Foto</th>
                    <th>Stok</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $product)
                    <tr>
                        <td>{{ $product->id }}</td>
                        <td>{{ $product->name_product }}</td>
                        <td>{{ $product->merk_product }}</td>
                        <td>Rp {{ number_format($product->product_price, 0, ',', '.') }}</td>
                        <td>{{ $product->product_description }}</td>
                        <td>
                            @if ($product->product_photo)
                                @foreach (json_decode($product->product_photo) as $photo)
                                    <img src="{{ asset('storage/' . $photo) }}" alt="Foto Produk">
                                @endforeach
                            @else
                                <p>-</p>
                            @endif
                        </td>
                        <td>{{ $product->product_stock }}</td>
                        <td>
                            <div class="action-buttons">
                                <a href="{{ route('products.edit', $product->id) }}">Edit</a>
                                <form action="{{ route('products.destroy', $product->id) }}" method="POST"
                                    style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit">Hapus</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </main>

    <!-- Form Logout -->
    <form action="{{ route('admin.logout') }}" method="POST" style="display:inline;">
        @csrf
        <button type="submit" class="logout-btn">Logout</button>
    </form>

</body>

</html>
