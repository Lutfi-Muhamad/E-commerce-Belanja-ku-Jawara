<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('admin.dashboardAdmin', compact('products')); // Ganti ke 'admin.dashboardAdmin'
    }

    // Menampilkan daftar produk
    public function indexuser()
    {
        // Mengambil semua produk dari database
        $products = Product::all();  // Jika ingin menambahkan kondisi lain bisa ditambahkan di sini

        // Mengirimkan data produk ke tampilan index
        return view('TampilanDashboard.index', compact('products'));
    }

    public function create()
    {
        return view('admin.productCreate'); // Ganti ke 'admin.productCreate'
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name_product' => 'required|string|max:255',
            'merk_product' => 'required|string|max:255',
            'product_price' => 'required|numeric',
            'product_description' => 'required|string',
            'product_photo.*' => 'image|mimes:jpg,jpeg,png|max:2048',
            'product_stock' => 'required|integer',
        ]);

        if ($request->hasFile('product_photo')) {
            $photos = [];
            foreach ($request->file('product_photo') as $photo) {
                $path = $photo->store('uploads/products', 'public');
                $photos[] = $path;
            }
            $validatedData['product_photo'] = json_encode($photos);
        }

        Product::create($validatedData);

        return redirect()->route('products.index')->with('success', 'Produk berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $product = Product::findOrFail($id);
        return view('admin.productEdit', compact('product')); // Ganti ke 'admin.productEdit'
    }

    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);

        $validatedData = $request->validate([
            'name_product' => 'required|string|max:255',
            'merk_product' => 'required|string|max:255',
            'product_price' => 'required|numeric',
            'product_description' => 'required|string',
            'product_photo.*' => 'image|mimes:jpg,jpeg,png|max:2048',
            'product_stock' => 'required|integer',
        ]);

        // Jika ada file foto baru yang diunggah
        if ($request->hasFile('product_photo')) {
            $photos = [];
            foreach ($request->file('product_photo') as $photo) {
                $path = $photo->store('uploads/products', 'public');
                $photos[] = $path;
            }
            $validatedData['product_photo'] = json_encode($photos);
        } else {
            // Gunakan foto lama jika tidak ada unggahan baru
            $validatedData['product_photo'] = $product->product_photo;
        }

        $product->update($validatedData);

        return redirect()->route('products.index')->with('success', 'Produk berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();
        return redirect()->route('products.index')->with('success', 'Produk berhasil dihapus!'); // Ganti ke 'admin.products.index'
    }
}
