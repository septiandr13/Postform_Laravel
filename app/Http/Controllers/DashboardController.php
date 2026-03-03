<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Post;
use App\Models\Category;

class DashboardController extends Controller
{
    public function index()
    {
        $stats = [
            'users' => User::count(),
            'posts' => Post::count(),
            'categories' => Category::count(),
        ];

        $latestPosts = Post::with(['user','category'])
            ->latest()
            ->take(5)
            ->get();

        return view('dashboard', compact('stats', 'latestPosts'));
    }
}
