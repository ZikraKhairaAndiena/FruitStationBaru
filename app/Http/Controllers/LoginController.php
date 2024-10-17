<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /**
     * Show the login form.
     */
    public function index()
    {
        return view('login');
    }

    /**
     * Handle an authentication attempt.
     */
    public function authenticate(Request $request): RedirectResponse
    {
        // Validasi input login
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        // Percobaan autentikasi menggunakan kredensial yang diberikan
        if (Auth::attempt($credentials)) {
            // Regenerasi sesi untuk melindungi dari serangan fixation
            $request->session()->regenerate();

            // Redirect ke halaman yang diminta atau ke 'home' jika berhasil login
            return redirect()->intended('home')->with('success', 'Welcome ' . Auth::user()->name);
        }

        // Kembali ke halaman login dengan pesan error jika autentikasi gagal
        return back()->withErrors([
            'email' => 'Email atau password yang dimasukkan tidak cocok.',
        ])->withInput($request->only('email'));
    }

    /**
     * Handle logout and session cleanup.
     */
    public function logout(Request $request): RedirectResponse
    {
        // Logout user yang sedang login
        Auth::logout();

        // Invalidasi sesi saat ini
        $request->session()->invalidate();

        // Regenerasi token CSRF
        $request->session()->regenerateToken();

        // Redirect ke halaman utama atau halaman login setelah logout
        return redirect('/')->with('success', 'Anda telah berhasil logout.');
    }
}
