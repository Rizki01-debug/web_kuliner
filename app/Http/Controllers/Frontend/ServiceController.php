<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Service;

class ServiceController extends Controller
{
    public function index()
{
    $services = Service::latest()->paginate(6);
    return view('frontend.services.index', compact('services'));
}

    public function show(Service $service)
    {
        return view('frontend.services.show', compact('service'));
    }
}
