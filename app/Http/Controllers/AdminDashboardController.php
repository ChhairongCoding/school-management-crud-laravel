<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Course;
use App\Models\Enrollment;
use Illuminate\Http\Request;
use Carbon\Carbon;       

class AdminDashboardController extends Controller
{
    public function index()
    {
        $revenueThisMonth = Enrollment::where('created_at', '>=', Carbon::now()->startOfMonth())->sum('price_paid');
        $revenueLastMonth = Enrollment::whereBetween('created_at', [Carbon::now()->subMonth()->startOfMonth(), Carbon::now()->subMonth()->endOfMonth()])->sum('price_paid');
        $revenueChange = $revenueLastMonth > 0 ? (($revenueThisMonth - $revenueLastMonth) / $revenueLastMonth) * 100 : 100;

        $usersThisMonth = User::where('created_at', '>=', Carbon::now()->startOfMonth())->count();
        $usersLastMonth = User::whereBetween('created_at', [Carbon::now()->subMonth()->startOfMonth(), Carbon::now()->subMonth()->endOfMonth()])->count();
        $usersChange = $usersLastMonth > 0 ? (($usersThisMonth - $usersLastMonth) / $usersLastMonth) * 100 : 100;
        $totalCoursesValue = Course::sum('price');

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
public function enrollments(Request $request)
{
    $search = $request->input('search');

    $enrollments = Enrollment::with('user', 'course')
        ->when($search, function ($query) use ($search) {
            $query->whereHas('user', function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                  ->orWhere('email', 'like', "%{$search}%");
            })->orWhereHas('course', function ($q) use ($search) {
                $q->where('title', 'like', "%{$search}%");
            });
        })
        ->get();

    return view('admin_views.enrollments.index', compact('enrollments'));
}


}
