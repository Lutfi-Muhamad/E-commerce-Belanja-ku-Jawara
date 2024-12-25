<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\DB;

use Illuminate\Support\Str;

class AdminController extends Controller
{
    // Menampilkan halaman dashboard admin
    public function index()
    {
        return view('TampilanDashboard.index');
    }

    // Menampilkan halaman login admin
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function dashboard()
    {
        return view('TampilanDashboard.index'); // Pastikan folder view sesuai, misal resources/views/lutfi/dashboard.blade.php
    }

    // Proses login admin


    // DAH KELAR LUTFI.DASSBOARD BOSSS
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Proses autentikasi
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            return redirect()->route('TampilanDashboard.index'); // Arahkan ke dashboard setelah login berhasil
        }

        return back()->withErrors([
            'email' => 'Email atau password salah.'
        ]);
    }

    // Menampilkan halaman register admin
    public function showRegisterForm()
    {
        return view('auth.register');
    }

    // Proses register admin
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

        Auth::login($user);

        return redirect()->route('TampilanDashboard.index'); // Arahkan ke dashboard setelah registrasi berhasil
    }


    // Menampilkan form lupa password
    public function showForgotPasswordForm()
    {
        return view('auth.forgot-password');
    }

    // Mengirim token reset password
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

        return back()->with('status', "Token untuk reset password: $token");
    }

    // Proses reset password
    public function resetPassword(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users,email',
            'password' => 'required|string|confirmed|min:8',
        ]);

        // Cari token di tabel password_resets
        $reset = DB::table('password_resets')->where('email', $request->email)->first();

        if (!$reset) {
            return back()->withErrors(['email' => 'Token reset tidak ditemukan.']);
        }

        // Update password user
        $user = User::where('email', $request->email)->first();
        $user->update(['password' => Hash::make($request->password)]);

        // Hapus token reset password setelah berhasil
        DB::table('password_resets')->where('email', $request->email)->delete();

        return back()->with('status', 'Password berhasil diubah.');
    }



    // Logout admin
    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }
}
