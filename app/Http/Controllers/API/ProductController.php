<?php


namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    // Menampilkan semua produk untuk admin
    public function index()
    {
        $products = Product::all();
        return response()->json([
            'message' => 'Product list retrieved successfully.',
            'data' => $products
        ], 200);
    }

    // Menampilkan daftar produk untuk user
    public function indexuser()
    {
        $products = Product::all();  // Jika ingin menambahkan kondisi lain bisa ditambahkan di sini

        return response()->json([
            'message' => 'Product list retrieved successfully.',
            'data' => $products
        ], 200);
    }

    // Menyimpan produk baru
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

        $product = Product::create($validatedData);

        return response()->json([
            'message' => 'Product created successfully.',
            'data' => $product
        ], 201);
    }

    // Mengubah data produk
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

        if ($request->hasFile('product_photo')) {
            $photos = [];
            foreach ($request->file('product_photo') as $photo) {
                $path = $photo->store('uploads/products', 'public');
                $photos[] = $path;
            }
            $validatedData['product_photo'] = json_encode($photos);
        } else {
            $validatedData['product_photo'] = $product->product_photo;
        }

        $product->update($validatedData);

        return response()->json([
            'message' => 'Product updated successfully.',
            'data' => $product
        ], 200);
    }

    // Menghapus produk
    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();

        return response()->json([
            'message' => 'Product deleted successfully.'
        ], 200);
    }
}
