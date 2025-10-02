<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Menu;
use App\Models\Newsletter;

class DashboardController extends Controller
{
    public function index()
    {
        $menuCount = Menu::count();
        $newsletterCount = Newsletter::count();

        return view('backend.dashboard.index', compact('menuCount', 'newsletterCount'));
    }
}
