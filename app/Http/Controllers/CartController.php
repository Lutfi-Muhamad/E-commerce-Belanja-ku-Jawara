<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    // Fungsi untuk menambahkan produk ke keranjang
    public function addToCart($id)
    {
        $product = Product::findOrFail($id);

        // Mengambil keranjang yang ada di session atau membuat array kosong jika belum ada
        $cart = Session::get('cart', []);

        // Mengecek apakah produk sudah ada di dalam keranjang
        $found = false;
        foreach ($cart as &$item) {
            if ($item['id'] == $product->id) {
                $item['quantity'] += 1;  // Menambah jumlah produk
                $found = true;
                break;
            }
        }

        // Jika produk belum ada di keranjang, tambahkan produk baru
        if (!$found) {
            $cart[] = [
                'id' => $product->id,
                'name' => $product->name_product,
                'price' => $product->product_price,
                'quantity' => 1,
                'image' => json_decode($product->product_photo)[0]
            ];
        }

        // Menyimpan keranjang yang sudah diperbarui ke session
        Session::put('cart', $cart);

        return redirect()->route('cart.index')->with('success', 'Produk berhasil ditambahkan ke keranjang!');
    }

    // Fungsi untuk menampilkan keranjang
    public function showCart()
    {
        // Mengambil keranjang dari session
        $cart = Session::get('cart', []);
        return view('TampilanDashboard.cart', compact('cart'));
    }

    // Fungsi untuk mengubah jumlah produk di keranjang
    public function updateQuantity(Request $request, $id)
    {
        // Mendapatkan keranjang dari session
        $cart = Session::get('cart', []);

        // Loop untuk mencari produk yang dimaksud
        foreach ($cart as &$item) {
            if ($item['id'] == $id) {
                $item['quantity'] = $request->quantity;  // Update jumlah produk
                break;
            }
        }

        // Menyimpan keranjang yang sudah diperbarui ke session
        Session::put('cart', $cart);

        return redirect()->route('cart.index')->with('success', 'Jumlah produk berhasil diperbarui!');
    }

    // Fungsi untuk menghapus produk dari keranjang
    public function removeFromCart($id)
    {
        // Mengambil keranjang dari session
        $cart = Session::get('cart', []);

        // Filter produk yang ingin dihapus
        $cart = array_filter($cart, function ($item) use ($id) {
            return $item['id'] != $id;
        });

        // Menyimpan keranjang yang sudah diperbarui ke session
        Session::put('cart', array_values($cart));

        return redirect()->route('cart.index')->with('success', 'Produk berhasil dihapus dari keranjang!');
    }

    // Fungsi untuk proses checkout
    public function checkout()
    {
        // Mengambil keranjang dari session
        $cart = Session::get('cart', []);
        return view('TampilanDashboard.checkout', compact('cart'));
    }

    // Fungsi untuk menghapus semua produk di keranjang (opsional, jika diperlukan)
    public function clearCart()
    {
        Session::forget('cart');
        return redirect()->route('cart.index')->with('success', 'Keranjang telah dikosongkan!');
    }
}
