<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Produk</title>
    <link rel="stylesheet" href="{{ asset('css/ProductCreate.css') }}">
</head>

<body>
    <h1>Tambah Produk Baru</h1>

    <!-- Tampilkan pesan error jika ada -->
    @if ($errors->any())
        <div class="error">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <!-- Form Tambah Produk -->
    <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <label for="name_product">Nama Produk:</label>
        <input type="text" id="name_product" name="name_product" placeholder="Masukkan nama produk" required>

        <label for="merk_product">Merk Produk:</label>
        <input type="text" id="merk_product" name="merk_product" placeholder="Masukkan merk produk" required>

        <label for="product_price">Harga Produk:</label>
        <input type="number" id="product_price" name="product_price" placeholder="Masukkan harga produk" step="0.01" required>

        <label for="product_description">Deskripsi Produk:</label>
        <textarea id="product_description" name="product_description" placeholder="Deskripsikan produk" required></textarea>

        <label for="product_photo">Foto Produk (Bisa lebih dari satu):</label>
        <input type="file" id="product_photo" name="product_photo[]" multiple accept="image/*">

        <label for="product_stock">Stok Produk:</label>
        <input type="number" id="product_stock" name="product_stock" placeholder="Masukkan jumlah stok" required>

        <button type="submit">Simpan Produk</button>
        <a href="{{ route('products.index') }}">Kembali</a>
    </form>
</body>

</html>
