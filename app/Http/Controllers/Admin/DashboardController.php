<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;

class DashboardController extends Controller
{
    public function index()
    {
        $totalUsers = User::count();
        $activeUsers = User::where('status', 'active')->count();
        $pendingUsers = User::where('status', 'pending')->count();
        $rejectedUsers = User::where('status', 'rejected')->count();

        return view('admin.dashboard', compact(
            'totalUsers',
            'activeUsers',
            'pendingUsers',
            'rejectedUsers'
        ));
    }
}
