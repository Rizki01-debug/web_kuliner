<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Menu;

class HomeController extends Controller
{
    public function index()
    {
         $favorites = Menu::where('is_favorite', true)->get();

        return view('frontend.home', compact('favorites'));
    }
}
