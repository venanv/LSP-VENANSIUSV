<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;  // Pastikan ini diimpor dengan benar

class CategoryController extends Controller
{
    // Menampilkan daftar kategori buku
    public function index()
    {
        $categories = Category::all();
        return view('categories.index', compact('categories'));
    }

    // Menampilkan form untuk menambahkan kategori
    public function create()
    {
        return view('categories.create');
    }

    // Menyimpan kategori baru
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        // Menyimpan kategori baru
        Category::create([
            'name' => $request->name,
        ]);

        // Mengarahkan kembali ke daftar kategori dengan pesan sukses
        return redirect()->route('categories.index')->with('success', 'Kategori berhasil ditambahkan!');
    }

    // Menampilkan form untuk mengedit kategori
    public function edit($id)
    {
        $category = Category::findOrFail($id);
        return view('categories.edit', compact('category'));
    }

    // Memperbarui kategori
    public function update(Request $request, $id)
    {
        // Validasi input
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        // Menemukan kategori berdasarkan ID
        $category = Category::findOrFail($id);

        // Memperbarui kategori
        $category->update([
            'name' => $request->name,
        ]);

        // Mengarahkan kembali ke daftar kategori dengan pesan sukses
        return redirect()->route('categories.index')->with('success', 'Kategori berhasil diperbarui!');
    }

    // Menghapus kategori
    public function destroy($id)
    {
        $category = Category::findOrFail($id);
        $category->delete();

        // Mengarahkan kembali ke daftar kategori dengan pesan sukses
        return redirect()->route('categories.index')->with('success', 'Kategori berhasil dihapus!');
    }
}
