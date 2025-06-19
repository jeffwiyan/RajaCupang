<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class DashboardController extends Controller
{
    public function index()
{
    $categories = Category::with('products')->get();
    return view('dashboard', compact('categories'));
}
}
