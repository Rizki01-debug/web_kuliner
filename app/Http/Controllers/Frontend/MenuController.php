<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Menu;

class MenuController extends Controller
{
    public function index()
    {
        $menus = Menu::where('is_published', true)->orderBy('created_at','desc')->paginate(12);
        return view('frontend.menu.index', compact('menus'));
    }

    public function show(Menu $menu)
    {
        if (!$menu->is_published) {
            abort(404);
        }
        return view('frontend.menu.show', compact('menu'));
    }
}
