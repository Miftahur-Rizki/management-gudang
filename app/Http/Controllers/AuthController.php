<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    // Tampilkan form register
    public function showRegister()
    {
        return view('auth.register');
    }

    // Proses register
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6|confirmed',
            'role' => 'required|in:petugas,supervisor'
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $request->role,
            'status' => 'pending'
        ]);

        return redirect('/login')
            ->with('success', 'Registrasi berhasil. Tunggu persetujuan admin.');
    }

    // Tampilkan form login
    public function showLogin()
    {
        return view('auth.login');
    }

    // Proses login
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {

            $user = Auth::user();

            // cek status akun
            if ($user->status !== 'active') {
                Auth::logout();
                return back()->with('error', 'Akun belum disetujui admin.');
            }

            // redirect sesuai role
            switch ($user->role) {
                case 'admin':
                    return redirect()->route('admin.dashboard');

                case 'petugas':
                    return redirect()->route('petugas.dashboard');

                case 'supervisor':
                    return redirect()->route('supervisor.dashboard');

                default:
                    return redirect()->route('dashboard');
            }
        }

        return back()->with('error', 'Email atau password salah.');
    }

    // Logout
    public function logout()
    {
        Auth::logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();

        return redirect('/login');
    }
}
