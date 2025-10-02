<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\ServiceRequest;
use App\Models\Service;
use Illuminate\Support\Facades\Storage;

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
        $data = $request->validated();

        // Upload file jika ada
        if ($request->hasFile('icon')) {
            $data['icon'] = $request->file('icon')->store('services', 'public');
        }

        Service::create($data);

        return redirect()->route('backoffice.services.index')
            ->with('success', 'Service berhasil ditambahkan');
    }

    public function edit(Service $service)
    {
        return view('backend.services.edit', compact('service'));
    }

    public function update(ServiceRequest $request, Service $service)
    {
        $data = $request->validated();

        // Upload file baru jika ada
        if ($request->hasFile('icon')) {
            // hapus icon lama
            if ($service->icon && Storage::disk('public')->exists($service->icon)) {
                Storage::disk('public')->delete($service->icon);
            }
            $data['icon'] = $request->file('icon')->store('services', 'public');
        }

        $service->update($data);

        return redirect()->route('backoffice.services.index')
            ->with('success', 'Service berhasil diperbarui');
    }

    public function destroy(Service $service)
    {
        // hapus file icon
        if ($service->icon && Storage::disk('public')->exists($service->icon)) {
            Storage::disk('public')->delete($service->icon);
        }

        $service->delete();

        return redirect()->route('backoffice.services.index')
            ->with('success', 'Service berhasil dihapus');
    }
}
