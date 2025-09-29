<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\FooterRequest;
use App\Models\Footer;

class FooterController extends Controller
{
    public function index()
    {
        $footer = Footer::first();
        return view('backend.footer.index', compact('footer'));
    }

    public function create()
    {
        return view('backend.footer.create');
    }

    public function store(FooterRequest $request)
    {
        Footer::create($request->validated());
        return redirect()->route('backoffice.footer.index')
                         ->with('success', 'Footer berhasil ditambahkan');
    }

    public function edit(Footer $footer)
    {
        return view('backend.footer.edit', compact('footer'));
    }

    public function update(FooterRequest $request, Footer $footer)
    {
        $footer->update($request->validated());
        return redirect()->route('backoffice.footer.index')
                         ->with('success', 'Footer berhasil diperbarui');
    }

    public function destroy(Footer $footer)
    {
        $footer->delete();
        return redirect()->route('backoffice.footer.index')
                         ->with('success', 'Footer berhasil dihapus');
    }
}
