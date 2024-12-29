<?php

namespace App\Http\Controllers;

use App\Models\Book;

use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index()
    {
        $books = Book::all();  // Mengambil semua buku dari database
        return view('books.index', compact('books'));  // Mengirim data buku ke tampilan
    }

    /**
     * Menampilkan form untuk menambah buku baru.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('books.create');  // Menampilkan form untuk menambah buku
    }

    /**
     * Menyimpan buku baru ke database.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validasi data yang diterima dari form
        $request->validate([
            'title' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'stock' => 'required|integer|min:1',
        ]);

        // Menyimpan data buku baru ke database
        Book::create([
            'title' => $request->title,
            'author' => $request->author,
            'stock' => $request->stock,
        ]);

        // Redirect ke halaman daftar buku setelah berhasil
        return redirect()->route('books.index')->with('success', 'Buku berhasil ditambahkan!');
    }

    /**
     * Menampilkan detail buku.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function show(Book $book)
    {
        return view('books.show', compact('book'));  // Menampilkan detail buku
    }

    /**
     * Menampilkan form untuk mengedit buku.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function edit(Book $book)
    {
        return view('books.edit', compact('book'));  // Menampilkan form edit buku
    }

    /**
     * Memperbarui data buku di database.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Book $book)
    {
        // Validasi data yang diterima dari form
        $request->validate([
            'title' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'stock' => 'required|integer|min:1',
        ]);

        // Memperbarui data buku
        $book->update([
            'title' => $request->title,
            'author' => $request->author,
            'stock' => $request->stock,
        ]);

        // Redirect ke halaman daftar buku setelah berhasil update
        return redirect()->route('books.index')->with('success', 'Buku berhasil diperbarui!');
    }

    /**
     * Menghapus buku dari database.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function destroy(Book $book)
    {
        $book->delete();  // Menghapus buku dari database

        // Redirect ke halaman daftar buku setelah berhasil menghapus
        return redirect()->route('books.index')->with('success', 'Buku berhasil dihapus!');
    }
    
}
