<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\ServiceRequest;
use App\Models\Service;

class ServiceController extends Controller
{
    public function index()
    {
        $services = Service::latest()->paginate(10);
        return view('backend.services.index', compact('services'));
    }

    public function create()
    {
        return view('backend.services.create');
    }

    public function store(ServiceRequest $request)
    {
        Service::create($request->validated());
        return redirect()->route('services.index')->with('success', 'Service berhasil ditambahkan');
    }

    public function edit(Service $service)
    {
        return view('backend.services.edit', compact('service'));
    }

    public function update(ServiceRequest $request, Service $service)
    {
        $service->update($request->validated());
        return redirect()->route('services.index')->with('success', 'Service berhasil diperbarui');
    }

    public function destroy(Service $service)
    {
        $service->delete();
        return redirect()->route('services.index')->with('success', 'Service berhasil dihapus');
    }
}
