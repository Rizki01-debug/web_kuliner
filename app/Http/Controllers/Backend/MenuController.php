<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Menu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MenuController extends Controller
{
    public function index()
    {
        $menus = Menu::orderBy('created_at','desc')->paginate(12);
        return view('backend.menus.index', compact('menus'));
    }

    public function create()
    {
        return view('backend.menus.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
            'image' => 'nullable|image|max:2048',
            'is_published' => 'sometimes|boolean',
        ]);

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('menus', 'public');
            $data['image'] = $path;
        }

        $data['is_published'] = $request->has('is_published') ? true : false;

        Menu::create($data);

        return redirect()->route('backoffice.menus.index')->with('success','Menu berhasil dibuat.');
    }

    public function show(Menu $menu)
    {
        return view('backend.menus.show', compact('menu'));
    }

    public function edit(Menu $menu)
    {
        return view('backend.menus.edit', compact('menu'));
    }

    public function update(Request $request, Menu $menu)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
            'image' => 'nullable|image|max:2048',
            'is_published' => 'sometimes|boolean',
        ]);

        if ($request->hasFile('image')) {
            // hapus file lama bila ada
            if ($menu->image && Storage::disk('public')->exists($menu->image)) {
                Storage::disk('public')->delete($menu->image);
            }
            $path = $request->file('image')->store('menus', 'public');
            $data['image'] = $path;
        }

        $data['is_published'] = $request->has('is_published') ? true : false;

        $menu->update($data);

        return redirect()->route('backoffice.menus.index')->with('success','Menu berhasil diperbarui.');
    }

    public function destroy(Menu $menu)
    {
        if ($menu->image && Storage::disk('public')->exists($menu->image)) {
            Storage::disk('public')->delete($menu->image);
        }

        $menu->delete();
        return redirect()->route('backoffice.menus.index')->with('success','Menu berhasil dihapus.');
    }
}
