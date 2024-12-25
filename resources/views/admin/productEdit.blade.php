<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Produk</title>
    <!-- Link to the external CSS file -->
    <link rel="stylesheet" href="{{ asset('css/ProdukEdit.css') }}">
</head>

<body>
    <h1>Edit Produk</h1>

    <div class="form-container">
        <!-- Tampilkan pesan error jika ada -->
        @if ($errors->any())
            <div class="error-message">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- Form Edit Produk -->
        <form action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <label for="name_product">Nama Produk:</label>
            <input type="text" id="name_product" name="name_product" value="{{ $product->name_product }}" required>

            <label for="merk_product">Merk Produk:</label>
            <input type="text" id="merk_product" name="merk_product" value="{{ $product->merk_product }}" required>

            <label for="product_price">Harga Produk:</label>
            <input type="number" id="product_price" name="product_price" value="{{ $product->product_price }}" step="0.01" required>

            <label for="product_description">Deskripsi Produk:</label>
            <textarea id="product_description" name="product_description" required>{{ $product->product_description }}</textarea>

            <label for="product_photo">Foto Produk Saat Ini:</label>
            <div>
                @if ($product->product_photo)
                    @foreach (json_decode($product->product_photo) as $photo)
                        <img src="{{ asset('storage/' . $photo) }}" alt="Foto Produk">
                    @endforeach
                @else
                    <p>Tidak ada foto produk.</p>
                @endif
            </div>

            <label for="product_photo">Unggah Foto Baru (Opsional, Bisa lebih dari satu):</label>
            <input type="file" id="product_photo" name="product_photo[]" multiple accept="image/*">

            <label for="product_stock">Stok Produk:</label>
            <input type="number" id="product_stock" name="product_stock" value="{{ $product->product_stock }}" required>

            <button type="submit">Simpan Perubahan</button>
            <a href="{{ route('products.index') }}">Kembali</a>
        </form>
    </div>
</body>

</html>
