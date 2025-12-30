<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Course;
use App\Models\Enrollment;
use Illuminate\Http\Request;

class AdminDashboardController extends Controller
{
    public function index()
    {
        $totalUsers = User::count();
        $totalRevenue = Enrollment::sum('price_paid');
        $totalCoursesValue = Course::sum('price');

        return view('admin_views.dashboard', [
            'totalUsers' => $totalUsers,
            'totalRevenue' => $totalRevenue,
            'totalCoursesValue' => $totalCoursesValue,
        ]);
    }
}