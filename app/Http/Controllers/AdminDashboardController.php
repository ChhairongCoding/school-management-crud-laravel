<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Course;
use App\Models\Enrollment; // <-- Add this line
use Illuminate\Http\Request;
use Carbon\Carbon;         // <-- And this line

class AdminDashboardController extends Controller
{
    public function index()
    {
        // --- Revenue Calculation ---
        $revenueThisMonth = Enrollment::where('created_at', '>=', Carbon::now()->startOfMonth())->sum('price_paid');
        $revenueLastMonth = Enrollment::whereBetween('created_at', [Carbon::now()->subMonth()->startOfMonth(), Carbon::now()->subMonth()->endOfMonth()])->sum('price_paid');
        $revenueChange = $revenueLastMonth > 0 ? (($revenueThisMonth - $revenueLastMonth) / $revenueLastMonth) * 100 : 100;

        // --- User Calculation ---
        $usersThisMonth = User::where('created_at', '>=', Carbon::now()->startOfMonth())->count();
        $usersLastMonth = User::whereBetween('created_at', [Carbon::now()->subMonth()->startOfMonth(), Carbon::now()->subMonth()->endOfMonth()])->count();
        $usersChange = $usersLastMonth > 0 ? (($usersThisMonth - $usersLastMonth) / $usersLastMonth) * 100 : 100;
        $totalCoursesValue = Course::sum('price');

        // Get overall totals
        $totalUsers = User::count();
        $totalRevenue = Enrollment::sum('price_paid');

        return view('admin_views.dashboard', [
            'totalUsers' => $totalUsers,
            'totalRevenue' => $totalRevenue,
            'revenueChange' => $revenueChange,
            'usersChange' => $usersChange,
            'totalCoursesValue' => $totalCoursesValue,
        ]);
    }
}
