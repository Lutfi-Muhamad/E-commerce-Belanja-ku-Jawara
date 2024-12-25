<?php
namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;

class AdminController extends Controller
{
    // Menampilkan Admin bisa Lihat produk --> Dashboard (sebaiknya ini untuk API)
    public function index()
    {
        // Biasanya API mengembalikan data dalam format JSON, bisa jadi data produk atau dashboard info
        return response()->json([
            'message' => 'Welcome to the Admin Dashboard',
        ], 200);
    }

    // Proses login admin (API)
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Cek kredensial admin
        $user = User::where('email', $request->email)->first();
        
        // Validasi apakah user ada dan password cocok
        if (!$user || !Hash::check($request->password, $user->password)) {
            throw ValidationException::withMessages([
                'email' => ['The provided credentials are incorrect.'],
            ]);
        }

        // Menghasilkan token API menggunakan Laravel Sanctum
        $token = $user->createToken('admin_token')->plainTextToken;

        return response()->json([
            'message' => 'Login successful',
            'token' => $token
        ], 200);
    }

    // Proses register admin (API)
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|confirmed|min:8',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        // Menghasilkan token setelah registrasi
        $token = $user->createToken('admin_token')->plainTextToken;

        return response()->json([
            'message' => 'Registration successful',
            'token' => $token
        ], 201);
    }

    // Menampilkan form lupa password (Untuk API bisa jadi mengirimkan token untuk reset)
    public function sendResetEmail(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users,email',
        ]);

        $email = $request->email;

        // Generate token dan simpan ke tabel password_resets
        $token = Str::random(12);
        DB::table('password_resets')->updateOrInsert(
            ['email' => $email],
            ['token' => Hash::make($token), 'created_at' => now()]
        );

        return response()->json([
            'message' => 'Reset token generated successfully.',
            'token' => $token
        ], 200);
    }

    // Proses reset password (API)
    public function resetPassword(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users,email',
            'password' => 'required|string|confirmed|min:8',
        ]);

        $reset = DB::table('password_resets')->where('email', $request->email)->first();

        if (!$reset) {
            return response()->json(['error' => 'Token reset tidak ditemukan.'], 404);
        }

        // Update password user
        $user = User::where('email', $request->email)->first();
        $user->update(['password' => Hash::make($request->password)]);

        // Hapus token reset password setelah berhasil
        DB::table('password_resets')->where('email', $request->email)->delete();

        return response()->json(['message' => 'Password successfully reset.'], 200);
    }

    // Logout admin (API)
    public function logout(Request $request)
    {
        // Menghapus token yang digunakan untuk autentikasi
        $request->user()->tokens()->delete();

        return response()->json([
            'message' => 'Logged out successfully'
        ], 200);
    }
}
