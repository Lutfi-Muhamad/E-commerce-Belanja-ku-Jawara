<?php


namespace App\Http\Controllers\Admin;

use App\Models\Admin;  // Model Admin
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use App\Http\Controllers\Controller;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view for admin.
     */
    public function create(): View
    {
        return view('admin.login');
    }

    /**
     * Handle an incoming authentication request for admin.
     */
    public function store(Request $request): RedirectResponse
    {
        // Validasi kredensial login admin
        if (Auth::guard('admin')->attempt($request->only('email', 'password'))) {
            $request->session()->regenerate();
            return redirect()->route('products.index'); // Redirect ke halaman produk setelah login
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }

    /**
     * Destroy an authenticated session for admin.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('admin')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('admin.login'); // Redirect ke halaman login setelah logout
    }
}
