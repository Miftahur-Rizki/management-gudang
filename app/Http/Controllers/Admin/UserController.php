<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    // Tampilkan semua user (kecuali admin utama jika mau bisa difilter)
    public function index(Request $request)
    {
        $query = User::query();

        // Filter berdasarkan role
        if ($request->role) {
            $query->where('role', $request->role);
        }

        // Filter berdasarkan status
        if ($request->status) {
            $query->where('status', $request->status);
        }

        $users = $query->latest()->get();

        return view('admin.users.index', compact('users'));
    }

    // Approve user
    public function approve($id)
    {
        $user = User::findOrFail($id);

        if ($user->status === 'active') {
            return back()->with('error', 'User sudah aktif.');
        }

        $user->update([
            'status' => 'active'
        ]);

        return back()->with('success', 'User berhasil diaktifkan.');
    }

    // Reject user
    public function reject($id)
    {
        $user = User::findOrFail($id);

        if ($user->status === 'rejected') {
            return back()->with('error', 'User sudah ditolak.');
        }

        $user->update([
            'status' => 'rejected'
        ]);

        return back()->with('success', 'User berhasil ditolak.');
    }

    // Hapus user
    public function destroy($id)
    {
        $user = User::findOrFail($id);

        // Hindari admin menghapus dirinya sendiri
        if ($user->id == auth()->id()) {
            return back()->with('error', 'Tidak bisa menghapus akun sendiri.');
        }

        $user->delete();

        return back()->with('success', 'User berhasil dihapus.');
    }
}